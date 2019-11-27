<?php 

$ambil = $koneksi->query("SELECT * FROM barang WHERE id='$_GET[id]'");
$nasitumpeng = $ambil->fetch_assoc();


$koneksi->query("DELETE FROM barang WHERE id='$_GET[id]'");

echo "<script>alert('nasitumpeng terhapus');</script>";
echo "<script>location='dashboard.php?halaman=nasitumpeng';</script>";
?>