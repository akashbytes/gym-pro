

<div class="pcoded-content">

<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<i class="feather icon-clipboard bg-c-blue"></i>
<div class="d-inline">
<h5>About Page CMS</h5>
<!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class=" breadcrumb breadcrumb-title">
<li class="breadcrumb-item">
<a href="<?php  echo base_url()  ?>admindashboard"><i class="feather icon-home"></i></a>
</li>
<li class="breadcrumb-item"><a href="#!">About Page CMS</a>
</li>
</ul>
</div>
</div>
</div>
</div>

<div class="pcoded-inner-content">
<div class="main-body">
<div class="page-wrapper">

<div class="page-body">
<div class="row">

<div class="col-sm-12">

<div class="card">
<div class="card-header">
<h5>About Page CMS</h5>
<!-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
</div>
<div class="card-block">
<form  method="post" action="<?php  echo base_url()  ?>admindashboard/aboutpage/update" enctype="multipart/form-data" >
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



<div class="form-group row">
<label class="col-sm-3 col-form-label text-right">Heading</label>
<div class="col-sm-9">
    <textarea class="form-control"   name="a_heading"  ><?php  echo $a_data['a_heading']  ?></textarea>
<span class="messages text-danger"><?php  echo form_error('a_heading')  ?></span>
</div>
</div>
<div class="form-group row">
<label class="col-sm-3 col-form-label text-right">Text</label>
<div class="col-sm-9">
    <textarea class="form-control"   name="a_text"  ><?php  echo $a_data['a_text']  ?></textarea>
<span class="messages text-danger"><?php  echo form_error('a_text')  ?></span></div>
</div>

<div class="form-group row">
<label class="col-sm-3 col-form-label text-right">Top Content</label>
<div class="col-sm-9">
    <textarea class="form-control"   name="a_con_1"  ><?php  echo $a_data['a_con_1']  ?></textarea>
    <span class="messages text-danger"><?php  echo form_error('a_con_1')  ?></span>
</div>
</div>



<div class="form-group row">
<label class="col-sm-3 col-form-label text-right">Bottom Content</label>
<div class="col-sm-9">
    <textarea class="form-control"   name="a_con_2"  ><?php  echo $a_data['a_con_2']  ?></textarea>
<span class="messages text-danger"><?php  echo form_error('a_con_2')  ?></span>
</div>
</div>


<div class="form-group row">
<label class="col-sm-3 col-form-label text-right">Image <br /><span class="text text-danger">Recommended Size(250x250)</span></label>
<div class="col-sm-9">
    <input type="file"  name="a_image"   class="form-control"  />    
    <img     src="<?php    echo base_url()    ?>images/<?php  echo $a_data['a_image']  ?>"    style="height:100px!important;"  />
     <?php 
    if (isset($upload_error))
    {
        ?>
        <div class="alert alert-danger"><?php echo $upload_error;?></div>
        <?php
    }
 ?>
</div>
</div>


<div class="form-group row">
<label class="col-sm-3"></label>
<div class="col-sm-9">
<button type="submit" name="add" class="btn btn-primary m-b-0">Update Page</button>
</div>
</div>
</form>
</div>
</div>



</div>

<div class="col-sm-2">
</div>
</div>
</div>

</div>
</div>
</div>
</div>

<div id="styleSelector">
</div>
</div>
</div>
</div>
</div>


<!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="<?php  echo base_url();   ?>files/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="<?php  echo base_url();   ?>files/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="<?php  echo base_url();   ?>files/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="<?php  echo base_url();   ?>files/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="<?php  echo base_url();   ?>files/assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->


<script type="text/javascript" src="<?php  echo base_url();   ?>files/bower_components/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php  echo base_url();   ?>files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php  echo base_url();   ?>files/bower_components/popper.js/js/popper.min.js"></script>
<script type="text/javascript" src="<?php  echo base_url();   ?>files/bower_components/bootstrap/js/bootstrap.min.js"></script>

<script src="<?php  echo base_url();   ?>files/assets/pages/waves/js/waves.min.js"></script>

<script type="text/javascript" src="<?php  echo base_url();   ?>files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>

<script type="text/javascript" src="<?php  echo base_url();   ?>files/bower_components/modernizr/js/modernizr.js"></script>
<script type="text/javascript" src="<?php  echo base_url();   ?>files/bower_components/modernizr/js/css-scrollbars.js"></script>

<script src="../../../../cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script src="../../../../cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
<script type="text/javascript" src="<?php  echo base_url();   ?>files/assets/pages/form-validation/validate.js"></script>

<script type="text/javascript" src="<?php  echo base_url();   ?>files/assets/pages/form-validation/form-validation.js"></script>
<script src="<?php  echo base_url();   ?>files/assets/js/pcoded.min.js"></script>
<script src="<?php  echo base_url();   ?>files/assets/js/vertical/vertical-layout.min.js"></script>
<script src="<?php  echo base_url();   ?>files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="<?php  echo base_url();   ?>files/assets/js/script.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
</body>

<!-- Mirrored from colorlib.com//polygon/admindek/default/form-validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Feb 2019 05:18:47 GMT -->
</html>
<script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'a_heading' );
    CKEDITOR.replace( 'a_text' );
    CKEDITOR.replace( 'a_con_1' );
    CKEDITOR.replace( 'a_con_2' );
    
</script>
