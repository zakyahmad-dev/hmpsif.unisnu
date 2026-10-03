<?php
/*
 * ------------------------------------------------------------------
 * KONFIGURASI DATABASE
 * ------------------------------------------------------------------
 * Kredensial diambil dari (urutan prioritas):
 *   1. config/config.local.php  (khusus lokal, tidak ikut ter-commit)
 *   2. Environment variable: DB_HOST, DB_PORT, DB_NAME, DB_USER, DB_PASS, DB_SSL
 *   3. Nilai default di bawah ini (database cloud Aiven)
 *
 * Cara pakai di XAMPP (database lokal), buat file config/config.local.php:
 *
 *   <?php
 *   $host = "127.0.0.1";
 *   $port = "3306";
 *   $db   = "db_himpunan";
 *   $user = "root";
 *   $pass = "";
 *   $ssl  = false;
 *
 * Di Railway/hosting, cukup isi environment variable tersebut di dashboard —
 * tidak perlu mengubah kode ini.
 */

$host    = "database-hmpsif-zakyahmadalkammusofa-5419.c.aivencloud.com";
$port    = "28430";
$db      = "defaultdb";
$user    = "avnadmin";
$pass    = "AVNS_U2dp_FoXxt5hJmbW2vt";
$ssl     = true;
$charset = "utf8mb4";

/*
 * Override opsional untuk pengembangan lokal.
 * File ini tidak di-commit (lihat .gitignore).
 */
if (is_file(__DIR__ . "/config.local.php")) {
    require __DIR__ . "/config.local.php";
}

/* Override dari environment variable (dipakai saat deploy). */
$env = [
    "DB_HOST" => "host",
    "DB_PORT" => "port",
    "DB_NAME" => "db",
    "DB_USER" => "user",
    "DB_PASS" => "pass",
];

foreach ($env as $key => $var) {
    $value = getenv($key);

    if ($value !== false && $value !== "") {
        $$var = $value;
    }
}

$sslEnv = getenv("DB_SSL");

if ($sslEnv !== false && $sslEnv !== "") {
    $ssl = !in_array(strtolower($sslEnv), ["0", "false", "off", "no"], true);
}

$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

/*
 * Aiven (dan sebagian hosting) mewajibkan koneksi SSL.
 * Opsi SSL hanya dipasang kalau ekstensinya memang mendukung,
 * supaya tidak error di server yang berbeda.
 */
if ($ssl) {
    if (defined("PDO::MYSQL_ATTR_SSL_CA")) {
        $options[PDO::MYSQL_ATTR_SSL_CA] = getenv("DB_SSL_CA") ?: true;
    }

    if (defined("PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT")) {
        $options[PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT] = false;
    }
}

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    http_response_code(500);

    /*
     * Pesan detail (yang berisi host/user) hanya ditampilkan kalau
     * APP_DEBUG=1, supaya kredensial tidak bocor ke pengunjung.
     */
    $detail = getenv("APP_DEBUG") === "1" ? $e->getMessage() : "Hubungi pengurus HMPSIF untuk informasi lebih lanjut.";

    echo '<!doctype html><html lang="id"><head><meta charset="utf-8">'
        . '<meta name="viewport" content="width=device-width,initial-scale=1">'
        . '<title>Koneksi database gagal</title>'
        . '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">'
        . '</head><body class="bg-light"><div class="container py-5" style="max-width:640px">'
        . '<div class="card border-0 shadow-sm p-4">'
        . '<h4 class="mb-3">Koneksi database gagal</h4>'
        . '<p class="text-muted mb-2">Website tidak dapat terhubung ke database server.</p>'
        . '<p class="small text-muted mb-0">' . htmlspecialchars($detail, ENT_QUOTES, "UTF-8") . '</p>'
        . '</div></div></body></html>';

    exit;
}
