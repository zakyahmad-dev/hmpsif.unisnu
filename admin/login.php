<?php
session_start();
require "../config/database.php";

if (isset($_SESSION["admin_id"])) {
    header("Location: index.php");
    exit;
}

$err = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $st = $pdo->prepare(
        "SELECT * FROM users WHERE username = ? AND role = 'admin'"
    );

    $st->execute([$_POST["username"]]);
    $u = $st->fetch();

    if ($u && password_verify($_POST["password"], $u["password"])) {
        $_SESSION["admin_id"] = $u["id"];
        $_SESSION["admin_name"] = $u["nama"];

        header("Location: index.php");
        exit;
    } else {
        $err = "Username atau password salah.";
    }
}
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login Admin HMTI</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="card card-modern p-4">

                <h3 class="mb-4">Login Admin HMTI</h3>

                <?php if ($err): ?>
                    <div class="alert alert-danger">
                        <?= htmlspecialchars($err) ?>
                    </div>
                <?php endif; ?>

                <form method="post">

                    <input
                        class="form-control mb-3"
                        name="username"
                        placeholder="Username"
                        required
                    >

                    <input
                        class="form-control mb-3"
                        type="password"
                        name="password"
                        placeholder="Password"
                        required
                    >

                    <button
                        type="submit"
                        class="btn btn-primary w-100"
                    >
                        Masuk
                    </button>

                </form>

                <small class="text-muted mt-3">
                    Demo: admin / admin123
                </small>

            </div>

        </div>

    </div>

</div>

</body>
</html>