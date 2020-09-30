
            <div class="main">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="rev_slider_wrapper" class="slider-container rev_slider_wrapper fullwidthbanner-container">
                                <div id="rev_slider" class="rev_slider fullwidthabanner" style="display:none;">
                                    <ul>
                                        <?php

                                        foreach ($slider as $key => $row) 
                                        {
                                        ?>
                                        <!-- SLIDE  -->
                                        <li data-transition="fade">
                                            <!-- Background Image -->
                                            <img src="<?php  echo base_url();   ?>assets/images/transparent.png" class="rev-slidebg" style="background-color: #f4f4f4;" alt="Slider bg">

                                            <div class="tp-caption tp-resizeme rs-parallaxlevel-0 text-primary" 
                                                data-x="['left','left','left','left']" data-hoffset="['68','50','45','30']" 
                                                data-y="['center','center','center','center']" data-voffset="['-44','-36','-30','-24']" 
                                                data-fontsize="['26','24','22','20']"
                                                data-fontweight="400"
                                                data-lineheight="['36','34','32','30']"
                                                data-width="none"
                                                data-height="none"
                                                data-whitespace="nowrap"
                                                data-frames='[{"delay":600,"speed":800,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":600,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                                data-responsive_offset="on" 
                                                data-elementdelay="0" 
                                                style="z-index: 5; white-space: nowrap; letter-spacing: 0.08em; text-transform: uppercase; font-family:'Oswald', sans-serif;">
                                                <?php   echo $row['sl_text']  ?>
                                            </div>

                                            <a class="tp-caption tp-resizeme rs-parallaxlevel-0" 
                                                data-x="['left','left','left','left']" data-hoffset="['68','50','45','30']" 
                                                data-y="['center','center','center','center']" data-voffset="['40','36','32','30']" 
                                                data-width="none"
                                                data-height="none"
                                                data-fontsize="['13','12','11','10']"
                                                data-fontweight="400"
                                                data-lineheight="['21','20','18','16']"
                                                data-color="#7e6f5c"
                                                data-whitespace="nowrap"
                                                data-frames='[{"delay":1000,"speed":800,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":600,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                                data-responsive_offset="on" 
                                                style="z-index: 7; letter-spacing: 0.075em; text-transform: uppercase; text-decoration: underline;" href="<?php  echo base_url().$row['sl_link'];   ?>#">
                                                <?php  echo $row['sl_link_text']  ?>
                                            </a>

                                            <div class="tp-caption tp-resizeme" 
                                                data-frames='[{"delay":600,"speed":1000,"frame":"0","from":"x:right;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":600,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                                data-type="image" 
                                                data-x="['right','right','right','right']" data-hoffset="['140','120','100','80']" 
                                                data-y="['bottom','bottom','bottom','bottom']" data-voffset="['0','0','0','0']" 
                                                data-width="none"
                                                data-height="none">
                                                <img src="<?php  echo base_url();   ?>images/<?php   echo $row['sl_image']  ?>" alt="Item" width="365" height="454" data-ww="['365px', '300px', '240px', '200px']" data-hh="['454px', '373px', '298px', '248px']">
                                            </div>
                                        </li>
                                        <?php
                                        }
                                        ?>
                                        <!-- SLIDE  -->
                                    </ul>
                                    <div class="tp-bannertimer tp-bottom" style="display:none; height: 2px; background-color: rgba(0, 0, 0, 0.2);"></div>
                                </div><!-- End #rev_slider -->
                            </div><!-- END REVOLUTION SLIDER -->
                            
                            <?php  if ($this->session->lang=="en") { ?>
                            <h3 class="carousel-title">Popular Products</h3>
                            <?php } else { ?>
                            <h3 class="carousel-title"><!-- Popular Products -->المنتجات الأكثر مبيعا  </h3>
                            <?php } ?>


                            <div class="owl-data-carousel owl-carousel"
                            data-owl-settings='{ "items":4, "nav": true, "dots":false }'
                            data-owl-responsive='{ "480": {"items": 2}, "768": {"items": 3}, "992": {"items": 3}, "1200": {"items": 4} }'>
                                <?php
                                
                                foreach($products AS $key=>$row)
                                {
                                    ?>
                                <div class="product">
                                    <figure class="product-image-container">
                                        <a href="<?php  echo base_url();   ?>home/product/<?php  echo $row['pro_url']  ?>" title="<?php  echo $row['pro_title']  ?>" class="product-image-link">
                                            <img class="owl-lazy" src="<?php  echo base_url();   ?>assets/images/blank.png" data-src="<?php  echo base_url();   ?>images/<?php  echo $row['pro_feat_image']  ?>" width="195" height="255" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="javascript:void(0);" id="<?php  echo $row['pro_id'];  ?>" onclick="wishlistadd(this.id)" class="btn-product btn-wishlist" title="Add to Wishlist">
                                                <i class="icon-product icon-heart"></i>
                                            </a>
                                            <!--<a href="<?php  echo base_url();   ?>#" class="btn-product btn-add-cart" title="Add to Bag">-->
                                            <!--    <i class="icon-product icon-bag"></i>-->
                                            <!--    <span>Add to Bag</span>-->
                                            <!--</a>-->
                                        </div><!-- End .product-action -->
                                    </figure>
                                    <h3 class="product-title">
                                        <a href="<?php  echo base_url();   ?>home/product/<?php  echo ucfirst($row['pro_url']);   ?>"><?php  echo ucfirst($row['pro_title']);   ?></a>
                                    </h3>
                                    <div class="product-price-container">
                                        <span class="product-price">$ <?php  echo $row['pro_sale_price']   ?></span>
                                    </div><!-- Endd .product-price-container -->
                                </div><!-- End .product -->
                                    <?php
                                }
                                ?>  
                                
                                
                            </div><!-- End .owl-data-carousel -->

                            <div class="mb30 mb10-xs"></div><!-- margin -->
                    </div>
                </div><!-- End .container -->
            </div><!-- End .main -->
            

        <!-- End -->
        <script src="<?php  echo base_url();   ?>assets/js/plugins.js"></script>
        <script src="<?php  echo base_url();   ?>assets/js/main.js"></script>

        <!-- REVOLUTION JS FILES -->
        <script type="text/javascript" src="<?php  echo base_url();   ?>assets/js/jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="<?php  echo base_url();   ?>assets/js/jquery.themepunch.revolution.min.js"></script>

        <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
        (Load Extensions only on Local File Systems !  
        The following part can be removed on Server for On Demand Loading) -->  
        <script type="text/javascript" src="<?php  echo base_url();   ?>assets/js/extensions/revolution.extension.actions.min.js"></script>
        <script type="text/javascript" src="<?php  echo base_url();   ?>assets/js/extensions/revolution.extension.carousel.min.js"></script>
        <script type="text/javascript" src="<?php  echo base_url();   ?>assets/js/extensions/revolution.extension.kenburn.min.js"></script>
        <script type="text/javascript" src="<?php  echo base_url();   ?>assets/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script type="text/javascript" src="<?php  echo base_url();   ?>assets/js/extensions/revolution.extension.migration.min.js"></script>
        <script type="text/javascript" src="<?php  echo base_url();   ?>assets/js/extensions/revolution.extension.navigation.min.js"></script>
        <script type="text/javascript" src="<?php  echo base_url();   ?>assets/js/extensions/revolution.extension.parallax.min.js"></script>
        <script type="text/javascript" src="<?php  echo base_url();   ?>assets/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script type="text/javascript" src="<?php  echo base_url();   ?>assets/js/extensions/revolution.extension.video.min.js"></script>

    </body>

<!-- Mirrored from hustlethemes.com/html/Hustle-Furniture/# by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Mar 2019 11:46:40 GMT -->

