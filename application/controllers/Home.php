<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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



    }
    public function header()
    {
        $data['c_data']=$this->homemodel->cateview($this->session->lang);
        
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
		$data['meta']="Meta Content";
		$data['keyword']="Meta Keyword";
		$data['slider']=$this->adminoperation->sliderview($this->session->lang);
		$data['products']=$this->homemodel->productview($this->session->lang);
		
		$this->header();
		$this->load->view('home/index',$data);
		$this->footer();
		
	}
	public function footer()
	{
		$data['pages']=$this->adminoperation->pageview($this->session->lang);
		$this->load->view('home/footer',$data);	
	}
	public function page()
	{
		$page_url=$this->uri->segment(3);
		$data['p_data']=$this->homemodel->pageview($page_url);		
		$data['meta']="Meta Content";
		$data['keyword']="Meta Keyword";
        $this->header();
        $this->load->view('home/page',$data);
		$this->footer();

	}
	public function about()
	{
		$data['meta']="Meta Content";
		$data['keyword']="Meta Keyword";
        $this->header();
        $data['about']=$this->adminoperation->getabout($this->session->lang);
        $this->load->view('home/about',$data);
		$this->footer();
	}
	public function contact()
	{
		$data['meta']="Meta Content";
		$data['keyword']="Meta Keyword";
        if($this->uri->segment(3)=='sent')
        {
            $this->form_validation->set_rules('name','Name','required|trim|alpha_numeric_spaces|min_length[3]');
            $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.u_email]');
            $this->form_validation->set_rules('phone','Phone No','required|trim|numeric|min_length[10]');
            $this->form_validation->set_rules('subject','Subject','required|trim');
            $this->form_validation->set_rules('message','Message','required|trim');
            if ($this->form_validation->run())
            {   
                $data=array(
                            'con_name'=>$this->input->post('name'),
                            'con_email'=>$this->input->post('email'),
                            'con_phone'=>$this->input->post('phone'),
                            'con_message'=>$this->input->post('message'),
                            'con_subject'=>$this->input->post('subject'),
                           );
                           
                   if($this->homemodel->contactadd($data))
                    {
                         $this->session->set_flashdata('success', 'Thankyou For Contacting We Will Conatact You Soon');
                         redirect('home/contact');    
                    }
                    else
                    {
                         $this->session->set_flashdata('error', 'Something Went Wrong');
                         redirect('home/contact');    
                    }               
                           
            }
            else
            {
        		$this->header();
        		$data['contact']=$this->adminoperation->getcontact($this->session->lang);
                $this->load->view('home/contact',$data);
                $this->footer();
                
            }
        }
        else
        {
    		$this->header();
    		$data['contact']=$this->adminoperation->getcontact($this->session->lang);
            $this->load->view('home/contact',$data);
            $this->footer();
            
        }

	}	
	public function product()
	{
	    $pro_url=$this->uri->segment(3);
	    $data['meta']="Meta Content";
		$data['keyword']="Meta Keyword";
        $data['product']=$this->homemodel->productsingle($pro_url,$this->session->lang);
        if($data['product']==FALSE)
        {
            ?>
            <script>
                window.history.go(-1);
            </script>
            <?php
        }
        // print_r($data['product']);
        // die();
        $pro_id=$data['product'][0]['pro_id'];
        // echo $pro_id;
        // die();
        if($this->homemodel->checkorder($pro_id,$this->session->u_id))
        {
            $data['can_review']='1';
        }
        else
        {
            $data['can_review']='0';
        }
        $data['products']=$this->homemodel->productview($this->session->lang);
        $this->header();
		if($this->session->lang=="en")
		{
		    $this->load->view('home/product',$data);
		
		}
		else
		{
		    $this->load->view('home/product-ar',$data);
		    
		}
		$this->footer();
		
	}
	public function login()
	{
	    if($this->session->u_id!="")
	    {
                    ?>
                    <script>
                        window.history.go(-1);
                    </script>
                    <?php
	    }
	    $token=$this->uri->segment(3);
	    if(isset($token))
	    {
	        $token=$this->uri->segment(4);
	        if($this->homemodel->checktoken($token))
	        {
    	        if($this->homemodel->verifyuser($token))
    	        {
    	             $this->session->set_flashdata('success', 'Account Successfully Verified');
                     redirect('home/login');
    	        }
    	        else
    	        {
    	            $this->session->set_flashdata('error', 'Something Went Wrong');
                     redirect('home/login');
    	        }
	        }
	    }
	    
        $this->header();
		$this->load->view('home/login');
		$this->footer();
	    
	}
	public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url().'home');
    }
	public function loginaction()
	{
            $this->form_validation->set_rules('user','Email','required|trim');
            $this->form_validation->set_rules('pass','Password','required|trim');
            if ($this->form_validation->run())
            {   
                $user=$this->input->post('user');
                $pass=$this->input->post('pass');                
                $return=$this->homemodel->login($user,$pass);
                if($return)
                {
                    if($return['u_verified']=="0")
                    {
                     $this->session->set_flashdata('error', 'Please verify your account');
                     redirect('home/login');
                    }
                    else if($return['u_status']=="0")
                    {
                     $this->session->set_flashdata('error', 'You are not active please try later');
                    redirect('home/login');                            
                    }
                    else
                    {
                        $this->session->u_id=$return['u_id'];
                        $this->session->u_name=$return['u_fname'];
                        
                        $this->homemodel->cartupdateuser($this->session->g_id,$this->session->u_id);
                        redirect('home/index');                        
                    }
                }
                else
                {
                     $this->session->set_flashdata('error', 'Wrong Email Or Password');
                    redirect('home/login');    
                }
            }
            else
            {
                    $this->header();
            		$this->load->view('home/login');
            		$this->footer();
            } 
	}
	public function signup()
	{
	    if($this->session->u_id!="")
	    {
                    ?>
                    <script>
                        window.history.go(-1);
                    </script>
                    <?php
	    }
	    
        $this->header();
		$this->load->view('home/signup');
		$this->footer();
	    
	}
	public function signupaction()
	{
	    
            $this->form_validation->set_rules('fname','First Name','required|trim|alpha_numeric_spaces');
            $this->form_validation->set_rules('lname','Last Name','required|trim|alpha_numeric_spaces');
            $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.u_email]');
            $this->form_validation->set_rules('phone','Phone No','required|trim|numeric|min_length[10]');
            $this->form_validation->set_rules('pass','Password','required|trim|min_length[8]');
            $this->form_validation->set_rules('cpass','Confirm Password','required|trim|matches[pass]|min_length[8]');
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
                        redirect('home/signup');    
                }
                else
                {
                    if($this->homemodel->useradd($data))
                    {
                         $this->session->set_flashdata('success', 'Sign Up successfull please verify your account from mail ');
                        redirect('home/signup');    
                    }
                    else
                    {
                         $this->session->set_flashdata('error', 'Something Went Wrong');
                        redirect('home/signup');    
                    }
                }
/************************************************************************************************************/
                           

            }
            else
            {
                    $this->header();
            		$this->load->view('home/signup');
            		$this->footer();
            }   
	}
	public function cart()
	{
	   // echo $this->session->coupon."<br>";
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
                $data['discount']=TRUE;
            }
            else
            {
                $data['discount']=FALSE;
            }
        }

	    $this->load->view('home/cart',$data);
	    $this->footer();
	}
	public function checkout()
	{
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
                $data['discount']=TRUE;
            }
            else
            {
                $data['discount']=FALSE;
            }
        }

	    $this->load->view('home/checkout',$data);
	    $this->footer();
    
	}
	public function summery()
	{
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
                $data['discount']=TRUE;
            }
            else
            {
                $data['discount']=FALSE;
            }
        }

	    $this->load->view('home/summery',$data);
	    $this->footer();
    
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
    public function wishlist()
    {
        $this->header();
        $data['w_data2']=$this->homemodel->wishlistfetch();
        $this->load->view('home/wishlist',$data);
        $this->footer();
    }
	public function userdashboard()
	{
	     if($this->session->u_id=="")
	    {
                    ?>
                    <script>
                        window.history.go(-1);
                    </script>
                    <?php
	    }
        
	    $this->header();
	    $data['user_data']=$this->homemodel->userFetch();  
	    $data['countries']=$this->homemodel->countries();  
	    $data['states']=$this->homemodel->states();  
	    $data['country_states']=$this->homemodel->country_states($data['user_data']['u_country']);  
	    
	    
	    $this->load->view('home/dashboard',$data);
	    $this->footer();
	    
	}
	public function category()
	{
	    $cate_id=$this->uri->segment(3);
	    $lang=$this->session->lang;
	    $type=$this->uri->segment(5);
	    $price=$this->uri->segment(7);
	    $page=$this->uri->segment(8);
	    $this->load->library('pagination');   
	    $total_records=$this->homemodel->total_cate_product($cate_id,$type,$price,$lang);
        $segments='home/category/'.$cate_id.'/type/'.$type.'/price/'.$price;
	      $config=[
                
                'base_url'=>base_url($segments),
                'per_page'=>8,
                'total_rows'=>$total_records,
                'full_tag_open'=>'<ul class="pagination" >',
                'full_tag_close'=>'</ul>',
                'next_tag_open'=>'<li>',
                'next_tag_close'=>'</li>',
                'prev_tag_open'=>'<li>',
                'prev_tag_close'=>'</li>',
                'num_tag_open'=>'<li>',
                'num_tag_close'=>'</li>',
                'cur_tag_open'=>'<li class="active"><a>',
                'cur_tag_close'=>'</a></li>',
                'first_tag_open'=>'<li>',
                'first_tag_close'=>'</li>',
                'last_tag_open'=>'<li>',
                'last_tag_close'=>'</li>',
            ];
        $this->pagination->initialize($config);
	    $data['cate_product']=$this->homemodel->cate_product($cate_id,$type,$price,$config['per_page'],$page,$lang);
	    $data['cate_name']=$this->homemodel->cate_name($cate_id,$lang);
	    $data['parent_cate_name']=$this->homemodel->parent_cate_name($data['cate_name']['s_cate_id'],$lang);
	    $this->header();
	    $this->load->view('home/category',$data);
	    $this->footer();
	}
    public function forget()
    {
        $this->header();
	    $this->load->view('home/forget');
	    $this->footer();    
    }
	public function forgetpass()
	{
	    $code=$this->uri->segment(3);
	    if($this->homemodel->forgetpass($code))
	    {
	            $this->header();
        	    $this->load->view('home/forgetform');
        	    $this->footer();
	    }
	    else
	    {
	        redirect(base_url().'home');
	    }
	}
	public function confirmation()
   {
       $order_id=$this->uri->segment(3);
       $this->header();
       $this->load->view('home/confirm.php');
       $this->footer();
   }
   public function myorders()
   {
        if($this->session->u_id=="")
	    {
                    ?>
                    <script>
                        window.history.go(-1);
                    </script>
                    <?php
	    }
        $data['myorder']=$this->homemodel->myorders($this->session->u_id);
        $this->header();
	    $this->load->view('home/myorder',$data);
	    $this->footer();

   }
   public function orderdetails()
   {
        $order_id=$this->uri->segment(3);
        $data['order_data']=$this->homemodel->get_order_details($order_id);
        $this->header();
	    $this->load->view('home/orderdetails',$data);
	    $this->footer();
       
   }
   public function ordercancel()
   {
        
        $data['order_id']=$this->uri->segment(3);
        $this->header();
	    $this->load->view('home/ordercancel',$data);
	    $this->footer();
   }
   public function ordercancelaction()
   {
        $this->form_validation->set_rules('desc','Description','required|trim');
        if ($this->form_validation->run())
        {   
            $desc=$this->input->post('desc');
            $order_id=$this->input->post('order_id');
            
            if($this->homemodel->cancel_add($desc,$order_id))
            {
                $this->session->set_flashdata('success', ' Order Cancelled SuccessFully');
                redirect('home/myorders');
            }
            else
            {
                $this->session->set_flashdata('error', 'Error! Something Went Wrong');
                redirect('home/myorders');
            }
        }
        else
        {

            $data['order_id']=$this->uri->segment(3);
            $this->header();
    	    $this->load->view('home/ordercancel',$data);
    	    $this->footer();                
        }

   }
   public function language()
   {
       $this->session->lang=$this->uri->segment(3);
        ?>
        <script type="text/javascript">
            history.go(-1);
        </script>
        <?php    
   }
   public function mail()
   {
                
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
        		$mail->addAddress('akashphp.anomla@gmail.com');	
        
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
                    echo "Not Sent";
                }
                else
                {
                    echo "SEnt";
                }
   }
}














