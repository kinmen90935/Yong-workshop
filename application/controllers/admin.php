<?php
class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
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
		echo json_encode(array('rtn' => true));
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
			$data['editNews'] = $this->admin_model->edit_admin_news($news_title, $content, $post_date, $n_id);
			if($data['editNews'])
			{
				echo json_encode(array('status' => true, 'msg' => '已新增資料!'));
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
        $this->db->delete('news', array('n_id' => $_POST['delid']));//資料庫，因為只有一行。。。
		echo json_encode(array('status' => true, 'msg' => '刪除成功'));
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