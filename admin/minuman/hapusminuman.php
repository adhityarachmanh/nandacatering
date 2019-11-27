<?php 

$ambil = $koneksi->query("SELECT * FROM barang WHERE id='$_GET[id]'");
$minuman = $ambil->fetch_assoc();


$koneksi->query("DELETE FROM barang WHERE id='$_GET[id]'");

echo "<script>alert('minuman terhapus');</script>";
echo "<script>location='dashboard.php?halaman=minuman';</script>";
?>