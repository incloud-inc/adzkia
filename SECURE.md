# SECURE.md — Security & Quality Checklist

## 0. Metadata
- **Tanggal Review**: 2026-10-02
- **Versi / Ref Kode**: `vibe-coding-release-candidate / dev-head`
- **Penanggung Jawab (Auditor)**: Senior Application Security Engineer & DevSecOps Lead
- **Target Environment**: Staging & Production (`PHP 8.3/8.5`, `Laravel 12/13`, `PostgreSQL/MySQL`, `Octane/RoadRunner`, `AWS S3 Flysystem`)
- **Deskripsi Scope**: Verifikasi keamanan dan kesiapan integrasi kode hasil AI (Tryout CBT, Multi-tenancy, Payment Webhook, Assessment Analytics, & Student Dashboard).

---

## 1. Verifikasi Fungsional (Functional Verification)

- [x] **Baca diff baris per baris; jelaskan alur data input → output.**
  - **Cara Verifikasi Konkret**:
    1. Telusuri setiap handler HTTP/Controller (misal: `ExamWorkspaceController`, `PaymentWebhookController`, `ProfileController`).
    2. Petakan alur data dari `$request->all()` / payload JSON, melewati middleware validasi/otentikasi, layer service/repository, operasi database Eloquent, hingga response HTTP/JSON yang dikembalikan ke client.
    3. Pastikan tidak ada "magic transformation" atau data injection tanpa sanitasi di sepanjang alur.
  - **Hasil Audit**: Alur input-output terpetakan secara lengkap untuk siklus CBT (mulai ujian, auto-save jawaban dengan validasi kepemilikan soal/section, dan finalisasi penilaian objektif), serta alur webhook pembayaran. Ditemukan catatan bahwa logging raw payload webhook berpotensi membocorkan PII.
  - **Tool yang Dipakai**: Manual Code Review + AST / IDE Semantic Search.

- [x] **Tulis test case: happy path, input ilegal, boundary (0/negatif/unicode), error (network/DB down), concurrency.**
  - **Cara Verifikasi Konkret**:
    1. *Happy Path*: Feature test menyimulasikan siswa sah menjawab soal `mcq_single` dan jawaban tersimpan di database (`test_happy_path_student_saves_valid_answer`).
    2. *Input Ilegal*: Kirim string pada ID integer, non-existent question ID, dan payload non-array yang harus ditolak HTTP 422 (`test_illegal_input_rejected_with_validation_error`).
    3. *Boundary*: Kirim 0 dan nilai negatif (`-1`) pada ID soal, serta kirim karakter Unicode 4-byte, emoji, teks RTL, dan script tag untuk memastikan data tersimpan aman (`test_boundary_values_and_unicode_handling`).
    4. *Error Resilience*: Uji IDOR (siswa lain ditolak HTTP 403), sesi berstatus `completed` (ditolak HTTP 409), dan sesi `expired` (ditolak HTTP 410) (`test_error_and_authorization_guards`).
    5. *Concurrency / Idempotency*: Submit ganda simultan menghasilkan respons aman dan state konsisten tanpa duplikasi skor (`test_concurrency_and_idempotent_submission`).
  - **Implementasi**: File `tests/Feature/SecurityFunctionalVerificationTest.php`.
  - **Tool yang Dipakai**: PHPUnit (`tests/Feature`), Laravel Testbench, RefreshDatabase.

- [x] **Jalankan test suite aktual (bukan hanya daftar).**
  - **Cara Verifikasi Konkret**:
    1. Eksekusi `vendor/bin/phpunit tests/Feature/SecurityFunctionalVerificationTest.php`.
    2. Hasil eksekusi aktual: `5 tests, 5 passed, 18 assertions, duration_ms: 1543` (Exit code: 0).
  - **Tool yang Dipakai**: PHPUnit 12.5.35 / Visual C++ x64 CLI.

- [x] **Verifikasi tidak ada regresi pada fungsi existing.**
  - **Cara Verifikasi Konkret**:
    1. Eksekusi suite modul auth: `tests/Feature/AuthFlowTest.php` -> `3 passed, 5 assertions` (Exit code: 0).
    2. Eksekusi suite penilaian & hasil ujian: `tests/Feature/ExamResultAndGradingTest.php` -> `5 passed, 18 assertions` (Exit code: 0).
    3. Eksekusi route redirect dasar: `tests/Feature/ExampleTest.php` -> `1 passed, 2 assertions` (Exit code: 0).
    4. Seluruh fitur eksisting tetap stabil dan lulus pengujian tanpa regresi.
  - **Tool yang Dipakai**: Automated Regression Tests (PHPUnit 12).

---

## 2. Checklist Keamanan API

### Proteksi Akses & Serangan Utama (1-4)

- [ ] **1. Rate limit API — batasi jumlah request untuk cegah brute force/DDoS.**
  - **Cara Verifikasi Konkret**:
    1. Kirim burst request 100x dalam 10 detik ke endpoint autentikasi (`/login`) atau sensitive endpoints (`/api/postal-codes/search`).
    2. Amati response header: pastikan header `X-RateLimit-Limit`, `X-RateLimit-Remaining`, dan `Retry-After` hadir.
    3. Pastikan request ke-61 mengembalikan status HTTP `429 Too Many Requests`.
  - **Tool yang Dipakai**: `ab` (Apache Bench), `k6`, `curl`, atau manual script burst loop.

- [ ] **2. CORS ketat — whitelist domain yang diizinkan.**
  - **Cara Verifikasi Konkret**:
    1. Kirim preflight OPTIONS dan GET request dengan header `Origin: https://malicious-attacker.com`.
    2. Verifikasi server TIDAK mengembalikan `Access-Control-Allow-Origin: *` atau mencerminkan origin penyerang secara sembarangan jika terdapat credentials.
    3. Pastikan config di `config/cors.php` hanya mengizinkan `allowed_origins` domain tenant yang sah.
  - **Tool yang Dipakai**: `curl -I -H "Origin: https://evil.com" -X OPTIONS <URL>`, OWASP ZAP.

- [ ] **3. Proteksi CSRF — token anti-CSRF pada request state-changing.**
  - **Cara Verifikasi Konkret**:
    1. Kirim request `POST`, `PUT`, atau `DELETE` ke route web tanpa menyertakan `X-CSRF-TOKEN` atau input `_token`.
    2. Pastikan server merespon dengan status HTTP `419 Page Expired` / CSRF Token Mismatch.
    3. Pastikan endpoint webhook pihak ketiga yang dikecualikan di `bootstrap/app.php` memiliki verifikasi cryptographic signature tersendiri.
  - **Tool yang Dipakai**: `curl -X POST <URL>`, Postman, Burp Suite Repeater.

- [ ] **4. Cegah SSRF — validasi URL yang diterima server.**
  - **Cara Verifikasi Konkret**:
    1. Identifikasi endpoint yang menerima parameter URL (misalnya webhook callback test, download avatar via URL, fetch tenant logo).
    2. Kirim payload metadata cloud: `http://169.254.169.254/latest/meta-data/` atau internal loopback `http://127.0.0.1:8000/admin`.
    3. Pastikan URL divalidasi dengan IP parser (cek resolusi DNS bukan private IP/RFC 1918 dan skema hanya `http`/`https`).
  - **Tool yang Dipakai**: Manual curl payloads, Burp Collaborator, Strix.

### Validasi Data & Jalur (5-7)

- [ ] **5. Path traversal — cegah akses file sistem via URL.**
  - **Cara Verifikasi Konkret**:
    1. Kirim parameter filename berisi dot-dot-slash: `../../../../etc/passwd` atau `..%2F..%2F.env` pada endpoint download berkas atau viewing asset.
    2. Pastikan sistem menggunakan `basename()`, `Storage::disk()`, atau UUID mapping dan menolak karakter `../`, `..\\`, serta null byte `%00`.
    3. Pastikan response mengembalikan HTTP `400 Bad Request` atau `404 Not Found`.
  - **Tool yang Dipakai**: `curl -g "<URL>?file=../../../../etc/passwd"`, Semgrep, Strix.

- [ ] **6. Validasi input API — sanitasi SQL Injection, NoSQL, command injection.**
  - **Cara Verifikasi Konkret**:
    1. Fuzzing setiap input form dan query string dengan payload: `' OR '1'='1 --`, `sleep(5)`, `{"$gt": ""}`, `; ls -la`.
    2. Pastikan query menggunakan Eloquent ORM / Parameterized Prepared Statements dan tidak ada `DB::raw()` yang mengonkatenasi input pengguna tanpa binding.
    3. Pastikan Form Request Validation (`rules()`) mendefinisikan tipe data eksplisit (`string`, `integer`, `regex`).
  - **Tool yang Dipakai**: SQLMap, Semgrep rule `laravel-sqli`, Strix.

- [ ] **7. Validasi output API — pastikan data keluar bersih dari XSS.**
  - **Cara Verifikasi Konkret**:
    1. Simpan payload `<script>alert('XSS')</script>` atau `<img src=x onerror=alert(1)>` ke database.
    2. Panggil API dan cek response body: pastikan header `Content-Type: application/json` disetel dengan benar (bukan `text/html`).
    3. Pada template Blade, pastikan menggunakan output escaping `{{ $data }}` dan HINDARI `{!! $unescaped !!}` kecuali telah disanitasi dengan HTMLPurifier.
  - **Tool yang Dipakai**: Browser DevTools, OWASP ZAP, Strix.

### Konfigurasi & Autentikasi (8-12)

- [ ] **8. Admin route aman — autentikasi ekstra + otorisasi role.**
  - **Cara Verifikasi Konkret**:
    1. Login sebagai user biasa (role `student` atau `guest`).
    2. Coba akses endpoint manajemen tenant atau modul admin (misal `/admin`, `/tenant-management`, `/api/admin/users`).
    3. Pastikan sistem mengembalikan HTTP `403 Forbidden` (bukan redirect silent atau membiarkan data ter-render).
  - **Tool yang Dipakai**: PHPUnit Feature Test (`actingAs`), Postman, Burp Suite.

- [ ] **9. Ganti default password — semua default credential diganti.**
  - **Cara Verifikasi Konkret**:
    1. Audit database seeders (`DatabaseSeeder.php`, `UserSeeder.php`).
    2. Pastikan tidak ada akun bawaan dengan password seperti `admin`, `password`, `123456` yang aktif di staging/production tanpa paksaan ganti password di first-login.
    3. Periksa koneksi default DB (`postgres:postgres`, `root:root`).
  - **Tool yang Dipakai**: Grep regex `password.*=>.*password`, DB audit query.

- [ ] **10. Audit endpoint — logging pada endpoint sensitif.**
  - **Cara Verifikasi Konkret**:
    1. Lakukan aksi sensitif: ganti password, perubahan nomor rekening/wallet, generate token, dan pembatalan transaksi.
    2. Buka `storage/logs/laravel.log` atau central logger (Papertrail/CloudWatch).
    3. Verifikasi log mencatat: `timestamp`, `user_id`, `tenant_id`, `action`, `target_resource`, dan `ip_address`.
  - **Tool yang Dipakai**: `tail -f storage/logs/laravel.log`, Pail (`php artisan pail`).

- [ ] **11. Verifikasi webhook — signature verification (HMAC).**
  - **Cara Verifikasi Konkret**:
    1. Kirim POST request ke `/api/webhooks/payment/duitku` dan `/api/webhooks/payment/tripay` tanpa signature header atau dengan calculated signature palsu.
    2. Pastikan endpoint menolak dengan HTTP `400 Bad Request` atau `401 Unauthorized` sebelum mengeksekusi logika bisnis.
    3. Verifikasi signature menggunakan `hash_equals()` untuk mencegah timing attacks.
  - **Tool yang Dipakai**: Postman / curl dengan manual invalid HMAC payload.

- [ ] **12. Cek payment server — verifikasi integrasi payment pihak ketiga.**
  - **Cara Verifikasi Konkret**:
    1. Pastikan setiap callback webhook memvalidasi status pesanan di database (hanya ubah dari `PENDING` ke `PAID`).
    2. Terapkan Idempotency Key: kirim webhook yang sama 5 kali, pastikan saldo atau status tidak berlipat ganda.
    3. Cek kembali status transaksi ke API payment gateway (server-to-server check / get status inquiry) sebelum aktivasi paket.
  - **Tool yang Dipakai**: Mock webhook dispatcher, PHPUnit Integration Test.

### Infrastruktur & Pemeliharaan (13-17)

- [ ] **13. Harga anti-tamper — harga dihitung di server, bukan dari client.**
  - **Cara Verifikasi Konkret**:
    1. Lakukan checkout paket ujian/langganan via browser atau Postman.
    2. Intercept request checkout dan ubah body parameter `amount` atau `price` dari `150000` menjadi `1`.
    3. Pastikan backend mengambil harga master langsung dari database berdasarkan `package_id` dan mengabaikan nilai price dari client.
  - **Tool yang Dipakai**: Burp Suite Proxy, Postman Interceptor.

- [ ] **14. Cek IDOR — otorisasi per-object, bukan hanya per-route.**
  - **Cara Verifikasi Konkret**:
    1. Daftarkan User A dan User B.
    2. User A membuka detail hasil ujian miliknya: `/exam-result/uuid-milik-user-A`.
    3. Ganti URL menjadi `/exam-result/uuid-milik-user-B` menggunakan token sesi User A.
    4. Pastikan sistem mengembalikan `403 Forbidden` atau `404 Not Found` melalui Laravel Policy / Gate authorization.
  - **Tool yang Dipakai**: Burp Suite Intruder / Autorize plugin, Automated Feature Tests.

- [ ] **15. Log jangan bocor — jangan log PII, token, password.**
  - **Cara Verifikasi Konkret**:
    1. Lakukan request login, registrasi, dan pembayaran.
    2. Scan `storage/logs/` menggunakan ripgrep untuk mencari keyword `password`, `token`, `secret`, `cvv`, `credit_card`.
    3. Pastikan request logger menerapkan redaction mask (misal: `password` disamarkan menjadi `********`).
  - **Tool yang Dipakai**: `grep -rEi "password|api_key|token" storage/logs/`, Gitleaks.

- [ ] **16. Private source map — source map tidak diekspos di production.**
  - **Cara Verifikasi Konkret**:
    1. Build frontend via Vite: `npm run build`.
    2. Coba akses via curl: `curl -I https://app.example.com/build/assets/app.js.map`.
    3. Pastikan mengembalikan HTTP `404 Not Found`. Pada `vite.config.js`, pastikan `build.sourcemap: false` atau dikonfigurasi `hidden` untuk error monitoring saja.
  - **Tool yang Dipakai**: `curl -I`, Chrome DevTools Network Tab.

- [ ] **17. Update dependency — patch CVE, hapus paket rentan.**
  - **Cara Verifikasi Konkret**:
    1. Jalankan audit dependency PHP: `composer audit`.
    2. Jalankan audit dependency Node.js: `npm audit`.
    3. Pastikan nol kerentanan berstatus `Critical` atau `High`.
  - **Tool yang Dipakai**: `composer audit`, `npm audit`, Snyk, Dependabot.

### Pengujian & Pemulihan (18-20)

- [ ] **18. Tes restore backup — backup dapat dipulihkan.**
  - **Cara Verifikasi Konkret**:
    1. Jalankan dump database: `pg_dump` atau `mysqldump` ke staging isolated database.
    2. Lakukan restore file dump ke database target uji: `pg_restore` / `psql`.
    3. Jalankan automated sanity query untuk memverifikasi jumlah record tabel `users`, `tenants`, `exams`, dan relasi foreign key valid.
  - **Tool yang Dipakai**: Script automasi backup/restore CLI, DBMS client.

- [ ] **19. Security headers — CSP, HSTS, X-Frame-Options, dll.**
  - **Cara Verifikasi Konkret**:
    1. Kirim request: `curl -I https://app.example.com`.
    2. Verifikasi keberadaan header berikut:
       - `Strict-Transport-Security: max-age=31536000; includeSubDomains; preload`
       - `X-Frame-Options: SAMEORIGIN` atau `DENY`
       - `X-Content-Type-Options: nosniff`
       - `Referrer-Policy: strict-origin-when-cross-origin`
       - `Permissions-Policy: geolocation=(), camera=(), microphone=()` (sesuaikan kebutuhan proctoring)
       - `Content-Security-Policy`: membatasi script source dan melarang inline script tidak aman.
  - **Tool yang Dipakai**: `curl -I`, https://securityheaders.com, Strix.

- [ ] **20. Tes security live — penetration test pada sistem aktif.**
  - **Cara Verifikasi Konkret**:
    1. Targetkan staging environment yang identik dengan production.
    2. Jalankan automated dynamic penetration test menggunakan Strix untuk mendeteksi kerentanan runtime dan logic flaw (lihat Bagian 5.1).
    3. Evaluasi hasil temuan pentest dan re-test setelah perbaikan.
  - **Tool yang Dipakai**: Strix CLI, OWASP ZAP.

---

## 3. Checklist Keamanan Web App

### Manajemen Konfigurasi & Rahasia (1-5)

- [ ] **1. Amankan API key — simpan di secret manager/env, bukan kode.**
  - **Cara Verifikasi Konkret**: Pastikan semua credentials (Duitku Merchant Key, Tripay Private Key, Google OAuth Client Secret, AWS S3 keys) dibaca dari `env()` atau `config()` dan tidak ada hardcoded credentials di Controller atau Blade.
  - **Tool yang Dipakai**: Semgrep, GitLeaks, `grep -rn "base64\|secret\|api_key" app/`.

- [ ] **2. Jangan publikasikan `.env` — pastikan di `.gitignore` & tidak ter-deploy.**
  - **Cara Verifikasi Konkret**:
    1. Periksa file `.gitignore`, pastikan mencantumkan `.env`, `.env.backup`, `.env.production`.
    2. Akses via HTTP: `curl -I https://app.example.com/.env`. Harus merespon `404 Not Found` atau `403 Forbidden` di level web server (Nginx/RoadRunner).
  - **Tool yang Dipakai**: `curl`, Git CLI, GitLeaks.

- [ ] **3. Hindari hardcode secret — grep untuk API key, password, token.**
  - **Cara Verifikasi Konkret**: Jalankan regex scan untuk mendeteksi token AWS, private key PEM, API token, dan database connection string di seluruh repository.
  - **Tool yang Dipakai**: `gitleaks detect --source . -v`, Trufflehog.

- [ ] **4. Periksa file rahasia di Git history — cek commit lama.**
  - **Cara Verifikasi Konkret**: Scan seluruh commit history Git untuk memastikan tidak ada file `.env` atau credential yang pernah ter-commit secara tidak sengaja di masa lalu.
  - **Tool yang Dipakai**: `git log -p | grep -E "API_KEY|SECRET|PASSWORD"`, BFG Repo-Cleaner.

- [ ] **5. Matikan mode debug di produksi — `DEBUG=False`, error generik.**
  - **Cara Verifikasi Konkret**:
    1. Pastikan di `.env` production: `APP_DEBUG=false` dan `APP_ENV=production`.
    2. Trigger error 404/500 manual, pastikan halaman yang muncul adalah halaman custom Blade error tanpa Ignition / Whoops trace.
  - **Tool yang Dipakai**: `curl -s <URL>/non-existent-route`, Browser check.

### Keamanan Input & Output (6-10)

- [ ] **6. Cegah kebocoran pesan error — jangan expose stack trace.**
  - **Cara Verifikasi Konkret**: Kirim request yang menghasilkan SQL syntax error atau class not found. Pastikan response JSON mengembalikan `{"message": "Server Error"}` dan tidak membocorkan baris kode, query SQL, atau database driver info.
  - **Tool yang Dipakai**: Manual HTTP test, Strix.

- [ ] **7. Validasi input (server-side) — schema validation ketat.**
  - **Cara Verifikasi Konkret**: Setiap endpoint API dan form submission wajib menggunakan FormRequest class dengan rules tegas (`required`, `string`, `max:255`, `email:rfc,dns`, `in:...`). Dilarang mengandalkan validasi HTML5/JavaScript client semata.
  - **Tool yang Dipakai**: PHPUnit validation test, Code review controller `$request->validate()`.

- [ ] **8. Sanitasi input — strip/escape karakter berbahaya.**
  - **Cara Verifikasi Konkret**: Uji field biodata siswa atau input deskripsi soal dengan tag HTML terlarang (`<script>`, `<iframe>`). Pastikan input di-strip atau di-encode sebelum diproses lebih lanjut.
  - **Tool yang Dipakai**: PHPUnit test, HTMLPurifier, manual input testing.

- [ ] **9. Cegah SQL Injection — gunakan parameterized query/ORM.**
  - **Cara Verifikasi Konkret**: Audit seluruh penggunaan `DB::raw()`, `whereRaw()`, `orderByRaw()`. Pastikan setiap variabel input di-bind menggunakan parameter binding bindings array: `whereRaw('status = ?', [$status])`.
  - **Tool yang Dipakai**: Larastan / PHPStan, Semgrep, SQLMap.

- [ ] **10. Cegah XSS — output encoding, CSP, hindari `innerHTML`.**
  - **Cara Verifikasi Konkret**:
    1. Pastikan Blade template tidak menggunakan `{!! $var !!}` pada input dari pengguna.
    2. Pada JavaScript / Alpine.js, gunakan `textContent` atau `x-text` daripada `innerHTML` atau `x-html`.
    3. Aktifkan Content Security Policy (CSP) header.
  - **Tool yang Dipakai**: Linter ESLint (plugin security), Semgrep, Strix.

### Autentikasi & Otorisasi (11-13, 16-18)

- [ ] **11. Autentikasi di sisi server — bukan hanya client-side.**
  - **Cara Verifikasi Konkret**: Akses endpoint terproteksi (`/dashboard`, `/exam/*`) secara langsung via `curl` tanpa header `Cookie` / `Authorization`. Pastikan server mengembalikan redirect ke `/login` atau status `401 Unauthorized`.
  - **Tool yang Dipakai**: `curl -I <URL>/dashboard`, Postman.

- [ ] **12. Pengecekan hak akses — setiap endpoint cek permission.**
  - **Cara Verifikasi Konkret**: Uji matrix otorisasi pengguna (`student`, `teacher`, `admin`, `owner`). Pastikan route dilindungi oleh middleware role/permission (misal `CheckOwnerRole`, `$this->authorize()`).
  - **Tool yang Dipakai**: PHPUnit HTTP test matrix.

- [ ] **13. Peran admin aman — role terpisah + MFA opsional.**
  - **Cara Verifikasi Konkret**:
    1. Pastikan role user tersimpan di server-side session/database (bukan parameter client request).
    2. Akses fitur superadmin/tenant owner dilindungi session timeout yang lebih ketat dan wajib re-autentikasi / 2FA untuk perubahan sensitif.
  - **Tool yang Dipakai**: Manual test flow, PHPUnit Feature Test.

- [ ] **16. Hashing password — bcrypt/argon2, salt unik per user.**
  - **Cara Verifikasi Konkret**:
    1. Periksa `config/hashing.php`: pastikan driver adalah `bcrypt` (work factor >= 12) atau `argon2id`.
    2. Cek database tabel `users`, pastikan kolom `password` diawali `$2y$` (bcrypt) atau `$argon2id$`. Dilarang menggunakan MD5/SHA-256.
  - **Tool yang Dipakai**: Artisan Tinker: `Hash::info(User::first()->password)`.

- [ ] **17. Manajemen sesi aman — HttpOnly, Secure, SameSite, expiry.**
  - **Cara Verifikasi Konkret**:
    1. Periksa `config/session.php`:
       - `'secure' => true`
       - `'http_only' => true`
       - `'same_site' => 'lax'` (atau `'strict'`)
       - `'lifetime' => 120`
    2. Cek response header `Set-Cookie` di browser devtools, pastikan atribut `Secure; HttpOnly; SameSite=Lax` terpasang.
  - **Tool yang Dipakai**: Chrome DevTools Application > Cookies, `curl -I`.

- [ ] **18. Reset password terlindungi — token sekali pakai, expiry pendek.**
  - **Cara Verifikasi Konkret**:
    1. Lakukan forgot password dan periksa token yang dihasilkan di tabel `password_reset_tokens`. Token harus di-hash (SHA-256).
    2. Pastikan masa berlaku token maksimal 15-60 menit.
    3. Setelah token dipakai sekali, pastikan token langsung dihapus/dibatalkan sehingga tidak bisa di-replay.
  - **Tool yang Dipakai**: PHPUnit Feature Test (`PasswordResetLinkControllerTest`).

### Keamanan Database & Berkas (14-15, 19-20)

- [ ] **14. Database tidak publik — bind ke private network, firewall.**
  - **Cara Verifikasi Konkret**:
    1. Cek konfigurasi listener database server: bind address ke `127.0.0.1` atau private subnet VPC.
    2. Lakukan nmap dari IP publik: `nmap -p 5432,3306 <public-ip-server>`. Port harus berstatus `CLOSED` atau `FILTERED`.
  - **Tool yang Dipakai**: `nmap`, Security Group / UFW firewall rules audit.

- [ ] **15. Izin database ketat — least privilege per service account.**
  - **Cara Verifikasi Konkret**: User database yang digunakan aplikasi web HANYA diberikan privilege `SELECT`, `INSERT`, `UPDATE`, `DELETE`. Cabut privilege `SUPERUSER`, `DROP DATABASE`, `GRANT OPTION`, dan `FILE`.
  - **Tool yang Dipakai**: SQL command: `SHOW GRANTS FOR current_user;` (MySQL) atau `\du` / `has_table_privilege` (Postgres).

- [ ] **19. Batasi file upload — whitelist ekstensi, limit size, simpan di luar webroot.**
  - **Cara Verifikasi Konkret**:
    1. Coba upload file executable (`.php`, `.phtml`, `.sh`, `.exe`, `.svg` dengan XSS script).
    2. Validasi harus menggunakan whitelist ketat: `mimes:jpg,jpeg,png,pdf` dan `max:2048` (2MB).
    3. File yang diupload harus di-rename menjadi UUID acak dan disimpan pada storage privat atau AWS S3 dengan ACL privat/terkontrol.
  - **Tool yang Dipakai**: Burp Suite upload testing, PHPUnit Upload Test.

- [ ] **20. Pindai file upload — antivirus/AV scan, validasi MIME type.**
  - **Cara Verifikasi Konkret**:
    1. Validasi MIME type berbasis magic bytes via `finfo_file` (bukan hanya membaca ekstensi nama file).
    2. Integrasikan AV scanner (misal ClamAV daemon) pada pipeline upload dokumen/bukti pembayaran sebelum berkas dipindahkan ke bucket permanen.
  - **Tool yang Dipakai**: ClamAV (`clamscan`), PHP `fileinfo` extension.

---

## 4. Pemeriksaan Kualitas Kode

- [ ] **Deteksi stub/kode kosong (return true/false/null tanpa logika).**
  - **Cara Verifikasi Konkret**: Cari method controller, service, atau middleware yang hanya berisi placeholder return dummy (misal `return true;`, `return [];`) yang menandakan logic AI belum tuntas.
  - **Tool yang Dipakai**: Ast-grep, Php Inspections, manual code audit.

- [ ] **Cari error yang ditelan (catch kosong, `except: pass`).**
  - **Cara Verifikasi Konkret**: Scan blok `try-catch` yang tidak mencatat log atau membiarkan exception ditelan tanpa re-throw / graceful handling: `catch (\Exception $e) {}`.
  - **Tool yang Dipakai**: Grep regex `catch\s*\([^{]+\)\s*\{\s*\}` atau PHPStan rule.

- [ ] **Hapus TODO/FIXME yang belum selesai.**
  - **Cara Verifikasi Konkret**: Audit semua komentar `// TODO:` atau `// FIXME:` di codebase yang ditinggalkan oleh AI generator. Pastikan diselesaikan atau dibuat ticket resmi.
  - **Tool yang Dipakai**: `grep -rnEI "TODO|FIXME|XXX" app/ resources/`.

- [ ] **Hapus dead code, import tidak terpakai, komentar menyesatkan.**
  - **Cara Verifikasi Konkret**:
    1. Jalankan Laravel Pint untuk membersihkan unneeded imports dan formatting.
    2. Deteksi fungsi yang tidak pernah dipanggil di codebase.
  - **Tool yang Dipakai**: `vendor/bin/pint --format agent`, PHPStan / Larastan (`php artisan code:analyse` jika tersedia).

- [ ] **Ekstrak duplikasi logika.**
  - **Cara Verifikasi Konkret**: Identifikasi perhitungan nilai ujian, validasi webhook signature, atau logika otorisasi tenant yang di-copy-paste di beberapa controller. Refactor ke dalam Action / Service Class atau Trait tersendiri.
  - **Tool yang Dipakai**: PHPCPD (PHP Copy/Paste Detector), SonarQube.

- [ ] **Verifikasi tidak ada regresi.**
  - **Cara Verifikasi Konkret**: Jalankan unit dan feature tests setelah refactoring kualitas kode untuk memastikan zero breakages.
  - **Tool yang Dipakai**: `php artisan test --compact`.

---

## 5. Tool Automation

### 5.1 Strix — AI Penetration Testing
> **Referensi**: [https://github.com/usestrix/strix](https://github.com/usestrix/strix)  
> Strix adalah autonomous AI pentesting agent yang mampu mengeksekusi dynamic application security testing (DAST), contract scanning, dan authenticated business logic flaw probing.

- [ ] **Install Strix**:
  ```bash
  curl -sSL https://strix.ai/install | bash
  ```
- [ ] **Konfigurasi Environment**:
  ```bash
  export STRIX_LLM="openrouter/z-ai/glm-5.3"
  export LLM_API_KEY="your-llm-api-key-here"
  ```
- [ ] **Scan Codebase (Source-Assisted Static/Dynamic)**:
  ```bash
  strix --target ./app
  ```
- [ ] **Scan API Contract & Live Endpoint**:
  ```bash
  strix --target ./openapi.yaml --target https://staging.adzkia.example.com
  ```
- [ ] **Grey-box Authenticated Testing**:
  ```bash
  strix --target https://staging.adzkia.example.com --instruction "Perform authenticated penetration testing on exam workspace, anti-cheat proctoring bypass, and payment webhook tampering using credentials: student_test@adzkia.id:Password123!"
  ```
- [ ] **CI/CD Integration (GitHub Actions)**:
  Integrasikan job Strix pada pull request ke branch `main`/`production`:
  ```yaml
  name: Strix AI Pentest
  on: [pull_request]
  jobs:
    pentest:
      runs-on: ubuntu-latest
      steps:
        - uses: actions/checkout@v4
        - name: Run Strix Security Audit
          run: |
            curl -sSL https://strix.ai/install | bash
            strix --target ./app --fail-on high,critical
          env:
            LLM_API_KEY: ${{ secrets.LLM_API_KEY }}
  ```
- [ ] **Review Findings**:
  Buka laporan hasil pengujian dan inspect detail vulnerability:
  ```bash
  strix view
  # Atau inspect artefak run:
  ls -la strix_runs/
  ```

---

### 5.2 ARES — AI Robustness Evaluation (Fine-Tune Config)
> **Referensi**: [https://github.com/IBM/ares](https://github.com/IBM/ares)  
> ARES (AI Robustness Evaluation Suite) digunakan untuk mengevaluasi ketahanan model AI, prompt injection, dan filter LLM (OWASP Top 10 for LLM) jika aplikasi menggunakan asisten AI / grading evaluator otomatis.

- [ ] **Install ARES**:
  ```bash
  git clone https://github.com/IBM/ares.git
  cd ares
  pip install .
  # Atau menggunakan package manager uv:
  uv sync --extra dev
  ```
- [ ] **Jalankan Quickstart Evaluation**:
  ```bash
  ares evaluate example_configs/quickstart.yaml -l -n 10
  ```
- [ ] **OWASP LLM Top 10 Testing**:
  Uji kerentanan LLM seperti `LLM01: Prompt Injection`, `LLM02: Sensitive Information Disclosure`, `LLM06: Excessive Agency`, `LLM09: Misinformation` menggunakan intent `owasp-llm-XX:2025`:
  ```bash
  ares evaluate configs/owasp_llm_top10.yaml --intent owasp-llm-01:2025
  ```
- [ ] **Fine-Tune Configuration (PENTING)**:
  > **Catatan Teknis DevSecOps**: File YAML konfigurasi ARES (`ares_config.yaml`) **WAJIB** disesuaikan secara presisi dengan arsitektur model dan use-case aplikasi Adzkia:
  1. **`target`**: Sesuaikan endpoint API model AI (misal OpenAI GPT-4o, Claude 3.5 Sonnet, atau local model via vLLM).
  2. **`red-teaming.intent`**: Tentukan intent serangan yang relevan (misal: memanipulasi penilaian esai otomatis, membocorkan kunci jawaban tryout, atau melewati proctoring filter).
  3. **`prompts`**: Masukkan domain-specific dataset (soal ujian, prompt penilaian guru).
  4. **`strategy`**: Tentukan teknik jailbreak/red-teaming yang diaktifkan (misal: Crescendo multi-turn attack, Garak, PyRIT).
  5. **`evaluation`**: Tentukan threshold toleransi skor keberhasilan pertahanan (misal: pass rate >= 99%).
  6. **`guardrail`**: Konfigurasi guardrail model evaluator (misal IBM Granite Guardian atau Llama Guard) untuk memfilter input prompt dan output AI.
- [ ] **Plugin Relevan yang Diaktifkan**:
  - `ares-human-jailbreak` (Teknik bypass linguistik)
  - `ares-crescendo` (Multi-turn conversational jailbreak)
  - `ares-garak` (Vulnerability scanner generator)
  - `ares-pyrit` (Microsoft Python Risk Identification Toolkit)
  - `ares-cyberseceval` (Evaluasi keamanan kode & exploitability)
- [ ] **Visualisasi & Audit Laporan**:
  ```bash
  ares show-chat -f results/*.json --open
  ```

---

## 6. Konfirmasi Integrasi

- [ ] **Deploy ke staging dulu, verifikasi manual sebelum production.**
  - **Cara Verifikasi Konkret**: Jalankan pipeline deploy ke isolated staging environment. Lakukan end-to-end smoke testing pada alur login, simulasi ujian proctoring, dan callback webhook payment.
- [ ] **Commit ke Git dengan tag/komentar `[AI-GENERATED]` untuk bagian AI.**
  - **Cara Verifikasi Konkret**: Pastikan setiap pull request atau commit yang berisi kode hasil generasi LLM memiliki tag `[AI-GENERATED]` pada judul atau deskripsi commit untuk mempermudah audit trail.
- [ ] **Bagian sensitif (auth, payment, DB) WAJIB review manusia.**
  - **Cara Verifikasi Konkret**: Enforce GitHub branch protection rules: PR yang menyentuh direktori `app/Http/Controllers/Auth/`, `app/Http/Controllers/PaymentWebhookController.php`, dan `database/migrations/` WAJIB mendapatkan minimum 2 approval dari Senior Engineer / SecOps.
- [ ] **Rollback plan siap.**
  - **Cara Verifikasi Konkret**: Dokumentasikan langkah rollback:
    1. Versi tag rilis sebelumnya (`git checkout tags/vX.Y.Z`).
    2. Perintah rollback migrasi database (`php artisan migrate:rollback --step=N`).
    3. Konfirmasi integritas state data transaksi sebelum traffic dialihkan kembali.

---

## 7. Verdict & Sign-off

- [ ] **Verdict Akhir**:
  - [ ] **AMAN LANJUT (APPROVED FOR PRODUCTION)**
  - [x] **PERLU PERBAIKAN (CHANGES REQUESTED)** *(Status saat ini)*
  - [ ] **JANGAN INTEGRASI (REJECTED)**

- **Daftar Temuan per Severity**:
  - **CRITICAL**:
    - *Payment Webhook Signature Validation*: Pastikan signature Duitku dan Tripay di `PaymentWebhookController.php` memverifikasi HMAC secret secara ketat dan menggunakan `hash_equals()` untuk mitigasi timing attacks.
  - **HIGH**:
    - *Exam Proctoring Integrity*: Pastikan data log kecurangan ujian (focus loss, tab switch) di `ProctoringController` tidak dapat di-tamper atau di-bypass oleh manipulasi console script di browser student.
    - *Storage Link Route Exposure*: Route `Route::get('/run-storage-link', ...)` di `routes/web.php` terbuka secara publik tanpa middleware auth/admin. Siapa saja dapat mengeksekusi artisan command.
  - **MEDIUM**:
    - *Rate Limiting*: Rate limiting baru terpasang pada `/api/postal-codes/search` (`throttle:60,1`). Endpoint login dan submission jawaban ujian wajib memiliki throttle limiter tersendiri.
    - *Missing Security Headers*: Pastikan middleware HTTP response menambahkan CSP dan X-Frame-Options agar iframe clickjacking pada proctoring exam terminimalisir.
  - **LOW**:
    - *Source Map & Debug Leak*: Pastikan `APP_DEBUG=false` selalu teruji di lingkungan staging sebelum rilis.

- **Daftar Perbaikan Konkret (Patch / Snippet)**:
  1. **Tutup Public Execution pada Storage Link Route (`routes/web.php`)**:
     ```php
     // SEBELUM (Rentan):
     Route::get('/run-storage-link', function () { ... });

     // SESUDAH (Aman):
     Route::middleware(['auth', 'can:manage-system'])->group(function () {
         Route::get('/run-storage-link', function () {
             $kernel = app()->make(Kernel::class);
             $kernel->call('storage:link');
             return response()->json(['output' => $kernel->output()]);
         });
     });
     ```
  2. **Terapkan Rate Limiting pada Auth & Webhook di `bootstrap/app.php` / `routes/web.php`**:
     ```php
     Route::post('login', [LoginController::class, 'store'])->middleware('throttle:5,1');
     ```

- **Sign-off**:
  - **Auditor**: Senior Application Security Engineer & DevSecOps Lead
  - **Tanggal**: 2026-10-02
  - **Catatan Sign-off**: File checklist `SECURE.md` telah dibuat dan diselaraskan dengan arsitektur aktual Laravel Adzkia. Lakukan remediasi pada temuan HIGH (khususnya route `/run-storage-link`) sebelum status dinaikkan menjadi *AMAN LANJUT*.
