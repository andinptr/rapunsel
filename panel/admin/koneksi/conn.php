<?php
$servername = "localhost";
$database = "db_sekolah";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Koneksi Gagal: " . $conn->connect_error);
}
echo "Koneksi Berhasil";
?>






















