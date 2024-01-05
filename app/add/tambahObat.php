<?php
    include('./../conf/config.php');
    $namaObat = $_GET['namaObat'];
    $kemasan = $_GET['kemasan'];
    $harga = $_GET['harga'];
    $query = mysqli_query($koneksi, "INSERT INTO `obat`(`id`, `nama_obat`, `kemasan`, `harga`) VALUES ('','$namaObat','$kemasan','$harga')")
?>