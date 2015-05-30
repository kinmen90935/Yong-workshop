<?php
class Signup extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('signup_model');
		 date_default_timezone_set('Asia/Taipei');
	}

	public function index()
	{
		$this->signuplist();
	}

	public function signuplist()
	{
		$data['title'] = '活動列表';
		$data['signup'] = $this->signup_model->get_signup();
		foreach ($data['signup'] as $key => $row) {
			$this->signup_model->get_signup_count($row['s_id']);
		}
		$data['signup'] = $this->signup_model->get_signup();
		$this->load->view('signup/signuplist', $data);
	}

	public function signupdetail($s_id)
	{
		$data['title'] = '報名活動';
		$data['signupDetail'] = $this->signup_model->get_signup($s_id);
		$data['unit'] = $this->signup_model->get_unit();				

		$this->load->view('signup/signupdetail', $data);
	}

	public function ajax_create_signup()
	{
		$s_id = $this->input->post('s_id');		
		$name = $this->input->post('name');
		$department = $this->input->post('department');
		$sex = $this->input->post('sex');
		$email = $this->input->post('email');
		$birthday = $this->input->post('birthday');
		$identity = $this->input->post('identity');
		$phone = $this->input->post('phone');
		$food = $this->input->post('food');
		$ps = $this->input->post('ps');
		$signupDetail = $this->signup_model->get_signup($s_id);
		if (!$s_id) {
			echo json_encode(array('status' => false, 'msg' => '失敗'));
		} else if($name==''){
			echo json_encode(array('status' => false, 'msg' => '請輸入姓名!'));
		} else if ($department=="0") {
			echo json_encode(array('status' => false, 'msg' => '請選擇單位!'));
		} else if ($sex=="0" && $signupDetail['bool_sex']){
			echo json_encode(array('status' => false, 'msg' => '請選擇性別!'));
		} else if ($email==''){
			echo json_encode(array('status' => false, 'msg' => '請輸入信箱!'));
		} else if ($birthday=='' && $signupDetail['bool_birthday']){
			echo json_encode(array('status' => false, 'msg' => '請輸入生日!'));
		} else if ($identity=='' && $signupDetail['bool_identity']){
			echo json_encode(array('status' => false, 'msg' => '請輸入身分證!'));
		} else if ($phone=='' && $signupDetail['bool_phone']){
			echo json_encode(array('status' => false, 'msg' => '請輸入手機號碼!'));
		} else if ($food=='' && $signupDetail['bool_food']){
			echo json_encode(array('status' => false, 'msg' => '請選擇飲食!'));
		} else {
			$this->signup_model->create_signup();
			echo json_encode(array('status' => true, 'msg' => '報名成功!'));
		}
	}

}