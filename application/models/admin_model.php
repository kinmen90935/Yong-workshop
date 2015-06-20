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

		public function delete_admin_news($n_id)
		{
			$this->db->delete('news', array('n_id' => $n_id));
			return true;
		}

		public function create_admin_sign($sign_title,$content,$active_date,$sign_start,$sign_end,$sign_chk_group)
		{
			$bool_sex = 0;
			$bool_email = 0;
			$bool_birthday = 0;
			$bool_identity = 0;
			$bool_phone = 0;	
			$bool_food = 0;	
			foreach ($sign_chk_group as $key => $value) 
			{
				if(isset($sign_chk_group[$key]))
				{
					if($sign_chk_group[$key]=='bool_sex')
					{
						$bool_sex = 1;
					}
					if($sign_chk_group[$key]=='bool_email')
					{
						$bool_email = 1;
					}
					if($sign_chk_group[$key]=='bool_birthday')
					{
						$bool_birthday = 1;
					}
					if($sign_chk_group[$key]=='bool_identity')
					{
						$bool_identity = 1;
					}
					if($sign_chk_group[$key]=='bool_phone')
					{
						$bool_phone = 1;
					}
					if($sign_chk_group[$key]=='bool_food')
					{
						$bool_food = 1;
					}
				}
			}
			$insertArray = array(		
				'title' => $sign_title,
				'content' => $content,
				'begin_at' => $active_date,
				'start_date' => $sign_start,
				'end_date' => $sign_end,
				'bool_sex' => $bool_sex,
				'bool_email' => $bool_email,
				'bool_birthday' => $bool_birthday,
				'bool_identity' => $bool_identity,
				'bool_phone' => $bool_phone,	
				'bool_food' => $bool_food
			);
			foreach ($insertArray as $key => $insertData) :
				if (!$insertData) {
					unset($insertArray[$key]);
				}
			endforeach;
			$this->db->insert("signup", $insertArray);
			return true;
		}

		public function get_signup()
		{
			$this->db->select("s_id,title,begin_at,start_date,end_date,count");
			$this->db->order_by("s_id", "desc");
			$query = $this->db->get('signup');
			return $query->result_array();
		}

		public function get_signup_complete($slug)
		{
			$query = $this->db->get_where('signup', array('s_id' => $slug));
			return $query->row_array();
		}

		public function edit_admin_signup($title, $content, $begin_at, $s_id, $start_date, $end_date, $sign_chk_group)
		{
			$bool_sex = 0;
			$bool_email = 0;
			$bool_birthday = 0;
			$bool_identity = 0;
			$bool_phone = 0;	
			$bool_food = 0;	
			foreach ($sign_chk_group as $key => $value) 
			{
				if(isset($sign_chk_group[$key]))
				{
					if($sign_chk_group[$key]=='bool_sex')
					{
						$bool_sex = 1;
					}
					if($sign_chk_group[$key]=='bool_email')
					{
						$bool_email = 1;
					}
					if($sign_chk_group[$key]=='bool_birthday')
					{
						$bool_birthday = 1;
					}
					if($sign_chk_group[$key]=='bool_identity')
					{
						$bool_identity = 1;
					}
					if($sign_chk_group[$key]=='bool_phone')
					{
						$bool_phone = 1;
					}
					if($sign_chk_group[$key]=='bool_food')
					{
						$bool_food = 1;
					}
				}
			}
			$updateArray = array(
	                'title' => $title,
	                'content' => $content,
	                'begin_at' => $begin_at,
	                'start_date' => $start_date,
	                'end_date' => $end_date,
	                'bool_sex' => $bool_sex,
					'bool_email' => $bool_email,
					'bool_birthday' => $bool_birthday,
					'bool_identity' => $bool_identity,
					'bool_phone' => $bool_phone,	
					'bool_food' => $bool_food
	            );
			$this->db->where('s_id', $s_id);
			$this->db->update("signup", $updateArray);
			return true;
		}

		public function delete_admin_signup($s_id)
		{
			$this->db->delete('signup', array('s_id' => $s_id));
			return true;
		}
	}
?>