<?php
require "includes.php";

/*
 * Ambil seluruh data pengurus.
 * Urutan divisi ditentukan di PHP agar mudah dikembangkan.
 */
$rows = $pdo->query("
    SELECT *
    FROM pengurus
    ORDER BY id
")->fetchAll();

/*
 * Urutan divisi utama.
 * Jika ada divisi baru di database, otomatis masuk ke bagian "Divisi Lainnya".
 */
$urutanDivisi = [
    'BPH',
    'INTERNAL',
    'EKSTERNAL',
    'KOMINFO'
];

/*
 * Kelompokkan pengurus berdasarkan divisi.
 */
$kelompok = [];

foreach ($rows as $r) {
    $divisi = trim((string)($r['divisi'] ?? ''));

    if ($divisi === '') {
        $divisi = 'LAINNYA';
    }

    $key = strtoupper($divisi);

    if (!isset($kelompok[$key])) {
        $kelompok[$key] = [];
    }

    $kelompok[$key][] = $r;
}

/*
 * Urutan struktur dari kiri ke kanan:
 * Ketua Himpunan -> Wakil Ketua -> Sekretaris -> Bendahara
 * -> Ketua Divisi -> KOOR -> jabatan lainnya.
 */
$urutanJabatan = [
    'KETUA'          => 1,
    'KETUA HIMPUNAN' => 1,
    'SEKRETARIS I'     => 1,
    'BENDAHARA I'      => 1,
    'SEKRETARIS II'    => 1,
    'BENDAHARA II'     => 1,
    'KETUA DIVISI'   => 1,
    'CO'           => 2,
];

$urutanDivisi = [
    'BPH'       => 1,
    'INTERNAL'  => 2,
    'EKSTERNAL' => 3,
    'KOMINFO'   => 4
];

/*
 * Gabungkan seluruh anggota terlebih dahulu supaya
 * urutan struktur benar-benar dimulai dari kiri.
 */
$semuaAnggota = [];

foreach ($kelompok as $anggotaDivisi) {
    foreach ($anggotaDivisi as $anggota) {
        $semuaAnggota[] = $anggota;
    }
}

usort($semuaAnggota, function ($a, $b) use ($urutanJabatan, $urutanDivisi) {
    $jabatanA = strtoupper(trim((string)($a['jabatan'] ?? '')));
    $jabatanB = strtoupper(trim((string)($b['jabatan'] ?? '')));

    $divisiA = strtoupper(trim((string)($a['divisi'] ?? '')));
    $divisiB = strtoupper(trim((string)($b['divisi'] ?? '')));

    $ja = $urutanJabatan[$jabatanA] ?? 99;
    $jb = $urutanJabatan[$jabatanB] ?? 99;

    if ($ja !== $jb) {
        return $ja <=> $jb;
    }

    $da = $urutanDivisi[$divisiA] ?? 99;
    $db = $urutanDivisi[$divisiB] ?? 99;

    if ($da !== $db) {
        return $da <=> $db;
    }

    return ((int)($a['id'] ?? 0)) <=> ((int)($b['id'] ?? 0));
});

/*
 * Kelompokkan kembali berdasarkan divisi agar heading divisi
 * tetap ada, sementara urutan anggota di dalamnya tetap kiri-ke-kanan.
 */
$divisiTampil = [];

foreach ($semuaAnggota as $anggota) {
    $divisi = trim((string)($anggota['divisi'] ?? ''));

    if ($divisi === '') {
        $divisi = 'LAINNYA';
    }

    $key = strtoupper($divisi);

    if (!isset($divisiTampil[$key])) {
        $divisiTampil[$key] = [];
    }

    $divisiTampil[$key][] = $anggota;
}

/*
 * Urutan heading divisi:
 * BPH -> INTERNAL -> EKSTERNAL -> KOMINFO -> divisi lainnya.
 */
$hasilDivisi = [];

foreach (array_keys($urutanDivisi) as $divisi) {
    if (isset($divisiTampil[$divisi])) {
        $hasilDivisi[$divisi] = $divisiTampil[$divisi];
        unset($divisiTampil[$divisi]);
    }
}

foreach ($divisiTampil as $divisi => $anggota) {
    $hasilDivisi[$divisi] = $anggota;
}

$divisiTampil = $hasilDivisi;
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>Struktur Organisasi | HMPSIF</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        rel="stylesheet"
    >

    <link href="assets/css/style_modern.css" rel="stylesheet">
</head>

<body>

<?php include "navbar.php"; ?>

<main class="section">
    <div class="container">

        <div class="eyebrow">Organisasi</div>

        <h1 class="section-title mb-5">
            Struktur Pengurus
        </h1>

        <?php if (empty($divisiTampil)): ?>

            <div class="alert alert-info text-center">
                Belum ada data pengurus.
            </div>

        <?php else: ?>

            <?php foreach ($divisiTampil as $namaDivisi => $anggota): ?>

                <section class="org-section mb-5">

                    <div class="text-center mb-4">
                        <h2 class="h3 fw-bold text-uppercase mb-2">
                            <?= e($namaDivisi) ?>
                        </h2>

                        <div
                            class="mx-auto"
                            style="
                                width: 70px;
                                height: 3px;
                                background: currentColor;
                                border-radius: 99px;
                            "
                        ></div>
                    </div>

                    <div class="row g-4 justify-content-start">

                        <?php foreach ($anggota as $r): ?>

                            <div class="col-6 col-md-4 col-lg-3">

                                <div class="card card-modern org-card h-100">

                                    <img
                                        class="avatar"
                                        src="<?= e($r["foto"] ?: "assets/img/avatar.svg") ?>"
                                        alt="<?= e($r["nama"]) ?>"
                                    >

                                    <h6>
                                        <?= e($r["nama"]) ?>
                                    </h6>

                                    <div class="text-primary fw-bold">
                                        <?= e($r["jabatan"]) ?>
                                    </div>

                                    <small class="text-muted">
                                        <?= e($r["divisi"]) ?>
                                    </small>

                                    <?php if (!empty($r["deskripsi"])): ?>

                                        <p class="small mt-2 text-muted">
                                            <?= e($r["deskripsi"]) ?>
                                        </p>

                                    <?php endif; ?>

                                </div>

                            </div>

                        <?php endforeach; ?>

                    </div>

                </section>

            <?php endforeach; ?>

        <?php endif; ?>

    </div>
</main>

<?php include "footer.php"; ?>

</body>
</html>
