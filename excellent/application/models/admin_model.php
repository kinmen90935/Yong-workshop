<?php
class Admin_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function select_admin($username=FLASE)
	{
		/*if ($username === FLASE)
		{
			$query = $this->db->get('members');
			return $query->result_array();
		}*/
		//$this->db->select('username');
		$query = $this->db->get_where('members', array('username' => 'peter'));
		return $query->row_array();
		/*
		$query = $this->db->query("SELECT * FROM members;");

		foreach ($query->result_array() as $row)
		{
		    if($row['username']==$username2)
		    {
		   		if($row['passwoed']==$password2)
		   		{
		   			return '1';
		   		}
		    }
		}
		return '0';*/
	}
}
?>