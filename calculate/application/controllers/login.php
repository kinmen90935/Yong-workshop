<?php
class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('members_model');
		$this->load->model('unit_model');
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('pages/login');
	}

	//檢驗登入
	public function ajax_verify_identity()
	{
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		if ($username && $password) {
			$bool_login =  $this->members_model->verify_identity($username, $password);
			if ($bool_login) {
				echo json_encode(array('status' => true));
			} else {
				echo json_encode(array('status' => false, 'msg' => '帳號密碼錯誤!'));
			}
		}
	}

	//登出
	public function logout()
	{
		$this->session->unset_userdata('m_id');
		$this->session->unset_userdata('admin_id');
		header("location: /");
	}
}