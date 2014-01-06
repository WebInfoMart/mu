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
		$this->ci->load->config('email', TRUE);
	}
	function index() {
		
		$data['title'] = "2014 Abroad University Events & Abroad Education fairs in India : Meetuniv.com";
		$data['description'] = "MeetUniv connects you Upcoming 2014 Abroad university Events & Abroad education fairs in india of top Uk Colleges, Abroad University,course details,admissions,Abroad scholarships,visa & more.";
		$data['keywords'] = "UK university events ,Meet UK Universities events, Abroad University events in india,Spot Admission & scholarships, indian scholarships for studying abroad,Abroad Education Fairs in india,uk university education fair, Meet top Abroad Universities,2014 UK University Fair,study abroad,List of Scholarships for International Students,Study in Uk";
		$this->layout->view('connect/connect',$data);
    }
	function CurrentDate()
	{
		$date = date('j/n/Y');
		$date2 =
		$array = array(
		  array(
			$date, 
			'Today', 
			'http://meetuniv.com/connect',
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
		echo $data['type'];
		$data['connect'] = $this->connectmodel->getConnectDetailsForEmail($this->input->post('connectId'));
		if($data['type']=='sms')
		{
			$sms = 'MeetUniv.com-All About Universities Worldwide.\nDirect "Connect" Reminder:\nDate: '.$data['connect']['date'].'\nTime: '.$data['connect']['time'].'\nLocation: '.$data['connect']['location'].'\nHelp: 8375034794\nMeetUniv.Com';
			$sms=urlencode($sms);
			$content=file_get_contents("http://api.unicel.in/SendSMS/sendmsg.php?uname=meetuni&pass=letsrock&send=meetus&dest=91".$data['phone']."&msg=".$sms);
		}
		else if($data['type']=='register')		
		{
			//$this->load->library('email');
			$this->email->set_newline("\r\n");
			$config['protocol'] = $this->config->item('mail_protocol','email');
			$config['smtp_host'] = $this->config->item('smtp_server','email');
			$config['smtp_user'] = $this->config->item('smtp_user_name','email');
			$config['smtp_pass'] = $this->config->item('smtp_pass','email');
			$this->email->initialize($config);
			$this->email->from($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
			$this->email->reply_to($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
			$this->email->to($data['email']);
			$this->email->bcc('nitin@meetuniv.com','debal@meetuniv.com','deepak@webinfomart.com');
			$this->email->subject('Attending Event Info');
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
		
		
		$this->db->query('update connect set counter=counter+1 where id='.$data['connectId']);
		//$this->db->insert('connectUser',$data);
		$this->db->query("insert into connectUser(connectId,name,phone,email,type) values(".$data['connectId'].",'".$data['name']."','".$data['phone']."','".$data['email']."','".$data['type']."')");
		
		exit;
	}
	public function filterByLocation($page='')
	{
		$city = $this->input->post('cityName');
		$FiltercityArray = explode(',',$city);
		$cityIdArray = array();
		if(strlen($city))
		{
			foreach($FiltercityArray as $index=>$key)
			{
				$this->db->select('id');
				$this->db->where('cityName',$key);
				$this->db->from('city');
				$res = $this->db->get();
				$tempraryCity = $res->row();
				if($tempraryCity)
				{
				$cityIdArray[] = $tempraryCity->id;
				}
			}
		}
		$config = array();
        $config["base_url"] = base_url() . "connect/filterByLocation";
        $config["total_rows"] = $this->connectmodel-> record_count($cityIdArray);
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
        $this->pagination->initialize($config);
		
		if($this->input->post('date'))
		{
			$data["results"] = $this->connectmodel-> getConnectByCityShortDate($config["per_page"], $page, $cityIdArray);
		}
		else if($this->input->post('univ'))
		{
			$data["results"] = $this->connectmodel-> getConnectByCityShortUniv($config["per_page"], $page, $cityIdArray);
		}
		
		else if($this->input->post('desti'))
		{
			$data["results"] = $this->connectmodel-> getConnectByCityShortDesti($config["per_page"], $page, $cityIdArray);
		}
		else
		{
			$data["results"] = $this->connectmodel-> getConnectByCity($config["per_page"], $page, $cityIdArray);
		}
		$data["links"] = $this->pagination->create_links();
		$data["countResults"] = $this->connectmodel-> record_count($cityIdArray);
        $content = $this->load->view("connect/connectPagination", $data);
		echo $content;
	}
	
}