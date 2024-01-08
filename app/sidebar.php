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
      <?php
        if($_SESSION['level']=='admin'){
          include('menu/admin_menu.php'); 
        }
        else{
          include('menu/dokter_menu.php');
        }
      ?>
      <!-- /.sidebar-menu -->
    </div>