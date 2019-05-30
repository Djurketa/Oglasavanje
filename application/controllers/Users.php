<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{
	

	public function register(){
		//login check
		if($this->session->userdata('logged_in')){
			redirect('pages/view');
		}

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email','Email','required|callback_check_email_exists');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('cpassword', 'Confirm password', 'matches[password]');
		
		if ($this->form_validation->run()===FALSE) {
		// Data for google and facebook registration
		$this->load->library('facebook');
		$this->load->library('google');
		$data['facebookURL'] =  $this->facebook->login_url();
		$data['googleURL'] = $this->google->get_login_url();

		$this->load->view('templates/header');
		$this->load->view('users/register',$data);
		$this->load->view('templates/footer');
		} else {
		//Hash password
			
		$options = ['cost' => 10,];
		$password_hush=password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);
		$this->user_model->register($password_hush);
		//set message	
		$this->session->set_flashdata('user_registered',
		'Uspjesno ste se registrovali, mozete se prijaviti <a href="users/login">ovdje</a>!!');
		redirect('home');
		}
	}


		
		
	public function login(){
		
		if($this->session->userdata('logged_in')){
		redirect('pages/view');
		}

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run()===FALSE) {

		// Data for google and facebook login
		$this->load->library('facebook');
		$this->load->library('google');
		$data['facebookURL'] =  $this->facebook->login_url();
		$data['googleURL'] = $this->google->get_login_url();	

		$this->load->view('templates/header');
		$this->load->view('users/login',$data);
		$this->load->view('templates/footer');
		} else {
				
			//get username
			$email =$this->input->post('email');
			//get pass hush
			$password=$this->input->post('password');
			//login user
			$user_id= $this->user_model->login($email,$password);
			
			if ($user_id) {
			//create session

			$user_data=array(
				'user_id'=> $user_id[0],
				'user_name'=>$user_id[1],
				'logged_in'=>true
			);
			
			$this->session->set_userdata($user_data);
			//set message
			$this->session->set_flashdata('user_loggedin', 'Uspjesno ste se prijavili');
			redirect('home');

			}else{
				
				//set message
				$this->session->set_flashdata('login_failed', 'Doslo je do greske');
				redirect('users/login');
			}
				
		}


	}
	public function facebook_login(){
		
		if($this->session->userdata('logged_in')){
		redirect('pages/view');
		}
		// load facebook library
		$this->load->library('facebook');
		$userData = array();
		// Check if user is logged in to facebook
        if($this->facebook->is_authenticated()){
            // Get user facebook profile details
            $fbUser = $this->facebook->request('get', '/me?fields=id,name,email');
            // Preparing data for database insertion       
            $userData['oAuth_id'] = !empty($fbUser['id'])?$fbUser['id']:'';;
            $userData['name'] = !empty($fbUser['name'])?$fbUser['name']:'';
            $userData['email'] = !empty($fbUser['email'])?$fbUser['email']:'';            
            // Insert or update user data
            $userID = $this->user_model->checkUser($userData);
            
            // Check user data insert or update status
            if(!empty($userID)){
            // create session data	
        	$user_data=array(
			'user_id'=> $userID['id'],
			'user_name'=>$userID['name'],
			'logged_in'=>TRUE,
			'session_id'=>'facebook'
			);
        	// create session
            $this->session->set_userdata($user_data);
           	$this->session->set_flashdata('user_loggedin', 'Uspjesno ste se prijavili');
            }else{
               $user_data = array();
            }
            $this->session->set_flashdata('user_loggedin', 'Uspjesno ste se prijavili');
			redirect('home');
            
        }
        
	}
	public function google_login(){
		
		$this->load->library('google');
		
		$userData=$this->google->validate();
		
		$userID = $this->user_model->checkUser($userData);
            
            // Check user data insert or update status
            if(!empty($userID)){
            // create session data	
        	$user_data=array(
			'user_id'=> $userID['id'],
			'user_name'=>$userID['name'],
			'logged_in'=>TRUE,
			'session_id'=>'google'
			);
        	// create session
            $this->session->set_userdata($user_data);
            $this->session->set_flashdata('user_loggedin', 'Uspjesno ste se prijavili');
			redirect('home');
           	
            }else{
            $user_data = array();
            $this->session->set_flashdata('user_loggedin', 'Doslo je do greske');
			redirect('home');
            }
           
         
		
		


	}
	public function facebook_logout(){

		$this->load->library('facebook');
        $this->session->sess_destroy();
        $this->session->unset_userdata('session_id');
        $this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_name');
		redirect('users/login');

	}
		
	public function logout(){

		// if user is loged in with facebook
		if($this->session->userdata('session_id')=='facebook'){
		$this->load->library('facebook');
		redirect($this->facebook->logout_url());
		}
		// if user is loged in with google
		if ($this->session->userdata('session_id')=='google') {
		
        // Remove token and user data from the session
		$this->load->library('google');
		$this->google->revokeToken();
		$this->session->unset_userdata('session_id');
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_name');
		
		
		redirect('users/login');

		}
		
        $this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_name');
		redirect('users/login');
       			
		}
		
	public function check_email_exists($email){
		$this->form_validation->set_message('check_email_exists','Email exists');
		if($this->user_model->check_email_exists($email)){
			return true;
		} else {
			return false;
		}
	}
	
	
}