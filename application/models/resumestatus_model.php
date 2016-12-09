<?php
	class Resumestatus_model extends CI_Model 
	{
		public function __construct()
		{
		   parent::__construct();	
		   $this->load->database();
		}
		public function getresumestatus_item_by_CareerID($CareerID)
		{
			$this->db->select('*');
    		$this->db->order_by("CareerID", "desc"); 
    		$this->db->where('CareerID',$CareerID);
	        $result = $this->db->get('resumestatus');
			return $result->result_array();
		}
	}
?>