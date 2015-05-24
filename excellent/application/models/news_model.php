<?php
class News_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_news($page = 1)
	{
		
		$this->db->select("post_date,title,n_id");
		$this->db->order_by("n_id", "desc");
		$this->db->limit(10,10*($page-1));
		$query = $this->db->get('news');
		return $query->result_array();
	}

	public function get_news_number()
	{
		$news_number = 0;
		$query = $this->db->get('news');
		foreach($query->result_array() as $row) 
		{
			$news_number++;
		}
		$news_number = $news_number/10;
		return $news_number;
	}

	public function get_news_complete($slug)
	{
		$query = $this->db->get_where('news', array('n_id' => $slug));
		return $query->row_array();
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
