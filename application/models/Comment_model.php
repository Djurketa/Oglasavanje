<?php 
/**
 * 
 */
class Comment_model extends CI_Model
{
	
	public function __construct(){
		
		$this->load->database();
	}
	

	public function create_comment($id){
		
		$data = array(
			'article_id' => $id,
			'comment' => $this->input->post('comment'),
			'name'=>$this->session->userdata('user_name')
		 );
		
		return $this->db->insert('comments',$data);	
	}
	

	public function get_comments($article_id){
		
		$query = $this->db->get_where('comments', array('article_id'=>$article_id));
		return $query->result_array();
	}
	
}