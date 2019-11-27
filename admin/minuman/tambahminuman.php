<input class="form-control" id="myInput" type="text" placeholder="Search..">
<section class="content-header">
      <h1>
        Data Tables
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="./dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
         <li><a href="./dashboard.php?halaman=minuman">Minuman</a></li>
           <li><a href="./dashboard.php?halaman=tambahminuman">Tambah Minuman</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3>Tambah Minuman</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

<form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>Foto</label>
    <input type="file" class="form-control" name="gambar">
  </div>

  <div class="form-group">
    <label>Judul</label>
    <input type="text" class="form-control" name="judul">
  </div>
  <div class="form-group">
    
    <input  type="hidden" class="form-control" name="jenispaket" value="minuman">
  </div>
  
  <div class="form-group">
    <label>Harga</label>
    <input type="text" class="form-control" name="harga">
  </div>
  
  
  
  <div class="form-group">
    <label>Keterangan</label>
    <textarea type="text" class="form-control" name="keterangan"></textarea>
  </div>

  
  <button class="btn btn-primary" name="save">Simpan</button>

</form>

<?php if (isset($_POST['save']))
{
	$judul=$_POST['judul'];
  $nama= $_FILES['gambar']['name'];
  $tempat= $_FILES['gambar']['tmp_name'];
  $fileext=explode('.', $nama);
  $fileactualext=strtolower(end($fileext));
  $filenamenew = "fotominuman".$judul.".".$fileactualext;
    $filedestination = '../imgevent/'.$filenamenew;
    move_uploaded_file($tempat, $filedestination);
	$koneksi->query("INSERT INTO barang (gambar,judul,harga,keterangan,jenispaket) VALUES ('$filenamenew','$_POST[judul]','$_POST[harga]','$_POST[keterangan]','$_POST[jenispaket]')");

	echo "<div class='alert alert-info'>Data Tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=dashboard.php?halaman=minuman'>";

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