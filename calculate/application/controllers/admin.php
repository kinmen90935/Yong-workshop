<?php
class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('members_model', 'record_model', 'unit_model','admin_model'));
		$this->load->library(array('commonlib', 'session'));
		$this->load->helper('url');
	}

	public function index()
	{
        $this->login();
	}

    public function login($value='')
    {
        $data['title'] = '登入頁面';
        $this->load->view('admin/login', $data);
    }

    public function autherize()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $check_array = array(
            'username' => $username,
            'password' => $password
        );
        if ($this->admin_model->verify_identity($check_array)) {
            redirect("/admin/member_list");
        } else {
            redirect("/admin/login");
        }
    }

	public function member_list()
	{
        if (!$this->session->userdata('admin_id')) {
            header("location: /admin");
        }
		$data['units'] = $this->unit_model->get_unit_list();
		$data['title'] = '管理參賽人員';
		$this->load->view('admin/member_list', $data);
	}

    public function add_member()
    {
        if (!$this->session->userdata('admin_id')) {
            header("location: /admin");
        }
        $data['unit_datas'] = $this->unit_model->get_unit_list();
        $this->load->view('admin/add_member', $data);
    }

    public function edit_member($member_id = NULL)
    {
        if (!$this->session->userdata('admin_id')) {
            header("location: /admin");
        }
        if ($this->members_model->has_member($member_id)) {
            //所檢視的使用者資料
            $data['select_member_data'] = $this->members_model->get_member_data($member_id);

            //所檢視的使用者成績資料
            $data['record_datas'] = $this->record_model->get_record_datas($member_id);

            //取得所有單位清單
            $data['unit_list'] = $this->unit_model->get_unit_list();

            $this->load->view('admin/edit_member', $data);
        } else {
            redirect('admin');
        }

    }

    public function view_record($member_id = NULL)
    {
        if (!$this->session->userdata('admin_id')) {
            header("location: /admin");
        }
        if ($this->members_model->has_member($member_id)) {
            //所檢視的使用者資料
            $data['select_member_data'] = $this->members_model->get_member_data($member_id);

            //所檢視的使用者成績資料
            if ($record_datas = $this->record_model->get_record_datas($member_id)) {
                $total_point = 0;
                foreach ($record_datas as $key => $record) {
                    //===計分方式如下
                    $point = 0;

                    //基本分3分，若滿壘則再加積分10分
                    $point = 3;

                    //一次就完成3分、分兩次完成2分、分三次完成1分
                    if ($record['finish_times'] == 1) {
                        $point += 3;
                    } else if ($record['finish_times'] == 2) {
                        $point += 2;
                    } else if ($record['finish_times'] == 3) {
                        $point += 1;
                    }

                    //一小時內加兩分
                    if ($record['cost_times'] <= 60) {
                        $point += 2;
                    }
                    $record_datas[$key]['point'] = $point;
                    $total_point = $total_point + $point;
                }
                $data['total_point'] = $total_point;
                $data['record_datas'] = $record_datas;
            }

            $this->load->view('admin/view_record', $data);
        } else {
            redirect('admin');
        }
    }

    public function ajax_reset_pass()
    {
        $m_id = $this->input->post('m_id');
        if (isset($m_id)) {
            $this->members_model->update($m_id, array(
                'password' => md5('0000')
            ));

            echo json_encode(array('status' => TRUE, 'msg' => '已還原密碼!'));
        } else {
            echo json_encode(array('status' => FALSE, 'msg' => '還原失敗'));
        }
    }

    public function ajax_get_member_datas()
    {
        $page = $this->input->get('page');
        $whereArray = array();
        if ($u_id = $this->input->get('unit')) {
            $whereArray['members.u_id'] = $u_id;
        }

        $data['member_list'] = $this->members_model->select_list(5, $page, $whereArray);
        $data_html = $this->load->view('admin/member_data_grid', $data, TRUE);

        $data['page'] = $page;
        $data['pg_counts'] = ceil($this->members_model->get_counts($whereArray) / 5);
        $pg_html = $this->load->view('admin/member_pg_grid', $data, TRUE);
        echo json_encode(array('status' => TRUE, 'data_html' => $data_html, 'pg_html' => $pg_html));
    }

    public function ajax_insert_member()
    {
        $dataArray = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'name' => $this->input->post('name'),
            'gender' => $this->input->post('gender'),
            'u_id' => $this->input->post('u_id')
        );
        if ($this->members_model->insert($dataArray)) {
            echo json_encode(array('status' => TRUE));
        } else {
            echo json_encode(array('status' => FALSE));
        }
    }

    public function ajax_delete_member()
    {
        if ($m_id = $this->input->post('m_id')) {
            if ($this->members_model->delete($m_id)) {
                $this->record_model->delete(array('m_id' => $m_id));
                $this->commonlib->json(array('status' => TRUE , 'msg' => '刪除成功！'));
            } else {
                $this->commonlib->json(array('status' => TRUE , 'msg' => '資料刪除失敗'));
            }
        } else {
            $this->commonlib->json(array('status' => FALSE , 'msg' => '刪除失敗！'));
        }
    }

    public function update()
    {
        $dataArray = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'name' => $this->input->post('name'),
            'u_id' => $this->input->post('u_id')
        );

        $this->db->where('m_id', $this->input->post('m_id'));
        if ($this->db->update('members', $dataArray)) {
            redirect('admin');
        }
    }

    public function export_excel_datas($u_id)
    {

        $member_datas = $this->members_model->select_list(NULL, 1, array('u_id' => $u_id));

        $exporter = new ExportDataExcel('browser', 'test.xls');
        $exporter->initialize(); // starts streaming data to web browser

        $title_array = array(
            '編號',
            '類別',
            '年級',
            '姓名',
            '性別',
            '年齡',
            '身分別(1 學生, 2教職員工)',
            'Email',
            '連絡電話',
            '手機',
            '帳號',
            '密碼','身高','體重','體脂肪','總積分'
        );
        $exporter->addRow($title_array);

        // pass addRow() an array and it converts it to Excel XML format and sends
        // it to the browser
        foreach ($member_datas as $key => $member) {
            if ($member['sexual'] == 1) {
                $member['gender'] = '男';
            } else {
                $member['gender'] = '女';
            }

            $exporter->addRow(array(
                $member['m_id'],
                $member['unit_title'],
                $member['g_title'],
                $member['name'],
                $member['gender'],
                $member['age'],
                $member['identity'],
                $member['email'],
                $member['phone'],
                $member['cellphone'],
                $member['username'],
                $member['password'],
                $member['height'],
                $member['weight'],
                $member['bodyfat'],
                $member['total_point'],
            ));
        }
        // doesn't care how many columns you give it

        $exporter->finalize(); // writes the footer, flushes remaining data to browser.

        exit(); // all done
    }
}