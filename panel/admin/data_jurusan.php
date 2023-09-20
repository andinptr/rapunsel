<?php
include 'header.php';

if ($_SESSION['hak_akses'] != 'admin') {
    echo "
    <script>
        alert('Tidak Memiliki Akses, DILARANG MASUK!');
        document.location.href='index.php';
    </script>
    ";
}

?>
<!-- Datatables -->
<!-- Bootstrap -->
<link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<!-- page content -->
<div class="right_col" role="main">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Data Jurusan <small>Administrator</small></h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <div class="text-muted font-12 m-b-30 mb-2">
                                    <a href="form_jurusan.php" type="button" class="btn btn-round btn-success ml-2"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data</a>
                                    <div class="btn float-right">
                                        <a class="btn btn-sm btn-danger" onclick="return confirm('Semua Data Akan Terhapus!')" href="hapus_jurusan.php" role="button"><i class="fa fa-trash" aria-hidden="true"></i> Delete All</a>
                                        <a class="btn btn-sm btn-info" href="file-excel/template_data_jurusan.xlsx" target="_blank" role="button"><i class="fa fa-cloud-download" aria-hidden="true"></i> Download Template Excel</a>
                                        <a class="btn btn-sm btn-primary" href="upload_jurusan.php" role="button"><i class="fa fa-upload" aria-hidden="true"></i> Upload Data</a>
                                        <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-print" aria-hidden="true"></i>
                                            Cetak Data
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="laporan/excel_jurusan.php">Cetak Excel</a>
                                            <a class="dropdown-item" href="#">Cetak PDF</a>
                                        </div>
                                    </div>
                                </div>
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Jurusan</th>
                                            <th>Tgl Input</th>
                                            <th>User Input</th>
                                            <th>Tgl Update</th>
                                            <th>User Update</th>
                                            <th>Akses</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include 'conn.php';
                                        $no = 1;
                                        $query = "SELECT *
                                        FROM jurusan
                                        INNER JOIN user
                                        ON jurusan.id_user = user.id_user";
                                        $sql = mysqli_query($conn, $query);
                                        while ($data = mysqli_fetch_assoc($sql)) {
                                        ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $data['nama_jurusan']; ?></td>
                                                <td><?= $data['tgl_input']; ?></td>
                                                <td><?= $data['user_input']; ?></td>
                                                <td><?= $data['tgl_update']; ?></td>
                                                <td><?= $data['user_update']; ?></td>
                                                <td><?= $data['hak_akses']; ?> (<?= $data['nama']; ?>)</td>
                                                <td><a class="btn btn-warning" type="button" href="edit_jurusan.php?id_jurusan=<?= $data['id_jurusan']; ?>"><i class="bi bi-pencil-square" aria-hidden="true"></i></a></td>
                                                <td><a class="btn btn-danger" type="button" onclick="return confirm('Data akan di Hapus?')" href="hapus_jurusan.php?id_jurusan=<?= $data['id_jurusan']; ?>"><i class="bi bi-trash-fill" aria-hidden="true"></i></a></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /page content -->

<?php
include 'footer.php';
?>
<!-- javascript -->
<!-- Datatables -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>