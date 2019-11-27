<section class="content-header">
      <h1>
        <?php if($_SESSION['u_uid']=="admin"){ echo'Selamat Datang Admin '.$_SESSION['u_first']." ".$_SESSION['u_last'];} ?>
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Messages</span>
   <?php          
$user="root";
$pass="";
try {
  $dbh = new PDO('mysql:host=localhost;dbname=admin',$user,$pass);
} catch (PDOException $e) {
  print "ERROR!:" .$e->getMessage()."</br>";
  die();
}
 $limit = (isset($_GET['limit'])) ? $_GET['limit'] :100;
  $page = (isset($_GET['page'])) ? $_GET['page'] :1 ; 
   $links = (isset($_GET['links'])) ? $_GET['links'] :200;

   $query ="SELECT * FROM pesan ";
require_once '../inc/paginator.class.php';
$paginator = new Paginator($dbh,$query);
$mail=$paginator->getData($limit,$page);
?>


              <span class="info-box-number"><?php echo $mail->total; ?></span>
 
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <?php          
$user="root";
$pass="";
try {
  $dbh = new PDO('mysql:host=localhost;dbname=admin',$user,$pass);
} catch (PDOException $e) {
  print "ERROR!:" .$e->getMessage()."</br>";
  die();
}
 $limit = (isset($_GET['limit'])) ? $_GET['limit'] :100;
  $page = (isset($_GET['page'])) ? $_GET['page'] :1 ; 
   $links = (isset($_GET['links'])) ? $_GET['links'] :200;

   $query ="SELECT * FROM barang WHERE rating ";
require_once '../inc/paginator.class.php';
$paginator = new Paginator($dbh,$query);
$rating=$paginator->getData($limit,$page);
?>
       
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Likes</span>
              
              <span class="info-box-number"><?php echo $rating->total; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Sales</span>
              <span class="info-box-number">760</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <?php          
$user="root";
$pass="";
try {
  $dbh = new PDO('mysql:host=localhost;dbname=admin',$user,$pass);
} catch (PDOException $e) {
  print "ERROR!:" .$e->getMessage()."</br>";
  die();
}
 $limit = (isset($_GET['limit'])) ? $_GET['limit'] :100;
  $page = (isset($_GET['page'])) ? $_GET['page'] :1 ; 
   $links = (isset($_GET['links'])) ? $_GET['links'] :200;

   $query ="SELECT * FROM users ";



require_once '../inc/paginator.class.php';
$paginator = new Paginator($dbh,$query);
$register=$paginator->getData($limit,$page);
?>

        <!-- /.col -->
       
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
         
              <span class="info-box-text">Regiter Member</span>
             
              <span class="info-box-number"><?php echo $register->total; ?></span>
     
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      
      <!-- /.row -->

    
      <!-- /.row -->

      <!-- Main row -->
   
       
          <!-- /.box -->
          <div class="row">


            <div class="col-md-6">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Member Nanda Catering</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger"><?php echo $register->total-1; ?> Member Nanda Catering</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                  <?php
        for($i=0;$i < count($register->data);$i++){
        $daftarregister=$register->data[$i]; 
        ?>
        <?php if($daftarregister['user_uid']!="admin"){
                   echo '<li>
                      <img style="height:100px;" src="../imgevent/fotouser/'.$daftarregister['fotouser'] .'" alt="User Image">
                      <a class="users-list-name" href="#">'.$daftarregister['user_first']." ".$daftarregister['user_last'] .'</a>
                      <span class="users-list-date">15 Jan</span>
                    </li>';}?>
        <?php }?>
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
               
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- TABLE: LATEST ORDERS -->
          <?php          
$user="root";
$pass="";
try {
  $dbh = new PDO('mysql:host=localhost;dbname=admin',$user,$pass);
} catch (PDOException $e) {
  print "ERROR!:" .$e->getMessage()."</br>";
  die();
}
 $limit = (isset($_GET['limit'])) ? $_GET['limit'] :100;
  $page = (isset($_GET['page'])) ? $_GET['page'] :1 ; 
   $links = (isset($_GET['links'])) ? $_GET['links'] :200;

   $query ="SELECT * FROM orders ";



require_once '../inc/paginator.class.php';
$paginator = new Paginator($dbh,$query);
$dataorder=$paginator->getData($limit,$page);
?>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Pemesanan Terkini</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Kode Pesanan</th>
                    <th>Barang</th>
                    <th>Status</th>
                    <th>Nama Pemesan</th>
                  </tr>
                  </thead>
                  <tbody>
<?php for ($i=0;$i < count($dataorder->data); $i++) { 
$order=$dataorder->data[$i];
$gam=$order['gambarorder'];
$nam=$order['barang'];
$syarat="|";
$syarat1="+";
$syarat3=",";
$explodegambar=explode($syarat,trim($gam,$syarat));
$explodebarang=explode($syarat1,trim($nam,$syarat1));
?>
                  <tr>
                    <td><a href="#"><?php echo $order['kodepesanan'] ?></a></td>
                    <td><?php
ob_start();
                    foreach($explodebarang as $barang){$ea=explode($syarat,trim($barang,$syarat)); echo $ea[0].",";} $output=ob_get_clean(); echo rtrim($output,", ,");  ?></td>
                    <td><?php if($order['status']==1){echo '<a class="label label-warning" style="background:orange; ">Menunggu Pembayaran</a>';}
              elseif($order['status']==2){echo '<a class="label label-success" style="background:#00ff00;">Pembayaran Sukses</a>';}
              elseif($order['status']==3){echo '<a class="label label-warning" style=" ">Barang Dalam Pengemasan</a>';}
              elseif($order['status']==4){echo '<a class="label label-success" style="background:#00ff80; ">Barang Telah di Kirim</a>';}
              elseif($order['status']==5){echo '<a class="label label-success" style="background:#1d3a74; ">Barang Telah di Terima</a>';}?></td>
                    <td><?php echo $order['first']." ".$order['last'] ?></td>
                  </tr>
<?php }?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="dashboard.php?halaman=order" class="btn btn-sm btn-default btn-flat pull-right">Lihat Semua Order</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

      
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>