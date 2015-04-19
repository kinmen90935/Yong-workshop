<?php
class Unit_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_unit_title($u_id = NULL)
	{
		$this->db->select('unit_title')->from('unit')->where('u_id', $u_id);
		$query = $this->db->get();
		return $query->row()->unit_title;
	}

	public function get_unit_list()
	{
		$this->db->select('*')->from('unit');
		$query = $this->db->get();
		return $query->result_array();
	}

	//獲取貼文列表 或是單一貼文內容
	public function get_post($p_id = FALSE)
	{
		if ($p_id === FALSE)
		{
			$query = $this->db->get('post');
			return $query->result_array();
		}

		//$query = $this->db->get_where('post', array('p_id' => $p_id));
		$this->db->select('*');
		$this->db->from('post');
		$this->db->join('post_category', 'post_category.pc_id = post.pc_id');
		$query = $this->db->get();
		return $query->row_array();
	}

	//獲取上下則貼文連結
	public function getNearbyPostUrl($p_id)
	{
		$this->db->select('p_id')->from('post')->where('p_id <', $p_id)->order_by('p_id', 'desc')->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$pre_post_id = $query->row()->p_id;
			$pre_url = site_url("post/view/" . $pre_post_id);
		} else {
			$pre_url = '#';
		}

		$this->db->select('p_id')->from('post')->where('p_id >', $p_id)->order_by('p_id', 'asc')->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$next_post_id = $query->row()->p_id;
			$next_url = site_url("post/view/" . $next_post_id);
		} else {
			$next_url = '#';
		}

		return array('pre_url' => $pre_url, 'next_url' => $next_url);
	}

	public function add_post($data)
	{
		$this->db->insert('post', $data);
	}

	public function update_post($update_data)
	{
		extract($update_data);
		$this->db->where('p_id', $pid);
		$this->db->update('post', array(
			'post_content' => htmlspecialchars($edit_content)
		));
		return true;
	}
}