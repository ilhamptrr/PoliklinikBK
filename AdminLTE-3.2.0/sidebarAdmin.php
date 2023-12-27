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
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="../AdminLTE-3.2.0/dashboardAdmin.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
                <span class="right badge badge-success">Admin</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../AdminLTE-3.2.0/adminDokter.php" class="nav-link">
              <i class="nav-icon fas fa-solid fa-user-doctor"></i>
              <p>
                Dokter
                <span class="right badge badge-success">Admin</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../AdminLTE-3.2.0/adminPasien.php" class="nav-link">
              <i class="nav-icon fas fa-solid fa-user-injured"></i>
              <p>
                Pasien
                <span class="right badge badge-success">Admin</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../AdminLTE-3.2.0/adminPoli.php" class="nav-link">              
              <i class="nav-icon fas fa-hospital"></i>
              <p>
                Poli
                <span class="right badge badge-success">Admin</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../AdminLTE-3.2.0/adminObat.php" class="nav-link">
              <i class="nav-icon fas fa-pills"></i>
              <p>
                Obat
                <span class="right badge badge-success">Admin</span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>