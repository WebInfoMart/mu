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
	 $data["universityData"]=$this->collegemodel->getUniversityDataById($collegeId);
	 $data["universityDetail"]=$this->collegemodel->getUniversityDetailById($collegeId);
	 if($data['universityData'][0]['cityId']) //city details is present
	 {
		$city=$this->db->get_where('city',array('id'=>$data['universityData'][0]['cityId']));
		$temp = $city->row();
		$data['cityName'] = $temp->cityName;
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
}