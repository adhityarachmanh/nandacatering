<?php 

$ambil = $koneksi->query("SELECT * FROM pemesanan WHERE id='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$koneksi->query("UPDATE pemesanan SET status=1 WHERE id='$_GET[id]'");
$koneksi->query("INSERT INTO terimapemesanan(namadepan,namabelakang,email,alamat,pilihanpaket,kodepaket,jumlahpaket,keterangan,waktupemesanan) SELECT '$pecah[namadepan]','$pecah[namabelakang]','$pecah[email]','$pecah[alamat]','$pecah[pilihanpaket]','$pecah[kodepaket]','$pecah[jumlahpaket]','$pecah[keterangan]','$pecah[waktupemesanan]' FROM pemesanan  WHERE id='$_GET[id]'");

echo "<script>alert('pemesanan di terima');</script>";
echo "<script>location='dashboard.php?halaman=terimapemesanan';</script>";
?>