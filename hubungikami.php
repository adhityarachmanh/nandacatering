<?php 
session_start();
if($_SESSION['uid']){echo"";}else{echo "<script>location='index.php';</script>";}?>
<?php include'inc/cart.inc.php'?>
<?php
   include'inc/koneksi.php';
 $limit = (isset($_GET['limit'])) ? $_GET['limit'] :100;
  $page = (isset($_GET['page'])) ? $_GET['page'] :1 ; 
   $links = (isset($_GET['links'])) ? $_GET['links'] :200;
   $untukusername=$_SESSION['u_uid'];
 

$query ="SELECT * FROM pesan where untuk='$untukusername' ORDER BY tanggalwaktu DESC";

    
require_once 'inc/paginator.class.php';
$paginator = new Paginator($dbh,$query);
$results=$paginator->getData($limit,$page);
?>
<?php include'inc/cart.inc.php'?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Nanda Catering | Hubungi Kami</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="admin/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="admin/plugins/iCheck/flat/blue.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="canonical" href="index.html" />
    <!-- Fav Icon Setting -->
    <link rel="apple-touch-icon" sizes="57x57" href="Static/Images/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="Static/Images/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="Static/Images/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="Static/Images/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="Static/Images/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="Static/Images/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="Static/Images/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="Static/Images/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="Static/Images/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="Static/Images/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="Static/Images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="Static/Images/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="Static/Images/favicons/favicon-16x16.png">
    <link href="Static/css/slick.min.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="../maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro|Source+Serif+Pro:400,700" rel="stylesheet">
    <link rel="stylesheet" href="../code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
    <link href="Static/css/global-style.min70e1.css?v=20180624" rel="stylesheet" media="all">
    <link href="Static/css/menu.min70e1.css?v=20180624" rel="stylesheet" media="all">
    <link href="Static/css/history.min70e1.css?v=20180624" rel="stylesheet" media="all">
    <!-- CDF: No CSS dependencies were declared //-->
    <link href="Static/css/ordering70e1.css?v=20180624" rel="stylesheet" media="all">
    
<link rel="prerender prefetch" href="menu/index.html">
<link href="Static/css/home.min70e1.css?v=20180624" rel="stylesheet" />
<link href="Static/css/flavor-feed.min70e1.css?v=20180624" rel="stylesheet" media="all">
<link href="Static/css/flavor-feed2.min70e1.css?v=20180624" rel="stylesheet" media="all">
<link href="Static/css/join-our-clubs.min70e1.css?v=20180624" rel="stylesheet" media="all">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<style>
    .btn-default{
        background:lightgrey;
        color:black;
    }
    .btn-default:hover, .btn-default:focus{
        background:white;
        color:black;
    }
    .content-header h1{
        color:maroon;
        
    }
    .nav > li > a:hover, .nav > li > a:active, .nav > li > a:focus{
   
    color:white;
    }
    .nav > li > #hubtmbl:hover{
      background:#ac1e2d;
    }
    .mailbox-read-message h1{

    
      color:maroon;
    }
    .breadcrumb .active{
      color:maroon;
      font-weight:bold;
    }
    .content-header h1{
      background: url(static/Images/global/global_nav_background.png) top;
    }
</style>

  
  <!-- Left side column. contains the logo and sidebar -->
  

  <!-- Content Wrapper. Contains page content -->
 
    <!-- Content Header (Page header) -->
    <?php include'header.php';?>
    <section class="content-header">
      <h1>
        Mailbox
      
        <small><?php echo count($results->data)?> Pesan Baru</small>
    
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="">Hubungi Kami</li>
        <li class="<?php if($_GET['halaman']=="inbox"){echo "active";}elseif($_GET['halaman']=="terkirim"){echo "active";  } ?>"><?php if($_GET['halaman']=="inbox"){echo "Kotak Masuk";}elseif($_GET['halaman']=="terkirim"){echo "Terkirim";  } ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="hubungikami.php?halaman=compose" class="btn btn-primary btn-block margin-bottom">Tulis Pesan</a>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Menu</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
           
                <li ><a id="hubtmbl" href="hubungikami.php?halaman=inbox&page=1"><i class="fa fa-inbox"></i> Kotak Masuk
                  <span class="label label-primary pull-right"><?php echo count($results->data)?></span></a></li>
                <li><a id="hubtmbl" href="hubungikami.php?halaman=terkirim&page=1"><i class="fa fa-envelope-o"></i> Terkirim</a></li>
               
                
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
      
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <?php
        if (isset($_GET['halaman'])) 
        {
            if ($_GET['halaman']=="inbox") 
            {
                include 'hubungikamitab/inbox.php';
            }elseif ($_GET['halaman']=="compose") 
            {
                include 'hubungikamitab/compose.php';
            }elseif ($_GET['halaman']=="bacapesan") 
          {
              include 'hubungikamitab/bacapesan.php';
          }elseif ($_GET['halaman']=="terkirim") 
          {
              include 'hubungikamitab/kirim.php';
          }
        }else
            {
                include 'hubungikamitab/inbox.php';
            }?>    
            
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

  <?php include'footer.php';?>

<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="admin/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="admin/dist/js/demo.js"></script>
<!-- iCheck -->
<script src="admin/plugins/iCheck/icheck.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Page Script -->
<script src="Static/Script/core.min.js"></script>
    
  
<script>
  $(function () {
    //Add text editor
    $("#compose-textarea").wysihtml5();
  });
</script>
</body>
</html>
