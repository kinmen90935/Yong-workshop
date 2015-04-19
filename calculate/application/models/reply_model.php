<?php
class Reply_Model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function getReplyCountByID($q_id)
	{
	    $this->db->select()
				->from('reply')
	            ->where('q_id', $q_id);
		return $this->db->count_all_results();
	}

	public function getListById($q_id)
	{
	    $this->db->select()
				->from('reply')
	            ->join('members', 'members.m_id = reply.m_id')
	            ->where('q_id', $q_id);
		return $this->db->get()->result_array();
	}

}