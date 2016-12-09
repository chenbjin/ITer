<?php
	class Attach_model extends CI_Model 
	{
		public function __construct()
		{
		   parent::__construct();	
		   $this->load->database();
		}
		public function addattach($data)
		{
			return $this->db->insert('attachofresume', $data);
		}
		public function getattachByid($resumeid)
		{
			$this -> db -> where('resumeid', $resumeid);
			$this -> db -> select('*');
			$query = $this -> db -> get('attachofresume');
			return $query -> result_array();
		}
		public function getlastattachByid($resumeid)
		{
			$this -> db -> where('resumeid', $resumeid);
			$this -> db -> select_max('id');
			$query = $this -> db -> get('attachofresume');
			return $query -> result_array();
		}
		public function deleteattachByid($id)
		{
			if($id)
			{
				//echo $resumeid;$this->db->delete('mytable', array('id' => $id)); 
				$this->db->where('id', $id);
				return $this->db->delete('attachofresume'); 
			}
			else
			{
				echo "are you chuanyue le ?";
			}
		}
	}
?>