<x-layouts.app>
    <x-slot:title>Wizard Pembuatan Ujian - ADZKIA</x-slot:title>

    <!-- Alpine.js Wizard State Machine -->
    <script>
        window.assessmentWizard = function() {
            return {
                currentStep: 1,
                isSubmitting: false,
                activeSectionIdx: 0,
                activePresetInfo: null,
                subjectsList: @json($subjects),
                showFormatModal: false,
                showImportModal: false,
                importSectionIdx: 0,
                selectedWordFile: null,
                selectedWordFileName: '',
                isImporting: false,
                stepNames: [
                    'Tipe',
                    'Informasi',
                    'Section',
                    'Soal',
                    'Penilaian',
                    'Review',
                    'Publish',
                    'Jadwal'
                ],
                form: {
                    type: 'ph',
                    title: '',
                    subject_id: '',
                    grade_level: '1 SD',
                    duration_minutes: 90,
                    description: '',
                    scoring_type: 'standard',
                    status: 'draft',
                    price_type: 'free',
                    price: 0,
                    max_attempts: null,
                    access_validity_days: 35,
                    packages: [
                        { name: 'Paket 1 Percobaan', price: 10000, attempts: 1, validity_days: 35 },
                        { name: 'Paket 3 Percobaan', price: 25000, attempts: 3, validity_days: 35 },
                        { name: 'Paket 7 Percobaan', price: 50000, attempts: 7, validity_days: 35 }
                    ],
                    settings: {
                        token: 'ADZ' + Math.floor(100 + Math.random() * 900),
                        randomize_questions: true,
                        randomize_options: true,
                        passing_grade: {
                            enabled: true,
                            min_score: 75,
                            pass_label: 'Lulus / Tuntas',
                            fail_label: 'Belum Tuntas (Remedial)'
                        },
                        scoring_template: 'standard',
                        formula_type: 'sum',
                        section_weights: {},
                        proctoring_mode: 'unproctored',
                        post_exam_policy: {
                            teacher_review_required: false,
                            show_breakdown: true,
                            show_ranking: true,
                            show_instant_score: true,
                            release_mode: 'immediate'
                        }
                    },
                    sections: [
                        {
                            id: 'sec_' + Date.now() + '_1',
                            title: 'Bagian 1: Pilihan Ganda',
                            instructions: 'Pilihlah salah satu jawaban yang paling tepat.',
                            duration_minutes: null,
                            items: []
                        },
                        {
                            id: 'sec_' + Date.now() + '_2',
                            title: 'Bagian 2: Isian Singkat',
                            instructions: 'Jawablah pertanyaan berikut dengan singkat dan tepat.',
                            duration_minutes: null,
                            items: []
                        }
                    ]
                },

                selectAssessmentType(typeId) {
                    this.form.type = typeId;
                    if (typeId === 'ph' || typeId === 'pts' || typeId === 'pas') {
                        this.form.duration_minutes = (typeId === 'ph') ? 60 : 90;
                        this.form.scoring_type = 'raw';
                        this.form.sections = [
                            {
                                id: 'sec_' + typeId + '_1',
                                title: 'Bagian 1: Pilihan Ganda',
                                instructions: 'Pilihlah salah satu jawaban yang paling tepat.',
                                duration_minutes: null,
                                items: []
                            },
                            {
                                id: 'sec_' + typeId + '_2',
                                title: 'Bagian 2: Isian Singkat',
                                instructions: 'Jawablah pertanyaan berikut dengan singkat dan tepat.',
                                duration_minutes: null,
                                items: []
                            }
                        ];
                    } else if (typeId === 'toeic') {
                        this.form.duration_minutes = 120;
                        this.form.scoring_type = 'toeic_scale';
                        this.form.settings.scoring_template = 'toeic';
                        this.form.sections = [
                            {
                                id: 'sec_toeic_1',
                                title: 'Section 1: Listening Comprehension',
                                instructions: 'Listen to the audio and choose the correct answer (Photographs, Question-Response, Conversations, Talks).',
                                duration_minutes: 45,
                                items: []
                            },
                            {
                                id: 'sec_toeic_2',
                                title: 'Section 2: Reading Comprehension',
                                instructions: 'Read the passages and choose the correct answer (Incomplete Sentences, Text Completion, Reading Passages).',
                                duration_minutes: 75,
                                items: []
                            }
                        ];
                    } else if (typeId === 'toefl') {
                        this.form.duration_minutes = 115;
                        this.form.scoring_type = 'toefl_scale';
                        this.form.settings.scoring_template = 'toefl';
                        this.form.sections = [
                            {
                                id: 'sec_toefl_1',
                                title: 'Section 1: Listening Comprehension',
                                instructions: 'Listen to short conversations, extended conversations, and academic lectures, then answer the questions.',
                                duration_minutes: 35,
                                items: []
                            },
                            {
                                id: 'sec_toefl_2',
                                title: 'Section 2: Structure & Written Expression',
                                instructions: 'Choose the correct word/phrase to complete sentences or identify grammatical errors in sentences.',
                                duration_minutes: 25,
                                items: []
                            },
                            {
                                id: 'sec_toefl_3',
                                title: 'Section 3: Reading Comprehension',
                                instructions: 'Read academic passages carefully and answer the comprehension and vocabulary questions.',
                                duration_minutes: 55,
                                items: []
                            }
                        ];
                    } else if (typeId === 'ielts') {
                        this.form.duration_minutes = 165;
                        this.form.scoring_type = 'ielts_band';
                        this.form.settings.scoring_template = 'ielts';
                        this.form.sections = [
                            {
                                id: 'sec_ielts_1',
                                title: 'Section 1: Listening',
                                instructions: 'Listen to the audio recordings (monologues and conversations) and answer the questions.',
                                duration_minutes: 30,
                                items: []
                            },
                            {
                                id: 'sec_ielts_2',
                                title: 'Section 2: Reading',
                                instructions: 'Read the three academic/general texts and answer the 40 questions.',
                                duration_minutes: 60,
                                items: []
                            },
                            {
                                id: 'sec_ielts_3',
                                title: 'Section 3: Writing',
                                instructions: 'Complete Task 1 (descriptive summary / letter) and Task 2 (discursive essay).',
                                duration_minutes: 60,
                                items: []
                            },
                            {
                                id: 'sec_ielts_4',
                                title: 'Section 4: Speaking',
                                instructions: 'Speaking test: Part 1 (Introduction), Part 2 (Cue card speech), Part 3 (Discussion).',
                                duration_minutes: 15,
                                items: []
                            }
                        ];
                    } else if (typeId === 'utbk') {
                        this.selectUtbkPreset(this.form.utbk_package || 'tps');
                    }
                },

                selectUtbkPreset(pkg) {
                    this.form.type = 'utbk';
                    this.form.utbk_package = pkg;
                    this.form.scoring_type = 'conversion';
                    this.form.settings.scoring_template = 'utbk';
                    this.form.settings.post_exam_policy.show_ranking = true;

                    if (pkg === 'tps') {
                        this.form.duration_minutes = 90;
                        this.form.sections = [
                            {
                                id: 'sec_utbk_tps_1',
                                title: 'Subtes 1: Kemampuan Penalaran Umum',
                                instructions: 'Jawablah soal-soal penalaran induktif, deduktif, dan kuantitatif secara cermat.',
                                duration_minutes: 30,
                                items: []
                            },
                            {
                                id: 'sec_utbk_tps_2',
                                title: 'Subtes 2: Pengetahuan & Pemahaman Umum',
                                instructions: 'Jawablah soal-soal kosa kata, makna kata, dan pemahaman teks bahasa.',
                                duration_minutes: 15,
                                items: []
                            },
                            {
                                id: 'sec_utbk_tps_3',
                                title: 'Subtes 3: Kemampuan Memahami Bacaan & Menulis',
                                instructions: 'Pahami teks bacaan dan tentukan kelengkapan ejaan, konjungsi, dan tata bahasa.',
                                duration_minutes: 25,
                                items: []
                            },
                            {
                                id: 'sec_utbk_tps_4',
                                title: 'Subtes 4: Pengetahuan Kuantitatif',
                                instructions: 'Selesaikan perhitungan logika matematika, aljabar, dan geometri dasar.',
                                duration_minutes: 20,
                                items: []
                            }
                        ];
                    } else {
                        this.form.duration_minutes = 120;
                        this.form.sections = [
                            {
                                id: 'sec_utbk_lit_1',
                                title: 'Subtes 1: Literasi dalam Bahasa Indonesia',
                                instructions: 'Analisis teks sastra dan informasi berbahasa Indonesia untuk menjawab pertanyaan.',
                                duration_minutes: 45,
                                items: []
                            },
                            {
                                id: 'sec_utbk_lit_2',
                                title: 'Subtes 2: Literasi dalam Bahasa Inggris',
                                instructions: 'Read English academic and general texts, then answer comprehension questions.',
                                duration_minutes: 30,
                                items: []
                            },
                            {
                                id: 'sec_utbk_lit_3',
                                title: 'Subtes 3: Penalaran Matematika',
                                instructions: 'Terapkan konsep matematika dalam memecahkan masalah kontekstual nyata.',
                                duration_minutes: 45,
                                items: []
                            }
                        ];
                    }
                },

                isStandardLockedType() {
                    return this.form.type === 'toeic' || this.form.type === 'toefl' || this.form.type === 'ielts' || this.form.type === 'utbk';
                },

                togglePresetInfo(presetId) {
                    this.activePresetInfo = (this.activePresetInfo === presetId) ? null : presetId;
                },

                openImportModal(secIdx) {
                    this.importSectionIdx = secIdx;
                    this.selectedWordFile = null;
                    this.selectedWordFileName = '';
                    this.showImportModal = true;
                },

                openFormatModal() {
                    this.showFormatModal = true;
                },

                handleFileSelected(event) {
                    const files = event.target.files;
                    if (files && files.length > 0) {
                        this.selectedWordFile = files[0];
                        this.selectedWordFileName = files[0].name;
                    }
                },

                handleFileDrop(event) {
                    const files = event.dataTransfer.files;
                    if (files && files.length > 0) {
                        this.selectedWordFile = files[0];
                        this.selectedWordFileName = files[0].name;
                    }
                },

                importWordFile() {
                    if (!this.selectedWordFile) {
                        alert('Silakan pilih file Word (.docx) terlebih dahulu.');
                        return;
                    }
                    this.isImporting = true;
                    const formData = new FormData();
                    formData.append('word_file', this.selectedWordFile);

                    fetch('{{ route("assessments.import-word") }}', {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: formData
                    })
                    .then(res => {
                        if (!res.ok) {
                            return res.json().then(err => { throw err; });
                        }
                        return res.json();
                    })
                    .then(data => {
                        this.isImporting = false;
                        if (data.items && data.items.length > 0) {
                            data.items.forEach(it => {
                                this.form.sections[this.importSectionIdx].items.push(it);
                            });
                            this.showImportModal = false;
                            this.selectedWordFile = null;
                            this.selectedWordFileName = '';
                            alert(data.message || 'Soal berhasil diimpor!');
                            this.$nextTick(() => {
                                if (window.triggerKaTeX) window.triggerKaTeX();
                            });
                        } else {
                            alert('Tidak ada soal yang terdeteksi dalam file. Pastikan format penomoran dan opsi sesuai pedoman.');
                        }
                    })
                    .catch(err => {
                        this.isImporting = false;
                        alert('Gagal mengimpor file: ' + (err.message || (err.errors ? Object.values(err.errors).flat().join(', ') : JSON.stringify(err))));
                    });
                },



                renderRichPreview(text) {
                    if (!text) return '<span class="text-gray-9 italic">Belum ada teks yang ditulis...</span>';
                    
                    let processed = text;

                    // 1. Process LaTeX Display Math ($$...$$)
                    processed = processed.replace(/\$\$([\s\S]*?)\$\$/g, function(match, math) {
                        const cleanMath = math.trim();
                        if (window.katex && typeof window.katex.renderToString === 'function') {
                            try {
                                return '<div class="my-1 flex justify-center text-gray-12 overflow-x-auto text-base">' + 
                                    window.katex.renderToString(cleanMath, { displayMode: true, throwOnError: false }) + 
                                    '</div>';
                            } catch(e) {
                                return '<div class="my-1 p-2 bg-red-2 text-red-11 rounded-lg border border-red-5 font-mono text-xs">Error LaTeX: ' + e.message + '</div>';
                            }
                        }
                        return '<div class="my-1 font-mono text-sm font-semibold text-center">$$ ' + cleanMath + ' $$</div>';
                    });

                    // 2. Process LaTeX Inline Math ($...$)
                    processed = processed.replace(/(^|[^\$])\$([^\$\n]+?)\$(?!\$)/g, function(match, prefix, math) {
                        const cleanMath = math.trim();
                        if (window.katex && typeof window.katex.renderToString === 'function') {
                            try {
                                return prefix + '<span class="inline-block px-1 font-serif text-gray-12">' + 
                                    window.katex.renderToString(cleanMath, { displayMode: false, throwOnError: false }) + 
                                    '</span>';
                            } catch(e) {
                                return prefix + '<span class="px-1 bg-red-2 text-red-11 rounded font-mono text-xs">$' + cleanMath + '$</span>';
                            }
                        }
                        return prefix + '<span class="px-1.5 py-0.5 rounded bg-purple-2 text-purple-11 border border-purple-5 font-mono text-xs">$' + cleanMath + '$</span>';
                    });

                    // 3. Process Headings & Typography
                    processed = processed.replace(/^# (.*?)$/gm, '<h1 class="text-lg font-bold text-gray-12 mt-3 mb-1.5 pb-1 border-b border-gray-5">$1</h1>');
                    processed = processed.replace(/^## (.*?)$/gm, '<h2 class="text-base font-bold text-gray-12 mt-2.5 mb-1">$1</h2>');
                    processed = processed.replace(/^### (.*?)$/gm, '<h3 class="text-sm font-bold text-gray-12 mt-2 mb-1">$1</h3>');
                    processed = processed.replace(/<u>(.*?)<\/u>/gi, '<u class="underline decoration-green-8 underline-offset-2">$1</u>');
                    processed = processed.replace(/\*\*(.*?)\*\*/g, '<strong class="font-bold text-gray-12">$1</strong>');
                    processed = processed.replace(/\*(.*?)\*/g, '<em class="italic">$1</em>');

                    // 4. Process Direct Media Tags
                    processed = processed.replace(/<audio\b([^>]*)>(.*?)<\/audio>/gi, '<div class="my-2 p-2.5 rounded-xl bg-gray-2 border border-gray-6"><span class="text-[11px] font-bold text-gray-10 block mb-1">🔊 Pratinjau Audio:</span><audio controls $1 class="w-full">$2</audio></div>');
                    processed = processed.replace(/<video\b([^>]*)>(.*?)<\/video>/gi, '<div class="my-2 p-2 rounded-xl bg-black/5 border border-gray-6"><video controls $1 class="w-full max-h-60 rounded-lg object-contain bg-black">$2</video></div>');

                    // 5. Process Markdown Media / Images (![alt](url))
                    processed = processed.replace(/!\[(.*?)\]\((.*?)\)/g, function(match, alt, url) {
                        const cleanUrl = url.trim();
                        if (!cleanUrl) {
                            return '<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded bg-amber-2 text-amber-11 border border-amber-5 text-xs animate-pulse">⏳ ' + (alt || 'Sedang mengunggah media...') + '</span>';
                        }
                        if (/\.(mp3|wav|ogg|m4a|aac)(\?.*)?$/i.test(cleanUrl)) {
                            return '<div class="my-2 p-2.5 rounded-xl bg-gray-2 border border-gray-6"><span class="text-[11px] font-bold text-gray-10 block mb-1">🔊 Pratinjau Audio: ' + (alt || '') + '</span><audio controls src="' + cleanUrl + '" class="w-full"></audio></div>';
                        }
                        if (/\.(mp4|webm|ogv|mov)(\?.*)?$/i.test(cleanUrl)) {
                            return '<div class="my-2 p-2 rounded-xl bg-black/5 border border-gray-6"><video controls src="' + cleanUrl + '" class="w-full max-h-60 rounded-lg object-contain bg-black"></video>' + (alt ? '<p class="text-[11px] text-gray-10 mt-1 italic text-center">' + alt + '</p>' : '') + '</div>';
                        }
                        return '<div class="my-2.5">' +
                            '<img src="' + cleanUrl + '" alt="' + (alt || 'Gambar Soal') + '" class="max-w-full max-h-80 rounded-xl border border-gray-6 shadow-sm object-contain bg-white p-1.5" loading="lazy" onerror="this.onerror=null; this.parentElement.innerHTML=\'<span class=\\\'text-xs text-red-11 italic\\\'>[Gagal memuat media dari R2]\';">' +
                            (alt ? '<p class="text-[11px] text-gray-10 mt-1 italic text-center">' + alt + '</p>' : '') +
                            '</div>';
                    });

                    // 6. Process Markdown Links ([text](url))
                    processed = processed.replace(/\[(.*?)\]\((.*?)\)/g, '<a href="$2" target="_blank" rel="noopener noreferrer" class="text-blue-11 hover:underline font-semibold">$1</a>');

                    // 7. Process Markdown Tables
                    processed = processed.replace(/(?:^|\n)((?:\|[^\n]+\|\r?\n?)+)/g, function(match, tableBlock) {
                        const lines = tableBlock.trim().split(/\r?\n/).map(l => l.trim()).filter(Boolean);
                        if (lines.length < 2) return match;
                        
                        const headerCells = lines[0].split('|').slice(1, -1).map(c => c.trim());
                        if (headerCells.length === 0) return match;

                        const isSep = /^\|?(\s*:?-+:?\s*\|?)+$/.test(lines[1]);
                        if (!isSep) return match;

                        let tableHtml = '<div class="my-3 overflow-x-auto rounded-xl border border-gray-6"><table class="w-full text-xs text-left border-collapse bg-white"><thead><tr class="bg-gray-3 border-b border-gray-6">';
                        headerCells.forEach(cell => {
                            tableHtml += '<th class="py-2 px-3 font-bold text-gray-12">' + cell + '</th>';
                        });
                        tableHtml += '</tr></thead><tbody>';

                        for (let r = 2; r < lines.length; r++) {
                            const rowCells = lines[r].split('|').slice(1, -1).map(c => c.trim());
                            tableHtml += '<tr class="border-b border-gray-4 hover:bg-gray-2/50">';
                            rowCells.forEach(cell => {
                                tableHtml += '<td class="py-1.5 px-3 text-gray-11">' + cell + '</td>';
                            });
                            tableHtml += '</tr>';
                        }
                        tableHtml += '</tbody></table></div>';
                        return '\n' + tableHtml + '\n';
                    });

                    processed = processed.replace(/\n/g, '<br>');

                    return processed;
                },

                // Insert Markdown Table at Cursor
                insertTableFormat(textareaEl, targetObj, field) {
                    if (!textareaEl) return;
                    const start = textareaEl.selectionStart || 0;
                    const end = textareaEl.selectionEnd || 0;
                    const text = textareaEl.value || '';

                    const tableTemplate = `\n| Kolom 1 | Kolom 2 | Kolom 3 |\n| :--- | :--- | :--- |\n| Baris 1 | Data A | Data B |\n| Baris 2 | Data C | Data D |\n`;

                    textareaEl.value = text.substring(0, start) + tableTemplate + text.substring(end);
                    textareaEl.dispatchEvent(new Event('input', { bubbles: true }));
                    if (targetObj && field) {
                        targetObj[field] = textareaEl.value;
                    }
                    textareaEl.focus();
                    const newPos = start + tableTemplate.length;
                    textareaEl.setSelectionRange(newPos, newPos);
                },

                // Client-side Automatic Image Compression & Resize
                async compressImageFile(file, maxWidth = 1200, maxHeight = 1200, quality = 0.82) {
                    if (!file || !file.type.startsWith('image/') || file.type === 'image/gif' || file.type === 'image/svg+xml') {
                        return file;
                    }

                    return new Promise((resolve) => {
                        const img = new Image();
                        const url = URL.createObjectURL(file);
                        img.onload = () => {
                            URL.revokeObjectURL(url);
                            let w = img.width;
                            let h = img.height;

                            if (w > maxWidth || h > maxHeight) {
                                const ratio = Math.min(maxWidth / w, maxHeight / h);
                                w = Math.round(w * ratio);
                                h = Math.round(h * ratio);
                            }

                            const canvas = document.createElement('canvas');
                            canvas.width = w;
                            canvas.height = h;
                            const ctx = canvas.getContext('2d');
                            ctx.imageSmoothingEnabled = true;
                            ctx.imageSmoothingQuality = 'high';
                            ctx.drawImage(img, 0, 0, w, h);

                            const canWebP = canvas.toDataURL('image/webp').indexOf('data:image/webp') === 0;
                            const mime = canWebP ? 'image/webp' : 'image/jpeg';
                            const ext = canWebP ? 'webp' : 'jpg';

                            canvas.toBlob((blob) => {
                                if (!blob || blob.size >= file.size) {
                                    resolve(file);
                                    return;
                                }
                                const newName = file.name.replace(/\.[^.]+$/, '') + '.' + ext;
                                resolve(new File([blob], newName, { type: mime, lastModified: Date.now() }));
                            }, mime, quality);
                        };
                        img.onerror = () => {
                            URL.revokeObjectURL(url);
                            resolve(file);
                        };
                        img.src = url;
                    });
                },

                // Markdown Editor Formatting
                applyTextFormat(textareaEl, targetObj, field, prefix, suffix, isHeading = false) {
                    if (!textareaEl) return;
                    
                    const start = textareaEl.selectionStart;
                    const end = textareaEl.selectionEnd;
                    const text = textareaEl.value || '';
                    const selected = text.substring(start, end);

                    let replacement = '';
                    let selectStart = start;
                    let selectEnd = start;

                    if (isHeading) {
                        const headingText = selected || 'Judul';
                        replacement = prefix + headingText + suffix;
                        selectStart = start + prefix.length;
                        selectEnd = selectStart + headingText.length;
                    } else {
                        const innerText = selected || 'teks';
                        replacement = prefix + innerText + suffix;
                        selectStart = start + prefix.length;
                        selectEnd = selectStart + innerText.length;
                    }

                    // Modify the DOM value and dispatch input so Alpine x-model catches it
                    textareaEl.value = text.substring(0, start) + replacement + text.substring(end);
                    textareaEl.dispatchEvent(new Event('input', { bubbles: true }));

                    // Restore focus and selection
                    textareaEl.focus();
                    textareaEl.setSelectionRange(selectStart, selectEnd);
                },

                // Upload Media (Image, Audio, Video) to Cloudflare R2 and insert tag
                triggerMediaUpload(textareaEl, targetObj, field) {
                    if (!textareaEl) return;

                    const fileInput = document.createElement('input');
                    fileInput.type = 'file';
                    fileInput.accept = 'image/*,audio/*,video/*';
                    
                    fileInput.onchange = async () => {
                        if (!fileInput.files || !fileInput.files[0]) return;
                        const file = fileInput.files[0];

                        if (file.size > 50 * 1024 * 1024) {
                            alert('Ukuran media melebihi batas 50MB.');
                            return;
                        }

                        const start = textareaEl.selectionStart || 0;
                        const end = textareaEl.selectionEnd || 0;
                        const text = textareaEl.value || '';
                        
                        const isImage = file.type.startsWith('image/');
                        const uploadPlaceholder = isImage
                            ? `\n[Mengompresi & mengunggah gambar ${file.name}...]\n`
                            : `\n[Mengunggah media ${file.name}...]\n`;
                        
                        // Insert temporary placeholder
                        textareaEl.value = text.substring(0, start) + uploadPlaceholder + text.substring(end);
                        textareaEl.dispatchEvent(new Event('input', { bubbles: true }));
                        if (targetObj && field) {
                            targetObj[field] = textareaEl.value;
                        }

                        // Automatic client-side compression & resize for images
                        let uploadFile = file;
                        if (isImage && file.type !== 'image/gif' && file.type !== 'image/svg+xml') {
                            try {
                                uploadFile = await this.compressImageFile(file, 1200, 1200, 0.82);
                            } catch (_) {
                                uploadFile = file;
                            }
                        }

                        const formData = new FormData();
                        formData.append('media', uploadFile);

                        try {
                            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
                            const response = await fetch('{{ route('assessments.upload-media') }}', {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': csrfToken,
                                    'Accept': 'application/json'
                                },
                                body: formData
                            });

                            const data = await response.json();
                            if (!response.ok || !data.success) {
                                throw new Error(data.message || (data.errors ? Object.values(data.errors).flat().join(', ') : 'Gagal mengunggah media ke Cloudflare R2'));
                            }

                            const cleanName = file.name.replace(/[\(\)\[\]]/g, '');
                            let markdownMedia = '';

                            const isAudio = data.type === 'audio' || file.type.startsWith('audio/') || /\.(mp3|wav|ogg|m4a|aac)$/i.test(file.name);
                            const isVideo = data.type === 'video' || file.type.startsWith('video/') || /\.(mp4|webm|ogv|mov)$/i.test(file.name);

                            if (isAudio) {
                                markdownMedia = `\n<audio controls autoplay src="${data.url}"></audio>\n`;
                            } else if (isVideo) {
                                markdownMedia = `\n<video controls autoplay playsinline src="${data.url}" class="max-h-80 w-full rounded-xl my-2"></video>\n`;
                            } else {
                                markdownMedia = `\n![${cleanName}](${data.url})\n`;
                            }

                            // Replace placeholder with final Cloudflare R2 media tag
                            textareaEl.value = textareaEl.value.replace(uploadPlaceholder, markdownMedia);
                            textareaEl.dispatchEvent(new Event('input', { bubbles: true }));
                            if (targetObj && field) {
                                targetObj[field] = textareaEl.value;
                            }
                        } catch (err) {
                            alert('Gagal mengunggah media ke Cloudflare R2: ' + (err.message || 'Terjadi kesalahan sistem'));
                            textareaEl.value = textareaEl.value.replace(uploadPlaceholder, '');
                            textareaEl.dispatchEvent(new Event('input', { bubbles: true }));
                            if (targetObj && field) {
                                targetObj[field] = textareaEl.value;
                            }
                        }
                    };

                    fileInput.click();
                },

                triggerImageUpload(textareaEl, targetObj, field) {
                    this.triggerMediaUpload(textareaEl, targetObj, field);
                },

                getDefaultMcqOptions() {
                    let count = 4;
                    const grade = (this.form.grade_level || '').toUpperCase();
                    if (grade.includes('SD')) {
                        count = 3;
                    } else if (grade.includes('SMP')) {
                        count = 4;
                    } else if (grade.includes('SMA') || grade.includes('SMK') || grade.includes('UMUM')) {
                        count = 5;
                    }

                    const letters = ['A', 'B', 'C', 'D', 'E', 'F', 'G'];
                    const options = [];
                    for (let i = 0; i < count; i++) {
                        options.push({
                            id: 'opt_' + Date.now() + '_' + letters[i] + '_' + Math.random().toString(36).substr(2, 4),
                            label: letters[i],
                            option_text: '',
                            is_correct: (i === 0),
                            score: (i === 0 ? 1.0 : 0.0),
                            match_key: null
                        });
                    }
                    return options;
                },

                goToStep(step) {
                    this.currentStep = step;
                },

                nextStep() {
                    if (this.currentStep === 2 && !this.form.title) {
                        alert('Silakan isi judul / nama ujian terlebih dahulu.');
                        return;
                    }
                    if (this.currentStep === 2 && !this.form.subject_id) {
                        alert('Silakan pilih mata pelajaran terlebih dahulu.');
                        return;
                    }
                    this.currentStep++;
                },

                generateToken() {
                    this.form.settings.token = 'ADZ' + Math.floor(100 + Math.random() * 900);
                },

                applyScoringPreset(presetId) {
                    this.form.settings.scoring_template = presetId;
                    if (presetId === 'standard') {
                        this.form.scoring_type = 'standard';
                        this.form.settings.formula_type = 'sum';
                    } else if (presetId === 'weighted') {
                        this.form.scoring_type = 'weighted';
                        this.form.settings.formula_type = 'sum';
                    } else if (presetId === 'partial') {
                        this.form.scoring_type = 'partial';
                        this.form.settings.formula_type = 'sum';
                    } else if (presetId === 'rubric') {
                        this.form.scoring_type = 'rubric';
                        this.form.settings.post_exam_policy.teacher_review_required = true;
                    } else if (presetId === 'manual') {
                        this.form.scoring_type = 'manual';
                        this.form.settings.post_exam_policy.teacher_review_required = true;
                    } else if (presetId === 'formula') {
                        this.form.scoring_type = 'formula';
                        this.form.settings.formula_type = 'weighted_percentage';
                        this.initSectionWeights();
                    } else if (presetId === 'utbk') {
                        this.form.scoring_type = 'conversion';
                        this.form.settings.post_exam_policy.show_ranking = true;
                    } else if (presetId === 'toefl') {
                        this.form.scoring_type = 'conversion';
                        this.form.settings.formula_type = 'sum';
                    } else if (presetId === 'custom') {
                        this.form.scoring_type = 'custom';
                    }

                    if (this.hasEssayQuestions()) {
                        this.form.settings.post_exam_policy.teacher_review_required = true;
                    }
                },

                getSectionWeight(secId) {
                    if (!this.form || !this.form.settings) return 0;
                    if (!this.form.settings.section_weights) {
                        this.form.settings.section_weights = {};
                    }
                    if (this.form.settings.section_weights[secId] === undefined) {
                        const count = this.form.sections.length || 1;
                        this.form.settings.section_weights[secId] = Math.floor(100 / count);
                    }
                    return this.form.settings.section_weights[secId];
                },

                setSectionWeight(secId, val) {
                    if (!this.form || !this.form.settings) return;
                    if (!this.form.settings.section_weights) {
                        this.form.settings.section_weights = {};
                    }
                    this.form.settings.section_weights[secId] = parseInt(val) || 0;
                },

                initSectionWeights() {
                    if (!this.form.settings.section_weights) {
                        this.form.settings.section_weights = {};
                    }
                    const count = this.form.sections.length;
                    if (count === 0) return;
                    const defaultWeight = Math.floor(100 / count);
                    let remainder = 100 - (defaultWeight * count);
                    this.form.sections.forEach((sec, idx) => {
                        if (this.form.settings.section_weights[sec.id] === undefined) {
                            this.form.settings.section_weights[sec.id] = defaultWeight + (idx === 0 ? remainder : 0);
                        }
                    });
                },

                getTotalSectionWeight() {
                    if (!this.form || !this.form.settings || !this.form.settings.section_weights) return 0;
                    let total = 0;
                    this.form.sections.forEach(sec => {
                        total += parseFloat(this.form.settings.section_weights[sec.id] || 0);
                    });
                    return total;
                },

                hasEssayQuestions() {
                    return this.form.sections.some(sec => {
                        return sec.items.some(it => {
                            if (it.is_group) {
                                return it.questions && it.questions.some(q => q.type === 'essay');
                            }
                            return it.type === 'essay';
                        });
                    });
                },

                addSection() {
                    const idx = this.form.sections.length + 1;
                    this.form.sections.push({
                        id: 'sec_' + Date.now() + '_' + idx,
                        title: 'Bagian ' + idx + ': Uraian / Essay',
                        instructions: 'Jawablah pertanyaan dengan jelas dan tepat.',
                        duration_minutes: null,
                        items: []
                    });
                },

                removeSection(idx) {
                    this.form.sections.splice(idx, 1);
                    if (this.activeSectionIdx >= this.form.sections.length) {
                        this.activeSectionIdx = Math.max(0, this.form.sections.length - 1);
                    }
                },

                getCurrentSection() {
                    return this.form.sections[this.activeSectionIdx] || this.form.sections[0];
                },

                addStandaloneQuestion(sectionIdx) {
                    const sec = this.form.sections[sectionIdx];
                    sec.items.push({
                        id: 'q_' + Date.now() + '_' + Math.random().toString(36).substr(2, 5),
                        is_group: false,
                        type: 'mcq_single',
                        prompt: '',
                        explanation: '',
                        points: 1.0,
                        settings: {
                            labels: ['Benar', 'Salah']
                        },
                        options: this.getDefaultMcqOptions()
                    });
                },

                addQuestionGroup(sectionIdx) {
                    const sec = this.form.sections[sectionIdx];
                    sec.items.push({
                        id: 'grp_' + Date.now() + '_' + Math.random().toString(36).substr(2, 5),
                        is_group: true,
                        title: 'Teks Narasi ' + (sec.items.length + 1),
                        stimulus_type: 'text',
                        stimulus_content: '',
                        questions: [
                            {
                                id: 'cq_' + Date.now(),
                                type: 'mcq_single',
                                prompt: '',
                                points: 1.0,
                                settings: {
                                    labels: ['Benar', 'Salah']
                                },
                                options: this.getDefaultMcqOptions()
                            }
                        ]
                    });
                },

                addChildQuestion(groupItem) {
                    if (!groupItem.questions) {
                        groupItem.questions = [];
                    }
                    groupItem.questions.push({
                        id: 'cq_' + Date.now() + '_' + Math.random().toString(36).substr(2, 5),
                        type: 'mcq_single',
                        prompt: '',
                        points: 1.0,
                        settings: {
                            labels: ['Benar', 'Salah']
                        },
                        options: this.getDefaultMcqOptions()
                    });
                    this.$nextTick(() => {
                        if (typeof window.triggerKaTeX === 'function') {
                            window.triggerKaTeX();
                        }
                    });
                },

                removeChildQuestion(groupItem, qIdx) {
                    groupItem.questions.splice(qIdx, 1);
                },

                removeItem(secIdx, itemIdx) {
                    this.form.sections[secIdx].items.splice(itemIdx, 1);
                },

                addOption(question) {
                    const letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    const nextLabel = letters[question.options.length] || (question.options.length + 1);
                    question.options.push({
                        id: 'opt_' + Date.now() + '_' + nextLabel,
                        label: nextLabel,
                        option_text: '',
                        is_correct: false,
                        score: 0.0,
                        match_key: null
                    });
                },

                removeOption(question, oIdx) {
                    question.options.splice(oIdx, 1);
                    const letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    if (['mcq_single', 'mcq_multiple', 'mcq_weighted'].includes(question.type)) {
                        question.options.forEach((opt, idx) => {
                            opt.label = letters[idx] || (idx + 1);
                        });
                        if (question.type === 'mcq_single') {
                            const hasCorrect = question.options.some(o => o.is_correct);
                            if (!hasCorrect && question.options.length > 0) {
                                question.options[0].is_correct = true;
                            }
                        }
                    }
                },

                setSingleCorrect(question, correctIdx) {
                    question.options.forEach((opt, idx) => {
                        opt.is_correct = (idx === correctIdx);
                    });
                },

                applyBinaryPreset(item, presetVal) {
                    if (!presetVal) return;
                    const parts = presetVal.split('|');
                    if (parts.length === 2) {
                        item.settings.labels = [parts[0], parts[1]];
                        // Update existing match_key to match new labels if applicable
                        item.options.forEach(opt => {
                            if (!opt.match_key || opt.match_key === 'Benar' || opt.match_key === parts[0]) {
                                opt.match_key = parts[0];
                            } else {
                                opt.match_key = parts[1];
                            }
                        });
                    }
                },

                addBinaryStatement(item) {
                    const idx = item.options.length + 1;
                    item.options.push({
                        id: 'stmt_' + Date.now() + '_' + idx,
                        label: idx.toString(),
                        option_text: '',
                        is_correct: true,
                        match_key: item.settings.labels[0] || 'Benar',
                        score: 1.0
                    });
                },

                addMatchingPair(item) {
                    const idx = item.options.length + 1;
                    item.options.push({
                        id: 'pair_' + Date.now() + '_' + idx,
                        label: idx.toString(),
                        option_text: '',
                        match_key: '',
                        is_correct: true,
                        score: 1.0
                    });
                },

                calculateTotalQuestions() {
                    let total = 0;
                    this.form.sections.forEach(sec => {
                        sec.items.forEach(item => {
                            if (item.is_group) {
                                total += item.questions.length;
                            } else {
                                total += 1;
                            }
                        });
                    });
                    return total;
                },

                calculateTotalPoints() {
                    let total = 0;
                    this.form.sections.forEach(sec => {
                        sec.items.forEach(item => {
                            if (item.is_group) {
                                item.questions.forEach(q => total += parseFloat(q.points || 0));
                            } else {
                                total += parseFloat(item.points || 0);
                            }
                        });
                    });
                    return total;
                },

                addPackage() {
                    const nextNum = (this.form.packages.length || 0) + 1;
                    const nextAttempts = nextNum <= 3 ? (nextNum === 1 ? 1 : (nextNum === 2 ? 3 : 7)) : (nextNum * 3);
                    const nextPrice = nextAttempts === 1 ? 10000 : (nextAttempts === 3 ? 25000 : (nextAttempts === 7 ? 50000 : nextAttempts * 7500));
                    this.form.packages.push({
                        name: 'Paket ' + nextAttempts + ' Percobaan',
                        price: nextPrice,
                        attempts: nextAttempts,
                        validity_days: 35
                    });
                },

                removePackage(index) {
                    if (this.form.packages.length <= 1) {
                        alert('Minimal harus ada 1 paket harga jika asesmen berbayar.');
                        return;
                    }
                    this.form.packages.splice(index, 1);
                },

                submitWizard() {
                    this.isSubmitting = true;

                    // Sinkronisasi otomatis kebijakan pasca ujian & pengawasan
                    this.form.settings.post_exam_policy = {
                        teacher_review_required: this.hasEssayQuestions(),
                        show_breakdown: true,
                        show_ranking: true,
                        show_instant_score: true,
                        release_mode: 'immediate'
                    };
                    if (!this.form.settings.proctoring_mode) {
                        this.form.settings.proctoring_mode = 'unproctored';
                    }

                    fetch('{{ route("assessments.store") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(this.form)
                    })
                    .then(response => {
                        if (!response.ok) {
                            return response.json().then(err => { throw err; });
                        }
                        return response.json();
                    })
                    .then(data => {
                        window.location.href = data.redirect_url;
                    })
                    .catch(err => {
                        this.isSubmitting = false;
                        alert('Terjadi kesalahan saat menyimpan: ' + (err.message || JSON.stringify(err)));
                    });
                }
            };
        };

        function assessmentWizard() {
            return window.assessmentWizard();
        }

        if (window.Alpine) {
            window.Alpine.data('assessmentWizard', window.assessmentWizard);
        } else {
            document.addEventListener('alpine:init', () => {
                window.Alpine.data('assessmentWizard', window.assessmentWizard);
            });
        }
    </script>

    <div x-data="assessmentWizard()" class="max-w-6xl mx-auto space-y-6 pb-12">
        <!-- Wizard Header & Stepper Progress -->
        <div class="bg-white border border-gray-6 rounded-2xl p-6 shadow-[0_1px_3px_rgba(0,0,0,0.03)]">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-gray-5 pb-5">
                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-green-11 bg-green-3 border border-green-6/50 px-2.5 py-1 rounded-md">
                        Wizard-Driven UX
                    </span>
                    <h1 class="font-display font-extrabold text-2xl text-gray-12 tracking-tight mt-1.5">
                        8 Langkah Pembuatan Ujian (Assessment)
                    </h1>
                    <p class="text-sm text-gray-11">Panduan langkah demi langkah menyusun ujian terstruktur, stimulus narasi, dan butir soal.</p>
                </div>
                
                <div class="flex items-center gap-3">
                    <span class="text-xs font-mono font-bold text-gray-11">
                        Langkah <span x-text="currentStep" class="text-green-11 text-base"></span> dari 8
                    </span>
                    <div class="w-32 h-2.5 bg-gray-4 rounded-full overflow-hidden">
                        <div class="h-full bg-green-9 transition-all duration-300 rounded-full" :style="'width: ' + (currentStep / 8 * 100) + '%'"></div>
                    </div>
                </div>
            </div>

            <!-- Stepper Indicators -->
            <div class="grid grid-cols-4 sm:grid-cols-8 gap-2 pt-5">
                <template x-for="(stepName, index) in stepNames" :key="index">
                    <button type="button" 
                            @click="goToStep(index + 1)"
                            :class="currentStep === (index + 1) ? 'border-green-8 bg-green-3 text-green-11 font-bold' : (currentStep > (index + 1) ? 'border-gray-6 bg-gray-2 text-gray-12' : 'border-gray-5 bg-white text-gray-8')"
                            class="flex flex-col items-center text-center p-2 rounded-xl border text-xs transition-all cursor-pointer hover:border-green-7">
                        <span class="w-5 h-5 rounded-full flex items-center justify-center text-[10px] font-bold mb-1"
                              :class="currentStep === (index + 1) ? 'bg-green-9 text-white' : (currentStep > (index + 1) ? 'bg-gray-12 text-white' : 'bg-gray-4 text-gray-11')"
                              x-text="index + 1"></span>
                        <span class="truncate w-full text-[11px]" x-text="stepName"></span>
                    </button>
                </template>
            </div>
        </div>

        <!-- Wizard Step Content Cards -->
        <div class="bg-white border border-gray-6 rounded-2xl p-6 md:p-8 shadow-[0_1px_3px_rgba(0,0,0,0.03)] min-h-[500px]">
            
            <!-- ============================================== -->
            <!-- STEP 1: PILIH ASSESSMENT (TIPE UJIAN)          -->
            <!-- ============================================== -->
            <div x-show="currentStep === 1" x-transition.opacity class="space-y-6">
                <div class="border-b border-gray-5 pb-4">
                    <h2 class="font-display font-bold text-lg text-gray-12">Langkah 1: Pilih Tipe Asesmen & Template</h2>
                    <p class="text-xs text-gray-11">Pilih format asesmen yang ingin Anda buat untuk mengidentifikasi template penilaian otomatis.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($assessmentTypes as $type)
                        @php
                            $bgClass = 'bg-white border-gray-6 hover:border-gray-7';
                            $iconColor = 'bg-green-3 text-green-11';
                            $selectedBg = 'bg-green-2/40';
                            $selectedRing = 'ring-green-7 border-green-8';
                            $textHover = 'group-hover:text-green-11';
                            $titleColor = 'text-gray-12';
                            $descColor = 'text-gray-11';
                            $badgeStyle = 'bg-gray-3 text-gray-11 border-gray-5';
                            $inlineStyle = '';

                            if (in_array($type['id'], ['tka', 'utbk'])) {
                                $bgClass = 'border-[#4dabf7]';
                                $inlineStyle = 'background-color: #4dabf7;';
                                $iconColor = 'bg-white/20 text-white';
                                $selectedBg = '';
                                $selectedRing = 'ring-white border-white';
                                $textHover = 'group-hover:text-white';
                                $titleColor = 'text-white';
                                $descColor = 'text-white/90';
                                $badgeStyle = 'bg-white/20 text-white border-transparent';
                            } elseif (in_array($type['id'], ['toeic', 'toefl', 'ielts'])) {
                                $bgClass = 'border-[#EFBF04]';
                                $inlineStyle = 'background-color: #EFBF04;';
                                $iconColor = 'bg-black/10 text-[#1c1e21]';
                                $selectedBg = '';
                                $selectedRing = 'ring-white border-white';
                                $textHover = 'group-hover:text-[#1c1e21]';
                                $titleColor = 'text-[#1c1e21]';
                                $descColor = 'text-[#1c1e21]/80';
                                $badgeStyle = 'bg-black/10 text-[#1c1e21] border-transparent';
                            }
                        @endphp
                        <div @click="selectAssessmentType('{{ $type['id'] }}')"
                             :class="form.type === '{{ $type['id'] }}' ? '{{ $selectedBg }} ring-2 {{ $selectedRing }} shadow-md' : '{{ $bgClass }}'"
                             style="{{ $inlineStyle }}"
                             class="p-5 rounded-2xl border transition-all cursor-pointer flex flex-col justify-between group">
                            <div>
                                <div class="flex items-center justify-between mb-3">
                                    <span class="w-9 h-9 rounded-xl {{ $iconColor }} flex items-center justify-center">
                                        <x-radix-icon name="{{ $type['icon'] }}" class="w-5 h-5" />
                                    </span>
                                    <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded-md {{ $badgeStyle }} border">
                                        {{ $type['badge'] }}
                                    </span>
                                </div>
                                <h3 class="font-display font-bold text-base {{ $titleColor }} {{ $textHover }} transition-colors">
                                    {{ $type['name'] }}
                                </h3>
                                <p class="text-xs {{ $descColor }} mt-1.5 leading-relaxed">
                                    {{ $type['desc'] }}
                                </p>
                            </div>
                            @if($type['id'] === 'utbk')
                                <div class="mt-4 pt-3 border-t border-white/20 flex flex-col gap-2" @click.stop="">
                                    <div class="text-[11px] text-white/90 font-medium">Pilih Paket Ujian UTBK:</div>
                                    <div class="grid grid-cols-2 gap-2">
                                        <button type="button" @click.stop="selectUtbkPreset('tps')" 
                                                class="px-2.5 py-1.5 rounded-xl text-xs font-bold transition-all shadow-xs flex items-center justify-center cursor-pointer text-center"
                                                :class="form.type === 'utbk' && form.utbk_package === 'tps' ? 'bg-white text-[#1971c2] ring-2 ring-white shadow-md' : 'bg-white/20 hover:bg-white/30 text-white border border-white/30'">
                                            TPS (4 Subtes &bull; 90m)
                                        </button>
                                        <button type="button" @click.stop="selectUtbkPreset('literasi')" 
                                                class="px-2.5 py-1.5 rounded-xl text-xs font-bold transition-all shadow-xs flex items-center justify-center cursor-pointer text-center"
                                                :class="form.type === 'utbk' && form.utbk_package === 'literasi' ? 'bg-white text-[#1971c2] ring-2 ring-white shadow-md' : 'bg-white/20 hover:bg-white/30 text-white border border-white/30'">
                                            Literasi Numerasi (3 Subtes &bull; 120m)
                                        </button>
                                    </div>
                                </div>
                            @else
                                <div class="mt-4 pt-3 border-t border-black/10 flex items-center justify-between text-xs">
                                    <span class="font-semibold" :class="form.type === '{{ $type['id'] }}' ? '{{ $titleColor }}' : '{{ $titleColor }} opacity-70'">
                                        <span x-text="form.type === '{{ $type['id'] }}' ? '✓ Terpilih' : 'Pilih Template'"></span>
                                    </span>
                                    <x-radix-icon name="arrow-right" class="w-4 h-4 {{ $titleColor }} opacity-70 group-hover:translate-x-1 transition-transform" />
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>

                <!-- Navigation Step 1 -->
                <div class="flex items-center justify-end pt-6 border-t border-gray-5 mt-6">
                    <button type="button" @click="nextStep()" 
                            class="px-6 py-2.5 rounded-xl bg-green-9 hover:bg-green-10 active:bg-green-11 text-white text-sm font-semibold transition-all shadow-xs cursor-pointer flex items-center gap-2">
                        <span>Lanjutkan ke Langkah 2: Informasi</span>
                        <x-radix-icon name="arrow-right" class="w-4 h-4" />
                    </button>
                </div>
            </div>

            <!-- ============================================== -->
            <!-- STEP 2: INFORMASI DASAR ASESMEN                -->
            <!-- ============================================== -->
            <div x-show="currentStep === 2" x-transition.opacity class="space-y-6">
                <div class="border-b border-gray-5 pb-4">
                    <h2 class="font-display font-bold text-lg text-gray-12">Langkah 2: Informasi Umum Ujian</h2>
                    <p class="text-xs text-gray-11">Lengkapi rincian dasar seperti nama ujian, mata pelajaran, jenjang kelas, dan petunjuk.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="md:col-span-2 space-y-1.5">
                        <label class="block text-sm font-semibold text-gray-12">Nama / Judul Ujian <span class="text-red-9">*</span></label>
                        <input type="text" x-model="form.title" placeholder="Contoh: Penilaian Harian Matematika Wajib Bab Trigonometri"
                               class="w-full rounded-xl border border-gray-7 bg-white px-4 py-2.5 text-base text-gray-12 placeholder:text-gray-8 outline-none focus:border-green-8 focus:ring-1 focus:ring-green-8">
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-sm font-semibold text-gray-12">Mata Pelajaran <span class="text-red-9">*</span></label>
                        <select x-model="form.subject_id" class="w-full rounded-xl border border-gray-7 bg-white px-4 py-2.5 text-base text-gray-12 outline-none focus:border-green-8 focus:ring-1 focus:ring-green-8 cursor-pointer">
                            <option value="">-- Pilih Mata Pelajaran --</option>
                            <template x-for="sub in subjectsList" :key="sub.id">
                                <option :value="sub.id" x-text="sub.name + (sub.code ? ' (' + sub.code + ')' : '')"></option>
                            </template>
                        </select>
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-sm font-semibold text-gray-12">Tingkat Kelas / Jenjang</label>
                        <select x-model="form.grade_level" class="w-full rounded-xl border border-gray-7 bg-white px-4 py-2.5 text-base text-gray-12 outline-none focus:border-green-8 focus:ring-1 focus:ring-green-8 cursor-pointer">
                            <option value="">-- Pilih Tingkat Kelas / Jenjang --</option>
                            @foreach($gradeLevels as $group => $grades)
                                <optgroup label="{{ $group ?: 'Lainnya' }}">
                                    @foreach($grades as $grade)
                                        <option value="{{ $grade->value }}">{{ $grade->name }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div>

                    <div class="md:col-span-2 space-y-1.5">
                        <div class="flex items-center justify-between">
                            <label class="block text-sm font-semibold text-gray-12">Alokasi Waktu Default (Menit)</label>
                            <span x-show="isStandardLockedType()" class="text-[10px] bg-red-2 text-red-11 border border-red-5 px-2 py-0.5 rounded flex items-center gap-1">
                                <x-radix-icon name="lock-closed" class="w-3 h-3"/> Terkunci (Standar Baku)
                            </span>
                        </div>
                        <input type="number" x-model="form.duration_minutes" min="5" max="300"
                               :disabled="isStandardLockedType()"
                               :class="isStandardLockedType() ? 'bg-gray-2 text-gray-9 cursor-not-allowed' : 'bg-white text-gray-12 focus:border-green-8 focus:ring-1 focus:ring-green-8'"
                               class="w-full rounded-xl border border-gray-7 px-4 py-2.5 text-base outline-none">
                    </div>

                    <div class="md:col-span-2 space-y-1.5 editor-container">
                        <div class="flex items-center justify-between">
                            <label class="block text-sm font-semibold text-gray-12">Deskripsi & Petunjuk Pengerjaan</label>
                            <div class="flex items-center gap-1">
                                <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), form, 'description', '# ', '\n', true)" class="px-2 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[11px] font-bold text-gray-12 border border-gray-5 cursor-pointer" title="Judul Utama (H1)">H1</button>
                                <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), form, 'description', '## ', '\n', true)" class="px-2 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[11px] font-bold text-gray-12 border border-gray-5 cursor-pointer" title="Sub Judul (H2)">H2</button>
                                <button type="button" @mousedown.prevent="" @click="insertTableFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), form, 'description')" class="px-2 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[11px] font-bold text-gray-12 border border-gray-5 cursor-pointer flex items-center gap-1" title="Sisipkan Tabel">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-10v16M4 4h16a1 1 0 011 1v14a1 1 0 01-1 1H4a1 1 0 01-1-1V5a1 1 0 011-1z"/></svg>
                                    <span>Tabel</span>
                                </button>
                                <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), form, 'description', '**', '**')" class="px-2 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[11px] font-bold text-gray-12 border border-gray-5 cursor-pointer" title="Tebal (Bold)">B</button>
                                <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), form, 'description', '*', '*')" class="px-2 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[11px] italic font-serif text-gray-12 border border-gray-5 cursor-pointer" title="Miring (Italic)">I</button>
                                <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), form, 'description', '<u>', '</u>')" class="px-2 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[11px] underline text-gray-12 border border-gray-5 cursor-pointer" title="Garis Bawah (Underline)">U</button>
                                <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), form, 'description', '$$', '$$')" class="px-2 py-0.5 rounded bg-purple-2 hover:bg-purple-3 text-[11px] font-mono font-bold text-purple-11 border border-purple-5 cursor-pointer" title="Rumus Matematika / LaTeX ($$...$$)">$$f(x)$$</button>
                                <button type="button" @mousedown.prevent="" @click="triggerMediaUpload($event.currentTarget.closest('.editor-container').querySelector('textarea'), form, 'description')" class="px-2 py-0.5 rounded bg-sky-2 hover:bg-sky-3 text-[11px] font-bold text-sky-11 border border-sky-5 cursor-pointer" title="Upload Media (Gambar, Audio, Video)">media</button>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <textarea x-model="form.description" 
                                      @select="recordSelection($event.target)" 
                                      @keyup="recordSelection($event.target)" 
                                      @mouseup="recordSelection($event.target)"
                                      rows="3" placeholder="Tuliskan petunjuk umum untuk siswa sebelum memulai ujian... (Mendukung # Judul, ## Sub Judul, **tebal**, *miring*, <u>garis bawah</u>, dan $$LATEX$$)"
                                      class="w-full rounded-xl border border-gray-7 bg-white px-4 py-2.5 text-sm text-gray-12 outline-none focus:border-green-8 focus:ring-1 focus:ring-green-8 font-sans leading-relaxed resize-y"></textarea>
                            <div style="background-color: #b2f2bb;" class="rounded-xl border border-gray-6  px-4 py-2.5 text-sm text-gray-12 overflow-y-auto min-h-[80px] max-h-[250px] prose prose-sm max-w-none" x-html="renderRichPreview(form.description)"></div>
                        </div>
                    </div>
                </div>

                <!-- Navigation Step 2 -->
                <div class="flex items-center justify-between pt-6 border-t border-gray-5 mt-6">
                    <button type="button" @click="currentStep--" 
                            class="px-5 py-2.5 rounded-xl border border-gray-6 bg-white hover:bg-gray-3 text-sm font-semibold text-gray-12 transition-colors cursor-pointer flex items-center gap-2">
                        <x-radix-icon name="arrow-left" class="w-4 h-4" />
                        <span>Sebelumnya</span>
                    </button>
                    <button type="button" @click="nextStep()" 
                            class="px-6 py-2.5 rounded-xl bg-green-9 hover:bg-green-10 active:bg-green-11 text-white text-sm font-semibold transition-all shadow-xs cursor-pointer flex items-center gap-2">
                        <span>Lanjutkan ke Langkah 3: Section</span>
                        <x-radix-icon name="arrow-right" class="w-4 h-4" />
                    </button>
                </div>
            </div>

            <!-- ============================================== -->
            <!-- STEP 3: SECTION / PEMBAGIAN UJIAN              -->
            <!-- ============================================== -->
            <div x-show="currentStep === 3" x-transition.opacity class="space-y-6">
                <div class="flex items-center justify-between border-b border-gray-5 pb-4">
                    <div>
                        <h2 class="font-display font-bold text-lg text-gray-12">Langkah 3: Pengaturan Section (Bagian Ujian)</h2>
                        <p class="text-xs text-gray-11">Bagi ujian ke dalam beberapa bagian logis (misal: Pilihan Ganda & Essay, atau Listening & Reading).</p>
                    </div>
                    <button type="button" x-show="!isStandardLockedType()" @click="addSection()" class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl bg-green-9 text-white text-xs font-semibold hover:bg-green-10 transition-colors shadow-xs cursor-pointer">
                        <x-radix-icon name="plus" class="w-4 h-4" />
                        <span>Tambah Bagian</span>
                    </button>
                </div>

                <div x-show="isStandardLockedType()" class="bg-yellow-2 border border-yellow-5 text-yellow-11 px-4 py-3 rounded-xl text-sm flex gap-3 items-start">
                    <x-radix-icon name="info-circled" class="w-5 h-5 flex-shrink-0 mt-0.5" />
                    <div>
                        <strong class="block mb-1">Struktur Bagian Telah Dibakukan</strong>
                        <p>Struktur bagian telah dibakukan sesuai standar resmi pengujian internasional yang Anda pilih. Anda tidak dapat menambah atau menghapus bagian.</p>
                    </div>
                </div>

                <div class="space-y-4">
                    <template x-for="(sec, secIdx) in form.sections" :key="sec.id">
                        <div class="p-5 rounded-2xl border border-gray-6 bg-gray-2/30 space-y-4 relative">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <span class="w-7 h-7 rounded-lg bg-green-9 text-white flex items-center justify-center font-bold text-xs" x-text="secIdx + 1"></span>
                                    <h3 class="font-display font-bold text-sm text-gray-12" x-text="sec.title || ('Bagian ' + (secIdx + 1))"></h3>
                                </div>
                                <button type="button" x-show="form.sections.length > 1 && !isStandardLockedType()" @click="removeSection(secIdx)" class="text-red-9 hover:text-red-11 p-1 rounded-lg hover:bg-red-3 transition-colors cursor-pointer" title="Hapus Bagian">
                                    <x-radix-icon name="trash" class="w-4 h-4" />
                                </button>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="md:col-span-2 space-y-1">
                                    <label class="text-xs font-semibold text-gray-11">Nama Bagian / Section</label>
                                    <input type="text" x-model="sec.title" placeholder="Contoh: Bagian 1: Pilihan Ganda"
                                           :disabled="isStandardLockedType()"
                                           :class="isStandardLockedType() ? 'bg-gray-2 text-gray-9 cursor-not-allowed border-gray-5' : 'bg-white text-gray-12 focus:border-green-8 border-gray-6'"
                                           class="w-full rounded-xl px-3.5 py-2 text-sm outline-none border">
                                </div>
                                <div class="space-y-1">
                                    <label class="text-xs font-semibold text-gray-11">Durasi Khusus (Menit, Opsional)</label>
                                    <input type="number" x-model="sec.duration_minutes" placeholder="Opsional"
                                           :disabled="isStandardLockedType()"
                                           :class="isStandardLockedType() ? 'bg-gray-2 text-gray-9 cursor-not-allowed border-gray-5' : 'bg-white text-gray-12 focus:border-green-8 border-gray-6'"
                                           class="w-full rounded-xl px-3.5 py-2 text-sm outline-none border">
                                </div>
                                <div class="md:col-span-3 space-y-1">
                                    <label class="text-xs font-semibold text-gray-11">Petunjuk Khusus Bagian Ini</label>
                                    <input type="text" x-model="sec.instructions" placeholder="Petunjuk khusus bagian ini..."
                                           class="w-full rounded-xl border border-gray-6 bg-white px-3.5 py-2 text-sm text-gray-12 outline-none focus:border-green-8">
                                </div>
                            </div>
                        </div>
                    </template>
                </div>

                <!-- Navigation Step 3 -->
                <div class="flex items-center justify-between pt-6 border-t border-gray-5 mt-6">
                    <button type="button" @click="currentStep--" 
                            class="px-5 py-2.5 rounded-xl border border-gray-6 bg-white hover:bg-gray-3 text-sm font-semibold text-gray-12 transition-colors cursor-pointer flex items-center gap-2">
                        <x-radix-icon name="arrow-left" class="w-4 h-4" />
                        <span>Sebelumnya</span>
                    </button>
                    <button type="button" @click="nextStep()" 
                            class="px-6 py-2.5 rounded-xl bg-green-9 hover:bg-green-10 active:bg-green-11 text-white text-sm font-semibold transition-all shadow-xs cursor-pointer flex items-center gap-2">
                        <span>Lanjutkan ke Langkah 4: Soal</span>
                        <x-radix-icon name="arrow-right" class="w-4 h-4" />
                    </button>
                </div>
            </div>

            <!-- ============================================== -->
            <!-- STEP 4: PEMBUATAN SOAL (8 TIPE SOAL & NARASI)   -->
            <!-- ============================================== -->
            <div x-show="currentStep === 4" x-transition.opacity class="space-y-6">
                <div class="border-b border-gray-5 pb-4">
                    <h2 class="font-display font-bold text-lg text-gray-12">Langkah 4: Butir Soal & Stimulus Narasi</h2>
                    <p class="text-xs text-gray-11">Kelola butir soal pada masing-masing bagian (section). Buat soal tunggal, stimulus narasi berseri, atau import soal dari dokumen.</p>
                </div>

                <!-- BLOK PER SECTION (BLOK = SECTION) -->
                <div class="space-y-8">
                    <template x-for="(sec, secIdx) in form.sections" :key="sec.id">
                        <div class="border border-gray-6 rounded-2xl bg-white shadow-xs overflow-hidden">
                            <!-- Section Header Bar -->
                            <div class="bg-gray-2/70 px-6 py-4 border-b border-gray-5 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                                <div class="flex items-center gap-3">
                                    <span class="w-8 h-8 rounded-xl bg-green-9 text-white flex items-center justify-center font-bold text-xs" x-text="secIdx + 1"></span>
                                    <div>
                                        <div class="flex items-center gap-2">
                                            <h3 class="font-display font-bold text-base text-gray-12" x-text="sec.title || ('Bagian ' + (secIdx + 1))"></h3>
                                            <template x-if="sec.duration_minutes">
                                                <span class="text-[11px] font-mono font-semibold text-gray-11 bg-white px-2 py-0.5 rounded-md border border-gray-5" x-text="sec.duration_minutes + ' mnt'"></span>
                                            </template>
                                        </div>
                                        <template x-if="sec.instructions">
                                            <p class="text-xs text-gray-11 mt-0.5" x-text="sec.instructions"></p>
                                        </template>
                                    </div>
                                </div>

                                <!-- Section Action Buttons -->
                                <div class="flex flex-wrap items-center gap-2">
                                    <button type="button" @click="addStandaloneQuestion(secIdx)"
                                            class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-white border border-gray-6 hover:border-green-8 text-gray-12 hover:text-green-11 font-semibold text-xs transition-colors shadow-2xs cursor-pointer">
                                        <x-radix-icon name="file-text" class="w-4 h-4 text-green-9" />
                                        <span>Soal Tunggal</span>
                                    </button>
                                    <button type="button" @click="addQuestionGroup(secIdx)"
                                            class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-green-3 border border-green-6/60 text-green-11 font-semibold text-xs hover:bg-green-4 transition-colors shadow-2xs cursor-pointer">
                                        <x-radix-icon name="reader" class="w-4 h-4" />
                                        <span>Soal Berseri (Stimulus Narasi)</span>
                                    </button>
                                    <button type="button" @click="openImportModal(secIdx)"
                                            class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-blue-3 border border-blue-6/60 text-blue-11 font-semibold text-xs hover:bg-blue-4 transition-colors shadow-2xs cursor-pointer">
                                        <x-radix-icon name="card-stack-plus" class="w-4 h-4" />
                                        <span>Import Soal</span>
                                    </button>
                                    <button type="button" @click="openFormatModal()"
                                            class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-gray-3 border border-gray-5 text-gray-12 font-semibold text-xs hover:bg-gray-4 transition-colors shadow-2xs cursor-pointer">
                                        <x-radix-icon name="bookmark" class="w-4 h-4" />
                                        <span>Download Contoh/Format</span>
                                    </button>
                                </div>
                            </div>

                            <!-- Section Body: Items in this section -->
                            <div class="p-6 space-y-6">
                                <template x-if="sec.items.length === 0">
                                    <div class="text-center py-10 border-2 border-dashed border-gray-5 rounded-xl bg-gray-1/40">
                                        <p class="text-sm font-semibold text-gray-11">Belum ada soal di bagian ini.</p>
                                        <p class="text-xs text-gray-9 mt-1">Gunakan tombol "Soal Tunggal", "Soal Berseri", atau "Import Soal" di atas untuk menambahkan.</p>
                                    </div>
                                </template>

                                <template x-for="(item, itemIdx) in sec.items" :key="item.id">
                                    <div>
                            <!-- ========================================== -->
                            <!-- ITEM CASE 1: QUESTION GROUP (STIMULUS)     -->
                            <!-- ========================================== -->
                            <template x-if="item.is_group">
                                <div class="border-2 border-green-7/50 bg-green-2/20 rounded-2xl p-5 space-y-4">
                                    <div class="flex items-center justify-between border-b border-green-6/50 pb-3">
                                        <div class="flex items-center gap-2.5">
                                            <span class="px-2.5 py-1 rounded-md bg-green-9 text-white font-bold text-xs uppercase tracking-wider">
                                                Stimulus Narasi #<span x-text="itemIdx + 1"></span>
                                            </span>
                                            <input type="text" x-model="item.title" placeholder="Judul Stimulus Narasi (misal: Teks Bacaan 1)"
                                                   class="bg-white border border-gray-6 rounded-lg px-3 py-1 text-xs font-semibold text-gray-12 outline-none focus:border-green-8 w-64">
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <button type="button" @click="addChildQuestion(item)" class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-green-3 text-green-11 border border-green-6/50 text-xs font-bold hover:bg-green-4 cursor-pointer">
                                                <x-radix-icon name="plus" class="w-3.5 h-3.5" />
                                                <span>Tambah Anak Soal</span>
                                            </button>
                                            <button type="button" @click="removeItem(secIdx, itemIdx)" class="text-red-9 hover:text-red-11 p-1 rounded-lg hover:bg-red-3 cursor-pointer">
                                                <x-radix-icon name="trash" class="w-4 h-4" />
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Stimulus Content Editor -->
                                    <div class="space-y-1.5 editor-container">
                                        <div class="flex items-center justify-between">
                                            <label class="block text-xs font-bold text-gray-12">Konten Stimulus / Narasi (Paragraf, Dialog, atau Konteks):</label>
                                            <div class="flex items-center gap-1">
                                                <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), item, 'stimulus_content', '# ', '\n', true)" class="px-2 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[11px] font-bold text-gray-12 border border-gray-5 cursor-pointer" title="Judul Utama (H1)">H1</button>
                                                <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), item, 'stimulus_content', '## ', '\n', true)" class="px-2 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[11px] font-bold text-gray-12 border border-gray-5 cursor-pointer" title="Sub Judul (H2)">H2</button>
                                                <button type="button" @mousedown.prevent="" @click="insertTableFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), item, 'stimulus_content')" class="px-2 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[11px] font-bold text-gray-12 border border-gray-5 cursor-pointer flex items-center gap-1" title="Sisipkan Tabel">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-10v16M4 4h16a1 1 0 011 1v14a1 1 0 01-1 1H4a1 1 0 01-1-1V5a1 1 0 011-1z"/></svg>
                                                    <span>Tabel</span>
                                                </button>
                                                <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), item, 'stimulus_content', '**', '**')" class="px-2 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[11px] font-bold text-gray-12 border border-gray-5 cursor-pointer" title="Tebal (Bold)">B</button>
                                                <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), item, 'stimulus_content', '*', '*')" class="px-2 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[11px] italic font-serif text-gray-12 border border-gray-5 cursor-pointer" title="Miring (Italic)">I</button>
                                                <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), item, 'stimulus_content', '<u>', '</u>')" class="px-2 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[11px] underline text-gray-12 border border-gray-5 cursor-pointer" title="Garis Bawah (Underline)">U</button>
                                                <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), item, 'stimulus_content', '$$', '$$')" class="px-2 py-0.5 rounded bg-purple-2 hover:bg-purple-3 text-[11px] font-mono font-bold text-purple-11 border border-purple-5 cursor-pointer" title="Rumus Matematika / LaTeX ($$...$$)">$$f(x)$$</button>
                                                <button type="button" @mousedown.prevent="" @click="triggerMediaUpload($event.currentTarget.closest('.editor-container').querySelector('textarea'), item, 'stimulus_content')" class="px-2 py-0.5 rounded bg-sky-2 hover:bg-sky-3 text-[11px] font-bold text-sky-11 border border-sky-5 cursor-pointer" title="Upload Media (Gambar, Audio, Video)">media</button>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                            <div>
                                                <textarea x-model="item.stimulus_content" 
                                                          @select="recordSelection($event.target)" 
                                                          @keyup="recordSelection($event.target)" 
                                                          @mouseup="recordSelection($event.target)" 
                                                          rows="5" placeholder="Ketik atau tempelkan teks narasi wacana di sini... (Mendukung # Judul, ## Sub Judul, **tebal**, *miring*, <u>garis bawah</u>, $$LATEX$$, serta upload gambar, audio, dan video)"
                                                          class="w-full rounded-xl border border-gray-6 bg-white p-3 text-sm text-gray-12 outline-none focus:border-green-8 leading-relaxed font-sans resize-y min-h-[120px]"></textarea>
                                                <p class="text-[11px] text-gray-9 mt-1">Mendukung format Markdown, rumus LaTeX, serta sisipan media gambar, audio, dan video (autoplay otomatis saat ujian).</p>
                                            </div>
                                            <div style="background-color: #b2f2bb;" class="rounded-xl border border-gray-5  p-3 text-sm text-gray-12 overflow-y-auto min-h-[120px] max-h-[350px] prose prose-sm max-w-none shadow-inner" x-html="renderRichPreview(item.stimulus_content)"></div>
                                        </div>
                                    </div>

                                    <!-- Child Questions in this Group -->
                                    <div class="space-y-4 pl-4 border-l-2 border-green-7/60">
                                        <h4 class="text-xs font-bold text-gray-11 uppercase tracking-wider">Anak Soal Berdasarkan Narasi Di Atas:</h4>
                                        <template x-for="(childQ, qIdx) in item.questions" :key="childQ.id">
                                            <div class="bg-white border border-gray-6 rounded-xl p-4 space-y-3 shadow-xs">
                                                <!-- Child Question Header -->
                                                <div class="flex items-center justify-between border-b border-gray-5 pb-2.5">
                                                    <div class="flex items-center gap-2">
                                                        <span class="w-6 h-6 rounded-md bg-gray-12 text-white flex items-center justify-center text-xs font-bold" x-text="qIdx + 1"></span>
                                                        <select x-model="childQ.type" class="rounded-lg border border-gray-6 px-2.5 py-1 text-xs font-bold text-gray-12 outline-none cursor-pointer">
                                                            <option value="mcq_single">Pilihan Ganda (Single Choice)</option>
                                                            <option value="mcq_multiple">Pilihan Ganda Multiple Answer</option>
                                                            <option value="mcq_weighted">Pilihan Ganda Berbobot (1-5)</option>
                                                            <option value="binary_matrix">Tabel Dikotomi (Benar/Salah Dinamis)</option>
                                                            <option value="matching">Menjodohkan (Matching)</option>
                                                            <option value="ordering">Mengurutkan (Sequencing)</option>
                                                            <option value="short_answer">Isian Singkat / Numerik</option>
                                                            <option value="essay">Essay / Uraian</option>
                                                        </select>
                                                    </div>
                                                    <div class="flex items-center gap-3">
                                                        <div class="flex items-center gap-1.5">
                                                            <span class="text-xs text-gray-11 font-medium">Poin:</span>
                                                            <input type="number" x-model="childQ.points" step="0.5" class="w-16 rounded-md border border-gray-6 px-2 py-0.5 text-xs text-center font-bold text-gray-12">
                                                        </div>
                                                        <button type="button" @click="removeChildQuestion(item, qIdx)" class="text-red-9 hover:text-red-11 p-1 cursor-pointer">
                                                            <x-radix-icon name="trash" class="w-4 h-4" />
                                                        </button>
                                                    </div>
                                                </div>

                                                <!-- Render Question Body by Type -->
                                                <div class="space-y-3">
                                                    <!-- Formatting Toolbar & Live Preview -->
                                                    <div class="editor-container space-y-1.5">
                                                        <div class="flex items-center justify-between gap-2">
                                                            <div class="flex items-center gap-1">
                                                                <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), childQ, 'prompt', '# ', '\n', true)" class="px-2 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[11px] font-bold text-gray-12 border border-gray-5 cursor-pointer" title="Judul (H1)">H1</button>
                                                                <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), childQ, 'prompt', '## ', '\n', true)" class="px-2 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[11px] font-bold text-gray-12 border border-gray-5 cursor-pointer" title="Sub Judul (H2)">H2</button>
                                                                <button type="button" @mousedown.prevent="" @click="insertTableFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), childQ, 'prompt')" class="px-2 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[11px] font-bold text-gray-12 border border-gray-5 cursor-pointer flex items-center gap-1" title="Sisipkan Tabel">
                                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-10v16M4 4h16a1 1 0 011 1v14a1 1 0 01-1 1H4a1 1 0 01-1-1V5a1 1 0 011-1z"/></svg>
                                                                    <span>Tabel</span>
                                                                </button>
                                                                <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), childQ, 'prompt', '**', '**')" class="px-2 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[11px] font-bold text-gray-12 border border-gray-5 cursor-pointer" title="Tebal (Bold)">B</button>
                                                                <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), childQ, 'prompt', '*', '*')" class="px-2 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[11px] italic font-serif text-gray-12 border border-gray-5 cursor-pointer" title="Miring (Italic)">I</button>
                                                                <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), childQ, 'prompt', '<u>', '</u>')" class="px-2 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[11px] underline text-gray-12 border border-gray-5 cursor-pointer" title="Garis Bawah (Underline)">U</button>
                                                                <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), childQ, 'prompt', '$$', '$$')" class="px-2 py-0.5 rounded bg-purple-2 hover:bg-purple-3 text-[11px] font-mono font-bold text-purple-11 border border-purple-5 cursor-pointer" title="Rumus Matematika / LaTeX ($$...$$)">$$f(x)$$</button>
                                                                <button type="button" @mousedown.prevent="" @click="triggerMediaUpload($event.currentTarget.closest('.editor-container').querySelector('textarea'), childQ, 'prompt')" class="px-2 py-0.5 rounded bg-sky-2 hover:bg-sky-3 text-[11px] font-bold text-sky-11 border border-sky-5 cursor-pointer" title="Upload Media (Gambar, Audio, Video)">media</button>
                                                            </div>
                                                        </div>
                                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                                            <textarea x-model="childQ.prompt" 
                                                                      @select="recordSelection($event.target)" 
                                                                      @keyup="recordSelection($event.target)" 
                                                                      @mouseup="recordSelection($event.target)"
                                                                      rows="2" placeholder="Tuliskan pertanyaan / butir soal... (Gunakan $$...$$ untuk rumus matematika LaTeX)"
                                                                      class="w-full rounded-xl border border-gray-6 px-3.5 py-2 text-sm text-gray-12 outline-none focus:border-green-8 font-sans resize-y"></textarea>
                                                            <div style="background-color: #b2f2bb;" class="rounded-xl border border-gray-5  px-3.5 py-2 text-sm text-gray-12 overflow-y-auto min-h-[60px] max-h-[200px] prose prose-sm max-w-none" x-html="renderRichPreview(childQ.prompt)"></div>
                                                        </div>
                                                    </div>

                                                    <!-- Child Question Options: MCQ -->
                                                    <template x-if="childQ.type === 'mcq_single' || childQ.type === 'mcq_multiple' || childQ.type === 'mcq_weighted'">
                                                        <div class="space-y-2 pt-2">
                                                            <div class="flex items-center justify-between">
                                                                <span class="text-xs font-bold text-gray-11">Pilihan Jawaban:</span>
                                                                <button type="button" @click="addOption(childQ)" class="text-xs font-bold text-green-11 hover:underline cursor-pointer">+ Tambah Opsi</button>
                                                            </div>
                                                            <template x-for="(opt, oIdx) in childQ.options" :key="opt.id">
                                                                <div class="flex items-center gap-2.5">
                                                                    <template x-if="childQ.type === 'mcq_single'">
                                                                        <input type="radio" :name="'correct_' + childQ.id" :checked="opt.is_correct" @change="setSingleCorrect(childQ, oIdx)" class="text-green-9 focus:ring-green-8 cursor-pointer">
                                                                    </template>
                                                                    <template x-if="childQ.type === 'mcq_multiple'">
                                                                        <input type="checkbox" x-model="opt.is_correct" class="rounded text-green-9 focus:ring-green-8 cursor-pointer">
                                                                    </template>
                                                                    <span class="w-6 text-xs font-mono font-bold text-gray-11" x-text="opt.label"></span>
                                                                    <div class="flex-1 grid grid-cols-1 sm:grid-cols-2 gap-2">
                                                                        <div class="relative">
                                                                            <textarea x-model="opt.option_text" rows="3" placeholder="Teks pilihan jawaban (mendukung 1 paragraf, bait puisi, LaTeX, dan media)..."
                                                                                   class="w-full rounded-lg border border-gray-6 pl-3 pr-14 py-2 text-xs text-gray-12 outline-none focus:border-green-8 resize-y min-h-[84px] leading-relaxed"></textarea>
                                                                            <button type="button" @click="triggerMediaUpload($el.parentElement.querySelector('textarea'), opt, 'option_text')" class="absolute right-1.5 top-1.5 px-1.5 py-0.5 rounded bg-sky-2 hover:bg-sky-3 text-[10px] font-bold text-sky-11 border border-sky-5 cursor-pointer" title="Upload Media (Gambar, Audio, Video)">media</button>
                                                                        </div>
                                                                        <div style="background-color: #b2f2bb;" class="rounded-lg border border-gray-5 px-3 py-2 text-xs text-gray-12 overflow-y-auto min-h-[84px] max-h-[260px] prose prose-sm max-w-none" x-html="renderRichPreview(opt.option_text)"></div>
                                                                    </div>
                                                                    <template x-if="childQ.type === 'mcq_weighted'">
                                                                        <input type="number" x-model="opt.score" placeholder="Skor" class="w-16 rounded-lg border border-gray-6 px-2 py-1.5 text-xs text-center font-bold" title="Bobot Skor">
                                                                    </template>
                                                                    <button type="button" x-show="childQ.options.length > 2" @click="removeOption(childQ, oIdx)" class="text-red-9 hover:text-red-11 p-1 rounded-md hover:bg-red-2 transition-colors cursor-pointer" title="Hapus Pilihan">
                                                                        <x-radix-icon name="trash" class="w-4 h-4" />
                                                                    </button>
                                                                </div>
                                                            </template>
                                                        </div>
                                                    </template>

                                                    <!-- Child Question Options: Binary Matrix -->
                                                    <template x-if="childQ.type === 'binary_matrix'">
                                                        <div class="space-y-3 pt-2 p-3 bg-gray-2/40 border border-gray-6 rounded-xl">
                                                            <div class="grid grid-cols-2 gap-3">
                                                                <div>
                                                                    <label class="text-[11px] font-bold text-gray-11">Label A (Nilai 1):</label>
                                                                    <input type="text" x-model="childQ.settings.labels[0]" placeholder="Benar / Ya" class="w-full rounded-lg border border-gray-6 bg-white px-2.5 py-1 text-xs font-bold text-green-11">
                                                                </div>
                                                                <div>
                                                                    <label class="text-[11px] font-bold text-gray-11">Label B (Nilai 0):</label>
                                                                    <input type="text" x-model="childQ.settings.labels[1]" placeholder="Salah / Tidak" class="w-full rounded-lg border border-gray-6 bg-white px-2.5 py-1 text-xs font-bold text-red-11">
                                                                </div>
                                                            </div>
                                                            <div class="space-y-2">
                                                                <div class="flex items-center justify-between">
                                                                    <span class="text-xs font-bold text-gray-12">Daftar Baris Pernyataan:</span>
                                                                    <button type="button" @click="addBinaryStatement(childQ)" class="text-xs font-bold text-green-11 hover:underline cursor-pointer">+ Tambah Pernyataan</button>
                                                                </div>
                                                                <template x-for="(stmt, sIdx) in childQ.options" :key="stmt.id">
                                                                    <div class="p-2.5 rounded-xl bg-white border border-gray-6 space-y-2">
                                                                        <div class="flex items-center justify-between">
                                                                            <span class="text-xs font-bold text-gray-11" x-text="'Pernyataan ' + (sIdx + 1) + ':'"></span>
                                                                            <div class="flex items-center gap-2">
                                                                                <div class="flex items-center gap-2 px-2.5 py-0.5 rounded-md bg-gray-2 border border-gray-5">
                                                                                    <label class="flex items-center gap-1 text-xs font-bold cursor-pointer" :class="stmt.match_key === childQ.settings.labels[0] ? 'text-green-11' : 'text-gray-11'">
                                                                                        <input type="radio" :name="'child_bin_' + childQ.id + '_' + stmt.id" :value="childQ.settings.labels[0]" x-model="stmt.match_key" class="text-green-9">
                                                                                        <span x-text="childQ.settings.labels[0]"></span>
                                                                                    </label>
                                                                                    <label class="flex items-center gap-1 text-xs font-bold cursor-pointer" :class="stmt.match_key === childQ.settings.labels[1] ? 'text-red-11' : 'text-gray-11'">
                                                                                        <input type="radio" :name="'child_bin_' + childQ.id + '_' + stmt.id" :value="childQ.settings.labels[1]" x-model="stmt.match_key" class="text-red-9">
                                                                                        <span x-text="childQ.settings.labels[1]"></span>
                                                                                    </label>
                                                                                </div>
                                                                                <button type="button" x-show="childQ.options.length > 3" @click="removeOption(childQ, sIdx)" class="text-red-9 hover:text-red-11 p-1 rounded-md hover:bg-red-2 transition-colors cursor-pointer" title="Hapus Pernyataan">
                                                                                    <x-radix-icon name="trash" class="w-4 h-4" />
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                        <!-- Editor Markdown (Tanpa Preview, Tanpa Petunjuk) -->
                                                                        <div class="editor-container">
                                                                            <div class="flex items-center gap-1 mb-1">
                                                                                <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), stmt, 'option_text', '**', '**')" class="px-1.5 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[10px] font-bold text-gray-12 border border-gray-5 cursor-pointer" title="Tebal">B</button>
                                                                                <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), stmt, 'option_text', '*', '*')" class="px-1.5 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[10px] italic font-serif text-gray-12 border border-gray-5 cursor-pointer" title="Miring">I</button>
                                                                                <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), stmt, 'option_text', '<u>', '</u>')" class="px-1.5 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[10px] underline text-gray-12 border border-gray-5 cursor-pointer" title="Garis Bawah">U</button>
                                                                                <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), stmt, 'option_text', '$$', '$$')" class="px-1.5 py-0.5 rounded bg-purple-2 hover:bg-purple-3 text-[10px] font-mono font-bold text-purple-11 border border-purple-5 cursor-pointer" title="Rumus LaTeX">$$</button>
                                                                            </div>
                                                                            <textarea x-model="stmt.option_text" rows="2" placeholder="Tuliskan baris pernyataan (mendukung markdown & LaTeX)..."
                                                                                      class="w-full rounded-lg border border-gray-6 bg-white px-2.5 py-1.5 text-xs text-gray-12 outline-none focus:border-green-8 focus:ring-1 focus:ring-green-7"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </template>
                                                            </div>
                                                        </div>
                                                    </template>

                                                    <!-- Child Question Options: Matching -->
                                                    <template x-if="childQ.type === 'matching'">
                                                        <div class="space-y-3 pt-2 p-3 bg-gray-2/40 border border-gray-6 rounded-xl">
                                                            <div class="flex items-center justify-between">
                                                                <span class="text-xs font-bold text-gray-12">Pasangan Menjodohkan (Premis ↔ Jawaban):</span>
                                                                <button type="button" @click="addMatchingPair(childQ)" class="text-xs font-bold text-green-11 hover:underline cursor-pointer">+ Tambah Pasangan</button>
                                                            </div>
                                                            <template x-for="(pair, pIdx) in childQ.options" :key="pair.id">
                                                                <div class="p-2.5 rounded-xl bg-white border border-gray-6 space-y-2">
                                                                    <div class="flex items-center justify-between">
                                                                        <span class="text-xs font-bold text-gray-11" x-text="'Pasangan ' + (pIdx + 1) + ':'"></span>
                                                                        <button type="button" x-show="childQ.options.length > 3" @click="removeOption(childQ, pIdx)" class="text-red-9 hover:text-red-11 p-1 rounded-md hover:bg-red-2 transition-colors cursor-pointer" title="Hapus Pasangan">
                                                                            <x-radix-icon name="trash" class="w-4 h-4" />
                                                                        </button>
                                                                    </div>
                                                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 items-start">
                                                                        <!-- Premis (Kiri) -->
                                                                        <div class="editor-container">
                                                                            <div class="flex items-center justify-between mb-1">
                                                                                <span class="text-[11px] font-semibold text-gray-11">Premis (Kiri):</span>
                                                                                <div class="flex items-center gap-1">
                                                                                    <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), pair, 'option_text', '**', '**')" class="px-1.5 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[10px] font-bold text-gray-12 border border-gray-5 cursor-pointer" title="Tebal">B</button>
                                                                                    <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), pair, 'option_text', '*', '*')" class="px-1.5 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[10px] italic font-serif text-gray-12 border border-gray-5 cursor-pointer" title="Miring">I</button>
                                                                                    <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), pair, 'option_text', '<u>', '</u>')" class="px-1.5 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[10px] underline text-gray-12 border border-gray-5 cursor-pointer" title="Garis Bawah">U</button>
                                                                                    <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), pair, 'option_text', '$$', '$$')" class="px-1.5 py-0.5 rounded bg-purple-2 hover:bg-purple-3 text-[10px] font-mono font-bold text-purple-11 border border-purple-5 cursor-pointer" title="Rumus LaTeX">$$</button>
                                                                                </div>
                                                                            </div>
                                                                            <textarea x-model="pair.option_text" rows="2" placeholder="Item premis..." class="w-full rounded-lg border border-gray-6 bg-white px-2.5 py-1.5 text-xs text-gray-12 outline-none focus:border-green-8 focus:ring-1 focus:ring-green-7"></textarea>
                                                                        </div>
                                                                        <!-- Jawaban (Kanan) -->
                                                                        <div class="editor-container">
                                                                            <div class="flex items-center justify-between mb-1">
                                                                                <span class="text-[11px] font-semibold text-gray-11">Pasangan (Kanan):</span>
                                                                                <div class="flex items-center gap-1">
                                                                                    <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), pair, 'match_key', '**', '**')" class="px-1.5 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[10px] font-bold text-gray-12 border border-gray-5 cursor-pointer" title="Tebal">B</button>
                                                                                    <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), pair, 'match_key', '*', '*')" class="px-1.5 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[10px] italic font-serif text-gray-12 border border-gray-5 cursor-pointer" title="Miring">I</button>
                                                                                    <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), pair, 'match_key', '<u>', '</u>')" class="px-1.5 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[10px] underline text-gray-12 border border-gray-5 cursor-pointer" title="Garis Bawah">U</button>
                                                                                    <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), pair, 'match_key', '$$', '$$')" class="px-1.5 py-0.5 rounded bg-purple-2 hover:bg-purple-3 text-[10px] font-mono font-bold text-purple-11 border border-purple-5 cursor-pointer" title="Rumus LaTeX">$$</button>
                                                                                </div>
                                                                            </div>
                                                                            <textarea x-model="pair.match_key" rows="2" placeholder="Item pasangan..." class="w-full rounded-lg border border-gray-6 bg-white px-2.5 py-1.5 text-xs text-gray-12 outline-none focus:border-green-8 focus:ring-1 focus:ring-green-7"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </template>
                                                        </div>
                                                    </template>

                                                    <!-- Child Question Options: Ordering -->
                                                    <template x-if="childQ.type === 'ordering'">
                                                        <div class="space-y-3 pt-2 p-3 bg-gray-2/40 border border-gray-6 rounded-xl">
                                                            <div class="flex items-center justify-between">
                                                                <span class="text-xs font-bold text-gray-12">Urutan Jawaban yang Benar:</span>
                                                                <button type="button" @click="addOption(childQ)" class="text-xs font-bold text-green-11 hover:underline cursor-pointer">+ Tambah Urutan</button>
                                                            </div>
                                                            <template x-for="(opt, oIdx) in childQ.options" :key="opt.id">
                                                                <div class="p-2.5 rounded-xl bg-white border border-gray-6 space-y-2">
                                                                    <div class="flex items-center justify-between">
                                                                        <div class="flex items-center gap-2">
                                                                            <span class="w-6 h-6 rounded bg-gray-12 text-white flex items-center justify-center text-xs font-bold" x-text="oIdx + 1"></span>
                                                                            <span class="text-xs font-bold text-gray-11" x-text="'Urutan ' + (oIdx + 1)"></span>
                                                                        </div>
                                                                        <button type="button" x-show="childQ.options.length > 3" @click="removeOption(childQ, oIdx)" class="text-red-9 hover:text-red-11 p-1 rounded-md hover:bg-red-2 transition-colors cursor-pointer" title="Hapus Urutan">
                                                                            <x-radix-icon name="trash" class="w-4 h-4" />
                                                                        </button>
                                                                    </div>
                                                                    <!-- Editor Markdown (Tanpa Preview, Tanpa Petunjuk) -->
                                                                    <div class="editor-container">
                                                                        <div class="flex items-center gap-1 mb-1">
                                                                            <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), opt, 'option_text', '**', '**')" class="px-1.5 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[10px] font-bold text-gray-12 border border-gray-5 cursor-pointer" title="Tebal">B</button>
                                                                            <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), opt, 'option_text', '*', '*')" class="px-1.5 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[10px] italic font-serif text-gray-12 border border-gray-5 cursor-pointer" title="Miring">I</button>
                                                                            <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), opt, 'option_text', '<u>', '</u>')" class="px-1.5 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[10px] underline text-gray-12 border border-gray-5 cursor-pointer" title="Garis Bawah">U</button>
                                                                            <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), opt, 'option_text', '$$', '$$')" class="px-1.5 py-0.5 rounded bg-purple-2 hover:bg-purple-3 text-[10px] font-mono font-bold text-purple-11 border border-purple-5 cursor-pointer" title="Rumus LaTeX">$$</button>
                                                                        </div>
                                                                        <textarea x-model="opt.option_text" rows="2" placeholder="Teks item yang diurutkan (mendukung markdown & LaTeX)..."
                                                                                  class="w-full rounded-lg border border-gray-6 bg-white px-2.5 py-1.5 text-xs text-gray-12 outline-none focus:border-green-8 focus:ring-1 focus:ring-green-7"></textarea>
                                                                    </div>
                                                                </div>
                                                            </template>
                                                        </div>
                                                    </template>

                                                    <!-- Child Question Options: Short Answer -->
                                                    <template x-if="childQ.type === 'short_answer'">
                                                        <div class="space-y-2 pt-2 p-3 bg-gray-2/40 border border-gray-6 rounded-xl">
                                                            <label class="text-xs font-bold text-gray-12">Kunci Jawaban Teks / Angka:</label>
                                                            <input type="text" x-model="childQ.options[0].option_text" placeholder="Kunci jawaban eksak..."
                                                                   class="w-full rounded-lg border border-gray-6 bg-white px-3 py-1.5 text-xs font-mono font-bold">
                                                        </div>
                                                    </template>

                                                    <!-- Child Question Options: Essay -->
                                                    <template x-if="childQ.type === 'essay'">
                                                        <div class="p-3 bg-gray-2/40 border border-gray-6 rounded-xl text-xs text-gray-11 italic">
                                                            Jawaban uraian bebas akan dikoreksi guru/penilai secara manual.
                                                        </div>
                                                    </template>
                                                </div>
                                            </div>
                                        </template>

                                        <button type="button" @click="addChildQuestion(item)" class="w-full py-2.5 rounded-xl border-2 border-dashed border-green-7/60 bg-green-2/40 hover:bg-green-3/60 text-green-11 text-xs font-bold flex items-center justify-center gap-2 transition-colors cursor-pointer">
                                            <x-radix-icon name="plus" class="w-4 h-4" />
                                            <span>+ Tambah Anak Soal Berikutnya</span>
                                        </button>
                                    </div>
                                </div>
                            </template>

                            <!-- ========================================== -->
                            <!-- ITEM CASE 2: STANDALONE QUESTION           -->
                            <!-- ========================================== -->
                            <template x-if="!item.is_group">
                                <div class="bg-white border border-gray-6 rounded-2xl p-5 space-y-4 shadow-xs">
                                    <div class="flex items-center justify-between border-b border-gray-5 pb-3">
                                        <div class="flex items-center gap-2.5">
                                            <span class="w-7 h-7 rounded-lg bg-gray-12 text-white flex items-center justify-center text-xs font-bold" x-text="itemIdx + 1"></span>
                                            <select x-model="item.type" class="rounded-lg border border-gray-6 px-3 py-1.5 text-xs font-bold text-gray-12 outline-none cursor-pointer">
                                                <option value="mcq_single">Pilihan Ganda (Single Choice)</option>
                                                <option value="mcq_multiple">Pilihan Ganda Multiple Answer</option>
                                                <option value="mcq_weighted">Pilihan Ganda Berbobot (1-5)</option>
                                                <option value="binary_matrix">Tabel Dikotomi (Benar/Salah Dinamis)</option>
                                                <option value="matching">Menjodohkan (Matching)</option>
                                                <option value="ordering">Mengurutkan (Sequencing)</option>
                                                <option value="short_answer">Isian Singkat / Numerik</option>
                                                <option value="essay">Essay / Uraian</option>
                                            </select>
                                        </div>
                                        <div class="flex items-center gap-3">
                                            <div class="flex items-center gap-1.5">
                                                <span class="text-xs text-gray-11 font-medium">Poin:</span>
                                                <input type="number" x-model="item.points" step="0.5" class="w-16 rounded-md border border-gray-6 px-2 py-0.5 text-xs text-center font-bold text-gray-12">
                                            </div>
                                            <button type="button" @click="removeItem(secIdx, itemIdx)" class="text-red-9 hover:text-red-11 p-1 rounded-lg hover:bg-red-3 cursor-pointer">
                                                <x-radix-icon name="trash" class="w-4 h-4" />
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Question Prompt & Formatting Toolbar -->
                                    <div class="space-y-2 editor-container">
                                        <div class="flex items-center justify-between gap-2">
                                            <div class="flex items-center gap-1">
                                                <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), item, 'prompt', '# ', '\n', true)" class="px-2.5 py-1 rounded bg-gray-2 hover:bg-gray-3 text-xs font-bold text-gray-12 border border-gray-5 cursor-pointer" title="Judul Utama (H1)">H1</button>
                                                <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), item, 'prompt', '## ', '\n', true)" class="px-2.5 py-1 rounded bg-gray-2 hover:bg-gray-3 text-xs font-bold text-gray-12 border border-gray-5 cursor-pointer" title="Sub Judul (H2)">H2</button>
                                                <button type="button" @mousedown.prevent="" @click="insertTableFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), item, 'prompt')" class="px-2.5 py-1 rounded bg-gray-2 hover:bg-gray-3 text-xs font-bold text-gray-12 border border-gray-5 cursor-pointer flex items-center gap-1" title="Sisipkan Tabel">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-10v16M4 4h16a1 1 0 011 1v14a1 1 0 01-1 1H4a1 1 0 01-1-1V5a1 1 0 011-1z"/></svg>
                                                    <span>Tabel</span>
                                                </button>
                                                <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), item, 'prompt', '**', '**')" class="px-2.5 py-1 rounded bg-gray-2 hover:bg-gray-3 text-xs font-bold text-gray-12 border border-gray-5 cursor-pointer" title="Tebal (Bold)">B</button>
                                                <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), item, 'prompt', '*', '*')" class="px-2.5 py-1 rounded bg-gray-2 hover:bg-gray-3 text-xs italic font-serif text-gray-12 border border-gray-5 cursor-pointer" title="Miring (Italic)">I</button>
                                                <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), item, 'prompt', '<u>', '</u>')" class="px-2.5 py-1 rounded bg-gray-2 hover:bg-gray-3 text-xs underline text-gray-12 border border-gray-5 cursor-pointer" title="Garis Bawah (Underline)">U</button>
                                                <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), item, 'prompt', '$$', '$$')" class="px-2.5 py-1 rounded bg-purple-2 hover:bg-purple-3 text-xs font-mono font-bold text-purple-11 border border-purple-5 cursor-pointer" title="Rumus Matematika / LaTeX ($$...$$)">$$f(x)$$</button>
                                                <button type="button" @mousedown.prevent="" @click="triggerMediaUpload($event.currentTarget.closest('.editor-container').querySelector('textarea'), item, 'prompt')" class="px-2.5 py-1 rounded bg-sky-2 hover:bg-sky-3 text-xs font-bold text-sky-11 border border-sky-5 cursor-pointer" title="Upload Media (Gambar, Audio, Video)">media</button>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                            <textarea x-model="item.prompt" 
                                                      @select="recordSelection($event.target)" 
                                                      @keyup="recordSelection($event.target)" 
                                                      @mouseup="recordSelection($event.target)"
                                                      rows="2" placeholder="Tuliskan pertanyaan / instruksi soal... (Gunakan $$...$$ untuk rumus matematika LaTeX)"
                                                      class="w-full rounded-xl border border-gray-6 px-3.5 py-2 text-sm text-gray-12 outline-none focus:border-green-8 font-sans resize-y"></textarea>
                                            <div style="background-color: #b2f2bb;" class="rounded-xl border border-gray-5  px-3.5 py-2 text-sm text-gray-12 overflow-y-auto min-h-[60px] max-h-[200px] prose prose-sm max-w-none" x-html="renderRichPreview(item.prompt)"></div>
                                        </div>
                                    </div>

                                        <!-- Interactive Form for Options based on Question Type -->
                                        <!-- 1. MCQ Single / Multiple / Weighted -->
                                        <template x-if="item.type === 'mcq_single' || item.type === 'mcq_multiple' || item.type === 'mcq_weighted'">
                                            <div class="space-y-2 pt-2">
                                                <div class="flex items-center justify-between">
                                                    <span class="text-xs font-bold text-gray-11">Pilihan Jawaban:</span>
                                                    <button type="button" @click="addOption(item)" class="text-xs font-bold text-green-11 hover:underline cursor-pointer">+ Tambah Opsi</button>
                                                </div>
                                                <template x-for="(opt, oIdx) in item.options" :key="opt.id">
                                                    <div class="flex items-center gap-2.5">
                                                        <template x-if="item.type === 'mcq_single'">
                                                            <input type="radio" :name="'correct_' + item.id" :checked="opt.is_correct" @change="setSingleCorrect(item, oIdx)" class="text-green-9 focus:ring-green-8 cursor-pointer">
                                                        </template>
                                                        <template x-if="item.type === 'mcq_multiple'">
                                                            <input type="checkbox" x-model="opt.is_correct" class="rounded text-green-9 focus:ring-green-8 cursor-pointer">
                                                        </template>
                                                        <span class="w-6 text-xs font-mono font-bold text-gray-11" x-text="opt.label"></span>
                                                        <div class="flex-1 grid grid-cols-1 sm:grid-cols-2 gap-2">
                                                            <div class="relative">
                                                                <textarea x-model="opt.option_text" rows="3" placeholder="Teks pilihan jawaban (mendukung 1 paragraf, bait puisi, LaTeX, dan media)..."
                                                                       class="w-full rounded-lg border border-gray-6 pl-3 pr-14 py-2 text-xs text-gray-12 outline-none focus:border-green-8 resize-y min-h-[84px] leading-relaxed"></textarea>
                                                                <button type="button" @click="triggerMediaUpload($el.parentElement.querySelector('textarea'), opt, 'option_text')" class="absolute right-1.5 top-1.5 px-1.5 py-0.5 rounded bg-sky-2 hover:bg-sky-3 text-[10px] font-bold text-sky-11 border border-sky-5 cursor-pointer" title="Upload Media (Gambar, Audio, Video)">media</button>
                                                            </div>
                                                            <div style="background-color: #b2f2bb;" class="rounded-lg border border-gray-5 px-3 py-2 text-xs text-gray-12 overflow-y-auto min-h-[84px] max-h-[260px] prose prose-sm max-w-none" x-html="renderRichPreview(opt.option_text)"></div>
                                                        </div>
                                                        <template x-if="item.type === 'mcq_weighted'">
                                                            <input type="number" x-model="opt.score" placeholder="Skor" class="w-16 rounded-lg border border-gray-6 px-2 py-1.5 text-xs text-center font-bold" title="Bobot Skor">
                                                        </template>
                                                        <button type="button" x-show="item.options.length > 2" @click="removeOption(item, oIdx)" class="text-red-9 hover:text-red-11 p-1 rounded-md hover:bg-red-2 transition-colors cursor-pointer" title="Hapus Pilihan">
                                                            <x-radix-icon name="trash" class="w-4 h-4" />
                                                        </button>
                                                    </div>
                                                </template>
                                            </div>
                                        </template>

                                        <!-- 2. BINARY MATRIX / TABEL DIKOTOMI FLEKSIBEL -->
                                        <template x-if="item.type === 'binary_matrix'">
                                            <div class="space-y-3 pt-2 p-4 bg-gray-2/40 border border-gray-6 rounded-xl">
                                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-gray-5 pb-3">
                                                    <div>
                                                        <h5 class="text-xs font-bold text-gray-12">Pengaturan Tabel Dikotomi</h5>
                                                        <p class="text-[11px] text-gray-11">Pilih preset atau buat label kustom untuk 2 kolom pilihan.</p>
                                                    </div>
                                                    <div class="flex items-center gap-2">
                                                        <span class="text-xs font-semibold text-gray-11">Preset Cepat:</span>
                                                        <select @change="applyBinaryPreset(item, $event.target.value)" class="rounded-lg border border-gray-6 px-2 py-1 text-xs font-bold text-gray-12 outline-none cursor-pointer">
                                                            <option value="">-- Pilih Preset --</option>
                                                            @foreach($binaryMatrixPresets as $preset)
                                                                <option value="{{ $preset['label_a'] }}|{{ $preset['label_b'] }}">{{ $preset['label_a'] }} / {{ $preset['label_b'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Custom Dual Labels -->
                                                <div class="grid grid-cols-2 gap-3">
                                                    <div>
                                                        <label class="text-[11px] font-bold text-gray-11">Label Kolom A (Nilai 1):</label>
                                                        <input type="text" x-model="item.settings.labels[0]" placeholder="Benar / Ya / Sesuai"
                                                               class="w-full rounded-lg border border-gray-6 bg-white px-3 py-1.5 text-xs font-bold text-green-11 outline-none">
                                                    </div>
                                                    <div>
                                                        <label class="text-[11px] font-bold text-gray-11">Label Kolom B (Nilai 0):</label>
                                                        <input type="text" x-model="item.settings.labels[1]" placeholder="Salah / Tidak / Tidak Sesuai"
                                                               class="w-full rounded-lg border border-gray-6 bg-white px-3 py-1.5 text-xs font-bold text-red-11 outline-none">
                                                    </div>
                                                </div>

                                                <!-- Sub-Statements List (Baris Pernyataan) -->
                                                <div class="space-y-2 pt-2">
                                                    <div class="flex items-center justify-between">
                                                        <span class="text-xs font-bold text-gray-12">Daftar Baris Pernyataan:</span>
                                                        <button type="button" @click="addBinaryStatement(item)" class="text-xs font-bold text-green-11 hover:underline cursor-pointer">+ Tambah Pernyataan</button>
                                                    </div>
                                                    <template x-for="(stmt, sIdx) in item.options" :key="stmt.id">
                                                        <div class="p-2.5 rounded-xl bg-white border border-gray-6 space-y-2">
                                                            <div class="flex items-center justify-between">
                                                                <span class="text-xs font-bold text-gray-11" x-text="'Pernyataan ' + (sIdx + 1) + ':'"></span>
                                                                <div class="flex items-center gap-2">
                                                                    <div class="flex items-center gap-3 px-3 py-1 rounded-md bg-gray-2 border border-gray-5">
                                                                        <label class="flex items-center gap-1.5 text-xs font-bold cursor-pointer" :class="stmt.match_key === item.settings.labels[0] ? 'text-green-11' : 'text-gray-11'">
                                                                            <input type="radio" :name="'binary_' + item.id + '_' + stmt.id" :value="item.settings.labels[0]" x-model="stmt.match_key" class="text-green-9">
                                                                            <span x-text="item.settings.labels[0]"></span>
                                                                        </label>
                                                                        <label class="flex items-center gap-1.5 text-xs font-bold cursor-pointer" :class="stmt.match_key === item.settings.labels[1] ? 'text-red-11' : 'text-gray-11'">
                                                                            <input type="radio" :name="'binary_' + item.id + '_' + stmt.id" :value="item.settings.labels[1]" x-model="stmt.match_key" class="text-red-9">
                                                                            <span x-text="item.settings.labels[1]"></span>
                                                                        </label>
                                                                    </div>
                                                                    <button type="button" x-show="item.options.length > 3" @click="removeOption(item, sIdx)" class="text-red-9 hover:text-red-11 p-1 rounded-md hover:bg-red-2 transition-colors cursor-pointer" title="Hapus Pernyataan">
                                                                        <x-radix-icon name="trash" class="w-4 h-4" />
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <!-- Editor Markdown (Tanpa Preview, Tanpa Petunjuk) -->
                                                            <div class="editor-container">
                                                                <div class="flex items-center gap-1 mb-1">
                                                                    <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), stmt, 'option_text', '**', '**')" class="px-1.5 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[10px] font-bold text-gray-12 border border-gray-5 cursor-pointer" title="Tebal (Bold)">B</button>
                                                                    <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), stmt, 'option_text', '*', '*')" class="px-1.5 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[10px] italic font-serif text-gray-12 border border-gray-5 cursor-pointer" title="Miring (Italic)">I</button>
                                                                    <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), stmt, 'option_text', '<u>', '</u>')" class="px-1.5 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[10px] underline text-gray-12 border border-gray-5 cursor-pointer" title="Garis Bawah (Underline)">U</button>
                                                                    <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), stmt, 'option_text', '$$', '$$')" class="px-1.5 py-0.5 rounded bg-purple-2 hover:bg-purple-3 text-[10px] font-mono font-bold text-purple-11 border border-purple-5 cursor-pointer" title="Rumus Matematika / LaTeX ($$...$$)">$$</button>
                                                                </div>
                                                                <textarea x-model="stmt.option_text" rows="2" placeholder="Tuliskan teks baris pernyataan (mendukung markdown & LaTeX)..."
                                                                          class="w-full rounded-lg border border-gray-6 bg-white px-3 py-1.5 text-xs text-gray-12 outline-none focus:border-green-8 focus:ring-1 focus:ring-green-7"></textarea>
                                                            </div>
                                                        </div>
                                                    </template>
                                                </div>
                                            </div>
                                        </template>

                                        <!-- 3. MATCHING (MENJODOHKAN) -->
                                        <template x-if="item.type === 'matching'">
                                            <div class="space-y-3 pt-2 p-3 bg-gray-2/40 border border-gray-6 rounded-xl">
                                                <div class="flex items-center justify-between">
                                                    <span class="text-xs font-bold text-gray-12">Pasangan Menjodohkan (Premis ↔ Jawaban):</span>
                                                    <button type="button" @click="addMatchingPair(item)" class="text-xs font-bold text-green-11 hover:underline cursor-pointer">+ Tambah Pasangan</button>
                                                </div>
                                                <template x-for="(pair, pIdx) in item.options" :key="pair.id">
                                                    <div class="p-2.5 rounded-xl bg-white border border-gray-6 space-y-2">
                                                        <div class="flex items-center justify-between">
                                                            <span class="text-xs font-bold text-gray-11" x-text="'Pasangan ' + (pIdx + 1) + ':'"></span>
                                                            <button type="button" x-show="item.options.length > 3" @click="removeOption(item, pIdx)" class="text-red-9 hover:text-red-11 p-1 rounded-md hover:bg-red-2 transition-colors cursor-pointer" title="Hapus Pasangan">
                                                                <x-radix-icon name="trash" class="w-4 h-4" />
                                                            </button>
                                                        </div>
                                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 items-start">
                                                            <!-- Premis (Kiri) -->
                                                            <div class="editor-container">
                                                                <div class="flex items-center justify-between mb-1">
                                                                    <span class="text-[11px] font-semibold text-gray-11">Premis (Kiri):</span>
                                                                    <div class="flex items-center gap-1">
                                                                        <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), pair, 'option_text', '**', '**')" class="px-1.5 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[10px] font-bold text-gray-12 border border-gray-5 cursor-pointer" title="Tebal">B</button>
                                                                        <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), pair, 'option_text', '*', '*')" class="px-1.5 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[10px] italic font-serif text-gray-12 border border-gray-5 cursor-pointer" title="Miring">I</button>
                                                                        <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), pair, 'option_text', '<u>', '</u>')" class="px-1.5 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[10px] underline text-gray-12 border border-gray-5 cursor-pointer" title="Garis Bawah">U</button>
                                                                        <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), pair, 'option_text', '$$', '$$')" class="px-1.5 py-0.5 rounded bg-purple-2 hover:bg-purple-3 text-[10px] font-mono font-bold text-purple-11 border border-purple-5 cursor-pointer" title="Rumus LaTeX">$$</button>
                                                                    </div>
                                                                </div>
                                                                <textarea x-model="pair.option_text" rows="2" placeholder="Item premis..." class="w-full rounded-lg border border-gray-6 bg-white px-3 py-1.5 text-xs text-gray-12 outline-none focus:border-green-8 focus:ring-1 focus:ring-green-7"></textarea>
                                                            </div>

                                                            <!-- Jawaban / Pasangan (Kanan) -->
                                                            <div class="editor-container">
                                                                <div class="flex items-center justify-between mb-1">
                                                                    <span class="text-[11px] font-semibold text-gray-11">Pasangan (Kanan):</span>
                                                                    <div class="flex items-center gap-1">
                                                                        <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), pair, 'match_key', '**', '**')" class="px-1.5 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[10px] font-bold text-gray-12 border border-gray-5 cursor-pointer" title="Tebal">B</button>
                                                                        <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), pair, 'match_key', '*', '*')" class="px-1.5 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[10px] italic font-serif text-gray-12 border border-gray-5 cursor-pointer" title="Miring">I</button>
                                                                        <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), pair, 'match_key', '<u>', '</u>')" class="px-1.5 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[10px] underline text-gray-12 border border-gray-5 cursor-pointer" title="Garis Bawah">U</button>
                                                                        <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), pair, 'match_key', '$$', '$$')" class="px-1.5 py-0.5 rounded bg-purple-2 hover:bg-purple-3 text-[10px] font-mono font-bold text-purple-11 border border-purple-5 cursor-pointer" title="Rumus LaTeX">$$</button>
                                                                    </div>
                                                                </div>
                                                                <textarea x-model="pair.match_key" rows="2" placeholder="Item pasangan..." class="w-full rounded-lg border border-gray-6 bg-white px-3 py-1.5 text-xs text-gray-12 outline-none focus:border-green-8 focus:ring-1 focus:ring-green-7"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </template>
                                            </div>
                                        </template>

                                        <!-- 4. ORDERING / MENGURUTKAN -->
                                        <template x-if="item.type === 'ordering'">
                                            <div class="space-y-3 pt-2 p-3 bg-gray-2/40 border border-gray-6 rounded-xl">
                                                <div class="flex items-center justify-between">
                                                    <span class="text-xs font-bold text-gray-12">Urutan Jawaban yang Benar:</span>
                                                    <button type="button" @click="addOption(item)" class="text-xs font-bold text-green-11 hover:underline cursor-pointer">+ Tambah Urutan</button>
                                                </div>
                                                <template x-for="(opt, oIdx) in item.options" :key="opt.id">
                                                    <div class="p-2.5 rounded-xl bg-white border border-gray-6 space-y-2">
                                                        <div class="flex items-center justify-between">
                                                            <div class="flex items-center gap-2">
                                                                <span class="w-6 h-6 rounded bg-gray-12 text-white flex items-center justify-center text-xs font-bold" x-text="oIdx + 1"></span>
                                                                <span class="text-xs font-bold text-gray-11" x-text="'Urutan ' + (oIdx + 1)"></span>
                                                            </div>
                                                            <button type="button" x-show="item.options.length > 3" @click="removeOption(item, oIdx)" class="text-red-9 hover:text-red-11 p-1 rounded-md hover:bg-red-2 transition-colors cursor-pointer" title="Hapus Urutan">
                                                                <x-radix-icon name="trash" class="w-4 h-4" />
                                                            </button>
                                                        </div>
                                                        <!-- Editor Markdown (Tanpa Preview, Tanpa Petunjuk) -->
                                                        <div class="editor-container">
                                                            <div class="flex items-center gap-1 mb-1">
                                                                <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), opt, 'option_text', '**', '**')" class="px-1.5 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[10px] font-bold text-gray-12 border border-gray-5 cursor-pointer" title="Tebal">B</button>
                                                                <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), opt, 'option_text', '*', '*')" class="px-1.5 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[10px] italic font-serif text-gray-12 border border-gray-5 cursor-pointer" title="Miring">I</button>
                                                                <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), opt, 'option_text', '<u>', '</u>')" class="px-1.5 py-0.5 rounded bg-gray-2 hover:bg-gray-3 text-[10px] underline text-gray-12 border border-gray-5 cursor-pointer" title="Garis Bawah">U</button>
                                                                <button type="button" @mousedown.prevent="" @click="applyTextFormat($event.currentTarget.closest('.editor-container').querySelector('textarea'), opt, 'option_text', '$$', '$$')" class="px-1.5 py-0.5 rounded bg-purple-2 hover:bg-purple-3 text-[10px] font-mono font-bold text-purple-11 border border-purple-5 cursor-pointer" title="Rumus LaTeX">$$</button>
                                                            </div>
                                                            <textarea x-model="opt.option_text" rows="2" placeholder="Teks item yang diurutkan (mendukung markdown & LaTeX)..."
                                                                      class="w-full rounded-lg border border-gray-6 bg-white px-3 py-1.5 text-xs text-gray-12 outline-none focus:border-green-8 focus:ring-1 focus:ring-green-7"></textarea>
                                                        </div>
                                                    </div>
                                                </template>
                                            </div>
                                        </template>

                                        <!-- 5. SHORT ANSWER / NUMERIK -->
                                        <template x-if="item.type === 'short_answer'">
                                            <div class="space-y-2 pt-2 p-3 bg-gray-2/40 border border-gray-6 rounded-xl">
                                                <label class="text-xs font-bold text-gray-12">Kunci Jawaban Teks / Angka Eksak:</label>
                                                <input type="text" x-model="item.options[0].option_text" placeholder="Kunci jawaban (misal: 42 atau Fotosintesis)..."
                                                       class="w-full rounded-lg border border-gray-6 bg-white px-3 py-1.5 text-xs font-mono font-bold">
                                            </div>
                                        </template>

                                        <!-- 5. ESSAY / URAIAN -->
                                        <template x-if="item.type === 'essay'">
                                            <div class="p-3 bg-gray-2/40 border border-gray-6 rounded-xl text-xs text-gray-11 italic">
                                                Soal essay akan menampilkan area teks luas bagi siswa. Penilaian dilakukan melalui koreksi manual atau rubrik penilaian.
                                            </div>
                                        </template>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </template>
                </div>
            </template>
        </div>

        <!-- Navigation Step 4 (Outside Section Loop) -->
        <div class="flex items-center justify-between pt-6 border-t border-gray-5 mt-8">
                    <button type="button" @click="currentStep--" 
                            class="px-5 py-2.5 rounded-xl border border-gray-6 bg-white hover:bg-gray-3 text-sm font-semibold text-gray-12 transition-colors cursor-pointer flex items-center gap-2">
                        <x-radix-icon name="arrow-left" class="w-4 h-4" />
                        <span>Sebelumnya</span>
                    </button>
                    <button type="button" @click="nextStep()" 
                            class="px-6 py-2.5 rounded-xl bg-green-9 hover:bg-green-10 active:bg-green-11 text-white text-sm font-semibold transition-all shadow-xs cursor-pointer flex items-center gap-2">
                        <span>Lanjutkan ke Langkah 5: Penilaian</span>
                        <x-radix-icon name="arrow-right" class="w-4 h-4" />
                    </button>
                </div>
            </div>

            <!-- ============================================== -->
            <!-- STEP 5: METODE PENILAIAN & SCORING ENGINE      -->
            <!-- ============================================== -->
            <div x-show="currentStep === 5" x-transition.opacity class="space-y-8">
                <div class="border-b border-gray-5 pb-4 flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                    <div>
                        <div class="flex items-center gap-2">
                            <h2 class="font-display font-bold text-lg text-gray-12">Langkah 5: Model & Template Penilaian</h2>
                            <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded-md bg-green-3 text-green-11 border border-green-6/50">
                                Generic Engine
                            </span>
                        </div>
                        <p class="text-xs text-gray-11 mt-0.5">Konfigurasikan template penilaian, kriteria ketuntasan (KKM), pembobotan formula, dan kebijakan pasca ujian.</p>
                    </div>
                    <div class="text-xs text-gray-11 bg-gray-2 px-3 py-1.5 rounded-xl border border-gray-5 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-green-9"></span>
                        <span>Prinsip: <strong class="text-gray-12 font-semibold">Jenis Soal ≠ Jenis Asesmen ≠ Metode Penilaian</strong></span>
                    </div>
                </div>

                <!-- 1. TEMPLATE PENILAIAN PRESETS -->
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <label class="block text-xs font-bold text-gray-12 uppercase tracking-wider">
                            1. Pilih Template Penilaian Standar
                        </label>
                        <span class="text-xs text-gray-11">Pilih preset untuk menerapkan aturan penilaian siap pakai</span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3.5" :class="isStandardLockedType() ? 'pointer-events-none' : ''">
                        <!-- Preset 1: Standar Benar/Salah -->
                        <div @click="applyScoringPreset('standard')"
                             :class="[form.settings.scoring_template === 'standard' ? 'border-green-8 bg-green-2/40 ring-2 ring-green-7' : 'border-gray-6 hover:border-gray-7 bg-white', isStandardLockedType() && form.settings.scoring_template !== 'standard' ? 'opacity-40 grayscale' : '']"
                             class="p-4 rounded-2xl border transition-all cursor-pointer space-y-2 group">
                            <div class="flex items-center justify-between">
                                <span class="w-7 h-7 rounded-lg bg-green-3 text-green-11 font-bold text-xs flex items-center justify-center">0/1</span>
                                <button type="button" @click.stop="togglePresetInfo('standard')"
                                        :class="activePresetInfo === 'standard' ? 'bg-green-4 text-green-12 border-green-7 ring-1 ring-green-7' : 'bg-gray-2 text-gray-11 hover:text-green-11 hover:bg-green-2 border-gray-5 hover:border-green-6/50'"
                                        class="inline-flex items-center gap-1 text-[10px] font-bold px-2 py-0.5 rounded-md border transition-all cursor-pointer pointer-events-auto shadow-2xs"
                                        title="Klik untuk melihat penjelasan lengkap & contoh">
                                    <span>Objektif</span>
                                    <x-radix-icon name="info-circled" class="w-3 h-3 text-green-9 shrink-0" />
                                </button>
                            </div>
                            <h4 class="font-display font-bold text-sm text-gray-12 group-hover:text-green-11 transition-colors">Standar (Benar / Salah)</h4>
                            
                            <!-- Expandable Explanation -->
                            <div x-show="activePresetInfo === 'standard'" x-collapse @click.stop
                                 class="pt-2.5 border-t border-gray-5 space-y-2 text-[11px] text-gray-11 pointer-events-auto cursor-default">
                                <div class="space-y-0.5">
                                    <span class="font-bold text-gray-12 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-green-9 shrink-0"></span>Skema Skor:</span>
                                    <p class="leading-relaxed text-gray-11 pl-3">Benar = 1 poin (atau bobot soal), Salah / Kosong = 0.</p>
                                </div>
                                <div class="space-y-0.5">
                                    <span class="font-bold text-gray-12 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-blue-9 shrink-0"></span>Sangat Cocok:</span>
                                    <p class="leading-relaxed text-gray-11 pl-3">Penilaian Harian (PH), PTS, PAS, Kuis Cepat mapel eksakta &amp; hafalan.</p>
                                </div>
                                <div class="bg-green-2/50 p-2 rounded-lg border border-green-6/40 space-y-0.5">
                                    <span class="font-bold text-green-12 block text-[10.5px]">Contoh Kasus Riil:</span>
                                    <p class="leading-relaxed text-green-11 text-[10.5px]">Siswa mengerjakan 30 soal PG, tiap soal bernilai 1. Skor akhir = (Jumlah Benar / Total Soal) × 100.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Preset 2: Berbobot (TKP) -->
                        <div @click="applyScoringPreset('weighted')"
                             :class="[form.settings.scoring_template === 'weighted' ? 'border-green-8 bg-green-2/40 ring-2 ring-green-7' : 'border-gray-6 hover:border-gray-7 bg-white', isStandardLockedType() && form.settings.scoring_template !== 'weighted' ? 'opacity-40 grayscale' : '']"
                             class="p-4 rounded-2xl border transition-all cursor-pointer space-y-2 group">
                            <div class="flex items-center justify-between">
                                <span class="w-7 h-7 rounded-lg bg-blue-3 text-blue-11 font-bold text-xs flex items-center justify-center">1-5</span>
                                <button type="button" @click.stop="togglePresetInfo('weighted')"
                                        :class="activePresetInfo === 'weighted' ? 'bg-blue-4 text-blue-12 border-blue-7 ring-1 ring-blue-7' : 'bg-blue-2 text-blue-11 hover:text-blue-12 hover:bg-blue-3 border-blue-5 hover:border-blue-6/60'"
                                        class="inline-flex items-center gap-1 text-[10px] font-bold px-2 py-0.5 rounded-md border transition-all cursor-pointer pointer-events-auto shadow-2xs"
                                        title="Klik untuk melihat penjelasan lengkap & contoh">
                                    <span>TKP / Likert</span>
                                    <x-radix-icon name="info-circled" class="w-3 h-3 text-blue-9 shrink-0" />
                                </button>
                            </div>
                            <h4 class="font-display font-bold text-sm text-gray-12 group-hover:text-green-11 transition-colors">Pilihan Ganda Berbobot</h4>
                            
                            <!-- Expandable Explanation -->
                            <div x-show="activePresetInfo === 'weighted'" x-collapse @click.stop
                                 class="pt-2.5 border-t border-gray-5 space-y-2 text-[11px] text-gray-11 pointer-events-auto cursor-default">
                                <div class="space-y-0.5">
                                    <span class="font-bold text-gray-12 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-blue-9 shrink-0"></span>Skema Skor:</span>
                                    <p class="leading-relaxed text-gray-11 pl-3">Tiap pilihan (A–E) bernilai berjenjang (misal 5, 4, 3, 2, 1). Tidak ada jawaban mutlak salah.</p>
                                </div>
                                <div class="space-y-0.5">
                                    <span class="font-bold text-gray-12 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-purple-9 shrink-0"></span>Sangat Cocok:</span>
                                    <p class="leading-relaxed text-gray-11 pl-3">Tes Karakteristik Pribadi (TKP) CPNS/Kedinasan, Tes Psikologi, Kuesioner Skala Likert.</p>
                                </div>
                                <div class="bg-blue-2/50 p-2 rounded-lg border border-blue-6/40 space-y-0.5">
                                    <span class="font-bold text-blue-12 block text-[10.5px]">Contoh Kasus Riil:</span>
                                    <p class="leading-relaxed text-blue-11 text-[10.5px]">Skenario integritas kerja: Opsi paling solutif = 5 poin, cukup baik = 4 poin, hingga opsi pasif = 1 poin. Siswa selalu meraih poin.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Preset 3: Partial Credit (AKM) -->
                        <div @click="applyScoringPreset('partial')"
                             :class="[form.settings.scoring_template === 'partial' ? 'border-green-8 bg-green-2/40 ring-2 ring-green-7' : 'border-gray-6 hover:border-gray-7 bg-white', isStandardLockedType() && form.settings.scoring_template !== 'partial' ? 'opacity-40 grayscale' : '']"
                             class="p-4 rounded-2xl border transition-all cursor-pointer space-y-2 group">
                            <div class="flex items-center justify-between">
                                <span class="w-7 h-7 rounded-lg bg-purple-3 text-purple-11 font-bold text-xs flex items-center justify-center">%</span>
                                <button type="button" @click.stop="togglePresetInfo('partial')"
                                        :class="activePresetInfo === 'partial' ? 'bg-purple-4 text-purple-12 border-purple-7 ring-1 ring-purple-7' : 'bg-purple-2 text-purple-11 hover:text-purple-12 hover:bg-purple-3 border-purple-5 hover:border-purple-6/60'"
                                        class="inline-flex items-center gap-1 text-[10px] font-bold px-2 py-0.5 rounded-md border transition-all cursor-pointer pointer-events-auto shadow-2xs"
                                        title="Klik untuk melihat penjelasan lengkap & contoh">
                                    <span>AKM / Kompleks</span>
                                    <x-radix-icon name="info-circled" class="w-3 h-3 text-purple-9 shrink-0" />
                                </button>
                            </div>
                            <h4 class="font-display font-bold text-sm text-gray-12 group-hover:text-green-11 transition-colors">Partial Credit (% Capaian)</h4>
                            
                            <!-- Expandable Explanation -->
                            <div x-show="activePresetInfo === 'partial'" x-collapse @click.stop
                                 class="pt-2.5 border-t border-gray-5 space-y-2 text-[11px] text-gray-11 pointer-events-auto cursor-default">
                                <div class="space-y-0.5">
                                    <span class="font-bold text-gray-12 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-purple-9 shrink-0"></span>Skema Skor:</span>
                                    <p class="leading-relaxed text-gray-11 pl-3">Skor parsial proporsional (100%, 75%, 50%, 25%, 0%) sesuai persentase elemen yang dijawab benar.</p>
                                </div>
                                <div class="space-y-0.5">
                                    <span class="font-bold text-gray-12 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-blue-9 shrink-0"></span>Sangat Cocok:</span>
                                    <p class="leading-relaxed text-gray-11 pl-3">Soal AKM/ANBK, Pilihan Ganda Kompleks (Multi-Answer), Menjodohkan, Mengurutkan, dan Tabel Dikotomi.</p>
                                </div>
                                <div class="bg-purple-2/50 p-2 rounded-lg border border-purple-6/40 space-y-0.5">
                                    <span class="font-bold text-purple-12 block text-[10.5px]">Contoh Kasus Riil:</span>
                                    <p class="leading-relaxed text-purple-11 text-[10.5px]">Soal Tabel Dikotomi 4 baris pernyataan. Jika siswa benar 3 dari 4 baris, siswa tetap meraih 75% poin soal, tidak digugurkan jadi 0.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Preset 4: Rubrik Penilaian -->
                        <div @click="applyScoringPreset('rubric')"
                             :class="[form.settings.scoring_template === 'rubric' ? 'border-green-8 bg-green-2/40 ring-2 ring-green-7' : 'border-gray-6 hover:border-gray-7 bg-white', isStandardLockedType() && form.settings.scoring_template !== 'rubric' ? 'opacity-40 grayscale' : '']"
                             class="p-4 rounded-2xl border transition-all cursor-pointer space-y-2 group">
                            <div class="flex items-center justify-between">
                                <span class="w-7 h-7 rounded-lg bg-amber-3 text-amber-11 font-bold text-xs flex items-center justify-center">Rubrik</span>
                                <button type="button" @click.stop="togglePresetInfo('rubric')"
                                        :class="activePresetInfo === 'rubric' ? 'bg-amber-4 text-amber-12 border-amber-7 ring-1 ring-amber-7' : 'bg-amber-2 text-amber-11 hover:text-amber-12 hover:bg-amber-3 border-amber-5 hover:border-amber-6/60'"
                                        class="inline-flex items-center gap-1 text-[10px] font-bold px-2 py-0.5 rounded-md border transition-all cursor-pointer pointer-events-auto shadow-2xs"
                                        title="Klik untuk melihat penjelasan lengkap & contoh">
                                    <span>Essay / Kriteria</span>
                                    <x-radix-icon name="info-circled" class="w-3 h-3 text-amber-9 shrink-0" />
                                </button>
                            </div>
                            <h4 class="font-display font-bold text-sm text-gray-12 group-hover:text-green-11 transition-colors">Penilaian Rubrik (Kriteria)</h4>
                            
                            <!-- Expandable Explanation -->
                            <div x-show="activePresetInfo === 'rubric'" x-collapse @click.stop
                                 class="pt-2.5 border-t border-gray-5 space-y-2 text-[11px] text-gray-11 pointer-events-auto cursor-default">
                                <div class="space-y-0.5">
                                    <span class="font-bold text-gray-12 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-amber-9 shrink-0"></span>Skema Skor:</span>
                                    <p class="leading-relaxed text-gray-11 pl-3">Akumulasi skor terstruktur berdasarkan indikator kriteria berjenjang (misal: skala 1–4 per kriteria).</p>
                                </div>
                                <div class="space-y-0.5">
                                    <span class="font-bold text-gray-12 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-green-9 shrink-0"></span>Sangat Cocok:</span>
                                    <p class="leading-relaxed text-gray-11 pl-3">Soal Uraian Analisis, Karya Tulis, Studi Kasus, dan Pemecahan Masalah Terbuka.</p>
                                </div>
                                <div class="bg-amber-2/50 p-2 rounded-lg border border-amber-6/40 space-y-0.5">
                                    <span class="font-bold text-amber-12 block text-[10.5px]">Contoh Kasus Riil:</span>
                                    <p class="leading-relaxed text-amber-11 text-[10.5px]">Guru mengoreksi essay dengan rubrik: Pemahaman Konsep (40%), Ketajaman Argumen (30%), dan Tata Bahasa (30%). Sistem otomatis menghitung total nilai.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Preset 5: Penilaian Manual Guru -->
                        <div @click="applyScoringPreset('manual')"
                             :class="[form.settings.scoring_template === 'manual' ? 'border-green-8 bg-green-2/40 ring-2 ring-green-7' : 'border-gray-6 hover:border-gray-7 bg-white', isStandardLockedType() && form.settings.scoring_template !== 'manual' ? 'opacity-40 grayscale' : '']"
                             class="p-4 rounded-2xl border transition-all cursor-pointer space-y-2 group">
                            <div class="flex items-center justify-between">
                                <span class="w-7 h-7 rounded-lg bg-red-3 text-red-11 font-bold text-xs flex items-center justify-center">Manual</span>
                                <button type="button" @click.stop="togglePresetInfo('manual')"
                                        :class="activePresetInfo === 'manual' ? 'bg-red-4 text-red-12 border-red-7 ring-1 ring-red-7' : 'bg-red-2 text-red-11 hover:text-red-12 hover:bg-red-3 border-red-5 hover:border-red-6/60'"
                                        class="inline-flex items-center gap-1 text-[10px] font-bold px-2 py-0.5 rounded-md border transition-all cursor-pointer pointer-events-auto shadow-2xs"
                                        title="Klik untuk melihat penjelasan lengkap & contoh">
                                    <span>Koreksi Guru</span>
                                    <x-radix-icon name="info-circled" class="w-3 h-3 text-red-9 shrink-0" />
                                </button>
                            </div>
                            <h4 class="font-display font-bold text-sm text-gray-12 group-hover:text-green-11 transition-colors">Penilaian Manual</h4>
                            
                            <!-- Expandable Explanation -->
                            <div x-show="activePresetInfo === 'manual'" x-collapse @click.stop
                                 class="pt-2.5 border-t border-gray-5 space-y-2 text-[11px] text-gray-11 pointer-events-auto cursor-default">
                                <div class="space-y-0.5">
                                    <span class="font-bold text-gray-12 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-red-9 shrink-0"></span>Skema Skor:</span>
                                    <p class="leading-relaxed text-gray-11 pl-3">Skor angka mentah diinput langsung oleh guru pasca memeriksa lembar kerja siswa di panel koreksi.</p>
                                </div>
                                <div class="space-y-0.5">
                                    <span class="font-bold text-gray-12 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-purple-9 shrink-0"></span>Sangat Cocok:</span>
                                    <p class="leading-relaxed text-gray-11 pl-3">Ujian Essay Bebas, Perhitungan Rumus Langkah demi Langkah, Ujian Praktik/Lab, Portofolio, Wawancara Lisan.</p>
                                </div>
                                <div class="bg-red-2/50 p-2 rounded-lg border border-red-6/40 space-y-0.5">
                                    <span class="font-bold text-red-12 block text-[10.5px]">Contoh Kasus Riil:</span>
                                    <p class="leading-relaxed text-red-11 text-[10.5px]">Guru memeriksa langkah pengerjaan matematika siswa, memberikan poin per baris rumus, dan nilai final resmi dirilis setelah pemeriksaan tuntas.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Preset 6: Formula Bobot Section -->
                        <div @click="applyScoringPreset('formula')"
                             :class="[form.settings.scoring_template === 'formula' ? 'border-green-8 bg-green-2/40 ring-2 ring-green-7' : 'border-gray-6 hover:border-gray-7 bg-white', isStandardLockedType() && form.settings.scoring_template !== 'formula' ? 'opacity-40 grayscale' : '']"
                             class="p-4 rounded-2xl border transition-all cursor-pointer space-y-2 group">
                            <div class="flex items-center justify-between">
                                <span class="w-7 h-7 rounded-lg bg-teal-3 text-teal-11 font-bold text-xs flex items-center justify-center">Σ %</span>
                                <button type="button" @click.stop="togglePresetInfo('formula')"
                                        :class="activePresetInfo === 'formula' ? 'bg-teal-4 text-teal-12 border-teal-7 ring-1 ring-teal-7' : 'bg-teal-2 text-teal-11 hover:text-teal-12 hover:bg-teal-3 border-teal-5 hover:border-teal-6/60'"
                                        class="inline-flex items-center gap-1 text-[10px] font-bold px-2 py-0.5 rounded-md border transition-all cursor-pointer pointer-events-auto shadow-2xs"
                                        title="Klik untuk melihat penjelasan lengkap & contoh">
                                    <span>Multi-Section</span>
                                    <x-radix-icon name="info-circled" class="w-3 h-3 text-teal-9 shrink-0" />
                                </button>
                            </div>
                            <h4 class="font-display font-bold text-sm text-gray-12 group-hover:text-green-11 transition-colors">Formula Pembobotan Bagian</h4>
                            
                            <!-- Expandable Explanation -->
                            <div x-show="activePresetInfo === 'formula'" x-collapse @click.stop
                                 class="pt-2.5 border-t border-gray-5 space-y-2 text-[11px] text-gray-11 pointer-events-auto cursor-default">
                                <div class="space-y-0.5">
                                    <span class="font-bold text-gray-12 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-teal-9 shrink-0"></span>Skema Skor:</span>
                                    <p class="leading-relaxed text-gray-11 pl-3">Akumulasi persentase per bagian: (Skor Bagian 1 × W1%) + (Skor Bagian 2 × W2%) = 100%.</p>
                                </div>
                                <div class="space-y-0.5">
                                    <span class="font-bold text-gray-12 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-blue-9 shrink-0"></span>Sangat Cocok:</span>
                                    <p class="leading-relaxed text-gray-11 pl-3">Ujian Semester Terpadu yang menggabungkan soal Pilihan Ganda &amp; soal Uraian/Praktik.</p>
                                </div>
                                <div class="bg-teal-2/50 p-2 rounded-lg border border-teal-6/40 space-y-0.5">
                                    <span class="font-bold text-teal-12 block text-[10.5px]">Contoh Kasus Riil:</span>
                                    <p class="leading-relaxed text-teal-11 text-[10.5px]">Bagian 1 (40 Soal PG) diberi bobot 70%, Bagian 2 (5 Soal Essay) diberi bobot 30%. Nilai akhir dihitung: (Skor PG × 70%) + (Skor Essay × 30%).</p>
                                </div>
                            </div>
                        </div>

                        <!-- Preset 7: UTBK SNBT (IRT) -->
                        <div @click="applyScoringPreset('utbk')"
                             :class="[form.settings.scoring_template === 'utbk' ? 'border-green-8 bg-green-2/40 ring-2 ring-green-7' : 'border-gray-6 hover:border-gray-7 bg-white', isStandardLockedType() && form.settings.scoring_template !== 'utbk' ? 'opacity-40 grayscale' : '']"
                             class="p-4 rounded-2xl border transition-all cursor-pointer space-y-2 group">
                            <div class="flex items-center justify-between">
                                <span class="w-7 h-7 rounded-lg bg-indigo-3 text-indigo-11 font-bold text-xs flex items-center justify-center">IRT</span>
                                <button type="button" @click.stop="togglePresetInfo('utbk')"
                                        :class="activePresetInfo === 'utbk' ? 'bg-indigo-4 text-indigo-12 border-indigo-7 ring-1 ring-indigo-7' : 'bg-indigo-2 text-indigo-11 hover:text-indigo-12 hover:bg-indigo-3 border-indigo-5 hover:border-indigo-6/60'"
                                        class="inline-flex items-center gap-1 text-[10px] font-bold px-2 py-0.5 rounded-md border transition-all cursor-pointer pointer-events-auto shadow-2xs"
                                        title="Klik untuk melihat penjelasan lengkap & contoh">
                                    <span>Skala 200-1000</span>
                                    <x-radix-icon name="info-circled" class="w-3 h-3 text-indigo-9 shrink-0" />
                                </button>
                            </div>
                            <h4 class="font-display font-bold text-sm text-gray-12 group-hover:text-green-11 transition-colors">UTBK SNBT (Item Response Theory)</h4>
                            
                            <!-- Expandable Explanation -->
                            <div x-show="activePresetInfo === 'utbk'" x-collapse @click.stop
                                 class="pt-2.5 border-t border-gray-5 space-y-2 text-[11px] text-gray-11 pointer-events-auto cursor-default">
                                <div class="space-y-0.5">
                                    <span class="font-bold text-gray-12 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-indigo-9 shrink-0"></span>Skema Skor:</span>
                                    <p class="leading-relaxed text-gray-11 pl-3">Penilaian berbasis tingkat kesulitan butir soal (IRT). Skor mentah dikonversi ke skala UTBK 200 – 1000.</p>
                                </div>
                                <div class="space-y-0.5">
                                    <span class="font-bold text-gray-12 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-green-9 shrink-0"></span>Sangat Cocok:</span>
                                    <p class="leading-relaxed text-gray-11 pl-3">Simulasi Tryout UTBK-SNBT, Tes Potensi Skolastik (TPS), dan Tes Literasi Nasional.</p>
                                </div>
                                <div class="bg-indigo-2/50 p-2 rounded-lg border border-indigo-6/40 space-y-0.5">
                                    <span class="font-bold text-indigo-12 block text-[10.5px]">Contoh Kasus Riil:</span>
                                    <p class="leading-relaxed text-indigo-11 text-[10.5px]">Soal yang jarang dijawab benar oleh peserta lain memiliki bobot nilai IRT lebih tinggi daripada butir soal yang dijawab benar oleh mayoritas peserta.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Preset 8: TOEIC -->
                        <div @click="applyScoringPreset('toeic')"
                             :class="[form.settings.scoring_template === 'toeic' ? 'border-green-8 bg-green-2/40 ring-2 ring-green-7' : 'border-gray-6 hover:border-gray-7 bg-white', isStandardLockedType() && form.settings.scoring_template !== 'toeic' ? 'opacity-40 grayscale' : '']"
                             class="p-4 rounded-2xl border transition-all cursor-pointer space-y-2 group">
                            <div class="flex items-center justify-between">
                                <span class="w-7 h-7 rounded-lg bg-yellow-3 text-yellow-11 font-bold text-xs flex items-center justify-center">TOEIC</span>
                                <button type="button" @click.stop="togglePresetInfo('toeic')"
                                        :class="activePresetInfo === 'toeic' ? 'bg-yellow-4 text-yellow-12 border-yellow-7 ring-1 ring-yellow-7' : 'bg-yellow-2 text-yellow-11 hover:text-yellow-12 hover:bg-yellow-3 border-yellow-5 hover:border-yellow-6/60'"
                                        class="inline-flex items-center gap-1 text-[10px] font-bold px-2 py-0.5 rounded-md border transition-all cursor-pointer pointer-events-auto shadow-2xs"
                                        title="Klik untuk melihat penjelasan lengkap & contoh">
                                    <span>Skala 10-990</span>
                                    <x-radix-icon name="info-circled" class="w-3 h-3 text-yellow-9 shrink-0" />
                                </button>
                            </div>
                            <h4 class="font-display font-bold text-sm text-gray-12 group-hover:text-green-11 transition-colors">TOEIC Scoring</h4>
                            
                            <!-- Expandable Explanation -->
                            <div x-show="activePresetInfo === 'toeic'" x-collapse @click.stop
                                 class="pt-2.5 border-t border-gray-5 space-y-2 text-[11px] text-gray-11 pointer-events-auto cursor-default">
                                <div class="space-y-0.5">
                                    <span class="font-bold text-gray-12 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-yellow-9 shrink-0"></span>Skema Skor:</span>
                                    <p class="leading-relaxed text-gray-11 pl-3">Skala nilai standar TOEIC 10 – 990 (Listening 5–495, Reading 5–495).</p>
                                </div>
                                <div class="space-y-0.5">
                                    <span class="font-bold text-gray-12 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-blue-9 shrink-0"></span>Sangat Cocok:</span>
                                    <p class="leading-relaxed text-gray-11 pl-3">Simulasi Uji Kemahiran Bahasa Inggris Bisnis / Dunia Kerja Internasional (TOEIC Prediction).</p>
                                </div>
                                <div class="bg-yellow-2/50 p-2 rounded-lg border border-yellow-6/40 space-y-0.5">
                                    <span class="font-bold text-yellow-12 block text-[10.5px]">Contoh Kasus Riil:</span>
                                    <p class="leading-relaxed text-yellow-11 text-[10.5px]">Siswa menyelesaikan 100 soal Listening dan 100 soal Reading. Jumlah benar masing-masing dikonversikan via tabel matriks skor TOEIC.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Preset 9: TOEFL ITP -->
                        <div @click="applyScoringPreset('toefl')"
                             :class="[form.settings.scoring_template === 'toefl' ? 'border-green-8 bg-green-2/40 ring-2 ring-green-7' : 'border-gray-6 hover:border-gray-7 bg-white', isStandardLockedType() && form.settings.scoring_template !== 'toefl' ? 'opacity-40 grayscale' : '']"
                             class="p-4 rounded-2xl border transition-all cursor-pointer space-y-2 group">
                            <div class="flex items-center justify-between">
                                <span class="w-7 h-7 rounded-lg bg-cyan-3 text-cyan-11 font-bold text-xs flex items-center justify-center">TOEFL</span>
                                <button type="button" @click.stop="togglePresetInfo('toefl')"
                                        :class="activePresetInfo === 'toefl' ? 'bg-cyan-4 text-cyan-12 border-cyan-7 ring-1 ring-cyan-7' : 'bg-cyan-2 text-cyan-11 hover:text-cyan-12 hover:bg-cyan-3 border-cyan-5 hover:border-cyan-6/60'"
                                        class="inline-flex items-center gap-1 text-[10px] font-bold px-2 py-0.5 rounded-md border transition-all cursor-pointer pointer-events-auto shadow-2xs"
                                        title="Klik untuk melihat penjelasan lengkap & contoh">
                                    <span>Skala 310-677</span>
                                    <x-radix-icon name="info-circled" class="w-3 h-3 text-cyan-9 shrink-0" />
                                </button>
                            </div>
                            <h4 class="font-display font-bold text-sm text-gray-12 group-hover:text-green-11 transition-colors">TOEFL ITP Scoring</h4>
                            
                            <!-- Expandable Explanation -->
                            <div x-show="activePresetInfo === 'toefl'" x-collapse @click.stop
                                 class="pt-2.5 border-t border-gray-5 space-y-2 text-[11px] text-gray-11 pointer-events-auto cursor-default">
                                <div class="space-y-0.5">
                                    <span class="font-bold text-gray-12 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-cyan-9 shrink-0"></span>Skema Skor:</span>
                                    <p class="leading-relaxed text-gray-11 pl-3">Konversi 3 bagian (Listening, Structure, Reading) ke skala 31–68, lalu dirata-rata ke skor 310 – 677.</p>
                                </div>
                                <div class="space-y-0.5">
                                    <span class="font-bold text-gray-12 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-green-9 shrink-0"></span>Sangat Cocok:</span>
                                    <p class="leading-relaxed text-gray-11 pl-3">Uji Prediksi TOEFL ITP untuk syarat kelulusan sarjana/pascasarjana, beasiswa LPDP, dan rekrutmen BUMN.</p>
                                </div>
                                <div class="bg-cyan-2/50 p-2 rounded-lg border border-cyan-6/40 space-y-0.5">
                                    <span class="font-bold text-cyan-12 block text-[10.5px]">Contoh Kasus Riil:</span>
                                    <p class="leading-relaxed text-cyan-11 text-[10.5px]">Skor mentah tiap seksi dikonversi ke scaled score: ((Scaled L + Scaled S + Scaled R) × 10) / 3 = Skor Final TOEFL ITP.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Preset 10: IELTS -->
                        <div @click="applyScoringPreset('ielts')"
                             :class="[form.settings.scoring_template === 'ielts' ? 'border-green-8 bg-green-2/40 ring-2 ring-green-7' : 'border-gray-6 hover:border-gray-7 bg-white', isStandardLockedType() && form.settings.scoring_template !== 'ielts' ? 'opacity-40 grayscale' : '']"
                             class="p-4 rounded-2xl border transition-all cursor-pointer space-y-2 group">
                            <div class="flex items-center justify-between">
                                <span class="w-7 h-7 rounded-lg bg-orange-3 text-orange-11 font-bold text-xs flex items-center justify-center">IELTS</span>
                                <button type="button" @click.stop="togglePresetInfo('ielts')"
                                        :class="activePresetInfo === 'ielts' ? 'bg-orange-4 text-orange-12 border-orange-7 ring-1 ring-orange-7' : 'bg-orange-2 text-orange-11 hover:text-orange-12 hover:bg-orange-3 border-orange-5 hover:border-orange-6/60'"
                                        class="inline-flex items-center gap-1 text-[10px] font-bold px-2 py-0.5 rounded-md border transition-all cursor-pointer pointer-events-auto shadow-2xs"
                                        title="Klik untuk melihat penjelasan lengkap & contoh">
                                    <span>Band 0-9.0</span>
                                    <x-radix-icon name="info-circled" class="w-3 h-3 text-orange-9 shrink-0" />
                                </button>
                            </div>
                            <h4 class="font-display font-bold text-sm text-gray-12 group-hover:text-green-11 transition-colors">IELTS Band Score</h4>
                            
                            <!-- Expandable Explanation -->
                            <div x-show="activePresetInfo === 'ielts'" x-collapse @click.stop
                                 class="pt-2.5 border-t border-gray-5 space-y-2 text-[11px] text-gray-11 pointer-events-auto cursor-default">
                                <div class="space-y-0.5">
                                    <span class="font-bold text-gray-12 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-orange-9 shrink-0"></span>Skema Skor:</span>
                                    <p class="leading-relaxed text-gray-11 pl-3">Skala Band Score 0.0 – 9.0 pembulatan kelipatan 0.5 (rata-rata 4 komponen: Listening, Reading, Writing, Speaking).</p>
                                </div>
                                <div class="space-y-0.5">
                                    <span class="font-bold text-gray-12 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-blue-9 shrink-0"></span>Sangat Cocok:</span>
                                    <p class="leading-relaxed text-gray-11 pl-3">Simulasi Ujian IELTS Academic &amp; General Training untuk studi lanjut dan imigrasi luar negeri.</p>
                                </div>
                                <div class="bg-orange-2/50 p-2 rounded-lg border border-orange-6/40 space-y-0.5">
                                    <span class="font-bold text-orange-12 block text-[10.5px]">Contoh Kasus Riil:</span>
                                    <p class="leading-relaxed text-orange-11 text-[10.5px]">Listening 7.0, Reading 6.5, Writing 6.0, Speaking 6.5 -> Nilai rata-rata 6.5 menghasilkan Overall Band Score = 6.5.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Preset 11: Kustom Mandiri -->
                        <div @click="applyScoringPreset('custom')"
                             :class="[form.settings.scoring_template === 'custom' ? 'border-green-8 bg-green-2/40 ring-2 ring-green-7' : 'border-gray-6 hover:border-gray-7 bg-white', isStandardLockedType() && form.settings.scoring_template !== 'custom' ? 'opacity-40 grayscale' : '']"
                             class="p-4 rounded-2xl border transition-all cursor-pointer space-y-2 group">
                            <div class="flex items-center justify-between">
                                <span class="w-7 h-7 rounded-lg bg-gray-3 text-gray-12 font-bold text-xs flex items-center justify-center">⚙️</span>
                                <button type="button" @click.stop="togglePresetInfo('custom')"
                                        :class="activePresetInfo === 'custom' ? 'bg-gray-4 text-gray-12 border-gray-7 ring-1 ring-gray-7' : 'bg-gray-2 text-gray-11 hover:text-gray-12 hover:bg-gray-3 border-gray-5 hover:border-gray-6/60'"
                                        class="inline-flex items-center gap-1 text-[10px] font-bold px-2 py-0.5 rounded-md border transition-all cursor-pointer pointer-events-auto shadow-2xs"
                                        title="Klik untuk melihat penjelasan lengkap & contoh">
                                    <span>Bebas</span>
                                    <x-radix-icon name="info-circled" class="w-3 h-3 text-gray-9 shrink-0" />
                                </button>
                            </div>
                            <h4 class="font-display font-bold text-sm text-gray-12 group-hover:text-green-11 transition-colors">Kustom Mandiri</h4>
                            
                            <!-- Expandable Explanation -->
                            <div x-show="activePresetInfo === 'custom'" x-collapse @click.stop
                                 class="pt-2.5 border-t border-gray-5 space-y-2 text-[11px] text-gray-11 pointer-events-auto cursor-default">
                                <div class="space-y-0.5">
                                    <span class="font-bold text-gray-12 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-gray-9 shrink-0"></span>Skema Skor:</span>
                                    <p class="leading-relaxed text-gray-11 pl-3">Kombinasi bebas metode penilaian, pembobotan, ambang KKM, dan formula per bagian sesuai preferensi.</p>
                                </div>
                                <div class="space-y-0.5">
                                    <span class="font-bold text-gray-12 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-green-9 shrink-0"></span>Sangat Cocok:</span>
                                    <p class="leading-relaxed text-gray-11 pl-3">Ujian unik lembaga/institusi bimbel, sertifikasi internal, atau kompetisi dengan formula penilaian non-standar.</p>
                                </div>
                                <div class="bg-gray-2 p-2 rounded-lg border border-gray-5 space-y-0.5">
                                    <span class="font-bold text-gray-12 block text-[10.5px]">Contoh Kasus Riil:</span>
                                    <p class="leading-relaxed text-gray-11 text-[10.5px]">Panitia menentukan batas tuntas KKM 80 dengan pembobotan dinamis antar bagian yang disesuaikan secara manual.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 2. TIPE ASESMEN & MASA BERLAKU -->
                <div class="p-5 rounded-2xl border border-gray-6 bg-gray-2/30 space-y-4">
                    <div class="flex items-center justify-between border-b border-gray-5 pb-3">
                        <div class="flex items-center gap-2.5">
                            <span class="w-7 h-7 rounded-lg bg-green-9 text-white flex items-center justify-center font-bold text-xs">2</span>
                            <div>
                                <h3 class="font-display font-bold text-sm text-gray-12">Tipe Asesmen & Masa Berlaku</h3>
                                <p class="text-xs text-gray-11">Tentukan apakah ujian ini berlaku selamanya atau untuk periode waktu tertentu.</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-1">
                        <!-- Type: Selamanya -->
                        <div @click="form.settings.validity_type = 'forever'"
                             :class="(form.settings.validity_type === 'forever' || !form.settings.validity_type) ? 'border-green-8 bg-green-2/40 ring-2 ring-green-7' : 'border-gray-6 hover:border-gray-7 bg-white'"
                             class="p-4 rounded-xl border transition-all cursor-pointer space-y-1 group relative">
                            <div class="flex items-center justify-between">
                                <h4 class="font-bold text-sm text-gray-12 group-hover:text-green-11 transition-colors">Berlaku Selamanya</h4>
                                <span x-show="form.settings.validity_type === 'forever' || !form.settings.validity_type" class="w-5 h-5 rounded-full bg-green-9 text-white flex items-center justify-center"><x-radix-icon name="check" class="w-3.5 h-3.5" /></span>
                            </div>
                            <p class="text-xs text-gray-11 pr-6">Latihan biasa yang dapat diakses kapan saja oleh siswa.</p>
                        </div>

                        <!-- Type: Jangka Waktu -->
                        <div @click="form.settings.validity_type = 'period'"
                             :class="form.settings.validity_type === 'period' ? 'border-green-8 bg-green-2/40 ring-2 ring-green-7' : 'border-gray-6 hover:border-gray-7 bg-white'"
                             class="p-4 rounded-xl border transition-all cursor-pointer space-y-1 group relative">
                            <div class="flex items-center justify-between">
                                <h4 class="font-bold text-sm text-gray-12 group-hover:text-green-11 transition-colors">Berlaku Jangka Waktu</h4>
                                <span x-show="form.settings.validity_type === 'period'" class="w-5 h-5 rounded-full bg-green-9 text-white flex items-center justify-center"><x-radix-icon name="check" class="w-3.5 h-3.5" /></span>
                            </div>
                            <p class="text-xs text-gray-11 pr-6">Cocok untuk Tryout, Lomba, atau ujian dengan jadwal ketat.</p>
                        </div>
                    </div>

                    <!-- Date Picker Fields -->
                    <div x-show="form.settings.validity_type === 'period'" x-transition.opacity class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4 pt-4 border-t border-gray-5">
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-gray-12">Waktu Mulai Ujian <span class="text-red-9">*</span></label>
                            <input type="datetime-local" x-model="form.settings.start_time"
                                   class="w-full rounded-xl border border-gray-7 bg-white px-3.5 py-2 text-sm text-gray-12 outline-none focus:border-green-8">
                        </div>
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-gray-12">Waktu Selesai Ujian <span class="text-red-9">*</span></label>
                            <input type="datetime-local" x-model="form.settings.end_time"
                                   class="w-full rounded-xl border border-gray-7 bg-white px-3.5 py-2 text-sm text-gray-12 outline-none focus:border-green-8">
                        </div>
                    </div>
                </div>

                <!-- 3. KKM / PASSING GRADE CONFIGURATION -->
                <div class="p-5 rounded-2xl border border-gray-6 bg-gray-2/30 space-y-4">
                    <div class="flex items-center justify-between border-b border-gray-5 pb-3">
                        <div class="flex items-center gap-2.5">
                            <span class="w-7 h-7 rounded-lg bg-green-9 text-white flex items-center justify-center font-bold text-xs">3</span>
                            <div>
                                <h3 class="font-display font-bold text-sm text-gray-12">Kriteria Ketuntasan Minimal (KKM / Passing Grade)</h3>
                                <p class="text-xs text-gray-11">Tentukan ambang batas kelulusan untuk penentuan status otomatis siswa.</p>
                            </div>
                        </div>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" x-model="form.settings.passing_grade.enabled" class="rounded text-green-9 focus:ring-green-8">
                            <span class="text-xs font-bold text-gray-12">Aktifkan KKM</span>
                        </label>
                    </div>

                    <div x-show="form.settings.passing_grade.enabled" x-transition.opacity class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-1">
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-gray-12">Nilai KKM Minimal (Skala 0 - 100) <span class="text-red-9">*</span></label>
                            <input type="number" x-model="form.settings.passing_grade.min_score" min="0" max="1000" step="1"
                                   class="w-full rounded-xl border border-gray-7 bg-white px-3.5 py-2 text-base font-bold text-gray-12 outline-none focus:border-green-8">
                            <span class="text-[11px] text-gray-9">Standar sekolah umumnya bernilai 75.</span>
                        </div>

                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-gray-12">Label Status Lulus (Skor ≥ KKM)</label>
                            <input type="text" x-model="form.settings.passing_grade.pass_label" placeholder="Lulus / Tuntas"
                                   class="w-full rounded-xl border border-gray-6 bg-white px-3.5 py-2 text-xs font-semibold text-green-11 outline-none focus:border-green-8">
                        </div>

                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-gray-12">Label Status Tidak Lulus (Skor &lt; KKM)</label>
                            <input type="text" x-model="form.settings.passing_grade.fail_label" placeholder="Belum Tuntas (Remedial)"
                                   class="w-full rounded-xl border border-gray-6 bg-white px-3.5 py-2 text-xs font-semibold text-red-11 outline-none focus:border-green-8">
                        </div>

                        <!-- Dynamic Preview Card -->
                        <div class="md:col-span-3 p-3.5 rounded-xl bg-white border border-gray-6 flex flex-col sm:flex-row sm:items-center justify-between gap-3 text-xs">
                            <div class="flex items-center gap-3">
                                <span class="text-gray-11 font-medium">Pratinjau Status Siswa:</span>
                                <div class="flex items-center gap-2">
                                    <span class="px-2.5 py-0.5 rounded-md bg-green-3 text-green-11 font-bold border border-green-6/60 flex items-center gap-1">
                                        <span>✓ Nilai 80:</span>
                                        <span x-text="form.settings.passing_grade.pass_label || 'Lulus'"></span>
                                    </span>
                                    <span class="px-2.5 py-0.5 rounded-md bg-red-3 text-red-11 font-bold border border-red-6/60 flex items-center gap-1">
                                        <span>✕ Nilai 65:</span>
                                        <span x-text="form.settings.passing_grade.fail_label || 'Remedial'"></span>
                                    </span>
                                </div>
                            </div>
                            <span class="text-gray-9 font-mono">Ambang batas: <strong class="text-gray-12" x-text="form.settings.passing_grade.min_score"></strong></span>
                        </div>
                    </div>
                </div>

                <!-- 4. SECTION WEIGHTING & FORMULA -->
                <div class="p-5 rounded-2xl border border-gray-6 bg-gray-2/30 space-y-4">
                    <div class="flex items-center gap-2.5 border-b border-gray-5 pb-3">
                        <span class="w-7 h-7 rounded-lg bg-green-9 text-white flex items-center justify-center font-bold text-xs">4</span>
                        <div>
                            <h3 class="font-display font-bold text-sm text-gray-12">Formula Perhitungan & Pembobotan Bagian (Section)</h3>
                            <p class="text-xs text-gray-11">Tentukan bagaimana akumulasi nilai per bagian digabungkan menjadi Nilai Akhir.</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <label class="p-3.5 rounded-xl border bg-white cursor-pointer flex items-start gap-3"
                                   :class="form.settings.formula_type === 'sum' ? 'border-green-8 ring-1 ring-green-8' : 'border-gray-6'">
                                <input type="radio" name="formula_type" value="sum" x-model="form.settings.formula_type" class="mt-0.5 text-green-9">
                                <div>
                                    <span class="block text-xs font-bold text-gray-12">Akumulasi Poin Murni (Standar)</span>
                                    <span class="text-[11px] text-gray-11 leading-relaxed">Nilai akhir dihitung otomatis dari total perolehan poin seluruh butir soal tanpa bobot khusus per bagian.</span>
                                </div>
                            </label>

                            <label class="p-3.5 rounded-xl border bg-white cursor-pointer flex items-start gap-3"
                                   :class="form.settings.formula_type === 'weighted_percentage' ? 'border-green-8 ring-1 ring-green-8' : 'border-gray-6'">
                                <input type="radio" name="formula_type" value="weighted_percentage" x-model="form.settings.formula_type" @change="initSectionWeights()" class="mt-0.5 text-green-9">
                                <div>
                                    <span class="block text-xs font-bold text-gray-12">Pembobotan Persentase per Bagian (Formula)</span>
                                    <span class="text-[11px] text-gray-11 leading-relaxed">Setiap bagian memiliki kontribusi persentase terhadap nilai akhir 100% (contoh: PG 70% + Essay 30%).</span>
                                </div>
                            </label>
                        </div>

                        <!-- Section Weights Inputs (If weighted_percentage chosen) -->
                        <div x-show="form.settings.formula_type === 'weighted_percentage'" x-transition.opacity class="p-4 rounded-xl bg-white border border-gray-6 space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-bold text-gray-12">Atur Bobot Persentase (%) Tiap Bagian:</span>
                                <div class="flex items-center gap-2">
                                    <span class="text-xs text-gray-11">Total Bobot:</span>
                                    <span class="text-xs font-mono font-bold px-2 py-0.5 rounded-md"
                                          :class="getTotalSectionWeight() === 100 ? 'bg-green-3 text-green-11 border border-green-6/60' : 'bg-red-3 text-red-11 border border-red-6/60'"
                                          x-text="getTotalSectionWeight() + '% / 100%'"></span>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
                                <template x-for="(sec, sIdx) in form.sections" :key="sec.id">
                                    <div class="p-3 rounded-lg bg-gray-2/50 border border-gray-5 space-y-1.5">
                                        <div class="flex items-center justify-between">
                                            <span class="text-xs font-bold text-gray-12 truncate max-w-[150px]" x-text="sec.title || ('Bagian ' + (sIdx + 1))"></span>
                                            <span class="text-[10px] text-gray-9 font-mono">Bagian #<span x-text="sIdx + 1"></span></span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <input type="number" min="0" max="100" step="1"
                                                   :value="getSectionWeight(sec.id)"
                                                   @input="setSectionWeight(sec.id, $event.target.value)"
                                                   class="w-full rounded-lg border border-gray-6 bg-white px-2.5 py-1 text-xs font-bold text-gray-12 text-center outline-none focus:border-green-8">
                                            <span class="text-xs font-bold text-gray-11">%</span>
                                        </div>
                                    </div>
                                </template>
                            </div>

                            <p x-show="getTotalSectionWeight() !== 100" class="text-xs text-red-11 font-semibold flex items-center gap-1.5">
                                <x-radix-icon name="exclamation-triangle" class="w-4 h-4 text-red-9" />
                                <span>Peringatan: Total bobot seluruh bagian harus berjumlah tepat 100%.</span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- 5. KEBIJAKAN PENGAWASAN UJIAN -->
                <div class="p-5 rounded-2xl border border-gray-6 bg-gray-2/30 space-y-4">
                    <div class="flex items-center justify-between border-b border-gray-5 pb-3">
                        <div class="flex items-center gap-2.5">
                            <span class="w-7 h-7 rounded-lg bg-green-9 text-white flex items-center justify-center font-bold text-xs">5</span>
                            <div>
                                <h3 class="font-display font-bold text-sm text-gray-12">Kebijakan Pengawasan Ujian</h3>
                                <p class="text-xs text-gray-11">Pilih metode pengawasan integritas selama ujian berlangsung.</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-1">
                        <!-- Pilihan A: Tanpa Pengawas -->
                        <div @click="form.settings.proctoring_mode = 'unproctored'"
                             :class="(form.settings.proctoring_mode === 'unproctored' || !form.settings.proctoring_mode) ? 'border-green-8 bg-green-2/40 ring-2 ring-green-7' : 'border-gray-6 hover:border-gray-7 bg-white'"
                             class="p-4 rounded-xl border transition-all cursor-pointer space-y-1.5 group relative">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <span class="text-base">🔓</span>
                                    <h4 class="font-bold text-sm text-gray-12 group-hover:text-green-11 transition-colors">A. Tanpa Pengawas</h4>
                                </div>
                                <span x-show="form.settings.proctoring_mode === 'unproctored' || !form.settings.proctoring_mode" class="w-5 h-5 rounded-full bg-green-9 text-white flex items-center justify-center">
                                    <x-radix-icon name="check" class="w-3.5 h-3.5" />
                                </span>
                            </div>
                            <p class="text-xs text-gray-11 pr-2 leading-relaxed">
                                Biarkan ujian tetap berjalan dan serahkan ke admin/guru untuk menindaklanjuti pelanggaran setelah submit. Tetap catat &amp; tampilkan berapa kali pelanggaran.
                            </p>
                        </div>

                        <!-- Pilihan B: Dengan Pengawas -->
                        <div @click="form.settings.proctoring_mode = 'proctored'"
                             :class="form.settings.proctoring_mode === 'proctored' ? 'border-green-8 bg-green-2/40 ring-2 ring-green-7' : 'border-gray-6 hover:border-gray-7 bg-white'"
                             class="p-4 rounded-xl border transition-all cursor-pointer space-y-1.5 group relative">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <span class="text-base">🛡️</span>
                                    <h4 class="font-bold text-sm text-gray-12 group-hover:text-green-11 transition-colors">B. Dengan Pengawas</h4>
                                </div>
                                <span x-show="form.settings.proctoring_mode === 'proctored'" class="w-5 h-5 rounded-full bg-green-9 text-white flex items-center justify-center">
                                    <x-radix-icon name="check" class="w-3.5 h-3.5" />
                                </span>
                            </div>
                            <p class="text-xs text-gray-11 pr-2 leading-relaxed">
                                Pengawasan ketat real-time. Saat siswa melanggar, layar terkunci dengan pesan "Menunggu keputusan pengawas ujian". Pengawas memegang kendali penuh.
                            </p>
                        </div>
                    </div>

                    <!-- Wewenang Pengawas (Muncul jika 'Dengan Pengawas' dipilih) -->
                    <div x-show="form.settings.proctoring_mode === 'proctored'" x-transition.opacity class="p-4 rounded-xl bg-blue-50/70 border border-blue-200 text-blue-950 text-xs space-y-3 mt-2">
                        <div class="flex items-center gap-2 font-bold text-blue-900 font-display">
                            <x-radix-icon name="shield" class="w-4 h-4 text-blue-700" />
                            <span>Wewenang &amp; Hak Tindakan Pengawas Saat Ujian:</span>
                        </div>
                        <p class="text-[11.5px] text-blue-900/80 leading-relaxed">
                            Saat siswa melanggar (pindah tab / keluar layar), sistem mengaktifkan lock screen pada siswa dengan pesan <em>"Menunggu keputusan pengawas ujian"</em>. Selama masa lock screen, waktu tetap berjalan. Pengawas memiliki tombol tindakan:
                        </p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-2.5 pt-1">
                            <div class="p-3 rounded-xl bg-white border border-blue-200 shadow-2xs space-y-1">
                                <div class="font-bold text-blue-900 flex items-center gap-1.5 text-xs">
                                    <span class="px-1.5 py-0.5 rounded bg-blue-100 text-blue-800 text-[10px] font-mono font-bold">1. PIN</span>
                                    <span>Buka Kunci PIN</span>
                                </div>
                                <p class="text-[11px] text-gray-11 leading-relaxed">Tombol PIN di-generate saat diklik pengawas. PIN diinput pengawas/siswa ke layar yang terkunci.</p>
                            </div>
                            <div class="p-3 rounded-xl bg-white border border-amber-200 shadow-2xs space-y-1">
                                <div class="font-bold text-amber-900 flex items-center gap-1.5 text-xs">
                                    <span class="px-1.5 py-0.5 rounded bg-amber-100 text-amber-800 text-[10px] font-mono font-bold">2. TIME</span>
                                    <span>Potong Waktu</span>
                                </div>
                                <p class="text-[11px] text-gray-11 leading-relaxed">Pengawas memasukkan jumlah menit potongan. Layar siswa terbuka dan waktu berkurang.</p>
                            </div>
                            <div class="p-3 rounded-xl bg-white border border-purple-200 shadow-2xs space-y-1">
                                <div class="font-bold text-purple-900 flex items-center gap-1.5 text-xs">
                                    <span class="px-1.5 py-0.5 rounded bg-purple-100 text-purple-800 text-[10px] font-mono font-bold">3. POINT</span>
                                    <span>Potong Nilai</span>
                                </div>
                                <p class="text-[11px] text-gray-11 leading-relaxed">Pengawas memasukkan jumlah potongan skor. Layar siswa terbuka dan nilai dipotong pasca submit.</p>
                            </div>
                            <div class="p-3 rounded-xl bg-white border border-orange-200 shadow-2xs space-y-1">
                                <div class="font-bold text-orange-900 flex items-center gap-1.5 text-xs">
                                    <span class="px-1.5 py-0.5 rounded bg-orange-100 text-orange-800 text-[10px] font-mono font-bold">4. RESET</span>
                                    <span>Reset Jawaban</span>
                                </div>
                                <p class="text-[11px] text-gray-11 leading-relaxed">Kosongkan semua jawaban siswa dan lempar kembali ke nomor 1. Waktu tetap berlanjut.</p>
                            </div>
                            <div class="p-3 rounded-xl bg-white border border-red-200 shadow-2xs space-y-1 sm:col-span-2 md:col-span-2">
                                <div class="font-bold text-red-900 flex items-center gap-1.5 text-xs">
                                    <span class="px-1.5 py-0.5 rounded bg-red-100 text-red-800 text-[10px] font-mono font-bold">5. CANCEL</span>
                                    <span>Hentikan Sesi Ujian</span>
                                </div>
                                <p class="text-[11px] text-gray-11 leading-relaxed">Hentikan sesi ujian siswa seketika dan lempar kembali ke Gerbang Ujian.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Auto Policy Notice -->
                    <div class="p-3.5 rounded-xl bg-green-2/50 border border-green-6/50 text-green-12 text-xs flex items-start gap-3">
                        <span class="w-6 h-6 rounded-md bg-green-4 text-green-11 flex items-center justify-center shrink-0 mt-0.5">
                            <x-radix-icon name="check-circled" class="w-4 h-4" />
                        </span>
                        <div class="leading-relaxed">
                            <strong class="block font-bold text-green-12 mb-0.5">Kebijakan Pasca Ujian Otomatis Sistem:</strong>
                            <ul class="list-disc pl-4 space-y-0.5 text-[11.5px] text-green-11">
                                <li><strong>Pemeriksaan Guru:</strong> <span x-text="hasEssayQuestions() ? 'Wajib (Ujian memiliki soal Uraian/Essay, nilai final dirilis setelah dikoreksi guru)' : 'Otomatis Sistem (Tidak ada soal uraian, nilai langsung terbit)'"></span></li>
                                <li><strong>Rincian Section &amp; Peringkat (Ranking):</strong> Selalu ditampilkan secara otomatis ke siswa pasca ujian.</li>
                                <li><strong>Kunci Jawaban &amp; Pembahasan:</strong> Otomatis dirilis segera setelah siswa menekan tombol SUBMIT.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Navigation Step 5 -->
                <div class="flex items-center justify-between pt-6 border-t border-gray-5 mt-8">
                    <button type="button" @click="currentStep--" 
                            class="px-5 py-2.5 rounded-xl border border-gray-6 bg-white hover:bg-gray-3 text-sm font-semibold text-gray-12 transition-colors cursor-pointer flex items-center gap-2">
                        <x-radix-icon name="arrow-left" class="w-4 h-4" />
                        <span>Sebelumnya</span>
                    </button>
                    <button type="button" @click="nextStep()" 
                            class="px-6 py-2.5 rounded-xl bg-green-9 hover:bg-green-10 active:bg-green-11 text-white text-sm font-semibold transition-all shadow-xs cursor-pointer flex items-center gap-2">
                        <span>Lanjutkan ke Langkah 6: Review</span>
                        <x-radix-icon name="arrow-right" class="w-4 h-4" />
                    </button>
                </div>
            </div>

            <!-- ============================================== -->
            <!-- STEP 6: REVIEW & RINGKASAN STRUKTUR            -->
            <!-- ============================================== -->
            <div x-show="currentStep === 6" x-transition.opacity class="space-y-6">
                <div class="border-b border-gray-5 pb-4">
                    <h2 class="font-display font-bold text-lg text-gray-12">Langkah 6: Review & Validasi Ujian</h2>
                    <p class="text-xs text-gray-11">Periksa kembali ringkasan struktur ujian, komposisi butir soal, dan metode penilaian sebelum dipublikasikan ke siswa.</p>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                    <div class="p-4 rounded-xl border border-gray-6 bg-gray-2/30">
                        <span class="text-xs text-gray-11">Total Bagian</span>
                        <p class="text-xl font-bold font-display text-gray-12 mt-1" x-text="form.sections.length"></p>
                    </div>
                    <div class="p-4 rounded-xl border border-gray-6 bg-gray-2/30">
                        <span class="text-xs text-gray-11">Total Butir Soal</span>
                        <p class="text-xl font-bold font-display text-gray-12 mt-1" x-text="calculateTotalQuestions()"></p>
                    </div>
                    <div class="p-4 rounded-xl border border-gray-6 bg-gray-2/30">
                        <span class="text-xs text-gray-11">Total Bobot Nilai</span>
                        <p class="text-xl font-bold font-display text-green-11 mt-1" x-text="calculateTotalPoints()"></p>
                    </div>
                    <div class="p-4 rounded-xl border border-gray-6 bg-gray-2/30">
                        <span class="text-xs text-gray-11">Alokasi Waktu</span>
                        <p class="text-xl font-bold font-display text-gray-12 mt-1" x-text="form.duration_minutes + ' Menit'"></p>
                    </div>
                </div>

                <!-- Scoring & KKM Summary in Step 6 -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="p-4 rounded-xl border border-gray-6 bg-white space-y-1">
                        <span class="text-[11px] font-bold uppercase tracking-wider text-gray-11">Model Penilaian</span>
                        <p class="text-sm font-bold text-gray-12 capitalize" x-text="form.settings.scoring_template || form.scoring_type"></p>
                        <span class="text-xs text-gray-9" x-text="form.settings.formula_type === 'weighted_percentage' ? 'Formula Pembobotan Bagian' : 'Akumulasi Poin Murni'"></span>
                    </div>

                    <div class="p-4 rounded-xl border border-gray-6 bg-white space-y-1">
                        <span class="text-[11px] font-bold uppercase tracking-wider text-gray-11">KKM / Passing Grade</span>
                        <div class="flex items-center gap-2">
                            <span class="text-base font-bold text-green-11" x-text="form.settings.passing_grade.enabled ? form.settings.passing_grade.min_score : 'Tidak Aktif'"></span>
                            <template x-if="form.settings.passing_grade.enabled">
                                <span class="text-[10px] font-bold px-2 py-0.5 rounded bg-green-3 text-green-11 border border-green-6/50">Aktif</span>
                            </template>
                        </div>
                        <span class="text-xs text-gray-9" x-text="form.settings.passing_grade.enabled ? ('Target: ' + form.settings.passing_grade.pass_label) : 'Tanpa status kelulusan'"></span>
                    </div>

                    <div class="p-4 rounded-xl border border-gray-6 bg-white space-y-1">
                        <span class="text-[11px] font-bold uppercase tracking-wider text-gray-11">Kebijakan Pengawasan</span>
                        <p class="text-sm font-bold text-gray-12" x-text="form.settings.proctoring_mode === 'proctored' ? '🛡️ Dengan Pengawas (Real-Time)' : '🔓 Tanpa Pengawas'"></p>
                        <span class="text-xs text-gray-9" x-text="hasEssayQuestions() ? 'Pemeriksaan Guru: Diperlukan (Ada Essay)' : 'Pemeriksaan Guru: Otomatis Sistem'"></span>
                    </div>
                </div>

                <!-- Structured Overview -->
                <div class="border border-gray-6 rounded-xl p-4 bg-white space-y-3">
                    <h3 class="font-bold text-sm text-gray-12" x-text="form.title || 'Ujian Tanpa Judul'"></h3>
                    <p class="text-xs text-gray-11" x-text="form.description || 'Tidak ada deskripsi.'"></p>
                </div>

                <!-- Navigation Step 6 -->
                <div class="flex items-center justify-between pt-6 border-t border-gray-5 mt-8">
                    <button type="button" @click="currentStep--" 
                            class="px-5 py-2.5 rounded-xl border border-gray-6 bg-white hover:bg-gray-3 text-sm font-semibold text-gray-12 transition-colors cursor-pointer flex items-center gap-2">
                        <x-radix-icon name="arrow-left" class="w-4 h-4" />
                        <span>Sebelumnya</span>
                    </button>
                    <button type="button" @click="nextStep()" 
                            class="px-6 py-2.5 rounded-xl bg-green-9 hover:bg-green-10 active:bg-green-11 text-white text-sm font-semibold transition-all shadow-xs cursor-pointer flex items-center gap-2">
                        <span>Lanjutkan ke Langkah 7: Publish</span>
                        <x-radix-icon name="arrow-right" class="w-4 h-4" />
                    </button>
                </div>
            </div>

            <!-- ============================================== -->
            <!-- STEP 7: FINALISASI & MONETISASI                -->
            <!-- ============================================== -->
            <div x-show="currentStep === 7" x-transition.opacity class="space-y-6">
                <div class="border-b border-gray-5 pb-4">
                    <h2 class="font-display font-bold text-lg text-gray-12">Langkah 7: Finalisasi, Monetisasi & Publikasi</h2>
                    <p class="text-xs text-gray-11">Atur akses asesmen (gratis/berbayar), batas percobaan, paket harga fleksibel, dan status publikasi.</p>
                </div>

                <!-- 1. MONETISASI, BATAS PERCOBAAN & PAKET HARGA (SINGLE UNIFIED CARD) -->
                <div class="p-5 rounded-2xl border border-gray-6 bg-gray-2/30 space-y-4">
                    <div class="flex items-center justify-between border-b border-gray-5 pb-3">
                        <div class="flex items-center gap-2.5">
                            <span class="w-7 h-7 rounded-lg bg-green-9 text-white flex items-center justify-center font-bold text-xs">1</span>
                            <div>
                                <h3 class="font-display font-bold text-sm text-gray-12">Monetisasi &amp; Paket Penjualan Fleksibel</h3>
                                <p class="text-xs text-gray-11">Atur asesmen ini gratis atau berbayar, serta batas percobaan untuk siswa.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Pilihan Akses: Gratis / Berbayar -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div @click="form.price_type = 'free'"
                             :class="form.price_type === 'free' ? 'border-green-8 bg-green-2/40 ring-2 ring-green-7' : 'border-gray-6 bg-white hover:border-gray-7'"
                             class="p-4 rounded-xl border transition-all cursor-pointer space-y-1">
                             <div class="flex items-center justify-between">
                                <h4 class="font-bold text-sm text-gray-12">Gratis (Free)</h4>
                                <span x-show="form.price_type === 'free'" class="text-green-9"><x-radix-icon name="check-circled" class="w-5 h-5"/></span>
                             </div>
                             <p class="text-xs text-gray-11">Asesmen dapat diakses oleh siswa tanpa biaya pembelian.</p>
                        </div>
                        <div @click="form.price_type = 'paid'"
                             :class="form.price_type === 'paid' ? 'border-green-8 bg-green-2/40 ring-2 ring-green-7' : 'border-gray-6 bg-white hover:border-gray-7'"
                             class="p-4 rounded-xl border transition-all cursor-pointer space-y-1">
                             <div class="flex items-center justify-between">
                                <h4 class="font-bold text-sm text-gray-12">Berbayar (Premium)</h4>
                                <span x-show="form.price_type === 'paid'" class="text-green-9"><x-radix-icon name="check-circled" class="w-5 h-5"/></span>
                             </div>
                             <p class="text-xs text-gray-11">Siswa membeli paket kuota percobaan untuk mengakses asesmen.</p>
                        </div>
                    </div>

                    <!-- ====== GRATIS: Batas Jumlah Percobaan ====== -->
                    <div x-show="form.price_type === 'free'" x-transition class="space-y-4 bg-white p-5 rounded-xl border border-gray-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <x-radix-icon name="timer" class="w-4 h-4 text-green-9" />
                                <h4 class="font-display font-bold text-sm text-gray-12">Batas Jumlah Percobaan Ujian per Siswa</h4>
                            </div>
                            <span class="text-xs font-semibold px-2.5 py-0.5 rounded-full"
                                  :class="!form.max_attempts ? 'bg-blue-3 text-blue-11 border border-blue-5' : 'bg-green-3 text-green-11 border border-green-5'"
                                  x-text="!form.max_attempts ? '♾️ Tanpa Batasan (Unlimited)' : '🎯 Maksimal ' + form.max_attempts + 'x Percobaan'">
                            </span>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold text-gray-12">
                                    Jumlah Maksimal Percobaan <span class="text-gray-9 font-normal">(Kosongkan = Unlimited)</span>
                                </label>
                                <div class="relative">
                                    <input type="number" x-model.number="form.max_attempts" min="1" step="1"
                                           placeholder="Kosongkan jika tanpa batasan (unlimited)"
                                           class="w-full rounded-xl border border-gray-7 px-4 py-2.5 text-sm text-gray-12 outline-none focus:border-green-8 focus:ring-1 focus:ring-green-8 font-mono">
                                    <button type="button" x-show="form.max_attempts" @click="form.max_attempts = null"
                                            class="absolute right-3 top-2.5 text-xs text-gray-9 hover:text-red-11 cursor-pointer font-semibold">
                                        Reset
                                    </button>
                                </div>
                            </div>

                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold text-gray-12">Preset Cepat:</label>
                                <div class="flex flex-wrap gap-2">
                                    <button type="button" @click="form.max_attempts = null"
                                            :class="!form.max_attempts ? 'bg-blue-3 text-blue-11 border-blue-6 font-bold' : 'bg-gray-2 text-gray-12 border-gray-5'"
                                            class="px-3 py-1.5 rounded-lg border text-xs cursor-pointer transition-colors">
                                        ♾️ Bebas / Tanpa Batas
                                    </button>
                                    <button type="button" @click="form.max_attempts = 1"
                                            :class="form.max_attempts === 1 ? 'bg-green-3 text-green-11 border-green-6 font-bold' : 'bg-gray-2 text-gray-12 border-gray-5'"
                                            class="px-3 py-1.5 rounded-lg border text-xs cursor-pointer transition-colors">
                                        1 Kali
                                    </button>
                                    <button type="button" @click="form.max_attempts = 3"
                                            :class="form.max_attempts === 3 ? 'bg-green-3 text-green-11 border-green-6 font-bold' : 'bg-gray-2 text-gray-12 border-gray-5'"
                                            class="px-3 py-1.5 rounded-lg border text-xs cursor-pointer transition-colors">
                                        3 Kali
                                    </button>
                                    <button type="button" @click="form.max_attempts = 5"
                                            :class="form.max_attempts === 5 ? 'bg-green-3 text-green-11 border-green-6 font-bold' : 'bg-gray-2 text-gray-12 border-gray-5'"
                                            class="px-3 py-1.5 rounded-lg border text-xs cursor-pointer transition-colors">
                                        5 Kali
                                    </button>
                                    <button type="button" @click="form.max_attempts = 10"
                                            :class="form.max_attempts === 10 ? 'bg-green-3 text-green-11 border-green-6 font-bold' : 'bg-gray-2 text-gray-12 border-gray-5'"
                                            class="px-3 py-1.5 rounded-lg border text-xs cursor-pointer transition-colors">
                                        10 Kali
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="text-[11px] p-3 rounded-lg flex items-start gap-2.5"
                             :class="!form.max_attempts ? 'bg-blue-50 text-blue-900 border border-blue-200' : 'bg-emerald-50 text-emerald-900 border border-emerald-200'">
                            <x-radix-icon name="info-circled" class="w-4 h-4 shrink-0 mt-0.5" />
                            <div class="leading-relaxed">
                                <template x-if="!form.max_attempts">
                                    <span><strong>Mode Bebas:</strong> Siswa diperbolehkan mencoba ujian ini berkali-kali tanpa batasan limit percobaan. Cocok untuk latihan mandiri, drill soal, dan persiapan ujian.</span>
                                </template>
                                <template x-if="form.max_attempts">
                                    <span><strong>Mode Terbatas:</strong> Siswa hanya dapat mencoba asesmen ini sebanyak <strong x-text="form.max_attempts"></strong> kali. Setelah kuota habis, siswa tidak dapat memulai sesi pengerjaan baru.</span>
                                </template>
                            </div>
                        </div>
                    </div>

                    <!-- ====== BERBAYAR: Paket Harga Fleksibel ====== -->
                    <div x-show="form.price_type === 'paid'" x-transition class="space-y-4 bg-white p-5 rounded-xl border border-gray-6">
                        <!-- 35-day Accumulation Rule Callout -->
                        <div class="p-4 rounded-xl bg-blue-50 border border-blue-200 text-blue-950 space-y-1.5 text-xs">
                            <div class="flex items-center gap-2 font-bold text-blue-900">
                                <x-radix-icon name="timer" class="w-4 h-4 text-blue-700" />
                                <span>Ketentuan Masa Percobaan (35 Hari) &amp; Akumulasi Kuota:</span>
                            </div>
                            <p class="text-blue-800 leading-relaxed text-[11px]">
                                Masa aktif setiap paket adalah <strong>35 hari</strong>. Batas percobaan ditentukan oleh paket yang dibeli siswa. Setelah masa 35 hari habis, sisa kuota <strong>diakumulasikan</strong> saat pembelian paket baru.
                            </p>
                        </div>

                        <!-- Flexible Pricing Tiers Table -->
                        <div class="space-y-2">
                            <div class="flex items-center justify-between">
                                <label class="block text-xs font-bold text-gray-12 uppercase tracking-wider">
                                    Daftar Paket Penjualan Fleksibel (Harga &amp; Jumlah Percobaan)
                                </label>
                                <button type="button" @click="addPackage()"
                                        class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-blue-50 border border-blue-300 text-blue-800 hover:bg-blue-100 text-xs font-bold transition-colors cursor-pointer">
                                    <x-radix-icon name="plus" class="w-3.5 h-3.5" />
                                    <span>Tambah Paket</span>
                                </button>
                            </div>

                            <div class="overflow-x-auto rounded-xl border border-gray-6">
                                <table class="w-full text-xs text-left border-collapse bg-white">
                                    <thead>
                                        <tr class="bg-gray-3 border-b border-gray-5 text-gray-12 font-bold">
                                            <th class="py-2.5 px-3 w-10 text-center">#</th>
                                            <th class="py-2.5 px-3">Nama Paket</th>
                                            <th class="py-2.5 px-3 w-36">Harga (Rp)</th>
                                            <th class="py-2.5 px-3 w-32">Percobaan</th>
                                            <th class="py-2.5 px-3 w-28 text-center">Masa Aktif</th>
                                            <th class="py-2.5 px-3 w-16 text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-4">
                                        <template x-for="(pkg, pIdx) in form.packages" :key="pIdx">
                                            <tr class="hover:bg-gray-2/50 transition-colors">
                                                <td class="py-2 px-3 text-center font-mono text-gray-10" x-text="pIdx + 1"></td>
                                                <td class="py-2 px-3">
                                                    <input type="text" x-model="pkg.name" placeholder="Contoh: Paket 1 Percobaan"
                                                           class="w-full rounded-lg border border-gray-6 px-3 py-1.5 text-xs text-gray-12 font-semibold outline-none focus:border-green-8">
                                                </td>
                                                <td class="py-2 px-3">
                                                    <div class="relative">
                                                        <span class="absolute left-2.5 top-1.5 text-[11px] text-gray-9 font-mono">Rp</span>
                                                        <input type="number" x-model.number="pkg.price" min="0" step="1000" placeholder="10000"
                                                               class="w-full rounded-lg border border-gray-6 pl-8 pr-2 py-1.5 text-xs text-gray-12 font-mono font-bold outline-none focus:border-green-8">
                                                    </div>
                                                </td>
                                                <td class="py-2 px-3">
                                                    <div class="flex items-center gap-1.5">
                                                        <input type="number" x-model.number="pkg.attempts" min="1" step="1" placeholder="1"
                                                               class="w-16 rounded-lg border border-gray-6 px-2.5 py-1.5 text-xs text-center text-gray-12 font-bold outline-none focus:border-green-8">
                                                        <span class="text-[11px] text-gray-11 font-medium">kali</span>
                                                    </div>
                                                </td>
                                                <td class="py-2 px-3 text-center">
                                                    <span class="inline-block px-2.5 py-1 rounded-md bg-blue-1 text-blue-11 border border-blue-4 font-bold text-[11px]">
                                                        35 Hari
                                                    </span>
                                                </td>
                                                <td class="py-2 px-3 text-center">
                                                    <button type="button" @click="removePackage(pIdx)"
                                                            class="p-1.5 rounded-lg text-red-9 hover:bg-red-2 hover:text-red-11 transition-colors cursor-pointer"
                                                            title="Hapus Paket">
                                                        <x-radix-icon name="trash" class="w-4 h-4" />
                                                    </button>
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Revenue Share Notice -->
                        <div class="mt-3 text-xs bg-gray-2/60 border border-gray-5 p-4 rounded-xl space-y-2 text-gray-12">
                            <div class="flex items-center gap-2 font-bold text-gray-12">
                                <x-radix-icon name="info-circled" class="w-4 h-4 shrink-0 text-green-9" />
                                <span>Distribusi Bagi Hasil B2B2C Otomatis ADZKIA &amp; Tenant:</span>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 pt-1 font-mono text-[11px]">
                                <div class="p-2.5 rounded-lg bg-white border border-gray-5">
                                    <span class="font-sans font-bold text-gray-11 block">Starter (Gratis)</span>
                                    <span class="text-blue-11 font-extrabold">ADZKIA 75% : Tenant 25%</span>
                                </div>
                                <div class="p-2.5 rounded-lg bg-white border border-gray-5">
                                    <span class="font-sans font-bold text-gray-11 block">Pro (Premium)</span>
                                    <span class="text-green-11 font-extrabold">ADZKIA 50% : Tenant 50%</span>
                                </div>
                                <div class="p-2.5 rounded-lg bg-white border border-gray-5">
                                    <span class="font-sans font-bold text-gray-11 block">Enterprise</span>
                                    <span class="text-purple-11 font-extrabold">ADZKIA 25% : Tenant 75%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 2. STATUS PUBLIKASI -->
                <div class="p-5 rounded-2xl border border-gray-6 bg-gray-2/30 space-y-4">
                    <div class="flex items-center justify-between border-b border-gray-5 pb-3">
                        <div class="flex items-center gap-2.5">
                            <span class="w-7 h-7 rounded-lg bg-green-9 text-white flex items-center justify-center font-bold text-xs">2</span>
                            <div>
                                <h3 class="font-display font-bold text-sm text-gray-12">Status Publikasi</h3>
                                <p class="text-xs text-gray-11">Pilih apakah ujian langsung diterbitkan atau disimpan sebagai draf untuk diedit kembali nanti.</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div @click="form.status = 'draft'"
                             :class="form.status === 'draft' ? 'border-green-8 bg-green-2/40 ring-2 ring-green-7' : 'border-gray-6 hover:border-gray-7 bg-white'"
                             class="p-5 rounded-2xl border transition-all cursor-pointer space-y-2">
                            <span class="px-2.5 py-0.5 rounded-md bg-gray-3 text-gray-11 font-bold text-xs uppercase">Draf</span>
                            <h3 class="font-display font-bold text-sm text-gray-12">Simpan Sebagai Draf</h3>
                            <p class="text-xs text-gray-11">Asesmen disimpan tetapi belum dapat diakses atau dikerjakan oleh siswa.</p>
                        </div>

                        <div @click="form.status = 'published'"
                             :class="form.status === 'published' ? 'border-green-8 bg-green-2/40 ring-2 ring-green-7' : 'border-gray-6 hover:border-gray-7 bg-white'"
                             class="p-5 rounded-2xl border transition-all cursor-pointer space-y-2">
                            <span class="px-2.5 py-0.5 rounded-md bg-green-3 text-green-11 font-bold text-xs uppercase">Siap / Published</span>
                            <h3 class="font-display font-bold text-sm text-gray-12">Terbitkan Asesmen</h3>
                            <p class="text-xs text-gray-11">Asesmen siap dijadwalkan dan ditugaskan ke kelas serta peserta ujian.</p>
                        </div>
                    </div>
                </div>

                <!-- Navigation Step 7 -->
                <div class="flex items-center justify-between pt-6 border-t border-gray-5 mt-8">
                    <button type="button" @click="currentStep--" 
                            class="px-5 py-2.5 rounded-xl border border-gray-6 bg-white hover:bg-gray-3 text-sm font-semibold text-gray-12 transition-colors cursor-pointer flex items-center gap-2">
                        <x-radix-icon name="arrow-left" class="w-4 h-4" />
                        <span>Sebelumnya</span>
                    </button>
                    <button type="button" @click="nextStep()" 
                            class="px-6 py-2.5 rounded-xl bg-green-9 hover:bg-green-10 active:bg-green-11 text-white text-sm font-semibold transition-all shadow-xs cursor-pointer flex items-center gap-2">
                        <span>Lanjutkan ke Langkah 8: Jadwal & Token</span>
                        <x-radix-icon name="arrow-right" class="w-4 h-4" />
                    </button>
                </div>
            </div>


            <!-- ============================================== -->
            <!-- STEP 8: JADWAL & TOKEN UJIAN                   -->
            <!-- ============================================== -->
            <div x-show="currentStep === 8" x-transition.opacity class="space-y-6">
                <div class="border-b border-gray-5 pb-4">
                    <h2 class="font-display font-bold text-lg text-gray-12">Langkah 8: Penjadwalan & Pengaturan Ujian</h2>
                    <p class="text-xs text-gray-11">Konfigurasi token keamanan ujian, pengacakan soal, dan konfirmasi penyimpanan.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="space-y-1.5">
                        <label class="block text-sm font-semibold text-gray-12">Token Ujian CBT</label>
                        <div class="flex gap-2">
                            <input type="text" x-model="form.settings.token" class="flex-1 rounded-xl border border-gray-7 bg-white px-4 py-2.5 text-base font-mono font-bold text-green-11 outline-none uppercase">
                            <button type="button" @click="generateToken()" class="px-4 py-2 rounded-xl bg-gray-3 hover:bg-gray-4 text-xs font-bold text-gray-12 cursor-pointer">Acak</button>
                        </div>
                    </div>

                    <div class="space-y-3 pt-4">
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" x-model="form.settings.randomize_questions" class="rounded text-green-9 focus:ring-green-8">
                            <span class="text-sm font-semibold text-gray-12">Acak Urutan Butir Soal untuk Tiap Siswa</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" x-model="form.settings.randomize_options" class="rounded text-green-9 focus:ring-green-8">
                            <span class="text-sm font-semibold text-gray-12">Acak Pilihan Opsi Jawaban (A, B, C, D)</span>
                        </label>
                    </div>
                </div>

                <!-- Navigation Step 8 -->
                <div class="flex items-center justify-between pt-6 border-t border-gray-5 mt-8">
                    <button type="button" @click="currentStep--" 
                            class="px-5 py-2.5 rounded-xl border border-gray-6 bg-white hover:bg-gray-3 text-sm font-semibold text-gray-12 transition-colors cursor-pointer flex items-center gap-2">
                        <x-radix-icon name="arrow-left" class="w-4 h-4" />
                        <span>Sebelumnya</span>
                    </button>
                    <button type="button" @click="submitWizard()" :disabled="isSubmitting"
                            class="px-8 py-2.5 rounded-xl bg-green-9 hover:bg-green-10 active:bg-green-11 text-white text-sm font-bold transition-all shadow-md cursor-pointer flex items-center gap-2 disabled:opacity-50">
                        <span x-text="isSubmitting ? 'Menyimpan...' : 'Simpan & Selesaikan Ujian'"></span>
                        <x-radix-icon name="check" class="w-4 h-4" />
                    </button>
                </div>
            </div>
        </div>



        <!-- Modal: Download Contoh / Format Import Soal -->
        <div x-show="showFormatModal" style="display: none;" 
             x-transition.opacity
             class="fixed inset-0 z-50 bg-gray-12/40 backdrop-blur-xs flex items-center justify-center p-4">
            <div @click.away="showFormatModal = false" 
                 class="bg-white border border-gray-6 rounded-2xl max-w-2xl w-full p-6 space-y-4 shadow-xl max-h-[90vh] overflow-y-auto">
                <div class="flex items-center justify-between border-b border-gray-5 pb-3">
                    <div class="flex items-center gap-2.5">
                        <span class="w-8 h-8 rounded-lg bg-green-3 text-green-11 flex items-center justify-center font-bold">
                            <x-radix-icon name="bookmark" class="w-4 h-4" />
                        </span>
                        <div>
                            <h3 class="font-display font-bold text-base text-gray-12">Format Import Soal MS Word (.docx)</h3>
                            <p class="text-xs text-gray-11">Pedoman penulisan naskah soal agar terbaca otomatis oleh sistem CBT ADZKIA.</p>
                        </div>
                    </div>
                    <button type="button" @click="showFormatModal = false" class="text-gray-9 hover:text-gray-12 p-1 cursor-pointer">
                        <x-radix-icon name="cross-2" class="w-4 h-4" />
                    </button>
                </div>

                <div x-data="{ formatTab: 'pg' }" class="space-y-4 text-xs text-gray-12">
                    <div class="p-3.5 rounded-xl bg-blue-2/30 border border-blue-6/50 text-blue-11 leading-relaxed">
                        <strong class="block font-bold mb-1">Mendukung Seluruh Tipe Soal &amp; Formula Matematika (LaTeX):</strong>
                        Dokumen Word (.docx) mendukung teks tebal (bold), miring (italic), garis bawah (underline), formula matematika <code class="px-1.5 py-0.5 rounded bg-blue-3 font-mono font-bold">$$formula$$</code>, serta penetapan bobot soal fleksibel <code class="px-1.5 py-0.5 rounded bg-blue-3 font-mono font-bold">BOBOT: 2.5</code>.
                    </div>

                    <!-- Tab Buttons -->
                    <div class="flex items-center gap-1.5 p-1 bg-gray-3 rounded-xl overflow-x-auto">
                        <button type="button" @click="formatTab = 'pg'"
                                :class="formatTab === 'pg' ? 'bg-white text-gray-12 shadow-xs font-bold' : 'text-gray-11 hover:text-gray-12 font-medium'"
                                class="px-3 py-1.5 rounded-lg text-xs transition-colors whitespace-nowrap cursor-pointer">
                            PG Tunggal &amp; TKP (Berbobot)
                        </button>
                        <button type="button" @click="formatTab = 'kompleks_bs'"
                                :class="formatTab === 'kompleks_bs' ? 'bg-white text-gray-12 shadow-xs font-bold' : 'text-gray-11 hover:text-gray-12 font-medium'"
                                class="px-3 py-1.5 rounded-lg text-xs transition-colors whitespace-nowrap cursor-pointer">
                            PG Kompleks &amp; Benar-Salah
                        </button>
                        <button type="button" @click="formatTab = 'jodoh_urut'"
                                :class="formatTab === 'jodoh_urut' ? 'bg-white text-gray-12 shadow-xs font-bold' : 'text-gray-11 hover:text-gray-12 font-medium'"
                                class="px-3 py-1.5 rounded-lg text-xs transition-colors whitespace-nowrap cursor-pointer">
                            Menjodohkan &amp; Urutan
                        </button>
                        <button type="button" @click="formatTab = 'isian_esai'"
                                :class="formatTab === 'isian_esai' ? 'bg-white text-gray-12 shadow-xs font-bold' : 'text-gray-11 hover:text-gray-12 font-medium'"
                                class="px-3 py-1.5 rounded-lg text-xs transition-colors whitespace-nowrap cursor-pointer">
                            Isian, Esai &amp; Wacana
                        </button>
                    </div>

                    <!-- TAB 1: PG & TKP -->
                    <div x-show="formatTab === 'pg'" class="space-y-4">
                        <div class="space-y-1.5">
                            <div class="flex items-center justify-between">
                                <span class="font-bold text-gray-12">1. Pilihan Ganda Tunggal (dengan Bobot &gt;= 2.0 &amp; LaTeX):</span>
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-blue-3 text-blue-11 font-mono">BOBOT: 2.5</span>
                            </div>
                            <pre class="p-3.5 rounded-xl bg-gray-2 border border-gray-6 font-mono text-[11px] text-gray-12 whitespace-pre-wrap leading-relaxed select-all">1. Himpunan penyelesaian persamaan $$2x^2 - 7x + 3 = 0$$ adalah ...
A. $$x_1 = 3$$ atau $$x_2 = \frac{1}{2}$$
B. $$x_1 = -3$$ atau $$x_2 = -\frac{1}{2}$$
C. $$x_1 = 1$$ atau $$x_2 = 6$$
D. $$x_1 = 2$$ atau $$x_2 = 5$$
KUNCI: A
BOBOT: 2.5
PEMBAHASAN: Nilai D = 25. Maka x = (7 +/- 5)/4, sehingga x1 = 3 dan x2 = 1/2.</pre>
                        </div>

                        <div class="space-y-1.5">
                            <div class="flex items-center justify-between">
                                <span class="font-bold text-green-11">2. TKP / PG Berbobot (Format 2: Skor di Awal Opsi):</span>
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-green-3 text-green-11 font-mono">[TKP]</span>
                            </div>
                            <pre class="p-3.5 rounded-xl bg-green-2/30 border border-green-6/50 font-mono text-[11px] text-gray-12 whitespace-pre-wrap leading-relaxed select-all">[TKP]
2. Rekan kerja meminta dilayani terlebih dahulu saat antrean warga sangat padat. Sikap Anda ...
A. [5] Menolak santun dan memintanya mengambil nomor antrean sesuai prosedur.
B. [4] Menjelaskan bahwa sistem antrean digital otomatis terpantau.
C. [3] Memintanya menunggu hingga jam istirahat kantor.
D. [2] Membantu cepat setelah warga yang di depan loket selesai.
E. [1] Langsung mendahulukan rekan kerja karena sungkan.
PEMBAHASAN: Menjunjung asas integritas dan transparansi publik tanpa diskriminasi.</pre>
                        </div>
                    </div>

                    <!-- TAB 2: KOMPLEKS & BENAR SALAH -->
                    <div x-show="formatTab === 'kompleks_bs'" class="space-y-4" style="display: none;">
                        <div class="space-y-1.5">
                            <div class="flex items-center justify-between">
                                <span class="font-bold text-purple-11">1. Pilihan Ganda Kompleks (Jawaban &gt; 1):</span>
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-purple-3 text-purple-11 font-mono">[KOMPLEKS]</span>
                            </div>
                            <pre class="p-3.5 rounded-xl bg-gray-2 border border-gray-6 font-mono text-[11px] text-gray-12 whitespace-pre-wrap leading-relaxed select-all">[KOMPLEKS]
3. Manakah yang tergolong Energi Terbarukan (EBT)? (Pilih semua yang benar)
A. Pembangkit Listrik Tenaga Surya (PLTS)
B. Pembangkit Listrik Tenaga Batubara (PLTU)
C. Pembangkit Listrik Tenaga Bayu/Angin (PLTB)
D. Pembangkit Diesel Berbahan Bakar Minyak
KUNCI: A, C
BOBOT: 2.0</pre>
                        </div>

                        <div class="space-y-1.5">
                            <div class="flex items-center justify-between">
                                <span class="font-bold text-amber-11">2. Tabel Dikotomi / Analisis Benar-Salah:</span>
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-amber-3 text-amber-11 font-mono">[BENAR SALAH]</span>
                            </div>
                            <pre class="p-3.5 rounded-xl bg-gray-2 border border-gray-6 font-mono text-[11px] text-gray-12 whitespace-pre-wrap leading-relaxed select-all">[BENAR SALAH]
4. Analisislah pernyataan mengenai fotosintesis tumbuhan berikut!
KOLOM: Benar | Salah
1) Fotosintesis menghasilkan glukosa dan oksigen [BENAR]
2) Reaksi terang berlangsung di stroma tanpa cahaya [SALAH]
3) Klorofil merupakan pigmen penyerap cahaya matahari [BENAR]
BOBOT: 3.0</pre>
                        </div>
                    </div>

                    <!-- TAB 3: JODOH & URUT -->
                    <div x-show="formatTab === 'jodoh_urut'" class="space-y-4" style="display: none;">
                        <div class="space-y-1.5">
                            <div class="flex items-center justify-between">
                                <span class="font-bold text-teal-11">1. Menjodohkan (Matching Premis -&gt; Pasangan):</span>
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-teal-3 text-teal-11 font-mono">[MENJODOHKAN]</span>
                            </div>
                            <pre class="p-3.5 rounded-xl bg-gray-2 border border-gray-6 font-mono text-[11px] text-gray-12 whitespace-pre-wrap leading-relaxed select-all">[MENJODOHKAN]
5. Pasangkan organisasi internasional berikut dengan lokasi markas besarnya!
1) Perserikatan Bangsa-Bangsa (PBB) -> New York, AS
2) Organisasi Kesehatan Dunia (WHO) -> Jenewa, Swiss
3) Sekretariat Jenderal ASEAN -> Jakarta, Indonesia
BOBOT: 3.0</pre>
                        </div>

                        <div class="space-y-1.5">
                            <div class="flex items-center justify-between">
                                <span class="font-bold text-cyan-11">2. Mengurutkan Tahapan (Ordering / Sequencing):</span>
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-cyan-3 text-cyan-11 font-mono">[MENGURUTKAN]</span>
                            </div>
                            <pre class="p-3.5 rounded-xl bg-gray-2 border border-gray-6 font-mono text-[11px] text-gray-12 whitespace-pre-wrap leading-relaxed select-all">[MENGURUTKAN]
6. Urutkan tahapan metode ilmiah berikut mulai dari awal hingga kesimpulan!
1) Merumuskan masalah penelitian
2) Mengumpulkan data observasi awal
3) Menyusun hipotesis ilmiah
4) Melakukan eksperimen teruji
5) Menarik kesimpulan
BOBOT: 3.0</pre>
                        </div>
                    </div>

                    <!-- TAB 4: ISIAN, ESAI & WACANA -->
                    <div x-show="formatTab === 'isian_esai'" class="space-y-4" style="display: none;">
                        <div class="space-y-1.5">
                            <div class="flex items-center justify-between">
                                <span class="font-bold text-pink-11">1. Isian Singkat &amp; Soal Esai / Uraian:</span>
                            </div>
                            <pre class="p-3.5 rounded-xl bg-gray-2 border border-gray-6 font-mono text-[11px] text-gray-12 whitespace-pre-wrap leading-relaxed select-all">[ISIAN]
7. Organ tubuh yang memompa darah beroksigen ke seluruh tubuh adalah ...
KUNCI: Jantung
BOBOT: 2.0

[ESAI]
8. Jelaskan 3 faktor utama pemicu pemanasan global dan mitigasinya di sekolah!
BOBOT: 5.0
PEMBAHASAN: Rubrik: 1. Efek gas rumah kaca, 2. Deforestasi, 3. Mitigasi sekolah (hemat listrik, pemilahan sampah).</pre>
                        </div>

                        <div class="space-y-1.5">
                            <div class="flex items-center justify-between">
                                <span class="font-bold text-indigo-11">2. Stimulus Narasi / Wacana Bacaan Berseri:</span>
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-indigo-3 text-indigo-11 font-mono">[NARASI]</span>
                            </div>
                            <pre class="p-3.5 rounded-xl bg-gray-2 border border-gray-6 font-mono text-[11px] text-gray-12 whitespace-pre-wrap leading-relaxed select-all">[NARASI]
Judul: Konservasi Segitiga Karang Dunia
Teks: Indonesia memiliki keanekaragaman karang laut tertinggi di Coral Triangle...
[AKHIR NARASI]

9. Wilayah perairan Indonesia dengan karang tertinggi dijuluki ...
A. Coral Triangle
B. Ring of Fire
KUNCI: A
BOBOT: 2.0</pre>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between gap-3 pt-3 border-t border-gray-5">
                    <a href="{{ route('assessments.download-template') }}" target="_blank"
                       class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-green-9 text-white text-xs font-bold hover:bg-green-10 transition-colors shadow-xs cursor-pointer">
                        <x-radix-icon name="download" class="w-4 h-4" />
                        <span>Download Template Lengkap Word (.docx)</span>
                    </a>
                    <button type="button" @click="showFormatModal = false" class="px-5 py-2 rounded-xl bg-gray-3 hover:bg-gray-4 text-gray-12 text-xs font-bold transition-colors cursor-pointer">
                        Tutup
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal: Import Soal dari Word -->
        <div x-show="showImportModal" style="display: none;" 
             x-transition.opacity
             class="fixed inset-0 z-50 bg-gray-12/40 backdrop-blur-xs flex items-center justify-center p-4">
            <div @click.away="showImportModal = false" 
                 class="bg-white border border-gray-6 rounded-2xl max-w-lg w-full p-6 space-y-4 shadow-xl">
                <div class="flex items-center justify-between border-b border-gray-5 pb-3">
                    <div class="flex items-center gap-2.5">
                        <span class="w-8 h-8 rounded-lg bg-blue-3 text-blue-11 flex items-center justify-center font-bold">
                            <x-radix-icon name="card-stack-plus" class="w-4 h-4" />
                        </span>
                        <div>
                            <h3 class="font-display font-bold text-base text-gray-12">Import Soal ke <span x-text="form.sections[importSectionIdx]?.title || ('Bagian ' + (importSectionIdx + 1))"></span></h3>
                            <p class="text-xs text-gray-11">Unggah dokumen Microsoft Word (.docx) berisi naskah soal.</p>
                        </div>
                    </div>
                    <button type="button" @click="showImportModal = false" class="text-gray-9 hover:text-gray-12 p-1 cursor-pointer">
                        <x-radix-icon name="cross-2" class="w-4 h-4" />
                    </button>
                </div>

                <div class="space-y-4">
                    <div class="border-2 border-dashed border-gray-6 hover:border-blue-7 transition-colors rounded-2xl p-6 text-center bg-gray-1/40 cursor-pointer"
                         @click="$refs.wordFileInput.click()"
                         @dragover.prevent=""
                         @drop.prevent="handleFileDrop($event)">
                        <div class="max-w-xs mx-auto space-y-2">
                            <div :class="selectedWordFileName ? 'text-blue-9' : 'text-gray-9'">
                                <x-radix-icon name="file-text" class="w-8 h-8 mx-auto" />
                            </div>
                            <p class="text-xs font-bold text-gray-12" x-text="selectedWordFileName || 'Pilih File Word (.docx) atau Tarik ke Sini'"></p>
                            <p class="text-[11px] text-gray-11" x-text="selectedWordFileName ? 'File siap diimpor. Klik tombol Mulai Import di bawah.' : 'Maksimal ukuran file 10 MB. Format mengikuti pedoman contoh.'"></p>
                            <input type="file" accept=".docx" class="hidden" x-ref="wordFileInput" @change="handleFileSelected($event)">
                        </div>
                    </div>

                    <div class="flex items-center justify-between text-xs text-gray-11 bg-gray-2/50 p-3 rounded-xl">
                        <span>Belum punya contoh template?</span>
                        <div class="flex items-center gap-2">
                            <a href="{{ route('assessments.download-template') }}" target="_blank" class="font-bold text-green-11 hover:underline cursor-pointer">
                                Download .docx
                            </a>
                            <span>•</span>
                            <button type="button" @click="showImportModal = false; showFormatModal = true" class="font-bold text-blue-11 hover:underline cursor-pointer">
                                Lihat Format
                            </button>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 pt-2">
                    <button type="button" @click="showImportModal = false" class="px-4 py-2 rounded-xl border border-gray-6 text-xs font-semibold text-gray-12 hover:bg-gray-3 cursor-pointer">
                        Batal
                    </button>
                    <button type="button" @click="importWordFile()" :disabled="isImporting || !selectedWordFile"
                            class="inline-flex items-center gap-2 px-5 py-2 rounded-xl bg-blue-9 text-white text-xs font-bold hover:bg-blue-10 transition-colors shadow-xs cursor-pointer disabled:opacity-50">
                        <span x-text="isImporting ? 'Mengimpor Dokumen...' : 'Mulai Import'"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
