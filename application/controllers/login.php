<?php

class Login extends CI_Controller {
   
	function index(){
		if($this->session->userdata('is_logged_in')){
			redirect('admin/users');
        } else {
        	$this->load->view('admin/login');
        }
	}

    function __encrip_password($password) {
        return md5($password);
    }	

   
    function validate_credentials(){
        $this->load->model('model_login');
        $user_name = $this->input->post('user_name');
        $password = $this->__encrip_password($this->input->post('password'));

        $is_valid = $this->model_login->validate($user_name, $password);
        if($is_valid) {
            $data = array(
                'user_name' => $user_name,
                'is_logged_in' => true
            );
            $this->session->set_userdata($data);
            redirect('home/index');
        } else {
            $data['message_error'] = TRUE;
            $this->load->view('admin/login', $data);	
        }
    }

    function signup(){
        $this->load->view('admin/signup_form');	
    }

    function create_member(){
          if ($this->input->server('REQUEST_METHOD') === 'POST'){
            $this->form_validation->set_rules('first_name', 'Name', 'trim|required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
            $this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
            $this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

              if($this->form_validation->run() == FALSE){
                  $this->load->view('admin/signup_form');
              } else {			
                $this->load->model('model_login');

                if($query = $this->model_login->create_member()){
                    $this->load->view('admin/signup_successful');			
                } else {
                    $this->load->view('admin/signup_form');			
                }
            }
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('admin');
    }

}