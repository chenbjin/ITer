<?php
	class Etc_model extends CI_Model 
	{
		public function __construct()
		{
		   parent::__construct();	
		   $this->load->database();
		}
		public function addetc($data)
		{
			return $this->db->insert('etcofresume', $data);
		}
		public function getetcByid($resumeid)
		{
			$this -> db -> where('resumeid', $resumeid);
			$this -> db -> select('*');
			$query = $this -> db -> get('etcofresume');
			return $query -> result_array();
		}
		public function getlastetcByid($resumeid)
		{
			$this -> db -> where('resumeid', $resumeid);
			$this -> db -> select_max('id');
			$query = $this -> db -> get('etcofresume');
			return $query -> result_array();
		}
		public function deleteetcByid($id)
		{
			if($id)
			{
				//echo $resumeid;$this->db->delete('mytable', array('id' => $id)); 
				$this->db->where('id', $id);
				return $this->db->delete('etcofresume'); 
			}
			else
			{
				echo "are you chuanyue le ?";
			}
		}
	}
?>