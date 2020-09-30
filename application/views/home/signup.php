 <div class="main">
                <div class="container">
                    <div class="row">
                         
<?php if ($this->session->lang=="en") { ?>

                        <div class="col-md-8 col-md-offset-2">
                            <div class="page-header text-center">
                                <h1>Sign Up</h1>
                                <p>Create a New Account</p>
                            </div><!-- End .page-header -->
                            <form method="post" action="<?php echo base_url();   ?>home/signupaction" class="signup-form">
                                 <div class="row">
                                     <div class="col-sm-12">
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
                                     </div>
                                 </div>
                                <div class="row">
                                	<div class="col-sm-6">
                                		<div class="form-group">
		                                    <label>First Name*<span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo form_error('fname') ?></span></label>
		                                    <input type="text" name="fname" value="<?php  echo set_value('fname')  ?>" class="form-control" required>
		                                </div><!-- End .form-group -->
                                	</div><!-- End .col-sm-6 -->

                                	<div class="col-sm-6">
                                		<div class="form-group">
		                                    <label>Last Name*<span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo form_error('lname') ?></span></label>
		                                    <input type="text" name="lname" value="<?php  echo set_value('lname')  ?>" class="form-control" required>
		                                </div><!-- End .form-group -->
                                	</div><!-- End .col-sm-6 -->

                                	<div class="col-sm-6">
                                		<div class="form-group">
		                                    <label>Email*<span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo form_error('email') ?></span></label>
		                                    <input type="email" value="<?php  echo set_value('email')  ?>" name="email" class="form-control" required>
		                                </div><!-- End .form-group -->
                                	</div><!-- End .col-sm-6 -->
                                	<div class="col-sm-6">
                                		<div class="form-group">
		                                    <label>Phone*<span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo form_error('phone') ?></span></label>
		                                    <input type="text" name="phone" value="<?php  echo set_value('phone')  ?>" class="form-control" required>
		                                </div><!-- End .form-group -->
                                	</div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->
                                <div class="row">
                                	<div class="col-sm-6">
                                		<div class="form-group">
		                                    <label>Password*<span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo form_error('pass') ?></span></label>
		                                    <input type="password" name="pass" class="form-control" required>
		                                </div><!-- End .form-group -->
                                	</div><!-- End .col-sm-6 -->
                                    <div class="col-sm-6">
                                		<div class="form-group">
		                                    <label>Confirm Password*<span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo form_error('cpass') ?></span></label>
		                                    <input type="password" name="cpass" class="form-control" required>
		                                </div><!-- End .form-group -->
                                	</div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->
                                <div class="clearfix form-action">
                                    <input type="submit" name="login" class="btn btn-primary min-width" value="SIGN UP">
                                </div><!-- End .form-action -->
                            </form>
                        </div><!-- End .col-md-8 -->



<?php } else { ?>


                        <div class="col-md-8 col-md-offset-2">
                            <div class="page-header text-center">
                                <h1>Sign Up</h1>
                                <p>Create a New Account</p>
                            </div><!-- End .page-header -->
                            <form method="post" action="<?php echo base_url();   ?>home/signupaction" class="signup-form">
                                 <div class="row">
                                     <div class="col-sm-12">
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
                                     </div>
                                 </div>
                                <div class="row">


                                        <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label><!-- Last Name -->* الاسم الاخير  <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo form_error('lname') ?></span></label>
                                                    <input type="text" name="lname" value="<?php  echo set_value('lname')  ?>" class="form-control" required>
                                                </div><!-- End .form-group -->
                                        </div><!-- End .col-sm-6 -->


                                        <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label><!-- First Name -->* الاسم الاول  <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo form_error('fname') ?></span></label>
                                                    <input type="text" name="fname" value="<?php  echo set_value('fname')  ?>" class="form-control" required>
                                                </div><!-- End .form-group -->
                                        </div><!-- End .col-sm-6 -->                                        

                                        
                                        <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label><!-- Phone -->* هاتف  <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo form_error('phone') ?></span></label>
                                                    <input type="text" name="phone" value="<?php  echo set_value('phone')  ?>" class="form-control" required>
                                                </div><!-- End .form-group -->
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label><!-- Email -->* البريد الإلكتروني  <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo form_error('email') ?></span></label>
                                                    <input type="email" value="<?php  echo set_value('email')  ?>" name="email" class="form-control" required>
                                                </div><!-- End .form-group -->
                                        </div><!-- End .col-sm-6 -->


                                </div><!-- End .row -->
                                <div class="row">
                                        <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label><!-- Confirm Password -->* تأكيد كلمة المرور  <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo form_error('cpass') ?></span></label>
                                                    <input type="password" name="cpass" class="form-control" required>
                                                </div><!-- End .form-group -->
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label><!-- Password -->* كلمه المرور  <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo form_error('pass') ?></span></label>
                                                    <input type="password" name="pass" class="form-control" required>
                                                </div><!-- End .form-group -->
                                        </div><!-- End .col-sm-6 -->
                                    
                                </div><!-- End .row -->
                                <div class="clearfix form-action">
                                    <input type="submit" name="login" class="btn btn-primary pull-left min-width" value="SIGN UP">
                                </div><!-- End .form-action -->
                            </form>
                        </div><!-- End .col-md-8 -->


<?php } ?>

 
                        <div class="col-md-2">
                        </div>
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .main -->
            <a id="scroll-top" href="#top" title="Scroll top"><i class="fa fa-angle-up"></i></a>

        <!-- End -->

        <script src="<?php   echo base_url()  ?>assets/js/plugins.js"></script>
        <script src="<?php   echo base_url()  ?>assets/js/main.js"></script>    
        