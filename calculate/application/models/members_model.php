<?php
class Members_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		$this->load->library('session');
	}

	//獲取貼文列表 或是單一貼文內容
	public function verify_identity($username, $password)
	{
		$check_array = array('username' => $username, 'password' => $password);
		$this->db->select()->from('members')->where($check_array);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$newdata = array(
               'm_id' => $query->row()->m_id,
           	);
			$this->session->set_userdata($newdata);

			//登入次數加1
			$this->db->set('login_times', 'login_times+1', FALSE);
			$this->db->where('m_id', $query->row()->m_id);
			$this->db->update('members');
			return true;
		} else {
			return false;
		}
	}

	//取得會員列表
	public function get_member_list()
	{
		$this->db->select(array('m_id', 'name', 'username', 'u_id', 'login_times', 'total_point'));
		$this->db->from('members');
		$query = $this->db->get();
		$member_list = $query->result_array();
		foreach ($member_list as $key => $member) {
			$member_list[$key]['unit_title'] = $this->unit_model->get_unit_title($member["u_id"]);
		}
		return $member_list;

	}

	public function get_top_members()
	{
		$this->db->select(array('m_id', 'name', 'username', 'u_id', 'login_times', 'total_point'));
		$this->db->from('members');
		$this->db->order_by("total_point", "desc");
		$this->db->limit(5);
		$query = $this->db->get();
		$member_list = $query->result_array();
		foreach ($member_list as $key => $member) {
			$member_list[$key]['unit_title'] = $this->unit_model->get_unit_title($member["u_id"]);
		}
		return $member_list;
	}

	//取得會員資料
	public function get_member_data($member_id)
	{
		$this->db->select('*');
		$this->db->where('m_id', $member_id);
		$this->db->from('members');
		$query = $this->db->get();
		$member_data = $query->row_array();
		$member_data['unit_title'] = $this->unit_model->get_unit_title($member_data["u_id"]);
		return $member_data;
	}

    public function insert($dataArray)
    {
        //新增完回傳id
        $this->db->insert('members', $dataArray);
        return $this->db->insert_id();
    }

    public function update($m_id, $dataArray)
    {
        $this->db->where('m_id', $m_id);
        $this->db->update('members', $dataArray);
    }

    public function delete($m_id)
    {
        return $this->db->delete('members', array('m_id' => $m_id));
    }

    public function has_member($m_id)
    {
		$this->db->select()->from('members')->where(array(
			'm_id' => $m_id
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
            return $this->db->count_all('members');
        } else {
            $this->db->where($whereArray);
        }
        $this->db->from('members');
        return $this->db->count_all_results();
    }

    //取得列表 分頁(有條件)
    public function select_list($per_page = NULL, $page = 1, $whereArray = NULL, $likeArray = NULL)
    {
        $this->db->select('*')->from('members');
        if ($whereArray) {
            $this->db->where($whereArray);
        }
        if ($likeArray) {
            $this->db->like($likeArray);
        }
        $this->db->join('unit', 'members.u_id = unit.u_id');
        if ($per_page) {
            $this->db->limit($per_page, ($page-1) * $per_page);
        }
        $this->db->order_by("members.m_id", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }

}