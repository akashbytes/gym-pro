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
                            <li role="presentation"  ><a href="javascript:void(0);" aria-controls="payment" role="tab" data-toggle="tab"><span>4</span>Payment</a></li>
                            <li role="presentation" class="active" ><a href="javascript:void(0);" aria-controls="confirmation" role="tab" data-toggle="tab"><span>5</span>Confirmation</a></li>
                        </ul>


<?php } else { ?>


                         <ul class="nav nav-tabs text-right" role="tablist">
                            <li role="presentation" class="active" ><a href="javascript:void(0);" aria-controls="confirmation" role="tab" data-toggle="tab"><span>5</span>Confirmation</a></li>
                            <li role="presentation"  ><a href="javascript:void(0);" aria-controls="payment" role="tab" data-toggle="tab"><span>4</span>Payment</a></li>
                            <li role="presentation"  ><a href="javascript:void(0);" aria-controls="shipping" role="tab" data-toggle="tab"><span>3</span>Shipping</a></li>
                            <li role="presentation"  ><a href="javascript:void(0);" aria-controls="account" role="tab" data-toggle="tab"><span>2</span>Account</a></li>
                            <li role="presentation" ><a href="javascript:void(0);" aria-controls="shipping" role="tab" data-toggle="tab"><span>1</span>Summery</a></li>
                        </ul>

 <?php } ?>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="confirmation">
                            <div class="checkout-confirm">
                                <img src="<?php  echo base_url();  ?>assets/images/okay.png" alt="Okay">
                                <h3>Payment Complete</h3>
                                <h4>Thank you for your order</h4>
                                <h2>Your order id is : <a href=""><?php  echo $this->uri->segment(3);  ?></a></h2>
                                
                                <p>We have sent you an email with all the details of your order to your email address.</p>
                            </div><!-- End .checkout-confirm -->
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
