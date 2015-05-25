<?php $this->load->view('templates/admin_header');?>
				<div class="col span_9_of_12">
				    <form id="news_form" method="post">
				    	<fieldset>
				    		<legend>最新消息表單</legend>
					    	<label>標題</label>
						    <input type="text" placeholder="標題" id="news_title" name="news_title"/><br>
						    <label>內容</label>
							<textarea placeholder="內容"  id="content" name="content"></textarea>
							<input type="hidden" value="<?php echo $c_id;?>" name="c_id"/>
							<input type="hidden" value="<?php echo $c_id;?>" name="c_id"/>
					    	
					    </fieldset>
					    <input type="submit" class="btn" id="btnLogin" value="提交"></input>
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
		body{
			background-color: #DEDEE1;
		}
	</style>
<?php $this->load->view('templates/admin_footer');?>