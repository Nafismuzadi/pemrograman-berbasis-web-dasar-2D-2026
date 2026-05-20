<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

if ($_SESSION['role'] != 'admin') {
    header('Location: index.php');
    exit();
}

require_once 'koneksi.php';

$sql = 'SELECT * FROM mahasiswa ORDER BY nim DESC';
$stmt = $conn -> prepare($sql);
$stmt -> execute();

$mahasiswa = $stmt -> fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-200 p-12">
    <h2 class="font-bold text-xl">
        Halo min  <?php echo htmlspecialchars($_SESSION['username']); ?>!!!
    </h2>
    <div class="bg-white shadow-xl rounded-lg mx-auto w-auto h-auto p-4">
        <h2 class="text-center mb-4 font-bold">Daftar Mahasiswa</h2>
        <table class="w-full border border-black [&_th]:border [&_th]:border-black [&_th]:p-2 [&_td]:border [&_td]:border-black [&_td]:px-2 mb-4">
            <tr>
                <th>NIM</th>
                <th>NAMA</th>
                <th>PRODI</th>
                <th>ANGKATAN</th>
                <th>ALAMAT</th>
                <th>JENIS KELAMIN</th>
                <th>TANGGAL LAHIR</th>
                <th>EDIT</th>
            </tr>
            <?php
            foreach ($mahasiswa as $mhs) :
            ?>

            <tr>
                <td>
                    <?php echo htmlspecialchars($mhs['nim']); ?>
                </td>
                <td>
                    <?php echo htmlspecialchars($mhs['nama_mahasiswa']); ?>
                </td>
                <td>
                    <?php echo htmlspecialchars($mhs['prodi']); ?>
                </td>
                <td>
                    <?php echo htmlspecialchars($mhs['angkatan']); ?>
                </td>
                <td>
                    <?php echo htmlspecialchars($mhs['alamat']); ?>
                </td>
                <td>
                    <?php echo htmlspecialchars($mhs['jenis_kelamin']); ?>
                </td>
                <td>
                    <?php echo htmlspecialchars($mhs['tanggal_lahir']); ?>
                </td>
                <td>
                    <a href="update.php?nim=<?php echo $mhs['nim'];?>"class="text-blue-600 hover:text-red-600">Edit</a> | |
                    <a href="delete.php?nim=<?php echo $mhs['nim'];?>" class="text-red-600 hover:text-blue-600">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <div>
            <a href="tambah.php" class="bg-blue-500 py-2 px-6 rounded-lg text-white">TAMBAH</a>
            <a href="logout.php" class="bg-red-500 py-2 px-6 rounded-lg text-white">Log Out</a>
        </div>
    </div>
</body>
</html>