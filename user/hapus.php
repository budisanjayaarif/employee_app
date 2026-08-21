<?php
session_start();
include "../config.php";

// cek login
if(!isset($_SESSION['login'])){
    header("location:../auth/login.php");
    exit;
}

// hanya admin
if($_SESSION['role'] != 'admin'){
    echo "Hanya admin yang bisa hapus user!";
    exit;
}

$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM users WHERE id='$id'");

header("location:index.php");
?>