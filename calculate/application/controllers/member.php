<?php
class Member extends CI_Controller {

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
		$this->view_record();
	}

    public function view_record()
    {
		$data['member_data'] = $this->members_model->get_member_data($this->member_id);

        $game_datas = $this->game_model->get_game_data();

        //比賽一共舉行幾周
        // 4/12(日) ~ 6/6(六)
        $game_weeks = ceil(($game_datas['end_at'] - $game_datas['start_at']) / (86400 * 7));

        $game_range = array();
        $total_point = 0;

        for ($i=1; $i <=$game_weeks ; $i++) {

            $record = $this->record_model->get_record($this->member_id, $game_datas['start_at'] + 86400 * 7 * $i);

            //重新整理積分
            if ($record) {
                //===計分方式如下
                $point = 0;

                //基本分3分，若滿壘則再加積分10分
                $point = 3;

                //一小時內加兩分
                if ($record['cost_times'] <= 60) {
                    $point += 2;
                }
                $record['point'] = $point;
                $total_point = $total_point + $point;
            }

            $game_range[] = array(
                'num_of_week' => $i,
                'week_start' => date("Y-m-d", $game_datas['start_at'] + 86400 * 7 * $i),
                'week_end' => date("Y-m-d", $game_datas['start_at'] + 86400 * 7 * ($i-1)),
                'record' => $record
            );
        }
        $data['game_range'] = $game_range;

        $data['total_point'] = $total_point;
        $this->members_model->update($this->member_id, array(
            'total_point' => $total_point
        ));

        $this->load->view('member/view_record', $data);
    }

	public function add_record($this_week)
	{
        if ($this_week) {
            $data['this_week'] = $this_week;
            $data['member_data'] = $this->members_model->get_member_data($this->member_id);
            $this->load->view('member/add_record', $data);
        } else {
            header('Location: ' . base_url() . 'game/exam');
            exit;
        }
	}

}