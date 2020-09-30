

<div class="pcoded-content">

<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<i class="feather icon-clipboard bg-c-blue"></i>
<div class="d-inline">
<h5>Category Add</h5>
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
<li class="breadcrumb-item"><a href="#!">Category Add</a>
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
<h5>Category Add</h5>
<!-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
</div>
<div class="card-block">
<form id="main" method="post" action="https://colorlib.com/" novalidate>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Category Name</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="cate_name" id="cate_name">
<span class="messages"></span>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Password</label>
<div class="col-sm-10">
<input type="password" class="form-control" id="password" name="password" placeholder="Password input">
<span class="messages"></span>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Repeat Password</label>
 <div class="col-sm-10">
<input type="password" class="form-control" id="repeat-password" name="repeat-password" placeholder="Repeat Password">
<span class="messages"></span>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Email</label>
<div class="col-sm-10">
<input type="email" class="form-control" id="email" name="email" placeholder="Enter valid e-mail address">
<span class="messages"></span>
</div>
</div>
<div class="row">
<label class="col-sm-2 col-form-label">Radio Buttons</label>
<div class="col-sm-10">
<div class="form-check form-check-inline">
<label class="form-check-label">
<input class="form-check-input" type="radio" name="gender" id="gender-1" value="option1"> Male
</label>
</div>
<div class="form-check form-check-inline">
<label class="form-check-label">
<input class="form-check-input" type="radio" name="gender" id="gender-2" value="option2"> Female
</label>
</div>
<span class="messages"></span>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2"></label>
<div class="col-sm-10">
<button type="submit" class="btn btn-primary m-b-0">Submit</button>
</div>
</div>
</form>
</div>
</div>


<div class="card">
<div class="card-header">
<h5>Tooltip Validation</h5>
<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
</div>
<div class="card-block">
<form id="second" action="https://colorlib.com/" method="post" novalidate>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Enter Username</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="usernameP" name="Username" placeholder="Enter Username">
<span class="messages popover-valid"></span>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Enter Email-id</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="EmailP" name="Email" placeholder="Enter email id">
<span class="messages popover-valid"></span>
</div>
</div>
<div class="row">
<label class="col-sm-2"></label>
<div class="col-sm-10">
<button type="submit" class="btn btn-primary m-b-0">Submit</button>
</div>
</div>
</form>
</div>
</div>


<div class="card">
<div class="card-header">
<h5>Number Validation</h5>
<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
</div>
<div class="card-block">
<form id="number_form" action="https://colorlib.com/" method="post" novalidate>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Integers Only</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="integer" id="integer" placeholder="Integers Only">
<span class="messages"></span>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Numbers Only</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="numeric" id="numeric" placeholder="Numbers Only">
<span class="messages"></span>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Greater number</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="Number" id="greater" placeholder="Number Greter than 50">
<span class="messages"></span>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Less number</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="Numbers" id="less" placeholder="Number Less than 50">
<span class="messages"></span>
</div>
</div>
<div class="row">
<label class="col-sm-2"></label>
<div class="col-sm-10">
<button type="submit" class="btn btn-primary m-b-0">Submit</button>
</div>
</div>
</form>
</div>
</div>


<div class="card">
<div class="card-header">
<h5>Form Components Validation</h5>
 <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
</div>
<div class="card-block">
<form id="checkdrop" action="https://colorlib.com/" method="post" novalidate>
<div class="form-group row">
<label class="col-sm-2">Radio Buttons</label>
<div class="col-sm-10">
<div class="form-radio">
<div class="radio radiofill radio-primary radio-inline">
<label>
<input type="radio" name="member" value="free" data-bv-field="member">
<i class="helper"></i>Select here
</label>
</div>
<div class="radio radiofill radio-primary radio-inline">
<label>
<input type="radio" name="member" value="personal" data-bv-field="member">
<i class="helper"></i>Another select
</label>
</div>
</div>
<span class="messages"></span>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2">Select Checkbox</label>
<div class="col-sm-10">
<div class="checkbox-fade fade-in-primary">
<label>
<input type="checkbox" id="checkbox" name="Language" value="HTML">
<span class="cr">
<i class="cr-icon icofont icofont-ui-check txt-primary"></i>
</span>
<span>HTML</span>
</label>
</div>
<div class="checkbox-fade fade-in-primary">
<label>
<input type="checkbox" id="checkbox2" name="Language" value="CSS">
<span class="cr">
<i class="cr-icon icofont icofont-ui-check txt-primary"></i>
</span>
<span>CSS</span>
</label>
</div>
<span class="messages"></span>
</div>
</div>
<div class="row">
<label class="col-sm-2"></label>
<div class="col-sm-10">
<button type="submit" class="btn btn-primary m-b-0">Submit</button>
</div>
</div>
</form>
</div>
</div>

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
