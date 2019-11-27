<link href="Static/css/faqs.min.css" rel="stylesheet" media="all">

<div style="overflow: auto;" class="modal" id="checkout" >
    <div class="modal-dialog" role="document" style="width: 90%; background:white; padding:10px 50px;>
        <div class="modal-content">
         <span onclick="document.getElementById('checkout').style.display='none'" class="close" title="Close Modal">&times;</span>
  	 <body class="bg-light">
  	 <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Form Pembayaran</h2>
        <p class="lead"></p>
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4" >
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Keranjang <?php echo $_SESSION['u_first']." ".$_SESSION['u_last']; ?></span>
             
            <span class="badge badge-secondary badge-pill"></span>
          </h4>
          <ol class="list-group mb-3" style="overflow: scroll; height: auto;">

             <?php
          if(!empty($_SESSION["belanja"]))
          {
            $total = 0;
            foreach($_SESSION["belanja"] as $keys => $values)
            {
          ?>

            <li class="list-group-item d-flex justify-content-between lh-condensed">

              <div>
              
                <h6 class="my-0"><?php echo $values["item_name"]; ?></h6>
                <small class="text-muted"> <span>Jumlah:</span><?php echo $values["item_quantity"]; ?></small>
              </div>
              <span class="text-muted"><span>Harga: </span>Rp <?php echo $values["item_price"]; ?>,00</span><br>
              <span class="text-muted"><span>Total: <span>Rp <?php echo number_format($values["item_quantity"] * $values["item_price"],3);?>,00</span></span>
                <div style=""><img width="100" height="100" src="<?php echo "imgevent/".$values["foto"]; ?>" class="img-fluid img-thumbnail" alt=""></div>
                
                <input type="hidden" value="<?php echo $values["item_name"]; ?>" name="namabarang[]">

            </li>

            <?php
            $total = $total + ($values["item_quantity"] * $values["item_price"]); 
            }
          ?>
           
            
          </ol>
             <li class="list-group-item d-flex justify-content-between">
              <span>Total (Rupiah)</span>
              <strong>Rp <?php echo number_format($total,3); ?>,00</strong>

            </li>
            <li class="list-group-item d-flex justify-content-between">
              <h5><?php echo ucwords(Terbilang(number_format($total,3,'','')))." Rupiah";?></h5>
            </li>
           <?php
          }
          ?>
        </div>
                
        <div class="col-md-8 order-md-1">
          <form class="needs-validation" novalidate method="post">
        <div class="panel">
        <section class="accordion-ctn">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="0">
                            <h2 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#0-c" aria-expanded="false" aria-controls="0-c">
                                    <span class="nod">
                                        <span></span>
                                    </span>
                                    <span><?php 
  require_once('inc/conn.php');
$username=$_SESSION['u_uid'];
$muncul=$db->query("SELECT * FROM users where user_uid='$username'");?>
<?php while ($gas = $muncul->fetch_assoc()) { ?><?php echo "Data ".$gas['user_first']." ".$gas['user_last'];?><?php }?></span>
                                </a>
                            </h2>
                        </div>
                        <div id="0-c" class="panel-collapse collapse" role="tabpanel" aria-labelledby="0">
                            <div class="panel-body">
                                <div class="ctn-wrp" style="padding:0 30px;">
                                <div class="row" >
              <div class="col-md-6 mb-3">
                <label for="firstName">Nama Depan</label>
                <input type="text" name="first" class="form-control" id="firstName" placeholder="" readonly="" value="<?php 
  require_once('inc/conn.php');
$username=$_SESSION['u_uid'];
$muncul=$db->query("SELECT * FROM users where user_uid='$username'");?>
<?php while ($gas = $muncul->fetch_assoc()) { ?><?php echo $gas['user_first']?><?php }?>" required>
                <div class="invalid-feedback">
               
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Nama Belakang</label>
                <input type="text" name="last" class="form-control" id="lastName" placeholder="" readonly="" value="<?php 
  require_once('inc/conn.php');
$username=$_SESSION['u_uid'];
$muncul=$db->query("SELECT * FROM users where user_uid='$username'");?>
<?php while ($gas = $muncul->fetch_assoc()) { ?><?php echo $gas['user_last']?><?php }?>" required>
                <div class="invalid-feedback">
                
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="username">Username</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"></span>
                </div>
                <input type="text" name="username" class="form-control" id="username" placeholder="Username" readonly="" required value="<?php 
  require_once('inc/conn.php');
$username=$_SESSION['u_uid'];
$muncul=$db->query("SELECT * FROM users where user_uid='$username'");?>
<?php while ($gas = $muncul->fetch_assoc()) { ?><?php echo $gas['user_uid']?><?php }?>">
                <div class="invalid-feedback" style="width: 100%;">
                  
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email <span class="text-muted">(Optional)</span></label>
              <input type="text" name="email" class="form-control" id="email" placeholder="you@example.com" readonly=""  value="<?php 
  require_once('inc/conn.php');
$username=$_SESSION['u_uid'];
$muncul=$db->query("SELECT * FROM users where user_uid='$username'");?>
<?php while ($gas = $muncul->fetch_assoc()) { ?><?php echo $gas['user_email']?><?php }?>">
              <div class="invalid-feedback">
              
              </div>
            </div>
            <div class="mb-3">
              <label for="email">No. Telp <span class="text-muted"></span></label>
              <input type="phone" name="notelp" class="form-control" id="notelp" placeholder="6285*****" readonly=""  value="<?php 
  require_once('inc/conn.php');
$username=$_SESSION['u_uid'];
$muncul=$db->query("SELECT * FROM users where user_uid='$username'");?>
<?php while ($gas = $muncul->fetch_assoc()) { ?><?php echo $gas['notelp']?><?php }?>">
              <div class="invalid-feedback">
              
              </div>
            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="1">
                            <h2 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#1-c" aria-expanded="false" aria-controls="1-c">
                                    <span class="nod">
                                        <span></span>
                                    </span>
                                    <span>Alamat Pemesan</span>
                                </a>
                            </h2>
                        </div>
                        <div id="1-c" class="panel-collapse collapse" role="tabpanel" aria-labelledby="1">
                            <div class="panel-body">
                                <div class="ctn-wrp" style="padding:0 30px;">
                                <div class="row">
                                <p style="display:block; font-size:1em;" id="user-exists">Catatan:<br>Order Hanya Untuk Wilayah Jakarta kecuali pulau seribu</p>                        
     <div class="mb-3">
              <label for="address">Alamat</label>
              <input type="text" name="alamat" class="form-control" id="address" placeholder="Masukkan Alamat Anda"  >
              <div class="invalid-feedback">
              <label for="zip">Kode Pos</label>
                <input name="kodepos" type="text" class="form-control" id="zip" placeholder="" >
              </div>
            </div>


         

            
           
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="2">
                            <h2 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#2-c" aria-expanded="false" aria-controls="2-c">
                                    <span class="nod">
                                        <span></span>
                                    </span>
                                    <span>Payment</span>
                                </a>
                            </h2>
                        </div>
                        <div id="2-c" class="panel-collapse collapse" role="tabpanel" aria-labelledby="2">
                            <div class="panel-body">
                                <div class="ctn-wrp" style="padding:0 30px;">
                                <div class="d-block my-3">
             <div class="custom-control custom-radio">
                <div class="col-sm-3">
                <img class="img-rounded" width="70" height="50" src="img/pay/1.jpg">
                </div>
                <input name="bca" type="checkbox" class="custom-control-input"  value="img/pay/1.jpg">
                <label class="custom-control-label" for="paypal">BCA</label>
              </div>
              <br>
              <br>
              <br>
            <div class="custom-control custom-radio">
                <div class="col-sm-3">
                <img class="img-rounded" width="70" height="50" src="img/pay/2.jpg">
                </div>
                <input  name="bri" type="checkbox" class="custom-control-input"  value="img/pay/2.jpg">
                <label class="custom-control-label" for="paypal">BRI</label>
              </div>
              <br>
              <br>
              <br>
              
            </div>
                <br>
              <br>
              <br>
            <div class="row">
                <div class="col-md-6 mb-3">
                <label for="cc-cvv">Total</label>
                <input  type="text" class="form-control" id="cc-cvv" placeholder="" readonly=""  value="Rp <?php echo number_format($total,3,'.','.');?>,00">
                <input type="hidden" value="<?php echo $total; ?>" name="totalorder"> 
                <div class="invalid-feedback">
                 
                </div>
              </div>
               <div class="col-md-6 mb-3">
                <label for="cc-cvv">Terbilang</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="" readonly=""  value="<?php echo ucwords(Terbilang(number_format($total,3,'','')));?>Rupiah">
                <div class="invalid-feedback">
                 
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-name">Nama Kartu Kredit</label>
                <input name="namakartu" type="text" class="form-control" id="cc-name" placeholder="" >
                <small class="text-muted"></small>
                <div class="invalid-feedback">
               
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Nomor Kartu Kredit</label>
              
                
                      <input type="hidden" name="barang" value=" <?php
          if(!empty($_SESSION["belanja"]))
          {

            $total = 0;
            foreach($_SESSION["belanja"] as $keys => $values)
            {
          ?><?php echo $values["item_name"]."| Jumlah=".$values["item_quantity"]."| Total=".number_format($values["item_quantity"] * $values["item_price"],3)."+";  ?> <?php } ?>
             <?php } ?>">
                
              
                <input name="nomerkartu" type="text" class="form-control" id="cc-number" placeholder="" >
                <div class="invalid-feedback">
               
                </div>
              </div>
            </div>
            <div class="row">
             
              <div class="col-md-3 mb-3">
                <label for="cc-cvv">Kode Pesanan</label>
                <input name="kodepesanan" type="text" class="form-control" id="cc-cvv" placeholder="" readonly=""  value="<?php $idpesanan=uniqid(); echo $idpesanan; ?>">
                <div class="invalid-feedback">
                Harap Di catat
                </div>
              </div>
              
            </div>

                                </div>
                            </div>
                        </div>
                    </div>
                 
                    </div>
            </div>
        </section>
        
   <input name="gambarorder" type="hidden" value="<?php if(!empty($_SESSION["belanja"]))
{
  $total = 0;
  foreach($_SESSION["belanja"] as $keys => $values)
  {?><?php echo "|".$values['foto'];?><?php } ?>
  <?php } ?>">
    

           
            <button name="kirim" onclick="return congirm('<?php $_SESSION['u_first']." ".$_SESSION['u_last']." Kamu Yakin Data Anda Sudah Benar?"?>');" class="btn btn-primary btn-lg btn-block" type="submit">Proses Pemesanan</button>
          </form>
        </div>
      </div>

     
    </div>

        
</div>
</div>
</div>
<?php 
  require_once("inc/conn.php");
if (isset($_POST['kirim'])) {

   $first=$_POST['first'];
  $last= $_POST['last'];
    $email= $_POST['email'];
$username= $_POST['username'];
$gambarorder=$_POST['gambarorder'];
$notelp= $_POST['notelp'];
$totalorder= $_POST['totalorder'];
$pay=$_POST['bca'].$_POST['bri'];
$barang=$_POST['barang'];
$kodepesanan= $_POST['kodepesanan'];
$namakartu= $_POST['namakartu'];
$nomerkartu= $_POST['nomerkartu'];
$status= 1;
$alamat=$_POST['alamat'].",Kode Pos=".$_POST['kodepos'];
mysqli_query($GLOBALS["___mysqli_ston"],"INSERT INTO orders
  (first,last,email,username,gambarorder,totalorder,pay,kodepos,kodepesanan,namakartu,nomerkartu,alamat,barang,notelp,status) VALUES ('$first','$last','$email','$username','$gambarorder','$totalorder','$pay','$kodepos','$kodepesanan','$namakartu','$nomerkartu','$alamat','$barang','$notelp','$status')") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
    echo "<script>location='akun.php?action=checkout&id=".$values["id"]."';</script>";
  }
 ?>
 <?php
function Terbilang($x)
{
  $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
  if ($x < 12)
    return " " . $abil[$x];
  elseif ($x < 20)
    return Terbilang($x - 10) . "belas";
  elseif ($x < 100)
    return Terbilang($x / 10) . " puluh" . Terbilang($x % 10);
  elseif ($x < 200)
    return " seratus" . Terbilang($x - 100);
  elseif ($x < 1000)
    return Terbilang($x / 100) . " ratus" . Terbilang($x % 100);
  elseif ($x < 2000)
    return " seribu" . Terbilang($x - 1000);
  elseif ($x < 1000000)
    return Terbilang($x / 1000) . " ribu" . Terbilang($x % 1000);
  elseif ($x < 1000000000)
    return Terbilang($x / 1000000) . " juta" . Terbilang($x % 1000000);
}

?>
