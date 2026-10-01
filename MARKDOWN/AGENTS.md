# ADZKIA.ID (SEPAKET) - AI Developer Onboarding

Selamat datang, AI Coding Assistant! Dokumen ini adalah panduan utama Anda sebelum menulis kode untuk proyek **ADZKIA.ID (SEPAKET)**. 

## Visi & Konsep Utama
ADZKIA.ID adalah **Universal Assessment Platform** berkonsep *Multi-Tenant* (Satu Platform untuk banyak Sekolah/Bimbel/Instansi) yang digabungkan dengan ekosistem *Marketplace* Pendidikan.

- **Konsep Tenant:** Semua pengguna lembaga (sekolah, bimbel, dll) disebut **Tenant**. Tidak ada pembedaan *database* per tenant.
- **Model Kontributor:** Platform (20%), Tenant (30%), Author (50%).
- **Satu Akun Universal:** Pengguna (Siswa/Guru) menggunakan satu akun global yang bisa terafiliasi dengan banyak Tenant.

## Tech Stack (Arsitektur)
- **Backend Utama:** Laravel (PHP) dengan **Laravel Octane** (untuk performa tinggi setara Golang).
- **Penanganan Beban Tinggi:** Wajib menggunakan **Redis Queue** untuk proses simpan jawaban ujian secara *asynchronous*.
- **Frontend Admin/Dashboard:** HTML5 Semantik, Tailwind CSS, Alpine.js, Laravel Blade.
- **Frontend Exam Engine (Layar Ujian):** Laravel Livewire v3 (dengan fitur `wire:navigate` untuk pengalaman SPA murni tanpa *reload*).
- **Database:** PostgreSQL (Sistem *Single Database* dengan kolom `tenant_id` pada setiap tabel relasional).
- **Cache & Session:** Redis
- **Storage:** Cloudflare R2
- **Infrastruktur:** Nginx, Docker, Ubuntu Server

## Aturan Inti (Core Rules) & Vibe Coding
1. **Kesederhanaan di atas segalanya:** Gunakan pendekatan *Vibe Coding*. Hindari *over-engineering*. Sederhana lebih baik daripada terlalu fleksibel.
2. **Prioritas UX:** UX Admin dan Guru adalah prioritas tertinggi.
3. **Modularitas:** Semua modul harus independen. *Marketplace* tidak boleh mengganggu sistem *Core Assessment*. Modul bisa dimatikan/dihidupkan berdasarkan lisensi (Feature Flag).
4. **Kejelasan Kode:** Kode harus mudah dipahami oleh programmer junior.
5. **Gunakan Aturan Spesifik:** Selalu merujuk pada file di dalam folder `rules/` untuk panduan mendetail mengenai UI/UX, Alur Kerja (*Workflow*), dan lainnya.

Bacalah file `Task-List.md` untuk mengetahui prioritas pengerjaan saat ini.
