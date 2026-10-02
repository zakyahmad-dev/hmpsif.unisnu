<?php
require "includes.php";
$photos = $pdo->query("SELECT * FROM galeri ORDER BY tahun DESC, id DESC")->fetchAll();
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Galeri | HMPSIF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style_modern.css" rel="stylesheet">
</head>
<body>
<?php include "navbar.php"; ?>
<main class="section">
    <div class="container">
        <header class="page-intro">
            <div class="eyebrow">Potongan cerita</div>
            <h1 class="section-title">Momen bersama HMPSIF.</h1>
            <p>Dokumentasi kegiatan dan kebersamaan mahasiswa Informatika. Pilih foto untuk melihatnya lebih dekat.</p>
        </header>

        <?php if ($photos): ?>
            <div class="row g-3">
                <?php foreach ($photos as $photo): ?>
                    <div class="col-6 col-lg-4">
                        <figure class="gallery-figure m-0 h-100">
                            <a class="gallery-tile" href="<?= e($photo["foto"]) ?>" data-bs-toggle="modal" data-bs-target="#galleryLightbox" data-gallery-image data-caption="<?= e($photo["judul"] ?: $photo["kegiatan"]) ?>">
                                <img src="<?= e($photo["foto"]) ?>" class="gallery-img" alt="<?= e($photo["judul"] ?: $photo["kegiatan"]) ?>" loading="lazy" onerror="this.onerror=null;this.src='assets/img/placeholder.svg'">
                            </a>
                            <figcaption><?= e($photo["judul"] ?: $photo["kegiatan"]) ?><?php if (!empty($photo["tahun"])): ?> · <?= e($photo["tahun"]) ?><?php endif; ?></figcaption>
                        </figure>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="empty-state">
                <h2 class="h5 fw-bold">Galeri sedang disiapkan</h2>
                <p class="mb-0">Dokumentasi kegiatan HMPSIF akan muncul di sini.</p>
            </div>
        <?php endif; ?>
    </div>
</main>

<div class="modal fade" id="galleryLightbox" tabindex="-1" aria-labelledby="galleryLightboxTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header border-0">
                <h2 class="modal-title fs-6" id="galleryLightboxTitle">Galeri HMPSIF</h2>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body pt-0">
                <img id="lightboxImg" class="w-100 rounded-3" src="" alt="">
                <p id="lightboxCaption" class="text-white-50 mt-3 mb-0"></p>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
</body>
</html>
