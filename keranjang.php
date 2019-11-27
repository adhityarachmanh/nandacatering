
<div style="overflow: auto;" class="modal" id="keranjang" >
    <div class="modal-dialog" role="document"   >
        <div class="modal-content" >
            <!--Belum Login-->
           <div class="modal-header <?php if(count($_SESSION['belanja'])>0){ echo "";}else{echo"hidden";}?>" >
               <h3 class="headline text-center">Keranjang <?php if ($_SESSION['uid']) {echo $_SESSION['u_first']." ".$_SESSION['u_last'];} ?></h3>
                <button type="button" class="close" onclick="document.getElementById('keranjang').style.display='none'">
                    <span aria-hidden="true">&times;</span>
                </button>
           </div>
            <div class="modal-body <?php if(count($_SESSION['belanja'])>0){ echo "";}else{echo"hidden";}?>">
             
                

         <div class="container <?php if(count($_SESSION['belanja'])>0){ echo "";}else{echo"hidden";}?>">   
      <table id="cart" class="table table-condensed" >
            <thead>
            <tr>
              <th class="hidden-xs" style="width:20%">Gambar</th>
              <th class="text-center visible-xs" style="width:20%">Barang</th>
              <th class="hidden-xs"  style="width:20%">Nama Barang</th>
              <th class="hidden-xs" style="width:8%">Jumlah</th>
              <th class="hidden-xs" style="width:22%" class="text-center">Subtotal</th>     
            </tr>
          </thead>
          <tbody>
            <?php
          if(!empty($_SESSION["belanja"]))
          {
            $total = 0;
            foreach($_SESSION["belanja"] as $keys => $values)
            {
          ?>
            <tr>
             <td class="hidden-xs" data-th="gambar"><img src="<?php echo "imgevent/".$values["foto"]; ?>" class="img-responsive" /></td>
              <td data-th="Product">
                     
                    <div class="col-sm-2 visible-xs"><img src="<?php echo "imgevent/".$values["foto"]; ?>" class="img-responsive" /></div>
                     <h3><?php echo $values["item_name"]; ?></h3>
              </td>
         
              <td class="hidden-xs"><?php echo $values["item_quantity"]; ?></td>
              </td>
              <td data-th="Subtotal" class="text-center hidden-xs">Rp. <?php echo number_format($values["item_quantity"] * $values["item_price"],3);?>,00</td>
             
            </tr>
             <tr class="visible-xs">
              <td class="text-center"><strong>Rp <?php echo number_format($values["item_quantity"] * $values["item_price"],3);?>,00</strong></td>
            </tr>
            <?php
              $total = $total + ($values["item_quantity"] * $values["item_price"]);
            }
          ?>
          </tbody>
          <tfoot>
            
            <tr class="visible-xs">
              <td class="text-center"><strong>Total Rp.<?php echo number_format($total, 3); ?>,00</strong></td>
                
            </tr>   
            <tr>
               <a onclick="document.getElementById('lihatdetail').style.display='block',document.getElementById('keranjang').style.display='none'" href="#" class="btn btn-success btn-block">Lihat Detail <i class="fa fa-angle-right"></i></a></td>
              <td colspan="2" class="hidden-xs"></td>
              <td class="hidden-xs">Total</td>
              <td class="hidden-xs text-center"><strong>Rp.<?php echo number_format($total, 3); ?>,00</strong></td>

            </tr>
            <?php
          }
          ?>
          </tfoot>
        </table>
      </div>
        
          
       
           </div>
            <div class="modal-footer <?php if(count($_SESSION['belanja'])>0){ echo "";}else{echo"hidden";}?>" >
               
           </div>
           <!--Keranjang Kosong-->

           <div class="modal-header <?php if(count($_SESSION['belanja'])>0){ echo "hidden";}else{echo"";}?>">
           
             <h3 class="headline text-center">Keranjang</h3>
             <button type="button" class="close" onclick="document.getElementById('keranjang').style.display='none'">
                    <span aria-hidden="true">&times;</span>
                </button>
          
           </div>
           <div class="modal-body <?php if(count($_SESSION['belanja'])>0){ echo "hidden";}else{echo"";}?>" >
            <div class="container">
           <img src="img/keranjangkosong.png" width="100%">
           </div>
           </div>
           <div class="modal-footer <?php if(count($_SESSION['belanja'])>0){ echo "hidden";}else{echo"";}?>">
             <section class="ff-wrp">
       
            
              <div class="title-block">
                    
                    <h1 class="ff_rotate" style="font-size: 2em">Keranjang Anda Kosong</h1>
                    
                </div>
       
        
        </section>
           </div>
        </div>
    </div>
</div>
</div>
