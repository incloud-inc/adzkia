<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use ZipArchive;

class WordQuestionService
{
    /**
     * Parse a .docx file and extract structured questions with formatting, LaTeX, and embedded images preserved.
     */
    public function parseDocx(string $filePath): array
    {
        $zip = new ZipArchive;
        if ($zip->open($filePath) !== true) {
            throw new \RuntimeException('Gagal membuka file Word (.docx). Pastikan file tidak rusak.');
        }

        try {
            $xmlIndex = $zip->locateName('word/document.xml');
            if ($xmlIndex === false) {
                throw new \RuntimeException('Struktur dokumen Word tidak valid (word/document.xml tidak ditemukan).');
            }

            $xmlContent = $zip->getFromIndex($xmlIndex);

            // Extract document relationships (e.g. image mappings)
            $relationships = $this->extractRelationships($zip);

            $imageCache = [];

            // Parse XML content preserving formatting runs and extracting images
            $paragraphs = $this->extractParagraphsWithFormatting($xmlContent, $zip, $relationships, $imageCache);

            // Parse lines into structured items (Standalone Questions & Question Groups)
            return $this->buildStructuredItems($paragraphs);
        } finally {
            $zip->close();
        }
    }

    /**
     * Extract relationship definitions from word/_rels/document.xml.rels.
     */
    protected function extractRelationships(ZipArchive $zip): array
    {
        $relationships = [];
        $relsIndex = $zip->locateName('word/_rels/document.xml.rels');
        if ($relsIndex === false) {
            return $relationships;
        }

        $relsXml = $zip->getFromIndex($relsIndex);
        if ($relsXml === false) {
            return $relationships;
        }

        $dom = new \DOMDocument;
        libxml_use_internal_errors(true);
        $dom->loadXML($relsXml);
        libxml_clear_errors();

        $xpath = new \DOMXPath($dom);
        $xpath->registerNamespace('rel', 'http://schemas.openxmlformats.org/package/2006/relationships');

        $relNodes = $xpath->query('//rel:Relationship | //*[local-name()="Relationship"]');
        foreach ($relNodes as $relNode) {
            $id = $relNode->getAttribute('Id');
            $target = $relNode->getAttribute('Target');
            $type = $relNode->getAttribute('Type');
            $targetMode = $relNode->getAttribute('TargetMode');

            if ($id && $target) {
                $relationships[$id] = [
                    'target' => $target,
                    'type' => $type,
                    'target_mode' => $targetMode,
                ];
            }
        }

        return $relationships;
    }

    /**
     * Resolve relationship ID to a stored media URL (object storage, public disk, or base64 fallback).
     */
    protected function resolveAndUploadImage(
        string $relId,
        array $relationships,
        ZipArchive $zip,
        array &$imageCache
    ): ?string {
        if (isset($imageCache[$relId])) {
            return $imageCache[$relId];
        }

        if (! isset($relationships[$relId])) {
            return null;
        }

        $rel = $relationships[$relId];
        $target = $rel['target'];

        // If target is external URL
        if (
            strcasecmp((string) ($rel['target_mode'] ?? ''), 'External') === 0 ||
            str_starts_with($target, 'http://') ||
            str_starts_with($target, 'https://')
        ) {
            $imageCache[$relId] = $target;

            return $target;
        }

        $zipEntry = $this->resolveZipEntryPath($target, $zip);
        if (! $zipEntry) {
            return null;
        }

        $binary = $zip->getFromName($zipEntry);
        if ($binary === false || strlen($binary) === 0) {
            return null;
        }

        $url = $this->storeMediaFile($binary, basename($target));
        if ($url) {
            $imageCache[$relId] = $url;
        }

        return $url;
    }

    /**
     * Resolve ZIP entry path for a relationship target.
     */
    protected function resolveZipEntryPath(string $target, ZipArchive $zip): ?string
    {
        $normalized = str_replace('\\', '/', $target);
        $normalized = ltrim($normalized, '/');

        $candidates = [];

        if (str_starts_with($normalized, 'word/')) {
            $candidates[] = $normalized;
            $candidates[] = substr($normalized, 5);
        } elseif (str_starts_with($normalized, '../')) {
            $candidates[] = 'word/'.substr($normalized, 3);
            $candidates[] = substr($normalized, 3);
        } else {
            $candidates[] = 'word/'.$normalized;
            $candidates[] = $normalized;
        }

        $base = basename($normalized);
        $candidates[] = 'word/media/'.$base;
        $candidates[] = 'media/'.$base;

        foreach ($candidates as $cand) {
            if ($zip->locateName($cand) !== false) {
                return $cand;
            }
        }

        // Case-insensitive fallback search in zip
        $lowerBase = strtolower($base);
        for ($i = 0; $i < $zip->numFiles; $i++) {
            $name = $zip->getNameIndex($i);
            if (strtolower(basename($name)) === $lowerBase) {
                return $name;
            }
        }

        return null;
    }

    /**
     * Store extracted image from docx into object storage, public disk, or data URI fallback.
     */
    public function storeMediaFile(string $imageBinary, string $originalFilename): string
    {
        $ext = strtolower(pathinfo($originalFilename, PATHINFO_EXTENSION));
        if (empty($ext) || ! in_array($ext, ['png', 'jpg', 'jpeg', 'gif', 'webp', 'svg', 'bmp'], true)) {
            $ext = 'png';
            if (class_exists(\finfo::class)) {
                $finfo = new \finfo(FILEINFO_MIME_TYPE);
                $mime = $finfo->buffer($imageBinary);
                $ext = match ($mime) {
                    'image/jpeg' => 'jpg',
                    'image/png' => 'png',
                    'image/gif' => 'gif',
                    'image/webp' => 'webp',
                    'image/svg+xml' => 'svg',
                    'image/bmp' => 'bmp',
                    default => 'png',
                };
            }
        }

        $randomSuffix = bin2hex(random_bytes(6));
        if (class_exists(Str::class)) {
            $randomSuffix = Str::random(12);
        }
        $filename = 'word_'.date('Ymd_His').'_'.$randomSuffix.'.'.$ext;
        $path = 'asesmen/'.$filename;

        // Try Laravel Storage if available
        if (class_exists(Storage::class) && function_exists('app') && app()->has('filesystem')) {
            $preferredDisk = function_exists('config') ? config('filesystems.upload_disk', 'r2') : 'public';
            $disksToTry = array_values(array_unique([$preferredDisk, 'public']));

            foreach ($disksToTry as $disk) {
                try {
                    if (Storage::disk($disk)->put($path, $imageBinary, 'public')) {
                        $url = Storage::disk($disk)->url($path);
                        if (! empty($url)) {
                            return $url;
                        }
                    }
                } catch (\Throwable $e) {
                    // Try next disk if any failure occurs
                }
            }
        }

        // Resilient fallback: data URI (guaranteed to render under any environment)
        $mime = match ($ext) {
            'jpg', 'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'webp' => 'image/webp',
            'svg' => 'image/svg+xml',
            default => 'image/png',
        };

        return 'data:'.$mime.';base64,'.base64_encode($imageBinary);
    }

    /**
     * Extract paragraphs from Word XML while preserving Bold, Italic, Underline, LaTeX, and embedded Images.
     */
    protected function extractParagraphsWithFormatting(
        string $xmlContent,
        ZipArchive $zip,
        array $relationships,
        array &$imageCache
    ): array {
        $paragraphs = [];

        $dom = new \DOMDocument;
        libxml_use_internal_errors(true);
        $dom->loadXML($xmlContent);
        libxml_clear_errors();

        $xpath = new \DOMXPath($dom);
        $xpath->registerNamespace('w', 'http://schemas.openxmlformats.org/wordprocessingml/2006/main');
        $xpath->registerNamespace('m', 'http://schemas.openxmlformats.org/officeDocument/2006/math');
        $xpath->registerNamespace('r', 'http://schemas.openxmlformats.org/officeDocument/2006/relationships');
        $xpath->registerNamespace('a', 'http://schemas.openxmlformats.org/drawingml/2006/main');
        $xpath->registerNamespace('pic', 'http://schemas.openxmlformats.org/drawingml/2006/picture');
        $xpath->registerNamespace('wp', 'http://schemas.openxmlformats.org/drawingml/2006/wordprocessingDrawing');
        $xpath->registerNamespace('v', 'urn:schemas-microsoft-com:vml');
        $xpath->registerNamespace('o', 'urn:schemas-microsoft-com:office:office');
        $xpath->registerNamespace('mc', 'http://schemas.openxmlformats.org/markup-compatibility/2006');

        $pNodes = $xpath->query('//w:p');
        foreach ($pNodes as $pNode) {
            $pText = $this->extractParagraphContent($pNode, $xpath, $zip, $relationships, $imageCache);
            $pText = $this->formatMathInPlainText($pText);

            $lines = preg_split('/\r?\n/', $pText);
            foreach ($lines as $line) {
                $trimmed = trim($line);
                if ($trimmed !== '') {
                    $paragraphs[] = $trimmed;
                }
            }
        }

        return $paragraphs;
    }

    /**
     * Extract content of a single paragraph in exact document order (text and drawings).
     */
    protected function extractParagraphContent(
        \DOMNode $pNode,
        \DOMXPath $xpath,
        ZipArchive $zip,
        array $relationships,
        array &$imageCache
    ): string {
        $pText = '';

        // Select all runs, equations, and non-run drawings in document order, excluding mc:Fallback to prevent duplicates
        $contentNodes = $xpath->query(
            '(.//w:r | .//m:oMathPara | .//m:oMath[not(ancestor::m:oMathPara)] | .//w:drawing[not(ancestor::w:r)] | .//w:pict[not(ancestor::w:r)])[not(ancestor::mc:Fallback)]',
            $pNode
        );

        foreach ($contentNodes as $node) {
            if ($node->localName === 'oMath' || $node->localName === 'oMathPara') {
                $isBlock = ($node->localName === 'oMathPara');
                $mathLatex = $this->convertOmmlToLatex($node, $isBlock);
                if ($mathLatex !== '') {
                    $pText .= $mathLatex;
                }

                continue;
            }

            if ($node->nodeName === 'w:drawing' || $node->nodeName === 'w:pict') {
                $imgMd = $this->extractImagesFromElement($node, $xpath, $zip, $relationships, $imageCache);
                if ($imgMd) {
                    if ($pText !== '' && ! str_ends_with($pText, "\n")) {
                        $pText .= "\n";
                    }
                    $pText .= $imgMd."\n";
                }

                continue;
            }

            // Node is w:r
            $isBold = $xpath->query('.//w:rPr/w:b | .//w:rPr/w:bCs', $node)->length > 0;
            $isItalic = $xpath->query('.//w:rPr/w:i | .//w:rPr/w:iCs', $node)->length > 0;
            $isUnderline = $xpath->query('.//w:rPr/w:u', $node)->length > 0;

            $isSuperscript = false;
            $isSubscript = false;
            $vertAlignNodes = $xpath->query('.//w:rPr/w:vertAlign', $node);
            if ($vertAlignNodes->length > 0) {
                $va = strtolower((string) ($vertAlignNodes->item(0)->getAttribute('w:val') ?: $vertAlignNodes->item(0)->getAttribute('val')));
                if ($va === 'superscript') {
                    $isSuperscript = true;
                } elseif ($va === 'subscript') {
                    $isSubscript = true;
                }
            }

            // Iterate child nodes of the run in document order
            $hasChildDrawing = false;
            foreach ($node->childNodes as $child) {
                if ($child->nodeName === 'w:t') {
                    $runText = $child->nodeValue;
                    if ($runText === '') {
                        continue;
                    }

                    if (trim($runText) !== '') {
                        if ($isBold) {
                            $runText = "**{$runText}**";
                        }
                        if ($isItalic) {
                            $runText = "*{$runText}*";
                        }
                        if ($isUnderline) {
                            $runText = "<u>{$runText}</u>";
                        }
                        if ($isSuperscript) {
                            $runText = "<sup>{$runText}</sup>";
                        }
                        if ($isSubscript) {
                            $runText = "<sub>{$runText}</sub>";
                        }
                    }

                    $pText .= $runText;
                } elseif ($child->nodeName === 'w:br') {
                    $pText .= "\n";
                } elseif ($child->nodeName === 'w:tab') {
                    $pText .= "\t";
                } elseif ($child->nodeName === 'w:drawing' || $child->nodeName === 'w:pict' || $child->nodeName === 'mc:AlternateContent') {
                    $hasChildDrawing = true;
                    $imgMd = $this->extractImagesFromElement($child, $xpath, $zip, $relationships, $imageCache);
                    if ($imgMd) {
                        if ($pText !== '' && ! str_ends_with($pText, "\n")) {
                            $pText .= "\n";
                        }
                        $pText .= $imgMd."\n";
                    }
                }
            }

            // Extra check for nested drawing if not caught by direct childNodes
            if (! $hasChildDrawing) {
                $nestedDrawingNodes = $xpath->query(
                    '(.//w:drawing | .//w:pict)[not(ancestor::mc:Fallback)]',
                    $node
                );
                if ($nestedDrawingNodes->length > 0) {
                    foreach ($nestedDrawingNodes as $dNode) {
                        $imgMd = $this->extractImagesFromElement($dNode, $xpath, $zip, $relationships, $imageCache);
                        if ($imgMd) {
                            if ($pText !== '' && ! str_ends_with($pText, "\n")) {
                                $pText .= "\n";
                            }
                            $pText .= $imgMd."\n";
                        }
                    }
                }
            }
        }

        return $pText;
    }

    /**
     * Konversi elemen OMML (<m:oMath> atau <m:oMathPara>) menjadi format LaTeX / Markdown ($...$ atau $$...$$).
     */
    public function convertOmmlToLatex(\DOMNode $node, bool $isBlock = false): string
    {
        $latex = trim($this->parseOmmlNode($node));
        if ($latex === '') {
            return '';
        }

        if ($isBlock) {
            return "\n$$".$latex."$$\n";
        }

        return '$'.$latex.'$';
    }

    /**
     * Rekursif parsing elemen OMML ke representasi sintaks LaTeX matematika.
     */
    protected function parseOmmlNode(\DOMNode $node): string
    {
        $localName = $node->localName;

        switch ($localName) {
            case 'oMathPara':
                $parts = [];
                foreach ($node->childNodes as $child) {
                    $cText = trim($this->parseOmmlNode($child));
                    if ($cText !== '') {
                        $parts[] = $cText;
                    }
                }

                return implode(' ', $parts);

            case 'oMath':
                $out = '';
                foreach ($node->childNodes as $child) {
                    $out .= $this->parseOmmlNode($child);
                }

                return $out;

            case 'f': // Fraction (pecahan \frac{num}{den})
                $num = '';
                $den = '';
                foreach ($node->childNodes as $child) {
                    if ($child->localName === 'num') {
                        $num = trim($this->parseOmmlChildren($child));
                    } elseif ($child->localName === 'den') {
                        $den = trim($this->parseOmmlChildren($child));
                    }
                }

                return '\\frac{'.($num !== '' ? $num : '1').'}{'.($den !== '' ? $den : '1').'}';

            case 'sSup': // Superscript / Pangkat ({base}^{sup})
                $base = '';
                $sup = '';
                foreach ($node->childNodes as $child) {
                    if ($child->localName === 'e') {
                        $base = trim($this->parseOmmlChildren($child));
                    } elseif ($child->localName === 'sup') {
                        $sup = trim($this->parseOmmlChildren($child));
                    }
                }

                return '{'.$base.'}^{'.$sup.'}';

            case 'sSub': // Subscript / Indeks bawah ({base}_{sub})
                $base = '';
                $sub = '';
                foreach ($node->childNodes as $child) {
                    if ($child->localName === 'e') {
                        $base = trim($this->parseOmmlChildren($child));
                    } elseif ($child->localName === 'sub') {
                        $sub = trim($this->parseOmmlChildren($child));
                    }
                }

                return '{'.$base.'}_{'.$sub.'}';

            case 'sSubSup': // Subscript & Superscript ({base}_{sub}^{sup})
                $base = '';
                $sub = '';
                $sup = '';
                foreach ($node->childNodes as $child) {
                    if ($child->localName === 'e') {
                        $base = trim($this->parseOmmlChildren($child));
                    } elseif ($child->localName === 'sub') {
                        $sub = trim($this->parseOmmlChildren($child));
                    } elseif ($child->localName === 'sup') {
                        $sup = trim($this->parseOmmlChildren($child));
                    }
                }

                return '{'.$base.'}_{'.$sub.'}^{'.$sup.'}';

            case 'rad': // Bentuk Akar (\sqrt{e} atau \sqrt[deg]{e})
                $deg = '';
                $expr = '';
                foreach ($node->childNodes as $child) {
                    if ($child->localName === 'deg') {
                        $deg = trim($this->parseOmmlChildren($child));
                    } elseif ($child->localName === 'e') {
                        $expr = trim($this->parseOmmlChildren($child));
                    }
                }
                if ($deg !== '' && $deg !== '2') {
                    return '\\sqrt['.$deg.']{'.$expr.'}';
                }

                return '\\sqrt{'.$expr.'}';

            case 'd': // Delimiters / Tanda kurung (\left( ... \right))
                $begChr = '(';
                $endChr = ')';
                $sepChr = ',';
                $exprParts = [];

                foreach ($node->childNodes as $child) {
                    if ($child->localName === 'dPr') {
                        foreach ($child->childNodes as $pr) {
                            if ($pr->localName === 'begChr') {
                                $begChr = (string) ($pr->getAttribute('m:val') ?: $pr->getAttribute('val') ?: $begChr);
                            } elseif ($pr->localName === 'endChr') {
                                $endChr = (string) ($pr->getAttribute('m:val') ?: $pr->getAttribute('val') ?: $endChr);
                            } elseif ($pr->localName === 'sepChr') {
                                $sepChr = (string) ($pr->getAttribute('m:val') ?: $pr->getAttribute('val') ?: $sepChr);
                            }
                        }
                    } elseif ($child->localName === 'e') {
                        $exprParts[] = trim($this->parseOmmlChildren($child));
                    }
                }

                $inner = implode($sepChr.' ', array_filter($exprParts, fn ($p) => $p !== ''));
                $open = match ($begChr) {
                    '(' => '(',
                    '[' => '[',
                    '{' => '\\{',
                    '|' => '|',
                    '‖' => '\\|',
                    '⟨' => '\\langle',
                    '⌊' => '\\lfloor',
                    '⌈' => '\\lceil',
                    '' => '.',
                    default => $begChr,
                };
                $close = match ($endChr) {
                    ')' => ')',
                    ']' => ']',
                    '}' => '\\}',
                    '|' => '|',
                    '‖' => '\\|',
                    '⟩' => '\\rangle',
                    '⌋' => '\\rfloor',
                    '⌉' => '\\rceil',
                    '' => '.',
                    default => $endChr,
                };

                return '\\left'.$open.' '.$inner.' \\right'.$close;

            case 'nary': // N-ary operator (\sum, \int, \prod)
                $chr = '∑';
                $sub = '';
                $sup = '';
                $expr = '';

                foreach ($node->childNodes as $child) {
                    if ($child->localName === 'naryPr') {
                        foreach ($child->childNodes as $pr) {
                            if ($pr->localName === 'chr') {
                                $chr = (string) ($pr->getAttribute('m:val') ?: $pr->getAttribute('val') ?: $chr);
                            }
                        }
                    } elseif ($child->localName === 'sub') {
                        $sub = trim($this->parseOmmlChildren($child));
                    } elseif ($child->localName === 'sup') {
                        $sup = trim($this->parseOmmlChildren($child));
                    } elseif ($child->localName === 'e') {
                        $expr = trim($this->parseOmmlChildren($child));
                    }
                }

                $op = match ($chr) {
                    '∫' => '\\int',
                    '∬' => '\\iint',
                    '∭' => '\\iiint',
                    '∮' => '\\oint',
                    '∏' => '\\prod',
                    '∐' => '\\coprod',
                    '⋃' => '\\bigcup',
                    '⋂' => '\\bigcap',
                    '⋁' => '\\bigvee',
                    '⋀' => '\\bigwedge',
                    default => '\\sum',
                };

                $subStr = ($sub !== '') ? '_{'.$sub.'}' : '';
                $supStr = ($sup !== '') ? '^{'.$sup.'}' : '';

                return $op.$subStr.$supStr.' '.$expr;

            case 'm': // Matrix (\begin{matrix} ... \end{matrix})
                $rows = [];
                foreach ($node->childNodes as $child) {
                    if ($child->localName === 'mr') { // Matrix row
                        $cells = [];
                        foreach ($child->childNodes as $cell) {
                            if ($cell->localName === 'e') {
                                $cells[] = trim($this->parseOmmlChildren($cell));
                            }
                        }
                        $rows[] = implode(' & ', $cells);
                    }
                }

                return '\\begin{matrix} '.implode(' \\\\ ', $rows).' \\end{matrix}';

            case 'bar': // Overline / Underline
                $expr = '';
                $pos = 'top';
                foreach ($node->childNodes as $child) {
                    if ($child->localName === 'barPr') {
                        foreach ($child->childNodes as $pr) {
                            if ($pr->localName === 'pos') {
                                $pos = (string) ($pr->getAttribute('m:val') ?: $pr->getAttribute('val') ?: $pos);
                            }
                        }
                    } elseif ($child->localName === 'e') {
                        $expr = trim($this->parseOmmlChildren($child));
                    }
                }

                return ($pos === 'bot') ? '\\underline{'.$expr.'}' : '\\overline{'.$expr.'}';

            case 'limLow': // Lower Limit (\lim_{x \to 0} expr)
                $base = '';
                $lim = '';
                foreach ($node->childNodes as $child) {
                    if ($child->localName === 'e') {
                        $base = trim($this->parseOmmlChildren($child));
                    } elseif ($child->localName === 'lim') {
                        $lim = trim($this->parseOmmlChildren($child));
                    }
                }
                if (strtolower($base) === 'lim') {
                    return '\\lim_{'.$lim.'}';
                }

                return '{'.$base.'}_{'.$lim.'}';

            case 'limUpp': // Upper Limit
                $base = '';
                $lim = '';
                foreach ($node->childNodes as $child) {
                    if ($child->localName === 'e') {
                        $base = trim($this->parseOmmlChildren($child));
                    } elseif ($child->localName === 'lim') {
                        $lim = trim($this->parseOmmlChildren($child));
                    }
                }

                return '{'.$base.'}^{'.$lim.'}';

            case 'sPre': // Pre-sub-superscripts (isotop / tensor: {}_{sub}^{sup}{base})
                $base = '';
                $sub = '';
                $sup = '';
                foreach ($node->childNodes as $child) {
                    if ($child->localName === 'e') {
                        $base = trim($this->parseOmmlChildren($child));
                    } elseif ($child->localName === 'sub') {
                        $sub = trim($this->parseOmmlChildren($child));
                    } elseif ($child->localName === 'sup') {
                        $sup = trim($this->parseOmmlChildren($child));
                    }
                }

                $subStr = ($sub !== '') ? '_{'.$sub.'}' : '';
                $supStr = ($sup !== '') ? '^{'.$sup.'}' : '';

                return '{'.$subStr.$supStr.'{'.$base.'}}';

            case 'groupChr': // Group character (\overbrace / \underbrace)
                $pos = 'top';
                $chr = '⏞';
                $expr = '';
                foreach ($node->childNodes as $child) {
                    if ($child->localName === 'groupChrPr') {
                        foreach ($child->childNodes as $pr) {
                            if ($pr->localName === 'pos') {
                                $pos = (string) ($pr->getAttribute('m:val') ?: $pr->getAttribute('val') ?: $pos);
                            } elseif ($pr->localName === 'chr') {
                                $chr = (string) ($pr->getAttribute('m:val') ?: $pr->getAttribute('val') ?: $chr);
                            }
                        }
                    } elseif ($child->localName === 'e') {
                        $expr = trim($this->parseOmmlChildren($child));
                    }
                }

                return ($pos === 'bot' || $chr === '⏟') ? '\\underbrace{'.$expr.'}' : '\\overbrace{'.$expr.'}';

            case 'borderBox': // Border Box (\boxed{expr})
                $expr = '';
                foreach ($node->childNodes as $child) {
                    if ($child->localName === 'e') {
                        $expr = trim($this->parseOmmlChildren($child));
                    }
                }

                return '\\boxed{'.$expr.'}';

            case 'box': // Box element
                $expr = '';
                foreach ($node->childNodes as $child) {
                    if ($child->localName === 'e') {
                        $expr = trim($this->parseOmmlChildren($child));
                    }
                }

                return '{'.$expr.'}';

            case 'func': // Math Function (sin, cos, tan, log, lim, etc.)
                $fName = '';
                $expr = '';
                foreach ($node->childNodes as $child) {
                    if ($child->localName === 'fName') {
                        $fName = trim($this->parseOmmlChildren($child));
                    } elseif ($child->localName === 'e') {
                        $expr = trim($this->parseOmmlChildren($child));
                    }
                }

                $cleanName = strtolower(ltrim($fName, '\\'));
                $standardFuncs = [
                    'sin', 'cos', 'tan', 'cot', 'sec', 'csc',
                    'arcsin', 'arccos', 'arctan',
                    'sinh', 'cosh', 'tanh', 'coth',
                    'log', 'ln', 'lg', 'exp',
                    'min', 'max', 'lim', 'det', 'gcd', 'deg',
                ];

                if (in_array($cleanName, $standardFuncs, true)) {
                    return '\\'.$cleanName.($expr !== '' ? ' '.$expr : '');
                }

                if ($fName !== '') {
                    return '\\operatorname{'.$fName.'}'.($expr !== '' ? ' '.$expr : '');
                }

                return $expr;

            case 'acc': // Accent (hat, vec, dot, bar)
                $chr = '^';
                $expr = '';
                foreach ($node->childNodes as $child) {
                    if ($child->localName === 'accPr') {
                        foreach ($child->childNodes as $pr) {
                            if ($pr->localName === 'chr') {
                                $chr = (string) ($pr->getAttribute('m:val') ?: $pr->getAttribute('val') ?: $chr);
                            }
                        }
                    } elseif ($child->localName === 'e') {
                        $expr = trim($this->parseOmmlChildren($child));
                    }
                }
                $accCmd = match ($chr) {
                    '→' => '\\vec',
                    '.' => '\\dot',
                    '..' => '\\ddot',
                    '~' => '\\tilde',
                    '¯' => '\\bar',
                    default => '\\hat',
                };

                return $accCmd.'{'.$expr.'}';

            case 'eqArr': // Equation Array
                $lines = [];
                foreach ($node->childNodes as $child) {
                    if ($child->localName === 'e') {
                        $lines[] = trim($this->parseOmmlChildren($child));
                    }
                }

                return implode(' \\\\ ', array_filter($lines, fn ($l) => $l !== ''));

            case 'r': // Math Run
                return $this->parseOmmlChildren($node);

            case 't': // Math Text
                return $this->convertMathSymbolsToLatex($node->nodeValue);

            default:
                return $this->parseOmmlChildren($node);
        }
    }

    /**
     * Parse child nodes of an OMML element.
     */
    protected function parseOmmlChildren(\DOMNode $node): string
    {
        $result = '';
        foreach ($node->childNodes as $child) {
            $result .= $this->parseOmmlNode($child);
        }

        return $result;
    }

    /**
     * Map Unicode mathematical symbols and characters to LaTeX commands.
     */
    protected function convertMathSymbolsToLatex(string $text): string
    {
        $symbolMap = [
            '±' => ' \\pm ',
            '∓' => ' \\mp ',
            '×' => ' \\times ',
            '÷' => ' \\div ',
            '·' => ' \\cdot ',
            '•' => ' \\cdot ',
            '≤' => ' \\le ',
            '≥' => ' \\ge ',
            '≠' => ' \\neq ',
            '≈' => ' \\approx ',
            '≡' => ' \\equiv ',
            '≢' => ' \\not\\equiv ',
            '∞' => ' \\infty ',
            '°' => '^{\\circ} ',
            '∠' => ' \\angle ',
            '⊥' => ' \\perp ',
            '∥' => ' \\parallel ',
            '∂' => ' \\partial ',
            '∇' => ' \\nabla ',
            '…' => ' \\dots ',
            '⋯' => ' \\cdots ',
            '⋮' => ' \\vdots ',
            '⋱' => ' \\ddots ',
            'α' => ' \\alpha ',
            'β' => ' \\beta ',
            'γ' => ' \\gamma ',
            'Γ' => ' \\Gamma ',
            'δ' => ' \\delta ',
            'Δ' => ' \\Delta ',
            'ε' => ' \\epsilon ',
            'ζ' => ' \\zeta ',
            'η' => ' \\eta ',
            'θ' => ' \\theta ',
            'Θ' => ' \\Theta ',
            'ι' => ' \\iota ',
            'κ' => ' \\kappa ',
            'λ' => ' \\lambda ',
            'Λ' => ' \\Lambda ',
            'μ' => ' \\mu ',
            'ν' => ' \\nu ',
            'ξ' => ' \\xi ',
            'Ξ' => ' \\Xi ',
            'π' => ' \\pi ',
            'Π' => ' \\Pi ',
            'ρ' => ' \\rho ',
            'σ' => ' \\sigma ',
            'Σ' => ' \\Sigma ',
            'τ' => ' \\tau ',
            'υ' => ' \\upsilon ',
            'Υ' => ' \\Upsilon ',
            'φ' => ' \\phi ',
            'Φ' => ' \\Phi ',
            'χ' => ' \\chi ',
            'ψ' => ' \\psi ',
            'Ψ' => ' \\Psi ',
            'ω' => ' \\omega ',
            'Ω' => ' \\Omega ',
            '→' => ' \\to ',
            '←' => ' \\leftarrow ',
            '⇒' => ' \\Rightarrow ',
            '⇐' => ' \\Leftarrow ',
            '⇔' => ' \\Leftrightarrow ',
            '↔' => ' \\leftrightarrow ',
            '↦' => ' \\mapsto ',
            '∈' => ' \\in ',
            '∉' => ' \\notin ',
            '⊂' => ' \\subset ',
            '⊆' => ' \\subseteq ',
            '∪' => ' \\cup ',
            '∩' => ' \\cap ',
            '∅' => ' \\emptyset ',
            '∀' => ' \\forall ',
            '∃' => ' \\exists ',
            '¬' => ' \\neg ',
            '∧' => ' \\land ',
            '∨' => ' \\lor ',
        ];

        return strtr($text, $symbolMap);
    }

    /**
     * Format ekspresi matematika plain-text (seperti sqrt, akar, simbol akar, atau makro LaTeX terbuka) menjadi Markdown LaTeX ($...$).
     */
    public function formatMathInPlainText(string $text): string
    {
        if (trim($text) === '') {
            return $text;
        }

        $placeholders = [];
        $tokenIndex = 0;

        $protect = function (string $val) use (&$placeholders, &$tokenIndex): string {
            $token = '___MATH_SAVED_TOKEN_'.$tokenIndex.'___';
            $placeholders[$token] = $val;
            $tokenIndex++;

            return $token;
        };

        // 1. Lindungi display math $$ ... $$ yang sudah ada
        $text = preg_replace_callback('/\$\$([\s\S]*?)\$\$/u', function ($m) use ($protect) {
            return $protect($m[0]);
        }, $text);

        // 2. Lindungi inline math $ ... $ yang sudah ada
        $text = preg_replace_callback('/\$([^\$\r\n]+?)\$/u', function ($m) use ($protect) {
            return $protect($m[0]);
        }, $text);

        // 3. Lindungi markdown images ![alt](url)
        $text = preg_replace_callback('/!\[([^\]]*)\]\(([^)]+)\)/u', function ($m) use ($protect) {
            return $protect($m[0]);
        }, $text);

        // 4. Transformasi akar pangkat verbal bahasa Indonesia:
        // Contoh: "akar pangkat 3 dari 27", "akar pangkat n dari x"
        $text = preg_replace_callback('/akar\s+pangkat\s+([0-9a-zA-Z]+)\s+dari\s+([^\s,\.\?!;:]+)/iu', function ($m) use ($protect) {
            return $protect('$\\sqrt['.trim($m[1]).']{'.trim($m[2]).'}$');
        }, $text);

        // 5. Transformasi notasi sqrt & akar dengan derajat kurung siku:
        // Contoh: sqrt[n]{x}, sqrt[n](x), akar[n]{x}, akar[n](x), akar[n] x
        $text = preg_replace_callback('/(?:sqrt|akar)\s*\[([^\]]+)\]\s*(?:\{([^}]+)\}|\(([^\)]+)\)|([0-9a-zA-Z]+))/iu', function ($m) use ($protect) {
            $expr = trim($m[2] !== '' ? $m[2] : ($m[3] !== '' ? $m[3] : ($m[4] ?? '')));

            return $protect('$\\sqrt['.trim($m[1]).']{'.$expr.'}$');
        }, $text);

        // 6. Transformasi notasi sqrt & akar biasa:
        // Contoh: sqrt{x}, sqrt(x), akar{x}, akar(x), akar 25, akar x
        $text = preg_replace_callback('/(?:sqrt|akar)\s*(?:\{([^}]+)\}|\(([^\)]+)\)|([0-9a-zA-Z]+))/iu', function ($m) use ($protect) {
            $expr = trim($m[1] !== '' ? $m[1] : ($m[2] !== '' ? $m[2] : ($m[3] ?? '')));
            if (in_array(strtolower($expr), ['masalah', 'rumput', 'pohon', 'tunggang', 'serabut'], true)) {
                return $m[0];
            }

            return $protect('$\\sqrt{'.$expr.'}$');
        }, $text);

        // 7. Simbol akar Unicode:
        // ∜ (akar pangkat 4): ∜(expr), ∜{expr}, ∜16, ∜x
        $text = preg_replace_callback('/∜\s*(?:\{([^}]+)\}|\(([^\)]+)\)|([0-9a-zA-Z]+))/u', function ($m) use ($protect) {
            $expr = trim($m[1] !== '' ? $m[1] : ($m[2] !== '' ? $m[2] : ($m[3] ?? '')));

            return $protect('$\\sqrt[4]{'.$expr.'}$');
        }, $text);

        // ∛ (akar pangkat 3): ∛(expr), ∛{expr}, ∛27, ∛x
        $text = preg_replace_callback('/∛\s*(?:\{([^}]+)\}|\(([^\)]+)\)|([0-9a-zA-Z]+))/u', function ($m) use ($protect) {
            $expr = trim($m[1] !== '' ? $m[1] : ($m[2] !== '' ? $m[2] : ($m[3] ?? '')));

            return $protect('$\\sqrt[3]{'.$expr.'}$');
        }, $text);

        // √ (akar kuadrat): √(expr), √{expr}, √144, √x
        $text = preg_replace_callback('/√\s*(?:\{([^}]+)\}|\(([^\)]+)\)|([0-9a-zA-Z]+))/u', function ($m) use ($protect) {
            $expr = trim($m[1] !== '' ? $m[1] : ($m[2] !== '' ? $m[2] : ($m[3] ?? '')));

            return $protect('$\\sqrt{'.$expr.'}$');
        }, $text);

        // 8. Tangani makro LaTeX matematika terbuka yang belum terbungkus $...$
        // Termasuk akar pangkat (\sqrt[n]{x}), pecahan (\frac, \dfrac), binomial, integral, limit, dan matriks
        $latexPatterns = [
            '/(\\\\sqrt\[[^\]]+\]\{[^{}]+\})/u',
            '/(\\\\sqrt\{[^{}]+\})/u',
            '/(\\\\(?:frac|dfrac|binom)\{[^{}]+\}\{[^{}]+\})/u',
            '/(\\\\begin\{(?:matrix|pmatrix|bmatrix|vmatrix|Vmatrix|cases)\}[\s\S]*?\\\\end\{(?:matrix|pmatrix|bmatrix|vmatrix|Vmatrix|cases)\})/u',
            '/(\\\\(?:sum|int|iint|iiint|oint|prod|coprod|lim)(?:_\{[^{}]+\}|_[0-9a-zA-Z]+)?(?:\^\{[^{}]+\}|\^[0-9a-zA-Z]+)?(?:\s*\{[^{}]+\}|\s+[a-zA-Z0-9]+)?)/u',
        ];

        foreach ($latexPatterns as $pattern) {
            $text = preg_replace_callback($pattern, function ($m) use ($protect) {
                return $protect('$'.trim($m[1]).'$');
            }, $text);
        }

        // 9. Kembalikan semua token yang dilindungi
        if (! empty($placeholders)) {
            $text = strtr($text, $placeholders);
        }

        return $text;
    }

    protected function extractImagesFromElement(
        \DOMNode $element,
        \DOMXPath $xpath,
        ZipArchive $zip,
        array $relationships,
        array &$imageCache
    ): ?string {
        $markdowns = [];

        // 1. DrawingML blip nodes (excluding mc:Fallback)
        $blipNodes = $xpath->query(
            './/a:blip[not(ancestor::mc:Fallback)] | .//*[local-name()="blip"][not(ancestor::*[local-name()="Fallback"])]',
            $element
        );
        foreach ($blipNodes as $blip) {
            $relId = $blip->getAttributeNS('http://schemas.openxmlformats.org/officeDocument/2006/relationships', 'embed')
                ?: $blip->getAttributeNS('http://schemas.openxmlformats.org/officeDocument/2006/relationships', 'link')
                ?: $blip->getAttribute('r:embed')
                ?: $blip->getAttribute('r:link')
                ?: $blip->getAttribute('embed')
                ?: $blip->getAttribute('link');

            if (! $relId) {
                continue;
            }

            $alt = 'Gambar Soal';
            $docPrNodes = $xpath->query('ancestor::w:drawing//wp:docPr | .//wp:docPr | .//*[local-name()="docPr"]', $blip);
            if ($docPrNodes->length > 0) {
                $docPr = $docPrNodes->item(0);
                $descr = $docPr->getAttribute('descr') ?: $docPr->getAttribute('title') ?: $docPr->getAttribute('name');
                if (! empty($descr) && ! preg_match('/^(?:Picture|Image)\s*\d+$/i', $descr)) {
                    $alt = $descr;
                }
            }

            $url = $this->resolveAndUploadImage($relId, $relationships, $zip, $imageCache);
            if ($url) {
                $cleanAlt = trim(preg_replace('/[\[\]\(\)\r\n]+/', ' ', $alt));
                $markdowns[] = "![{$cleanAlt}]({$url})";
            }
        }

        // 2. VML imagedata nodes (excluding mc:Fallback and only if no DrawingML blip found)
        if (empty($markdowns)) {
            $vmlNodes = $xpath->query(
                './/v:imagedata[not(ancestor::mc:Fallback)] | .//*[local-name()="imagedata"][not(ancestor::*[local-name()="Fallback"])]',
                $element
            );
            foreach ($vmlNodes as $vml) {
                $relId = $vml->getAttributeNS('http://schemas.openxmlformats.org/officeDocument/2006/relationships', 'id')
                    ?: $vml->getAttribute('r:id')
                    ?: $vml->getAttribute('id')
                    ?: $vml->getAttribute('o:relid');

                if (! $relId) {
                    continue;
                }

                $alt = $vml->getAttribute('o:title') ?: $vml->getAttribute('title') ?: 'Gambar Soal';
                $url = $this->resolveAndUploadImage($relId, $relationships, $zip, $imageCache);
                if ($url) {
                    $cleanAlt = trim(preg_replace('/[\[\]\(\)\r\n]+/', ' ', $alt));
                    $markdowns[] = "![{$cleanAlt}]({$url})";
                }
            }
        }

        return ! empty($markdowns) ? implode("\n", $markdowns) : null;
    }

    /**
     * Build structured items (standalone questions and narrative groups) from paragraph strings.
     * Supports ALL question types:
     * - mcq_single: Pilihan Ganda Biasa
     * - mcq_weighted: Pilihan Ganda Berbobot / TKP (Format 2: A. [5] Opsi...)
     * - mcq_multiple: Pilihan Ganda Kompleks (KUNCI: A, C)
     * - binary_matrix: Tabel Dikotomi / Analisis Pernyataan Benar-Salah
     * - matching: Menjodohkan (Premis -> Pasangan)
     * - ordering: Mengurutkan
     * - short_answer: Isian Singkat
     * - essay: Uraian / Esai
     */
    protected function buildStructuredItems(array $paragraphs): array
    {
        $items = [];
        $inNarrative = false;
        $inExplanation = false;
        $preambleLines = [];
        $currentNarrative = [
            'title' => '',
            'content' => [],
            'questions' => [],
        ];

        $currentQuestion = null;
        $pendingType = null;

        $saveCurrentQuestion = function () use (&$items, &$currentNarrative, &$currentQuestion, &$inNarrative, &$inExplanation) {
            $inExplanation = false;
            if (! $currentQuestion) {
                return;
            }

            $type = $currentQuestion['type'] ?? 'mcq_single';
            $points = (float) ($currentQuestion['points'] ?? 1.0);
            $options = $currentQuestion['options'] ?? [];
            $settings = $currentQuestion['settings'] ?? [
                'labels' => ['Benar', 'Salah'],
            ];

            // 1. Check if MCQ options contain weighted scores (Format 2: A. [5] ...)
            $hasWeightedScores = false;
            $maxScore = 0.0;
            foreach ($options as $opt) {
                if (isset($opt['score']) && (float) $opt['score'] > 0.0) {
                    $hasWeightedScores = true;
                    if ((float) $opt['score'] > $maxScore) {
                        $maxScore = (float) $opt['score'];
                    }
                }
            }

            if ($type === 'mcq_weighted' || ($hasWeightedScores && in_array($type, ['mcq_single', 'mcq_weighted'], true))) {
                $type = 'mcq_weighted';
                // If points not explicitly specified via BOBOT, use max option score
                if (! $currentQuestion['has_explicit_points'] && $maxScore > 0) {
                    $points = $maxScore;
                }
                foreach ($options as &$opt) {
                    $scoreVal = (float) ($opt['score'] ?? 0.0);
                    $opt['score'] = $scoreVal;
                    $opt['is_correct'] = $scoreVal > 0.0;
                }
                unset($opt);
            } elseif ($type === 'mcq_multiple') {
                // Multi-answer
                $correctKeys = (array) ($currentQuestion['correct_keys'] ?? []);
                foreach ($options as &$opt) {
                    $opt['is_correct'] = in_array(strtoupper($opt['label'] ?? ''), $correctKeys, true);
                    $opt['score'] = $opt['is_correct'] ? $points : 0.0;
                }
                unset($opt);
            } elseif ($type === 'mcq_single') {
                $letters = ['A', 'B', 'C', 'D', 'E', 'F'];
                $correctKey = strtoupper((string) ($currentQuestion['correct_key'] ?? 'A'));
                foreach ($options as $idx => &$opt) {
                    if (empty($opt['label'])) {
                        $opt['label'] = $letters[$idx] ?? (string) ($idx + 1);
                    }
                    $opt['is_correct'] = (strtoupper($opt['label']) === $correctKey);
                    $opt['score'] = $opt['is_correct'] ? $points : 0.0;
                }
                unset($opt);
            } elseif ($type === 'binary_matrix') {
                // Statements
                $colLabels = $settings['labels'] ?? ['Benar', 'Salah'];
                foreach ($options as $idx => &$opt) {
                    $opt['label'] = (string) ($idx + 1);
                    $opt['is_correct'] = true;
                    $opt['score'] = 1.0;
                    if (empty($opt['match_key'])) {
                        $opt['match_key'] = $colLabels[0];
                    }
                }
                unset($opt);
            } elseif ($type === 'matching') {
                // Matching pairs
                foreach ($options as $idx => &$opt) {
                    $opt['label'] = (string) ($idx + 1);
                    $opt['is_correct'] = true;
                    $opt['score'] = 1.0;
                }
                unset($opt);
            } elseif ($type === 'ordering') {
                foreach ($options as $idx => &$opt) {
                    $opt['label'] = (string) ($idx + 1);
                    $opt['order'] = $idx + 1;
                    $opt['is_correct'] = true;
                    $opt['score'] = 1.0;
                }
                unset($opt);
            } elseif ($type === 'short_answer') {
                if (empty($options) && ! empty($currentQuestion['correct_key'])) {
                    $keys = preg_split('/[;,]/', (string) $currentQuestion['correct_key']);
                    foreach ($keys as $kIdx => $kVal) {
                        $kTrim = trim($kVal);
                        if ($kTrim !== '') {
                            $options[] = [
                                'id' => 'opt_imp_'.uniqid().'_'.$kIdx,
                                'label' => (string) ($kIdx + 1),
                                'option_text' => $kTrim,
                                'is_correct' => true,
                                'score' => $points,
                                'match_key' => null,
                            ];
                        }
                    }
                }
            } elseif ($type === 'essay') {
                $options = [];
            }

            $questionItem = [
                'id' => 'q_imp_'.uniqid(),
                'is_group' => false,
                'type' => $type,
                'prompt' => $currentQuestion['prompt'],
                'explanation' => $currentQuestion['explanation'],
                'points' => $points,
                'settings' => $settings,
                'options' => $options,
            ];

            if ($inNarrative) {
                $currentNarrative['questions'][] = $questionItem;
            } else {
                $items[] = $questionItem;
            }

            $currentQuestion = null;
        };

        $saveNarrativeGroup = function () use (&$items, &$currentNarrative) {
            if (! empty($currentNarrative['questions']) || ! empty($currentNarrative['content'])) {
                $items[] = [
                    'id' => 'grp_imp_'.uniqid(),
                    'is_group' => true,
                    'title' => $currentNarrative['title'] ?: 'Stimulus Narasi '.(count($items) + 1),
                    'stimulus_type' => 'text',
                    'stimulus_content' => implode("\n\n", $currentNarrative['content']),
                    'questions' => $currentNarrative['questions'],
                ];
                $currentNarrative = [
                    'title' => '',
                    'content' => [],
                    'questions' => [],
                ];
            }
        };

        foreach ($paragraphs as $line) {
            $upperLine = strtoupper($line);
            $cleanLine = trim(str_replace(['**', '*', '<u>', '</u>'], '', $line));
            $cleanUpper = strtoupper($cleanLine);

            // Skip decorative divider/heading comments: e.g. "--- CONTOH 1: ... ---" or "================="
            if (preg_match('/^[-=~_*]{3,}/', $cleanLine) || preg_match('/^---\s*CONTOH/i', $cleanLine)) {
                continue;
            }

            // Standalone Question Marker
            if (
                str_contains($cleanUpper, '[SOAL TUNGGAL]') ||
                str_contains($cleanUpper, '[SOAL BIASA]') ||
                str_contains($cleanUpper, '[SOAL MANDIRI]') ||
                str_contains($cleanUpper, '[SOAL REGULER]') ||
                str_contains($cleanUpper, '[STANDALONE]') ||
                str_contains($cleanUpper, '[NON-STIMULUS]') ||
                str_contains($cleanUpper, '[TANPA STIMULUS]')
            ) {
                $saveCurrentQuestion();
                if ($inNarrative) {
                    $saveNarrativeGroup();
                    $inNarrative = false;
                }

                $strippedLine = preg_replace('/\[(?:SOAL TUNGGAL|SOAL BIASA|SOAL MANDIRI|SOAL REGULER|STANDALONE|NON-STIMULUS|TANPA STIMULUS)\]/i', '', $line);
                $cleanLine = trim(str_replace(['**', '*', '<u>', '</u>'], '', $strippedLine));
                if (trim($cleanLine) === '') {
                    continue;
                }
                $line = trim($strippedLine);
                $cleanUpper = strtoupper($cleanLine);
            }

            // 1. Narrative Stimulus Start Tag
            if (
                str_contains($cleanUpper, '[NARASI]') ||
                str_contains($cleanUpper, '[STIMULUS]') ||
                str_contains($cleanUpper, '[WACANA]') ||
                str_contains($cleanUpper, '[TEKS BACAAN]')
            ) {
                $saveCurrentQuestion();
                if ($inNarrative) {
                    $saveNarrativeGroup();
                }
                $inNarrative = true;
                $currentNarrative = [
                    'title' => 'Stimulus Narasi '.(count($items) + 1),
                    'content' => [],
                    'questions' => [],
                ];

                continue;
            }

            // 2. Narrative Stimulus End Tag
            if (
                str_contains($cleanUpper, '[AKHIR NARASI]') ||
                str_contains($cleanUpper, '[/NARASI]') ||
                str_contains($cleanUpper, '[AKHIR STIMULUS]') ||
                str_contains($cleanUpper, '[/STIMULUS]') ||
                str_contains($cleanUpper, '[SELESAI NARASI]') ||
                str_contains($cleanUpper, '[AKHIR WACANA]')
            ) {
                $saveCurrentQuestion();
                if (! empty($currentNarrative['questions'])) {
                    $saveNarrativeGroup();
                    $inNarrative = false;
                }

                continue;
            }

            // Check for Explicit Question Type tags before or inside question
            if (preg_match('/^(?:\[|\b)(?:TIPE\s*:\s*)?(TKP|BERBOBOT|PILIHAN GANDA BERBOBOT)(?:\]|\b)/i', $cleanUpper)) {
                $saveCurrentQuestion();
                $pendingType = 'mcq_weighted';

                continue;
            }
            if (preg_match('/^(?:\[|\b)(?:TIPE\s*:\s*)?(KOMPLEKS|PILIHAN GANDA KOMPLEKS|MULTIPLE ANSWER)(?:\]|\b)/i', $cleanUpper)) {
                $saveCurrentQuestion();
                $pendingType = 'mcq_multiple';

                continue;
            }
            if (preg_match('/^(?:\[|\b)(?:TIPE\s*:\s*)?(BENAR[- ]SALAH|BENAR SALAH|DIKOTOMI|PERNYATAAN|ANALISIS PERNYATAAN)(?:\]|\b)/i', $cleanUpper)) {
                $saveCurrentQuestion();
                $pendingType = 'binary_matrix';

                continue;
            }
            if (preg_match('/^(?:\[|\b)(?:TIPE\s*:\s*)?(MENJODOHKAN|JODOHKAN|MATCHING)(?:\]|\b)/i', $cleanUpper)) {
                $saveCurrentQuestion();
                $pendingType = 'matching';

                continue;
            }
            if (preg_match('/^(?:\[|\b)(?:TIPE\s*:\s*)?(MENGURUTKAN|URUTKAN|SEQUENCING|ORDERING)(?:\]|\b)/i', $cleanUpper)) {
                $saveCurrentQuestion();
                $pendingType = 'ordering';

                continue;
            }
            if (preg_match('/^(?:\[|\b)(?:TIPE\s*:\s*)?(ISIAN|ISIAN SINGKAT|SHORT ANSWER|NUMERIK)(?:\]|\b)/i', $cleanUpper)) {
                $saveCurrentQuestion();
                $pendingType = 'short_answer';

                continue;
            }
            if (preg_match('/^(?:\[|\b)(?:TIPE\s*:\s*)?(ESAI|ESSAY|URAIAN)(?:\]|\b)/i', $cleanUpper)) {
                $saveCurrentQuestion();
                $pendingType = 'essay';

                continue;
            }

            // Binary Matrix Column Configuration: "KOLOM: Benar | Salah" or "KOLOM: Ya | Tidak"
            if ($currentQuestion && preg_match('/^KOLOM\s*:\s*([^|]+)\|\s*(.+)$/i', $cleanLine, $mCols)) {
                $currentQuestion['settings']['labels'] = [trim($mCols[1]), trim($mCols[2])];
                $currentQuestion['type'] = 'binary_matrix';

                continue;
            }

            // Correct Key Check: "KUNCI: A" or "KUNCI: A, C" or "KUNCI: Jantung"
            if ($currentQuestion && preg_match('/^(?:KUNCI(?:\s*JAWABAN)?|JAWABAN)\s*:\s*(.*)$/i', $cleanLine, $matchesKey)) {
                $rawKey = trim($matchesKey[1]);

                preg_match_all('/\b([A-E])\b/i', $rawKey, $letterMatches);
                $foundLetters = array_unique(array_map('strtoupper', $letterMatches[1] ?? []));

                if (count($foundLetters) > 1) {
                    $currentQuestion['type'] = 'mcq_multiple';
                    $currentQuestion['correct_keys'] = array_values($foundLetters);
                } elseif (count($foundLetters) === 1 && empty($currentQuestion['options']) && $currentQuestion['type'] === 'short_answer') {
                    $currentQuestion['correct_key'] = $rawKey;
                } elseif (count($foundLetters) === 1) {
                    $currentQuestion['correct_key'] = $foundLetters[0];
                    $currentQuestion['correct_keys'] = [$foundLetters[0]];
                } else {
                    $currentQuestion['correct_key'] = $rawKey;
                    if ($currentQuestion['type'] === 'mcq_single' && empty($currentQuestion['options'])) {
                        $currentQuestion['type'] = 'short_answer';
                    }
                }

                continue;
            }

            // Points / Bobot Check: "BOBOT: 2.5" or "POIN: 3.0"
            if ($currentQuestion && preg_match('/^(?:BOBOT|POIN|POINT|SKOR)\s*:\s*([\d\.]+)/i', $cleanLine, $matches)) {
                $currentQuestion['points'] = (float) $matches[1];
                $currentQuestion['has_explicit_points'] = true;

                continue;
            }

            // Explanation / Pembahasan: "PEMBAHASAN: ..." or "RUBRIK: ..."
            if ($currentQuestion && preg_match('/^(?:PEMBAHASAN|PENJELASAN|KETERANGAN|RUBRIK)\s*:\s*(.*)$/i', $cleanLine, $matchesClean)) {
                preg_match('/^(?:(?:\*\*|\*|<u>)?(?:PEMBAHASAN|PENJELASAN|KETERANGAN|RUBRIK)\s*:(?:\*\*|\*|<\/u>)?\s*)(.*)$/i', $line, $matchesLine);
                $currentQuestion['explanation'] = isset($matchesLine[1]) && trim($matchesLine[1]) !== '' ? trim($matchesLine[1]) : trim($matchesClean[1]);
                $inExplanation = true;

                continue;
            }

            // Option Check for Binary Matrix statements:
            // "1) Pernyataan... [BENAR]" or "1. Pernyataan... [SALAH]" or "- Pernyataan... [BENAR]"
            if ($currentQuestion && ($currentQuestion['type'] === 'binary_matrix' || preg_match('/\[(?:BENAR|SALAH|YA|TIDAK|SESUAI|TIDAK SESUAI)\]\s*$/i', $cleanLine))) {
                if (preg_match('/^(?:(?:\d+|[A-Z])[\.\)]|-|\*)\s*(.*?)\s*\[(BENAR|SALAH|YA|TIDAK|SESUAI|TIDAK SESUAI)\]\s*$/i', $cleanLine, $mBinary)) {
                    $currentQuestion['type'] = 'binary_matrix';
                    $stmtText = trim($mBinary[1]);
                    $stmtKey = ucfirst(strtolower(trim($mBinary[2])));

                    $idx = count($currentQuestion['options']) + 1;
                    $currentQuestion['options'][] = [
                        'id' => 'stmt_imp_'.uniqid().'_'.$idx,
                        'label' => (string) $idx,
                        'option_text' => $stmtText,
                        'is_correct' => true,
                        'score' => 1.0,
                        'match_key' => $stmtKey,
                    ];

                    continue;
                }
            }

            // Option Check for Matching pairs:
            // "1) Premis Kiri -> Pasangan Kanan" or "1. Premis => Pasangan"
            if ($currentQuestion && ($currentQuestion['type'] === 'matching' || preg_match('/(?:->|=>|==>|\bpasangan\s*:)\s*(.+)$/i', $cleanLine))) {
                if (preg_match('/^(?:(?:\d+|[A-Z])[\.\)]|-|\*)\s*(.*?)\s*(?:->|=>|==>)\s*(.+)$/i', $cleanLine, $mPair)) {
                    $currentQuestion['type'] = 'matching';
                    $leftItem = trim($mPair[1]);
                    $rightItem = trim($mPair[2]);

                    $idx = count($currentQuestion['options']) + 1;
                    $currentQuestion['options'][] = [
                        'id' => 'pair_imp_'.uniqid().'_'.$idx,
                        'label' => (string) $idx,
                        'option_text' => $leftItem,
                        'is_correct' => true,
                        'score' => 1.0,
                        'match_key' => $rightItem,
                    ];

                    continue;
                }
            }

            // Option Check for MCQ:
            // "A. Opsi teks" or TKP Format 2: "A. [5] Opsi teks" or "A. (5) Opsi teks" or "A. [Skor: 5] Opsi teks"
            if ($currentQuestion && preg_match('/^([A-E])[\.\)]\s*(?:\[(\d+(?:\.\d+)?)\]|\((\d+(?:\.\d+)?)\)|\[(?:skor|bobot|poin)\s*:\s*(\d+(?:\.\d+)?)\])?\s*(.*)$/i', $cleanLine, $matchesOpt)) {
                $letter = strtoupper($matchesOpt[1]);
                $scoreCandidate = $matchesOpt[2] ?: ($matchesOpt[3] ?: ($matchesOpt[4] ?: null));

                preg_match('/^(?:(?:\*\*|\*|<u>)?[A-E][\.\)](?:\*\*|\*|<\/u>)?\s*)(?:\[(?:\d+(?:\.\d+)?|(?:skor|bobot|poin)\s*:\s*\d+(?:\.\d+)?)\]|\(\d+(?:\.\d+)?\))?\s*(.*)$/i', $line, $matchesLine);
                $optText = isset($matchesLine[1]) && trim($matchesLine[1]) !== '' ? trim($matchesLine[1]) : trim($matchesOpt[5]);

                $optScore = 0.0;
                if ($scoreCandidate !== null) {
                    $optScore = (float) $scoreCandidate;
                    $currentQuestion['type'] = 'mcq_weighted';
                }

                $currentQuestion['options'][] = [
                    'id' => 'opt_imp_'.uniqid().'_'.$letter,
                    'label' => $letter,
                    'option_text' => $optText,
                    'is_correct' => ($optScore > 0.0),
                    'score' => $optScore,
                    'match_key' => null,
                ];

                continue;
            }

            // Option Check for Ordering steps:
            // When current question is ordering and line is a sequence step
            if ($currentQuestion && $currentQuestion['type'] === 'ordering') {
                if (preg_match('/^(?:(?:\d+|[A-Z])[\.\)]|-|\*)\s*(.+)$/i', $cleanLine, $mOrder)) {
                    $orderText = trim($mOrder[1]);
                    $idx = count($currentQuestion['options']) + 1;
                    $currentQuestion['options'][] = [
                        'id' => 'ord_imp_'.uniqid().'_'.$idx,
                        'label' => (string) $idx,
                        'option_text' => $orderText,
                        'is_correct' => true,
                        'score' => 1.0,
                        'order' => $idx,
                    ];

                    continue;
                }
            }

            // If in narrative but not question yet, check for Title / Teks
            if ($inNarrative && ! $currentQuestion && ! preg_match('/^(?:Soal\s*)?\d+[\.\)]/i', $cleanLine)) {
                if (preg_match('/^(?:JUDUL|TITLE)\s*:\s*(.*)$/i', $cleanLine, $m)) {
                    $currentNarrative['title'] = trim($m[1]);
                } elseif (preg_match('/^(?:TEKS|KONTEN|ISI)\s*:\s*(.*)$/i', $cleanLine, $m)) {
                    $currentNarrative['content'][] = trim($m[1]);
                } else {
                    $currentNarrative['content'][] = $line;
                }

                continue;
            }

            // Pre-question preamble (e.g. image placed right before question 1)
            if (! $currentQuestion && ! $inNarrative) {
                if (str_contains($line, '![')) {
                    $preambleLines[] = $line;

                    continue;
                }
            }

            // Question Prompt Check: "1. Teks soal..." or "1) Teks soal..." or "Soal 1. ..."
            if (preg_match('/^(?:Soal\s*)?(\d+)[\.\)]\s*(.*)$/i', $cleanLine, $matchesClean)) {
                $saveCurrentQuestion();
                $inExplanation = false;
                preg_match('/^(?:(?:\*\*|\*|<u>)?(?:Soal\s*)?\d+[\.\)](?:\*\*|\*|<\/u>)?\s*)(.*)$/i', $line, $matchesLine);
                $promptText = isset($matchesLine[1]) && trim($matchesLine[1]) !== '' ? trim($matchesLine[1]) : trim($matchesClean[2]);

                if (! empty($preambleLines)) {
                    $promptText = implode("\n", $preambleLines)."\n".$promptText;
                    $preambleLines = [];
                }

                $detectedType = $pendingType ?: 'mcq_single';

                // Check inline type tags in prompt: e.g. "1. [TKP] Anda melihat..." or "1. [ESAI] Jelaskan..."
                if (preg_match('/\[(TKP|BERBOBOT)\]/i', $promptText)) {
                    $detectedType = 'mcq_weighted';
                    $promptText = trim(preg_replace('/\[(TKP|BERBOBOT)\]/i', '', $promptText));
                } elseif (preg_match('/\[(KOMPLEKS)\]/i', $promptText)) {
                    $detectedType = 'mcq_multiple';
                    $promptText = trim(preg_replace('/\[(KOMPLEKS)\]/i', '', $promptText));
                } elseif (preg_match('/\[(BENAR[- ]SALAH|DIKOTOMI)\]/i', $promptText)) {
                    $detectedType = 'binary_matrix';
                    $promptText = trim(preg_replace('/\[(BENAR[- ]SALAH|DIKOTOMI)\]/i', '', $promptText));
                } elseif (preg_match('/\[(MENJODOHKAN)\]/i', $promptText)) {
                    $detectedType = 'matching';
                    $promptText = trim(preg_replace('/\[(MENJODOHKAN)\]/i', '', $promptText));
                } elseif (preg_match('/\[(MENGURUTKAN)\]/i', $promptText)) {
                    $detectedType = 'ordering';
                    $promptText = trim(preg_replace('/\[(MENGURUTKAN)\]/i', '', $promptText));
                } elseif (preg_match('/\[(ISIAN|ISIAN SINGKAT)\]/i', $promptText)) {
                    $detectedType = 'short_answer';
                    $promptText = trim(preg_replace('/\[(ISIAN|ISIAN SINGKAT)\]/i', '', $promptText));
                } elseif (preg_match('/\[(ESAI|URAIAN)\]/i', $promptText)) {
                    $detectedType = 'essay';
                    $promptText = trim(preg_replace('/\[(ESAI|URAIAN)\]/i', '', $promptText));
                }

                $currentQuestion = [
                    'number' => $matchesClean[1],
                    'type' => $detectedType,
                    'prompt' => $promptText,
                    'options' => [],
                    'correct_key' => 'A',
                    'correct_keys' => ['A'],
                    'points' => 1.0,
                    'has_explicit_points' => false,
                    'explanation' => '',
                    'settings' => [
                        'labels' => ['Benar', 'Salah'],
                    ],
                ];

                $pendingType = null;

                continue;
            }

            // Multiline continuation for prompt, explanation, or last option
            if ($currentQuestion) {
                if ($inExplanation) {
                    $currentQuestion['explanation'] .= "\n".$line;
                } elseif (empty($currentQuestion['options'])) {
                    $currentQuestion['prompt'] .= "\n".$line;
                } else {
                    $lastIdx = count($currentQuestion['options']) - 1;
                    if (isset($currentQuestion['options'][$lastIdx]['option_text'])) {
                        $currentQuestion['options'][$lastIdx]['option_text'] .= "\n".$line;
                    }
                }
            }
        }

        // Save last pending question
        $saveCurrentQuestion();

        if ($inNarrative) {
            $saveNarrativeGroup();
        }

        return $items;
    }

    /**
     * Generate a pristine .docx template with Bold, Italic, Underline, LaTeX formulas,
     * demonstrating ALL question types:
     * 1. Pilihan Ganda Tunggal Berbobot >= 2.0 (BOBOT: 2.5) dengan LaTeX
     * 2. Pilihan Ganda Berbobot / TKP (Format 2: A. [5] ..., B. [4] ...)
     * 3. Pilihan Ganda Kompleks (Multi-Answer KUNCI: A, C)
     * 4. Analisis Pernyataan / Matriks Benar-Salah (Tabel Dikotomi)
     * 5. Menjodohkan (Matching Pairs Premis -> Pasangan)
     * 6. Mengurutkan (Sequencing Langkah)
     * 7. Isian Singkat
     * 8. Uraian / Esai (BOBOT: 5.0)
     * 9. Soal Berstimulus Wacana / Narasi Literasi
     */
    public function generateTemplate(string $outputPath): string
    {
        $dir = dirname($outputPath);
        if (! file_exists($dir)) {
            @mkdir($dir, 0755, true);
        }
        if (file_exists($outputPath)) {
            @unlink($outputPath);
        }

        $zip = new ZipArchive;
        if ($zip->open($outputPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
            throw new \RuntimeException('Gagal membuat file template Word.');
        }

        // 1. [Content_Types].xml
        $contentTypes = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<Types xmlns="http://schemas.openxmlformats.org/package/2006/content-types">
    <Default Extension="rels" ContentType="application/vnd.openxmlformats-package.relationships+xml"/>
    <Default Extension="xml" ContentType="application/xml"/>
    <Override PartName="/word/document.xml" ContentType="application/vnd.openxmlformats-officedocument.wordprocessingml.document.main+xml"/>
</Types>';
        $zip->addFromString('[Content_Types].xml', $contentTypes);

        // 2. _rels/.rels
        $rels = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships">
    <Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/officeDocument" Target="word/document.xml"/>
</Relationships>';
        $zip->addFromString('_rels/.rels', $rels);

        // 3. word/document.xml with comprehensive examples of ALL question types
        $documentXml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<w:document xmlns:w="http://schemas.openxmlformats.org/wordprocessingml/2006/main">
    <w:body>
        <!-- Header Dokumen Template -->
        <w:p>
            <w:pPr><w:jc w:val="center"/></w:pPr>
            <w:r><w:rPr><w:b/><w:sz w:val="28"/><w:color w:val="1c7ed6"/></w:rPr><w:t>PANDUAN LENGKAP TEMPLATE IMPORT SOAL CBT ADZKIA</w:t></w:r>
        </w:p>
        <w:p>
            <w:r><w:rPr><w:i/><w:color w:val="555555"/></w:rPr><w:t>Mendukung seluruh tipe soal: Pilihan Ganda Tunggal (dengan bobot fleksibel), TKP / Pilihan Ganda Berbobot (Skor di Opsi), Pilihan Ganda Kompleks, Tabel Dikotomi Benar/Salah, Menjodohkan, Mengurutkan, Isian Singkat, Esai, serta Stimulus Narasi.</w:t></w:r>
        </w:p>
        <w:p><w:r><w:t></w:t></w:r></w:p>

        <!-- ======================================================== -->
        <!-- BAGIAN 1: PILIHAN GANDA TUNGGAL (BOBOT TINGGI >= 2.0)    -->
        <!-- ======================================================== -->
        <w:p><w:r><w:rPr><w:b/><w:color w:val="1c7ed6"/></w:rPr><w:t>--- CONTOH 1: PILIHAN GANDA TUNGGAL (BOBOT 2.5 DENGAN LATEX) ---</w:t></w:r></w:p>
        <w:p>
            <w:r><w:t>1. Diberikan </w:t></w:r>
            <w:r><w:rPr><w:u/></w:rPr><w:t>persamaan kuadrat</w:t></w:r>
            <w:r><w:t> </w:t></w:r>
            <w:r><w:rPr><w:b/></w:rPr><w:t>2x^2 - 7x + 3 = 0</w:t></w:r>
            <w:r><w:t>. Menggunakan rumus ABC </w:t></w:r>
            <w:r><w:t>$$x = \frac{-b \pm \sqrt{b^2 - 4ac}}{2a}$$</w:t></w:r>
            <w:r><w:t>, himpunan penyelesaian dari persamaan tersebut adalah ...</w:t></w:r>
        </w:p>
        <w:p><w:r><w:t>A. $x_1 = 3$ atau $x_2 = \frac{1}{2}$</w:t></w:r></w:p>
        <w:p><w:r><w:t>B. $x_1 = -3$ atau $x_2 = -\frac{1}{2}$</w:t></w:r></w:p>
        <w:p><w:r><w:t>C. $x_1 = 1$ atau $x_2 = 6$</w:t></w:r></w:p>
        <w:p><w:r><w:t>D. $x_1 = 2$ atau $x_2 = 5$</w:t></w:r></w:p>
        <w:p><w:r><w:rPr><w:b/></w:rPr><w:t>KUNCI: A</w:t></w:r></w:p>
        <w:p><w:r><w:rPr><w:b/><w:color w:val="d9480f"/></w:rPr><w:t>BOBOT: 2.5</w:t></w:r></w:p>
        <w:p>
            <w:r><w:t>PEMBAHASAN: Nilai D = 25. Maka $x = \frac{7 \pm 5}{4}$, sehingga $x_1 = 3$ dan $x_2 = \frac{1}{2}$.</w:t></w:r>
        </w:p>
        <w:p><w:r><w:t></w:t></w:r></w:p>

        <!-- ======================================================== -->
        <!-- BAGIAN 2: TKP / PILIHAN GANDA BERBOBOT (FORMAT 2: SKOR)  -->
        <!-- ======================================================== -->
        <w:p><w:r><w:rPr><w:b/><w:color w:val="2f9e44"/></w:rPr><w:t>--- CONTOH 2: TKP / PILIHAN GANDA BERBOBOT (SKOR DI AWAL OPSI) ---</w:t></w:r></w:p>
        <w:p><w:r><w:rPr><w:b/><w:color w:val="2f9e44"/></w:rPr><w:t>[TKP]</w:t></w:r></w:p>
        <w:p>
            <w:r><w:t>2. Anda sedang melayani antrean masyarakat yang cukup padat di loket pelayanan kantor. Tiba-tiba seorang rekan kerja Anda datang dan meminta untuk dilayani terlebih dahulu karena sedang terburu-buru. Sikap yang paling tepat Anda lakukan adalah ...</w:t></w:r>
        </w:p>
        <w:p><w:r><w:t>A. [5] Menolak secara santun dan ramah, serta memintanya mengambil nomor antrean sesuai prosedur demi menjaga keadilan bagi seluruh warga.</w:t></w:r></w:p>
        <w:p><w:r><w:t>B. [4] Menjelaskan bahwa sistem antrean bersifat digital dan otomatis terpantau sehingga tidak memungkinkan adanya pengistimewaan.</w:t></w:r></w:p>
        <w:p><w:r><w:t>C. [3] Memintanya menunggu hingga waktu istirahat kantor tiba agar bisa dibantu tanpa mengorbankan waktu antrean warga.</w:t></w:r></w:p>
        <w:p><w:r><w:t>D. [2] Membantu rekan kerja tersebut secara cepat setelah melayani warga yang sedang berada persis di depan loket.</w:t></w:r></w:p>
        <w:p><w:r><w:t>E. [1] Langsung mendahulukan rekan kerja tersebut karena merasa sungkan dan khawatir hubungan kerja menjadi canggung.</w:t></w:r></w:p>
        <w:p>
            <w:r><w:rPr><w:i/></w:rPr><w:t>PEMBAHASAN: Indikator Pelayanan Publik &amp; Integritas: Opsi A memiliki skor tertinggi (5) karena menjunjung tinggi asas keadilan, transparansi, dan profesionalitas kerja tanpa diskriminasi.</w:t></w:r>
        </w:p>
        <w:p><w:r><w:t></w:t></w:r></w:p>

        <!-- ======================================================== -->
        <!-- BAGIAN 3: PILIHAN GANDA KOMPLEKS (MULTIPLE ANSWER)       -->
        <!-- ======================================================== -->
        <w:p><w:r><w:rPr><w:b/><w:color w:val="7950f2"/></w:rPr><w:t>--- CONTOH 3: PILIHAN GANDA KOMPLEKS (JAWABAN BENAR LEBIH DARI SATU) ---</w:t></w:r></w:p>
        <w:p><w:r><w:rPr><w:b/><w:color w:val="7950f2"/></w:rPr><w:t>[KOMPLEKS]</w:t></w:r></w:p>
        <w:p>
            <w:r><w:t>3. Manakah dari sumber energi berikut yang tergolong ke dalam Energi Baru dan Terbarukan (EBT) ramah lingkungan? (Pilihlah semua jawaban yang benar)</w:t></w:r>
        </w:p>
        <w:p><w:r><w:t>A. Pembangkit Listrik Tenaga Surya (PLTS)</w:t></w:r></w:p>
        <w:p><w:r><w:t>B. Pembangkit Listrik Tenaga Uap Batubara (PLTU)</w:t></w:r></w:p>
        <w:p><w:r><w:t>C. Pembangkit Listrik Tenaga Bayu/Angin (PLTB)</w:t></w:r></w:p>
        <w:p><w:r><w:t>D. Pembangkit Berbahan Bakar Minyak Diesel</w:t></w:r></w:p>
        <w:p><w:r><w:rPr><w:b/></w:rPr><w:t>KUNCI: A, C</w:t></w:r></w:p>
        <w:p><w:r><w:rPr><w:b/><w:color w:val="d9480f"/></w:rPr><w:t>BOBOT: 2.0</w:t></w:r></w:p>
        <w:p>
            <w:r><w:rPr><w:i/></w:rPr><w:t>PEMBAHASAN: Energi surya (A) dan bayu/angin (C) merupakan energi terbarukan tanpa emisi karbon langsung, sedangkan batubara dan diesel adalah bahan bakar fosil.</w:t></w:r>
        </w:p>
        <w:p><w:r><w:t></w:t></w:r></w:p>

        <!-- ======================================================== -->
        <!-- BAGIAN 4: TABEL DIKOTOMI (ANALISIS BENAR / SALAH)        -->
        <!-- ======================================================== -->
        <w:p><w:r><w:rPr><w:b/><w:color w:val="e67700"/></w:rPr><w:t>--- CONTOH 4: TABEL DIKOTOMI (BENAR / SALAH) ---</w:t></w:r></w:p>
        <w:p><w:r><w:rPr><w:b/><w:color w:val="e67700"/></w:rPr><w:t>[BENAR SALAH]</w:t></w:r></w:p>
        <w:p>
            <w:r><w:t>4. Analisislah pernyataan-pernyataan berikut mengenai biologi sel dan fotosintesis pada tumbuhan hijau!</w:t></w:r>
        </w:p>
        <w:p><w:r><w:rPr><w:b/></w:rPr><w:t>KOLOM: Benar | Salah</w:t></w:r></w:p>
        <w:p><w:r><w:t>1) Fotosintesis menghasilkan senyawa glukosa dan melepaskan gas oksigen ke atmosfer [BENAR]</w:t></w:r></w:p>
        <w:p><w:r><w:t>2) Reaksi terang fotosintesis berlangsung di dalam stroma kloroplas tanpa bantuan cahaya [SALAH]</w:t></w:r></w:p>
        <w:p><w:r><w:t>3) Klorofil merupakan pigmen hijau daun penyerap spektrum cahaya matahari [BENAR]</w:t></w:r></w:p>
        <w:p><w:r><w:rPr><w:b/><w:color w:val="d9480f"/></w:rPr><w:t>BOBOT: 3.0</w:t></w:r></w:p>
        <w:p><w:r><w:t></w:t></w:r></w:p>

        <!-- ======================================================== -->
        <!-- BAGIAN 5: MENJODOHKAN (MATCHING PAIRS)                   -->
        <!-- ======================================================== -->
        <w:p><w:r><w:rPr><w:b/><w:color w:val="0ca678"/></w:rPr><w:t>--- CONTOH 5: MENJODOHKAN (PREMIS ↔ PASANGAN) ---</w:t></w:r></w:p>
        <w:p><w:r><w:rPr><w:b/><w:color w:val="0ca678"/></w:rPr><w:t>[MENJODOHKAN]</w:t></w:r></w:p>
        <w:p>
            <w:r><w:t>5. Pasangkanlah konsep organisasi internasional berikut dengan lokasi markas besarnya!</w:t></w:r>
        </w:p>
        <w:p><w:r><w:t>1) Perserikatan Bangsa-Bangsa (PBB) -> New York, Amerika Serikat</w:t></w:r></w:p>
        <w:p><w:r><w:t>2) Organisasi Kesehatan Dunia (WHO) -> Jenewa, Swiss</w:t></w:r></w:p>
        <w:p><w:r><w:t>3) Sekretariat Jenderal ASEAN -> Jakarta, Indonesia</w:t></w:r></w:p>
        <w:p><w:r><w:t>4) UNESCO (Pendidikan &amp; Budaya) -> Paris, Prancis</w:t></w:r></w:p>
        <w:p><w:r><w:rPr><w:b/><w:color w:val="d9480f"/></w:rPr><w:t>BOBOT: 4.0</w:t></w:r></w:p>
        <w:p><w:r><w:t></w:t></w:r></w:p>

        <!-- ======================================================== -->
        <!-- BAGIAN 6: MENGURUTKAN TAHAPAN (ORDERING / SEQUENCING)   -->
        <!-- ======================================================== -->
        <w:p><w:r><w:rPr><w:b/><w:color w:val="22b8cf"/></w:rPr><w:t>--- CONTOH 6: MENGURUTKAN TAHAPAN PROSES ---</w:t></w:r></w:p>
        <w:p><w:r><w:rPr><w:b/><w:color w:val="22b8cf"/></w:rPr><w:t>[MENGURUTKAN]</w:t></w:r></w:p>
        <w:p>
            <w:r><w:t>6. Urutkan tahapan metode ilmiah berikut mulai dari langkah paling awal hingga perumusan kesimpulan!</w:t></w:r>
        </w:p>
        <w:p><w:r><w:t>1) Merumuskan masalah dan pertanyaan penelitian</w:t></w:r></w:p>
        <w:p><w:r><w:t>2) Mengumpulkan data melalui observasi awal</w:t></w:r></w:p>
        <w:p><w:r><w:t>3) Menyusun hipotesis ilmiah</w:t></w:r></w:p>
        <w:p><w:r><w:t>4) Melakukan eksperimen atau pengujian terukur</w:t></w:r></w:p>
        <w:p><w:r><w:t>5) Menganalisis data dan menarik kesimpulan</w:t></w:r></w:p>
        <w:p><w:r><w:rPr><w:b/><w:color w:val="d9480f"/></w:rPr><w:t>BOBOT: 3.0</w:t></w:r></w:p>
        <w:p><w:r><w:t></w:t></w:r></w:p>

        <!-- ======================================================== -->
        <!-- BAGIAN 7: ISIAN SINGKAT / NUMERIK                        -->
        <!-- ======================================================== -->
        <w:p><w:r><w:rPr><w:b/><w:color w:val="ae3ec9"/></w:rPr><w:t>--- CONTOH 7: ISIAN SINGKAT / NUMERIK ---</w:t></w:r></w:p>
        <w:p><w:r><w:rPr><w:b/><w:color w:val="ae3ec9"/></w:rPr><w:t>[ISIAN]</w:t></w:r></w:p>
        <w:p>
            <w:r><w:t>7. Organ peredaran darah manusia yang berfungsi utama memompa darah beroksigen ke seluruh jaringan tubuh adalah ...</w:t></w:r>
        </w:p>
        <w:p><w:r><w:rPr><w:b/></w:rPr><w:t>KUNCI: Jantung</w:t></w:r></w:p>
        <w:p><w:r><w:rPr><w:b/><w:color w:val="d9480f"/></w:rPr><w:t>BOBOT: 2.0</w:t></w:r></w:p>
        <w:p>
            <w:r><w:rPr><w:i/></w:rPr><w:t>PEMBAHASAN: Jantung memompa darah melalui bilik kiri ke aorta menuju seluruh tubuh.</w:t></w:r>
        </w:p>
        <w:p><w:r><w:t></w:t></w:r></w:p>

        <!-- ======================================================== -->
        <!-- BAGIAN 8: URAIAN / ESAI (BOBOT TINGGI 5.0)               -->
        <!-- ======================================================== -->
        <w:p><w:r><w:rPr><w:b/><w:color w:val="d6336c"/></w:rPr><w:t>--- CONTOH 8: SOAL URAIAN / ESAI (BOBOT 5.0) ---</w:t></w:r></w:p>
        <w:p><w:r><w:rPr><w:b/><w:color w:val="d6336c"/></w:rPr><w:t>[ESAI]</w:t></w:r></w:p>
        <w:p>
            <w:r><w:t>8. Jelaskan 3 faktor utama pemicu pemanasan global (global warming) serta uraikan langkah mitigasi nyata yang dapat diterapkan di lingkungan sekolah!</w:t></w:r>
        </w:p>
        <w:p><w:r><w:rPr><w:b/><w:color w:val="d9480f"/></w:rPr><w:t>BOBOT: 5.0</w:t></w:r></w:p>
        <w:p>
            <w:r><w:rPr><w:i/></w:rPr><w:t>PEMBAHASAN: Rubrik penilaian: 1. Penjelasan emisi gas rumah kaca, 2. Deforestasi/alih fungsi lahan, 3. Konsumsi energi fosil tak terkendali, 4. Mitigasi sekolah (hemat listrik, tanam pohon, pilah sampah organik/anorganik).</w:t></w:r>
        </w:p>
        <w:p><w:r><w:t></w:t></w:r></w:p>

        <!-- ======================================================== -->
        <!-- BAGIAN 9: SOAL BERSTIMULUS NARASI / WACANA LITERASI      -->
        <!-- ======================================================== -->
        <w:p><w:r><w:rPr><w:b/><w:color w:val="1098ad"/></w:rPr><w:t>--- CONTOH 9: SOAL DENGAN STIMULUS WACANA NARASI ---</w:t></w:r></w:p>
        <w:p><w:r><w:rPr><w:b/><w:color w:val="1098ad"/></w:rPr><w:t>[STIMULUS]</w:t></w:r></w:p>
        <w:p><w:r><w:rPr><w:b/></w:rPr><w:t>Judul: Konservasi Segitiga Terumbu Karang Nusantara</w:t></w:r></w:p>
        <w:p>
            <w:r><w:t>Teks: Perairan Indonesia merupakan pusat dari Segitiga Terumbu Karang (Coral Triangle) dunia yang menopang ribuan spesies biota laut langka. Ancaman penangkapan ikan dengan bom dan pemutihan karang akibat kenaikan suhu air laut menuntut upaya perlindungan terpadu dari pemerintah dan masyarakat pesisir.</w:t></w:r>
        </w:p>
        <w:p><w:r><w:rPr><w:b/><w:color w:val="1098ad"/></w:rPr><w:t>[AKHIR NARASI]</w:t></w:r></w:p>
        <w:p><w:r><w:t></w:t></w:r></w:p>

        <!-- Anak Soal 9: Pilihan Ganda dari Wacana -->
        <w:p>
            <w:r><w:t>9. Wilayah perairan Indonesia yang memiliki keanekaragaman terumbu karang tertinggi di dunia dikenal dengan julukan ...</w:t></w:r>
        </w:p>
        <w:p><w:r><w:t>A. Coral Triangle (Segitiga Karang Dunia)</w:t></w:r></w:p>
        <w:p><w:r><w:t>B. Ring of Fire (Cincin Api Pasifik)</w:t></w:r></w:p>
        <w:p><w:r><w:t>C. Mariana Trench</w:t></w:r></w:p>
        <w:p><w:r><w:t>D. Great Barrier Reef</w:t></w:r></w:p>
        <w:p><w:r><w:rPr><w:b/></w:rPr><w:t>KUNCI: A</w:t></w:r></w:p>
        <w:p><w:r><w:rPr><w:b/><w:color w:val="d9480f"/></w:rPr><w:t>BOBOT: 2.0</w:t></w:r></w:p>
        <w:p><w:r><w:t></w:t></w:r></w:p>

        <!-- Anak Soal 10: Pilihan Ganda Kompleks dari Wacana -->
        <w:p><w:r><w:rPr><w:b/><w:color w:val="7950f2"/></w:rPr><w:t>[KOMPLEKS]</w:t></w:r></w:p>
        <w:p>
            <w:r><w:t>10. Berdasarkan teks narasi di atas, apa saja ancaman yang membahayakan kelestarian terumbu karang? (Pilih dua)</w:t></w:r>
        </w:p>
        <w:p><w:r><w:t>A. Penangkapan ikan dengan bahan peledak (bom ikan)</w:t></w:r></w:p>
        <w:p><w:r><w:t>B. Pemutihan karang akibat pemanasan suhu air laut</w:t></w:r></w:p>
        <w:p><w:r><w:t>C. Budidaya rumput laut ramah lingkungan</w:t></w:r></w:p>
        <w:p><w:r><w:t>D. Penelitian ilmiah biota bawah laut</w:t></w:r></w:p>
        <w:p><w:r><w:rPr><w:b/></w:rPr><w:t>KUNCI: A, B</w:t></w:r></w:p>
        <w:p><w:r><w:rPr><w:b/><w:color w:val="d9480f"/></w:rPr><w:t>BOBOT: 2.0</w:t></w:r></w:p>
    </w:body>
</w:document>';
        $zip->addFromString('word/document.xml', $documentXml);

        $zip->close();

        return $outputPath;
    }

    /**
     * Generate a downloadable, print-friendly and CBT-compatible .docx file from an AI generated package.
     */
    public function generateDocxFromPackage(array $package, string $outputPath): string
    {
        $dir = dirname($outputPath);
        if (! file_exists($dir)) {
            @mkdir($dir, 0755, true);
        }
        if (file_exists($outputPath)) {
            @unlink($outputPath);
        }

        $zip = new ZipArchive;
        if ($zip->open($outputPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
            throw new \RuntimeException('Gagal membuat file dokumen Word.');
        }

        $contentTypes = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<Types xmlns="http://schemas.openxmlformats.org/package/2006/content-types">
    <Default Extension="rels" ContentType="application/vnd.openxmlformats-package.relationships+xml"/>
    <Default Extension="xml" ContentType="application/xml"/>
    <Override PartName="/word/document.xml" ContentType="application/vnd.openxmlformats-officedocument.wordprocessingml.document.main+xml"/>
</Types>';
        $zip->addFromString('[Content_Types].xml', $contentTypes);

        $rels = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships">
    <Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/officeDocument" Target="word/document.xml"/>
</Relationships>';
        $zip->addFromString('_rels/.rels', $rels);

        $title = htmlspecialchars($package['assessment_title'] ?? 'Naskah Asesmen ADZKIA', ENT_QUOTES | ENT_XML1, 'UTF-8');
        $bodyXml = '';

        // Title Header
        $bodyXml .= '<w:p><w:pPr><w:jc w:val="center"/></w:pPr><w:r><w:rPr><w:b/><w:sz w:val="28"/><w:color w:val="1c7ed6"/></w:rPr><w:t>'.$title.'</w:t></w:r></w:p>';
        $bodyXml .= '<w:p><w:pPr><w:jc w:val="center"/></w:pPr><w:r><w:rPr><w:i/><w:color w:val="666666"/><w:sz w:val="18"/></w:rPr><w:t>Sistem Ujian CBT ADZKIA • Dokumen Naskah &amp; Lembar Jawaban Resmi</w:t></w:r></w:p>';
        $bodyXml .= '<w:p><w:r><w:t></w:t></w:r></w:p>';

        // Stimulus (if any)
        $stimuli = ! empty($package['stimuli']) && is_array($package['stimuli']) ? $package['stimuli'] : [];
        $items = $package['items'] ?? [];

        if (count($stimuli) > 1) {
            foreach ($stimuli as $st) {
                $stimIndex = (int) ($st['index'] ?? 1);
                $stimTitleXml = htmlspecialchars($st['title'] ?? "Wacana Stimulus {$stimIndex}", ENT_QUOTES | ENT_XML1, 'UTF-8');
                $stimContentXml = htmlspecialchars($st['content'] ?? '', ENT_QUOTES | ENT_XML1, 'UTF-8');

                $bodyXml .= '<w:p><w:r><w:rPr><w:b/><w:color w:val="1098ad"/></w:rPr><w:t>[STIMULUS]</w:t></w:r></w:p>';
                $bodyXml .= '<w:p><w:r><w:rPr><w:b/></w:rPr><w:t>Judul: '.$stimTitleXml.'</w:t></w:r></w:p>';
                $bodyXml .= '<w:p><w:r><w:t>Teks: '.$stimContentXml.'</w:t></w:r></w:p>';
                $bodyXml .= '<w:p><w:r><w:rPr><w:b/><w:color w:val="1098ad"/></w:rPr><w:t>[AKHIR NARASI]</w:t></w:r></w:p>';
                $bodyXml .= '<w:p><w:r><w:t></w:t></w:r></w:p>';

                $childItems = array_filter($items, fn ($it) => (int) ($it['stimulus_index'] ?? 0) === $stimIndex);
                foreach ($childItems as $item) {
                    $bodyXml .= $this->renderQuestionItemDocxXml($item);
                }
            }

            $standaloneItems = array_filter($items, fn ($it) => empty($it['stimulus_index']));
            if (! empty($standaloneItems)) {
                $bodyXml .= '<w:p><w:r><w:rPr><w:b/><w:color w:val="e67700"/></w:rPr><w:t>[SOAL MANDIRI]</w:t></w:r></w:p>';
                foreach ($standaloneItems as $item) {
                    $bodyXml .= $this->renderQuestionItemDocxXml($item);
                }
            }
        } else {
            $stimRaw = ! empty($stimuli[0]) ? $stimuli[0] : ($package['stimulus'] ?? null);
            $stimTitle = 'Wacana Stimulus';
            $stimContent = '';
            if (is_array($stimRaw)) {
                $stimTitle = $stimRaw['title'] ?? 'Wacana Stimulus';
                $stimContent = $stimRaw['content'] ?? ($stimRaw['text'] ?? ($stimRaw['wacana'] ?? ''));
            } elseif (is_string($stimRaw) && trim($stimRaw) !== '') {
                $stimContent = trim($stimRaw);
            }

            if ($stimContent !== '') {
                $stimTitleXml = htmlspecialchars($stimTitle, ENT_QUOTES | ENT_XML1, 'UTF-8');
                $stimContentXml = htmlspecialchars($stimContent, ENT_QUOTES | ENT_XML1, 'UTF-8');

                $bodyXml .= '<w:p><w:r><w:rPr><w:b/><w:color w:val="1098ad"/></w:rPr><w:t>[STIMULUS]</w:t></w:r></w:p>';
                $bodyXml .= '<w:p><w:r><w:rPr><w:b/></w:rPr><w:t>Judul: '.$stimTitleXml.'</w:t></w:r></w:p>';
                $bodyXml .= '<w:p><w:r><w:t>Teks: '.$stimContentXml.'</w:t></w:r></w:p>';
                $bodyXml .= '<w:p><w:r><w:rPr><w:b/><w:color w:val="1098ad"/></w:rPr><w:t>[AKHIR NARASI]</w:t></w:r></w:p>';
                $bodyXml .= '<w:p><w:r><w:t></w:t></w:r></w:p>';
            }

            // Items grouped by question type in pedagogical order
            $preferredTypeOrder = [
                'mcq_single',
                'mcq_multiple',
                'binary_matrix',
                'matching',
                'ordering',
                'short_answer',
                'essay',
                'mcq_weighted',
            ];

            $groupedByType = [];
            foreach ($items as $it) {
                $t = $it['type'] ?? 'mcq_single';
                if (! isset($groupedByType[$t])) {
                    $groupedByType[$t] = [];
                }
                $groupedByType[$t][] = $it;
            }

            uksort($groupedByType, function ($a, $b) use ($preferredTypeOrder) {
                $posA = array_search($a, $preferredTypeOrder, true);
                $posB = array_search($b, $preferredTypeOrder, true);
                $idxA = $posA === false ? 999 : $posA;
                $idxB = $posB === false ? 999 : $posB;

                return $idxA <=> $idxB;
            });

            $partLetters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];
            $secIdx = 0;

            foreach ($groupedByType as $type => $typeItems) {
                $letter = $partLetters[$secIdx] ?? chr(65 + $secIdx);
                $typeMeta = $this->getQuestionTypeMeta($type);
                $count = count($typeItems);

                $partTitle = '=== BAGIAN '.$letter.': '.strtoupper($typeMeta['name']).' ('.$count.' Butir Soal) ===';
                $bodyXml .= '<w:p><w:pPr><w:spacing w:before="360" w:after="80"/><w:jc w:val="left"/></w:pPr><w:r><w:rPr><w:b/><w:sz w:val="24"/><w:color w:val="1c7ed6"/></w:rPr><w:t>'.htmlspecialchars($partTitle, ENT_QUOTES | ENT_XML1, 'UTF-8').'</w:t></w:r></w:p>';
                $bodyXml .= '<w:p><w:pPr><w:spacing w:before="0" w:after="160"/><w:jc w:val="left"/></w:pPr><w:r><w:rPr><w:i/><w:sz w:val="19"/><w:color w:val="495057"/></w:rPr><w:t>'.htmlspecialchars($typeMeta['instructions'], ENT_QUOTES | ENT_XML1, 'UTF-8').'</w:t></w:r></w:p>';

                foreach ($typeItems as $item) {
                    $bodyXml .= $this->renderQuestionItemDocxXml($item);
                }

                $secIdx++;
            }
        }

        $documentXml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<w:document xmlns:w="http://schemas.openxmlformats.org/wordprocessingml/2006/main">
    <w:body>'.$bodyXml.'</w:body>
</w:document>';

        $zip->addFromString('word/document.xml', $documentXml);
        $zip->close();

        return $outputPath;
    }

    /**
     * Get human-readable title and clear instructions for each question type.
     */
    public function getQuestionTypeMeta(string $type): array
    {
        return match ($type) {
            'mcq_single' => [
                'name' => 'Pilihan Ganda (Tunggal)',
                'instructions' => 'Petunjuk Pengerjaan: Pilihlah salah satu jawaban yang paling tepat (A, B, C, D, atau E) untuk setiap butir soal.',
            ],
            'mcq_multiple' => [
                'name' => 'Pilihan Ganda Kompleks',
                'instructions' => 'Petunjuk Pengerjaan: Pilihlah satu atau lebih pilihan jawaban yang benar sesuai dengan pertanyaan atau pernyataan yang disajikan.',
            ],
            'binary_matrix', 'boolean_matrix' => [
                'name' => 'Benar / Salah (Matriks Pernyataan)',
                'instructions' => 'Petunjuk Pengerjaan: Tentukan nilai kebenaran (Benar atau Salah) pada setiap baris pernyataan yang disediakan.',
            ],
            'matching' => [
                'name' => 'Menjodohkan',
                'instructions' => 'Petunjuk Pengerjaan: Pasangkan setiap premis atau pertanyaan di kolom kiri dengan jawaban yang sesuai di kolom kanan.',
            ],
            'ordering', 'reorder' => [
                'name' => 'Mengurutkan',
                'instructions' => 'Petunjuk Pengerjaan: Susun dan urutkan butir-butir pernyataan/tahapan berikut agar menjadi urutan yang tepat dan logis.',
            ],
            'short_answer', 'fill_blank' => [
                'name' => 'Isian Singkat',
                'instructions' => 'Petunjuk Pengerjaan: Isilah bagian yang rumpang dengan jawaban singkat, presisi, dan tepat.',
            ],
            'essay' => [
                'name' => 'Uraian / Esai',
                'instructions' => 'Petunjuk Pengerjaan: Jawablah pertanyaan-pertanyaan berikut dengan penjelasan lengkap, terstruktur, analitis, dan jelas.',
            ],
            'mcq_weighted' => [
                'name' => 'Pilihan Berbobot (Karakteristik Pribadi)',
                'instructions' => 'Petunjuk Pengerjaan: Pilihlah opsi tindakan yang menurut Anda paling berintegritas, solutif, dan profesional.',
            ],
            default => [
                'name' => 'Soal Campuran',
                'instructions' => 'Petunjuk Pengerjaan: Kerjakan butir-butir soal berikut sesuai instruksi yang tertera.',
            ],
        };
    }

    /**
     * Render a single question item into OOXML Word paragraph string.
     *
     * @param  array<string, mixed>  $item
     */
    protected function renderQuestionItemDocxXml(array $item): string
    {
        $bodyXml = '';
        $type = $item['type'] ?? 'mcq_single';
        $num = (int) ($item['number'] ?? 1);
        $prompt = htmlspecialchars(trim($item['prompt'] ?? ''), ENT_QUOTES | ENT_XML1, 'UTF-8');
        $points = (float) ($item['points'] ?? 1.0);
        $options = $item['options'] ?? [];
        $explanation = htmlspecialchars(trim($item['explanation'] ?? ''), ENT_QUOTES | ENT_XML1, 'UTF-8');

        if ($type === 'mcq_weighted') {
            $bodyXml .= '<w:p><w:r><w:rPr><w:b/><w:color w:val="2f9e44"/></w:rPr><w:t>[TKP]</w:t></w:r></w:p>';
        } elseif ($type === 'mcq_multiple') {
            $bodyXml .= '<w:p><w:r><w:rPr><w:b/><w:color w:val="7950f2"/></w:rPr><w:t>[KOMPLEKS]</w:t></w:r></w:p>';
        } elseif ($type === 'binary_matrix') {
            $bodyXml .= '<w:p><w:r><w:rPr><w:b/><w:color w:val="e67700"/></w:rPr><w:t>[BENAR SALAH]</w:t></w:r></w:p>';
            $bodyXml .= '<w:p><w:r><w:rPr><w:b/></w:rPr><w:t>KOLOM: Benar | Salah</w:t></w:r></w:p>';
        } elseif ($type === 'matching') {
            $bodyXml .= '<w:p><w:r><w:rPr><w:b/><w:color w:val="0ca678"/></w:rPr><w:t>[MENJODOHKAN]</w:t></w:r></w:p>';
        } elseif ($type === 'ordering') {
            $bodyXml .= '<w:p><w:r><w:rPr><w:b/><w:color w:val="22b8cf"/></w:rPr><w:t>[MENGURUTKAN]</w:t></w:r></w:p>';
        } elseif ($type === 'short_answer') {
            $bodyXml .= '<w:p><w:r><w:rPr><w:b/><w:color w:val="ae3ec9"/></w:rPr><w:t>[ISIAN]</w:t></w:r></w:p>';
        } elseif ($type === 'essay') {
            $bodyXml .= '<w:p><w:r><w:rPr><w:b/><w:color w:val="d6336c"/></w:rPr><w:t>[ESAI]</w:t></w:r></w:p>';
        }

        $bodyXml .= '<w:p><w:r><w:t>'.$num.'. '.$prompt.'</w:t></w:r></w:p>';

        if ($type === 'mcq_weighted') {
            foreach ($options as $opt) {
                $lbl = htmlspecialchars($opt['label'] ?? 'A', ENT_QUOTES | ENT_XML1, 'UTF-8');
                $score = (int) ($opt['score'] ?? 0);
                $text = htmlspecialchars(trim($opt['option_text'] ?? ''), ENT_QUOTES | ENT_XML1, 'UTF-8');
                $bodyXml .= '<w:p><w:r><w:t>'.$lbl.'. ['.$score.'] '.$text.'</w:t></w:r></w:p>';
            }
        } elseif ($type === 'mcq_single') {
            $correctLetter = 'A';
            foreach ($options as $opt) {
                $lbl = htmlspecialchars($opt['label'] ?? 'A', ENT_QUOTES | ENT_XML1, 'UTF-8');
                $text = htmlspecialchars(trim($opt['option_text'] ?? ''), ENT_QUOTES | ENT_XML1, 'UTF-8');
                $bodyXml .= '<w:p><w:r><w:t>'.$lbl.'. '.$text.'</w:t></w:r></w:p>';
                if (! empty($opt['is_correct'])) {
                    $correctLetter = $lbl;
                }
            }
            $bodyXml .= '<w:p><w:r><w:rPr><w:b/></w:rPr><w:t>KUNCI: '.$correctLetter.'</w:t></w:r></w:p>';
        } elseif ($type === 'mcq_multiple') {
            $correctLetters = [];
            foreach ($options as $opt) {
                $lbl = htmlspecialchars($opt['label'] ?? 'A', ENT_QUOTES | ENT_XML1, 'UTF-8');
                $text = htmlspecialchars(trim($opt['option_text'] ?? ''), ENT_QUOTES | ENT_XML1, 'UTF-8');
                $bodyXml .= '<w:p><w:r><w:t>'.$lbl.'. '.$text.'</w:t></w:r></w:p>';
                if (! empty($opt['is_correct'])) {
                    $correctLetters[] = $lbl;
                }
            }
            $bodyXml .= '<w:p><w:r><w:rPr><w:b/></w:rPr><w:t>KUNCI: '.implode(', ', $correctLetters).'</w:t></w:r></w:p>';
        } elseif ($type === 'binary_matrix') {
            foreach ($options as $idx => $opt) {
                $iNum = $idx + 1;
                $text = htmlspecialchars(trim($opt['option_text'] ?? ''), ENT_QUOTES | ENT_XML1, 'UTF-8');
                $key = htmlspecialchars(strtoupper($opt['match_key'] ?? 'BENAR'), ENT_QUOTES | ENT_XML1, 'UTF-8');
                $bodyXml .= '<w:p><w:r><w:t>'.$iNum.') '.$text.' ['.$key.']</w:t></w:r></w:p>';
            }
        } elseif ($type === 'matching') {
            foreach ($options as $idx => $opt) {
                $iNum = $idx + 1;
                $left = htmlspecialchars(trim($opt['option_text'] ?? ''), ENT_QUOTES | ENT_XML1, 'UTF-8');
                $right = htmlspecialchars(trim($opt['match_key'] ?? ''), ENT_QUOTES | ENT_XML1, 'UTF-8');
                $bodyXml .= '<w:p><w:r><w:t>'.$iNum.') '.$left.' -&gt; '.$right.'</w:t></w:r></w:p>';
            }
        } elseif ($type === 'ordering') {
            foreach ($options as $idx => $opt) {
                $iNum = $idx + 1;
                $text = htmlspecialchars(trim($opt['option_text'] ?? ''), ENT_QUOTES | ENT_XML1, 'UTF-8');
                $bodyXml .= '<w:p><w:r><w:t>'.$iNum.') '.$text.'</w:t></w:r></w:p>';
            }
        } elseif ($type === 'short_answer') {
            $key = htmlspecialchars(trim($options[0]['option_text'] ?? 'Jawaban'), ENT_QUOTES | ENT_XML1, 'UTF-8');
            $bodyXml .= '<w:p><w:r><w:rPr><w:b/></w:rPr><w:t>KUNCI: '.$key.'</w:t></w:r></w:p>';
        }

        if ($points > 0 && $type !== 'mcq_weighted') {
            $bodyXml .= '<w:p><w:r><w:rPr><w:b/><w:color w:val="d9480f"/></w:rPr><w:t>BOBOT: '.number_format($points, 1).'</w:t></w:r></w:p>';
        }

        if ($explanation !== '') {
            $bodyXml .= '<w:p><w:r><w:rPr><w:i/></w:rPr><w:t>PEMBAHASAN: '.$explanation.'</w:t></w:r></w:p>';
        }

        $bodyXml .= '<w:p><w:r><w:t></w:t></w:r></w:p>';

        return $bodyXml;
    }
}
