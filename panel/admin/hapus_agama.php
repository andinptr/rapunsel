<?php
include 'conn.php';
// mysqli_query($conn, "DELETE FROM agama WHERE id_agama='" . $_GET['id_agama'] . "'");
// if (mysqli_affected_rows($conn) > 0) {
//     echo "
//         <script>
//             alert('Data Berhasil Dihapus');
//             document.location.href='data_agama.php';
//         </script>
//         ";
// } else {
//     echo "
//         <script>
//             alert('Data Gagal Dihapus');
//             document.location.href='data_agama.php';
//         </script>
//         ";
// }
if (isset($_GET['Id_Agama'])) {
    mysqli_query($conn, "DELETE FROM agama WHERE id_agama='" . $_GET['Id_Agama'] . "'");
    if (mysqli_affected_rows($conn) > 0) {
        echo "
            <script>
                alert('Data Berhasil Dihapus');
                document.location.href='data_agama.php';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Data Gagal Dihapus');
                document.location.href='data_agama.php';
            </script>
            ";
    }
} else {
    mysqli_query($conn, "DELETE FROM agama ");
    if (mysqli_affected_rows($conn) > 0) {
        echo "
            <script>
                alert('Semua Data Berhasil Dihapus');
                document.location.href='data_agama.php';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Data Gagal Dihapus');
                document.location.href='data_agama.php';
            </script>
            ";
    }
}