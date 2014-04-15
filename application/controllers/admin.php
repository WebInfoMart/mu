<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('layout');
		//$this->load->model('adminmodel');
		$this->load->library("pagination");
	}
	/* public function test()
	{
		print_r($_POST);exit;
	} */
	public function event() {
		
	  
			
		if (isset($_POST['submit'])) 
		{ 	
			
		 $handle = fopen($_FILES['filename']['tmp_name'], "r");
			
			//$data = fgetcsv($handle, 1000, ",");
			
			while(($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
			{ 
			//echo "<pre>";print_r($data);exit;
				
						$univData = $this->getUnivId($data[0]);
						if(!empty($univData)){
							$univId = $univData;
						}else{
							$univId = '';
						}
						
						if(!empty($data[1])){
							$tagLine = $data[1];
						}else{
							$tagLine = '';
						}
						
						$cityData = $this->getCityId($data[2]);
						//echo "<pre>";print_r($cityData);exit;
						if(!empty($cityData)){
							$cityId = $cityData;
						}else{
							$cityId = '';
						}
						
						$countryData=$this->getCountryId($data[3]);
						if(!empty($countryData)){
							$countryId = $countryData;
						}else{
							$countryId = '';
						}
						
						if(!empty($data[4])){
							$location = $data[4];
						}else{
							$location = '';
						}
						
						if(!empty($data[5])){
							$startTime = $data[5];
						}else{
							$startTime = '';
						}
						
						if(!empty($data[6])){
							$endTime = $data[6];
						}else{
							$endTime = '';
						}
						
						$time = $startTime.' - '.$endTime;
						
						if(!empty($data[7])){
							$date = date('Y-m-d',strtotime($data[7]));
						}else{
							$date = '';
						}
						
						$add = array(
							//'id' => $data[0],
							'univId' => $univId,
							'tagLine' => $tagLine,
							'cityId' => $cityId,
							'countryId' => $countryId,
							'location' => $location,
							'time' => $time,
							'date' => $date							
						);
						if($univId!='')
						$this->db->insert('connect_test', $add);
						//adding content to leads table ends
						 
			}
				fclose($handle);			
		}
		
	   $this->load->view('admin/event.php');	
	}
	
	 public function getUnivId($univName){
		//echo $univName;exit;
		$query = "Select * from university where univName LIKE '%".$univName."%'";
		$sqlQuery = mysql_query($query);
		$rows = mysql_fetch_array($sqlQuery);
		$univId = $rows['id'];
		//echo $univId;exit;
		return $univId;
		//echo "<pre>";print_r($rows);exit;
	} 
	
	public function getCityId($cityName){
		//echo $univName;exit;
		$query = "Select * from city where cityName LIKE '%".$cityName."%'";
		$sqlQuery = mysql_query($query);
		$rows = mysql_fetch_array($sqlQuery);
		$cityId = $rows['id'];
		//echo $univId;exit;
		return $cityId;
		//echo "<pre>";print_r($rows);exit;
	} 
	
	public function getCountryId($countryName){
		//echo $univName;exit;
		$query = "Select * from country where countryName LIKE '%".$countryName."%'";
		$sqlQuery = mysql_query($query);
		$rows = mysql_fetch_array($sqlQuery);
		$countryId = $rows['id'];
		//echo $univId;exit;
		return $countryId;
		//echo "<pre>";print_r($rows);exit;
	} 
	
	public function data_upload(){
		
		$countryId = '18';
		//echo $countryId;exit;
		$this->db->select('*');
		$this->db->from('university');
		$this->db->where('countryId',$countryId);
		$query=$this->db->get();
		$data['universityData'] = $query->result_array();
		//echo "<pre>";print_r($data);exit;
		$this->layout->view('admin/data_upload.php', $data);
	}
	
	public function upload_aust_univ(){
		
		$countryId = '20';
		//echo $countryId;exit;
		$this->db->select('*');
		$this->db->from('university');
		$this->db->where('countryId',$countryId);
		$query=$this->db->get();
		$data['universityData'] = $query->result_array();
		//echo "<pre>";print_r($data);exit;
		$this->layout->view('admin/upload_aust_univ.php', $data);
	}
	
	public function view($univId){
		
		if($this->input->post())
		{
			//echo "<pre>";print_r($_FILES['picture']);exit;
			$univName = str_replace(',', '', $this->input->post('universityName'));
			$universityName = str_replace(' ', '-', $univName);
			$imgName = $_FILES['picture']['name'];
			$imgFileName = $universityName.'-'.$imgName; 
			$imgFileName1 = $universityName.'_-'.$imgName; 
			$imgName = $_FILES['picture']['name'];
			//echo $imgFileName;exit;
			if(isset($_FILES['picture']))
			{
			  $config['upload_path'] = './assets/univ_logo/';
			  $config['allowed_types'] = 'gif|jpg|png|jpeg';
			  $config['file_name'] = $imgFileName;
			  //echo "<pre>";print_r($config);exit;
			  is_dir($config['upload_path']);
			  $this->load->library('upload', $config);
			  if ( ! $this->upload->do_upload('picture'))
				{
				 $this->upload->display_errors();

				}
			 }
			 $data = array(
					'type'=>$this->input->post('type'),
					'yearOfEst'=>$this->input->post('yearOfEst'),
					'students'=>$this->input->post('students'),
					'scholership'=>$this->input->post('scholership'),
					'tutionFee'=>$this->input->post('tutionFee'),
					'staff'=>$this->input->post('staff'),
					'courses'=>$this->input->post('courses'),
					'intakes'=>$this->input->post('intakes'),
					'accomodation'=>$this->input->post('accomodation'),
					'studentSatisfaction'=>$this->input->post('studentSatiscation'),
					'acceptanceCriteria'=>$this->input->post('acceptance'),
					'website'=>$this->input->post('website'),
					'address'=>$this->input->post('address'),
					'library'=>$this->input->post('library'),
					'sports'=>$this->input->post('sports'),
					'scholer'=>$this->input->post('scholer'),
					'housing'=>$this->input->post('housing'),
					'exchange'=>$this->input->post('exchange'),
					'online'=>$this->input->post('online'),
					'facebook_link'=>$this->input->post('facebookLink'),
					'twitter_link'=>$this->input->post('twitterLink'),
					'linkedin'=>$this->input->post('linkedin'),
					'youtube_link'=>$this->input->post('youtubelink') 
					
			); 
			$overview = trim($this->input->post('overview'));
			$overveiwData = array('overview'=>$overview,'logo'=>$imgFileName1);
			//echo "<pre>";print_r($overveiwData);exit;
			$this->db->where('univId', $this->input->post('univId'));
			
			//echo $this->db->last_query();exit;
			$this->db->update('univDetails', $data);
			$this->db->where('id', $this->input->post('univId'));
			$this->db->update('university', $overveiwData);
			$data['message'] = "Updated Successfuly";
			 
		} 
		$this->db->select('*');
		$this->db->from('univDetails');
		$this->db->join('university', 'university.id = univDetails.univId','left');
		$this->db->where('univId',$univId);
		$query = $this->db->get(); 
		//$query=$this->db->query("select * from univDetails left join university on univDetails.univId=university.id");
		//$query->result_array();
		$data['univData'] = $query->result_array();
		//echo "<pre>";print_r($data);exit;
		$this->layout->view('admin/view.php', $data);
		
	}
	
	public function view_aust_univ_detail($univId){
		
		if($this->input->post())
		{
			//echo "<pre>";print_r($_FILES['picture']);exit;
			$univName = str_replace(',', '', $this->input->post('universityName'));
			$universityName = str_replace(' ', '-', $univName);
			$imgageName = $_FILES['picture']['name'];
			$imgName = str_replace(' ', '-', $imgageName);
			if(!empty($imgName)){
				$imgFileName = $universityName.'-'.$imgName; 
				$imgFileName1 = $universityName.'_-'.$imgName; 
			}else{
				$imgFileName1="";
			}
			//echo $imgFileName1;exit;
			if(isset($_FILES['picture']))
			{
			  $config['upload_path'] = './assets/univ_logo/';
			  $config['allowed_types'] = 'gif|jpg|png|jpeg';
			  $config['file_name'] = $imgFileName;
			  //echo "<pre>";print_r($config);exit;
			  is_dir($config['upload_path']);
			  $this->load->library('upload', $config);
			  if ( ! $this->upload->do_upload('picture'))
				{
				 $this->upload->display_errors();

				}
			 }
			 $data = array(
					'type'=>$this->input->post('type'),
					'yearOfEst'=>$this->input->post('yearOfEst'),
					'students'=>$this->input->post('students'),
					'scholership'=>$this->input->post('scholership'),
					'tutionFee'=>$this->input->post('tutionFee'),
					'staff'=>$this->input->post('staff'),
					'courses'=>$this->input->post('courses'),
					'intakes'=>$this->input->post('intakes'),
					'accomodation'=>$this->input->post('accomodation'),
					'studentSatisfaction'=>$this->input->post('studentSatiscation'),
					'acceptanceCriteria'=>$this->input->post('acceptance'),
					'website'=>$this->input->post('website'),
					'address'=>$this->input->post('address'),
					'library'=>$this->input->post('library'),
					'sports'=>$this->input->post('sports'),
					'scholer'=>$this->input->post('scholer'),
					'housing'=>$this->input->post('housing'),
					'exchange'=>$this->input->post('exchange'),
					'online'=>$this->input->post('online'),
					'facebook_link'=>$this->input->post('facebookLink'),
					'twitter_link'=>$this->input->post('twitterLink'),
					'linkedin'=>$this->input->post('linkedin'),
					'youtube_link'=>$this->input->post('youtubelink') 
					
			); 
			$overview = trim($this->input->post('overview'));
			$overveiwData = array('overview'=>$overview,'logo'=>$imgFileName1);
			//echo "<pre>";print_r($overveiwData);exit;
			$this->db->where('univId', $this->input->post('univId'));
			
			//echo $this->db->last_query();exit;
			$this->db->update('univDetails', $data);
			$this->db->where('id', $this->input->post('univId'));
			$this->db->update('university', $overveiwData);
			$data['message'] = "Updated Successfuly";
			 
		} 
		$this->db->select('*');
		$this->db->from('univDetails');
		$this->db->join('university', 'university.id = univDetails.univId','left');
		$this->db->where('univId',$univId);
		$query = $this->db->get(); 
		//$query=$this->db->query("select * from univDetails left join university on univDetails.univId=university.id");
		//$query->result_array();
		$data['univData'] = $query->result_array();
		//echo "<pre>";print_r($data);exit;
		$this->layout->view('admin/view_aust_univ_detail.php', $data);
		
	}
	
	public function importCollegeCsvfile() {
		
	  
			
		if (isset($_POST['submit'])) 
		{ 	
			
		 $handle = fopen($_FILES['filename']['tmp_name'], "r");
			
			//$data = fgetcsv($handle, 1000, ",");
			
			while(($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
			{ 
			//echo "<pre>";print_r($data);exit;
				//$leads_email = mysql_real_escape_string($data[1]);			
				//$leads_phone = mysql_real_escape_string($data[2]);
				//print_r($data);
				//var_dump($leads_phone);
				//exit;
						$countryData=$this->getCountryId($data[1]);
						if(!empty($countryData)){
							$countryId = $countryData;
						}else{
							$countryId = '';
						} 
						
						  $addUniversity= array(
								'univName' => mysql_real_escape_string($data[0]),			
								'countryId' => $countryId					
							);
							$this->db->insert('university_test', $addUniversity);
							$lastInsertId = mysql_insert_id();
							$addUniversityDetail = array(
								'univId' => $lastInsertId,			
								'type' => mysql_real_escape_string($data[2]),					
								'yearOfEst' => mysql_real_escape_string($data[3]),
								'students' => mysql_real_escape_string($data[4]),			
								'scholership' => mysql_real_escape_string($data[5]),					
								'staff' => mysql_real_escape_string($data[6]),
								'address' => mysql_real_escape_string($data[7]),			
								'library' => mysql_real_escape_string($data[8]),					
								'sports' => mysql_real_escape_string($data[9]),
								'scholer' => mysql_real_escape_string($data[10]),			
								'housing' => mysql_real_escape_string($data[11]),					
								'exchange' => mysql_real_escape_string($data[12]),
								'exchange' => mysql_real_escape_string($data[13]),
								'facebook_link' => mysql_real_escape_string($data[14]),
								'twitter_link' => mysql_real_escape_string($data[15]),			
								'linkedin' => mysql_real_escape_string($data[16]),					
								'youtube_link' => mysql_real_escape_string($data[17])
							);
							
							$this->db->insert('univdetails_test', $addUniversityDetail);
			}
				fclose($handle);			
		}
		
	   $this->load->view('admin/importCollegeCsvfile');	
	}
	
	function college_api()
	{
		
		$this->load->view('admin/colleges_api');
	
	}
	

}