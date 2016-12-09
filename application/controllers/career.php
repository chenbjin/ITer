<?php
class Career extends CI_Controller
{ 
  function __construct()
  {
    parent::__construct();
    $this->load->library('Services_JSON');
    $this->load->model('career_model');
    $this->load->library('session');
  }
  public function index()
  {
    echo "Hello";
  }
  public function getCareerByType($type)
  {
    if($this->input->post()) {
      # code... echo json_encode(array('status'=>'error'));
    }
    else
    {
      
      if ($type > 3 || $type < 1) {
        echo json_encode(array('status'=>'errorrrrr'));
      }
      else {
        $this->load->model('career_model');
        $result = $this->career_model->getCareerInfoByType($type);
        echo json_encode($result);
      }
    }
    
  }
  
  public function getCareer($type)
  {
    if ($type > 3 || $type < 1) {
      echo "error";
    }
    else {
      $data['type'] = $type;
      $iter = $this->session->userdata('iter');
      $result = $this->career_model->getCareerInfoByType($type);
      $data = array();
      $data['fulltime'] = $result;
      if ($type == 1) {
        $data['title'] = "找工作";
      }elseif ($type == 2) {
        $data['title'] = "找实习";
      }else{
        $data['title'] = "找兼职";
      }
      
      if (isset($iter['name'])) {
        $data['normaluser'] = TRUE;
      }else{
        $data['normaluser'] = false;
      }
      $data['type'] = $type;
      $this->load->view('career/careerheader',$data);
      $this->load->view('career/fulltime',$data);
      $this->load->view('templates/footer2',$data);
    }
  }
  public function jobMsg($id)
  {
    $result= $this->career_model->getCareerInfoByID($id);
    $iter = $this->session->userdata('iter');
    $data['job'] = $result;
    $data['title'] = "找工作";
    if (isset($iter['name'])) {
      $data['normaluser'] = TRUE;
    }
    else{$data['normaluser'] = false;}
    $this->load->view('career/careerheader',$data);
    $this->load->view('career/jobmsg',$data);
    $this->load->view('templates/footer2',$data);
  }
}
?>