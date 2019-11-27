

<div style="overflow: auto; display:<?php

$halamanrefresh = isset($_SERVER['HTTP_CACHE_CONTROL']) &&($_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0' ||  $_SERVER['HTTP_CACHE_CONTROL'] == 'no-cache'); 
$notif="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
   #jika refresh ga keluar sweetalert ke 2xnya sesuai batas refresh
if($halamanrefresh == 500){
echo "none;";
}else{
    if(!$halamanrefresh){
    $notif="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        if (strpos($notif,"register=berhasil")== true) {
            echo "none;";
        }elseif (strpos($notif,"register=")== true) {
            echo "block;";}
}}?>" class="modal" id="daftar" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Daftar Akun</h3>
               <a  href="#" type="button" class="close" onclick="document.getElementById('daftar').style.display='none'">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
         
                <form class="signup-form"  method="post" action="inc/register.inc.php">   
                    <div class="modal-body">
                       <div class="modal-body">
                    <fieldset>
                        <label for="firstname">First Name*</label><br>
                        <input type="text" name="first" placeholder="" >
                        <p style="display:<?php
$notif="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if (strpos($notif,"register=syaratnama")== true) {
        echo "block;";}?>;" id="user-exists">Nama Anda Tidak Sesuai Persyaratan</p>
                    </fieldset>
</div>
           <div class="modal-body">
                    <fieldset>
                        <label for="lastname">Last Name*</label><br>
                        <input type="text" name="last" placeholder="" >
                        <p style="display:<?php
$notif="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if (strpos($notif,"register=syaratnama")== true) {
        echo "block;";}?>;" id="user-exists">Nama Anda Tidak Sesuai Persyaratan</p>
                
                    </fieldset>
                </div>
                   <div class="modal-body">
                    <fieldset>
                        <label for="email">Username*</label><br>
                        <input type="text" name="uid" placeholder="" >
                        <p style="display:<?php
$notif="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if (strpos($notif,"register=syaratusernameada")== true) {
        echo "block;";}?>;" id="user-exists">Username Anda Telah Digunakan Oleh Orang Lain</p>
                    </fieldset>
                </div>
                         <div class="modal-body">
                    <fieldset>
                      
                            <label for="phone">Phone*</label><br>
                            <input type="tel" name="notelp" placeholder=""   >
                          
                            <p style="display:<?php
$notif="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if (strpos($notif,"register=syarattlp")== true) {
        echo "block;";}?>;" id="user-exists">Nomer Telpon Anda Tidak Sesuai</p>
                   
                       
                    </fieldset>
</div>
                     <div class="modal-body">
                    <fieldset>
                        <label for="email">Email*</label><br>
                        <input type="email" name="email" placeholder="" >
                        <!--halaman-->
                       <input type="hidden" name="halaman"  value="<?php $a=$_SERVER['REQUEST_URI']; $b=explode("/",$a); echo $b['2']; ?>">
                        <!--halaman-->
                        <p style="display:<?php
$notif="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if (strpos($notif,"register=syaratemailada")== true) {
        echo "block;";}?>;" id="user-exists">Email Telah Digunakan Oleh Orang Lain</p>
                    </fieldset>
</div>
                     <div class="modal-body">
                   <!-- pass-->
                    <fieldset>
                        <label for="password">Create Password**</label><br>
                        <input type="password" name="pwd" placeholder=""  maxlength="10">
                        <p style="display:<?php
$notif="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if (strpos($notif,"register=syaratpwd")== true) {
        echo "block;";}?>;" id="user-exists">Password Anda Tidak Sesuai</p>
                    </fieldset>
                </div>
                    <!--ulangi pass-->
                     <div class="modal-body">
                    <fieldset>
                        <label for="passwordconfirm">Confirm Password**</label><br>
                        <input type="password" name="rpwd" placeholder=""  maxlength="10">
                        <p style="display:<?php
$notif="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if (strpos($notif,"register=syaratrpwd")== true) {
        echo "block;";}?>;" id="user-exists">Password Anda Tidak Sama</p>
                    </fieldset>
               
                
            </div>
               <div class="modal-body">
                    <fieldset>
                        <label for="passwordconfirm">Kode Pin</label><br>
                        <input type="pin" name="kodepin" placeholder=""  maxlength="6" >
                      
                    </fieldset>
               
                
            </div>
        </div>
            <div class="modal-footer">
                <button onclick="document.getElementById('daftar').style.display='none'" type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary signup-button" name="daftarakun">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>