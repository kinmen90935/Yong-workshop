<?php
class Achieve_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	public function get_signups($slug = FALSE)
{
	if ($slug === FALSE)
	{
		$query = $this->db->get('signup');
		return $query->result_array();
	}
	
	$query = $this->db->get_where('signups', array('n_id' => $slug));
	return $query->row_array();
}
public function set_signups()
{
	$this->load->helper('url');
	
	$slug = url_title($this->input->post('title'), 'dash', TRUE);
	
	$data = array(
		'title' => $this->input->post('title'),
		'n_id' => $n_id,
		'content' => $this->input->post('content')
	);
	
	return $this->db->insert('signups', $data);
}
}
