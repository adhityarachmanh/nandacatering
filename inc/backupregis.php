 <?php 

if (isset($_POST['daftarakun'])) {
    include_once'conn.php';
    
  $first = mysqli_real_escape_string($db, $_POST['first']);
  $last = mysqli_real_escape_string($db, $_POST['last']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $uid = mysqli_real_escape_string($db, $_POST['uid']);
  $pwd = mysqli_real_escape_string($db, $_POST['pwd']);
  $rpwd = mysqli_real_escape_string($db, $_POST['rpwd']);
  $notelp = mysqli_real_escape_string($db, $_POST['notelp']);
   $kodepin = mysqli_real_escape_string($db, $_POST['kodepin']);
  $emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
  $number = "/^[0-9]+$/";
  $halaman = mysqli_real_escape_string($db, $_POST['halaman']);
  if(empty($first) || empty($last)||empty($email)||empty($uid)||empty($pwd)||empty($rpwd)||empty($notelp)){
    $a=explode("?",$halaman);
    if($a['1']=1)
    {
      
      header('Location: ../'.$a['0']."?".$s['0']."&".$s['1'].'&register=kosong');
    }elseif(empty($a['1']))
    {
      header('Location: ../'.$a['0'].'?register=kosong');
      
    }	
    
exit();

  } else{
    if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)){
      $a=explode("?",$halaman);
      if($a['1']=1)
      {
        
        header('Location: ../'.$a['0']."?".$s['0']."&".$s['1'].'&register=syaratnama');
      }elseif(empty($a['1']))
      {
        header('Location: ../'.$a['0'].'?register=syaratnama');
        
      }	
      
exit();
      }else{
        if(strlen($pwd) < 9 ){
       
          if($a['1']=1)
          {
            
            header('Location: ../'.$a['0']."?".$s['0']."&".$s['1'].'&register=syaratpwd');
          }elseif(empty($a['1']))
          {
            header('Location: ../'.$a['0'].'?register=syaratpwd');
            
          }	
          
    exit();
       }else{
        if($pwd != $rpwd){
      
            $a=explode("?",$halaman);
            if($a['1']=1)
            {
              
              header('Location: ../'.$a['0']."?".$s['0']."&".$s['1'].'&register=syaratrpwd');
            }elseif(empty($a['1']))
            {
              header('Location: ../'.$a['0'].'?register=syaratrpwd');
              
            }	
            
      
    exit();

  }else{
     if(!preg_match($emailValidation,$email)){
     
        $a=explode("?",$halaman);
        if($a['1']=1)
        {
          
          header('Location: ../'.$a['0']."?".$s['0']."&".$s['1'].'&register=syaratemail');
        }elseif(empty($a['1']))
        {
          header('Location: ../'.$a['0'].'?register=syaratemail');
          
        }	
        
  exit();
  }else{
  if(!preg_match($number,$notelp)){
    $a=explode("?",$halaman);
        if($a['1']=1)
        {
          
          header('Location: ../'.$a['0']."?".$s['0']."&".$s['1'].'&register=syarattlp');
        }elseif(empty($a['1']))
        {
          header('Location: ../'.$a['0'].'?register=syarattlp');
          
        }	
        
  exit();

    }else{
      $sql = "SELECT id FROM users WHERE user_email = '$email' LIMIT 1" ;
      $check_query = mysqli_query($db,$sql);
      $count_email = mysqli_num_rows($check_query);
      if($count_email > 0){
        $a=explode("?",$halaman);
        if($a['1']=1)
        {
          
          header('Location: ../'.$a['0']."?".$s['0']."&".$s['1'].'&register=syaratemailada');
        }elseif(empty($a['1']))
        {
          header('Location: ../'.$a['0'].'?register=syaratemailada');
          
        }	
        
  
    exit();

          }else{
            $sql ="SELECT * FROM users WHERE user_uid='$uid'";
            $result = mysqli_query($db,$sql);
            $resultcheck = mysqli_num_rows($result);

            if ($resultcheck >0) {
              $a=explode("?",$halaman);
              if($a['1']=1)
              {
                
                header('Location: ../'.$a['0']."?".$s['0']."&".$s['1'].'&register=syaratusernameada');
              }elseif(empty($a['1']))
              {
                header('Location: ../'.$a['0'].'?register=syaratusernameada');
                
              }	

              exit();
            }else{

                $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
         
            $sql = "INSERT INTO users (user_first,user_last,user_email,user_uid,user_pwd,user_rpwd,notelp,kodepin) VALUES ('$first','$last','$email','$uid','$hashedpwd','$rpwd','$notelp','$kodepin');";
              mysqli_query($db,$sql);
              $a=explode("?",$halaman);
              if($a['1']=1)
              {
                
                header('Location: ../'.$a['0']."?".$s['0']."&".$s['1'].'&register=berhasil');
              }elseif(empty($a['1']))
              {
                header('Location: ../'.$a['0'].'?register=berhasil');
                
              }	
              
        
            
              exit();
            }
              }
           }
         }   
      }
    }
  } 
}
}else{
  header("Location:".$_SERVER['HTTP_REFERE']);
  exit();
  }

