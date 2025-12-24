<?php
if (!isset($_GET['f'])) die("Dosya belirtilmedi");

$file = basename($_GET['f']);
$path = __DIR__ . "/files/Virüsler/" . $file;

if (!file_exists($path)) die("Dosya yok");

header("Content-Type: application/zip");
header("Content-Length: " . filesize($path));
header("Content-Disposition: attachment; filename=\"$file\"");
header("X-Content-Type-Options: nosniff");

readfile($path);
exit;
