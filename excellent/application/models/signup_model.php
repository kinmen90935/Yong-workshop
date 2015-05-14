<?php
class Signup_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_signup($slug = FALSE)
	{
		if ($slug === FALSE)
		{
			$query = $this->db->get('signup');
			return $query->result_array();
		}
		
		$query = $this->db->get_where('signup', array('s_id' => $slug));
		return $query->row_array();
	}
	public function get_signupDetail($slug = FALSE)
	{
		//$slug = $_GET["s_id"];
		if ($slug === FALSE)
		{
			$query = $this->db->get('signup');
			return $query->result_array();
		}
		$query = $this->db->get_where('signup', array('s_id' => $slug));
		return $query->row_array();
	}
	public function get_unit($slug = FALSE)
	{
		if ($slug === FALSE)
		{
			$query = $this->db->get('unit');
			return $query->result_array();
		}
		$query = $this->db->get_where('unit', array('u_id' => $slug));
		return $query->row_array();
	}
	
	public function create_signup()
	{
		//$this->load->helper('url');
		
		//$slug = url_title($this->input->post('title'), 'dash', TRUE);
		$insertArray = array(
			's_id' => $this->input->post('s_id'),		
			'name' => $this->input->post('name'),
			'department' => $this->input->post('department'),
			'sex' => $this->input->post('sex'),
			'ps' => $this->input->post('ps')
		);

		/*foreach ($datas as $key => $insertData) {
			if (!$insertData) {
				unset($insertArray[$key]);
			}
		}*/

		return $this->db()->insert("signupdetial", $insertArray);
	}	
	
}
