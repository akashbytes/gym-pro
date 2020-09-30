
            <div class="sidemenu-overlay"></div><!-- End .sidemenu-overlay -->
            
            <div class="main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="banner banner-top">
                                <img src="<?php   echo base_url();    ?>assets/images/banners/banner-top.jpg" alt="Banner">
                            </div><!-- End .banner -->
                            

                            <div class="category-header">
                                <h1>Home Decor</h1>
                                <ol class="breadcrumb">
                                    <li><a href="#">Home &amp; Garden</a></li>
                                    <li class="active">Home Decor</li>
                                </ol>
                            </div>

                            <div class="shop-row">
                                <div class="shop-container max-col-4">
                                    <br />
                                    <?php
                                    $count=0; 
                                    foreach($cate_product AS $key=>$row)
                                    {
                                        $count++;
                                    }
                                    if($count=="0")
                                    {
                                        ?>
                                            <h1 align="center">No Products Found </h1>
                                        <?php
                                    }
                                    ?>
                                    
                                    

                                    <?php
                                    
                                    foreach($cate_product AS $key=>$row)
                                    {
                                      ?>
                                      
                                    <div class="col-md-3">
                                        <div class="catz">
                                            <div class="catImg">
                                                <a  href="<?php echo base_url(); ?>home/product/<?php echo $row['pro_url'] ?>" title="<?php  echo $row['pro_title'] ?>" >
                                                    <img src="<?php   echo base_url(); ?>images/<?php  echo $row['pro_feat_image'] ?>" alt="<?php  echo $row['pro_title'] ?>">
                                                </a>
                                                <div class="catWish">
                                                    <a href="javascript:void(0);" id="<?php  echo $row['pro_id'];  ?>" onclick="wishlistadd(this.id)" class="btn-product btn-wishlist" title="Add to Wishlist"><i class="fa fa-heart"></i></a>                                     
                                                </div>
                                            </div>
                                            <div class="catTitle">
                                                <h3 class="product-title">
                                                    <a href="<?php echo base_url(); ?>home/product/<?php echo $row['pro_url'] ?>"><?php  echo substr(ucfirst($row['pro_title']),0,20).".."; ?></a>
                                                </h3>
                                            </div>
                                            <div class="product-price-container">
                                                <span class="product-price">$<?php  echo $row['pro_sale_price']      ?></span>
                                            </div><!-- Endd .product-price-container -->
                                        </div>
                                    </div>

                                      <?php
                                    }
                                    ?>

                                </div><!-- End .shop-container -->
                            </div><!-- End .shop-row -->
                            <br><br>
                            <nav aria-label="Page Navigation">
                                <ul class="pagination">
                                 <?php
                                    echo $this->pagination->create_links();
                                ?>
                                            
                                </ul>
                            
                            </nav>
                        </div><!-- End .col-md-9 -->

                        <div class="col-md-3 sidebar sidebar-shop">

                            <div class="widget widget-box widget-shop-filter active">
                                <h3 class="widget-title">Filter</h3>
                                    
                                    <div class="filter-box">
                                        <h5 class="filter-label">Sort By</h5>
                                        <ul class="shop-filter-list">
                                            <li <?php     if($this->uri->segment(5)=="new"){echo  "class='active'";   }   ?>><a href="<?php  echo base_url()     ?>home/category/<?php   echo $this->uri->segment(3) ?>/type/new/price/<?php   echo $this->uri->segment(7) ?>/<?php  echo $this->uri->segment(8)  ?>"><i class="fa fa-caret-right"></i>New Arrival</a></li>
                                            <li <?php     if($this->uri->segment(5)=="best"){echo  "class='active'";   }   ?>><a href="<?php  echo base_url()     ?>home/category/<?php   echo $this->uri->segment(3) ?>/type/best/price/<?php   echo $this->uri->segment(7) ?>/<?php  echo $this->uri->segment(8)  ?>"><i class="fa fa-caret-right"></i>Best Sellers</a></li>
                                            <li <?php     if($this->uri->segment(5)=="popular"){echo  "class='active'";   }   ?>><a href="<?php  echo base_url()     ?>home/category/<?php   echo $this->uri->segment(3) ?>/type/popular/price/<?php   echo $this->uri->segment(7) ?>/<?php  echo $this->uri->segment(8)  ?>"><i class="fa fa-caret-right"></i>Popular Products </a></li>
                                            <li <?php     if($this->uri->segment(5)=="hotdeals"){echo  "class='active'";   }   ?>><a href="<?php  echo base_url()     ?>home/category/<?php   echo $this->uri->segment(3) ?>/type/hotdeals/price/<?php   echo $this->uri->segment(7) ?>/<?php  echo $this->uri->segment(8)  ?>"><i class="fa fa-caret-right"></i>Hot Deals</a></li>
                                            <li <?php     if($this->uri->segment(5)=="featured"){echo  "class='active'";   }   ?>><a href="<?php  echo base_url()     ?>home/category/<?php   echo $this->uri->segment(3) ?>/type/featured/price/<?php   echo $this->uri->segment(7) ?>/<?php  echo $this->uri->segment(8)  ?>"><i class="fa fa-caret-right"></i>Featured Product  </a></li>
                                        </ul>
                                    </div><!-- End .filter-box -->
                                     <div class="filter-box">
                                        <h5 class="filter-label">Price Filter</h5>
                                        <ul class="shop-filter-list">
                                            <li <?php     if($this->uri->segment(7)=="1"){echo  "class='active'";   }   ?>><a href="<?php  echo base_url()     ?>home/category/<?php   echo $this->uri->segment(3) ?>/type/<?php  echo $this->uri->segment(5)  ?>/price/1/<?php  echo $this->uri->segment(8)  ?>"><i class="fa fa-caret-right"></i>$ 0 to $100</a></li>
                                            <li <?php     if($this->uri->segment(7)=="2"){echo  "class='active'";   }   ?>><a href="<?php  echo base_url()     ?>home/category/<?php   echo $this->uri->segment(3) ?>/type/<?php  echo $this->uri->segment(5)  ?>/price/2/<?php  echo $this->uri->segment(8)  ?>"><i class="fa fa-caret-right"></i>$ 100 to $ 500</a></li>
                       <!--class="active"--><li <?php     if($this->uri->segment(7)=="3"){echo  "class='active'";   }   ?>><a href="<?php  echo base_url()     ?>home/category/<?php   echo $this->uri->segment(3) ?>/type/<?php  echo $this->uri->segment(5)  ?>/price/3/<?php  echo $this->uri->segment(8)  ?>"><i class="fa fa-caret-right"></i>$ 500 to $ 1000</a></li>
                                            <li <?php     if($this->uri->segment(7)=="4"){echo  "class='active'";   }   ?>><a href="<?php  echo base_url()     ?>home/category/<?php   echo $this->uri->segment(3) ?>/type/<?php  echo $this->uri->segment(5)  ?>/price/4/<?php  echo $this->uri->segment(8)  ?>"><i class="fa fa-caret-right"></i>$ 1000 Above</a></li>
                                        </ul>
                                    </div><!-- End .filter-box -->
                            </div><!-- End .widget -->
                            
                            
                           

                           
                        </div><!-- End .col-md-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .main -->
            
           
        
        <a id="scroll-top" href="#top" title="Scroll top"><i class="fa fa-angle-up"></i></a>

        <!-- End -->
        <script src="<?php      echo base_url(); ?>assets/js/plugins.js"></script>
        <script src="<?php      echo base_url(); ?>assets/js/main.js"></script>
    </body>

<!-- Mirrored from hustlethemes.com/html/Hustle-Furniture/category.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Mar 2019 11:47:08 GMT -->
</html>











<!--      category product                  <div class="product-item">
                                        <div class="product">
                                            <figure class="product-image-container">
                                                <a href="<?php   echo base_url();    ?>home/product/<?php     echo $row['pro_url']        ?>" title="<?php  echo $row['pro_title']      ?>" class="product-image-link">
                                                    <img class="img-responsive" src="<?php   echo base_url();    ?>images/<?php     echo $row['pro_feat_image']        ?>" alt="<?php  echo $row['pro_title']      ?>">
                                                </a> 
                                                
                                                

                                                <div class="product-action">
                                                    <a href="javascript:void(0);" id="<?php  echo $row['pro_id'];  ?>" onclick="wishlistadd(this.id)" class="btn-product btn-wishlist" title="Add to Wishlist">
                                                <i class="icon-product icon-heart"></i>
                                            </a>
                                                    
                                                </div> 
                                            </figure>
                                            <h3 class="product-title">
                                                <a href="<?php   echo base_url();    ?>home/product/<?php     echo $row['pro_url']        ?>"><?php  echo substr(ucfirst($row['pro_title']),0,20)."..";      ?></a>
                                            </h3>
                                            <div class="product-price-container">
                                                <span class="product-price">$<?php  echo $row['pro_sale_price']      ?></span>
                                            </div> 
                                        </div> 
                                    </div>  -->