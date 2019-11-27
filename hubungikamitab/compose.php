<?php 
include'./inc/conn.php';
$tarik=$db->query("SELECT * FROM orders where id='$_GET[orderid]'"); ?>

      
<div class="col-md-9">
<form method="post" enctype="multipart/form-data">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tulis Pesan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <input name="untuk" class="form-control" <?php if($_SESSION['u_uid']=="admin"){echo "";}else{echo "readonly=''";}?> value="<?php if($_GET['action']=="balas"){echo $_GET['dari'];}elseif($_SESSION['u_uid']=="admin"){echo "";}else{echo"admin";} ?>">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Subject:" name="subjek">
              </div>
              <div class="form-group">
                
           
                   
              
              <textarea id="compose-textarea" class="form-control" style="height: 300px;" name="isi">
        
                      <h1><u><?php if($_GET['orderid']) {echo 'Laporan Order';}elseif($_GET['bookingid']){echo 'Laporan Booking';} ?>
                      <?php if(empty($_GET['orderid'] || $_GET['bookingid'])){echo'Heading Of Message';}else{echo'';} ?></u></h1>
                      <?php if(empty($_GET['orderid'] || $_GET['bookingid'])){echo'<h4>Subheading</h4>';} ?>
                      <?php while ($order=$tarik->fetch_assoc()) {
                            $gam=$order['gambarorder'];
                            $nam=$order['barang'];
                            $syarat="|";
                            $syarat1="+";
                            $syarat3=",";
                            $explodegambar=explode($syarat,trim($gam,$syarat));
                            $explodebarang=explode($syarat1,trim($nam,$syarat1));
                        ?>
                      <?php if($_GET['orderid']) {echo '<h4>Kode Pesanan: '.$order['kodepesanan'].'</h4>';} ?>
                      <?php if($_GET['orderid']){ echo'<br><h3>Gambar Barang :</h3>';} ?>
                      <?php 
                    
                      foreach($explodegambar as $a){echo '<img  src="imgevent/'.$a.'" height="150"  width="200">';  }
                     
                      ?>
                    

                      <?php if($_GET['orderid']){ echo'<br><p>Isi Pesan</p>';} ?>
                      <?php if($_GET['orderid']){ echo'<br><h3>Nama Barang</h3>';} ?>
                      <ul><?php   foreach($explodebarang as $barang){$ea=explode($syarat,trim($barang,$syarat)); echo '<li>'.$ea[0].'</li>';}?></ul>  
                      <?php if($_GET['orderid']){ echo'<br><p>Terima Kasih</p>';} ?>
                      <?php if($_GET['orderid']){ echo'<p>'.$order['first'].' '.$order['last'].'</p>';} ?>
                      <?php } ?>
                      
                   
                      <?php if(empty($_GET['orderid'] || $_GET['bookingid'])){echo '<p>NandaCatering NandaCatering NandaCatering 
                        NandaCatering NandaCatering NandaCatering NandaCatering NandaCatering NandaCatering 
                        NandaCatering NandaCatering NandaCatering NandaCatering NandaCatering NandaCatering 
                        NandaCatering NandaCatering NandaCatering NandaCatering NandaCatering NandaCatering 
                        NandaCatering NandaCatering NandaCatering NandaCatering NandaCatering NandaCatering 
                        NandaCatering NandaCatering NandaCatering NandaCatering NandaCatering NandaCatering 
                        NandaCatering NandaCatering NandaCatering NandaCatering NandaCatering NandaCatering 
                        NandaCatering NandaCatering NandaCatering NandaCatering NandaCatering NandaCatering 
                        NandaCatering NandaCatering NandaCatering NandaCatering NandaCatering NandaCatering   </p>';}?>
                    
                      
                    <?php if(empty($_GET['orderid'] || $_GET['bookingid'])){echo '
                      <ul>
                        <li>List Barang Pertama</li>
                        <li>List Barang Kedua</li>
                        <li>List Barang Ketiga</li>
                        <li>List Barang Keempat</li>';}?>
                      </ul>
                      <?php if(empty($_GET['orderid'] || $_GET['bookingid'])){echo '<p>Terima Kasih,</p>';}?>
                      <?php if(empty($_GET['orderid'] || $_GET['bookingid'])){echo '<p>Nama Pengirim</p>';}?>
                    </textarea>
                
                    <input type="hidden" name="dari" value="<?php echo $_SESSION['u_uid']?>">
              </div>
              <div class="form-group">
                <div class="btn btn-default btn-file">
                  <i class="fa fa-paperclip"></i>   <?php if($_GET['orderid'] || $_GET['bookingid']){echo 'Upload Struk';}else{echo'Upload Gambar';}?>
                  <input type="file" name="berkas">
                </div>
                <h5 class="help-block"><?php if($_GET['orderid'] || $_GET['bookingid']){echo 'Upload Struk Pembayaran Anda di Sini';}else{echo'Upload Gambar di Sini';}?></h5>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
               
                <button name="kirimpesan" onclick="return confirm('Yakin Pesan Sudah Benar?')" type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
              </div>
              
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
          </form>
        </div>
      
        <?php
require_once('./inc/conn.php');
if (isset($_POST['kirimpesan'])) {
  $untuk=$_POST['untuk'];
   $dari=$_POST['dari'];

  $subjek=$_POST['subjek'];
  $isi=$_POST['isi'];
  $nama= $_FILES['berkas']['name'];
  $tempat= $_FILES['berkas']['tmp_name'];
  $fileext=explode('.', $nama);
  $fileactualext=strtolower(end($fileext));
  if(!empty($tempat)){
  $filenamenew = "berkas".$dari.".".$fileactualext;
    $filedestination = 'imgevent/berkaspesan/'.$filenamenew;
    move_uploaded_file($tempat, $filedestination);
    $db->query("INSERT INTO pesan
  (untuk,dari,subjek,isi,berkas) VALUES ('$untuk','$dari','$subjek','$isi','$filenamenew')");
   
    echo "<script>location='hubungikami.php?pesan=pesanterkirim';</script>";
  }else{
    $db->query("INSERT INTO pesan
    (untuk,dari,subjek,isi) VALUES ('$untuk','$dari','$subjek','$isi')");
     
      echo "<script>location='hubungikami.php?pesan=pesanterkirim';</script>";
  }
  }
 
?>
