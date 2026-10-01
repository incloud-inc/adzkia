---
name: Laravel Multi-Tenant & UI Generation
description: Keahlian spesifik agen untuk membantu implementasi logika multi-tenant di Laravel dan pembuatan komponen Alpine+Tailwind.
---

# Panduan Keahlian (Skill) AI

Skill ini ditujukan untuk memandu AI jika diminta membantu pengembangan kode di masa depan.

## 1. Penanganan Multi-Tenant (Laravel)
- **Aturan Emas:** Semua query *database* di Laravel wajib mengikutsertakan `tenant_id` secara otomatis menggunakan *Global Scope*, KECUALI untuk tabel/model yang bersifat *global* (misal tabel Master Bahasa, Master Template Penilaian).
- Jangan membuat koneksi *database* baru. Platform ini berkonsep Single DB PostgreSQL.

## 2. Pembuatan UI Komponen (Tailwind & Alpine.js)
- Jika diminta membuat komponen tabel, selalu sediakan struktur untuk input pencarian (search), tombol filter, pagination, dan *dummy data* yang semantik.
- Semua interaksi state di UI menggunakan Alpine.js (`x-data`, `x-show`, `x-bind`, `x-on`). Dilarang menggunakan jQuery.
- Gunakan palet warna yang sudah ditetapkan di `rules/ui-ux.md`.
