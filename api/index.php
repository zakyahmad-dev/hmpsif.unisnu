<?php
// Keep the former homepage URL pointing to the canonical public entry point.
header("Location: ../index.php", true, 302);
exit;
