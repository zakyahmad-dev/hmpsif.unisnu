<?php
/*
 * Halaman ini dulu adalah homepage (index.php) yang dipindahkan ke folder api/.
 * Sekarang homepage kembali ke /index.php, dan file ini hanya mengarahkan
 * pengunjung supaya link lama (mis. /api/index.php) tidak menampilkan
 * halaman tanpa CSS.
 */
require_once __DIR__ . "/../includes.php";

header("Location: " . url("index.php"), true, 302);
exit;
