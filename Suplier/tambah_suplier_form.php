<?php
require_once 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" href="tambah_suplier.css" >
    <title>Data Suplier</title>
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
        background: white;
        padding: 20px 30px;
        border-radius: 10px;
        box-shadow: 8px 16px rgba(0,0,0,0.2);
        width: 100px;
        text-align: center;
        margin-left: 50px;
        text-decoration: none;
        color: black;
        font-size: 20px;
    }

</style>
    <form action="tambah_suplier.php" method="post" enctype="multipart/form-data">
        <label>Nama Suplier</label><br>
        <input type= "text" name= "nama" id="nama" placeholder="input nama suplier..."><br><br>
        <label>Alamat</label><br>
        <input type= "text" name= "alamat" id="alamat" placeholder="input alamat..."><br><br>
        <label>Kode Pos</label><br>
        <input type= "number" name= "kode_pos" id="kode_pos" placeholder="input kode pos..."><br><br>
        <label>Kota</label><br>
        <input type= "text" name= "kota" id="kota" placeholder="input kota..."><br><br>
        <button type="submit">Tambahkan</button>
    </form>
    <br>
    <a href="data_suplier.php">Lihat Data Suplier</a>
</body>
</html>