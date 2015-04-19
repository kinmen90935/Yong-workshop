<?php
    $this->load->view('templates/header');
    $this->load->view('templates/nav');
?>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <img class="img-thumbnail" src="<?= base_url()?>assets/img/intro4.png" alt="">

        <div class="row">
            <div class="col-lg-12">
                <br><br>
                <style>
                .exam_item{
                    list-style: none;
                    float:left;
                    margin-right: 10px;
                    border: 1px solid #BBBBBB;
                    padding: 10px;
                    -webkit-border-radius: 5px;
                    -moz-border-radius: 5px;
                    border-radius: 5px;
                }
                .exam_item ul {
                    padding: 0;
                }
                .exam_item li {
                    list-style: none;
                    text-align: center;
                    margin-bottom: 7px;
                }
                .exam_item img{
                    width: 180px;
                    height: 180px;
                }
                </style>
                <ul>
                    <?php
                        for ($i=1; $i <=4 ; $i++) {
                    ?>
                    <li class="exam_item">
                        <ul>

                            <li>
                                <a target="blank" href="<?= base_url()?>exam/數學題本<?= $i?>.pdf">
                                    <img src="<?= base_url()?>assets/images/exam_thumb/<?= $i?>.png" alt="數學題本<?= $i?>">
                                </a>
                            </li>
                            <li>
                                <a class="link" target="blank" href="<?= base_url()?>exam/數學題本<?= $i?>.pdf">
                                    第<?= $i;?>週題目
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url()?>member/add_record/<?= $i?>" class="btn btn-primary">登錄當周成績</a>
                            </li>
                            <li>
                                <a href="<?= base_url()?>member/add_record/<?= $i?>" class="btn btn-info">查看試卷解答</a>
                            </li>
                        </ul>
                    </li>
                    <?php
                        }
                    ?>
                </ul>
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