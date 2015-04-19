<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>數學增能大挑戰開跑拉</title>
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" type="text/css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/default.css');?>" type="text/css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/component.css');?>" type="text/css" rel="stylesheet" />
	<style>
	*,body,html {padding: 0;margin:0;}
	body {
		font-family: \5FAE\8EDF\6B63\9ED1\9AD4,\65B0\7D30\660E\9AD4;
		background-color: #EFEFEF;
	}
	#heaedr {
		margin: 0 auto;
		position: relative;
		text-align: center;
		background-color: #FDD;
	}
	#main {
		position: relative;
		width:80%;
		margin: 0 auto;
	}
	h1 {
		text-align:center;
		line-height: 45px;
	}
	#main #form {
		padding: 10px;
	}

	@media (max-width: 767px) {
		h1 {font-size: 24px;}
	}
	#footer {
		background-color: #595959;
		color: #ddd;
	}
	#footer p {
		margin: 0;
	}
	</style>
    <script src="<?php echo base_url('assets/js/jquery-1.11.0.js');?>"></script>
    <script src="<?php echo base_url('assets/js/modernizr.custom.js');?>"></script>
</head>
<body>
<div id="heaedr">
   <img src="<?php echo base_url();?>assets/images/logo.png" alt="">
</div>

<div id="main">
	<div id="form" style="-webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;padding: 15px;background-color: #77ADFF;width: 50%;margin: 20px auto 0 auto;color: #fff;">
        <div class="form-group">
            <label>帳號</label>
            <input name="username" class="form-control" placeholder="請輸入帳號">
        </div>
        <div class="form-group">
            <label>密碼</label>
            <input name="password" type="password" class="form-control" placeholder="請輸入密碼">
        </div>
        <button type="submit" class="btn btn-primary">登入</button>
	</div>
	<div id="cbp-fwslider" class="cbp-fwslider">
		<ul>
			<li><a href="#"><img width="300" src="<?php echo base_url()?>assets/images/1.jpg" alt="img01"/></a></li>
			<li><a href="#"><img width="300" src="<?php echo base_url()?>assets/images/2.jpg" alt="img02"/></a></li>
			<li><a href="#"><img width="300" src="<?php echo base_url()?>assets/images/3.jpg" alt="img03"/></a></li>
			<li><a href="#"><img width="300" src="<?php echo base_url()?>assets/images/4.jpg" alt="img04"/></a></li>
			<li><a href="#"><img width="300" src="<?php echo base_url()?>assets/images/5.jpg" alt="img05"/></a></li>
		</ul>
	</div>
</div>
<div id="footer">
	<p style="text-align:center"><br><br>
	地址： 106 臺北市大安區和平東路二段 134 號 行政大樓7樓701室 師資培育暨就業輔導中心<br>
	Copyright © 國立臺北教育大學師資培育暨就業輔導中心 All Rights Reserved. <br>
	Designed By Yong Huang
	</p>
</div>
<script src="<?php echo base_url('assets/js/jquery.cbpFWSlider.min.js');?>"></script>
<script>
	jQuery(document).ready(function($) {

		/*
		- how to call the plugin:
		$( selector ).cbpFWSlider( [options] );
		- options:
		{
			// default transition speed (ms)
			speed : 500,
			// default transition easing
			easing : 'ease'
		}
		- destroy:
		$( selector ).cbpFWSlider( 'destroy' );
		*/

		$( '#cbp-fwslider' ).cbpFWSlider();


        setInterval( function(){
            if($('.cbp-fwnext').is(":visible")) {
                    $('.cbp-fwnext').click();
            } else{
				$('.cbp-fwdots').find('span').click();
            }
        } ,3000 );

		$('input[name=password]').keypress(function(event) {
			if (event.keyCode == 13) {
				$('button[type=submit]').click();
			}
		})

		$('button[type=submit]').click(function(event) {
			event.preventDefault();
			var username = $('input[name=username]').val();
			var password = $('input[name=password]').val();
			if ((username == '') || (password == '')) {
				$('.alert').show();
				$('#errorMsg').html('您帳號或密碼未填妥')
			}
			$.post('<?= base_url()?>login/ajax_verify_identity', {'username' : username, 'password' : password}, function(rtn, textStatus, xhr) {
				console.log(1234);
				if (!rtn.status) {
					$('.alert').show();
					$('#errorMsg').html(rtn.msg);
				} else {
					document.location.href="<?= base_url()?>game";
				}
			}, 'json');
		});
	});
</script>
</body>
</html>