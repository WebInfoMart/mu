<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Connectmodel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		
	}
	
	public function record_count()
	{
       return $totalUniversities=$this->db->count_all("connect");
    }
	public function getAllConnects($limit, $start)
	{
        $this->db->limit($limit, $start);
        $query = $this->db->get("connect");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $connects[] = $row;
            }
            return $connects;
        }
        return false;
	}
	public function getUniversityNameById($id)
	{
		$this->db->select('*');
		$this->db->from('university');
		$this->db->where('id',$id);
		$query = $this->db->get();
		$row = $query->row();
		return $row->univName;
	}
	
}