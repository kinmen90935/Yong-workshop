<?php $this->load->view('templates/admin_header');?>
<?php date_default_timezone_set('Asia/Taipei'); ?>
    <div class="inner">
        <div class="col span_9_of_12">
            <div class="news">
            	<form id="news_form" method="post">
			    	<fieldset>
			    		<legend>最新消息表單</legend>
				    	<label>標題</label>
					    	<input type="text" placeholder="標題" id="news_title" name="news_title" value="<?php echo $news_complete['title']; ?>"/><br>
					    <label>日期</label>
					    	<input type="text" name="post_date" value="<?php echo date('Y/m/d',$news_complete['post_date']);?>"/><br>
					    <label>內容</label>
							<textarea placeholder="內容"  id="content" name="content" rows="10" ><?php echo htmlspecialchars_decode($news_complete['content']);?></textarea>
				    		<input type="hidden" name="n_id" value="<?php echo $this->uri->segment(3,0);?>"/>
				    </fieldset>
				    <input type="submit" class="btn" id="btnLogin" value="提交"></input>
			    </form>
            </div>             
        </div>
    </div>

<?php $this->load->view('templates/admin_footer');?>
	<script type="text/javascript">
		$(function() {
		  $( 'input[name=post_date]' ).datepicker({
        dateFormat: 'yy/mm/dd',
        currentText: "today",
        changeMonth: true,
      });
		  });
        $(document).ready(function(){
        $('#news_form').submit(function(e) {
          e.preventDefault(); 
          console.log("abc");
          var news_title = $("input[name=news_title]").val();
          var content = $("textarea[name=content]").val();//dateFormat: '@'
          var post_date = $('input[name=post_date]').val();
          var n_id = $("input[name=n_id]").val();
          console.log("ZZZ");
          $.ajax({
            url : '<?= base_url()?>admin/ajax_edit_news_complete',
            type: "POST",
            data : {'news_title' : news_title ,'content' : content, 'post_date' : post_date, 'n_id' : n_id},
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