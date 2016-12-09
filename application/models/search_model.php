<?php
	/**
	* Search model
	*/
	class Search_model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}
		public function searchJobByName($keyword)
		{
			$this->db->like('CareerName',"$keyword"); 
			$query = $this->db->get('career');
			if($query->num_rows()>0)
				return $query->result_array();
			else
				return false;
		}
	}
?>