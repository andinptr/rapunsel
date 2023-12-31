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
    $id_agama = htmlspecialchars($_POST['Id_Agama']);
    $nama_agama = htmlspecialchars($_POST['Nama_Agama']);
    $tgl_input = htmlspecialchars($_POST['Tgl_Input']);
    $user_input = htmlspecialchars($_POST['User_Input']);
    $id_user = htmlspecialchars($_POST['Id_User']);

    //cek id sudah terdaftar belum
    $result = mysqli_query($conn, "SELECT id_Agama FROM agama WHERE id_agama = '$id_agama'");
    if (mysqli_fetch_assoc($result)) {
        echo "
        <script>
            alert('ID sudah terdaftar, silahkan ganit!');
            document.location.href='form_agama.php';
        </script>
        ";
        return false;
    }

    mysqli_query($conn, "INSERT INTO agama VALUES('$id_agama','$nama_agama','$tgl_input','$user_input','','','$id_user')");

    // var_dump($cek);
    // exit();

    if (mysqli_affected_rows($conn) > 0) {
        echo "
        <script>
            alert('Data Agama Berhasil dibuat');
            document.location.href='data_agama.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Agama Gagal dibuat');
            document.location.href='form_agama.php';
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
                            <h1 class="h4 text-gray-900 mb-4">Form Agama</h1>
                        </div>
                        <form class="user" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="Id_Agama"
                                placeholder="Id Agama" name="Id_Agama" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="Nama_Agama"
                                    placeholder="Nama Agama" name="Nama_Agama" required>
                            </div>
                            <div class="form-group">
                                <input type="datetime-local" class="form-control form-control-user" id="Tgl_Input" name="Tgl_Input" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="User_Input"
                                    placeholder="User Input" name="User_Input">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="Id_User" id="Id_User">
                                    <option>Pilih Akses User</option>
                                    <?php
                                    $sql = mysqli_query($conn, "SELECT * FROM user WHERE hak_akses = '$status' AND id_user='$_SESSION[id_user];'");
                                    while ($data = mysqli_fetch_assoc($sql)) {
                                    ?>
                                        <option value="<?= $data['id_user'] ?>"><?= $data['hak_akses'] ?> (<?= $data['nama'] ?>)</option>
                                    <?php
                                    }
                                    ?>
                                </select>
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