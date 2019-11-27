<input class="form-control" id="myInput" type="text" placeholder="Cari Booking..">
	 

<h3>Data Pemesanan</h3>

<table class="table table-bordered">
	<thead>
		<tr>
			<th style="width: 10%;">Tool</th>
			<th>No</th>
			<th>Nama Depan</th>
			<th>Nama Belakang</th>
			<th>Email</th>
			<th>Alamat</th>
			<th>Keterangan</th>
			<th>Waktu Pemesanan</th>
			

			
		</tr>
	</thead>
	<tbody id="myTable">
<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM pemesanan"); ?>
		<?php while ($booking=$ambil->fetch_assoc()) {
		?>
		
		<tr>
			<td>
				<a style="border-radius: 5px;" href="dashboard.php?halaman=hapuspemesanan&id=<?php echo $booking['id'];?>" class="btn btn-danger" onclick="return confirm('Yakin <?php echo $booking['judul'];?> ingin di hapus?');" ><span class="glyphicon glyphicon-trash"></span></a>
				<a style="border-radius: 5px;" href="dashboard.php?halaman=terima&id=<?php echo $booking['id'];?>" class="btn btn-primary"><span class="glyphicon glyphicon-check"></span></a>
			</td>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $booking['namadepan']; ?></td>
			<td><?php echo $booking['namabelakang']; ?></td>
			<td><?php echo $booking['email']; ?></td>
			<td><?php echo $booking['alamat']; ?></td>
			<td><?php echo $booking['keterangan']; ?></td>
			<td><?php  $tglbooking=date_create($booking['waktupemesanan']); echo date_format($tglbooking,"d-m-Y"); ?></td>
			
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>


