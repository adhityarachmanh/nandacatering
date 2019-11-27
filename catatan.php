
     
     <form method="post" action="akun.php?akun=info" enctype="multipart/form-data">
            <br>
         
            <img src="<?php if (isset($_SESSION['uid'])) {if(count($_SESSION['u_foto'])==0){ echo 'img/defaultfoto.png';}elseif(count($_SESSION['u_foto'])>0){echo "imgevent/fotouser/".$_SESSION['u_foto'];}}?>" class="img-rounded" width="70%" height="400"   id="gofoto">
               <br>
             
            <div class="form-group" style="display:none;" id="gantifoto">
                    <label>Ganti Foto </label>
                    <input type="file" name="foto" class="form-control" value="<?php echo $_SESSION['u_foto']?>">
                      <div class="button-wrapper" id="gantifoto" >
                <button   name="yakin"  class="button-red" >Ganti Foto</button>
            </div>
              
                </div>
                <a href="#gofoto" id="foto" onclick="document.getElementById('foto').style.display='none',document.getElementById('konfirm').style.display='none',document.getElementById('gantifoto').style.display='block',document.getElementById('updtpass').style.display='block'" class="button-red button-fluid">Ganti Foto</a>
                
       
            <div class="form-group current-user-info <?php if($_POST['pin']==$_SESSION['pin']){echo "hidden";}else{echo "";}?>"  >
               

                <div class="form-group" style="display:none;" id="konfirm">
                <p style="display:block; background:green;" id="user-exists" >Masukkan Pin Anda Untuk Ganti Password</p>
                        
                    <input type="password" name="pin" value="" class="form-control" id="konfirm">
                    <p style="display:<?php if(isset($_POST['pin'])){if($_POST['pin']!==$_SESSION['pin']){echo "block";}}else{echo"none";}?>;" id="user-exists">Pin Anda Salah</p>
                    <input type="submit"  class="button-red button-fluid" value="OK">
                </div>
                <div class="button-wrapper" id="updtpass">
                    
                    <a href="#konf"  onclick="document.getElementById('updtpass').style.display='none',document.getElementById('konfirm').style.display='block',document.getElementById('okpin').style.display='block'" class="button-red button-fluid">Update Password</a>
                   
                </div>
            </div>
         
            <h3></h3>
            <div class="pass-info" style="display:<?php if($_POST['pin']==$_SESSION['pin']){echo "block";}else{echo "none";}?>">
            <p style="display:<?php if(isset($_POST['pin'])){if($_POST['pin']==$_SESSION['pin']){echo "block";}}else{echo"none";}?>; background:green;" id="user-exists">Pin Anda Benar Silahkan Ganti Password Anda</p>
                 <div class="form-group">
                <p class="user-email"><span>Password Anda: </span> <?php echo substr($_SESSION['u_rpwd'], 0, 4);?>******</p>
                    <label>Password Lama Anda</label>
                    <input type="password" name="pwdlama" value="" class="form-control" maxlength="12" value="">  
                </div>
                <div class="form-group">
                    <label>Password Baru Anda </label>
                    <input type="password" name="newpwd" class="form-control" maxlength="12">
                
    
                </div>
                <div class="form-group">
                    <label>Re-type New Password </label>
                    <input type="password" name="ulangipwd" class="form-control"  maxlength="12">
                   
                 
                </div>
                <div class="button-wrapper" id="konf">
                <input name="yakin" type="submit" value="gantipass" class="button-red">
            </div>
            </div>
       
            

           
            <div class="form-group">
          
                <label>Nama Depan*</label>
                <input type="text" name="first" value="<?php echo $_SESSION['u_first']?>" required="" class="form-control" >
            
            </div>
            <div class="form-group">
                <label>Nama Belakang*</label>
                <input type="text" name="last" value="<?php echo $_SESSION['u_last']?>" required="" class="form-control" >
          
            </div>
         
            <div class="form-group">
                <label>Email*</label>
                <input type="email" name="email" value="<?php echo $_SESSION['u_email']?>" required="" class="form-control"  >
               
            </div>
            
         
            <div class="ctn-wrp">
                <div class="form-group col col-6">
                    <label>Phone</label>
                    <input type="tel" name="notelp" value="<?php echo $_SESSION['u_telp']?>"  class="form-control" max-length="13" >
                    
                </div>
             
            </div>
            
            <br>
            
            <div class="button-wrapper">
                <input type="submit" name="yakin" class="button-red" >
            </div>
        
        </form>



        <?php 



if (isset($_POST['yakin']))
{




  
 
  $id=$_SESSION['uid'];
  $newpwd=mysqli_real_escape_string($koneksi, $_POST['newpwd']);
    $ulangipwd=mysqli_real_escape_string($koneksi, $_POST['ulangipwd']);
    $pwdlama=$_POST['pwdlama'];
    if($_POST['pin']>0){
        echo "<script>location='akun.php?akun=info';</script>";
        exit();
    }
    if($pwdlama>0){
 if($pwdlama!=$_SESSION['rpwd']){
    echo "<script>location='akun.php?akun=info&update=pwdsalah';</script>";
    exit();
 }}
 
  if(empty($ulangipwd)){
    $ulangipwd=$_SESSION['u_rpwd'];

  }
  if(empty($newpwd)){
    $newpwd=$_SESSION['u_rpwd'];
     $hashedpwd = password_hash($newpwd, PASSWORD_DEFAULT);
  }elseif(!empty($newpwd)){
      $hashedpwd = password_hash($newpwd, PASSWORD_DEFAULT);
  }
  if (!empty($_FILES['foto']))
  {
     $nama= $_FILES['foto']['name'];
  $tempat= $_FILES['foto']['tmp_name'];
  $fileext=explode('.', $nama);
  $fileactualext=strtolower(end($fileext));
    $filenamenew = "fotouser".$id.".".$fileactualext;
    $filedestination = 'imgevent/fotouser/'.$filenamenew;
    move_uploaded_file($tempat, $filedestination);
  
  $koneksi->query("UPDATE users set user_first='$_POST[first]',
    user_last='$_POST[last]',user_email='$_POST[email]',user_pwd='$hashedpwd',user_rpwd='$ulangipwd', fotouser='$filenamenew',notelp='$_POST[notelp]' WHERE id='$id' ");
      echo "<script>location='akun.php?akun=info?update=berhasil';</script>";
     session_destroy();
     exit();
}
 else
{
 
  
  $koneksi->query("UPDATE users set user_first='$_POST[first]',
    user_last='$_POST[last]',user_email='$_POST[email]',user_pwd='$hashedpwd',user_rpwd='$ulangipwd',notelp='$_POST[notelp]' WHERE id='$id' ");
} 
 


  echo "<script>location='akun.php?akun=info?update=berhasil';</script>";
 
  session_unset();
  exit();
}
?>
    