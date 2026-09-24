<?php
$host    = "database-hmpsif-zakyahmadalkammusofa-5419.c.aivencloud.com"; // Host dari Aiven
$port    = "28430";                                                     // Port dari Aiven
$db      = "defaultdb";                                                 // Database dari Aiven
$user    = "avnadmin";                                                  // User dari Aiven
$pass    = "AVNS_U2dp_FoXxt5hJmbW2vt";                        // Password dari Aiven
$charset = "utf8mb4";

$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}
?>