
 <?php 
$user="root";
$pass="";
try {
  
  $dbh = new PDO('mysql:host=localhost;dbname=admin',$user,$pass);
} catch (PDOException $e) {
  print "ERROR!:" .$e->getMessage()."</br>";
  die();
}
 $limit = (isset($_GET['limit'])) ? $_GET['limit'] :10;
  $page = (isset($_GET['page'])) ? $_GET['page'] :1 ; 
   $links = (isset($_GET['links'])) ? $_GET['links'] :200;


$query ="SELECT * FROM barang WHERE id='$_GET[zoom]'";


require_once 'inc/paginator.class.php';
$paginator = new Paginator($dbh,$query);
$zoom=$paginator->getData($limit,$page);
?>
<div style="overflow: auto; display: <?php if ($_GET['zoom']) {echo "block";
} ?>"  class="modal" id="zoom" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
           <div class="modal-header">
             
            
               <a href=" <?php $a=$_SERVER['PHP_SELF']; $b=explode("/", $a); $c=explode("?", $b['2']); echo $c['0'];?>#gambar" class="close" onclick="document.getElementById('zoom').style.display='none'"></
                    <span aria-hidden="true">&times;</span>
                </a>
           </div>
           <div class="modal-body">
            <?php
        for($i=0;$i < count($zoom->data);$i++){
        $besar=$zoom->data[$i]; 
        ?>
        <div class="container">
              <img src="<?php echo "imgevent/".$besar['gambar'];?>">
            <?php }?>
           </div>
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
 $rating=$_POST['rating'];
  $db->query("UPDATE barang set rating='$rating' WHERE id='$id' ");
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
<div style="overflow: auto; display:<?php if($_GET['action']=="rating"){echo "block";}elseif(isset($_POST['updaterating'])){echo'none';}?>;"  class="modal" id="rating" >
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
          <input type="hidden" name="idrating" value="<?php echo $_POST['idrating']?>">
          <input id="input-21e" value="<?php echo $_POST["ratingdepan"]; ?>" type="text" class="rating" data-min=0 data-max=5 data-step=0.1 data-size="xs" name="rating">
          <br>    
          <button name="updaterating" class="btn btn-success">Update Rating</button>
</form>
  
           </div>
           <div class="modal-footer">
               
           </div>
        </div>
    </div>
</div>
