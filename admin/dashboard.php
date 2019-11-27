 <?php 
    $koneksi= new mysqli("localhost","root","","admin");
    session_start();
    if($_SESSION['u_uid']=="admin"){echo'';}elseif($_SESSION['u_uid']){echo'<script>alert("Hayo ngapain User Masuk Dashboard")</script>'; echo '<script>window.location="../index.php"</script>';}else{echo'<script>alert("Hayo ngapain Guest Masuk Dashboard")</script>'; echo '<script>window.location="../index.php"</script>';}
  
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Nanda Catering | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
  
    <!-- Logo -->
    <a href="dashboard.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>&#9813;</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
       
            
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success"></span>
            </a>
       
            <ul class="dropdown-menu">
              
              <li class="header"></li>
           
              <li>
                <!-- inner menu: contains the actual data -->
                <?php 
        include'../inc/conn.php';
        $tarik=$db->query("SELECT * FROM pesan where untuk='admin'"); ?>
		<?php while ($pesan=$tarik->fetch_assoc()) {
		?>
                <ul class="menu">
               
                  <li>
                    <a href="../hubungikami.php?halaman=bacapesan&id=<?php echo $pesan['id'];?>">
                      <div class="pull-left">
                      <?php 
      
        $darifoto=$pesan['dari'];
        $tarikfoto=$db->query("SELECT * FROM users where user_uid='$darifoto'"); ?>
		<?php while ($foto=$tarikfoto->fetch_assoc()) {
		?>
                        <img src="<?php echo '../imgevent/fotouser/'.$foto['fotouser']?>" class="img-circle" alt="User Image">
                        <?php }?>
                      </div>
                      <h4>
                       <?php echo $pesan['dari'] ?>
                        <small><i class="fa fa-clock-o"></i><?php 
date_default_timezone_set("Asia/Jakarta");       
$start = date_create($pesan['tanggalwaktu']);
$end = date_create('now');
$diff=date_diff($end,$start);
if($diff->format('%y')>0){
  echo $diff->format('%y').' Tahun ';
}else{
if($diff->format('%m')>0){
  echo $diff->format('%m').' Bulan ';
}else{
if($diff->format('%d')>0){
  echo $diff->format('%d').' Hari ';
}else{
if($diff->format('%h')>0){
  echo $diff->format('%h').' Jam ';
}else{
if($diff->format('%i')>0){
  echo $diff->format('%i').' Menit ';
}else{
  if($diff->format('%s')>0){
    echo $diff->format('%s').' Detik ';
  }
}
}
}
}
}
 ?> Yang Lalu</small>
                      </h4>
                      <p><?php echo $pesan['subjek']; ?></p>
                    </a>
                  </li>
                </ul>
                <?php }?>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
            
          </li>
 
          <!-- Notifications: style can be found in dropdown.less -->
         
          <!-- Tasks: style can be found in dropdown.less -->
        
          <!-- User Account: style can be found in dropdown.less -->

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php if(isset($_SESSION['uid'])){ echo '../imgevent/fotouser/'.$_SESSION['u_foto'];}else{echo'';}?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php if(isset($_SESSION['uid'])){ echo "&#9813;".$_SESSION['u_first'].' '.$_SESSION['u_last'];}else{echo'';}?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src=" <?php if(isset($_SESSION['uid'])){ echo '../imgevent/fotouser/'.$_SESSION['u_foto'];}else{echo'';}?>" class="img-circle" alt="User Image">

                <p>
                  <?php if(isset($_SESSION['uid'])){ echo "&#9813;".$_SESSION['u_first'].' '.$_SESSION['u_last'];}else{echo'';}?> - Web Developer
                  <small> <?php if(isset($_SESSION['uid'])){ echo $_SESSION['u_uid'];}else{echo'';}?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
               
                  </div>
            
                  <a href="../index.php" class="btn btn-default btn-flat">Halaman User</a>
            
                  <div class="col-xs-4 text-center">
             
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../inc/logout.inc.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php if(isset($_SESSION['uid'])){ echo '../imgevent/fotouser/'.$_SESSION['u_foto'];}else{echo'';}?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php if(isset($_SESSION['uid'])){ echo "&#9813; ".$_SESSION['u_first'].' '.$_SESSION['u_last'];}else{echo'';}?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="dashboard.php"><i class="fa fa-circle-o"></i>Dashboard</a></li>
            
          </ul>
        </li>
        
        <li>
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
       
        
       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="treeview"><a href=""><i class="fa fa-table"></i> <span>Paket</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span></a>
                <ul class="treeview-menu">
                  <li><a href="dashboard.php?halaman=nasitumpeng"><i class="fa fa-circle-o"></i>Nasi Tumpeng</a></li>
                  <li><a href="dashboard.php?halaman=nasibox"><i class="fa fa-circle-o"></i>Nasi Box</a></li>
                  <li><a href="dashboard.php?halaman=boxsnack"><i class="fa fa-circle-o"></i>Box Snack</a></li>
                  <li><a href="dashboard.php?halaman=minuman"><i class="fa fa-circle-o"></i>Minuman</a></li>
                  <li><a href="dashboard.php?halaman=paketbuffet"><i class="fa fa-circle-o"></i>Paket Buffet</a></li>
                </ul>
            </li>
          </ul>
        </li>
       
        <li>
          <a href="../hubungikami.php?halaman=inbox&page=1">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
          
          </a>
        </li>
      
        <li>
          <a href="dashboard.php?halaman=order">
            <i class="fa fa-shopping-cart"></i> <span>Orders</span>
           
          </a>
        </li>
        <li>
          <a href="dashboard.php?halaman=pemesanan">
           <span>Daftar Booking</span>
           
          </a>
        </li>
        <li>
          <a href="dashboard.php?halaman=terimapemesanan">
           <span>Booking Yang Diterima</span>
           
          </a>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <?php
        if (isset($_GET['halaman'])) 
        {
            if ($_GET['halaman']=="nasitumpeng") 
            {
                include 'nasitumpeng/nasitumpeng.php';
            }
            elseif ($_GET['halaman']=="tambahnasitumpeng")
            {
                include 'nasitumpeng/tambahnasitumpeng.php';
            }
            elseif ($_GET['halaman']=="hapusnasitumpeng")
            {
                include 'nasitumpeng/hapusnasitumpeng.php';
            }
            elseif ($_GET['halaman']=="ubahnasitumpeng")
            {
                include 'nasitumpeng/ubahnasitumpeng.php';
            }
            if ($_GET['halaman']=="nasibox") 
            {
                include 'nasibox/nasibox.php';
            }
            elseif ($_GET['halaman']=="tambahnasibox")
            {
                include 'nasibox/tambahnasibox.php';
            }
            elseif ($_GET['halaman']=="hapusnasibox")
            {
                include 'nasibox/hapusnasibox.php';
            }
            elseif ($_GET['halaman']=="ubahnasibox")
            {
                include 'nasibox/ubahnasibox.php';
            }
            if ($_GET['halaman']=="boxsnack") 
            {
                include 'boxsnack/boxsnack.php';
            }
            elseif ($_GET['halaman']=="tambahboxsnack")
            {
                include 'boxsnack/tambahboxsnack.php';
            }
            elseif ($_GET['halaman']=="hapusboxsnack")
            {
                include 'boxsnack/hapusboxsnack.php';
            }
            elseif ($_GET['halaman']=="ubahboxsnack")
            {
                include 'boxsnack/ubahboxsnack.php';
            }
            elseif ($_GET['halaman']=="paketbuffet")
            {
                include 'paketbuffet/paketbuffet.php';
            }
            elseif ($_GET['halaman']=="tambahpaketbuffet")
            {
                include 'paketbuffet/tambahpaketbuffet.php';
            }
            elseif ($_GET['halaman']=="hapuspaketbuffet")
            {
                include 'paketbuffet/hapuspaketbuffet.php';
            }
            elseif ($_GET['halaman']=="ubahpaketbuffet")
            {
                include 'paketbuffet/ubahpaketbuffet.php';
            }
             if ($_GET['halaman']=="minuman") 
            {
                include 'minuman/minuman.php';
            }
            elseif ($_GET['halaman']=="tambahminuman")
            {
                include 'minuman/tambahminuman.php';
            }
            elseif ($_GET['halaman']=="hapusminuman")
            {
                include 'minuman/hapusminuman.php';
            }
            elseif ($_GET['halaman']=="ubahminuman")
            {
                include 'minuman/ubahminuman.php';
            }
            elseif ($_GET['halaman']=="pemesanan") 
            {
                include 'pemesanan/pemesanan.php';
            }
            elseif ($_GET['halaman']=="hapuspemesanan")
            {
                include 'pemesanan/hapuspemesanan.php';
            }
            elseif ($_GET['halaman']=="terimapemesanan")
            {
                include 'pemesanan/terimapemesanan.php';
            }
            elseif ($_GET['halaman']=="terima")
            {
                include 'pemesanan/terima.php';
            }
            elseif ($_GET['halaman']=="batalpenerimaan")
            {
                include 'pemesanan/batal.php';
            }
            elseif ($_GET['halaman']=="pelaksanaan")
            {
                include 'pemesanan/pelaksanaan.php';
            }
            elseif ($_GET['halaman']=="komen")
            {
                include 'komen/komen.php';
            }
            elseif ($_GET['halaman']=="hapuskomen")
            {
                include 'komen/hapuskomen.php';
            }
            elseif ($_GET['halaman']=="balaskomen")
            {
                include 'komen/balaskomen.php';
            }
            elseif ($_GET['halaman']=="registrasi")
            {
                include 'registrasi/registrasi.php';
            }
            elseif ($_GET['halaman']=="hapususer")
            {
                include 'registrasi/hapususer.php';
            }
            
            elseif ($_GET['halaman']=="login")
            {
                include 'login/login.php';
            }
            
            if ($_GET['halaman']=="kontak") 
            {
                include 'kontak/kontak.php';
            }
            elseif ($_GET['halaman']=="tambahkontak")
            {
                include 'kontak/tambahkontak.php';
            }
            elseif ($_GET['halaman']=="hapuskontak")
            {
                include 'kontak/hapuskontak.php';
            }
            elseif ($_GET['halaman']=="ubahkontak")
            {
                include 'kontak/ubahkontak.php';
            }
            if ($_GET['halaman']=="sarankritik")
            {
                include 'sarandankritik/sarankritik.php';
            }
            elseif ($_GET['halaman']=="hapussarankritik")
            {
                include 'sarandankritik/hapussarankritik.php';
            }
            elseif ($_GET['halaman']=="kumpulanresep") 
            {
                include 'kumpulanresep/kumpulanresep.php';
            }
            elseif ($_GET['halaman']=="tambahresep")
            {
                include 'kumpulanresep/tambahresep.php';
            }
            elseif ($_GET['halaman']=="hapusresep")
            {
                include 'kumpulanresep/hapusresep.php';
            }
            elseif ($_GET['halaman']=="ubahresep")
            {
                include 'kumpulanresep/ubahresep.php';
            }
            if ($_GET['halaman']=="order") 
            {
                include 'order/order.php';
            }
            elseif ($_GET['halaman']=="pengiriman")
            {
                include 'order/pengiriman.php';
            }
             elseif ($_GET['halaman']=="pembayaransukses")
            {
                include 'order/pembayaransukses.php';
            }
             elseif ($_GET['halaman']=="pengemasan")
            {
                include 'order/pengemasan.php';
            }
            elseif ($_GET['halaman']=="hapusorder")
            {
                include 'order/hapusorder.php';
            }
             elseif ($_GET['halaman']=="loginadmin")
            {
                include 'loginadmin.php';
            }
            elseif ($_GET['halaman']=="logout")
            {
                include 'logout.inc.php';
            } elseif ($_GET['halaman']=="mail")
            {
                include 'mail.php';
            }elseif ($_GET['halaman']=="kalender")
            {
                include 'calender.php';
            }
        }else
        {
            include 'admin.php';
        }       
        ?>
  </div>
  <!-- /.content-wrapper -->

  

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</body>
</html>
