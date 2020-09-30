<div class="sidemenu-overlay"></div><!-- End .sidemenu-overlay -->

<style type="text/css">
.max_width
{
max-width: 470px!important;
}
</style>            
<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">  
                <div class="page-header text-center">
                    <h1>My Account</h1>
                    <!--<p>Checkout Your </p>-->
                </div><!-- End .page-header -->

                <div class="checkout-tabs">
                    <!-- Nav tabs -->

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="settings">
                            <div class="tab-header">
                                <div class="radio-inline-container">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="checkout-option" checked data-target=".check-as-guest">
                                            <span class="check"></span>
                                            <span class="circle"></span>
                                            Profile
                                        </label>
                                    </div><!-- End .radio -->

                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="checkout-option"  data-target=".signup-form">
                                            <span class="check"></span>
                                            <span class="circle"></span>
                                            Password
                                        </label>
                                    </div><!-- End .radio -->

                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="checkout-option" data-target=".signin-form">
                                            <span class="check"></span>
                                            <span class="circle"></span>
                                            Shipping
                                        </label>
                                    </div><!-- End .radio -->
                                </div><!-- End .radio-inline-container -->
                            </div><!-- End .tab-header -->

                             <div class="check-as-guest target-area active max_width" >
                               
                                <div class="form-group">
                                    <label>First Name<sup class="text-danger">*</sup></label>
                                    <input type="text" id="fname" name="fname" value="<?php  echo $user_data['u_fname']   ?>" class="form-control" required>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label>Last Name<sup class="text-danger">*</sup></label>
                                    <input type="text" name="lname" id="lname" value="<?php  echo $user_data['u_lname']   ?>" class="form-control" required>
                                </div><!-- End .form-group --> 

                                <div class="form-group">
                                    <label>Phone<sup class="text-danger">*</sup></label>
                                    <input type="text" name="phone" id="phone" class="form-control" value="<?php  echo $user_data['u_phone']   ?>" required>
                                </div><!-- End .form-group --> 
                                
                                <div class="clearfix form-action" id="profile_result">
                                    
                                </div><!-- End .form-action -->


                                <div class="clearfix form-action">
                                    <input type="button" id="p_update" class="btn btn-primary pull-left min-width" value="UPDATE ">
                                </div><!-- End .form-action -->

                            </div><!-- End .check-as-guest -->


                            <form action="#" class="signup-form target-area max_width" >
                                <div class="form-group">
                                    <label>Old Password<sup class="text-danger">*</sup></label>
                                    <input type="password" class="form-control" id="opass" name="opass" required>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label>New Password<sup class="text-danger">*</sup></label>
                                    <input type="password" class="form-control" id="npass" name="npass" required>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label>Confirm Password <sup class="text-danger">*</sup></label>
                                    <input type="password" class="form-control" id="cpass" name="cpass" required>
                                </div><!-- End .form-group -->
                                
                                <div class="clearfix form-action" id="pass_result">
                                    
                                </div><!-- End .form-action -->
                                
                                <div class="clearfix form-action">
                                    <input type="button" class="btn btn-primary pull-left min-width" id="pass_update"  value="UPDATE">
                                </div><!-- End .form-action -->

                            </form>

                            <form action="#" class="signin-form target-area">
                                <div class="form-group">
                                    <label>Address<sup class="text-danger">*</sup></label>
                                    <textarea class="form-control" name="address" id="address"><?php  echo $user_data['u_address']     ?></textarea>
                                </div><!-- End .form-group -->
                                
                                
                                 <div class="form-group">
                                    <label>Country<sup class="text-danger">*</sup></label>
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
                                
                                <div class="form-group">
                                    <label>State<sup class="text-danger">*</sup></label>
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
                                
                                <div class="form-group">
                                    <label>City<sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control" value="<?php  echo $user_data['u_city']   ?>" id="city" name="city" required>
                                </div><!-- End .form-group -->
                                
                                <div class="form-group">
                                    <label>Pincode<sup class="text-danger">*</sup></label>
                                    <input type="text" value="<?php  echo $user_data['u_pincode']   ?>" id="pincode" name="pincode" class="form-control" required>
                                </div><!-- End .form-group -->
                                <div class="clearfix form-action" id="address_result">
                                
                                </div><!-- End .form-action -->
                                <div class="clearfix form-action">
                                    <input type="button" class="btn btn-primary pull-left min-width" id="add_update" name="add_update" value="UPDATE">
                                </div><!-- End .form-action -->
                            </form>
                            <div class="mb5"></div><!-- margin -->
                        </div><!-- End .tab-pane -->

                        <div role="tabpanel" class="tab-pane" id="wishlist">
                           

                            <form action="#" class="wishlist-card target-area active">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Name on Card<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" required>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Card number<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control form-with-icon" placeholder="0000-0000-0000-0000" required>

                                            <img src="<?php  echo base_url();  ?>assets/images/icon-input-card.png" alt="Card" class="form-icon">
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>CVV number<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control form-with-icon" required>
                                            <span class="form-icon">
                                                <img src="<?php  echo base_url();  ?>assets/images/icon-input-info.png" alt="Card">
                                            </span>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Exp. Month<sup class="text-danger">*</sup></label>
                                            <select class="form-control custom-select">
                                                <option value="Month">Month</option>
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                            </select>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Exp. Year<sup class="text-danger">*</sup></label>
                                            <select class="form-control custom-select">
                                                <option value="Year">Year</option>
                                                <option value="2017">2017</option>
                                                <option value="2018">2018</option>
                                            </select>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->
                                </div><!-- End .row -->

                                <div class="clearfix form-action">
                                    <div class="btn-wrap pull-right">
                                        <span class="btn-wishlist-info">$405.00</span>
                                        <input type="submit" class="btn btn-accent" value="Pay Now">
                                    </div><!-- End .btn-wrap -->
                                </div><!-- End .form-action -->
                            </form>

                            <div class="wishlist-paypal target-area">
                                <h3>Sorry Paypal is not available now.</h3>
                                <p>Please Try again later or use your credit card to pay.</p>
                            </div><!-- End .check-as-guest -->
                        </div><!-- End .tab-pane -->
                        <div role="tabpanel" class="tab-pane" id="orders">
                            <div class="checkout-confirm">
                                <img src="<?php  echo base_url();  ?>assets/images/okay.png" alt="Okay">
                                <h3>wishlist Complete</h3>
                                <h4>Thank you for your order</h4>
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
        <script src="<?php  echo base_url()  ?>assets/js/plugins.js"></script>
        <script src="<?php  echo base_url()  ?>assets/js/main.js"></script>
        
        
<script>
    $(document).ready(function(){
        $("#p_update").click(function(){
            // alert('Pk');
            var fname=$("#fname").val();
            var lname=$("#lname").val();
            var phone=$("#phone").val();
            $.post('<?php  echo base_url()  ?>Ajax/profile_update',{fname:fname,lname:lname,phone:phone},function(data,status){
                    $("#profile_result").html(data);
            });
        });
        
        $("#pass_update").click(function(){
            // alert('Pk');
            var opass=$("#opass").val();
            var npass=$("#npass").val();
            var cpass=$("#cpass").val();
            $.post('<?php  echo base_url()  ?>Ajax/password_update',{opass:opass,npass:npass,cpass:cpass},function(data,status){
                    $("#pass_result").html(data);
            });
        });
        
        $("#country_id").change(function(){
            var country_id=$("#country_id").val();
      
            $.post('<?php  echo base_url()  ?>Ajax/fetch_state',{country_id:country_id},function(data,status){
                    $("#state_id").html(data);
            });
        });
        
        $("#add_update").click(function(){
            // alert('Pk');
            var address=$("#address").val();
            var country_id=$("#country_id").val();
            var state_id=$("#state_id").val();
            var city=$("#city").val();
            var pincode=$("#pincode").val();

            $.post('<?php  echo base_url()  ?>Ajax/shipping_update',{address:address,country_id:country_id,state_id:state_id,city:city,pincode:pincode},function(data,status){
                    $("#address_result").html(data);
            });
        });
        
    });
</script>        