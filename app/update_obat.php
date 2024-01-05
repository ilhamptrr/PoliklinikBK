<?php
include('../conf/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_obat'])) {
    $editedNamaObat = mysqli_real_escape_string($koneksi, $_POST['edited_nama_obat']);
    $editedKemasan = mysqli_real_escape_string($koneksi, $_POST['edited_kemasan']);
    $editedHarga = mysqli_real_escape_string($koneksi, $_POST['edited_harga']);

    $obatId = $_POST['obat_id'];

    // Update data in the obat table using prepared statement
    $query = "UPDATE obat SET nama_obat=?, kemasan=?, harga=? WHERE id=?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, 'sssi', $editedNamaObat, $editedKemasan, $editedHarga, $obatId);

    if (mysqli_stmt_execute($stmt)) {
        // Data updated successfully
        echo "Success";
    } else {
        // Error in updating data
        echo "Error: " . mysqli_error($koneksi);
    }

    mysqli_stmt_close($stmt);
}
?>
