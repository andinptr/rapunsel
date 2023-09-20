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
    $id_jurusan = htmlspecialchars($_POST['id_jurusan']);
    $nama_jurusan = htmlspecialchars($_POST['nama_jurusan']);
    $tgl_update = date('Y-m-d');
    $user_update = htmlspecialchars($_POST['user_update']);
    $id_user = htmlspecialchars($_POST['id_user']);
    $query = "UPDATE jurusan SET
            id_jurusan='$id_jurusan',
            nama_jurusan='$nama_jurusan',
            tgl_update='$tgl_update',
            user_update='$user_update',
            id_user='$id_user'
            WHERE id_jurusan='$id_jurusan'
            ";
    // var_dump($query);
    // exit();
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        echo "
            <script>
                alert('Data Jurusan Berhasil DiUpdate');
                document.location.href='data_jurusan.php';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Data jurusan Gagal Update');
                document.location.href='data_jurusan.php';
            </script>
            ";
    }
}

$data = mysqli_query($conn, "SELECT *
FROM jurusan
LEFT JOIN user
ON jurusan.id_user = user.id_user LEFT JOIN jenjang ON jurusan.id_jenjang = jenjang.id_jenjang WHERE id_jurusan='" . $_GET['id_jurusan'] . "'");
$edit = mysqli_fetch_assoc($data);
?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Form Edit Jurusan <small>Administrator</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="id_jurusan">ID Jurusan<span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="id_jurusan" id="id_jurusan" class="form-control " value="<?= $edit['id_jurusan']; ?>" readonly>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_jurusan">Nama Jurusan <span class="required"></span>
                            </label>

                            <div class="item form-group">
                            <label class="mx-2" for="nm">Kelas</label>
                                    <select class="form-control" name="id_jenjang" id="id_jenjang">
                                    <option value="<?= $edit['id_jenjang'] ?>"><?= $edit['nama_jenjang'] ?></option>
                                    <?php
                                    $sql = mysqli_query($conn, "SELECT * FROM jenjang");
                                    while ($data = mysqli_fetch_assoc($sql)) {
                                        ?>
                                            <option value="<?= $data['id_jenjang'] ?>"><?= $data['nama_jenjang'] ?></option>
                                        <?php
                                        }
                                        
                                    ?>
                                </select>
                            </div>
                        </div>

                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="nama_jurusan" name="nama_jurusan" class="form-control" value="<?= $edit['nama_jurusan']; ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="user_update">User Update<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="user_update" name="user_update" required="required" class="form-control" value="<?= $edit['user_input']; ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align ">Akses User</label>
                            <div class="col-md-6 col-sm-6 ">
                                <select class="form-control" name="id_user" id="id_user">
                                    <option value="<?= $edit['id_user'] ?>"><?= $edit['hak_akses'] ?> (<?= $edit['nama'] ?>)</option>
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
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <!-- <button class="btn btn-primary" type="button">Cancel</button> -->
                                <button class="btn btn-warning" type="reset">Reset</button>
                                <button type="submit" class="btn btn-success" name="simpan">Update</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /page content -->
<?php
include 'footer.php';
?>