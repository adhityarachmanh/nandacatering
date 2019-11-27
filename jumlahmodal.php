
<div style="overflow: auto;  display: <?php

$halamanrefresh = isset($_SERVER['HTTP_CACHE_CONTROL']) &&($_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0' ||  $_SERVER['HTTP_CACHE_CONTROL'] == 'no-cache'); 
$notif="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
   #jika refresh ga keluar sweetalert ke 2xnya sesuai batas refresh
if($halamanrefresh == 500){
echo "";
}else{
    if(!$halamanrefresh){
    if($_GET['action']=="jumlahmodal"){echo "block";}elseif(isset($_POST['jumlahmodal'])){echo'none';}
}}?>;"  class="modal" id="jumlahmodal" >
    <div class="modal-dialog" role="document" >
        <div class="modal-content" >
           <div class="modal-header">
               <h3 class="headline text-center">Jumlah Barang</h3>
            
               <button type="button" class="close" onclick="document.getElementById('jumlahmodal').style.display='none'">
                    <span aria-hidden="true">&times;</span>
                </button>
           </div>
           <div class="modal-body">
            
           <form class="<?php if ($_SESSION['uid']) {echo "";}else{echo "hidden";} ?>" method="post" action="?action=add&id=<?php echo $_POST["id"]; ?>&cart=ditambahkan">
                                      
                                      <div class="container">
                                      <h3 class="headline text-center"><?php echo $_POST["nama"]; ?></h3>
                                      <br>
            <img class="img-rounded" src="imgevent/<?php echo $_POST['foto']; ?>" height="100px;"/>
          
            <input type="number" name="quantity" value="1" class="form-control-sm" min="1" style="width:200px;"/><br>
            <input class="order-customization-link button button-red"  type="submit" name="add_to_cart" style=" color:white; width:50%;"  value="Add to Cart" >
            <input type="hidden" name="gambar" value="<?php echo $_POST["foto"]; ?>" />
            <input type="hidden" name="hidden_name" value="<?php echo $_POST["nama"]; ?>" />

            <input type="hidden" name="hidden_price" value="<?php echo $_POST["harga"]; ?>" />
            </div>
          </form>
  
           </div>
           <div class="modal-footer">
               
           </div>
        </div>
    </div>
</div>

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