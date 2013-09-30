<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class British_council extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->ci =& get_instance();
		$this->ci->load->config('tank_auth', TRUE);
		$this->load->library('layout');
		$this->load->library('form_validation');
	}
	function survey()
	{
		$data['title']="British council Survey Title";
		$data['description'] = "Description of survey page";
		$data['keywords'] = "keywords";
		//echo $serverName = $_SERVER['SERVER_NAME'];
		//echo $ipremote = $_SERVER['REMOTE_ADDR'];
		//echo $ipserver = $_SERVER['SERVER_ADDR'];
		//echo base64_encode('tyroo');
		//print_r($_SERVER);
		$source = (isset($_GET['source']))?base64_decode($_GET['source']):'admin';
		$dataInsert = array(
			'ipremote' => $_SERVER['REMOTE_ADDR'],
			'serverName' => $_SERVER['SERVER_NAME'],
			'userAgent' => $_SERVER['HTTP_USER_AGENT'],
			'source' => $source
		);
		$this->db->insert('bc_campaign',$dataInsert);
		$this->layout->view('static/british',$data);
	}
}
