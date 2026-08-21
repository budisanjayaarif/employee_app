<?php 
session_start(); 
include "../config.php"; 

// proteksi login
if(!isset($_SESSION['login'])){
    header("location:../auth/login.php");
    exit;
}
?>

<link rel="stylesheet" href="../assets/style.css">

<div class="overlay">

<div class="content-box" style="max-width:450px;">

<h2>➕ Tambah User</h2>

<form method="POST" action="proses.php">

<label>Username</label>
<input type="text" name="username" required>

<label>Password</label>
<input type="password" name="password" required>

<label>Nama</label>
<input type="text" name="nama" required>

<label>Jabatan</label>
<input type="text" name="jabatan">

<label>Domisili</label>
<textarea name="alamat" rows="3"></textarea>

<button type="submit" name="simpan" class="btn">💾 Simpan</button>

</form>

<br>

<a href="../index.php" class="btn">🏠 Home</a>
<a href="index.php" class="btn">🔙 Back</a>

</div>

</div>