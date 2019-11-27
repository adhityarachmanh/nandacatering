
<div style="overflow: auto; display:<?php

$halamanrefresh = isset($_SERVER['HTTP_CACHE_CONTROL']) &&($_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0' ||  $_SERVER['HTTP_CACHE_CONTROL'] == 'no-cache'); 
$notif="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
   #jika refresh ga keluar sweetalert ke 2xnya sesuai batas refresh
if($halamanrefresh == 500){
echo "none;";
}else{
    if(!$halamanrefresh){
    $notif="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        if (strpos($notif,"status=berhasil")== true) {
            echo "none;";
        }elseif(strpos($notif,"status=logout")== true) {
            echo "none;";
        }elseif(strpos($notif,"status=")== true) {
            echo "block;";
        }elseif(strpos($notif,"cart=")== true) {
            echo "none;";
        }
}}?>" class="modal" id="login" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!--Belum Login-->
            <div class="modal-header <?php if ($_SESSION['uid']) {echo "hidden";}else{echo "";} ?>">
                <h3>Log In </h3>
                <button type="button" class="close" onclick="document.getElementById('login').style.display='none'">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Udah Login-->
             <div class="modal-header <?php if ($_SESSION['uid']) {echo "";}else{echo "hidden";} ?>">
                <h3 class="headline text-center">Profil<span><?php if ($_SESSION['u_uid']=="admin"){echo" Admin";}else{echo " ".$_SESSION['u_first'];} ?></span></h3>
                <button type="button" class="close" onclick="document.getElementById('login').style.display='none'">
                    <span aria-hidden="true">&times;</span>
                </button>
                <!--Foto-->
            <div class="container">
  <img style="margin: 0 15%;" src="<?php 
  require_once('inc/login.php');  
$userid=$_SESSION['uid'];
$muncul=$db->query("SELECT * FROM users where id='$userid'");?>
<?php while ($gas = $muncul->fetch_assoc()) { ?><?php if (isset($_SESSION['uid'])) {if(count($_SESSION['u_foto'])==0){ echo 'img/defaultfoto.png';}elseif(count($_SESSION['u_foto'])>0){echo "imgevent/fotouser/".$gas['fotouser'];}}?><?php }?>" class="img-circle" width="70%" height="400" >
</div>
            </div>
            <!--Udah Login-->
            <div class="modal-body <?php if ($_SESSION['uid']) {echo "";}else{echo "hidden";} ?>">
                <h4 class="headline text-center"> <?php if ($_SESSION['u_uid']=="admin") {echo " &#9813;";}else{echo "";} ?> Selamat Datang</h4>
                <h4 class="headline text-center"><?php if ($_SESSION['uid'])  {echo $_SESSION['u_first']." ".$_SESSION['u_last'];} ?></h4>
               
            </div>
            <!--Belum Login-->
            <div class="modal-body <?php if ($_SESSION['uid']) {echo "hidden";}else{echo "";} ?>">
                <form class="login-form login-hide"  method="post" action="inc/login.inc.php">
                    <input type="text" name="uid" placeholder="Username"/>
                    <p style="display:<?php
$notif="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if (strpos($notif,"status=usernametidakada")== true) {
        echo "block;";}?>;" id="user-exists">Username Anda Tidak Terdaftar</p>
                    <input type="password" name="pwd" placeholder="Password"/>
                    <p style="display:<?php
$notif="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if (strpos($notif,"status=passwordsalah")== true) {
        echo "block;";}?>;" id="user-exists">Password Anda Salah</p>
                    <input type="hidden" name="halaman"  value="<?php $a=$_SERVER['REQUEST_URI']; $b=explode("/",$a); echo $b['2']; ?>">
  
            </div>
            <!--Belum Login-->
            <div class="modal-footer <?php if ($_SESSION['uid']) {echo "hidden";}else{echo "";} ?>">
               
            <a href="#" onclick="document.getElementById('login').style.display='none'"  class="btn btn-secondary">Close</a>
              
                <button type="submit" class="btn btn-primary login-button" name="login">Login</button>
               

            </form>
                <p class="login-note">Lupa Password Akun Anda?<br><a href="#" style="font-weight: bolder;" class="sign-instead" onclick="document.getElementById('lupapass').style.display='block',document.getElementById('login').style.display='none'">Lupa Password</a> unntuk tau password anda</p>
            </div>
            <!--Udah Login-->
            <div class="modal-footer <?php if ($_SESSION['uid']) {echo "";}else{echo "hidden";} ?>">
                <a href="akun.php?akun=info" class="btn btn-success">Edit Profil</a>
                <a href="hubungikami.php" class="btn btn-warning"><?php if($_SESSION['u_uid']=="admin"){echo'Inbox Admin';}else{echo'Hubungi Kami';} ?></a>
             
                <br><br>
                <a href="akun.php?akun=booking" class="btn btn-secondary <?php if ($_SESSION['u_uid']=="admin") {echo "hidden";}else{echo "";} ?>">History Booking</a>
                <a href="akun.php?akun=order" class="btn btn-secondary <?php if ($_SESSION['u_uid']=="admin") {echo "hidden";}else{echo "";} ?>">History Order</a>
               <?php if ($_SESSION['u_uid']=="admin") {echo " <br><br>";}else{echo "";} ?>
               <h3  class="<?php if ($_SESSION['u_uid']=="admin") {echo "";}else{echo "hidden";} ?>">&#9813; Menu Admin</h3><br>
               <a href="admin/dashboard.php?halaman=order" class="btn btn-primary <?php if ($_SESSION['u_uid']=="admin") {echo "";}else{echo "hidden";} ?>">&#9813; Instan Konfirm Order</a>
                 <a href="admin/dashboard.php" class="btn btn-success <?php if ($_SESSION['u_uid']=="admin") {echo "";}else{echo "hidden";} ?>">&#9813; Dashboard</a>
                <br><br>
                <form method="post" action="inc/logout.inc.php">
                <input type="hidden" name="halaman"  value="<?php $a=$_SERVER['REQUEST_URI']; $b=explode("/",$a); echo $b['2']; ?>">
                <button name="logout" type="submit" class="btn btn-primary">Logout</button>
</form>
            </div>
        </div>
        <div class="modal-content submitted-div">
            <div class="modal-header">
                <h5 class="modal-title" id="login-form-label">An email has been sent</h5>
               
                    <span aria-hidden="true">&times;</span>
            
            </div>
            
           
        </div>
    </div>
</div>

