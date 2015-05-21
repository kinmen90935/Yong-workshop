<?php
class News extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
	}

	public function index()
	{
		$this->news_list();

	}

	public function news_list($value='')
	{
		$data['title'] = '最新消息';
		$this->load->view('news/index',$data);
	}

	public function ajax_news_list($value='')
	{
		$page = $this->input->post('page');

		$data['news'] = $this->news_model->get_news($page);


		$news = $this->load->view('ajax_news_list',$data,true);
		$page = $this->load->view('ajax_pg');

		echo json_encode(array('status' => true, 'news' => $news));
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