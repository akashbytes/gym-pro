<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admindashboard extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('adminoperation');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        if(!$this->session->userdata('admin_id'))
        {
            redirect(base_url().'admin');
        }
    }
    public function index()
    {   
            $this->load->view('admin/header');
            $this->load->view('admin/dashboard');
    }
/***************************Category Operations******************************************************************/    
    public function cateadd()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/cateadd');
    }

    public function cateaddaction()
    {
        $this->form_validation->set_rules('cate_name','Category Name','required|trim|is_unique[category.c_name]');
        if ($this->form_validation->run())
        {   
            $data=array(
                            'c_name'=>$this->input->post('cate_name'),
                            'lang'=>$this->session->lang,
                       );
            if($this->adminoperation->cateadd($data))
            {
                 $this->session->set_flashdata('success', 'Category Added SuccessFully');
                redirect('admindashboard/cateadd');    
            }
            else
            {
                 $this->session->set_flashdata('error', 'Something Went Wrong');
                redirect('admindashboard/cateadd');    
            }
        }
        else
        {
                $this->load->view('admin/header');
                $this->load->view('admin/cateadd');
        }

    }

    public function cateview()
    {

        if ($this->uri->segment(3)!='') 
        {
            $uri=$this->uri->segment(3);
            $id=$this->uri->segment(4);
            if ($uri=='delete') 
            {
                if($this->adminoperation->catedelete($id))
                {
                    $data['delete']='Category Deleted SuccessFully';
                }
            }
            if ($uri=='active') 
            {
                if($this->adminoperation->cateactive($id))
                {
                    $data['active']='Category Activated SuccessFully';
                }

            }
            if ($uri=='deactive') 
            {
                if($this->adminoperation->catedeactive($id))
                {
                    $data['deactivate']='Category Deactivated SuccessFully';
                }
            }
        }
        $data['c_data']=$this->adminoperation->cateview($this->session->lang);
        $this->load->view('admin/header');
        $this->load->view('admin/cateview',$data);
    }
    public function cateedit()
    {
        $id=$this->uri->segment(3);
        if($this->adminoperation->cateeditcheck($id,$this->session->lang))
        {
            if ($this->uri->segment(4)=='update') 
            {
                $this->form_validation->set_rules('cate_order','Category Order','required|trim');
                // $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
                if ($this->form_validation->run())
                { 
                    $data=array(
                                    'c_name'=>$this->input->post('cate_name'),
                                    'c_order'=>$this->input->post('cate_order'),
                               );
                    if($this->adminoperation->cateeditdata($data,$id))
                    {
                        $this->session->set_flashdata('success', 'Category Updated SuccessFully');
                        $data['c_data']=$this->adminoperation->cateedit($id);
                        $this->load->view('admin/header');
                        $this->load->view('admin/cateedit',$data);
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Something Went Wrong');
                        $data['c_data']=$this->adminoperation->cateedit($id);
                        $this->load->view('admin/header');
                        $this->load->view('admin/cateedit',$data);
                    }
                }
                else
                {
                    $data['c_data']=$this->adminoperation->cateedit($id);
                    $this->load->view('admin/header');
                    $this->load->view('admin/cateedit',$data);
                }
            }
            else
            {
    
            $data['c_data']=$this->adminoperation->cateedit($id);
            $this->load->view('admin/header');
            $this->load->view('admin/cateedit',$data);
    
            }    
        }
        else
        {
            redirect(base_url().'admindashboard/cateview');
        }
        
    }
    
/***************************Category Operations end******************************************************************/    

/***************************Sub Category Operations******************************************************************/    
    public function subcateadd()
    {
        $data['c_data']=$this->adminoperation->cateview($this->session->lang);
        $this->load->view('admin/header');
        $this->load->view('admin/subcateadd',$data);

    }
    public function subcateaddaction()
    {
        $this->form_validation->set_rules('cate_name','Category Name','required|trim');
        $this->form_validation->set_rules('sub_cate_name','Category Name','required|trim');
        if ($this->form_validation->run())
        {   
            $data=array(
                            's_name'=>$this->input->post('sub_cate_name'),
                            's_cate_id'=>$this->input->post('cate_name'),
                            'lang'=>$this->session->lang,
                       );
            if($this->adminoperation->subcateadd($data))
            {
                 $this->session->set_flashdata('success', 'Sub Category Added SuccessFully');
                redirect('admindashboard/subcateadd');    
            }
            else
            {
                 $this->session->set_flashdata('error', 'Something Went Wrong');
                redirect('admindashboard/subcateadd');    
            }
        }
        else
        {
        $data['c_data']=$this->adminoperation->cateview($this->session->lang);
        $this->load->view('admin/header');
        $this->load->view('admin/subcateadd',$data);
        }   
    }
    
    public function subcateview()
    {
         if ($this->uri->segment(3)!='') 
        {
            $uri=$this->uri->segment(3);
            $id=$this->uri->segment(4);
            if ($uri=='delete') 
            {
                if($this->adminoperation->subcatedelete($id))
                {
                    $data['delete']='Category Deleted SuccessFully';
                }
            }
            if ($uri=='active') 
            {
                if($this->adminoperation->subcateactive($id))
                {
                    $data['active']='Category Activated SuccessFully';
                }

            }
            if ($uri=='deactive') 
            {
                if($this->adminoperation->subcatedeactive($id))
                {
                    $data['deactivate']='Category Deactivated SuccessFully';
                }
            }
        }
        $data['c_data']=$this->adminoperation->cateview($this->session->lang);
        $data['s_data']=$this->adminoperation->subcateview($this->session->lang);
        $this->load->view('admin/header');
        $this->load->view('admin/subcateview',$data);

    }

    public function subcateedit()
    {
        $id=$this->uri->segment(3);

        if($this->adminoperation->subcateeditcheck($id,$this->session->lang))
        {
            if ($this->uri->segment(4)=='update') 
            {
                $this->form_validation->set_rules('cate_name','Category Name','required|trim');
                $this->form_validation->set_rules('sub_cate_name','Sub Category Name','required|trim');
                $this->form_validation->set_rules('sub_cate_order','Sub Category Order','required|trim');
                if ($this->form_validation->run())
                { 
                    $data=array(
                                    's_name'=>$this->input->post('sub_cate_name'),
                                    's_cate_id'=>$this->input->post('cate_name'),
                                    's_order'=>$this->input->post('sub_cate_order'),
                               );
                    if($this->adminoperation->subcateeditdata($data,$id))
                    {
                        $this->session->set_flashdata('success', 'Category Updated SuccessFully');
                        $data['s_data']=$this->adminoperation->subcateedit($id);
                        $data['c_data']=$this->adminoperation->cateview($this->session->lang);
                        $this->load->view('admin/header');
                        $this->load->view('admin/subcateedit',$data);
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Something Went Wrong');
                        $data['s_data']=$this->adminoperation->subcateedit($id);
                        $data['c_data']=$this->adminoperation->cateview($this->session->lang);
                        $this->load->view('admin/header');
                        $this->load->view('admin/subcateedit',$data);              
                    }
                }
                else
                {
                    $data['s_data']=$this->adminoperation->subcateedit($id);
                    $data['c_data']=$this->adminoperation->cateview($this->session->lang);                
                    $this->load->view('admin/header');
                    $this->load->view('admin/subcateedit',$data);
                }
            }
            else
            {
    
            $data['s_data']=$this->adminoperation->subcateedit($id);
            $data['c_data']=$this->adminoperation->cateview($this->session->lang);
            $this->load->view('admin/header');
            $this->load->view('admin/subcateedit',$data);
            }    
        }
        else
        {
            redirect(base_url().'admindashboard/subcateview');   
        }
        
        
    }
/***************************Sub Category Operations End******************************************************************/    
/*******************************Brands Operation*************************************************************************/
    public function brandadd()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/brandadd');
    }

    public function brandaddaction()
    {
        $this->form_validation->set_rules('brand_name','brand Name','required|trim');
        if ($this->form_validation->run())
        {   
            $data=array(
                            'b_name'=>$this->input->post('brand_name'),
                            'lang'=>$this->session->lang,
                       );
            if($this->adminoperation->brandadd($data))
            {
                 $this->session->set_flashdata('success', 'Brand Added SuccessFully');
                redirect('admindashboard/brandadd');    
            }
            else
            {
                 $this->session->set_flashdata('error', 'Something Went Wrong');
                redirect('admindashboard/brandadd');    
            }
        }
        else
        {
                $this->load->view('admin/header');
                $this->load->view('admin/brandadd');
        }

    }

    public function brandview()
    {

        if ($this->uri->segment(3)!='') 
        {
            $uri=$this->uri->segment(3);
            $id=$this->uri->segment(4);
            if ($uri=='delete') 
            {
                if($this->adminoperation->branddelete($id))
                {
                    $data['delete']='Brand Deleted SuccessFully';
                }
            }
            if ($uri=='active') 
            {
                if($this->adminoperation->brandactive($id))
                {
                    $data['active']='Brand Activated SuccessFully';
                }

            }
            if ($uri=='deactive') 
            {
                if($this->adminoperation->branddeactive($id))
                {
                    $data['deactivate']='Brand Deactivated SuccessFully';
                }
            }
        }
        $data['c_data']=$this->adminoperation->brandview($this->session->lang);
        $this->load->view('admin/header');
        $this->load->view('admin/brandview',$data);
    }
    public function brandedit()
    {
        $id=$this->uri->segment(3);
        if($this->adminoperation->brandeditcheck($id,$this->session->lang))
        {
            if ($this->uri->segment(4)=='update') 
            {
                $this->form_validation->set_rules('brand_name','brand Name','required|trim');
                if ($this->form_validation->run())
                { 
                    $data=array(
                                    'b_name'=>$this->input->post('brand_name'),
                               );
                    if($this->adminoperation->brandeditdata($data,$id))
                    {
                        $this->session->set_flashdata('success', 'brand Updated SuccessFully');
                        $data['c_data']=$this->adminoperation->brandedit($id);
                        $this->load->view('admin/header');
                        $this->load->view('admin/brandedit',$data);
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Something Went Wrong');
                        $data['c_data']=$this->adminoperation->brandedit($id);
                        $this->load->view('admin/header');
                        $this->load->view('admin/brandedit',$data);
                    }
                }
                else
                {
                    $data['c_data']=$this->adminoperation->brandedit($id);
                    $this->load->view('admin/header');
                    $this->load->view('admin/brandedit',$data);
                }
            }
            else
            {
    
            $data['c_data']=$this->adminoperation->brandedit($id);
            $this->load->view('admin/header');
            $this->load->view('admin/brandedit',$data);
    
            }    
        }
        else
        {
            redirect(base_url().'admindashboard/brandview');
        }
        
    }
/**********************************************Brands Operation Ends************************************************************************/    
/****************************Slider Operations *******************************************************************/

    public function slideradd()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/slideradd');
    }

    public function slideraddaction()
    {

        $this->form_validation->set_rules('sl_text','Slider Content','required|trim');
        $this->form_validation->set_rules('sl_link_text','Slider link Text','required|trim');
        $this->form_validation->set_rules('sl_link','Slider link ','required|trim');
        if ($this->form_validation->run())
        {   
                $config['upload_path'] = './images/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_width'] = '600';
                $config['min_width'] = '300';
                $config['max_height'] = '600';
                $config['min_height'] = '300';
                // $config['encrypt_name'] = TRUE;

                $this->load->library('upload',$config);
                if ($this->upload->do_upload('sl_image')) 
                {
                    $data1['img_upload_name']=$this->upload->data();
                     $data=array(
                            'sl_text'=>$this->input->post('sl_text'),
                            'sl_link_text'=>$this->input->post('sl_link_text'),
                            'sl_link'=>$this->input->post('sl_link'),
                            'sl_image'=>$data1['img_upload_name']['file_name'],
                            'lang'=>$this->session->lang,
                            );
                    if($this->adminoperation->slideradd($data))
                    {
                        $this->session->set_flashdata('success', 'Slider Added SuccessFully');
                        redirect('admindashboard/slideradd');  
                    }
                    else
                    {
                       $this->session->set_flashdata('error', 'Something Went Wrong');
                       redirect('admindashboard/slideradd'); 
                    }
                }
                else
                {
                    $data['upload_error']=$this->upload->display_errors();
                    $this->load->view('admin/header');
                    $this->load->view('admin/slideradd',$data);
                }
        }
        else
        {
                $this->load->view('admin/header');
                $this->load->view('admin/slideradd');
        }

    }

    public function sliderview()
    {
        if ($this->uri->segment(3)!='') 
        {
            $uri=$this->uri->segment(3);
            $id=$this->uri->segment(4);
            if ($uri=='delete') 
            {
                if($this->adminoperation->sliderdelete($id))
                {
                    $data['delete']='Slider Deleted SuccessFully';
                }
            }
            if ($uri=='active') 
            {
                if($this->adminoperation->slideractive($id))
                {
                    $data['active']='Slider Activated SuccessFully';
                }

            }
            if ($uri=='deactive') 
            {
                if($this->adminoperation->sliderdeactive($id))
                {
                    $data['deactivate']='Slider Deactivated SuccessFully';
                }
            }
        }
        $data['images']=$this->adminoperation->sliderview($this->session->lang);
        $this->load->view('admin/header');
        $this->load->view('admin/sliderview',$data);

    }
    public function slideredit()
    {
        $id=$this->uri->segment(3);

        if($this->adminoperation->slidereditcheck($id,$this->session->lang))
        {
           if ($this->uri->segment(4)=='update') 
            {
                $this->form_validation->set_rules('sl_text','Slider Content','trim');
                $this->form_validation->set_rules('sl_link_text','Slider link Text','trim');
                $this->form_validation->set_rules('sl_link','Slider link ','trim');
                $this->form_validation->set_rules('sl_order','Slider Order ','required|trim');
                if ($this->form_validation->run())
                { 

                    if ($_FILES['sl_image']['name']=="") 
                    {
                        $data=array(
                                'sl_text'=>$this->input->post('sl_text'),
                                'sl_link_text'=>$this->input->post('sl_link_text'),
                                'sl_link'=>$this->input->post('sl_link'),
                                'sl_order'=>$this->input->post('sl_order'),
                                );
                           if($this->adminoperation->slidereditdata($data,$id))
                            {
                                $this->session->set_flashdata('success', 'Slider Updated SuccessFully');
                                $data['sl_data']=$this->adminoperation->slideredit($id);
                                $this->load->view('admin/header');
                                $this->load->view('admin/slideredit',$data);
                            }
                            else
                            {
                                $this->session->set_flashdata('error', 'Something Went Wrong');
                                $data['sl_data']=$this->adminoperation->slideredit($id);
                                $this->load->view('admin/header');
                                $this->load->view('admin/slideredit',$data);
                            }
                    }
                    else
                    {
                        $config['upload_path'] = './images/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        $config['max_width'] = '600';
                        $config['min_width'] = '300';
                        $config['max_height'] = '600';
                        $config['min_height'] = '300';
                        $this->load->library('upload',$config);
                        if ($this->upload->do_upload('sl_image')) 
                        {
                            $data1['img_upload_name']=$this->upload->data();
                             $data=array(
                                    'sl_text'=>$this->input->post('sl_text'),
                                    'sl_link_text'=>$this->input->post('sl_link_text'),
                                    'sl_link'=>$this->input->post('sl_link'),
                                    'sl_order'=>$this->input->post('sl_order'),
                                    'sl_image'=>$data1['img_upload_name']['file_name'],
                                    );
                            if($this->adminoperation->slidereditdata($data,$id))
                            {
                                $this->session->set_flashdata('success', 'Slider Updated SuccessFully');
                                $data['sl_data']=$this->adminoperation->slideredit($id);
                                $this->load->view('admin/header');
                                $this->load->view('admin/slideredit',$data);

                            }
                            else
                            {
                               $this->session->set_flashdata('error', 'Something Went Wrong');
                               $data['sl_data']=$this->adminoperation->slideredit($id);
                               $this->load->view('admin/header');
                               $this->load->view('admin/slideredit',$data);

                            }
                        }
                        else
                        {
                            $data['upload_error']=$this->upload->display_errors();
                            $data['sl_data']=$this->adminoperation->slideredit($id);
                            $this->load->view('admin/header');
                            $this->load->view('admin/slideredit',$data);
                        }

                    }
                   
                }
                else
                {
                    $data['sl_data']=$this->adminoperation->slideredit($id);
                    $this->load->view('admin/header');
                    $this->load->view('admin/slideredit',$data);
                }
            }
            else
            {

            $data['sl_data']=$this->adminoperation->slideredit($id);
            $this->load->view('admin/header');
            $this->load->view('admin/slideredit',$data);

            } 
        }
        else
        {
            redirect(base_url().'admindashboard/sliderview');
        }        
 
    }

/****************************Slider Operations End*******************************************************************/



/********************************Page Section************************************************************ */
    
   public function pageadd()
   {
     $this->load->view('admin/header');
     $this->load->view('admin/pageadd');
   } 
   public function pageaddaction()
   {
         $this->form_validation->set_rules('p_title','Page  Title','required|trim');
         $this->form_validation->set_rules('p_url','Page  Url','required|trim');
         $this->form_validation->set_rules('p_heading','Page  Heading','required|trim');
         $this->form_validation->set_rules('p_meta','Page  Meta Content','required|trim');
         $this->form_validation->set_rules('p_keyword','Page  Meta Keyword','required|trim');
         $this->form_validation->set_rules('p_desc','Page  Description','required|trim');
                $page_url = str_replace(" ","-",strtolower(trim($this->input->post('p_url'))));
                $page_url = str_replace("&","and",$page_url);
                $page_url = str_replace("'","-",strtolower($page_url));
                $page_url = str_replace(",","-",strtolower($page_url));
                $page_url = str_replace(".","-",strtolower($page_url));
                $page_url = str_replace("&","and",$page_url);
                $page_url = str_replace("?","-",strtolower($page_url));
                $page_url = str_replace("/","-",strtolower($page_url));
                $page_url = str_replace(".","-",strtolower($page_url));
                $page_url = str_replace("@","-",strtolower($page_url));
                $page_url = str_replace(",","-",strtolower($page_url));
        if ($this->form_validation->run())
        {   
            $data=array(
                            'p_title'=>$this->input->post('p_title'),
                            'p_url'=>$page_url,
                            'p_heading'=>$this->input->post('p_heading'),
                            'p_meta_desc'=>$this->input->post('p_meta'),
                            'p_keyword'=>$this->input->post('p_keyword'),
                            'p_desc'=>$this->input->post('p_desc'),
                            'lang'=>$this->session->lang,
                       );
            if($this->adminoperation->pageadd($data))
            {
                 $this->session->set_flashdata('success', 'Page Added SuccessFully');
                redirect('admindashboard/pageadd');    
            }
            else
            {
                 $this->session->set_flashdata('error', 'Something Went Wrong');
                redirect('admindashboard/pageadd');    
            }
        }
        else
        {
                $this->load->view('admin/header');
                $this->load->view('admin/pageadd');
        }
        

   }
   public function pageview()
   {
       if ($this->uri->segment(3)!='') 
        {
            $uri=$this->uri->segment(3);
            $id=$this->uri->segment(4);
            if ($uri=='delete') 
            {
                if($this->adminoperation->pagedelete($id))
                {
                    $data['delete']='Page Deleted SuccessFully';
                }
            }
            if ($uri=='active') 
            {
                if($this->adminoperation->pageactive($id))
                {
                    $data['active']='Page Activated SuccessFully';
                }

            }   
            if ($uri=='deactive') 
            {
                if($this->adminoperation->pagedeactive($id))
                {
                    $data['deactivate']='Page Deactivated SuccessFully';
                }
            }
        }
     $data['p_data']=$this->adminoperation->pageview($this->session->lang);
     $this->load->view('admin/header');
     $this->load->view('admin/pageview',$data);
   } 
   public function pageedit()
   {

        $id=$this->uri->segment(3);

        if($this->adminoperation->pageeditcheck($id,$this->session->lang))
        {
            if ($this->uri->segment(4)=='update') 
            {
                 $this->form_validation->set_rules('p_title','Page  Title','required|trim');
                 $this->form_validation->set_rules('p_url','Page  Url','required|trim');
                 $this->form_validation->set_rules('p_heading','Page  Heading','required|trim');
                 $this->form_validation->set_rules('p_meta','Page  Meta Content','required|trim');
                 $this->form_validation->set_rules('p_keyword','Page  Meta Keyword','required|trim');
                 $this->form_validation->set_rules('p_desc','Page  Description','required|trim');
                $page_url = str_replace(" ","-",strtolower(trim($this->input->post('p_url'))));
                $page_url = str_replace("&","and",$page_url);
                $page_url = str_replace("'","-",strtolower($page_url));
                $page_url = str_replace(",","-",strtolower($page_url));
                $page_url = str_replace(".","-",strtolower($page_url));
                $page_url = str_replace("&","and",$page_url);
                $page_url = str_replace("?","-",strtolower($page_url));
                $page_url = str_replace("/","-",strtolower($page_url));
                $page_url = str_replace(".","-",strtolower($page_url));
                $page_url = str_replace("@","-",strtolower($page_url));
                $page_url = str_replace(",","-",strtolower($page_url));
                

            
                // $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
                if ($this->form_validation->run())
                { 
                    $data=array(
                                    'p_title'=>$this->input->post('p_title'),
                                    'p_url'=>$page_url,
                                    'p_heading'=>$this->input->post('p_heading'),
                                    'p_meta_desc'=>$this->input->post('p_meta'),
                                    'p_keyword'=>$this->input->post('p_keyword'),
                                    'p_desc'=>$this->input->post('p_desc'),
                               );

                    if($this->adminoperation->pageeditdata($data,$id))
                    {
                        $this->session->set_flashdata('success', 'Page Updated SuccessFully');
                        $data['p_data']=$this->adminoperation->pageedit($id);
                        $this->load->view('admin/header');
                        $this->load->view('admin/pageedit',$data);
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Something Went Wrong');
                        $data['p_data']=$this->adminoperation->pageedit($id);
                        $this->load->view('admin/header');
                        $this->load->view('admin/pageedit',$data);
                    }
                }
                else
                {
                        $data['p_data']=$this->adminoperation->pageedit($id);
                        $this->load->view('admin/header');
                        $this->load->view('admin/pageedit',$data);
                }
            }
            else
            {
                        $data['p_data']=$this->adminoperation->pageedit($id);
                        $this->load->view('admin/header');
                        $this->load->view('admin/pageedit',$data);
            }


        }
        else
        {
                redirect(base_url().'admindashboard/pageview');
        }
   } 

/********************************Page Section End************************************************************ */

/********************************Product Section ************************************************************ */
    public function productadd()
    {
        $data['c_data']=$this->adminoperation->cateview($this->session->lang);
        $data['s_data']=$this->adminoperation->subcateview($this->session->lang); 
        $data['b_data']=$this->adminoperation->brandview($this->session->lang); 
         $data['color']=$this->adminoperation->colorview();
         
        
        
        $this->load->view('admin/header');
        $this->load->view('admin/productadd',$data);    
    }

    public function productaddaction()
    {
        error_reporting(0);
        $this->form_validation->set_rules('pro_title','Product Title','required|trim');
        $this->form_validation->set_rules('pro_url','Product Title','required|trim|is_unique[products.pro_url]');
        
        $this->form_validation->set_rules('pro_sku','Product Sku','required|trim');
        $this->form_validation->set_rules('pro_base_cate','Product  Base Category','required|trim');
        $this->form_validation->set_rules('pro_cate','Product Category','required|trim');
        $this->form_validation->set_rules('pro_brand','Product Brand','required|trim');
        $this->form_validation->set_rules('pro_quantity','Product Qunatity','required|trim');
        $this->form_validation->set_rules('pro_price','Product Price','required|trim|numeric');
        $this->form_validation->set_rules('pro_sale_price','Product Sale Price','required|trim|numeric');
        $this->form_validation->set_rules('pro_sort_desc','Product Sort Description','required|trim');
        $this->form_validation->set_rules('pro_desc','Product Description','required|trim');
        $this->form_validation->set_rules('pro_meta_content','Product Meta Content','trim');
        $this->form_validation->set_rules('pro_meta_keyword','Product Meta Keyword','trim');
        $this->form_validation->set_rules('pro_popular','NA','trim');
        $this->form_validation->set_rules('pro_new','NA','trim');
        $this->form_validation->set_rules('pro_hot','NA','trim');
        $this->form_validation->set_rules('pro_feat','NA','trim');
        $this->form_validation->set_rules('pro_best','NA','trim');
        $product_url = str_replace(" ","-",strtolower(trim($this->input->post('pro_url'))));
        $product_url = str_replace("&","and",$product_url);
        $product_url = str_replace("'","-",strtolower($product_url));
        $product_url = str_replace(",","-",strtolower($product_url));
        $product_url = str_replace(".","-",strtolower($product_url));
        $product_url = str_replace("&","and",$product_url);
        $product_url = str_replace("?","-",strtolower($product_url));
        $product_url = str_replace("/","-",strtolower($product_url));
        $product_url = str_replace(".","-",strtolower($product_url));
        $product_url = str_replace("@","-",strtolower($product_url));
        $product_url = str_replace(",","-",strtolower($product_url));
        
        $product_url=$product_url."_".rand();
        
        
        
        if(!$_POST['color'])
        {
            $pro_color='NA';
        }
        else
        {
            $colors=$_POST['color'];
            $pro_color=implode('/',$colors); 
                                    
        }
        

                
        if ($this->form_validation->run())
        {   
            
                    $config['upload_path'] = './images/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_width'] = '1100';
                    $config['min_width'] = '1000';
                    $config['max_height'] = '1100';
                    $config['min_height'] = '1000';
                    // $config['encrypt_name'] = TRUE;
    
                    $this->load->library('upload',$config);
                    if ($this->upload->do_upload('pro_feat_image')) 
                    {
                        
                        $dataf['img_upload_name']=$this->upload->data();
                         $product=array(
                                'pro_title'=>$this->input->post('pro_title'),
                                'pro_url'=>$product_url,
                                'pro_sku'=>$this->input->post('pro_sku'),
                                'pro_category'=>$this->input->post('pro_base_cate'),
                                'pro_sub_category'=>$this->input->post('pro_cate'),
                                'pro_brand'=>$this->input->post('pro_brand'),
                                'pro_quantity'=>$this->input->post('pro_quantity'),
                                'pro_price'=>$this->input->post('pro_price'),
                                'pro_sale_price'=>$this->input->post('pro_sale_price'),
                                'pro_sort_desc'=>$this->input->post('pro_sort_desc'),
                                'pro_full_desc'=>$this->input->post('pro_desc'),
                                'pro_color'=>$pro_color,
                                'pro_meta_content'=>$this->input->post('pro_meta_content'),
                                'pro_meta_keyword'=>$this->input->post('pro_meta_keyword'),
                                'pro_feat_image'=>$dataf['img_upload_name']['file_name'],
                                'pro_popular'=>$this->input->post('pro_popular'),
                                'pro_new'=>$this->input->post('pro_new'),
                                'pro_best'=>$this->input->post('pro_best'),
                                'pro_feat'=>$this->input->post('pro_feat'),
                                'pro_hot'=>$this->input->post('pro_hot'),
                                'lang'=>$this->session->lang,
                                'pro_date'=>date('Y-m-d'),
                                );
                                
                                
                                   if(!empty($_FILES['pro_gallery']['name'][0]))
                                    {
                                        $filesCount = count($_FILES['pro_gallery']['name']);
                                        for($i = 0; $i < $filesCount; $i++)
                                        {
                                            $_FILES['file']['name']     = $_FILES['pro_gallery']['name'][$i];
                                            $_FILES['file']['type']     = $_FILES['pro_gallery']['type'][$i];
                                            $_FILES['file']['tmp_name'] = $_FILES['pro_gallery']['tmp_name'][$i];
                                            $_FILES['file']['error']     = $_FILES['pro_gallery']['error'][$i];
                                            $_FILES['file']['size']     = $_FILES['pro_gallery']['size'][$i];
                                            
                                            // File upload configuration
                                            $uploadPath = './images/';
                                            $config['upload_path'] = $uploadPath;
                                            $config['allowed_types'] = 'jpg|jpeg|png|gif';
                                            $config['max_width'] = '1100';
                                            $config['min_width'] = '1000';
                                            $config['max_height'] = '1100';
                                            $config['min_height'] = '1000';
                                            // Load and initialize upload library
                                            $this->load->library('upload', $config);
                                            $this->upload->initialize($config);
                                            
                                            // Upload file to server
                                            if($this->upload->do_upload('file'))
                                            {
                                                $fileData = $this->upload->data();
                                                $uploadData[$i]['file_name'] = $fileData['file_name'];
                                                $string[] = $fileData['file_name'];
                                                $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
                                            }
                                            else
                                            {
                                            	$data['gallery_error']=$this->upload->display_errors();
                                            }
                                        }
                                        $count=count($string);
                                        if($count!=$filesCount)
                                        {
                        
                                            $string=implode('/',$string);
                                           	$product['pro_gallery_image']=$string;

                                            if($this->adminoperation->productadd($product))
                                            {
                                                $this->session->set_flashdata('error', 'But some gallery images not uploaded due to size problems ');
                                                $this->session->set_flashdata('success', 'Product Added SuccessFully');
                                                redirect('admindashboard/productadd');  
                                            }
                                            else
                                            {
                                              $this->session->set_flashdata('error', 'Something went wrong ');
                                              redirect('admindashboard/productadd'); 
                                            }
                                        }
                                        else
                                        {
                                            $string=implode('/',$string);
                                           	$product['pro_gallery_image']=$string;
                                       	   if($this->adminoperation->productadd($product))
                                            {
                                                // $this->session->set_flashdata('error', 'But there  was no gallery image uploaded');
                                                $this->session->set_flashdata('success', 'Product Added SuccessFully');
                                                redirect('admindashboard/productadd');  
                                            }
                                            else
                                            {
                                              $this->session->set_flashdata('error', 'Something went wrong ');
                                              redirect('admindashboard/productadd'); 
                                            }   
                                        }
                                    }
                                    else
                                    {
                                            $product['pro_gallery_image']=$dataf['img_upload_name']['file_name'];
                                            if($this->adminoperation->productadd($data))
                                            {
                                                $this->session->set_flashdata('success', 'Product Added SuccessFully');
                                                $this->session->set_flashdata('error', 'But there  was no gallery image uploaded');
                                                redirect('admindashboard/productadd');  
                                            }
                                            else
                                            {
                                              $this->session->set_flashdata('error', 'Something went wrong ');
                                              redirect('admindashboard/productadd'); 
                                            }   
                                    }
                    }
                    else
                    {
                        $data['c_data']=$this->adminoperation->cateview($this->session->lang);
                        $data['s_data']=$this->adminoperation->subcateview($this->session->lang); 
                        $data['b_data']=$this->adminoperation->brandview($this->session->lang); 
                        $data['upload_error']=$this->upload->display_errors();
                        $this->load->view('admin/header');
                        $this->load->view('admin/productadd',$data);
                    }
        }
        else
        {
            $data['c_data']=$this->adminoperation->cateview($this->session->lang);
            $data['s_data']=$this->adminoperation->subcateview($this->session->lang); 
            $data['b_data']=$this->adminoperation->brandview($this->session->lang); 
            
            $this->load->view('admin/header');
            $this->load->view('admin/productadd');
        }
            
    }

    public function productview()
    {
        if ($this->uri->segment(3)!='') 
        {
            $uri=$this->uri->segment(3);
            $id=$this->uri->segment(4);
            if ($uri=='delete') 
            {
                if($this->adminoperation->productdelete($id))
                {
                    $data['delete']='Product Deleted SuccessFully';
                }
            }
            if ($uri=='active') 
            {
                if($this->adminoperation->productactive($id))
                {
                    $data['active']='Product Activated SuccessFully';
                }

            }
            if ($uri=='deactive') 
            {
                if($this->adminoperation->productdeactive($id))
                {
                    $data['deactivate']='Product Deactivated SuccessFully';
                }
            }
        }
        $data['p_data']=$this->adminoperation->productview($this->session->lang);
        $this->load->view('admin/header');
        $this->load->view('admin/productview',$data);                    
    }
    
    
    public function productedit()
    {
        error_reporting(0);
         $id=$this->uri->segment(3);

        if($this->adminoperation->producteditcheck($id,$this->session->lang))
        {
            if ($this->uri->segment(4)=='update') 
            {
                
                $this->form_validation->set_rules('pro_title','Product Title','required|trim');
                $this->form_validation->set_rules('pro_url','Product URL','required|trim|is_unique[products.pro_url]');
                $this->form_validation->set_rules('pro_sku','Product Sku','required|trim');
                $this->form_validation->set_rules('pro_base_cate','Product  Base Category','required|trim');
                $this->form_validation->set_rules('pro_cate','Product Category','required|trim');
                $this->form_validation->set_rules('pro_brand','Product Brand','required|trim');
                $this->form_validation->set_rules('pro_quantity','Product Qunatity','required|trim');
                $this->form_validation->set_rules('pro_price','Product Price','required|trim|numeric');
                $this->form_validation->set_rules('pro_sale_price','Product Sale Price','required|trim|numeric');
                $this->form_validation->set_rules('pro_sort_desc','Product Sort Description','required|trim');
                $this->form_validation->set_rules('pro_desc','Product Description','required|trim');
                $this->form_validation->set_rules('pro_meta_content','Product Meta Content','trim');
                $this->form_validation->set_rules('pro_meta_keyword','Product Meta Keyword','trim');
                $this->form_validation->set_rules('pro_popular','NA','trim');
                $this->form_validation->set_rules('pro_new','NA','trim');
                $this->form_validation->set_rules('pro_hot','NA','trim');
                $this->form_validation->set_rules('pro_feat','NA','trim');
                $this->form_validation->set_rules('pro_best','NA','trim');
                $product_url = str_replace(" ","-",strtolower(trim($this->input->post('pro_url'))));
                $product_url = str_replace("&","and",$product_url);
                $product_url = str_replace("'","-",strtolower($product_url));
                $product_url = str_replace(",","-",strtolower($product_url));
                $product_url = str_replace(".","-",strtolower($product_url));
                $product_url = str_replace("&","and",$product_url);
                $product_url = str_replace("?","-",strtolower($product_url));
                $product_url = str_replace("/","-",strtolower($product_url));
                $product_url = str_replace(".","-",strtolower($product_url));
                $product_url = str_replace("@","-",strtolower($product_url));
                $product_url = str_replace(",","-",strtolower($product_url));
                    
                    if(!$_POST['color'])
                    {
                        $pro_color='NA';
                    }
                    else
                    {
                        $colors=$_POST['color'];
                        $pro_color=implode('/',$colors); 
                                                
                    }
                
                
                if ($this->form_validation->run())
                { 
                    
                    
                    $product=array(
                                'pro_title'=>$this->input->post('pro_title'),
                                'pro_url'=>$product_url,
                                'pro_sku'=>$this->input->post('pro_sku'),
                                'pro_category'=>$this->input->post('pro_base_cate'),
                                'pro_sub_category'=>$this->input->post('pro_cate'),
                                'pro_brand'=>$this->input->post('pro_brand'),
                                'pro_quantity'=>$this->input->post('pro_quantity'),
                                'pro_price'=>$this->input->post('pro_price'),
                                'pro_sale_price'=>$this->input->post('pro_sale_price'),
                                'pro_sort_desc'=>$this->input->post('pro_sort_desc'),
                                'pro_full_desc'=>$this->input->post('pro_desc'),
                                'pro_meta_content'=>$this->input->post('pro_meta_content'),
                                'pro_meta_keyword'=>$this->input->post('pro_meta_keyword'),
                                'pro_popular'=>$this->input->post('pro_popular'),
                                'pro_new'=>$this->input->post('pro_new'),
                                'pro_color'=>$pro_color,
                                'pro_best'=>$this->input->post('pro_best'),
                                'pro_feat'=>$this->input->post('pro_feat'),
                                'pro_hot'=>$this->input->post('pro_hot'),
                                'lang'=>$this->session->lang,
                                'pro_date'=>date('Y-m-d'),
                                );
                       if(!empty($_FILES['pro_feat_image']['name']))
                        {
                            $config['upload_path'] = './images/';
                            $config['allowed_types'] = 'gif|jpg|png|jpeg';
                            $config['max_width'] = '1100';
                            $config['min_width'] = '1000';
                            $config['max_height'] = '1100';
                            $config['min_height'] = '1000';
                            $this->load->library('upload',$config);
                            if ($this->upload->do_upload('pro_feat_image')) 
                            {
                                $dataf=$this->upload->data();
                                $product['pro_feat_image']=$dataf['file_name'];
                            }
                            else
                            {
                                $data['upload_error']=$this->upload->display_errors();                            
                            }
                        }
                    
                        
                          if(!empty($_FILES['pro_gallery']['name'][0]))
                            {
                                $filesCount = count($_FILES['pro_gallery']['name']);
                                for($i = 0; $i < $filesCount; $i++)
                                {
                                    $_FILES['file']['name']     = $_FILES['pro_gallery']['name'][$i];
                                    $_FILES['file']['type']     = $_FILES['pro_gallery']['type'][$i];
                                    $_FILES['file']['tmp_name'] = $_FILES['pro_gallery']['tmp_name'][$i];
                                    $_FILES['file']['error']     = $_FILES['pro_gallery']['error'][$i];
                                    $_FILES['file']['size']     = $_FILES['pro_gallery']['size'][$i];
                                    
                                    // File upload configuration
                                    $uploadPath = './images/';
                                    $config['upload_path'] = $uploadPath;
                                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                                    $config['max_width'] = '1100';
                                    $config['min_width'] = '1000';
                                    $config['max_height'] = '1100';
                                    $config['min_height'] = '1000';
                                    // Load and initialize upload library
                                    $this->load->library('upload', $config);
                                    $this->upload->initialize($config);
                                    
                                    // Upload file to server
                                    if($this->upload->do_upload('file'))
                                    {
                                        $fileData = $this->upload->data();
                                        $uploadData[$i]['file_name'] = $fileData['file_name'];
                                        $string[] = $fileData['file_name'];
                                        $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
                                    }
                                    else
                                    {
                                    	$data['gallery_error']=$this->upload->display_errors();
                                    }
                                }
                                        $product_data=$this->adminoperation->productedit($id);
                                        $old_string=$product_data['pro_gallery_image'];
                                        $string=implode('/',$string);
                                       	$product['pro_gallery_image']=$string."/".$old_string;    
                            }                                                    

                    if($this->adminoperation->producteditdata($product,$id))
                    {
                        $this->session->set_flashdata('success', 'Product Updated SuccessFully');
                        $data['p_data']=$this->adminoperation->productedit($id);
                        $product_data=$this->adminoperation->productedit($id);
                        $data['c_data']=$this->adminoperation->cateview($this->session->lang);
                        $data['s_data']=$this->adminoperation->subcateview2($this->session->lang,$product_data['pro_category']); 
                        $data['b_data']=$this->adminoperation->brandview($this->session->lang);
                        $data['color']=$this->adminoperation->colorview();
                        $data['color']=$this->adminoperation->colorview();
         
                        $this->load->view('admin/header');
                        $this->load->view('admin/productedit',$data);
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Something Went Wrong');
                        $data['p_data']=$this->adminoperation->productedit($id);
                        $product_data=$this->adminoperation->productedit($id);
                        $data['c_data']=$this->adminoperation->cateview($this->session->lang);
                        $data['s_data']=$this->adminoperation->subcateview2($this->session->lang,$product_data['pro_category']); 
                        $data['b_data']=$this->adminoperation->brandview($this->session->lang);
                        $data['color']=$this->adminoperation->colorview();
                        $this->load->view('admin/header');
                        $this->load->view('admin/productedit',$data);
                    }
                }
                else
                {
                    $data['p_data']=$this->adminoperation->productedit($id);
                    $product_data=$this->adminoperation->productedit($id);
                    $data['c_data']=$this->adminoperation->cateview($this->session->lang);
                    $data['s_data']=$this->adminoperation->subcateview2($this->session->lang,$product_data['pro_category']); 
                    $data['b_data']=$this->adminoperation->brandview($this->session->lang);
                    $data['color']=$this->adminoperation->colorview();
                    $this->load->view('admin/header');
                    $this->load->view('admin/productedit',$data);
                }
            }
            else
            {
                $data['p_data']=$this->adminoperation->productedit($id);
                $product_data=$this->adminoperation->productedit($id);
                $data['c_data']=$this->adminoperation->cateview($this->session->lang);
                $data['s_data']=$this->adminoperation->subcateview2($this->session->lang,$product_data['pro_category']); 
                $data['b_data']=$this->adminoperation->brandview($this->session->lang);
                $data['color']=$this->adminoperation->colorview();
                $this->load->view('admin/header');
                $this->load->view('admin/productedit',$data);
                
            }


        }
        else
        {
                redirect(base_url().'admindashboard/productview');
        }
    }
    public function deleteimg()
    {
        $img_name=$_POST['img_name'];
        $pro_id=$_POST['pro_id'];
        $product_data=$this->adminoperation->productedit($pro_id);
        $images=$product_data['pro_gallery_image'];
        $gallery=explode('/', $images);
    	$count=count($gallery);
    	if($count<=0)
    	{
    	    ?>
    	    <h2>No Gallery Images</h2>
    	    <?php
    	}
    	else
    	{
            	for ($i=0; $i < $count ; $i++) 
            	{ 
            		if ($img_name==$gallery[$i]) 
            		{
            // 			unlink(base_url().'images/'.$gallery[$i]);
            			unset($gallery[$i]);
            		}
            	}
            	$update_gallery=implode('/', $gallery);
            	$data=['pro_gallery_image'=>$update_gallery];
            	if($this->adminoperation->producteditdata($data,$pro_id))
                {
                    $product_data=$this->adminoperation->productedit($pro_id);
                    $images=$product_data['pro_gallery_image'];
                    $gallery=explode('/', $images);
                	$count=count($gallery);
                	
                	for($i=0; $i<$count;$i++)
                    {
                        ?>
                            <img src="<?php echo base_url()  ?>images/<?php echo $gallery[$i]  ?>" height="100px" onclick="delete_image(this.id)" id="<?php echo $gallery[$i]  ?>"  />
                        <?php
                    }
        
                }
                else
                {
            	    ?>
            	    <h2>No Gallery Images</h2>
            	    <?php
                }
    	    
    	}
        
        
    }
    
    
    
/********************************Product Section End************************************************************ */

/********************************Contact Section End************************************************************ */
    public function inbox()
    {
        if ($this->uri->segment(3)!='') 
        {
            $uri=$this->uri->segment(3);
            $id=$this->uri->segment(4);
            if ($uri=='delete') 
            {
                if($this->adminoperation->contactdelete($id))
                {
                    $data['delete']='Mail Deleted SuccessFully';
                }
            }
        }
        $data['data']=$this->adminoperation->contactview();
        $this->load->view('admin/header');
        $this->load->view('admin/inbox',$data);
        
    }
    
    


/********************************Contact Section End************************************************************ */
/********************************Coupon Section Start**************************************************************/
    public function couponadd()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/couponadd');
    }

    public function couponaddaction()
    {
        $this->form_validation->set_rules('c_name','Coupon Name','required|trim');
        $this->form_validation->set_rules('c_type','Coupon Type','required|trim');
        $this->form_validation->set_rules('c_rate','Coupon Rate','required|trim');
        $this->form_validation->set_rules('c_quantity','Coupon Quantity','required|trim|numeric');
        $this->form_validation->set_rules('c_expire','Coupon Expiry Date','required|trim');
        if ($this->form_validation->run())
        {   
            $data=array(
                            'cu_name'=>$this->input->post('c_name'),
                            'cu_type'=>$this->input->post('c_type'),
                            'cu_rate'=>$this->input->post('c_rate'),
                            'cu_quantity'=>$this->input->post('c_quantity'),
                            'cu_expiry'=>$this->input->post('c_expire'),
                            'cu_date_generated'=>date('Y-m-d'),
                            'lang'=>$this->session->lang,
                       );
            if($this->adminoperation->couponadd($data))
            {
                 $this->session->set_flashdata('success', 'Coupon Added SuccessFully');
                redirect('admindashboard/couponadd');    
            }
            else
            {
                 $this->session->set_flashdata('error', 'Something Went Wrong');
                redirect('admindashboard/couponadd');    
            }
        }
        else
        {
            $this->load->view('admin/header');
            $this->load->view('admin/couponadd');
        }

    }

    public function couponview()
    {

        if ($this->uri->segment(3)!='') 
        {
            $uri=$this->uri->segment(3);
            $id=$this->uri->segment(4);
            if ($uri=='delete') 
            {
                if($this->adminoperation->coupondelete($id))
                {
                    $data['delete']='Coupon Deleted SuccessFully';
                }
            }
            if ($uri=='active') 
            {
                if($this->adminoperation->couponactive($id))
                {
                    $data['active']='Coupon Activated SuccessFully';
                }

            }
            if ($uri=='deactive') 
            {
                if($this->adminoperation->coupondeactive($id))
                {
                    $data['deactivate']='Coupon Deactivated SuccessFully';
                }
            }
        }
        $data['c_data']=$this->adminoperation->couponview();
        $this->load->view('admin/header');
        $this->load->view('admin/couponview',$data);
    }
    public function couponedit()
    {
        $id=$this->uri->segment(3);
        
           if ($this->uri->segment(4)=='update') 
            {
                $this->form_validation->set_rules('c_name','Coupon Name','required|trim');
                $this->form_validation->set_rules('c_type','Coupon Type','required|trim');
                $this->form_validation->set_rules('c_rate','Coupon Rate','required|trim');
                $this->form_validation->set_rules('c_quantity','Coupon Quantity','required|trim|numeric');
                $this->form_validation->set_rules('c_expire','Coupon Expiry Date','required|trim');
                if ($this->form_validation->run())
                {   
                    $data=array(
                                    'cu_name'=>$this->input->post('c_name'),
                                    'cu_type'=>$this->input->post('c_type'),
                                    'cu_rate'=>$this->input->post('c_rate'),
                                    'cu_quantity'=>$this->input->post('c_quantity'),
                                    'cu_expiry'=>$this->input->post('c_expire'),
                               );
                // echo "<pre>";
                // print_r($data);
                // echo "<pre>";
                // die();
                    if($this->adminoperation->couponeditdata($data,$id))
                    {
                        $this->session->set_flashdata('success', 'Coupon Updated SuccessFully');
                        $data['c_data']=$this->adminoperation->couponedit($id);
                        $this->load->view('admin/header');
                        $this->load->view('admin/couponedit',$data);
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Something Went Wrong');
                        $data['c_data']=$this->adminoperation->couponedit($id);
                        $this->load->view('admin/header');
                        $this->load->view('admin/couponedit',$data);
                    }
                }
                else
                {
                    $data['c_data']=$this->adminoperation->couponedit($id);
                    $this->load->view('admin/header');
                    $this->load->view('admin/couponedit',$data);
                }
            }
            else
            {
    
            $data['c_data']=$this->adminoperation->couponedit($id);
            $this->load->view('admin/header');
            $this->load->view('admin/couponedit',$data);
    
            }    

        // if($this->adminoperation->brandeditcheck($id,$this->session->lang))
        // {
        // }
        // else
        // {
        //     redirect(base_url().'admindashboard/brandview');
        // }
        
    }
/*********************************Coupen Section End*********************************************************************/
/*********************************Customer Section End*********************************************************************/
    public function customers()
    {
            if ($this->uri->segment(3)!='') 
            {
                $uri=$this->uri->segment(3);
                $id=$this->uri->segment(4);
                if ($uri=='active') 
                {
                    if($this->adminoperation->customeractive($id))
                    {
                        $data['active']='Customer Activated SuccessFully';
                    }
    
                }
                if ($uri=='deactive') 
                {
                    if($this->adminoperation->customerdeactive($id))
                    {
                        $data['deactivate']='Customer Deactivated SuccessFully';
                    }
                }
            }
            $data['c_data']=$this->adminoperation->customerview();
            $this->load->view('admin/header');
            $this->load->view('admin/customersview',$data);
    }

/*********************************Customer Section End*********************************************************************/
    public function orders()
    {
            $data['o_data']=$this->adminoperation->orders_view();
            $this->load->view('admin/header');
            $this->load->view('admin/orders',$data);
       
    }
    public function order_update()
    {
            $order_id=$_POST['order_id'];
            $status=$_POST['status'];
            if($this->adminoperation->order_update($order_id,$status))
            {
                echo "Order Status Updated To ".ucwords($status)." Of Order Id ".$order_id;
            }
            else
            {
                
            }
    }
    public function orderview()
    {
        $order_id=$this->uri->segment(3);
        $data['order_data']=$this->adminoperation->get_order_detail($order_id);
        // echo "<pre>";
        // print_r($order_data);
        // echo "<pre>";
        // die(0);
        $this->load->view('admin/header');
        $this->load->view('admin/order_view',$data);
        
    }
    /******************Color Add*****************************************************************************************/
    
    public function coloradd()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/coloradd');
    }
    public function coloraddaction()
    {
        $this->form_validation->set_rules('color_name','Color Name','required|trim');
        $this->form_validation->set_rules('color_code','Color Code','required|trim');
        if ($this->form_validation->run())
        {   
            $data=array(
                            'c_name'=>$this->input->post('color_name'),
                            'c_code'=>$this->input->post('color_code'),
                            
                       );
            if($this->adminoperation->coloradd($data))
            {
                 $this->session->set_flashdata('success', 'Color Added SuccessFully');
                redirect('admindashboard/coloradd');    
            }
            else
            {
                 $this->session->set_flashdata('error', 'Something Went Wrong');
                redirect('admindashboard/coloradd');    
            }
        }
        else
        {
                $this->load->view('admin/header');
                $this->load->view('admin/coloradd');
        }

    }
    // colorview
     public function colorview()
    {

        if ($this->uri->segment(3)!='') 
        {
            $uri=$this->uri->segment(3);
            $id=$this->uri->segment(4);
            if ($uri=='delete') 
            {
                if($this->adminoperation->colordelete($id))
                {
                    $data['delete']='Color Deleted SuccessFully';
                }
            }
           
        }
        $data['c_data']=$this->adminoperation->colorview();
        $this->load->view('admin/header');
        $this->load->view('admin/colorview',$data);
    }
    // coloredit
    
    public function coloredit()
    {
            $id=$this->uri->segment(3);
        
            if ($this->uri->segment(4)=='update') 
            {
                $this->form_validation->set_rules('color_name','Color Name','required|trim');
                $this->form_validation->set_rules('color_code','Color Code','required|trim');
                // $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
                if ($this->form_validation->run())
                { 
                    $data=array(
                                    'c_name'=>$this->input->post('color_name'),
                                    'c_code'=>$this->input->post('color_code'),
                               );
                    if($this->adminoperation->coloreditdata($data,$id))
                    {
                        $this->session->set_flashdata('success', 'Color Updated SuccessFully');
                        $data['c_data']=$this->adminoperation->coloredit($id);
                        $this->load->view('admin/header');
                        $this->load->view('admin/coloredit',$data);
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Something Went Wrong');
                        $data['c_data']=$this->adminoperation->coloredit($id);
                        $this->load->view('admin/header');
                        $this->load->view('admin/coloredit',$data);
                    }
                }
                else
                {
                    $data['c_data']=$this->adminoperation->coloredit($id);
                    $this->load->view('admin/header');
                    $this->load->view('admin/coloredit',$data);
                }
            }
            else
            {
    
                $data['c_data']=$this->adminoperation->coloredit($id);
                $this->load->view('admin/header');
                $this->load->view('admin/coloredit',$data);
        
            }    
        
        
    }
    
    public function settings()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/settings');
            
    }
    
    public function settingsaction()
    {
        
        if($_POST['type']=="email")
        {
            $this->form_validation->set_rules('oemail','Old Email','required|trim|valid_email');
            $this->form_validation->set_rules('nemail','New Email','required|trim|valid_email');
            $this->form_validation->set_rules('cemail','Confirm Email','required|trim|matches[nemail]|valid_email');
                    
        }
        else if($_POST['type']=="pass")
        {
            $this->form_validation->set_rules('opass','Old Password','required|trim');
            $this->form_validation->set_rules('npass','New Password','required|trim|min_length[8]');
            $this->form_validation->set_rules('cpass','Confirm Password','required|trim|min_length[8]|matches[npass]');
            
            
        }
        else
        {
            $this->form_validation->set_rules('ouser','Old Username','required|trim');
            $this->form_validation->set_rules('nuser','New Username','required|trim|min_length[5]');
            $this->form_validation->set_rules('cuser','Confirm Username','required|trim|min_length[5]|matches[nuser]');
            
            
        }
        
        
        if ($this->form_validation->run())
        {
            $admin_id=$this->session->userdata('admin_id');
            $admin_data=$this->adminoperation->get_admin_data($admin_id);
            
            $oldemail=$admin_data['a_email'];
            $oldpass=$admin_data['a_pass'];
            $olduser=$admin_data['a_user'];
            if($_POST['type']=="email")
            {
                $oemail=$this->input->post('oemail');
                $nemail=$this->input->post('nemail');
                $cemail=$this->input->post('cemail');
                
                if($oemail==$oldemail)
                {
                    $data=array(
                                    'a_email'=>$this->input->post('cemail'),
                               );
                    if($this->adminoperation->admin_update($data,$admin_id))
                    {
                        $this->session->set_flashdata('email_success', 'Email Updated SuccessFully');
                        $this->load->view('admin/header');
                        $this->load->view('admin/settings');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Something Went Wrong');
                        $this->load->view('admin/header');
                        $this->load->view('admin/settings');
                    }
                
                    
                }
                else
                {
                    $this->session->set_flashdata('email_error', 'Old email Does Not Matched');
                    $this->load->view('admin/header');
                    $this->load->view('admin/settings');
                }
                            
            }
            else if($_POST['type']=="user")
            {
                $ouser=$this->input->post('ouser');
                $nuser=$this->input->post('nuser');
                $cuser=$this->input->post('cuser');
                
                if($ouser==$olduser)
                {
                    $data=array(
                                    'a_user'=>$this->input->post('cuser'),
                               );
                    if($this->adminoperation->admin_update($data,$admin_id))
                    {
                        $this->session->set_flashdata('user_success', 'Username Updated SuccessFully');
                        $this->load->view('admin/header');
                        $this->load->view('admin/settings');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Something Went Wrong');
                        $this->load->view('admin/header');
                        $this->load->view('admin/settings');
                    }
                
                    
                }
                else
                {
                    $this->session->set_flashdata('user_error', 'Old UserName Does Not Matched');
                    $this->load->view('admin/header');
                    $this->load->view('admin/settings');
                }
                            
            }
            else
            {
                $opass=$this->input->post('opass');
                $npass=$this->input->post('npass');
                $cpass=$this->input->post('cpass');
                
          
                if($opass==$oldpass)
                {
                    $data=array(
                                    'a_pass'=>$this->input->post('cpass'),
                               );
                    if($this->adminoperation->admin_update($data,$admin_id))
                    {
                        $this->session->set_flashdata('pass_success', 'Password Updated SuccessFully');
                        $this->load->view('admin/header');
                        $this->load->view('admin/settings');
                    }
                    else
                    {
                        $this->session->set_flashdata('pass_error', 'Something Went Wrong');
                        $this->load->view('admin/header');
                        $this->load->view('admin/settings');
                    }
                
                    
                }
                else
                {
                    $this->session->set_flashdata('pass_error', 'Old Password Does Not Matched');
                    $this->load->view('admin/header');
                    $this->load->view('admin/settings');
                }
                                
            }
    
            
            

            
            
            
        }
        else
        {
            $this->load->view('admin/header');
            $this->load->view('admin/settings');
            
        }
        
        

        
        
                
            
    }
    
    public function shipping()
    {
            
            $update=$this->uri->segment(3);
            
            if($update=="update")
            {
                 $this->form_validation->set_rules('s_price','Shipping Price','required|trim|numeric');
                if ($this->form_validation->run())
                { 
                    $data=array(
                                    's_price'=>$this->input->post('s_price'),
                               );
                    if($this->adminoperation->shipping_update($data,'1'))
                    {
                        $this->session->set_flashdata('success', 'Shipping Updated SuccessFully');
                                
                        $data['s_data']=$this->adminoperation->getshipping();
                        $this->load->view('admin/header');
                        $this->load->view('admin/shipping',$data);

                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Something Went Wrong');
                                
                    $data['s_data']=$this->adminoperation->getshipping();
                    $this->load->view('admin/header');
                    $this->load->view('admin/shipping',$data);


                    }
                }
                else
                {
        
                    $data['s_data']=$this->adminoperation->getshipping();
                    $this->load->view('admin/header');
                    $this->load->view('admin/shipping',$data);

                }
            }
            else
            {
                
        
            $data['s_data']=$this->adminoperation->getshipping();
            $this->load->view('admin/header');
            $this->load->view('admin/shipping',$data);
            
                
            }
        
    }
    
    
    
    public function contactpage()
    {
            
            $update=$this->uri->segment(3);
            
            if($update=="update")
            {
                 $this->form_validation->set_rules('c_email','Email Section','required|trim');
                 $this->form_validation->set_rules('c_phone','Phone Section','required|trim');
                 $this->form_validation->set_rules('c_address','Address Section','required|trim');
                 
                if ($this->form_validation->run())
                { 
                    $data=array(
                                    'c_email'=>$this->input->post('c_email'),
                                    'c_phone'=>$this->input->post('c_phone'),
                                    'c_address'=>$this->input->post('c_address'),
                                    
                               );
                    if($this->adminoperation->contact_update($data,$this->session->lang))
                    {
                        $this->session->set_flashdata('success', 'Contact Page Updated SuccessFully');
                                
                        $data['c_data']=$this->adminoperation->getcontact($this->session->lang);
                        $this->load->view('admin/header');
                        $this->load->view('admin/contact',$data);

                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Something Went Wrong');
                                
                    $data['c_data']=$this->adminoperation->getcontact($this->session->lang);
                    $this->load->view('admin/header');
                    $this->load->view('admin/contact',$data);


                    }
                }
                else
                {
        
                    $data['c_data']=$this->adminoperation->getcontact($this->session->lang);
                    $this->load->view('admin/header');
                    $this->load->view('admin/contact',$data);

                }
            }
            else
            {
                
        
            $data['c_data']=$this->adminoperation->getcontact($this->session->lang);
            $this->load->view('admin/header');
            $this->load->view('admin/contact',$data);
            
                
            }
        
    }
    
    
    
    public function aboutpage()
    {
            
            $update=$this->uri->segment(3);
            
            if($update=="update")
            {
                 $this->form_validation->set_rules('a_heading','Haading','required|trim');
                 $this->form_validation->set_rules('a_text','Text','required|trim');
                 $this->form_validation->set_rules('a_con_1','Top content','required|trim');
                 $this->form_validation->set_rules('a_con_2','Bottom content','required|trim');
                 
                if ($this->form_validation->run())
                { 
                    $data=array(
                                    'a_heading'=>$this->input->post('a_heading'),
                                    'a_text'=>$this->input->post('a_text'),
                                    'a_con_1'=>$this->input->post('a_con_1'),
                                    'a_con_2'=>$this->input->post('a_con_2'),
                                    
                               );
                               
                               
                    if($_FILES['a_image']['name']!="")
                    {
                        $config['upload_path'] = './images/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        $config['max_width'] = '300';
                        $config['min_width'] = '200';
                        $config['max_height'] = '300';
                        $config['min_height'] = '200';
                        $this->load->library('upload',$config);
                        if ($this->upload->do_upload('a_image')) 
                        {
                            $dataf=$this->upload->data();
                            $data['a_image']=$dataf['file_name'];
                        }
                        else
                        {
                            $upload_error=$this->upload->display_errors();                            
                        }
                    }
                
                               
                               
                    if($this->adminoperation->about_update($data,$this->session->lang))
                    {
                        $this->session->set_flashdata('success', 'About Page Updated SuccessFully');
                                
                            $data['a_data']=$this->adminoperation->getabout($this->session->lang);
                            $data['upload_error']=@$upload_error;
                            $this->load->view('admin/header');
                            $this->load->view('admin/about',$data);

                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Something Went Wrong');
                        $data['upload_error']=$upload_error;
                        $data['a_data']=$this->adminoperation->getabout($this->session->lang);
                        $this->load->view('admin/header');
                        $this->load->view('admin/about',$data);


                    }
                }
                else
                {
        
                      $data['a_data']=$this->adminoperation->getabout($this->session->lang);
                    $this->load->view('admin/header');
                    $this->load->view('admin/about',$data);

                }
            }
            else
            {
                
        
            $data['a_data']=$this->adminoperation->getabout($this->session->lang);
            $this->load->view('admin/header');
            $this->load->view('admin/about',$data);
            
                
            }
        
    }
    
    
    
    

    
/******************************LogOut Function***************************************************************************/
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url().'admin');
    }
/************************************************************************************************************************/
    public function language()
    {
         $this->session->lang=$this->uri->segment(3);
        ?>
        <script type="text/javascript">
            history.go(-1);
        </script>
        <?php         

    }
}