<?php
$user="root";
$pass="";
try {
  $dbh = new PDO('mysql:host=localhost;dbname=admin',$user,$pass);
} catch (PDOException $e) {
  print "ERROR!:" .$e->getMessage()."</br>";
  die();
}
?>