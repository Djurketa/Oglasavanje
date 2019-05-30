<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller
{
	
	public function view($id=0)

	{	
		if ($id==0) {
		$data['categories'] = $this->article_model->get_categories();


		$this->load->view('templates/header');
		$this->load->view('pages/categories', $data);
		$this->load->view('templates/footer');
		}else{
		$data['articles']=$this->article_model->get_category($id);

		if(empty($data['articles'])){
			$this->session->set_flashdata('no_articles', 'U trazenoj kategoriji trenutno nema oglasa');
			redirect('categories/view');
		}
		
		$this->load->view('templates/header');
		$this->load->view('pages/home', $data);
		$this->load->view('templates/footer');
		}

		
	}
	
}