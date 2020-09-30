

            <div class="sidemenu-overlay"></div><!-- End .sidemenu-overlay -->
            
            <div class="main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-header text-center">
                                <h1>My Orders</h1>
                                <!--<p></p>-->
                            </div><!-- End .page-header -->

                            <div class="table-responsive">
                                
                                                                    
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Image</th></th>
                                            <th>Title</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php
                                    $items=0;
                                    $total_price=0;
                                    foreach($order_data AS $key=>$row)
                                    {
                                         $items++;
                                         $total_price+=$row['o_quantity']*$row['o_price'];
                                            
                                      ?>
                                      
                                        
                                        <tr>
                                            <td class="product-col">
                                                <img src="<?php echo base_url();    ?>images/<?php echo $row['pro_feat_image']       ?>"  height="100px"     />
                                            </td>
                                            <td class="product-col">
                                                <?php  echo $row['pro_title']      ?>
                                            </td>
                                            
                                            <td class="price-col">
                                                    $ <?php  echo $row['o_price']   ?>
                                            </td>
                                            <td class="quantity-col">
                                                    <?php  echo $row['o_quantity']   ?>
                                            </td>
                                            <td class="total-col" colspan="2">
                                                   $ <?php  echo $row['o_total_price']   ?>
                                            </td>
                                        </tr>

                                    <?php
                                      }
                                    ?>                                
                                        
                                    </tbody>
                                </table>
                                
<table class="table table-xs">
    <thead>
    <tr>
        <th>Shipping Details</th>
        <th>Price Details</th>
    </tr>
</thead>
<tbody>
    <tr>
        <td>
            Order Name  : <?php  echo $row['o_person_name']    ?>
            <br />
            Phone no : <?php  echo $row['o_phone']    ?>
            <br />
            Address : <?php  echo $row['o_address']  ?>
            <br />
            <h3>Status : <?php  
                
                if($row['o_user_status']=="cancelled")
                {
                    echo "Cancelled By User";
                }
                else
                {
                    
                    echo ucwords($row['o_status']);
                   
                }
                    ?></h3>
            
        </td>
        <td>
            Total Items : <?php echo  $items;  ?><br />
            Total Price : $ <?php echo  $total_price;  ?><br />
            Total Discount : $ <?php echo  $row['o_coupon_discount'];
                if($row['o_coupon_used']!='0')
                {
                    echo "  &nbsp;&nbsp;&nbsp;Coupon Used(".$row['o_coupon_used'].")";
                }
            ?><br />
            Sipping charge : $  <?php echo  $row['o_shipping_charge'];  ?><br />
            Final Price : $ <?php echo  $row['o_final_price'];  ?>
        </td>
    </tr>
    
</tbody>
</table>
                                
                            </div><!-- End .table-responsive -->

                           
                        </div><!-- End .col-md-9 -->

                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .main -->
            
           
        
        <a id="scroll-top" href="#top" title="Scroll top"><i class="fa fa-angle-up"></i></a>

        <!-- End -->

        <script src="<?php  echo base_url();  ?>assets/js/plugins.js"></script>
        <script src="<?php  echo base_url();  ?>assets/js/main.js"></script>
    </body>

<!-- Mirrored from hustlethemes.com/html/Hustle-Furniture/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Mar 2019 11:47:09 GMT -->
</html>
<style>
    .height
    {
        height:500px!important;
    }
</style>