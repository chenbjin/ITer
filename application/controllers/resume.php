<?php
/**
* resume class , controller, both connect the view page and the model page.
*/
class Resume extends CI_Controller
{
	function __construct()
	{
		# code...
		parent::__construct();
		$this->load->model('resume_model');
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');//之前没有load这个类库才出错...
	}
	
	public function index()
	{
		$data['title'] = '填写基本信息';
		$iter = ($this->session->userdata('iter'));
		$UserName = $iter['name'];			
		$data['userid'] = $this->resume_model->getUserID($UserName);
		$data['normaluser'] = TRUE;
		$this->load->view('templates/ontopheader',$data);
		$this->load->view('resume/userbasic',$data);
		$this->load->view('templates/footer2',$data);
	}
	public function getresumeidlist($username)
	{
		$userid = $this->resume_model->getUserID($username);
		$data = array();
		$resumeidlist = $this->resume_model->getresumeidlist($userid);
		echo json_encode($resumeidlist);
	}
	public function getresumeidandnamelist($username)
	{
		$userid = $this->resume_model->getUserID($username);
		$data = array();
		$resumeidnamelist = $this->resume_model->getresumeidandnamelist($userid);
		echo json_encode($resumeidnamelist);
	}
	
	public function deliverresume($resumeid=false,$careerid=false,$fromandroid = false)
	{
		$result = $this->resume_model->deliverresume($resumeid,$careerid);
		if($fromandroid)
		{
			
			if($result)
			{
				$data = array(
					'status' => "success",
					);	
				echo json_encode($data);
			}
			else
			{
				$data = array(
					'status' => "fail",
					);
				echo json_encode($data);
			}	
		}
		else
		{
			if($result)
			{
				$data['normaluser'] = true;
				$data['success'] = true;
				$this->load->view("templates/header2",$data);
				$this->load->view("resume/successdeliver",$data);
				$this->load->view("templates/footer2");
			}
			else
			{
				echo "failed to deliver your resume, please try again.";
			}
		}
	}
	
	public function updatebasic()
	{
		$this->load->model('normaluser_model');
		$data['normaluser'] = TRUE;
		$result = $this->normaluser_model->update_basic();

		if($result)
		{
			$data['title'] = '填写教育信息';
			$iter = ($this->session->userdata('iter'));
			$UserName = $iter['name'];			
			$data['userid'] = $this->resume_model->getUserID($UserName);
			$this->load->view('templates/ontopheader',$data);
			$this->load->view('resume/useredu');
			$this->load->view('templates/footer2',$data);
		}
		else
		{
			$data['title'] = '填写教育信息失败';
			$this->load->view('templates/ontopheader',$data);
			echo "<h2>填写基本教育信息失败，请重新填写..</h2>";
			$this->load->view('templates/footer2',$data);
		}	  
	}
	public function updatebasicByResumeID($resumeid,$falg=false)
	{
		if($resumeid)
		{
			$this->load->model('normaluser_model');
			$data['normaluser'] = TRUE;
			$result = $this->resume_model->updatebasicByResumeID($resumeid);
			if($result)
			{

				if($falg)
				{
					$data = array(
						'status' => "success",
						);
					echo json_encode($data);
				}
				else
				{
					echo '<script type="text/javascript">
					history.go(-1);
					document.execCommand("refresh");
					alert("保存信息成功!");
				</script>
				';
			}

		}
		else
		{

			$data['title'] =  "保存基本简历信息失败，请稍候再试试吧";
			$this->load->view('templates/header2',$data);
			echo "<h2>保存基本简历信息失败，请稍候再试试吧</h2>";
			$this->load->view('templates/footer2',$data);
		}
	}
	else
	{
		echo "are you chuanyue le ?";
	}
}
public function update_edu()
{
	$this->load->model('normaluser_model');
	$result = $this->normaluser_model->update_edu();
		//这里调用创建一份新的简历!
	if($result)
	{	
		$userid = $this->input->post('userid');

		$result2 = $this->resume_model->setResume($userid);
		if($result2)
		{

			$iter = ($this->session->userdata('iter'));

			$UserName = $iter['name'];


			$data['userid'] = $this->resume_model->getUserID($UserName);

			$userid = $data['userid'];

			$data['normaluser'] = true;

			$data['resumeid'] = $this->resume_model->getLastResumeID($userid);
				//print_r($data['resumeid_list']);

			redirect(base_url("/index.php/iter/mysetting/".$data['resumeid'][0]['ResumeID']));

		}
		else
		{
			echo "<h2>填写基本信息成功，但是没能成功创建一份新的简历</h2>";
		}
	}
	else
	{

		$data['title'] =  "错误222！";
		$this->load->view('templates/header2',$data);
		$this->load->view('resume/index',$data);
		$this->load->view('templates/footer2',$data);
	}	  
}
public function create($flag = FALSE)
{
	if($flag)
	{
		$this->load->model('resume_model');
		$result = $this->resume_model->setResume();
		if($result)
		{
			$data = array(
				'status' => "success",
				);
			echo json_encode($data);
		}
		else
		{
			$data = array(
				'status' => "false",
				);
			echo json_encode($data);

		}
	}
	else
	{
		$result = $this->resume_model->setResume();
		if($result)
		{

			$this->load->view('resume/success');
		}
		else
		{
			echo "hehe";
			$data['title'] =  "错误222！";
			$this->load->view('templates/header',$data);
			//$this->load->view('resume/index',$data);
			$this->load->view('templates/footer',$data);
		}
	} 
}
public function createresume($userid)
{
	$result = $this->resume_model->setResume($userid);

	if($result)
	{
		$result2= $this->resume_model->setbasicinfo($userid);	
		redirect("/iter/mysetting");
	}
	else
	{

	} 
}
	//创建简历接口
public function createfromandroid($username) 
{
	if($username)
	{
		$this->load->model('resume_model');
		$userid = $this->resume_model->getUserID($username);
		$result = $this->resume_model->setResume($userid);
		$lastresumeid = $this->resume_model->getLastResumeID($userid);
		$lastid = $lastresumeid[0]['ResumeID'];
		$basicinfo =$this->resume_model->getandroidbasicinfo($userid);
		if($result)
		{
			$data = array(
				'status' => "success",
				'lastresumeid' => $lastid,
				'basicinfo' => $basicinfo,
				);
			echo json_encode($data);
		}
		else
		{
			$data = array(
				'status' => "false",
				);
			echo json_encode($data);

		}
	}
	else
	{
		$result = $this->resume_model->setResume();
		if($result)
		{

			$this->load->view('resume/success');
		}
		else
		{
			echo "hehe";
			$data['title'] =  "错误222！";
			$this->load->view('templates/header',$data);
			$this->load->view('resume/index',$data);
			$this->load->view('templates/footer',$data);
		}
	} 
}

public function post()
{
	if($this->input->post())
	{
		$userid = $this->input->post('userid');
		//echo $userid;//显示不出来userid,没有post过去详细的信息...why!!之前的那个已经改好了...
		$result = $this->resume_model->setResume();
		if($result)
		{
			$data = array();
			$data['title'] = "成功编辑简历";
			$this->load->view('templates/header',$data);
			$this->load->view('resume/success');
			$this->load->view('templates/footer',$data);
		}
		else
		{
			echo "fail to create a !";
		}
	}
	else
	{
		echo "你穿越了吧";
	}
}

public function addlang($ResumeID, $UserID)
{

	if($ResumeID)
	{
		if($UserID)
		{
			if($this->input->post())
			{
				$data = array(
					'category'  => $this->input->post('forcategorys'),
					'rank'  => $this->input->post('forranks'),
					'score'  => $this->input->post('forscores'),
					'userid' => $UserID,
					'resumeid' => $ResumeID,			
					);
					// print_r($data);
				$this->load->model('lang_model');
				$result = $this->lang_model->addlang($data);
				if($result)
				{	
					$data= array('status'=>"success");
					echo json_encode($data);
				}
			}
			else
			{
				$data= array('status'=>"fail");
				echo json_encode($data);
			}
		}
	}
}
public function addschoolwork($ResumeID, $UserID)
{

	if($ResumeID)
	{
		if($UserID)
		{
			if($this->input->post())
			{
				$data = array(
					'schoolworkstarttime'  => $this->input->post('foredustarttime'),
					'schoolworkendtime'  => $this->input->post('foreduendtime'),
					'schoolworkplace'  => $this->input->post('foreduworkplace'),
					'schoolworkcareer'  => $this->input->post('foreducareer'),
					'schoolcareerinfo'  => $this->input->post('foreducareerinfo'),
					'userid' => $UserID,
					'resumeid' => $ResumeID,			
					);
					//print_r($data);
				$this->load->model('schoolwork_model');
				$result = $this->schoolwork_model->addschoolwork($data);
				if($result)
				{	
					$data= array('status'=>"success");
					echo json_encode($data);
				}
			}
			else
			{
				$data= array('status'=>"fail");
				echo json_encode($data);
			}
		}
	}
}
public function addsocial($ResumeID, $UserID)
{

	if($ResumeID)
	{
		if($UserID)
		{
			if($this->input->post())
			{
				$data = array(
					'socialstarttime'  => $this->input->post('forsocialstarttime'),
					'socialendtime'  => $this->input->post('forsocialendtime'),
					'socialplace'  => $this->input->post('forsocialplace'),
					'socialcareer'  => $this->input->post('forsocialcareer'),
					'socialcareerinfo'  => $this->input->post('forsocialcareerinfo'),
					'userid' => $UserID,
					'resumeid' => $ResumeID,			
					);
					// print_r($data);
				$this->load->model('social_model');
				$result = $this->social_model->addsocial($data);
				if($result)
				{	
					$data= array('status'=>"success");
					echo json_encode($data);
				}
			}
			else
			{

				$data= array('status'=>"fail");
				echo json_encode($data);
			}
		}
	}
}
public function addproject($ResumeID, $UserID)
{

	if($ResumeID)
	{
		if($UserID)
		{
			if($this->input->post())
			{
				$data = array(
					'projectstarttime'  => $this->input->post('forprojectstarttime'),
					'projectendtime'  => $this->input->post('forprojectendtime'),
					'projectname'  => $this->input->post('forprojectname'),
					'projectsize'  => $this->input->post('forprojectsize'),
					'taskeachperson'  => $this->input->post('fortaskeachperson'),
					'projectinfo'  => $this->input->post('forprojectinfo'),
					'userid' => $UserID,
					'resumeid' => $ResumeID,			
					);
					// print_r($data);
				$this->load->model('project_model');
				$result = $this->project_model->addproject($data);
				if($result)
				{	
					$data= array('status'=>"success");
					echo json_encode($data);
				}
			}
			else
			{
				$data= array('status'=>"fail");
				echo json_encode($data);
			}
		}
	}
}
public function addaward($ResumeID, $UserID)
{

	if($ResumeID)
	{
		if($UserID)
		{
			if($this->input->post())
			{
				$data = array(
					'awardstime'  => $this->input->post('forawardstime'),
					'awardsname'  => $this->input->post('forawardsname'),
					'Sponsor'  => $this->input->post('forSponsor'),
					'awardsinfo'  => $this->input->post('forawardsinfo'),
					'userid' => $UserID,
					'resumeid' => $ResumeID,			
					);
					// print_r($data);
				$this->load->model('award_model');
				$result = $this->award_model->addaward($data);
				if($result)
				{	
					$data= array('status'=>"success");
					echo json_encode($data);


				}
			}
			else
			{


				$data= array('status'=>"fail");
				echo json_encode($data);
			}
		}
	}
}
public function addetc($ResumeID, $UserID)
{

	if($ResumeID)
	{
		if($UserID)
		{
			if($this->input->post())
			{
				$data = array(
					'etctitle'  => $this->input->post('foretctitle'),
					'etcinfo'  => $this->input->post('foretcinfo'),

					'userid' => $UserID,
					'resumeid' => $ResumeID,			
					);
					// print_r($data);
				$this->load->model('etc_model');
				$result = $this->etc_model->addetc($data);
				if($result)
				{	
					$data= array('status'=>"success");
					echo json_encode($data);

				}
			}
			else
			{


				$data= array('status'=>"fail");
				echo json_encode($data);
			}
		}
	}
}
public function addattach($ResumeID, $UserID)
{

	if($ResumeID)
	{
		if($UserID)
		{
			if($this->input->post())
			{
				$data = array(
					'category'  => $this->input->post('forcategorys'),
					'rank'  => $this->input->post('forranks'),

					'userid' => $UserID,
					'resumeid' => $ResumeID,			
					);
					// print_r($data);
				$this->load->model('attach_model');
				$result = $this->attach_model->addattach($data);
				if($result)
				{	
					$data= array('status'=>"success");
					echo json_encode($data);


				}
			}
			else
			{
				$data= array('status'=>"fail");
				echo json_encode($data);
			}
		}
	}
}
public function deleteResume($resumeid=false)
{
	if($resumeid)
	{
		$result = $this->resume_model->deleteResume($resumeid);
		if($result)
		{
			$data = array(
				'status' => "success",

				);
			echo json_encode($data);
		}
		else
		{
			$data = array(
				'status' => "false",

				);
			echo json_encode($data);
		}
	}
	else
	{
		$data = array(
			'status' => "false",

			);
		echo json_encode($data);
	}
}
public function deleteByResumeID($resumeid=false,$flag=false)
{
	if($resumeid)
	{
			//echo $resumeid;
		$result = $this->resume_model->deleteByResumeID($resumeid);
		if($result)
		{
			if(!$flag)
			{
				echo '<script type="text/javascript">
				
				alert("成功删除简历!");
			</script>';
			redirect("iter/mysetting");
		}
		
		else
		{
			$data = array(
				'status' => "success",
				);
			echo json_encode($data);
		}

	}
	else
	{
		echo "fail to delete your resume";
	}
}
else
{
	echo "are you chuanyue le ?";
}
}	
public function update()
{	
	$data['title'] = '修改我的简历';
	$data['noNavbar'] = false;
	$data['normaluser'] = TRUE; 
	$iter = ($this->session->userdata('iter'));
	$UserName = $iter['name'];
	$data['resume_items'] = $this->resume_model->getResume($UserName);
	$this->load->view('templates/header',$data);
	$this->load->view('resume/index2',$data);
	$this->load->view('templates/footer',$data);
}
public function UpdateResume($flag=false)
{
	$this->load->helper('form');
	$this->load->library('form_validation');
	$data = array();
	$this->form_validation->set_rules('WorkType','WorkType','required');	
	$this->form_validation->set_rules('UserName','UserName','required');
	$this->form_validation->set_rules('Tel','Tel','required');	
	$this->form_validation->set_rules('School','School','required');	
	$this->form_validation->set_rules('Education','WorkType','required');	
	$this->form_validation->set_rules('Major','Major','required');		
	$this->form_validation->set_rules('Gender','Gender','required');	
	$this->form_validation->set_rules('Birth_of_Date','Birth_of_Date','required');	

	$this->form_validation->set_rules('Identity','Identity','required');	
	$this->form_validation->set_rules('PoliticyState','PoliticyState','required');	
	$this->form_validation->set_rules('Address','Address','required');	
	$this->form_validation->set_rules('Email','Email','required|valid_email');	
	$this->form_validation->set_rules('Blog','Blog','required');

	$this->form_validation->set_rules('EmergencyContacter','EmergencyContacter','required');	
	$this->form_validation->set_rules('EmergencyTel','EmergencyTel','required');
	if($flag==false)
	{

		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header',$data);
			$this->load->view('resume/index',$data);
			$this->load->view('templates/footer',$data);
		}
		else
		{
			$result = $this->resume_model->UpdateResume();
			if($result != "FALSE")
				$this->load->view('news/success');
			else
			{
				$this->load->view('templates/header',$data);
				$this->load->view('resume/index',$data);
				$this->load->view('templates/footer',$data);
			}
		}
	}
	else
	{
		if($this->form_validation->run() === FALSE)
		{
			$data = array(
				'status' => "false",

				);
			echo json_encode($data);
		}
		else
		{
			$result = $this->resume_model->UpdateResume();
			if($result != "FALSE")
			{
				$data = array(
					'status' => "success",

					);
				echo json_encode($data);
			}
			else
			{
				$data = array(
					'status' => "false",

					);
				echo json_encode($data);
			}
		}
	}
}

public function regist($value='')
{
	$data['title'] = '注册'; 
	$this->load->helper('form');
	$submitted  = $this->input->post('submitted');
	if ($submitted) {
		$name      = $this->input->post('name');
		$password   = $this->input->post('password');
		$email  = $this->input->post('email');
		$tel = $this->input->post('tel');
		$regist  = $this->iter_model->regist($name, $password, $email,$tel);
		if($regist)
		{
			$data['noNavbar'] = TRUE;
			$data['success'] = TRUE;
			$this->load->view('templates/header',$data);
			$this->load->view('iter/success',$data);
			$this->load->view('templates/footer',$data);
	            	//redirect("/iter/login");
		}
		else
		{
			$data['noNavbar'] = TRUE;
			$data['error'] = TRUE;
			$this->load->view('templates/header',$data);
			$this->load->view('iter/regist',$data);
			$this->load->view('templates/footer',$data);
		}
	}
	else
	{
		$data['noNavbar'] = TRUE;
		$data['error'] = false;
		$this->load->view('templates/header',$data);
		$this->load->view('iter/regist',$data);
		$this->load->view('templates/footer',$data);
	}
}
function upload() {
	$config['upload_path'] = './uploads/';
	$config['allowed_types'] = 'gif|jpg|png';
	$config['max_size'] = '1000000';
	$config['max_width']  = '102400';
	$config['max_height']  = '76800';

	$this->load->library('upload', $config);

	if ( ! $this->upload->do_upload())
	{
		$error = array('error' => $this->upload->display_errors());

		$this->load->view('resume/index', $error);
	} 
	else
	{
		$data = array('upload_data' => $this->upload->data());

		$this->load->view('news/success', $data);
	}
}
function updatepicture($resumeid) 
{
      		 /* $config['upload_path'] = './uploads/';
			  $config['allowed_types'] = 'txt|gif|jpg|png';
			  $config['max_size'] = '1000000';
			  $config['max_width']  = '102400';
			  $config['max_height']  = '76800';
			  echo $resumeid;
			  $this->load->library('upload', $config);
			  if ( ! $this->upload->do_upload())
			  {
			   $error = array('error' => $this->upload->display_errors());
			   $this->load->view('upload/error', $error);
			  } 
			  else
			  {
			   $data = array('upload_data' => $this->upload->data());
			   $data['pictureid'] = 
			   $this->load->view('upload_success', $data);
			}*/
			  if (!empty($_POST['sub'])) { //当提交的时候
            // var_dump($_FILES['upfile']); 可以打印看看上传文件的信息
            $f = $_FILES['userpicture']; //把文件信息赋给一个变量，方便调用
            if ($f['size'] > 102400000) { //限制文件大小
            	echo "too large";
            } else {
                if ($f['type'] == 'image/png') { //限制文件类型为png

                	$s = $resumeid.'.png';
                	move_uploaded_file($f['tmp_name'], './uploads/usertx/'.$s);
                    //$f['tmp_name']是上传好的文件从缓存文件，'/uploads/$t$s'是我们要移动到的文件夹，在根目录下自己创建的uploads文件夹。'./uploads/'.$t.$s 是变量的值进行字符串拼接，把文件以时间戳命名

                	echo '<script type="text/javascript">
                	location.replace(document.referrer);
                	alert("成功上传照片!");
                </script>';
            }
        }
    }
}
function updateattach($resumeid) 
{
	if (!empty($_POST['subb'])) 
			  { //当提交的时候
				// var_dump($_FILES['upfile']); 可以打印看看上传文件的信息
				$f = $_FILES['userattach']; //把文件信息赋给一个变量，方便调用
				if ($f['size'] > 102400) 
					{ //限制文件大小
						echo "your file is too large";
					} 
					else 
					{
						if ($f['type'] == 'application/msword'||$f['type'] =='application/pdf' ||$f['type'] == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document')
						{ //限制文件类型为png
							$usersid = $this->resume_model->getuseridbyresumeid($resumeid);
							$userid = $usersid[0]['UserID'];
							$this->load->model('attach_model');
							$tempname= $f['name'];
							$name = iconv('utf-8','gb2312',$f['name']); //利用Iconv函数对文件名进行重新编码
							$data = array(
								'resumeid' => $resumeid,
								'userid' => $userid,
								'attachtitle' =>$tempname,
								'attachinfo' => date("Y-m-d H:i:m"),
								);
							print_r($data);
							$result = $this->attach_model->addattach($data);
							
							if($result)
							{	
								$attid = $this->attach_model->getlastattachByid($resumeid);
								$attachid = $attid[0]['id'];
								$s = $attachid."_".$f['name'];
								move_uploaded_file($f['tmp_name'],iconv("utf-8","gb2312",'./uploads/userattach/'.$s));
								//$f['tmp_name']是上传好的文件从缓存文件，'/uploads/$t$s'是我们要移动到的文件夹，在根目录下自己创建的uploads文件夹。'./uploads/'.$t.$s 是变量的值进行字符串拼接，把文件以时间戳命名
								echo "<h2>successly upload your attach , please reflesh !!!</h2>";
							}
						}
						else 
						{
							echo "file type invaild";
						}
					}
				}
				else
				{
					echo "are you chuanyue le ?";
				}
			}
			function getlastlangid($ResumeID)
			{
				if($ResumeID)
				{
					$this->load->model("lang_model");
					$lastlangid = $this->lang_model->getlastLangByid($ResumeID);
					$data = array(
						'status' => "success",
						'lastlangid' => $lastlangid,
						);
					echo json_encode($data);
				}
				else
				{
					$data=array('status'=>"fail");
					echo json_encode($data);
				}
			}
			function getlastschoolworkid($ResumeID)
			{
				if($ResumeID)
				{
					$this->load->model("schoolwork_model");
					$lastschoolworkid = $this->lang_model->getlastschoolworkByid($ResumeID);
					$data = array(
						'status' => "success",
						'lastschoolworkid' => $lastschoolworkid,
						);
					echo json_encode($data);
				}
				else
				{
					$data=array('status'=>"fail");
					echo json_encode($data);
				}
			}
			function getlastsocialid($ResumeID)
			{
				if($ResumeID)
				{
					$this->load->model("social_model");
					$lastsocialid = $this->social_model->getlastsocialByid($ResumeID);
					$data = array(
						'status' => "success",
						'lastsocialid' => $lastsocialid,
						);
					echo json_encode($data);
				}
				else
				{
					$data=array('status'=>"fail");
					echo json_encode($data);
				}
			}
			function getlastprojectid($ResumeID)
			{
				if($ResumeID)
				{
					$this->load->model("project_model");
					$lastprojectid = $this->project_model->getlastprojectByid($ResumeID);
					$data = array(
						'status' => "success",
						'lastprojectid' => $lastprojectid,
						);
					echo json_encode($data);
				}
				else
				{
					$data=array('status'=>"fail");
					echo json_encode($data);
				}
			}
			function getlastawardid($ResumeID)
			{
				if($ResumeID)
				{
					$this->load->model("award_model");
					$lastawardid = $this->award_model->getlastawardByid($ResumeID);
					$data = array(
						'status' => "success",
						'lastawardid' => $lastawardid,
						);
					echo json_encode($data);
				}
				else
				{
					$data=array('status'=>"fail");
					echo json_encode($data);
				}
			}
			function getlastetcid($ResumeID)
			{
				if($ResumeID)
				{
					$this->load->model("etc_model");
					$lastetcid = $this->etc_model->getlastetcByid($ResumeID);
					$data = array(
						'status' => "success",
						'lastetcid' => $lastetcid,
						);
					echo json_encode($data);
				}
				else
				{
					$data=array('status'=>"fail");
					echo json_encode($data);
				}
			}
			function getlastattachid($ResumeID)
			{
				if($ResumeID)
				{
					$this->load->model("attach_model");
					$lastattachid = $this->attach_model->getlastattachByid($ResumeID);
					$data = array(
						'status' => "success",
						'lastattachid' => $lastattachid,
						);
					echo json_encode($data);
				}
				else
				{
					$data=array('status'=>"fail");
					echo json_encode($data);
				}
			}
			function deletelangbyid($id)
			{
				$this->load->model("lang_model");
				$result = $this->lang_model->deleteLangByid($id);
				if($result)
				{
					echo '<script type="text/javascript">
					
					location.replace(document.referrer);
				</script>
				';
			}
			else
			{
				echo '<script type="text/javascript">
				history.go(-1);
				document.execCommand("refresh");
				alert("删除语言信息失败!");
			</script>
			';
		}
	}
	function deleteschoolworkbyid($id)
	{
		$this->load->model("schoolwork_model");
		$result = $this->schoolwork_model->deleteschoolworkByid($id);
		if($result)
		{
			echo '<script type="text/javascript">
			
			location.replace(document.referrer);
		</script>
		';
	}
	else
	{
		echo "failed";
	}
}
function deletesocialbyid($id)
{
	$this->load->model("social_model");
	$result = $this->social_model->deletesocialByid($id);
	if($result)
	{
		echo '<script type="text/javascript">
		
		location.replace(document.referrer);
	</script>
	';
}
else
{
	echo "failed";
}
}
function deleteprojectbyid($id)
{
	$this->load->model("project_model");
	$result = $this->project_model->deleteprojectByid($id);
	if($result)
	{
		echo '<script type="text/javascript">
		
		location.replace(document.referrer);
	</script>
	';
}
else
{
	echo "failed";
}
}
function deleteawardbyid($id)
{
	$this->load->model("award_model");
	$result = $this->award_model->deleteawardByid($id);
	if($result)
	{
		echo '<script type="text/javascript">
		
		location.replace(document.referrer);
	</script>
	';
}
else
{
	echo "failed";
}
}
function deleteetcbyid($id)
{
	$this->load->model("etc_model");
	$result = $this->etc_model->deleteetcByid($id);
	if($result)
	{
		echo '<script type="text/javascript">
		
		location.replace(document.referrer);
	</script>
	';
}
else
{
	echo "failed";
}
}
function deleteattachbyid($id)
{
	$this->load->model("attach_model");
	$result = $this->attach_model->deleteattachByid($id);
	if($result)
	{
		echo '<script type="text/javascript">
		
		location.replace(document.referrer);
	</script>
	';
}
else
{
	echo "failed";
}
}

}
?>
