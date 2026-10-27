<x-layouts.app>
    <x-slot:title>Tambah Bank Soal Baru - ADZKIA</x-slot:title>

    <div class="max-w-3xl mx-auto space-y-6 pb-12">
        <!-- Back Navigation & Title -->
        <div class="flex items-center gap-3">
            <a href="{{ route('question-banks.index') }}" class="p-2 rounded-xl border border-gray-6 bg-white hover:bg-gray-3 text-gray-12 transition-colors cursor-pointer" title="Kembali ke Bank Soal">
                <x-radix-icon name="arrow-left" class="w-4 h-4" />
            </a>
            <div>
                <h1 class="font-display font-extrabold text-2xl text-gray-12 tracking-tight">
                    Tambah Bank Soal Baru
                </h1>
                <p class="text-xs text-gray-11 mt-0.5">Buat wadah bank soal untuk mengelompokkan butir soal per mata pelajaran.</p>
            </div>
        </div>

        @if($errors->any())
            <div class="p-4 rounded-xl bg-red-3 border border-red-6/50 text-red-11 text-xs font-semibold space-y-1">
                @foreach($errors->all() as $err)
                    <p>• {{ $err }}</p>
                @endforeach
            </div>
        @endif

        <div class="bg-white p-6 rounded-2xl border border-gray-6 shadow-[0_1px_3px_rgba(0,0,0,0.03)]">
            <form action="{{ route('question-banks.store') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Subject -->
                <div class="space-y-1.5">
                    <label for="subject_id" class="block text-xs font-bold text-gray-12 uppercase tracking-wider">
                        Mata Pelajaran <span class="text-red-10">*</span>
                    </label>
                    <select id="subject_id" name="subject_id" required class="w-full px-3.5 py-2.5 rounded-xl border border-gray-6 bg-gray-1 text-sm text-gray-12 focus:outline-none focus:border-indigo-8 focus:ring-2 focus:ring-indigo-4/30 transition-all">
                        <option value="">-- Pilih Mata Pelajaran --</option>
                        @foreach($subjects as $subj)
                            <option value="{{ $subj->id }}" {{ old('subject_id') == $subj->id ? 'selected' : '' }}>
                                {{ $subj->name }} ({{ $subj->code ?? 'Umum' }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Title -->
                <div class="space-y-1.5">
                    <label for="title" class="block text-xs font-bold text-gray-12 uppercase tracking-wider">
                        Judul Bank Soal <span class="text-red-10">*</span>
                    </label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" required placeholder="Contoh: Bank Soal Aljabar Linear Bab 1" class="w-full px-3.5 py-2.5 rounded-xl border border-gray-6 bg-white text-sm text-gray-12 focus:outline-none focus:border-indigo-8 focus:ring-2 focus:ring-indigo-4/30 transition-all">
                </div>

                <!-- Grade Level -->
                <div class="space-y-1.5">
                    <label for="grade_level" class="block text-xs font-bold text-gray-12 uppercase tracking-wider">
                        Jenjang / Tingkat Kelas
                    </label>
                    <input type="text" id="grade_level" name="grade_level" value="{{ old('grade_level') }}" placeholder="Contoh: 10, 11, 12, atau UTBK" class="w-full px-3.5 py-2.5 rounded-xl border border-gray-6 bg-white text-sm text-gray-12 focus:outline-none focus:border-indigo-8 focus:ring-2 focus:ring-indigo-4/30 transition-all">
                </div>

                <!-- Description -->
                <div class="space-y-1.5">
                    <label for="description" class="block text-xs font-bold text-gray-12 uppercase tracking-wider">
                        Deskripsi / Catatan Tambahan
                    </label>
                    <textarea id="description" name="description" rows="3" placeholder="Deskripsi materi atau petunjuk penggunaan bank soal ini..." class="w-full px-3.5 py-2.5 rounded-xl border border-gray-6 bg-white text-sm text-gray-12 focus:outline-none focus:border-indigo-8 focus:ring-2 focus:ring-indigo-4/30 transition-all">{{ old('description') }}</textarea>
                </div>

                <!-- Actions -->
                <div class="pt-4 border-t border-gray-5 flex items-center justify-end gap-3">
                    <a href="{{ route('question-banks.index') }}" class="px-4 py-2 rounded-xl border border-gray-6 bg-white hover:bg-gray-3 text-xs font-semibold text-gray-12 transition-colors">
                        Batal
                    </a>
                    <button type="submit" class="px-5 py-2 rounded-xl bg-indigo-9 hover:bg-indigo-10 text-white text-xs font-bold transition-all shadow-xs cursor-pointer">
                        Simpan Bank Soal
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>