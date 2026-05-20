<?php 
session_start();
require_once('koneksi.php');

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = ($_POST['password']);

    if ($username == '') {
        echo 'username tidak boleh kosong <br> ';
    } elseif ($password == '') {
        echo 'password tidak boleh kosong <br>';
    } else {
        $sql = 'SELECT * FROM users WHERE username = ?';
        $stmt = $conn -> prepare($sql);
        $stmt -> execute([$username]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            echo 'user tidak ditemukan';
        } elseif (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] == 'admin') {
                header('Location: admin.php');
                exit();
            } elseif ($user['role'] == 'user') {
                header('Location: user.php');
                exit();
            } else {
                echo 'login gagal';
            }
        } else {
            echo 'password salah';
        }
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-300 p-4">
    <div class="flex justify-center items-center gap-4 p-22 mx-auto h-auto">
        <div>
            <form method="post" class="w-72 h-auto rounded-lg bg-white shadow-xl mx-auto px-auto p-6">
                <h2 class="text-center text-black mb-4 text-2xl">Login Form</h2>
                <input type="text" name="username" placeholder="username" class="border border-black rounded mb-2 w-full px-2">
                <input type="password" name="password" placeholder="password" class="border border-black rounded mb-26 w-full px-2">
                <button type="submit" name="login" class="bg-blue-500 py-2 px-6 rounded-lg text-white">Login</button>
                <a href="register.php" class="bg-blue-500 py-2 px-6 rounded-lg text-white">Daftar</a>
            </form>
        </div>
    </div>
</body>
</html>