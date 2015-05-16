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
			'phone' => $this->input->post('phone'),
			'email' => $this->input->post('email'),
			'id_number' => $this->input->post('identity'),
			'birthday' => $this->input->post('birthday'),
			'sex' => $this->input->post('sex'),
			'ps' => $this->input->post('ps'),
			'food' => $this->input->post('food')
		);
		//insert signup person
		foreach ($insertArray as $key => $insertData) :
			if (!$insertData) {
				unset($insertArray[$key]);
			}
		endforeach;
		$this->db->insert("signupdetial", $insertArray);
		//query count
		$this->db->select('count');
		$count = $this->db->get_where('signup',array('s_id' => $insertArray['s_id']));
		//update count
		$data = array('count' => $count+1);
		$this->db->where('s_id', $insertArray['s_id']);	
		return $this->db->update('signup', $data); 
	}	
	
}
