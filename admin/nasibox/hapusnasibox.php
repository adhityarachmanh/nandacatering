<?php 

$ambil = $koneksi->query("SELECT * FROM barang WHERE id='$_GET[id]'");
$nasibox = $ambil->fetch_assoc();



$koneksi->query("DELETE FROM barang WHERE id='$_GET[id]'");

echo "<script>alert('nasibox terhapus');</script>";
echo "<script>location='dashboard.php?halaman=nasibox';</script>";
?>