<?php
class Career_model extends CI_Model 
{
  var $session_expire= 3600;
  function __construct()
  {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('company_model');
      $this->load->helper('url');
  }
  function getCareerInfo()
  {
      $this->db->select('*');
      $this->db->order_by("CareerID", "desc"); 
      $query = $this->db->get('career',10);
      return $query->result_array();
  }
  function getCareerInfoByType($type)
  {
      $this->db->select('*');
      $this->db->order_by("CareerID", "desc"); 
      $this->db->where('CareerType',$type);
      $result = $this->db->get('career',10);

      return $result->result_array();
  }
  function getCareerInfoByID($id)
  {
   $query = $this->db->get_where('career',array('CareerID'=>$id));
   return $query->result_array();
}
function getCareerInfoByCompanyID($CompanyID)
{
     $this->db->order_by("CareerID", "desc"); 
   $query = $this->db->get_where('career',array('CompanyID'=>$CompanyID));
   return $query->result_array();
}
function getCareerInfoByName($name)
{
    $query = $this->db->get_where('career',array('CareerName'=>$name));
    return $query->result_array();
}
}
?>