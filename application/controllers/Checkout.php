<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

	 public function __construct()
    {
        parent::__construct();
        $this->load->model('adminoperation');
        $this->load->model('homemodel');
        if (!$this->session->lang) 
        {
        	$this->session->lang="en";
        }
        if(!$this->session->g_id)
        {
            $this->session->g_id=$this->randomstring();
        }
        if(!$this->session->u_id)
        {
            $this->session->u_id=NULL;
        }
        
        if($this->session->u_id=="")
        {
            $data=$this->homemodel->cartcount($this->session->g_id);
            if($data<=0)
            {
                redirect(base_url().'home/cart');
            }
        }
        else
        {
            $data=$this->homemodel->cartcount2($this->session->u_id);
            if($data<=0)
            {
                redirect(base_url().'home/cart');
            }
        }



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
    public function header()
    {
        $data['c_data']=$this->adminoperation->cateview($this->session->lang);
        $data['s_data']=$this->adminoperation->subcateview($this->session->lang);
        if($this->session->u_id==NULL)
        {
            $data['cart_data']=$this->homemodel->cartdata($this->session->g_id);
            $data['cart_count']=$this->homemodel->cartcount($this->session->g_id);
            $data['cart_price']=$this->homemodel->cartprice($this->session->g_id);
            
        }
        else
        {
            $data['cart_data']=$this->homemodel->cartdata2($this->session->u_id);            
            $data['cart_count']=$this->homemodel->cartcount2($this->session->u_id);
            $data['cart_price']=$this->homemodel->cartprice2($this->session->u_id);
        }
		$this->load->view('home/header');
		$this->load->view('home/nav',$data);        
    }
	public function index()
	{
	    $this->session->unset_userdata('guest');
        
		 $this->header();
		 
	    if($this->session->u_id==NULL)
        {
            $data['cart_data2']=$this->homemodel->cartdata($this->session->g_id);
        }
        else
        {
            $data['cart_data2']=$this->homemodel->cartdata2($this->session->u_id);            
        }	    
	    
        if($this->session->coupon!="")
        {
            $coupen_check=$this->homemodel->couponcheck($this->session->coupon);
            if($coupen_check)
            {
                $discount=$this->homemodel->couponamount($this->session->coupon);
                $data['dis_type']=$discount['cu_type'];
                $data['dis_rate']=$discount['cu_rate'];
                $data['discount']=1;
            }
            else
            {
                $data['discount']=0;
            }
        }
        else
        {
            $data['discount']=0;
        }

	    $this->load->view('home/summery',$data);
	    $this->footer();
    
		
	}
	public function footer()
	{
		$data['pages']=$this->adminoperation->pageview($this->session->lang);
		$this->load->view('home/footer',$data);	
	}

	
	

   
/******************************************************************/
    public function coupon()
    {
        $coupon_name=$_POST['coupon_name'];    
        
        if($this->session->u_id=="")
        {
            
                if($this->homemodel->couponcheck($coupon_name))
                {
                    $date=date('Y-m-d');
                    $data=$this->homemodel->couponamount($coupon_name);
                    if($data['cu_expiry']<$date)
                    {
                        echo " Wrong Coupon Code";
                    }
                    else
                    {
                        $this->session->coupon=$data['cu_name'];
                        // echo $this->session->coupon;
                        echo "Coupon Applied Successfully";
                    }
                }
                else
                {
                    echo " Wrong Coupon Code";
                }
        }
        else
        {
             if($this->homemodel->couponcheck($coupon_name))
                {
                    $date=date('Y-m-d');
                    $data=$this->homemodel->couponamount($coupon_name);
                    if($data['cu_expiry']<$date)
                    {
                        echo " Wrong Coupon Code";
                    }
                    else
                    {
                        $this->session->coupon=$data['cu_name'];
                        // echo $this->session->coupon;
                        echo "Coupon Applied Successfully";
                    }
                }
                else
                {
                    echo " Wrong Coupon Code";
                }
            
        }
    }
    public function finalprice()
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
            else
            {
                $discount=FALSE;
            }

            ?>
                
                 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                        <div class="cart-proceed">
                            <p class="cart-subtotal"><span>Total :</span> $<?php  echo $total_price;  ?></p>
                            <?php
                            if($discount==TRUE)
                            {
                                if($dis_type=='flat')
                                {
                                    $total_price-=$dis_rate;
                                    $this->session->coupon_amount=$dis_rate;
                                    ?>
                                    <p class="cart-subtotal"><span>Discount :</span> $<?php  echo $dis_rate;  ?></p>
                                    <p class="cart-subtotal"><span>Sub Total :</span> $<?php  echo $total_price;  ?></p>
                                    <a href="javascript:void(0);" class="btn btn-default mas"  onclick="remove_coupon()" >Remove Coupon</a>
                                    
                                    <?php
                                }
                                else
                                {
                                    $discount_amount=$total_price*$dis_rate;
                                    $discount_amount=$discount_amount/100;
                                    $total_price-=$discount_amount;
                                    $this->session->coupon_amount=$discount_amount;                                    
                                    ?>
                                    <p class="cart-subtotal"><span>Discount :</span> $<?php  echo $discount_amount;  ?></p>
                                    <p class="cart-subtotal"><span>Sub Total :</span> $<?php  echo $total_price;  ?></p>
                                    <a href="javascript:void(0);" class="btn btn-default mas" onclick="remove_coupon()" >Remove Coupon</a>                                    
                                    <?php
                                }
                                
                            }
                            ?>
                           
                            <a href="<?php   echo base_url(); ?>checkout/account" class="btn btn-accent">Proceed to Checkout</a>
                        </div><!-- Endd .cart-proceed -->
               

            <?php
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
    public function remove_coupon()
    {
            $this->session->unset_userdata('coupon');    
    }

    public function account()
    {
        if($this->session->u_id!="")
        {
            redirect('checkout/shipping');
        }
        
        $this->session->unset_userdata('guest');
        
        $this->header();
	    $this->load->view('home/account');
	    $this->footer(); 
    }
    
    public function shipping()
    {
        $this->header();
        $data['user_data']=$this->homemodel->userFetch();  
	    $data['countries']=$this->homemodel->countries();  
	    $data['states']=$this->homemodel->states();  
	    $data['country_states']=$this->homemodel->country_states($data['user_data']['u_country']);  
	    $this->load->view('home/shipping',$data);
	    $this->footer(); 
    }
   public function login()
   {
       error_reporting(0);
            $this->form_validation->set_rules('user_id','Email','required|trim');
            $this->form_validation->set_rules('user_pass','Password','required|trim');
            if ($this->form_validation->run())
            {   
                $user=$this->input->post('user_id');
                $pass=$this->input->post('user_pass');                
                $return=$this->homemodel->login($user,$pass);
                if($return)
                {
                    if($return['u_verified']=="0")
                    {
                         ?>
                         <div class="alert alert-danger">Please verify your account</div>
                         <?php
                    }
                    else if($return['u_status']=="0")
                    {
                         ?>
                         <div class="alert alert-danger">Sorry you are not active </div>
                         <?php
                    }
                    else
                    {
                        $this->session->u_id=$return['u_id'];
                        $this->session->u_name=$return['u_fname'];
                        
                         $country_id=$return['u_country_id'];
                        $state_id=$return['u_state_id'];
                        $country_name=$this->homemodel->get_country_name($country_id);
                        $state_name=$this->homemodel->get_state_name($state_id);
                        $address=$return['u_address'];
                        $city_name=$return['u_city'];
                        $pincode=$return['u_pincode'];
                        $fname=$return['u_fname'];
                        $lname=$return['u_lname'];
                        
                        $complete_address=$address." ".$city_name." ".$state_name." ".$country_name." ".$pincode;            
                        $complete_name=$fname." ".$lname;

                         
                         $data2=array(
                                    'od_guest_id'=>$this->session->g_id,
                                    'od_user_id'=>$this->session->u_id,
                                    'od_name'=>$complete_name,
                                    'od_email'=>$return['u_email'],
                                    'od_phone'=>$return['u_phone'],
                                    'od_address'=>$complete_address,
                               );
                         $this->homemodel->order_temp($data2); 
                        
                        $this->homemodel->cartupdateuser($this->session->g_id,$this->session->u_id);
                        
                        // redirect('checkout/shipping');    
                        ?>
                        <script>
                            window.location.href="<?php echo base_url()  ?>checkout/shipping";
                        </script>
                        <?php
                    }
                }
                else
                {
                     ?>
                         <div class="alert alert-danger">Wrong email or password</div>
                     <?php
                }
            }
            else
            {
                     ?>
                         <div class="alert alert-danger">Something went wrong</div>
                     <?php
                    
            } 
   }
   public function guest()
   {
             $this->session->set_userdata('guest','1');
             ?>
                <script>
                    window.location.href="<?php echo base_url()  ?>checkout/shipping";
                </script>
            <?php
   }
   public function guestcheckout()
   {
            $this->form_validation->set_rules('g_fname','First Name','required|trim|alpha_numeric_spaces');
            $this->form_validation->set_rules('g_lname','Last Name','required|trim|alpha_numeric_spaces');
            // $this->form_validation->set_rules('g_email','Email','required|trim|valid_email|is_unique[user.u_email]');
            $this->form_validation->set_rules('g_phone','Phone No','required|trim|numeric|min_length[10]');
            
            $country_id=$this->input->post('country_id');
            $state_id=$this->input->post('state_id');
            $country_name=$this->homemodel->get_country_name($country_id);
            $state_name=$this->homemodel->get_state_name($state_id);
            $address=$this->input->post('g_address');
            $city_name=$this->input->post('g_city');
            $pincode=$this->input->post('g_pincode');
            $fname=$this->input->post('g_fname');
            $lname=$this->input->post('g_lname');
            
            $complete_address=$address." ".$city_name." ".$state_name." ".$country_name." ".$pincode;            
            $complete_name=$fname." ".$lname;
            
            $rand=$this->randomstring();
            if ($this->form_validation->run())
            {   
                $data=array(
                            'u_fname'=>$this->input->post('g_fname'),
                            'u_lname'=>$this->input->post('g_lname'),
                            'u_email'=>$this->session->g_id,
                            'u_pass'=>$this->session->g_id,
                            'u_phone'=>$this->input->post('g_phone'),
                            'u_guest_email'=>$this->input->post('g_email'),
                            'u_address'=>$this->input->post('g_address'),
                            'u_city'=>$this->input->post('g_city'),
                            'u_country'=>$this->input->post('country_id'),
                            'u_pincode'=>$this->input->post('g_pincode'),
                            'u_state'=>$this->input->post('state_id'),
                            'u_code'=>$rand,
                            'u_guest'=>'Guest',
                            
                           );

                    if($this->homemodel->useradd($data))
                    {
                        //  $this->session->set_flashdata('success', 'Sign Up successfull please verify your account from mail ');
                         $data=$this->homemodel->get_user_id($this->session->g_id);
                         $this->session->u_id=$data['u_id'];
                         $this->session->u_name=$data['u_fname'];
                         $data2=array(
                                    'od_guest_id'=>$this->session->g_id,
                                    'od_user_id'=>$this->session->u_id,
                                    'od_name'=>$complete_name,
                                    'od_email'=>$this->input->post('g_email'),
                                    'od_phone'=>$this->input->post('g_phone'),
                                    'od_address'=>$complete_address,
                               );
                         $this->homemodel->order_temp($data2);           
                         $this->homemodel->cartupdateuser($this->session->g_id,$this->session->u_id);
                         
                         redirect('checkout/payment');    
                    }
                    else
                    {
                         $this->session->set_flashdata('error', 'Something Went Wrong');
                        redirect('checkout/shipping');    
                    }
            }
            else
            {
                $this->header(); 
                $data['user_data']=$this->homemodel->userFetch();  
        	    $data['countries']=$this->homemodel->countries();  
        	    $data['states']=$this->homemodel->states();  
        	    $data['country_states']=$this->homemodel->country_states($this->input->post('country_id'));  
        	    $this->load->view('home/shipping',$data);
        	    $this->footer(); 
           }      
            
   }
   public function shipping_update()
   {
                $this->form_validation->set_rules('fname','First Name','required|trim|alpha_numeric_spaces');
                $this->form_validation->set_rules('lname','Last Name','required|trim|alpha_numeric_spaces');
                // $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.u_email]');
                $this->form_validation->set_rules('phone','Phone No','required|trim|numeric|min_length[10]');
                // $this->form_validation->set_rules('pass','Password','required|trim|min_length[8]');
                // $this->form_validation->set_rules('cpass','Confirm Password','required|trim|min_length[8]|matches[pass]');
                $this->form_validation->set_rules('country_id','Country id','required|trim');
                $this->form_validation->set_rules('state_id','State id','required|trim');
                $this->form_validation->set_rules('city','City','required|trim');
                $this->form_validation->set_rules('address','Address','required|trim');
                $this->form_validation->set_rules('pincode','Pincode','required|trim');
                
                 $country_id=$this->input->post('country_id');
                $state_id=$this->input->post('state_id');
                
                $country_name=$this->homemodel->get_country_name($country_id);
                $state_name=$this->homemodel->get_state_name($state_id);
                $city_name=$this->input->post('city');
                $pincode=$this->input->post('pincode');
                $fname=$this->input->post('fname');
                $lname=$this->input->post('lname');
                $address=$this->input->post('address');
                
                $complete_address=$address." ".$city_name." ".$state_name." ".$country_name." ".$pincode;            
                $complete_name=$fname." ".$lname;
                
                $rand=$this->randomstring();
                if ($this->form_validation->run())
                {   
                        $data=array(
                                'u_phone'=>$this->input->post('phone'),
                                'u_country'=>$this->input->post('country_id'),
                                'u_state'=>$this->input->post('state_id'),
                                'u_city'=>$this->input->post('city'),
                                'u_address'=>$this->input->post('address'),
                                'u_pincode'=>$this->input->post('pincode'),
                               );
                     if($this->homemodel->shipping_update($data,$this->session->u_id))
                     {
                          $data2=array(
                                    'od_guest_id'=>$this->session->g_id,
                                    'od_user_id'=>$this->session->u_id,
                                    'od_name'=>$complete_name,
                                    'od_email'=>$this->input->post('email'),
                                    'od_phone'=>$this->input->post('phone'),
                                    'od_address'=>$complete_address,
                               );
                         $this->homemodel->order_temp($data2);           
                         $this->homemodel->cartupdateuser($this->session->g_id,$this->session->u_id);

                         redirect('checkout/payment');
                     }
                }
                else
                {
                    $this->header();
                    $data['user_data']=$this->homemodel->userFetch();  
            	    $data['countries']=$this->homemodel->countries();  
            	    $data['states']=$this->homemodel->states();  
            	    $data['country_states']=$this->homemodel->country_states($data['user_data']['u_country']);  
            	    $this->load->view('home/shipping',$data);
            	    $this->footer(); 
                }
   
   }
   public function payment()
   {
                 $data['shipping']=$this->homemodel->get_order_address($this->session->g_id);
                // $order_name=$data['od_name'];
                // $order_address=$data['od_address'];
                // $order_phone=$data['od_phone'];
                $data['cart_count']=$this->homemodel->cartcount2($this->session->u_id);
                $data['cart_price']=$this->homemodel->cartprice2($this->session->u_id);
                $data['shipping_amount']=$this->adminoperation->getshipping();
                
                
                
                 if($this->session->coupon!="")
                 {
                    $coupen_check=$this->homemodel->couponcheck($this->session->coupon);
                    if($coupen_check)
                    {
                        $discount=$this->homemodel->couponamount($this->session->coupon);
                        $data['dis_type']=$discount['cu_type'];
                        $data['dis_rate']=$discount['cu_rate'];
                        $data['discount']=1;
                    }
                    else
                    {
                        $data['discount']=0;
                    }
                }
                else
                {
                    $data['discount']=0;
                }
                
                $this->header(); 
        	    $this->load->view('home/payment',$data);
        	    $this->footer(); 
   }
   public function process()
   {
        $user_id=$this->session->u_id;
        $order_id=$this->randomstring();
        $order_id="FURN-".$order_id;
        $shipping_amount=$this->adminoperation->getshipping();
        $shipping_price=$shipping_amount['s_price'];
        $cart_data=$this->homemodel->cartdata2($this->session->u_id);
        
        if($this->session->coupon!="")
        {
                $coupon_name=$this->session->coupon;
                $coupon_amount=$this->session->coupon_amount;
        }
        else
        {
                $coupon_name=0;
                $coupon_amount=0;
            
        }
        $final_price=0;
        foreach($cart_data AS $key=>$row)
        {
            // echo "<pre>";
            // print_r($row);
            // echo "</pre>";
            
            $cart_id=$row['c_id'];
            $guest_id_id=$row['c_guest_id'];
            $product_id=$row['c_product_id'];
            $product_price=$row['c_price'];
            $quantity=$row['c_quantity'];
            $product_color=$row['c_color'];
            $total_price=$product_price*$quantity;
            $final_price+=$total_price;
            $data=array(
                    'o_key'=>$order_id,
                    'o_cart_id'=>$cart_id,
                    'o_user_id'=>$this->session->u_id,
                    'o_pro_id'=>$product_id,
                    'o_price'=>$product_price,
                    'o_color'=>$product_color,
                    'o_quantity'=>$quantity,
                    'o_total_price'=>$total_price,
                    'o_coupon_used'=>$coupon_name,
                    'o_coupon_discount'=>$coupon_amount,
                    'o_shipping_charge'=>$shipping_price,
                    'o_guest_id'=>$this->session->g_id,
                   );        
            $this->homemodel->order_insert($data);
            $this->homemodel->cart_update_order($cart_id);
            
        }
        $final_price-=$coupon_amount;
        $final_price+=$shipping_price;
        $data=$this->homemodel->get_order_address($this->session->g_id);
        $order_name=$data['od_name'];
        $order_address=$data['od_address'];
        $order_phone=$data['od_phone'];
        $data=array(
                    'o_final_price'=>$final_price,
                    'o_person_name'=>$order_name,
                    'o_phone'=>$order_phone,
                    'o_address'=>$order_address,
                    'o_phone'=>$order_phone,                    
                    'o_date'=>date('Y-m-d'),
                    );
            if($this->homemodel->order_update($data,$order_id))
            {
                $this->session->unset_userdata('coupon');
                $this->session->unset_userdata('coupon_amount');
                redirect('home/confirmation/'.$order_id);
            }
            else
            {
                echo "Something Went Wrong";
            }
   }
   
   public function register()
   {
            $this->form_validation->set_rules('fname','First Name','required|trim|alpha_numeric_spaces');
            $this->form_validation->set_rules('lname','Last Name','required|trim|alpha_numeric_spaces');
            $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.u_email]');
            $this->form_validation->set_rules('phone','Phone No','required|trim|numeric|min_length[10]');
            $this->form_validation->set_rules('pass','Password','required|trim|min_length[8]');
            $this->form_validation->set_rules('cpass','Confirm Password','required|trim|min_length[8]|matches[pass]');
            // $this->form_validation->set_rules('country_id','Country id','required|trim');
            // $this->form_validation->set_rules('state_id','State id','required|trim');
            // $this->form_validation->set_rules('city','City','required|trim');
            // $this->form_validation->set_rules('address','Address','required|trim');
            // $this->form_validation->set_rules('pincode','Pincode','required|trim');
            
            $rand=$this->randomstring();
            if ($this->form_validation->run())
            {   
                    $data=array(
                            'u_fname'=>$this->input->post('fname'),
                            'u_lname'=>$this->input->post('lname'),
                            'u_email'=>$this->input->post('email'),
                            'u_phone'=>$this->input->post('phone'),
                            'u_pass'=>$this->input->post('pass'),
                            'u_code'=>$rand
                           );
                
/*************************************************************************************************************/
                require_once 'mailer/class.phpmailer.php';
                require_once 'mailer/class.smtp.php';
                require_once 'mailer/PHPMailerAutoload.php';


                $show_name='Al-Essa Furniture Co';
        		$reply_email='info@alessafurn.com';
        		$subject='Email Verification';
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
       
         <a href="https://www.alessafurn.com/home/login/token/'.$rand.'" target="_blank" style="text-decoration: none; color: #193769" >Click to verify your account  </a>
       
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
                        $this->session->set_flashdata('error', 'Something Went Wrong Please Try Later');
                        redirect('checkout/account');    
                }
                else
                {
                    if($this->homemodel->useradd($data))
                    {
                       $data=$this->homemodel->user_id_fetch($rand);
                       $this->session->u_id=$data['u_id'];
                       $this->session->u_name=$data['u_fname'];
                       $this->homemodel->cartupdateuser($this->session->g_id,$this->session->u_id);
                         
                       
                        redirect('checkout/shipping');    
                    }
                    else
                    {
                         $this->session->set_flashdata('error', 'Something Went Wrong');
                        redirect('checkout/account');    
                    }
                }
/************************************************************************************************************/
    
            }
            else
            {
                 if($this->session->u_id!="")
                {
                    redirect('checkout/shipping');
                }
                
                $this->session->unset_userdata('guest');
                
                $this->header();
        	    $this->load->view('home/account');
        	    $this->footer(); 
            }
   }   
}














