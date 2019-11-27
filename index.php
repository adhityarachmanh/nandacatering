<?php include'inc/cart.inc.php'?>
<!DOCTYPE html>
<html  lang="en">
<head>
<title> Nanda Catering&#39;s - Kelezatan dan Citarasa yang Berbeda</title>
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> 
    <?php include'head.php';?>
    
</head>

<?php include'header.php';?>
<!-- ==== Scripts ====-->

 <?php
        if (isset($_GET['halaman'])) 
        {
            if ($_GET['halaman']=="paket") 
            {
                include 'pilihpaket.php';
            }
           
           }else
        {
            include 'home.php';
        }       
        ?>



      
     

        
    </div>

   <?php include'footer.php';?>
</body>


</html>
