<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
		function __construct() {
        parent::__construct();
      	$this->load->helper(array('form', 'url'));
      	$this->load->model('Mdl_admin');
		/* chk user logged in or not*/

		if(!$this->session->userdata('user_logged_in'))
		{
			redirect('login');
		}	
    }
    //  ##Load pages
	public function index()
	{
		$data['product'] = $this->Mdl_admin->load_product();
		$data['category'] = $this->Mdl_admin->all_category();

		$this->load->view('vw_user',$data);
	}


}

