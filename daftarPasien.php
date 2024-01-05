<!DOCTYPE html>
<html lang="en">
<?php
session_start();

include('conf/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['fullName'];
    $alamat = $_POST['alamat'];
    $no_ktp = $_POST['no_ktp'];
    $no_hp = $_POST['no_hp'];

    // Memeriksa apakah pasien sudah terdaftar berdasarkan nomor KTP
    $check_query = "SELECT * FROM pasien WHERE no_ktp = '$no_ktp'";
    $result = $koneksi->query($check_query);

    if ($result->num_rows > 0) {
        // Pasien sudah terdaftar
        echo "Pasien sudah terdaftar dalam database.";
    } else {
        // Pasien belum terdaftar, membuat nomor rekam medis
        $tahun_bulan = date("Ym");
        
        // Menghitung jumlah pasien pada bulan ini
        $count_query = "SELECT COUNT(*) as total FROM pasien WHERE DATE_FORMAT(tanggal_daftar, '%Y%m') = '$tahun_bulan'";
        $count_result = $koneksi->query($count_query);
        $count_row = $count_result->fetch_assoc();
        $urutan_pasien = $count_row['total'] + 1;

        // Membuat nomor rekam medis
        $no_rm = $tahun_bulan . "-" . sprintf('%03d', $urutan_pasien);

        // Menyimpan data pasien ke database
        $insert_query = "INSERT INTO pasien (nama, alamat, no_ktp, no_hp, no_rm, tanggal_daftar) 
                        VALUES ('$nama', '$alamat', '$no_ktp', '$no_hp', '$no_rm', NOW())";
        
        if ($koneksi->query($insert_query) === TRUE) {
            echo "Registrasi berhasil.";
            echo "<br>";
            echo "Nomor Rekam Medis Anda: " . $no_rm;
        } else {
            echo "Error: " . $insert_query . "<br>" . $koneksi->error;
        }
    }
    
}
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Poliklinik BK</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="app/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="app/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="app/dist/css/adminlte.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-...">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Poli</b>klinik</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register</p>

      <form action="" method="post">
        <!-- name -->
        <div class="input-group mb-3">
          <input type="text" class="form-control" required placeholder="Full Name" name="fullName">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa-solid fa-user"></span>
            </div>
          </div>
        </div>

        <!-- alamat -->
        <div class="input-group mb-3">
          <input type="text" class="form-control" required placeholder="Alamat" name="alamat">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa-solid fa-location-pin"></span>
            </div>
          </div>
        </div>

        <!-- No KTP -->
        <div class="input-group mb-3">
          <input type="number" class="form-control" required placeholder="No. KTP" name="no_ktp">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa-solid fa-id-badge"></span>
            </div>
          </div>
        </div>

        <!-- No Hp -->
        <div class="input-group mb-3">
          <input type="number" class="form-control" required placeholder="No. HP" name="no_hp">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa-solid fa-phone"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>

        <p>Silahkan Daftar Poli<a href="daftarPoli.php" class="text-center"> di sini.</a></p>

      </form>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
