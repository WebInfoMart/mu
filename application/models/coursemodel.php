<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Coursemodel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		
	}
	
	public function getCourseId($id)
	{
		//echo $id;exit;
		$this->db->select('*');
		$this->db->from('courses');
		$this->db->where('id',$id);
		$query=$this->db->get();
		$courseData = $query->result_array();
		return $courseData[0]['courseId'];
		
	}
	
	public function getAccreditationData($id)
	{
		$this->db->select('*');
		$this->db->from('accreditation');
		$this->db->where('courseId',$id);
		$query=$this->db->get();
		return $query->result_array();
	}
	
	public function getStagesData($id)
	{
		$this->db->select('*');
		$this->db->from('stages');
		$this->db->where('courseId',$id);
		$query=$this->db->get();
		return $query->result_array();
	}
	
	public function getDegreeClassesData($id)
	{
		$this->db->select('*');
		$this->db->from('degreeclass');
		$this->db->where('courseId',$id);
		$query=$this->db->get();
		return $query->result_array();
	}
	
	public function getContinuationData($id)
	{
		$this->db->select('*');
		$this->db->from('continuation');
		$this->db->where('courseId',$id);
		$query=$this->db->get();
		return $query->result_array();
	}
	
	public function getEmploymentData($id)
	{
		$this->db->select('*');
		$this->db->from('employment');
		$this->db->where('courseId',$id);
		$query=$this->db->get();
		return $query->result_array();
	}
	
	public function getJobData($id)
	{
		$this->db->select('*');
		$this->db->from('jobtype');
		$this->db->where('courseId',$id);
		$query=$this->db->get();
		return $query->result_array();
	}
	
	public function getEntryData($id)
	{
		$this->db->select('*');
		$this->db->from('entry');
		$this->db->where('courseId',$id);
		$query=$this->db->get();
		return $query->result_array();
	}
	
	public function getSalaryData($id)
	{
		$this->db->select('*');
		$this->db->from('salary');
		$this->db->where('courseId',$id);
		$query=$this->db->get();
		return $query->result_array();
	}
	
	public function getCommonData($id)
	{
		$this->db->select('*');
		$this->db->from('common');
		$this->db->where('courseId',$id);
		$query=$this->db->get();
		return $query->result_array();
	}
	
}