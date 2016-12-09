<?php
	/**
	* The model for Moments
	*/
	class Moments_model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('iter_model');
		}
		public function pushTopic($UserName,$title,$content)
		{
			$UserID = $this->iter_model->getUserID($UserName);
			$data = array(
			    'UserID'=>$UserID,
			    'UserName'=>$UserName,
			    'TopicTitle'=>$title,
			    'TopicContent'=>$content,
			    'Time'=>date("Y-m-d h:i:s"),
			);
		    return $this->db->insert('topic', $data); 
		}
		public function getTopic()
		{
			$this->db->order_by('TopicID','desc');
			$query = $this->db->get('topic');
			if($query->num_rows()>0)
				return $query->result_array();
			else
				return false;
		
		}
		public function getTopicSimple($ajax=false)
		{
			$this->db->select('TopicID,UserName,TopicTitle,Time,ReplyNum');
			$query = $this->db->get('topic');
			if($query->num_rows()>0)
				return $query->result_array();
			else
				return false;
		}
		public function getTopicByID($TopicID)
		{
			$query = $this->db->get_where('topic', array('TopicID' => $TopicID), 1);
			return $query->row_array();
		}
		public function getReplyNum($TopicID)
		{
			$query = $this->db->get_where('topic', array('TopicID' => $TopicID), 1);
			return $query->row()->ReplyNum;
		}
		public function reply($topicid,$UserName,$content)
		{
			$UserID = $this->iter_model->getUserID($UserName);
			$LZ = $this->getTopicByID($topicid);

			$data = array(
				'TopicID' => $topicid, 
				'TopicTitle'=>$LZ['TopicTitle'],
				'TopicLZ' => $LZ['UserName'],
				'UserID' => $UserID,
				'UserName' => $UserName,
				'ReplyContent' => $content,
				'ReplyTime' => date("Y-m-d h:i:s"),
				'ReadOrNot' => 0,
			);
			//print_r($data);
			
            $num = $this->getReplyNum($topicid);
            $num = $num + 1;
            //echo $num;
			$this->db->where('TopicID', $topicid);
			$this->db->update('topic', array('ReplyNum' => $num));
			
			return $this->db->insert('reply', $data); 
		}
		public function getReply($TopicID)
		{
			$query = $this->db->get_where('reply',array('TopicID' => $TopicID));
			if($query->num_rows()>0)
				return $query->result_array();
			else
				return false;
		}
		public function deleteReply($id)
		{
			$result = $this->db->delete('reply', array('ReplayID' => $id)); 
        	return $result;
		}
		public function updateReply($id)
		{
			$data = array(
               'ReadOrNot' => 1
            );

			$this->db->where('ReplayID', $id);
			$result = $this->db->update('reply', $data); 

        	return $result;
		}
		public function getUnreadReply($UserName)
		{
			$query = $this->db->get_where('reply',array('TopicLZ' => $UserName,'ReadOrNot' => 0));
			if($query->num_rows()>0)
				return $query->result_array();
			else
				return false;
		}
	}
?>
