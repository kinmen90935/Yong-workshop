<div class="col span_11_of_12">
    <p style="border-bottom-style:solid; border-width:medium; color:#4A67FF;">
      <a class="link" href="<?php echo base_url();?>">首頁</a>><a class="link" href="<?php echo base_url().'news';?>">最新消息</a>
      ><?php echo $title; ?>
    </p>
    <h6>
    	<span class="ui-icon  ui-icon-pencil"></span>
    	<?php echo "教發中心於".date('Y/m/d',$post_date)."發布";?>
    </h6>
    <p>
    	<?php echo htmlspecialchars_decode($content);?>
    </p>
</div>