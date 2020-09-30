


<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12 min_height">

                <?php  if ($this->session->lang=="en") { ?>
                <div class="page-header text-center">
                    <h1>Wishlist</h1>
                    <p>Your Wishlist items</p>
                </div><!-- End .page-header -->
                <?php } else { ?>
                <div class="page-header text-center">
                    <h1><!-- Wishlist -->قائمة لأماني  </h1>
                    <p>Your Wishlist items</p>
                </div><!-- End .page-header -->
                <?php } ?>

    <span id="top_data"></span>
                <div class="table-responsive">
                    <?php
                    $count=0;
                    foreach($w_data2 AS $key=>$row)
                    {
                        $count++;
                    }
                    if($count==0)
                    {
                        ?>
                        <h1 align="center">Wishlist Is Empty!</h1>
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
                                <th></th>
                                <th>Price</th>
                                <th></th>
                            </tr>

<?php } else { ?>

                            <tr id="checktop"> 
                                <th></th>
                                <th><!-- Price -->السعر  </th>
                                <th></th>
                                <th><!-- Product Name -->اسم المنتج  </th>                        
                            </tr>

<?php } ?>


                        </thead>
                        <tbody>                                    
                        <?php
                        $total_price=0;
                        foreach($w_data2 AS $key=>$row)
                        {
                            ?>

<?php if ($this->session->lang=="en") { ?>



                            <tr id="remove_<?php  echo $row['w_id'];  ?>">

                                <td class="product-col" colspan="2">
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

                                <td class="price-col">$<?php   echo $row['pro_sale_price'] ?></td>

                                <td class="price-col">
                                    <button onclick="window.location.href='<?php  echo base_url() ?>home/product/<?php echo $row['pro_url']   ?>'" class="btn btn-info" style="background-color:#193769!important;">Add to Cart</button>
                                </td>

                                 
                                <td class="delete-col"><a href="javascript:void(0);" id="remove_btn_<?php   echo $row['w_id']  ?>" class="btn-delete" title="Delete product"  role="button"></a></td>
                                <input type="hidden" id="w_id_<?php echo $row['w_id']   ?>" value="<?php   echo $row['w_id']   ?>" >                                            
                            </tr>


<?php } else { ?>


                            <tr id="remove_<?php  echo $row['w_id'];  ?>">

                                <td class="delete-col"><a href="javascript:void(0);" id="remove_btn_<?php   echo $row['w_id']  ?>" class="btn-delete" title="Delete product"  role="button"></a></td>

                                 <td class="price-col">
                                    <button onclick="window.location.href='<?php  echo base_url() ?>home/product/<?php echo $row['pro_url']   ?>'" class="btn btn-info" style="background-color:#193769!important;"><!-- Add to Cart --> أضف الى الحقيبة  </button>
                                </td>

                                <td class="price-col">$<?php   echo $row['pro_sale_price'] ?></td>

                                <td class="product-col" colspan="2">
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

                                

                               

                                 
                                
                                <input type="hidden" id="w_id_<?php echo $row['w_id']   ?>" value="<?php   echo $row['w_id']   ?>" >                                            
                            </tr>

<?php } ?>



                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

                            <script>
                                $(document).ready(function(){
                                
                                $("#remove_btn_"+"<?php   echo $row['w_id']  ?>").click(function(){
                                    
                                    var w_id=$("#w_id_"+"<?php   echo $row['w_id']; ?>").val();
                                            

                                            $.post('<?php echo base_url()    ?>ajax/wishlistdelete',{w_id:w_id},function(data,status){

                                                if(status=='success')
                                                {
                                                    $("#remove_"+"<?php  echo $row['w_id'];  ?>").fadeOut("slow");
                                                }
                                            }); 
                                            
                                             $.post('<?php echo base_url()    ?>ajax/wishlistTopHide',{w_id:1},function(data,status){

                                                if(status=='success')
                                                {
                                                    $("#top_data").html(data);    
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

