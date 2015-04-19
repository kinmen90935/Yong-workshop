<?php
    $this->load->view('templates/header');
    $this->load->view('templates/nav');
?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            參賽資料管理
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="/calculate/intro">個人主頁</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-bar-chart-o"></i> 參賽管理
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <p>
                            <a href="/calculate/member/add" class="btn btn-primary">新增競賽人員</a>
                        </p>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>姓名</th>
                                        <th>系別</th>
                                        <th>登入次數</th>
                                        <th>編輯</th>
                                        <th>檢視個人成績</th>
                                        <th>刪除</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($member_list as $key => $member) {
                                            $edit_segments = array('member', 'edit', $member["m_id"]);
                                            $view_segments = array('member', 'view', $member["m_id"]);
                                    ?>
                                    <tr>
                                        <td><?php echo $member['name']; ?></td>
                                        <td><?php echo $member['unit_title']; ?></td>
                                        <td><?php echo $member['login_times']; ?></td>
                                        <td>
                                            <a href="<?php echo site_url($edit_segments);?>" class="btn btn-default">編輯</a>
                                        </td>
                                        <td>
                                            <a href="<?php echo site_url($view_segments);?>" class="btn btn-primary">檢視</a>
                                        </td>
                                        <td>
                                            <button data-id="<?php echo $member["m_id"];?>" name="btnDel" class="btn btn-danger">刪除</button>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<script>
    jQuery(document).ready(function($) {

    });
</script>
<?php
    $this->load->view('templates/footer');
?>