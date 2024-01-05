<?php
    include('conf/config.php');

    if (isset($_GET['id_poli'])) {
        $id_poli = $_GET['id_poli'];

        $query_jadwal = "SELECT jadwal.id_dokter, dokter.nama AS dokter_nama, jadwal.hari, jadwal.jam_mulai, jadwal.jam_selesai FROM jadwal_periksa jadwal JOIN dokter ON jadwal.id_dokter = dokter.id WHERE dokter.id_poli = $id_poli";
        $result_jadwal = mysqli_query($koneksi, $query_jadwal);

        $schedules = array();

        while ($row_jadwal = mysqli_fetch_assoc($result_jadwal)) {
            $schedules[] = $row_jadwal;
        }

        echo json_encode($schedules);
    } else {
        echo json_encode(array());
    }
?>
