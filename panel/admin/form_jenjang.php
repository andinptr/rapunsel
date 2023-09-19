<?php
include 'header.php';
include 'conn.php';
if ($_SESSION['hak_akses'] != 'admin') {
    echo "
    <script>
        alert('Tidak Memiliki Akses, DILARANG MASUK!');
        document.location.href='index.php';
    </script>
    ";
}

if (isset($_POST['simpan'])) {
    $id_jenjang = htmlspecialchars($_POST['id_jenjang']);
    $nama_jenjang = htmlspecialchars($_POST['nama_jenjang']);
    $tgl_input = htmlspecialchars($_POST['tgl_input']);
    $user_input = htmlspecialchars($_POST['user_input']);
 

    //cek id sudah terdaftar belum
    $result = mysqli_query($conn, "SELECT id_jenjang FROM jenjang WHERE id_jenjang = '$id_jenjang'");
    if (mysqli_fetch_assoc($result)) {
        echo "
        <script>
            alert('ID sudah terdaftar, silahkan ganit!');
            document.location.href='form_jenjang.php';
        </script>
        ";
        return false;
    }

    mysqli_query($conn, "INSERT INTO jenjang VALUES('$id_jenjang','$nama_jenjang','$tgl_input','$user_input','','')");

    // var_dump($cek);
    // exit();

    if (mysqli_affected_rows($conn) > 0) {
        echo "
        <script>
            alert('Data jenjang Berhasil dibuat');
            document.location.href='data_jenjang.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data jenjang Gagal dibuat');
            document.location.href='form_jenjang.php';
        </script>
        ";
    }
}
?>

<body id="page-top">
    <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-2 d-none d-lg-block "></div>
                <div class="col-lg-8">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Form jenjang</h1>
                        </div>
                        <form class="user" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="id_jenjang"
                                placeholder="Id jenjang" name="id_jenjang" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nama_jenjang"
                                    placeholder="Nama jenjang" name="nama_jenjang" required>
                            </div>
                            <div class="form-group">
                                <input type="datetime-local" class="form-control form-control-user" id="tgl_input" name="tgl_input" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="user_input"
                                    placeholder="User Input" name="user_input">
                            </div>
                
                            <button class="btn btn-danger" type="reset">Reset</button>
                            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>