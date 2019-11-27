<?php 
if(isset($_POST['lupapass'])){
    include'conn.php';
    $email=$db->real_escape_string($_POST['email']);
    $kodepin=$db->real_escape_string($_POST['kodepin']);
    $uid=$db->real_escape_string($_POST['username']);

    $data= $db->query("SELECT id FROM users WHERE user_email='$email' AND kodepin='$kodepin'");
    if($data->num_rows > 0){
        $str="0123456789abcdefghijklmnopqrstuvwxyz";
        $str= str_shuffle($str);
        $str= substr($str, 0, 15);
        $password=password_hash($str, PASSWORD_DEFAULT); 
        $db->query("UPDATE users SET user_pwd='$password',user_rpwd='$str' WHERE user_email='$email'");

        echo '<script language="javascript">';
        echo 'alert("Password Baru anda adalah:'.$str.'")';
        echo '</script>';
        echo '<script>window.location="../index.php"</script>';
    }else{
        echo '<script language="javascript">';
        echo 'alert("Data anda Salah Atau Kosong")';
        echo '</script>';
        echo '<script>window.location="../index.php"</script>';
    }
}else{
    header("Location: ../index.php");
    exit();
}
?>