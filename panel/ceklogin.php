<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        center {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        a {
            display: block;
            text-align: center;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<?php
session_start();
if (isset($_SESSION['email'])) {
    echo '<script>window.location.replace("./dashboard.php");</script>';
} else {
    $email = "admin@gmail.com";
    $password = "admin";

    if (isset($_POST['email']) && isset($_POST['password'])) {
        if ($_POST['email'] == $email && $_POST['password'] == $password) {
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['password'] = $_POST['password'];
            echo '<meta http-equiv="refresh" content="2; url=./dashboard.php"/>';
            echo "<center><h1>Berhasil, dalam 2 detik kamu akan dialihkan ke halaman utama</h1></center>";
        } else {
            echo "<center><h1>Gagal!, Email atau Password Salah</h1></center>";
            echo '<meta http-equiv="refresh" content="1; url=./login.php"/>';
            echo "<center><h1>Dalam 2 detik kamu akan dialihkan kembali ke halaman login</h1></center>";
        }
    } else {
        echo "<center><h1>Gagal!, Jangan biarkan email dan password kosong</h1></center>";
        echo '<meta http-
        equiv="refresh" content="1; url=./login.php"/>';
        echo "<center><h1>Dalam 2 detik kamu akan dialihkan kembali ke halaman login</h1></center>";
    }
}
?>

</body>
</html>
