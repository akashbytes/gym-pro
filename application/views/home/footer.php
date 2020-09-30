     <?php  if ($this->session->lang=="en") { ?>

            <footer class="footer">
                <div class="footer-inner" style="padding: 10px!important;">
                    <div class="container">
                        <div class="row arz">

                            <div class="col-sm-8 arz1">
                                <a  class="ancor" href="">Home</a> |
                                <?php

                                foreach ($pages as $key => $row) 
                                {
                                    ?>
                                    <a class="ancor" href="<?php echo base_url()  ?>home/page/<?php   echo $row['p_url']  ?>"><?php   echo $row['p_title']  ?></a> |
                                    <?php
                                }
                                ?>

                                <a class="ancor" href="<?php  echo base_url();   ?>home/about">About Us</a> |
                                <a class="ancor" href="<?php  echo base_url();   ?>home/contact">Contact Us</a> 
                            </div>
                            <div class="col-sm-4 arz2">
                                   <div class="social-icons">
                                        <a href="#" class="social-icon" title="Facebook"><i class="fa fa-facebook"></i></a>
                                        <a href="#" class="social-icon" title="Twitter"><i class="fa fa-twitter"></i></a>
                                        <a href="#" class="social-icon" title="Linkedin"><i class="fa fa-linkedin"></i></a>
                                        <a href="#" class="social-icon" title="Instagram"><i class="fa fa-instagram"></i></a>
                                        <a href="#" class="social-icon" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                    </div>     
                            </div>

                            
                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End .footer-inner -->
                <div class="footer-bottom">
                    <div class="container text-center">
                        <p class="copyright">Copyright © 2017 Al-Essa Furniture Co.   | All rights reserved. | Design & developed by - <a class="ancor2" href="http://wxits.com">WXIT Consultant Services PVT LTD</a></p>
                    </div><!-- End .container -->
                </div><!-- End .footer-bottom -->


            </footer><!-- End .footer -->

<?php } else { ?>

            <footer class="footer">
                <div class="footer-inner" style="padding: 10px!important;">
                    <div class="container">
                        <div class="row arz">

                            <div class="col-sm-8 arz1">
                                <a  class="ancor" href=""><!-- Home -->الصفحة الرئيسية  </a> |
                                <?php

                                foreach ($pages as $key => $row) 
                                {
                                    ?>
                                    <a class="ancor" href="<?php echo base_url()  ?>home/page/<?php   echo $row['p_url']  ?>"><?php   echo $row['p_title']  ?></a> |
                                    <?php
                                }
                                ?>

                                <a class="ancor" href="<?php  echo base_url();   ?>home/about"><!-- About Us -->من نحن  </a> |
                                <a class="ancor" href="<?php  echo base_url();   ?>home/contact"><!-- Contact Us -->اتصل بنا   </a> 
                            </div>
                            <div class="col-sm-4 arz2">
                                   <div class="social-icons">
                                        <a href="#" class="social-icon" title="Facebook"><i class="fa fa-facebook"></i></a>
                                        <a href="#" class="social-icon" title="Twitter"><i class="fa fa-twitter"></i></a>
                                        <a href="#" class="social-icon" title="Linkedin"><i class="fa fa-linkedin"></i></a>
                                        <a href="#" class="social-icon" title="Instagram"><i class="fa fa-instagram"></i></a>
                                        <a href="#" class="social-icon" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                    </div>     
                            </div>

                            
                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End .footer-inner -->
                <div class="footer-bottom">
                    <div class="container text-center">
                        <p class="copyright">Copyright © 2017 Al-Essa Furniture Co.   | All rights reserved. | Design & developed by - <a class="ancor2" href="http://wxites.com">WXIT Consultant Services PVT LTD</a></p>
                    </div><!-- End .container -->
                </div><!-- End .footer-bottom -->


            </footer><!-- End .footer -->


            <?php } ?>





        </div><!-- End #wrapper -->
        
        <a id="scroll-top" href="<?php  echo base_url();   ?>#top" title="Scroll top"><i class="fa fa-angle-up"></i></a>
        <style>

            a.ancor2
            {
                color:black!important;
            }

           
           
            footer.footer a.ancor
            {
                color:#fff!important;

            }
            
            .social-icons .social-icon
            {
                color: #fff;
                display: inline-block;
                font-size: 11px;
                min-width: 33px;
                min-height: 23px;
                line-height: 28px;
                text-align: center;
                margin: 0 13px 0px 0;
                border-radius: 50%;
                background-color: transparent;
                border: 2px solid #333333;
                transition: all 0.4s ease, color 0.01s;
            }
        </style>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script>
    $(document).ready(function()
        {
                $(window).scroll(function() {
                    if ($(this).scrollTop() > 250){  
                        $('#logoimg').removeClass("logo_top");
                        $('#logoimg').addClass("logo_bottom");
                        // alert('dd');
                    }
                    else{
                        $('#logoimg').addClass("logo_top");
                        $('#logoimg').removeClass("logo_bottom");

                    }
                });
        });
</script>