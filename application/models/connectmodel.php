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
		$this->db->select("*,DATE_FORMAT(connect.date,'%b') as month,DATE_FORMAT(connect.date,'%e') as connectDate",false);
		$this->db->order_by('featured','desc');
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
	public function getConnectDates()
	{
		$query = $this->db->query("SELECT DATE_FORMAT(date,'%e/%c/%Y') as date,tagLine FROM `connect`");
		return $query->result_array();
	}
	public function getRecentEvents()
	{
		$this->db->select('*');
		$this->db->from('connect');
		$this->db->where('date >',date('Y-m-d'));
		$this->db->order_by('date');
		$data = $this->db->get();
		return $data->result_array();
	}
	public function getConnectDetailsForEmail($id)
	{
		$this->db->select('*');
		$this->db->from('connect');
		$this->db->where('id',$id);
		$data = $this->db->get();
		$connect = $data->row_array();
		$this->db->select('univName');
		$this->db->from('university');
		$this->db->where('id',$connect['univId']);
		$data = $this->db->get();
		$univ = $data->row();
		$connect['hostedBy'] = $univ->univName;
		return $connect;
	}
	
}