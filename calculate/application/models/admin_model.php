<?php
class Admin_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		$this->load->library('session');
	}

	public function verify_identity($check_array)
	{
		$this->db->select()->from('admin')->where($check_array);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$newdata = array(
               'admin_id' => $query->row()->admin_id,
           	);
			$this->session->set_userdata($newdata);
			return true;
		} else {
			return false;
		}
	}

    public function insert($dataArray)
    {
        //新增完回傳id
        $this->db->insert('admin', $dataArray);
        return $this->db->insert_id();
    }

    public function update($admin_id, $dataArray)
    {
        $this->db->where('admin_id', $admin_id);
        $this->db->update('admin', $dataArray);
    }

    public function delete($admin_id)
    {
        return $this->db->delete('admin', array('admin_id' => $admin_id));
    }

    public function has_member($admin_id)
    {
		$this->db->select()->from('admin')->where(array(
			'admin_id' => $admin_id
		));
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
    }

    //取得店家筆數
    public function get_counts($whereArray = NULL)
    {
        if (!$whereArray) {
            return $this->db->count_all('admin');
        } else {
            $this->db->where($whereArray);
        }
        $this->db->from('admin');
        return $this->db->count_all_results();
    }

}