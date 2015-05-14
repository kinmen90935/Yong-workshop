<?php
class Signup extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('signup_model');
	}

	public function index()
	{
		$data['signup'] = $this->signup_model->get_signup();
		$data['title'] = 'News archive';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/left_aside', $data);
		$this->load->view('signup/signuplist', $data);
		$this->load->view('templates/right_aside', $data);
		$this->load->view('templates/footer');

		$this->load->helper('url');
	}

	public function signupdetail($s_id)
	{
		$data['signupDetail'] = $this->signup_model->get_signupDetail($s_id);
		$data['unit'] = $this->signup_model->get_unit();
		$data['title'] = 'Create a news item';		
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/left_aside', $data);
		$this->load->view('signup/signupdetail', $data);
		$this->load->view('templates/right_aside', $data);
		$this->load->view('templates/footer');
	}

	public function ajax_create_signup()
	{
		
		$this->load->helper('url');
		foreach ($_POST as $key => $data) {
			if (!$data && $key != 'ps') {
				echo json_encode(array('status' => false, 'msg' => '請確認欄位是否填妥!'));
				
				echo "<script>alert('NO');</script>";
				die();
			}
		}	
		
		echo "<script>alert('SUCCESS');</script>";
		$this->signup_model->create_signup();
		echo json_encode(array('status' => true, 'msg' => '報名成功'));
		$data['signup'] = $this->signup_model->get_signup();
		$data['title'] = 'News archive';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/left_aside', $data);
		$this->load->view('signup/signuplist', $data);
		$this->load->view('templates/right_aside', $data);
		$this->load->view('templates/footer');

	}

}