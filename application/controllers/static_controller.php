<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Static_controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('layout');
	}
	function privacy_policy()
	{
		$this->layout->view('static/privacy_policy');
	}
	function about_us()
	{
		$this->layout->view('static/about_us');
	}
	function contact_us()
	{
		$this->layout->view('contact_us');
	}
	function terms()
	{
		$this->layout->view('static/terms');
	}
}