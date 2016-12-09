<?php
	/**
	* The moments for persion to share experience and communication.
	*/
	class Moments extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('moments_model');
			$this->load->helper('form');
			$this->load->library('session');
			$this->load->helper('url');
		}
		public function index()
		{
			redirect('/moments/getTopic');
		}
		public function pushTopic($value='')
		{
			$submitted  = $this->input->post('submitted');
			if($submitted) {
				$title =  $this->input->post('title');
				$content = nl2br($this->input->post('content'));

				$iter = $this->session->userdata('iter');	
				if (isset($iter['name'])) {
					$UserName = $iter['name'];
					$result = $this->moments_model->pushTopic($UserName,$title,$content);
					if($result) {
						$iter = $this->session->userdata('iter');	
						if (isset($iter['name'])) {  	
							$data['normaluser'] = TRUE;
						}
						else {
							$data['normaluser'] = false;
						}
						$data['title'] = "发布话题成功";
						$data['success'] = TRUE;
						$this->load->view('templates/ontopheader',$data);
						$this->load->view('moments/success',$data);
						$this->load->view('templates/footer2',$data);
					}else {
						echo "Failure";
					}
				}
				else{
					echo "请先登录";
				}	

			}
			else {
				$iter = $this->session->userdata('iter');	
				if (isset($iter['name'])) {  	
					$data['normaluser'] = TRUE;
					$data['login'] = TRUE;
				}
				else {
					$data['normaluser'] = false;
					$data['login'] = false;
				}
				$data['title'] = "发布话题";
				$this->load->view('templates/ontopheader',$data);
				$this->load->view('moments/pushTopic');
				$this->load->view('templates/footer2',$data);
			}
		}
		/*发帖（post方法）：http://chenbingjin.cn/iter/moments/pushTopics/username*/
		public function pushTopics($UserName=false)
		{	
			if($UserName) {
				$User = $this->cookie_model->getCookieByName($UserName);
				if ($this->input->post()) {								
					$this->load->model('cookie_model');
					$sso = $this->input->cookie('sso');			
					if($sso)
					{
						$title =  $this->input->post('title');
						$content = $this->input->post('content');		        	
						/*验证用户是否登录*/
						if ($User) {
							$result = $this->moments_model->pushTopic($UserName,$title,$content);
							if($result) {
								$data = array(
									'status' => "success",
									'your sso' => $sso,
									);
								echo json_encode($data);
							}else {
								$data = array(
									'status' => "false",
									'error' => "pushtopic failed",
									'sso'=>$User['sso'],
									'your sso' => $sso,
									);
								echo json_encode($data);
							}
						}
						else
						{
							$data = array(
								'status' => "false",
								'error' => "your sso is not correct!",
								'sso'=>$User['sso'],
								'your sso' => $sso,
								);
							echo json_encode($data);
						}				
					}
					else
					{
						$data = array(
							'status' => "false",
							'error' => "no login",
							'sso'=>$User['sso'],
							'your sso' => $sso,
							);
						echo json_encode($data);
					}
				}else{
					$data = array(
						'status' => "false",
						'error' => "no post method",
						'sso'=>$User['sso'],
						);
					echo json_encode($data);
				}
			}
			else
			{
				$data = array(
					'status' => "false",
					'error' => "url have no username",
					);
				echo json_encode($data);
			}
		}
		public function getTopic($value='')
		{
			$data['type'] = 4;			
			$result = $this->moments_model->getTopic();
			if ($result != false) 
			{
				$data['topic'] = $result;
				$iter = $this->session->userdata('iter');
				if (isset($iter['name'])) 
				{
					$data['normaluser'] = TRUE;
				}
				else
				{
					$data['normaluser'] = false;
				}
					$data['title'] = "经验交流";
					$this->load->view('templates/ontopheader',$data);
					$this->load->view('moments/passagelist',$data);
					$this->load->view('templates/footer2',$data);
			}
			else
			{
				echo "error done";
			}
		}
		/*API取帖（post方法）：http://chenbingjin.cn/iter/moments/getTopics
		返回值：所有帖子id，标题，作者，时间，不包括帖子内容。*/
		public function getTopics($value='')
		{
			$result = $this->moments_model->getTopicSimple();
			if ($result != false) 
			{
				echo json_encode($result);
			}
			else 
			{
				$data = array(
					'status' => "false",
					'error' => "no topic",
					);
				echo json_encode($data);
			}
		}
		public function topicDetial($TopicID)
		{
			$data['type'] = 4;
			$topic = $this->moments_model->getTopicByID($TopicID);
			//print_r($topic);
			$reply = $this->getReply($TopicID);
			//print_r($reply);
			$data['title'] = $topic['TopicTitle'];
			//echo $data['title'];
			$data['topic'] = $topic;
			$data['reply'] = $reply;
			$iter = $this->session->userdata('iter');
			if (isset($iter['name'])) {
				$data['normaluser'] = TRUE;
			}else{
				$data['normaluser'] = false;
			}
			$this->load->view('templates/ontopheader',$data);
			$this->load->view('moments/topicDetial',$data);
			$this->load->view('templates/footer2',$data);
		}
		public function topicDetials($TopicID)
		{
			$data['type'] = 4;
			$topic = $this->moments_model->getTopicByID($TopicID);
			//print_r($topic);
			$reply = $this->getReply($TopicID);
			//print_r($reply);
			$data = array(
				'topic' => $topic,
				'reply' => $reply,
				);
			if ($topic != false) {
				echo json_encode($data);

			} else {
				$data = array(
					'status' => "false",
					'error' => "no topic",
					);
				echo json_encode($data);
			}
		}
		public function reply($topicid=false)
		{
			$submitted  = $this->input->post('submitted');
			$content = nl2br($this->input->post('reply'));
			if ($submitted)
			{
				$iter = $this->session->userdata('iter');
				if (isset($iter['name'])) {
					//$data['normaluser'] = TRUE;
					$UserName = $iter['name'];
					$result = $this->moments_model->reply($topicid,$UserName,$content);
					if($result) {
						redirect("/moments/topicDetial/$topicid");
					}else {
						echo "Failure";
					}
				}else{
					$data['normaluser'] = false;
					echo "请先登录";
				}		
				
			}
			else {
				echo "Access Forbidden!";
			}
			//
		}
		/*
		帖子回复：http://chenbingjin.cn/iter/moments/replys/帖子id*/
		public function replys($topicid=false)
		{
			//$submitted  = $this->input->post('submitted');
			$this->load->model('cookie_model');
			$sso = $this->input->cookie('sso');	
			$User = $this->cookie_model->getCookie($sso);
			if ($sso)
			{
				$content = nl2br($this->input->post('reply'));
	            //$User = $this->cookie_model->getCookie($sso);
				if($User) {
					$result = $this->moments_model->reply($topicid,$User['name'],$content);

					if($result) {
						$data = array(
							'status' => "success",
							);
						echo json_encode($data);
					}else {$User = $this->cookie_model->getCookie($sso);
						$data = array(
							'status' => "false",
							'error' => "reply error",
							);
						echo json_encode($data);
					}
				}
				else {
					$data = array(
						'status' => "false",
						'error' => "no correct sso",

						);
					echo json_encode($data);
				}
			}
			else{
				$data = array(
					'status' => "false",
					'error' => "no sso cookie",
					);
				echo json_encode($data);
			}		
		}
		public function getReply($topicid)
		{
			$result = $this->moments_model->getReply($topicid);
			//print_r($result);
			if($result) {
				return $result;
			}else {
				return 0;
			}
		}
		public function deleteReply($id)
		{
			# code..
			if($id) 
			{
				$result = $this->moments_model->deleteReply($id);
				if($result) {
					echo "<script> alert('删除成功');</script>";
					redirect("/moments/");
				}
				else {
					echo "<script> alert('删除失败');</script>";
					redirect("/company/");
				}
			}
			else{
				echo "Access Forbidden!";
			}
		}
		public function updateReply($id,$ajax=false)
		{
			if($id) 
			{
				if ($ajax) {
					$this->moments_model->updateReply($id);
				}else {
					$result = $this->moments_model->updateReply($id);
					$iter = $this->session->userdata('iter');

					if($result) {
						redirect("/moments/getUnreadReply/".$iter['name']);
					}
					else {
						echo "updateReply failed";
					}
				}
			}
			else{
				echo "Access Forbidden!";
			}
		}

		public function getUnreadReply($username,$ajax=false)
		{
			$result = $this->moments_model->getUnreadReply($username);
			//print_r($result);
			if($result) {
				if ($ajax) {
					foreach ($result as $reply) {
						$this->updateReply($reply['ReplayID'],$ajax);
					}
					echo json_encode($result);
				}else {
					
					$data['reply'] = $result;
					$iter = $this->session->userdata('iter');
					if (isset($iter['name'])) {
						$data['normaluser'] = TRUE;
					}else{
						$data['normaluser'] = false;
					}
					$data['title'] = "消息";
					$this->load->view('templates/ontopheader',$data);
					$this->load->view('moments/messagelist',$data);
					$this->load->view('templates/footer2',$data);
				}
				
			}else {
				if ($ajax) {
					echo json_encode(array('status' => false,'reason' => "no unread message"));
				}else {

					$iter = $this->session->userdata('iter');
					if (isset($iter['name'])) {
						$data['normaluser'] = TRUE;
					}else{
						$data['normaluser'] = false;
					}
					$data['title'] = "消息";
					$data['nomessage'] = TRUE;
					$this->load->view('templates/ontopheader',$data);
					$this->load->view('moments/nomessage',$data);
					$this->load->view('templates/footer2',$data);
				}
			}
		}
	}
	?>