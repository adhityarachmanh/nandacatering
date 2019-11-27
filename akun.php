
<?php include'inc/cart.inc.php'?>
<?php 

$koneksi= new mysqli("localhost","root","","admin");
if($_SESSION['uid']){echo"";}else{echo "<script>location='index.php';</script>";}?>
<!DOCTYPE html>
<html  lang="en">
<head>
<title> Nanda Catering&#39;s - Kelezatan dan Citarasa yang Berbeda</title>
    <?php include'head.php';?>
</head>

<?php include'header.php';?>
<!-- ==== Scripts ====-->

   <div id="bodyholder">
            


            <div class="main-wrp account-views">
                <div class="ctn-wrp">
                    <div class="my-account">
                        <div class="col col-2 account-nav">
                            <a href="akun.php?akun=order" class="<?php if($_GET['akun']=="order"){echo "selected";}else{echo"";} ?>">Order History</a>
                            <a href="akun.php?akun=booking" class="<?php if($_GET['akun']=="booking"){echo "selected";}else{echo"";} ?>">Booking History</a>
                            <a href="akun.php?akun=info" class="<?php if($_GET['akun']=="info"){echo "selected";}else{echo"";} ?>">Info Akun</a>

                            <!--<a href="~/account/gift-cards/" class="atsymbol AddSelectedClass("gift-cards")">Gift Cards</a>-->
                        </div>
                        <div class="col col-10 account-content">
                        <?php
        if (isset($_GET['akun'])) 
        {
            if ($_GET['akun']=="info") 
            {
                include 'updateprofil.php';
            }elseif ($_GET['akun']=="order") 
            {
                include 'historyorder.php';
            }elseif ($_GET['akun']=="booking") 
            {
                include 'historybooking.php';
            }
           
           }else
        {
            
        }       
        ?>
             </div>    
                    </div>
                </div>
            </div>
    
            </div>
            
      
     

        
    </div>

   <?php include'footer.php';?>
</body>


</html>
