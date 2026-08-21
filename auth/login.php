<?php 
error_reporting(E_ALL); 
ini_set('display_errors', 1); 
?>

<link rel="stylesheet" href="../assets/style.css">

<div class="overlay">

    <div class="login-box">
        <h2 style="text-align:center;">Login</h2>

        <form method="POST" action="cek_login.php"> 
            
            <label>Username</label><br>
            <input type="text" name="username" required><br><br> 

            <label>Password</label><br>
            <input type="password" name="password" required><br><br> 

            <button type="submit">Login</button> 
        </form> 

        <br>
        <div style="text-align:center;">
            <a href="forgot.php">Forgot Password?</a>
        </div>
    </div>

    <div class="footer-text">
        Management Karyawan Portal<br>
        Silahkan Login
    </div>

</div>