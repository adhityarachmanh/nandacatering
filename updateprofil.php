
     
        <form method="post" action="akun.php?akun=info" enctype="multipart/form-data">
            <br>
         
          
               
          
         
            <h3>Update Profil</h3>
            <div class="pass-info" style="display:<?php if($_POST['pin']==$_SESSION['pin']){echo "block";}else{echo "none";}?>">
            <p style="display:<?php if(isset($_POST['pin'])){if($_POST['pin']==$_SESSION['pin']){echo "block";}}else{echo"none";}?>; background:green;" id="user-exists">Pin Anda Benar Silahkan Ganti Password Anda</p>
               
                <div class="button-wrapper" id="konf">
                <input name="yakin" type="submit" value="gantipass" class="button-red">
            </div>
            </div>
            <img src="<?php if (isset($_SESSION['uid'])) {if(count($_SESSION['u_foto'])==0){ echo 'img/defaultfoto.png';}elseif(count($_SESSION['u_foto'])>0){echo "imgevent/fotouser/".$_SESSION['u_foto'];}}?>" class="img-rounded" width="70%" height="400"   id="gofoto">
            
            <div class="form-group" id="gantifoto">
                    <label>Ganti Foto </label>
                    <input type="file" name="foto" class="form-control" value="<?php echo $_SESSION['u_foto']?>">
                      <div class="button-wrapper" id="gantifoto" >
               
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
              <div class="form-group">
               
                    <label>Password Lama Anda</label>
                    <input type="text" name="pwd" value="<?php echo $_SESSION['u_rpwd']?>" class="form-control" maxlength="12" value="">  
                </div>
                <div class="form-group">
                    <label>Password Baru Anda </label>
                    <input type="text" name="rpwd" class="form-control" maxlength="12" value="<?php echo $_SESSION['u_rpwd']?>">
                
    
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
    include('inc/conn.php');
  session_start();
  $id=$_SESSION['uid'];
  $nama= $_FILES['foto']['name'];
  $tempat= $_FILES['foto']['tmp_name'];
  $fileext=explode('.', $nama);
  $fileactualext=strtolower(end($fileext));
  $pwd=mysqli_real_escape_string($db, $_POST['pwd']);
  $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
  if (!empty($tempat))
  {
    $filenamenew = "fotouser".$id.".".$fileactualext;
    $filedestination = "imgevent/fotouser/".$filenamenew;
    move_uploaded_file($tempat, $filedestination);
  
  $db->query("UPDATE users set user_first='$_POST[first]',
    user_last='$_POST[last]',user_email='$_POST[email]',user_pwd='$hashedpwd',user_rpwd='$_POST[rpwd]', fotouser='$filenamenew',notelp='$_POST[notelp]' WHERE id='$id' ");
}
 else
{
 
  
  $db->query("UPDATE users set user_first='$_POST[first]',
    user_last='$_POST[last]',user_email='$_POST[email]',user_pwd='$hashedpwd',user_rpwd='$_POST[rpwd]',notelp='$_POST[notelp]' WHERE id='$id' ");
}
  echo '<script language="javascript">';
          echo 'alert("Profil Berhasil Dirubah")';
          echo '</script>';

  
  echo "<script>location='index.php';</script>";
session_destroy();
}
?>
    