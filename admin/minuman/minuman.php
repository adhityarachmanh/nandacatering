<input class="form-control" id="myInput" type="text" placeholder="Search..">
<section class="content-header">
      <h1>
        Data Table
      </h1>
      <ol class="breadcrumb">
        <li><a href="./dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
         <li><a href="./dashboard.php?halaman=minuman">Minuman</a></li>
           
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Minuman</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <a href="dashboard.php?halaman=tambahminuman" class="btn btn-primary">Tambah Minuman</a>
<table class="table table-bordered">
  <thead>
    <tr>
      <th style="width: 10%;">Tool</th>
      <th>No</th>
      <th>Gambar</th>
      <th>Judul</th>
      <th>Harga</th>
      <th>Keterangan</th>
      
    </tr>
  </thead>
  <tbody id="myTable">

    <?php $nomor=1; ?>
    <?php $ambil=$koneksi->query("SELECT * FROM barang where jenispaket like '%minuman%'"); ?>
    <?php while ($minuman=$ambil->fetch_assoc()) {
    ?>
    <tr>
      <td>
        <a style="border-radius: 5px;" href="dashboard.php?halaman=hapusminuman&id=<?php echo $minuman['id'];?>" class="btn btn-danger" onclick="return confirm('Yakin <?php echo $minuman['judul'];?> ingin di hapus?');" ><span class="glyphicon glyphicon-trash"></span></a>
        <a style="border-radius: 5px;" href="dashboard.php?halaman=ubahminuman&id=<?php echo $minuman['id'];?>" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
      </td>
      <td><?php echo $nomor; ?></td>
      <td>
        <img src="../imgevent/<?php echo $minuman['gambar']; ?>" width="100" height="100">
      </td>
      </td>
      <td><?php echo $minuman['judul']; ?></td>
      <td><?php echo $minuman['harga']; ?></td>
      <td><?php echo $minuman['keterangan']; ?></td>
      
    </tr>
    <?php $nomor++; ?>
    <?php } ?>
  </tbody>
</table>
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