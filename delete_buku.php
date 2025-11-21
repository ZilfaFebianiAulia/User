<?php
require_once 'db.php';

//ambil dari id dari url
$id = $_GET['id'];

//query hapus data product berdasarkan id
$sql = "DELETE FROM buku WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    header("Location: listbuku.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();