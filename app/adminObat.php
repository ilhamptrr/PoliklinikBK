<!DOCTYPE html>
<html lang="en">
<?php
  session_start();
?>
<?php include('../conf/config.php'); ?>
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
            <h1 class="m-0">Obat</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Obat</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <form method="get" action="add/tambahObat.php">
      <div class="card-body">
        <div class="form-group">
          <label for="namaObat">Nama Obat</label>
          <input type="text" class="form-control" name="namaObat" placeholder="Nama Obat">
        </div>
        <div class="form-group">
          <label for="kemasan">Kemasan</label>
          <input type="text" class="form-control" name="kemasan" placeholder="Kemasan">
        </div>
        <div class="form-group">
          <label for="harga">Harga</label>
          <input type="text" class="form-control" name="harga" placeholder="Harga">
        </div>
      </div>

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>

    <div class="card-header">
      <h3 class="card-title">Bordered Table</h3>
    </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr class="text-center">
              <th style="width: 10px">No</th>
              <th>Nama Obat</th>
              <th>Kemasan</th>
              <th>Harga</th>
              <th style="width: 150px">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $no = 0;
              $query = mysqli_query($koneksi, "SELECT * FROM obat");
              while($obat = mysqli_fetch_array($query)){
                $no++
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $obat['nama_obat']; ?></td>
              <td><?php echo $obat['kemasan']; ?></td>
              <td><?php echo $obat['harga']; ?></td>
              <td>
                <button type="submit" class="btn btn-success">Edit</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
              </td>
            </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
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
