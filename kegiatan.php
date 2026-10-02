<?php
require "includes.php";
$q = trim((string)($_GET["q"] ?? ""));
$statement = $pdo->prepare("SELECT * FROM kegiatan WHERE nama LIKE ? OR deskripsi LIKE ? ORDER BY tanggal DESC, id DESC");
$statement->execute(["%{$q}%", "%{$q}%"]);
$activities = $statement->fetchAll();
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kegiatan | HMPSIF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style_modern.css" rel="stylesheet">
</head>
<body>
<?php include "navbar.php"; ?>
<main class="section">
    <div class="container">
        <header class="page-intro">
            <div class="eyebrow">Aktivitas mahasiswa</div>
            <h1 class="section-title">Belajar tak hanya di kelas.</h1>
            <p>Intip kegiatan yang mempertemukan ide, pengalaman, dan kebersamaan di lingkungan HMPSIF.</p>
        </header>

        <form class="filter-panel" method="get" role="search" aria-label="Cari kegiatan">
            <label class="form-label visually-hidden" for="activitySearch">Cari kegiatan</label>
            <div class="input-group">
                <input id="activitySearch" name="q" value="<?= e($q) ?>" class="form-control" placeholder="Cari kegiatan...">
                <button class="btn btn-primary px-4" type="submit">Cari</button>
            </div>
        </form>

        <?php if ($activities): ?>
            <div class="row g-4">
                <?php foreach ($activities as $activity): ?>
                    <div class="col-md-6 col-lg-4">
                        <article class="card card-modern overflow-hidden">
                            <img src="<?= e($activity["poster"] ?: "assets/img/placeholder.svg") ?>" class="program-img" alt="Dokumentasi <?= e($activity["nama"]) ?>" loading="lazy" onerror="this.onerror=null;this.src='assets/img/placeholder.svg'">
                            <div class="card-body p-4">
                                <div class="card-meta mb-2"><time datetime="<?= e($activity["tanggal"]) ?>"><?= e(formatTanggalId($activity["tanggal"])) ?></time><span aria-hidden="true">·</span><span><?= e($activity["lokasi"] ?: "Lokasi menyusul") ?></span></div>
                                <h2 class="h5 fw-bold mt-2"><?= e($activity["nama"]) ?></h2>
                                <p class="text-muted"><?= e($activity["deskripsi"]) ?></p>
                                <span class="badge-soft"><?= e($activity["status"] ?: "Kegiatan") ?></span>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="empty-state">
                <h2 class="h5 fw-bold">Kegiatan belum ditemukan</h2>
                <p class="mb-3"><?= $q !== "" ? "Coba kata kunci lain untuk mencari kegiatan." : "Dokumentasi kegiatan HMPSIF akan tampil di sini." ?></p>
                <?php if ($q !== ""): ?><a class="btn btn-outline-primary" href="kegiatan.php">Hapus pencarian</a><?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</main>
<?php include "footer.php"; ?>
</body>
</html>
