<?php
include 'conn.php';
// mysqli_query($conn, "DELETE FROM jenjang WHERE id_jenjang='" . $_GET['id_jenjang'] . "'");
// if (mysqli_affected_rows($conn) > 0) {
//     echo "
//         <script>
//             alert('Data Berhasil Dihapus');
//             document.location.href='data_jenjang.php';
//         </script>
//         ";
// } else {
//     echo "
//         <script>
//             alert('Data Gagal Dihapus');
//             document.location.href='data_jenjang.php';
//         </script>
//         ";
// }
if (isset($_GET['id_jenjang'])) {
    mysqli_query($conn, "DELETE FROM jenjang WHERE id_jenjang='" . $_GET['id_jenjang'] . "'");
    if (mysqli_affected_rows($conn) > 0) {
        echo "
            <script>
                alert('Data Berhasil Dihapus');
                document.location.href='data_jenjang.php';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Data Gagal Dihapus');
                document.location.href='data_jenjang.php';
            </script>
            ";
    }
} else {
    mysqli_query($conn, "DELETE FROM jenjang ");
    if (mysqli_affected_rows($conn) > 0) {
        echo "
            <script>
                alert('Semua Data Berhasil Dihapus');
                document.location.href='data_jenjang.php';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Data Gagal Dihapus');
                document.location.href='data_jenjang.php';
            </script>
            ";
    }
}