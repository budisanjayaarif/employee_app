<?php
session_start();
include "../config.php";

// proteksi login
if(!isset($_SESSION['login'])){
    header("location:../auth/login.php");
    exit;
}

// ==================
// PROSES EDIT
// ==================
if(isset($_POST['edit'])){

    $id      = $_POST['id'];
    $nama    = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $alamat  = $_POST['alamat'];

    // ambil data user yang mau diedit
    $q = mysqli_query($koneksi,"SELECT * FROM users WHERE id='$id'");
    $user = mysqli_fetch_assoc($q);

    if(!$user){
        echo "Data tidak ditemukan!";
        exit;
    }

    // 🔐 VALIDASI AKSES
    if($_SESSION['role'] != 'admin'){
        if($user['id'] != $_SESSION['id']){
            echo "Akses ditolak!";
            exit;
        }
    }

    // proses update
    mysqli_query($koneksi,"UPDATE users SET 
        nama='$nama',
        jabatan='$jabatan',
        alamat='$alamat'
        WHERE id='$id'
    ");

    header("location:index.php");
}
?>