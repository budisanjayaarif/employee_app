<?php
include "../config.php";
session_start();

// proteksi login
if(!isset($_SESSION['login'])){
    header("location:../auth/login.php");
    exit;
}

// batasi hanya admin
if($_SESSION['role'] != 'admin'){
    echo "Hanya admin yang bisa hapus!";
    exit;
}

// baru jalankan hapus
$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM karyawan WHERE id='$id'");

header("location:index.php");
?>