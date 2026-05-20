<?php 
session_start();
require_once('koneksi.php');

if(isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $confirm_password = $_POST['confirm_password'];

    $sql = 'SELECT * FROM users WHERE username = ? OR email = ?';
    $stmt = $conn->prepare($sql);
    $stmt -> execute([$username, $email]);

    $cek = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($cek) {
        echo 'username atau email sudah di gunakan';
    } elseif ($confirm_password != $password) {
        echo 'password yang anda masukkan tidak sama <br>';    
    } else {
        $role = 'user';
        $sql = 'INSERT INTO users (username, email, password, role)
        VALUES (?,?,?,?)';
        $stmt = $conn -> prepare($sql);
        $stmt -> execute([$username, $email, $hash, $role]);

        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;
        header('Location: user.php');
        exit();
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
<body>
    <div class="flex justify-center items-center gap-4 p-22 mx-auto h-auto">
        <div>
            <form action="" method="post" class="w-72 h-auto rounded-lg     bg-white shadow-xl mx-auto px-auto p-6">
                <h2 class="text-center text-black mb-4 text-2xl">Register Form</h2>
                <input type="text" name="username" placeholder="username" class="border border-black rounded mb-2 w-full px-2" required>
                <input type="email" name="email" placeholder="email" class="border border-black rounded mb-2 w-full px-2" required>
                <input type="password" name="password" placeholder="password" class="border border-black rounded mb-2 w-full px-2" required>
                <input type="password" name="confirm_password" placeholder="confirm password" class="border border-black rounded mb-10 w-full px-2" required>
                <button type="submit" name="register" class="bg-blue-500 py-2 px-6 rounded-lg text-white">Register</button>
                <a href="index.php" class="bg-blue-500 py-2 px-6 rounded-lg text-white">Login</a>
            </form>
        </div>
    </div>
</body>
</html>