<?php
require "includes.php";
$articles = $pdo->query("SELECT * FROM berita ORDER BY tanggal DESC, id DESC")->fetchAll();
$articleImages = ["assets/img/pkkmb.jpeg", "assets/img/semnas.jpeg", "assets/img/workshop.jpeg"];
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Berita | HMPSIF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style_modern.css" rel="stylesheet">
</head>
<body>
<?php include "navbar.php"; ?>
<main class="section">
    <div class="container">
        <header class="page-intro">
            <div class="eyebrow">Kabar dari kami</div>
            <h1 class="section-title">Cerita terbaru HMPSIF.</h1>
            <p>Ikuti informasi, kabar kegiatan, dan hal-hal menarik dari keluarga besar mahasiswa Informatika.</p>
        </header>

        <?php if ($articles): ?>
            <div class="row g-4">
                <?php foreach ($articles as $index => $article): ?>
                    <?php $fallback = $articleImages[$index % count($articleImages)]; ?>
                    <div class="col-md-6 col-lg-4">
                        <article class="card card-modern overflow-hidden">
                            <img src="<?= e($article["thumbnail"] ?: $fallback) ?>" class="news-img" alt="Dokumentasi <?= e($article["judul"]) ?>" loading="lazy" onerror="this.onerror=null;this.src='<?= e($fallback) ?>'">
                            <div class="card-body p-4">
                                <div class="card-meta"><span class="text-primary fw-semibold"><?= e($article["kategori"] ?: "Kabar") ?></span><span aria-hidden="true">·</span><time datetime="<?= e($article["tanggal"]) ?>"><?= e(formatTanggalId($article["tanggal"])) ?></time></div>
                                <h2 class="h5 fw-bold mt-3"><?= e($article["judul"]) ?></h2>
                                <p class="text-muted"><?= e($article["ringkasan"]) ?></p>
                                <?php if (!empty($article["penulis"])): ?><small class="text-muted">Oleh <?= e($article["penulis"]) ?></small><?php endif; ?>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="empty-state">
                <h2 class="h5 fw-bold">Belum ada berita</h2>
                <p class="mb-0">Kabar dan cerita dari HMPSIF akan hadir di halaman ini.</p>
            </div>
        <?php endif; ?>
    </div>
</main>
<?php include "footer.php"; ?>
</body>
</html>
