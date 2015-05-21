<?php
class Achieve extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('achieve_model');
	}

	public function index()
	{
		$this->achievelist();
	}

	public function achievelist()
	{
		$data['title'] = '成果專區';
		//$data['signup'] = $this->signup_model->get_signup();
		
		$this->load->view('achieve/achievement', $data);
	}

}