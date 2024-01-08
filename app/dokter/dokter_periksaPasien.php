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
            <li class="breadcrumb-item active">Daftar Periksa Pasien</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<!-- /.content-header -->

<!-- Main content -->
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
            if ($_SESSION['level'] != 'dokter') {
              header('location:../');
              exit();
            }

            $idDokter = $_SESSION['id'];

            $query = "SELECT dp.no_antrian, p.nama AS nama_pasien, dp.keluhan
                      FROM daftar_poli dp
                      INNER JOIN pasien p ON dp.id_pasien = p.id
                      INNER JOIN jadwal_periksa jp ON dp.id_jadwal = jp.id
                      WHERE jp.id_dokter = $idDokter";
                      
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
                    echo '<a href="dashboard.php?page=dokter_formPeriksa&& id=' . $daftar_poli['no_antrian'] . '"><button type="submit" class="btn btn-warning">Edit</button></a>';
                  } else {
                    // Jika data belum disimpan, tampilkan Button Periksa
                    echo '<a href="dashboard.php?page=dokter_formPeriksa&& id=' . $daftar_poli['no_antrian'] . '"><button type="submit" class="btn btn-primary">Periksa</button></a>';
                  }
                  ?>
                </td>
              </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
<!-- /.content -->

