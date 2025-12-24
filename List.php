<?php
$dir = __DIR__ . "/files/Virüsler/";
if (!is_dir($dir)) {
  echo json_encode([]);
  exit;
}

$files = array_values(array_filter(scandir($dir), function($f){
  return !in_array($f, ['.','..']) && str_ends_with(strtolower($f), '.zip');
}));

header('Content-Type: application/json; charset=utf-8');
echo json_encode($files);
