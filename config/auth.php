<?php
/*
 * Proteksi halaman admin.
 * Dipakai oleh semua halaman di folder /admin.
 */
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (!isset($_SESSION["admin_id"])) {
    header("Location: login.php");
    exit;
}

if (!function_exists("e")) {
    function e($value)
    {
        return htmlspecialchars($value ?? "", ENT_QUOTES, "UTF-8");
    }
}
