<?php
class Message extends CI_Controller {

	private $member_id;
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'members_model',
			'unit_model',
			'files_model',
			'question_model',
			'reply_model'
		));
		$this->load->library(array('commonlib', 'session'));
		$this->load->helper('url');
		$this->member_id = $this->session->userdata('m_id');
		if (!$this->member_id) {
			header("location: /calculate/login");
		}
	}

	public function index()
	{
		$this->question_list();
	}

	public function question_list()
	{
		$data['title'] = '討論區';
		$data['member_data'] = $this->members_model->get_member_data($this->member_id);
		$data['question_list'] = $this->question_model->get_list();
		foreach ($data['question_list'] as $key => $question) {
			$data['question_list'][$key]['reply_count'] = $this->reply_model->getReplyCountByID($question['q_id']);
		}
		$this->load->view('message/question_list', $data);
	}

	public function add_question()
	{

		$data['title'] = '討論區'; // 第一個字母大寫
		$data['member_data'] = $this->members_model->get_member_data($this->member_id);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $data);
		$this->load->view('message/add_question', $data);
		$this->load->view('templates/footer', $data);

	}


	public function view($q_id)
	{
		$data['title'] = '討論區'; // 第一個字母大寫
		$data['member_data'] = $this->members_model->get_member_data($this->member_id);
		$data['question_detail'] = $this->question_model->get_detail($q_id);
		$data['replies'] = $this->reply_model->getListById($q_id);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $data);
		$this->load->view('message/view', $data);
		$this->load->view('templates/footer', $data);

	}

	public function files()
	{
	    $files = $this->files_model->get_files();
	    $this->load->view('message/files', array('files' => $files));
	}

	public function insert_question()
	{

	    if (empty($_POST['title'])) {
	        echo "請輸入問題標題";
	    } else if (empty($_POST['content'])) {
	        echo "請輸入問題內容";
	    } else {
	        $config['upload_path'] = 'upload/question/';
	        $config['allowed_types'] = 'gif|jpg|png';
	        $config['file_name']  = strtolower(date("Ymd_His"));
	        $this->load->library('upload', $config);

	        //如果有上傳檔案
	        if ($status = $this->upload->do_upload('userfile')) {
	            $upload = $this->upload->data();
	            $fileArray['upload_time'] = time();
	            $fileArray['filename'] = $_FILES['userfile']['name'];
	            $fileArray['tempname'] = $upload['file_name'];
	            $fileArray['mime'] = $upload['file_type'];
	            $file_id = $this->files_model->insert($fileArray);
	        }

	        if (!$file_id) {
	        	$file_id = 0;
	        }

	    	$dataArray = array(
	    		'title' => $_POST['title'],
	    		'content' => $_POST['content'],
	    		'f_id' => $file_id,
	    		'post_time' => time(),
	    		'm_id' => $this->member_id
	    	);
	        $q_id = $this->question_model->insert($dataArray);
	        if ($q_id) {
            	header('Location: ' . base_url() . 'message');
				exit();
	        }
	    }

	}

	//登記成績
	public function ajax_insert_reply() {
		$datas = array(
			'q_id' => $_POST['q_id'],
        	'reply_content' => $_POST['reply_content'],
        	'reply_time' => time(),
	    	'm_id' => $this->member_id
        );

		if ($this->db->insert('reply', $datas)) {
			$this->commonlib->json(array('status' => true, 'msg' => '回覆成功!'));
		} else {
			$this->commonlib->json(array('status' => false, 'msg' => '回覆失敗'));
		}
	}
}