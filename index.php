<?php
require "includes.php";

$counts = [];
foreach (["anggota", "program_kerja", "kegiatan"] as $table) {
    $counts[$table] = (int)$pdo->query("SELECT COUNT(*) FROM {$table}")->fetchColumn();
}
$counts["divisi"] = (int)$pdo->query("SELECT COUNT(DISTINCT divisi) FROM pengurus WHERE TRIM(COALESCE(divisi, '')) <> ''")->fetchColumn();

$programs = $pdo->query("SELECT * FROM program_kerja ORDER BY tahun DESC, id DESC LIMIT 3")->fetchAll();
$events = $pdo->query("SELECT * FROM kegiatan WHERE tanggal >= CURRENT_DATE ORDER BY tanggal ASC, id DESC LIMIT 3")->fetchAll();
$news = $pdo->query("SELECT * FROM berita ORDER BY tanggal DESC, id DESC LIMIT 3")->fetchAll();

$programImages = ["assets/img/workshop.jpeg", "assets/img/semnas.jpeg", "assets/img/makrab1.jpeg"];
$newsImages = ["assets/img/pkkmb.jpeg", "assets/img/baksos.jpeg", "assets/img/semnas.jpeg"];
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#ffffff">
    <meta name="description" content="HMPSIF UNISNU Jepara — ruang kolaborasi mahasiswa Informatika untuk belajar, berkarya, dan memberi dampak.">
    <title>HMPSIF — Tumbuh Bersama, Berdampak Nyata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style_modern.css" rel="stylesheet">
</head>
<body>
<?php include "navbar.php"; ?>

<main>
    <header class="home-hero">
        <div class="container">
            <div class="row align-items-center g-4 g-lg-5">
                <div class="col-lg-6">
                    <div class="hero-copy">
                        <div class="hero-kicker"><span class="hero-kicker-dot" aria-hidden="true"></span> Himpunan Mahasiswa Informatika · UNISNU Jepara</div>
                        <h1>Belajar bareng.<br><span>Berkarya lebih luas.</span></h1>
                        <p class="lead">Ruang kolaborasi mahasiswa Informatika untuk mengasah kemampuan, menemukan teman seperjalanan, dan menghadirkan karya yang bermanfaat.</p>
                        <div class="hero-actions">
                            <a class="btn btn-primary" href="tentang.php">Kenali HMPSIF <span aria-hidden="true">→</span></a>
                            <a class="btn btn-outline-dark" href="program.php">Jelajahi program</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-visual">
                        <div class="hero-note hero-note-top">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 3.5 14.7 9l6.1.9-4.4 4.3 1 6.1-5.4-2.9-5.4 2.9 1-6.1-4.4-4.3L9.3 9 12 3.5Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/></svg>
                            Belajar · Berkarya · Berdampak
                        </div>
                        <div class="hero-photo-frame">
                            <img class="hero-photo" src="assets/img/semnas.jpeg" alt="Kebersamaan mahasiswa HMPSIF dalam kegiatan seminar nasional" fetchpriority="high">
                            <div class="hero-photo-caption">
                                <small>Satu himpunan, banyak cerita</small>
                                <strong>Tumbuh bersama komunitas Informatika</strong>
                            </div>
                        </div>
                        <div class="hero-note hero-note-bottom">
                            <span class="note-mark" aria-hidden="true">IF</span>
                            <span>Komunitas mahasiswa<br>Informatika UNISNU</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="focus-strip" aria-label="Fokus HMPSIF">
        <div class="container">
            <div class="focus-grid">
                <div class="focus-intro">
                    <small>Ruang bertumbuh</small>
                    <strong>Semua berawal dari kolaborasi.</strong>
                </div>
                <div class="focus-item">
                    <span class="focus-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2Z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </span>
                    <span><strong>Terus belajar</strong><small>Tambah wawasan, asah kompetensi.</small></span>
                </div>
                <div class="focus-item">
                    <span class="focus-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none"><path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2m16 0v-2a4 4 0 0 0-3-3.87M14 3.13a4 4 0 0 1 0 7.75M14 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </span>
                    <span><strong>Saling terhubung</strong><small>Bangun relasi lintas angkatan.</small></span>
                </div>
                <div class="focus-item">
                    <span class="focus-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none"><path d="M12 3v18m0-18 7 4-7 4m0 2-7 4 7 4m0-8 7 4-7 4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </span>
                    <span><strong>Berani berdampak</strong><small>Wujudkan ide untuk sekitar.</small></span>
                </div>
            </div>
        </div>
    </section>

    <section class="home-section">
        <div class="container">
            <div class="section-heading-row">
                <div>
                    <div class="eyebrow">Tentang kami</div>
                    <h2 class="section-title">Bukan sekadar organisasi.</h2>
                </div>
                <p class="section-heading-copy">HMPSIF adalah rumah untuk mahasiswa Informatika bertemu, belajar, dan bekerja sama lewat kegiatan yang dekat dengan dunia kampus maupun masyarakat.</p>
            </div>
            <div class="metric-row" aria-label="Ringkasan data HMPSIF">
                <div class="metric"><strong><?= number_format($counts["anggota"], 0, ",", ".") ?></strong><span>Anggota terdata</span></div>
                <div class="metric"><strong><?= number_format($counts["divisi"], 0, ",", ".") ?></strong><span>Divisi kepengurusan</span></div>
                <div class="metric"><strong><?= number_format($counts["program_kerja"], 0, ",", ".") ?></strong><span>Program kerja</span></div>
                <div class="metric"><strong><?= number_format($counts["kegiatan"], 0, ",", ".") ?></strong><span>Kegiatan tercatat</span></div>
            </div>
        </div>
    </section>

    <section class="home-section" style="background: var(--surface-soft);">
        <div class="container">
            <div class="section-heading-row">
                <div>
                    <div class="eyebrow">Dari ide jadi aksi</div>
                    <h2 class="section-title">Program yang menggerakkan.</h2>
                </div>
                <a class="card-link" href="program.php">Lihat semua program <span aria-hidden="true">→</span></a>
            </div>

            <?php if ($programs): ?>
                <div class="row g-4">
                    <?php foreach ($programs as $index => $program): ?>
                        <?php $fallback = $programImages[$index % count($programImages)]; ?>
                        <div class="col-md-6 col-lg-4">
                            <article class="program-card">
                                <img class="program-card-image" src="<?= e($program["banner"] ?: $fallback) ?>" alt="Dokumentasi <?= e($program["nama"]) ?>" loading="lazy" onerror="this.onerror=null;this.src='<?= e($fallback) ?>'">
                                <div class="program-card-body">
                                    <div class="d-flex align-items-center justify-content-between gap-2">
                                        <span class="badge-soft"><?= e($program["status"] ?: "Program") ?></span>
                                        <?php if (!empty($program["tahun"])): ?><span class="card-meta"><?= e($program["tahun"]) ?></span><?php endif; ?>
                                    </div>
                                    <h3><?= e($program["nama"]) ?></h3>
                                    <p><?= e($program["deskripsi"]) ?></p>
                                    <a class="card-link" href="detail-program.php?id=<?= (int)$program["id"] ?>">Kenali program <span aria-hidden="true">→</span></a>
                                </div>
                            </article>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="empty-state">Program kerja terbaru sedang disiapkan. <a href="kontak.php">Tanya kami</a> untuk mengenal kegiatan HMPSIF.</div>
            <?php endif; ?>
        </div>
    </section>

    <section class="home-section agenda-section">
        <div class="container">
            <div class="row g-5 align-items-start">
                <div class="col-lg-4">
                    <div class="eyebrow">Catat tanggalnya</div>
                    <h2 class="section-title">Selalu ada hal baru untuk diikuti.</h2>
                    <p class="section-subtitle">Cari tahu agenda dan kegiatan mahasiswa Informatika yang akan datang.</p>
                    <a class="card-link mt-2" href="kegiatan.php">Semua kegiatan <span aria-hidden="true">→</span></a>
                </div>
                <div class="col-lg-8">
                    <?php if ($events): ?>
                        <div class="agenda-list">
                            <?php foreach ($events as $event): ?>
                                <?php
                                $eventTimestamp = strtotime((string)$event["tanggal"]);
                                $eventDate = $eventTimestamp ? explode(" ", formatTanggalId($event["tanggal"])) : ["—", ""];
                                ?>
                                <a class="agenda-item text-decoration-none" href="kegiatan.php">
                                    <span class="agenda-date"><span><?= e($eventDate[1] ?? "") ?></span><strong><?= e($eventDate[0] ?? "—") ?></strong></span>
                                    <div class="agenda-copy">
                                        <h3><?= e($event["nama"]) ?></h3>
                                        <p><?= e($event["lokasi"] ?: "Informasi lokasi menyusul") ?><?php if (!empty($event["status"])): ?> · <?= e($event["status"]) ?><?php endif; ?></p>
                                    </div>
                                    <span class="agenda-arrow" aria-hidden="true">→</span>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <div class="empty-state">Belum ada agenda yang dipublikasikan. Cek kembali nanti untuk kabar terbaru.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="home-section">
        <div class="container">
            <div class="section-heading-row">
                <div>
                    <div class="eyebrow">Cerita HMPSIF</div>
                    <h2 class="section-title">Kabar dan inspirasi terbaru.</h2>
                </div>
                <a class="card-link" href="berita.php">Baca semua berita <span aria-hidden="true">→</span></a>
            </div>
            <?php if ($news): ?>
                <div class="row g-4">
                    <?php foreach ($news as $index => $item): ?>
                        <?php $fallback = $newsImages[$index % count($newsImages)]; ?>
                        <div class="col-md-6 col-lg-4">
                            <article class="news-card">
                                <img class="news-card-image" src="<?= e($item["thumbnail"] ?: $fallback) ?>" alt="Dokumentasi berita <?= e($item["judul"]) ?>" loading="lazy" onerror="this.onerror=null;this.src='<?= e($fallback) ?>'">
                                <div class="news-card-body">
                                    <div class="card-meta"><span><?= e($item["kategori"] ?: "Kabar") ?></span><span aria-hidden="true">·</span><time datetime="<?= e($item["tanggal"]) ?>"><?= e(formatTanggalId($item["tanggal"])) ?></time></div>
                                    <h3><?= e($item["judul"]) ?></h3>
                                    <p><?= e($item["ringkasan"]) ?></p>
                                    <a class="card-link" href="berita.php">Baca selengkapnya <span aria-hidden="true">→</span></a>
                                </div>
                            </article>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="empty-state">Belum ada kabar baru. Cerita kegiatan HMPSIF akan tampil di sini.</div>
            <?php endif; ?>
        </div>
    </section>

    <section class="home-section pt-0">
        <div class="container">
            <div class="cta-band">
                <div class="row align-items-center g-4 position-relative" style="z-index: 1;">
                    <div class="col-lg-8">
                        <div class="eyebrow" style="color: #ff9aa3;">Langkah berikutnya dimulai dari kamu</div>
                        <h2>Punya ide dan semangat untuk berkembang?</h2>
                        <p>Temukan orang-orang yang siap belajar dan berproses bareng kamu di HMPSIF.</p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="btn btn-primary rounded-pill" href="gabung.php">Gabung bersama kami <span aria-hidden="true">→</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include "footer.php"; ?>
</body>
</html>
