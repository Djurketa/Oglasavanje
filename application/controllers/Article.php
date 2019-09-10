<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller
{
	
	public function view ($id=NULL){

		$data['article'] = $this->article_model->get_articles($id);
		$id = $data['article']['id'];
		$data['comments'] = $this->comment_model->get_comments($id);
		
		if(empty($data['article'])){
			show_404();
		}
		$this->load->view('templates/header');
		$this->load->view('pages/article', $data);
		$this->load->view('templates/footer');
	}
	
	public function create(){
		//login check
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}
		//Rules for validation
		$this->form_validation->set_rules('name','Naslov oglasa','required');
		$this->form_validation->set_rules('description','Opis oglasa','required');
		$this->form_validation->set_rules('price','Cijena','required');
		$this->form_validation->set_rules('category_id','Kategorija','required');

		if ($this->form_validation->run()===FALSE) {
			// Data to list in "Odaberite kategoriju"
			$data['categories'] = $this->article_model->get_categories();
			$this->load->view('templates/header');
			$this->load->view('pages/create', $data);
			$this->load->view('templates/footer');

		} else {
			//upload image
			$config['upload_path']='./assets/images';
			$config['allowed_types']='jpeg|jpg|png';
			$config['max_size']='10000';
			$config['max_width']='5000';
			$config['max_height']='5000';

			$this->load->library('upload',$config);
			if (!$this->upload->do_upload()) {
				$errors= array('error'=>$this->upload->display_errors());
				$article_image = '';
			}else{
				$data=array('upload_data'=>$this->upload->data());
				$article_image = $_FILES['userfile']['name'];
			}

			$this->article_model->create_article($article_image);
			
			$this->session->set_flashdata('created','Uspjesno ste kreirali oglas');
			redirect('article/user_articles');		
		}
	}	
		
	public function delete ($id){
		$data=$this->article_model->get_articles($id);

		if($this->session->userdata('user_id')!=$data['user_id']){
			redirect('home');
		}	
		
		$this->article_model->delete_article($id);
		redirect('user_articles');
		}
	
	public function edit($id){

		$data=$this->article_model->get_articles($id);

		if($this->session->userdata('user_id')!=$data['user_id']){
			redirect('home');
		}	
		$data['categories'] = $this->article_model->get_categories();
		$data['article'] = $this->article_model->get_articles($id);
		if(empty($data['article'])){
			show_404();
		}
		$this->load->view('templates/header');
		$this->load->view('pages/edit', $data);
		$this->load->view('templates/footer');
	}	
	
	public function update(){
		$this->article_model->update_article();
		redirect('pages/view');
	}
	public function user_articles($id=0){
		if (!$this->session->userdata('logged_in') ){
			redirect('pages/view');

		}
	
		$data['user_articles']=$this->article_model->user_articles();
		
		$this->load->view('templates/header');
		$this->load->view('pages/user_articles',$data);
		$this->load->view('templates/footer');

	}	

	
}
