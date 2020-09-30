 <div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">  
                <div class="page-header text-center">
                    <h1>Checkout</h1>
                    <p>Checkout Your Products</p>
                </div><!-- End .page-header -->

                <div class="checkout-tabs">
                    <!-- Nav tabs -->

                    <?php if ($this->session->lang=="en") { ?>


                     <ul class="nav nav-tabs text-right" role="tablist">
                                <li role="presentation" ><a href="javascript:void(0);" aria-controls="shipping" role="tab" data-toggle="tab"><span>1</span>Summery</a></li>
                                <li role="presentation"  ><a href="javascript:void(0);" aria-controls="account" role="tab" data-toggle="tab"><span>2</span>Account</a></li>
                                <li role="presentation"  ><a href="javascript:void(0);" aria-controls="shipping" role="tab" data-toggle="tab"><span>3</span>Shipping</a></li>
                                <li role="presentation" class="active" ><a href="javascript:void(0);" aria-controls="payment" role="tab" data-toggle="tab"><span>4</span>Payment</a></li>
                                <li role="presentation"><a href="javascript:void(0);" aria-controls="confirmation" role="tab" data-toggle="tab"><span>5</span>Confirmation</a></li>
                            </ul>


<?php } else { ?>

                            <ul class="nav nav-tabs text-right" role="tablist">
                                 <li role="presentation"><a href="javascript:void(0);" aria-controls="confirmation" role="tab" data-toggle="tab"><span>5</span>Confirmation</a></li>
                                 <li role="presentation" class="active" ><a href="javascript:void(0);" aria-controls="payment" role="tab" data-toggle="tab"><span>4</span>Payment</a></li>
                                 <li role="presentation"  ><a href="javascript:void(0);" aria-controls="shipping" role="tab" data-toggle="tab"><span>3</span>Shipping</a></li>
                                 <li role="presentation"  ><a href="javascript:void(0);" aria-controls="account" role="tab" data-toggle="tab"><span>2</span>Account</a></li>
                                <li role="presentation" ><a href="javascript:void(0);" aria-controls="shipping" role="tab" data-toggle="tab"><span>1</span>Summery</a></li>
                                
                                
                                
                               
                            </ul>

<?php } ?>



                    <!-- Tab panes -->
                    <div class="tab-content">
                  
                        <div role="tabpanel" class="tab-pane active" id="payment">

  <?php if ($this->session->lang=="en") { ?>


                            <div class="tab-header">
                                
                                <div class="radio-inline-container">
                                    <h4>Payment Method:</h4>
                                    <!-- <img src="<?php  echo base_url();  ?>assets/images/payment-card.png" alt="Card" class="radio-img"> -->
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="payment-option"  data-target=".payment-card">
                                            <span class="check"></span>
                                            <span class="circle"></span>
                                            Online Payment
                                        </label>
                                    </div><!-- End .radio -->

                                    <!-- <img src="<?php  echo base_url();  ?>assets/images/payment-paypal.png" alt="Paypal" class="radio-img"> -->
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="payment-option"checked data-target=".payment-paypal">
                                            <span class="check"></span>
                                            <span class="circle"></span>
                                            Cash On Delivery
                                        </label>
                                    </div><!-- End .radio -->
                                </div><!-- End .radio-inline-container -->

                            </div><!-- End .tab-header -->
<?php } else { ?>
                            <div class="tab-header">
                                
                                <div class="pull-right" style="width:100%;">
                                    <div class="radio-inline-container">
                                    <!-- <img src="<?php  echo base_url();  ?>assets/images/payment-card.png" alt="Card" class="radio-img"> -->
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="payment-option"  data-target=".payment-card">
                                            <span class="check"></span>
                                            <span class="circle"></span>
                                            Online Payment
                                        </label>
                                    </div><!-- End .radio -->

                                    <!-- <img src="<?php  echo base_url();  ?>assets/images/payment-paypal.png" alt="Paypal" class="radio-img"> -->
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="payment-option"checked data-target=".payment-paypal">
                                            <span class="check"></span>
                                            <span class="circle"></span>
                                            Cash On Delivery
                                        </label>
                                    </div><!-- End .radio -->

                                    <h4>Payment Method:</h4>

                                </div><!-- End .radio-inline-container -->
                                </div>

                            </div><!-- End .tab-header -->
<?php } ?>





                            <form action="<?php echo base_url();  ?>checkout/process" class="payment-card target-area active" method="post">
                             <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Shipping Details</label>
                                            <table class="table">
                                                <tr>
                                                    <td>Name :</td>
                                                    <td><?php   echo $shipping['od_name']  ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Email :</td>
                                                    <td><?php   echo $shipping['od_email']  ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Phone :</td>
                                                    <td><?php   echo $shipping['od_phone']  ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Address :</td>
                                                    <td><?php   echo $shipping['od_address']  ?></td>
                                                </tr>
                                                </table>
                                            
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Order Details</label>
                                            <table class="table">
                                                <tr>
                                                    <td>   Items :  </td>
                                                    <td> <?php echo   $cart_count ?> </td>
                                                </tr>
                                                <tr>
                                                    <td>  Total Price :  </td>
                                                    <td> $ <?php echo   $cart_price ?> </td>
                                                    <?php
                                                    
                                                    $total_price=$cart_price;
                                                    ?>
                                                </tr>
                                                <tr>
                                                    <td>   Discount :  </td>
                                                    <td>  <?php
                                                                if($discount==1)
                                                                {
                                                                    if($dis_type=='flat')
                                                                    {
                                                                        $total_price-=$dis_rate;
                                                                        ?>
                                                                         $ <?php  echo $dis_rate;  ?>
                                                                        <?php
                                                                    }
                                                                    else
                                                                    {
                                                                        $discount_amount=$total_price*$dis_rate;
                                                                        $discount_amount=$discount_amount/100;
                                                                        $total_price-=$discount_amount;
                                                                        ?>
                                                                             $ <?php  echo $discount_amount;  ?>
                                                                        <?php
                                                                    }
                                                                    
                                                                }
                                                                ?>          
                            
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>   Shipping :  </td>
                                                    <td> $<?php   echo $shipping_amount['s_price'];    
                                                        
                                                             $total_price= $total_price+$shipping_amount['s_price'];
                                                            
                                                    ?> </td>
                                                </tr>
                                                <tr>
                                                    <td>   Sub Total Price :  </td>
                                                    <td> $ <?php  echo $total_price;  ?></td>
                                                </tr>
                                                
                                                
                                            </table>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->
                                </div><!-- End .row -->

                                <div class="clearfix form-action">
                                    <div class="btn-wrap pull-right">
                                        <span class="btn-payment-info"> $ <?php  echo $total_price;  ?></span>
                                        <input type="submit" class="btn btn-accent" value="Pay Now">
                                    </div><!-- End .btn-wrap -->
                                </div><!-- End .form-action -->
                            </form>

                             <form action="#" class="payment-card target-area ">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Name on Card*</label>
                                            <input type="text" class="form-control" required>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Card number*</label>
                                            <input type="text" class="form-control form-with-icon" placeholder="0000-0000-0000-0000" required>

                                            <img src="<?php  echo base_url();  ?>assets/images/icon-input-card.png" alt="Card" class="form-icon">
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>CVV number*</label>
                                            <input type="text" class="form-control form-with-icon" required>
                                            <span class="form-icon">
                                                <img src="<?php  echo base_url();  ?>assets/images/icon-input-info.png" alt="Card">
                                            </span>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->
                             
                                   
                                
                                   
                                </div><!-- End .row -->
                               
                            </form>
                        </div><!-- End .tab-pane -->
                       
                    </div>
                </div><!-- End .product-details-tab --> 
            </div><!-- End .col-md-9 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</div><!-- End .main -->
   <a id="scroll-top" href="#top" title="Scroll top"><i class="fa fa-angle-up"></i></a>

<!-- End -->
<script src="<?php  echo base_url();  ?>assets/js/plugins.js"></script>
<script src="<?php  echo base_url();  ?>assets/js/main.js"></script>
