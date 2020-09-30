    <div class="main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 max_height">
                            <div class="page-header text-center">
                                <h1>Forget Password</h1>
                                <p>Enter your email id to create new password</p>
                            </div><!-- End .page-header -->

                            <form  method="post" class="signin-form">
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
                                    <input type="email" class="form-control" name="email" id="email" required>
                                </div><!-- End .form-group -->
                                <div class="form-group" id="mssg">
                                </div><!-- End .form-group -->
                                


                                <div class="clearfix form-action">
                                        <!--<a href="<?php   echo base_url();  ?>home/signup" class="btn btn-primary pull-right min-width">CREATE ACCOUNT</a>-->
                                    <input type="button" id="forget_btn" name="forget_btn" class="btn btn-accent pull-left min-width ddd" value="SUBMIT">
                                </div><!-- End .form-action -->
                            </form>
                        </div><!-- End .col-md-9 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .main -->
                <a id="scroll-top" href="#top" title="Scroll top"><i class="fa fa-angle-up"></i></a>

        <!-- End -->

        <script src="<?php   echo base_url()  ?>assets/js/plugins.js"></script>
        <script src="<?php   echo base_url()  ?>assets/js/main.js"></script>    
        <style>
            .max_height
            {
                min-height:500px;
            }
            .ddd
            {
                width:100%!important;
            }
        </style>
        <script>
            $(document).ready(function(){
                $("#forget_btn").click(function(){
                                                    $("#forget_btn").attr("disabled","disabled");
                                                    $("#mssg").html('<div class="alert alert-warning">Please wait...</div>');
                    var email=$("#email").val();
                    $.post('<?php  echo base_url();      ?>Ajax/forget_email',{email:email},function(data,status){
                            $("#mssg").html(data);
                            // alert(data);
                            if(status=='success')
                            {
                                $("#forget_btn").removeAttr("disabled","disabled");
                            }
                    });
                });
            });
        </script>
        