<?php 
require_once FCPATH.('/vendor/autoload.php');

class Google {
	protected $CI;
	public function __construct(){
		$this->CI =& get_instance();
        $this->CI->load->library('session');
        $this->CI->config->load('google');
        $this->client = new Google_Client();
		$this->client->setClientId($this->CI->config->item('client_id'));
		$this->client->setClientSecret($this->CI->config->item('client_secret'));
		$this->client->setRedirectUri($this->CI->config->item('redirect_uri'));
		$this->client->setScopes($this->CI->config->item('scopes'));
  
	}
	public function get_login_url(){
		return  $this->client->createAuthUrl();
	}
	public function validate(){		
		if (isset($_GET['code'])) {
		  $this->client->authenticate($_GET['code']);
		  
		  $_SESSION['access_token'] = $this->client->getAccessToken();

		}
		if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
		  $this->client->setAccessToken($_SESSION['access_token']);
		  $plus = new Google_Service_Plus($this->client);
			$person = $plus->people->get('me');
			$userData['oAuth_id']=$person['id'];
			$userData['email']=$person['emails'][0]['value'];
			$userData['name']=$person['displayName'];
			
			
		   return  $userData;
		}
	}	
		public function revokeToken(){

	     $this->client->revokeToken();

	     
	    
	   
	     return true;
	 
	}
}