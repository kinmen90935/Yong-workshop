<?php
	$this->load->view('templates/header');
?>
<script>
	console.log("sc");
	function ajax_news_list (page) {
		if(page==null)
			page=1;
		else
			page = page;
		console.log("function_page");
		$.ajax({
	            url : "news/ajax_news_list",
	            type: "POST",
	            data : {'page' : page},
	            dataType: 'json',
	            success:function(rtn, textStatus, jqXHR) {
	              if (rtn.status) {
	                $('#news').html(rtn.news);
					$('#pg').html(rtn.page);
	                console.log("if");
	                console.log(page);

	              } else {
	              	console.log("else");
	              	console.log(jqXHR.responseText);
	              }
	            },
	            error: function(jqXHR, textStatus, errorThrown) {
	              console.log(jqXHR.responseText);
	            }
	          });
	}

	$(document).ready(function () {
		ajax_news_list();

		$('body').on('click','.pagination li',function(event) {
			event.preventDefault();

			$('.pagination li').find('a').removeClass('active');
			$(this).find('a').addClass('active');
			
			var a = $(this).data('page');
			console.log($(this).data('page'));
			ajax_news_list(a);
		})
	});
</script>
<title><?php echo $title;?></title>
<div class="top_slider">
	<ul id="moodular">			
		<li><img src="<?= base_url('/assets/images/image_3.jpg');?>">123</li>
		<li><img src="<?= base_url('/assets/images/image_2.jpg');?>">123</li>
		<li><img src="<?= base_url('/assets/images/image_1.jpg');?>">123</li>
	</ul>
</div>

<div class="inner">
	<div class="col span_8_of_12">
		<div class="col span_12_of_12">
		    <p style="border-bottom-style:solid; border-width:medium; color:#4A67FF;">
		      首頁
		    </p>
		</div>
		<div id="news">
			news
		</div>	
		<div id="pg" data-role="page">
			pg
		</div>
	</div>
	<div class="col span_4_of_12">
		<p style="border-bottom-style:solid; border-width:medium; color:#4A67FF;">
		  <span class="ui-icon ui-icon-play" ></span>
		  職涯百工圖
		</p>
		<div class="block">
	        <p>職涯百工圖短片提供了各系所未來職涯發展的簡介，以訪問畢業學長姐及系所介紹的方式，用輕鬆易懂又深入的短片，引領同學瞭解各系所的出路，提供同學畢業後的方向指引。</p>
	        <style type="text/css">
		        .video-container {
		            position: relative;
		            padding-bottom: 56.25%;
		            padding-top: 30px; height: 0; overflow: hidden;
		        }
		        .video-container iframe,
		        .video-container object,
		        .video-container embed {
		            position: absolute;
		            top: 0;
		            left: 0;
		            width: 100%;
		            height: 100%;
		        }
		        .fb-like-box, .fb-like-box span, .fb-like-box.fb_iframe_widget span iframe {
		            width: 100% !important;
		        }
	        </style>
	        <div class="video-container">
	            <iframe src="http://www.youtube.com/embed/wuSV9uPl_UY?rel=0" frameborder="0" width="380" height="214"></iframe>
	        </div>
	        <div><i class="fa fa-arrow-circle-right"></i>&nbsp;<a style="line-height: 2.5em;" href="http://www.ntue.edu.tw/ppp" target="_blank"><span class="ui-icon ui-icon-link" ></span>更多百工圖..</a></div>
	    </div>
	    <div class="block">
	        <h2><i class="fa fa-facebook fa-1x"></i>&nbsp;臉書連結</h2>
	        <div>
	            <div id="fb-root"></div>
	            <script>(function(d, s, id) {
	              var js, fjs = d.getElementsByTagName(s)[0];
	              if (d.getElementById(id)) return;
	              js = d.createElement(s); js.id = id;
	              js.src = "//connect.facebook.net/zh_TW/sdk.js#xfbml=1&appId=328703957264466&version=v2.0";
	              fjs.parentNode.insertBefore(js, fjs);
	            }(document, 'script', 'facebook-jssdk'));</script>
	            <div class="fb-like-box" data-href="https://www.facebook.com/pages/%E5%9C%8B%E7%AB%8B%E8%87%BA%E5%8C%97%E6%95%99%E8%82%B2%E5%A4%A7%E5%AD%B8/272630449513425?fref=ts" data-colorscheme="light" data-width="380" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
	        </div>
	    </div>
	</div>
</div>
<!-- inner -->

<?php
	$this->load->view('templates/footer');
?>

<style>
	#page_nav
	{
		float: left;
		width:100%;
		
		display: inline-block;
		text-align: center;
	}
	#first_tag
	{
	  cursor: pointer;
	  float: left;
	  margin-left: 10px;
	  border: #a2a2a2 1px solid;
	  padding: 4px;
	}
	#last_tag
	{
	  cursor: pointer;
	  float: left;
	  margin-left: 10px;
	  border: #a2a2a2 1px solid;
	  padding: 4px;
	}
	#next_tag
	{
	  cursor: pointer;
	  float: left;
	  margin-left: 10px;
	  border: #a2a2a2 1px solid;
	  padding: 4px;
	}
	#prev_tag
	{
	  cursor: pointer;
	  float: left;
	  margin-left: 10px;
	  border: #a2a2a2 1px solid;
	  padding: 4px;
	}
	#cur_tag
	{
	  cursor: pointer;
	  float: left;
	  margin-left: 10px;
	  border: #a2a2a2 1px solid;
	  padding: 4px;
	  background-color: blue;
	  color: white;
	}
	#num_tag
	{
	  cursor: pointer;
	  float: left;
	  margin-left: 10px;
	  border: #a2a2a2 1px solid;
	  padding: 4px;
	}

	#first_tag:hover
	{
	  cursor: pointer;
	  float: left;
	  margin-left: 10px;
	  border: #006699 1px solid;
	  padding: 4px;
	}
	#last_tag:hover
	{
	  cursor: pointer;
	  float: left;
	  margin-left: 10px;
	  border: #006699 1px solid;
	  padding: 4px;
	}
	#next_tag:hover
	{
	  cursor: pointer;
	  float: left;
	  margin-left: 10px;
	  border: #006699 1px solid;
	  padding: 4px;
	}
	#prev_tag:hover
	{
	  cursor: pointer;
	  float: left;
	  margin-left: 10px;
	  border: #006699 1px solid;
	  padding: 4px;
	}
	#num_tag:hover
	{
	  cursor: pointer;
	  float: left;
	  margin-left: 10px;
	  border: #006699 1px solid;
	  padding: 4px;
	}
</style>

