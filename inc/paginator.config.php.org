<?php
$user="root";
$pass="";
try {
	$dbh = new PDO('mysql:host=localhost;dbname=admin',$user,$pass);
} catch (PDOException $e) {
	print "ERROR!:" .$e->getMessage()."</br>";
	die();
}
 $limit = (isset($_GET['limit'])) ? $_GET['limit'] :1;
  $page = (isset($_GET['page'])) ? $_GET['page'] :10;	
   $links = (isset($_GET['links'])) ? $_GET['links'] :200;
$query ="SELECT * FROM kumpulanresep";


require_once 'paginator.class.php';
$paginator = new Paginator($dbh,$query);
$results=$paginator->getData($limit,$page);
?>