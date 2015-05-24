<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php
		echo "<script src='".base_url()."assets/jquery-1.11.2.min.js'></script>";
		echo "<script src='".base_url()."assets/jquery-ui.min.js'></script>";
		echo "<script src='".base_url()."assets/moodular.js'></script>";
		echo "<link rel='stylesheet' type='text/css' href='".base_url()."assets/jquery-ui.css'></link>";
		echo "<link rel='stylesheet' type='text/css' href='".base_url()."assets/style.css'></link>";
		echo "<link rel='stylesheet' type='text/css' href='".base_url()."assets/base.css'></link>";
		echo "<link rel='stylesheet' type='text/css' href='".base_url()."assets/rita.css'></link>";
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
<body style="height:90%;">
	<div id="headerContainer">
	    <div id="header" class="group">
	    	<a id="logo" href="<?=base_url();?>news"><img src="<?=base_url();?>assets/images/logo.png" alt="" width="10%"></a>
	        <div id="headerArea">
	            <a href="http://www.ntue.edu.tw" target="_blank" ><span class="ui-icon  ui-icon-home"></span>北教大首頁</a>
	            <a href="http://ctld.ntue.edu.tw/" target="_blank" ><span class="ui-icon  ui-icon-home"></span>教學發展中心首頁</a>
	        </div>

			<div class="clearfix">
			    <div class="inner">
				    <ul id="nav" class="clearfix">
				        <li><a href="<?=base_url()?>news">最新消息</a></li>
				        <li><a href="<?=base_url()?>intro/introduce">計畫介紹</a></li>
				        <li><a href="<?=base_url()?>intro/plan">主軸計畫</a></li>
				        <li><a href="<?=base_url()?>achieve">成果專區</a></li>
				        <li><a href="<?=base_url()?>intro/planExam">計劃管考</a></li>
				        <li><a href="<?=base_url()?>signup">活動報名</a></li>
				        <li><a href="<?=base_url()?>intro/contact">聯絡我們</a></li>
				    </ul>
			    </div>
			</div>

	    </div>

    
	</div>

<div class="wrap" id="main">
