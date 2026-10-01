# Aturan Alur Kerja (Workflow) Pembuatan Assessment

Bagian paling krusial dari *User Experience* (UX) untuk Guru adalah cara mereka membuat ujian. 
Gunakan panduan ini untuk mengimplementasikan *backend* dan *frontend* form pembuatan ujian.

## 1. Konsep Utama: Wizard-Driven, Bukan Database-Driven
Guru dilarang disuguhkan form kosong bertumpuk. Pembuatan soal harus dituntun langkah demi langkah (Wizard) yang merepresentasikan pola pikir natural pendidik.

## 2. 8 Langkah Wizard Pembuatan Ujian
1. **Pilih Assessment:** Memilih tipe ujian (PH, PTS, UTBK, TOEFL). Sistem mengidentifikasi template penilaian.
2. **Informasi:** Mengisi nama, kelas, tahun ajaran, deskripsi.
3. **Section:** Membagi ujian ke dalam bagian (misal: Pilihan Ganda & Essay, atau Listening & Reading).
4. **Soal (Penting!):** Di tahap ini, guru memilih jenis isi section. 
   - **Question (Soal Tunggal):** Bikin soal langsung.
   - **Question Group (Soal Berseri/Stimulus):** Guru membuat Stimulus (Paragraf/Audio) dulu, lalu menambahkan beberapa anak soal di bawah stimulus tersebut.
5. **Penilaian (Scoring):** Memilih metode (Benar/Salah, Bobot, Rubrik, Konversi TOEFL, dll).
6. **Review:** Ringkasan struktur ujian yang dibuat (Jumlah section, grup, durasi).
7. **Publish:** Status Assessment menjadi aktif (tapi belum ditugaskan).
8. **Jadwal:** Penugasan (Assign) ke kelas, tanggal, token, durasi.

## 3. Aturan Struktur Data (Database Reference)
- Meskipun UX-nya adalah Wizard 8 langkah, data di *backend* harus disimpan ke dalam struktur relasional berikut:
  `Assessment` -> `Section` -> `Question Group / Stimulus` -> `Question` -> `Option`.
- `Question Group` bisa jadi bernilai `NULL` atau kosong untuk soal tunggal.
