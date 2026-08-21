<?php 
session_start(); 
include "../config.php"; 

// proteksi login 
if(!isset($_SESSION['login'])){ 
    header("location:login.php"); 
    exit; 
} 
?>

<link rel="stylesheet" href="../assets/style.css">

<div class="overlay">

<div class="content-box" style="max-width:400px;">

<h2>🔑 Ganti Password</h2>

<?php
// ✅ NOTIF
if(isset($_GET['msg'])){
    if($_GET['msg'] == 'success'){
        echo "<p style='color:green;font-weight:bold;'>✅ Password berhasil diubah</p>";
    } elseif($_GET['msg'] == 'error'){
        echo "<p style='color:red;font-weight:bold;'>❌ Password lama salah</p>";
    }
}
?>

<form method="POST" action="proses_ganti_password.php">

<label>Password Lama</label>
<input type="password" name="old_password" required>

<label>Password Baru</label>
<input type="password" name="new_password" required>

<button type="submit" class="btn">💾 Simpan</button>

</form>

<br>

<a href="../index.php" class="btn">🏠 Dashboard</a>

</div>

</div>