<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Collegemodel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		
	}
	
	public function record_count()
	{
       return $totalUniversities=$this->db->count_all("university");
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
}