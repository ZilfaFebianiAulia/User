<?php
require_once "register_form.php";
require_once "db.php";

//ambil data yang diinput dari form disimpan ke variable
$email =$_POST['email'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$role = 'customer';

//email dah terdaftar blom
$cek = $conn->prepare("SELECT email FROM users WHERE email = ?");
$cek->bind_param("s", $email);
$cek->execute();
$cek->store_result();

if ($cek->num_rows > 0) {
    echo "<script>
    alert('Email sudah terdaftar, silakan gunakan email lain!');
    location.href = 'register_form.php';
    </script>";
    $cek->close();
    $conn->close();
    exit; 
}
$cek->close();

//BIAR PW MINIMAL 8 KARAKTER
if (strlen($password) <  8) {
    echo "<script>
        alert('Password minimal 8 karakter!');
        location.href='register_form.php';
    </script>";
    exit();
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// SIMPAN data baru
$sql = $conn->prepare("INSERT INTO users (email, password, nama, alamat, role) VALUES (?, ?, ?, ?, ?)");
$sql->bind_param("sssss", $email, $hashedPassword, $nama, $alamat, $role);

if ($sql->execute()) {
    echo "<script>
        alert('Registrasi Berhasil');
        location.href='login_form.php';
    </script>";
} else {
    echo "Error: " . $sql->error;
}


//query sql untuk menyimpan data ke dalam tabel users
//Kolom yang akan diisi: email, password, nama, alamat, dan role
//Tanda tanya ? adalah placeholder yang akan digantikan dengan nilai sebenarnya nanti menggunakan prepared statement
//ini membantu mencegah SQL injection
//user berarti nama tabel yang ada di database
$sql = "INSERT INTO users (email, password, nama, alamat, role) VALUES (?, ?, ?, ?, ?)";

//$conn adalah object koneeksi ke database
//prepare($sql) membuat prepared statement dari quary sql tadi
//artinya quary disiapkan terlebih dahulu, lalu nilainy di masukan secara aman
$stmt = $conn->prepare($sql);


//bind_param()digunakan untuk mengikat nilai ke placeholder ? dalam query
$stmt->bind_param("sssss", $email, $password, $nama, $alamat, $role);

if ($stmt->execute()) {
    echo "<script> alert ('Register succesful');
        location.href = 'login_form.php';
    </script>";
} else {
    echo "<script> alert ('Register Error:');
        location.href = 'register_form.php;
    </script>". $stmt->error;
}

$stmt->close();
$conn->close();

?>