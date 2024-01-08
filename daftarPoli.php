<!DOCTYPE html>
<html lang="en">


<?php
    session_start();
    include('conf/config.php');

    // Initialize variables for messages
    $success_message = $error_message = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Process form submission
        $no_rm = $_POST['no_rm'];
        $pilih_poli = $_POST['pilih_poli'];
        $pilih_jadwal = $_POST['pilih_jadwal'];
        $keluhan = $_POST['keluhan'];

        // Check if the provided Nomor Rekam Medis (no_rm) exists
        $query_check_pasien = "SELECT id FROM pasien WHERE no_rm = '$no_rm'";
        $result_check_pasien = mysqli_query($koneksi, $query_check_pasien);

        if ($result_check_pasien && mysqli_num_rows($result_check_pasien) > 0) {
            // Fetch pasien ID based on the provided Nomor Rekam Medis (no_rm)
            $row_pasien_id = mysqli_fetch_assoc($result_check_pasien);
            $id_pasien = $row_pasien_id['id'];

            // Insert data into daftar_poli table
            $query_insert = "INSERT INTO daftar_poli (id_pasien, id_jadwal, keluhan, no_antrian) VALUES ('$id_pasien', '$pilih_jadwal', '$keluhan', 0)";
            $result_insert = mysqli_query($koneksi, $query_insert);

            if ($result_insert) {
                // Ambil nomor antrian yang baru saja dibuat
                $query_get_antrian = "SELECT no_antrian FROM daftar_poli WHERE id_pasien = '$id_pasien' AND id_jadwal = '$pilih_jadwal'";
                $result_get_antrian = mysqli_query($koneksi, $query_get_antrian);

                if ($result_get_antrian && mysqli_num_rows($result_get_antrian) > 0) {
                    $row_antrian = mysqli_fetch_assoc($result_get_antrian);
                    $no_antrian = $row_antrian['no_antrian'];

                    // Tampilkan pesan sukses bersama nomor antrian
                    $success_message = "Pendaftaran berhasil!<br>Nomor Antrian Anda adalah: $no_antrian";
                } else {
                    // Jika gagal mendapatkan nomor antrian, tampilkan pesan sukses tanpa nomor antrian
                    $success_message = "Pendaftaran berhasil!";
                }
            } else {
                $error_message = "Gagal menambahkan data. Silakan coba lagi.";
            }
        } else {
            $error_message = "Nomor Rekam Medis tidak terdaftar. Silakan cek kembali.";
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Fetch and update the list of schedules based on the selected Poli
            document.getElementById('pilih_poli').addEventListener('change', function () {
                var selectedPoliId = this.value;

                // Fetch data from the 'jadwal_periksa' table based on the selected Poli
                fetch('fetch_jadwal.php?id_poli=' + selectedPoliId)
                    .then(response => response.json())
                    .then(data => {
                        var jadwalSelect = document.getElementById('pilih_jadwal');
                        jadwalSelect.innerHTML = '';

                        data.forEach(function (schedule) {
                            var option = document.createElement('option');
                            option.value = schedule.id_dokter;
                            option.text = schedule.dokter_nama + ' - ' + schedule.hari + ' - ' + schedule.jam_mulai + ' - ' + schedule.jam_selesai;
                            jadwalSelect.add(option);
                        });
                    })
                    .catch(error => console.error('Error fetching schedules:', error));
            });

            // Trigger the change event to populate schedules initially
            document.getElementById('pilih_poli').dispatchEvent(new Event('change'));
        });
    </script>

</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Daftar Poli</h3>
            </div>

            <form action="" method="post">
                <div class="card-body">

                <?php
                    if ($success_message) {
                        echo '<div class="alert alert-success" role="alert">' . $success_message . '</div>';
                    } elseif ($error_message) {
                        echo '<div class="alert alert-danger" role="alert">' . $error_message . '</div>';
                    }
                ?>

                    <!-- Nomor Rekam Medis -->
                    <div class="form-group">
                        <label for="no_rm">Nomor Rekam Medis</label>
                        <p>Jika Anda belum memiliki Nomor Rekam Medis silahkan daftar <a href="daftarPasien.php" class="text-center"> di sini</a>.</p>
                        <input type="text" class="form-control" name="no_rm" placeholder="Nomor Rekam Medis">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleSelectBorder">Pilih Poli</label>
                        <select class="custom-select form-control-border" name="pilih_poli" id="pilih_poli">
                            <?php
                                // Fetch data from the 'poli' table
                                $query_poli = "SELECT id, nama_poli, keterangan FROM poli";
                                $result_poli = mysqli_query($koneksi, $query_poli);

                                while ($row_poli = mysqli_fetch_assoc($result_poli)) {
                                    $id_poli = $row_poli['id'];
                                    $nama_poli = $row_poli['nama_poli'];
                                    $keterangan = $row_poli['keterangan'];
                                    echo "<option value='$id_poli'>$nama_poli - $keterangan</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <!-- Pilih Jadwal -->
                    <div class="form-group">
                        <label for="exampleSelectBorder">Pilih Jadwal</label>
                        <select class="custom-select form-control-border" name="pilih_jadwal" id="pilih_jadwal">
                            <?php
                                // Fetch data from the 'obat' table
                                $query = "SELECT jadwal.id_dokter, dokter.nama AS dokter_nama, jadwal.hari, jadwal.jam_mulai, jadwal.jam_selesai FROM jadwal_periksa jadwal JOIN dokter ON jadwal.id_dokter = dokter.id";
                                $result = mysqli_query($koneksi, $query);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id_dokter = $row['id_dokter'];
                                    $dokter_nama = $row['dokter_nama'];
                                    $hari = $row['hari'];
                                    $jam_mulai = $row['jam_mulai'];
                                    $jam_selesai = $row['jam_selesai'];
                                    echo "<option value='$id_dokter'>$dokter_nama - $hari - '$jam_mulai - $jam_selesai'</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="keluhan">Keluhan</label>
                        <textarea class="form-control" name="keluhan"></textarea>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" style="width: 100%;">Daftar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
