<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Quizmodel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		
	}
	public function getLastQuizTime($userId)
	{
		$this->db->select('timeSpent');
		$this->db->from(' userquizrecord');
		$this->db->where('userId',$userId);
		$data = $this->db->get();
		$result = $data->result_array();
		return ($result)?$result[0]['timeSpent']:False;
	}
	public function savetime($userId)
	{
		$timespent = $_GET['timespent'];
		$data = array('timeSpent' => $timespent);
		$this->db->where('userId', $userId);
		$query=$this->db->update('userquizrecord',$data);
		return "success";
	}
	public function saveanswer($userId)
	{
		$exists = $this->checkExists($userId);
		if(!$exists)
		{
			date_default_timezone_set('Asia/Kolkata');
			$ans = $this->input->get('question').':'.$this->input->get('answer').';';
			$data = array(
				'userId' => $userId,
				'answer' => $ans,
				'updatedTime' => date('Y-m-d H:i:s'),
			);
			$this->db->insert('userquizrecord',$data);
			return "Inserted Successful";
		}
		else
		{
			$ans = $this->updateingAnswer($exists, $this->input->get('answer'), $this->input->get('question'));
			$this->db->where('userId',$userId);
			$this->db->update('userquizrecord',array('answer'=>$ans));
			return "Updated successfully";
		}
	}
	public function checkExists($userId)
	{
		$query = $this->db->get_where('userquizrecord',array('userId'=>$userId));
		$user = $query->row();
		return ($user)?$user->answer:false;
	}
	public function updateingAnswer($currentAns, $answer, $question)
	{
		$qu = explode(';',$currentAns);
		//print_r($qu);
		$questionArray = array();
		for($i=0;$i<count($qu)-1;$i++)
		{
			$key = $qu[$i];
			$temp = explode(':',$key);
			$questionArray[$temp[0]] = $temp[1];
		}
		ksort($questionArray);
		//if(array_key_exists($question,$questionArray))
		$questionArray[$question] = $answer;
		ksort($questionArray);
		$newans="";
		foreach($questionArray as $index=>$key)
		{
			$newans.=$index.":".$key.";";
		}
		return $newans;
	}
	function checkAllreadyAnswer($question)
	{
		$userId = $this->tank_auth->get_user_id();
		$query = $this->db->get_where('userquizrecord',array('userId'=>$userId));
		$rs = $query->row();
		if($rs)
		{
			$currentAns = $rs->answer;
			$qu = explode(';',$currentAns);
			//print_r($qu);
			$questionArray = array();
			for($i=0;$i<count($qu)-1;$i++)
			{
				$key = $qu[$i];
				$temp = explode(':',$key);
				$questionArray[$temp[0]] = explode(',',$temp[1]);
			}
			ksort($questionArray);
			if(array_key_exists($question,$questionArray))
				return $questionArray[$question];
			else
				return array();
		}
	}
	function getUserScore($userId)
	{
		$userId = $this->tank_auth->get_user_id();
		$query = $this->db->get_where('userquizrecord',array('userId'=>$userId));
		$rs = $query->row();
		$score = 0;
		if($rs)
		{
			$currentAns = $rs->answer;
			$qu = explode(';',$currentAns);
			//print_r($qu);
			$ansArray = array();
			for($i=0;$i<count($qu)-1;$i++)
			{
				$key = $qu[$i];
				$temp = explode(':',$key);
				$ansArray = explode(',',$temp[1]);
				foreach($ansArray as $index=>$k)
				{
					$score += $k;
				}
			}
			//ksort($questionArray);
			//print_r($questionArray);
			$this->db->where('userId',$userId);
			$this->db->update('userquizrecord',array('score'=>$score));
			return $score;
		}
		return 0;
	}
}