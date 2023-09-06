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
    $username = strtolower(stripslashes($_POST['username']));
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $akses = htmlspecialchars($_POST['akses']);
    $id_user = $_POST['id_user'];

    
    //cek konfirmasi password
    if ($password !== $password2) {
        echo "
        <script>
            alert('Konfirmasi Password Salah');
            document.location.href='registrasi.php';
        </script>
        ";
        return false;
    }
    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "UPDATE user SET
            id_user='$id_user',
            username='$username',
            `password` ='$password',
            nama='$nama',
            email='$email',
            hak_akses='$akses'
            WHERE id_user='$id_user'
            ";
    // var_dump($query);
    // exit();
    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        echo "
            <script>
                alert('Data user Berhasil DiUpdate');
                document.location.href='tables.php';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Data user Gagal Update');
                document.location.href='tables.php';
            </script>
            ";
    }
}

$data = mysqli_query($conn, "SELECT *
FROM user WHERE id_user='" . $_GET['id_user'] . "'");
$edit = mysqli_fetch_assoc($data);
?>

<body id="page-top">

<!-- page content -->
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
                            <h1 class="h4 text-gray-900 mb-4">EDIT ACCOUNT</h1>
                        </div>
                        <form class="user" method="post">
                            <div class="form-group">
                            <input type="hidden" name="id_user" id="id_user" value="<?= $edit['id_user']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="username"
                                placeholder="Username" value="<?= $edit['username']; ?>" name="username" required>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user"
                                        id="Password" placeholder="Password" name="password">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user"
                                        id="RepeatPassword" placeholder="Ulang Password" name="password2">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nama"
                                    placeholder="Nama" name="nama" value="<?= $edit['nama']; ?>" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="email"
                                placeholder="Email" name="email" value="<?= $edit['email']; ?>" required>
                            </div>
                            <div class="form-group">
                                <select class="form-select form-control form-control user" id="hakakses" name="akses" required>
                                    <option value="<?= $edit['hak_akses']; ?>"><?= $edit['hak_akses']; ?></option>
                                    <option value="admin">Admin</option>
                                    <option value="operator">Operator</option>
                                </select>
                            </div>
                            <button class="btn btn-danger" type="reset">Reset</button>
                            <button type="submit" class="btn btn-success" name="simpan">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php';?>