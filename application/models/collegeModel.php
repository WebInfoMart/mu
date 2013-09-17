<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Collegemodel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		
	}
	
	public function record_count($cityIdArray='')
	{
       if($cityIdArray)
	   {
	    $this->db->select('id');
		$this->db->from('university');
		$this->db->where_in('cityId',$cityIdArray);
		$query = $this->db->get();
		$rs = $query->result_array();
		return count($rs);
	   }
	   else
	   { 
		return $totalUniversities=$this->db->count_all("university");
	   }
    }
	public function getAllUniversities($limit, $start)
	{
        $this->db->limit($limit, $start);
		$this->db->order_by('featured','desc');
        $query = $this->db->get("university");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $getAllUniversities[] = $row;
            }
            return $getAllUniversities;
        }
        return false;
	}
	public function getUniversityByCity($limit, $start, $cityIdArray)
	{
        $this->db->limit($limit, $start);
		if($cityIdArray)
		{
		$this->db->where_in('cityId',$cityIdArray);
		}
		$this->db->order_by('featured','desc');
        $query = $this->db->get("university");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $getAllUniversities[] = $row;
            }
            return $getAllUniversities;
        }
        return false;
	}
	public function getUniversityDataById($id)
	{
		$this->db->select('*');
		$this->db->from('university');
		$this->db->where('id',$id);
		$query=$this->db->get();
		return $query->result_array();
	}
	public function getUniversityDetailById($id)
	{
		$this->db->select('*');
		$this->db->from('univDetails');
		$this->db->where('univId',$id);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function getCoursesByCollege($univId)
	{
		$query = $this->db->query("SELECT name,level1,level2,level3 FROM `courses` left join courseLevel on courses.ucasId=courseLevel.ucasId where univId=".$univId." order by courselevel.level2 desc");
		return $query->result();
	}
	public function getCourseLevelName($level2)
	{
		$this->db->select('name');
		$this->db->where('level',$level2);
		$this->db->from('courseLevelC');
		$query = $this->db->get();
		$result = $query->row();
		return $result->name;
	}
	function getUnivLocationById($cityId,$countryId)
	{
		$location="";
		$this->db->select('cityName');
		$this->db->from('city');
		$this->db->where('id',$cityId);
		$query = $this->db->get();
		$univ = $query->row();

		if(isset($univ->cityName))
			$location = $location.$univ->cityName.",";
			
		$this->db->select('countryName');
		$this->db->from('country');
		$this->db->where('id',$countryId);
		$query = $this->db->get();
		$univ = $query->row();
		if(isset($univ->countryName))
			$location = $location." ".$univ->countryName;
			
		return $location;
	}
	function getFeaturedColleges()
	{
		$this->db->select('*');
		$this->db->from('university');
		$this->db->where('featured','1');
		$query = $this->db->get();
		return $query->result_array();
	}
}