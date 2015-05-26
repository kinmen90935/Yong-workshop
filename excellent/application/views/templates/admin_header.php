<html>
	<head>
		<title>教學卓越後台首頁</title>
		<?php
			echo "<script src='".base_url()."assets/jquery-1.11.2.min.js'></script>";
			echo "<script src='".base_url()."assets/jquery-ui.min.js'></script>"; 
			echo "<link rel='stylesheet' type='text/css' href='".base_url()."assets/jquery-ui.css'></link>";
			echo "<link rel='stylesheet' type='text/css' href='".base_url()."assets/style.css'></link>";
			echo "<link rel='stylesheet' type='text/css' href='".base_url()."assets/base.css'></link>";
			echo "<link rel='stylesheet' type='text/css' href='".base_url()."assets/layout.css'></link>";
		?>
	</head>
	<body>
		<style type="text/css">
			.admin_aside{
				background-color: #B9D9EB;
				padding: 40px 40px 40px 40px;
			}
		</style>
		<div>
		    <div id="header" class="group">
		    	<a id="logo" href="<?=base_url();?>news"><img src="<?=base_url();?>assets/images/logo.png" alt="" width="10%"></a>
				<h1 class="back-title">
					教學卓越後台首頁
				</h1 >
		        <div id="headerArea">
		            <a href="http://www.ntue.edu.tw" target="_blank" ><span class="ui-icon  ui-icon-home"></span>北教大首頁</a>
		            <a href="http://ctld.ntue.edu.tw/" target="_blank" ><span class="ui-icon  ui-icon-home"></span>教學發展中心首頁</a>
					<a href="<?=base_url();?>admin/unset_session"><span class="ui-icon  ui-icon-extlink"></span>登出</a>
		        </div>
			</div>
			<div class="inner">
				<div class="col span_3_of_12">
					<div class="admin_aside">
						<div class="admin_aside_user">
							<span class="ui-icon  ui-icon-person user-icon"></span><?php echo $nickname;?>
						</div>
						<div class="admin_aside_content">
							<div>
								<ul class="toggle">
								    <li><a href="add_news.php"><span class="ui-icon   ui-icon-document"></span>新增消息</a></li>
								    <li><a href="edit_news.php"><span class="ui-icon  ui-icon-document-b"></span>修改消息</a></li>
								    <li><a href="edit_link.php"><span class="ui-icon  ui-icon-flag"></span>成果專區</a></li>
								    <li><a href="edit_rules.php"><span class="ui-icon ui-icon-plusthick"></span>活動報名新增</a></li>
								    <li><a href="sort_file.php"><span class="ui-icon  ui-icon-pencil"></span>活動報名修改</a></li>
								  </ul>
							</div>
						</div>
					</div>
				</div>
			