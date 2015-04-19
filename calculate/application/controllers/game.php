<?php
class Game extends CI_Controller {

	private $member_id;
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('members_model', 'record_model'));
		$this->load->model('unit_model');
		$this->load->library('commonlib');
		$this->load->library('session');
		$this->load->helper('url');
		$this->member_id = $this->session->userdata('m_id');
		if (!$this->member_id) {
			header("location: /calculate");
		}
	}

	public function index()
	{
		$this->intro();
	}

	public function intro()
	{
		$data['member_data'] = $this->members_model->get_member_data($this->member_id);
		//top 10
		$data['top_member_list'] = $this->members_model->get_top_members();
		$this->load->view('game/intro', $data);
	}

	public function exam()
	{
		$data['title'] = '競賽規則';
		$data['member_data'] = $this->members_model->get_member_data($this->member_id);

		$this->load->view('game/exam', $data);
	}

	public function rules()
	{
		$data['title'] = '競賽規則';
		$data['member_data'] = $this->members_model->get_member_data($this->member_id);

		$this->load->view('game/rules', $data);
	}
}