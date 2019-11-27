<?php
  session_start();
  if(isset($_POST['inputbox'])){
    include'inc/koneksi.php';
 $limit = (isset($_GET['limit'])) ? $_GET['limit'] :4;
  $page = (isset($_GET['page'])) ? $_GET['page'] :1 ; 
   $links = (isset($_GET['links'])) ? $_GET['links'] :200;


  $inputbox=$_POST['inputbox'];

   $query ="SELECT * FROM barang where CONCAT(judul,harga,keterangan,jenispaket) like '%".$inputbox."%' AND harga BETWEEN 300 AND 1000  ";

require_once 'inc/paginator.class.php';
$paginator = new Paginator($dbh,$query);
$results=$paginator->getData($limit,$page);
  }else{
    include'inc/koneksi.php';
     $limit = (isset($_GET['limit'])) ? $_GET['limit'] :4;
      $page = (isset($_GET['page'])) ? $_GET['page'] :1 ; 
       $links = (isset($_GET['links'])) ? $_GET['links'] :200;
    
    
      
    
    $query ="SELECT * FROM barang where harga BETWEEN 300 AND 1000";
    
    
    
    require_once 'inc/paginator.class.php';
    $paginator = new Paginator($dbh,$query);
    $results=$paginator->getData($limit,$page);
  }
?>
<?php include'inc/cart.inc.php'?>
<!DOCTYPE html>
<head>
<title> Nanda Catering&#39;s - Kelezatan dan Citarasa yang Berbeda</title>
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<?php include'head.php';?>
</head>
<?php include'header.php';?>
   <div id="bodyholder">
        <section class="menu-wrp menu-home">
        <a href="terlaris.php" class="order-customization-link button button-red <?php if(isset($_POST['inputbox'])){ echo"";}else{echo 'hidden';}?>">Kembali</a>
            <h1 class="item-title blue"><?php if(isset($_POST['inputbox'])){ echo"Pencarian Kategori Terlaris";}else{echo'Kategori Terlaris';}?></h1>
            <div class="row rowFullWidth">
                <div class="ctn-wrp">
                    <div class="main-wrp item-wrapper">
                    </div>
                </div>
            </div>

        </section>

        <!-- ==== Menu category section ==== -->
        <section class="menu-wrp menu-home">
            <div class="row rowFullWidth">
                <div class="ctn-wrp">
                    <div class="text-center">
                    <div style="margin: 0 30%;">
                      <form method="post" action="?cari=<?php if(isset($_POST['inputbox'])){echo $_POST['inputbox'];}?>">
                      
                      <input style="border-radius:10px; padding:5px; width: 100%;"  id="searchbox" name="inputbox"  type="text" placeholder="Cari Barang.." required/>
                    
                    <p style="background:green; display:<?php if(isset($_POST['inputbox'])){ if(count($results->data)>0){echo "block;";}else{echo 'none';}}?>" id="user-exists">Hasil Pencarian <?php if(isset($_POST['inputbox'])){echo '"'.$_POST['inputbox'].'" Ada "'.$results->total.'" Barang';}?></p>
                    <p style="display:<?php if(isset($_POST['inputbox'])){ if($results->total!==0){echo "";}else{echo 'block';}}?>" id="user-exists">Pencarian Barang <?php if(isset($_POST['inputbox'])){echo '"'.$_POST['inputbox'].'"';}?> Tidak Ada</p>
                  </form>
          
                  </div>
                    <?php echo $paginator->createLinks($links);?>
                    </div>
                      
                    <div class="main-wrp item-wrapper">

 <?php
        for($i=0;$i < count($results->data);$i++){
        $terlaris=$results->data[$i]; 
        ?>
                               
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 centered menu-hover">
                                       <a href="lihatbarang.php?id=<?php echo $terlaris['id'];?>" class="active" >
                                        <img width="250" height="250" class="img-circle" src="<?php echo "imgevent/".$terlaris['gambar'];?>" class="items" alt="Gambar">
                                           </a>
                                        <h2 class="item-name"><?php echo $terlaris['judul'];?></h2>
                                        <?php if($_SESSION['uid']){echo'<form method="post" action="?action=rating">';}else{echo"";}?>
                  <input type="hidden" name="idrating" value="<?php echo $terlaris['id']; ?>">
                <input type="hidden" name="namarating" value="<?php echo $terlaris['judul']; ?>">
                <input type="hidden" name="gambarrating" value="<?php echo $terlaris['gambar']; ?>">
                  <button onclick="document.getElementById('login').style.display='<?php if($_SESSION['uid']){echo'none';}else{echo"block";}?>'"> 
                <input  name="ratingdepan" id="input-21e" value="<?php echo $terlaris["rating"]; ?>"   class="rating" data-min=0 data-max=5 data-step=0.1 data-size="xs">
                </button>
                 <?php if($_SESSION['uid']){echo'</form >';}else{echo"";}?>
                                            <p class="calories"><img src="img/icon-budget.png" style="">Rp <span><?php echo $terlaris['harga'];?></span>,00</p>
                                            <p style="text-transform: capitalize;" class="calories"><span><?php $r=$terlaris['keterangan']; $a=explode(",", $r); echo $a['0']; ?></span></p>
                                                                                <div class="button-wrapper">
                                            <a href="lihatbarang.php?id=<?php echo $terlaris['id'];?>" class="button-blue view-menu-item" title="">VIEW</a>
      
          <?php if($_SESSION['uid']){echo'<form method="post" action="?action=jumlahmodal">';}else{echo"";}?>
          <button class="order-customization-link button button-red <?php if($_SESSION['uid']){echo'';}else{echo'hidden';}?>" type="submit">Add to Cart</button>
           
           
            <input type="hidden" name="foto" value="<?php echo $terlaris["gambar"]; ?>" />
            <input type="hidden" name="nama" value="<?php echo $terlaris["judul"]; ?>" />
            <input type="hidden" name="id" value="<?php echo $terlaris["id"]; ?>" />
            <input type="hidden" name="harga" value="<?php echo $terlaris["harga"]; ?>" />
              <?php if($_SESSION['uid']){echo'</form >';}else{echo"";}?>
<div class="shakejumlah" style="margin:5% 0; margin-right: 20%;">
<a style="transform: rotate(10deg); border-radius: 100%;" onclick="document.getElementById('login').style.display='block'" class="order-customization-link button button-red <?php if ($_SESSION['uid']) {echo "hidden";}else{echo "";} ?>">Login to Order</a>  </div>                                     </div>
                                    </div>
                             
                               <?php }?>
                               
                            </div>
                                
                    </div>
               
                </div> 
                      
        </section>
        <section class="home-join-our-clubs">
        <div class="row rowFullWidth">
    <div class="ctn-wrp">
        <div class="main-wrp join-our-clubs-orig">
            <div class="title-block">
                <div class="title">Komentar Nanda Catering</div>
                <div class="promo-text">
                   
                </div>
            </div>
             <?php include'komen.php';?>
        </div>
    </div>
</div>


    </section>
        </div>
        <script>
$(document).ready(function(){
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"php/add_tumpeng.php",
   method:"POST",
   data:form_data,
   dataType:"JSON",
   success:function(data)
   {
    if(data.error != '')
    {
     $('#comment_form')[0].reset();
     $('#comment_message').html(data.error);
     $('#comment_id').val('0');
     load_comment();
    }
   }
  })
 });

 load_comment();

 function load_comment()
 {
  $.ajax({
   url:"php/fetch_tumpeng.php",
   method:"POST",
   success:function(data)
   {
    $('#display_comment').html(data);
   }
  })
 }

 $(document).on('click', '.reply', function(){
  var comment_id = $(this).attr("id");
  $('#comment_id').val(comment_id);
  $('#comment_name').focus();
 });
 });
</script>
  <?php include'footer.php';?>

 
  
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable div").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</body>

</html>

