<?php
	class Social_model extends CI_Model 
	{
		public function __construct()
		{
		   parent::__construct();	
		   $this->load->database();
		}
		public function addsocial($data)
		{
			return $this->db->insert('socialofresume', $data);
		}
		public function getsocialByid($resumeid)
		{
			$this -> db -> where('resumeid', $resumeid);
			$this -> db -> select('*');
			$query = $this -> db -> get('socialofresume');
			return $query -> result_array();
		}
		public function getlastsocialByid($resumeid)
		{
			$this -> db -> where('resumeid', $resumeid);
			$this -> db -> select_max('id');
			$query = $this -> db -> get('socialofresume');
			return $query -> result_array();
		}
		public function deletesocialByid($id)
		{
			if($id)
			{
				//echo $resumeid;$this->db->delete('mytable', array('id' => $id)); 
				$this->db->where('id', $id);
				return $this->db->delete('socialofresume'); 
			}
			else
			{
				echo "are you chuanyue le ?";
			}
		}
	}
?>