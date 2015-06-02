<?php $this->load->view('templates/admin_header');?>
<?php date_default_timezone_set('Asia/Taipei'); ?>
	<div class="col span_9_of_12">
		<div class="title">
			<p>報名資訊</P>
		</div>
		<div id="news">
			<form method="POST" action="<?=base_url()?>">
				<?php
					foreach($signup as $row) 
					{	
						$row['begin_at'] = date('Y/m/d',$row['begin_at']);
						$row['title'] = "<a href=".base_url()."admin/edit_signup_complete/".$row['s_id'].">".$row['title']."</a>";
						$row['start_date'] = date('Y/m/d',$row['start_date']);
						$row['end_date'] = date('Y/m/d',$row['end_date']);
						$this->table->set_heading('活動開始日期', '標題', '報名開始日期','報名截止日期');
						$this->table->add_row($row['begin_at'],$row['title'],$row['start_date'],$row['end_date'],"<input class='btn btn-danger' data-newsid='".$row['s_id']."' name='btnDel' type='button' value='刪除'/>");
					}
					echo $this->table->generate();
				?>
			</form>
		</div>
	</div>
<?php $this->load->view('templates/admin_footer');?>

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
					url: "<?=base_url()?>admin/ajax_signup_delete",
					data: {'delid' : delid},
					dataType: 'json',
					success: function(rtn){
						console.log("success");
						window.location.href = "<?= base_url()?>admin/edit_signup";
					},
					error:function (jqXHR, ajaxOptions, thrownError){
						console.log(jqXHR.responseText);
					},
				});
			}
		});
	});
</script>