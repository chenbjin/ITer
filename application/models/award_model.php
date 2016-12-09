<?php
	class Award_model extends CI_Model 
	{
		public function __construct()
		{
		   parent::__construct();	
		   $this->load->database();
		}
		public function addaward($data)
		{
			return $this->db->insert('awardofresume', $data);
		}
		public function getawardByid($resumeid)
		{
			$this -> db -> where('resumeid', $resumeid);
			$this -> db -> select('*');
			$query = $this -> db -> get('awardofresume');
			return $query -> result_array();
		}
		public function getlastawardByid($resumeid)
		{
			$this -> db -> where('resumeid', $resumeid);
			$this -> db -> select_max('id');
			$query = $this -> db -> get('awardofresume');
			return $query -> result_array();
		}
		public function deleteawardByid($id)
		{
			if($id)
			{
				//echo $resumeid;$this->db->delete('mytable', array('id' => $id)); 
				$this->db->where('id', $id);
				return $this->db->delete('awardofresume'); 
			}
			else
			{
				echo "are you chuanyue le ?";
			}
		}
	}
?>