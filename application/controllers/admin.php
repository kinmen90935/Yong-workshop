<?php
class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		date_default_timezone_set('Asia/Taipei');
		$this->load->helper(array('form'));
	}

	public function index()
	{
		$this->admin_home();
	}

	public function login()
	{
		$data['title'] = '後台管理';
	    $this->load->view('admin/login', $data);
	}

	public function ajax_login()
	{	
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if($username=="")
		{
			echo json_encode(array('status' => false, 'msg' => '請輸入帳號!'));
		} 
		else if ($password=="") 
		{
			echo json_encode(array('status' => false, 'msg' => '請輸入密碼!'));
		}
		else 
		{	
			$data['adminDetail'] = $this->admin_model->select_admin_login($username,$password);
			if($data['adminDetail'])
			{
				echo json_encode(array('status' => true, 'msg' => '登入成功!'));
			}
			else
			{
				echo json_encode(array('status' => false, 'msg' => '帳號或密碼錯誤!'));		
			}
			
		}
	}
	public function admin_home()
	{
		if (!$this->session->userdata('m_id')) 
		{
            header("location:".base_url()."admin/login");
        }
        $data['m_id'] = $this->session->userdata('m_id');
        $data['username'] = $this->session->userdata('username');
        $data['c_id'] = $this->session->userdata('c_id');
        $data['nickname'] = $this->session->userdata('nickname');
		$this->load->view('admin/admin_home',$data);
	}
	public function ajax_admin_news()
	{	
		$news_title = $this->input->post('news_title');
		$content = $this->input->post('content');
		$post_date = $this->input->post('post_date');

		$config['upload_path'] = base_url().'assets/files';
		$config['allowed_types'] = 'gif|jpg|png|doc|docx|pdf|xls';
		$config['overwrite']	= FALSE;
		$config['max_size']	= '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';
		$config['max_filename']  = '0';

		$this->load->library('upload',$config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
		}

		if($news_title=="")
		{
			echo json_encode(array('status' => false, 'msg' => '請輸入標題!'));
		} 
		else 
		{	
			$data['createNews'] = $this->admin_model->create_admin_news($news_title,$content,$post_date);
			if($data['createNews'])
			{
				echo json_encode(array('status' => true, 'msg' => '已新增資料!'));
			}
			else
			{
				echo json_encode(array('status' => false, 'msg' => '無法新增!'));		
			}
		}
	}
	public function edit_news()
	{
		if (!$this->session->userdata('m_id')) 
		{
            header("location:".base_url()."admin/login");
        }
        $data['m_id'] = $this->session->userdata('m_id');
        $data['username'] = $this->session->userdata('username');
        $data['c_id'] = $this->session->userdata('c_id');
        $data['nickname'] = $this->session->userdata('nickname');

        $data['title'] = '最新消息';
		$this->load->view('admin/edit_news',$data);
	}
	public function ajax_edit_news()
	{
		if (!$this->session->userdata('m_id')) 
		{
            header("location:".base_url()."admin/login");
        }
        $page = $this->input->post('page');

		$data['news'] = $this->admin_model->get_news($page);
		$data['news_number'] = $this->admin_model->get_news_number();
		$data['page'] = $page;
		
		$news = $this->load->view('admin/edit_news_list',$data,true);
		$pages = $this->load->view('admin/edit_news_pg',$data,true);

		echo json_encode(array('status' => true, 'news' => $news, 'page' => $pages));
	}
	public function edit_news_complete($slug)
	{
		if (!$this->session->userdata('m_id')) 
		{
            header("location:".base_url()."admin/login");
        }
        $data['m_id'] = $this->session->userdata('m_id');
        $data['username'] = $this->session->userdata('username');
        $data['c_id'] = $this->session->userdata('c_id');
        $data['nickname'] = $this->session->userdata('nickname');

		$data['news_complete'] = $this->admin_model->get_news_complete($slug);	
		$this->load->view('admin/edit_news_complete', $data);
		//echo json_encode(array('rtn' => true));
	}
	public function ajax_edit_news_complete()
	{	
		$news_title = $this->input->post('news_title');
		$content = $this->input->post('content');
		$post_date = $this->input->post('post_date');
		$post_date = strtotime($post_date);
		$n_id = $this->input->post('n_id');

		if($news_title=="")
		{
			echo json_encode(array('status' => false, 'msg' => '請輸入標題!'));
		} 
		else if($post_date=="")
		{
			echo json_encode(array('status' => false, 'msg' => '請輸入日期!'));
		} 
		else 
		{	
			if($this->admin_model->edit_admin_news($news_title, $content, $post_date, $n_id))
			{
				echo json_encode(array('status' => true, 'msg' => '已更新資料!'));
			}
			else
			{
				echo json_encode(array('status' => false, 'msg' => '無此資料'));		
			}
		}
	}

	public function ajax_news_delete()
	{
		if (!$this->session->userdata('m_id')) 
		{
            header("location:".base_url()."admin/login");
        }
        $n_id = $this->input->post('delid');
        $this->admin_model->delete_admin_news($n_id);
		echo json_encode(array('status' => true, 'msg' => '刪除成功'));
	}

	public function add_signup()
	{
		if (!$this->session->userdata('m_id')) 
		{
            header("location:".base_url()."admin/login");
        }
        $data['m_id'] = $this->session->userdata('m_id');
        $data['username'] = $this->session->userdata('username');
        $data['c_id'] = $this->session->userdata('c_id');
        $data['nickname'] = $this->session->userdata('nickname');
        $data['title'] = '報名資訊新增';

		$this->load->view('admin/add_signup', $data);
	}

	public function ajax_add_signup()
	{
        $sign_title = $this->input->post('sign_title');
		$content = $this->input->post('content');

		$active_date = $this->input->post('active_date');
		$active_date = strtotime($active_date);

		$sign_start = $this->input->post('sign_start');
		$sign_start = strtotime($sign_start);

		$sign_end = $this->input->post('sign_end');
		$sign_end = strtotime($sign_end);

		$sign_chk_group = $this->input->post('sign_chk_group');

		

		if($sign_title=="")
		{
			echo json_encode(array('status' => FALSE, 'msg' => '請輸入標題!'));
		} 
		else if($content=="")
		{
			echo json_encode(array('status' => FALSE, 'msg' => '請輸入內容!'));
		} 
		else if($active_date=="")
		{
			echo json_encode(array('status' => FALSE, 'msg' => '請輸入活動開始日期!'));
		} 
		else if($sign_start=="")
		{
			echo json_encode(array('status' => FALSE, 'msg' => '請輸入報名開始日期'));
		} 
		else if($sign_end=="")
		{
			echo json_encode(array('status' => FALSE, 'msg' => '請輸入報名截止日期!'));
		} 
		else 
		{	
			$data['createSign'] = $this->admin_model->create_admin_sign($sign_title,$content,$active_date,$sign_start,$sign_end,$sign_chk_group);
			if($data['createSign'])
			{
				echo json_encode(array('status' => TRUE, 'msg' => '已新增資料!'));
			}
			else
			{
				echo json_encode(array('status' => FALSE, 'msg' => '無法新增!'));		
			}
		}
	}

	public function edit_signup()
	{
		if (!$this->session->userdata('m_id')) 
		{
            header("location:".base_url()."admin/login");
        }
        $data['m_id'] = $this->session->userdata('m_id');
        $data['username'] = $this->session->userdata('username');
        $data['c_id'] = $this->session->userdata('c_id');
        $data['nickname'] = $this->session->userdata('nickname');
        $data['title'] = '報名資訊更新';

        $data['signup'] = $this->admin_model->get_signup();
		$this->load->view('admin/edit_signup', $data);
	}

	public function edit_signup_complete($slug)
	{
		if (!$this->session->userdata('m_id')) 
		{
            header("location:".base_url()."admin/login");
        }
        $data['m_id'] = $this->session->userdata('m_id');
        $data['username'] = $this->session->userdata('username');
        $data['c_id'] = $this->session->userdata('c_id');
        $data['nickname'] = $this->session->userdata('nickname');

		$data['signup_complete'] = $this->admin_model->get_signup_complete($slug);	
		$this->load->view('admin/edit_signup_complete', $data);
		//echo json_encode(array('rtn' => true));
	}

	public function ajax_edit_signup_complete()
	{	
		$title = $this->input->post('title');
		$content = $this->input->post('content');

		$begin_at = $this->input->post('begin_at');
		$begin_at = strtotime($begin_at);

		$s_id = $this->input->post('s_id');

		$start_date = $this->input->post('start_date');
		$start_date = strtotime($start_date);

		$end_date = $this->input->post('end_date');
		$end_date = strtotime($end_date);

		$sign_chk_group = $this->input->post('sign_chk_group');

		if($title=="")
		{
			echo json_encode(array('status' => false, 'msg' => '請輸入標題!'));
		} 
		else if($begin_at=="")
		{
			echo json_encode(array('status' => false, 'msg' => '請輸入活動開始日期!'));
		}
		else if($start_date=="")
		{
			echo json_encode(array('status' => false, 'msg' => '請輸入報名開始日期!'));
		} 
		else if($end_date=="")
		{
			echo json_encode(array('status' => false, 'msg' => '請輸入報名截止日期!'));
		} 
		else if($content=="")
		{
			echo json_encode(array('status' => false, 'msg' => '請輸入內容!'));
		}  
		else 
		{	
			$data['edit_Signup'] = $this->admin_model->edit_admin_signup($title, $content, $begin_at, $s_id, $start_date, $end_date, $sign_chk_group);
			if($data['edit_Signup'])
			{
				echo json_encode(array('status' => true, 'msg' => '已更新資料!'));
			}
			else
			{
				echo json_encode(array('status' => false, 'msg' => '無此資料'));		
			}
		}
	}

	public function ajax_signup_delete()
	{
		if (!$this->session->userdata('m_id')) 
		{
            header("location:".base_url()."admin/login");
        }
        $s_id = $this->input->post('delid');
        $this->admin_model->delete_admin_signup($s_id);
        //$this->db->delete('signup', array('s_id' => $_POST['delid']));//資料庫，因為只有一行。。。
		echo json_encode(array('status' => true, 'msg' => '刪除成功'));
	}

	public function add_achieve()
	{
		if (!$this->session->userdata('m_id')) 
		{
            header("location:".base_url()."admin/login");
        }
        $data['m_id'] = $this->session->userdata('m_id');
        $data['username'] = $this->session->userdata('username');
        $data['c_id'] = $this->session->userdata('c_id');
        $data['nickname'] = $this->session->userdata('nickname');
        $data['title'] = '報名資訊新增';

		$this->load->view('admin/add_achieve', $data);
	}

	public function unset_session()
	{
		$this->session->unset_userdata('m_id');
		if (!$this->session->userdata('m_id')) 
		{
            header("location:".base_url()."admin/login");
        }
	}
}