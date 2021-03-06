<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Connectmodel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		
	}
	public function getConnectByCity($limit, $start, $cityIdArray)
	{
        $this->db->select("*,DATE_FORMAT(connect.date,'%b') as month,DATE_FORMAT(connect.date,'%e') as connectDate",false);
		$this->db->where('connect.date >=',date("Y-m-d"));
		$this->db->limit($limit, $start);
		if($cityIdArray)
		{
		$this->db->where_in('cityId',$cityIdArray);
		}
		$this->db->order_by('featured','desc');
        $query = $this->db->get("connect");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $getAllUniversities[] = $row;
            }
            return $getAllUniversities;
        }
        return false;
	}
	public function getConnectByCityShortDate($limit, $start, $cityIdArray)
	{
        $this->db->select("*,DATE_FORMAT(connect.date,'%b') as month,DATE_FORMAT(connect.date,'%e') as connectDate",false);
		$this->db->where('connect.date >=',date("Y-m-d"));
		$this->db->limit($limit, $start);
		if($cityIdArray)
		{
		$this->db->where_in('cityId',$cityIdArray);
		}
		$this->db->order_by('connect.date');
        $query = $this->db->get("connect");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $getAllUniversities[] = $row;
            }
            return $getAllUniversities;
        }
        return false;
	}
	public function getConnectByCityShortUniv($limit, $start, $cityIdArray)
	{
        $this->db->select("*,DATE_FORMAT(connect.date,'%b') as month,DATE_FORMAT(connect.date,'%e') as connectDate",false);
		$this->db->where('connect.date >=',date("Y-m-d"));
		$this->db->limit($limit, $start);
		if($cityIdArray)
		{
		$this->db->where_in('connect.cityId',$cityIdArray);
		}
		
		$this->db->from('connect');
		$this->db->join('university','connect.univId = university.id');
		$this->db->order_by('university.univName');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $getAllUniversities[] = $row;
            }
            return $getAllUniversities;
        }
        return false;
	}
	public function getConnectByCityShortDesti($limit, $start, $cityIdArray)
	{
        $this->db->select("*,DATE_FORMAT(connect.date,'%b') as month,DATE_FORMAT(connect.date,'%e') as connectDate",false);
		$this->db->where('connect.date >=',date("Y-m-d"));
		$this->db->limit($limit, $start);
		if($cityIdArray)
		{
		$this->db->where_in('connect.cityId',$cityIdArray);
		}
		
		$this->db->from('connect');
		$this->db->join('city','connect.cityId = city.id');
		$this->db->order_by('city.cityName');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $getAllUniversities[] = $row;
            }
            return $getAllUniversities;
        }
        return false;
	}
	public function record_count($cityIdArray='')
	{
       if($cityIdArray)
	   {
	    $this->db->select('id');
		$this->db->from('connect');
		$this->db->where_in('cityId',$cityIdArray);
		$this->db->where('date >',date('Y-m-d'));
		$query = $this->db->get();
		$rs = $query->result_array();
		return count($rs);
	   }
	   else
	   { 
		$this->db->select('id');
		$this->db->from('connect');
		$this->db->where('date >',date('Y-m-d'));
		$query = $this->db->get();
		$rs = $query->result_array();
		return count($rs);
	   }
    }
	public function getAllConnects($limit, $start)
	{
        $this->db->limit($limit, $start);
		$this->db->select("*,DATE_FORMAT(connect.date,'%b') as month,DATE_FORMAT(connect.date,'%e') as connectDate",false);
		$this->db->where('connect.date >=',date("Y-m-d"));
		$this->db->order_by('featured','desc');
		$this->db->order_by('connect.date');
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
		$query = $this->db->query("SELECT DATE_FORMAT(date,'%e/%c/%Y') as date,tagLine FROM `connect` where connect.date >='".date('Y-m-d')."'");
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
	
	public function getCurl($userData)
	{
		//print_r($userData);exit;
		/*added by raghvendra*/
						
		/*******sending data to staging leadmentor*******/
		$random_code=rand(10000,99999); 
		$url="http://leadmentor.in/lead/enter";
		$data = array('name'=>$userData['name'],'email'=>$userData['email'],'phone'=>$userData['phone'],'status'=>'','city'=>'','source'=>'MU CONNECT','lookupCity'=>'','obdId'=>'','obdTime'=>'','campaign'=>'','randomCode'=>$random_code,'leads_sub'=>'');
		//print_r($data);exit;
		 $options = Array(
					CURLOPT_RETURNTRANSFER => TRUE,  // Setting cURL's option to return the webpage data
					CURLOPT_FOLLOWLOCATION => TRUE,  // Setting cURL to follow 'location' HTTP headers
					CURLOPT_AUTOREFERER => TRUE, // Automatically set the referer where following 'location' HTTP headers
					CURLOPT_CONNECTTIMEOUT => 120,   // Setting the amount of time (in seconds) before the request times out
					CURLOPT_TIMEOUT => 120,  // Setting the maximum amount of time for cURL to execute queries
					CURLOPT_MAXREDIRS => 10, // Setting the maximum number of redirections to follow
					CURLOPT_USERAGENT => "Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.1a2pre) Gecko/2008073000 Shredder/3.0a2pre ThunderBrowse/3.2.1.8",  // Setting the useragent
					CURLOPT_URL => $url, // Setting cURL's URL option with the $url variable passed into the function
					CURLOPT_POST => count($data), //count post values
					CURLOPT_POSTFIELDS => $data, //count post values
				);
		 
		$ch = curl_init();  // Initialising cURL 
		curl_setopt_array($ch, $options);   // Setting cURL's options using the previously assigned array data in $options
		$data = curl_exec($ch); // Executing the cURL request and assigning the returned data to the $data variable
		 curl_close($ch);    // Closing cURL 
		exit;
		/*******end of curl code*******/
	}
	
}