<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('adminoperation');
        $this->load->model('homemodel');
         
    }
    public   function randomstring($length = 10) 
	{
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }    
    public function fetchsubcategory()
    {
        $id=$_POST['base_cate_id'];
        $data['s_data']=$this->adminoperation->fetchsubcate($id);
        ?>
        <oprion value="">Please Select Subcategory</oprion>
        <?php
        foreach($data['s_data'] AS $key=>$value)
        {
            ?>
            <option value="<?php  echo $value['s_id']  ?>"><?php  echo $value['s_name']  ?></option>
            <?php
        }
        
    }
    public function cartadd()
    {
        $pro_id=$_POST['id'];
        $qty=$_POST['qty'];
        $pro_price=$_POST['price'];
        $color=$_POST['color'];
        
        
        if($this->session->u_id==NULL)
        {
            
                if($this->homemodel->cartcheck($pro_id,$this->session->g_id,$color))
                {

       
                    $cart_qty=$this->homemodel->cartcheckqty($pro_id,$this->session->g_id,$color);
                    foreach($cart_qty AS $key=>$row)
                    {
                    }
                    $old_qty=$row['c_quantity'];
                    $qty+=$old_qty;
                            $data=array(
                                'c_guest_id'=>$this->session->g_id,
                                'c_user_id'=>$this->session->u_id,
                                'c_product_id'=>$pro_id,
                                'c_price'=>$pro_price,
                                'c_color'=>$color,
                                'c_quantity'=>$qty,
                                'c_trash'=>'0',
                               );
                            if($this->homemodel->cartupdate($data,$row['c_id']))
                            {
                                ?>
                                <div class="alert alert-success" id="add_to_cart">Added To Cart</div>
                                <?php
                            }
                            else
                            {
                                ?>
                                <div class="alert alert-danger" id="add_to_cart">Something Went Wrong</div>
                                <?php
                            }
                }
                else
                {
                   
                            $data=array(
                                'c_guest_id'=>$this->session->g_id,
                                'c_user_id'=>$this->session->u_id,
                                'c_product_id'=>$pro_id,
                                'c_price'=>$pro_price,
                                'c_color'=>$color,
                                'c_quantity'=>$qty,
                                'c_trash'=>'0',
                               );
                            if($this->homemodel->cartadd($data))
                            {
                                ?>
                                <div class="alert alert-success" id="add_to_cart" >Added To Cart</div>
                                <?php
                            }
                            else
                            {
                                ?>
                                <div class="alert alert-danger" id="add_to_cart">Something Went Wrong</div>
                                <?php
                            }

                }
                
        }
        else
        {
                if($this->homemodel->cartcheck2($pro_id,$this->session->u_id,$color))
                {
                    $cart_qty=$this->homemodel->cartcheckqty2($pro_id,$this->session->u_id,$color);
                    foreach($cart_qty AS $key=>$row)
                    {
                    }
                    $old_qty=$row['c_quantity'];
                    $qty+=$old_qty;
                            $data=array(
                                'c_guest_id'=>$this->session->g_id,
                                'c_user_id'=>$this->session->u_id,
                                'c_product_id'=>$pro_id,
                                'c_price'=>$pro_price,
                                'c_color'=>$color,
                                'c_quantity'=>$qty,
                                'c_trash'=>'0',
                               );
                            if($this->homemodel->cartupdate($data,$row['c_id']))
                            {
                                ?>
                                <div class="alert alert-success" id="add_to_cart">Added To Cart</div>
                                <?php
                            }
                            else
                            {
                                ?>
                                <div class="alert alert-danger" id="add_to_cart">Something Went Wrong</div>
                                <?php
                            }
                }
                else
                {
                            $data=array(
                                'c_guest_id'=>$this->session->g_id,
                                'c_user_id'=>$this->session->u_id,
                                'c_product_id'=>$pro_id,
                                'c_price'=>$pro_price,
                                'c_quantity'=>$qty,
                                'c_color'=>$color,
                                'c_trash'=>'0',
                               );
                            if($this->homemodel->cartadd($data))
                            {
                                ?>
                                <div class="alert alert-success" id="add_to_cart">Added To Cart</div>
                                <?php
                            }
                            else
                            {
                                ?>
                                <div class="alert alert-danger" id="add_to_cart">Something Went Wrong</div>
                                <?php
                            }

                }
        }
        
    }
    
    
    public function cartcount()
    {
        if($this->session->u_id==NULL)
        {
            $data=$this->homemodel->cartcount($this->session->g_id);
            
        }
        else
        {
            $data=$this->homemodel->cartcount2($this->session->u_id);       
        }
        echo $data;
    }
    public function cartprice()
    {
        if($this->session->u_id==NULL)
        {
            $data=$this->homemodel->cartprice($this->session->g_id);
            
        }
        else
        {
            $data=$this->homemodel->cartprice2($this->session->u_id);       
        }
                if($data!='0')
                {
                    
                    if($this->session->lang=="en")
                    {
                    ?>
                        <div class="dropdowm-cart-total"><span>TOTAL:</span> <span>$<?php echo $data; ?></span></div>
                        <a href="<?php  echo base_url();   ?>checkout" class="btn btn-primary">Checkout</a>
                    <?php                        
                    }
                    else
                    {
                        ?>
                            <a href="<?php  echo base_url();   ?>checkout" class="btn btn-primary">Checkout</a>
                            <div class="dropdowm-cart-total"><span>TOTAL:</span> <span>$<?php echo $data; ?></span></div>
                        <?php
                    }
                    

                    
                }
    }
    public function cartfetch()
    {
        if($this->session->u_id==NULL)
        {
            $data=$this->homemodel->cartfetch($this->session->g_id);
            $count=0;
            foreach($data AS $key=>$row)
            {
                $count++;
            }
            if($count==0)
            {
                ?>
                <h3>Cart Is Empty</h3>
                <?php
            }
            else
            {
               foreach($data AS $key=>$row)
                {
                $row2=$this->homemodel->cartproductfetch($row['c_product_id']);
                    
                    ?>
                    <div class="product">
                        <figure class="product-image-container">
                            <a href="<?php  echo base_url();   ?>home/product/<?php  echo $row2['pro_url']  ?>" title="<?php  echo $row2['pro_title']  ?>">
                                <img src="<?php  echo base_url();   ?>images/<?php  echo $row2['pro_feat_image']  ?>" alt="<?php  echo $row2['pro_title']  ?>">
                            </a>
                        </figure>
        
                        <div>
                            <a href="javascript:void(0);" class="btn-delete" title="Delete product" role="button" id="<?php  echo $row['c_id']  ?>" onclick="del_cart(this.id)"  ></a>
                            <h4 class="product-title"><a href="<?php  echo base_url();   ?>home/product/<?php  echo $row2['pro_url']  ?>"><?php  echo substr($row2['pro_title'],0,30)  ?></a></h4>
                            <div class="product-price-container">
                                <span class="product-price">$<?php  echo $row['c_price']  ?></span>
                            </div><!-- End .product-price-container -->
                            <div class="product-qty">Qty : <?php  echo $row['c_quantity'] ?> Color : <span style="background-color:<?php  echo $row['c_color'] ?>;height:10px;width:30px;">&nbsp;&nbsp;&nbsp;&nbsp;</span></div><!-- End .product-qty -->
                        </div><!-- End .product-image-container -->
                    </div><!-- End .product- -->
                    <?php
                }
                 
            }
            
            
        }
        else
        {
            
            $data=$this->homemodel->cartfetch2($this->session->u_id);
            $count=0;
            foreach($data AS $key=>$row)
            {
                $count++;
            }
            if($count==0)
            {
                ?>
                <h3>Cart Is Empty</h3>
                <?php
            }
            else
            {
               foreach($data AS $key=>$row)
                {
                $row2=$this->homemodel->cartproductfetch($row['c_product_id']);
                    
                    ?>
                    <div class="product">
                        <figure class="product-image-container">
                            <a href="<?php  echo base_url();   ?>home/product/<?php  echo $row2['pro_url']  ?>" title="<?php  echo $row2['pro_title']  ?>">
                                <img src="<?php  echo base_url();   ?>images/<?php  echo $row2['pro_feat_image']  ?>" alt="<?php  echo $row2['pro_title']  ?>">
                            </a>
                        </figure>
                        <div>
                            <a href="javascript:void(0);" class="btn-delete" title="Delete product" role="button" id="<?php  echo $row['c_id']  ?>" onclick="del_cart(this.id)"></a>
                            <h4 class="product-title"><a href="<?php  echo base_url();   ?>home/product/<?php  echo $row2['pro_url']  ?>"><?php  echo substr($row2['pro_title'],0,30)  ?></a></h4>
                            <div class="product-price-container">
                                <span class="product-price">$<?php  echo $row['c_price']  ?></span>
                            </div><!-- End .product-price-container -->
                            <div class="product-qty">Qty : <?php  echo $row['c_quantity'] ?> Color : <span style="background-color:<?php  echo $row['c_color'] ?>;height:10px;width:30px;">&nbsp;&nbsp;&nbsp;&nbsp;</span></div><!-- End .product-qty -->
                        </div><!-- End .product-image-container -->
                    </div><!-- End .product- -->
                    <?php
                }
                 
            }
        }  
    }
    
    public function cartdelete()
    {
        $id=$_POST['id'];
        $this->homemodel->cartdelete($id);
    }
    
    public function cartqtyupdate()
    {
        $qty=$_POST['qty'];
        $cart_id=$_POST['cart_id'];
        $data=$this->homemodel->cartqtyupdate($qty,$cart_id);
        echo "$".$qty*$data['c_price'];
    }
    public function cartbottomfetch()
    {
        if($this->session->u_id==NULL)
        {
            $data=$this->homemodel->cartcount($this->session->g_id);
            $total_price=$this->homemodel->cartprice($this->session->g_id);       
                        
        }
        else
        {
            $data=$this->homemodel->cartcount2($this->session->u_id);
            $total_price=$this->homemodel->cartprice2($this->session->u_id);       

        }
        if($data!=0)
        {
            
            if($this->session->coupon!="")
            {
                $coupen_check=$this->homemodel->couponcheck($this->session->coupon);
                if($coupen_check)
                {
                    $discount=$this->homemodel->couponamount($this->session->coupon);
                    $dis_type=$discount['cu_type'];
                    $dis_rate=$discount['cu_rate'];
                    $discount=TRUE;
                }
                else
                {
                    $discount=FALSE;
                }
            }



            
            if($this->session->lang=="en")
            {
                ?>
                
                 <div class="col-sm-11 col-sm-offset-1">
                        <div class="cart-proceed pull-right">
                            <p class="cart-subtotal"><span>Sub Total :</span> $<?php  echo $total_price;  ?></p>
                           
                            <a href="<?php   echo base_url(); ?>checkout" class="btn btn-accent">Proceed to Checkout</a>
                        </div><!-- Endd .cart-proceed -->
                    </div><!-- End .col-sm-4 -->

                <?php    
            }
            else
            {
                ?>
                
                 <div class="col-sm-4 ">
                        <div class="cart-proceed pull-left">
                            <p class="cart-subtotal"><?php  echo $total_price;  ?>$ <span> : Sub Total</span> </p>
                           
                            <a href="<?php   echo base_url(); ?>home/checkout" class="btn btn-accent">Proceed to Checkout</a>
                        </div><!-- Endd .cart-proceed -->
                    </div><!-- End .col-sm-4 -->

                <?php
            }
    
            
        }
        else
        {
            ?>
            <script>
                $(document).ready(function(){
                    $("#checktop").hide();
                    $("#cart_empty").html('Cart Is Empty!');
                    
                });
            </script>
            <?php
            
        }
    }
    
    public function cartdeletemain()
    {
        $id=$_POST['cart_id'];
        $this->homemodel->cartdelete($id);
    }
    
    public function coupon()
    {
        $coupon_name=$_POST['coupon_name'];
        $coupen_check=$this->homemodel->couponcheck($coupon_name);
        if($coupen_check)
        {
            $this->session->coupon=$coupon_name;
            
            echo " Your Code Apply Successfully";
        }
        else
        {
            echo " Wrong Coupon Code";
        }

    }
    
    public function wishlistadd()
    {
        $pro_id=$_POST['pro_id'];
        
        
        if($this->session->u_id==NULL)
        {
                if($this->homemodel->wislistcheck($pro_id,$this->session->g_id))
                {
                        echo "Already In Your Wishlist";
                }
                else
                {
                            $data=array(
                                'w_guest_id'=>$this->session->g_id,
                                'w_user_id'=>$this->session->u_id,
                                'w_pro_id'=>$pro_id,
                              );
                            if($this->homemodel->wishlistadd($data))
                            {
                                echo "Added To Your Wishlist";
                            }
                            else
                            {
                                    echo "Something Went Wrong";
                            }
                }
        }
        else
        {
                if($this->homemodel->wishlistcheck2($pro_id,$this->session->u_id))
                {
                    echo "Already In Your Wishlist";
                }
                else
                {
                   $data=array(
                                'w_guest_id'=>$this->session->g_id,
                                'w_user_id'=>$this->session->u_id,
                                'w_pro_id'=>$pro_id,
                              );
                            if($this->homemodel->wishlistadd($data))
                            {
                                echo "Added To Your Wishlist";
                            }
                            else
                            {
                                echo "Something Went Wrong";
                            }
                }
        }
        
        
    }
    
    public function wishlistdelete()
    {
        $w_id=$_POST['w_id'];
        if($this->homemodel->wishlistdelete($w_id))
        {
        }
        
    }
    public function wishlistTopHide()
    {
            if($this->homemodel->wishlistcount())
            {
                
            }
            else
            {
                ?>
                <script>
                    $("#checktop").hide();
                    $("#cart_empty").html('Wishlist Is Empty!');
                </script>
                <?php
            }

    }
    public function profile_update()
    {
            $name_pattern='/^[a-zA-Z ]{2,30}$/';
            $Mobile_mob_p = '/^[0-9]{1}[0-9]{6,11}$/'; 
            
            if($_POST['fname']=="")
            {
                ?>
                    <div class="alert alert-danger">First name is empty!</div>
                <?php
            }
            else if(strlen($_POST['fname'])<2)
            {
                ?>
                    <div class="alert alert-danger">First name too short!</div>
                <?php
            }
            else if (!preg_match($name_pattern, $_POST['fname'])) 
            {
                    ?>
                    <div class="alert alert-danger">Invalid first name!</div>
                <?php
            }
            else if($_POST['lname']=="")
            {
                ?>
                    <div class="alert alert-danger">Last name is empty!</div>
                <?php
            }
            else if(strlen($_POST['lname'])<2)
            {
                ?>
                    <div class="alert alert-danger">Last name too short!</div>
                <?php
            }
            else if (!preg_match($name_pattern, $_POST['lname'])) 
            {
                    ?>
                    <div class="alert alert-danger">Invalid last name!</div>
                <?php
            }
            else if($_POST['phone']=="")
            {
                ?>
                    <div class="alert alert-danger">Phone no is empty!</div>
                <?php
            }
            else if(strlen($_POST['phone'])<6)
            {
                ?>
                    <div class="alert alert-danger">Invalid phone no!</div>
                <?php
            }
            else if (!preg_match($Mobile_mob_p, $_POST['phone'])) 
            {
                    ?>
                        <div class="alert alert-danger">Invalid phone no!</div>
                    <?php
            }
            else
            {
                $this->form_validation->set_rules('fname','First Name','trim');
                $this->form_validation->set_rules('lname','Last Name','trim');
                $this->form_validation->set_rules('phone','Phone','trim');
                
                if ($this->form_validation->run())
                {
                    $data=array(
                            'u_fname'=>$this->input->post('fname'),
                            'u_lname'=>$this->input->post('lname'),
                            'u_phone'=>$this->input->post('phone'),
                           );
                    
                    if($this->homemodel->user_update($data))
                    {
                        ?>
                        <div class="alert alert-success">Profile Update successfull</div>
                        <?php
                    }
                    else
                    {
                         ?>
                        <div class="alert alert-danger">Something went wrong..</div>
                        <?php
                    }
                
                }
                else
                {
                    ?>
                    <div class="alert alert-danger">Something Went wrong,</div>
                    <?php
                }
                
            }
            
         
    }
    
    
    public function password_update()
    {
         
             $data['user_data']=$this->homemodel->userFetch();  
            
            if($_POST['opass']=="")
            {
                ?>
                    <div class="alert alert-danger">Old password is empty!</div>
                <?php
            }
            else if($_POST['opass']!=$data['user_data']['u_pass'])
            {
                ?>
                    <div class="alert alert-danger">Old password does not matched!</div>
                <?php
            }
            else if(strlen($_POST['npass'])<8)
            {
                ?>
                    <div class="alert alert-danger">Password length should be minimum 8 character!</div>
                <?php
            }
            else if ($_POST['npass']!=$_POST['cpass']) 
            {
                    ?>
                    <div class="alert alert-danger">Confirm password does not matched!</div>
                <?php
            }
            else
            {
                $this->form_validation->set_rules('opass','First Name','trim');
                $this->form_validation->set_rules('npass','Last Name','trim');
                $this->form_validation->set_rules('cpass','Phone','trim');
                
                if ($this->form_validation->run())
                {
                    $data=array(
                            'u_pass'=>$this->input->post('cpass'),
                            );
                    
                    if($this->homemodel->user_update($data))
                    {
                        ?>
                        <div class="alert alert-success">Password Update successfull</div>
                        <?php
                    }
                    else
                    {
                         ?>
                        <div class="alert alert-danger">Something went wrong..</div>
                        <?php
                    }
                
                }
                else
                {
                    ?>
                    <div class="alert alert-danger">Something Went wrong,</div>
                    <?php
                }
                
            }
    }
    public function fetch_state()
	{
    	   $country_id=$_POST['country_id'];
    	   $state_data=$this->homemodel->fetch_state($country_id);
    	   ?>
    	   <option value="">-- Select State --</option>
    	   <?php
    	   foreach($state_data AS $key=>$row)
    	   {
     	         ?>
                  <option value="<?php  echo $row['st_id']  ?>"><?php  echo $row['state_name']  ?></option>
                 <?php 

    	   }
	}
	public function shipping_update()
	{
	       // echo "<pre>";
	       // print_r($_POST);
	       // echo "<pre>";
            
            if($_POST['address']=="")
            {
                ?>
                    <div class="alert alert-danger">Address is empty!</div>
                <?php
            }
            else if(strlen($_POST['address'])<2)
            {
                ?>
                    <div class="alert alert-danger">Address too short!</div>
                <?php
            }
            else if ($_POST['country_id']=="") 
            {
                    ?>
                    <div class="alert alert-danger">Please select country!</div>
                <?php
            }
            else if($_POST['state_id']=="")
            {
                ?>
                    <div class="alert alert-danger">Please select state!</div>
                <?php
            }
            else if($_POST['city']=="")
            {
                ?>
                    <div class="alert alert-danger">City is empty!</div>
                <?php
            }
            else if(strlen($_POST['city'])<2)
            {
                ?>
                    <div class="alert alert-danger">City name too short!</div>
                <?php
            }
            else if($_POST['pincode']=="")
            {
                ?>
                    <div class="alert alert-danger">Pincode is empty!</div>
                <?php
            }
            else
            {
                
                $this->form_validation->set_rules('address','Address','trim');
                $this->form_validation->set_rules('city','City','trim');
                $this->form_validation->set_rules('pincode','Pincode','trim');
                
                if ($this->form_validation->run())
                {
                    $data=array(
                            'u_city'=>$this->input->post('city'),
                            'u_country'=>$this->input->post('country_id'),
                            'u_state'=>$this->input->post('state_id'),
                            'u_address'=>$this->input->post('address'),
                            'u_pincode'=>$this->input->post('pincode'),
                           );
            
                    if($this->homemodel->user_update($data))
                    {
                        ?>
                        <div class="alert alert-success">Address Update successfull</div>
                        <?php
                    }
                    else
                    {
                         ?>
                        <div class="alert alert-danger">Something went wrong..</div>
                        <?php
                    }
                
                }
                else
                {
                    ?>
                    <div class="alert alert-danger">Something Went wrong,</div>
                    <?php
                }
                
            }
	}
	public function forget_email()
	{
	    $email=$_POST['email'];
	    if($email=="")
	    {
	         ?>
              <div class="alert alert-danger">
                  Please enter email address
              </div>
              <?php
	    }
	    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	    {
              ?>
              <div class="alert alert-danger">
                  Invalid email address
              </div>
              <?php
        }
        else 
        {
            if($this->homemodel->check_email($email))
            {
                $code=$this->randomstring();
                    $data=array(
                            'u_code'=>$code,
                        );
                if($this->homemodel->update_forget($email,$data))
                {
                    
                    
                require_once 'mailer/class.phpmailer.php';
                require_once 'mailer/class.smtp.php';
                require_once 'mailer/PHPMailerAutoload.php';


               
                $show_name='Al-Essa Furniture Co';
        		$reply_email='info@alessafurn.com';
        		$subject='Forget Password';
        		$email=$this->input->post('email');
        		$mail = new PHPMailer();
        		$mail->Host='alessafurn.com';
        		$mail->isSMTP();
        		$mail->Port=587;
        		$mail->SMTPAuth=true;
        		$mail->SMTPAuthSecure='tls';
        		$mail->Username="info@alessafurn.com";
        		$mail->Password="Anomla@123wx";
        
        		$mail->setFrom($reply_email,$show_name);//name is the top name from sender and email is the email To which The Mail will Be Send
        		$mail->addAddress($email);	
        
        		$mail->addReplyTo($reply_email,$show_name);
        
        		$mail->isHTML(true);
        		$mail->Subject=$subject;//thiss willl Go to the Subject
        
                 $mail->Body='
               <!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

    <div style="background:#193769;text-align:center;max-width: 1000px;margin: auto;">
  <div style="background:#193769;">
    <div style="background:#ffffff;margin: auto;border: 10px solid #193769;padding: 30px 15px;">
      <div style="font-family:Roboto Slab,sans-serif;color:#212e43;font-size:18px;font-weight:bold;text-align:center;padding:12px 0px 0px">
          <center>
              <img src="https://www.alessafurn.com/assets/images/logo.jpg" class="CToWUd" height="100">
          </center>
    </div>
    <hr style="border:1px solid #193769;width:500px">
    <div style="text-align:center;color:#212e43;font-family:Roboto Slab,sans-serif;font-size:16px;font-weight:400;padding:20px;line-height:1.8">
        Welcome to Al-Essa Furniture Co  <br>
       
         <a href="'.base_url().'home/forgetpass/'.$code.'" >Click To Verify</a>
       
    </div>
    <div style="text-align:center;font-family:Roboto Slab,sans-serif;color:#212e43;font-size:16px;font-weight:400;padding:20px;line-height:1.8">
        For any help or assistance, reach out to us anytime at <a style="font-size:12px" href="mailto:info@alessafurn.com" style="text-decoration: none; color: #193769"  target="_blank">info@alessafurn.com</a>
    </div>
    <hr style="border:1px solid #193769;width:600px">
    <div style="text-align:center;font-family:Roboto Slab,sans-serif;font-size:16px;font-weight:500;font-style:italic;color:#a9a9a9;line-height:1.8">
      Kind Regards,<br>
      <div style="text-align:center;font-family:Roboto Slab,sans-serif;color:#212e43;font-size:16px;font-weight:bolder">
        Al-Essa Furniture Co </div>
    </div>
  </div>
  <div style="font-family:Roboto Slab,sans-serif;text-align:center;color:#212e43;padding: 0px 0 10px;font-family:Roboto Slab,sans-serif;font-size:15px;margin:auto;">
    <p style="font-family:Roboto Slab,sans-serif;font-size:15px;color:#fff;font-weight:600">For any queries, please call
    <span >
      +91 xxxxxxxxxx, +91 xxxxxxxxxx </span></p>
      <div class="yj6qo"></div><div class="adL"></div>
  </div></div>

</body>
</html>';

         
                        if (!$mail->send()) 
                        {
                             ?>
                              <div class="alert alert-danger">
                                  Something went wrong
                              </div>
                              <?php
                        
                                   
                        }
                        else
                        {
                             ?>
                              <div class="alert alert-success">
                                  Please check your email to update password
                              </div>
                              <?php  
                        }
/************************************************************************************************************/
                                           
                }
                else
                {
                      ?>
                      <div class="alert alert-danger">
                          Something went wrong
                      </div>
                      <?php
                }
                

                    
            }
            else
            {
                ?>
              <div class="alert alert-danger">
                  Email does not exist
              </div>
              <?php
            }
        }
	}
    
    public function forget_update()
    {
         $code=$_POST['code'];
         $npass=$_POST['npass'];
         $cpass=$_POST['cpass'];
         
	    if($npass=="")
	    {
	         ?>
              <div class="alert alert-danger">
                 Please enter new password
              </div>
              <?php
	    }
	    else if ($npass!=$cpass) 
	    {
              ?>
              <div class="alert alert-danger">
                  confim password did not matched
              </div>
              <?php
        }
        else 
        {
                    $data=array(
                            'u_pass'=> $cpass,
                            'u_code'=>'ok',
                        );
                        
                if($this->homemodel->update_pass($data,$code))
                {
                   ?>
                  <div class="alert alert-success">
                      Password updated you may login now
                  </div>
                  <?php   
                }
                else
                {
                   ?>
                  <div class="alert alert-danger">
                      something went wrong
                  </div>
                  <?php 
                }
                        
        }   
    }
    public function review()
    {
        echo "ok";
    }
    
}







?>