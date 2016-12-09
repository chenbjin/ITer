<?php
class Iter_model extends CI_Model 
{
	var $session_expire= 3600;
	function __construct()
	{
		parent::__construct();
		$this->load->model('cookie_model');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->database();
	}
	function getIterInfo($name)
	{
		$query = $this->db->get_where('normaluser',array('UserName'=>$name));
		return $query->row_array();
	}
	function isLogged($redirect = FALSE)
	{
		$iter = $this->session->userdata('iter');
		if(empty($iter))
		{
			if($redirect)
			{
				$this->session->set_flashdata('error', '未登录！');
				redirect('/iter/login');
			}
			return FALSE;
		}
		else if ($iter['logged'] == TRUE)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	function login($name,$password,$remember=FALSE)
	{
		$this->db->select('*');
		$this->db->where('UserName',$name);
		$this->db->where('Password',md5($password));
		$this->db->limit(1);
		$result = $this->db->get('normaluser');

		if ($result->num_rows()>0)
		{
			return $result->row_array();
		}
		else
		{
			return false;
		}
	}
	function autoLogin($sso)
	{
		$info = $this->cookie_model->getCookie($sso);
		if (!empty($info))
		{
			if ($info['expire'] > time())
			{
				$result = $this->getIterInfo($info['name']);
				$data = array();
				$data['iter'] = array(
					'name' => $result['UserName'],
					'id' => $result['UserID'],
					'logged' => TRUE
					);
				$this->session->set_userdata($data);
			}
			else
			{
				$this->cookie_model->deleteCookie($info['name']);
				delete_cookie("sso");
			}
		}
	}
	function logout($iter_id)
	{
		$this->cookie_model->deleteCookie($iter_id);
		$this->session->sess_destroy();
	}
	function regist($name,$password,$email,$tel)
	{
		$this->db->select('*');
		$this->db->where('UserName',$name);
		$this->db->limit(1);
		$result = $this->db->get('normaluser');
		if ($result->num_rows() > 0)
		{
			return FALSE;
		}
		else
		{
			$data = array(
				'UserName'=>$name,
				'Password'=>md5($password),
				'Email'=>$email,
				'Tel'=>$tel,
				);
			$this->db->insert('normaluser', $data); 
			return TRUE;
		}
	}
	public function getUserID($username)
	{	
		if($username)
		{
			$query = $this->db->query("SELECT UserID FROM normaluser where UserName = \"$username\"");
			foreach ($query->result_array() as $row)
			{
				//返回的userid是唯一的，在这里return
				$temp = $row['UserID'];
				return $temp;
			}
		}
		else
		{

		}
		
	}
	public function hasbasicinfo($userid)
	{	
		/*增加的标签来确定是否已经完善了基础部分*/
		if($userid)
		{
			$query = $this->db->query("SELECT hasfullbasic FROM normaluser where UserID  = \"$userid\"");
			
			return $query->row()->hasfullbasic;
		}	
		else
		{
			return false;
		}
		
	}
	public function getResume($UserName)
	{
		if($UserName)
		{	
			$UserID = $this->getUserID($UserName);	  
			$query = $this->db->get_where('resumedetail', array('UserID' => $UserID));

			$ResumeArray = $query->result_array();
			 //$result =  $this->services_json->encode($ResumeArray);
			  //echo $result;
			return $ResumeArray;
		}
		else
		{

		}
	}	
	public function getbasicinfo($userid)
	{	
		/*增加的标签来确定是否已经完善了基础部分*/
		if($userid)
		{
			$query = $this->db->query("SELECT * FROM normaluser where UserID = \"$userid\"");
			return $query->row_array();
		}	
		else
		{
			return false;
		}
		
	}
	public function setpw($userid)
	{	
		/*增加的标签来确定是否已经完善了基础部分*/
		if($userid)
		{
				//$password = $this->input->post('pa');
			$Password = $this->input->post('password');
			$data= array(
				'Password' => md5($Password),
				);
			if($this->input->post('password') != $this->input->post('passwordconfirm'))
				return false;
			else
			{
				$this->db->where('userid', $userid);
				return $this->db->update('normaluser', $data); 
			}
		}	
		else
		{
			return false;
		}
		
	}
	public function setpwfromandroid($userid,$pwd)
	{	
		/*增加的标签来确定是否已经完善了基础部分*/
		if($userid)
		{
			$data= array(
				'Password' => md5($pwd),
				);
				$this->db->where('userid', $userid);
				return $this->db->update('normaluser', $data); 
		}	
		else
		{
			return false;
		}
		
	}
	

}
?>
