<?php
require_once __DIR__ . "/config/database.php";

/*
 * ------------------------------------------------------------------
 * BASE PATH
 * ------------------------------------------------------------------
 * Semua link dan aset ditulis lewat url() supaya tetap benar baik
 * website dibuka dari root domain (Railway/hosting) maupun dari
 * subfolder (mis. http://localhost/hmpsif-website/).
 *
 * Contoh:
 *   url("assets/css/style_modern.css") -> /assets/css/style_modern.css
 *   url("index.php")                   -> /index.php
 * Di subfolder:
 *   url("assets/css/style_modern.css") -> /hmpsif-website/assets/css/style_modern.css
 */
if (!function_exists("app_base")) {
    function app_base()
    {
        static $base = null;

        if ($base !== null) {
            return $base;
        }

        $root       = str_replace("\\", "/", __DIR__);                        // folder proyek (lokasi includes.php)
        $scriptFile = str_replace("\\", "/", (string) ($_SERVER["SCRIPT_FILENAME"] ?? ""));
        $scriptName = str_replace("\\", "/", (string) ($_SERVER["SCRIPT_NAME"] ?? ""));

        /*
         * Kedalaman folder skrip yang sedang dijalankan relatif terhadap
         * root proyek. Dipakai agar halaman di dalam subfolder (admin/)
         * menghasilkan base path yang sama dengan halaman utama.
         */
        $depth     = 0;
        $scriptDir = $scriptFile !== "" ? str_replace("\\", "/", dirname($scriptFile)) : "";

        if ($scriptDir !== "" && strpos($scriptDir, $root) === 0) {
            $relative = trim(substr($scriptDir, strlen($root)), "/");
            $depth    = $relative === "" ? 0 : count(explode("/", $relative));
        }

        $dir = $scriptName !== "" ? rtrim(str_replace("\\", "/", dirname($scriptName)), "/") : "";

        for ($i = 0; $i < $depth; $i++) {
            $dir = rtrim(str_replace("\\", "/", dirname($dir)), "/");
        }

        if ($dir === "" || $dir === "/" || $dir === ".") {
            $dir = "";
        }

        return $base = $dir;
    }
}

/*
 * URL absolut (berbasis base path) untuk link, gambar, CSS, dan JS.
 */
if (!function_exists("url")) {
    function url($path = "")
    {
        return app_base() . "/" . ltrim((string) $path, "/");
    }
}

/*
 * Normalisasi URL aset yang tersimpan di database:
 *   "assets/img/foto.jpg" -> ditambah base path
 *   "https://..." / "/x"  -> dibiarkan apa adanya
 *   kosong                -> memakai gambar pengganti
 */
if (!function_exists("asset_url")) {
    function asset_url($path, $fallback = "assets/img/placeholder.svg")
    {
        $path = trim((string) $path);

        if ($path === "") {
            $path = $fallback;
        }

        if (preg_match("~^(https?:)?//~i", $path) || strpos($path, "data:") === 0) {
            return $path;
        }

        if (strpos($path, "/") === 0) {
            return $path;
        }

        return url($path);
    }
}

if (!function_exists("e")) {
    function e($v)
    {
        return htmlspecialchars($v ?? "", ENT_QUOTES, "UTF-8");
    }
}

if (!function_exists("navActive")) {
    function navActive($page)
    {
        return basename($_SERVER["PHP_SELF"] ?? "") === $page ? "active fw-bold" : "";
    }
}
