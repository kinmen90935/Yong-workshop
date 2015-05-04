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
        Powered by Peng-Yan Sie, Pei-Ru Taung&nbsp;&nbsp;<a href="login_form.html"><i class="fa fa-user fa-1x"></i>&nbsp;後臺管理</a>
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
    </div>
</footer>
</div>
</body></html>