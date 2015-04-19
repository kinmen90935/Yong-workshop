<?php
class Record_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		$this->load->library('session');
	}

    //確認當周成績是否已經被登記過了
    public function checkHasRecorded($m_id, $this_week)
    {
        $start = $this_week['start'];
        $end = $this_week['end'];
        $this->db->select('*')->from('record');
        $this->db->where("write_time BETWEEN $start AND $end");
        $this->db->where('m_id', $m_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get_record($member_id, $write_time)
    {
    	$this->db->select(array('score', 'finish_times', 'cost_times'));
		$this->db->from('record');
		$this->db->where('write_time', $write_time);
		$this->db->where('m_id', $member_id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row_array();
		} else {
			return false;
		}
    }

	//取得個人成績資料
	public function get_record_datas($member_id)
	{
		$this->db->select(array('write_time', 'score', 'finish_times', 'cost_times'));
		$this->db->from('record');
		$this->db->where('m_id', $member_id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return false;
		}
	}

	public function check_record($g_flag, $m_id)
	{
		$g_start = $g_flag - 86400 * 7;
		$g_end = $g_flag;
		$this->db->select('write_time');
		$this->db->from('record');
		$this->db->where(array('m_id' => $m_id, 'write_time >' => $g_start, 'write_time <' => $g_end));
		$query = $this->db->get();
		return $query->num_rows();
	}

    //新增
    public function insert($dataArray)
    {
        $this->db->insert('record', $dataArray);
        return $this->db->insert_id();
    }

	public function delete($array = NULL)
    {
    	if ($array) {
	        $this->db->delete('record', $array);
    	}
    }
}