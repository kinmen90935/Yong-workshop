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
		$data['news_number'] = $this->news_model->get_news_number();
		$data['page'] = $page;
		
		$news = $this->load->view('news/ajax_news_list',$data,true);
		$pages = $this->load->view('news/ajax_pg',$data,true);

		echo json_encode(array('status' => true, 'news' => $news, 'page' => $pages));
	}

	public function news_complete($slug)
	{
		$data = $this->news_model->get_news_complete($slug);	
		$this->load->view('news/view', $data);
	}

}