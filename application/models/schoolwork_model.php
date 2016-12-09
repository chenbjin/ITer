<?php
	class Schoolwork_model extends CI_Model 
	{
		public function __construct()
		{
		   parent::__construct();	
		   $this->load->database();
		}
		public function addschoolwork($data)
		{
			return $this->db->insert('schoolworkofresume', $data);
		}
		public function getschoolworkByid($resumeid)
		{
			$this -> db -> where('resumeid', $resumeid);
			$this -> db -> select('*');
			$query = $this -> db -> get('schoolworkofresume');
			return $query -> result_array();
		}
		public function getlastschoolworkByid($resumeid)
		{
			$this -> db -> where('resumeid', $resumeid);
			$this -> db -> select_max('id');
			$query = $this -> db -> get('schoolworkofresume');
			return $query -> result_array();
		}
		public function deleteschoolworkByid($id)
		{
			if($id)
			{
				//echo $resumeid;$this->db->delete('mytable', array('id' => $id)); 
				$this->db->where('id', $id);
				return $this->db->delete('schoolworkofresume'); 
			}
			else
			{
				echo "are you chuanyue le ?";
			}
		}
		
	}
?>
