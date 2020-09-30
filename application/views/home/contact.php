        <div class="sidemenu-overlay"></div>
            <!-- End .sidemenu-overlay -->
            <div class="main">
                <div class="container">
                    <div class="row">

<?php  if ($this->session->lang=="en") { ?>

                        <div class="col-md-12">
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
                            <div class="page-header text-center">
                                <h1>Contact Us</h1>
                                <p>Check Out How to Contact Us</p>
                            </div><!-- End .page-header -->

                            <div class="mb20"></div><!-- margin -->

                            <div class="row">
                                <div class="col-sm-4">
                                    
                                    <div class="contact-info-box">
                                        <img src="<?php  echo base_url()  ?>assets/images/icon-pin.png" alt="Pin">
                                        <h3>Address</h3>

                                        <address>
                                           <?php   echo $contact['c_address']     ?>
                                        </address>
                                    </div><!-- End .contact-info-box -->
                                </div><!-- End .col-sm-4 -->
                                <div class="col-sm-4">
                                    <div class="contact-info-box">
                                        <img src="<?php  echo base_url()  ?>assets/images/icon-mobile.png" alt="Pin">
                                        <h3>
                                            Phone
                                        </h3>
                                        <?php   echo $contact['c_phone']     ?>
                                    </div><!-- End .contact-info-box -->
                                </div><!-- End .col-sm-4 -->
                                <div class="col-sm-4">
                                    <div class="contact-info-box">
                                        <img src="<?php  echo base_url()  ?>assets/images/icon-email.png" alt="Pin">
                                        <h3>Email</h3>
                                        <?php   echo $contact['c_email']     ?>
                                    </div><!-- End .contact-info-box -->
                                </div><!-- End .col-sm-4 -->
                            </div><!-- End .row -->

                            <div class="mb35 mb20-sm mb10-xs"></div><!-- margin -->

                            <div class="title-group text-center">
                                <h2 class="title">Send a Message</h2>
                                <p class="title-desc">Send Us a Message</p>
                            </div><!-- End .title-group -->

                            <form action="<?php echo base_url();   ?>home/contact/sent" method="post"  class="contact-form" id="contact_form">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Name  *</label>
                                            <input type="text" name="name" id="name" class="form-control" value="<?php echo set_value('name')  ?>" required>
                                                <span class="text-danger"><?php echo form_error('name');  ?></span>
                                        </div><!-- End .form-group -->


                                        <div class="form-group">
                                            <label>Email*</label>
                                            <input type="email" name="email" id="email" class="form-control" value="<?php echo set_value('email');  ?>" required>
                                            <span class="text-danger"><?php echo form_error('email');  ?></span>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label>Phone*</label>
                                            <input type="text" name="phone" id="phone" class="form-control" value="<?php echo set_value('phone');  ?>" required>
                                            <span class="text-danger"><?php echo form_error('phone');  ?></span>
                                        </div><!-- End .form-group -->
                                        
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Subject*</label>
                                            <input type="text" name="subject" id="subject" class="form-control" value="<?php echo set_value('subject');  ?>" required>
                                            <span class="text-danger"><?php echo form_error('subject');  ?></span>
                                        </div><!-- End .form-group -->
                                        

                                        <div class="form-group">
                                            <label>Message*</label>
                                            <textarea cols="30" rows="6" name="message" id="message" class="form-control" required><?php echo set_value('message');  ?></textarea>
                                            <br>
                                            <span class="text-danger"><?php echo form_error('message');  ?></span>
                                            
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->
                               
                                <div class="clearfix text-right">

                                    <input type="submit" name="send" id="send" class="btn btn-accent min-width" value="Send Message">
                                </div><!-- End .clearfix -->
                            </form>

                            <div class="title-group text-center">
                                <h2 class="title">Our Location</h2>
                                <p class="title-desc">Location on Map</p>
                            </div><!-- End .title-group -->

                            <div id="map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14039.838071236614!2d77.297967!3d28.39029065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cdc2120c00001%3A0x7a1e78642a6613da!2sDAV+Public+School!5e0!3m2!1sen!2sin!4v1560337730991!5m2!1sen!2sin" width="1200" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                                
                            </div><!-- map -->
                            <br />
                            <br />
                            <br />
                            
                        </div><!-- End .col-md-9 -->

<?php } else { ?>

                        <div class="col-md-12">
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
                            <div class="page-header text-center">
                                <h1><!-- Contact Us --> اتصل بنا  </h1>
                                <p>Check Out How to Contact Us</p>
                            </div><!-- End .page-header -->

                            <div class="mb20"></div><!-- margin -->

                            <div class="row">
                                <div class="col-sm-4">
                                    
                                    <div class="contact-info-box">
                                        <img src="<?php  echo base_url()  ?>assets/images/icon-pin.png" alt="Pin">
                                        <h3><!-- Address -->العنوان  </h3>

                                        <address>
                                           <?php   echo $contact['c_address']     ?>
                                        </address>
                                    </div><!-- End .contact-info-box -->
                                </div><!-- End .col-sm-4 -->
                                <div class="col-sm-4">
                                    <div class="contact-info-box">
                                        <img src="<?php  echo base_url()  ?>assets/images/icon-mobile.png" alt="Pin">
                                        <h3><!-- Phone -->هاتف  </h3>
                                        <?php   echo $contact['c_phone']     ?>
                                    </div><!-- End .contact-info-box -->
                                </div><!-- End .col-sm-4 -->
                                <div class="col-sm-4">
                                    <div class="contact-info-box">
                                        <img src="<?php  echo base_url()  ?>assets/images/icon-email.png" alt="Pin">
                                        <h3><!-- Email --> البريد الإلكتروني  </h3>
                                        <?php   echo $contact['c_email']     ?>
                                    </div><!-- End .contact-info-box -->
                                </div><!-- End .col-sm-4 -->
                            </div><!-- End .row -->

                            <div class="mb35 mb20-sm mb10-xs"></div><!-- margin -->

                            <div class="title-group text-center">
                                <h2 class="title">Send a Message</h2>
                                <p class="title-desc">Send Us a Message</p>
                            </div><!-- End .title-group -->

                            <form action="<?php echo base_url();   ?>home/contact/sent" method="post"  class="contact-form" id="contact_form">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label><!-- First Name* -->* الاسم الاول  </label>
                                            <input type="text" name="name" id="name" class="form-control" value="<?php echo set_value('name')  ?>" required>
                                            <span class="text-danger"><?php echo form_error('name');  ?></span>
                                        </div><!-- End .form-group -->


                                        <div class="form-group">
                                            <label><!-- Email* -->* البريد الإلكتروني  </label>
                                            <input type="email" name="email" id="email" class="form-control" value="<?php echo set_value('email');  ?>" required>
                                            <span class="text-danger"><?php echo form_error('email');  ?></span>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label><!-- Phone* -->* هاتف  </label>
                                            <input type="text" name="phone" id="phone" class="form-control" value="<?php echo set_value('phone');  ?>" required>
                                            <span class="text-danger"><?php echo form_error('phone');  ?></span>
                                        </div><!-- End .form-group -->
                                        
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Subject*</label>
                                            <input type="text" name="subject" id="subject" class="form-control" value="<?php echo set_value('subject');  ?>" required>
                                            <span class="text-danger"><?php echo form_error('subject');  ?></span>
                                        </div> 
                                        

                                        <div class="form-group">
                                            <label><!-- Message* --> رسالة  </label>
                                            <textarea cols="30" rows="6" name="message" id="message" class="form-control" required><?php echo set_value('message');  ?></textarea>
                                            <br>
                                            <span class="text-danger"><?php echo form_error('message');  ?></span>
                                            
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->
                               
                                <div class="clearfix text-right">

                                    <input type="submit" name="send" id="send" class="btn btn-accent min-width" value="Send Message">
                                </div><!-- End .clearfix -->
                            </form>

                            <div class="title-group text-center">
                                <h2 class="title">Our Location</h2>
                                <p class="title-desc">Location on Map</p>
                            </div><!-- End .title-group -->

                            <div id="map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14039.838071236614!2d77.297967!3d28.39029065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cdc2120c00001%3A0x7a1e78642a6613da!2sDAV+Public+School!5e0!3m2!1sen!2sin!4v1560337730991!5m2!1sen!2sin" width="1200" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                                
                            </div><!-- map -->
                            <br />
                            <br />
                            <br />
                            
                        </div><!-- End .col-md-9 -->

                        <?php } ?>

                        
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .main -->
        </div><!-- End #wrapper -->
        
        <a id="scroll-top" href="#top" title="Scroll top"><i class="fa fa-angle-up"></i></a>

        <!-- End -->
        <!-- Google Map-->
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDH9pcS7rMycuyuIfDLXf-imD1JtGoj5BQ"></script>

        <script src="<?php  echo base_url()  ?>assets/js/plugins.js"></script>
        <script src="<?php  echo base_url()  ?>assets/js/main.js"></script>
        <script src="<?php  echo base_url()  ?>assets/js/map.js"></script>
    </body>

<!-- Mirrored from hustlethemes.com/html/Hustle-Furniture/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Mar 2019 11:47:21 GMT -->
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
