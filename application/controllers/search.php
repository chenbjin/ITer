<?php
	/**
	* Search controller
	*/
	class Search extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('search_model');
			$this->load->library('session');
			$this->load->helper('url');
		}
		public function index()
		{
			echo "Search !";
		}
		public function searchJob($ajax=false)
		{
			if ($this->input->post()) {
				$keyword = $this->input->post('keyword');
				$result = $this->search_model->searchJobByName($keyword);
				if($result) {
					if($ajax){
						echo json_encode($result);
					}else {
						$iter = $this->session->userdata('iter');	
			        	if (isset($iter['name'])) {  	
							$data['normaluser'] = TRUE;
						}
						else {
							$data['normaluser'] = false;
						}
						$data['result'] = $result;
						$data['keyword'] = $keyword;
						$data['title'] = "搜索结果";
						$this->load->view('templates/ontopheader',$data);
						$this->load->view('search/search',$data);
						$this->load->view('templates/footer2',$data);
					}
				}else {
					if($ajax){
						echo json_encode(array('status' => false));
					}else {
						$iter = $this->session->userdata('iter');	
			        	if (isset($iter['name'])) {  	
							$data['normaluser'] = TRUE;
						}
						else {
							$data['normaluser'] = false;
						}
						$data['nocareer'] = TRUE;
						$data['keyword'] = $keyword;
						$data['title'] = "搜索结果";
						$this->load->view('templates/ontopheader',$data);
						$this->load->view('search/nocareer',$data);
						$this->load->view('templates/footer2',$data);
					}
				}	
				
			}
			else {
				$data = array();
				$data['Attention']="这是测试用滴，一般人不能GET";
				$result = $this->search_model->searchJobByName('java');
				$data['Allcareer']=$result;
				echo json_encode($data);
			}
		}
	}
?>