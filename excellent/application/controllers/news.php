<?php
class News extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
	}

	public function index()
	{
		$data['news'] = $this->news_model->get_news();
		$data['title'] = '最新消息';

		$this->load->view('templates/header', $data);
		echo $this->news_model->get_news_list();
		$this->load->view('news/index');
		$this->load->view('templates/right_aside', $data);
		$this->load->view('templates/footer');
	}

	public function view($offset)
	{
		$data['news'] = $this->news_model->get_news();
		$data['title'] = '最新消息';

		$this->load->view('templates/header', $data);
		$this->news_model->get_news_list2($offset);
		$this->load->view('news/index');
		$this->load->view('templates/right_aside', $data);
		$this->load->view('templates/footer');
	}

	public function news_complete($slug)
	{
		$query = $this->news_model->get_news($slug);
		foreach ($query->result_array() as $row)
		{
			
		}

		$this->load->view('templates/header');
		$this->load->view('news/view', $row);
		//$this->load->view('templates/right_aside');
		$this->load->view('templates/footer');

	}

}