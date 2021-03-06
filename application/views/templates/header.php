<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>教學卓越計畫</title>
	<?php
		echo "<script src='".base_url()."assets/jquery-1.11.2.min.js'></script>";
		echo "<script src='".base_url()."assets/jquery-ui.min.js'></script>";
		echo "<script src='".base_url()."assets/moodular.js'></script>";
		echo "<link rel='stylesheet' type='text/css' href='".base_url()."assets/jquery-ui.css'></link>";
		echo "<link rel='stylesheet' type='text/css' href='".base_url()."assets/style.css'></link>";
		echo "<link rel='stylesheet' type='text/css' href='".base_url()."assets/base.css'></link>";
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
		$( ".plan" ).tabs();
	});	
  
	</script>
</head>
<body>
	<div id="headerContainer">
	    <div id="header" class="group">
	    	<a id="logo" href="<?=base_url();?>news"><img src="<?=base_url();?>assets/images/logo.png" alt=""></a>
		    <div class="inner">
			    <ul id="nav" class="clearfix">
			        <li class="nav_news active"><a href="<?=base_url()?>news">最新消息</a></li>
			        <li class="nav_introduce"><a href="<?=base_url()?>intro/introduce">計畫介紹</a></li>
			        <li class="nav_plan"><a href="<?=base_url()?>intro/plan">主軸計畫</a></li>
			        <li class="nav_achieve"><a href="<?=base_url()?>achieve">成果專區</a></li>
			        <li class="nav_planExam"><a href="<?=base_url()?>intro/planExam">計畫管考</a></li>
			        <li class="nav_signup"><a href="<?=base_url()?>signup">活動報名</a></li>
			        <li class="nav_contact"><a href="<?=base_url()?>intro/contact">聯絡我們</a></li>
			    </ul>
		    </div>
			</div>
	    </div>
	</div>
	<div id="top_nav">
		<div id="headerArea">
			<ul>
				<li><a href="http://www.ntue.edu.tw" target="_blank" ><span class="ui-icon  ui-icon-home"></span>北教大首頁</a></li>
				<li><a href="http://ctld.ntue.edu.tw/" target="_blank" ><span class="ui-icon  ui-icon-home"></span>教學發展中心首頁</a></li>
			</ul>
		</div>
	</div>
<div class="wrap" id="main">
