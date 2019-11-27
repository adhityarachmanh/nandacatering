
<div style="overflow: auto;display:<?php $notif="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  if(count($_SESSION['belanja'])>0){
   if (strpos($notif,"cart=ditambahkan")== true) {
        echo "none;";
    }elseif(strpos($notif,"cart=")== true) {
      echo "block;";
  }else{echo"none";}}?>" class="modal" id="lihatdetail" >
    <div class="modal-dialog" role="document"  style="width: 100%;" >
        <div class="modal-content" >
            <!--Belum Login-->
           <div class="modal-header <?php if(count($_SESSION['belanja'])>0){ echo "";}else{echo"hidden";}?>" >
               <h3 class="headline text-center">Lihat Detail <?php if ($_SESSION['uid']) {echo $_SESSION['u_first']." ".$_SESSION['u_last'];} ?></h3>
                <button type="button" class="close" onclick="document.getElementById('lihatdetail').style.display='none'">
                    <span aria-hidden="true">&times;</span>
                </button>
           </div>
            <div class="modal-body <?php if(count($_SESSION['belanja'])>0){ echo "";}else{echo"hidden";}?>">
             
                
<div class="table-responsive" >
        <table class="table table-bordered" >
          <tr>
            <th width="5%">Tools</th>
            <th width="15%">gambar</th>
            <th width="10%">Nama Barang</th>
            <th width="10%">Jumlah Barang</th>
            <th width="20%">Harga</th>
            <th >Total</th>
           
          </tr>
          <?php
          if(!empty($_SESSION["belanja"]))
          {
            $total = 0;
            foreach($_SESSION["belanja"] as $keys => $values)
            {
          ?>
          <tr>
           <form method="post" action="?action=add&id=<?php echo $values['id']; ?>">
               <td ><a  class="btn btn-danger"  onclick="return confirm('<?php if(isset($_SESSION['uid'])){echo $_SESSION['u_first']." ".$_SESSION['u_last']." Yakin ". $values['item_name']. " Anda ingin di Hapus?";}else{echo"";}?>');" href="?action=delete&id=<?php echo $values["id"]; ?>"><span>Hapus</span></a></td>
             <td><img height="100" width="200" src="<?php echo "imgevent/".$values["foto"]; ?>"></td>
            <td><?php echo $values["item_name"]; ?></td>
            
              <td><?php echo $values["item_quantity"]; ?></td>
              <input type="hidden" name="gambar" value="<?php echo $values["foto"] ; ?>" />
            <input type="hidden" name="hidden_name" value="<?php echo $values["item_name"] ; ?>" />

            <input type="hidden" name="hidden_price" value="<?php echo $values["item_price"] ; ?>" />

             
            <td>Rp <?php echo $values["item_price"]; ?>,00</td>
            <td>Rp <?php echo number_format($values["item_quantity"] * $values["item_price"],3);?>,00</td>
           </form>
          </tr>
          <?php
              $total = $total + ($values["item_quantity"] * $values["item_price"]);
            }
          ?>
          <tr>
          <td><a  class="btn btn-danger" onclick="return confirm('<?php if(isset($_SESSION['uid'])){echo $_SESSION['u_first']." ".$_SESSION['u_last']." yakin Semua Barang Belanjaan Anda ingin di hapus?";}else{echo"";}?>?');" href="?action=deleteall&id=<?php echo $values["id"]; ?>">Hapus Semua</a></td>
          <td><a  class="btn btn-success" onclick="document.getElementById('lihatdetail').style.display='none',document.getElementById('checkout').style.display='block'">Checkout</a><br><br></td>
            <td colspan="3" align="right">Total</td>
            <td align="center">Rp <?php echo number_format($total, 3); ?>,00</td>

          </tr>

          <?php
          }
          ?>
            
        </table>
      </div>
        
          
       
           </div>
            <div class="modal-footer <?php if(count($_SESSION['belanja'])>0){ echo "";}else{echo"hidden";}?>" >
               
           </div>
           <!--Keranjang Kosong-->

           
         
           
        </div>
    </div>
</div>
</div>
