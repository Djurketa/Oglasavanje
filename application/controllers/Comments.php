<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
class Comments extends CI_Controller
{
	
	function create($id)
	{
		$data['comments']=$this->comment_model->get_comments($id);
		$data['article']=$this->article_model->get_articles($id);

		$this->form_validation->set_rules('comment','Comment','required');

		if ($this->form_validation->run()===FALSE) {
			
			$this->load->view('templates/header');
			$this->load->view('pages/article', $data);
			$this->load->view('templates/footer');
		} else{
			$this->comment_model->create_comment($id);
			redirect('article/'.$id);
		}

	}
}