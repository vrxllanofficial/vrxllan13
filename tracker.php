<?php
// Koneksi ke database
$db = new SQLite3('logs.db');
$db->exec("CREATE TABLE IF NOT EXISTS logs (id INTEGER PRIMARY KEY, ip TEXT, page TEXT, timestamp DATETIME)");

// Ambil data pengunjung
$ip = $_SERVER['REMOTE_ADDR'];
$page = $_SERVER['REQUEST_URI'];
$timestamp = date('Y-m-d H:i:s');

// Masukkan ke database
$stmt = $db->prepare("INSERT INTO logs (ip, page, timestamp) VALUES (:ip, :page, :timestamp)");
$stmt->bindValue(':ip', $ip);
$stmt->bindValue(':page', $page);
$stmt->bindValue(':timestamp', $timestamp);
$stmt->execute();
?>

