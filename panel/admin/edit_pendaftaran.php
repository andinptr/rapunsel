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
    $nis = htmlspecialchars($_POST['nis']);
    $nama_siswa = htmlspecialchars($_POST['nama_siswa']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $jk = htmlspecialchars($_POST['jk']);
    $tmp_lahir = htmlspecialchars($_POST['tmp_lahir']);
    $tgl_lahir = htmlspecialchars($_POST['tgl_lahir']);
    $status = htmlspecialchars($_POST['status']);
    $negara = htmlspecialchars($_POST['negara']);
    $agama = htmlspecialchars($_POST['agama']);
    $kelas = htmlspecialchars($_POST['kelas']);
    $tgl_update = date('Y-m-d');
    $user_update = htmlspecialchars($_POST['user_update']);
    $id_user = htmlspecialchars($_POST['id_user']);

    $query = "UPDATE pendaftaran SET
            nis='$nis',
            nama_siswa='$nama_siswa',
            alamat='$alamat',
            jenis_kelamin='$jk',
            tempat_lahir='$tmp_lahir',
            tgl_lahir='$tgl_lahir',
            `status` ='$status ',
            id_negara='$negara',
            id_agama='$agama',
            id_jurusan='$kelas',
            tgl_update='$tgl_update',
            user_update='$user_update',
            id_user='$id_user'
            WHERE nis='$nis'
            ";

    // var_dump($query);
    // exit();

    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        echo "
            <script>
                alert('Data Pendaftaran Berhasil DiUpdate');
                document.location.href='data_pendaftaran.php';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Data Pendaftaran Gagal DiUpdate');
                document.location.href='data_pendaftaran.php';
            </script>
            ";
    }
}
$data = mysqli_query($conn, "SELECT pendaftaran.nis,pendaftaran.nama_siswa,pendaftaran.alamat,pendaftaran.jenis_kelamin,pendaftaran.tempat_lahir,pendaftaran.tgl_lahir,pendaftaran.status,kewarganegaraan.id_negara,kewarganegaraan.nama_negara,agama.id_agama,agama.nama_agama,jurusan.id_jurusan, CONCAT(jenjang.nama_jenjang,' ',jurusan.nama_jurusan) as kelas, pendaftaran.tgl_input,pendaftaran.user_input,pendaftaran.tgl_update,pendaftaran.user_update, user.id_user,CONCAT(user.hak_akses,' (',user.nama,')') as akses FROM pendaftaran INNER JOIN kewarganegaraan ON pendaftaran.id_negara = kewarganegaraan.id_negara JOIN user ON pendaftaran.id_user = user.id_user JOIN agama ON pendaftaran.id_agama = agama.id_agama JOIN jurusan ON pendaftaran.id_jurusan = jurusan.id_jurusan JOIN jenjang ON jurusan.id_jenjang = jenjang.id_jenjang WHERE nis='" . $_GET['nis'] . "'");
$edit = mysqli_fetch_assoc($data);
?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Form Edit Pendaftaran <small>Administrator | Operator</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="nis">NIS<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="nis" id="nis" required="required" class="form-control" value="<?= $edit['nis']; ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_siswa">Nama Siswa <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="nama_siswa" name="nama_siswa" required="required" class="form-control" value="<?= $edit['nama_siswa']; ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="alamat">Alamat <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <textarea type="text" id="alamat" name="alamat" required="required" class="form-control"><?= $edit['alamat']; ?></textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="jk1">Jenis Kelamin <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <?php if (
                                    $edit['jenis_kelamin'] ==
                                    'Laki-laki'
                                ) { ?>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="jk1" name="jk" class="custom-control-input" value="Laki-laki" checked>
                                        <label class="custom-control-label" for="jk1">Laki - Laki</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="jk2" name="jk" class="custom-control-input" value="Perempuan">
                                        <label class="custom-control-label" for="jk2">Perempuan</label>
                                    </div>
                                <?php } else { ?>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="jk1" name="jk" class="custom-control-input" value="Laki-laki">
                                        <label class="custom-control-label" for="jk1">Laki - Laki</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="jk2" name="jk" class="custom-control-input" value="Perempuan" checked>
                                        <label class="custom-control-label" for="jk2">Perempuan</label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="tmp_lahir">Tempat Lahir <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="tmp_lahir" name="tmp_lahir" required="required" class="form-control" value="<?= $edit['tempat_lahir']; ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="tgl_lahir">Tanggal Lahir <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="date" id="tgl_lahir" name="tgl_lahir" required="required" class="form-control" value="<?= $edit['tgl_lahir']; ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align ">Status</label>
                            <div class="col-md-6 col-sm-6 ">
                                <select class="form-control" name="status" id="status">
                                    <option value="<?= $edit['status']; ?>"><?= $edit['status']; ?></option>
                                    <option value="Baru">Baru</option>
                                    <option value="Pindahan">Pindahan</option>
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align ">Negara</label>
                            <div class="col-md-6 col-sm-6 ">
                                <select class="form-control" name="negara" id="negara">
                                    <option value="<?= $edit['id_negara']; ?>"><?= $edit['nama_negara']; ?></option>
                                    <?php
                                    $sql = mysqli_query($conn, "SELECT * FROM kewarganegaraan");
                                    while ($data = mysqli_fetch_assoc($sql)) {
                                    ?>
                                        <option value="<?= $data['id_negara'] ?>"><?= $data['nama_negara'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align ">Agama</label>
                            <div class="col-md-6 col-sm-6 ">
                                <select class="form-control" name="agama" id="agama">
                                    <option value="<?= $edit['id_agama']; ?>"><?= $edit['nama_agama']; ?></option>
                                    <?php
                                    $sql = mysqli_query($conn, "SELECT * FROM agama");
                                    while ($data = mysqli_fetch_assoc($sql)) {
                                    ?>
                                        <option value="<?= $data['id_agama'] ?>"><?= $data['nama_agama'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align ">Kelas</label>
                            <div class="col-md-6 col-sm-6 ">
                                <select class="form-control" name="kelas" id="kelas">
                                    <option value="<?= $edit['id_jurusan'] ?>"><?= $edit['kelas'] ?></option>
                                    <?php
                                    $sql = mysqli_query($conn, "SELECT jurusan.id_jurusan, CONCAT(jenjang.nama_jenjang,' ',jurusan.nama_jurusan) AS kelas FROM jurusan INNER JOIN jenjang ON jurusan.id_jenjang = jenjang.id_jenjang");
                                    while ($data = mysqli_fetch_assoc($sql)) {
                                    ?>
                                        <option value="<?= $data['id_jurusan'] ?>"><?= $data['kelas'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
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
                                    <option value="<?= $edit['id_user']; ?>"><?= $edit['akses']; ?></option>
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