<?php $this->load->view('templates/admin_header');?>
<?php date_default_timezone_set('Asia/Taipei'); ?>
<script>
	console.log("sc");
	function ajax_edit_news (page) {
		if(page==null)
			page=1;
		else
			page = page;
		console.log("function_page");
		$.ajax({
	            url : "<?=base_url()?>admin/ajax_edit_news",
	            type: "POST",
	            data : {'page' : page},
	            dataType: 'json',
	            success:function(rtn, textStatus, jqXHR) {
	              if (rtn.status) {
	                $('#news').html(rtn.news);
					$('#pg').html(rtn.page);
	                console.log("if");
	                console.log(page);

	              } else {
	              	console.log("else");
	              	console.log(jqXHR.responseText);
	              }
	            },
	            error: function(jqXHR, textStatus, errorThrown) {
	              console.log(jqXHR.responseText);
	            }
	          });
	}

	$(document).ready(function () {
		ajax_edit_news();

		$('body').on('click','.pagination li',function(event) {
			event.preventDefault();

			$('.pagination li').find('a').removeClass('active');
			$(this).find('a').addClass('active');
			
			var a = $(this).data('page');
			console.log($(this).data('page'));
			ajax_edit_news(a);
		})
	});
</script>
	<div class="col span_9_of_12">
		<div class="title">
			<p>最新消息</P>
		</div>
		<div id="news">
		</div>	
		<div id="pg" data-role="page">
		</div>
	</div>




<?php $this->load->view('templates/admin_footer');?>