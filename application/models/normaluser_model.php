<?php
	class Normaluser_model extends CI_Model 
	{
		public function __construct()
		{
		  parent::__construct();	
		  $this->load->database();
		}
		public function update_basic()
		{
			if($this->input->post())
			{
				$userid = $this->input->post('userid');
				$data = array(
						'tel' => $this->input->post('phone'),
						'gender' => $this->input->post('gender'),
						'birthofdate' => $this->input->post('born'),				
						'politicystate' => $this->input->post('politicystate'),
						'email' => $this->input->post('email'),
						'address' => $this->input->post('address'),
					 );
		
				$this->db->where('userid', $userid);
				return $this->db->update('normaluser', $data); 
			}
			else
			{
			    return false;
			}
		}
		
		
		public function update_edu()
		{
			if($this->input->post())
			{
				$userid = $this->input->post('userid');
				/*这个问题没问题了，因为是name="" 才能获得post方法的值*/
				$data = array(
							'eduin' => $this->input->post('edu-in'),
							'eduout' => $this->input->post('edu-out'),
							'school' => $this->input->post('university'),				
							'major' => $this->input->post('major'),
							'eduxueli' => $this->input->post('xueli'),
							'hasfullbasic' => '1',
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

