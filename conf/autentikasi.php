<?php
    session_start();
    include('config.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek apakah pengguna adalah admin
    $queryAdmin = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
    if (mysqli_num_rows($queryAdmin) == 1) {
        header('location:../app/dashboardAdmin.php');
        $user = mysqli_fetch_array($queryAdmin);
        $_SESSION['nama'] = $user['nama'];
        exit();
    }

    // Cek apakah pengguna adalah dokter
    $queryDokter = mysqli_query($koneksi, "SELECT * FROM dokter WHERE username='$username' AND password='$password'");
    if (mysqli_num_rows($queryDokter) == 1) {
        header('location:../app/dashboardDokter.php');
        $user = mysqli_fetch_array($queryDokter);
        $_SESSION['nama'] = $user['nama'];
        exit();
    }

    // Cek apakah pengguna adalah dokter
    $queryPasien = mysqli_query($koneksi, "SELECT * FROM dokter WHERE username='$username' AND password='$password'");
    if (mysqli_num_rows($queryPasien) == 1) {
        header('location:../app/dashboardPasien.php');
        $user = mysqli_fetch_array($queryPasien);
        $_SESSION['nama'] = $user['nama'];
        exit();
    }

    header('location:../');
?>
