<?php
require_once "databuku_form.php";
require_once "db.php"; // koneksi database

//ambil data yang di input dari form disimpan ke variabel
$id = $_POST['id'];
$categories_id = $_POST['categories_id'];
$nama_buku = $_POST['nama_buku'];
$pengarang = $_POST['pengarang'];
$harga = $_POST['harga'];
$gambar = $_FILES['gambar']['name'];
$picture = $_FILES['gambar']['tmp_name'];

move_uploaded_file($picture, 'uploads/' . $gambar);

$sql = "INSERT INTO buku (id, nama_buku, categories_id, pengarang, harga, gambar) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isisis", $id, $nama_buku, $categories_id, $pengarang, $harga, $gambar);

if ($stmt->execute()) {
    echo "<script> 
    alert('Data Buku Berhasil Ditambahkan!');
    location.href = 'databuku_form.php';
    </script>";
$stmt->close();
} else {
    echo "<script> 
    alert('Gagal Menambahkan Data Buku: " . $stmt->error . "');
    location.href = 'databuku_form.php';
    </script>";
$stmt->close();
}


$stmt->close();
$conn->close();
?>








<!-- require_once "db.php"; // koneksi database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_buku = $_POST['nama_buku'];
    $pengarang = $_POST['pengarang'];
    $harga = $_POST['harga'];
    $gambar = $_POST['gambar'];

    // Upload gambar
    $gambar = $_FILES['gambar']['name'];
    $tmp_name = $_FILES['gambar']['tmp_name'];
    $folder = "uploads/";

    if (!is_dir($folder)) {
        mkdir($folder, 0777, true);
    }

    $target_file = $folder . basename($gambar);

    if (move_uploaded_file($tmp_name, $target_file)) {
        $sql = "INSERT INTO buku (nama_buku, pengarang, harga, gambar) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssis", $nama_buku, $pengarang, $harga, $gambar);

        if ($stmt->execute()) {
            echo  "<script> 
            alert ('Data Buku Berhasil Ditambahkan!');
            location.href = 'databuku_form.php';
            </script>";
        } else {
            echo  "<script> 
            alert ('Gagal Menambahkan Data Buku!');
            location.href = 'databuku_form.php';
            </script>";
        }

        $stmt->close();
    } else {
        echo  "<script> 
        alert ('Gagal Menambahkan Gambar Buku!');
        location.href = 'databuku_form.php';
        </script>";
    }
}
$conn->close();
?> -->

