<!DOCTYPE html>
<html lang="en">

<?php
  session_start();
  
  if(!$_SESSION['nama']){
    header('location:../');
  }
?>

<?php include('../conf/config.php'); ?>

<!-- head -->
<?php include('../app/template/header.php'); ?>
<!-- /.head -->

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
    <?php include('sidebar.php'); ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php
      if ($_GET['page']=='admin_dashboard'){
        include('../app/admin/admin_dashboard.php');
      }
      else if ($_GET['page']=='admin_dokter'){
        include('../app/admin/admin_dokter.php');
      }
      else if ($_GET['page']=='admin_pasien'){
        include('../app/admin/admin_pasien.php');
      }
      else if ($_GET['page']=='admin_poli'){
        include('../app/admin/admin_poli.php');
      }
      else if ($_GET['page']=='admin_obat'){
        include('../app/admin/admin_obat.php');
      }
      else if ($_GET['page']=='dokter_dashboard'){
        include('../app/dokter/dokter_dashboard.php');
      }
      else if ($_GET['page']=='dokter_jadwalPeriksa'){
        include('../app/dokter/dokter_jadwalPeriksa.php');
      }
      else if ($_GET['page']=='dokter_periksaPasien'){
        include('../app/dokter/dokter_periksaPasien.php');
      }
      else if ($_GET['page']=='dokter_riwayatPasien'){
        include('../app/dokter/dokter_riwayatPasien.php');
      }
      else if ($_GET['page']=='dokter_profil'){
        include('../app/dokter/dokter_profil.php');
      }
      else if ($_GET['page']=='dokter_formPeriksa'){
        include('../app/dokter/dokter_formPeriksa.php');
      }
    ?>
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
