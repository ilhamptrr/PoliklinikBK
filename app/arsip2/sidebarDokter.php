<div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle border border-dark" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['nama']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <!-- Dokter | Dashboard -->
          <li class="nav-item">
            <a href="../app/dashboardDokter.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
                <span class="right badge badge-danger">Dokter</span>
              </p>
            </a>
          </li>

          <!-- Dokter | Dashboard -->
          <li class="nav-item">
            <a href="../app/dokterJadwalPeriksa.php" class="nav-link">
              <i class="nav-icon fas fa-solid fa-clipboard-list"></i>
              <p>
                Jadwal Periksa
                <span class="right badge badge-danger">Dokter</span>
              </p>
            </a>
          </li>

          <!-- Dokter | Memeriksa Pasien -->
          <li class="nav-item">
            <a href="../app/dokterPeriksaPasien.php" class="nav-link">
              <i class="nav-icon fas fa-light fa-stethoscope"></i>
              <p>
                Memeriksa Pasien
                <span class="right badge badge-danger">Dokter</span>
              </p>
            </a>
          </li>

          <!-- Dokter | Riwayat Pasien -->
          <li class="nav-item">
            <a href="../app/dokterRiwayatPasien.php" class="nav-link">              
              <i class="nav-icon fas fa-solid fa-clipboard"></i>
              <p>
                Riwayat Pasien
                <span class="right badge badge-danger">Dokter</span>
              </p>
            </a>
          </li>

          <!-- Dokter | Profil -->
          <li class="nav-item">
            <a href="../app/dokterProfil.php" class="nav-link">
              <i class="nav-icon fas fa-solid fa-user"></i>
              <p>
                Profil
                <span class="right badge badge-danger">Dokter</span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>