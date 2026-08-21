<?php
session_start();
include "../config.php";

// tampilkan error (opsional, boleh dihapus saat sudah normal)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 🔐 proteksi login
if(!isset($_SESSION['login'])){
    header("location:../auth/login.php");
    exit;
}

// 🔎 cek id dari URL
if(!isset($_GET['id'])){
    echo "ID tidak ditemukan!";
    exit;
}

$id = $_GET['id'];

// 📦 ambil data dari database
$q = mysqli_query($koneksi,"SELECT * FROM users WHERE id='$id'");
$user = mysqli_fetch_assoc($q);

// ❗ cek data ada atau tidak
if(!$user){
    echo "Data tidak ditemukan!";
    exit;
}

// 🔐 PEMBATASAN AKSES
// admin bebas, user hanya boleh edit dirinya sendiri
if($_SESSION['role'] != 'admin'){
    if($user['id'] != $_SESSION['id']){
        echo "Tidak punya akses!";
        exit;
    }
}
?>

<h2>Edit User</h2>

<form method="POST" action="proses.php">
    <input type="hidden" name="id" value="<?= $user['id']; ?>">

    Nama:<br>
    <input type="text" name="nama" value="<?= $user['nama']; ?>" required><br><br>

    Jabatan:<br>
    <input type="text" name="jabatan" value="<?= $user['jabatan']; ?>" required><br><br>

    Alamat:<br>
    <textarea name="alamat" required><?= $user['alamat']; ?></textarea><br><br>

    <button type="submit" name="edit">Update</button>
</form>