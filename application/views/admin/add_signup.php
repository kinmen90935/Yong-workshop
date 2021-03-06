<?php $this->load->view('templates/admin_header');?>
<?php date_default_timezone_set('Asia/Taipei'); ?>
	<div class="col span_9_of_12">
					    <form id="sign_form" method="post">
					    	<fieldset>
					    		<legend>報名表單新增</legend>
						    	<label>活動名稱</label>
							    	<input type="text" placeholder="標題" id="sign_title" name="sign_title"/><br>
							    <label>活動開始日期</label>
								    <input type="text"  placeholder="活動開始日期" name="active_date"/><br>
								
								<label>活動內容</label>
								    <textarea placeholder="內容"  id="content" name="content" rows="10"></textarea>
								<label>報名開始日期</label>
									<input type="text"  placeholder="報名開始日期" name="sign_start"/><br>
								<label>報名截止日期</label>
									<input type="text"  placeholder="報名截止日期" name="sign_end"/><br>
						    </fieldset>
						    <fieldset>
							    <label>所需欄位</label>
									<input type="checkbox" name="chk_group[]" value="bool_sex" />性別
								    <input type="checkbox" name="chk_group[]" value="bool_email" />電子信箱
									<input type="checkbox" name="chk_group[]" value="bool_birthday" />生日
									<input type="checkbox" name="chk_group[]" value="bool_identity" />身分證
									<input type="checkbox" name="chk_group[]" value="bool_phone" />手機
									<input type="checkbox" name="chk_group[]" value="bool_food" />餐飲
							</fieldset>  
						    <input type="submit" class="btn" id="btnLogin" value="新增活動"></input>
					    </form>
					</div>
				</div>
				<!-- inner -->
			</div>
		<style type="text/css">
			.back-title{
				font-size: 40px;
				color: #262626;
				text-shadow: 20px 10px 3px #cccccc;
			}
		</style>
		<script type="text/javascript">
			$(function() {
				$( 'input[name=active_date]' ).datepicker({
	        		dateFormat: 'yy/mm/dd',
	        		currentText: "today",
	        		changeMonth: true,
	      		});
	      		$( 'input[name=sign_start]' ).datepicker({
	        		dateFormat: 'yy/mm/dd',
	        		currentText: "today",
	        		changeMonth: true,
	      		});
	      		$( 'input[name=sign_end]' ).datepicker({
	        		dateFormat: 'yy/mm/dd',
	        		currentText: "today",
	        		changeMonth: true,
	      		});
			});
		    $(document).ready(function(){
		        $('#sign_form').submit(function(e) {
			        e.preventDefault(); 
			        console.log("abc");

			        var sign_title = $("input[name=sign_title]").val();
			        var content = $("textarea[name=content]").val();
			        var active_date = $("input[name=active_date]").val();
			        var sign_start = $("input[name=sign_start]").val();
			        var sign_end = $("input[name=sign_end]").val();
			        

			        var sign_chk_group = [];
					$("input[name='chk_group[]']:checked").each(function(i){
					    sign_chk_group[i] = $(this).val();
					});
			        console.log(sign_chk_group[0],sign_chk_group[1],sign_chk_group[2],sign_chk_group[3],sign_chk_group[4],sign_chk_group[5]);

			        console.log("ZZZ");
			        $.ajax({
			            url : '<?= base_url()?>admin/ajax_add_signup',
			            type: "POST",
			            data : {'sign_title' : sign_title ,'content' : content, 'active_date' : active_date, 'sign_start' : sign_start, 'sign_end' : sign_end, 'sign_chk_group' : sign_chk_group},
			            dataType: 'json',
			            success:function(rtn, textStatus, jqXHR) {
				            if (rtn.status) 
				            {
				              //window.location.href = "<?= base_url()?>admin/add_signup";
				              console.log("def");
				              alert(rtn.msg);
				              $('#sign_form')[0].reset();
				            } 
				            else 
				            {
				              alert(rtn.msg);
				              $('#sign_form')[0].reset();
				            }
			            },
			            error: function(jqXHR, textStatus, errorThrown) {
			            	console.log(jqXHR.responseText);
			                //if fails
			            }
			        });
		        });
		    });
		</script>
<?php $this->load->view('templates/admin_footer');?>