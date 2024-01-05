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
          
          <!-- Dashboard -->
          <li class="nav-item">
            <a href="../app/dashboardAdmin.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
                <span class="right badge badge-success">Admin</span>
              </p>
            </a>
          </li>

          <!-- Dokter -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-solid fa-user-doctor"></i>
              <p>
                Dokter
                <span class="right badge badge-success">Admin</span>
              </p>
            </a>
          </li>

          <!-- Pasien -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-solid fa-user-injured"></i>
              <p>
                Pasien
                <span class="right badge badge-success">Admin</span>
              </p>
            </a>
          </li>

          <!-- Poli -->
          <li class="nav-item">
            <a href="#" class="nav-link">              
              <i class="nav-icon fas fa-hospital"></i>
              <p>
                Poli
                <span class="right badge badge-success">Admin</span>
              </p>
            </a>
          </li>

          <!-- Obat -->
          <li class="nav-item">
            <a href="../app/adminObat.php" class="nav-link">
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