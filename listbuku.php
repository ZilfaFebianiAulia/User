<?php
require_once "db.php";
$sql = "SELECT buku.*, categories.*, buku.id AS bukuId, categories.id as categoriesId FROM buku JOIN categories
ON buku.categories_id = categories.id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html> 
<head>
    <title>List Buku</title>
</head>
<body>

<style>
body {
  font-family: Georgia, 'Times New Roman', Times, serif;
  background: #f5f6fa;
  margin: 30px;
  color: #4d1515ff;
}

h2 {
  margin-bottom: 20px;
  text-align: center;
  font-weight: 750;
  font-family: Georgia, 'Times New Roman', Times, serif;
}

a {
  display: inline-block;
  margin-bottom: 20px;
  text-decoration: none;
  font-weight: 500;
  color: #e75c5cff;
  transition: 0.2s;
}

a:hover {
  text-decoration: underline;
}

table {
  border-collapse: separate;
  width: 100%;
  margin: 0 auto;
  background: #fff;
  border-radius: 15px;
  overflow: hidden;
  box-shadow: 0 6px 20px rgba(0,0,0,0.1);
}

table tr:first-child td {
  background: #391717ff;
  color: #fff;
  font-weight: 700;
  text-align: center;
  padding: 14px;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

td {
  padding: 14px;
  text-align: center;
  border-bottom: 1px solid #eee;
  font-size: 17px;
}

tr:nth-child(even) td {
  background: #fafafa;
}

tr:hover td {
  background: #f9f0f0ff;
  transform: scale(1.01);
  transition: all 0.2s ease-in-out;
}

td img {
  width: 100px;
  height: auto;
  border-radius: 8px;
  box-shadow: 0 3px 6px rgba(0,0,0,0.15);
}
</style>


    <h2>Data Buku</h2>
    <a href="databuku_form.php">+ Tambah Buku Baru</a>
    <br><br>
    
<table border = "1">
    <tr>
        <td>Id Buku</td>
        <td>Nama Buku</td>
        <td>Categories</td>
        <td>Nama Pengarang</td>
        <td>Harga Buku</td>
        <td>Gambar Buku</td>
        <td>Edit Data</td>
        <td>Hapus Data</td>
    <tr>

        <?php while($buku = $result->fetch_assoc()): ?>
            <td><?= $buku['bukuId'] ?></td>
            <td><?= $buku['nama_buku'] ?></td>
            <td><?= $buku['name'] ?></td>
            <td><?= $buku['pengarang'] ?></td>
            <td><?= $buku['harga'] ?></td>
            <td>
                <?php if (!empty($buku['gambar'])): ?>
                    <img src="uploads/<?= $buku['gambar'] ?>" width="100">
                <?php else: ?>
                    (tidak ada gambar)
                <?php endif; ?>
            </td>
            <td><a href="edit_buku_form.php?id=<?= $buku['bukuId'] ?>">Edit</a></td>
            <td><a href="delete_buku.php?id=<?= $buku['bukuId'] ?>">Delete</a></td>
                
            
    </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>