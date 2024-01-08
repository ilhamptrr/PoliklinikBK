<!DOCTYPE html>
<html lang="en">
<?php
  session_start();
  include('../conf/config.php'); // Include database connection

  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_obat'])) {
    // Get form data
    $nama_obat = mysqli_real_escape_string($koneksi, $_POST['nama_obat']);
    $kemasan = mysqli_real_escape_string($koneksi, $_POST['kemasan']);
    $harga = mysqli_real_escape_string($koneksi, $_POST['harga']);

    // Validate data (you should enhance this part based on your requirements)

    // Insert data into the obat table using prepared statement
    $query = "INSERT INTO obat (nama_obat, kemasan, harga) VALUES (?, ?, ?)";
    
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, 'sss', $nama_obat, $kemasan, $harga);

    if (mysqli_stmt_execute($stmt)) {
        // Data inserted successfully
        header("Location:../app/adminObat.php"); // Redirect to a success page
        exit();
    } else {
        // Error in inserting data
        echo "Error: " . mysqli_error($koneksi);
    }

    mysqli_stmt_close($stmt);
  }
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
    <form method="post" action="">
      <div class="card-body">
        <div class="form-group">
          <label for="nama_obat">Nama Obat</label>
          <input type="text" class="form-control" name="nama_obat" placeholder="Nama Obat">
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
        <button type="submit" class="btn btn-primary" name="submit_obat">Simpan</button>
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
              <th style="width: 200px">Aksi</th>
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
                <button type="button" class="btn btn-success btn-edit">Edit</button>
                <button type="button" class="btn btn-danger btn-delete">Hapus</button>
              </td>
            </tr>
            <?php }?>
          </tbody>
        </table>
      </div>

      <!-- Edit Modal -->
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <!-- Edit form can go here -->
                <div class="form-group">
                  <label for="edit_nama_obat">Nama Obat</label>
                  <input type="text" class="form-control" id="edit_nama_obat" value="">
                </div>
                <div class="form-group">
                  <label for="edit_kemasan">Kemasan</label>
                  <input type="text" class="form-control" id="edit_kemasan" value="">
                </div>
                <div class="form-group">
                  <label for="edit_harga">Harga</label>
                  <input type="text" class="form-control" id="edit_harga" value="">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnSimpan">Simpan</button>
              </div>
            </div>
          </div>
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

<!-- Bootstrap and jQuery libraries -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>

  <script>
    $(document).ready(function () {
      $('.btn-edit').on('click', function () {
          var namaObat = $(this).closest('tr').find('td:eq(1)').text();
          var kemasan = $(this).closest('tr').find('td:eq(2)').text();
          var harga = $(this).closest('tr').find('td:eq(3)').text();
          var obatId = $(this).closest('tr').find('td:eq(0)').text();

          $('#editModal #edit_nama_obat').val(namaObat);
          $('#editModal #edit_kemasan').val(kemasan);
          $('#editModal #edit_harga').val(harga);
          $('#editModal #obat_id').val(obatId);

          $('#editModal').modal('show');
      });

      $('#btnSimpan').on('click', function () {
          var editedNamaObat = $('#edit_nama_obat').val();
          var editedKemasan = $('#edit_kemasan').val();
          var editedHarga = $('#edit_harga').val();
          var obatId = $('#obat_id').val();

          $.ajax({
              url: 'update_obat.php',
              type: 'POST',
              data: {
                  edit_obat: true,
                  obat_id: obatId,
                  edited_nama_obat: editedNamaObat,
                  edited_kemasan: editedKemasan,
                  edited_harga: editedHarga
              },
              success: function (response) {
                  console.log(response);
                  // You can reload the page or update the table without refreshing
                  // Example: window.location.reload();
              },
              error: function (error) {
                  console.error('Error updating record:', error);
              },
          });

          $('#editModal').modal('hide');
      });

      $('.btn-delete').on('click', function () {
          var obatId = $(this).closest('tr').find('td:eq(0)').text();

          if (confirm('Are you sure you want to delete this record?')) {
              $.ajax({
                  url: 'delete_obat.php',
                  type: 'POST',
                  data: {
                      delete_obat: true,
                      obat_id: obatId
                  },
                  success: function (response) {
                      console.log(response);
                      // You can reload the page or update the table without refreshing
                      // Example: window.location.reload();
                  },
                  error: function (error) {
                      console.error('Error deleting record:', error);
                  }
              });
          }
      });
  });
  </script>

</body>
</html>
