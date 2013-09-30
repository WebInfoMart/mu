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
		
        $data['title'] = "Shortlist, compare & research on Universities and Colleges in UK.";
		$data['description'] = "MeetUniv.Com lists over 4500 universities & colleges in the world. Must visit destination for students looking at to study abroad. Students can Shortlist, compare & research on Universities and Colleges in UK";
		$data['keywords'] = "Meet UK Universities,Study in UK,Study in UK universities,Study MBA in UK,Colleges in UK,International students,Universities &  colleges in UK,Higher education in UK,Best universities in UK ,List of Top 10 colleges & universities,IELTS-GMAT-TOEFL,Universities events,Engineering colleges in UK ,Postgraduate study,Scholarships,Executive MBA in UK,Education Fairs,Spot Admission,University Visits,Courses,Test Preparation";
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
	 $collegeId=base64_decode($collegeId);
	 $data["universityData"]=$this->collegemodel->getUniversityDataById($collegeId);
	 $data["universityDetail"]=$this->collegemodel->getUniversityDetailById($collegeId);
	 $data["courseDetail"]=$this->collegemodel->getCoursesByCollege($collegeId);
	 if($data['universityData'][0]['cityId']) //city details is present
	 {
		$city=$this->db->get_where('city',array('id'=>$data['universityData'][0]['cityId']));
		$temp = $city->row();
		$data['cityName'] = $temp->cityName;
		$country=$this->db->get_where('country',array('id'=>$data["universityData"][0]["countryId"]));
		$temp2 = $country->row();
		$data['countryName'] = $temp2->countryName;
		//echo $temp->countryId." ".$temp2->countryName;exit;
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
}