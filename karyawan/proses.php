<?php
include "../config.php";

if(isset($_POST['update'])){

    $id         = $_POST['id'];
    $nama       = $_POST['nama'];
    $status     = $_POST['status'];
    $pendidikan = $_POST['pendidikan'];
    $golongan   = $_POST['golongan'];
    $jabatan    = $_POST['jabatan'];
    $divisi     = $_POST['divisi'];
    $alamat     = $_POST['alamat'];

    // upload foto
    $foto = $_FILES['foto']['name'];
    $tmp  = $_FILES['foto']['tmp_name'];

    $folder = "../upload/foto_karyawan/";

    if(!is_dir($folder)){
        mkdir($folder, 0777, true);
    }

    // kalau upload foto baru
    if($foto != ""){
        $foto = time().'_'.str_replace(" ","_", $foto);
        move_uploaded_file($tmp, $folder.$foto);

        $query = "UPDATE karyawan SET
            nama='$nama',
            status='$status',
            pendidikan='$pendidikan',
            golongan='$golongan',
            jabatan='$jabatan',
            divisi='$divisi',
            alamat='$alamat',
            foto='$foto'
            WHERE id='$id'";

    } else {

        // kalau tidak upload foto
        $query = "UPDATE karyawan SET
            nama='$nama',
            status='$status',
            pendidikan='$pendidikan',
            golongan='$golongan',
            jabatan='$jabatan',
            divisi='$divisi',
            alamat='$alamat'
            WHERE id='$id'";
    }

    mysqli_query($koneksi, $query);

    // DEBUG (optional, kalau mau cek error)
    // echo mysqli_error($koneksi); exit;

    header("location:index.php?msg=update");
    exit;
}