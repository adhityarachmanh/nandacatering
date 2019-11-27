
<?php 
   include'inc/koneksi.php';
 $limit = (isset($_GET['limit'])) ? $_GET['limit'] :4;
  $page = (isset($_GET['page'])) ? $_GET['page'] :1 ; 
   $links = (isset($_GET['links'])) ? $_GET['links'] :200;


  $umail=$_SESSION['u_email'];

   $query ="SELECT * FROM pemesanan where email  like '%".$umail."%' ";



require_once 'inc/paginator.class.php';
$paginator = new Paginator($dbh,$query);
$hbooking=$paginator->getData($limit,$page);
?>

                      

<h2>Booking History</h2>
                    <div class="history">
                        <div class="ctn-wrp">
                            <p style="display:<?php if($hbooking->total==0){echo'block;';}else{echo'none;';}?>" class="largish no-past-orders"><br />Tidak Ada Pesanan</p>
                            <div class="button-wrapper">
                            <?php
$nomor=1;
for($i=0;$i < count($hbooking->data);$i++){
    $hbooking=$hbooking->data[$i];
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
                              
                            
                             
                                <th colspan="6"><?php echo '<h1 style=" text-align:center;font-size:4em; color:#1d3a74;">Booking '.$nomor.'</h1>'; ?></th>
                              
                                
                                
</thead>
<thead>
<th>No</th>
<th>Nama</th>
<th>Email</th>
<th>Alamat</th>
<th>No. Telp</th>
<th>Keterangan</th>
</thead>
<tbody>

<tr>
<td><?php echo $nomor; ?></td>
<td style="text-transform:capitalize;"><?php echo $hbooking['namadepan'].' '.$hbooking['namabelakang'] ?></td>
<td style="text-transform:capitalize;"><?php echo $hbooking['email'];?></td>
<td style="text-transform:capitalize;"><?php echo $hbooking['alamat'];?></td>
<td style="text-transform:capitalize;"><?php echo $hbooking['telp'];?></td>
<td style="text-transform:capitalize;"><?php echo $hbooking['keterangan'];?></td>
</tr>
<tr>
<td colspan="2">Status:<br><?php if(empty($hbooking['status'])){echo'<a class="button-red button-fluid" style="background:orange; ">Menunggu Pembayaran</a>';}else{echo'<a class="button-red button-fluid" style="background:green; ">Pembayaran Sukses</a>';}?></td>
<td colspan="2"><br>
<a style="display:<?php if(empty($hbooking['status'])){echo'block';}else{echo'none';} ?>;" href="inc/hapusbooking.php?id=<?php echo $hbooking['id']; ?>" onclick="return confirm('Anda Yakin Ingin Membatalkan Booking?')" class="button-red button-fluid">Batalkan Booking</a></td>
<td colspan="2"><?php if(empty($hbooking['status'])){echo'Struk:';}else{echo'';} ?><br>
<a style="display:<?php if(empty($hbooking['status'])){echo'block';}else{echo'none';} ?>;" href="hubungikami.php?halaman=compose&bookingid=<?php echo $hbooking['id']; ?>" style="background:#1d3a74; "  class="button-red button-fluid">Kirim Struk</a>
</td>
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

 <?php $nomor++; }?>
     
                               
                            
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
