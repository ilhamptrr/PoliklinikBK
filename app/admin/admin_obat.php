

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
<form method="get" action="add/tambah_obat.php">
    <div class="card-body">
        <div class="form-group">
            <label for="nama_obat">Nama Obat</label>
            <input type="text" class="form-control" name="nama_obat" placeholder="Nama Obat" required>
        </div>
        <div class="form-group">
            <label for="kemasan">Kemasan</label>
            <input type="text" class="form-control" name="kemasan" placeholder="Kemasan" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="text" class="form-control" name="harga" placeholder="Harga" required>
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary" name="submit_obat">Simpan</button>
    </div>
</form>

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
                    <a href="">
                        <button type="button" class="btn btn-success btn-edit">Edit</button>
                    </a>
                    <a href="delete/hapus_obat.php?id=<?php echo $obat['id'];?>">
                        <button type="button" class="btn btn-danger btn-delete">Hapus</button>
                    </a>
                    
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>

<!-- /.content -->

