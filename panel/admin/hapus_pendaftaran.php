<?php
include 'conn.php';
mysqli_query($conn, "DELETE FROM pendaftaran WHERE nis='" . $_GET['nis'] . "'");
if (mysqli_affected_rows($conn) > 0) {
    echo "
        <script>
            alert('Data Berhasil Dihapus');
            document.location.href='data_pendaftaran.php';
        </script>
        ";
} else {
    echo "
        <script>
            alert('Data Gagal Dihapus');
            document.location.href='data_pendaftaran.php';
        </script>
        ";
}