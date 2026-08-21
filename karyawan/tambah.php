<?php
include "../config.php";
session_start();

// proteksi login
if(!isset($_SESSION['login'])){
    header("location:../auth/login.php");
    exit;
}
?>

<h2>Tambah Karyawan</h2>

<form method="POST" action="proses.php" enctype="multipart/form-data">

<table cellpadding="8">

<tr>
    <td>Nama</td>
    <td>:</td>
    <td><input type="text" name="nama" required></td>
</tr>

<tr>
    <td>Status</td>
    <td>:</td>
    <td>
        <select name="status" required>
            <option value="">-- Pilih Status --</option>
            <option value="Belum Menikah">Belum Menikah</option>
            <option value="Menikah">Menikah</option>
        </select>
    </td>
</tr>

<tr>
    <td>Pendidikan</td>
    <td>:</td>
    <td><input type="text" name="pendidikan"></td>
</tr>

<tr>
    <td>Golongan</td>
    <td>:</td>
    <td>
        <select name="golongan">
            <option value="">-- Pilih Golongan --</option>
            <option value="12">12 - Staff</option>
            <option value="13">13 - Senior Staff</option>
            <option value="14">14 - Asmen</option>
            <option value="15">15 - Manager</option>
        </select>
    </td>
</tr>

<tr>
    <td>Jabatan</td>
    <td>:</td>
    <td><input type="text" name="jabatan"></td>
</tr>

<tr>
    <td>Divisi</td>
    <td>:</td>
    <td><input type="text" name="divisi"></td>
</tr>

<tr>
    <td>Alamat</td>
    <td>:</td>
    <td>
        <textarea name="alamat" rows="3" cols="30"></textarea>
    </td>
</tr>

<tr>
    <td>Foto</td>
    <td>:</td>
    <td><input type="file" name="foto"></td>
</tr>

<tr>
    <td colspan="3">
        <button type="submit" name="simpan">💾 Simpan</button>
        <button type="reset">🔄 Reset</button>
    </td>
</tr>

</table>

</form>

<br>

<a href="index.php">⬅ Kembali</a>