<?php

class Adminoperation extends CI_Model{

	public function __construct()
  {

	}
/***************************Category Models******************************************************************/    

  public function cateadd($data)
  {
      $this->db->select_max('c_order');      
      $this->db->where('c_trash!=','1');
      $this->db->where('lang',$this->session->lang);
      $q = $this->db->get('category');
      if ($q->num_rows())
      {
             $q = $q->row_array();
             $q = $q['c_order'];
             $q++;
             $data['c_order']=$q;
             if ($this->db->insert('category', $data)) 
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
           $data['c_order']='1';
           if ($this->db->insert('category', $data)) 
           {
            return TRUE;
           }
           else
           {
            return FALSE;
           }
      }
  }
  public function cateview($lang)
  {
    $this->db->where('c_trash','0');
    $this->db->where('lang',$lang);
    $this->db->order_by('c_order','ASC');
    $data=$this->db->get('category');
    return $data->result_array();

  }
  public function catedelete($id)
  {
    $this->db->set('c_trash','1');
    $this->db->where('c_id',$id);
    $this->db->update('category');
    return TRUE;
  }
  public function cateactive($id)
  {
    $this->db->set('c_status','1');
    $this->db->where('c_id',$id);
    $this->db->update('category');
    return TRUE;
  }
  public function catedeactive($id)
  {

    $this->db->set('c_status','0');
    $this->db->where('c_id',$id);
    $this->db->update('category');
    return TRUE;
  }
    public function cateeditcheck($id,$lang)
    {
      $this->db->where('c_id',$id);
      $this->db->where('lang',$lang);
      $this->db->where('c_trash','0');
      $data=$this->db->get('category');
    
      if ($data->num_rows()>0) 
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }
    
    }
  public function cateedit($id)
  {
    $this->db->where('c_id',$id);
    $data=$this->db->get('category');
    return $data->result_array();
  }
  
  public function cateeditdata($data,$id)
  {
    $this->db->where('c_id',$id);
    if($this->db->update('category',$data))
    {
      return TRUE;
    }
    else
    {
      return FALSE;
    }
  }
/***************************Category Models end******************************************************************/    


/***************************Sub Category Models******************************************************************/    
  
  public function subcateadd($data)
  {
    $this->db->select_max('s_order');      
      $this->db->where('s_trash!=','1');
      $this->db->where('lang',$this->session->lang);
      $q = $this->db->get('sub_category');
      if ($q->num_rows()>0)
      {
             $q = $q->row_array();
             $q = $q['s_order'];
             $q++;
             $data['s_order']=$q;
             $status=$this->db->insert('sub_category', $data);
             if ($status) 
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
           $data['s_order']='1';
           $status=$this->db->insert('category', $data);
           if ($status) 
           {
            return TRUE;
           }
           else
           {
            return FALSE;
           }
      }
  }
  public function subcateview($lang)
  {
    $this->db->where('lang',$lang);
    $this->db->where('s_trash','0');
    $this->db->order_by('s_cate_id','ASC');
    $data=$this->db->get('sub_category');
    return $data->result_array();

  }
  public function subcateview2($lang,$id)
  {
    $this->db->where('lang',$lang);
    $this->db->where('s_trash','0');
    $this->db->where('s_cate_id',$id);
    $this->db->order_by('s_order','ASC');
    $data=$this->db->get('sub_category');
    return $data->result_array();

  }
  
  public function subcatedelete($id)
  {
    $this->db->set('s_trash','1');
    $this->db->where('s_id',$id);
    $this->db->update('sub_category');
    return TRUE;
  }
  public function subcateactive($id)
  {
    $this->db->set('s_status','1');
    $this->db->where('s_id',$id);
    $this->db->update('sub_category');
    return TRUE;
  }
  public function subcatedeactive($id)
  {

    $this->db->set('s_status','0');
    $this->db->where('s_id',$id);
    $this->db->update('sub_category');
    return TRUE;
  }
   public function subcateeditcheck($id,$lang)
    {
      $this->db->where('s_id',$id);
      $this->db->where('lang',$lang);
      $this->db->where('s_trash','0');
      $data=$this->db->get('sub_category');
    
      if ($data->num_rows()>0) 
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }
    
    }
  public function subcateedit($id)
  {
    $this->db->where('s_id',$id);
    $data=$this->db->get('sub_category');
    return $data->result_array();
  }
  public function subcateeditdata($data,$id)
  {
    $this->db->where('s_id',$id);
    if($this->db->update('sub_category',$data))
    {
      return TRUE;
    }
    else
    {
      return FALSE;
    }
  }
/*************************************Sub Category Model Ends Here *********************************************************/
/************************************Brands model************************************************************************/
  public function brandadd($data)
  {
     if ($this->db->insert('brand', $data)) 
       {
        return TRUE;
       }
       else
       {
        return FALSE;
       }
  }
  public function brandview($lang)
  {
    $this->db->where('b_trash','0');
    $this->db->where('lang',$lang);
    $data=$this->db->get('brand');
    return $data->result_array();

  }
  public function branddelete($id)
  {
    $this->db->set('b_trash','1');
    $this->db->where('b_id',$id);
    $this->db->update('brand');
    return TRUE;
  }
  public function brandactive($id)
  {
    $this->db->set('b_status','1');
    $this->db->where('b_id',$id);
    $this->db->update('brand');
    return TRUE;
  }
  public function branddeactive($id)
  {

    $this->db->set('b_status','0');
    $this->db->where('b_id',$id);
    $this->db->update('brand');
    return TRUE;
  }
    public function brandeditcheck($id,$lang)
    {
      $this->db->where('b_id',$id);
      $this->db->where('lang',$lang);
      $this->db->where('b_trash','0');
      $data=$this->db->get('brand');
    
      if ($data->num_rows()>0) 
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }
    
    }
  public function brandedit($id)
  {
    $this->db->where('b_id',$id);
    $data=$this->db->get('brand');
    return $data->result_array();
  }
  
  public function brandeditdata($data,$id)
  {
    $this->db->where('b_id',$id);
    if($this->db->update('brand',$data))
    {
      return TRUE;
    }
    else
    {
      return FALSE;
    }
  }

/********************************************************Brands Model Ends**************************************************************************/
/*************************************Slider Edit ********************************************************************/

  public function slideradd($data)
  {
      $this->db->select_max('sl_order');      
      $this->db->where('sl_trash!=','1');      
      $q = $this->db->get('slider');
      if ($q->num_rows())
      {
             $q = $q->row_array();
             $q = $q['sl_order'];
             $q++;
             $data['sl_order']=$q;
             if ($this->db->insert('slider', $data)) 
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
           $data['sl_order']='1';
           if ($this->db->insert('slider', $data)) 
           {
            return TRUE;
           }
           else
           {
            return FALSE;
           }
      }
  }


    public function sliderview($lang)
    {
      $this->db->where('lang',$lang);
      $this->db->where('sl_trash','0');
      $this->db->order_by('sl_order','ASC');
      $data=$this->db->get('slider');
      return $data->result_array();

    }
    public function sliderdelete($id)
    {
      $this->db->set('sl_trash','1');
      $this->db->where('sl_id',$id);
      $this->db->update('slider');
      return TRUE;
    }
    public function slideractive($id)
    {
      $this->db->set('sl_status','1');
      $this->db->where('sl_id',$id);
      $this->db->update('slider');
      return TRUE;
    }
    public function sliderdeactive($id)
    {

      $this->db->set('sl_status','0');
      $this->db->where('sl_id',$id);
      $this->db->update('slider');
      return TRUE;
    }

    public function slidereditcheck($id,$lang)
    {
      $this->db->where('sl_id',$id);
      $this->db->where('lang',$lang);
      $this->db->where('sl_trash','0');
      $data=$this->db->get('slider');

      if ($data->num_rows()>0) 
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }

    }

    public function slideredit($id)
    {
      $this->db->where('sl_id',$id);
      $data=$this->db->get('slider');
      return $data->result_array();
    }
    public function slidereditdata($data,$id)
    {
      $this->db->where('sl_id',$id);
      if($this->db->update('slider',$data))
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }
    }
/*************************************Slider Edit End********************************************************************/


/*************************************Page Model********************************************************************/

    

    public function pageadd($data)
    {
        if ($this->db->insert('page', $data)) 
         {
          return TRUE;
         }
         else
         {
          return FALSE;
         }
    }

    public function pageview($lang)
    {
      $this->db->where('lang',$lang);
      $this->db->where('p_trash','0');
      $data=$this->db->get('page');
      return $data->result_array();
    }

    public function pagedelete($id)
    {
      $this->db->set('p_trash','1');
      $this->db->where('p_id',$id);
      $this->db->update('page');
      return TRUE;
    }
    public function pageactive($id)
    {
      $this->db->set('p_status','1');
      $this->db->where('p_id',$id);
      $this->db->update('page');
      return TRUE;
    }
    public function pagedeactive($id)
    {

      $this->db->set('p_status','0');
      $this->db->where('p_id',$id);
      $this->db->update('page');
      return TRUE;
    }

    public function pageeditcheck($id,$lang)
    {
      $this->db->where('p_id',$id);
      $this->db->where('lang',$lang);
      $this->db->where('p_trash','0');
      $data=$this->db->get('page');

      if ($data->num_rows()>0) 
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }

    }
  
    public function pageedit($id)
    {
      $this->db->where('p_id',$id);
      $data=$this->db->get('page');
      return $data->result_array();
    }
    public function pageeditdata($data,$id)
    {
      $this->db->where('p_id',$id);
      if($this->db->update('page',$data))
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }
    }

    public function fetchsubcate($id)
    {
      $this->db->where('s_cate_id',$id);
      $this->db->where('s_status','1');
      $this->db->where('s_trash','0');
      
      $data=$this->db->get('sub_category');
      return $data->result_array();
      
        
    }
/***********************************************/

    public function productadd($product)
    {
        if($this->db->insert('products',$product))
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
        $this->db->where('pro_trash','0');
        $this->db->where('lang',$lang);
        $this->db->order_by('pro_id','DESC');
        $data=$this->db->get('products');
        return $data->result_array();
    
      }
      public function productdelete($id)
      {
        $this->db->set('pro_trash','1');
        $this->db->where('pro_id',$id);
        $this->db->update('products');
        return TRUE;
      }
      public function productactive($id)
      {
        $this->db->set('pro_status','1');
        $this->db->where('pro_id',$id);
        $this->db->update('products');
        return TRUE;
      }
      public function productdeactive($id)
      {
    
        $this->db->set('pro_status','0');
        $this->db->where('pro_id',$id);
        $this->db->update('products');
        return TRUE;
      }
      
      public function producteditcheck($id,$lang)
       {
          $this->db->where('pro_id',$id);
          $this->db->where('lang',$lang);
          $this->db->where('pro_trash','0');
          $data=$this->db->get('products');
        
          if ($data->num_rows()>0) 
          {
            return TRUE;
          }
          else
          {
            return FALSE;
          }
        
      } 
    public function productedit($id)
    {
      $this->db->where('pro_id',$id);
      $data=$this->db->get('products');
      return $data->row_array();
    }
    
    public function producteditdata($data,$id)
    {
      $this->db->where('pro_id',$id);
      if($this->db->update('products',$data))
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }
    }
    
    public function contactview()
    {
          $this->db->where('con_trash','0');
          $data=$this->db->get('contact');
          return $data->result_array();
    }
    public function contactdelete($id)
    {
           $this->db->set('con_trash','1');
            $this->db->where('con_id',$id);
            $this->db->update('contact');
            return TRUE;
    }

    public function couponadd($data)
    {
        if($this->db->insert('coupon',$data))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    public function couponview()
    {
        $this->db->where('cu_trash','0');
        $data=$this->db->get('coupon');
        return $data->result_array();
    }
    
      public function coupondelete($id)
      {
        $this->db->set('cu_trash','1');
        $this->db->where('cu_id',$id);
        $this->db->update('coupon');
        return TRUE;
      }
      public function couponactive($id)
      {
        $this->db->set('cu_status','1');
        $this->db->where('cu_id',$id);
        $this->db->update('coupon');
        return TRUE;
      }
      public function coupondeactive($id)
      {
        $this->db->set('cu_status','0');
        $this->db->where('cu_id',$id);
        $this->db->update('coupon');
        return TRUE;
      }
      public function couponedit($id)
      {
        $this->db->where('cu_id',$id);
        $data=$this->db->get('coupon');
        return $data->row_array();
      }
      
      public function couponeditdata($data,$id)
      {
        $this->db->where('cu_id',$id);
        if($this->db->update('coupon',$data))
        {
          return TRUE;
        }
        else
        {
          return FALSE;
        }
      }
      public function customerview()
      {
        $data=$this->db->get('user');
        return $data->result_array();
      }
      
      public function customeractive($id)
      {
        $this->db->set('u_status','1');
        $this->db->where('u_id',$id);
        $this->db->update('user');
        return TRUE;
      }
      public function customerdeactive($id)
      {
        $this->db->set('u_status','0');
        $this->db->where('u_id',$id);
        $this->db->update('user');
        return TRUE;
      }
      public function orders_view()
      {
          $this->db->select('*')
        ->from('orders')
        ->join('products', 'orders.o_pro_id = products.pro_id')
        ->group_by('o_key')
        ->order_by('o_id','DESC');
        $data = $this->db->get();
        return $data->result_array();  
          
      }
    public function order_update($order_id,$status)
    {
        $this->db->where('o_key',$order_id);
        $return=$this->db->update('orders',array('o_status'=>$status));
        if($return)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    public function get_order_detail($order_id)
    {
         $this->db->select('*')
        ->from('orders')
        ->join('products', 'orders.o_pro_id = products.pro_id')
        ->where('o_key',$order_id);
        $data = $this->db->get();
        return $data->result_array(); 
    }
    public function coloradd($data)
    {
        if ($this->db->insert('color', $data)) 
           {
            return TRUE;
           }
           else
           {
            return FALSE;
           }
    }
  public function colorview()
  {
    $this->db->where('c_trash','0');
    // $this->db->where('lang',$lang);
    // $this->db->order_by('c_order','ASC');
    $data=$this->db->get('color');
    return $data->result_array();

  }
  public function colordelete($id)
  {
    $this->db->set('c_trash','1');
    $this->db->where('c_id',$id);
    $this->db->update('color');
    return TRUE;
  }
//   public function cateactive($id)
//   {
//     $this->db->set('c_status','1');
//     $this->db->where('c_id',$id);
//     $this->db->update('category');
//     return TRUE;
//   }
//   public function catedeactive($id)
//   {

//     $this->db->set('c_status','0');
//     $this->db->where('c_id',$id);
//     $this->db->update('category');
//     return TRUE;
//   }
  
    public function coloredit($id)
      {
        $this->db->where('c_id',$id);
        $data=$this->db->get('color');
        return $data->row_array();
      }
      
      public function coloreditdata($data,$id)
      {
        $this->db->where('c_id',$id);
        if($this->db->update('color',$data))
        {
          return TRUE;
        }
        else
        {
          return FALSE;
        }
      }
      
      public function get_admin_data($admin_id)
      {
          $this->db->where('a_id',$admin_id);
          $data=$this->db->get('admin');
          return $data->row_array();      

      }
      public function admin_update($data,$id)
      {
          $this->db->where('a_id',$id);
        if($this->db->update('admin',$data))
        {
          return TRUE;
        }
        else
        {
          return FALSE;
        }
      }
      public function getshipping()
      {
          $this->db->where('s_id','1');
          $data=$this->db->get('shipping');
          return $data->row_array();      
          
      }
      public function shipping_update($data,$id)
      {
        $this->db->where('s_id',$id);
        if($this->db->update('shipping',$data))
        {
          return TRUE;
        }
        else
        {
          return FALSE;
        }
      }
      public function getabout($lang)
      {
          $this->db->where('lang',$lang);
          $data=$this->db->get('about_cms');
          return $data->row_array();  
      }
      public function about_update($data,$lang)
      {
          $this->db->where('lang',$lang);
        if($this->db->update('about_cms',$data))
        {
          return TRUE;
        }
        else
        {
          return FALSE;
        }
      }
      
       public function getcontact($lang)
      {
          $this->db->where('lang',$lang);
          $data=$this->db->get('contact_cms');
          return $data->row_array();  
      }
      public function contact_update($data,$lang)
      {
          $this->db->where('lang',$lang);
        if($this->db->update('contact_cms',$data))
        {
          return TRUE;
        }
        else
        {
          return FALSE;
        }
      }
      
}


















