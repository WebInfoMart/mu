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
}