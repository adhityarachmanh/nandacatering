<?php
#kudang pengatur logo notif
$notif="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if (strpos($notif,"status=berhasil")== true) {
        echo "success";
    }elseif (strpos($notif,"status=logout")== true) {
            echo "success";
    }elseif (strpos($notif,"cart=")== true) {
        echo "success";
      
    }elseif (strpos($notif,"register=berhasil")== true) {
        echo "success";

    }elseif (strpos($notif,"register=")== true) {
        echo "warning";

    }elseif (strpos($notif,"pesan=")== true) {
        echo "success";
    }elseif (strpos($notif,"rating=berhasil")== true) {
        echo "success";
    }
    else{
        echo"warning";
    }
   
?>