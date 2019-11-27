<?php 
session_start();
$connect = mysqli_connect("localhost", "root", "", "admin");

if(isset($_POST["add_to_cart"]))
{
  if(isset($_SESSION["belanja"]))
  {
    $item_array_id = array_column($_SESSION["belanja"], "id");
    if(!in_array($_GET["id"], $item_array_id))
    {
      $count = count($_SESSION["belanja"]);
      $item_array = array(
        'id'      =>  $_GET["id"],
        'foto'     =>  $_POST["gambar"],
        'item_name'     =>  $_POST["hidden_name"],
        'item_price'    =>  $_POST["hidden_price"],
        'item_quantity'   =>  $_POST["quantity"]
      );
      $_SESSION["belanja"][$count] = $item_array;
      $a=explode("?",$halaman);
      if($a['1']=1)
      {
        
        header('Location: '.$a['0']."?".$s['0']."&".$s['1'].'&cart=ditambahkan&id='.$_GET['id']);
      }elseif(empty($a['1']))
      {
        header('Location: '.$a['0'].'?cart=ditambahkan&id='.$_GET['id']);
        
      }	
    }
    else
    {
      $a=explode("?",$halaman);
      if($a['1']=1)
      {
        
        header('Location: '.$a['0']."?".$s['0']."&".$s['1'].'&cartada=ada');
      }elseif(empty($a['1']))
      {
        header('Location: '.$a['0'].'?cartada=ada');
        
      }	
    }
  }
  else
  {
    $item_array = array(
      'id'      =>  $_GET["id"],
      'foto'     =>  $_POST["gambar"],
      'item_name'     =>  $_POST["hidden_name"],
      'item_price'    =>  $_POST["hidden_price"],
      'item_quantity'   =>  $_POST["quantity"]
    );
    $_SESSION["belanja"][0] = $item_array;
  }
}

if(isset($_GET["action"]))
{
  if($_GET["action"] == "delete")
  {
    foreach($_SESSION["belanja"] as $keys => $values)
    {
      if($values["id"] == $_GET["id"])
      {
        unset($_SESSION["belanja"][$keys]);
        $a=explode("?",$halaman);
        if($a['1']=1)
        {
          
          header('Location: '.$a['0']."?".$s['0']."&".$s['1'].'&cart=hapus');
        }elseif(empty($a['1']))
        {
          header('Location: '.$a['0'].'?cart=hapus');
          
        }	
        
      }
    }
  }
}
if(isset($_GET["action"]))
{
  if($_GET["action"] == "deleteall")
  {
    foreach($_SESSION["belanja"] as $keys => $values)
    {
      if($values["id"] == $_GET["id"])
      {
        unset($_SESSION["belanja"]);
        $a=explode("?",$halaman);
        if($a['1']=1)
        {
          
          header('Location: '.$a['0']."?".$s['0']."&".$s['1'].'&cart=all');
        }elseif(empty($a['1']))
        {
          header('Location: '.$a['0'].'?cart=all');
          
        }	

      }
    }
  }
}
if(isset($_GET["action"]))
{
  if($_GET["action"] == "checkout")
  {
    foreach($_SESSION["belanja"] as $keys => $values)
    {
      if($values["id"] == $_GET["id"])
      {
        unset($_SESSION["belanja"]);
        $a=explode("?",$halaman);
        if($a['1']=1)
        {
          
          header('Location: '.$a['0']."?".$s['0']."&".$s['1'].'&cart=checkout');
        }elseif(empty($a['1']))
        {
          header('Location: '.$a['0'].'?cart=checkout');
          
        }	

      }
    }
  }
}
?>