--CREATE DATABASE IF NOT EXISTS db_himpunan CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
--USE db_himpunan;

CREATE TABLE users(id INT AUTO_INCREMENT PRIMARY KEY,nama VARCHAR(100),username VARCHAR(50) UNIQUE,password VARCHAR(255),role ENUM('admin','editor') DEFAULT 'admin');
CREATE TABLE anggota(id INT AUTO_INCREMENT PRIMARY KEY,nama VARCHAR(120),nim VARCHAR(40),semester VARCHAR(20),kelas VARCHAR(30),email VARCHAR(120),whatsapp VARCHAR(30),divisi VARCHAR(80),foto VARCHAR(255));
CREATE TABLE pengurus(id INT AUTO_INCREMENT PRIMARY KEY,nama VARCHAR(120),jabatan VARCHAR(100),divisi VARCHAR(80),deskripsi TEXT,foto VARCHAR(255));
CREATE TABLE program_kerja(id INT AUTO_INCREMENT PRIMARY KEY,nama VARCHAR(160),divisi VARCHAR(80),deskripsi TEXT,status VARCHAR(30),tahun INT,waktu VARCHAR(100),tempat VARCHAR(150),banner VARCHAR(255),detail TEXT);
CREATE TABLE kegiatan(id INT AUTO_INCREMENT PRIMARY KEY,nama VARCHAR(160),tanggal DATE,lokasi VARCHAR(150),deskripsi TEXT,status VARCHAR(30),poster VARCHAR(255));
CREATE TABLE berita(id INT AUTO_INCREMENT PRIMARY KEY,judul VARCHAR(200),penulis VARCHAR(120),tanggal DATE,kategori VARCHAR(60),ringkasan TEXT,thumbnail VARCHAR(255),isi LONGTEXT);
CREATE TABLE galeri(id INT AUTO_INCREMENT PRIMARY KEY,judul VARCHAR(160),foto VARCHAR(255),kegiatan VARCHAR(160),tahun INT);
CREATE TABLE pendaftaran(id INT AUTO_INCREMENT PRIMARY KEY,nama VARCHAR(120),nim VARCHAR(40),semester VARCHAR(20),kelas VARCHAR(30),whatsapp VARCHAR(30),email VARCHAR(120),divisi VARCHAR(80),alasan TEXT,agree TINYINT(1),status ENUM('Pending','Diproses','Diterima','Ditolak') DEFAULT 'Pending',created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);
CREATE TABLE kontak(id INT AUTO_I  NCREMENT PRIMARY KEY,nama VARCHAR(120),email VARCHAR(120),subjek VARCHAR(160),pesan TEXT,created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);

INSERT INTO users(nama,username,password,role) VALUES('Administrator HMTI','admin','$2y$10$7k2gG7jzQj1m3r8qJm1Z6e9q2m7cZ8X8Z7Qp3y6Wq5v2mY0r9aK5S','admin');
-- Password demo: admin123. Jika hash demo tidak cocok pada PHP versi tertentu, jalankan: php -r "echo password_hash('admin123', PASSWORD_DEFAULT), PHP_EOL;"

INSERT INTO pengurus(nama,jabatan,divisi,deskripsi,foto) VALUES
('Akmal Mustofa','Ketua','BPH','Mengkoordinasikan arah organisasi.','assets/img/avatar.svg'),
('Naufal','Wakil Ketua','BPH','Mendampingi ketua dan koordinasi internal.','assets/img/avatar.svg'),
('Zufar','Sekretaris','BPH','Administrasi dan dokumentasi organisasi.','assets/img/avatar.svg'),
('Rizal','Bendahara','BPH','Mengelola administrasi keuangan.','assets/img/avatar.svg'),
('Sinta','Koordinator','PSDM','Pengembangan sumber daya mahasiswa.','assets/img/avatar.svg'),
('Dimas','Koordinator','Pendidikan','Program akademik dan teknologi.','assets/img/avatar.svg'),
('Alya','Koordinator','Kominfo','Media dan informasi digital.','assets/img/avatar.svg'),
('Fajar','Koordinator','Humas','Relasi dan kerja sama.','assets/img/avatar.svg');

INSERT INTO program_kerja(nama,divisi,deskripsi,status,tahun,waktu,tempat,banner,detail) VALUES
('Makrab Informatika','PSDM','Membangun keakraban lintas angkatan.','Selesai',2026,'Agustus 2026','Jepara','assets/img/placeholder.svg','Latar belakang: memperkuat relasi mahasiswa. Tujuan: membangun teamwork dan komunikasi. Target peserta: mahasiswa Teknik Informatika.'),
('Workshop Web Development','Pendidikan','Pelatihan membuat aplikasi web modern.','Berjalan',2026,'September 2026','Lab Informatika','assets/img/placeholder.svg','Materi HTML, CSS, JavaScript, Bootstrap dan dasar backend.'),
('Bakti Sosial','Humas','Kegiatan pengabdian kepada masyarakat.','Akan Datang',2026,'November 2026','Jepara','assets/img/placeholder.svg','Kegiatan sosial mahasiswa bersama masyarakat sekitar.');

INSERT INTO kegiatan(nama,tanggal,lokasi,deskripsi,status,poster) VALUES
('PKKMB Teknik Informatika','2026-09-01','Kampus','Pengenalan lingkungan akademik dan organisasi.','Selesai','assets/img/placeholder.svg'),
('Seminar Teknologi AI','2026-10-12','Aula Kampus','Diskusi perkembangan AI untuk mahasiswa.','Akan Datang','assets/img/placeholder.svg'),
('Coding Competition','2026-11-20','Lab Informatika','Kompetisi pemrograman antarmahasiswa.','Akan Datang','assets/img/placeholder.svg');

INSERT INTO berita(judul,penulis,tanggal,kategori,ringkasan,thumbnail,isi) VALUES
('HMTI Membuka Pendaftaran Anggota Baru','Admin HMTI','2026-09-10','Pengumuman','Kesempatan bagi mahasiswa untuk bergabung dan berkembang bersama.','assets/img/placeholder.svg','Pendaftaran anggota baru dibuka untuk mahasiswa Teknik Informatika.'),
('Workshop Web Development Dimulai','Admin HMTI','2026-09-05','Akademik','Pelatihan web development menjadi ruang belajar praktik.','assets/img/placeholder.svg','Workshop berlangsung dalam beberapa sesi praktik.'),
('Tim HMTI Raih Prestasi Kompetisi','Admin HMTI','2026-08-25','Prestasi','Mahasiswa HMTI berpartisipasi dalam kompetisi teknologi.','assets/img/placeholder.svg','Prestasi menjadi motivasi untuk terus belajar.');

INSERT INTO galeri(judul,foto,kegiatan,tahun) VALUES
('Makrab 2026','assets/img/placeholder.svg','Makrab Informatika',2026),
('PKKMB 2026','assets/img/placeholder.svg','PKKMB Teknik Informatika',2026),
('Workshop','assets/img/placeholder.svg','Workshop Web Development',2026);
