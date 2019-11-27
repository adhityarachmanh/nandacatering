<?php 

$ambil = $koneksi->query("SELECT * FROM terimapemesanan WHERE id='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM terimapemesanan WHERE id='$_GET[id]'");

echo "<script>alert('Pemesanan Dibatalkan');</script>";
echo "<script>location='dashboard.php?halaman=terimapemesanan';</script>";
?>