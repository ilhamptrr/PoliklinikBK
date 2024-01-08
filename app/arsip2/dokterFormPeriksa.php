<!DOCTYPE html>
<html lang="en">
    <?php
        session_start();
        include('../conf/config.php');
    ?>
    <?php include('../app/template/header.php'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php
        // Mendapatkan parameter dari URL
        $no_antrian = isset($_GET['id']) ? $_GET['id'] : '';

        // Menggunakan parameter untuk mengambil data pasien
        $query = "SELECT dp.no_antrian, p.nama AS nama_pasien, dp.keluhan, dp.is_disimpan
                FROM daftar_poli dp
                INNER JOIN pasien p ON dp.id_pasien = p.id
                WHERE dp.no_antrian = '$no_antrian'";

        $result = mysqli_query($koneksi, $query);
        $data_pasien = mysqli_fetch_assoc($result);
    ?>

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
                <h1 class="m-0">Periksa Pasien</h1>
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
        <form method="post" action="">
        <div class="card-body">
            <!-- Nama Pasien -->
            <div class="form-group">
                <label for="nama_pasien">Nama Pasien</label>
                <input type="text" class="form-control" name="nama_pasien" placeholder="Nama Pasien" value="<?php echo $data_pasien['nama_pasien']; ?>" readonly>
            </div>

            <!-- Tanggal Periksa -->
            <div class="form-group">
                <label for="tanggal_periksa">Tanggal Periksa</label>
                <input type="date" class="form-control" name="tanggal_periksa" value="<?php echo date('Y-m-d'); ?>">
            </div>

            <!-- Catatan -->
            <div class="form-group">
            <label for="catatan">Catatan</label>
            <input type="text" class="form-control" name="catatan" placeholder="Catanan">
            </div>

            
            <input type="hidden" name="id_periksa" id="id_periksa">

            <!-- Pilih Obat -->
            <div class="form-group">
                <label for="exampleSelectBorder">Obat</label>
                <select class="custom-select form-control-border" name="pilihObat" onchange="updateObatLabel()">
                    <?php
                        // Fetch data from the 'obat' table
                        $query = "SELECT nama_obat, kemasan, harga FROM obat";
                        $result = mysqli_query($koneksi, $query);

                        // Check if the query was successful
                        if ($result) {
                            // Loop through the result set and create options for the dropdown
                            while ($row = mysqli_fetch_assoc($result)) {
                                $nama_obat = $row['nama_obat'];
                                $kemasan = $row['kemasan'];
                                $harga = $row['harga'];
                                echo "<option value='$nama_obat'>$nama_obat - $kemasan - $harga</option>";
                            }

                            // Free the result set
                            mysqli_free_result($result);
                        } else {
                            // Handle the error if the query fails
                            echo "Error: " . mysqli_error($koneksi);
                        }

                        // Close the database connection
                        mysqli_close($koneksi);
                    ?>
                </select>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
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

<script>
  function updateObatLabel() {
    var selectedObat = document.getElementById("exampleSelectBorder").value;
    document.getElementById("obat").value = selectedObat;
  }
</script>

</body>
</html>

<?php
        session_start();
        include('../conf/config.php');
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Capture and sanitize form data
            $tanggal_periksa = mysqli_real_escape_string($koneksi, $_POST['tanggal_periksa']);
            $catatan = mysqli_real_escape_string($koneksi, $_POST['catatan']);
            $pilihObat = mysqli_real_escape_string($koneksi, $_POST['pilihObat']);
    
            // Insert data into 'periksa' table
            $insertPeriksaQuery = "INSERT INTO periksa (id_daftar_poli, tgl_periksa, catatan, biaya_periksa) VALUES ('$no_antrian', '$tanggal_periksa', '$catatan', 0)";
            mysqli_query($koneksi, $insertPeriksaQuery);
    
            // Get the last inserted ID from 'periksa' table
            $lastPeriksaID = mysqli_insert_id($koneksi);
    
            // Insert data into 'detail_periksa' table
            $insertDetailPeriksaQuery = "INSERT INTO detail_periksa (id_periksa, id_obat) VALUES ('$lastPeriksaID', (SELECT id FROM obat WHERE nama_obat = '$pilihObat'))";
            mysqli_query($koneksi, $insertDetailPeriksaQuery);
        }
    ?>