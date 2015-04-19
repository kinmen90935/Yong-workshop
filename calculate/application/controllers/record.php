<?php
class Record extends CI_Controller {
	private $member_id;
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('members_model', 'record_model', 'unit_model', 'game_model'));
		$this->load->library(array('commonlib', 'session'));
		$this->load->helper('url');
		$this->member_id = $this->session->userdata('m_id');
		if (!$this->member_id) {
			header("location: /calculate/login");
		}
	}

	public function index()
	{
		$this->add_record();
	}

    private function get_range_week($datestr) {
        date_default_timezone_set(date_default_timezone_get());
        $dt = strtotime($datestr);
        $res['start'] = date('N', $dt)==1 ? date('Y-m-d', $dt) : date('Y-m-d', strtotime('last monday', $dt));
        $res['end'] = date('N', $dt)==7 ? date('Y-m-d', $dt) : date('Y-m-d', strtotime('next sunday', $dt));
        return $res;
    }

    private function check_is_recorded($start_time)
    {
        $this_week = $this->get_range_week(date("Y-m-d", $start_time));
        $this_week['start'] = strtotime($this_week['start']);
        $this_week['end'] = strtotime($this_week['end']);
        return $this->record_model->checkHasRecorded($this->session->userdata('m_id'), $this_week);
    }

    public function ajax_insert_record()
    {
        if (isset($_POST)) {
            $num_of_week = $_POST['num_of_week'];
            $game_datas = $this->game_model->get_game_data();
            $write_time = $game_datas['start_at'] + 86400 * 7 * $num_of_week;
            if ($this->check_is_recorded($write_time)) {
                echo json_encode(array('status' => false, 'msg' => '當周成績已經登錄過瞜'));
            } else {
                $insertArray = array(
                    'm_id' => $this->session->userdata('m_id'),
                    'write_time' => $write_time,
                    'score' => $this->input->post('score'),
                    'cost_times' => $this->input->post('cost_times'),
                    'finish_times' => $this->input->post('finish_times'),
                    'ps' => $this->input->post('ps')
                );

                if ($this->record_model->insert($insertArray)) {
                    echo json_encode(array('status' => true , 'msg' => '新增成功！'));
                } else {
                    echo json_encode(array('status' => false , 'msg' => '新增失敗'));
                }
            }

        } else {
            echo json_encode(array('status' => false, 'msg' => '資料發生錯誤！'));
        }
    }

	public function ajax_get_record() {

		$m_id = $this->input->get('m_id');
		if ($record_datas = $this->record_model->get_record_datas($m_id)) {
			$score = array();
			$write_time = array();
			foreach ($record_datas as $key => $record) {
				$write_time[] = date("Y-m-d", $record['write_time']);
				$score[] = intval($record['score']);
				$finish_times[] = intval($record['finish_times']);
				$cost_times[] = intval($record['cost_times']);
			}
			echo json_encode(array('status' => true, 'write_time' => $write_time, 'score' => $score, 'finish_times' => $finish_times, 'cost_times' => $cost_times));
		} else {
			echo json_encode(array('status' => false));
		}

	}
}