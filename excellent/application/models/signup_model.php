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
		$this->load->helper('url');
		
		//$slug = url_title($this->input->post('title'), 'dash', TRUE);
		$insertArray = array(
				//必填
				"s_id" => $_POST['s_id'],
				'name' => $_POST['name'],
				'department' => $_POST['department'],
				'food' => $_POST['food'],

				//客製化
				'sex' => $_POST['sex'],
				'email' => $_POST['email'],
				'birthday' => strtotime($_POST['birthday']),
				'id_number' => $_POST['identity'],
				'phone' => $_POST['phone'],

				//可填可不填
				'ps' => $_POST['ps']
			);

			foreach ($insertArray as $key => $insertData) {
				if (!$insertData) {
					unset($insertArray[$key]);
				}
			}

			return $this->db()->insert("signupdetial", $insertArray);
	}	
	
}
