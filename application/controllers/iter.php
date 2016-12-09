<?php
class Iter extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('iter_model');	
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
	}
	function index()
	{

		$data['title'] = 'Iter';
		$iter = $this->session->userdata('iter');
		if (isset($iter['name'])) {
			$data['normaluser'] = TRUE;
		}else{
			$data['normaluser'] = false;
		}
		$this->load->model('career_model');
		$this->load->model('company_model');
		$this->load->model('moments_model');

		$result1 = $this->career_model->getCareerInfoByType('1');
		$result2 = $this->career_model->getCareerInfoByType('2');
		$result3 = $this->career_model->getCareerInfoByType('3');
		$result4 = $this->company_model->getMeeting();
		$result5 = $this->moments_model->getTopic();

		$data['fulljob'] = $result1;
		$data['intership'] = $result2;
		$data['parttimejob'] = $result3;
		$data['meeting'] = $result4;
		$data['topic'] = $result5;
		$this->load->view('templates/header2',$data);
		$this->load->view('mainpage/mainsearch');
		$this->load->view('mainpage/careers');			
		$this->load->view('mainpage/experience');
		$this->load->view('mainpage/meetinglist');
		$this->load->view('templates/footer2',$data);
			//$this->load->view('templates/header',$data);
			//$this->load->view('iter/index',$data);
			//$this->load->view('templates/footer',$data);
	}
	public function getMeeting()
	{
		
		$data['type'] = 5;
		$this->load->model('company_model');
		$result = $this->company_model->getMeeting();
		if ($result != false) {

			$data['meeting'] = $result;
			$iter = $this->session->userdata('iter');
			if (isset($iter['name'])) {
				$data['normaluser'] = TRUE;
			}else{
				$data['normaluser'] = false;
			}
			$data['title'] = "宣讲会";
			$this->load->view('templates/ontopheader',$data);
			$this->load->view('meeting/meetinglist',$data);
			$this->load->view('templates/footer2',$data);

		}else {
			echo "error done";
		}
	}
	public function meetingDetial($MeetingID)
	{
		$data['type'] = 5;
		$this->load->model('company_model');
		$meeting = $this->company_model->getMeetingByID($MeetingID);

		$data['title'] = $meeting['MeetingName'];
			//echo $data['title'];
		$data['meeting'] = $meeting;
		$iter = $this->session->userdata('iter');
		if (isset($iter['name'])) {
			$data['normaluser'] = TRUE;
		}else{
			$data['normaluser'] = false;
		}
		$this->load->view('templates/ontopheader',$data);
		$this->load->view('meeting/meeting-msg',$data);
		$this->load->view('templates/footer2',$data);
	}
	function login($ajax=false)
	{

		// $sso = $this->input->cookie('sso');
		// if($sso)
		// {
		// 	$this->iter_model->autoLogin($sso);
		// }

	        //find out if they're already logged in, if they are redirect them
		// $isLogged  = $this->iter_model->isLogged();
		// if ($isLogged)
		// {
		// 	$this->session->set_flashdata('success', '您已经登录！');
		// 	redirect('/iter');
		// }
	        //$data['title'] = '登录'; 
		$this->load->helper('form');
	        //$submitted  = $this->input->post('submitted');
	        /*if ($submitted)
	        {*/
	        	if($this->input->post())
	        	{
	        		$name      = $this->input->post('name');
	        		$password   = $this->input->post('password');
	        		$remember   = $this->input->post('remember');
	        		$result      = $this->iter_model->login($name, $password, $remember);
	        		if ($result)
	        		{
	                //to login via ajax
	        			$data['iter'] = array(
	        				'name' => $result['UserName'],
	        				'id' => $result['UserID'],
	        				'logged' => TRUE
	        				);
	                //if ($remember) 
	            	//{
	        			$this->cookie_model->deleteCookie($name);
	        			$seed = "ooxx".time().$name;
	        			$sso = sha1(md5($seed));
	        			$expire = 60*60*24*30;
	        			$cookie = array(
	        				'name'=>"sso",
	        				'value'=>$sso,
	        				'expire'=>$expire,
	        				);
	        			$this->input->set_cookie($cookie);
	        			$this->cookie_model->addCookie($sso,$name,$expire);
	            	//}
	        			$this->session->set_userdata($data);

	        			if($ajax)
	        			{
	                    //echo json_encode(array('result'=>"true")) ;
	        				$data = array(
	        					'status' => "success",
	        					'sso'=>$sso,
	        					);
	        				echo json_encode($data);
	        			}
	        			else
	        			{
	                    //echo json_encode(array('result'=>true)) ;
	        				$this->load->model('career_model');
	        				$this->load->model('company_model');
	        				$this->load->model('moments_model');
	        				$result1 = $this->career_model->getCareerInfoByType('1');
	        				$result2 = $this->career_model->getCareerInfoByType('2');
	        				$result3 = $this->career_model->getCareerInfoByType('3');
	        				$result4 = $this->company_model->getMeeting();
	        				$result5 = $this->moments_model->getTopic();

	        				$data['fulljob'] = $result1;
	        				$data['intership'] = $result2;
	        				$data['parttimejob'] = $result3;
	        				$data['meeting'] = $result4;
	        				$data['topic'] = $result5;
	        				$data['title'] = '首页';
	        				$data['normaluser'] = TRUE;
	        				$this->load->view('templates/header2',$data);
	        				$this->load->view('mainpage/mainsearch');
	        				$this->load->view('mainpage/careers');			
	        				$this->load->view('mainpage/experience');
	        				$this->load->view('mainpage/meetinglist');
	        				$this->load->view('templates/footer2',$data);
	        			}

	        		}
	        		else
	        		{

	                //to login via ajax
	        			if($ajax)
	        			{
	        				$data = array(
	        					'status' => "failed",
	        					'error' => "wrong password",
	        					);
	        				echo json_encode($data);
	                    //echo json_encode(array('result'=>"false")) ;
	        			}
	        			else
	        			{
	        				$data['noNavbar'] = TRUE;
	        				$data['title'] = '登录';
	        				$data['error'] = TRUE;
	        				$this->load->view('templates/loginhead',$data);
	        				$this->load->view('iter/login2',$data);
	        				$this->load->view('templates/footer2',$data);   
	        			}
	        		}
	        	}
	        	else 
	        	{
       //                 echo "hhy";
	        		if($ajax)
	        		{ 
	        			$data = array(
	        				'result' => "false",
	        				'error' => "nothing post!",
	        				);
	        			echo json_encode($data);
	        		}
	        		else 
	        		{ 
	        			$data['noNavbar'] = TRUE;
	        			$data['title'] = '登录';
	        			$data['error'] = false;
	        			$data['normaluser'] = false;
	        			$this->load->view('templates/loginhead',$data);
	        			$this->load->view('iter/login2',$data);
	        			$this->load->view('templates/footer2',$data);
	        		}
	        	}
	        }
	        public function logout()
	        {
	        	$iter = $this->session->userdata('iter');
	        	$this->iter_model->logout($iter['name']);
	        	redirect('/iter');
	        }
	        public function regist($ajax=false)
	        {
	        	$data['title'] = '注册'; 
	       /* $this->load->helper('form');
	        $submitted  = $this->input->post('submitted');
	        if ($submitted) {
	        */
	        	if($this->input->post())
	        	{
	        		$name   = $this->input->post('name');
	        		$password   = $this->input->post('password');
	        		$email  = $this->input->post('email');
	        		$tel = $this->input->post('tel');
	        		$regist  = $this->iter_model->regist($name, $password, $email,$tel);
	        		if($regist)
	        		{
	        			if ($ajax) {

	        				$data = array(
	        					'status' => "success",
	        					);
	        				echo json_encode($data) ;
	        			}
	        			else
	        			{
	        				$data['noNavbar'] = TRUE;
	        				$data['success'] = TRUE;
	        				$this->load->view('templates/header2',$data);
	        				$this->load->view('iter/success',$data);
	        				$this->load->view('templates/footer2',$data);
	        			}


	        		}
	        		else
	        		{
	        			if($ajax) { 
	        				$data = array(
	        					'status' => "false",
	        					'error' => "nothing post!",
	        					);
	        				echo json_encode($data);
	        			}
	        			else {
	        				$data['noNavbar'] = TRUE;
	        				$data['error'] = TRUE;
	        				$this->load->view('templates/loginhead',$data);
	        				$this->load->view('iter/register',$data);
	        				$this->load->view('templates/footer2',$data);
	        			}
	        		}
	        	}
	        	else
	        	{
	        		if($ajax)
	        		{ 
	        			$data = array(
	        				'result' => "false",
	        				'error' => "nothing post!",
	        				);
	        			echo json_encode($data);
	        		}
	        		else{
	        			$data['noNavbar'] = TRUE;
	        			$data['error'] = false;
	        			$this->load->view('templates/loginhead',$data);
	        			$this->load->view('iter/register',$data);
	        			$this->load->view('templates/footer2',$data);
	        		}
	        	}
	        }
	        public function mysetting($resumeid=false)
	        {	


	        	$iter = ($this->session->userdata('iter'));

	        	$UserName = $iter['name'];

			//$this->load->model('resume_model');

	        	$data['userid'] = $this->iter_model->getUserID($UserName);

	        	$userid = $data['userid'];


			//resume_model里面用的normaluser表来查userid...
	        	$hasresume = $this->iter_model->hasbasicinfo($userid);

	        	if($hasresume == 0)
	        	{
	        		$data['title'] = '设置我的简历'; 
	        		$data['resumeid_list'] = "false";
	        		$data['normaluser'] = true;

	        		$this->load->view('templates/ontopheader',$data);
				//$this->load->view('mysetting/mysettingview',$data);
	        		$this->load->view('mysetting/firstmysetting',$data);
	        		$this->load->view('templates/footer2',$data);
	        	}
	        	else
	        	{
	        		if($resumeid != false)
	        		{
	        			$data['normaluser'] = true;
	        			$this->load->model('resume_model');
	        			$data['resumeid_list'] = $this->resume_model->getresumeidandname($userid);
	        			$data['CurrentResumeID'] = $resumeid;
	        			$data['basicinfo'] = $this->resume_model->getbasicresume($resumeid);

	        			$this->load->model('Lang_model');
	        			$data['lang_items'] = $this->Lang_model->getLangByid($resumeid);

	        			
	        			$this->load->model('Schoolwork_model');
	        			$data['schoolwork_items'] = $this->Schoolwork_model->getschoolworkByid($resumeid);

	        			$this->load->model('Social_model');
	        			$data['social_items'] = $this->Social_model->getsocialByid($resumeid);

	        			$this->load->model('Project_model');
	        			$data['project_items'] = $this->Project_model->getprojectByid($resumeid);

	        			$this->load->model('Award_model');
	        			$data['award_items'] = $this->Award_model->getawardByid($resumeid);

	        			$this->load->model('Etc_model');
	        			$data['etc_items'] = $this->Etc_model->getetcByid($resumeid);

	        			$this->load->model('Attach_model');
	        			$data['attach_items'] = $this->Attach_model->getattachByid($resumeid);

	        			$data['title'] = '设置我的简历';
	        			$this->load->view('templates/ontopheader',$data);
	        			$this->load->view('mysetting/mysettingview',$data);
					//现在得到语言基本信息填入mysettinglang页面中.根据resumeid


					//print_r($data['lang_items']);能够得到了..

					//包含重命名和删除文件，初步设想是如果没有命名，就把简历ID显示出来.
	        		//	$this->load->view('mysetting/mysettingviewbasic',$data);
					//$this->load->view('mysetting/mysettingviewtotal');
	        			$this->load->view('mysetting/mysettingviewbasic',$data);
	        			$this->load->view('mysetting/mysettingviewlang',$data);
	        			
	        			
	        			$this->load->view('mysetting/mysettingviewsocial',$data);
	        			$this->load->view('mysetting/mysettingviewproject',$data);
	        			$this->load->view('mysetting/mysettingviewawards',$data);
	        			$this->load->view('mysetting/mysettingviewetc',$data);
	        			$this->load->view('mysetting/mysettingviewattached',$data);

	        			$this->load->view('templates/footer2',$data);
	        		}
	        		else
	        		{
				//写一个点击左侧简历试试！

	        			$this->load->model('resume_model');
	        			$lastresumeid = $this->resume_model->getLastResumeID($userid);
	        			$this->mysetting($lastresumeid[0]['ResumeID']);
	        		}

	        	}
	        }


	        public function getResume($UserName)
	        {
	        	$resumeidarray = array();
	        	if($UserName)
	        	{
	        		$this->load->model('resume_model');	
	        		$resumeidarray = $this->resume_model->getResume($UserName);
	        		return $resumeidarray;
	        	}
	        }
	        public function resetpwd($UserName)
	        {
	        	$data['title'] = '更改密码';
	        	if($UserName)
	        	{
	        		$data['userid'] = $this->iter_model->getUserID($UserName);
	        		$data['normaluser'] = true;
	        		$this->load->view('templates/ontopheader',$data);
	        		$this->load->view('mysetting/changepw',$data);
	        		$this->load->view('templates/footer2');
	        	}
	        	else
	        	{
	        		echo "<script>alert('请先登录');</script>";
	        		redirect("/iter/login");
	        	}
	        }
	        public function setpw($userid)
	        {
	        	$data['title'] = '更改密码';
	        	if($userid)
	        	{
	        		$result = $this->iter_model->setpw($userid);
	        		$data['normaluser'] = true;
	        		if($result)
	        		{
	        			$data['success'] = true;
	        			$this->load->view('templates/ontopheader',$data);
	        			$this->load->view('iter/successpw',$data);
	        			$this->load->view('templates/footer2',$data);
	        		}
	        		else
	        		{
	        			$data['error'] = TRUE;
	        			$data['userid'] = $userid;
	        			$this->load->view('templates/ontopheader',$data);
	        			$this->load->view('mysetting/changepw');
	        			$this->load->view('templates/footer2');
	        		}
	        	}
	        	else
	        	{
	        		echo "<script>alert('请先登录');</script>";
	        		redirect("/iter/login");
	        	}
	        }
	        public function setpwfromandroid($username,$pwd)
	        {	
	        	/*增加的标签来确定是否已经完善了基础部分*/
	        	if($username)
	        	{
				//$password = $this->input->post('pa');
	        		$data['userid'] = $this->iter_model->getUserID($username);

	        		$userid = $data['userid'];
	        		$result = $this->iter_model->setpwfromandroid($userid,$pwd);
	        		if($result)
	        		{
	        			$data= array(
	        				'status' => "success",
	        				);
	        			echo json_encode($data);
	        		}
	        		else
	        		{
	        			$data= array(
	        				'status' => "fail",
	        				);
	        			echo json_encode($data);
	        		}
	        	}	
	        	else
	        	{
	        		$data= array(
	        			'status' => "fail",
	        			);
	        		echo json_encode($data);
	        	}

	        }		
	        
	    }
	    ?>
