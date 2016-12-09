<?php
	class Project_model extends CI_Model 
	{
		public function __construct()
		{
		   parent::__construct();	
		   $this->load->database();
		}
		public function addproject($data)
		{
			return $this->db->insert('projectofresume', $data);
		}
		public function getprojectByid($resumeid)
		{
			$this -> db -> where('resumeid', $resumeid);
			$this -> db -> select('*');
			$query = $this -> db -> get('projectofresume');
			return $query -> result_array();
		}
		public function getlastprojectByid($resumeid)
		{
			$this -> db -> where('resumeid', $resumeid);
			$this -> db -> select_max('id');
			$query = $this -> db -> get('projectofresume');
			return $query -> result_array();
		}
		public function deleteprojectByid($id)
		{
			if($id)
			{
				//echo $resumeid;$this->db->delete('mytable', array('id' => $id)); 
				$this->db->where('id', $id);
				return $this->db->delete('projectofresume'); 
			}
			else
			{
				echo "are you chuanyue le ?";
			}
		}
	}
?>