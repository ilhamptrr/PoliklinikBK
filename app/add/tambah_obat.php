<?php
    include('./../../conf/config.php');
    $nama_obat = $_GET['nama_obat'];
    $kemasan = $_GET['kemasan'];
    $harga = $_GET['harga'];
    $query = mysqli_query($koneksi, "INSERT INTO `obat`(`id`, `nama_obat`, `kemasan`, `harga`) VALUES ('','$nama_obat','$kemasan','$harga')");
    header('location: ./../dashboard.php?page=admin_obat');
?>