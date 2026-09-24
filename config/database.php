<?php
// Kredensial Database Cloud Aiven
$host    = "database-hmpsif-zakyahmadalkammusofa-5419.c.aivencloud.com";
$port    = "28430";
$db      = "defaultdb";
$user    = "avnadmin";
$pass    = "AVNS_U2dp_FoXxt5hJmbW2vt"; // Pastikan password diisi dengan benar
$charset = "utf8mb4";

// DSN (Data Source Name) khusus MySQL PDO
$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
    // Mengaktifkan SSL sesuai syarat Aiven
    PDO::MYSQL_ATTR_SSL_CA       => true,
    PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    // Menampilkan pesan error jika koneksi gagal
    die("Koneksi database gagal: " . $e->getMessage());
}
?>