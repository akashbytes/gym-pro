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
                                <li role="presentation" class="active" ><a href="javascript:void(0);" aria-controls="shipping" role="tab" data-toggle="tab"><span>3</span>Shipping</a></li>
                                <li role="presentation"><a href="javascript:void(0);" aria-controls="payment" role="tab" data-toggle="tab"><span>4</span>Payment</a></li>
                                <li role="presentation"><a href="javascript:void(0);" aria-controls="confirmation" role="tab" data-toggle="tab"><span>5</span>Confirmation</a></li>
                            </ul>
<?php } else { ?>
                             <ul class="nav nav-tabs text-right" role="tablist">
                                <li role="presentation"><a href="javascript:void(0);" aria-controls="confirmation" role="tab" data-toggle="tab"><span>5</span>Confirmation</a></li>
                                <li role="presentation"><a href="javascript:void(0);" aria-controls="payment" role="tab" data-toggle="tab"><span>4</span>Payment</a></li>
                                <li role="presentation" class="active" ><a href="javascript:void(0);" aria-controls="shipping" role="tab" data-toggle="tab"><span>3</span>Shipping</a></li>
                                <li role="presentation"  ><a href="javascript:void(0);" aria-controls="account" role="tab" data-toggle="tab"><span>2</span>Account</a></li>                                
                                <li role="presentation" ><a href="javascript:void(0);" aria-controls="shipping" role="tab" data-toggle="tab"><span>1</span>Summery</a></li>                                
                            </ul>

         <?php } ?>
 
                            <!-- Tab panes -->
                    <div class="tab-content">


<?php if ($this->session->lang=="en") { ?>



                        <div role="tabpanel" class="tab-pane active" id="shipping">
                           
                            <div class="mb5"></div><!-- margin -->

                            <h3>SHIPPING ADDRESS</h3>
                            <hr>
                            <div class="mb15"></div><!-- margin -->
                            <?php
                            if($this->session->guest!='')
                            {
                                ?>
                            <form action="<?php   echo base_url();  ?>checkout/guestcheckout" method="post" class="billing-form">
                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Full Name*<sup  class="text-danger"><?php  echo form_error('g_fname')  ?></sup></label>
                                            <input type="text" class="form-control"  id="g_fname" value="<?php  echo set_value('g_fname')  ?>" name="g_fname" required>
                                    
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->
                                    
                                    
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Last Name* <sup  class="text-danger"><?php  echo form_error('g_lname')  ?></sup></label>
                                            <input type="text" class="form-control"  id="g_lname" value="<?php  echo set_value('g_lname')  ?>" name="g_lname" required>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->
                                    

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Phone*<sup  class="text-danger"><?php  echo form_error('g_phone')  ?></sup></label>
                                            <input type="text" class="form-control" id="g_phone" name="g_phone" value="<?php  echo set_value('g_phone')  ?>" required>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Email* <sup  class="text-danger"><?php  echo form_error('g_email')  ?></sup>   </label>
                                            <input type="text" class="form-control" name="g_email" id="g_email" value="<?php  echo set_value('g_email')  ?>" required>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->
                              
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Country* <sup  class="text-danger"><?php  echo form_error('country_id')  ?></sup></label>
                                            <select class="form-control" name="country_id" id="country_id">
                                        <option value="">-- Select Country --</option>
                                        <?php
                                        
                                        foreach($countries As $key1=>$row1){
                                            if($row1['country_id']==$_POST['country_id'])
                                            {
                                                ?>
                                                <option selected="" value="<?php  echo $row1['country_id']  ?>"><?php  echo $row1['country_name']  ?></option>
                                                <?php    
                                            }
                                            else
                                            {
                                                ?>
                                                <option value="<?php  echo $row1['country_id']  ?>"><?php  echo $row1['country_name']  ?></option>
                                                <?php    
                                            }
                                            
                                        }
                                            
                                        ?>

                                    </select>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>State*  <sup  class="text-danger"><?php  echo form_error('state_id')  ?></sup></label>
                                          <select class="form-control" name="state_id" id="state_id">
                                        <option value="">-- Select State --</option>
                                        <?php
                                        
                                        foreach($country_states As $key2=>$row2)
                                        {
                                           
                                            if($row2['st_id']==$_POST['state_id'])
                                            {
                                                    ?>
                                                     <option selected="" value="<?php  echo $row2['st_id']  ?>"><?php  echo $row2['state_name']  ?></option>
                                                    <?php    
                                            }
                                            else
                                            {
                                                 ?>
                                                  <option value="<?php  echo $row2['st_id']  ?>"><?php  echo $row2['state_name']  ?></option>
                                                 <?php  
                                            }
                                        }
                                            
                                        ?>
                                            </select>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->
                            </div><!-- End .row -->

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>City* <sup  class="text-danger"><?php  echo form_error('g_city')  ?></sup></label>
                                            <input type="text" class="form-control" name="g_city" id="g_city" value="<?php  echo set_value('g_city')  ?>" required>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Pincode*<sup  class="text-danger"><?php  echo form_error('g_pincode')  ?></sup></label>
                                            <input type="text" class="form-control" name="g_pincode" id="g_pincode" value="<?php  echo set_value('g_pincode')  ?>" required>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Address*<sup  class="text-danger"><?php  echo form_error('g_pincode')  ?></sup></label>
                                            <textarea  class="form-control" name="g_address" id="g_address"  required><?php  echo set_value('g_address')  ?></textarea>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->
                                </div><!-- End .row -->

                                <div class="clearfix form-action">
                                    

                                    <input type="submit" id="payment_btn" name="address_btn" class="btn btn-accent min-width pull-left" value="Proceed To Pay">
                                </div><!-- End .form-action -->
                            </form>
                                <?php
                            }
                            else
                            {
                                ?>
                             <form action="<?php  echo base_url()      ?>checkout/shipping_update" method="post" class="billing-form">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>First  Name*</label>
                                            <input type="text" class="form-control" name="fname"  id="fname" value="<?php  echo $user_data['u_fname'] ?>" required>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->
                                    
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Last Name*</label>
                                            <input type="text" class="form-control" name="lname"  id="lname" value="<?php  echo $user_data['u_lname'] ?>" required>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->
                                    
                                    

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Phone*</label>
                                            <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $user_data['u_phone']   ?>" required>
                                            <input type="hidden" class="form-control" name="email" id="email" value="<?php echo $user_data['u_email']   ?>" required>
                                            
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->

                                    
                                </div><!-- End .row -->

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Country*</label>
                                            <select class="form-control" name="country_id" id="country_id">
                                        <option value="">-- Select Country --</option>
                                        <?php
                                        
                                        foreach($countries As $key1=>$row1){
                                            if($row1['country_id']==$user_data['u_country'])
                                            {
                                                ?>
                                                <option selected="" value="<?php  echo $row1['country_id']  ?>"><?php  echo $row1['country_name']  ?></option>
                                                <?php    
                                            }
                                            else
                                            {
                                                ?>
                                                <option value="<?php  echo $row1['country_id']  ?>"><?php  echo $row1['country_name']  ?></option>
                                                <?php    
                                            }
                                            
                                        }
                                            
                                        ?>

                                    </select>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>State*</label>
                                          <select class="form-control" name="state_id" id="state_id">
                                        <option value="">-- Select State --</option>
                                        <?php
                                        
                                        foreach($country_states As $key2=>$row2){
                                           
                                            if($row2['st_id']==$user_data['u_state'])
                                            {
                                                    ?>
                                                     <option selected="" value="<?php  echo $row2['st_id']  ?>"><?php  echo $row2['state_name']  ?></option>
                                                    <?php    
                                            }
                                            else
                                            {
                                                 ?>
                                                  <option value="<?php  echo $row2['st_id']  ?>"><?php  echo $row2['state_name']  ?></option>
                                                 <?php  
                                            }
                                        }
                                            
                                        ?>
                                            </select>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>City*</label>
                                            <input type="text" class="form-control" id="city" name="city" value="<?php echo $user_data['u_city']   ?>" required>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label>Address*</label>
                                            <!--<input type="text" class="form-control" id="pincode" value="<?php echo $user_data['u_pincode']   ?>" required>-->
                                            <textarea class="form-control" name="address" id="address"><?php  echo $user_data['u_address']     ?></textarea>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Pincode*</label>
                                            <input type="text" class="form-control" name="pincode" id="pincode" value="<?php echo $user_data['u_pincode']   ?>" required>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->
                                    
                                </div><!-- End .row -->

                                <div class="clearfix form-action">
                                    

                                    <input type="submit" id="payment_btn" class="btn btn-accent min-width pull-left" value="Proceed To Pay">
                                </div><!-- End .form-action -->
                            </form>

                                <?php
                            }
                            ?>
                        
                        </div><!-- End .tab-pane -->



<?php } else { ?> <!-- -------------------------------------------------------------------------------------------------------------------------------- -->



                        <div role="tabpanel" class="tab-pane active" id="shipping">
                           
                            <div class="mb5"></div><!-- margin -->

                            <h3>SHIPPING ADDRESS AR</h3>
                            <hr>
                            <div class="mb15"></div><!-- margin -->
                            <?php
                            if($this->session->guest!='')
                            {
                                ?>
                            <form action="<?php   echo base_url();  ?>checkout/guestcheckout" method="post" class="billing-form">
                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Full Name*<sup  class="text-danger"><?php  echo form_error('g_fname')  ?></sup></label>
                                            <input type="text" class="form-control"  id="g_fname" value="<?php  echo set_value('g_fname')  ?>" name="g_fname" required>
                                    
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->
                                    
                                    
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Last Name* <sup  class="text-danger"><?php  echo form_error('g_lname')  ?></sup></label>
                                            <input type="text" class="form-control"  id="g_lname" value="<?php  echo set_value('g_lname')  ?>" name="g_lname" required>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->
                                    

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Phone*<sup  class="text-danger"><?php  echo form_error('g_phone')  ?></sup></label>
                                            <input type="text" class="form-control" id="g_phone" name="g_phone" value="<?php  echo set_value('g_phone')  ?>" required>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Email* <sup  class="text-danger"><?php  echo form_error('g_email')  ?></sup>   </label>
                                            <input type="text" class="form-control" name="g_email" id="g_email" value="<?php  echo set_value('g_email')  ?>" required>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->
                              
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Country* <sup  class="text-danger"><?php  echo form_error('country_id')  ?></sup></label>
                                            <select class="form-control" name="country_id" id="country_id">
                                        <option value="">-- Select Country --</option>
                                        <?php
                                        
                                        foreach($countries As $key1=>$row1){
                                            if($row1['country_id']==$_POST['country_id'])
                                            {
                                                ?>
                                                <option selected="" value="<?php  echo $row1['country_id']  ?>"><?php  echo $row1['country_name']  ?></option>
                                                <?php    
                                            }
                                            else
                                            {
                                                ?>
                                                <option value="<?php  echo $row1['country_id']  ?>"><?php  echo $row1['country_name']  ?></option>
                                                <?php    
                                            }
                                            
                                        }
                                            
                                        ?>

                                    </select>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>State*  <sup  class="text-danger"><?php  echo form_error('state_id')  ?></sup></label>
                                          <select class="form-control" name="state_id" id="state_id">
                                        <option value="">-- Select State --</option>
                                        <?php
                                        
                                        foreach($country_states As $key2=>$row2)
                                        {
                                           
                                            if($row2['st_id']==$_POST['state_id'])
                                            {
                                                    ?>
                                                     <option selected="" value="<?php  echo $row2['st_id']  ?>"><?php  echo $row2['state_name']  ?></option>
                                                    <?php    
                                            }
                                            else
                                            {
                                                 ?>
                                                  <option value="<?php  echo $row2['st_id']  ?>"><?php  echo $row2['state_name']  ?></option>
                                                 <?php  
                                            }
                                        }
                                            
                                        ?>
                                            </select>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->
                            </div><!-- End .row -->

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>City* <sup  class="text-danger"><?php  echo form_error('g_city')  ?></sup></label>
                                            <input type="text" class="form-control" name="g_city" id="g_city" value="<?php  echo set_value('g_city')  ?>" required>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Pincode*<sup  class="text-danger"><?php  echo form_error('g_pincode')  ?></sup></label>
                                            <input type="text" class="form-control" name="g_pincode" id="g_pincode" value="<?php  echo set_value('g_pincode')  ?>" required>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Address*<sup  class="text-danger"><?php  echo form_error('g_pincode')  ?></sup></label>
                                            <textarea  class="form-control" name="g_address" id="g_address"  required><?php  echo set_value('g_address')  ?></textarea>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->
                                </div><!-- End .row -->

                                <div class="clearfix form-action">
                                    

                                    <input type="submit" id="payment_btn" name="address_btn" class="btn btn-accent min-width pull-left" value="Proceed To Pay">
                                </div><!-- End .form-action -->
                            </form>
                                <?php
                            }
                            else
                            {
                                ?>
                             <form action="<?php  echo base_url()      ?>checkout/shipping_update" method="post" class="billing-form">
                                <div class="row">

                                     <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Phone*</label>
                                            <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $user_data['u_phone']   ?>" required>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Last Name*</label>
                                            <input type="text" class="form-control" name="lname"  id="lname" value="<?php  echo $user_data['u_lname'] ?>" required>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>First  Name*</label>
                                            <input type="text" class="form-control" name="fname"  id="fname" value="<?php  echo $user_data['u_fname'] ?>" required>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->
 
                                    
                                </div><!-- End .row -->

                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>City*</label>
                                            <input type="text" class="form-control" id="city" name="city" value="<?php echo $user_data['u_city']   ?>" required>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>State*</label>
                                          <select class="form-control" name="state_id" id="state_id">
                                        <option value="">-- Select State --</option>
                                        <?php
                                        
                                        foreach($country_states As $key2=>$row2){
                                           
                                            if($row2['st_id']==$user_data['u_state'])
                                            {
                                                    ?>
                                                     <option selected="" value="<?php  echo $row2['st_id']  ?>"><?php  echo $row2['state_name']  ?></option>
                                                    <?php    
                                            }
                                            else
                                            {
                                                 ?>
                                                  <option value="<?php  echo $row2['st_id']  ?>"><?php  echo $row2['state_name']  ?></option>
                                                 <?php  
                                            }
                                        }
                                            
                                        ?>
                                            </select>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Country*</label>
                                            <select class="form-control" name="country_id" id="country_id">
                                        <option value="">-- Select Country --</option>
                                        <?php
                                        
                                        foreach($countries As $key1=>$row1){
                                            if($row1['country_id']==$user_data['u_country'])
                                            {
                                                ?>
                                                <option selected="" value="<?php  echo $row1['country_id']  ?>"><?php  echo $row1['country_name']  ?></option>
                                                <?php    
                                            }
                                            else
                                            {
                                                ?>
                                                <option value="<?php  echo $row1['country_id']  ?>"><?php  echo $row1['country_name']  ?></option>
                                                <?php    
                                            }
                                            
                                        }
                                            
                                        ?>

                                    </select>
                                        </div><!-- End .form-group -->

                                        10
                                    </div><!-- End .col-sm-4 -->


                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Pincode*</label>
                                            <input type="text" class="form-control" name="pincode" id="pincode" value="<?php echo $user_data['u_pincode']   ?>" required>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->
                                
                                    
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label>Address*</label>
                                            <!--<input type="text" class="form-control" id="pincode" value="<?php echo $user_data['u_pincode']   ?>" required>-->
                                            <textarea class="form-control" name="address" id="address"><?php  echo $user_data['u_address']     ?></textarea>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->
                                    
                                    
                                </div><!-- End .row -->

                                <div class="clearfix form-action">
                                    

                                    <input type="submit" id="payment_btn" class="btn btn-accent min-width pull-right" value="Proceed To Pay">
                                </div><!-- End .form-action -->
                            </form>

                                <?php
                            }
                            ?>
                        
                        </div><!-- End .tab-pane -->



 <?php } ?>










                        
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
         $("#country_id").change(function(){
            var country_id=$("#country_id").val();
      
            $.post('<?php  echo base_url()  ?>Ajax/fetch_state',{country_id:country_id},function(data,status){
                    $("#state_id").html(data);
            });
        });
    });
</script>
