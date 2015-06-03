<?php
    $this->load->view('templates/header');
?>
<?php 
    if ($signupDetail['end_date'] < time()) { ?>
        <script type="text/javascript">            
            alert("很抱歉! 報名已逾期");
            history.back();
        </script>
        <?php exit;
    } else if ($signupDetail['start_date'] > time()){ ?>
        <script type="text/javascript">            
            alert("還未開放報名喔!");
            history.back();
        </script>
        <?php exit;
    }
?>
<!--報名頁面-->
<a href="<?=base_url()?>signup">
    <div class="top" style="background-color:#FFFFFF; color:#0077DD;">活動報名</div>
</a>
<div class="inner">
    <div class="col span_10_of_12">        
    	<form id="formPost"  method="post" class="elegant-aero">
            <h1>《<?php echo htmlspecialchars_decode($signupDetail['title']);?>報名表單》</h1>
             <h4>活動期間</h4>
            <div style="margin-bottom: 10px;padding:0px;background-color: #fff;border-bottom: 2px solid #ddd;">
                <?php echo date('Y-m-d h:i:s',$signupDetail['start_date']);?>~
                <?php echo date('Y-m-d h:i:s',$signupDetail['end_date']);?>            
            </div>
                
            <h4>活動內容</h4>
            <div style="margin-bottom: 10px;padding:0px;background-color: #fff;border-bottom: 2px solid #ddd;">
            <?php echo htmlspecialchars_decode($signupDetail['content']);?></div>
            
            <label class="required">
                <span>姓名(*) :</span>
                <input id="s_id" type="hidden" name="s_id" value="<?php echo $signupDetail['s_id'];?>">
                <input id="name" type="text" name="name" placeholder="請輸入您的全名">
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
                <input id="email" type="email" name="email" placeholder="請輸入您的信箱">
            </label>

            <?php if ($signupDetail['bool_birthday']) { ?>
            <label class="required">
                <span>生日(*) :</span>
                <input id="birthday" type="date"name="birthday" placeholder="請點選生日">
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
                <input type="number" name="phone" placeholder="請輸入您的手機">
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
            <a onClick="javascript:history.back(1)"><p class="back_page">回上一頁</p></a>       
        </form>
    </div>
</div>

<?php
    $this->load->view('templates/footer');
?>

<script type="text/javascript">
    $(function() {
        $("#birthday").datepicker({
          yearRange: "-100:+0",
          changeMonth: true,
          changeYear: true
        });
        $("#formPost").submit(function(e){
            e.preventDefault(); 
            var s_id = $("input[name=s_id]").val();
            var name = $("input[name=name]").val();
            var department = $("select[name=department]").val();
            var sex = $("select[name=sex]").val();
            var email = $("input[name=email]").val();
            var birthday = $("input[name=birthday]").val();
            var identity = $("input[name=identity]").val();
            var phone = $("input[name=phone]").val();
            var food = $("input[name=food]:checked").val();
            var ps = $("textarea[name=ps]").val();
            $.ajax({
                url : "<?=base_url();?>signup/ajax_create_signup",
                type: "POST",
                data : {'s_id' : s_id ,'name' : name ,'department' : department ,'sex' : sex,
                        'email' : email , 'birthday' : birthday , 'identity' : identity ,
                        'phone' : phone , 'food' : food ,'ps' : ps},
                dataType : 'json',
                success:function(rtn, textStatus, jqXHR) {
                    if (rtn.status) {
                        $("#formPost")[0].reset();
                        console.log(jqXHR.responseText);
                        $('.alert-success').show().html(rtn.msg);
                         $('.alert-danger').hide();
                    } else {
                        console.log(jqXHR.responseText);
                        $('.alert-danger').show().html(rtn.msg);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR.responseText);
                }
            });
       });
    
    });
        
</script>

