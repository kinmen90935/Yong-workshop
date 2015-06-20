<?php $this->load->view('templates/admin_header');?>
<?php date_default_timezone_set('Asia/Taipei'); ?>
<div class="inner">
  <div class="col span_9_of_12">
    <div class="news">
    	<form id="signup_form" method="post">
	    	<fieldset>
	    		<legend>報名資訊表單</legend>
		    	<label>標題</label>
			    	<input type="text" placeholder="標題" id="title" name="title" value="<?php echo $signup_complete['title']; ?>"/><br>
			    <label>活動日期</label>
			    	<input type="text" name="begin_at" value="<?php echo date('Y/m/d',$signup_complete['begin_at']);?>"/><br>
			    <label>內容</label>
					<textarea placeholder="內容"  id="content" name="content" rows="10" ><?php echo htmlspecialchars_decode($signup_complete['content']);?></textarea>
		    		<input type="hidden" name="s_id" value="<?php echo $this->uri->segment(3,0);?>"/>
          <label>報名開始日期</label>
            <input type="text" name="start_date" value="<?php echo date('Y/m/d',$signup_complete['start_date']);?>"/><br>
          <label>報名截止日期</label>
            <input type="text" name="end_date" value="<?php echo date('Y/m/d',$signup_complete['end_date']);?>"/><br>
		    </fieldset>
        <fieldset>
          <label>所需欄位</label>
            <input type="checkbox" name="chk_group[]" value="bool_sex" <?php if($signup_complete['bool_sex']==1){ ?> checked="checked" <?php } ?>/>性別
            <input type="checkbox" name="chk_group[]" value="bool_email" <?php if($signup_complete['bool_email']==1){ ?> checked="checked" <?php } ?>/>電子信箱
            <input type="checkbox" name="chk_group[]" value="bool_birthday" <?php if($signup_complete['bool_birthday']==1){ ?> checked="checked" <?php } ?>/>生日
            <input type="checkbox" name="chk_group[]" value="bool_identity" <?php if($signup_complete['bool_identity']==1){ ?> checked="checked" <?php } ?>/>身分證
            <input type="checkbox" name="chk_group[]" value="bool_phone" <?php if($signup_complete['bool_phone']==1){ ?> checked="checked" <?php } ?>/>手機
            <input type="checkbox" name="chk_group[]" value="bool_food" <?php if($signup_complete['bool_food']==1){ ?> checked="checked" <?php } ?>/>餐飲
          </fieldset>  
        <input type="submit" class="btn" id="btnLogin" value="提交"></input>
      </form>
    </div>             
  </div>
</div>
<?php $this->load->view('templates/admin_footer');?>
<script type="text/javascript">
	$(function() {
	  $( 'input[name=begin_at]' ).datepicker({
      dateFormat: 'yy/mm/dd',
      currentText: "today",
      changeMonth: true,
    });
    $( 'input[name=start_date]' ).datepicker({
      dateFormat: 'yy/mm/dd',
      currentText: "today",
      changeMonth: true,
    });
    $( 'input[name=end_date]' ).datepicker({
      dateFormat: 'yy/mm/dd',
      currentText: "today",
      changeMonth: true,
    });
	});
  $(document).ready(function(){
    $('#signup_form').submit(function(e) {
      e.preventDefault(); 
      console.log("abc");
      var title = $("input[name=title]").val();
      var content = $("textarea[name=content]").val();//dateFormat: '@'
      var begin_at = $('input[name=begin_at]').val();
      var s_id = $("input[name=s_id]").val();
      var start_date = $("input[name=start_date]").val();
      var end_date = $("input[name=end_date]").val();
      console.log("ZZZ");

      var sign_chk_group = [];
      $("input[name='chk_group[]']:checked").each(function(i){
        sign_chk_group[i] = $(this).val();
      });
      console.log(sign_chk_group[0],sign_chk_group[1],sign_chk_group[2],sign_chk_group[3],sign_chk_group[4],sign_chk_group[5]);

      $.ajax({
        url : '<?= base_url()?>admin/ajax_edit_signup_complete',
        type: "POST",
        data : {'title' : title ,'content' : content, 'begin_at' : begin_at, 's_id' : s_id,'start_date' : start_date,'end_date' : end_date, 'sign_chk_group' : sign_chk_group},
        dataType: 'json',
        success:function(rtn, textStatus, jqXHR) {
          if (rtn.status) 
          {
            window.location.href = "<?= base_url()?>admin/edit_signup";
            console.log("def");
            alert(rtn.msg);
          } 
          else 
          {
            alert(rtn.msg);
            $('#signup_form')[0].reset();
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