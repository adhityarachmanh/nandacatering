<div class="container">
   <form method="POST" id="comment_form">
    <div class="form-group">
     <input type="text" name="comment_name"  <?php if($_SESSION['u_uid']){ echo 'readonly';}else{echo'readonly';}?> id="comment_name" class="form-control" placeholder="Harap Login Terlebih Dahulu" value="<?php if($_SESSION['u_uid']=="admin"){ echo '&#9813; Admin';}else{if($_SESSION['u_uid']){ echo $_SESSION['u_first'].' '.$_SESSION['u_last'];}}?>" />
    </div>
    <div class="form-group">
     <textarea name="comment_content" <?php if(isset($_SESSION['uid'])){ echo '';}else{echo'readonly';}?> id="comment_content"  class="form-control" placeholder="<?php if($_SESSION['u_uid']=="admin"){ echo "Isi Komen Admin";}else{if($_SESSION['uid']){ echo "Isi Komen";}else{echo "Harap Login Terlebih Dahulu";}}?>" rows="5"></textarea>
    </div>
    <div class="form-group">
     <input type="hidden" name="comment_id" id="comment_id" value="0" />
     <button type="submit" name="submit" id="submit" class="button-red">Kirim</button>
    </div>
   </form>
   <span id="comment_message"></span>
   <br />
   <div id="display_comment"></div>
  </div>