<?php 

class Homemodel extends CI_Model{

	public function __construct()
 	{

	}
	public function cateview($lang)
  {
    $this->db->where('c_trash','0');
    $this->db->where('c_status','1');
    $this->db->where('lang',$lang);
    $this->db->order_by('c_order','ASC');
    $data=$this->db->get('category');
    return $data->result_array();

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
	public function pageview($page_url)
	{	
		$this->db->where('p_url',$page_url);
		$data=$this->db->get('page');
		return $data->result_array();
	}
	public function checkorder($pro_id,$user_id)
	{
		$this->db->where('o_user_id',$user_id);
		$this->db->where('o_pro_id',$pro_id);
		$data=$this->db->get('orders');
		if($data->num_rows()>0)
		{
		    return TRUE;
		}
		else
		{
		    return FALSE;
		}
		
	}
    public function productview($lang)
	{	
		$this->db->where('lang',$lang);
		$this->db->where('pro_status','1');
		$this->db->where('pro_trash','0');
		$this->db->order_by('pro_id','DESC');
		$this->db->limit(12,0);
		
		$data=$this->db->get('products');
		return $data->result_array();
	}
	public function productsingle($pro_url,$lang)
	{
	    $this->db->where('lang',$lang);
		$this->db->where('pro_status','1');
		$this->db->where('pro_trash','0');
		$this->db->where('pro_url',$pro_url);
		
		$data=$this->db->get('products');
		
		if($data->num_rows()>0)
		{
		    return $data->result_array();
		}
		else
		{
		    return FALSE;
		}

	}
	public function cartview()
	{
	    if($this->session->user_id=="")
	    {
    	    $this->db->where('c_guest_id',$this->session->guest_id);
	    }
	    else
	    {
    	    $this->db->where('c_user_id',$this->session->user_id);
	    }
		$this->db->where('c_trash','0');
		$data=$this->db->get('cart');
		return $data->result_array();
	}
	public function useradd($data)
	{
	    if($this->db->insert('user',$data))
	    {
	        return TRUE;
	    }
	    else
	    {
	        return FALSE;	        
	    }
	}
	public function contactadd($data)
	{
	    if($this->db->insert('contact',$data))
	    {
	        return TRUE;
	    }
	    else
	    {
	        return FALSE;	        
	    }
	}
    public function login($username,$password)
    {
              $sql="SELECT * FROM `user` WHERE (`u_email`='$username' || `u_phone`='$username') AND `u_pass`='$password'";
              $q = $this->db->query($sql);
              if ($q->num_rows())
              {
                	return $q->row_array();
              }
              else
              {
                	return FALSE;
              }
   }
   public function cartcheck($pro_id,$g_id,$color)
   {
       $this->db->where('c_color',$color);
       $this->db->where('c_product_id',$pro_id);
       $this->db->where('c_guest_id',$g_id);
       $this->db->where('c_trash','0');
		$data=$this->db->get('cart');
		if($data->num_rows()>0)
		{
		    return TRUE;   
		}
		else
		{
		    return FALSE;
		}
   }
   public function wislistcheck($pro_id,$g_id)
   {
       $this->db->where('w_pro_id',$pro_id);
       $this->db->where('w_guest_id',$g_id);
		$data=$this->db->get('wishlist');
		if($data->num_rows()>0)
		{
		    return TRUE;   
		}
		else
		{
		    return FALSE;
		}
   }
   
   public function cartcheckqty($pro_id,$g_id,$color)
   {
       $this->db->where('c_product_id',$pro_id);
       $this->db->where('c_guest_id',$g_id);
       $this->db->where('c_color',$color);
       $this->db->where('c_trash','0');
		$data=$this->db->get('cart');
		$data=$data->result_array();
// 		$qty=$data['c_quantity'];
		return $data;
   }
   
   
    public function cartcheck2($pro_id,$u_id,$color)
   {
        $this->db->where('c_color',$color);
        $this->db->where('c_product_id',$pro_id);
        $this->db->where('c_user_id',$u_id);
        $this->db->where('c_trash','0');
		$data=$this->db->get('cart');
		if($data->num_rows()>0)
		{
		    return TRUE;   
		}
		else
		{
		    return FALSE;
		}
   }
   
    public function wishlistcheck2($pro_id,$u_id)
   {
        $this->db->where('w_pro_id',$pro_id);
        $this->db->where('w_user_id',$u_id);
		$data=$this->db->get('wishlist');
		if($data->num_rows()>0)
		{
		    return TRUE;   
		}
		else
		{
		    return FALSE;
		}
   }
   
   
   public function cartcheckqty2($pro_id,$u_id,$color)
   {
        $this->db->where('c_product_id',$pro_id);
        $this->db->where('c_user_id',$u_id);
        $this->db->where('c_color',$color);
        $this->db->where('c_trash','0');
		$data=$this->db->get('cart');
		$data=$data->result_array();
        return $data;
   }
   
   
   public function cartadd($data)
   {
           if($this->db->insert('cart',$data))
           {
               return TRUE;
           }
           else
           {
               return FALSE;
           }
   }
                        
       public function wishlistadd($data)
      {
           if($this->db->insert('wishlist',$data))
           {
               return TRUE;
           }
           else
           {
               return FALSE;
           }
   }
   public function cartupdate($data,$id)
   {
       $this->db->where('c_id',$id);
        if($this->db->update('cart',$data))
        {
          return TRUE;
        }
        else
        {
          return FALSE;
        }
   }
   
   public function cartcount($g_id)
   {
        $this->db->where('c_guest_id',$g_id);
        $this->db->where('c_trash','0');
		$data=$this->db->get('cart');
		return $data->num_rows();

   }
   public function cartcount2($u_id)
   {
        $this->db->where('c_user_id',$u_id);
        $this->db->where('c_trash','0');
		$data=$this->db->get('cart');
		return $data->num_rows();
   }
   public function cartprice($g_id)
   {
        $this->db->where('c_guest_id',$g_id);
		$data=$this->db->get('cart');
		$price=0;
		foreach($data->result_array() AS $key=>$row)
		{
		    $price+=$row['c_quantity']*$row['c_price'];
		}
		return $price;
   }
   public function cartprice2($u_id)
   {
        $this->db->where('c_user_id',$u_id);
        $this->db->where('c_trash','0');
		$data=$this->db->get('cart');
		$price=0;
		foreach($data->result_array() AS $key=>$row)
		{
		    $price+=$row['c_quantity']*$row['c_price'];
		}
		return $price;
   }
   public function cartfetch($g_id)
   {
        $this->db->where('c_guest_id',$g_id);
        $this->db->where('c_trash','0');
		$data=$this->db->get('cart');
        return $data->result_array();     
   }
   public function cartfetch2($u_id)
   {
        $this->db->where('c_user_id',$u_id);
        $this->db->where('c_trash','0');
		$data=$this->db->get('cart');
        return $data->result_array();       
   }
   
   public function cartproductfetch($pro_id)
   {
          $this->db->where('pro_id',$pro_id);
     	  $data=$this->db->get('products');
        return $data->row_array();     
   }

    public function  cartdelete($id)
    {
       
         $this->db->where('c_id',$id);
     	 if($this->db->delete('cart'))
     	 {
     	     return TRUE;
     	 }
     	 else
     	 {
     	      return FALSE;
     	 }
    }
    public function cartdata($g_id)
    {
        $this->db->select('*')
        ->from('cart')
        ->join('products', 'cart.c_product_id = products.pro_id')
        ->where('c_guest_id',$g_id)
        ->where('c_trash','0');
        $data = $this->db->get();
        return $data->result_array();     
    }
    public function cartdata2($u_id)
    {
        $this->db->select('*')
        ->from('cart')
        ->join('products', 'cart.c_product_id = products.pro_id')
        ->where('c_user_id',$u_id)
        ->where('c_trash','0');
         $data = $this->db->get();
        return $data->result_array();     
    }
    public function cartupdateuser($g_id,$u_id)
    {
        $this->db->where('c_guest_id',$g_id)
             ->set('c_user_id',$u_id)
             ->update('cart');
        
    }
    public function checktoken($token)
    {
            $data=$this->db->where('u_code',$token)
             ->get('user');
             
             if($data->num_rows()>0)
             {
                return TRUE;
             }
             else
             {
                 return FALSE;
             }
    }
    public function verifyuser($token)
    {
            $data=$this->db->where('u_code',$token)
                       ->get('user');
             $row=$data->row_array();
             $user_id=$row['u_id'];
             $return=$this->db->where('u_code',$token)
                              ->set(['u_verified'=>'1','u_code'=>'ok'])
                              ->update('user');
             if($return)
             {
                 return TRUE;
             }
             else
             {
                 return FALSE;
             }
    }
    public function cartqtyupdate($qty,$cart_id)
    {
         $this->db->where('c_id',$cart_id)
                  ->set(['c_quantity'=>$qty])
                  ->update('cart');
                  
        $data=$this->db->where('c_id',$cart_id)
                   ->get('cart');
        return $data->row_array();        
    
    }
    public function couponcheck($couponname)
    {
        $date=date('Y-m-d');
        $this->db->where('cu_name',$couponname);
        // $this->db->where('cu_expiry>=',$date);
        $this->db->where('cu_quantity>=',1);
        $data=$this->db->get('coupon');
        if($data->num_rows()>0)
        {
            return TRUE;    
        }
        else
        {
            return FALSE;
        }
    }
    public function couponamount($couponname)
    {

        $this->db->where('cu_name',$couponname);
        $data=$this->db->get('coupon');
        if($data->num_rows()>0)
        {
            return $data->row_array();    
        }
    }
    public function wishlistfetch()
    {
        if($this->session->u_id=="")
        {
            $g_id=$this->session->g_id;
                    $this->db->select('*')
                        ->from('wishlist')
                        ->join('products', 'wishlist.w_pro_id = products.pro_id')
                        ->where('w_guest_id',$g_id);
                        $data = $this->db->get();
                        return $data->result_array();
        }
        else
        {
                $u_id=$this->session->u_id;
                    $this->db->select('*')
                        ->from('wishlist')
                        ->join('products', 'wishlist.w_pro_id = products.pro_id')
                        ->where('w_user_id',$u_id);
                        $data = $this->db->get();
                        return $data->result_array();
            
        }
    }
    public function wishlistdelete($w_id)
    {
            $this->db->where('w_id',$w_id);
            if($this->db->delete('wishlist'))
            {
                return TRUE;                
            }
            else
            {
                return FALSE;
            }
    }
    public function wishlistcount()
    {
        if($this->session->u_id=="")
        {
            $g_id=$this->session->g_id;
            $this->db->select('*')
            ->from('wishlist')
            ->join('products', 'wishlist.w_pro_id = products.pro_id')
            ->where('w_guest_id',$g_id);
            $data = $this->db->get();
            if($data->num_rows())
            {
                return TRUE;
            }
            else
            {
                return FALSE;
                }
        }
        else
        {
            $u_id=$this->session->u_id;
            $this->db->select('*')
                ->from('wishlist')
                ->join('products', 'wishlist.w_pro_id = products.pro_id')
                ->where('w_user_id',$u_id);
                $data = $this->db->get();
                if($data->num_rows())
                {
                    return TRUE;
                }
                else
                {
                    return FALSE;
                }
        }
    }
    public function userFetch()
    {
        $id=$this->session->u_id;
        $this->db->where('u_id',$id);
        $data=$this->db->get('user');
        return  $data->row_array();
    }
    	public function countries()
	{
	    $data=$this->db->get('countries');
	    return $data->result_array();
	}
	public function states()
	{
	    $data=$this->db->get('states');
	    return $data->result_array();
	}
	public function country_states($country_id)
	{
	    $this->db->where('country_id',$country_id);
	    $data=$this->db->get('states');
	    return $data->result_array();
	    
	}
	public function user_update($data)
	{
	    $this->db->where('u_id',$this->session->u_id);
	    if($this->db->update('user',$data))
	    {
	        return TRUE;
	    }
	    else
	    {
	        return FALSE;
	    }
	}
	public function fetch_state($country_id)
	{   
    	$this->db->where('country_id',$country_id);
    	$data=$this->db->get('states');
	    return $data->result_array();
	}
	public function check_email($email)
	{
        	$this->db->where('u_email',$email);
        	$data=$this->db->get('user');
    	   if($data->num_rows()>0)
    	   {
    	       return TRUE;
    	   }
    	   else
    	   {
    	       return FALSE;    	       
    	   }
        
	}
	public function update_forget($email,$data)
	{
	    $this->db->where('u_email',$email);
	    if($this->db->update('user',$data))
	    {
	        return TRUE;
	    }
	    else
	    {
	        return FALSE;
	    }
	}
	
	public function forgetpass($code)
	{
	    $this->db->where('u_code',$code);
	    $data=$this->db->get('user');
	   if($data->num_rows()>0)
	   {
	       return TRUE;
	   }
	   else
	   {
	       return FALSE;    	       
	   }   
	}
	public function update_pass($data,$code)
	{
	    $this->db->where('u_code',$code);
	    if($this->db->update('user',$data))
	    {
	        return TRUE;
	    }
	    else
	    {
	        return FALSE;
	    }
	}
	public function total_cate_product($cate_id,$type,$price,$lang)
	{
	    $lang=$this->session->lang;
	    $this->db->where('lang',$lang);
		$this->db->where('pro_status','1');
		$this->db->where('pro_trash','0');
		$this->db->where('lang',$lang);
		
		if($type=="new")
		{
		    $this->db->where('pro_new',1);
		}
		if($type=="best")
		{
		    $this->db->where('pro_best',1);		    
		}
		if($type=="popular")
		{
		    $this->db->where('pro_popular',1);		    
		}
		if($type=="hotdeals")
		{
		    $this->db->where('pro_hot',1);		    
		}
		if($type=="featured")
		{
		    $this->db->where('pro_feat',1);		    
		}
		if($price=="1")
		{
		    $this->db->where('pro_sale_price >=', 0);
            $this->db->where('pro_sale_price <=', 100);
		}
		if($price=="2")
		{
		    $this->db->where('pro_sale_price >=', 100);
            $this->db->where('pro_sale_price <=', 500);		    
		}
		if($price=="3")
		{
		    $this->db->where('pro_sale_price >=', 500);
            $this->db->where('pro_sale_price <=', 1000);		    
		}
		if($price=="4")
		{
		    $this->db->where('pro_sale_price >=', 1000);
		}
		$this->db->where('pro_sub_category',$cate_id);
		
		$this->db->order_by('pro_id','DESC');
		$data=$this->db->get('products');
		return $data->num_rows();
	}
	public function cate_product($cate_id,$type,$price,$limit,$offset,$lang)
	{
	    if($offset=="")
	    {
	        $offset="0";
	    }
	    $lang=$this->session->lang;
	    $this->db->where('lang',$lang);
		$this->db->where('pro_status','1');
		$this->db->where('pro_trash','0');
		$this->db->where('lang',$lang);
		
		if($type=="new")
		{
		    $this->db->where('pro_new',1);
		}
		if($type=="best")
		{
		    $this->db->where('pro_best',1);		    
		}
		if($type=="popular")
		{
		    $this->db->where('pro_popular',1);		    
		}
		if($type=="hotdeals")
		{
		    $this->db->where('pro_hot',1);		    
		}
		if($type=="featured")
		{
		    $this->db->where('pro_feat',1);		    
		}
		if($price=="1")
		{
		    $this->db->where('pro_sale_price >=', 0);
            $this->db->where('pro_sale_price <=', 100);
		}
		if($price=="2")
		{
		    $this->db->where('pro_sale_price >=', 100);
            $this->db->where('pro_sale_price <=', 500);		    
		}
		if($price=="3")
		{
		    $this->db->where('pro_sale_price >=', 500);
            $this->db->where('pro_sale_price <=', 1000);		    
		}
		if($price=="4")
		{
		    $this->db->where('pro_sale_price >=', 1000);
		}
		$this->db->where('pro_sub_category',$cate_id);
		
		$this->db->order_by('pro_id','DESC');
		$this->db->limit($limit,$offset);
    
		$data=$this->db->get('products');
		return $data->result_array();
	}
	public function get_user_id($g_id)
	{
	    $this->db->where('u_email',$g_id);
	    $data=$this->db->get('user');
        return $data->row_array();
	}
	public function order_temp($data2)
	{
	    $guest_id=$this->session->g_id;
	    $this->db->where('od_guest_id',$this->session->g_id);
	    $data=$this->db->get('orders_address');
	    if($data->num_rows()<=0)
	    {
    	    if($this->db->insert('orders_address',$data2))
    	    {
    	        return TRUE;
    	    }
    	    else
    	    {
    	        return FALSE;	        
    	    }	        
	    }
	    else
	    {
	        if($this->db->query("DELETE FROM `orders_address` WHERE `od_guest_id`='$guest_id' "))
	        {
        	    if($this->db->insert('orders_address',$data2))
        	    {
        	        return TRUE;
        	    }
        	    else
        	    {
        	        return FALSE;	        
        	    }		            
	        }
	    }

	}
	public function get_country_name($country_id)
	{
	    $this->db->where('country_id',$country_id);
	    $data=$this->db->get('countries');
	    $country_name=$data->row_array();
	    return $country_name['country_name'];
	}
	public function get_state_name($state_id)
	{
	    $this->db->where('st_id',$state_id);
	    $data=$this->db->get('states');
	    $state_name=$data->row_array();
	    return $state_name['state_name'];	    
	}
	public function get_order_address($guest_id)
	{
	    $this->db->where('od_guest_id',$guest_id);
	    $data=$this->db->get('orders_address');
        $data=$data->row_array();;
        return $data; 
	}
	public function order_insert($data)
	{
	    
	    if($this->db->insert('orders',$data))
	    {
	        return TRUE;
	    }
	    else
	    {
	        return FALSE;	        
	    }
	}
	public function order_update($data,$order_id)
    {
        $this->db->where('o_key',$order_id);
        if($this->db->update('orders',$data))
        {
          return TRUE;
        }
        else
        {
          return FALSE;
        }
    }
    public function cart_update_order($cart_id)
    {
        $this->db->where('c_id',$cart_id);
        $this->db->update('cart',array('c_trash'=>'1'));
    }
    public function user_id_fetch($rand)
    {
        $this->db->where('u_code',$rand);
        $data=$this->db->get('user');
        return $data->row_array();
    }
    public function shipping_update($data,$id)
    {
        $this->db->where('u_id',$id);
        if($this->db->update('user',$data))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    public function myorders($u_id)
    {
        $this->db->where('o_user_id',$u_id);
        $this->db->group_by('o_key');
        $this->db->order_by('o_id','DESC');
        $data=$this->db->get('orders');
        return $data->result_array();
    }
    public function get_order_details($order_id)
    {
        $this->db->select('*')
        ->from('orders')
        ->join('products', 'orders.o_pro_id = products.pro_id')
        ->where('o_key',$order_id);
        $data = $this->db->get();
        return $data->result_array(); 
        
    }
    public function cancel_add($desc,$order_id)
    {
        $data=array(
                        'c_order_id'=>$order_id,
                        'c_desc'=>$desc,
                    
                    );
        if($this->db->insert('cancel',$data))
        {
            $this->db->where('o_key',$order_id);
            $retrun =$this->db->update('orders',array('o_user_status'=>'cancelled'));
            return TRUE;
        }
        else
        {
            return FALSE;
        }
        
    }
    public function cate_name($cate_id,$lang)
    {
         $this->db->where('s_id',$cate_id);
        $data=$this->db->get('sub_category');
        return $data->row_array();
    }
    public function parent_cate_name($cate_id,$lang)
    {
        $this->db->where('c_id',$cate_id);
        $data=$this->db->get('category');
        return $data->row_array();
    }
}

?>