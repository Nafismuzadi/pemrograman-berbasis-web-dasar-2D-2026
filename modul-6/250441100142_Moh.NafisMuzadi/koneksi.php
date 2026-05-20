<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_mahasiswa";

try {
    
    $dsn = "mysql:host=$servername;dbname=$database;charset=utf8mb4";
    $conn = new PDO($dsn, $username, $password);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch(PDOException $e) {
    die("Koneksi ke database gagal: " . $e->getMessage());
}
?>