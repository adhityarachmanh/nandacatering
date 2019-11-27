<div class="bottom-nav" id="footer">
    <div class="ctn-wrp">
        <div class="row rowFullWidth main-wrp">
            <div class="bottom-nav-links">
                <ul class="list-unstyled desktop">
                    <li>
                        <a href="#" title="Order Now"></a>
                    </li>
                    <li><a href="#" title="Franchising" target="_blank"></a></li>
                    <li><a href="#" title="Join the Team" target="_blank"></a></li>
                    <li><a href="#" title="Gift Cards" target="_blank"></a></li>
                    <li><a href="#" title="Contact Us" target="_blank"></a></li>
                </ul>
                <ul class="list-unstyled mobile">
                    <li><a href="#" title="Contact Us" target="_blank"></a></li>
                </ul>
                <a href="#" class="hidden contact-us"> Us</a>
            </div>
            <div class="bottom-nav-social">
                <ul>
                    <li><a href="#" target="_blank" title="Facebook" class="fa fa-facebook-square"></a></li>
                    <li><a href="#" target="_blank" title="Twitter" class="fa fa-twitter-square"></a></li>
                    <li><a href="#" target="_blank" title="Instagram" class="fa fa-instagram"></a></li>
                    <li><a href="#" target="_blank" title="Youtube" class="fa fa-youtube-square"></a></li>
                </ul>

            </div>
        </div>
    </div>
</div>

<!-- ==== zaxby`s footer setting ==== -->

<footer class="footer">
    <section class="footer-links">
        <div class="ctn-wrp">
            <div class="row rowFullWidth main-wrp">
                <div class="footer-col col-xs-12">
                    <div class="accord-open h5"> Catering Menu</div>
                    <ul class="list-unstyled">
                       <li><a href="index.php?halaman=paket" title="Catering Menu">Catering Menu</a></li>
                   </ul>
                </div>
                <div class="footer-col col-xs-12">
                    <div class="h5">Connect</div>
                    <ul class="list-unstyled">
                     
                        <li><a href="https://www.facebook.com/Nandacatering" target="_blank" title="Facebook">Facebook</a></li>
                        <li><a href="https://twitter.com/Nandacatering" target="_blank" title="Twitter">Twitter</a></li>
                        <li><a href="https://www.youtube.com/user/Nandacatering" target="_blank" title="Youtube">YouTube</a></li>
                        <li><a href="https://instagram.com/Nandacatering/" target="_blank" title="Instagram">Instagram</a></li>
                   
                     
                

                    </ul>
                </div>
                <div class="footer-col col-xs-12">
                    <div class="h5">Bagaimana Kami Membantu?</div>
                    <ul class="list-unstyled">
                        <!--<li><a href="/connect/">Contact Us</a></li>-->
                        <li><a  onclick="document.getElementById('login').style.display='<?php if($_SESSION['u_uid']){echo "none";}else{echo "block";}?>'" href="<?php if($_SESSION['u_uid']){echo "hubungikami.php";}else{echo "#";}?>" title="Hubungi Kami">Hubungi Kami</a></li>
                        <li><a href="#" title="FAQs"></a></li>
                    </ul>
                </div>
               
            </div>
        </div>
    </section>
    <section class="footer-node">
        <div class="container">
          
            <div class="footer-logo">
                <br>
                <a href="index.php" title="Nanda Catering"><img src="img/logo.png" width="232" height="53" alt="Zaxbys Logo" /></a>
                <span>&#169;2018 Nanda Catering, Adhitya Rachman Design</span>
                <p>Nanda Catering Menyediakan Berbagai Macam Paket dan Menyediakan Jasa Booking</p>
            </div>
        </div>
    </section>
</footer>
<!-- Sticky footer-->

        <section class="sticky-nav" style="display:<?php if($_SESSION['u_uid']=="admin"){echo'none';}else{echo'block';}?>;" >

            <div class="sticky-ctn" >

                <div class="sticky-link-ctn">

                    <div class="sticky">
                        <a  onclick="document.getElementById('login').style.display='<?php if($_SESSION['u_uid']){echo "none";}else{echo "block";}?>'" class="btn" href="<?php if($_SESSION['u_uid']){echo "hubungikami.php";}else{echo "#";}?>" title="Hubungi Kami">Hubungi Kami</a>
                        
                        <img src="Static/Images/global/remove-blue.png"  class="remove" />
                    </div>
                </div>
                <!--<div class="sticky-info">Guest Services Information</div>-->
            </div>
        </section>
        <section class="sticky-nav" style="display:<?php if($_SESSION['u_uid']=="admin"){echo'block';}else{echo'none';}?>;" >

<div class="sticky-ctn" >

    <div class="sticky-link-ctn">

        <div class="sticky">
            <a href="admin/dashboard.php" class="btn" title="Dashboard Admin">Dashboard Admin</a>
            
            <img src="Static/Images/global/remove-blue.png"  class="remove" />
        </div>
    </div>
    <!--<div class="sticky-info">Guest Services Information</div>-->
</div>
</section>
        <script src="static/script/sweetalert.js"></script>

 <script type="text/javascript" src="code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="Static/Script/slick.min.js"></script>
    <script src="Static/css/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="Static/Script/bootstrap-datepicker.min.js"></script>
    <script src="Static/Script/validator.js"></script>
    <script src="Static/Script/core.min.js"></script>
    
   
    <script src="Static/Script/slick.min.js"></script>
        <script type="text/javascript" src="Static/Script/Zaxbys.min.js"></script>
  
    <script src="Static/Script/jquery.query-object70e1.js?v=20180624"></script>
    <script src="Static/Script/Ordering70e1.js?v=20180624"></script>
    
<script src="Static/Script/masonry.pkgd.min.js"></script>
    <script type="text/javascript" src="Static/Script/FlavorFeed.min70e1.js?v=20180624"></script>
  