<?php
    session_start();
    include('config.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek apakah pengguna adalah admin
    $queryAdmin = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
    if (mysqli_num_rows($queryAdmin) == 1) {
        header('location:../app/dashboard.php?page=admin_dashboard');
        $user = mysqli_fetch_array($queryAdmin);
        $_SESSION['nama'] = $user['nama'];
        $_SESSION['level'] = $user['level'];
        exit();
    }

    // Cek apakah pengguna adalah dokter
    $queryDokter = mysqli_query($koneksi, "SELECT * FROM dokter WHERE username='$username' AND password='$password'");
    if (mysqli_num_rows($queryDokter) == 1) {
        header('location:../app/dashboard.php?page=dokter_dashboard');
        $user = mysqli_fetch_array($queryDokter);
        $_SESSION['id'] = $user['id'];
        $_SESSION['nama'] = $user['nama'];
        $_SESSION['level'] = $user['level'];
        exit();
    }

    header('location:../');
?>
