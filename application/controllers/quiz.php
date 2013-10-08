<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Quiz extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->ci =& get_instance();
		$this->ci->load->config('tank_auth', TRUE);
		$this->load->library('layout');
		$this->load->library('form_validation');
		$this->load->library('tank_auth');
		$this->load->model('quizmodel');
	}
	function index()
	{
		if (!$this->tank_auth->is_logged_in()) {									
			redirect('/auth/login');
		}
		
		$data['title'] = "MeetUniv.Com : Test";
		$data['description'] = "MeetUniv.com";
		$data['keywords'] = "";
		$userId=$this->tank_auth->get_user_id();
		$data['lastQuizTime']=$this->quizmodel->getLastQuizTime($userId);
		$query = $this->db->get('question',40);
		$data['question'] = $query->result();
		$this->layout->view('quiz/quiz',$data);
	}
	function saveanswer()
	{
		$userId = $this->tank_auth->get_user_id();
		echo $data['save'] = $this->quizmodel->saveanswer($userId);
	}
	function savetime()
	{
		$userId=$this->tank_auth->get_user_id();
		echo $data['skipped']=$this->quizmodel->savetime($userId);
		exit;
	}
	function score()
	{
		$data['title'] = "MeetUniv.Com :Test Score";
		$data['description'] = "MeetUniv.com";
		$data['keywords'] = "";
		
		$userId=$this->tank_auth->get_user_id();
		$data['score'] = $this->quizmodel->getUserScore($userId);
		$this->layout->view('quiz/score',$data);
	}
	
}