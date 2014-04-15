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
        $data['title'] = "Overseas Education| Study Abroad Opportunities| MeetUniv";
		$data['canonical'] = "http://meetuniv.com/college-study-in-abroad";
		$data['description'] = "Explore study abroad opportunities, scholarships, courses & programs with the list of top foreign universities & colleges of the UK, USA, Singapore, Dubai, Australia.";
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
	//added start
	public function demo(){
	$this->load->view("college/pdf_converter");
	//$this->load->view("college/test_pdf");
	}
	//added end
	
	public function individualCollege($college,$collegeId)
	{
	 $collegeId=base64_decode($collegeId);
	 $collegeStr = str_replace('-',' ',$college);
	 $data["universityData"]=$this->collegemodel->getUniversityDataById($collegeId);
	 $data["universityDetail"]=$this->collegemodel->getUniversityDetailById($collegeId);
	 $data["courseDetail"]=$this->collegemodel->getCoursesByCollege($collegeId);
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
	 $data['active'] = 'college';
	 $data['individualCollege'] = 'individualCollege';
	 $data['title'] = "$collegeStr - Universities in Uk - Meet univ.com";
	 $data['description'] = "$college - ".substr($data['universityData'][0]['overview'],0,150)."...";
	 $keywords = array("MeetUniv, Meet UK Universities, Universities & colleges in UK, Scholarships, Executive MBA in UK, Universities events, Spot Admission, Universities events in India","MeetUniv, Study in UK, Study in UK universities, Best universities in UK , Engineering colleges in UK, Education Fairs, University Visits, IELTS","List of Top 10 colleges & universities, Study MBA in UK, Higher education in UK, Universities events in India, Education Fairs, GMAT","IELTS-GMAT-TOEFL, International students, Colleges in UK, Postgraduate study in abroad, University Courses, Test Preparation");
	 $univDetail = $this->collegemodel->getCounterValue($collegeId);
	 $pageCount = $univDetail[0]['page_count'];
	 $featured = $univDetail[0]['featured'];
	 if(!empty($collegeId)){
		$count = $pageCount + 1;
		$this->collegemodel->countUniversity($count,$collegeId);
	 }
	 $first = rand(0,1);
	 $second = rand(2,3);
	 $data['keywords'] = "$college - ".$keywords[$first]." - ".$keywords[$second];
	 /* if($featured==1){
		$this->layout->view("college/featuredIndividualCollege",$data);
	 }else{
		$this->layout->view("college/individualCollege",$data);
	 } */
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
	
	public function UkCollegePagination($page='')
	{
	//echo "hiii";exit;
		$config = array();
        $config["base_url"] = base_url() . "college/UkCollegePagination";
        $config["total_rows"] = $this->collegemodel->uk_record_count();
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		//echo "<pre>";print_r($config);exit;
        $this->pagination->initialize($config);
        $data["results"] = $this->collegemodel-> getUkUniversities($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();
		$data["countResults"] = $this->collegemodel-> uk_record_count();
        $content = $this->load->view("college/collegePagination", $data);
		echo $content;
	}
	
	public function UsaCollegePagination($page='')
	{
		$config = array();
        $config["base_url"] = base_url() . "college/UsaCollegePagination";
        $config["total_rows"] = $this->collegemodel->usa_record_count();
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		//echo "<pre>";print_r($config);exit;
        $this->pagination->initialize($config);
        $data["results"] = $this->collegemodel-> getUsaUniversities($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();
		$data["countResults"] = $this->collegemodel-> usa_record_count();
        $content = $this->load->view("college/collegePagination", $data);
		echo $content;
	}
	
	public function popularCollegePagination($page='')
	{
		$config = array();
        $config["base_url"] = base_url() . "college/popularCollegePagination";
        $config["total_rows"] = $this->collegemodel->popular_record_count();
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		//echo "<pre>";print_r($config);exit;
        $this->pagination->initialize($config);
        $data["results"] = $this->collegemodel-> getPopularUniversities($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();
		$data["countResults"] = $this->collegemodel-> popular_record_count();
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
	
	public function courseJsonList()
	{
		$array=array();
		$this->db->select('name');
		//$this->db->where('countryId','13');
		$this->db->from('courses');
		$this->db->group_by("name");
		$query = $this->db->get();
		$courseArray = $query->result_array();
		foreach($courseArray as $course)
		{
			$array[] = $course['name'];
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
	
	public function studyInUk()
	{
		//echo "hello";exit;
		$data['active'] = 'college';
        $data['title'] = "Study in the UK| List of Top Universities & Colleges| MeetUniv";
		$data['canonical'] = "http://meetuniv.com/college/study-in-uk-universities";
		$data['description'] = "Toll free no. 1800-3000-0068 is a best opt for all your overseas education needs in UK and get free support for scholarship, Career guide & Course choices.";
		$data['keywords'] = "UK university list,Meet UK Universities, university of uk,Abroad University events in india,Spot Admission & scholarships, university in uk, indian scholarships for studying abroad,Abroad Education Fairs in india,Meet top UK Universities,Top study abroad scholarships,2014 UK University Fair,study overseas,study abroad";
		$config = array();
        $config["base_url"] = base_url() . "college/UkCollegePagination";
        $config["total_rows"] = $this->collegemodel->uk_record_count();
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		//echo "<pre>";print_r($config);exit;
		$this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->collegemodel-> getUkUniversities($config["per_page"], $page);
		//echo "<pre>";print_r($data);exit;
		$data["links"] = $this->pagination->create_links();
		$data["countResults"] = $this->collegemodel-> uk_record_count();
		//echo "<pre>";print_r($data);exit;
        $this->layout->view("college/college", $data);
		
	}
	
	public function studyInUsa()
	{
		$data['active'] = 'college';
        $data['title'] = "Study in USA| Spot Admission in US Top University | MeetUniv";
		$data['canonical'] = "http://meetuniv.com/college/study-in-usa-universities";
		$data['description'] = "MeetUniv is an excellent resource for international students to get details regarding visa, education fairs, USA universities courses and test preparation.";
		$data['keywords'] = "USA university list,Meet USA Universities, university of usa,Abroad University events in india,Spot Admission & scholarships, university in usa, indian scholarships for studying abroad,Abroad Education Fairs in india,Meet top USA Universities,Top study abroad scholarships,2014 USA University Fair,study overseas,study abroad";
		$config = array();
        $config["base_url"] = base_url() . "college/UsaCollegePagination";
        $config["total_rows"] = $this->collegemodel->usa_record_count();
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		//echo "<pre>";print_r($config);exit;
		$this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->collegemodel-> getUsaUniversities($config["per_page"], $page);
		//echo "<pre>";print_r($data);exit;
		$data["links"] = $this->pagination->create_links();
		$data["countResults"] = $this->collegemodel-> usa_record_count();
		//echo "<pre>";print_r($data);exit;
        $this->layout->view("college/college", $data);
		
	}
	
	public function searchCollegePagination($page='')
	{
		$courseName = $_POST['courseName'];
		$config = array();
        $config["base_url"] = base_url() . "college/searchCollegePagination/".$courseName;
        $config["total_rows"] = $this->collegemodel->searched_record_count($courseName);
        $config["per_page"] = 5;
        $config["uri_segment"] = 4;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		//echo "<pre>";print_r($config);exit;
        $this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["results"] = $this->collegemodel-> get_search_university($courseName, $config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();
		$data["countResults"] = $this->collegemodel-> searched_record_count($courseName);
		//echo "<pre>";print_r($data);exit;
        $content = $this->load->view("college/searchPagination", $data);
		echo $content;
	}
	
	public function searchCollegeByCourse($c_Name='')
	{
		//echo $c_Name;exit;
		$cName = str_replace('+', ' ', $c_Name);
		$courseName = trim($cName);
		$data['active'] = 'college';
        $data['title'] = "Shortlist, compare & Meet UK Universities for Abroad scholarship & spot admission at our education fair & Abroad university visit in india";
		$data['description'] = "MeetUniv.Com lists over 1000 Abroad universities & colleges.Meet top Abroad universities and colleges in Europe to study abroad?We provide info on Top University in UK.You can find list of UK - London Colleges and Universities.";
		$data['keywords'] = "UK university list,Meet UK Universities, university of uk,Abroad University events in india,Spot Admission & scholarships, university in uk, indian scholarships for studying abroad,Abroad Education Fairs in india,Meet top UK Universities,Top study abroad scholarships,2014 UK University Fair,study overseas,study abroad";
		if(empty($courseName)){
			redirect('http://meetuniv.com/');
		}
		//echo $courseName;exit;
		$config = array();
        $config["base_url"] = base_url() . "college/searchCollegePagination/".$courseName;
        $config["total_rows"] = $this->collegemodel-> searched_record_count($courseName);
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		//echo "<pre>";print_r($config);exit;
        $this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->collegemodel-> get_search_university($courseName, $config["per_page"], $page);
		//echo "<pre>";print_r($data);exit;
		$data["links"] = $this->pagination->create_links();
		$data["countResults"] = $this->collegemodel-> searched_record_count($courseName);
		//echo "<pre>";print_r($data);exit;
        $this->layout->view("college/searchCollege", $data);
		
	}
	
	public function popularCollege()
	{
		$data['active'] = 'college';
        $data['title'] = "Shortlist, compare & Meet UK Universities for Abroad scholarship & spot admission at our education fair & Abroad university visit in india";
		$data['description'] = "MeetUniv.Com lists over 1000 Abroad universities & colleges.Meet top Abroad universities and colleges in Europe to study abroad?We provide info on Top University in UK.You can find list of UK - London Colleges and Universities.";
		$data['keywords'] = "UK university list,Meet UK Universities, university of uk,Abroad University events in india,Spot Admission & scholarships, university in uk, indian scholarships for studying abroad,Abroad Education Fairs in india,Meet top UK Universities,Top study abroad scholarships,2014 UK University Fair,study overseas,study abroad";
		$config = array();
        $config["base_url"] = base_url() . "college/popularCollegePagination";
        $config["total_rows"] = $this->collegemodel->popular_record_count();
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		//echo "<pre>";print_r($config);exit;
		$this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->collegemodel-> getPopularUniversities($config["per_page"], $page);
		//echo "<pre>";print_r($data);exit;
		$data["links"] = $this->pagination->create_links();
		$data["countResults"] = $this->collegemodel-> popular_record_count();
		//echo "<pre>";print_r($data);exit;
        $this->layout->view("college/college", $data);
		
	}
	
}