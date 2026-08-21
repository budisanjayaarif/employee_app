<?php
session_start();
include "../config.php";

$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_query($koneksi,"SELECT * FROM users WHERE username='$username'");
$d = mysqli_fetch_assoc($data);

// cek user ditemukan
if($d){

    // cek password
    if(password_verify($password, $d['password'])){

        $_SESSION['login'] = true;
        $_SESSION['id'] = $d['id']; // 🔥 WAJIB
        $_SESSION['username'] = $d['username'];
        $_SESSION['role'] = $d['role'];

        header("location:../index.php");
        exit;

    } else {
        echo "Password salah!";
    }

} else {
    echo "Username tidak ditemukan!";
}
?>