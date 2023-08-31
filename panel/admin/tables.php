<?php include "header.php";?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>

<body id="page-top">
    <div class="container">
        <table id="example" class="table table-striped table-bordered" style="widht:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Email</th>
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
    FROM user ";
    $sql = mysqli_query($conn, $query);
    while ($data = mysqli_fetch_assoc($sql)) {
?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $data['username']; ?></td>
    <td><?= $data['nama']; ?></td>
    <td><?= $data['email']; ?></td>
    <td><?= $data['hak_akses']; ?></td>
    <td align="center"><a class="btn btn-warning btn-sm" type="button" href="edit_user.php?id_user=<?= $data['id_user']; ?>"><i class="far fa-edit"></i></a></td>
    <td align="center"><a class="btn btn-danger btn-sm" type="button" onclick="return confirm('Data akan di Hapus?')" href="hapus_user.php?id_user=<?= $data['id_user']; ?>"><i class="fas fa-trash-alt"></i></a></td>
</tr>
<?php
}
?>
</tbody>
</table><br><br><br>
</div>
<!-- script -->
<script>
$(document).ready(function(){
new DataTable('#example');
})
</script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

<?php include "footer.php";?>
      

