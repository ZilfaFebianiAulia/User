<?php
require_once 'db.php';

$getsuplierid = $_GET['id'];
$nama= $_POST['nama'];
$alamat = $_POST['alamat'];
$kode_pos = $_POST['kode_pos'];
$kota = $_POST['kota'];

    if ($getsuplierid > 0) {
    $sql = "UPDATE Suplier SET nama='$nama', alamat='$alamat', kode_pos='$kode_pos', kota='$kota' WHERE id_suplier=$getsuplierid";
    } else {
    echo "Update Gagal.";
    }
    if ($conn->query($sql) === TRUE) {
        header("Location: data_suplier.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

$conn->close();
?>
