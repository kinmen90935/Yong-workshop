<?php
    $this->load->view('templates/header');
    $this->load->view('templates/nav');
?>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <img class="img-thumbnail" src="<?= base_url()?>assets/img/intro.png" alt="">

        <div class="row">
            <div class="col-lg-12">
                <p>
                <a href="<?= base_url()?>message/add_question" class="btn btn-info">我要發問</a>
                </p>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>提問者</th>
                            <th>標題</th>
                        </tr>
                    </thead>
                    <?php
                        foreach ($question_list as $key => $question) {
                    ?>
                    <tr>
                        <td><?php echo $question['name']; ?></td>
                        <td><?php echo $question['title']; ?> ( <span style="color:#2906FF"><a href="<?= base_url()?>message/view/<?php echo $question['q_id']?>"><?php echo $question['reply_count']; ?> 則回覆</a></span>)</td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>

            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<script language="javascript" type="text/javascript">
$(document).ready(function(e) {

});
</script>
<?php
    $this->load->view('templates/footer');
?>