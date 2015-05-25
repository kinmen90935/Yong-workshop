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
			$data['adminDetail'] = $this->admin_model->select_admin($username,$password);
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
	public function unset_session()
	{
		$this->session->unset_userdata('m_id');
		if (!$this->session->userdata('m_id')) 
		{
            header("location:".base_url()."admin/login");
        }
	}
}