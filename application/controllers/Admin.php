<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
		function __construct() {
        parent::__construct();
      	$this->load->helper(array('form', 'url'));
      	$this->load->model('Mdl_admin');
		/* chk admin logged in or not*/

		if(!$this->session->userdata('admin_logged_in'))
		{
			redirect('login');
		}
    }
    //  ##Load pages
	public function index()
	{
		$this->add_user();
	}

    // ## Category
    // load category page
	public function category()
	{
		
		$data['vw_category'] = 'vw_category';
		$data['msg'] = '';
		
		$data['category'] = $this->Mdl_admin->all_category();
	
		$this->load->view('vw_admin',$data);
	}
	// ## Category Insert
    public function insert_cat()
    {
    	$data['vw_category'] = 'vw_category';
    	$data['category'] = $this->Mdl_admin->all_category();
		$result = $this->Mdl_admin->cat_insert();
		if($result==1)
		{

            $this->session->set_flashdata('msg', 'Successfully Added Category!!');
            $this->session->set_flashdata('msg_type', 'success');
		}
		else
		{

            $this->session->set_flashdata('msg', 'Sorry!! Category wast not added!!Try Again');
            $this->session->set_flashdata('msg_type', 'danger');
		}
	

		redirect('admin/category');
    }	

	//##category update
    public function update_cat()
    {
    	$this->load->model('Mdl_admin');
    	$data['vw_category'] = 'vw_category';
    	
		$data['category'] = $this->Mdl_admin->all_category();
		$result = $this->Mdl_admin->cat_update();
		if($result==1)
		{
            $this->session->set_flashdata('msg', 'Successfully Updated Category!!');
            $this->session->set_flashdata('msg_type', 'success');
		}
		else
		{

            $this->session->set_flashdata('msg', 'Sorry!! Category wast not updated!!Try Again');
            $this->session->set_flashdata('msg_type', 'danger');
		}
		

        redirect('admin/category');
    }
    // ## Category Delete
   public function category_delete($id=null)
   {
		$data['vw_category'] = 'vw_category';
		$data['msg'] = '';	
		
		$query = $this->Mdl_admin->delete_cat($id);
		if($query==1)
		{
            $this->session->set_flashdata('msg', 'Successfully deleted Category!!');
            $this->session->set_flashdata('msg_type', 'success');
		}
		else{

            $this->session->set_flashdata('msg', 'Sorry!! Category wast not deleted!!Try Again');
            $this->session->set_flashdata('msg_type', 'danger');
		}

		redirect('admin/category');

	}
	

	

    // ## product
    //## load product page load
    public function product($msg=null)
    {
		
		$data['vw_product'] = 'vw_product';
		$data['msg'] = '';
		$data['category'] = $this->Mdl_admin->all_category();
		if($msg==1)
		{
            $this->session->set_flashdata('msg', 'Successfully Deleted product!!');
            $this->session->set_flashdata('msg_type', 'success');
		}
		else if($msg=='x'){

            $this->session->set_flashdata('msg', 'Sorry!! product wast not deleted!!Try Again');
            $this->session->set_flashdata('msg_type', 'danger');
		}
		else
		{
			$data['msg'] = '';
		}
		$this->load->library('pagination');

 		$this->load->database(); //load library database

        // Config setup for pagination
		$num_rows=$this->db->count_all("product");
 		$config['base_url'] = base_url().'admin/product';
 		$config['total_rows'] = $num_rows;	
		$config['per_page'] = 6;
 		$config['num_links'] = 4;
 		$config['use_page_numbers'] = TRUE;
 		$config['full_tag_open'] = '<ul class="pagination">';
 		$config['full_tag_close'] = '</ul>';
 		$config['prev_link'] = '&laquo;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
 		$config['cur_tag_open'] = '<li class="active"><a href="#">';
	 	$config['cur_tag_close'] = '</a></li>';
 		$config['num_tag_open'] = '<li>';
 		$config['num_tag_close'] = '</li>';
		$config['next_link'] = '&raquo;';

 		$config['uri_segment'] = 3;
		if($this->uri->segment(3)){
		 $offset = $this->uri->segment(3);
		}
		else
		{
			$offset =1;
		}
 		$this->pagination->initialize($config);

 
 		$data['product'] = $this->Mdl_admin->load_product_page($config['per_page'],$offset);
		
		$this->load->view('vw_admin',$data);
	}
	// Add a product
	public function product_publish()
	{
		$data['vw_product'] = 'vw_product';
		$data['msg'] = '';
		$data['category'] = $this->Mdl_admin->all_category();
		$result = $this->Mdl_admin->product_insert();
		if($result==1)
		{
            $this->session->set_flashdata('msg', 'Successfully added product!!');
            $this->session->set_flashdata('msg_type', 'success');
		}
		else
		{
            $this->session->set_flashdata('msg', 'Sorry!! product wast not added!!Try Again');
            $this->session->set_flashdata('msg_type', 'danger');

		}
		$this->load->library('pagination');

 		$this->load->database(); //load library database

     // Config setup
		$num_rows=$this->db->count_all("product");
 		$config['base_url'] = base_url().'admin/product';
 		$config['total_rows'] = $num_rows;	
		$config['per_page'] = 6;
 		$config['num_links'] = 4;
 		$config['use_page_numbers'] = TRUE;
 		$config['full_tag_open'] = '<ul class="pagination">';
 		$config['full_tag_close'] = '</ul>';
 		$config['prev_link'] = '&laquo;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
 		$config['cur_tag_open'] = '<li class="active"><a href="#">';
	 	$config['cur_tag_close'] = '</a></li>';
 		$config['num_tag_open'] = '<li>';
 		$config['num_tag_close'] = '</li>';
		$config['next_link'] = '&raquo;';

 		$config['uri_segment'] = 3;
		if($this->uri->segment(3)){
		 $offset = $this->uri->segment(3);
		}
		else
		{
			$offset =1;
		}
 		$this->pagination->initialize($config);

 
 		$data['product'] = $this->Mdl_admin->load_product_page($config['per_page'],$offset);
		redirect('admin/product');

    }
		
    //## product update

	public function update_product()
	{
		$this->load->model('Mdl_admin');
        $data['vw_product'] = 'vw_product';   
        $data['product'] = $this->Mdl_admin->product_updated();
   

    	if($data['product'] ==0)
		{
            $this->session->set_flashdata('msg', 'Sorry!! product wast not updated!!Try Again');
            $this->session->set_flashdata('msg_type', 'danger');

        }
		
		else
		{
            $this->session->set_flashdata('msg', 'Successfully updated product!!');
            $this->session->set_flashdata('msg_type', 'success');
		}
		$this->load->library('pagination');

 		$this->load->database(); //load library database

     // Config setup
		$num_rows=$this->db->count_all("product");
 		$config['base_url'] = base_url().'admin/product';
 		$config['total_rows'] = $num_rows;	
		$config['per_page'] = 6;
 		$config['num_links'] = 4;
 		$config['use_page_numbers'] = TRUE;
 		$config['full_tag_open'] = '<ul class="pagination">';
 		$config['full_tag_close'] = '</ul>';
 		$config['prev_link'] = '&laquo;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
 		$config['cur_tag_open'] = '<li class="active"><a href="#">';
	 	$config['cur_tag_close'] = '</a></li>';
 		$config['num_tag_open'] = '<li>';
 		$config['num_tag_close'] = '</li>';
		$config['next_link'] = '&raquo;';

 		$config['uri_segment'] = 3;
		if($this->uri->segment(3)){
		 $offset = $this->uri->segment(3);
		}
		else
		{
			$offset =1;
		}
 		$this->pagination->initialize($config);

 
 		$data['product'] = $this->Mdl_admin->load_product_page($config['per_page'],$offset);
		
		redirect('admin/product');
	}

	//## product delete
	public function product_delete($id)
	{
		$data['vw_category'] = 'vw_product';
		$data['msg'] = '';		

		$query = $this->Mdl_admin->delete_product($id);
		
		$data['category'] = $this->Mdl_admin->all_category();

		$data['product'] = $this->Mdl_admin->load_product();
		redirect('admin/product/'.$query);
	} 
	
	// ## Add customer page load
	public function add_user()
	{
		$data['vw_add_user'] = 'vw_add_user';
		$data['msg'] = '';
		$data['all_profile'] = $this->Mdl_admin->all_profile();

		$this->load->view('vw_admin',$data);
	}
	//## add a new customer
	public function add_profile()
	{

	 	$data['vw_add_user'] = 'vw_add_user';
        $user_name = $this->input->post('user_name');
    	$email = $this->input->post('user_email'); 
    	$password = $this->input->post('user_password');
    	$passconf = $this->input->post('user_passconf');
    	$designation = $this->input->post('user_type');

        
		$this->form_validation->set_rules('user_password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('user_passconf', 'Password Confirmation', 'trim|required|matches[user_password]');
		$this->form_validation->set_rules('user_email', 'Email', 'trim|required|valid_email|is_unique[user.user_email]');

		if($this->form_validation->run()==FALSE)
           
    	{   
            $data['vw_add_user'] = 'vw_add_user';
            $data['msg'] = '';		
			$data['all_profile'] = $this->Mdl_admin->all_profile();
    		
    	}

    	else
    	{
            $this->load->library('encrypt');
            $enc_password = md5($password);
    	  	$data['msg'] = '';
			$data['vw_add_user'] = 'vw_add_user';    
    		$data['profile'] = $this->Mdl_admin->profile_add($user_name,$enc_password,$email,$designation);
    	
            $data['all_profile'] = $this->Mdl_admin->all_profile();

	    	if($data['profile'] ==0)
			{
                $this->session->set_flashdata('msg', 'Sorry!! user wast not added!!Try Again');
                $this->session->set_flashdata('msg_type', 'danger');

            }
			
			else
			{
                $this->session->set_flashdata('msg', 'Successfully added user!!');
                $this->session->set_flashdata('msg_type', 'success');

			}
       	
    	}
        $this->load->view('vw_admin',$data);
	}	

	public function edit_profile($id)
	{
		$data['vw_edit_user'] = 'vw_edit_user';
		$data['msg'] = '';
		$data['profile'] = $this->Mdl_admin->load_profile($id);
		$this->load->view('vw_admin',$data);
	}
	

	//  ##Customer Profile update
	public function profile_update()
    {
    
        $id = $this->input->post('user_id');

     	$user_name = $this->input->post('user_name');
     	$email = $this->input->post('user_email');
     	$user_old_password = $this->input->post('user_old_password');
    	$password = $this->input->post('user_password');
    	$passconf = $this->input->post('user_passconf');

        $data['vw_edit_user'] = 'vw_edit_user';
		$this->form_validation->set_rules('user_password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('user_passconf', 'Password Confirmation', 'trim|required|matches[user_password]');
		$this->form_validation->set_rules('user_email', 'Email', 'trim|required|valid_email');
		if($this->form_validation->run()==FALSE)
           
    	{   
           
            $data['msg'] = '';
			$data['profile'] = $this->Mdl_admin->load_profile($id);
    		$this->load->view('vw_admin',$data);
    	}

    	else
    	{
            
            $enc_password = md5($password);
            $enc_old_password = md5($user_old_password);
           
     
    		$data['profile'] = $this->Mdl_admin->profile_edited($id,$user_name,$enc_password,$email,$enc_old_password);
      ;
		    	if($data['profile'] ==0)
				{
                    $this->session->set_flashdata('msg', 'Sorry!! there was a prob!!Try Again');
                    $this->session->set_flashdata('msg_type', 'danger');
				}
				else if($data['profile'] ==1)
				{

                    $this->session->set_flashdata('msg', 'Sorry!! Wrong old password');
                    $this->session->set_flashdata('msg_type', 'danger');
				}
				else
				{

                    $this->session->set_flashdata('msg', 'Profile updated');
                    $this->session->set_flashdata('msg_type', 'success');

				}
			$data['profile'] = $this->Mdl_admin->load_profile($id);

		
    	}
    	redirect('admin/edit_user/'.$id);
        
    }
        

	//admin or customer delete
	public function admin_delete($id)
	{

		
		$query = $this->Mdl_admin->delete_admin($id);
		if($query==1)
		{
            $this->session->set_flashdata('msg', 'Successfully deleted customer!!');
            $this->session->set_flashdata('msg_type', 'success');
		}
		else{
            $this->session->set_flashdata('msg', 'Sorry!!customer was not deleted');
            $this->session->set_flashdata('msg_type', 'danger');
		}
		$data['all_profile'] = $this->Mdl_admin->all_profile();
		
		redirect('admin/add_user');
	} 
	
	
    

}

