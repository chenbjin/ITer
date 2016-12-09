<?php
	class Lang_model extends CI_Model 
	{
		public function __construct()
		{
		   parent::__construct();	
		   $this->load->database();
		}
		public function addlang($data)
		{
			return $this->db->insert('langofresume', $data);
		}
		public function getLangByid($resumeid)
		{
			$this -> db -> where('resumeid', $resumeid);
			$this -> db -> select('*');
			$query = $this -> db -> get('langofresume');
			return $query -> result_array();
		}
		public function getlastLangByid($resumeid)
		{
			$this -> db -> where('resumeid', $resumeid);
			$this -> db -> select_max('id');
			$query = $this -> db -> get('Langofresume');
			return $query -> result_array();
		}
		public function deleteLangByid($id)
		{
			if($id)
			{
				//echo $resumeid;$this->db->delete('mytable', array('id' => $id)); 
				$this->db->where('langid', $id);
				return $this->db->delete('langofresume'); 
			}
			else
			{
				echo "are you chuanyue le ?";
			}
		}
	}
?>

