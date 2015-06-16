<?php
	date_default_timezone_set('Asia/Taipei');
	foreach($news as $row) {
?>
<li>
	<div class="news_info">
		<span class='ui-icon ui-icon-triangle-1-se'></span>
		<span class="date"><?= date('Y/m/d',$row['post_date'])?></span>
	</div>
	<div class="news_title">
		<a href="<?= base_url()?>news/news_complete/<?= $row['n_id']?>"><?= $row['title']?></a>
	</div>
	<div class="clear"></div>
</li>

<?php
	}
?>