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
                            新增參賽資料
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?= base_url()?>game">個人主頁</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-bar-chart-o"></i> 新增競賽成員
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" method="post">
                            <div class="form-group">
                                <label>帳號</label>
                                <input name="username" class="form-control" placeholder="請輸入帳號">
                            </div>
                            <div class="form-group">
                                <label>密碼</label>
                                <input type="password" name="password" class="form-control" placeholder="請輸入密碼">
                            </div>
                            <div class="form-group">
                                <label>姓名</label>
                                <input name="name" class="form-control" placeholder="請輸入姓名">
                            </div>
                            <div class="form-group">
                                <label>性別</label>
                                <label class="radio-inline">
                                    <input type="radio" name="gender" id="optionsRadiosInline1" value="1" checked="">男
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="gender" id="optionsRadiosInline2" value="2">女
                                </label>
                            </div>

                            <div class="form-group">
                                <label>單位</label>
                                <select name="u_id" class="form-control">
                                    <option value="0">===請選擇===</option>
                                    <?php
                                        foreach ($unit_datas as $key => $unit) {
                                            echo "<option value=" . $unit['u_id'] . ">" . $unit['unit_title'] . "</option>";
                                        }
                                    ?>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-default">送出</button>
                            <button type="reset" class="btn btn-default">重新設定</button>

                        </form>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<script>
    jQuery(document).ready(function($) {
        $('form').submit(function(event) {
            event.preventDefault();
            if ($('input[name=username]').val() == '') {
                alert('未輸入使用者帳號');
            } else if ($('input[name=password]').val() == '') {
                alert('未輸入使用者密碼');
            } else if ($('input[name=name]').val() == '') {
                alert('未輸入使用者姓名');
            } else if ($('select[name=u_id]').val() == 0) {
                alert('未選擇單位');
            } else {
                var datas = $(this).serialize();
                $.post('<?= base_url()?>admin/ajax_insert_member', datas, function(rtn, textStatus, xhr) {
                    if (rtn.status) {
                        $('input').val('');
                        $('select').prop('selectedIndex', 0);
                        alert('新增成功!!');
                    } else {
                        alert('新增錯誤!!');
                    }
                }, 'json');
            }
        });
    });
</script>
<?php
    $this->load->view('templates/footer');
?>