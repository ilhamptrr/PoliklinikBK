<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Mengelola Dokter</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Mengelola Dokter</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<!-- /.content-header -->

<!-- Main content -->
<form>
  <div class="card-body">

    <!-- Nama Dokter -->
    <div class="form-group">
      <label for="namaDokter">Nama Dokter</label>
      <input type="text" class="form-control" id="namaDokter" placeholder="Nama Dokter" disabled>
    </div>

    <!-- Alamat -->
    <div class="form-group">
      <label for="alamat">Alamat</label>
      <input type="text" class="form-control" id="alamat" placeholder="Alamat" disabled>
    </div>

    <!-- Nomor Handphone -->
    <div class="form-group">
      <label for="no_hp">Nomor Handphone</label>
      <input type="text" class="form-control" id="no_hp" placeholder="Nomor Handphone" disabled>
    </div>

    <!-- Poli -->
    <div class="form-group">
      <label for="exampleSelectBorder">Poli</label>
      <select class="custom-select form-control-border" id="exampleSelectBorder" disabled>
        <option>Pilih Poli</option>  
        <option>Anak</option>
        <option>Gigi</option>
        <option>Penyakit Dalam</option>
      </select>
    </div>
  </div>

  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Simpan</button>
    <button type="submit" class="btn btn-primary">Reset</button>
  </div>
</form>
<!-- /.content -->

