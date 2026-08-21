<?php
include "../config.php";

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// cek user ada atau tidak
$cek = mysqli_query($koneksi,"SELECT * FROM users WHERE username='$username'");
$data = mysqli_fetch_assoc($cek);

if($data){

    // update password
    mysqli_query($koneksi,"UPDATE users SET password='$password' WHERE username='$username'");

    echo "Password berhasil direset! <br>";
    echo "<a href='login.php'>Login sekarang</a>";

}else{
    echo "Username tidak ditemukan!";
}
?>