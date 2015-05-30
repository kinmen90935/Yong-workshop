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
			$query = $this->db->order_by('start_date','desc')->get('signup');
			return $query->result_array();
		}
		
		$query = $this->db->get_where('signup', array('s_id' => $slug));
		return $query->row_array();
	}
	public function get_signup_count($slug=0)
	{
		$this->db->like('s_id', $slug);
		$this->db->from('signupdetial');
		$count = $this->db->count_all_results();
		$this->db->where('s_id', $slug);		
		return $this->db->update('signup', array('count' => $count)); 
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
		foreach ($insertArray as $key => $insertData) :
			if (!$insertData) {
				unset($insertArray[$key]);
			}
		endforeach;
		return $this->db->insert("signupdetial", $insertArray);
	}	
	
}
