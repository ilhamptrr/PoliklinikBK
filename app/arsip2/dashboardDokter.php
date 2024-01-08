<!DOCTYPE html>
<html lang="en">

<?php
  session_start();
?>

<?php include('../app/template/header.php'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <?php include('../app/template/preloader.php'); ?>

  <!-- Navbar -->
  <?php include('../app/template/navbar.php'); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboardDokter.php" class="brand-link">
      <img src="dist/img/logoUdinus.png" alt="logoPoli" class="brand-image img-circle" style="opacity: .8">
      <span class="brand-text font-weight-light">Poliklinik BK</span>
    </a>

    <!-- Sidebar -->
    <?php include('sidebarDokter.php'); ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard Dokter</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <?php include('../app/template/mainContent.php'); ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php include('../app/template/footer.php'); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


</body>
</html>
