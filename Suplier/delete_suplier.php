<?php
require_once 'db.php';

//ambil dari id dari url
$getproductid = $_GET['id_suplier'];

//query hapus data product berdasarkan id
$sql = "DELETE FROM Suplier WHERE id_suplier = $getproductid";

if ($conn->query($sql) === TRUE) {
header("Location: data_suplier.php");

} else {
echo "Error deleting record: $conn->error";
}

$conn->close();