<div id="page-wrapper">

    <div class="container-fluid">
        <img class="img-thumbnail" src="<?php echo base_url()?>assets/img/intro.png" alt="">
        <br>
        <br>
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?= base_url()?>message">討論列表</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> <?php echo $question_detail['title']; ?>
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                <h3><?php echo $question_detail['title']; ?></h3>
                </div>

                <button style="float: right;" type="button" class="btn btn-xs btn-info"><?php echo $question_detail['name']; ?>於<?php echo date('Y-m-d', $question_detail['post_time']); ?>發問</button>
                <div class="well">
                    <p><?php echo $question_detail['content']; ?></p>
                </div>
                <?php
                    if ($question_detail['tempname']) {
                ?>
                <h5>附加檔案說明</h5>
                <img width="400" src="<?php echo base_url()?>/upload/question/<?php echo $question_detail['tempname'] ?>" alt="">
                <?php
                    }
                ?>
                <br>
                <br>
                <div class="panel panel-info">
                    <button style="float: right;" name="btnReply" type="button" class="btn btn-primary">我要回應</button>

                    <div class="panel-heading">
                        <h3 class="panel-title">回應區</h3>
                    </div>
                    <div class="panel-body">
                        <?php
                        foreach ($replies as $key => $reply) {
                        ?>
                            <div class="well">
                            <?php echo $reply['reply_content']; ?>
                            <button style="float: right;" type="button" class="btn btn-xs btn-success"><?php echo $reply['name']; ?>於<?php echo date('Y-m-d', $reply['reply_time']); ?>回應</button>
                            </div>
                        <?php
                        }
                        ?>
                        <div id="reply_area" style="display:none;" class="form-group">
                            <label>回覆</label>
                            <textarea name="reply_content" class="form-control" rows="3"></textarea><br>
                            <button data-id="<?php echo $question_detail['q_id']; ?>" class="btn btn-primary" name="btnSubmitReply">送出</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<script language="javascript" type="text/javascript">
$(document).ready(function(e) {
    $('button[name=btnReply]').click(function(event) {
        event.preventDefault();
        $('#reply_area').show();
    });

    $('button[name=btnSubmitReply]').click(function(event) {
        event.preventDefault();
        var reply_content = $('textarea[name=reply_content]').val();
        var q_id = $(this).data('id');
        $.post('../ajax_insert_reply', {'reply_content': reply_content, 'q_id': q_id}, function(rtn, textStatus, xhr) {
            if (rtn.status) {
                location.reload();
            }
        }, 'json');
    });
});
</script>