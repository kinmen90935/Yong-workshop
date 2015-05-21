<?php
class Intro extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

    public function index()
    {
    	$this->introduce();
	}

	public function introduce()
	{
		$data['title'] = '計畫介紹';
	    $this->load->view('intro/introduce', $data);
	}

	public function plan()
	{
		$data['title'] = '主軸計畫';
	    $this->load->view('intro/plan', $data);
	}

	public function planExam()
	{
		$data['title'] = '計劃管考';
	    $this->load->view('intro/planExam', $data);
	}
	
	public function contact()
	{
		$data['title'] = '聯絡我們';
	    $this->load->view('intro/contact', $data);
	}
}
