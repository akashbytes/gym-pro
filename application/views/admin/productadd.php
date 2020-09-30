<div class="pcoded-content">

<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<i class="feather icon-clipboard bg-c-blue"></i>
<div class="d-inline">
<h5>Product Add</h5>
<!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class=" breadcrumb breadcrumb-title">
<li class="breadcrumb-item">
<a href="<?php  echo base_url();  ?>admindashboard"><i class="feather icon-home"></i></a>
</li>
<li class="breadcrumb-item"><a href="#!">Product Add</a>
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
<h5>Product Add</h5>
<!-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
</div>
<div class="card-block">
<form  method="post" enctype="multipart/form-data" action="<?php  echo base_url();  ?>admindashboard/productaddaction" >
<?php
    
    if ($this->session->flashdata('success'))
    {
        ?>
        <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php
    }
    
    if ($this->session->flashdata('error'))
    {
        ?>
        <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
        <?php
    }
    


?>
<div class="form-group row">
<label class="col-sm-2 col-form-label ">Product Title</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="pro_title" id="pro_title" value="<?php   echo set_value('pro_title');    ?>">
<span class="messages text-danger"><?php   echo form_error('pro_title');    ?></span>
</div>
</div>


<div class="form-group row">
<label class="col-sm-2 col-form-label ">Product Url</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="pro_url" id="pro_url" value="<?php   echo set_value('pro_url');    ?>">
<span class="messages text-danger"><?php   echo form_error('pro_url');    ?></span>
</div>
</div>


<div class="form-group row">
<label class="col-sm-2 col-form-label ">Product Sku</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="pro_sku" id="pro_sku" value="<?php   echo set_value('pro_sku');    ?>">
<span class="messages text-danger"><?php   echo form_error('pro_sku');    ?></span>
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label ">Product Base Category</label>
<div class="col-sm-10">
    <select name="pro_base_cate" id="pro_base_cate" class="form-control">
        <option value="">--Base Category--</option>
        <?php
        foreach ($c_data as $key => $row) 
        {
            ?>
            <option value="<?php  echo $row['c_id']   ?>"><?php  echo $row['c_name']   ?></option>
            <?php
        }
        
        ?>
    </select>
<span class="messages text-danger"><?php   echo form_error('pro_base_cate')    ?></span>
</div>
</div>



<div class="form-group row">
<label class="col-sm-2 col-form-label ">Product Sub Category</label>
<div class="col-sm-10">
    <select name="pro_cate" id="pro_cate" class="form-control">
        <option value="">--Sub  Category--</option>
        
    </select>
<span class="messages text-danger"><?php   echo form_error('pro_cate')    ?></span>
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label ">Product Brand</label>
<div class="col-sm-10">
    <select name="pro_brand" id="pro_brand" class="form-control">
        <option value="">--Brand--</option>
        <?php
        foreach ($b_data as $key => $row) 
        {
            ?>
            <option value="<?php  echo $row['b_id']   ?>"><?php  echo $row['b_name']   ?></option>
            <?php
        }
        
        ?>
    </select>
<span class="messages text-danger"><?php   echo form_error('pro_brand');    ?></span>

</div>
</div>


<div class="form-group row">
<label class="col-sm-2 col-form-label ">Product Quantity</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="pro_quantity" id="pro_quantity" value="<?php   echo set_value('pro_quantity');    ?>">
<span class="messages text-danger"><?php   echo form_error('pro_quantity');    ?></span>
</div>
</div>


<div class="form-group row">
<label class="col-sm-2 col-form-label ">Product Price</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="pro_price" id="pro_price" value="<?php   echo set_value('pro_price');    ?>">
<span class="messages text-danger"><?php   echo form_error('pro_price');    ?></span>
</div>
</div>


<div class="form-group row">
<label class="col-sm-2 col-form-label ">Product Sale Price</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="pro_sale_price" id="pro_sale_price" value="<?php   echo set_value('pro_sale_price');    ?>">
<span class="messages text-danger"><?php   echo form_error('pro_sale_price');    ?></span>
</div>
</div>






<div class="form-group row">
<label class="col-sm-2 col-form-label ">Sort Description</label>
<div class="col-sm-10">
<textarea class="form-control" name="pro_sort_desc" id="pro_sort_desc" ><?php   echo set_value('pro_sort_desc');    ?></textarea>
<span class="messages text-danger"><?php   echo form_error('pro_sort_desc');    ?></span>
</div>
</div>




<div class="form-group row">
<label class="col-sm-2 col-form-label ">Complete Description</label>
<div class="col-sm-10">
<textarea class="form-control" name="pro_desc" id="pro_desc" ><?php   echo set_value('pro_desc');    ?></textarea>
<span class="messages text-danger"><?php   echo form_error('pro_desc');    ?></span>
</div>
</div>




<div class="form-group row">
<label class="col-sm-2 col-form-label ">Product Meta Content</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="pro_meta_content" id="pro_meta_content" value="<?php   echo set_value('pro_meta_content');    ?>">
<span class="messages text-danger"><?php   echo form_error('pro_meta_content');    ?></span>
</div>
</div>


<div class="form-group row">
<label class="col-sm-2 col-form-label ">Product Meta Keyword</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="pro_meta_keyword" id="pro_meta_keyword" value="<?php   echo set_value('pro_meta_keyword');    ?>">
<span class="messages text-danger"><?php   echo form_error('pro_meta_keyword');    ?></span>
</div>
</div>

<div class="form-group row">
<div class="col-sm-2">
    </div>
    <div class="col-sm-10">
    <input type="checkbox" name="pro_popular" value="1" >Popular Product &nbsp;&nbsp;
    <input type="checkbox" name="pro_hot" value="1" >Hot Deals &nbsp;&nbsp;
    <input type="checkbox" name="pro_new" value="1" >New Arrival &nbsp;&nbsp;
    <input type="checkbox" name="pro_best" value="1" >Best Selling Product &nbsp;&nbsp;
    <input type="checkbox" name="pro_feat" value="1" >Featured Product &nbsp;&nbsp;(Optional)
    
</div>
</div>


<div class="form-group row">
<label class="col-sm-2 col-form-label ">Product Featured Image</label>
<div class="col-sm-10">
<input type="file" class="form-control" name="pro_feat_image" id="pro_feat_image" >
<span class="messages text-danger">Recomended size(1024x1024) <?php   echo @$upload_error;    ?></span>
</div>
</div>


<div class="form-group row">
<label class="col-sm-2 col-form-label ">Product Gallery Image</label>
<div class="col-sm-10">
<input type="file" multiple="" class="form-control" name="pro_gallery[]" id="pro_gallery" value="<?php   echo set_value('pro_gallery');    ?>">
<span class="messages text-danger">Recomended size(1024x1024) <?php   echo @$gallery_error;    ?></span>
</div>
</div>





<div class="form-group row">
<label class="col-sm-2">Select Colors</label>
<div class="col-sm-10">
</div>
</div>
    


<?php

foreach($color AS $key=>$row)
{
    ?>
<div class="form-group row">
<label class="col-sm-2"></label>
<div class="col-sm-10">
<input type="checkbox" name="color[]" value="<?php  echo $row['c_code'] ?>" >&nbsp;&nbsp;<div style="height:25px;width:25px;background-color:<?php  echo $row['c_code'] ?>!important;display:inline-block;"></div>&nbsp;&nbsp;<?php  echo $row['c_name'] ?><br><br>
</div>
</div>
    
    <?php
}


?>





<div class="form-group row">
<label class="col-sm-2"></label>
<div class="col-sm-10">
<button type="submit" name="add" class="btn btn-primary m-b-0">Add Product</button>
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
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
<script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'pro_sort_desc' );
    CKEDITOR.replace( 'pro_desc' );
</script>
<script>
    $(document).ready(function(){
        $("#pro_base_cate").change(function(){
            var base_cate_id=$("#pro_base_cate").val();
            // alert(base_cate_id);
            $.post('<?php  echo base_url().'ajax/fetchsubcategory'  ?>',{base_cate_id:base_cate_id},function(data,status){
                $("#pro_cate").html(data);        
                // alert(data);
            });
        });
    });
</script>
