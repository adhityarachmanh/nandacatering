
<?php 
   include'inc/koneksi.php';
 $limit = (isset($_GET['limit'])) ? $_GET['limit'] :4;
  $page = (isset($_GET['page'])) ? $_GET['page'] :1; 
   $links = (isset($_GET['links'])) ? $_GET['links'] :200;


  $username=$_SESSION['u_uid'];

   $query ="SELECT * FROM orders where username  like '%".$username."%' ";



require_once 'inc/paginator.class.php';
$paginator = new Paginator($dbh,$query);
$horder=$paginator->getData($limit,$page);
?>

                      

<h2>Order History</h2>
                    <div class="history">
                        <div class="ctn-wrp">
                            <p style="display:<?php if($horder->total==0){echo'block;';}else{echo'none;';}?>" class="largish no-past-orders"><br />Tidak Ada Pesanan</p>
                            <div class="button-wrapper">
                       
                          
                            <?php
                              $nomor=1;
        for($i=0;$i < count($horder->data);$i++){
        $order=$horder->data[$i]; 
        $gam=$order['gambarorder'];
        $nam=$order['barang'];
        $syarat="|";
        $syarat1="+";
        $syarat3=",";
        $explodegambar=explode($syarat,trim($gam,$syarat));
        $explodebarang=explode($syarat1,trim($nam,$syarat1));
      
        
      
        $gambarno=1;
        ?> 
        

        
        <div class="container-fluid redborder">
   
    

        <section class="accordion-ctn">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                
                    <div class="panel panel-default">
                       
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="0">
                            <h2 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#7-c" aria-expanded="false" aria-controls="0-c">
                                    <span class="nod">
                                        <span></span>
                                    </span>
                                    <?php echo '<span style=" text-align:center; color:#1d3a74;">Click Untuk Melihat Pesanan '.$nomor.' Anda</span>'; ?>
                                </a>
                            </h2>
                        </div>
                        <div id="7-c" class="panel-collapse collapse" role="tabpanel" aria-labelledby="0">
                            <div class="panel-body">
                                <div class="ctn-wrp">
                                <div class="table-responsive">
       <table border="1" class="table" style="text-transform:capitalize;">
                            <thead>
                                <tr>
                            
                             
                                <th colspan="4"><?php echo '<h1 style=" text-align:center;font-size:4em; color:#1d3a74;">Pesanan '.$nomor.'</h1>'; ?></th>
                              
                                
                                <tr>
</thead>
<tbody>
<tr>
       

<td>Nama Barang:<br><ul><?php   foreach($explodebarang as $barang){$ea=explode($syarat,trim($barang,$syarat)); echo '<li color:black; ">'.$ea[0].'</li><br>';}?></ul></td> 
<td>
<?php foreach($explodegambar as $a){echo '<img src="imgevent/'.$a.'"  style="width:40%; height: 90px;">';  }?></td>     
<td><img class="img-thumbnail" src="<?php echo $order['pay'] ?>"></td>                  
<td><?php echo $order['kodepesanan'] ?></td>

      </tr>
          <tr>
              <td colspan="2">Alamat: <br><?php $alamat=explode(",",$order['alamat']);  echo $alamat[0].'<br>'.$alamat[1]; ?></td>

              <td>Nama Kartu: <?php echo $order['namakartu'] ?><br>Nomer Kartu: <?php echo $order['nomerkartu'] ?></td>
              <td>Total:Rp <?php echo number_format($order['totalorder'],3,'.','.');?>,00<br><br>Terbilang: <?php echo ucwords(Disebut(number_format($order['totalorder'],3,'','')))." Rupiah";?></td>
                
            </tr>
            <tr>
                <td colspan="2">Status:<br> <?php if($order['status']==1){echo '<a class="button-red button-fluid" style="background:orange; ">Menunggu Pembayaran</a>';}
              elseif($order['status']==2){echo '<a class="btn btn-primary" style="background:#00ff00;">Pembayaran Sukses</a>';}
              elseif($order['status']==3){echo '<a class="btn btn-warning" style=" ">Barang Dalam Pengemasan</a>';}
              elseif($order['status']==4){echo '<a class="btn btn-success" style="background:#00ff80; ">Barang Telah di Kirim</a>';}
              elseif($order['status']==5){echo '<a class="button-red button-fluid" style="background:#1d3a74; ">Barang Telah di Terima</a>';}?></td>
                <td><br><a style="display:<?php if($order['status']!="1"){echo'none';}else{echo'block';} ?>;" href="inc/hapushorder.php?id=<?php echo $order['id']; ?>" onclick="return confirm('Anda Yakin Ingin Membatalkan Pesanan?')" class="button-red button-fluid">Batalkan Pemesanan</a></td>
                <td><br><a href="hubungikami.php?halaman=compose&orderid=<?php echo $order['id']?>" style="display:<?php if($order['status']!="1"){echo'none';}else{echo'block';} ?>; background:#1d3a74; float:right;"  class="button-red button-fluid">Kirim Struk</a></td>   
        </tr>
   </tbody>
   
        </table>
        </div>
                              
                            </div>
                        </div>
                    </div>
            </div>
        </section>
</div>
 <?php $nomor++;}?>
 
     
                                <br><a  href="index.php?halaman=paket" class="button-red button-fluid">Start your order</a>
                            
                                </div>
                              
                        </div>
                    </div><!-- Close history-->
    
                    <script src="Static/Script/jquery.mobile.custom.min.js"></script> 
            
 <?php
function Disebut($x)
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
