<?php
   include'../inc/koneksi.php';
 $limit = (isset($_GET['limit'])) ? $_GET['limit'] :4;
  $page = (isset($_GET['page'])) ? $_GET['page'] :1 ; 
   $links = (isset($_GET['links'])) ? $_GET['links'] :200;
   $untukusername=$_SESSION['u_uid'];
 

$query ="SELECT * FROM pesan where id='$_GET[id]'";

    
require_once 'inc/paginator.class.php';
$paginator = new Paginator($dbh,$query);
$results=$paginator->getData($limit,$page);
?>
   <?php
        for($i=0;$i < count($results->data);$i++){ 
        ?>    
<div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php if($_GET['action']=="terkirim"){echo"Baca Pesan Terkirim";}elseif($_GET['inbox']){echo"Baca Pesan Masuk";}?></h3>

              <div class="box-tools pull-right">
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3> <?php echo $results->data[$i]['subjek']?></h3>
                <h5><?php if($_GET['action']=="terkirim"){ echo 'Untuk: '.$results->data[$i]['untuk'];}elseif($_GET['id']){echo 'Dari: '.$results->data[$i]['dari'];}?>
                  <span class="mailbox-read-time pull-right"><?php $waktu=date_create($results->data[$i]['tanggalwaktu']); echo date_format($waktu, "d/m/Y H:i:s"); ?></span></h5>
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border text-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
                    <i class="fa fa-trash-o"></i></button>
                    <a href="hubungikami.php?halaman=compose&action=balas&dari=<?php echo $results->data[$i]['dari']?>" class="btn btn-default btn-sm <?php if($_GET['action']=="terkirim"){echo 'hidden';}?>"><i class="fa fa-reply"></i>Balas</a>
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Forward">
                    <i class="fa fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
                  <i class="fa fa-print"></i></button>
              </div>
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
              <?php echo $results->data[$i]['isi']?>
              <?php if($results->data[$i]['berkas']>0){echo '<img src="imgevent/berkas/'.$results->data[$i]['berkas'].'">';}?>
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <ul class="mailbox-attachments clearfix">
                <li style="display:<?php if(empty($results->data[$i]['berkas'])){echo"none;";}else{echo"block;";}?>">
                  <span ><img style="width:100%;" src="imgevent/berkaspesan/<?php echo $results->data[$i]['berkas']?>" alt="Attachment"></span>

                  <div class="mailbox-attachment-info">
                    <a href="" class="mailbox-attachment-name"><i class="fa fa-camera"></i> <?php echo $results->data[$i]['berkas']?></a>
                      
                  </div>
                </li>
               
              </ul>
            </div>
           
            <!-- /.box-footer -->
            <div class="box-footer">
        
              <div class="pull-right">
              <a href="hubungikami.php?halaman=compose&action=balas&dari=<?php echo $results->data[$i]['dari']?>" class="btn btn-default btn-sm <?php if($_GET['action']=="terkirim"){echo 'hidden';}?>"><i class="fa fa-reply"></i>Balas</a>
            
              </div>
              <a onclick="return confirm('Yakin Pesan ini Ingin Di Hapus?')" href="inc/hapuspesan.php?action=hapus&pesan=hapuspesan&id=<?php echo $results->data[$i]['id'];?>" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i>Hapus Pesan</a>
              <button onclick="myprint();" type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
              <script>
function myprint() {
    window.print();
}
</script>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
        <?php }?>