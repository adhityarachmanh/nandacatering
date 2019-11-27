<?php
if(isset($_POST['yakin'])){
 include'inc/login.php';
session_start();
$id=$_SESSION['uid'];
$nama= $_FILES['foto']['name'];
$tempat= $_FILES['foto']['tmp_name'];
$pecahnama=explode('.', $nama);
$format=strtolower(end($pecahnama));
 $namabaru = "fotouser".$id.".".$format;
$lokasiupload = 'imgevent/fotouser/'.$namabaru;
$first = mysqli_real_escape_string($db, $_POST['first']);
$last = mysqli_real_escape_string($db, $_POST['last']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$pwd = mysqli_real_escape_string($db, $_POST['newpwd']);
$rpwd = mysqli_real_escape_string($db, $_POST['ulangipwd']);
$pwdlama = mysqli_real_escape_string($db, $_POST['pwdlama']);
$notelp = mysqli_real_escape_string($db, $_POST['notelp']);
$emailvalidasi = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
$number = "/^[0-9]+$/";
    if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)){
        header('Location: akun.php?akun=info&data=syaratnama');
        exit();
    }else{
        if(strlen($pwd) < 9 ){
            header('Location: akun.php?akun=info&data=panjangpass');
            exit();
        }else{
            if($pwd != $rpwd){
                header('Location: akun.php?akun=info&status=passtidaksama');
                exit();
            }else{
                if(!preg_match($emailvalidasi,$email)){
                    header('Location: akun.php?akun=info&data=emailtidaksesuaipersyaratan');
                    exit();
                }else{
                    if(!preg_match($number,$notelp)){
                        header('Location: akun.php?akun=info&data=nomertelponkurang/lebih');
                        exit();
                
             
              
    
             }else{
                if($pwdlama != $_SESSION['u_rpwd']){
                    header('Location: akun.php?akun=info&data=passwordandasalah');
                    exit();
                }else{
                
                        $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
                        move_uploaded_file($tempat,$lokasiupload);
                        $sql = "UPDATE users SET user_first='$first',user_last='$last',user_email='$email',user_uid='$uid',user_pwd='$hashedpwd',user_rpwd='$rpwd',notelp='$notelp',fotouser='$namabaru' WHERE id='$id'";
                        header('Location: akun.php?akun=info&akun=berhasil');
                        exit();
             
                    }
                }
            }
        }
    }
  }   

}else{
    header('Location: akun.php?akun=info');
    exit();
}






?>