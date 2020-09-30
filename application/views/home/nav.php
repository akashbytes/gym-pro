
    <body>
        <div id="wrapper">

<?php  if ($this->session->lang=="en") { ?>

        <header class="header sticky-header">
                <div class="container">
                    <a href="<?php  echo base_url();   ?>" class="site-logo" title="">
                        <img src="<?php  echo base_url();   ?>assets/images/logo.jpg" id="logoimg" class="logo_top" alt="Logo">
                        <span class="sr-only"></span>
                    </a>
 
                    <div class="header-dropdowns">
                        <div class="dropdown header-dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false">
                                <?php
                                if ($this->session->lang=="en") {
                                    echo "English";
                                }
                                else
                                {
                                    echo "العربية  ";
                                }
                                ?>
                                <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php  echo base_url(); ?>home/language/en" title="Spanish">English</a></li>
                                <li><a href="<?php  echo base_url(); ?>home/language/ar" title="Turkish">العربية  </a></li>

                            </ul>
                        </div><!-- End .dropddown -->
                    </div><!-- End .header-dropdowns -->


                    <div class="search-form-container">
                        <a href="<?php  echo base_url();   ?>#" class="search-form-toggle" title="Toggle Search"><i class="fa fa-search"></i></a>
                        <form action="#">
                            
                            <input type="search" class="form-control" placeholder="Search" required>
                            <button type="submit" title="Search" class="btn"><i class="fa fa-search"></i></button>
                        </form>
                    </div><!-- End .search-form-container -->

                    <ul class="top-links">
                        <?php
                        if($this->session->u_id==NULL)
                        {
                            // https://www.alessafurn.com/home/signup
                            ?>
                            <li><a href="<?php  echo base_url();   ?>home/login">SignIn</a></li>
                            <li><a href="<?php  echo base_url();   ?>home/signup">SignUp</a></li>
                            
                            <?php
                        }
                        else
                        {
                            ?>
                            <!--<li><a href="">Logout</a></li>-->
                             <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" href="<?php  echo base_url();   ?>#">Hello <?php echo $this->session->u_name;   ?></a>
                             <div class="dropdown-menu dropdown-menu-left">
                                 <ul class="dropDown">
                                     <li><a href="<?php  echo base_url();   ?>home/userdashboard">My account</a></li>
                                     <li><a href="<?php  echo base_url();   ?>home/cart">Cart</a></li>
                                     <li><a href="<?php  echo base_url();   ?>home/wishlist">Wishlist</a></li>
                                     <li><a href="<?php  echo base_url();   ?>home/myorders">My Orders</a></li>
                                     <li><a href="<?php  echo base_url();   ?>home/logout">Logout</a></li>
                                 </ul>
                             </div>


                        </li>
                            <?php
                        }
                        ?>
                        <li><a href="<?php  echo base_url();   ?>home/cart">Cart</a></li>
                    </ul>

                    <div class="dropdown cart-dropdown">
                        <a class="dropdown-toggle" href="<?php  echo base_url();   ?>#" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="cart-icon">
                                <img src="<?php  echo base_url();   ?>assets/images/bag.png" alt="Cart">
                                <span class="cart-count" id="cart_count"><?php echo $cart_count; ?></span>
                            </span>
                            <!-- <i class="fa fa-caret-down"></i> -->
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <p class="dropdown-cart-info">You have <span id="cart_count_2"><?php echo $cart_count; ?></span> products in your cart.</p>
                            <div class="dropdown-menu-wrapper" id="cart_list">
                                <?php
                                $count=0;
                                foreach($cart_data AS $key=>$row)
                                {
                                    $count++;
                                }
                                if($count==0)
                                {
                                    ?>
                                    <h3>Cart Is Empty</h3>
                                    <?php
                                }
                                else
                                {
                                   foreach($cart_data AS $key=>$row)
                                    {
                                    $row2=$this->homemodel->cartproductfetch($row['c_product_id']);
                                        
                                        ?>
                                        <div class="product">
                                            <figure class="product-image-container">
                                                <a href="<?php  echo base_url();   ?>home/product/<?php  echo $row2['pro_url']  ?>" title="<?php  echo $row2['pro_title']  ?>">
                                                    <img src="<?php  echo base_url();   ?>images/<?php  echo $row2['pro_feat_image']  ?>" alt="<?php  echo $row2['pro_title']  ?>">
                                                </a>
                                            </figure>
                            
                                            <div>
                                                <a href="javascript:void(0);" class="btn-delete" title="Delete product" role="button" id="<?php  echo $row['c_id']  ?>" onclick="del_cart(this.id)"></a>
                                                <h4 class="product-title"><a href="<?php  echo base_url();   ?>home/product/<?php  echo $row2['pro_url']  ?>"><?php  echo substr($row2['pro_title'],0,30).".."  ?></a></h4>
                                                <div class="product-price-container">
                                                    <span class="product-price">$<?php  echo $row['c_price']  ?></span>
                                                </div><!-- End .product-price-container -->
                                                <div class="product-qty">Qty : <?php  echo $row['c_quantity'] ?> Color : <span style="background-color:<?php  echo $row['c_color'] ?>;height:10px;width:30px;">&nbsp;&nbsp;&nbsp;&nbsp;</span></div><!-- End .product-qty -->
                                            </div><!-- End .product-image-container -->
                                        </div><!-- End .product- -->
                                        <?php
                                    }
                                     
                                }
                                    
                                
                                ?>
                                
                            </div><!-- End .droopdowm-menu-wrapper -->

                            <div class="cart-dropdowm-action" id="total_price">
                                <?php
                                if($cart_price!='0')
                                {
                                ?>
                                <div class="dropdowm-cart-total"><span>TOTAL:</span> <span>$<?php echo $cart_price; ?></span></div>
                                <a href="<?php  echo base_url();   ?>checkout" class="btn btn-primary">Checkout</a>
                                <?php
                                }
                                ?>
                                
                            </div><!-- End .cart-dropdown-action -->
                        </div><!-- End .dropdown-menu -->
                    </div><!-- End .cart-dropddown -->

                    <a href="<?php  echo base_url();   ?>#" class="sidemenu-btn" title="Menu Toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                </div><!-- End .container-fluid -->
            </header><!-- End .header -->


<?php } else { ?>


            <header class="header sticky-header">
                <div class="container">




                    <a href="<?php  echo base_url();   ?>#" class="sidemenu-btn" title="Menu Toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>


 

                    <div class="dropdown cart-dropdown">
                        <a class="dropdown-toggle" href="<?php  echo base_url();   ?>#" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="cart-icon">
                                <img src="<?php  echo base_url();   ?>assets/images/bag.png" alt="Cart">
                                <span class="cart-count" id="cart_count"><?php echo $cart_count; ?></span>
                            </span>
                            <!-- <i class="fa fa-caret-down"></i> -->
                        </a>
                        <div class="dropdown-menu dropdown-menu-left">
                            <p class="dropdown-cart-info">You have <span id="cart_count_2"><?php echo $cart_count; ?></span> products in your cart.</p>
                            <div class="dropdown-menu-wrapper" id="cart_list">
                                <?php
                                $count=0;
                                foreach($cart_data AS $key=>$row)
                                {
                                    $count++;
                                }
                                if($count==0)
                                {
                                    ?>
                                    <h3>Cart Is Empty</h3>
                                    <?php
                                }
                                else
                                {
                                   foreach($cart_data AS $key=>$row)
                                    {
                                    $row2=$this->homemodel->cartproductfetch($row['c_product_id']);
                                        
                                        ?>
                                        <div class="product">                           
                                            <div>
                                                <a href="javascript:void(0);" class="btn-delete" title="Delete product" role="button" id="<?php  echo $row['c_id']  ?>" onclick="del_cart(this.id)"></a>
                                                <h4 class="product-title"><a href="<?php  echo base_url();   ?>home/product/<?php  echo $row2['pro_url']  ?>"><?php  echo substr($row2['pro_title'],0,30)  ?></a></h4>
                                                <div class="product-price-container">
                                                    <span class="product-price">$<?php  echo $row['c_price']  ?></span>
                                                </div><!-- End .product-price-container -->
                                                <div class="product-qty">Qty : <?php  echo $row['c_quantity'] ?></div><!-- End .product-qty -->
                                            </div><!-- End .product-image-container -->

                                            <figure class="product-image-container">
                                                <a href="<?php  echo base_url();   ?>home/product/<?php  echo $row2['pro_url']  ?>" title="<?php  echo $row2['pro_title']  ?>">
                                                    <img src="<?php  echo base_url();   ?>images/<?php  echo $row2['pro_feat_image']  ?>" alt="<?php  echo $row2['pro_title']  ?>">
                                                </a>
                                            </figure>

                                        </div><!-- End .product- -->
                                        <?php
                                    }
                                     
                                }
                                    
                                
                                ?>
                                
                            </div><!-- End .droopdowm-menu-wrapper -->

                            <div class="cart-dropdowm-action" id="total_price">
                                <?php
                                if($cart_price!='0')
                                {
                                ?>
                                <a href="<?php  echo base_url();   ?>checkout" class="btn btn-primary">Checkout</a>
                                <div class="dropdowm-cart-total"><span><?php echo $cart_price; ?>$</span> <span> : TOTAL</span> </div>                             
                                <?php
                                }
                                ?>
                                
                            </div><!-- End .cart-dropdown-action -->
                        </div><!-- End .dropdown-menu -->
                    </div><!-- End .cart-dropddown -->


                    <ul class="top-links">
                        <?php
                        if($this->session->u_id==NULL)
                        {
                            ?>
                            <li><a href="<?php  echo base_url();   ?>home/login"><!-- Signin -->تسجيل دخول  </a></li>
                            <li><a href="<?php  echo base_url();   ?>home/signup">SignUp</a></li>
                            <?php
                        }
                        else
                        {
                            ?>
                            <!--<li><a href="">Logout</a></li>-->
                             <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" href="<?php  echo base_url();   ?>#">Hello <?php echo $this->session->u_name;   ?></a>
                             <div class="dropdown-menu dropdown-menu-right">
                                 <ul class="dropDown userDrpDwn">
                                     <li><a href="<?php  echo base_url();   ?>home/userdashboard">My account</a></li>
                                     <li><a href="<?php  echo base_url();   ?>home/cart">عربة التسوق  </a></li>
                                     <li><a href="<?php  echo base_url();   ?>home/wishlist"><!-- Wishlist -->قائمة لأماني  </a></li>
                                     <li><a href="<?php  echo base_url();   ?>home/myorders">My Orders</a></li>
                                     <li><a href="<?php  echo base_url();   ?>home/logout"><!-- Logout -->خروج  </a></li>
                                 </ul>
                             </div>


                        </li>
                            <?php
                        }
                        ?>
                        <li><a href="<?php  echo base_url();   ?>home/cart"><!-- Cart -->عربة التسوق  </a></li>
                    </ul>


                    <div class="search-form-container">
                        <a href="<?php  echo base_url();   ?>#" class="search-form-toggle" title="Toggle Search"><i class="fa fa-search"></i></a>
                        <form action="#">
                            <button type="submit" title="Search" class="btn"><i class="fa fa-search"></i></button>
                            <input type="search" class="form-control" placeholder="بحث  " required>
                            
                        </form>
                    </div><!-- End .search-form-container -->

                    <div class="header-dropdowns">
                        <div class="dropdown header-dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false">
                                <?php
                                if ($this->session->lang=="en") {
                                    echo "English";
                                }
                                else
                                {
                                    echo "العربية  ";
                                }
                                ?>
                                <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php  echo base_url(); ?>home/language/en" title="Spanish">English</a></li>
                                <li><a href="<?php  echo base_url(); ?>home/language/ar" title="Turkish"><!-- Arabic -->العربية  </a></li>

                            </ul>
                        </div><!-- End .dropddown -->
                    </div><!-- End .header-dropdowns -->

                    


                    <a href="<?php  echo base_url();   ?>" class="site-logo" title="">
                        <img src="<?php  echo base_url();   ?>assets/images/logo.jpg" id="logoimg" class="logo_top" alt="Logo">
                        <span class="sr-only"></span>
                    </a>





                </div><!-- End .container-fluid -->
            </header><!-- End .header -->

    <?php } ?>



<?php  if ($this->session->lang=="en") { ?>

            <aside class="sidemenu">
                <div class="sidemenu-wrapper">
                    <div class="sidemenu-header">
                        <a href="<?php  echo base_url();   ?>#" class="sidemenu-logo">
                            <img src="<?php  echo base_url();   ?>assets/images/pattern.jpg" alt="logo">
                        </a>
                    </div><!-- End .sidemenu-header -->

                    <ul class="metismenu">
                        <li>
                            <a href="<?php  echo base_url();   ?>#">Home</a>
                        </li>
                        <?php
                        
                        foreach($c_data AS $key1=>$row1)
                        {   
                            $have_sub=0;
                            
                            foreach($s_data AS $key2=>$row2)
                            {
                                if($row1['c_id']==$row2['s_cate_id'])
                                {
                                    $have_sub=1;
                                }
                            }
                            
                            if($have_sub==1)
                            {
                                ?>
                            <li>
                                <a href="<?php  echo base_url();   ?>#" aria-expanded="false"><?php  echo $row1['c_name']   ?> <span class="sidemenu-icon"></span></a>  
                                <ul aria-expanded="false" class="collapse">

                                <?php
                                foreach($s_data AS $key2=>$row2)
                                {
                                    if($row2['s_cate_id']==$row1['c_id'])
                                    {
                                        ?>
                                <li><a href="<?php  echo base_url();   ?>home/category/<?php   echo $row2['s_id'];     ?>/type/none/price/none/page/1"><?php  echo $row2['s_name']  ?></a></li>
                                        <?php
                                    }
                                    ?>
                               <?php   
                                }
                                ?>
                                </ul>
                            </li>
                                <?php
                            }
                            else
                            {
                             ?>
                             <li>
                                <a href="<?php  echo base_url();   ?>#"><?php  echo $row1['c_name']   ?></a>
                            </li>
                             <?php
                            }
                        }
                            
                        ?> 

                        <li>
                            <a href="<?php  echo base_url();   ?>home/about">About Us</a>
                        </li>
                        <li>
                            <a href="<?php  echo base_url();   ?>home/wishlist">Wishlist</a>
                        </li>
                        <li>
                            <a href="<?php  echo base_url();   ?>home/cart">Cart</a>
                        </li>
                        
                        <li>
                            <a href="<?php  echo base_url();   ?>home/contact">Contact Us</a>
                        </li>
                        
                    </ul>
                </div><!-- End .sidemenu-wrapper -->
            </aside><!-- End .sidemenu -->

<?php } else { ?>


            <aside class="sidemenu">
                <div class="sidemenu-wrapper">
                    <div class="sidemenu-header">
                        <a href="<?php  echo base_url();   ?>#" class="sidemenu-logo">
                            <img src="<?php  echo base_url();   ?>assets/images/pattern.jpg" alt="logo">
                        </a>
                    </div><!-- End .sidemenu-header -->

                    <ul class="metismenu">
                        <li>
                            <a href="<?php  echo base_url();   ?>#"><!-- Home -->الصفحة الرئيسية  </a>
                        </li>
                        <?php
                        
                        foreach($c_data AS $key1=>$row1)
                        {   
                            $have_sub=0;
                            
                            foreach($s_data AS $key2=>$row2)
                            {
                                if($row1['c_id']==$row2['s_cate_id'])
                                {
                                    $have_sub=1;
                                }
                            }
                            
                            if($have_sub==1)
                            {
                                ?>
                            <li>
                                <a href="<?php  echo base_url();   ?>#" aria-expanded="false"><?php  echo $row1['c_name']   ?> <span class="sidemenu-icon"></span></a>  
                                <ul aria-expanded="false" class="collapse">

                                <?php
                                foreach($s_data AS $key2=>$row2)
                                {
                                    if($row2['s_cate_id']==$row1['c_id'])
                                    {
                                        ?>
                                <li><a href="<?php  echo base_url();   ?>home/category/<?php   echo $row2['s_id'];     ?>"><?php  echo $row2['s_name']  ?></a></li>
                                        <?php
                                    }
                                    ?>
                               <?php   
                                }
                                ?>
                                </ul>
                            </li>
                                <?php
                            }
                            else
                            {
                             ?>
                             <li>
                                <a href="<?php  echo base_url();   ?>#"><?php  echo $row1['c_name']   ?></a>
                            </li>
                             <?php
                            }
                        }
                            
                        ?> 

                        <li>
                            <a href="<?php  echo base_url();   ?>home/about"><!-- About Us -->من نحن  </a>
                        </li>
                        <li>
                            <a href="<?php  echo base_url();   ?>home/wishlist"><!-- Wishlist -->قائمة لأماني   </a>
                        </li>
                        <li>
                            <a href="<?php  echo base_url();   ?>home/cart"><!-- Cart --> عربة التسوق  </a>
                        </li>
                        
                        <li>
                            <a href="<?php  echo base_url();   ?>home/contact"><!-- Contact Us --> اتصل بنا  </a>
                        </li>
                        
                    </ul>
                </div><!-- End .sidemenu-wrapper -->
            </aside><!-- End .sidemenu -->

  <?php } ?>




            <script>
                function del_cart(id)
                {
                    $.post('<?php  echo base_url();  ?>ajax/cartdelete',{id:id},function(data,status){
                        // alert(data);
                        if(status=='success')
                        {
                            $.post('<?php  echo base_url();  ?>ajax/cartcount',{id:1},function(data,status){
                                $("#cart_count").html(data);
                                $("#cart_count_2").html(data);
                            });
                            $.post('<?php  echo base_url();  ?>ajax/cartprice',{id:1},function(data,status){
                                $("#total_price").html(data);;
                            });
                            $.post('<?php  echo base_url();  ?>ajax/cartfetch',{id:1},function(data,status){
                                $("#cart_list").html(data);;
                            });
                        }
                    });
                }
            </script>

            <div class="sidemenu-overlay"></div><!-- End .sidemenu-overlay -->
<script type="text/javascript">
function wishlistadd(pro_id)
{
    // alert(pro_id);
    $.post('<?php  echo base_url();    ?>ajax/wishlistadd',{pro_id:pro_id},function(data,status){
// 			alert(data);
            swal(data);
		});
}

</script>
<style type="text/css">
    .dropDown li {margin:0 !important;width: 100% ;}
    .dropDown li a{ background: #fff;} 
    .dropDown li a{margin:0 !important; text-transform: capitalize;padding:5px 15px;width: 100% ;}

</style>


            