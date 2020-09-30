<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        // $this->load->library('form_validation');
        // $this->load->model('adminmodels');
        if($this->session->userdata('admin_id'))
        {
            redirect(base_url().'admindashboard');
        }
	}

    public function index()
    {   
        if($this->session->userdata('admin_id'))
        {
            redirect(base_url('admindashboard'));
        }
        else
        {
       		$this->load->view('admin/index'); 
        }
    }

    public function adminlogin()
    {
    	$this->form_validation->set_rules('username','User Name','required|trim');
        $this->form_validation->set_rules('password','Password','required|trim');
        if ($this->form_validation->run())
        {

                $username=$this->input->post('username');
                $password=$this->input->post('password');
                // $password=md5($password);
                $this->load->model('adminmodel');
                $admindata = $this->adminmodel->adminvalid($username,$password);
                if($admindata)
                {
                 $this->session->set_userdata(array('admin_type'=>$admindata['a_type'],'admin_id'=>$admindata['a_id'],'admin_user'=>$admindata['a_user'],'admin_email'=>$admindata['a_email'],'lang'=>'en'));
                        
                    if($admindata['a_id']=='3')
                    {
                        
                    redirect('admindashboard/orders');
                    }
                    else if($admindata['a_id']=='2')
                    {
                        redirect('admindashboard/productview');
                    }
                    else
                    {
                        redirect('admindashboard');
                    }
                }                       
                else
                {
                    $this->session->set_flashdata('error', 'Invalid Username/Password');
                    redirect('admin/index');
                }
        }
        else
        {

                $this->load->view('admin/index');
        }

    }

    public function logout()
    {
    	$this->session->unset_userdata('admin_id');
    	// $this->session->sess_destroy();
    	redirect(base_url().'admin');
    }
}
