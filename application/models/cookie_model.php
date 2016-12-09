<?php
class Cookie_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }

    function addCookie($sso,$name,$expire)
    {
    	$data = array(
    		'name'=>$name,
    		'sso'=>$sso,
    		'ip'=>$this->input->ip_address(),
    		'time'=>date("Y-m-d h:i:s"),
		'user_agent'=>$this->input->user_agent(),
    		'expire'=>time()+$expire,
    		);
    	$this->db->insert('cookies', $data); 
    }

    function deleteCookie($name)
    {
    	$this->db->delete('cookies', array('name' => $name)); 
    }

    function getCookie($sso)
    {
    	$query = $this->db->get_where('cookies', array('sso' => $sso));
    	if ($query->num_rows()>0)
        {
            return $query->row_array();
        }
        else
        {
            return false;
        }
    }
    function getCookieByName($name)
    {
        $query = $this->db->get_where('cookies', array('name' => $name));
        if ($query->num_rows()>0)
        {
            return $query->row_array();
        }
        else
        {
            return false;
        }
    }
}
/* End of file cookie_model.php */
