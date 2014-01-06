<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Static_controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->ci =& get_instance();
		$this->ci->load->config('tank_auth', TRUE);
		$this->ci->load->config('email', TRUE);
		$this->load->library('layout');
		$this->load->library('form_validation');
	}
	function privacy_policy()
	{
		$data['title'] = "MeetUniv.Com : Privacy Policy";
		$data['description'] = "MeetUniv.com | Please read our privacy policy carefully";
		$data['keywords'] = "Meet UK Universities,Study in UK,Study in UK universities,Study MBA in UK,Colleges in UK,International students,Universities &  colleges in UK,Higher education in UK,Best universities in UK ,List of Top 10 colleges & universities,IELTS-GMAT-TOEFL,Universities events,Engineering colleges in UK ,Postgraduate study,Scholarships,Executive MBA in UK,Education Fairs,Spot Admission,University Visits,Courses,Test Preparation";
		$this->layout->view('static/privacy_policy',$data);
	}
	function about_us()
	{
		$data['title'] = "MeetUniv.Com provides Spot Admission, scholarships,Abroad University events & Abroad Education Fairs in india, connect with universities worldwide";
		$data['description'] = "With Upcoming 2014 Abroad university Events & Abroad education fairs in india, we listed top 1000 universities & colleges with course details,admissions process ,scholarships,visa .Meet the university directly on MeetUniv.Com. We lets you research, shortlist & apply to the university of your choice.";
		$data['keywords'] = "Spot Admission & scholarships, indian scholarships for studying abroad,study abroad,Study in Uk,Abroad Education Fairs in india,UK university events ,2014 UK University Fair,Meet UK Universities events, Abroad University events in india,uk university education fair, Meet top UK Universities,Top study abroad scholarships";
		$this->layout->view('static/about_us',$data);
	}
	function contact_us()
	{
		$data = array();
		$data['title'] = "MeetUniv.Com : Contact Us";
		$data['description'] = "MeetUniv.com | Contact Us at  E-11, Greater Kailash Part 1, New Delhi";
		$data['keywords'] = "Meet UK Universities,Study in UK,Study in UK universities,Study MBA in UK,Colleges in UK,International students,Universities &  colleges in UK,Higher education in UK,Best universities in UK ,List of Top 10 colleges & universities,IELTS-GMAT-TOEFL,Universities events,Engineering colleges in UK ,Postgraduate study,Scholarships,Executive MBA in UK,Education Fairs,Spot Admission,University Visits,Courses,Test Preparation";
		if($this->input->post())
		{
			$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
			$this->form_validation->set_rules('type', 'Type', 'trim|required');
			$this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');
			if($this->form_validation->run())
			{
				$data = array(
						'name'=>$this->input->post('name'),
						'email'=>$this->input->post('email'),
						'queryType'=>$this->input->post('type'),
						'message'=>$this->input->post('message')
				);
				$this->db->insert('contact',$data);
				$message = "Name: ".$data['name']."<br>Email: ".$data['email']."<br>Query Type: ".$data['queryType']."<br>Message: ".$data['message'];
				//$this->load->library('email');
				$this->email->set_newline("\r\n");
				$config['protocol'] = $this->config->item('mail_protocol','email');
				$config['smtp_host'] = $this->config->item('smtp_server','email');
				$config['smtp_user'] = $this->config->item('smtp_user_name','email');
				$config['smtp_pass'] = $this->config->item('smtp_pass','email');
				$this->email->initialize($config);
				$this->email->from($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
				$this->email->reply_to($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
				$this->email->to('deepak@webinfomart.com');
				$this->email->bcc('nitin@meetuniv.com','debal@meetuniv.com','debal@webinfomart.com','kapoorn@gmail.com');
				$this->email->subject('Contact Us');
				$this->email->message($message);
				$this->email->send();
				
				$data['success']="Successfully Saved!";
			}
		}
		$this->layout->view('contact_us',$data);
	}
	function terms()
	{
		$data['title'] = "MeetUniv.Com : Terms";
		$data['description'] = "MeetUniv.com | Terms and Condition";
		$data['keywords'] = "Meet UK Universities,Study in UK,Study in UK universities,Study MBA in UK,Colleges in UK,International students,Universities &  colleges in UK,Higher education in UK,Best universities in UK ,List of Top 10 colleges & universities,IELTS-GMAT-TOEFL,Universities events,Engineering colleges in UK ,Postgraduate study,Scholarships,Executive MBA in UK,Education Fairs,Spot Admission,University Visits,Courses,Test Preparation";
		$this->layout->view('static/terms',$data);
	}
}