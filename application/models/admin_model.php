<?php
	class Admin_model extends CI_Model {

		public function __construct()
		{
			//$this->load->database();
		}
		
		public function select_admin_login($username,$password)
		{
			$query = $this->db->get_where('members', array('username' => $username ,'password' => $password));
			if ($query->num_rows() > 0) 
			{
				$newdata = array(
	               'm_id' => $query->row()->m_id,
	               'username' => $query->row()->username,
	               'password' => $query->row()->password,
	               'c_id' => $query->row()->c_id,
	               'nickname' => $query->row()->nickname,
	           	);
				$this->session->set_userdata($newdata);
				return true;
			}
			else
			{
				return false;
			}
		}
		public function create_admin_news($news_title,$content)
		{
			$insertArray = array(		
				'title' => $this->input->post('news_title'),
				'content' => $this->input->post('content'),
				'post_date' => $this->input->post('post_date'),
			);
			foreach ($insertArray as $key => $insertData) :
				if (!$insertData) {
					unset($insertArray[$key]);
				}
			endforeach;
			$this->db->insert("news", $insertArray);
			return true;
		}
		public function get_news($page = 1)
		{
			
			$this->db->select("post_date,title,n_id");
			$this->db->order_by("n_id", "desc");
			$this->db->limit(10,10*($page-1));
			$query = $this->db->get('news');
			return $query->result_array();
		}

		public function get_news_number()
		{
			$news_number = 0;
			$query = $this->db->get('news');
			foreach($query->result_array() as $row) 
			{
				$news_number++;
			}
			$news_number = $news_number/10;
			return $news_number;
		}

		public function get_news_complete($slug)
		{
			$query = $this->db->get_where('news', array('n_id' => $slug));
			return $query->row_array();
		}

		public function edit_admin_news($news_title,$content,$post_date,$n_id)
		{
			$updateArray = array(
	               'title' => $news_title,
	               'content' => $content,
	               'post_date' => $post_date
	            );

			$this->db->where('n_id', $n_id);

			$this->db->update("news", $updateArray);
			return true;
		}
		public function create_admin_sign($sign_title,$content,$active_date,$sign_start,$sign_end)
		{
			$insertArray = array(		
				'title' => $sign_title,
				'content' => $content,
				'begin_at' => $active_date,
				'start_date' => $sign_start,
				'end_date' => $sign_end,
			);
			foreach ($insertArray as $key => $insertData) :
				if (!$insertData) {
					unset($insertArray[$key]);
				}
			endforeach;
			$this->db->insert("signup", $insertArray);
			return true;
		}
	}
?>