<?php 
                                $data="1/2/3/4/5";
                                $a=explode("/",$data);
                                $nomor=0;?>
                               <?php foreach($a as $b){
                                   ?>

                            <?php echo '<img src="img/slider/'.$b.'.jpg"  style="width:100%; height: 200px;">';?>
                            <?php echo '<p>'.$nomor.'</p>';?>
                                <?php $nomor++; ?>
                                <?php } ?>