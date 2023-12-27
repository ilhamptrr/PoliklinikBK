<!DOCTYPE html>
<html lang="en">
<?php
  session_start();
?>
<?php include('../AdminLTE-3.2.0/template/header.php'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <?php include('../AdminLTE-3.2.0/template/preloader.php'); ?>

  <!-- Navbar -->
  <?php include('../AdminLTE-3.2.0/template/navbar.php'); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboardAdmin.php" class="brand-link">
      <img src="dist/img/logoUdinus.png" alt="logoPoli" class="brand-image img-circle" style="opacity: .8">
      <span class="brand-text font-weight-light">Poliklinik BK</span>
    </a>

    <!-- Sidebar -->
    <?php include('sidebarAdmin.php'); ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah / Edit Pasien</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah / Edit Pasien</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <form>
      <div class="card-body">
        <div class="form-group">
          <label for="namaPasien">Nama Pasien</label>
          <input type="text" class="form-control" id="namaPasien" placeholder="Nama Pasien">
        </div>
        <div class="form-group">
          <label for="Alamat">Alamat</label>
          <input type="text" class="form-control" id="Alamat" placeholder="Alamat">
        </div>
        <div class="form-group">
          <label for="no_ktp">Nomor KTP</label>
          <input type="text" class="form-control" id="no_ktp" placeholder="no_ktp">
        </div>
        <div class="form-group">
          <label for="no_hp">Nomor HP</label>
          <input type="text" class="form-control" id="no_hp" placeholder="no_hp">
        </div>
        <div class="form-group">
          <label for="no_rm">Nomor RM</label>
          <input type="text" class="form-control" id="no_rm" placeholder="no_rm">
        </div>
      </div>

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="submit" class="btn btn-primary">Reset</button>
      </div>
    </form>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php include('../AdminLTE-3.2.0/template/footer.php'); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


</body>
</html>
