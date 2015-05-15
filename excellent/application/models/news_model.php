<?php
class News_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	public function get_news($slug = FALSE)
	{
		if ($slug === FALSE)
		{
			$query = $this->db->get('news');
			return $query->result_array();
		}
		
		$query = $this->db->get_where('news', array('n_id' => $slug));
		return $query->row_array();
	}
	public function get_news_list()
	{
		//載入'分頁類'
		  //根據組合條件，計算記錄總數，（當前組合條件為空）
		  $config['total_rows'] = $this->db->count_all_results('news');
		  //設置本頁路徑
		  $config['base_url'] = base_url()."news";
		  //設置每頁顯示記錄數
		  $config['per_page'] = '10';
		  //設置分頁導航條樣式
		  $config['full_tag_open']   = '<div id = "page_nav">';
		  $config['full_tag_close']  = '</div>';
		  $config['first_link']      = '首頁';
		  $config['last_link']       = '末頁';
		  $config['next_link']       = '下一頁>';
		  $config['prev_link']       = '<上一頁';
		//應用設置
		$this->pagination->initialize($config);
		//設置查詢條件
		$this->db->select('title');
		//排序順序
		$this->db->order_by("n_id", "desc");
		//limit(結果數，偏移量)
		$this->db->limit($config['per_page'],10);
		//查詢
		$query = $this->db->get('news');
		//顯示結果列表
		foreach ($query->result_array() as $row)
		{
		  $this->table->add_row($row);
		}
	}
	public function get_news_list2($offset)
	{
		//載入'分頁類'
		  //根據組合條件，計算記錄總數，（當前組合條件為空）
		  $config['total_rows'] = $this->db->count_all_results('news');
		  //設置本頁路徑
		  $config['base_url'] = base_url()."news";
		  //設置每頁顯示記錄數
		  $config['per_page'] = '10';
		  //設置分頁導航條樣式
		  $config['full_tag_open']   = '<div id = "page_nav">';
		  $config['full_tag_close']  = '</div>';
		  $config['first_link']      = '首頁';
		  $config['last_link']       = '末頁';
		  $config['next_link']       = '下一頁>';
		  $config['prev_link']       = '<上一頁';
		//應用設置
		$this->pagination->initialize($config);
		//設置查詢條件
		$this->db->select('title');
		//排序順序
		$this->db->order_by("n_id", "desc");
		//limit(結果數，偏移量)
		$this->db->limit($config['per_page'],$offset);
		//查詢
		$query = $this->db->get('news');
		//顯示結果列表
		foreach ($query->result_array() as $row)
		{
		  $this->table->add_row($row);
		}
	}
	public function set_news()
	{
		$this->load->helper('url');
		
		$slug = url_title($this->input->post('title'), 'dash', TRUE);
		
		$data = array(
			'title' => $this->input->post('title'),
			'n_id' => $n_id,
			'content' => $this->input->post('content')
		);
		
		return $this->db->insert('news', $data);
	}
}
