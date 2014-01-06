<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Learn extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->ci =& get_instance();
		$this->ci->load->config('tank_auth', TRUE);
		$this->load->library('layout');
		$this->load->library('form_validation');
	}
	function index()
	{
		$data = array();
		$data['title'] = "MeetUniv provides Video Lectures,Article on IELTS,TOEFL,GRE,GMAT";
		$data['description'] = "MeetUniv  provides Video Lectures,Article on IELTS,TOEFL,GMAT,GRE, for study in Abroad Universities from the best of curated educational content on the web.";
		$data['keywords'] = "UK Universities courses,Video Lectures,Articles,IELTS,TOEFL,GRE,GMAT,University events in india,Spot Admission & scholarships,Meet top UK Universities,indian scholarships for studying abroad,Education Fairs in india,Top study abroad scholarships,2014 UK University Fair";
		if($this->input->post())
		{
			$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
			$this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');
			if($this->form_validation->run())
			{
				$data = array(
						'name'=>$this->input->post('name'),
						'email'=>$this->input->post('email'),
						'queryType'=>'learn',
						'message'=>$this->input->post('message')
				);
				$this->db->insert('contact',$data);
				$message = "Name: ".$data['name']."<br>Email: ".$data['email']."<br>Query Type: ".$data['queryType']."<br>Message: ".$data['message'];
				$this->load->library('email');
				$this->email->from($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
				$this->email->reply_to($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
				$this->email->to('deepak@webinfomart.com');
				$this->email->bcc('nitin@meetuniv.com','debal@meetuniv.com');
				$this->email->subject('Contact Us');
				$this->email->message($message);
				$this->email->send();
				
				$data['success']="Successfully Saved!";
			}
		}
		$this->layout->view('learn',$data);
	}
	function email_testing()
	{
		$this->email->set_newline("\r\n");
		$config['protocol'] = $this->config->item('mail_protocol');
		$config['smtp_host'] = $this->config->item('smtp_server');
		$config['smtp_user'] = $this->config->item('smtp_user_name');
		$config['smtp_pass'] = $this->config->item('smtp_pass');
		$this->email->initialize($config);    
		$this->email->from('info@meetuniv.com', 'MeetUniv.com');
		$this->email->to('deepak@webinfomart.com');
		$this->email->subject('test');
		$message = "hi deepak manwal" ;
		$this->email->message($message);
		$this->email->send();
	}
}