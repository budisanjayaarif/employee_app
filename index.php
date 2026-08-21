<?php
session_start();
if(!isset($_SESSION['login'])){
    header("location:auth/login.php");
}
?>
<link rel="stylesheet" href="assets/style.css">
<style>
ol li {
    margin-bottom: 12px;
    font-size: 20px;
    font-weight: bold;
}

a {
    text-decoration: none;
    color: #333;
    padding: 5px 10px;
    display: inline-block;
    border-radius: 5px;
}

a:hover {
    background: #007bff;
    color: white;
}
</style>

<h2>Dashboard Karyawan</h2>
<ol style="line-height: 2;">
    <li><a href="karyawan/index.php">Data Karyawan</a></li>
    <li><a href="user/index.php">Data User</a></li>
    <li><a href="auth/ganti_password.php">Ganti Password</a></li>

    <?php if($_SESSION['role'] == 'admin'){ ?>
        <li><a href="user/tambah.php">Tambah User</a></li>
    <?php } ?>

    <li><a href="auth/logout.php">Logout</a></li>
</ol>