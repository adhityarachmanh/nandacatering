<h3>Ubah Booking</h3>
<?php 
$ambil = $koneksi->query("SELECT * FROM terimapemesanan WHERE id='$_GET[id]'");
$pecah = $ambil->fetch_assoc();


 ?>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<in
	<img src="../imgevent/<?php echo $pecah['gambar'] ?>" width="200">
	<input type="file" class="form-control" name="gambar" >
</div>
	<div class="form-group">
		<label>Nama Depan</label>
		<input type="text" class="form-control" name="namadepan" value="<?php echo $pecah['namadepan'] ?>">
	</div>
	<div class="form-group">
		<label>Nama Belakang</label>
		<input type="text" class="form-control" name="namabelakang" value="<?php echo $pecah['namabelakang'] ?>">
	</div>
	<div class="form-group">
		<label>email</label>
		<input type="text" class="form-control" name="email" value="<?php echo $pecah['email'] ?>">
	</div>
	<div class="form-group">
		<label>alamat </label>
		<input type="text" class="form-control" name="alamat" value="<?php echo $pecah['alamat'] ?>">
	</div>
	<div class="form-group">
		<label>Pilihan Paket</label>
		<input type="text" class="form-control" name="pilihanpaket" value="<?php echo $pecah['pilihanpaket'] ?>" >
	</div>
	<div class="form-group">
		<label>Kode Paket</label>
		<input type="text" class="form-control" name="kodepaket" value="<?php echo $pecah['kodepaket'] ?>" >
	</div>
	<div class="form-group">
		<label>Jumlah Paket</label>
		<input type="text" class="form-control" name="jumlahpaket" value="<?php echo $pecah['jumlahpaket'] ?>">
	</div>
	<div class="form-group">
		<label>Keterangan</label>
		<input type="text" class="form-control" name="keterangan" value="<?php echo $pecah['keterangan'] ?>">
	</div>
	<div class="form-group">
		<label>Waktu Pemesanan</label>
		<input type="text" class="form-control" name="waktupemesanan" value="<?php echo $pecah['waktupemesanan'] ?>">
	</div>
	<div class="form-group">
		<label>Waktu Acara</label>
		<input type="datetime-local"  class="form-control" name="waktubooking"  value="<?php echo $pecah['waktubooking'] ?>">
	</div>
	


	
	
	

	
	<button class="btn btn-primary" name="ubah">Simpan</button>

</form>

<?php if (isset($_POST['ubah']))
{
	$nama= $_FILES['gambar']['name'];
	$lokasi= $_FILES['gambar']['tmp_name'];
	if (!empty($lokasi))
	{
	move_uploaded_file($lokasi, "../imgevent/$nama");
	$koneksi->query("UPDATE terimapemesanan set namadepan='$_POST[namadepan]',namabelakang='$_POST[namabelakang]',email='$_POST[email]',alamat='$_POST[alamat]',pilihanpaket='$_POST[pilihanpaket]',kodepaket='$_POST[kodepaket]',jumlahpaket='$_POST[jumlahpaket]',keterangan='$_POST[keterangan]',waktupemesanan='$_POST[waktupemesanan]',waktubooking='$_POST[waktubooking]',gambar='$nama' WHERE id='$_GET[id]' ");
	
}
 else
{
	$koneksi->query("UPDATE terimapemesanan set namadepan='$_POST[namadepan]',namabelakang='$_POST[namabelakang]',email='$_POST[email]',alamat='$_POST[alamat]',pilihanpaket='$_POST[pilihanpaket]',kodepaket='$_POST[kodepaket]',jumlahpaket='$_POST[jumlahpaket]',keterangan='$_POST[keterangan]',waktupemesanan='$_POST[waktupemesanan]',waktubooking='$_POST[waktubooking]' WHERE id='$_GET[id]' ");


	




}
	echo "<script>alert('data nasitumpeng telah diubah'>;</script>";
	echo "<script>location='dashboard.php?halaman=terimapemesanan';</script>";

}
?>