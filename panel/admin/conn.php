<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_sekolah";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if (!$conn) {
  die("Koneksi Gagal: " . mysqli_connect_error());
}
?>