<?php 
session_start();
require_once('koneksi.php');

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

if ($_SESSION['role'] != 'admin') {
    die('akses ditolak');
}

$nim = $_GET['nim'];

$sql = 'DELETE FROM mahasiswa WHERE nim = ?';

$stmt = $conn -> prepare($sql);
$stmt -> execute([$nim]);

header('Location: admin.php');
exit();
?>