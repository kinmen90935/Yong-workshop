<?php
    $this->load->view('templates/header');
    $this->load->view('templates/admin_nav');
?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            編輯參賽資料
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="/calculate/intro">個人主頁</a>
                            </li>
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="/calculate/member/index">參賽管理</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-bar-chart-o"></i> <a href="#">個人資料</a>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <form action="<?= base_url()?>admin/update" method="post">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <th>姓名</th>
                                        <td>
                                            <input name="m_id" type="hidden" value="<?php echo $select_member_data['m_id']; ?>">
                                            <input name="name" type="text" value="<?php echo $select_member_data['name']; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>帳號</th>
                                        <td><input name="username" type="text" value="<?php echo $select_member_data['username']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <th>*新密碼</th>
                                        <td><input name="password" type="text" value=""></td>
                                    </tr>
                                    <tr>
                                        <th>單位</th>
                                        <td>
                                            <select name="u_id" id="">
                                            <?php
                                                foreach ($unit_list as $key => $unit) {
                                                    if ($unit['u_id'] == $select_member_data['u_id']) {
                                                        echo '<option selected value=' . $unit["u_id"]. '>' . $unit["unit_title"] . '</option>';
                                                    } else {
                                                        echo '<option value=' . $unit["u_id"]. '>' . $unit["unit_title"] . '</option>';
                                                    }
                                                }
                                            ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>登入次數</th>
                                        <td><?php echo $select_member_data['login_times']; ?></td>
                                    </tr>
                                    <tr>
                                        <th><button type="submit" class="btn btn-primary" name="btnUpdate">更新</button></th>
                                        <td><span id="msg"></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php
    $this->load->view('templates/footer');
?>