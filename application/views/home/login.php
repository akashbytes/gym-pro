    <div class="main">
                <div class="container">
                    <div class="row">


<?php if ($this->session->lang=="en") { ?>

 <div class="col-md-12">
    <div class="page-header text-center">	
        <h1>Sign in</h1>
        <p>Signin To Your Account</p>
    </div><!-- End .page-header -->

    <form action="<?php   echo base_url();  ?>home/loginaction" method="post" class="signin-form">
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
        <div class="form-group">
            <label>E-mail Address*</label>
            <input type="email" class="form-control" name="user" required>
        </div><!-- End .form-group -->

        <div class="form-group">
            <label>Password*</label>
            <input type="password" class="form-control" name="pass" required>
        </div><!-- End .form-group -->

        <div class="clearfix form-more">
            <div class="checkbox pull-left">
                <label>
                    <!--<input type="checkbox" name="remember">-->
                    <!--<span class="checkbox-box"><span class="check"></span></span>-->
                    <!--Remember Me-->
                </label>
            </div><!-- End .checkbox -->
            <a href="<?php  echo base_url();    ?>home/forget" class="help-link">LOST YOUR PASSWORD?</a>
        </div><!-- End .form-more -->

        <div class="clearfix form-action">
                <a href="<?php   echo base_url();  ?>home/signup" class="btn btn-primary pull-right min-width">CREATE ACCOUNT</a>
            <input type="submit" name="login" class="btn btn-accent pull-left min-width" value="SIGN IN">
        </div><!-- End .form-action -->
    </form>
</div><!-- End .col-md-9 -->

<?php } else { ?>

<div class="col-md-12">
    <div class="page-header text-center">
        <h1><!-- Sign in --> تسجيل دخول  </h1>
        <p>Signin To Your Account</p>
    </div><!-- End .page-header -->

    <form action="<?php   echo base_url();  ?>home/loginaction" method="post" class="signin-form">
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
        <div class="form-group">
            <label><!-- E-mail Address -->* البريد الإلكتروني  </label>
            <input type="email" class="form-control" name="user" required>
        </div><!-- End .form-group -->

        <div class="form-group">
            <label><!-- Password -->* كلمه المرور  </label>
            <input type="password" class="form-control" name="pass" required>
        </div><!-- End .form-group -->

        <div class="clearfix form-more">
            <a href="<?php  echo base_url();    ?>home/forget" class="help-link">LOST YOUR PASSWORD?</a>
            <div class="checkbox pull-right">
                <label>
                     Remember Me
                    <input type="checkbox" name="remember">
                    <span class="checkbox-box"><span class="check"></span></span>
                   
                </label>
            </div><!-- End .checkbox -->
            
        </div><!-- End .form-more -->

        <div class="clearfix form-action">
                <a href="<?php   echo base_url();  ?>home/signup" class="btn btn-primary pull-left min-width">CREATE AN ACCOUNT</a>
            <input type="submit" name="login" class="btn btn-accent pull-right min-width" value="تسجيل دخول  ">
        </div><!-- End .form-action -->
    </form>
</div><!-- End .col-md-9 -->


<?php } ?>





                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .main -->
                <a id="scroll-top" href="#top" title="Scroll top"><i class="fa fa-angle-up"></i></a>

        <!-- End -->

        <script src="<?php   echo base_url()  ?>assets/js/plugins.js"></script>
        <script src="<?php   echo base_url()  ?>assets/js/main.js"></script>    
        