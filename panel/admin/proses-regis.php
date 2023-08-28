<?php
include 'conn.php';
if (isset($_POST['akses'])){
    $username = strtolower(stripslashes($_POST['username']));
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $akses = htmlspecialchars($_POST['akses']);

    //cek username
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)){
        echo "
        <script>
            alert('Username sudah terdaftar, silahkan ganti!!');
            document.location.href='register.php';
        </script>";
        return false;
    }

    // cek password
    if($password !== $password2){
        echo "
        <script>
            alert('Konfirmasi Password Salah');
            document.location.href='register.php';
        </script>";
        
        return false;
    }

    //enkirpsi password
    $password = password_hash ($password, PASSWORD_DEFAULT);

    //simpan data ke database
    mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password', '$nama', '$email', '$akses')");
    if (mysqli_affected_rows($conn)){
        echo"
        <script>
        alert('Akun Berhasil Di Buat Silahkan Login!! :)');
        document.location.href='register.php';
        </script>";
    } else{
        echo mysqli_error($conn);
    }
}
?>
