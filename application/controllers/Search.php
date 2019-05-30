<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller
{	

	public function result (){
		
		
		$search=$this->input->get('search');
		
		$this->load->model('search_model');
		$data['articles']=$this->search_model->search($search);
		//$data['search']=$this->input->post('search');
		
		
		if (empty($data['articles'])) {
		$this->session->set_flashdata('search_result', 'Nema rezultata pretrage');
		redirect('home');
		}else {
		$this->load->view('templates/header');
		$this->load->view('pages/home',$data);
		$this->load->view('templates/footer');
		}
	}
	public function sort(){
		
		$uri=$this->input->post('uri');
		$sort['sort']=$this->input->post('sort');
		
		$this->session->set_userdata($sort);
		redirect($uri);	
	}

}
