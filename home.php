  <?php 
   include'inc/koneksi.php';
 $limit = (isset($_GET['limit'])) ? $_GET['limit'] :10;
  $page = (isset($_GET['page'])) ? $_GET['page'] :1 ; 
   $links = (isset($_GET['links'])) ? $_GET['links'] :200;


$query ="SELECT * FROM barang  ORDER BY date DESC";


require_once 'inc/paginator.class.php';
$paginator = new Paginator($dbh,$query);
$home=$paginator->getData($limit,$page);
?>
<link href="Static/css/news.min.css" rel="stylesheet" />
 
  <div id="bodyholder">
            


<!-- ==== Home container start here ==== -->

<div class="container-fluid">
    <section class="hero-wrp yellow-dot hidden-xs" >
        <!--Carousel Images for Desktop, mobile-->
        <div class="global-wrpper" >
                                    
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                      <!-- Indicators -->
                     <ol class="carousel-indicators">
                    
                            <li data-target="#myCarousel" data-slide-to="0" class='active'><span class="hidden-wcag">slide 0</span></li>
                            <li data-target="#myCarousel" data-slide-to="1" class=''><span class="hidden-wcag">slide 1</span></li>
                            <li data-target="#myCarousel" data-slide-to="2" class=''><span class="hidden-wcag">slide 2</span></li>
                            <li data-target="#myCarousel" data-slide-to="3" class=''><span class="hidden-wcag">slide 3</span></li>
                            <li data-target="#myCarousel" data-slide-to="4" class=''><span class="hidden-wcag">slide 4</span></li>
                        </ol>
                    <div class="carousel-inner">
      <div class="item active">
        <img src="img/slider/1.jpg" alt="Los Angeles" style="width:100%; height: 400px;">
      </div>

      <div class="item">
        <img src="img/slider/2.jpg" alt="Chicago" style="width:100%; height: 400px;">
      </div>
    
      <div class="item">
        <img src="img/slider/3.jpg" alt="New york" style="width:100%; height: 400px;">
      </div>

      <div class="item">
        <img src="img/slider/4.jpg" alt="New york" style="width:100%; height: 400px;">
      </div>

      <div class="item">
        <img src="img/slider/5.jpg" alt="New york" style="width:100%; height: 400px;">
      </div>
    </div>
                         <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="hidden-wcag">previous slide</span><span class="fa fa-arrow-left zaxbys-red"></span></a>
                         <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="hidden-wcag">next slide</span><span class="fa fa-arrow-right zaxbys-red"></span></a>
                        </div>

<script src="Static/Script/jquery.mobile.custom.min.js"></script> 
<script type="text/javascript"> 
    $(document).ready(function () {
        $("#myCarousel").swiperight(function () {
            $("#myCarousel").carousel('prev');
        });
        $("#myCarousel").swipeleft(function () {
            $("#myCarousel").carousel('next');
        });
    });
</script>
        </div>
    </section>
     <!--Paket Baru Nanda Catering-->
    <section class="home-menu">
        <div class="ctn">
            <br>
            <div class="h2">Paket Baru Nanda Catering </div>
            <br>
            <div class="home-menu-wrapper">
                <div id="homeMenu">
      <?php
        for($i=0;$i < count($home->data);$i++){ 
        $paketbaru=$home->data[$i];
        ?>                
    <div class="" style="margin:0 20px;">
        <!-- class = col-lg-6 col-md-6 col-sm-6 col-xs-12 -->
                <a  href="lihatbarang.php?id=<?php echo $paketbaru['id'];?>" title="Catering Menu">
            <img style="height: 200px; width: 200px;" src="imgevent/<?php echo $paketbaru['gambar']; ?>" class="items" alt="Catering Menu" /><!-- &maxHeight=265 -->
                </a>
                 <h4><?php echo $paketbaru['judul']; ?></h4>

                  <?php if($_SESSION['uid']){echo'<form method="post" action="?action=rating">';}else{echo"";}?>
                  <input type="hidden" name="gambarrating" value="<?php echo $paketbaru['gambar']; ?>">
                  <input type="hidden" name="idrating" value="<?php echo $paketbaru['id']; ?>">
                <input type="hidden" name="namarating" value="<?php echo $paketbaru['judul']; ?>">
                  <button  onclick="document.getElementById('login').style.display='<?php if($_SESSION['uid']){echo'none';}else{echo"block";}?>'"> 
                <input  name="ratingdepan" id="input-21e" value="<?php echo $paketbaru["rating"]; ?>"   class="rating" data-min=0.001 data-max=5 data-step=0.001 data-size="xs">
                </button>
                 <?php if($_SESSION['uid']){echo'</form >';}else{echo"";}?>
                 <br>
                       
                     <br>
                     <a href="lihatbarang.php?id=<?php echo $paketbaru['id'];?>" title="Catering Menu">

<img src="Static/Images/catering2/btn-view-items.png" alt="View Items Button" /><br>
</a>
                    
        <div class="<?php if ($_SESSION['uid']) {echo "hidden";}else{echo "";} ?>">
        <br>
        <a style="background: #1d3a74;" onclick="document.getElementById('login').style.display='block'" class="btn btn-warning <?php if ($_SESSION['uid']) {echo "hidden";}else{echo "";} ?>">Login to Order</a>
        </div>
        
        <?php if($_SESSION['uid']){echo'<form method="post" action="?action=jumlahmodal">';}else{echo"";}?>
              <button style="display:<?php if($_SESSION['uid']){echo'block';}else{echo'none';}?>; margin:0 20%;" class="order-customization-link button button-red" type="submit">Add to Cart</button>
           
           
            <input type="hidden" name="foto" value="<?php echo $paketbaru["gambar"]; ?>" />
            <input type="hidden" name="nama" value="<?php echo $paketbaru["judul"]; ?>" />
            <input type="hidden" name="id" value="<?php echo $paketbaru["id"]; ?>" />
            <input type="hidden" name="harga" value="<?php echo $paketbaru["harga"]; ?>" />
              <?php if($_SESSION['uid']){echo'</form >';}else{echo"";}?>
             
    </div>
<?php }?>
                </div>
            </div><link href="Static/css/news.min.css" rel="stylesheet" />

         
        </div>
    </section>
    <!--Daftar Booking-->
    <?php
   include'inc/koneksi.php';
 $limit = (isset($_GET['limit'])) ? $_GET['limit'] :4;
  $page = (isset($_GET['page'])) ? $_GET['page'] :1 ; 
   $links = (isset($_GET['links'])) ? $_GET['links'] :200;


$query ="SELECT * FROM terimapemesanan";


require_once 'inc/paginator.class.php';
$paginator = new Paginator($dbh,$query);
$bkng=$paginator->getData($limit,$page);
?>
    <?php
        for($i=0;$i < count($bkng->data);$i++){
        $booking=$bkng->data[$i]; 
        ?>            
    
    <div class="row rowFullWidth">
                        
    <section class="ff-wrp yellow-dot">
        <section class="flavor-feed ff2 ff2-home">
            <div class="ctn-wrp">
                <div class="ff-full-feed ff-desktop">             
                </div>
                <div class="ff-zax-clubs ff-desktop">
                  
                    <div>
                       
                    </div>
                </div>
                <div class="title-block">
                    
                    <h1 class="ff_rotate">Daftar Booking</h1>
                    
                </div>

                <div class="ff-zax-clubs ff-mobile">
                    <div>
                        
                    </div>
                    <a href="zax-club/index.html">
                        <img src="Static/Images/catering2/zax_clubs.png" alt="Zax Clubs link" />
                    </a>
                </div>

                <div class="ff-full-feed ff-mobile">
                </div>
                <div class="main-wrp">
                    <div style="width:100%; position: relative;" id="ff-section">
                        <div class="gutter-sizer"></div>
                        <div class="grid-sizer"></div>     
 <!--Costume CSS-->           
<style>
.accordion-ctn .panel-group .panel-default .panel-title a span.nod span::before{
    background:white;
}
.accordion-ctn .panel-group .panel-default .panel-title a span.nod span::after{
    background:white;
}
.accordion-ctn .panel-group .panel-default .panel-title a span.nod span{
    border:white solid 2px;
}

</style>
 <!--Costume CSS-->   

  
<div class="container-fluid redborder" >

        <section class="accordion-ctn">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" style="background:url('static/Images/global/bg-wood-red.jpg') repeat top left;">
                
                    <div class="panel panel-default"  style="color:white;">
                        <div class="panel-heading" role="tab" id="3" style="background:url('static/Images/global/bg-wood-red.jpg') repeat top left;">
                            <h2 class="panel-title" >
                                <a data-toggle="collapse" data-parent="#accordion" href="#4-c" aria-expanded="false" aria-controls="3-c" style="color:white;">
                                    <span class="nod" >
                                        <span ></span>
                                    </span>
                                    <span style=" transform: rotate(3deg);">Klik Untuk Melihat Booking</span>
                                </a>
                            </h2>
                        </div>
                        <div id="4-c" class="panel-collapse collapse" role="tabpanel" aria-labelledby="3" style="background:url('static/Images/global/bg-wood-red.jpg') repeat top left;">
                            <div class="panel-body" >
                                <div class="ctn-wrp" >
                                <div id="pressRoomDivId" class="container-fluid redborder" >
 
    <section class="news-posts" style="background:url('static/Images/global/bg-wood-red.jpg') repeat top left;">
        <section class="ctn-wrp" style="background:lightgrey;">

                     
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="news-img-ctn">
                                                <a  title="Booking">
                                                    <img src="media/1258/zax-newzfeatured-v11.jpg" >
                                                </a>
                                        </div>
                                        <a  title="News">
                                            <h3><?php echo $booking['namadepan']." ".$booking['namabelakang']?></h3>
                                            <h4><?php echo $booking['keterangan']?></h4>
                                        </a>
                                        <p class="post-discription">
                                        
                                            <span  class="text-right"><?php echo 'Tanggal: '.date('d-F-Y',strtotime($booking['waktubooking'])); ?><?php echo '<br>Jam: '.date('H:i:s',strtotime($booking['waktubooking'])); ?></span>
                                            
                                        </p>
                                </div>
                                <?php }?> 
                             

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                </div>
                            </div>


            
        </section>
    </section>
    
</div>


                                </div>
                            </div>
                        </div>
                    </div>
                 
                    </div>
                    
            </div>
        </section>
        
</div>

                    </div>
                </div>
            </div>
        </section>
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

        </div>
        <script>
$(document).ready(function(){
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"php/add_home.php",
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
   url:"php/fetch_home.php",
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
