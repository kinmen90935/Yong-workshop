<?php
    $this->load->view('templates/header');
    $this->load->view('templates/admin_nav');
?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
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
                    <div class="btn-group" role="group">
                        <button data-unit="0" type="button" class="btn btn-default">不分類</button>
                        <?php
                        foreach ($units as $key => $unit) {
                        ?>
                          <button data-unit="<?= $unit['u_id']?>" type="button" class="btn btn-default"><?= $unit['unit_title']?></button>
                        <?php
                        }
                        ?>
                        </div>
                    </div>
                </div>
                <br><br>
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
                                        <th>重設密碼</th>
                                        <th>檢視個人成績</th>
                                        <th>刪除</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <nav id="pg"></nav>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<script>
    function get_member_datas (datas, callback) {
        $.get('<?= base_url()?>admin/ajax_get_member_datas', datas, callback, 'json');
    }
    jQuery(document).ready(function($) {

        $('body').on('click', 'button[name=btn_reset]', function(event) {
            event.preventDefault();
            var $this = $(this);
            var m_id = $this.data('id');
            $.post('<?= base_url()?>admin/ajax_reset_pass', {'m_id' : m_id}, function(rtn, textStatus, xhr) {
                if (rtn.status) {
                    alert(rtn.msg);
                }
            }, 'json');
        });

        $('body').on('click', 'button[name=btnDel]', function(event) {
            var $this = $(this);
            if (confirm('是否確定要刪除?')) {
                var m_id = $this.data('id');
                $.post('<?= base_url()?>admin/ajax_delete_member', {'m_id':m_id}, function(rtn, textStatus, xhr) {
                    $this.closest('tr').remove();
                }, 'json');
            }
        });

        var datas = {
            'page' : 1,
        }
        get_member_datas(datas, function(rtn) {
            if (rtn.status) {
                $('tbody').html(rtn.data_html);
                $('#pg').html(rtn.pg_html);
            }
        });

        $('body').on('click', '.btn-group button', function(event) {
            event.preventDefault();
            $('.btn-group button').removeClass('active');
            $(this).addClass('active');
            var datas = {
                'unit' : $(this).data('unit'),
                'page' : $('.pagination li.active').data('page'),
            }
            get_member_datas(datas, function(rtn) {
                if (rtn.status) {
                    $('tbody').html(rtn.data_html);
                    $('#pg').html(rtn.pg_html);
                }
            });
        });

        $('body').on('click', '.pagination li', function(event) {
            event.preventDefault();
            var datas = {
                'unit' : $('.btn-group button.active').data('unit'),
                'page' : $(this).data('page'),
            }
            get_member_datas(datas, function(rtn) {
                if (rtn.status) {
                    $('tbody').html(rtn.data_html);
                    $('#pg').html(rtn.pg_html);
                }
            });
        });
    });
</script>
<?php
    $this->load->view('templates/footer');
?>