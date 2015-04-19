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
                            現在填寫第<?= $this_week?>週成績
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="/calculate/intro/view">個人主頁</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> 線上填寫成績
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  請確實填寫成績，至少每周登錄成績一次，缺少兩次以上即取消資格，當周成績最晚可於隔週星期二晚上12點前登錄完成。
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger alert-dismissable" style="display:none;">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-danger-circle"></i>  <span class="msg"></span>
                        </div>
                        <div class="alert alert-success alert-dismissable" style="display:none;">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-success-circle"></i>  <span class="msg"></span>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">

                        <form role="form">
                            <input type="hidden" name="num_of_week" value="<?= $this_week?>">
                            <div class="form-group">
                                <label>本次測驗獲得分數</label>
                                <select name="score" class="form-control">
                                    <option value="0">===請選擇===</option>
                                    <?php
                                    for ($i=100; $i >=0 ; $i--) {
                                        echo "<option value=". $i .">" . $i . "分</option>";
                                    }
                                    ?>
                                </select>
                                <p class="help-block" style="color:#FC0D0D;"></p>
                            </div>

                            <div class="form-group">
                                <label>花費時間</label>
                                <select name="cost_times" class="form-control">
                                    <option value="0">===請選擇===</option>
                                    <?php
                                    for ($i=120; $i >=5 ; $i--) {
                                        echo "<option value=". $i .">" . $i . "分鐘</option>";
                                    }
                                    ?>
                                </select>
                                <p class="help-block" style="color:#FC0D0D;"></p>
                            </div>
                            <div class="form-group">
                                <label>這次測驗答對題數?</label>
                                <?php
                                for ($i=4; $i <=15 ; $i++) {
                                ?>
                                    <label class="radio-inline">
                                        <input type="radio" name="cost_times" value="<?= $i?>" checked><?= $i?>
                                    </label>
                                <?php
                                }
                                ?>

                            </div>
                            <div class="form-group">
                                <label>本次測驗分了幾次完成?</label>
                                <label class="radio-inline">
                                    <input type="radio" name="finish_times" id="optionsRadiosInline1" value="1" checked>1
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="finish_times" id="optionsRadiosInline2" value="2">2
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="finish_times" id="optionsRadiosInline3" value="3">3
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="finish_times" id="optionsRadiosInline3" value="0">未完成
                                </label>
                            </div>
                            <div class="form-group">
                                <label>關於本次測驗的小註記</label>
                                <textarea name="ps" class="form-control" rows="3"></textarea>
                            </div>

                            <button type="submit" class="btn btn-default">送出</button>
                            <button type="reset" class="btn btn-default">重新填寫</button>

                        </form>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<script language="javascript" type="text/javascript">
$(document).ready(function(e) {

    $('form').submit(function(event) {
        event.preventDefault();

        //檢驗
        var num_of_week = $('input[name=num_of_week]');
        var score = $('select[name=score]');
        var cost_times = $('select[name=cost_times]');
        var finish_times = $('input[type=radio]');
        var ps = $('textarea[name=ps]');
        var datas = {'num_of_week' : num_of_week.val(), 'score' : score.val(), 'cost_times' : cost_times.val(), 'finish_times' : finish_times.val(), 'ps' : ps.val()};

        if (score.val() == 0) {
            score.siblings('.help-block').html('請直接點選作答成績');
        } else if (cost_times.val() == 0) {
            cost_times.siblings('.help-block').html('請直接點選作答花費時間');
        } else {
            $.post('<?= base_url()?>record/ajax_insert_record', datas, function(rtn, textStatus, xhr) {
                if (rtn.status) {
                    document.location.href = "<?= base_url()?>member/view_record";
                } else {
                    $('.alert-danger').show();
                    $('.alert-danger').find('.msg').html(rtn.msg);
                }
            }, 'json');
        }

    });
});
</script>
<?php
    $this->load->view('templates/footer');
?>
