<?php 
session_start();
include "../config.php";

if(!isset($_SESSION['login'])){
    header("location:../auth/login.php");
    exit;
}

// ambil data
$id = $_GET['id'];
$q = mysqli_query($koneksi,"SELECT * FROM karyawan WHERE id='$id'");
$d = mysqli_fetch_assoc($q);

if(!$d){
    echo "Data tidak ditemukan!";
    exit;
}

// pembatasan akses
if($_SESSION['role'] != 'admin'){
    if($d['username'] != $_SESSION['username']){
        header("location:index.php?msg=forbidden");
        exit;
    }
}
?>

<link rel="stylesheet" href="../assets/style.css">

<div class="overlay">

    <div class="content-box">

        <h2>✏️ Edit Karyawan</h2>

        <form method="POST" action="proses.php" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?= $d['id']; ?>">

        <table cellpadding="8" style="width:100%; max-width:600px;">

        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" value="<?= $d['nama']; ?>" required></td>
        </tr>

        <tr>
            <td>Status</td>
            <td>
                <select name="status">
                    <option value="Belum Menikah" <?= ($d['status']=="Belum Menikah")?"selected":""; ?>>Belum Menikah</option>
                    <option value="Menikah" <?= ($d['status']=="Menikah")?"selected":""; ?>>Menikah</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>Pendidikan</td>
            <td><input type="text" name="pendidikan" value="<?= $d['pendidikan']; ?>"></td>
        </tr>

        <tr>
            <td>Golongan</td>
            <td>
                <select name="golongan">
                    <option value="12" <?= ($d['golongan']==12)?"selected":""; ?>>12 - Staff</option>
                    <option value="13" <?= ($d['golongan']==13)?"selected":""; ?>>13 - Senior Staff</option>
                    <option value="14" <?= ($d['golongan']==14)?"selected":""; ?>>14 - Asmen</option>
                    <option value="15" <?= ($d['golongan']==15)?"selected":""; ?>>15 - Manager</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>Jabatan</td>
            <td><input type="text" name="jabatan" value="<?= $d['jabatan']; ?>"></td>
        </tr>

        <tr>
            <td>Divisi</td>
            <td><input type="text" name="divisi" value="<?= $d['divisi']; ?>"></td>
        </tr>

        <tr>
            <td>Alamat</td>
            <td><textarea name="alamat"><?= $d['alamat']; ?></textarea></td>
        </tr>

        <tr>
            <td>Foto Lama</td>
            <td>
                <?php if(!empty($d['foto'])){ ?>
                    <img src="../upload/foto_karyawan/<?= $d['foto']; ?>" width="100">
                <?php } ?>
            </td>
        </tr>

        <tr>
            <td>Ganti Foto</td>
            <td><input type="file" name="foto"></td>
        </tr>

        <tr>
            <td colspan="2">
                <button class="btn" type="submit" name="update">💾 Update</button>
            </td>
        </tr>

        </table>

        </form>

        <br>
        <a href="index.php">⬅ Kembali</a>

    </div>

</div>