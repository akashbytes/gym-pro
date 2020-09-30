

            <div class="sidemenu-overlay"></div><!-- End .sidemenu-overlay -->
            
            <div class="main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-header text-center">
                                <h1>My Orders</h1>
                                <?php
                                    
                                        if ($this->session->flashdata('error'))
                                        {
                                            ?>
                                            <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
                                            <?php
                                        }
                                        
                                        if ($this->session->flashdata('success'))
                                        {
                                            ?>
                                            <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
                                            <?php
                                        }
                                    
                                    
                                    ?>
                                <!--<p></p>-->
                            </div><!-- End .page-header -->

                            <div class="table-responsive">
                                <?php
                                $total_orders=0;
                                
                                foreach($myorder AS $key=>$row)
                                {
                                    $total_orders++;
                                }
                                
                                if($total_orders==0)
                                {
                                    ?>
                                    <div class="height">
                                        
                                    <center>
                                        
                                    <img src="<?php    echo base_url();    ?>assets/images/noorder.png" height="150px" align="center" />
                                    
                                    </center>
                                    
                                    </div>
                                    <?php
                                    
                                }
                                else
                                {
                                    ?>
                                                                    
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Order Id</th></th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>View</th>
                                            <th>Cancel</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php
                                    
                                    foreach($myorder AS $key=>$row)
                                    {
                                      ?>
                                      
                                        
                                        <tr>
                                            <td class="product-col">
                                                <?php  echo $row['o_key']   ?>
                                            </td>
                                            <td class="price-col">
                                                    $ <?php  echo $row['o_final_price']   ?>
                                            </td>
                                            <td class="quantity-col">
                                                    <?php  echo ucwords($row['o_status'])   ?>
                                            </td>
                                            <td class="total-col" colspan="2">
                                                <a href="<?php  echo base_url();   ?>home/orderdetails/<?php echo $row['o_key']   ?>" class="btn btn-info" title="Delete product" role="button">
                                                    View
                                                </a>
                                                <?php
                                                
                                                
                                                ?>  
                                                <?php
                                                if($row['o_status']!='cancelled')
                                                {
                                                    
                                                        if($row['o_user_status']!='cancelled')
                                                        {
                                                                ?>
                                                    
                                                                <a href="<?php  echo base_url();   ?>home/ordercancel/<?php echo $row['o_key']   ?>" onclick="confirm('Are you sure to cancel this order)" class="btn btn-danger" title="Delete product" role="button">
                                                                    Cancel
                                                                </a>                                                    
                                                                    <?php
                                                        }
                                                        else
                                                        {
                                                            echo "Cancelled";
                                                        }
                                                
                                                }
                                                else
                                                {
                                                  echo "Cancelled  By Seller";
                                                }
                                                
                                                ?>

                                            </td>
                                        </tr>

                                    <?php
                                      }
                                    ?>                                
                                        
                                    </tbody>
                                </table>
                                <?php
                                }
                                    
                                ?>
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