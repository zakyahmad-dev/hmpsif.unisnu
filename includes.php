<?php
require_once __DIR__ . "/config/database.php";

function e($value)
{
    return htmlspecialchars((string)($value ?? ""), ENT_QUOTES, "UTF-8");
}

function navActive($page)
{
    return basename($_SERVER["PHP_SELF"] ?? "") === $page ? "active" : "";
}

function formatTanggalId($value)
{
    $timestamp = strtotime((string)$value);
    if ($timestamp === false) {
        return (string)$value;
    }

    $months = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];
    return date("d", $timestamp) . " " . $months[(int)date("n", $timestamp) - 1] . " " . date("Y", $timestamp);
}
?>
