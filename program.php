<?php
require "includes.php";
$q = trim((string)($_GET["q"] ?? ""));
$div = trim((string)($_GET["divisi"] ?? ""));
$status = trim((string)($_GET["status"] ?? ""));

$sql = "SELECT * FROM program_kerja WHERE 1=1";
$params = [];
if ($q !== "") {
    $sql .= " AND (nama LIKE ? OR deskripsi LIKE ?)";
    $params[] = "%{$q}%";
    $params[] = "%{$q}%";
}
if ($div !== "") {
    $sql .= " AND divisi = ?";
    $params[] = $div;
}
if ($status !== "") {
    $sql .= " AND status = ?";
    $params[] = $status;
}
$sql .= " ORDER BY tahun DESC, id DESC";
$statement = $pdo->prepare($sql);
$statement->execute($params);
$programs = $statement->fetchAll();
$divisions = $pdo->query("SELECT DISTINCT divisi FROM program_kerja WHERE TRIM(COALESCE(divisi, '')) <> '' ORDER BY divisi")->fetchAll(PDO::FETCH_COLUMN);
$statuses = $pdo->query("SELECT DISTINCT status FROM program_kerja WHERE TRIM(COALESCE(status, '')) <> '' ORDER BY status")->fetchAll(PDO::FETCH_COLUMN);
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Program Kerja | HMPSIF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style_modern.css" rel="stylesheet">
</head>
<body>
<?php include "navbar.php"; ?>
<main class="section">
    <div class="container">
        <header class="page-intro">
            <div class="eyebrow">Rencana dan karya</div>
            <h1 class="section-title">Program kerja HMPSIF.</h1>
            <p>Kenali inisiatif yang kami jalankan untuk mengembangkan kompetensi, mempererat kebersamaan, dan memberi manfaat.</p>
        </header>

        <form class="filter-panel" method="get" role="search" aria-label="Cari program kerja">
            <div class="row g-2 align-items-end">
                <div class="col-12 col-md-5">
                    <label class="form-label visually-hidden" for="programSearch">Cari program</label>
                    <input id="programSearch" name="q" class="form-control" placeholder="Cari program atau kata kunci..." value="<?= e($q) ?>">
                </div>
                <div class="col-6 col-md-3">
                    <label class="form-label visually-hidden" for="programDivision">Pilih divisi</label>
                    <select id="programDivision" name="divisi" class="form-select">
                        <option value="">Semua divisi</option>
                        <?php foreach ($divisions as $division): ?>
                            <option value="<?= e($division) ?>" <?= $div === $division ? "selected" : "" ?>><?= e($division) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-6 col-md-3">
                    <label class="form-label visually-hidden" for="programStatus">Pilih status</label>
                    <select id="programStatus" name="status" class="form-select">
                        <option value="">Semua status</option>
                        <?php foreach ($statuses as $programStatus): ?>
                            <option value="<?= e($programStatus) ?>" <?= $status === $programStatus ? "selected" : "" ?>><?= e($programStatus) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-12 col-md-1">
                    <button class="btn btn-primary w-100" type="submit">Cari</button>
                </div>
            </div>
        </form>

        <?php if ($programs): ?>
            <div class="row g-4">
                <?php foreach ($programs as $program): ?>
                    <div class="col-md-6 col-lg-4">
                        <article class="card card-modern overflow-hidden">
                            <img class="program-img" src="<?= e($program["banner"] ?: "assets/img/placeholder.svg") ?>" alt="Dokumentasi <?= e($program["nama"]) ?>" loading="lazy" onerror="this.onerror=null;this.src='assets/img/placeholder.svg'">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center justify-content-between gap-2">
                                    <span class="badge-soft"><?= e($program["status"] ?: "Program") ?></span>
                                    <?php if (!empty($program["tahun"])): ?><span class="card-meta"><?= e($program["tahun"]) ?></span><?php endif; ?>
                                </div>
                                <h2 class="h5 fw-bold mt-3"><?= e($program["nama"]) ?></h2>
                                <p class="text-muted"><?= e($program["deskripsi"]) ?></p>
                                <div class="card-meta mb-3"><span><?= e($program["divisi"]) ?></span></div>
                                <a class="btn btn-outline-primary" href="detail-program.php?id=<?= (int)$program["id"] ?>">Lihat detail <span aria-hidden="true">→</span></a>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="empty-state">
                <h2 class="h5 fw-bold">Program belum ditemukan</h2>
                <p class="mb-3">Coba ubah kata kunci atau pilihan filter.</p>
                <?php if ($q !== "" || $div !== "" || $status !== ""): ?><a class="btn btn-outline-primary" href="program.php">Hapus filter</a><?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</main>
<?php include "footer.php"; ?>
</body>
</html>
