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
            <td width="30%"><a href="<?=base_url()?>signup/signupdetail/<?php echo $signup_item['s_id']; ?>"> <?php echo $signup_item['title'];?> </a></td>
            <td width="20%">
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
            <td width="15%"></td>
            <td width="15%"></td>
            <td width="10%">
                
            </td>
        </tr>
        <?php endforeach ?>
    </table>
</div>
