<?php 
include'conn.php';




$db->query("DELETE FROM orders WHERE id='$_GET[id]'");


echo "<script>location='../akun.php?akun=order&order=dibatalkan';</script>";
?>