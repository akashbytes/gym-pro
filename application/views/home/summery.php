 <div class="main">
    <div class="container">
        <div class="row">
            
            
<!--*****************************************************above cart section was copied************************************************************************************* -->            
                    <div class="col-md-12">  
                        <div class="page-header text-center">
                            <h1>Checkout</h1>
                            <p>Checkout Your Products</p>
                        </div><!-- End .page-header -->
        
                        <div class="checkout-tabs">
                            <!-- Nav tabs -->

<?php if ($this->session->lang=="en") { ?>


                            <ul class="nav nav-tabs text-right" role="tablist">
                                <li role="presentation" class="active"><a href="javascript:void(0);" aria-controls="shipping" role="tab" data-toggle="tab"><span>1</span>Summery</a></li>
                                <li role="presentation" ><a href="javascript:void(0);" aria-controls="account" role="tab" data-toggle="tab"><span>2</span>Account</a></li>
                                <li role="presentation"><a href="javascript:void(0);" aria-controls="shipping" role="tab" data-toggle="tab"><span>3</span>Shipping</a></li>
                                <li role="presentation"><a href="javascript:void(0);" aria-controls="payment" role="tab" data-toggle="tab"><span>4</span>Payment</a></li>
                                <li role="presentation"><a href="javascript:void(0);" aria-controls="confirmation" role="tab" data-toggle="tab"><span>5</span>Confirmation</a></li>
                            </ul>


<?php } else { ?>

                             <ul class="nav nav-tabs text-right" role="tablist">
                                 <li role="presentation"><a href="javascript:void(0);" aria-controls="confirmation" role="tab" data-toggle="tab"><span>5</span>Confirmation</a></li>
                                 <li role="presentation"><a href="javascript:void(0);" aria-controls="payment" role="tab" data-toggle="tab"><span>4</span>Payment</a></li>
                                 <li role="presentation"><a href="javascript:void(0);" aria-controls="shipping" role="tab" data-toggle="tab"><span>3</span>Shipping</a></li>
                                 <li role="presentation" ><a href="javascript:void(0);" aria-controls="account" role="tab" data-toggle="tab"><span>2</span>Account</a></li>
                                <li role="presentation" class="active"><a href="javascript:void(0);" aria-controls="shipping" role="tab" data-toggle="tab"><span>1</span>Summery</a></li>
                            </ul>
<?php } ?>
        
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="shipping">
                                   <div class="col-md-12 min_height">
                        <div class="page-header text-center">
                            <h1>Order Summery</h1>
                            <!--<p>Your cart items</p>-->
                        </div><!-- End .page-header -->
        
                        <div class="table-responsive">
                            <?php
                            $count=0;
                            foreach($cart_data2 AS $key=>$row)
                            {
                                $count++;
                            }
                            if($count==0)
                            {
                                ?>
                                <h1 align="center">Cart Is Empty!</h1>
                                <?php
                            }
                            else
                            {
                                ?>
                                <h1 align="center" id="cart_empty"></h1>
                            <table class="table">
        
                                <thead>

<?php if ($this->session->lang=="en") { ?>

                                    <tr id="checktop">
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <!--<th>Remove</th>-->
                                    </tr>
<?php } else { ?>
                                    <tr id="checktop">
                                        <th>Total</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Product Name</th>
                                        <!--<th>Remove</th>-->
                                    </tr>
<?php } ?>

                                </thead>
                                <tbody>                                    
                                <?php
                                $subtotal=0;
                                foreach($cart_data2 AS $key=>$row)
                                {
                                    $subtotal+=$row['c_price']*$row['c_quantity'];
                                    ?>

<?php if ($this->session->lang=="en") { ?>


                                    <tr id="remove_<?php  echo $row['c_id'];  ?>">
                                        <td class="product-col">
                                            <div class="product">
                                                <figure class="product-image-container">
                                                    <a href="<?php   echo base_url() ?>home/product/<?php  echo $row['pro_url']  ?>">
                                                        <img style="height:100px!important;" src="<?php  echo base_url();   ?>images/<?php  echo $row['pro_feat_image']  ?>" alt="<?php echo $row['pro_title']   ?>">
                                                    </a>
                                                </figure>
                                                <h3 class="product-title">
                                                    <a href="<?php   echo base_url() ?>home/product/<?php  echo $row['pro_url']  ?>"><?php echo ucwords($row['pro_title']);   ?></a>
                                                </h3>
                                            </div><!-- End .product -->
                                        </td>
                                        <td class="price-col">$<?php   echo $row['c_price'] ?></td>
                                        <td class="price-col">
                                            <h2>
                                                <?php   echo $row['c_quantity'] ?>                                                
                                            </h2>

                                        </td>
                                        <?php
                                        $total_price=$row['c_quantity']*$row['c_price'];
                                            
                                        
                                        ?>
                                        <td class="total-col" id="total_<?php  echo $row['c_id']  ?>"  >$<?php  echo $total_price;  ?></td>
                                        <input type="hidden" id="cart_id_<?php echo $row['c_id']   ?>" value="<?php   echo $row['c_id']   ?>" >                                            
                                    </tr>


<?php } else { ?>


                                    <tr id="remove_<?php  echo $row['c_id'];  ?>">

                                        <?php  $total_price=$row['c_quantity']*$row['c_price']; ?>
                                        <td class="total-col" id="total_<?php  echo $row['c_id']  ?>"  >$<?php  echo $total_price;  ?></td>

                                        <td class="price-col"><h2><?php   echo $row['c_quantity'] ?> </h2> </td>

                                        <td class="price-col">$<?php   echo $row['c_price'] ?></td>

                                        <td class="product-col">
                                            <div class="product">
                                                <h3 class="product-title">
                                                    <a href="<?php   echo base_url() ?>home/product/<?php  echo $row['pro_url']  ?>"><?php echo ucwords($row['pro_title']);   ?></a>
                                                </h3>
                                                <figure class="product-image-container">
                                                    <a href="<?php   echo base_url() ?>home/product/<?php  echo $row['pro_url']  ?>">
                                                        <img style="height:100px!important;" src="<?php  echo base_url();   ?>images/<?php  echo $row['pro_feat_image']  ?>" alt="<?php echo $row['pro_title']   ?>">
                                                    </a>
                                                </figure>                                                
                                            </div><!-- End .product -->
                                        </td>
 
                                        <input type="hidden" id="cart_id_<?php echo $row['c_id']   ?>" value="<?php   echo $row['c_id']   ?>" >                                            
                                    </tr>

 <?php } ?>


                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
                                    
                                <?php
                                }
                                ?>
                                </tbody>
                            </table>
                            <?php
                            }
                            
                                
                            ?>
        
                            
        
                        </div><!-- End .table-responsive -->
                    
<?php if ($this->session->lang=="en") { ?>
                            
                        <div class="row" id="">
                            <div class="col-sm-7">
                                <div class="cart-discount">
                                    
                                        <h3>Coupon Discount</h3>
                                        <!--<p>Enter your coupon code if you have one</p>-->

                                        <form action="#">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="coupon_name" placeholder="Enter your coupon code">
                                                <span class="input-group-btn">
                                                    <button type="button" id="coupon_btn" class="btn">Apply Code</button>
                                                </span>
                                            </div>
                                        </form>
                                    
                                </div><!-- End .cart-discount -->
                            </div><!-- End .col-sm-7 -->
 
        
                            <div class="col-sm-4 col-sm-offset-1" id="cart_bottom">
                                <div class="cart-proceed">
                                    <p class="cart-subtotal"><span>Total :</span> $<?php  echo $subtotal;  ?></p>
                                     <?php
                            if($discount==1)
                            {
                                if($dis_type=='flat')
                                {
                                    $subtotal-=$dis_rate;
                                    ?>
                                    <p class="cart-subtotal"><span>Discount :</span> $<?php  echo $dis_rate;  ?></p>
                                    <p class="cart-subtotal"><span>Sub Total :</span> $<?php  echo $subtotal;  ?></p>
                                    <a href="javascript:void(0);" class="btn btn-default mas" onclick="remove_coupon()" >Remove Coupon</a>

                                    <?php
                                }
                                else
                                {
                                    $discount_amount=$subtotal*$dis_rate;
                                    $discount_amount=$discount_amount/100;
                                    $subtotal-=$discount_amount;
                                    ?>
                                    <p class="cart-subtotal"><span>Discount :</span> $<?php  echo $discount_amount;  ?></p>
                                    <p class="cart-subtotal"><span>Total :</span> $<?php  echo $subtotal;  ?></p>
                                    <a href="javascript:void(0);" class="btn btn-default mas" onclick="remove_coupon()" >Remove Coupon</a>
                                    <?php
                                }
                                
                            }
                            ?>                                   
                                    <a href="<?php   echo base_url(); ?>checkout/account" class="btn btn-accent">Proceed to Checkout</a>
                                </div><!-- Endd .cart-proceed -->
                            </div><!-- End .col-sm-4 -->
                        </div><!-- End .row -->

<?php } else { ?>

                        <div class="row" id=""> 
        
                            <div class="col-sm-5" id="cart_bottom">
                                <div class="cart-proceed">
                                    <p class="cart-subtotal"><?php  echo $subtotal;  ?>$ <span> : Total</span></p>
                                     <?php
                            if($discount==1)
                            {
                                if($dis_type=='flat')
                                {
                                    $subtotal-=$dis_rate;
                                    ?>
                                    <p class="cart-subtotal"> <?php  echo $dis_rate;  ?>$ <span> : Discount</span> </p>
                                    <p class="cart-subtotal"> <?php  echo $subtotal;  ?>$ <span> : Sub Total</span> </p>
                                    <a href="javascript:void(0);" class="btn btn-default mas" onclick="remove_coupon()" >Remove Coupon</a>

                                    <?php
                                }
                                else
                                {
                                    $discount_amount=$subtotal*$dis_rate;
                                    $discount_amount=$discount_amount/100;
                                    $subtotal-=$discount_amount;
                                    ?>
                                    <p class="cart-subtotal"><span>Discount :</span> $<?php  echo $discount_amount;  ?></p>
                                    <p class="cart-subtotal"> <?php  echo $subtotal;  ?>$ <span> : Total</span></p>
                                    <a href="javascript:void(0);" class="btn btn-default mas" onclick="remove_coupon()" >Remove Coupon</a>
                                    <?php
                                }
                                
                            }
                            ?>                                   
                                    <a href="<?php   echo base_url(); ?>checkout/account" class="pull-left btn btn-accent">Proceed to Checkout</a>
                                </div><!-- Endd .cart-proceed -->
                            </div><!-- End .col-sm-4 -->

                            <div class="col-sm-7">
                                <div class="cart-discount">
                                    
                                        <h3>Coupon Discount</h3>
                                        <!--<p>Enter your coupon code if you have one</p>-->

                                        <form action="#">
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <button type="button" id="coupon_btn" class="btn">Apply Code</button>
                                                </span>
                                                <input type="text" class="form-control" id="coupon_name" placeholder="Enter your coupon code">
                                            </div>
                                        </form>
                                    
                                </div><!-- End .cart-discount -->
                            </div><!-- End .col-sm-7 -->


                        </div><!-- End .row -->

<?php } ?>














                        
                    </div><!-- End .col-md-9 -->
                        </div><!-- End .tab-pane -->
                        
                    </div>
                </div><!-- End .product-details-tab --> 
            </div><!-- End .col-md-9 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</div><!-- End .main -->
<style>
    .mas
    {
        margin-bottom: 13px!important;
    }
</style>
   <a id="scroll-top" href="#top" title="Scroll top"><i class="fa fa-angle-up"></i></a>

<!-- End -->
<script src="<?php  echo base_url();  ?>assets/js/plugins.js"></script>
<script src="<?php  echo base_url();  ?>assets/js/main.js"></script>
<script>
    $(document).ready(function(){
        $("#coupon_btn").click(function(){
            var coupon_name=$("#coupon_name").val();
            $.post('<?php echo base_url()    ?>checkout/coupon',{coupon_name:coupon_name},function(data,status){
                    alert(data);
                  $.post('<?php echo base_url()    ?>checkout/finalprice',{id:1},function(data,status){
                        $("#cart_bottom").html(data);               
                  });
            });
        });
        
        $("#remove_coupon").click(function(){
                           
        });
        
    });
    function remove_coupon()
    {
             $.post('<?php  echo base_url();  ?>checkout/remove_coupon',{id:1},function(){
                        $.post('<?php echo base_url()    ?>checkout/finalprice',{id:1},function(data,status){
                        $("#cart_bottom").html(data);               
                  });            
            });
    }
</script>
