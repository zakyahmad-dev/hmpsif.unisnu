<?php require "includes.php"; ?>
<!doctype html>
<html lang="id">
    <a class="about-brand" href="index.php">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About | HMPSIF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <link href="assets/css/style_modern.css" rel="stylesheet">
    <style>
        .about-hero { padding: 90px 0 70px; background: linear-gradient(135deg, #eef4ff, #ffffff); }
        .about-card { border: 0; border-radius: 22px; box-shadow: 0 10px 35px rgba(0,0,0,.07); height: 100%; }
        .creator-photo { width: 130px; height: 130px; object-fit: cover; border-radius: 50%; border: 5px solid #eef2ff; background: #e9ecef; }
        .tech-item { border-radius: 16px; padding: 22px; background: #fff; box-shadow: 0 8px 25px rgba(0,0,0,.05); height: 100%; }
        .contact-item i { width: 32px; }
    </style>
</head>
<body>

<?php include "navbar.php"; ?>

<header class="about-hero">
    <div class="container text-center">
        <div class="eyebrow mb-3">Mengenal Pembuat Website</div>
        <h1 class="display-5 fw-bold">About HMPSIF</h1>
        <p class="lead text-secondary mx-auto" style="max-width: 720px;">
            Halaman informasi mengenai pembuat website HMPSIF, profil singkat,
            teknologi yang digunakan, serta kontak yang dapat dihubungi.
        </p>
    </div>
</header>

<section class="section">
    <div class="container">
        <div class="text-center mb-5">
            <div class="eyebrow">Website Creator</div>
            <h2 class="section-title mt-2">Dibuat oleh</h2>
            <p class="text-muted">Dua Anggota HMPSIF</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="card about-card p-4 text-center">
                    <img src="assets/img/creator-1.jpg" alt="Foto Pembuat 1" class="creator-photo mx-auto mb-3"
                         onerror="this.src='assets/img/foto-pengurus/nauval.jpg'">
                    <h4>Nauval Hibrizi Hakim</h4>
                    <p class="text-primary fw-semibold mb-2">Web Developer / Frontend Developer</p>
                    <p class="text-muted">Profil singkat pembuat pertama. Jelaskan peran, kontribusi, dan tanggung jawabnya dalam proses pembuatan website HMPSIF.</p>
                    <div class="contact-item text-muted"><i class="fa-solid fa-envelope"></i> nauvalhibrizi.2524@student.unisnu.ac.id</div>
                    <div class="contact-item text-muted"><i class="fa-brands fa-instagram"></i> @nauvalhakim23</div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card about-card p-4 text-center">
                    <img src="assets/img/creator-2.jpg" alt="Foto Pembuat 2" class="creator-photo mx-auto mb-3"
                         onerror="this.src='assets/img/foto-pengurus/zaky.jpg'">
                    <h4>Zaky Ahmad Alkam Mushoffa</h4>
                    <p class="text-primary fw-semibold mb-2">UI/UX Designer / Backend Developer</p>
                    <p class="text-muted">Profil singkat pembuat kedua. Jelaskan peran, kontribusi, dan tanggung jawabnya dalam proses pembuatan website HMPSIF.</p>
                    <div class="contact-item text-muted"><i class="fa-solid fa-envelope"></i> zakyakmal.2524@student.unisnu.ac.id</div>
                    <div class="contact-item text-muted"><i class="fa-brands fa-instagram"></i> zakcyyy15</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section bg-light">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5">
                <div class="eyebrow">Profil Singkat</div>
                <h2 class="section-title mt-2">Tentang pembuat website</h2>
            </div>
            <div class="col-lg-7">
                <p style="text-align: justify;">
                    Website HMPSIF dikembangkan sebagai media informasi dan komunikasi
                    untuk memperkenalkan organisasi, menyampaikan program kerja,
                    menampilkan kegiatan, serta memudahkan mahasiswa memperoleh informasi
                    mengenai Himpunan Mahasiswa Prodi Teknik Informatika.
                </p>
                <p style="text-align: justify;">
                    Dalam proses pengembangannya, pembuat website berfokus pada tampilan
                    yang responsif, navigasi yang mudah digunakan, dan penyajian informasi
                    yang terstruktur agar dapat diakses melalui berbagai perangkat.
                </p>
            </div>
        </div>
    </div>
</section>


<section class="section">
    <div class="container">
        <div class="text-center mb-5">
            <div class="eyebrow">Development Tools</div>
            <h2 class="section-title mt-2">Teknologi yang digunakan</h2>
        </div>

        <div class="row g-4">

            <!-- HTML -->
            <div class="col-md-4">
                <div class="tech-item">
                    <img src="assets/img/html.jpeg"
                         alt="Logo HTML"
                         class="mb-3"
                         style="width: 32px; height: 32px; object-fit: contain;">

                    <h5>HTML</h5>
                    <p class="text-muted mb-0">
                        Digunakan untuk menyusun struktur halaman website.
                    </p>
                </div>
            </div>

            <!-- CSS -->
            <div class="col-md-4">
                <div class="tech-item">
                    <img src="assets/img/css.jpeg"
                         alt="Logo CSS"
                         class="mb-3"
                         style="width: 32px; height: 32px; object-fit: contain;">

                    <h5>CSS</h5>
                    <p class="text-muted mb-0">
                        Digunakan untuk mengatur tampilan, warna, layout, dan responsivitas.
                    </p>
                </div>
            </div>

            <!-- Bootstrap -->
            <div class="col-md-4">
                <div class="tech-item">
                    <img src="assets/img/bootstrap.jpeg"
                         alt="Logo Bootstrap"
                         class="mb-3"
                         style="width: 32px; height: 32px; object-fit: contain;">

                    <h5>Bootstrap</h5>
                    <p class="text-muted mb-0">
                        Digunakan untuk membantu membuat desain responsif dan komponen antarmuka.
                    </p>
                </div>
            </div>

            <!-- PHP -->
            <div class="col-md-4">
                <div class="tech-item">
                    <img src="assets/img/php.jpeg"
                         alt="Logo PHP"
                         class="mb-3"
                         style="width: 32px; height: 32px; object-fit: contain;">

                    <h5>PHP</h5>
                    <p class="text-muted mb-0">
                        Digunakan untuk proses backend dan pengolahan data website.
                    </p>
                </div>
            </div>

            <!-- Database -->
            <div class="col-md-4">
                <div class="tech-item">
                    <img src="assets/img/database.jpeg"
                         alt="Logo Database"
                         class="mb-3"
                         style="width: 32px; height: 32px; object-fit: contain;">

                    <h5>Database</h5>
                    <p class="text-muted mb-0">
                        Digunakan untuk menyimpan dan mengelola data website.
                    </p>
                </div>
            </div>

            <!-- JavaScript -->
            <div class="col-md-4">
                <div class="tech-item">
                    <img src="assets/img/javascript.jpeg"
                         alt="Logo JavaScript"
                         class="mb-3"
                         style="width: 32px; height: 32px; object-fit: contain;">

                    <h5>JavaScript</h5>
                    <p class="text-muted mb-0">
                        Digunakan untuk mendukung interaksi dan fitur dinamis pada halaman.
                    </p>
                </div>
            </div>

            <!-- XAMPP -->
            <div class="col-md-4">
                <div class="tech-item">
                    <img src="assets/img/xampp.jpeg"
                         alt="Logo XAMPP"
                         class="mb-3"
                         style="width: 32px; height: 32px; object-fit: contain;">

                    <h5>XAMPP</h5>
                    <p class="text-muted mb-0">
                        Digunakan sebagai server lokal untuk menjalankan website PHP
                        dan mengelola database.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>
</section>

<section class="section bg-light">
    <div class="container">
        <div class="text-center mb-4">
            <div class="eyebrow">Get in Touch</div>
            <h2 class="section-title mt-2">Kontak Pembuat</h2>
            <p class="text-muted">Hubungi pembuat website melalui informasi berikut.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card about-card p-4">
                    <p class="contact-item mb-3"><i class="fa-solid fa-envelope text-primary"></i> nauvalhibrizi.2524@unisnu.ac.id</p>
                    <p class="contact-item mb-3"><i class="fa-brands fa-instagram text-primary"></i> nauvalhakim23</p>
                    <p class="contact-item mb-0"><i class="fa-brands fa-github text-primary"></i> nauvalhibrizi23</p>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-5"><h5 class="text-white">HMPSIF</h5><p>Himpunan Mahasiswa Prodi Teknik Informatika</p><p class="mb-0">“Berorganisasi, Berkarya, dan Berkontribusi.”</p></div>
            <div class="col"><h6 class="text-white">Navigasi</h6><a class="footer-link d-block" href="tentang.php">Tentang Kami</a><a class="footer-link d-block" href="program.php">Program Kerja</a><a class="footer-link d-block" href="berita.php">Berita</a></div>
            <div class="col"><h6 class="text-white">Kontak</h6><p class="mb-1">hmpsif@unisnu.ac.id</p><p>+62 882-0075-6878</p></div>
        </div>
        <hr>
        <small>© <span id="year"></span> HMPSIF. All rights reserved.</small>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>
