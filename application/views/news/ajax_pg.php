<div class="pag_wrap">
	<ul class="pagination">
		<li id="li-float" class="pages-pre">
			<a href="#"><span  class="ui-icon  ui-icon-circle-arrow-w"></span></a>
		</li>
		<?php 
			for($i=0;$i<=$news_number;$i++)	{ 
		?>
			<li class="pages<?php echo $i+1;?>" id="li-float">
				<a href="#"> <?php echo $i+1; ?></a>
				<script>
					$(".pages<?php echo $i+1;?>").data('page',<?php echo $i+1;?>);
				</script>
			</li>
		<?php 
			}
		?>
		<li id="li-float" class="pages-next"><a href="#"><span  class="ui-icon   ui-icon-circle-arrow-e"></span></a></li>
	</ul>
</div>


	
<style type="text/css">
	.pag_wrap{
		text-align: center;
	}	
	.pagination{
		display: inline-block;
	}
	#li-float{
		float: left;
		margin: 8px;
	}
	.active{
		color: #A960A3;
		size: 30px;
	}
	.display-none{
		display: none;
	}

</style>
<script type="text/javascript">
	var page = <?php echo $page; ?>;
	var news_number = <?php echo $news_number;?>;
	console.log(news_number);
	$('li.pages<?php echo $page;?>').find('a').addClass('active');
	if (page==1) 
	{
		$('li.pages-pre').find('a').addClass('display-none');
	}
	else
	{
		$('li.pages-pre').addClass('pages<?php echo $page-1;?>');
		$(".pages<?php echo $page-1;?>").data('page',<?php echo $page-1;?>);
	}
	if (page>=news_number) 
	{
		$('li.pages-next').find('a').addClass('display-none');
		console.log(news_number);
		console.log("news_number");
	}
	else
	{
		$('li.pages-next').addClass('pages<?php echo $page+1;?>');
		$(".pages<?php echo $page+1;?>").data('page',<?php echo $page+1;?>);
	}

</script>