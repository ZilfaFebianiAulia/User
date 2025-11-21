<?php

//koneksi ke database (kalau mau bikin barun yang di ubah yang $db aja)
$host = 'localhost';
$db = 'latihanphp';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

//jika koneksi gagal, muncul teks error
if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}