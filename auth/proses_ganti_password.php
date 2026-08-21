<?php
session_start();
include "../config.php";

// proteksi login
if(!isset($_SESSION['login'])){
    header("location:login.php");
    exit;
}

$id = $_SESSION['id'];
$old = $_POST['old_password'];
$new = $_POST['new_password'];

// ambil data user
$q = mysqli_query($koneksi,"SELECT * FROM users WHERE id='$id'");
$user = mysqli_fetch_assoc($q);

// cek password lama
if(!password_verify($old, $user['password'])){
    echo "Password lama salah!";
    exit;
}

// hash password baru
$new_password = password_hash($new, PASSWORD_DEFAULT);

// update password
mysqli_query($koneksi,"UPDATE users SET password='$new_password' WHERE id='$id'");

echo "Password berhasil diubah!<br>";
echo "<a href='../index.php'>Kembali ke Dashboard</a>";
?>