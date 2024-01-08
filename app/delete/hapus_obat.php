<?php
    include('./../../conf/config.php');
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM obat WHERE id='$id'");
    header('location: ./../dashboard.php?page=admin_obat');
?>