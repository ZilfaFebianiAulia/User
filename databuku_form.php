<?php
require_once 'db.php';
$sql = "SELECT * FROM categories";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" href="databukusyle.css" >
    <title>Data Buku</title>
</head>
<body>
    <form action="databuku.php" method="post" enctype="multipart/form-data">
        <label>Nama Buku</label><br>
        <input type= "text" name= "nama_buku" id="nama_buku" placeholder="input nama buku..."><br><br>
        <label>Categories</label><br>
        <select name ="categories_id" id="categories_id">
            <?php while($categories = $result->fetch_assoc()) { ?>
                <option value="<?= $categories['id'] ?>"><?= $categories['name'] ?></option>
            <?php } ?>
        </select><br><br>
        <label>Nama Pengarang</label><br>
        <input type= "text" name= "pengarang" id="pengarang" placeholder="input nama pengarang..."><br><br>
        <label>Harga Buku</label><br>
        <input type= "number" name= "harga" id="harga" placeholder="input harga buku..."><br><br>
        <label>Gambar Buku</label><br>
        <input type= "file" name= "gambar" id="gambar" placeholder="input gambar buku..."><br><br>
        <button type="submit">Tambahkan</button>
    </form>
    <br>
    <a href="listbuku.php">Lihat Data Buku</a>
</body>
</html>



<!-- 
<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
</head>
<body>
    <h2>Form Tambah Buku</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <label>Nama Buku:</label><br>
        <input type="text" name="nama_buku" placeholder="input nama buku..." required><br><br>

        <label>Pengarang:</label><br>
        <input type="text" name="pengarang" placeholder="input nama pengarang..." required><br><br>

        <label>Harga Buku:</label><br>
        <input type="number" name="harga" placeholder="input harga buku..." required><br><br>

        <label>Gambar Buku:</label><br>
        <input type="file" name="gambar" accept="image/*" required><br><br>

        <button type="submit">Simpan</button>
    </form>

    <br>
    <a href="list_buku.php">Lihat Data Buku</a>
</body>
</html> -->