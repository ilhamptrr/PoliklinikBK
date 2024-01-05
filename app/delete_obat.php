<?php
include('../conf/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_obat'])) {
    $obatId = $_POST['obat_id'];

    // Delete data from the obat table
    $query = "DELETE FROM obat WHERE id=?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, 'i', $obatId);

    if (mysqli_stmt_execute($stmt)) {
        // Data deleted successfully
        echo "Success";
    } else {
        // Error in deleting data
        echo "Error: " . mysqli_error($koneksi);
    }

    mysqli_stmt_close($stmt);
}
?>
