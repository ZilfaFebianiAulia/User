<?php
require_once 'db.php';

$id = $_GET['id'];
$nama_buku $_POST['nama_buku'];
$pengarang = $_POST['pengarang'];
$harga $_POST['harga'];

$gambar = $_FILES['gambar']['name'];
$picture = $_FILES['gambar']['tmp_name'];
$folder "uploads/". $gambar;
move_uploaded_file($picture, $folder);

if ($gambar) {
$sql = "UPDATE buku SET nama_buku='$nama_buku', pengarang='$pengarang', harga='$harga', gambar='$gambar' WHERE id=$id";
} else {
$sql = "UPDATE buku SET nama_buku ='$nama_buku', pengarang ='$pengarang', harga = '$harga' WHERE id=$id";
}

if ($conn->query($sql) === TRUE) {
header("Location: product_list.php");
} else {
    echo "Error: ". $sql ."<br>". $conn->error;
}

$conn->close();