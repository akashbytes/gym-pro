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
                                <li role="presentation" class="active" ><a href="javascript:void(0);" aria-controls="account" role="tab" data-toggle="tab"><span>2</span>Account</a></li>
                                <li role="presentation"><a href="javascript:void(0);" aria-controls="shipping" role="tab" data-toggle="tab"><span>3</span>Shipping</a></li>
                                <li role="presentation"><a href="javascript:void(0);" aria-controls="payment" role="tab" data-toggle="tab"><span>4</span>Payment</a></li>
                                <li role="presentation"><a href="javascript:void(0);" aria-controls="confirmation" role="tab" data-toggle="tab"><span>5</span>Confirmation</a></li>
                            </ul>
<?php } else { ?>
                            <ul class="nav nav-tabs text-right" role="tablist">
                                <li role="presentation" ><a href="javascript:void(0);" aria-controls="shipping" role="tab" data-toggle="tab"><span>1</span>Summery</a></li>
                                <li role="presentation" class="active" ><a href="javascript:void(0);" aria-controls="account" role="tab" data-toggle="tab"><span>2</span>Account</a></li>
                                <li role="presentation"><a href="javascript:void(0);" aria-controls="shipping" role="tab" data-toggle="tab"><span>3</span>Shipping</a></li>
                                <li role="presentation"><a href="javascript:void(0);" aria-controls="payment" role="tab" data-toggle="tab"><span>4</span>Payment</a></li>
                                <li role="presentation"><a href="javascript:void(0);" aria-controls="confirmation" role="tab" data-toggle="tab"><span>5</span>Confirmation</a></li>
                            </ul>

        <?php } ?>

                            <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="shipping">


                

<?php if ($this->session->lang=="en") { ?>


                            <div class="tab-header">
                              
                                <div class="radio-inline-container">
                                      <h4>Check As:</h4>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="checkout-option" id="guest_checkout"  data-target=".check-as-guest">
                                            <span class="check"></span>
                                            <span class="circle"></span>
                                            Check out as Guest
                                        </label>
                                    </div><!-- End .radio -->

                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="checkout-option" id="register" checked data-target=".signup-form">
                                            <span class="check"></span>
                                            <span class="circle"></span>
                                            Register
                                        </label>
                                    </div><!-- End .radio -->

                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="checkout-option" id="login" data-target=".signin-form">
                                            <span class="check"></span>
                                            <span class="circle"></span>
                                            Login
                                        </label>
                                    </div><!-- End .radio -->
                                </div><!-- End .radio-inline-container -->
                            </div><!-- End .tab-header -->

                            <div class="check-as-guest target-area">
                                <h3>Continue as a guest.</h3>
                                <p>Skip this step and move down to below to continue to checkout.</p>
                                <div class="form-group" id="guest_msg">
                                </div><!-- End .form-group -->
                              <input type="button" class="btn btn-primary min-width" id="guest_btn" value="Guest Checkout">
                           
                            </div><!-- End .check-as-guest -->


                            <form action="<?php  echo base_url();  ?>checkout/register" method="post" class="signup-form target-area active">
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
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>First Name*<span class="text-danger"><?php   echo form_error('fname')  ?></span></label>
                                            <input type="text" class="form-control" id="fname" value="<?php  echo set_value('fname')   ?>" name="fname" required>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Last Name*<span class="text-danger"><?php   echo form_error('lname')  ?></span></label>
                                            <input type="text" class="form-control" id="lname" value="<?php  echo set_value('lname')   ?>" name="lname" required>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Email*<span class="text-danger"><?php   echo form_error('email')  ?></span></label>
                                            <input type="email" class="form-control" id="email" value="<?php  echo set_value('email')   ?>" name="email" required>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->
                                </div><!-- End .row -->

                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Phone*<span class="text-danger"><?php   echo form_error('phone')  ?></span></label>
                                            <input type="text" class="form-control" id="phone" name="phone" value="<?php  echo set_value('phone')   ?>" required>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->

                                    
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Password*<span class="text-danger"><?php   echo form_error('pass')  ?></span></label>
                                            <input type="password" class="form-control" id="pass" name="pass"  required>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->

                                    
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Confirm Password*<span class="text-danger"><?php   echo form_error('cpass')  ?></span></label>
                                            <input type="password" class="form-control" id="cpass" name="cpass"  required>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->
                                    
                                    

                                </div><!-- End .row -->

                                <div class="clearfix form-action">
                                    <input type="submit" class="btn btn-primary min-width" id="bt" name="submit" value="SIGN UP">
                                </div><!-- End .form-action -->
                            </form>



                            <form action="<?php  echo base_url()  ?>checkout/login" class="signin-form target-area">
                                <div class="form-group">
                                    <label>E-mail Address*</label>
                                    <input type="email" class="form-control" name="user_id" id="user_id" required>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label>Password*</label>
                                    <input type="password" class="form-control" name="user_pass" id="user_pass" required>
                                </div><!-- End .form-group -->

                                <div class="clearfix form-more mb20">
                                    <div class="checkbox pull-left">
                                       
                                    </div><!-- End .checkbox -->
                                    <a href="<?php  echo base_url()  ?>home/forget" target="_blank" class="help-link">LOST YOUR PASSWORD?</a>
                                </div><!-- End .form-more -->
                                <div class="form-group" id="login_msg">
                                </div><!-- End .form-group -->

                                <div class="clearfix form-action">
                                    <input type="button" class="btn btn-primary pull-left min-width" name="login_btn" id="login_btn" value="SIGN IN">
                                </div><!-- End .form-action -->
                            </form>


<?php } else { ?>


                            <div class="tab-header ">
                                
                                <div class="pull-right" style="width: 100%;">
                                    <div class="radio-inline-container ">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="checkout-option" id="login" data-target=".signin-form">
                                            <span class="check"></span>
                                            <span class="circle"></span>
                                            Login
                                        </label>
                                    </div><!-- End .radio -->
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="checkout-option" id="register" checked data-target=".signup-form">
                                            <span class="check"></span>
                                            <span class="circle"></span>
                                            Register
                                        </label>
                                    </div><!-- End .radio -->
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="checkout-option" id="guest_checkout"  data-target=".check-as-guest">
                                            <span class="check"></span>
                                            <span class="circle"></span>
                                            Check out as Guest
                                        </label>
                                    </div><!-- End .radio -->
   <h4>Check As: ar</h4>
                                </div><!-- End .radio-inline-container -->
                                
                                </div>
                            </div><!-- End .tab-header -->


                            <div class="clearfix"></div>

                            <div class="check-as-guest target-area">
                                <h3>Continue as a guest.</h3>
                                <p>Skip this step and move down to below to continue to checkout.</p>
                                <div class="form-group" id="guest_msg">
                                </div><!-- End .form-group -->
                              <input type="button" class="btn btn-primary min-width" id="guest_btn" value="Guest Checkout">
                           
                            </div><!-- End .check-as-guest -->




                             <form action="<?php  echo base_url();  ?>checkout/register" method="post" class="signup-form target-area active">
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
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Email*<span class="text-danger"><?php   echo form_error('email')  ?></span></label>
                                            <input type="email" class="form-control" id="email" value="<?php  echo set_value('email')   ?>" name="email" required>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Last Name*<span class="text-danger"><?php   echo form_error('lname')  ?></span></label>
                                            <input type="text" class="form-control" id="lname" value="<?php  echo set_value('lname')   ?>" name="lname" required>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>First Name*<span class="text-danger"><?php   echo form_error('fname')  ?></span></label>
                                            <input type="text" class="form-control" id="fname" value="<?php  echo set_value('fname')   ?>" name="fname" required>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->                

                                    
                                </div><!-- End .row -->

                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Confirm Password*<span class="text-danger"><?php   echo form_error('cpass')  ?></span></label>
                                            <input type="password" class="form-control" id="cpass" name="cpass"  required>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Password*<span class="text-danger"><?php   echo form_error('pass')  ?></span></label>
                                            <input type="password" class="form-control" id="pass" name="pass"  required>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Phone*<span class="text-danger"><?php   echo form_error('phone')  ?></span></label>
                                            <input type="text" class="form-control" id="phone" name="phone" value="<?php  echo set_value('phone')   ?>" required>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-4 -->
 
                                </div><!-- End .row -->

                                <div class="clearfix form-action">
                                    <input type="submit" class="btn btn-primary min-width" id="bt" name="submit" value="SIGN UP">
                                </div><!-- End .form-action -->
                            </form>


                            <form action="<?php  echo base_url()  ?>checkout/login" class="signin-form target-area">
                                <div class="form-group">
                                    <label>E-mail Address*</label>
                                    <input type="email" class="form-control" name="user_id" id="user_id" required>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label>Password*</label>
                                    <input type="password" class="form-control" name="user_pass" id="user_pass" required>
                                </div><!-- End .form-group -->

                                <div class="clearfix form-more mb20">
                                    <div class="checkbox pull-left">
                                       
                                    </div><!-- End .checkbox -->
                                    <a href="<?php  echo base_url()  ?>home/forget" target="_blank" class="help-link">LOST YOUR PASSWORD?</a>
                                </div><!-- End .form-more -->
                                <div class="form-group" id="login_msg">
                                </div><!-- End .form-group -->

                                <div class="clearfix form-action">
                                    <input type="button" class="btn btn-primary pull-left min-width" name="login_btn" id="login_btn" value="SIGN IN">
                                </div><!-- End .form-action -->
                            </form>


<?php } ?>












                            

                           
                           
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#guest_btn").click(function(data,status){
            // alert('Guest');
            $.post('<?php   echo base_url();  ?>checkout/guest',{id:1},function(data,status){
                    $("#guest_msg").html(data);
                    // alert(status);
                });
            
        });

        $("#login_btn").click(function(data,status){
            // alert('loginee');
            var user_id=$("#user_id").val();
            var user_pass=$("#user_pass").val();
            
                $.post('<?php   echo base_url();  ?>checkout/login',{user_id:user_id,user_pass:user_pass},function(data,status){
                    $("#login_msg").html(data);
                    // alert(status);
                });
        });

        $("#register_btn").click(function(data,status){
            var fname=$("#n_fname").val();
            var lname=$("#n_lname").val();
            var email=$("#n_email").val();
            var phone=$("#n_phone").val();
            var pass=$("#n_pass").val();
            var cpass=$("#n_cpass").val();
                
                $.post('<?php  echo base_url();  ?>checkout/register',{fname:fname,lname:lname,email:email,phone:phone,pass:pass,cpass:cpass},function(data,status){
                    $("#mssg2").html(data);    
                });
            
        });
        
    });
</script>





