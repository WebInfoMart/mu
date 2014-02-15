<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class College extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('layout');
		$this->load->model('collegemodel');
		$this->load->library("pagination");
	}
public function index() {
		
		$data['active'] = 'college';
        $data['title'] = "Shortlist, compare & Meet UK Universities for Abroad scholarship & spot admission at our education fair & Abroad university visit in india";
		$data['description'] = "MeetUniv.Com lists over 1000 Abroad universities & colleges.Meet top Abroad universities and colleges in Europe to study abroad?We provide info on Top University in UK.You can find list of UK - London Colleges and Universities.";
		$data['keywords'] = "UK university list,Meet UK Universities, university of uk,Abroad University events in india,Spot Admission & scholarships, university in uk, indian scholarships for studying abroad,Abroad Education Fairs in india,Meet top UK Universities,Top study abroad scholarships,2014 UK University Fair,study overseas,study abroad";
		$config = array();
        $config["base_url"] = base_url() . "college/collegePagination";
        $config["total_rows"] = $this->collegemodel->record_count();
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->collegemodel-> getAllUniversities($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();
		$data["countResults"] = $this->collegemodel-> record_count();
        $this->layout->view("college/college", $data);
    }
	public function individualCollege($college,$collegeId)
	{
	 $data['active'] = 'college';
	 $data['title'] = "$college - Universities in Uk - Meet univ.com";
	 $data['description'] = "$college - In Newcastle upon Tyne, is an expanding multicultural learning community, with excellent links with further and higher education. - Meet univ.com";
	 $keywords = array("MeetUniv, Meet UK Universities, Universities & colleges in UK, Scholarships, Executive MBA in UK, Universities events, Spot Admission, Universities events in India","MeetUniv, Study in UK, Study in UK universities, Best universities in UK , Engineering colleges in UK, Education Fairs, University Visits, IELTS","List of Top 10 colleges & universities, Study MBA in UK, Higher education in UK, Universities events in India, Education Fairs, GMAT","IELTS-GMAT-TOEFL, International students, Colleges in UK, Postgraduate study in abroad, University Courses, Test Preparation");
	 $first = rand(0,1);
	 $second = rand(2,3);
	 $data['keywords'] = "$college - ".$keywords[$first]." - ".$keywords[$second];
	 $collegeId=base64_decode($collegeId);
	 $data["universityData"]=$this->collegemodel->getUniversityDataById($collegeId);
	 $data["universityDetail"]=$this->collegemodel->getUniversityDetailById($collegeId);
	 $data["courseDetail"]=$this->collegemodel->getCoursesByCollege($collegeId);
	 //echo "<pre>";print_r($data);
	 //$data["nssData"] = $this->collegemodel->getNssDataByCourseId($data['universityData'][0]['courseId']);
	 if($data['universityData'][0]['cityId']) //city details is present
	 {
		$city=$this->db->get_where('city',array('id'=>$data['universityData'][0]['cityId']));
		$temp = $city->row();
		$data['cityName'] = $temp->cityName;
		//echo $temp->countryId." ".$temp2->countryName;exit;
	 }
	 if($data["universityData"][0]["countryId"])//country details is present
	 {
		$country=$this->db->get_where('country',array('id'=>$data["universityData"][0]["countryId"]));
		$temp2 = $country->row();
		$data['countryName'] = $temp2->countryName;
	 }
	 $this->layout->view("college/individualCollege",$data);
	}
	public function collegePagination($page='')
	{
		$config = array();
        $config["base_url"] = base_url() . "college/collegePagination";
        $config["total_rows"] = $this->collegemodel->record_count();
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
        $this->pagination->initialize($config);
        $data["results"] = $this->collegemodel-> getAllUniversities($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();
		$data["countResults"] = $this->collegemodel-> record_count();
        $content = $this->load->view("college/collegePagination", $data);
		echo $content;
	}
	public function cityJsonList()
	{
		$array=array();
		$this->db->select('cityName');
		$this->db->where('countryId','13');
		$this->db->from('city');
		$query = $this->db->get();
		$cityArray = $query->result_array();
		foreach($cityArray as $city)
		{
			$array[] = $city['cityName'];
		}
		header('Content-Type: application/json');
		echo json_encode($array);
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
        $config["base_url"] = base_url() . "college/filterByLocation";
        $config["total_rows"] = $this->collegemodel-> record_count($cityIdArray);
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
        $this->pagination->initialize($config);
        $data["results"] = $this->collegemodel-> getUniversityByCity($config["per_page"], $page, $cityIdArray);
		$data["links"] = $this->pagination->create_links();
		$data["countResults"] = $this->collegemodel-> record_count($cityIdArray);
        $content = $this->load->view("college/collegePagination", $data);
		echo $content;
	}
	
	public function countryJsonList()
	{
		$array=array();
		$this->db->select('countryName');
		//$this->db->where('countryId','13');
		$this->db->from('country');
		$query = $this->db->get();
		$countryArray = $query->result_array();
		foreach($countryArray as $country)
		{
			$array[] = $country['countryName'];
		}
		header('Content-Type: application/json');
		echo json_encode($array);
	}
	public function filterLocationByCountry($page='')
	{
		$country = $this->input->post('countryName');
		//print_r($country);exit;
		$FiltercountryArray = explode(',',$country);
		$countryIdArray = array();
		if(strlen($country))
		{
			foreach($FiltercountryArray as $index=>$key)
			{
				$this->db->select('id');
				$this->db->where('countryName',$key);
				$this->db->from('country');
				$res = $this->db->get();
				$tempraryCountry = $res->row();
				if($tempraryCountry)
				{
				$countryIdArray[] = $tempraryCountry->id;
				}
			}
		}
		$config = array();
        $config["base_url"] = base_url() . "college/filterLocationByCountry";
        $config["total_rows"] = $this->collegemodel-> record_count_country($countryIdArray);
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
        $this->pagination->initialize($config);
        $data["results"] = $this->collegemodel-> getUniversityByCountry($config["per_page"], $page, $countryIdArray);
		$data["links"] = $this->pagination->create_links();
		$data["countResults"] = $this->collegemodel-> record_count_country($countryIdArray);
		//echo "<pre>";print_r($data);exit;
        $content = $this->load->view("college/collegePagination", $data);
		echo $content;
	}
	
	public function getSatisfactionByCourseId()
	{
		$data = $this->collegemodel->getSatisfaction($_POST['id']);
		
		echo json_encode($data);exit;
		
	}
	
	public function getCourseFeeById()
	{
		//echo $_POST['id'];exit;
		$data = $this->collegemodel->getCourseFee($_POST['id']);
		
		echo json_encode($data);exit;
		
	}
}