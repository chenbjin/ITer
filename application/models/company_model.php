<?php
class Company_model extends CI_Model 
{
	var $session_expire= 3600;
	function __construct()
	{
		parent::__construct();
		$this->load->model('cookie_model');
		$this->load->library('session');
		$this->load->helper('url');
	}
	function getCompanyInfo($name)
	{
		$query = $this->db->get_where('companyuser',array('CompanyName'=>$name));
		return $query->row_array();
	}
	function getUserID($name)
	{
		$this->db->select('CompanyID');
		$this->db->where('CompanyName',$name);
		$result = $this->db->get('companyuser');	
		return $result->row_array();
	}
	public function getCompanyByID($id)
	{
		$query = $this->db->get_where('companyuser',array('CompanyID'=>$id));
		return $query->row_array();
	}
	public function getCompany_id_and_release_By_Email($Email)
	{
		$this->db->select('CompanyID,HaveRelease');
		$this->db->where('Email',$Email);

		$query = $this->db->get('companyuser');

		return $query->row_array();
	}
	public function deleteCareer($id)
	{
		$this->load->model('career_model');
		$result = $this->db->delete('career', array('CareerID' => $id)); 
		return $result;
	}
	public function deleteMeeting($id)
	{
		$result = $this->db->delete('meeting', array('MeetingID' => $id)); 
		return $result;
	}
	public function getCompanyNameByID($id)
	{
		$this->db->select('CompanyName');
		$this->db->where('CompanyID',$id);
		$this->db->limit(1);
		$result = $this->db->get('companyuser');

		if ($result->num_rows()>0)
		{
			return $result->result_array();
		}
	}

	public function pushCareer($RecruitingNumbers,$CareerName,$CareerType, $CompanyID,$CompanyName,$StartTime,$EndTime,$PushTime,$WorkPlace,$CareerDescription,$CareerRequire,$Other)
	{

		$data = array(
			'RecruitingNumbers'=>$RecruitingNumbers,
			'CareerName'=>$CareerName,
			'CareerType'=>$CareerType,
			'CompanyID'=>$CompanyID,
			'CompanyName'=>$CompanyName,
			'StartTime'=>$StartTime,
			'EndTime'=>$EndTime,
			'PushTime'=>$PushTime,
			'WorkPlace'=>$WorkPlace,
			'CareerDescription'=>$CareerDescription,
			'CareerRequire'=>$CareerRequire,
			'Other'=>$Other,
			);
		$result = $this->db->insert('career', $data); 
		if($result)
			return TRUE;
		else
			return false;
	}
	public function updatecareer($CompanyName,$CareerID,$RecruitingNumbers,$CareerName,$CareerType, $CompanyID, $StartTime,$EndTime, $PushTime,$WorkPlace,$CareerDescription,$CareerRequire,$Other)
	{

		$data = array(
			'RecruitingNumbers'=>$RecruitingNumbers,
			'CareerName'=>$CareerName,
			'CareerType'=>$CareerType,
			'CompanyID'=>$CompanyID,
			'CompanyName'=>$CompanyName,
			'StartTime'=>$StartTime,
			'EndTime'=>$EndTime,
			'PushTime'=>$PushTime,
			'WorkPlace'=>$WorkPlace,
			'CareerDescription'=>$CareerDescription,
			'CareerRequire'=>$CareerRequire,

			);
			//print_r($data);
			//echo $StartTime;
			//echo $WorkPlace."WorkPlace";
		$result = $this->db->update('career', $data, array('CareerID' => $CareerID));
		if($result)
			return TRUE;
		else
			return false;
	}
	public function getMeeting($id=false)
	{
		if ($id) {
			$this->db->order_by('MeetingID','desc');
			$query = $this->db->get_where('meeting',array('CompanyID'=>$id));
			return $query->result_array();
		}else{
			$this->db->order_by('MeetingID','desc');
			$query = $this->db->get('meeting');
			return $query->result_array();
		}
	}
	public function getMeetingByID($id)
	{
		if ($id) {
			$query = $this->db->get_where('meeting',array('MeetingID'=>$id));
			return $query->row_array();
		}else{
			return false;
		}
	}
	public function pushMeeting($meeting)
	{
		$data = array(
			'CompanyID' => $meeting['CompanyID'], 
			'CompanyName' => $meeting['CompanyName'], 
			'MeetingName' => $meeting['MeetingName'], 
			'MeetingContent' => $meeting['MeetingContent'], 
			'MeetingPlan' => $meeting['MeetingPlan'], 
			'Time' => $meeting['Time'], 
			);
		return $this->db->insert('meeting', $data); 
	}
	function regist($name, $password, $email,$mobile,$tel,$address,$description)
	{
		$this->db->select('*');
		$this->db->where('CompanyName',$name);
		$this->db->limit(1);
		$result = $this->db->get('companyuser');
		if ($result->num_rows() > 0)
		{
			return FALSE;
		}
		else
		{
			$data = array(
				'CompanyName'=>$name,
				'Password'=>md5($password),
				'Email'=>$email,
				'Mobile'=>$mobile,
				'Telphone'=>$tel,
				'Address'=>$address,
				'CompanyBasicInfo'=>$description,
				);
			$this->db->insert('companyuser', $data); 
			return TRUE;
		}
	}
	function isLogged($redirect = FALSE)
	{
		$company = $this->session->userdata('company');
		if(empty($company))
		{
			if($redirect)
			{
				$this->session->set_flashdata('error', '未登录！');
				redirect('/iter/company/login');
			}
			return FALSE;
		}
		else if ($company['logged'] == TRUE)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	function autoLogin($sso)
	{
		$info = $this->cookie_model->getCookie($sso);
		if (!empty($info))
		{
			if ($info['expire'] > time())
			{
				$result = $this->getCompanyInfo($info['name']);
				print_r($result);
				$data = array();
				$data['company'] = array(
					'name' => $result['CompanyName'],
					'email' => $result['Email'],
					'id' => $result['CompanyID'],
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
	function login($email,$password,$remember=FALSE)
	{
		$this->db->select('*');
		$this->db->where('Email',$email);
		$this->db->where('Password',md5($password));
		$this->db->limit(1);
		$result = $this->db->get('companyuser');

		if ($result->num_rows() > 0)
		{
			$result = $result->row_array();
			$data = array();
			$data['company'] = array(
				'name' => $result['CompanyName'],
				'email' => $result['Email'],
				'id' => $result['CompanyID'],
				'logged' => TRUE
				);
	           // if ($remember) 
	            //{
			$this->cookie_model->deleteCookie($email);
			$seed = "ooxx".time().$email;
			$sso = sha1(md5($seed));
			$expire = 60*60*24*30;
			$cookie = array(
				'name'=>"sso",
				'value'=>$sso,
				'expire'=>$expire,
				);
			$this->input->set_cookie($cookie);
			$this->cookie_model->addCookie($sso,$email,$expire);
	           // }
			$this->session->set_userdata($data);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	function logout($company_id)
	{
		$this->cookie_model->deleteCookie($company_id);
		$this->session->sess_destroy();
	}
}
?>
