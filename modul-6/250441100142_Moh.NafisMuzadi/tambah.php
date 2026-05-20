<?php
session_start();
require_once('koneksi.php');

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

if ($_SESSION['role'] != 'admin') {
    die(header('Location: index.php'));
    exit();
}

if (isset($_POST['tambah'])) {
    $nim = ($_POST['nim']);
    $nama = $_POST['nama'];
    $prodi = ($_POST['prodi']);
    $angkatan = ($_POST['angkatan']);
    $alamat = ($_POST['alamat']);
    $jenis_kelamin = ($_POST['jenis_kelamin']);
    $tanggal_lahir = ($_POST['tanggal_lahir']);

    $sql = 'SELECT * FROM mahasiswa WHERE nim = ?';
    $stmt = $conn->prepare($sql);
    $stmt -> execute([$nim]);

    $cek = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($cek) {
        echo 'nim sudah terdaftar';
    } elseif ($nama == '') {
        echo 'nama tidak boleh kosong';
    } elseif ($prodi == '') {
        echo 'prodi tidak boleh kosong';
    } elseif ($angkatan == '') {
        echo 'angkatan tidak boleh kosong';
    } elseif ($alamat == '') {
        echo 'alamat tidak boleh kosong';
    } else if ($jenis_kelamin == '') {
        echo 'jenis kelamin tidak boleh kosong';
    } else if ($tanggal_lahir == '') {
        echo 'tanggal lahir tidak boleh kosong';
    } else {
        $sql = 'INSERT INTO mahasiswa (nim, nama_mahasiswa, prodi, angkatan, alamat, jenis_kelamin, tanggal_lahir) VALUES (?, ?, ?, ?, ?, ?, ?)';
        $stmt = $conn->prepare($sql);
        $stmt -> execute([$nim, $nama, $prodi, $angkatan, $alamat, $jenis_kelamin, $tanggal_lahir]);
        if ($_SESSION['role'] == 'admin') {
            header('Location: admin.php');
            exit();
        } elseif ($_SESSION['role'] == 'user') {
            header('Location: user.php');
            exit();
        } else {
            echo 'akses ditolak karena anda tidak belum login';
        }
    }
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
        <form action="" method="post">
            <input type="number" name="nim" placeholder="Masukkan NIM" class="w-full border border-black rounded-lg px-2 mb-2">
            <input type="text" name="nama" placeholder="Masukkan NAMA" class="w-full border border-black rounded-lg px-2 mb-2">
            <input type="text" name="prodi" placeholder="Masukkan PRODI" class="w-full border border-black rounded-lg px-2 mb-2">
            <input type="number" name="angkatan" placeholder="Masukkan ANGKATAN" class="w-full border border-black rounded-lg px-2 mb-2">
            <input type="text" name="alamat" placeholder="Masukkan ALAMAT" class="w-full border border-black rounded-lg px-2 mb-2">
            <input type="text" name="jenis_kelamin" placeholder="JENIS KELAMIN" class="w-full border border-black rounded-lg px-2 mb-2">
            <input type="date" name="tanggal_lahir" placeholder="TANGGAL LAHIR" class="w-full border border-black rounded-lg px-2 mb-2">
            <button type="submit" name="tambah" class="bg-blue-500 py-2 px-6 rounded-lg text-white">TAMBAH</button>
        </form>
    </div>
</body>
</html>