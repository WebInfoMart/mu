<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Learn extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('layout');
	}
	function index()
	{
		$this->layout->view('learn');
	}
}