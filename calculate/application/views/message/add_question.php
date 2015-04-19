<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <img class="img-thumbnail" src="<?php echo base_url()?>assets/img/intro2.png" alt="">

        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?= base_url()?>intro/view">個人主頁</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> <a href="<?= base_url()?>message/index">作業討論區</a>
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->


        <div class="row">
            <div class="col-lg-12">
                <form method="post" action="<?= base_url()?>message/insert_question" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>我遇到的問題或疑問..</label>
                        <input type="text" name="title" id="title" value="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>詳述內容</label>
                        <textarea class="form-control" rows="3" name="content"></textarea>
                    </div>
                    <div class="form-group">
                        <label>附加檔案說明</label>
                        <input type="file" name="userfile" id="userfile" size="20" />
                    </div>
                    <button type="submit" class="btn btn-primary">送出</button>
                    <button type="reset" class="btn btn-default">重新填寫</button>

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
            if ($('input[name=title]').val() == '') {
                alert('請輸入問題標題');
                event.preventDefault();
            } else if ($('textarea[name=summary]').val() == '') {
                alert('請輸入問題摘要');
                event.preventDefault();
            }
        });
    });
</script>
