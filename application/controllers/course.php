<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Course extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('layout');
		$this->load->model('coursemodel');
		$this->load->library("pagination");
	}
	public function index($universityName,$universityId,$courseName,$courseId) {
		
		$data['active']="";
		$data['title'] = "";
		$data['keywords'] = "";
		$data['description'] = "";
		$data['courseName'] = $courseName;
		$data["accreditationData"] = $this->coursemodel->getAccreditationData($courseId);
		$data["stagesData"] = $this->coursemodel->getStagesData($courseId);
		$data["degreeClassesData"] = $this->coursemodel->getDegreeClassesData($courseId);
		$data["continuationData"] = $this->coursemodel->getContinuationData($courseId);
		$data["employmentData"] = $this->coursemodel->getEmploymentData($courseId);
		$data["jobData"] = $this->coursemodel->getJobData($courseId);
		$data["entryData"] = $this->coursemodel->getEntryData($courseId);
		$data["salaryData"] = $this->coursemodel->getSalaryData($courseId);
		$data["commonData"] = $this->coursemodel->getCommonData($courseId);
		//echo $course_id;exit;
		//echo "<pre>";print_r($data);
		
        $this->layout->view('course/index.php', $data);
    }
	

}