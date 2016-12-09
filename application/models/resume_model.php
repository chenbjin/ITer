<?php
	class Resume_model extends CI_Model 
	{
		public function __construct()
		{
			parent::__construct();	
		   $this->load->database();
		   $this->load->library('Services_JSON');
		}
		public function getresumeidandnamelist($userid)
		{	
			if($userid)
			{
				$this -> db -> where('UserID', $userid);
				$this -> db -> select('ResumeID,resumename');
				$query = $this -> db -> get('resumedetail');
				return $query->result_array();
			}
		}
		public function getuseridbyresumeid($resumeid)
		{	
			if($resumeid)
			{
				$this -> db -> where('ResumeID', $resumeid);
				$this -> db -> select('UserID');
				$query = $this -> db -> get('resumedetail');
				
				return $query -> result_array();
			}
			else
			{
				return false;
			}
		
		}
		public function deliverresume($resumeid, $careerid)
		{
			$data = array(
			'ResumeID' => $resumeid,
			'CareerID' => $careerid,
			'Status' => "已投递",
			);
			$query = $this->db->insert("resumestatus",$data);
			return $query ;
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
				return false;
			}
		
		}
		public function deleteByResumeID($resumeid=false)
		{
			if($resumeid)
			{
				//echo $resumeid;$this->db->delete('mytable', array('id' => $id)); 
				$this->db->where('ResumeID', $resumeid);
				return $this->db->delete('resumedetail'); 
			}
			else
			{
				echo "are you chuanyue le ?";
			}
		}
		public function hasbasicinfo($userid)
		{	
		/*增加的标签来确定是否已经完善了基础部分*/
			if($userid)
			{
				$query = $this->db->query("SELECT hasfullbasic FROM normaluser where UserID = \"$userid\"");
			
				return $query->row()->hasfullbasic;
			}	
			else
			{
			    return false;
			}
		
		}
		public function setbasicinfo($userid)
		{	
		/*增加的标签来确定是否已经完善了基础部分*/
				$data = array(
						
							'hasfullbasic' => '1',
					 );
		
				$this->db->where('userid', $userid);
				return $this->db->update('normaluser', $data); 
		
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
		public function getandroidbasicinfo($ResumeID)
		{	
		/*增加的标签来确定是否已经完善了基础部分*/
			if($ResumeID)
			{
				$query = $this->db->query("SELECT UserID,UserName,Email,Tel,Gender,Birth_of_Date,politicystate,Address,eduin,eduout,School,Major,eduxueli FROM resumedetail where ResumeID = \"$ResumeID\"");
				return $query->row_array();
			}	
			else
			{
			    return false;
			}
		
		}
		public function getresumeidlist($userid)
		{	
		/*增加的标签来确定是否已经完善了基础部分*/
			if($userid)
			{
				$query = $this->db->query("SELECT ResumeID FROM resumedetail where UserID = \"$userid\"");
				return $query->result_array();
			}	
			else
			{
			    return false;
			}
		
		}
		public function getbasicresume($resumeid)
		{	
		/*增加的标签来确定是否已经完善了基础部分*/
			if($resumeid)
			{
				$query = $this->db->query("SELECT * FROM resumedetail where ResumeID = \"$resumeid\"");
				//print_r($query->row_array());
				return $query->row_array();
			}	
			else
			{
			    return false;
			}
		
		}
		public function setResume($userid)
		{
			
			 if($userid)
			{
				$iter = ($this->session->userdata('iter'));
				
				$username = $iter['name'];
				
				$data['basicinfo'] = $this->getbasicinfo($userid); 
				//print_r($data['basicinfo']);
				$datas = array(
					'UserName' => $username,
					
					'UserID' => $userid,
					'Tel' => $data['basicinfo']['Tel'],
					'Gender' => $data['basicinfo']['gender'],
					'Birth_of_Date' => $data['basicinfo']['birthofdate'],				
					'PoliticyState' => $data['basicinfo']['politicystate'],
					'Email' => $data['basicinfo']['Email'],
					'Address' => $data['basicinfo']['address'],
					'eduin' => $data['basicinfo']['eduin'],
					'eduout' => $data['basicinfo']['eduout'],
					'School' => $data['basicinfo']['school'],				
					'Major' => $data['basicinfo']['major'],
					'eduxueli' => $data['basicinfo']['eduxueli'],
					);
				//print_r($datas);
				return $this->db->insert('resumedetail', $datas);
			}
			 else 
			 {
				return false;
			 }
		}
		public function updateResume()
		{
				 $UserName = $this->input->post('UserName');
				 $UserId = $this->getUserID($UserName);
				 $ResumeID = $this->input->post('ResumeID');
				 $where = "ResumeID = \"$ResumeID\"";
				 if($UserId)
				 {
					 $data = array(
					'WorkType'  => $this->input->post('WorkType'),
					'School'  => $this->input->post('School'),
					'Major'  => $this->input->post('Major'),
					'UserID' => $UserId,
					'Tel' => $this->input->post('Tel'),
					'Education' => $this->input->post('Education'),
					'Gender' => $this->input->post('Gender'),
					'Birth_of_Date' => $this->input->post('Birth_of_Date'),
					'Identity' => $this->input->post('Identity'),
					'PoliticyState' => $this->input->post('PoliticyState'),
					'Email' => $this->input->post('Email'),
					'Address' => $this->input->post('Address'),
					'Blog' => $this->input->post('Blog'),
					'EmergencyContacter' => $this->input->post('EmergencyContacter'),
					'EmergencyTel' => $this->input->post('EmergencyTel')
				 );
					return $this->db->update('resumedetail', $data,$where);
				 }
				 else return "FALSE";
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
				return false;
			}
		}
		public function getResumeById($resumeid)
		{
			if($resumeid)
			{		  
			  $query = $this->db->get_where('resumedetail', array('ResumeID' => $resumeid));			  
			
			  return $query->result_array();
			}
			else
			{
				return false;
			}
		}
			
		public function getresumeid($userid)
		{
			if($userid)
			{	
				$this -> db -> where('UserID', $userid);
				$this -> db -> select('ResumeID,resumename');
				$query = $this -> db -> get('resumedetail');
				
				return $query -> result_array();
			}
			else
			{
				return false;
			}
		}
		public function getresumeidandname($userid)
		{
			if($userid)
			{	
				$this->db->order_by("ResumeID", "desc"); 
				$this -> db -> where('UserID', $userid);
				$this -> db -> select('ResumeID,resumename');
				$query = $this -> db -> get('resumedetail');
				return $query -> result_array();
			}
			else
			{
				return false;
			}
		}
		public function updatebasicByResumeID($resumeid)
		{
			if($this->input->post())
			{
				$userid = $this->input->post('userid');				
				$data = array(
						'resumename' => $this->input->post('resumename'),
						'UserName' => $this->input->post('basicname'),
						'eduin' => $this->input->post('starttime'),
						'eduout' => $this->input->post('endtime'),
						'Major' => $this->input->post('major'),
						'eduxueli' => $this->input->post('xueli'),
						
						'Tel' => $this->input->post('basictel'),												
						'Gender' => $this->input->post('basicgender'),
						'Birth_of_Date' => $this->input->post('basicbirthofdate'),				
						'politicystate' => $this->input->post('basicpoliticystate'),
						'email' => $this->input->post('basicemail'),
						'address' => $this->input->post('basicaddress'),
					 );
				//print_r($data);
				$this->db->where('resumeid', $resumeid);//这里为什么没有update gender这一项啊...因为emum的原因...数据库的问题，不是代码的问题
				return $this->db->update('resumedetail', $data); 
			}
			else
			{
				echo "没有input过来数据，我怎么update";
			    return false;
			}
		}
		public function getLastResumeID($userid)
		{
			if($userid)
			{	
				$this -> db -> where('UserID', $userid);
				$this -> db -> select_max('ResumeID');
				$query = $this -> db -> get('resumedetail');
				
				return $query -> result_array();
			}
			else
			{
				return false;
			}
		}
		/*
		获取简历Json解析
		*/
		public function getJsonResume($UserName,$resumeid="false")
		{
			if($UserName)
			{
				if($resumeid != "false")
				{
				  $UserID = $this->getUserID($UserName);	  
				  $query = $this->db->get_where('resumedetail', array('UserID' => $UserID,'ResumeID' => $resumeid));
				  $ResumeArray = $query->result_array();
				  $result =  $this->services_json->encode($ResumeArray);
				  return  $result;
				}
				else
				{
				  $UserID = $this->getUserID($UserName);	  
				  $query = $this->db->get_where('resumedetail', array('UserID' => $UserID));
				  $ResumeArray = $query->result_array();
				  $result =  $this->services_json->encode($ResumeArray);
				  return  $result;
				}
			}
			else
			{
				return false;
			}
		}
		/*
		修改的地方在这里，增加了获取简历Json解析。
		*/
		public function getJsonlvseResume($resumeid=false)
		{
			
				if($resumeid)
				{
				  
				  $query = $this->db->get_where('resumedetail', array('ResumeID' => $resumeid));
				  $ResumeArray = $query->result_array();
				  $result =  $this->services_json->encode($ResumeArray);				 
				  return  $result;
				}
				else
				{
				 	return false;
				}
			
		}
	}
?>

