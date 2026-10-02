<?php
require "includes.php";
$sent = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $statement = $pdo->prepare("INSERT INTO kontak(nama, email, subjek, pesan) VALUES(?, ?, ?, ?)");
    $statement->execute([
        trim((string)($_POST["nama"] ?? "")),
        trim((string)($_POST["email"] ?? "")),
        trim((string)($_POST["subjek"] ?? "")),
        trim((string)($_POST["pesan"] ?? "")),
    ]);
    $sent = true;
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kontak | HMPSIF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style_modern.css" rel="stylesheet">
</head>
<body>
<?php include "navbar.php"; ?>
<main class="section">
    <div class="container">
        <div class="row g-5 align-items-start">
            <div class="col-lg-5">
                <div class="page-intro mb-0">
                    <div class="eyebrow">Kami siap mendengar</div>
                    <h1 class="section-title">Mari mulai percakapan.</h1>
                    <p>Punya pertanyaan, ide kolaborasi, atau ingin tahu lebih banyak tentang HMPSIF? Kirim pesan, kami akan menyambutnya.</p>
                </div>
                <div class="contact-method mt-4">
                    <span class="contact-mark" aria-hidden="true">@</span>
                    <span><small>Email</small><a href="mailto:hmpsif@unisnu.ac.id">hmpsif@unisnu.ac.id</a></span>
                </div>
                <div class="contact-method">
                    <span class="contact-mark" aria-hidden="true">⌖</span>
                    <span><small>Lokasi</small><strong>Sekretariat HMPSIF, Kampus UNISNU Jepara</strong></span>
                </div>
                <div class="contact-method">
                    <span class="contact-mark" aria-hidden="true">↗</span>
                    <span><small>Telepon / WhatsApp</small><a href="tel:+62882007506878">+62 882-0075-06878</a></span>
                </div>
            </div>
            <div class="col-lg-7">
                <?php if ($sent): ?>
                    <div class="alert alert-success" role="status">Pesan berhasil dikirim. Terima kasih sudah menghubungi HMPSIF.</div>
                <?php endif; ?>
                <div class="card card-modern p-4 p-md-5">
                    <h2 class="h4 fw-bold mb-1">Kirim pesan</h2>
                    <p class="text-muted mb-4">Isi formulir berikut dan pastikan alamat emailmu benar.</p>
                    <form method="post">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="contactName">Nama</label>
                                <input id="contactName" required name="nama" class="form-control" autocomplete="name">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="contactEmail">Email</label>
                                <input id="contactEmail" required type="email" name="email" class="form-control" autocomplete="email">
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="contactSubject">Subjek</label>
                                <input id="contactSubject" required name="subjek" class="form-control">
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="contactMessage">Pesan</label>
                                <textarea id="contactMessage" required name="pesan" class="form-control" rows="5" placeholder="Ceritakan apa yang ingin kamu tanyakan..."></textarea>
                            </div>
                            <div class="col-12 pt-1">
                                <button class="btn btn-primary px-4" type="submit">Kirim pesan <span aria-hidden="true">→</span></button>
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
