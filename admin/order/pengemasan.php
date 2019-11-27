
<?php

	$status=3;
	$koneksi->query("UPDATE orders SET status='$status' WHERE id='$_GET[id]'");

	echo "<div class='alert alert-info'>Pesan Terkirim</div>";
	echo "<meta http-equiv='refresh' content='1;url=dashboard.php?halaman=order'>";
?>
