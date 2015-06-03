	<?php date_default_timezone_set('Asia/Taipei'); ?>
	<form method="POST" action="<?=base_url()?>">
		<?php
			foreach($news as $row) 
			{	
				$row['post_date'] = date('Y/m/d',$row['post_date']);
				$row['title'] = "<a href=".base_url()."admin/edit_news_complete/".$row['n_id'].">".$row['title']."</a>";
				$this->table->add_row($row['post_date'],$row['title'],"<input class='btn btn-danger' data-newsid='".$row['n_id']."' name='btnDel' type='button' value='刪除'/>");
			}
			echo $this->table->generate();
		?>
	</form>
	<script type="text/javascript">
		//刪除單篇
		$(document).ready(function(e) {
			console.log("ettt");
			$('input[name=btnDel]').click(function(e) {
				var msg = "您真的確定要刪除嗎？";
				console.log("DEF");
				if (confirm(msg)==true){
					var $this = $(this);
					var delid = $this.data('newsid');
					console.log("ABC");
					$.ajax({
						type: 'POST',
						url: "<?=base_url()?>admin/ajax_news_delete",
						data: {'delid' : delid},
						dataType: 'json',
						success: function(rtn){
							console.log("success");
							window.location.href = "<?= base_url()?>admin/edit_news";
						},
						error:function (jqXHR, ajaxOptions, thrownError){
							console.log(jqXHR.responseText);
						},
					});
				}
			});
		});
	</script>
