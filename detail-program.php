<?php
require "includes.php";
$id = (int)($_GET["id"] ?? 0);
$statement = $pdo->prepare("SELECT * FROM program_kerja WHERE id = ?");
$statement->execute([$id]);
$program = $statement->fetch();
if (!$program) {
    http_response_code(404);
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $program ? e($program["nama"]) . " | HMPSIF" : "Program tidak ditemukan | HMPSIF" ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style_modern.css" rel="stylesheet">
</head>
<body>
<?php include "navbar.php"; ?>
<main class="section">
    <div class="container">
        <?php if (!$program): ?>
            <div class="empty-state py-5">
                <div class="eyebrow">404 · Tidak ditemukan</div>
                <h1 class="section-title">Program ini belum tersedia.</h1>
                <p>Program kerja yang kamu cari mungkin sudah dipindahkan atau belum dipublikasikan.</p>
                <a class="btn btn-primary" href="program.php">Kembali ke program kerja</a>
            </div>
        <?php else: ?>
            <a class="card-link mb-4" href="program.php"><span aria-hidden="true">←</span> Kembali ke program kerja</a>
            <img src="<?= e($program["banner"] ?: "assets/img/placeholder.svg") ?>" class="detail-banner w-100 rounded-4 mb-4" alt="Dokumentasi <?= e($program["nama"]) ?>" onerror="this.onerror=null;this.src='assets/img/placeholder.svg'">
            <div class="row g-4 align-items-start">
                <div class="col-lg-8">
                    <span class="badge-soft"><?= e($program["status"] ?: "Program kerja") ?></span>
                    <h1 class="section-title mt-3"><?= e($program["nama"]) ?></h1>
                    <p class="lead text-muted"><?= e($program["deskripsi"]) ?></p>
                    <article class="card card-modern p-4 p-lg-5 mt-4">
                        <h2 class="h4 fw-bold">Tentang program</h2>
                        <div class="text-muted mb-0"><?= nl2br(e($program["detail"] ?: $program["deskripsi"])) ?></div>
                    </article>
                </div>
                <aside class="col-lg-4">
                    <div class="card card-modern p-4">
                        <h2 class="h5 fw-bold mb-3">Informasi program</h2>
                        <dl class="detail-list mb-4">
                            <div><dt>Divisi</dt><dd><?= e($program["divisi"] ?: "—") ?></dd></div>
                            <div><dt>Tahun</dt><dd><?= e($program["tahun"] ?: "—") ?></dd></div>
                            <div><dt>Waktu</dt><dd><?= e($program["waktu"] ?: "Informasi menyusul") ?></dd></div>
                            <div><dt>Tempat</dt><dd><?= e($program["tempat"] ?: "Informasi menyusul") ?></dd></div>
                        </dl>
                        <a href="gabung.php" class="btn btn-primary w-100">Gabung dengan HMPSIF <span aria-hidden="true">→</span></a>
                    </div>
                </aside>
            </div>
        <?php endif; ?>
    </div>
</main>
<?php include "footer.php"; ?>
</body>
</html>
