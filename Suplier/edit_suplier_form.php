<?php
require_once 'db.php';
$getsuplierid = $_GET['id_suplier'];

$sql = "SELECT * FROM Suplier WHERE id_suplier = $getsuplierid";
$result = $conn->query($sql);

$suplier = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="edit.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Suplier</title>
</head>
<body>
<style>
    body {
        height: 600px;
        display: flex;
        justify-content: center;
        align-items: center;
        background: linear-gradient(180deg, #441414, #f43636);
    }

    label {
        font-family: Georgia, 'Times New Roman', Times, serif;
        font-weight: bold;
    }

    form {
        background: white;
        padding: 30px 40px;
        border-radius: 15px;
        box-shadow: 8px 16px rgba(0,0,0,0.2);
        width: 350px;
        text-align: center;
    }

    input {
        width: 100%;
        padding: 10px;
        margin: 8px -16px;
        border: 1px solid;
        border-radius: 8px;
        transition: 0.3s;
    }

    button {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border-radius: 8px;
        background: #350404;
        color: rgb(255, 255, 255);
        font-size: 16px;
        font-weight: bold;
        font-family: 'Times New Roman', Times, serif;
        transition: 0.3s;
    }

    button:hover {
        background: #2e0202;
    }

    a {
        padding: 5px 10px;
        width: 100%;
        text-decoration: none;
        color: black;
        font-size: 20px;
  
    }

</style>

    <div class="wrapper">
        <form action="edit_suplier.php?id=<?= $getsuplierid ?>" method="POST" enctype="multipart/form-data">
            <label for="nama">Nama Suplier</label><br>
            <input type="text" name="nama" value="<?= $suplier['nama']?>"><br><br>
            
            <label for="alamat">Alamat</label><br>
            <input name="alamat" id="alamat" value="<?= $suplier['alamat']?>"><br><br>
            
            <label for="kode_pos">Kode Pos</label><br>
            <input type="number" name="kode_pos" id="kode_pos" value="<?= $suplier['kode_pos'] ?>"><br><br>
            
            <label for="kota">Kota</label><br>
            <input type="text" name="kota" id="kota" value="<?= $suplier['kota'] ?>">
    
            <button type="submit">Update Data Suplier</button>
            <a href="data_suplier.php">Lihat Data Suplier</a>
        </form>
    </div>
</body>
</html>