<?php

if(isset($_POST['logout'])){
	

	session_start();
	session_unset();
	session_destroy();
	$halaman=$_POST['halaman'];
	$a=explode("?",$halaman);
		$s=explode("&",$a['1']);
					if($a['1']=1)
					{
						
						header('Location: ../'.$a['0']."?".$s['0']."&".$s['1'].'&status=logout');
					}elseif(empty($a['1']))
					{
						header('Location: ../'.$a['0'].$s['0']."&".$s['1'].'?status=logout');
						
					}	
					
	exit();
	
}else{
	session_start();
	session_unset();
	session_destroy();
	$halaman=$_GET['halaman'];
	$a=explode("?",$halaman);
		$s=explode("&",$a['1']);
					if($a['1']=1)
					{
						
						header('Location: ../'.$a['0']."?".$s['0']."&".$s['1'].'&status=logout');
					}elseif(empty($a['1']))
					{
						header('Location: ../'.$a['0'].$s['0']."&".$s['1'].'?status=logout');
						
					}	
					
	exit();
}	
?>