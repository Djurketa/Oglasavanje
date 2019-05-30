<?php 
/**
 * 

 */
class User_model extends CI_Model
{
	
	public function register($password_hush)		
	{
		$data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'zipcode' => $this->input->post('zipcode'),
			'password' => $password_hush
		);
		return $this->db->insert('users',$data);
	}
	//log user in
	public function login($email,$password){
		
		$this->db->select('password,name,id');
		$this->db->where('email',$email);
		$query=$this->db->get('users');
		
		if ($query->num_rows()==1) {
		$row=$query->row(0);
			
		if (password_verify($password, $row->password)){
		 	return array($row->id,$row->name);}
		}else{
		 return false;
		}
	}	
	//check email exists
	public function check_email_exists($email){
			$query = $this->db->get_where('users', array('email' => $email));
			if(empty($query->row_array())){
				return true;			
			} else {
				return false;
			}
	}
	public function checkUser($userData = array()){
        if(!empty($userData)){
            //check whether user data already exists in database with same oauth info
          
            $this->db->select('id,name');
            $this->db->from('users');
            $this->db->where(array('oAuth_id'=>$userData['oAuth_id']));
            $prevQuery = $this->db->get();
            $prevCheck = $prevQuery->num_rows();
            //if user exists
            if($prevCheck > 0){
                $prevResult = $prevQuery->row_array();                
                //get user and name for session
                $userID = $prevResult;
                
            }else{
                //insert user data
                if(!$this->check_email_exists($userData['email'])){
                	
                	return $userID='';
             
                }
                $insert = $this->db->insert('users', $userData);
                
                //get user id and name for session 
                $userID = array('id'=>$this->db->insert_id(),'name'=>$userData['name']);

            }
            //return user ID
        return $userID?$userID:FALSE;
        }
        
       
    }


}