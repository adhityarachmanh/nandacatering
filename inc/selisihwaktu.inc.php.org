<?php  
                    
                    $skrg=date('d-m-Y');
                    $lalu=date($results->data[$i]['tanggalwaktu']);#fetch di isi di dalam sini
                    $dtklalu=date("s",strtotime($lalu));
                    $dtkskrg=date("s",strtotime($skrg));
                    $mntlalu=date("i",strtotime($lalu));
                    $mntskrg=date("i",strtotime($skrg));
                    $jamlalu=date("H",strtotime($lalu));
                    $jamskrg=date("H",strtotime($skrg));
                    $tgllalu=date("d",strtotime($lalu));
                    $tglskrg=date("d",strtotime($skrg));
                    $blnlalu=date("m",strtotime($lalu));
                    $blnskrg=date("m",strtotime($skrg));
                    $thnlalu=date("Y",strtotime($lalu));
                    $thnskrg=date("Y",strtotime($skrg));
                    $dtk=$dtkskrg-$dtklalu;
                    $mnt=$mntskrg-$mntlalu;
                    $jam=$jamskrg-$jamlalu;
                    $tgl=$tglskrg-$tgllalu;
                    $bln=$blnskrg-$blnlalu;
                    $thn=$thnskrg-$thnlalu;
                 
                    if($thn<"0"){
                      echo"";
                      }elseif($thn>"0"){
                       echo $thn." Tahun Yang Lalu";
                       }elseif($thn=="0"){
                        if($bln<"0"){
                          echo"";
                        }elseif($bln>"0"){
                            echo $bln." Bulan Yang Lalu";
                        }elseif($bln=="0"){
                          if($tgl<"0"){
                            echo"";
                           }elseif($tgl>"0"){
                             echo $tgl." Hari Yang Lalu";
                           }elseif($tgl=="0"){
                        
                            
                           }
                           
                        }
                      }else{
                          echo"Hari Ini";
                      }
                    ?>