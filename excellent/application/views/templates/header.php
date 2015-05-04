<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title ?> - CodeIgniter 2 教學</title>
	<?php
		echo "<script src='".base_url()."/assets/jquery-1.11.2.min.js'></script>";
		echo "<script src='".base_url()."/assets/jquery-ui.min.js'></script>";
		echo "<link rel='stylesheet' type='text/css' href='".base_url()."/assets/jquery-ui.css'></link>";
		//echo "<link rel='stylesheet' type='text/css' href='".base_url()."/assets/base.min.css'></link>";
		//echo "<link rel='stylesheet' type='text/css' href='".base_url()."/assets/style.min.css'></link>";
		echo "<link rel='stylesheet' type='text/css' href='".base_url()."/assets/style.css'></link>";
		echo "<link rel='stylesheet' type='text/css' href='".base_url()."/assets/base.css'></link>";
		echo "<link rel='stylesheet' type='text/css' href='".base_url()."/assets/rita.css'></link>";
	?>
	<script>
	$(function() {
	    var pull        = $('#pull');
	        menu        = $('nav ul');
	        menuHeight  = menu.height();

	    $(pull).on('click', function(e) {
	        e.preventDefault();
	        menu.slideToggle();
	    });

		$(window).resize(function(){
		    var w = $(window).width();
		    if(w > 320 && menu.is(':hidden')) {
		        menu.removeAttr('style');
		    }
		});
		$( ".introduce" ).tabs();
	});
</script>
</head>
<body style="height:90%;">
	<div id="headerContainer">
	    <div id="header" class="group">
	    	<a id="logo" href="<?=base_url();?>home"><img src="<?=base_url();?>/assets/images/logo.png" alt="" width="10%"></a>
	        <div id="headerArea">
	            <a href="http://www.ntue.edu.tw" target="_blank" ><span class="ui-icon  ui-icon-home"></span>北教大首頁</a>
	        </div>
	    </div>
	</div>
	<div id="pull" style="display:none;"><i class="fa fa-bars"></i>  選單</div>
	<div id="nav" class="clearfix">
	    <div class="inner">
	    <ul class="clearfix">
	        <li><a href="news">最新消息</a></li>
	        <li><a href="introduce">計畫介紹</a></li>
	        <li><a href="plan">主軸計畫</a></li>
	        <li><a href="files.php">成果專區</a></li>
	        <li><a href="signuplist.php">計劃管考</a></li>
	        <!-- <li><a href="achievement.php">活動成果</a></li> -->
	        <li><a href="link.php">活動報名</a></li>
	<!--         <li><a href="epaperlist.php">電子報</a></li> -->
	        <li><a href="message.php">聯絡我們</a></li>
	    </ul>
	    </div>
	</div>