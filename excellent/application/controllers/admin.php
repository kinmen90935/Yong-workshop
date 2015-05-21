<?php
class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index()
	{
		$this->login();
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
		//echo "JI";
		//$data['adminDetail'] = $this->admin_model->select_admin($username);
		/*if($adminDetail==TRUE)
		{
			header("Location:".base_url());
		}
		if($adminDetail==FALSE)
		{
			header("Location:".base_url()."admin");
		}*/
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
			$data['adminDetail'] = $this->admin_model->select_admin($username);
			echo json_encode(array('status' => true, 'msg' => '登入成功!'));
		}
	}
	public function home()
	{
		$this->load->view('admin/home');
	}

}