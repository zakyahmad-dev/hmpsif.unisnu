<?php require "includes.php"; ?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>HMPSIF | Himpunan Mahasiswa Prodi Teknik Informatika</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <link href="<?= url("assets/css/style_modern.css") ?>" rel="stylesheet">
</head>
<body>

<?php include "navbar.php"; ?>

<header class="hero position-relative">
    <div class="hero-shape">
        <img src="<?= url("assets/img/logo1.png") ?>" alt="Logo HMPSIF">
    </div>
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-lg-8 fade-up">
                <div class="eyebrow mb-3">Himpunan Mahasiswa Prodi Teknik Informatika</div>
                <h1>Bersama HMPSIF, Berkarya, Berinovasi, dan Berdampak.</h1>
                <p class="lead text-secondary mt-4">
                    Ruang kolaborasi mahasiswa Teknik Informatika untuk bertumbuh, membangun kompetensi,
                    dan menghadirkan karya yang bermanfaat bagi kampus serta masyarakat.
                </p>
                <div class="d-flex gap-2 flex-wrap mt-4">
                    <a class="btn btn-primary btn-lg rounded-pill px-4" href="<?= url("tentang.php") ?>">
                        Kenal Kami <i class="fa-solid fa-arrow-right ms-2"></i>
                    </a>
                    <a class="btn btn-outline-dark btn-lg rounded-pill px-4" href="<?= url("gabung.php") ?>">
                        Gabung Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="section">
    <div class="container">
        <div class="row g-4">
            <?php foreach ([["45+", "Anggota"], ["6", "Program Kerja"], ["3", "Agenda"], ["2014", "Tahun Berdiri"]] as $s): ?>
                <div class="col-6 col-lg-3">
                    <div class="stat text-center fade-up">
                        <h3><?= e($s[0]) ?></h3>
                        <p class="mb-0 text-muted"><?= e($s[1]) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section bg-light">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5">
                <div class="eyebrow">Sambutan Ketua</div>
                <h2 class="section-title mt-2">Tempat untuk bertumbuh bersama.</h2>
            </div>
            <div class="col-lg-7">
                <p style="text-align: justify;">
                    &ldquo;Melalui website ini, kami berupaya menghadirkan informasi mengenai berbagai kegiatan,
                    program kerja, prestasi serta informasi lainnya yang berkaitan dengan HMPSIF. Kami berharap
                    website ini dapat menjadi sarana komunikasi dan informasi yang terbuka, mudah diakses, serta
                    memberikan manfaat bagi seluruh mahasiswa.
                </p>
                <p style="text-align: justify;">
                    Mari bersama-sama menjadikan HMPSIF sebagai rumah untuk bertumbuh, tempat untuk belajar, dan
                    ruang untuk menciptakan karya. Karena setiap proses, sekecil apapun, akan menjadi bagian dari
                    perjalanan kita dalam membangun masa depan yang lebih baik.&rdquo;
                </p>
                <strong class="text-muted">Sintia Nur Mala Dewi</strong>
                <div class="text-muted">Ketua HMPSIF Periode 2026/2027</div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <div class="eyebrow">Unggulan</div>
                <h2 class="section-title">Program Kerja</h2>
            </div>
            <a href="<?= url("program.php") ?>">Lihat semua &rarr;</a>
        </div>
        <div class="row g-4">
            <?php
            $programs = $pdo->query("SELECT * FROM program_kerja ORDER BY id DESC LIMIT 3")->fetchAll();

            if (!$programs): ?>
                <div class="col-12">
                    <div class="alert alert-info mb-0">Belum ada program kerja yang ditampilkan.</div>
                </div>
            <?php endif; ?>

            <?php foreach ($programs as $p): ?>
                <div class="col-md-4">
                    <div class="card card-modern overflow-hidden">
                        <img class="program-img"
                             src="<?= e(asset_url($p["banner"])) ?>"
                             alt="<?= e($p["nama"]) ?>">
                        <div class="card-body p-4">
                            <span class="badge badge-soft"><?= e($p["status"]) ?></span>
                            <h5 class="mt-3"><?= e($p["nama"]) ?></h5>
                            <p class="text-muted"><?= e($p["deskripsi"]) ?></p>
                            <a href="<?= url("detail-program.php?id=" . (int) $p["id"]) ?>"
                               class="btn btn-sm btn-outline-primary rounded-pill">Detail</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section bg-light">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-lg-7">
                <div class="eyebrow">Mari berkontribusi</div>
                <h2 class="section-title">Punya ide? Bangun bersama HMPSIF.</h2>
                <p class="text-muted">
                    Bergabung dalam lingkungan organisasi yang mendorong kolaborasi, kompetensi, dan kontribusi nyata.
                </p>
            </div>
            <div class="col-lg-5 text-lg-end">
                <a class="btn btn-primary btn-lg rounded-pill" href="<?= url("gabung.php") ?>">Daftar Sekarang</a>
            </div>
        </div>
    </div>
</section>

<?php include "footer.php"; ?>

</body>
</html>
