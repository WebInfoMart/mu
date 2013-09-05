<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Connect extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('layout');
		$this->load->model('connectmodel');
		$this->load->model('collegemodel');
		$this->load->library("pagination");
		$this->load->model('tank_auth/users');
	}
	function index() {
       $this->layout->view('connect/connect');
    }
	function CurrentDate()
	{
		$date = date('j/n/Y');
		$array = array(
		  array(
			$date, 
			'bootstrap logo popover!', 
			'#', 
			'#51a351', 
			'<img src="http://bit.ly/XRpKAE" />'
		  )
		);

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
	}
	
}