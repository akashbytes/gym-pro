    <div class="main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-header text-center">
                                <h1>Cancel Order</h1>
                                <!--<p>Signin To Your Account</p>-->
                            </div><!-- End .page-header -->

                            <form action="<?php   echo base_url();  ?>home/ordercancelaction" method="post" class="signin-form">
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
                                    <label>Please describe the reason to cancel the order *</label>
                                    <!--<input type="email" class="form-control" name="user" required>-->
                                    <textarea class="form-control" name="desc" required placeholder="Cancel Description"></textarea>
                                    <input type="hidden" name="order_id" value="<?php echo $this->uri->segment(3);     ?>"  />
                                </div><!-- End .form-group -->

                                <div class="clearfix form-action">
                                        <!--<a href="<?php   echo base_url();  ?>home/signup" class="btn btn-primary pull-right min-width">CREATE ACCOUNT</a>-->
                                    <input type="submit" name="cancel" class="btn btn-accent pull-left min-width" value="Cancel My Order">
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
        