<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Layout
{
    public $head = 'layout/head';
    public $header = 'layout/header';
    public $sidebar = 'layout/sidebar';
    public $footer = 'layout/footer';
	function __construct()
	{
		$this->lt =& get_instance();
		//$this->load->model('header_model');	
	}
	function view($view ='', $data ='')				//load view in controller with layout
	{
		//$sessionData = $this->session->userdata('loggedIn');
		//$this->load->view($this->head,$data);
		$this->lt->load->view($this->header,$data);
		//$this->load->view($this->sidebar,$data);
		$this->lt->load->view($view, $data);
		$this->lt->load->view($this->footer,$data);
	}
}
?>