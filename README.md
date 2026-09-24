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

## Instalasi XAMPP
1. Salin folder `hmti-website` ke `C:/xampp/htdocs/`.
2. Jalankan Apache dan MySQL.
3. Buka phpMyAdmin.
4. Import `database.sql`.
5. Buka `http://localhost/hmpsif-website/`.
6. Admin: `http://localhost/hmpsif-website/admin/login.php`

## Catatan keamanan
Ganti password admin demo sebelum deployment. Untuk produksi, tambahkan CSRF token, rate limiting, validasi MIME upload, dan HTTPS.
