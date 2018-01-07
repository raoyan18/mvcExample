<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

    // ## unset user session variable according to user type
    public function logout_user($type){
        $this->session->unset_userdata($type.'_id');
        $this->session->unset_userdata($type.'_username');
        $this->session->unset_userdata($type.'_name');
       	$this->session->unset_userdata( 'user_type');
       	$this->session->unset_userdata( $type.'_logged_in');
        redirect("login");          
    }
}