<?php 
session_start();
require_once('koneksi.php');

if(!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

if ($_SESSION['role'] != 'admin') {
    die('akses ditolak');
}

$nim = $_GET['nim'];

$sql = 'SELECT * FROM mahasiswa WHERE nim = ?';
$stmt = $conn -> prepare($sql);
$stmt -> execute([$nim]);

$mahasiswa = $stmt -> fetch(PDO::FETCH_ASSOC);

if(isset($_POST['update'])) {
    $nim_baru = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $angkatan = $_POST['angkatan'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

    $sql = 'UPDATE mahasiswa SET nim = ?, nama_mahasiswa = ?, prodi = ?, angkatan = ?, alamat = ?, jenis_kelamin = ?, tanggal_lahir = ? WHERE nim = ?';

    $stmt = $conn -> prepare($sql);

    $stmt -> execute ([$nim_baru, $nama, $prodi, $angkatan, $alamat, $jenis_kelamin, $tanggal_lahir, $nim]);

    header('Location: admin.php');
    exit();
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-200 flex items-center justify-center p-8">
    <div class="bg-white shadow-xl rounded-lg mx-auto w-[40%] h-auto p-8">
        <h2 class="text-center mb-4 font-bold">Update Data</h2>
        <form action="" method="post">
            <input type="number" name="nim" value="<?php echo htmlspecialchars($mahasiswa['nim']);?>" class="w-full border border-black rounded-lg px-2 mb-2">
            <input type="text" name="nama" value="<?php echo htmlspecialchars($mahasiswa['nama_mahasiswa']);?>" class="w-full border border-black rounded-lg px-2 mb-2">
            <input type="text" name="prodi" value="<?php echo htmlspecialchars($mahasiswa['prodi']);?>" class="w-full border border-black rounded-lg px-2 mb-2">
            <input type="number" name="angkatan" value="<?php echo htmlspecialchars($mahasiswa['angkatan']);?>" class="w-full border border-black rounded-lg px-2 mb-2">
            <input type="text" name="alamat" value="<?php echo htmlspecialchars($mahasiswa['alamat']);?>" class="w-full border border-black rounded-lg px-2 mb-2">
            <input type="text" name="jenis_kelamin" value="<?php echo htmlspecialchars($mahasiswa['jenis_kelamin']);?>" class="w-full border border-black rounded-lg px-2 mb-2">
            <input type="date" name="tanggal_lahir" value="<?php echo htmlspecialchars($mahasiswa['tanggal_lahir']);?>" class="w-full border border-black rounded-lg px-2 mb-2">
            <button type="submit" name="update" class="bg-blue-500 py-2 px-6 rounded-lg text-white">UPDATE</button>
        </form>

    </div>
</body>
</html>