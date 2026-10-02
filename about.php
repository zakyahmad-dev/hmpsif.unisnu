<?php require "includes.php"; ?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tentang Pembuat | HMPSIF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style_modern.css" rel="stylesheet">
</head>
<body>
<?php include "navbar.php"; ?>

<header class="about-hero">
    <div class="container text-center">
        <div class="eyebrow">Di balik layar</div>
        <h1 class="section-title">Dibangun dengan kolaborasi.</h1>
        <p class="section-subtitle mx-auto mb-0">Website HMPSIF menjadi ruang informasi dan komunikasi untuk mahasiswa Informatika UNISNU Jepara.</p>
    </div>
</header>

<main>
    <section class="section">
        <div class="container">
            <div class="text-center mb-5">
                <div class="eyebrow">Tim pengembang</div>
                <h2 class="section-title">Kenalan dengan pembuatnya.</h2>
                <p class="section-subtitle mx-auto mb-0">Dua anggota HMPSIF yang berkolaborasi merancang dan mengembangkan website ini.</p>
            </div>
            <div class="row justify-content-center g-4">
                <div class="col-md-6 col-lg-5">
                    <article class="about-card">
                        <img src="assets/img/foto-pengurus/nauval.JPG" alt="Nauval Hibrizi Hakim" class="creator-photo" loading="lazy">
                        <h3 class="h5 fw-bold mb-1">Nauval Hibrizi Hakim</h3>
                        <p class="text-primary fw-semibold mb-3">Web &amp; Frontend Developer</p>
                        <p class="text-muted mb-4">Berkontribusi pada pengembangan antarmuka dan pengalaman pengguna website HMPSIF.</p>
                        <a class="card-link justify-content-center" href="mailto:nauvalhibrizi.2524@student.unisnu.ac.id">Hubungi via email <span aria-hidden="true">→</span></a>
                    </article>
                </div>
                <div class="col-md-6 col-lg-5">
                    <article class="about-card">
                        <img src="assets/img/foto-pengurus/zaky.JPG" alt="Zaky Ahmad Alkam Mushoffa" class="creator-photo" loading="lazy">
                        <h3 class="h5 fw-bold mb-1">Zaky Ahmad Alkam Mushoffa</h3>
                        <p class="text-primary fw-semibold mb-3">UI/UX &amp; Backend Developer</p>
                        <p class="text-muted mb-4">Berkontribusi pada perancangan alur website, pengelolaan data, dan pengembangan sisi backend.</p>
                        <a class="card-link justify-content-center" href="mailto:zakyakmal.2524@student.unisnu.ac.id">Hubungi via email <span aria-hidden="true">→</span></a>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-light">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5">
                    <div class="eyebrow">Tujuan website</div>
                    <h2 class="section-title">Informasi organisasi, lebih dekat dan mudah diakses.</h2>
                </div>
                <div class="col-lg-7">
                    <p class="section-subtitle mb-3">Website ini dikembangkan untuk memperkenalkan organisasi, menyampaikan program kerja, menampilkan kegiatan, serta memudahkan mahasiswa memperoleh informasi tentang HMPSIF.</p>
                    <p class="section-subtitle mb-0">Kami berupaya menjaga navigasi tetap sederhana, tampilan nyaman di berbagai ukuran layar, dan informasi tersusun agar mudah ditemukan.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="text-center mb-5">
                <div class="eyebrow">Teknologi</div>
                <h2 class="section-title">Dibuat dengan teknologi web.</h2>
            </div>
            <div class="row g-3">
                <?php foreach ([
                    ["HTML", "Struktur konten halaman"],
                    ["CSS", "Sistem visual dan layout responsif"],
                    ["JS", "Interaksi pada antarmuka"],
                    ["PHP", "Pemrosesan halaman dan data"],
                    ["SQL", "Penyimpanan informasi website"],
                    ["UI", "Rancangan yang mudah digunakan"],
                ] as $technology): ?>
                    <div class="col-6 col-md-4">
                        <div class="tech-item">
                            <span class="tech-mark" aria-hidden="true"><?= e($technology[0]) ?></span>
                            <h3 class="h6 fw-bold"><?= e($technology[0]) ?></h3>
                            <p class="text-muted small mb-0"><?= e($technology[1]) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<?php include "footer.php"; ?>
</body>
</html>
