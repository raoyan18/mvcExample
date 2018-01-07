<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
        parent::__construct();
        /* chk user logged in or not*/

        if($this->session->userdata('user_logged_in') || $this->session->userdata('admin_logged_in'))
        {
        	$this->check_type();
        }
    }

    public function index(){
    	$this->load->view('vw_login');
    }
    //## redirect page according to the user type
    public function check_type(){

        if($this->session->userdata('admin_logged_in'))
            redirect('Admin');
        else
            redirect('products');
    }

    public function do_login(){
    	
    	$this->load->model('Mdl_admin');
    	$username = $this->input->post('email');
    	$password = $this->input->post('password');

    	$this->form_validation->set_rules('email','Email','required');
    	$this->form_validation->set_rules('password','Password','required');

    	if($this->form_validation->run()==FALSE)
           
    	{
    		$this->load->view('vw_login');
    	}

    	else
    	{
            $this->load->library('encrypt');
            $enc_password = md5($password);
    		$is_valid = $this->Mdl_admin->validate($username,$enc_password);

            if($is_valid){
               
            $this->check_type();
            }
           
            else
            {
                $data['msg_type'] = 'class="alert alert-error" ';
                $data['msg'] = '*Invalid Username or Password';
                $this->load->view('vw_login',$data);
            }
    		
    	
    	}

    }

}

