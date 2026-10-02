<?php
require "includes.php";
$success = false;
$error = "";
$old = $_POST ?? [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($_POST["agree"])) {
        $error = "Setujui pemrosesan data sebelum mengirim pendaftaran.";
    } else {
        $statement = $pdo->prepare("INSERT INTO pendaftaran(nama, nim, semester, kelas, whatsapp, email, divisi, alasan, agree, status) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, 'Pending')");
        $statement->execute([
            trim((string)($_POST["nama"] ?? "")),
            trim((string)($_POST["nim"] ?? "")),
            trim((string)($_POST["semester"] ?? "")),
            trim((string)($_POST["kelas"] ?? "")),
            trim((string)($_POST["whatsapp"] ?? "")),
            trim((string)($_POST["email"] ?? "")),
            trim((string)($_POST["divisi"] ?? "")),
            trim((string)($_POST["alasan"] ?? "")),
            1,
        ]);
        $success = true;
        $old = [];
    }
}
$departments = ["PSDM", "Pendidikan", "Kominfo", "Humas", "Minat dan Bakat"];
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gabung HMPSIF | Pendaftaran Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style_modern.css" rel="stylesheet">
</head>
<body>
<?php include "navbar.php"; ?>
<main class="section">
    <div class="container">
        <div class="row g-5 align-items-start">
            <div class="col-lg-5">
                <div class="eyebrow">Temukan ruangmu</div>
                <h1 class="section-title">Tumbuh dan berkarya bareng HMPSIF.</h1>
                <p class="section-subtitle">Isi formulir pendaftaran untuk mulai mengenal keluarga besar mahasiswa Informatika UNISNU Jepara.</p>
                <div class="join-steps mt-4">
                    <div class="join-step"><span>01</span><div><strong>Kenali minatmu</strong><small>Pilih bidang yang ingin kamu eksplor.</small></div></div>
                    <div class="join-step"><span>02</span><div><strong>Ceritakan tentang dirimu</strong><small>Lengkapi data dan alasan bergabung.</small></div></div>
                    <div class="join-step"><span>03</span><div><strong>Mulai berproses</strong><small>Tim HMPSIF akan menindaklanjuti pendaftaranmu.</small></div></div>
                </div>
                <p class="small text-muted mt-4">Data yang kamu kirim digunakan untuk keperluan pendaftaran anggota.</p>
            </div>
            <div class="col-lg-7">
                <?php if ($success): ?>
                    <div class="alert alert-success" role="status">Pendaftaran berhasil dikirim. Terima kasih sudah ingin bertumbuh bersama HMPSIF.</div>
                <?php elseif ($error !== ""): ?>
                    <div class="alert alert-danger" role="alert"><?= e($error) ?></div>
                <?php endif; ?>
                <div class="card card-modern p-4 p-md-5">
                    <h2 class="h4 fw-bold mb-1">Formulir pendaftaran</h2>
                    <p class="text-muted mb-4">Bagian bertanda <span class="text-danger">*</span> wajib diisi.</p>
                    <form method="post">
                        <div class="row g-3">
                            <?php foreach ([
                                ["nama", "Nama lengkap", "text", "name"],
                                ["nim", "NIM", "text", "off"],
                                ["semester", "Semester", "number", "off"],
                                ["kelas", "Kelas", "text", "off"],
                                ["whatsapp", "Nomor WhatsApp", "tel", "tel"],
                                ["email", "Email aktif", "email", "email"],
                            ] as $field): ?>
                                <div class="col-md-6">
                                    <label class="form-label" for="join-<?= e($field[0]) ?>"><?= e($field[1]) ?> <span class="text-danger">*</span></label>
                                    <input id="join-<?= e($field[0]) ?>" required name="<?= e($field[0]) ?>" type="<?= e($field[2]) ?>" class="form-control" value="<?= e($old[$field[0]] ?? "") ?>" autocomplete="<?= e($field[3]) ?>" <?= $field[0] === "semester" ? 'min="1" max="14"' : "" ?>>
                                </div>
                            <?php endforeach; ?>
                            <div class="col-12">
                                <label class="form-label" for="join-division">Divisi yang diminati <span class="text-danger">*</span></label>
                                <select id="join-division" name="divisi" class="form-select" required>
                                    <?php foreach ($departments as $department): ?>
                                        <option value="<?= e($department) ?>" <?= ($old["divisi"] ?? $departments[0]) === $department ? "selected" : "" ?>><?= e($department) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="join-reason">Apa alasanmu bergabung? <span class="text-danger">*</span></label>
                                <textarea id="join-reason" name="alasan" required class="form-control" rows="4" placeholder="Ceritakan singkat hal yang ingin kamu pelajari atau kontribusikan..."><?= e($old["alasan"] ?? "") ?></textarea>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input id="join-agree" class="form-check-input" type="checkbox" name="agree" required <?= !empty($old["agree"]) ? "checked" : "" ?>>
                                    <label class="form-check-label small" for="join-agree">Saya menyetujui pemrosesan data untuk keperluan pendaftaran anggota.</label>
                                </div>
                            </div>
                            <div class="col-12 pt-1">
                                <button class="btn btn-primary btn-lg rounded-pill px-4" type="submit">Kirim pendaftaran <span aria-hidden="true">→</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include "footer.php"; ?>
</body>
</html>
