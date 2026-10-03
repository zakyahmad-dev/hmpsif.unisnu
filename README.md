# HMPSIF — Himpunan Mahasiswa Prodi Teknik Informatika

Website organisasi mahasiswa full-stack berbasis PHP + MySQL + Bootstrap 5.

## Fitur
- Home, Tentang, Organisasi, Program Kerja, Detail Program, Kegiatan, Berita, Galeri, Gabung, Kontak
- Dark mode, responsive, smooth scrolling, back-to-top, lightbox
- Pendaftaran anggota tersimpan ke MySQL
- Dashboard admin + login session
- CRUD tambah/hapus untuk program kerja, kegiatan, berita, anggota
- Manajemen status pendaftaran
- PDO prepared statements dan password hashing

## Struktur penting
- `index.php` **wajib ada di root** — ini homepage. Jangan dipindahkan ke folder lain.
- `includes.php` menyediakan helper `url()` dan `asset_url()`. Semua link dan aset
  (CSS, JS, gambar) ditulis lewat helper ini supaya tetap benar baik website dibuka
  dari root domain (Railway/hosting) maupun dari subfolder (`localhost/hmpsif-website`).

## Instalasi XAMPP
1. Salin folder proyek ke `C:/xampp/htdocs/hmpsif-website`.
2. Jalankan Apache dan MySQL.
3. Buka phpMyAdmin, lalu import `database.sql`.
4. Buka `http://localhost/hmpsif-website/`.
5. Admin: `http://localhost/hmpsif-website/admin/login.php` — username `admin`, password `admin123`.

### Pakai database lokal saat development
Buat file `config/config.local.php` (tidak ikut ter-commit):

```php
<?php
$host = "127.0.0.1";
$port = "3306";
$db   = "db_himpunan";
$user = "root";
$pass = "";
$ssl  = false;
```

## Konfigurasi saat deploy (Railway/hosting)
Tidak perlu mengubah kode. Cukup isi environment variable di dashboard hosting:

| Variable | Keterangan |
| --- | --- |
| `DB_HOST` | host database |
| `DB_PORT` | port database |
| `DB_NAME` | nama database |
| `DB_USER` | username database |
| `DB_PASS` | password database |
| `DB_SSL` | `1` (default) untuk koneksi SSL, `0` untuk mematikan |
| `DB_SSL_CA` | path CA certificate (opsional) |
| `APP_DEBUG` | `1` untuk menampilkan detail error database (jangan di produksi) |

Contoh menjalankan di server PHP biasa:

```bash
DB_HOST=127.0.0.1 DB_NAME=db_himpunan DB_USER=root DB_PASS= php -S 0.0.0.0:8000
```

## Jika tabel `kontak` / login admin bermasalah
Bagian paling bawah `database.sql` berisi blok **PERBAIKAN**. Jalankan blok itu di
phpMyAdmin kalau website sudah terlanjur di-import dengan versi lama
(tabel `kontak` belum ada dan hash password admin belum valid).

## Catatan keamanan
- **Jangan simpan kredensial database di dalam kode.** Gunakan environment variable
  atau `config/config.local.php`; kedua sumber itu sudah di-ignore oleh `.gitignore`.
  Kalau kredensial pernah ter-commit/publik, segera ganti (rotate) password database-nya.
- Ganti password admin demo sebelum deployment.
- Untuk produksi, tambahkan CSRF token, rate limiting, validasi MIME upload, dan HTTPS.
