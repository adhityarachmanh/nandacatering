<?php 

$ambil = $koneksi->query("SELECT * FROM pemesanan WHERE id='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM pemesanan WHERE id='$_GET[id]'");

echo "<script>alert('Pemesanan Dihapus');</script>";
echo "<script>location='dashboard.php?halaman=pemesanan';</script>";
?>