<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Connect extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->ci =& get_instance();
		$this->load->library('layout');
		$this->load->model('connectmodel');
		$this->load->model('collegemodel');
		$this->load->library("pagination");
		$this->load->model('tank_auth/users');
		$this->ci->load->config('tank_auth', TRUE);
	}
	function index() {
       $this->layout->view('connect/connect');
    }
	function CurrentDate()
	{
		$date = date('j/n/Y');
		$date2 =
		$array = array(
		  array(
			$date, 
			'bootstrap logo popover!', 
			'#', 
			'#51a351', 
			'<img src="http://bit.ly/XRpKAE" />'
		  )
		);
		/* $array[1] = 
		  array(
			"27/09/2013", 
			'github drinkup', 
			'https://github.com/blog/category/drinkup', 
			'blue'
		  ); */
		$dates = $this->connectmodel->getConnectDates();
		foreach($dates as $dates)
		{
			$array[] = array($dates['date'], 
			$dates['tagLine'], 
			'http://meetuniv.com/connect', 
			'blue');
		}
		header('Content-Type: application/json');
		echo json_encode($array);
	}
	function connectPagination($page='')
	{
		$config = array();
        $config["base_url"] = base_url() . "connect/connectPagination";
        $config["total_rows"] = $this->connectmodel->record_count();
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
        $this->pagination->initialize($config);
        $data["results"] = $this->connectmodel->getAllConnects($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();
		$data["countResults"] = $this->connectmodel-> record_count();
		if($this->session->userdata('user_id'))
		{
			$data['userId']	= $this->session->userdata('user_id');
			$data['userData'] = $this->users->getUserDetails($data['userId']);
		}
		$content = $this->load->view("connect/connectPagination",$data);
		echo $content;
	}
	function attendEvent()
	{
		$data = array(
					'connectId' => $this->input->post('connectId'),
					'name' => $this->input->post('name'),
					'phone' => $this->input->post('phone'),
		            'email' => $this->input->post('email'),
					'type'	=> $this->input->post('type')
					);
		if($data['type']=='sms')
		{
			$sms = 'Meetuniversities.com "Connect" Confirmation:
				Date: 22nd May, 2013
				Time: 02:00PM - 06:00PM
				Location: Business Center, Taj Deccan Road # 1 Banjara Hills, Hyderabad
				Help: 08375034794
				MeetUniversities.Com';
			$sms=urlencode($sms);
			$content=file_get_contents("http://api.unicel.in/SendSMS/sendmsg.php?uname=meetuni&pass=letsrock&send=meetus&dest=91".$data['phone']."&msg=".$sms);
		}
		$data['connect'] = $this->connectmodel->getConnectDetailsForEmail($this->input->post('connectId'));
		if($data['type']=='register')		
		{
			$this->load->library('email');
			$this->email->from($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
			$this->email->reply_to($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
			$this->email->to($data['email']);
			$this->email->bcc('nitin@meetuniv.com','debal@meetuniv.com');
			$this->email->subject('Testing');
			$this->email->message($this->load->view('email/registerEvent', $data, TRUE));
			$this->email->send();
		}		
		if($this->session->userdata('user_id'))
		{
			$data['userId']	= $this->session->userdata('user_id');
			echo "loggedIn";
		}
		else
		{
			echo "NoLoggedIn";
		}
		
		$this->db->insert('connectUser',$data);
		exit;
	}
	
}