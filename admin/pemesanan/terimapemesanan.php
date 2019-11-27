<h3>Data Penerimaan Booking</h3>
<div class="table-responsive" >
<table border="1" class="table table-bordered" > 
	<thead>
		<tr>
			<th>Tool</th>
			<th>No</th>
			<th>Nama Depan</th>
			
			<th>Nama Belakang</th>
			<th>Email</th>
			<th>Alamat</th>
			<th>Pilihan Paket</th>
			<th>Kodepaket</th>
			<th>Jumlah Paket</th>
			<th>Keterangan</th>
			<th>Waktu Pemesanan</th>
			<th>Waktu Booking</th>


			
		</tr>
	</thead>
	<tbody>

		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM terimapemesanan"); ?>
		<?php while ($penerimaan=$ambil->fetch_assoc()) {
		?>
		<tr>
			
			<td>
				<a style="border-radius: 5px;" href="dashboard.php?halaman=batalpenerimaan&id=<?php echo $penerimaan['id'];?>" class="btn btn-danger" onclick="return confirm('Yakin <?php echo $penerimaan['judul'];?> ingin di hapus?');" ><span class="glyphicon glyphicon-trash"></span></a>
				<a style="border-radius: 5px;" href="dashboard.php?halaman=pelaksanaan&id=<?php echo $penerimaan['id'];?>" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
			</td>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $penerimaan['namadepan']; ?></td>
			<td><?php echo $penerimaan['namabelakang']; ?></td>
			<td><?php echo $penerimaan['email']; ?></td>
			<td><?php echo $penerimaan['alamat']; ?></td>
			<td><?php echo $penerimaan['pilihanpaket']; ?></td>
			<td><?php echo $penerimaan['kodepaket']; ?></td>
			<td><?php echo $penerimaan['jumlahpaket']; ?></td>
			<td><?php echo $penerimaan['keterangan']; ?></td>
			<td><?php  $tglbooking=date_create( $penerimaan['waktupemesanan']); echo date_format($tglbooking,"d-m-Y H-i-s"); ?></td>
			<td><?php  $tglacara=date_create( $penerimaan['waktubooking']); echo 'Tanggal: '.date_format($tglacara,"d-m-Y"); ?><br>
			<?php  $tglacara=date_create( $penerimaan['waktubooking']); echo 'Jam:<br> '.date_format($tglacara,"H:i:s"); ?></td>
			
			</tr>
				
	<?php $nomor++; ?>
		<?php } ?>			
	</tbody>
</table>
</div>