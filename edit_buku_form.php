<?php
require_once 'db.php';
$id = $_GET['id'];

$sql = "SELECT * FROM buku WHERE id= bukuId";
$result = $conn->query($sql);

$products = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel ="stylesheet" href="edit_bukustyle.css" >
</head>
<body>
        <form action="edit_buku.php?id=<?= $bukuId ?>" method="POST" enctype="multipart/form-data">
            <label for="nama_buku">Nama Buku</label><br>
            <input type="text" name="nama_buku" value="<?= $buku['nama_buku']?>"><br><br>
            
            <label for="pengarang">Pengarang</label><br>
            <textarea name="pengarang" id="pengarang"><?= $buku['pengarang'] ?></textarea> <br> <br>
            
            <label for="harga">Harga Buku</label><br>
            <input type="number" name="harga" id="harga" value="<?= $buku['harga'] ?>"><br><br>
            
            <label for="gambar">Gambar Buku</label><br>
            <input type="file" name="gambar" id="gambar"><br><br>
            <img src="uploads/<?= $buku['gambar']?>" alt="" width="55%"><br><br>
    
            <button type="submit">Update Buku</button>
        </form>
</body>
</html>
