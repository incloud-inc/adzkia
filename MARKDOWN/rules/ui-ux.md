# Panduan Aturan UI/UX (Dashboard & Navigasi)

Dokumen ini berisi aturan wajib untuk mendesain dan mengimplementasikan UI pada ADZKIA.ID.

## 1. Arsitektur Layout (Shell Layout)
Gunakan pendekatan **Shell Layout** (Kerangka Konsisten) untuk seluruh halaman aplikasi.
- **Header:** Logo di kiri, Judul/Deskripsi Dinamis di tengah, Profil/Avatar di kanan.
- **Sidebar (Kiri):** Lebar tetap, bisa di-*collapse*. Menampung Menu.
- **Workspace (Tengah):** Area utama yang merender konten modul (Tabel, Form, dll). Area terluas.
- **AI Assistant (Kanan):** Panel *chat* lengket (*sticky*) di sisi kanan layar.
- **Footer:** Berada paling bawah, keterangan teks di tengah.

## 2. Palet Warna Utama
- **Green (Utama):** `#37B24D` (Primary), `#B2F2BB` (Light)
- **Orange (Aksen):** `#F76707`, `#FFD8A8`
- **Grey (Netral):** `#212529` (Dark), `#CED4DA` (Light)
- **Blue (Info):** `#1C7ED6`
- **Red (Danger/Hapus):** `#F03E3E`

## 3. Ketentuan Estetika (Styling)
- Minimalis, Desain Flat, Shadow lembut.
- Sudut membulat (*border-radius*): `12px`.
- Ruang putih (*white space*) yang luas dan bersih.
- Tipografi: Prioritas font **Inter**, cadangan System UI.
- Ikon: **Lucide** atau **Heroicons**.
- Animasi transisi dan *hover* yang halus.

## 4. Struktur Navigasi Berdasarkan Workflow
Navigasi dikelompokkan berdasarkan aktivitas, BUKAN struktur *database*. Menu maksimal 7 kelompok (Grup).

**Contoh Grup Menu:**
- 🏠 Dashboard
- 👥 Pengguna
- 📚 Assessment
- 📝 Ujian / Pelaksanaan
- 🛒 Marketplace
- 📊 Laporan
- ⚙️ Pengaturan

**Aturan Emas Feature Flag (Menu Adaptif):**
Fitur (dan navigasi) yang tidak dilisensikan oleh Tenant (misal: *Marketplace*) **DILARANG** ditampilkan di layar. Tampilan sidebar harus menyesuaikan diri agar tetap ringkas dan profesional berdasarkan hak akses.

## 5. Implementasi Teknis
- Selalu gunakan kelas **Tailwind CSS**. Hindari menulis CSS kustom jika memungkinkan.
- Gunakan **Alpine.js** untuk fungsi interaktif (*dropdown*, *modal*, *collapse sidebar*, *tabs*).
- Komponen dibuat modular agar mudah di-*reuse*.
