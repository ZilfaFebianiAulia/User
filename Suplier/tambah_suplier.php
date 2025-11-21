<?php
require_once "tambah_suplier_form.php";
require_once "db.php"; // koneksi database

//ambil data yang di input dari form disimpan ke variabel
$id_suplier = $_POST['id_suplier'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$kode_pos = $_POST['kode_pos'];
$kota = $_POST['kota'];

$sql = "INSERT INTO Suplier (id_suplier, nama, alamat, kode_pos, kota) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("issis", $id_suplier, $nama, $alamat, $kode_pos, $kota);

if ($stmt->execute()) {
    echo "<script> 
    alert('Data Suplier Berhasil Ditambahkan!');
    location.href = 'tambah_suplier_form.php';
    </script>";
$stmt->close();
} else {
    echo "<script> 
    alert('Gagal Menambahkan Data Suplier: " . $stmt->error . "');
    location.href = 'tambah_suplier_form.php';
    </script>";
$stmt->close();
}


$stmt->close();
$conn->close();
?>
