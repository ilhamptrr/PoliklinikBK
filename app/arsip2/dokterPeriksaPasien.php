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
            <h1 class="m-0">Daftar Periksa Pasien</h1>
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

      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr class="text-center">
              <th style="width: 80px">No Urut</th>
              <th>Nama Pasien</th>
              <th>Keluhan</th>
              <th style="width: 150px">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = "SELECT dp.no_antrian, p.nama AS nama_pasien, dp.keluhan
                      FROM daftar_poli dp
                      INNER JOIN pasien p ON dp.id_pasien = p.id";
                      
            $result = mysqli_query($koneksi, $query);

            while ($daftar_poli = mysqli_fetch_array($result)) {
              ?>
              <tr>
                <td><?php echo $daftar_poli['no_antrian']; ?></td>
                <td><?php echo $daftar_poli['nama_pasien']; ?></td>
                <td><?php echo $daftar_poli['keluhan']; ?></td>
                <td>
                  <?php
                  if (isset($daftar_poli['is_disimpan']) && $daftar_poli['is_disimpan'] == 1) {
                    // Jika data sudah disimpan, tampilkan Button Edit
                    echo '<a href="dokterFormPeriksa.php?id=' . $daftar_poli['no_antrian'] . '"><button type="submit" class="btn btn-warning">Edit</button></a>';
                  } else {
                    // Jika data belum disimpan, tampilkan Button Periksa
                    echo '<a href="dokterFormPeriksa.php?id=' . $daftar_poli['no_antrian'] . '"><button type="submit" class="btn btn-primary">Periksa</button></a>';
                  }
                  ?>
                </td>
              </tr>
            <?php } ?>
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
