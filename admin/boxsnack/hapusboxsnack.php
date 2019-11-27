<?php 

$ambil = $koneksi->query("SELECT * FROM barang WHERE id='$_GET[id]'");
$boxsnack = $ambil->fetch_assoc();


$koneksi->query("DELETE FROM barang WHERE id='$_GET[id]'");

echo "<script>alert('boxsnack terhapus');</script>";
echo "<script>location='dashboard.php?halaman=boxsnack';</script>";
?>