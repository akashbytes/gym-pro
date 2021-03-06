
<div class="pcoded-content">

<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<i class="feather icon-credit-card bg-c-blue"></i>
<div class="d-inline">
<h5>Customer View</h5>
<!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class=" breadcrumb breadcrumb-title">
<li class="breadcrumb-item">
<a href="<?php echo base_url()  ?>admindashboard"><i class="feather icon-home"></i></a>
</li>
<li class="breadcrumb-item"><a href="#!">Customer View</a>
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




<div class="card">
<div class="card-header">
<h5>Customer view</h5>
</div>
<div class="card-block">
    <?php
    if (isset($delete)) 
    {
        ?>
        <div class="alert alert-success">
            <?php echo $delete ?>
        </div>
        <?php
    }
    ?>
    <?php
    if (isset($active)) 
    {
        ?>
        <div class="alert alert-success">
            <?php echo $active ?>
        </div>
        <?php
    }
    ?>
    <?php
    if (isset($deactivate)) 
    {
        ?>
        <div class="alert alert-success">
            <?php echo $deactivate ?>
        </div>
        <?php
    }
    ?>

<div class="table-responsive">
<table class="table table-xs">
<thead>
<tr>
<th>#</th>
<th>Customer Name</th>
<th>Email</th> 
<th>Phone no</th>
<!--<th>Address</th>-->
<th>Verified</th>
<th>Status</th>
</tr>
</thead>
<tbody>
	<?php
	// echo "<pre>";
	// // print_r($Brand);
	// echo "</pre>";
     $no=1;   
 	foreach($c_data as $key=>$row) 
    {
        ?>
        <tr>
        <th scope="row"><?php echo $no++; ?></th>
        <td><?php echo $row['u_fname']." ".$row['u_lname'];  ?></td>
        <td><?php 
        
        
                $email=$row['u_email'];
                
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  echo "<b>Guest (".$row['u_guest_email'].")</b>";
                }
                else
                {
                    echo $email;
                }
                
        
        
        
        
        
        
        
        ?></td>        
        <td><?php echo $row['u_phone'];  ?></td>        
        <td>
            <?php
            if ($row['u_verified']=='1') 
            {
                ?>
                <a href="#"  class="btn btn-success btn-sm">
                    Verified
                </a>
                <?php
            }
            else
            {
                ?>
                <a href="#"  class="btn btn-danger btn-sm">
                    Not Verified
                </a>
                <?php

            }
            ?>
            </td>
        <td>
            <?php
            if ($row['u_status']=='1') 
            {
                ?>
                <a href="<?php echo base_url().'admindashboard/customers/deactive/'.$row['u_id']; ?>"  class="btn btn-success btn-sm">
                    Active
                </a>
                <?php
            }
            else
            {
                ?>
                <a href="<?php echo base_url().'admindashboard/customers/active/'.$row['u_id']; ?>"  class="btn btn-danger btn-sm">
                    Deactive
                </a>
                <?php

            }
            ?>
        </td>
        </tr>
        <?php
    }
    ?>


</tbody>
</table>
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
                    <img src="<?php  echo base_url();  ?>files/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="<?php  echo base_url();  ?>files/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="<?php  echo base_url();  ?>files/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="<?php  echo base_url();  ?>files/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="<?php  echo base_url();  ?>files/assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->


<script type="text/javascript" src="<?php  echo base_url();  ?>files/bower_components/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php  echo base_url();  ?>files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php  echo base_url();  ?>files/bower_components/popper.js/js/popper.min.js"></script>
<script type="text/javascript" src="<?php  echo base_url();  ?>files/bower_components/bootstrap/js/bootstrap.min.js"></script>

<script src="<?php  echo base_url();  ?>files/assets/pages/waves/js/waves.min.js"></script>

<script src="<?php  echo base_url();  ?>files/assets/pages/waves/js/waves.min.js"></script>

<script type="text/javascript" src="<?php  echo base_url();  ?>files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>

<script type="text/javascript" src="<?php  echo base_url();  ?>files/bower_components/modernizr/js/modernizr.js"></script>
<script type="text/javascript" src="<?php  echo base_url();  ?>files/bower_components/modernizr/js/css-scrollbars.js"></script>

<script src="<?php  echo base_url();  ?>files/assets/js/pcoded.min.js"></script>
<script src="<?php  echo base_url();  ?>files/assets/js/vertical/vertical-layout.min.js"></script>
<script src="<?php  echo base_url();  ?>files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="<?php  echo base_url();  ?>files/assets/js/script.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
</body>

<!-- Mirrored from colorlib.com//polygon/admindek/default/bs-table-sizing.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Feb 2019 05:19:10 GMT -->
</html>
