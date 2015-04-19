<?php
class Game_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_game_data($g_id = 1)
	{
		$this->db->select('*')->from('game')->where('g_id', $g_id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function get_week_number($start_at)
	{
		$g_data = $this->get_game_data(1);
		$g_start = $g_data['start_at'];
		$week_number = ceil($start_at - $g_start) / 86400 / 7 + 1;
		return $week_number;
	}
}