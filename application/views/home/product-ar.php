<?php

foreach($product AS $key=>$row)
{
    
}


?>
 <style type="text/css">
 .z_index {z-index:0!important;}
.xzoom-lens img,.xzoom-preview img,.xzoom-source img{display:block;max-width:none;max-height:none}
.xzoom-container{display:inline-block}
.xzoom-thumbs{text-align:center;margin-bottom:10px}
.xzoom{-webkit-box-shadow:0 0 5px 0 rgba(0,0,0,.5);-moz-box-shadow:0 0 5px 0 rgba(0,0,0,.5);box-shadow:0 0 5px 0 rgba(0,0,0,.5);margin-bottom:15px;width:100%!important}
.xzoom2,.xzoom3,.xzoom4,.xzoom5{-webkit-box-shadow:0 0 5px 0 rgba(0,0,0,.5);-moz-box-shadow:0 0 5px 0 rgba(0,0,0,.5);box-shadow:0 0 5px 0 rgba(0,0,0,.5);margin-bottom:15px}
.xzoom-lens,.xzoom-preview{box-shadow:0 0 10px rgba(0,0,0,.5)}
.xzoom-gallery,.xzoom-gallery2,.xzoom-gallery3,.xzoom-gallery4,.xzoom-gallery5{border:1px solid #cecece;margin-left:5px;margin-bottom:10px}
.xzoom-hidden,.xzoom-source{display:block;position:static;float:none;clear:both}
.xzoom-hidden{overflow:hidden}
.xzoom-preview{border:1px solid #888;background:#2f4f4f}
.xzoom-lens{border:1px solid #555;cursor:crosshair}
.xzoom-loading{background:url(../images/loader.gif) no-repeat;width:40px;height:40px}
.xactive{border:1px solid #deb75a}
.xzoom-caption{position:absolute;bottom:-43px;left:0;background:#000;width:100%;text-align:left}
.xzoom-caption span{color:#fff;font-family:Arial,sans-serif;display:block;font-size:.75em;font-weight:700;padding:10px}

.product-details .product-title{margin: 0 0 10px}

.margin_70
{
    margin-top:40px!important;
}
 </style>


 <script src="<?php  echo base_url();  ?>zoom/jquery2.js"></script>
<script type="text/javascript" src="<?php  echo base_url();  ?>zoom/xzoom.min.js"></script>
            
            <div class="main margin_70">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">

                           <div class="col-sm-7">
                                <div class="product-details">
                                    <h2 class="product-title"><?php    echo $row['pro_title']      ?></h2>
                                    
                                    <div class="product-meta-row">

                                        <div class="product-ratings-wrapper">
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .ratings-container -->
                                            <!--<a class="ratings-link" href="#reviews" title="Reviews">30 Reviews</a>-->
                                        </div><!-- End .product-ratings-wrapper -->

                                        <div class="product-price-container">
                                        	<del><span><?php   echo $row['pro_price']."$"."&nbsp;"  ?></span></del>

                                            <span class="product-price"><?php   echo $row['pro_sale_price']."$"  ?></span>                                            
                                        </div><!-- Endd .product-price-container -->

                                    </div><!-- End .product-meta-row -->
                                    <div class="product-content">
                                        <p><?php     echo $row['pro_sort_desc'];    ?></p>
                                    </div><!-- End .product-content -->

                                    <ul class="product-meta-list">
                                        <li><span class="product-stock"><?php   if($row['pro_quantity']<5){ echo "Out Of Stock"; }else{ echo "In Stock"; } ?></span> <label>: Availability</label> </li>
                                        
                                    </ul>
                                      <?php
                                    $colors=explode('/',$row['pro_color']);
 
                                    ?>
                                  	 <div class="clearfix"></div>

                                    <label style="float: right;margin-top: 5px">&nbsp; : Color</label>
                                    <ul class="filter-color-list pull-right">
                                        <?php
                                        
                                        $count=count($colors);
                                        
                                        for($i=0;$i<$count;$i++)
                                        {
                                            ?>
                                        <li 
                                        
                                        
                                        
                                        >
                                            <span class="filter-color" id="color_<?php    echo $i      ?>" style="background-color: <?php   echo $colors[$i]  ?>;"></span>
                                        </li> 

                                        <script>
                                            $(document).ready(function(){
                                                $("#color_<?php  echo $i       ?>").click(function(){
                                                    var total=<?php    echo $count     ?>;
                                                    // alert(total);
                                                    for(j=0;j<total;j++)
                                                    {
                                                        $("#color_"+j+"").css("border","0px");
                                                        
                                                    }
                                                    $("#color_<?php  echo $i       ?>").css("border","1px solid black");
                                                    // alert('s');
                                                     var color='<?php   echo $colors[$i]  ?>';
                                                    // alert(color);
                                                    $("#color").val(color);
                                                });

                                            });
                                        </script>
                                            <?php
                                        }
                                        
                                        
                                        
                                        ?>

                                  	 </ul> 

                                  	 <div class="clearfix"></div>
                                    
                                    <input type="hidden" name="price" id="price" value="<?php   echo $row['pro_sale_price']   ?>"  />
                                                                        <input type="hidden" name="color" id="color" value="0"  />
                                    <span id="msg"></span>
                                    <div class="product-action">

                                    	<a href="javascript:void(0);" onclick="add_to_cart(this.id)" id="<?php  echo $row['pro_id']  ?>" class="btn btn-accent btn-addtobag z_index">Add to Bag</a>

                                        <div class="product-quantity z_index">
                                            <label>QTY:</label>
                                            <input class="single-product-quantity form-control" onchange="check_qty()"  id="qty" min="1" type="text">
                                        </div><!-- end .product-quantity -->
										

                                    </div><!-- End .product-action -->
                                    <div class="clearfix" style="clear: both;"></div>
                                        <br />
                                          <button class="btn " id="<?php echo $row['pro_id']   ?>"   onclick="wishlistadd(this.id)"  ><b>Add to wishlist</b></button>
                                </div><!-- End .product-details -->
                            </div>

                                <div class="col-sm-5">
                                        <?php   
                                        $images=explode('/', $row['pro_gallery_image']);
                                        // print_r($images);
                                        $count=count($images);
                                        // dei();
                                        ?>
                                         <div class="xzoom-container"> <img class="xzoom" id="xzoom-default" src="<?php echo base_url();    ?>images/<?php echo $row['pro_feat_image']?>" xoriginal="<?php echo base_url();    ?>images/<?php echo $row['pro_feat_image']?>" />
                                          <div class="xzoom-thumbs"> 
                                           <a href="<?php echo base_url();    ?>images/<?php echo $row['pro_feat_image']?>"><img class="xzoom-gallery" width="80" src="<?php echo base_url();    ?>images/<?php echo $row['pro_feat_image']?>"  xpreview="<?php echo base_url();    ?>images/<?php echo $row['pro_feat_image']?>" title=""></a>
                                           <?php
                                            for ($i=0; $i < $count ; $i++) 
                                            { 
                                                if ($images[$i]!="") 
                                                {
                                                ?>
                                                   <a href="<?php echo base_url();    ?>images/<?php  echo $images[$i];  ?>">
                                                    <img class="xzoom-gallery" width="80" src="<?php echo base_url();    ?>images/<?php  echo $images[$i];  ?>"  xpreview="<?php echo base_url();    ?>images/<?php  echo $images[$i];  ?>" title="">
                                                    </a>
                                                <?php
                                                }
                                            }
                                                ?>
                                       </div>
                                    </div>
                                </div>
 
                            </div><!-- End .row -->

                            <br>
                            <br>

                            <div class="product-details-tab pdt">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">Description</a></li>
                                   
                                    <li role="presentation"><a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab">Reviews</a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="description">
                                            <?php
                                                
                                                
                                            echo $row['pro_full_desc'];        
                                            
                                                
                                            ?>
                                    </div><!-- End .tab-pane -->


                                    
                                    <div role="tabpanel" class="tab-pane" id="reviews">
                                        <div class="product-reviews comments">
                                            <ul class="comments-list media-list">
                                                <li class="media">
                                                    <div class="comment">
                                                        
                                                        <div class="media-body">                                    
                                                            <div class="ratings-container">
                                                                <div class="product-ratings">
                                                                    <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                                </div><!-- End .product-ratings -->
                                                            </div><!-- End .ratings-container -->
                                                            <h4 class="media-heading">Mathew joseph</h4>

                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mollis laoreet cursus. Cras nec condimentum dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mollis laoreet cursus. Cras nec condimentum dolor.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mollis laoreet cursus. Cras nec condimentum dolor.</p>
                                                        </div><!-- End .media-body -->

                                                        <div class="media-left">
                                                            <img class="media-object" src="<?php   echo base_url()  ?>assets/images/blog/user.png" alt="User">
                                                        </div><!-- End .media-left -->

                                                    </div><!-- End .comment -->
                                                </li>
                                            </ul>
                                        </div><!-- End .comments -->
                                                                                <?php
                                        
                                        if($this->session->u_id!="" && $can_review=="1")
                                        {
                                            ?>
                                            
                                        <div class="review-form-container">
                                            <h3>LEAVE A REVIEW</h3>
                                            <form id="review_form" method="post">
                                                <label>Your Rating*</label>
                                                <div class="form-group clearfix">
                                                    <fieldset class="rate-field">
                                                        <input type="radio" id="star5" name="rating" value="5">
                                                        <label for="star5" title="5 stars"></label>

                                                        <input type="radio" id="star4" name="rating" value="4" checked>
                                                        <label for="star4" title="4 stars"></label>

                                                        <input type="radio" id="star3" name="rating" value="3">
                                                        <label for="star3" title="3 stars"></label>

                                                        <input type="radio" id="star2" name="rating" value="2">
                                                        <label for="star2" title="2 stars"></label>

                                                        <input type="radio" id="star1" name="rating" value="1">
                                                        <label for="star1" title="1 star"></label>
                                                    </fieldset>
                                                </div><!-- End .form-group -->
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Name*</label>
                                                            <input type="text" name="name" class="form-control" required>
                                                        </div><!-- End .form-group -->
                                                    </div><!-- End .col-sm-6 -->
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Phone No adddress</label>
                                                            <input name="phone" type="text" class="form-control" required>
                                                        </div><!-- End .form-group -->
                                                    </div><!-- End .col-sm-6 -->
                                                </div><!-- End .row -->

                                                <div class="form-group mb20">
                                                    <label>Your Review*</label>
                                                    <textarea cols="30" rows="5" name="desc" class="form-control"></textarea>
                                                </div>

                                                <div class="text-right">
                                                    <input type="submit" class="btn btn-accent min-width" value="Submit">
                                                </div><!-- End .text-right -->
                                            </form>
                                            
                                        </div><!-- End #respond -->
                                        <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <h3>You must loggedin and purchased this product  to give review</h3>
                                            
                                            <?php
                                        }
                                        
                                        ?>

                                    </div><!-- End .tab-pane -->
                                </div>
                            </div><!-- End .product-details-tab -->

                            <hr>
                            
                            <h3 class="carousel-title">Related Product</h3>
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
                                        <a href="<?php  echo base_url();   ?>home/product/<?php  echo ucfirst($row['pro_url']);   ?>"><?php  echo substr($row['pro_title'],0,35)."...";   ?></a>
                                    </h3>
                                    <div class="product-price-container">
                                        <span class="product-price"><?php  echo $row['pro_sale_price'];   ?> $</span>
                                    </div><!-- Endd .product-price-container -->
                                </div><!-- End .product -->
                                    <?php
                                }
                                ?>  
                                

                               

                                

                                

                               
                            </div><!-- End .owl-data-carousel -->

                            <div class="mb50"></div><!-- margin -->
                        </div><!-- End .col-md-9 -->

                       
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .main -->
        <script src="<?php   echo base_url()  ?>assets/js/plugins.js"></script>
        <script src="<?php   echo base_url()  ?>assets/js/xzoom.min.js"></script>
        <script src="<?php   echo base_url()  ?>assets/js/main.js"></script>            
                <script>
            function check_qty()
            {
                var qty = $("#qty").val();
                if(qty<=0)
                {
                    $("#qty").val(1);
                }
            }
            function add_to_cart(id)
            {
                var qty=$("#qty").val();
                var price=$("#price").val();
                var color=$("#color").val();
                if(color==0)
                {
                        $("#msg").html('<div class="alert alert-danger">Please Select Color  </div>');
                    
                }
                else
                {
                    $("#msg").html('<div class="alert alert-warning">Please Wait..  </div>');
                $.post('<?php  echo base_url();  ?>ajax/cartadd',{id:id,qty,qty,price:price,color:color},function(data,status){
                    
                    $("#msg").html(data);
                    
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
            
                $("#add_to_cart").hide(500);    
                }
                
            
            }
            
        </script>
        <script type="text/javascript">
  

$(document).ready(function () {
    
  setInterval(function () {
      $('#add_to_cart').hide();
      // alert('');
  }, 5000);
});

</script>
