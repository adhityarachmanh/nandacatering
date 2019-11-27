
 
<div style="overflow: auto; display: <?php

$halamanrefresh = isset($_SERVER['HTTP_CACHE_CONTROL']) &&($_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0' ||  $_SERVER['HTTP_CACHE_CONTROL'] == 'no-cache'); 
$notif="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
   #jika refresh ga keluar sweetalert ke 2xnya sesuai batas refresh
if($halamanrefresh == 500){
echo "";
}else{
    if(!$halamanrefresh){
    if($_GET['action']=="rating"){echo "block";}elseif(isset($_POST['updaterating'])){echo'none';}
}}?>;"  class="modal" id="rating" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
           <div class="modal-header">
               <h3 class="headline text-center">Rating</h3>
            
               <button type="button" class="close" onclick="document.getElementById('rating').style.display='none'">
                    <span aria-hidden="true">&times;</span>
                </button>
           </div>
           <div class="modal-body">
            
<form method="post" action="?rating=berhasil">
    <h3 class="headline text-center"><?php echo $_POST['namarating']?></h3>
    <div class="container">
            <img src="imgevent/<?php echo $_POST['gambarrating']; ?>"/>
            
          <input type="hidden" name="idrating" value="<?php echo $_POST['idrating']?>">
          <input id="input-21e" value="<?php echo $_POST["ratingdepan"]; ?>" type="text" class="rating" data-min=0.001 data-max=5 data-step=0.001 data-size="xs" name="rating">
          <br>    
          <button name="updaterating" class="btn btn-success">Update Rating</button>
          </div>
</form>
  
           </div>
           <div class="modal-footer">
               
           </div>
        </div>
    </div>
</div>
<?php 



if (isset($_POST['updaterating']))
{
    require_once('inc/conn.php');
    $id=$_POST['idrating'];
 $rating=str_replace('.','',$_POST['rating']);
$ratings='0.0'.$rating+$_POST['ratingdepan'];
  $db->query("UPDATE barang set rating='$ratings' WHERE id='$id' ");
}
?>
<script>
        function validates(){

            var a = document.getElementById("ubahpassword").value;
            var b = document.getElementById("reubahpassword").value;
            if (a!=b) {
               alert("Password Tidak Sama");
               return false;
            }
        }
</script>
<script>
// munculin modal
var modal = document.getElementById('update');

// ketika user klik di luar modal akan tertutup modalnya
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>