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
		$this->load->view('templates/footer');
	}

	public function view($offset)
	{
		$data['news'] = $this->news_model->get_news();
		$data['title'] = '最新消息';

		$this->load->view('templates/header', $data);
		$this->news_model->get_news_list2($offset);
		$this->load->view('news/index');
		$this->load->view('templates/footer');
	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['title'] = 'Create a news item';
		
		$this->form_validation->set_rules('title', '標題', 'required');
		$this->form_validation->set_rules('text', '內文', 'required');
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);	
			$this->load->view('news/create');
			$this->load->view('templates/footer');
			
		}
		else
		{
			$this->news_model->set_news();
			$this->load->view('news/success');
		}
	}

}