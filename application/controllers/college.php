<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class College extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('layout');
		$this->load->model('collegeModel');
		$this->load->library("pagination");
	}
public function index() {
        $config = array();
        $config["base_url"] = base_url() . "college/college";
        $config["total_rows"] = $this->collegeModel->record_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->collegeModel-> getAllUniversities($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();
		$data["countResults"] = $this->collegeModel-> record_count();
        $this->layout->view("college/college", $data);
    }
	public function individualCollege($collegeId)
	{
	 $data["universityData"]=$this->collegeModel->getUniversityDetailById($collegeId);
	 $this->layout->view("college/individualCollege",$data);
	}
}