<?php 

require_once('login.php');
if($_GET['action']=="hapus")
{
	mysqli_query($GLOBALS["___mysqli_ston"],"DELETE FROM pesan WHERE id='$_GET[id]'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
  
    header('Location: ../hubungikami.php?halaman=inbox&pesan=hapuspesan');
    exit();
}
elseif($_GET['action']=="hapusall")
{

    mysqli_query($GLOBALS["___mysqli_ston"],"DELETE FROM pesan WHERE dari like '%".$_GET['nama']."%'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
    header('Location: ../hubungikami.php?halaman=inbox&pesan=semuahapus');
    exit();
}

?>