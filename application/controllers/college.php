<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class College extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('layout');
		//$this->load->model('univ_model');
	}
	function index()
	{
		/* $data=array();
		if($this->input->post('searchUniv'))
		{
			$data['university']=$this->univ_model->search_univ();
		}
		$this->load->view('university/search',$data); */
		$this->layout->view('college/college');
		
	}
}