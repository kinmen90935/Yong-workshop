<?php $this->load->view('templates/admin_header');?>
<?php date_default_timezone_set('Asia/Taipei'); ?>
				<div class="col span_9_of_12">
				    <form id="news_form" method="post">
				    	<fieldset>
				    		<legend>最新消息表單</legend>
					    	<label>標題</label>
						    <input type="text" placeholder="標題" name="news_title"/><br>
						    <label>內容</label>
							  <textarea placeholder="內容"  id="content" name="content" rows="10"></textarea>
							  <input type="hidden" name="post_date" value="<?php echo strtotime(date("Y/m/d"));?>"/><br>
					    	
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
	</style>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#news_form').submit(function(e) {
        e.preventDefault(); 
        console.log("abc");
        var news_title = $("input[name=news_title]").val();
        var content = $("textarea[name=content]").val();
        var post_date = $("input[name=post_date]").val();
        console.log("ZZZ");
        $.ajax({
          url : '<?= base_url()?>admin/ajax_admin_news',
          type: "POST",
          data : {'news_title' : news_title ,'content' : content, 'post_date' : post_date},
          dataType: 'json',
          success:function(rtn, textStatus, jqXHR) {
            if (rtn.status) 
            {
              window.location.href = "<?= base_url()?>admin/admin_home";
              console.log("def");
              alert(rtn.msg);
            } 
            else 
            {
              alert(rtn.msg);
              $('#news_form')[0].reset();
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