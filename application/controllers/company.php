<?php
class Company extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('company_model');
    $this->load->model('career_model');
    $this->load->library('session');
    $this->load->helper('url');   
  }
  
  public function index()
  {
    $data['type'] = 1;
    $data['title'] = 'Company';
    $company = $this->session->userdata('company');
    if ( isset($company['name'])) {
      $result = $this->company_model->getCompanyInfo($company['name']);
      $id = $result['CompanyID'];
      $query = $this->career_model->getCareerInfoByCompanyID($id);
      $data['career'] = $query;
        //print_r($query);
        //echo $result['CompanyID'];
      $data['company'] = TRUE;
      $this->load->view('templates/companyheader',$data);
      $this->load->view('company/index',$data);
      $this->load->view('templates/footer2',$data);
    }
    else {
      redirect("/company/login");
    }

  }
  public function MeetingList($id=false)
  {
   $data['type'] = 3;
   $company = $this->session->userdata('company');
   if (isset($company['name'])) {
    $result = $this->company_model->getMeeting($company['id']);
    if ($result) {
      $data['meeting'] = $result;
      $data['title'] = '宣讲会';
      $data['company'] = TRUE;
      $this->load->view('templates/companyheader',$data);
      $this->load->view('company/meetinglist',$data);
      $this->load->view('templates/footer2',$data);
    }
    else
    {
      $data['title'] = '宣讲会';
      $data['company'] = TRUE;
      $data['meeting'] = false;
      $this->load->view('templates/companyheader',$data);
      $this->load->view('company/meetinglist',$data);
      $this->load->view('templates/footer2',$data);
    }
  }
  else
  {
    $data['title'] = '宣讲会';
    $data['company'] = false;
    $this->load->view('templates/companyheader',$data);
    $this->load->view('company/error',$data);
    $this->load->view('templates/footer2',$data);
  }

}
public function resetpwd($UserName)
{
  $data['title'] = '更改密码';
  if($UserName)
  {
    $data['userid'] = $this->company_model->getUserID($UserName);
    $data['company'] = true;
   // print_r($data['userid']);
    $this->load->view('templates/companyheader',$data);
    $this->load->view('company/changepw',$data);
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
public function meetingDetial($id)
{

  $meeting = $this->company_model->getMeetingByID($id);

  $data['title'] = $meeting['MeetingName'];
        //echo $data['title'];
  $data['meeting'] = $meeting;
  $iter = $this->session->userdata('iter');
  if (isset($iter['name'])) {
    $data['normaluser'] = TRUE;
  }else{
    $data['normaluser'] = false;
  }
  $this->load->view('templates/companyheader',$data);
  $this->load->view('company/meeting-msg',$data);
  $this->load->view('templates/footer2',$data);
}
public function deleteMeeting($id)
{
  if($id) 
  {
    $result = $this->company_model->deleteMeeting($id);
    if($result) {
      echo "<script> alert('删除成功');</script>";
      redirect("/company/MeetingList");
    }
    else {
      echo "<script> alert('删除失败');</script>";
      redirect("/company/MeetingList");
    }
  }
  else{
    echo "Access Forbidden!";
  }
}
public function getspecific($id=false)
{
  if($id)
  {
        //1:$this->jobMsg();
        //2:获得未处理的简历,这个应该是我要做的部分
        //3:整合到一个页面汇总
    $result= $this->career_model->getCareerInfoByID($id);
    $company = $this->session->userdata('company');
    $data['job'] = $result;
    $data['title'] = "找工作";
    $this->load->model("resumestatus_model");
    $data['resumestatus_item'] = $this->resumestatus_model->getresumestatus_item_by_CareerID($id); 
        //print_r($data['resumestatus_item']);
    if (isset($company['name'])) {
      $data['company'] = TRUE;
    }else{$data['company'] = false;}
    $this->load->view('templates/companyheader',$data);
    $this->load->view('company/companyjobmsg',$data);
    $this->load->view('templates/footer2',$data);
  }
}
public function pushMeeting($value='')
{
  $data['title'] = '宣讲会'; 
  $data['type'] = 4;
  $this->load->helper('form');
  $company = $this->session->userdata('company');
  $submitted  = $this->input->post('submitted');
  if ($submitted)
  {
            //print_r($company);
    if (!isset($company['name'])) {
      $data['title'] = '首页';
      $data['company'] = false;
      $data['noNavbar'] = TRUE;
      $this->load->view('templates/companyheader',$data);
      $this->load->view('company/error',$data);
      $this->load->view('templates/footer2',$data);
    }
    else {
      $CompanyID = $company['id'];
      $CompanyName = $company['name'];
      $MeetingName  = $this->input->post('MeetingName');
      $MeetingContent   = $this->input->post('MeetingContent');
      $MeetingPlan   = $this->input->post('MeetingPlan');
      $Time  = date("Y-m-d h:i:s");
      $meeting = array(
        'CompanyID' => $CompanyID, 
        'CompanyName' => $CompanyName, 
        'MeetingName' => $MeetingName, 
        'MeetingContent' => nl2br($MeetingContent), 
        'MeetingPlan' => nl2br($MeetingPlan), 
        'Time' => $Time, 
        );
      $push = $this->company_model->pushMeeting($meeting);
      if ($push)
      {
        /**/
        $data['title'] = '宣讲会';
        $data['company'] = TRUE;
        $data['push'] = TRUE;
        $data['success'] = false;
        $this->load->view('templates/companyheader',$data);
        $this->load->view('company/success',$data);
        $this->load->view('templates/footer2',$data);
      }
      else
      {
        $data['title'] = '宣讲会';
        $data['company'] = TRUE;
        $this->load->view('templates/companyheader',$data);
        $this->load->view('company/pushMeeting',$data);
        $this->load->view('templates/footer2',$data);
      }
    }
  }
  else 
  {
    if($company['logged'])
    {
      $data['title'] = '发布宣讲会';
      $data['company'] = TRUE;
      $this->load->view('templates/companyheader',$data);
      $this->load->view('company/pushMeeting',$data);
      $this->load->view('templates/footer2',$data);
    }
    else
      redirect("/company/login");

  }

}
public function pushMeeting2($value='')
{
  $company = $this->session->userdata('company');
  
  if ($this->input->post())
  {
            //print_r($company);
    if (!isset($company['name'])) {
      $data = array(
        'status' => 'fail',
        );
      echo json_encode($data);
    }
    else {
      $CompanyID = $company['id'];
      $CompanyName = $company['name'];
      $MeetingName  = $this->input->post('MeetingName');
      $MeetingContent   = $this->input->post('MeetingContent');
      $MeetingPlan   = $this->input->post('MeetingPlan');
      $Time  = date("Y-m-d h:i:s");
      $meeting = array(
        'CompanyID' => $CompanyID, 
        'CompanyName' => $CompanyName, 
        'MeetingName' => $MeetingName, 
        'MeetingContent' => $MeetingContent, 
        'MeetingPlan' => $MeetingPlan, 
        'Time' => $Time, 
        );
      $push = $this->company_model->pushMeeting($meeting);
      if ($push)
      {
        $data = array(
          'status' => 'success',
          );
        echo json_encode($data);
      }
      else
      {
        $data = array(
          'status' => 'fail',
          );
        echo json_encode($data);
      }
    }
  }
  else 
  {
    $data = array(
      'status' => 'fail',
      );
    echo json_encode($data);

  }

}
public function deleteCareer($id='')
{
  if($id) 
  {
    $result = $this->company_model->deleteCareer($id);
    if($result) 
    {
     redirect("/company/index");
   }
   else {
    redirect("/company/index");
  }
}
else{
  echo "U do not have right!";
}
}
public function mysetting()
{

 $company = $this->session->userdata('company');

 if(isset($company['name']))
 {
  $UserName = $company['name'];
            //  echo $UserName;
            //这里的session有问题！！
  $data['company_id_and_release'] = $this->company_model->getCompany_id_and_release_By_Email($UserName);

  $companys = $data['company_id_and_release'];
             //print_r($companys);

            //如果没有招聘信息，可以新建一条招聘信息
  if(!$companys['HaveRelease'])
  {
    $data['title'] = '设置我的简历'; 
    $data['careerid_list'] = "false";
    $data['company'] = true;
    $this->load->view('templates/header',$data);
              //$this->load->view('mycomsetting/mysettingview',$data);
    $this->load->view('mycomsetting/firstmysetting',$data);
    $this->load->view('templates/footer',$data);
  }
  else
  {
    if($resumeid != false)
    {
    }
  }
}     
}
public function pushCareer($value='')
{
 $data['type'] = 2;
 $data['title'] = '发布职位'; 
 $this->load->helper('form');
 $company = $this->session->userdata('company');
 $submitted  = $this->input->post('submitted');
 if ($submitted)
 {
            //print_r($company);
  if (!isset($company['name'])) {
    $data['title'] = '首页';
    $data['company'] = false;
    $data['noNavbar'] = TRUE;
    $this->load->view('templates/companyheader',$data);
    $this->load->view('company/error',$data);
    $this->load->view('templates/footer2',$data);
  }
  else {
              //print_r($this->input->post());
    $CareerName  = $this->input->post('CareerName');
    $CareerType   = $this->input->post('CareerType');
    $RecruitingNumbers = $this->input->post('RecruitingNumbers');
    $StartTime   = $this->input->post('StartTime');
    $EndTime   = $this->input->post('EndTime');
    $PushTime  = date("Y-m-d h:i:s");
    $CompanyID = $company['id'];
    $CompanyName = $company['name'];
    $WorkPlace   = $this->input->post('fromCity');
    $CareerDescription =  $this->input->post('CareerDescription');
    $CareerRequire =  $this->input->post('CareerRequire');
    $Other =  $this->input->post('Other');
    $push = $this->company_model->pushCareer($RecruitingNumbers,$CareerName,$CareerType, $CompanyID,$CompanyName, $StartTime,$EndTime, $PushTime,$WorkPlace,nl2br($CareerDescription),nl2br($CareerRequire),nl2br($Other));
    if ($push)
    {

    }
    else
    {
      $data['title'] = 'Company';
      $data['company'] = false;
      $this->load->view('templates/companyheader',$data);
      $this->load->view('company/pushCareer',$data);
      $this->load->view('templates/footer2',$data);
    }
  }
}
else 
{
  if($company['logged'])
  {
    $data['title'] = 'Company';
    $data['company'] = TRUE;
    $this->load->view('templates/companyheader',$data);
    $this->load->view('company/pushCareer',$data);
    $this->load->view('templates/footer2',$data);
  }
  else
    redirect("/company/login");

}
}
public function pushCareer2()
{
  if($this->input->post())
  {

        //print_r($this->input->post());
    $this->load->helper('form');
    $company = $this->session->userdata('company');
    $CareerName  = $this->input->post('CareerName');
    $CareerType   = $this->input->post('CareerType');
    $RecruitingNumbers = $this->input->post('RecruitingNumbers');
    $StartTime   = $this->input->post('begin');
    $EndTime   = $this->input->post('end');
    $PushTime  = date("Y-m-d h:i:s");
    $CompanyID = $company['id'];
    $CompanyName = $company['name'];
    $WorkPlace   = $this->input->post('WorkPlace');
    $CareerDescription =  $this->input->post('CareerDescription');
    $CareerRequire =  $this->input->post('CareerRequire');
    $Other =  $this->input->post('Other');
    $push = $this->company_model->pushCareer($RecruitingNumbers,$CareerName,$CareerType, $CompanyID, $CompanyName,$StartTime,$EndTime, $PushTime,$WorkPlace,$CareerDescription,$CareerRequire,$Other);
    if ($push)
    {
      $data = array(
        'status' => 'success',
        );
      echo json_encode($data);
    }
    else
    {
      $data = array(
        'status' => 'fail',
        );
      echo json_encode($data);
    }
  }
  else
  {
    $data = array(
      'status' => 'fail',
      );
    echo json_encode($data);
  }
}
public function editcareer($id=false)
{
  if($id)
  {
    $data['title'] = '修改职位信息'; 
    $this->load->helper('form');
    $company = $this->session->userdata('company');
    $submitted  = $this->input->post('submitted');
    if ($submitted)
    {
              //print_r($company);
      if (!isset($company['name'])) {
        $data['title'] = '首页';
        $data['company'] = false;
        $data['noNavbar'] = TRUE;
        $this->load->view('templates/companyheader',$data);
        $this->load->view('company/error',$data);
        $this->load->view('templates/footer2',$data);
      }
      else 
      {
        $CompanyName = $company['id'];
        $CareerID              = $this->input->post('CareerID');
        $CareerName               = $this->input->post('CareerName');
        $CareerType                = $this->input->post('CareerType');
        $StartTime                = $this->input->post('begin');
        $RecruitingNumbers              = $this->input->post('RecruitingNumbers');
        $EndTime                = $this->input->post('end');
        $PushTime               = date("Y-m-d h:i:s");
        $CompanyID              = $company['id'];
        $WorkPlace                = $this->input->post('fromCity');
        $CareerDescription              =  $this->input->post('CareerDescription');
        $CareerRequire              =  $this->input->post('CareerRequire');
        $Other              =  $this->input->post('Other');
        $push              = $this->company_model->updatecareer($CompanyName,$CareerID,$RecruitingNumbers,$CareerName,$CareerType, $CompanyID, $StartTime,$EndTime, $PushTime,$WorkPlace,$CareerDescription,$CareerRequire,$Other);
        
        if ($push)
        {

          $data['title'] = '首页';
          $data['company'] = TRUE;
          $data['push'] = TRUE;
          $data['success'] = false;
          echo "<script> 
            function a()
            {
             window.location.href='http://chenbingjin.cn/iter/company/index'; 
            }
            setTimeout(a(), 6000);
          </script>"; 
        //  redirect('/company/index');
        }
        else
        {
          $data['title'] = 'Company';
          $data['company'] = false;
          $this->load->view('templates/companyheader',$data);
          $this->load->view('company/pushCareer',$data);
          $this->load->view('templates/footer2',$data);
        }
      }
    }
    else 
    {
      if($company['logged'])
      {
        $data['title'] = 'Company';
        $data['company'] = TRUE;
        $this->load->model('career_model');
        $data['careerinfo'] = $this->career_model->getCareerInfoByID($id);
        $this->load->view('templates/companyheader',$data);
        $this->load->view('company/editcareerview',$data);
        $this->load->view('templates/footer2',$data);
      }
      else
        redirect("/company/login");

    }
  }
  else
  {
    $this->index();
  }
}


public function login($ajax = false)
{
        //try autologin
        // $sso = $this->input->cookie('sso');
         // if($sso)
        //  {
         //     $this->company_model->autoLogin($sso);
        //  }

        //find out if they're already logged in, if they are redirect them
          //$isLogged   = $this->company_model->isLogged();
         // if ($isLogged)
         // {
         //     $this->session->set_flashdata('success', '您已经登录！');
         //     redirect('/company/index');
         // }
              $data['title'] = '登录'; 
              $this->load->helper('form');
              $submitted  = $this->input->post('submitted');
              if ($submitted)
              {
                $email      = $this->input->post('email');
                $password   = $this->input->post('password');
                $remember   = $this->input->post('remember');
                $login      = $this->company_model->login($email, $password, $remember);
                if ($login)
                {
                  $data['title'] = '首页';
                  $data['company'] = TRUE;
                  $company = $this->session->userdata('company');
                  $result = $this->company_model->getCompanyInfo($company['name']);
                  $id = $result['CompanyID'];
                  $query = $this->career_model->getCareerInfoByCompanyID($id);
                  $data['career'] = $query;
                  $this->load->view('templates/companyheader',$data);
                  $this->load->view('company/index',$data);
                  $this->load->view('templates/footer2',$data);
                }
                else
                {

                  $data['noNavbar'] = TRUE;
                  $data['title'] = 'login';
                  $data['error'] = TRUE;
                  $data['company'] = false;
                  $this->load->view('templates/companyheader',$data);
                  $this->load->view('company/login',$data);
                  $this->load->view('templates/footer2',$data);
                }
              }
              else 
              {
                $data['noNavbar'] = TRUE;
                $data['title'] = 'login';
                $data['error'] = false;
                $data['company'] = false;
                $this->load->view('templates/companyheader',$data);
                $this->load->view('company/login',$data);
                $this->load->view('templates/footer2',$data);
                
              }
            }
            public function logout()
            {
              $company = $this->session->userdata('company');
              $this->company_model->logout($company['name']);
              redirect('/company');
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
                $mobile  = $this->input->post('mobile');
                $tel = $this->input->post('tel');
                $address = $this->input->post('address');
                $description = $this->input->post('description');
                $regist  = $this->company_model->regist($name, $password, $email,$mobile,$tel,$address,$description);

                if($regist)
                {
                  $data['noNavbar'] = TRUE;
                  $data['success'] = TRUE;
                  $data['push'] = false;
                  $this->load->view('templates/companyheader',$data);
                  $this->load->view('company/success',$data);
                  $this->load->view('templates/footer2',$data);
                //redirect("/iter/login");
                }
                else
                {
                  $data['noNavbar'] = TRUE;
                  $data['error'] = TRUE;
                  $this->load->view('templates/companyheader',$data);
                  $this->load->view('company/regist',$data);
                  $this->load->view('templates/footer2',$data);
                }
              }
              else
              { 
                $data['noNavbar'] = TRUE;
                $data['error'] = false;

                $this->load->view('templates/companyheader',$data);
                $this->load->view('company/regist',$data);
                $this->load->view('templates/footer2',$data);
              }
            }
          }
          ?>
