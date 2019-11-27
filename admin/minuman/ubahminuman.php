<input class="form-control" id="myInput" type="text" placeholder="Search..">
<section class="content-header">
      <h1>
        Data Tables
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="./dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
         <li><a href="./dashboard.php?halaman=minuman">Minuman</a></li>
           <li><a href="#">Ubah Minuman</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3>Ubah Minuman</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

<?php 
$ambil = $koneksi->query("SELECT * FROM barang WHERE id='$_GET[id]'");
$minuman = $ambil->fetch_assoc();


 ?>
<form method="post" enctype="multipart/form-data">
  <div class="form-group">
  <img src="../imgevent/<?php echo $minuman['gambar'] ?>" width="200">
</div>
  <div class="form-group">
    <label>Foto</label>
    <input type="file" class="form-control" name="gambar" >
  </div>
   <div class="form-group">
    
    <input hidden="" type="text" class="form-control" name="jenispaket" value="minuman">
  </div>
  <div class="form-group">
    <label>Judul</label>
    <input type="text" class="form-control" name="judul" value="<?php echo $minuman['judul'] ?>">
  </div>
  <div class="form-group">
    <label>Harga</label>
    <input type="text" class="form-control" name="harga" value="<?php echo $minuman['harga'] ?>">
  </div>

  
  
  
  <div class="form-group">
    <label>Keterangan</label>
    <textarea type="text" class="form-control" name="keterangan"><?php echo $minuman['keterangan']; ?>
    </textarea>
  </div>

  
  <button class="btn btn-primary" name="ubah">Simpan</button>

</form>

<?php if (isset($_POST['ubah']))
{
  
  $judul=$_POST['judul'];
  $nama= $_FILES['gambar']['name'];
  $tempat= $_FILES['gambar']['tmp_name'];
  $fileext=explode('.', $nama);
  $fileactualext=strtolower(end($fileext));
  if (!empty($tempat))
  {
  $filenamenew = "fotominuman".$judul.".".$fileactualext;
    $filedestination = '../imgevent/'.$filenamenew;
    move_uploaded_file($tempat, $filedestination);
  $koneksi->query("UPDATE barang set judul='$_POST[judul]',
    harga = '$_POST[harga]', keterangan= '$_POST[keterangan]',jenispaket= '$_POST[jenispaket]',gambar='$filenamenew' WHERE id='$_GET[id]' ");
}
 else
{
  $koneksi->query("UPDATE barang set judul='$_POST[judul]',
    harga = '$_POST[harga]', keterangan= '$_POST[keterangan]',jenispaket= '$_POST[jenispaket]' WHERE id='$_GET[id]' ");
}
  echo "<script>alert('data minuman telah diubah'>;</script>";
  echo "<script>location='dashboard.php?halaman=minuman';</script>";

}
?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>