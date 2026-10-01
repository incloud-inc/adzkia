# ADZKIA.ID / SEPAKET

**Universal Assessment Platform & Educational Marketplace**

Platform ujian berskala nasional yang mengintegrasikan Computer Based Test (CBT) tangguh dengan Marketplace Pendidikan, memungkinkan setiap sekolah, bimbel, dan lembaga pendidikan menjadi *tenant* dan berkolaborasi dalam satu ekosistem.

## Fitur Utama
- **Multi-Tenant (Single Database):** Satu platform, banyak lembaga.
- **Wizard Pembuatan Ujian:** Alur pembuatan soal yang ramah pengguna, mengikuti cara berpikir guru.
- **Marketplace & Affiliate:** Jual-beli paket soal TryOut, modul, dan video pembelajaran dengan sistem bagi hasil (Platform, Tenant, Author).
- **Exam Engine:** Fitur ujian komprehensif, mendukung berbagai sistem penilaian (Rubrik, Konversi TOEFL/UTBK).
- **Feature Flags:** Navigasi dan fitur yang adaptif sesuai paket lisensi *tenant*.

## Tech Stack
- **Backend:** Laravel 11.x (PHP 8.2+)
- **Frontend:** HTML5, Tailwind CSS, Alpine.js
- **Database & Cache:** PostgreSQL, Redis
- **Infrastruktur:** Docker, Nginx, Ubuntu, Cloudflare R2

## Prasyarat Instalasi (Development)
Pastikan Anda telah menginstal:
- [Docker & Docker Compose](https://docs.docker.com/get-docker/)
- [Composer](https://getcomposer.org/)
- Node.js & NPM

## Panduan Instalasi (Laravel Sail / Docker)

1. **Kloning Repositori**
   ```bash
   git clone https://github.com/adzkia/sepaket.git
   cd sepaket
   ```

2. **Instalasi Dependensi PHP**
   ```bash
   composer install
   ```

3. **Pengaturan Environment**
   ```bash
   cp .env.example .env
   # Sesuaikan DB_CONNECTION ke pgsql, atur kredensial.
   ```

4. **Jalankan Docker Container (via Laravel Sail)**
   ```bash
   ./vendor/bin/sail up -d
   ```

5. **Generate App Key & Migrasi Database**
   ```bash
   ./vendor/bin/sail artisan key:generate
   ./vendor/bin/sail artisan migrate --seed
   ```

6. **Kompilasi Aset Frontend (Tailwind/Alpine)**
   ```bash
   npm install
   npm run dev
   ```

Aplikasi sekarang dapat diakses di `http://localhost`.
