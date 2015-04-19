<?php
class Question_Model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

    public function get_detail($q_id)
    {
	    return $this->db->select('*')
	            ->from('question')
	            ->join('members', 'members.m_id = question.m_id')
	            ->join('files', 'files.f_id = question.f_id', 'left')
	            ->where('q_id' , $q_id)
	            ->get()
	            ->row_array();
	}

	public function get_list()
	{
	    return $this->db->select()
	            ->from('question')
	            ->join('members', 'members.m_id = question.m_id')
	            ->get()
	            ->result_array();
	}


    public function insert($dataArray)
    {
        //新增完回傳id
        $this->db->insert('question', $dataArray);
        return $this->db->insert_id();
    }
}