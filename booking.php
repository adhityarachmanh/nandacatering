<?php include'inc/cart.inc.php';?>
<!DOCTYPE html>
<html  lang="en">


<head>
<title>NANDA CATERING | BOOKING ACARA</title>
   <?php include'head.php';?>
</head>

 <?php include'header.php';?>

<div class="container-fluid redborder">
   
    <div class="title-section">
        <h1>Booking Acara</h1>
    </div>
    <style>
    .accordion-ctn .panel-group .panel-default > .panel-heading{
        background:url('static/Images/global/bg-wood-red.jpg') repeat top left;
    }
    label{
        color:white;

    }
    .accordion-ctn .panel-group .panel-default .panel-title a span.nod span::after{
        background:white;
    }
    .accordion-ctn .panel-group .panel-default .panel-title a span.nod span::before{
        background:white;
    }
    .accordion-ctn .panel-group .panel-default .panel-title a span.nod span{
        border:#fff solid 2px;
    }
</style>
  <section class="accordion-ctn <?php if($_SESSION['uid']){echo 'hidden';}else{echo '';} ?>">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" style=" background:url('static/Images/global/bg-wood-red.jpg') repeat top left;">
                
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="8">
                            <h2 class="panel-title">
                                <a onclick="document.getElementById('login').style.display='block'" data-toggle="collapse" data-parent="#accordion" href="#8-c" aria-expanded="false" aria-controls="8-c">
                                    <span class="nod">
                                        <span></span>
                                    </span>
                                    <span style=" color:white;">Ingin Daftar Booking?</span>
                                </a>
                            </h2>
                        </div>
                     
                    </div>     
            </div>
        </section>
        <section class="accordion-ctn <?php if($_SESSION['uid']){echo '';}else{echo 'hidden';} ?>">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" style=" background:url('static/Images/global/bg-wood-red.jpg') repeat top left;">
                
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="8">
                            <h2 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#8-c" aria-expanded="false" aria-controls="8-c">
                                    <span class="nod">
                                        <span></span>
                                    </span>
                                    <span style=" color:white;">Ingin Daftar Booking?</span>
                                </a>
                            </h2>
                        </div>
                        <div id="8-c" class="panel-collapse collapse" role="tabpanel" aria-labelledby="8">
                            <div class="panel-body" style="background-image: url(static/Images/global/title-background.jpg);">
                                <div class="ctn-wrp">
                                        <div class="modal-body">
                                        <?php 
                                        require_once('inc/conn.php');
                                        $cari=$db->query("SELECT * FROM users WHERE id='$_SESSION[uid]'")
                                        
                                        ?>
                                          <?php foreach($cari as $booking) {?>
                <form class="signup-form" method="POST">
                  
                <p style="display:block; font-size:1em;" id="user-exists">Catatan:<br>1.Booking Hanya Untuk Wilayah Jakarta kecuali pulau seribu<br>2.Untuk konfirmasi booking diharapkan anda menghubungi pihak catering atau dengan mengirim pesan melalui fitur <a href="hubungikami.php" style="font-weight:bolder; color:yellow;">Hubungi Kami</a></p>
                    <fieldset>
                        <label for="firstname">Nama Depan*</label>
                        <input type="text" name="namadepan" placeholder="" required value="<?php echo $booking['user_first'] ?>">
                        <p class="has-error"></p>
                    </fieldset>
                    <fieldset>
                        <label for="lastname">Nama Belakang*</label>
                        <input type="text" name="namabelakang" placeholder="" required value="<?php echo $booking['user_last'] ?>">
                        <p class="has-error"></p>
                    </fieldset>
                    <fieldset>
                        <div class="col col-6">
                            <label for="phone">No.Telpon*</label>
                            <input type="tel" name="telp" placeholder="" maxlength="13" value="<?php echo $booking['notelp'] ?>">
                            <p class="has-error"></p>
                        </div>
                        <div class="col col-6">
                            <label for="zip">Kodepos*</label>
                            <input type="text" name="kodepos" placeholder="" maxlength="5" required pattern="[0-9]{5}">
                            <p class="has-error"></p>
                        </div>
                    </fieldset>
                    <fieldset>
                        <label for="email">Email*</label>
                        <input type="email" name="email" placeholder="" required value="<?php echo $booking['user_email'] ?>">
                    </fieldset>
                    <fieldset>
                        <label for="email">Alamat Anda*</label>
                        <input type="text" name="alamat" placeholder="" required>
                    </fieldset>
                    <fieldset>
                        <label for="keterangan">Keterangan Acara*</label>
                       <textarea type="text" name="keterangan" style="width:100%;"></textarea>
                    </fieldset>
                    <button type="submit" class="btn btn-primary signup-button" name="booking">Submit</button>
                </form>
                    <?php }?>
            </div>
                                </div>
                            </div>
                        </div>
                    </div>     
            </div>
        </section>
        <?php include'footer.php';?>  
</div>
</div>
    </div>
 
    <!--

    <a href="">Login As Guest</a>

        -->
</body>

<!-- Mirrored from www.zaxbys.com/faq/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Jun 2018 01:39:39 GMT -->
</html>
<?php 

if (isset($_POST['booking'])) {
    require_once("inc/conn.php");
	$namadepan = $_POST['namadepan'];
	$namabelakang = $_POST['namabelakang'];
	$email = $_POST['email'];
	$alamat = $_POST['alamat']." Kodepos:".$_POST['kodepos'];
    $keterangan = $_POST['keterangan'];
    $telp = $_POST['telp'];
	mysqli_query($GLOBALS["___mysqli_ston"],"INSERT INTO pemesanan(namadepan,namabelakang,email,alamat,telp,keterangan)values('$namadepan', '$namabelakang', '$email', '$alamat','$telp','$keterangan')") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		echo '<script language="javascript">';
		echo 'alert("Pemesanan Telah Dikirim")';
		echo '</script>';
		echo "<script>location='akun.php?akun=booking';</script>";
	}
 ?>