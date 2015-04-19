<?php
    $this->load->view('templates/header');
    $this->load->view('templates/nav');
?>
<style>
    .danger {
        color: red;
    }
</style>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <img class="img-thumbnail" src="<?php echo base_url()?>assets/img/intro3.png" alt="">

        <div class="row">
            <div class="col-lg-12">
                <h1><i class="fa fa-tasks"></i> 挑戰內容</h1>
                <p>在一連8週的數學挑戰中完成指定題目，同學們至多可分三次完成，並利用本平台<a href="<?= base_url()?>game/exam">登錄分數</a>並挑戰積分，登錄完即可立即查看<a href="<?= base_url()?>member/view_record">成績曲線</a>。</p>
                <p>前一週的資料<font class="danger">最遲至下一週的週二晚上12點以前完成補登</font>，過期無法再登錄，也無法提前登載。</p>
                <p>本活動所設計之計分項目是為了幫大家增進數學能力，所以請務必誠實登載，<font class="danger">切勿為了獲獎而編造數據</font>。</p>
                <h1><i class="fa fa-gavel"></i> 比賽規則</h1>
                <table class="table table-bordered">
                    <tr>
                        <th>項目</th>
                        <th>積分計算規則</th>
                    </tr>
                    <tbody class="table-striped">
                    <tr>
                        <th>每週完成並登錄成績</th>
                        <td>每週登記成績可得基本分3分，若滿壘則再加積分10分</td>
                    </tr>
                    <tr>
                        <th>花了多久時間</th>
                        <td>一小時內(包含一小時)完成加兩分</td>
                    </tr>
                    </tbody>
                </table>

                <h1><i class="fa fa-star"></i> 加分項目</h1>
                <p>如果有上傳解題歷程、合作學習(影音、照片、討論截圖皆可)、尋求支援(各種CALL-OUT)...等，皆可累積創意學習積分。
                真誠完成挑戰，你就可以從十周中發現自己的數學戰鬥力突飛猛進。</p>
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