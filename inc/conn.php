<?php

$host  = 'localhost';
$user  = 'root';
$pass = '';
$dbname    = 'admin';

$db = ($GLOBALS["___mysqli_ston"] = mysqli_connect($host,  $user,  $pass)) or die ('Koneksi Gagal');
mysqli_select_db($GLOBALS["___mysqli_ston"], $dbname);

?> 