<?php
// require_once "login_form.php";
require_once "db.php";

//ambil data dari form simpan ke variable
$email = $_POST['email'];
$password = $_POST['password'];

//ambil semua data dari tabel users
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows >= 1) {
//mengambil 1 baris hasil query dalam bentuk array asosiatif
    $row = $result->fetch_assoc();

    if (password_verify($password, $row['password'])) {
        echo "Login Berhasil";
//echo "Login Berhasil! Selamat datang," . htmlspecialchars($row['nama]);
    } else {
        echo "Password salah";
    } 
} else {
    echo "Email tidak ditemukan";
}

$stmt->close();
$conn->close();