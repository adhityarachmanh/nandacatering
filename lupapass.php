
<div style="overflow: auto; display:" class="modal" id="lupapass" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!--Belum Login-->
            <div class="modal-header <?php if ($_SESSION['uid']) {echo "hidden";}else{echo "";} ?>">
                <h3>Lupa Pass</h3>
                <button type="button" class="close" onclick="document.getElementById('lupapass').style.display='none'">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Udah Login-->
            
                <!--Foto-->
           
            <!--Udah Login-->
          
            <!--Belum Login-->
            <div class="modal-body">
                <form class="login-form login-hide"  method="post" action="inc/lupapass.inc.php">
                    <input type="text" name="username" placeholder="Username" >
                    <p style="display:;" id="user-exists">Username Anda Tidak Terdaftar</p>
                    <input type="text" name="email" placeholder="Email" >
                    <p style="display:;" id="user-exists">Email Anda Tidak Terdaftar</p>
                    <input type="text" name="kodepin" placeholder="kodepin" >
                    <div class="modal-footer">
               
               <a href="#" onclick="document.getElementById('lupapass').style.display='none'"  class="btn btn-secondary">Close</a>
                 
                   <button type="submit" class="btn btn-primary login-button" name="lupapass">OK</button>
                 
               </div>
                    </form>
            </div>
            <!--Belum Login-->
         
            <!--Udah Login-->
          
        </div>
        <div class="modal-content submitted-div">
            <div class="modal-header">
                <h5 class="modal-title" id="login-form-label">An email has been sent</h5>
               
                    <span aria-hidden="true">&times;</span>
            
            </div>
            
           
        </div>
    </div>
</div>
