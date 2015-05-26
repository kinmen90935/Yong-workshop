<div id="backtotop">↑</div>
</div> <!-- wrap -->
<div id="footerContainer" class="wrap">
<footer>
    <div class="section group">
      <div class="col span_7_of_12">
        <div style="text-align: center;font-size: 12px;line-height: 1.5em;">
          <p>
            ©2015 National Taipei University of Education. All Rights Reserved.<br>
		        地址：10671臺北市大安區和平東路二段134號 行政大樓612室 教學發展中心<br>
            <i class="fa fa-phone fa-1x"></i>&nbsp;(02)2732-1104 分機 82017, 82154, 82155, 82027, 82217, 82254, 82255, 8225&nbsp;&nbsp;
            <i class="fa fa-fax fa-1x"></i>&nbsp;(02)2733-8973&nbsp;
          </p>
        </div>
      </div>
      <div class="col span_4_of_12">
        Powered by Peng-Yan Sie, Pei-Ru Tang&nbsp;&nbsp;<a href="<?=base_url()?>admin"><i class="fa fa-user fa-1x"></i>&nbsp;後臺管理</a>
        <p>瀏覽人次：
        	<span style="font-size:14px;">
	        	<?php
					$load_count = file_get_contents("counts.txt"); 
					if(empty($_COOKIE["counts"])){
					  setcookie("counts","true",time()+10);
					  $load_count ++;
					  file_put_contents("counts.txt",$load_count);
					}
					echo $load_count;
				?>
			</span>
		</p>
      </div>
      <div class="col span_1_of_12"></div>
    </div>
</footer>
</div>
<script type="text/javascript">
  $('#moodular').moodular({
  /* core parameters */
    // effects separated by space
    effects: 'mosaic',
    // controls separated by space
    controls: 'keys buttons',
    // if you want some yummy transition
    easing: '',
    // step 
    step: 10,
    // selector is to specify the children of your element (tagName)
    selector: 'li',
    // if timer is 0 the carrousel isn't automatic, else it's the interval in ms between each step
    timer: 5000,
    // speed is the time in ms of the transition
    speed: 2000,
    // queuing animation ?
    queue: false,
  /* parameters for controls or effects */
    // keys control
    keyPrev: 37, // left key
    keyNext: 39, // right key
    // buttons control
    buttonPrev: jQuery('#prev'),
    buttonNext: jQuery('#next'),
    // mosaic effects
    slices: [10, 4],
    mode : 'random'
  });
  //回頂端按鈕   
    $("#backtotop").click(function(){
        jQuery("html,body").animate({
            scrollTop:0
        },500);
    });
    $(window).scroll(function() {
        if ( $(this).scrollTop() > 300){
            $("#backtotop").fadeIn("fast");
        } else {
            $("#backtotop").stop().fadeOut("fast");
        }
    });
</script>
</body></html>