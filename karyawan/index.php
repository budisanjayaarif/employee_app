<?php
include "../config.php";
session_start();

// proteksi login
if(!isset($_SESSION['login'])){
    header("location:../auth/login.php");
    exit;
}

// fungsi golongan
function golonganText($g){
    switch($g){
        case 12: return "Staff";
        case 13: return "Senior Staff";
        case 14: return "Asmen";
        case 15: return "Manager";
        default: return "-";
    }
}

// ambil data
$data = mysqli_query($koneksi,"SELECT * FROM karyawan");
?>

<link rel="stylesheet" href="../assets/style.css">

<div class="overlay">

    <div class="content-box">

        <h2>📋 Data Karyawan</h2>

        <p>
            Login sebagai: 
            <b><?= $_SESSION['username']; ?></b> 
            (<?= $_SESSION['role']; ?>)
        </p>

        <!-- 🔥 NOTIF -->
        <?php
        if(isset($_GET['msg'])){
            if($_GET['msg'] == 'success'){
                $text  = "✅ Data berhasil disimpan!";
                $color = "green";
                $bg    = "#e6ffe6";
            } elseif($_GET['msg'] == 'update'){
                $text  = "✏️ Data berhasil diupdate!";
                $color = "blue";
                $bg    = "#e6f0ff";
            } elseif($_GET['msg'] == 'forbidden'){
                $text  = "❌ Anda tidak punya akses ke data tersebut!";
                $color = "red";
                $bg    = "#ffe6e6";
            }
        ?>
            <div id="notif" style="
                color:<?= $color ?>;
                background:<?= $bg ?>;
                padding:10px;
                border-radius:6px;
                margin-bottom:15px;
                font-weight:bold;
            ">
                <?= $text ?>
            </div>

            <script>
                setTimeout(function(){
                    document.getElementById('notif').style.display='none';
                }, 3000);
            </script>
        <?php } ?>

        <a class="btn" href="tambah.php">➕ Tambah Karyawan</a>

        <br><br>

        <table class="table-modern">
            <tr>
                <th>Nama</th>
                <th>Status</th>
                <th>Pendidikan</th>
                <th>Golongan</th>
                <th>Jabatan</th>
                <th>Divisi</th>
                <th>Alamat</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>

            <?php while($d = mysqli_fetch_assoc($data)){ ?>
            <tr>
                <td><?= $d['nama']; ?></td>
                <td><?= $d['status']; ?></td>
                <td><?= $d['pendidikan']; ?></td>
                <td><?= golonganText($d['golongan']); ?></td>
                <td><?= $d['jabatan']; ?></td>
                <td><?= $d['divisi']; ?></td>
                <td><?= $d['alamat']; ?></td>
                <td>
                    <?php if(!empty($d['foto'])){ ?>
                        <img src="../upload/foto_karyawan/<?= $d['foto']; ?>" width="60">
                    <?php } else { ?>
                        -
                    <?php } ?>
                </td>
                <td>
                    <a href="edit.php?id=<?= $d['id']; ?>">Edit</a>
                    <?php if($_SESSION['role'] == 'admin'){ ?>
                        | <a href="hapus.php?id=<?= $d['id']; ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>
        </table>

        <br>

        <a href="../index.php">🏠 Home</a> |
        <a href="javascript:history.back()">🔙 Back</a>

    </div>

</div>