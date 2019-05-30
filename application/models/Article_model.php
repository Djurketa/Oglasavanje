<?php 

class Article_model extends CI_Model
{
	
	function __construct(){
		$this->load->database();
	}

	public function get_articles($id=FALSE){
		//If $id=false, show all
		if($id===FALSE){
			$this->db->order_by('articles.id','DESC');
			$query = $this->db->get('articles');
			return $query->result_array();
		}
		//if id exist, show one
		$query =$this->db->get_where('articles',array('id' => $id));
		return $query->row_array();
	}

	public function create_article($article_image){
		$data = array(
			'name' => htmlspecialchars($this->input->post('name')),
			'description' => $this->input->post('description'),
			'price' => htmlspecialchars($this->input->post('price')),
			'category_id' => htmlspecialchars($this->input->post('category_id')),
			'user_id'=>$this->session->userdata('user_id'),
			'article_image'=> $article_image
			);

		return $this->db->insert('articles',$data);
	}	
	
	public function delete_article($id){
		// Select image name
		$query = $this->db->get_where('articles',array('id' => $id));
		$data = $query->row_array();

		$file = FCPATH.'/assets/images/'.$data['article_image'];
		// Delete image
		if(file_exists($file) && !empty($data['article_image'])){
			unlink($file);
		}
		// Select and delete article comments
		$this->db->where('article_id',$id);
		$this->db->delete('comments');

		// Select and delete article
		$this->db->where('id',$id);
		$this->db->delete('articles');
		return true;
	}
	public function update_article(){
		$data = array(
			'name' => $this->input->post('name'),
			'description' => $this->input->post('description'),
			'price' => $this->input->post('price'),
			'category_id' => $this->input->post('category_id')
		);
		$this->db->where('id', $this->input->post('id'));
		return $this->db->update('articles',$data);
		
	}
	public function get_categories(){
		$this->db->order_by('id');
		$query = $this->db->get('categories');
		return $query->result_array();
	}
	public function user_articles(){
		$this->db->where('user_id',$this->session->userdata('user_id'));
		$query=$this->db->get('articles');
		return $query->result_array();

     	
	}
	public function get_category($id){
		$this->db->where('category_id',$id);
		$query=$this->db->get('articles',);
		return $query->result_array();

	}
}