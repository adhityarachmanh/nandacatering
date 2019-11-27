<?php 
   include'inc/koneksi.php';
 $limit = (isset($_GET['limit'])) ? $_GET['limit'] :10;
  $page = (isset($_GET['page'])) ? $_GET['page'] :1 ; 
   $links = (isset($_GET['links'])) ? $_GET['links'] :200;


$query ="SELECT * FROM barang  where id='$_GET[id]'";


require_once 'inc/paginator.class.php';
$paginator = new Paginator($dbh,$query);
$lihatdetail=$paginator->getData($limit,$page);
?>
<?php include'inc/cart.inc.php'?>
<!DOCTYPE html>
<html  xml:lang="en" lang="en">
<head>
        <title> Nanda Catering&#39;s - Kelezatan dan Citarasa yang Berbeda</title>
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<?php include'head.php';?>
</head>

<?php include'header.php';?>
<!-- ==== Scripts ====-->
<?php
        for($i=0;$i < count($lihatdetail->data);$i++){
        $klik=$lihatdetail->data[$i]; 
        ?>            
 <div id="bodyholder">
        
                <section class="menu-item-wrapper" >
                    <!-- ==== Menu Item Display section ==== -->
                    
                    <img  src="<?php echo "imgevent/".$klik['gambar'];?>" width="100%" >
                    <!-- ==== Menu detail section ==== -->
                    <div class="menu-item-details menu-wrp">
                        
                        <div class="row rowFullWidth">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left item-container">
                                <div class="item-discription">
                                    <div class="pre-h1">
                                        <h1><?php echo $klik['judul'];?></h1>
                                        
                                    </div>
                                    
                                    <p name="menuitem_description"><?php echo $klik['keterangan'];?></p>
                                    <p>
                            <span class="change-calories cals item-calories"><img src="img/icon-budget.png" style=""></span><span class="cal">&nbsp;Rp</span><?php echo " ".$klik['harga'];?><span class="cal">&nbsp;,00</span>
                                    </p>
                                
            
            
                                    
                                </div>
                                <?php if($_SESSION['uid']){echo'<form method="post" action="?action=rating&id='.$_GET['id'].'">';}else{echo"";}?>
                  <input type="hidden" name="idrating" value="<?php echo $klik['id']; ?>">
                <input type="hidden" name="namarating" value="<?php echo $klik['judul']; ?>">
                <input type="hidden" name="gambarrating" value="<?php echo $klik['gambar']; ?>">
                  <button onclick="document.getElementById('login').style.display='<?php if($_SESSION['uid']){echo'none';}else{echo"block";}?>'"> 
                <input  name="ratingdepan" id="input-21e" value="<?php echo $klik["rating"]; ?>"   class="rating" data-min=0 data-max=5 data-step=0.1 data-size="xs">
                </button>
                 <?php if($_SESSION['uid']){echo'</form >';}else{echo"";}?>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left item-container">
                            <h4 class="option-name"></h4>
                            <?php if($_SESSION['uid']){echo'<form method="post" action="?action=jumlahmodal&id='.$_GET['id'].'">';}else{echo"";}?>
              <button style="display:<?php if($_SESSION['uid']){echo'block';}else{echo'none';}?>" class="order-customization-link button button-red" type="submit">Add to Cart</button>
           
           
            <input type="hidden" name="foto" value="<?php echo $klik["gambar"]; ?>" />
            <input type="hidden" name="nama" value="<?php echo $klik["judul"]; ?>" />
            <input type="hidden" name="id" value="<?php echo $klik["id"]; ?>" />
            <input type="hidden" name="harga" value="<?php echo $klik["harga"]; ?>" />
              <?php if($_SESSION['uid']){echo'</form >';}else{echo"";}?>
                           </div>
                                                </div>
                        </div>
                        
                    </div> 
                </section>
        
            </div>
            <?php }?>       
            <div>
                <div class="row rowFullWidth main-wrp download-menu">
                <section class="home-menu">
        <div class="ctn">
            <br>
            <div class="h2">Paket Terpopuler Nanda Catering</div>
            <br>
            <div class="home-menu-wrapper">
                <div id="homeMenu">
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


$query ="SELECT * FROM barang ORDER BY RAND() LIMIT 0,10;";


require_once 'inc/paginator.class.php';
$paginator = new Paginator($dbh,$query);
$kategori=$paginator->getData($limit,$page);
?>
      <?php
        for($i=0;$i < count($kategori->data);$i++){ 
        $viewpopuler=$kategori->data[$i];
        ?>                
    <div class="" style="margin:0 20px;">
        <!-- class = col-lg-6 col-md-6 col-sm-6 col-xs-12 -->
                <a  href="lihatbarang.php?id=<?php echo $viewpopuler['id'];?>" title="Catering Menu">
            <img style="height: 200px; width: 200px;" src="imgevent/<?php echo $viewpopuler['gambar']; ?>" class="items" alt="Catering Menu" /><!-- &maxHeight=265 -->
                </a>
                 <h4><?php echo $viewpopuler['judul']; ?></h4>

                  <?php if($_SESSION['uid']){echo'<form method="post" action="?action=rating&id='.$viewpopuler['id'].'">';}else{echo"";}?>
                  <input type="hidden" name="gambarrating" value="<?php echo $viewpopuler['gambar']; ?>">
                  <input type="hidden" name="idrating" value="<?php echo $viewpopuler['id']; ?>">
                <input type="hidden" name="namarating" value="<?php echo $viewpopuler['judul']; ?>">
                  <button  onclick="document.getElementById('login').style.display='<?php if($_SESSION['uid']){echo'none';}else{echo"block";}?>'"> 
                <input  name="ratingdepan" id="input-21e" value="<?php echo $viewpopuler["rating"]; ?>"   class="rating" data-min=0 data-max=5 data-step=0.1 data-size="xs">
                </button>
                 <?php if($_SESSION['uid']){echo'</form >';}else{echo"";}?>
                 <br>
                       
                     <br>
                     <a href="lihatbarang.php?id=<?php echo $viewpopuler['id'];?>" title="Catering Menu">

<img src="Static/Images/catering2/btn-view-items.png" alt="View Items Button" /><br>
</a>
                    
        <div class="<?php if ($_SESSION['uid']) {echo "hidden";}else{echo "";} ?>">
        <br>
        <a style="background: #1d3a74;" onclick="document.getElementById('login').style.display='block'" class="btn btn-warning <?php if ($_SESSION['uid']) {echo "hidden";}else{echo "";} ?>">Login to Order</a>
        </div>
        
        <?php if($_SESSION['uid']){echo'<form method="post" action="?action=jumlahmodal">';}else{echo"";}?>
              <button style="display:<?php if($_SESSION['uid']){echo'block';}else{echo'none';}?>; margin:0 25%;" class="order-customization-link button button-red" type="submit">Add to Cart</button>
           
           
            <input type="hidden" name="foto" value="<?php echo $viewpopuler["gambar"]; ?>" />
            <input type="hidden" name="nama" value="<?php echo $viewpopuler["judul"]; ?>" />
            <input type="hidden" name="id" value="<?php echo $viewpopuler["id"]; ?>" />
            <input type="hidden" name="harga" value="<?php echo $viewpopuler["harga"]; ?>" />
              <?php if($_SESSION['uid']){echo'</form >';}else{echo"";}?>
    </div>
<?php }?>
                </div>
            </div><link href="Static/css/news.min.css" rel="stylesheet" />

         
        </div>
    </section>
                </div>
            </div>
            
                    </div>
               
                    
            

        
    </div>
    <?php include'footer.php';?>
</body>


</html>
