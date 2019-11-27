<?php 
if($_GET['halaman']=="hapusorder"){




$koneksi->query("DELETE FROM orders WHERE id='$_GET[id]'");

echo "<script>alert('order terhapus');</script>";
echo "<script>location='dashboard.php?halaman=order';</script>";
}
?>