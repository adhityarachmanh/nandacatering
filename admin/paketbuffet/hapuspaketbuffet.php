<?php 

$ambil = $koneksi->query("SELECT * FROM barang WHERE id='$_GET[id]'");
$paketbuffet = $ambil->fetch_assoc();


$koneksi->query("DELETE FROM barang WHERE id='$_GET[id]'");

echo "<script>alert('paketbuffet terhapus');</script>";
echo "<script>location='dashboard.php?halaman=paketbuffet';</script>";
?>