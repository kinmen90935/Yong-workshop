<!--活動報名-->
<div class="col span_7_of_12">
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
            <!--
                <{if $signup.end_date < $smarty.now}>
                    <span class="highlight" style="background-color: #AD0909;">報名已截止</sapn>
                <{else}>
                    <{if $signup.start_date > $smarty.now}>
                        <span class="highlight" style="background-color: #74AF0A;">報名尚未開放</sapn>
                    <{else}>
                        <span class="highlight" style="background-color: #097FAD;">離報名截止還剩&nbsp<strong style="font-size: 20px;"><{$signup.days_left}></strong>&nbsp天</span>
                    <{/if}>
                <{/if}>
            -->
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
