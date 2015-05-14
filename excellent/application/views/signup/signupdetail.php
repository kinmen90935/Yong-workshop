<!--報名頁面-->
<script type="text/javascript">
    $(function() {
        $("#birthday").datepicker({
          yearRange: "-100:+0",
          changeMonth: true,
          changeYear: true
        });
        $("#formPost").submit(function(e){
            e.preventDefault(); 
            //var formDatas = $(this).serialize();
            //alert(formDatas);
            //var formURL = $(this).attr("action");
            var s_id = $("input[name=s_id]").val();
            var name = $("input[name=name]").val();
            var department = $("select[name=department]").val();
            var sex = $("select[name=sex]").val();
            $.ajax({
                url : "<?=base_url();?>index.php/signup/ajax_create_signup",
                type: "POST",
                data : {'s_id' : s_id ,'name' : name ,'department' : department ,'sex' : sex},
                dataType : 'json',
                success:function(rtn, textStatus, jqXHR) {
                    alert("成功2");
                    if (rtn.status) {
                        $("#formPost")[0].reset();
                        console.log(rtn.msg);
                        //$('.alert-success').show().html(rtn.msg);
                    } else {
                        //$('.alert-danger').show().html(rtn.msg);
                    }

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("失敗1");
                    alert(errorThrown);
                }
            });
       });
    
    });
        
</script>

<div class="col span_6_of_12">
    <p style="border-bottom-style:solid; border-width:medium; color:#4A67FF;">
      <a class="link" href="<?=base_url()?>news">首頁</a> > 
      <a class="link" href="<?=base_url()?>signup">活動報名</a> >
      <?php echo $signupDetail['title'];?>
    </p>
	<form id="formPost"  method="post" class="elegant-aero">
        <h1>《<?php echo $signupDetail['title'];?>報名表單》</h1>
         <h4>活動期間</h4>
        <div style="margin-bottom: 10px;padding:0px;background-color: #fff;border-bottom: 2px solid #ddd;">
           <!--
            <{$signupDetail.start_date|date_format:"Y-m-d h:i:s"}>~<{$signupDetail.end_date|date_format:"Y-m-d h:i:s"}></div>
            -->
        <h4>活動內容</h4>
        <div style="margin-bottom: 10px;padding:0px;background-color: #fff;border-bottom: 2px solid #ddd;">
        <?php echo $signupDetail['content'];?></div>
        
        <label class="required">
            <span>姓名(*) :</span>
            <input id="s_id" type="hidden" name="s_id" value="<?php echo $signupDetail['s_id'];?>">
            <input id="name" type="text" name="name" placeholder="請輸入您的全名"/>
        </label>

        <label class="required">
            <span>單位(*) :</span>
            <select name="department" id="u_dep">
                <option value="0">---請選擇---</option>
                <?php foreach ($unit as $unit_item):?> 
                <option value="<?php echo $unit_item['u_id'];?>"> <?php echo $unit_item['unit_title'];?> </option>
                <?php endforeach ?>
          </select>
        </label>
        
        <?php if ($signupDetail['bool_sex']) { ?>
            <label>
                <span>性別(*) :</span>
                <select name="sex" id="sex">
                    <option value="0">請選擇</option>
                    <option value="1">男</option>
                    <option value="2">女</option>
                </select>
            </label>
        <?php } ?>
        
        <label>
            <span>信箱(*) :</span>
            <input id="email" type="email" name="email" placeholder="請輸入您的信箱"/>
        </label>

        <?php if ($signupDetail['bool_birthday']) { ?>
        <label class="required">
            <span>生日(*) :</span>
            <input type="text" id="birthday" name="birthday" placeholder="請點選生日">
        </label>
        <?php } ?>

        <?php if ($signupDetail['bool_identity']) { ?>
        <label class="required">
            <span>身分證(*) :</span>
            <input type="text" name="identity" placeholder="請輸入您的身分證字號">
        </label>
        <?php } ?>

        <?php if ($signupDetail['bool_phone']) { ?>
        <label class="required">
            <span>手機(*) :</span>
            <input type="text" name="phone" placeholder="請輸入您的手機">
        </label>
        <?php } ?>

        <?php if ($signupDetail['bool_food']) { ?>
        <label class="required">
            <span>餐飲(*) :</span>
            不需要<input type="radio" name="food" value="0">
            葷<input type="radio" name="food" value="1">
            素<input type="radio" name="food" value="2">
        </label><br>
        <?php } ?>

        <label>
            <span>備註 :</span>
            <textarea id="ps" name="ps" placeholder="若還有其他資訊可於此處告訴主辦單位"></textarea>
        </label>
        <div class="alert alert-danger" style="display:none"></div>
        <div class="alert alert-success" style="display:none"></div>
        <input type="submit" id="signBtn" value="我要報名" name="add_news" class="button alt_btn">
    </form>
</div>

