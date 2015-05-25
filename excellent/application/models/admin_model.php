<?php
class Admin_model extends CI_Model {

	public function __construct()
	{
		//$this->load->database();
	}
	
	public function select_admin($username,$password)
	{
		$query = $this->db->get_where('members', array('username' => $username ,'password' => $password));
		if ($query->num_rows() > 0) 
		{
			$newdata = array(
               'm_id' => $query->row()->m_id,
               'username' => $query->row()->username,
               'password' => $query->row()->password,
               'c_id' => $query->row()->c_id,
               'nickname' => $query->row()->nickname,
           	);
			$this->session->set_userdata($newdata);
			return true;
		}
		else
		{
			return false;
		}
	}
}
?>