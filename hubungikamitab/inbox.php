
<div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Kotak Masuk </h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="Search Mail">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
              
              <!-- /.box-tools -->
            </div>
           
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
          
                <div class="btn-group">
               
                  <a onclick="return confirm('Yakin Semua Pesan Ingin Di Hapus?')" href="inc/hapuspesan.php?action=hapusall&pesan=semuahapus&nama=<?php echo $results->data[$i]['dari'];?>" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></a>
                
        
                </div>
                <!-- /.btn-group -->
                <a href="hubungikami.php?halaman=inbox" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></a>
                <div class="pull-right">
                  
                  <div class="btn-group">
                    <a class="btn"><?php echo $page;?><a>
                    <a href="hubungikami.php?halaman=inbox&page=<?php  if($page=="1"){echo "1";}elseif($page>1){$a=$page-1; echo $a;}?>" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></a>
                    <a  href="hubungikami.php?halaman=inbox&page=<?php echo $page+1; ?>" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></a>
                  </div>
                  <!-- /.btn-group -->
                  
                </div>
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                  <?php
        for($i=0;$i < count($results->data);$i++){ 
        ?>    
              
                  <tr>
                 
                  <h3></h3>
                    <td> <a onclick="return confirm('Yakin Pesan ini Ingin Di Hapus?')" href="inc/hapuspesan.php?action=hapus&pesan=hapuspesan&id=<?php echo $results->data[$i]['id'];?>" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></a></td>
                    <td>  <a href="hubungikami.php?halaman=compose&action=balas&dari=<?php echo $results->data[$i]['dari']?>" class="btn btn-default btn-sm"><i class="fa fa-reply"></i>Balas</a>
                      <a href="hubungikami.php?halaman=bacapesan&id=<?php echo $results->data[$i]['id']?>" class="btn btn-default btn-sm"><i class="fa fa-share"></i>Baca</a></td>
                    <td class="mailbox-name"><a href="hubungikami.php?halaman=bacapesan&id=<?php echo $results->data[$i]['id']?>"><?php echo $results->data[$i]['dari']?></a></td>
                    <td class="mailbox-subject"><b><?php if( $results->data[$i]['dari']=="admin") {echo "Admin Nanda Catering";}else{ echo "User Nanda Catering";}?></b> - <?php echo $results->data[$i]['subjek']; ?>...
                    </td>
                    <td class="mailbox-attachment <?php if(empty($results->data[$i]['berkas'])){echo"hidden";}?>"><i class="fa fa-paperclip"></i></td>
                    <td class="mailbox-date"><?php 
date_default_timezone_set("Asia/Jakarta");       
$start = date_create($results->data[$i]['tanggalwaktu']);
$end = date_create('now');
$diff=date_diff($end,$start);
if($diff->format('%y')>0){
  echo $diff->format('%y').' Tahun ';
}else{
if($diff->format('%m')>0){
  echo $diff->format('%m').' Bulan ';
}else{
if($diff->format('%d')>0){
  echo $diff->format('%d').' Hari ';
}else{
if($diff->format('%h')>0){
  echo $diff->format('%h').' Jam ';
}else{
if($diff->format('%i')>0){
  echo $diff->format('%i').' Menit ';
}else{
  if($diff->format('%s')>0){
    echo $diff->format('%s').' Detik ';
  }
}
}
}
}
}
 ?> Yang Lalu</td>
                  
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
               
            
                <!-- /.pull-right -->
              </div>
            </div>
          </div>
          <!-- /. box -->
        </div>