<?php 
include'conn.php';

$db->query("DELETE FROM pemesanan WHERE id='$_GET[id]'");
echo "<script>location='../akun.php?akun=booking&booking=dibatalkan';</script>";
?>