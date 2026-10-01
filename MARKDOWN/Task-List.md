# Daftar Tugas (Task List / Action Plan) ADZKIA.ID

Berdasarkan *Master PRD SEPAKET*, proyek ini dikembangkan dalam **5 Fase**. Berikan tanda centang (`[x]`) pada tugas yang telah diselesaikan.

---

## 🚀 Phase 1: Core Assessment Platform
Modul inti dari CBT, manajemen sistem dasar, pembuatan ujian, pelaksanaan ujian siswa, hingga penilaian dan pelaporan.

### Infrastruktur & Setup
- [x] Inisialisasi *project* Laravel 11.
- [x] Setup PostgreSQL, dan Redis (Laragon/Environment Setup).
- [x] Setup & Konfigurasi **Laravel Octane** untuk performa ujian berkecepatan tinggi.
- [x] Konfigurasi arsitektur **Single Database Multi-Tenant** (Global Scope `tenant_id`).
- [x] Pembuatan Layout Utama (*Shell Layout*: Header, Sidebar, Workspace) menggunakan Tailwind & Alpine.
- [x] Sistem Autentikasi dan *Multi-Tenant Login* (Integrasi ke UI & Radix Themes).
- [x] CRUD Data Pengguna & Autentikasi (Sistem Single Akun dengan Multi-Membership).
- [x] Implementasi sistem *Membership* (Relasi User -> Tenant dengan penentuan Role [S: Super User, A: Admin, T: Teacher/Guru, U: User/Siswa]).
- [x] Dashboard Khusus OWNER (Platform Overview Tenant, Guru, Murid) & Bypass Pemilihan Tenant.
- [x] Integrasi Bahasa Desain Radix UI (@radix-ui/colors, 318 Radix Icons SVG `<x-radix-icon />`, Radix Themes).
- [x] Manajemen Data Tenant (Sekolah / Cabang): CRUD Tenant, Konfigurasi Subdomain, & Paket Layanan.
- [x] Implementasi **Feature Flag & Navigasi Dinamis** (Adaptasi Sidebar & Otorisasi Menu berdasarkan Role [S, A, T, U]).

### Engine Pembuatan Ujian (Assessment Creation Wizard)
- [x] Fondasi Data Mata Pelajaran (`subjects`) & Bank Soal (`question_banks`):
  - [x] Model `Subject` bersifat Global (otoritas CRUD oleh Owner, reusable untuk seluruh Tenant).
  - [x] Migration & Model `QuestionBank` (Pengelompokan soal berdasarkan Mapel & Jenjang).
  - [x] CRUD & UI Manajemen Mata Pelajaran & Bank Soal.
- [x] Logika Penyimpanan Struktur Berjenjang (*Hierarchical Assessment Structure*):
  - [x] Migration & Model `Assessment` (Tipe: PH, PTS, PAS, UTBK, TOEFL, status: draft/published, masa berlaku: selamanya / jangka waktu).
  - [x] Migration & Model `AssessmentSection` (Pembagian bagian ujian: PG, Essay, Listening, Reading).
  - [x] Migration & Model `QuestionGroup` (Stimulus narasi berseri teks/paragraf/dialog).
  - [x] Migration & Model `Question` (Mendukung 8 Tipe: PG Tunggal, PG Majemuk, PG Bobot, Tabel Benar-Salah Dinamis, Menjodohkan, Mengurutkan, Isian Singkat, Essay).
  - [x] Migration & Model `QuestionOption` (Opsi jawaban, kunci jawaban `is_correct`, bobot skor, pasangan `match_key`).
- [x] Implementasi UI & Engine **8 Langkah Wizard Pembuatan Ujian**:
  - [x] **Langkah 1: Pilih Tipe Assessment & Template Penilaian** (TKA, UTBK SNBT, TOEIC, TOEFL, IELTS dengan warna khusus & standar baku).
  - [x] **Langkah 2: Informasi Ujian** (Nama, Mapel, Jenjang SD/SMP/SMA, Durasi, Petunjuk/Deskripsi dengan Rich Markdown Editor).
  - [x] **Langkah 3: Pengaturan Section / Pembagian Ujian** (Judul bagian, instruksi khusus, urutan, penguncian seksi/durasi untuk TOEIC/IELTS).
  - [x] **Langkah 4: Pembuatan & Manajemen Butir Soal (Split-Screen Editor)**:
    - [x] Split-screen: Editor Markdown (kiri) dan Live Preview real-time (kanan) dengan aksen warna `#b2f2bb`.
    - [x] Toolbar pemformatan teks: Bold, Italic, Underline, Heading 1/2/3, rumus LaTeX inline `$..$` dan display `$$..$$`.
    - [x] Preservasi seleksi kursor textarea saat tombol format ditekan.
    - [x] Dukungan perenderan KaTeX mulus tanpa pembatas blok kartu yang kaku.
    - [x] Default jumlah opsi dinamis: SD (3 opsi A-C), SMP (4 opsi A-D), SMA/SMK (5 opsi A-E).
    - [x] Tombol Soal Tunggal & Soal Berseri (Stimulus Wacana/Narasi).
    - [x] Import Soal dari file Word (.docx) & Download Format Panduan Word.
  - [x] **Langkah 5: Model Penilaian, KKM & Kebijakan Pasca Ujian**:
    - [x] Konfigurasi Model Penilaian (Benar/Salah standar, AKM Parsial, Skala Tertimbang, Skala TOEIC, Band IELTS).
    - [x] Pengaturan Tipe Asesmen & Masa Berlaku (Berlaku Selamanya vs Berlaku dengan Jangka Waktu Mulai-Selesai untuk Tryout/Lomba).
    - [x] Konfigurasi KKM (Passing Grade), nilai minimal, dan label status (Lulus / Remedial).
    - [x] Formula Pembobotan per Bagian (Section Weighting) dengan validasi total 100%.
    - [x] Kebijakan Pasca Ujian & Notifikasi Pemeriksaan Manual Guru jika ada soal Essay.
  - [x] **Langkah 6: Review & Validasi Struktur Ujian** (Ringkasan total bagian, total soal, total poin, alokasi waktu, model penilaian, dan KKM).
  - [x] **Langkah 7: Finalisasi & Monetisasi** (Penetapan Harga Gratis/Berbayar, Simulasi Revenue Share 50:50 Tenant, Simpan sebagai Draf vs Terbitkan).
  - [x] **Langkah 8: Penjadwalan & Token Ujian CBT** (Generate token acak, opsi acak soal, opsi acak opsi).
- [x] Halaman Detail & Pratinjau Asesmen (`/assessments/{id}`):
  - [x] Rendering penuh format Markdown & KaTeX pada Petunjuk Umum, Wacana/Stimulus, Butir Soal, dan Pilihan Jawaban.
  - [x] Background aksen hijau `#b2f2bb` pada blok pratinjau markdown.

---

### 🎯 TUGAS KITA SELANJUTNYA: Engine Pelaksanaan & Penilaian Ujian (CBT Exam Engine)
Rincian langkah pengerjaan modul berikutnya secara sistematis:

#### 1. Gerbang Masuk & Konfirmasi Ujian Siswa (Exam Gate & Readiness)
- [x] **Rute & Controller Pelaksanaan Ujian** (`/exam/{token}` → resolve, `/exam/start/{assessment}` → show + start):
  - [x] Verifikasi token ujian, cek status publikasi, dan validasi periode aktif (khusus asesmen berjangka waktu).
  - [x] Halaman Verifikasi Data Peserta (Nama Siswa, Kelas/Tenant, Nama Ujian, Mata Pelajaran, Jumlah Soal, Alokasi Waktu).
  - [x] Lembar Tata Tertib Pengerjaan & Tombol "Mulai Ujian" (Memicu mode layar penuh / Kiosk).
- [x] **Database Models**: `ExamSession` (updated + UUID), `ExamAnswer`, `ExamEvent` (anti-cheat log).
- [x] **Migrations**: `add_gate_columns_to_exam_sessions`, `create_exam_answers_table`, `create_exam_events_table`.


#### 2. Antarmuka Ruang Ujian Siswa (Student CBT Workspace)
- [x] **Header Ujian Interaktif**:
  - [x] Identitas peserta & judul ujian.
  - [x] Timer hitung mundur interaktif (*Real-time Countdown Timer*) server-authoritative dengan peringatan saat waktu tersisa 5 menit.
  - [x] Indikator status koneksi (*Online / Syncing / Offline indicator*).
- [x] **Area Konten & Split-Screen Soal**:
  - [x] Dukungan perenderan wacana/stimulus berdampingan dengan soal anak (untuk tipe soal berseri).
  - [x] Perenderan visual Markdown & KaTeX (via `marked` + `katex`).
  - [x] Komponen interaktif per tipe soal:
    - [x] Pilihan Ganda (Single & Multiple Choice) dengan highlight opsi terpilih.
    - [x] Pilihan Ganda Berbobot.
    - [x] Matriks Benar / Salah (Tabel interaktif).
    - [x] Menjodohkan (Matching pair select).
    - [x] Isian Singkat.
    - [x] Soal Essay dengan editor teks bersih.
- [x] **Navigasi & Kontrol Pengerjaan**:
  - [x] Tombol: *Soal Sebelumnya*, *Ragu-Ragu* (warna kuning), *Soal Berikutnya*.
  - [x] Drawer / Grid Nomor Soal interaktif (Status: Hijau = Sudah dijawab, Kuning = Ragu-ragu, Abu-abu = Belum dijawab).
  - [x] Tombol "Kumpulkan Ujian" dengan modal konfirmasi dan rekap kelengkapan jawaban siswa.
- [x] **Keamanan & Ketahanan Sistem (Anti-Cheat & Resilience)**:
  - [x] Auto-save jawaban otomatis setiap memilih opsi atau mengetik (Debounce 500ms ke LocalStorage & Async API/Redis).
  - [x] Peringatan deteksi perpindahan tab browser (*Tab switch detection*).
  - [x] Mekanisme auto-submit ketika durasi waktu habis.
- [x] **Controller**: `ExamWorkspaceController` (show, saveAnswer, logEvent, submit + autoGradeObjective).
- [x] **API Routes**: `/exam/session/{uuid}/answer`, `/exam/session/{uuid}/event`, `/exam/session/{uuid}/submit`.


#### 3. Halaman Pasca Ujian & Rekap Hasil Siswa (Post-Exam Summary Screen)
- [x] **Desain Halaman Rekapitulasi Berstandar Tinggi (Taste-Skill Design)**:
  - [x] Ringkasan Umum: Nilai sementara / estimasi, durasi pengerjaan, status ketuntasan KKM.
  - [x] **Tabel Rincian Per Bagian (Section Breakdown)**:
    - [x] Nama / Judul Bagian.
    - [x] Jumlah Total Soal pada Bagian.
    - [x] Jumlah Jawaban Benar.
    - [x] Jumlah Jawaban Salah.
    - [x] Jumlah Soal Tidak Dijawab.
    - [x] Nilai / Bobot Poin yang diperoleh.
  - [x] **Notifikasi Status Pemeriksaan Guru**:
    - [x] Banner informatif jika ujian mengandung soal Essay: *"Ujian ini memerlukan pemeriksaan manual oleh guru untuk soal essay sebelum nilai akhir resmi dirilis."*
    - [x] Status rilis nilai: *Menunggu Pemeriksaan Guru* vs *Nilai Final Diterbitkan*.

#### 4. Panel Penilaian & Koreksi Guru (Teacher Grading & Final Score Release)
- [x] Daftar Peserta Ujian per Asesmen & Status Pengerjaan (Belum Mengerjakan, Sedang Mengerjakan, Selesai / Perlu Diperiksa, Selesai / Final).
- [x] Antarmuka Koreksi Essay Guru:
  - [x] Tampilan soal essay, kunci/panduan jawaban, jawaban teks siswa.
  - [x] Input skor per butir essay dan catatan/umpan balik guru.
- [x] Tombol & Mekanisme "Rilis Nilai Final" (Publikasi nilai resmi ke siswa dan kalkulasi ulang nilai total).

#### 5. Analisis Butir Soal & Rekap Nilai (Reporting & Analytics)
- [x] Rekap Nilai Kelas / Tenant (Ekspor ke Excel / PDF).
- [x] Statistik Analisis Soal (Tingkat kesukaran soal, daya pembeda, distribusi pilihan pengecoh).

---

## 🛒 Phase 2: Marketplace, Commerce & Revenue Sharing
Fase integrasi katalog produk digital, transaksi berbayar, dan distribusi bagi hasil otomatis antar entitas (Platform ADZKIA, Tenant, dan Author) yang disinkronkan dengan sistem **Tier Tenant** dan **4 Pilar Jenjang**.

### 🏷️ 2.1 Manajemen Level / Tier Tenant
Konfigurasi hak akses, rasio bagi hasil, dan kapabilitas branding per tier. Rasio bagi hasil disinkronkan langsung dengan field model `assessments.revenue_share_tenant_pct` dan `assessments.revenue_share_platform_pct`:
- [ ] **Skema Tier & Rasio Bagi Hasil Tenant (`app/Models/Tenant.php`)**
  - [ ] **Level 1 — Starter** — Rasio `Platform 75% : Tenant 25%` (75:25)
    - Tidak dapat membuat asesmen sendiri (*read-only* katalog).
    - Hanya menayangkan asesmen kurasi resmi ADZKIA (*Mandatory National Content*).
    - Subdomain default (`*.adzkia.id`), tanpa custom domain.
  - [ ] **Level 2 — Pro** — Rasio `Platform 50% : Tenant 50%` (50:50)
    - Dapat membuat asesmen sendiri (*Author Workspace*) dan mempublikasikannya.
    - Mendukung 1 (satu) Custom Domain.
    - Menayangkan produk kurasi ADZKIA dan produk mandiri tenant.
  - [ ] **Level 3 — Enterprise** — Rasio `Platform 25% : Tenant 75%` (25:75)
    - White Label penuh (logo, warna, favicon, branding kustom).
    - Multi Custom Domain.
    - Hak kontrol penuh: Bebas mengaktifkan (*Toggle ON/OFF*) penayangan katalog nasional ADZKIA.
- [ ] **Guard & Enforce Hak Akses Tier**:
  - [ ] Middleware verifikasi tier saat pembuatan/penayangan asesmen (`canCreateAssessments`, `canToggleAdzkiaAssessments`).

### 📚 2.2 Katalog Produk Digital & 4 Pilar Jenjang
Katalog multi-pilar dan multi-tenant dengan filter visibilitas berdasarkan pengaturan branding tenant:
- [ ] **4 Pilar Kategori Jenjang Produk (`assessments.grade_level` / kategori)**:
  - [ ] `SD/MI` — Asesmen & tryout tingkat dasar (Kelas 1–6).
  - [ ] `SMP/MTs` — Asesmen & tryout tingkat menengah pertama (Kelas 7–9).
  - [ ] `SMA/SMK/UTBK` — Asesmen menengah atas & persiapan UTBK / SNBT (Kelas 10–12).
  - [ ] `UMUM (Card 4)` — Kedinasan, CPNS, PPPK, Psikotes, Sertifikasi Profesi, Uji Kompetensi.
- [ ] **Filter Visibilitas Katalog Tenant**:
  - [ ] Filter otomatis berdasarkan checklist jenjang aktif di pengaturan branding tenant (`showGrade('sd')`, `showGrade('smp')`, `showGrade('sma')`).
  - [ ] Asesmen Wajib Tayang Nasional dari Owner ADZKIA selalu tampil di seluruh tenant (kecuali tenant Enterprise yang menonaktifkannya).
  - [ ] Asesmen lokal tenant hanya tampil di portal tenant pembuat.
- [ ] **Sub-Modul Katalog Digital**:
  - [ ] Modul Katalog Produk Digital (TryOut CBT, Paket Video Pembahasan, Modul/E-book).
  - [ ] Halaman Etalase Publik & Pencarian: filter jenjang, mata pelajaran, tipe produk, harga (Gratis vs Berbayar).

### 💳 2.3 Transaksi Berbayar & Distribusi Bagi Hasil (B2B2C)
- [x] **Penetapan Harga & Monetisasi (Sinkron Wizard Langkah 7)**:
  - [x] Model Gratis (*Free*) vs Berbayar (*Paid*) dengan penetapan harga (`price_idr`).
  - [x] Pembatasan akses: **Hanya ADZKIA** yang dapat membuat dan merilis asesmen (tidak ada *author* eksternal). Asesmen dijual ke siswa melalui Tenant.
  - [x] Snapshot persentase bagi hasil pada saat transaksi dibuat (berdasarkan level Tenant):
    - Starter: ADZKIA 75% : Tenant 25%
    - Pro: ADZKIA 50% : Tenant 50%
    - Enterprise: ADZKIA 25% : Tenant 75%
- [x] **Integrasi Payment Gateway (Duitku / Tripay)**:
  - [x] Integrasi API sistem pembayaran multi-gateway (Duitku & Tripay dengan auto-fallback Sandbox) untuk memproses pembelian asesmen oleh siswa.
  - [x] Pengaturan metode bayar: QRIS, Virtual Account (BCA, Mandiri, BRI, BNI), dan E-Wallet (ShopeePay).
  - [x] Pembuatan *Webhook Handler* dengan verifikasi HMAC-SHA256 (Tripay: `X-Callback-Signature`) dan MD5 (Duitku) untuk memproses *callback* pembayaran otomatis dan memperbarui status pesanan (*pending*, *settled/success*, *expired/failed*).
- [x] **Pencatatan Transaksi & Dompet Tenant**:
  - [x] Mesin Kalkulator Distribusi: Menghitung secara otomatis pembagian nilai jual saat webhook menyatakan transaksi *settled* (Contoh: Harga UTBK SNBT Rp100.000, dibagi dan disalurkan sesuai level Tenant terkait).
  - [x] Dompet Saldo Tenant (`tenant_wallets` & `wallet_transactions`): Pencatatan kredit otomatis hasil pembagian penjualan asesmen secara *real-time*.
  - [x] Pengajuan Penarikan Dana (*Payout*): Form pengajuan bagi Tenant untuk mencairkan/mentransfer pendapatan ke rekening bank mereka, beserta persetujuan dari Admin ADZKIA.
- [x] **Laporan Penjualan & Pendapatan**:
  - [x] Pembuatan menu baru di Sidebar Admin & Tenant: **LAPORAN** dengan Tab **PENJUALAN**.
  - [x] Tabel Riwayat Pembelian: Menampilkan detail histori pesanan (Nama Asesmen, Nilai Jual/Harga, Status Pembayaran).
  - [x] Kolom Distribusi Finansial: Menampilkan rincian Porsi Bagi Hasil (Nominal Rupiah untuk ADZKIA & Nominal Rupiah untuk Tenant) di setiap baris transaksi.
  - [x] *Card Summary* (Ringkasan Akumulasi Atas):
    - **Total Pendapatan ADZKIA**
    - **Total Pendapatan Tenant**
  - [x] Filter Laporan: Pencarian berdasarkan rentang tanggal (*date range*) dan status pembayaran.

---

## 📚 Phase 3: Knowledge Base
- [ ] Modul Blog Publik (Multi-tenant).
- [ ] Dokumentasi & FAQ.

---

## 💬 Phase 4: Community
- [ ] Forum Diskusi Terintegrasi.
- [ ] Sistem interaksi (Tanya Jawab).

---

## 🤖 Phase 5: Kecerdasan Buatan (AI)
- [ ] Integrasi AI Tutor.
- [ ] Integrasi AI Essay Grader (Pemeriksa Essay Otomatis).
- [ ] Sistem Rekomendasi Belajar berbasis AI.
