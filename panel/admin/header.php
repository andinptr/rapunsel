<?php
session_start();
if (!isset($_SESSION['login'])) {

?>
    <script>
        alert("SILAHKAN LOGIN!");
        window.open('login.php', '_self');
    </script>
<?php
} else {
    $status = $_SESSION['hak_akses'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Panel</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
<div id="wrapper">
      <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-user-edit"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Admin TPG 2</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="index.php">
        <i class="fas fa-home"></i>
        <span>Home</span></a>
</li>
<?php if ($_SESSION['hak_akses'] == 'admin') : ?>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Menu Master  
</div>


<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-cog"></i>
        <span>Master</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="utilities-color.html">Agama</a>
            <a class="collapse-item" href="utilities-border.html">Kewarganegaraan</a>
            <a class="collapse-item" href="utilities-animation.html">Jurusan</a>
            <a class="collapse-item" href="utilities-other.html">Jenjang</a>
        </div>
    </div>
</li>
<?php endif; ?>
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Menu Lainnya
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-edit"></i>
        <span>Pendaftaran</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="login.html">Form Pendaftaran</a>
            <a class="collapse-item" href="register.html">Data Pendaftaran</a>
        </div>
    </div>
</li>
<?php if ($_SESSION['hak_akses'] == 'admin') : ?>
<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="tables.php">
    <i class="fas fa-database"></i>
        <span>Data User</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="register.php">
        <i class="fas fa-registered"></i>
        <span>Register</span></a>
</li>
<?php endif; ?>
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>


</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        
    <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100">
        <span>Selamat Datang, </span>
        <span><?php echo strtoupper($_SESSION['username']); ?></span>
        </form>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">



            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a onclick="return confirm('Yakin Ingin Log Out');" href="logout.php">
                <i class="fas fa-sign-out-alt"></i>
                <span class="text-dark">Logout</span>
                </a>
                

                
            </li>

        </ul>

    </nav>
    <!-- End of Topbar -->
</div>