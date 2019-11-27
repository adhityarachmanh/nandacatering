<link href="Static/css/faqs.min.css" rel="stylesheet" media="all">
<link href="pagination.css" rel="stylesheet" />

<header>
    <section class="ctn-wrp main-wrp">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 nopadding logo current_page_item ">
                <a href="index.php" title="Nanda Catering Home">
                    
                </a>
            </div>
          
            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 nopadding" id="navBar">
                <nav role="navigation" class="navbar">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" data-target="#navbarCollapse" data-toggle="collapse-side" class="navbar-toggle" id="navbarToggle">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="navicon"></span>
                            </button>
                            
                        </div>
                        <!-- Collection of nav links and other content for toggling -->
                        <div id="navbarCollapse" class="navbar-collapse">
                            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">find</button>
                            <ul id="ulnavId" class="nav navbar-nav main-nav">
                                
                                 <li class="">
                                     
                             <?php include'inc/notifmodal.php'?>
                                    
                                </li>
                                 <li class="">
                                    <a style="white-space: nowrap" href="index.php" title="Home">HOME</a>
                                </li>
                                <li class="">
                                    <a style="white-space: nowrap" href="index.php?halaman=paket" title="Paket">PAKET</a>
                                </li>
                                <li class="">
                                    <a style="white-space: nowrap" href="tentangcatering.php" title="Tentang Catering">TENTANG CATRERING</a>
                                </li>
                                <li class="">
                                    <a href="booking.php" style="white-space: nowrap" href="#" title="Booking Acara">BOOKING ACARA</a>
                                </li>
                                 <li class="">
                                    
                                </li>
                            </ul>
                            <div class="bottom-nav-links mobile-bottom-nav">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#" title="Order Now">Kategori</a>
                                    </li>
                                    <li><a href="termurah.php" class="<?php $a=$_SERVER['SCRIPT_NAME']; $b=explode("/",$a); if($b['2']=="termurah.php"){echo"active";}?>" style="margin:0 5%;" id="menuitems" class="active" href="kategori.php" >Termurah</a></li>
                                    <li><a href="terlaris.php"  class="<?php $a=$_SERVER['SCRIPT_NAME']; $b=explode("/",$a); if($b['2']=="terlaris.php"){echo"active";}?>" style="margin:0 5%;" id="menuitems" class="" href="../index.html" >Terlaris</a></li>
                                    <li><a href="nonlemak.php" class="<?php $a=$_SERVER['SCRIPT_NAME']; $b=explode("/",$a); if($b['2']=="nonlemak.php"){echo"active";}?>" style="margin:0 5%;" id="menuitems" class="" href="../index.html" >Non Lemak</a></li>
                                    <li><a href="terpopuler.php" class="<?php $a=$_SERVER['SCRIPT_NAME']; $b=explode("/",$a); if($b['2']=="terpopuler.php"){echo"active";}?>" style="margin:0 5%;" id="menuitems" class="" href="../index.html" >Terpopuler</a></li>
   
                                </ul>
                            </div>
                            <div id="subnavId" class="sub-nav">
                                
                                <input type="hidden" id="tillsterId" />
                                <!-- User Name  / Email for GA Tracking-->
                        
                                <div class="user-info user-info-wrapper">
                                    <div class="user-info  user-left">
                                        <a  href="#" onclick="document.getElementById('login').style.display='block'" title="Login" class="login <?php if ($_SESSION['uid']) {echo "hidden";}else{echo "";} ?>">Masuk</a>
                                      
                                        <a href="inc/logout.inc.php?halaman=<?php $a=$_SERVER['REQUEST_URI']; $b=explode("/",$a); echo $b['2']; ?>" type="submit" class="login <?php if ($_SESSION['uid']) {echo "";}else{echo "hidden";} ?>">Logout</a>
                                       
                                    </div>
                                    <div class="user-info user-right">
                                        
                                        <a class="logged hidden">Hello, <span class="display-name"></span></a>
                                        <a href="#" onclick="document.getElementById('daftar').style.display='block'" title="Sign up" class="signup <?php if ($_SESSION['uid']) {echo "hidden";}else{echo "";} ?>">Daftar</a>
                                        <a  href="#" onclick="document.getElementById('login').style.display='block'" title="Login" class="login <?php if ($_SESSION['uid']) {echo "";}else{echo "hidden";} ?>">Hello, 
<?php 
  require_once('inc/conn.php');
$username=$_SESSION['u_uid'];
$muncul=$db->query("SELECT * FROM users where user_uid='$username'");?>
<?php while ($gas = $muncul->fetch_assoc()) { ?><?php if ($_SESSION['uid'])
{
echo $gas['user_first']." ".$gas['user_last'];
} 
?><?php }?>
    
</a>
                                    </div>
                                        <div class="cart-icon <?php if($_SESSION['uid']) {echo'';}else{echo 'hidden';}?>" >
                                            <span onclick="document.getElementById('keranjang').style.display='block'" class="shakejumlah"><h4 class="krnjngjmlh"><?php if(count($_SESSION['belanja'])>0){ echo count($_SESSION['belanja']);}else{echo"";}?></h4><img  src="Static/Images/global/cart_icon.svg" width=27 /></span>
                                            
                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </section>
</header>
<section class="secondary-menu">
<section class="ctn-wrp main-wrp">
<div class="slider secondary-menu-carousel" "> 
                               
<div class="menuatas">
  
<a href="termurah.php" class="<?php $a=$_SERVER['SCRIPT_NAME']; $b=explode("/",$a); if($b['2']=="termurah.php"){echo"active";}?>" style="margin:0 5%;" id="menuitems" class="active" href="kategori.php" >Termurah</a>
<a href="terlaris.php"  class="<?php $a=$_SERVER['SCRIPT_NAME']; $b=explode("/",$a); if($b['2']=="terlaris.php"){echo"active";}?>" style="margin:0 5%;" id="menuitems" class="" href="../index.html" >Terlaris</a>
 <a href="nonlemak.php" class="<?php $a=$_SERVER['SCRIPT_NAME']; $b=explode("/",$a); if($b['2']=="nonlemak.php"){echo"active";}?>" style="margin:0 5%;" id="menuitems" class="" href="../index.html" >Non Lemak</a>
<a href="terpopuler.php" class="<?php $a=$_SERVER['SCRIPT_NAME']; $b=explode("/",$a); if($b['2']=="terpopuler.php"){echo"active";}?>" style="margin:0 5%;" id="menuitems" class="" href="../index.html" >Terpopuler</a>
                    
                    
                    
                    </div>
                    
                    </section>
                </section>
<style>
.krnjngjmlh{position: absolute;
color: white; top: 0; 
right: 0;}
.shakejumlah{
    position: absolute; color: white; top: 0; right: 0;
  font-size: 20px; 
  color: #4cae4c;
  -webkit-animation: shake 1s linear infinite;
  -moz-animation: shake 1s linear infinite;
  animation: shake 4s linear infinite;  position: absolute; text-shadow: 1px 1px black;


}

@keyframes shake {
  10%, 90% {
    transform: translate3d(-1px, 0, 0);
  }
  
  20%, 80% {
    transform: translate3d(2px, 0, 0);
  }

  30%, 50%, 70% {
    transform: translate3d(-4px, 0, 0);
  }

  40%, 60% {
    transform: translate3d(4px, 0, 0);
  }
}
.modal-dialog {
    -webkit-animation: animatezoom 0.3s;
    animation: animatezoom 0.3s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}
.modal input{color: red;}
</style>
<?php include'lupapass.php';?>
<?php include'registermodal.php';?>
<?php include'loginmodal.php';?>
<?php include'ratingmodal.php';?>
<?php include'keranjang.php';?>
<?php include'lihatdetail.php';?>
<?php include'checkoutmodal.php';?>
<?php include'jumlahmodal.php';?>



<script>
         var
    closeInSeconds = 3,
    displayText = "",
    timer;

        function notif()
        {
           
swal({
    title: "<?php include'inc/notiftext.php';?>",  
    text: displayText.replace(/#1/, closeInSeconds),   
    timer: closeInSeconds * 1000,
    icon:"<?php include'inc/notificon.php';?>",   
    showConfirmButton: false 
});

timer = setInterval(function() {

    closeInSeconds--;

    if (closeInSeconds < 0) {

        clearInterval(timer);
    }

    $('.sweet-alert > p').text(displayText.replace(/#1/, closeInSeconds));

}, 1000);
        }
        </script>
            <script src="static/script/sweetalert.js"></script>