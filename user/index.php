<?php 
session_start();
include "../config.php";

// proteksi login
if(!isset($_SESSION['login'])){
    header("location:../auth/login.php");
    exit;
}

// ambil data
$data = mysqli_query($koneksi,"SELECT * FROM users");
?>

<link rel="stylesheet" href="../assets/style.css">

<div class="overlay">

<div class="content-box">

<h2>👤 Data User</h2>

<p><b>Login sebagai:</b> <?= $_SESSION['username']; ?> (<?= $_SESSION['role']; ?>)</p>

<br>

<table class="table-modern">

<tr>
    <th>Username</th>
    <th>Nama</th>
    <th>Jabatan</th>
    <th>Alamat</th>
    <th>Aksi</th>
</tr>

<?php while($d = mysqli_fetch_assoc($data)){ ?>
<tr>
    <td><?= $d['username']; ?></td>
    <td><?= $d['nama']; ?></td>
    <td><?= $d['jabatan']; ?></td>
    <td><?= $d['alamat']; ?></td>
    <td>
        <a href="edit.php?id=<?= $d['id']; ?>" class="btn">Edit</a>

        <?php if($_SESSION['role'] == 'admin'){ ?>
            <a href="hapus.php?id=<?= $d['id']; ?>" 
               class="btn" 
               onclick="return confirm('Yakin hapus?')">Hapus</a>
        <?php } ?>
    </td>
</tr>
<?php } ?>

</table>

<br>

<a href="../index.php" class="btn">🏠 Home</a>
<a href="javascript:history.back()" class="btn">🔙 Back</a>

</div>

</div>