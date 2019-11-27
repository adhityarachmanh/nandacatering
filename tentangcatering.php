<?php include'inc/cart.inc.php'?>
<!DOCTYPE html>

 <title>Tentang Nanda Catering - Nanda Catering</title>
 <?php include'head.php';?>
</head>
<?php include'header.php'; ?>
<!-- ==== Scripts ====-->
    <script type="text/javascript" src="Static/Script/JqueryHome.min70e1.js?v=20180624"></script>

</heade>


        <div id="bodyholder">
            
<link href="Static/LocalStore/css/bootstrap-datepicker.min.css" rel="stylesheet" media="all">

<link href="Static/css/location.min.css" rel="stylesheet" media="all">
<link href="Static/css/locationdetail.min.css" rel="stylesheet" media="all">

<div id="datathind">
    <div class="container-fluid redborder" id="maindiv" >

        <!-- ==== Global Title section ==== -->
        <div class="title-section">
            <a name="search_box_top"></a>
            <div class="h1
                
                ">Sejarah Nanda Catering </div>


            
        </div>
    </div>
        <div class="new-locations">
            <div class="ctn-wrp us-map">             
                <div id="main-container">
    <div id="page-content" style="padding-bottom:40px;background-image:url(img/pattern-batik.png);">
      <div id="page-header" style="background-image:url();">
      </div><!-- page-header -->
            <div class="full-section-container">
                
                <div class="container">
                    <div class="row" style="margin-bottom:60px">
                        <div class="col-sm-12">
                            <div class="headline text-center">
                                <h2>SEJARAH <span>NANDA CATERING</span></h2>
                            </div><!-- headline -->
                           
     
                            <div class="col-xs-12 col-sm-4" style="float:right">
                              
                                   <?php 
                                   include'inc/conn.php';
                                   $ambil = $db->query("SELECT * FROM kontak"); ?>
          <?php while ($kontak = $ambil->fetch_assoc()) { ?>
                                <img style="height: 370px; border-radius: 10px;" class="owner-img" src="<?php echo "imgevent/".$kontak['gambar'];?>" >
                            <?php }?>
                            </div>
                          
                            <div class="col-xs-12 col-sm-3 about-quote">
                                USAHA YANG SANGAT SEDERHANA INI SAYA MULAI DI GARASI RUMAH KAMI SEBAGAI DAPUR PADA TAHUN 2014.                                <hr class="about-divider">
                            </div>
                            <div class="col-xs-12 col-sm-5">
                                
                              
                                
                                <div class="" style="height:380px;overflow:auto;">
                                                                        
                                    Sebagai seorang ibu rumah tangga yang harus mengurus anak yang masih kecil waktu itu, tidak memungkinkan saya untuk bekerja di luar rumah. Berkat saran suami untuk usaha di rumah akhirnya saya kemudian berjualan nasi uduk dan masakan daerah seperti rendang, salah satu makanan kesukaan saya waktu itu.
<br>
<br>Dengan bermodalkan sebuah brosur sederhana tulisan tangan dan sebuah warung kecil milik kami waktu itu, saya menyebarkan selebaran tersebut ke rumah-rumah tetangga. Usaha yang sangat sederhana ini saya mulai di garasi rumah kami pada tahun 2014, pendapatan dari Rp. 200.000,-/ hari kian hari kian bertambah, pelanggan yang datang kebanyakan adalah ibu-ibu sekitar rumah dan anak-anak remaja yang baru pulang dari sekolah kemudian bertambah pelanggan dari kantor-kantor. Karena kecintaan saya akan kuliner Jawa terutama Wonogiri asal kota kelahiran saya, saya kemudian menambahkan menu masakan rumah khas Wonogiri.
<br>Kini, tanpa terasa telah 4 tahun berlalu, proses panjang yang tidak mudah telah saya lewati, berkat dukungan suami, usaha Kuliner kami berkembang pesat. Pada tahun 2016 usaha rumahan, kini telah menjadi catering terkenal dengan merk terdaftar " Nanda Catering".
<br>
<br>Dengan visi melestarikan budaya Indonesia terutama makanan tradisional Jawa khas Wonogiri, kami berkomitmen akan terus mengembangkan kualitas produk kami melalui pelayanan yang prima oleh segenap sumber daya manusia kami yang berkarakter bangsa Indonesia.
<br>
<br>Terima kasih, kepada segenap pelanggan setia kami dan ucapan terima kasih yang tiada hentinya juga kami panjatkan kepada Tuhan atas berkat-Nya".
<br>
<br>Salam,
<br>
<br>Swan Kumarga
<br>Founder                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                    <div class="row" style="margin-bottom:60px">
                        <div class="col-sm-12">
                            <div class="headline text-center">
                                <h2>TENTANG <span>NANDA CATERING</span></h2>
                            </div><!-- headline -->
                            
                            <div class="col-xs-12 col-sm-6">
                                <div class="video-container"> <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3488.8362386968415!2d106.83283031439949!3d-6.203282662493723!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f41164482abd%3A0xc00d90db4e1b0b1c!2sJl.+Pandeglang+No.26%2C+Menteng%2C+Kota+Jakarta+Pusat%2C+Daerah+Khusus+Ibukota+Jakarta+10310!5e1!3m2!1sid!2sid!4v1526188681536" frameborder="0" style="border:0" allowfullscreen width="100%;" height="600"></iframe></div>
                            </div>
                            
                            <div class="col-xs-12 col-sm-6 ds-year-container" style="text-transform: capitalize;">
                                <p class="ds-year">4<br><span>tahun</span></p>
                                <hr class="about-divider">
                                
                                <p>telah dijalani Nanda Catering dalam melestarikan masakan tradisional Jawa khas Wonogiri.</p>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- container -->
            </div>
      
    </div><!-- PAGE CONTENT -->
               
            </div>
           
        </div>

    <div id="databody">

    </div>
    <div>

    </div>
</div>

        </div>

    </div>
  <?php include'footer.php'; ?>  
    

</body>


</html>
