<?php 
/**
 * 
 */
class Search_model extends CI_Model
{
	
	function __construct()
	{
		$this->load->database();
	}

	public function search($search){
		$this->db->like('name',$search);
		//$this->db->or_like('description',$search);

		$query=$this->db->get('articles');
		return $query->result_array();	
	}
	
}
