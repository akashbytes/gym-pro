<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12 min_height">

                <?php  if ($this->session->lang=="en") { ?>
                <div class="page-header text-center">
                    <h1>Shopping Cart</h1>
                    <p>Your cart items</p>
                </div><!-- End .page-header -->
                <?php } else { ?>
                <div class="page-header text-center">
                    <h1><!-- Shopping Cart -->عربة التسوق  </h1>
                    <p><!-- Your cart items -->عناصر سلة التسوق   </p>
                </div><!-- End .page-header -->
                <?php } ?>

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
                                <th>Remove</th>
                            </tr>

                    <?php } else { ?>

                            <tr id="checktop">
                                <th><!-- Remove --> حذف  </th>
                                <th><!-- Total -->مجموع
  </th>
                                <th><!-- Quantity -->كمية  </th>
                                <th><!-- Price -->السعر  </th>
                                
                                <th><!-- Product Name -->اسم المنتج  </th>
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
                                            <a href="<?php   echo base_url() ?>home/product/<?php  echo $row['pro_url']  ?>"><?php echo substr($row['pro_title'],0,30)."..."   ?></a>
                                        </h3>
                                    </div><!-- End .product -->
                                </td>

                                <td class="price-col">$<?php   echo $row['c_price'] ?></td>

                                <td class="quantity-col">
                                    <input class="cart-product-quantity form-control" id="qty_<?php   echo $row['c_id']; ?>"  value="<?php   echo $row['c_quantity'] ?>"  type="text"  readonly>
                                </td>

                                <?php $total_price=$row['c_quantity']*$row['c_price']; ?>
                                <td class="total-col" id="total_<?php  echo $row['c_id']  ?>"  >$<?php  echo $total_price;  ?></td>

                                <td class="delete-col"><a href="javascript:void(0);" id="remove_btn_<?php   echo $row['c_id']  ?>" class="btn-delete" title="Delete product"  role="button"></a></td>
                                <input type="hidden" id="cart_id_<?php echo $row['c_id']   ?>" value="<?php   echo $row['c_id']   ?>" >                                            
                            </tr>

<?php } else { ?>

                            <tr id="remove_<?php  echo $row['c_id'];  ?>">
                                <td class="delete-col"><a href="javascript:void(0);" id="remove_btn_<?php   echo $row['c_id']  ?>" class="btn-delete" title="Delete product"  role="button"></a></td>

                                <?php $total_price=$row['c_quantity']*$row['c_price']; ?>
                                <td class="total-col" id="total_<?php  echo $row['c_id']  ?>"  >$<?php  echo $total_price;  ?></td>

                                <td class="quantity-col">
                                    <input class="cart-product-quantity form-control" id="qty_<?php   echo $row['c_id']; ?>"  value="<?php   echo $row['c_quantity'] ?>"  type="text"  readonly>
                                </td>

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

                            <script>
                                $(document).ready(function(){
                                    $("#qty_"+"<?php   echo $row['c_id']; ?>").change(function(){
                                        var qty=$("#qty_"+"<?php   echo $row['c_id']; ?>").val();
                                        if(qty<=0)
                                        {
                                            qty=1;
                                        }
                                            $("#qty_"+"<?php   echo $row['c_id']; ?>").val(qty);
                                            var cart_id=$("#cart_id_"+"<?php   echo $row['c_id']; ?>").val();
                                            $.post('<?php echo base_url()    ?>ajax/cartqtyupdate',{qty:qty,cart_id:cart_id},function(data,status){
                                                $("#total_<?php  echo $row['c_id']  ?>").html(data);
                                                if(status=='success')
                                                {
                                                    $.post('<?php echo base_url()    ?>ajax/cartbottomfetch',{id:1},function(data,status){
                                                        $("#cart_bottom").html(data);
                                                        
                                                    }); 
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
                                    });
                                    
                                $("#remove_btn_"+"<?php   echo $row['c_id']  ?>").click(function(){
                                    
                                    var cart_id=$("#cart_id_"+"<?php   echo $row['c_id']; ?>").val();
                                            

                                            $.post('<?php echo base_url()    ?>ajax/cartdeletemain',{cart_id:cart_id},function(data,status){
                                                if(status=='success')
                                                {
                                                    $("#remove_"+"<?php  echo $row['c_id'];  ?>").fadeOut("slow");
                                                    $.post('<?php echo base_url()    ?>ajax/cartbottomfetch',{id:1},function(data,status){
                                                        $("#cart_bottom").html(data);
                                                        
                                                    }); 
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
                                    
                                    });    
                                    
                                });
                            </script>    
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                    <?php
                    }
                    
                        
                    ?>

                    

                </div><!-- End .table-responsive -->
                <?php
                
                if($count!=0)
                {
                    ?>
                    
                <div class="row" id="cart_bottom">
                    

<?php if ($this->session->lang=="en") { ?>

                    <div class="col-sm-4 col-sm-offset-8">
                        <div class="cart-proceed">
                            <p class="cart-subtotal"><span>Sub Total :</span> $<?php  echo $subtotal;  ?></p>
                           
                            <a href="<?php   echo base_url(); ?>checkout" class="btn btn-accent">Proceed to Checkout</a>
                        </div><!-- Endd .cart-proceed -->
                    </div><!-- End .col-sm-4 -->

<?php } else { ?>

                    <div class="col-sm-4 ">
                        <div class="cart-proceed pull-left">
                            <p class="cart-subtotal"><?php  echo $subtotal;  ?>$ <span> : Sub Total</span> </p>
                           
                            <a href="<?php   echo base_url(); ?>checkout" class="btn btn-accent"><!-- Proceed to Checkout -->باشر لاتمام الشراء  </a>
                        </div><!-- Endd .cart-proceed -->
                    </div><!-- End .col-sm-4 -->

<?php } ?>


                </div><!-- End .row -->
                <?php
                }
                    
                ?>
            </div><!-- End .col-md-9 -->

        </div><!-- End .row -->
    </div><!-- End .container -->
</div><!-- End .main -->



<a id="scroll-top" href="#top" title="Scroll top"><i class="fa fa-angle-up"></i></a>

<!-- End -->

<script src="<?php   echo base_url();  ?>assets/js/plugins.js"></script>
<script src="<?php   echo base_url();  ?>assets/js/main.js"></script>
</body>

<!-- Mirrored from hustlethemes.com/html/Hustle-Furniture/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Mar 2019 11:47:09 GMT -->
</html>
<style type="text/css">
.min_height
{

min-height: 500px!important;
}
</style>

<script>
    $(document).ready(function(){
        $("#coupon_btn").click(function(){
            var coupon_name=$("#coupon_name").val();
            $.post('<?php echo base_url()    ?>ajax/coupon',{coupon_name:coupon_name},function(data,status){
                    alert(data);
                  $.post('<?php echo base_url()    ?>ajax/cartbottomfetch',{id:1},function(data,status){
                        $("#cart_bottom").html(data);               
                  });
            });
        });
    });
</script>