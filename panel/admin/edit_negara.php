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
    $id_negara = htmlspecialchars($_POST['id_negara']);
    $nama_negara = htmlspecialchars($_POST['nama_negara']);
    $tgl_update = date('Y-m-d');
    $user_update = htmlspecialchars($_POST['user_update']);
    $id_user = htmlspecialchars($_POST['id_user']);
    $query = "UPDATE negara SET
            id_agama='$id_negara',
            nama_agama='$nama_negara',
            tgl_update='$tgl_update',
            user_update='$user_update',
            id_user='$id_user'
            WHERE id_agama='$id_negara'
            ";
    // var_dump($query);
    // exit();
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        echo "
            <script>
                alert('Data Negara Berhasil DiUpdate');
                document.location.href='data_negara.php';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Data Negara Gagal Update');
                document.location.href='data_negara.php';
            </script>
            ";
    }
}

$data = mysqli_query($conn, "SELECT *
FROM Kewarganegaraan
LEFT JOIN user
ON Kewarganegaraan.id_user = user.id_user WHERE id_negara='" . $_GET['id_negara'] . "'");
$edit = mysqli_fetch_assoc($data);
?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Form Edit Kewarganegaraan<small>Administrator</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="id_agama">ID Negara<span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="id_negara" id="id_negara" class="form-control " value="<?= $edit['id_negara']; ?>" readonly>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_negara">Nama Negara <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="nama_negara" name="nama_negara" class="form-control" value="<?= $edit['nama_negara']; ?>">
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