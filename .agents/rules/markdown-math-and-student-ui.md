# Markdown Math Preservation & Student UI Layout Conventions

## 1. Markdown Math Rendering (KaTeX / LaTeX)
- **Do not use raw `Str::markdown()`**: When rendering question prompts, stimuli, option choices, explanations, or assessment descriptions, never pass unshielded text directly to `Str::markdown()`.
- **Use `\App\Support\MarkdownRenderer::render($text)`**: CommonMark by default converts underscores `_` to `<em>` tags and asterisks `*` to `<i>`/`<em>`, breaking LaTeX math notation (e.g. `$x_1 + x_2$` or `\sum_{i=0}^n`). `MarkdownRenderer` masks all LaTeX delimiters (`$$...$$`, `$...$`, `\(...\)`, `\[...\]`) with protected HTML comment tokens prior to CommonMark parsing and restores them uncorrupted afterwards.
- **Support N-th Root and Open Math Macros**:
  - In `WordQuestionService.php`, support n-th root variations (`\sqrt[n]{x}`, `akar[n]{x}`, `akar pangkat n dari x`, unicode `∛`, `∜`) and verbal roots (`akar x`).
  - In frontend live previews (`renderRichPreview`), pre-process unbracketed open roots and math macros before handing off to `marked.parse()`.

## 2. Student Navigation & Layout Architecture
- **Obsidian Dark Bottom Navigation**: Maintain dark glassmorphism styling (`bg-neutral-950/95 backdrop-blur-xl border-neutral-800/80 shadow-[0_20px_50px_rgba(0,0,0,0.6)]`) for student bottom bar navigation with vibrant emerald indicators (`bg-emerald-500 text-white shadow-emerald-500/25 ring-1 ring-emerald-400/40`).
- **High Bottom Padding**: Content wrappers in student layouts must preserve generous bottom padding (`pb-44 sm:pb-48`) to ensure no cards, action buttons, or form controls are obscured by the floating bottom bar when scrolled.
- **Clean Single-Nav Hierarchy**: Avoid redundant top tab switchers on student profile pages; primary view routing is handled by the persistent bottom navigation bar.
