@if(in_array($question->type, ['mcq_single', 'mcq_multiple', 'mcq_weighted']))
    <div class="space-y-2 pt-1">
        @foreach($question->options as $opt)
            <div class="flex items-start gap-3 p-3 rounded-xl {{ $opt->is_correct ? 'bg-emerald-50/80 border-2 border-emerald-400 shadow-2xs' : 'bg-white border border-gray-200 hover:bg-gray-50' }} text-xs transition-colors">
                <span class="w-6 h-6 rounded-md font-mono font-bold flex items-center justify-center shrink-0 {{ $opt->is_correct ? 'bg-emerald-600 text-white' : 'bg-gray-100 border border-gray-300 text-gray-700' }}">
                    {{ $opt->label }}
                </span>
                <div class="flex-1 text-slate-800 font-medium prose prose-sm max-w-none leading-relaxed">
                    {!! \App\Support\MarkdownRenderer::render($opt->option_text) !!}
                </div>
                @if($opt->is_correct)
                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-emerald-600 text-white font-bold text-[11px] shrink-0 shadow-2xs">
                        <x-radix-icon name="check" class="w-3.5 h-3.5 text-white" />
                        <span>Kunci Jawaban</span>
                    </span>
                @endif
                @if($question->type === 'mcq_weighted' && $opt->score > 0)
                    <span class="text-xs font-mono font-bold px-2 py-0.5 rounded bg-blue-100 text-blue-800 border border-blue-200 shrink-0">
                        Skor: {{ $opt->score }}
                    </span>
                @endif
            </div>
        @endforeach
    </div>

@elseif($question->type === 'binary_matrix')
    @php
        $labels = $question->settings['labels'] ?? ['Benar', 'Salah'];
    @endphp
    <div class="overflow-x-auto border border-blue-200 rounded-xl overflow-hidden mt-2 shadow-2xs">
        <table class="w-full text-left border-collapse text-xs">
            <thead>
                <tr class="border-b border-blue-200 bg-blue-50/70 text-blue-950 uppercase tracking-wider font-bold">
                    <th class="py-3 px-4">Pernyataan Analisis</th>
                    <th class="py-3 px-4 text-center w-32 text-emerald-700 font-bold">{{ $labels[0] ?? 'Benar' }}</th>
                    <th class="py-3 px-4 text-center w-32 text-rose-700 font-bold">{{ $labels[1] ?? 'Salah' }}</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @foreach($question->options as $stmt)
                    <tr class="hover:bg-blue-50/20 transition-colors">
                        <td class="py-3 px-4 text-slate-800 font-medium">
                            <span class="font-bold text-gray-500 mr-1.5">{{ $loop->iteration }}.</span>
                            <div class="inline-block prose prose-sm max-w-none align-top text-slate-800 leading-relaxed">
                                {!! \App\Support\MarkdownRenderer::render($stmt->option_text) !!}
                            </div>
                        </td>
                        <td class="py-3 px-4 text-center">
                            @if($stmt->match_key === ($labels[0] ?? 'Benar') || ($stmt->is_correct && !$stmt->match_key))
                                <span class="w-6 h-6 rounded-full bg-emerald-600 text-white inline-flex items-center justify-center font-bold text-xs shadow-2xs">✓</span>
                            @else
                                <span class="text-gray-300 font-bold text-sm">—</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 text-center">
                            @if($stmt->match_key === ($labels[1] ?? 'Salah') || (!$stmt->is_correct && !$stmt->match_key))
                                <span class="w-6 h-6 rounded-full bg-rose-600 text-white inline-flex items-center justify-center font-bold text-xs shadow-2xs">✕</span>
                            @else
                                <span class="text-gray-300 font-bold text-sm">—</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@elseif($question->type === 'matching')
    <div class="space-y-2 pt-1">
        <span class="text-xs font-bold text-gray-700 block mb-1">Kunci Pasangan Menjodohkan:</span>
        @foreach($question->options as $pair)
            <div class="flex items-center gap-3 p-3 rounded-xl bg-gray-50 border border-gray-200 text-xs">
                <div class="font-medium text-slate-800 flex-1 prose prose-sm max-w-none bg-white p-2.5 rounded-lg border border-gray-200">
                    {!! \App\Support\MarkdownRenderer::render($pair->option_text) !!}
                </div>
                <x-radix-icon name="arrow-right" class="w-4 h-4 text-blue-600 shrink-0" />
                <div class="font-semibold text-blue-900 bg-blue-50 border border-blue-200 px-3 py-2.5 rounded-lg flex-1 prose prose-sm max-w-none">
                    {!! \App\Support\MarkdownRenderer::render($pair->match_key) !!}
                </div>
            </div>
        @endforeach
    </div>

@elseif($question->type === 'short_answer')
    <div class="p-3.5 rounded-xl bg-gray-50 border border-gray-200 text-xs space-y-1">
        <span class="text-gray-600 font-medium">Kunci Jawaban Isian:</span>
        <p class="font-mono font-bold text-emerald-700 text-sm">{{ $question->options->first()?->option_text ?? '-' }}</p>
    </div>

@elseif($question->type === 'ordering')
    <div class="space-y-2 pt-1">
        <span class="text-xs font-bold text-gray-700 block mb-1">Urutan Kunci Jawaban yang Benar:</span>
        <div class="space-y-2">
            @foreach($question->options as $step)
                <div class="flex items-center gap-3 p-3 rounded-xl bg-white border border-gray-200 text-xs shadow-2xs">
                    <span class="w-6 h-6 rounded-md bg-blue-600 text-white font-mono font-bold flex items-center justify-center text-xs shrink-0">
                        {{ $step->order }}
                    </span>
                    <div class="font-medium text-slate-800 flex-1 prose prose-sm max-w-none leading-relaxed">
                        {!! \App\Support\MarkdownRenderer::render($step->option_text) !!}
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@elseif($question->type === 'essay')
    @if(!empty($question->settings['rubric']))
        <div class="space-y-2 pt-1">
            <span class="text-xs font-bold text-amber-900 uppercase tracking-wider block">Rubrik Kriteria Penilaian Terstruktur:</span>
            <div class="overflow-x-auto border border-amber-200 rounded-xl overflow-hidden shadow-2xs">
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="bg-amber-100/70 border-b border-amber-200 text-amber-950 font-bold uppercase tracking-wider text-[11px]">
                            <th class="py-2.5 px-3">Kriteria Penilaian</th>
                            <th class="py-2.5 px-3 w-28 text-center">Bobot / Poin</th>
                            <th class="py-2.5 px-3">Deskripsi Indikator Capaian</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @foreach($question->settings['rubric'] as $crit)
                            <tr class="hover:bg-amber-50/50">
                                <td class="py-2.5 px-3 font-semibold text-slate-900">{{ $crit['name'] ?? 'Kriteria' }}</td>
                                <td class="py-2.5 px-3 text-center font-bold font-mono text-amber-800">{{ $crit['max_points'] ?? '-' }} pt</td>
                                <td class="py-2.5 px-3 text-gray-600 text-[11px] leading-relaxed">{{ $crit['description'] ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="p-3.5 rounded-xl bg-gray-50 border border-dashed border-gray-300 text-xs text-gray-600 flex items-center justify-between">
            <span class="italic">Soal Uraian / Essay (Penilaian manual diinput langsung oleh guru / penilai).</span>
            <span class="text-[10px] font-bold px-2 py-0.5 rounded bg-amber-100 text-amber-800 border border-amber-300">Koreksi Manual</span>
        </div>
    @endif
@endif

@php
    $user = auth()->user();
    $canManageExplanation = $canManage ?? ($user && ($user->isTeacher() || $user->isAdmin() || $user->isSuperUser()));
@endphp

@include('assessments.partials.ai-explanation', ['question' => $question, 'canManage' => $canManageExplanation])
