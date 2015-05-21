<?php

class Pages extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
	}

    public function index()
    {
    	$this->home();
	}

	public function home()
	{
		$data['title'] = '首頁';
	    $this->load->view('pages/home', $data);
	}

	public function introduce()
	{
		$data['title'] = '計畫介紹';
	    $this->load->view('pages/introduce', $data);
	}

	public function plan()
	{
		$data['title'] = '主軸計畫';
	    $this->load->view('pages/plan', $data);
	}

	public function achievement()
	{
		$data['title'] = '成果專區';
	    $this->load->view('pages/achievement', $data);
	}

	public function planExam()
	{
		$data['title'] = '計劃管考';
	    $this->load->view('pages/introduce', $data);
	}
	
	public function contact()
	{
		$data['title'] = 'contact';
	    $this->load->view('pages/contact', $data);
	}
}
