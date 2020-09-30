
<div class="pcoded-content">

<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<i class="feather icon-credit-card bg-c-blue"></i>
<div class="d-inline">
<h5>Order Details</h5>
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
<li class="breadcrumb-item"><a href="#!">Order Details</a>
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
<h5>Order Details</h5>
</div>
<div class="card-block">
   
<div class="table-responsive">
<table class="table table-xs">
    <thead>
        <tr>
            <th>Product Image</th>
            <th>Title</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
    </thead>
<tbody>
    <?php
    $items=0;
    $total_price=0;
    foreach($order_data AS $key=>$row)
    {
        $items++;
        $total_price+=$row['o_quantity']*$row['o_price'];
        ?>
    	    <tr>
	            <td>
	                <img src="<?php   echo base_url();      ?>images/<?php  echo $row['pro_feat_image']  ?>"  height="150px"   />
	            </td>
	            <td>
	                <?php  echo ucfirst($row['pro_title'])  ?>
	            </td>
	            <td>
	                <?php   echo $row['o_price'] ?>
	            </td>
	            <td>
	                <?php echo $row['o_quantity']  ?>
	            </td>
	            <td>
	                <?php  echo $row['o_total_price']  ?>
	            </td>
	        </tr>
        <?php
    }
        
    ?>

</tbody>
</table>

<table class="table table-xs">
    <thead>
    <tr>
        <th>Shipping Details</th>
        <th>Price Details</th>
    </tr>
</thead>
<tbody>
    <tr>
        <td>
            Order Name  : <?php  echo $row['o_person_name']    ?>
            <br />
            Phone no : <?php  echo $row['o_phone']    ?>
            <br />
            Address : <?php  echo $row['o_address']  ?>
            <br />
            <h3>Status : <?php  
                
                if($row['o_user_status']=="cancelled")
                {
                    echo "Cancelled By User";
                }
                else
                {
                    
                    echo ucwords($row['o_status']);
                    if($row['o_status']=="placed")
                    {
                        echo "/Pending";
                    }
                }
                    ?></h3>
            
        </td>
        <td>
            Total Items : <?php echo  $items;  ?><br />
            Total Price : <?php echo  $total_price;  ?><br />
            Total Discount : <?php echo  $row['o_coupon_discount'];
                if($row['o_coupon_used']!='0')
                {
                    echo "  &nbsp;&nbsp;&nbsp;Coupon Used(".$row['o_coupon_used'].")";
                }
            ?><br />
            Sipping charge :  <?php echo  $row['o_shipping_charge'];  ?><br />
            Final Price : <?php echo  $row['o_final_price'];  ?>
        </td>
    </tr>
    
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
