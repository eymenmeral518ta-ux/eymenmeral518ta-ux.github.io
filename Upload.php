<?php
$PASSWORD = "852043";

if (!isset($_POST['password']) || $_POST['password'] !== $PASSWORD) {
  http_response_code(403);
  die("Yetkisiz erişim");
}

if (!isset($_FILES['file'])) {
  die("Dosya yok");
}

$targetDir = __DIR__ . "/files/Virüsler/";
$ext = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));

if ($ext !== "zip") {
  die("Sadece ZIP kabul edilir");
}

$name = basename($_FILES['file']['name']);
move_uploaded_file($_FILES['file']['tmp_name'], $targetDir . $name);

echo "Yüklendi";
