    <?php

     $halamanrefresh = isset($_SERVER['HTTP_CACHE_CONTROL']) &&($_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0' ||  $_SERVER['HTTP_CACHE_CONTROL'] == 'no-cache'); 
     $notif="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        #jika refresh ga keluar sweetalert ke 2xnya sesuai batas refresh
     if($halamanrefresh == 500){
    echo "";
}else{
    #jika tidak refresh keluar sweetalert sesuai batas
    if(!$halamanrefresh){
    if (strpos($notif,"status=")== true) {
        echo '<body onload="notif()"></body>';
    }elseif (strpos($notif,"cart=")== true) {
        echo '<body onload="notif()"></body>';
    }elseif (strpos($notif,"cartada=ada")== true) {
        echo '<body onload="notif()"></body>';
    }elseif (strpos($notif,"register=")== true) {
        echo '<body onload="notif()"></body>';
    }elseif (strpos($notif,"pesan=")== true) {
        echo '<body onload="notif()"></body>';
    }elseif (strpos($notif,"rating=")== true) {
        echo '<body onload="notif()"></body>';
    }elseif (strpos($notif,"halaman=","")== true) {
            echo"";
    }elseif (strpos($notif,"page=","limit=","")== true) {
        #klo di refresh ada get page atau limit ga keluar sweet alert yg ke 2xnya
            echo"";
    }
}
}
   
?>