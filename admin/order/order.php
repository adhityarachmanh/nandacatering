<input class="form-control" id="myInput" type="text" placeholder="Cari Order..">

<?php
         if(isset($_POST['go']))
         {
             $inputbox =$_POST['inputbox'];
             $query="SELECT * FROM orders WHERE CONCAT(first,last,email,username,kodepesanan)LIKE '%".$inputbox."%'";
              $cari = filterTable($query);
         }else{
             $query="SELECT * FROM orders";
             $cari = filterTable($query);
         }

         function filterTable($query)
         {
          include'../inc/conn.php';
           $filter_Result = mysqli_query($db, $query);
           return $filter_Result;
         }
     ?>
<br>
<h3>Daftar Order</h3>
<br>

    <br>
    <br>
    <div class="table-responsive">
    <table border="2" class="table">
 <thead>
     <tr>
         <th>Tool</th>
         <th>No</th>
         <th >Status</th>
         <th>Nama Depan</th>
         <th>Nama Belakang</th>
         <th>Email</th>
         <th>Username</th>
         <th>Nomer Telpon</th>
         <th>Alamat</th>
         <th>Barang</th>
         <th>Total Order</th>
         <th>Nama Kartu</th>
         <th>Nomer Kartu</th>
         <th>Kode Pesanan</th>
         <th>Payment</th>
    
     </tr>
 </thead>
 
 
 <tbody id="myTable" >

     <?php $nomor=1; ?>
     <?php while ($order=mysqli_fetch_array($cari)): ?>
    
     <tr >
         <td >
             

             <a style="margin-bottom: 10px;" href="dashboard.php?halaman=pembayaransukses&id=<?php echo $order['id'];?>" class="btn btn-primary">Pembayaran Sukses</a>
             <a style="margin-bottom: 10px;" href="dashboard.php?halaman=pengemasan&id=<?php echo $order['id'];?>" class="btn btn-warning">Pengemasan</a>
             <a style="margin-bottom: 10px;" href="dashboard.php?halaman=pengiriman&id=<?php echo $order['id'];?>" class="btn btn-success">Pengiriman</a>
             <a style="margin-bottom: 10px;" href="dashboard.php?halaman=hapusorder&id=<?php echo $order['id'];?>" class="btn btn-danger">Hapus</a>
         </td>
         
         
         <td><?php echo $nomor; ?></td>
         <td >Status: <br><?php if($order['status']==1){echo '<p class="btn btn-warning" style="background:orange; ">Menunggu Pembayaran</p>';}
              elseif($order['status']==2){echo '<p class="btn btn-primary" style=" ">Pembayaran Sukses</p>';}
              elseif($order['status']==3){echo '<p class="btn btn-warning" >Barang Dalam Pengemasan</p>';}
              elseif($order['status']==4){echo '<p class="btn btn-success" style=" ">Barang Telah di Kirim</p>';}
              elseif($order['status']==5){echo '<p class="button-red button-fluid" style="background:#1d3a74; ">Barang Telah di Terima</p>';}?></td>
         <td><?php echo $order['first'] ?></td>
         <td><?php echo $order['last'] ?></td>
         <td><?php echo $order['email'] ?></td>
         <td><?php echo $order['username'] ?></td>
         <td><?php echo $order['notelp'] ?></td>
         <td><?php echo $order['alamat'] ?></td>
         <td><?php echo $order['barang'] ?></td>
         <td><?php echo $order['totalorder'] ?></td>
         <td><?php echo $order['namakartu'] ?></td>
         <td><?php echo $order['nomerkartu'] ?></td>
         <td><?php echo $order['kodepesanan'] ?></td>
         <td><img src="../<?php echo $order['pay'] ?>" width="70" height="40" ></td>
        
     </tr>
    
     
 </tbody>
 <?php $nomor++; ?>
     <?php endwhile;?>
</table>
        </div>
