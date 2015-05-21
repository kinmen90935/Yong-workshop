<?php
    $this->load->view('templates/header');
?>
<!--活動報名-->
<div class="inner">
    <div class="col span_10_of_12">
        <p style="border-bottom-style:solid; border-width:medium; color:#4A67FF;">
          <a class="link" href="news">首頁</a>>活動報名
        </p>
        <table class="table">
            <thead>
                <tr>
                    <th>活動名稱</th>
                    <th>目前狀態</th>
                    <th>報名期間</th>
                    <th>活動開始時間</th>
                    <th>目前報名人次</th>
                </tr>
            </thead>        
            <?php foreach ($signup as $signup_item): ?>
            <tr>
                <td width="30%"><a href="<?=base_url()?>signup/signupdetail/<?php echo $signup_item['s_id']; ?>"> <?php echo htmlspecialchars_decode($signup_item['title']);?> </a></td>
                <td width="20%">
                    <?php
                    if ($signup_item['end_date'] < time()) {
                        $message = "很抱歉! 報名已逾期";?>
                        <script type="text/javascript">alert($message);</script>
                        <?php
                    } else {
                        if ($signup_item['start_date'] > time()) {
                            $message = "還未開放報名喔!";
                            //$user->my_msg($message, 'signupdetail.php');
                        }
                    }
                    ?>
                </td>
                <td width="15%"><?php echo date('Y-m-d',$signup_item['start_date']);?>~
                                <?php echo date('Y-m-d',$signup_item['end_date']);?></td>
                <td width="15%"><?php echo date('Y-m-d',$signup_item['begin_at']);?></td>
                <td width="10%"><?php echo intval($signup_item['count']);?>         
                </td>
            </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>
<!-- inner -->

<?php
    $this->load->view('templates/footer');
?>
