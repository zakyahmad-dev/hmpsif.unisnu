<?php
require_once __DIR__ . "/config/database.php";
function e($v){ return htmlspecialchars($v ?? "", ENT_QUOTES, "UTF-8"); }
function navActive($page){ return basename($_SERVER["PHP_SELF"])===$page ? "active fw-bold" : ""; }
?>