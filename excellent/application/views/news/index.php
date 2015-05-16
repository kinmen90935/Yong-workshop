<div class="col span_7_of_12">
    <p style="border-bottom-style:solid; border-width:medium; color:#4A67FF;">
      <a class="link" href="<?php echo base_url();?>">首頁</a>>最新消息
    </p>
 	<?php 
 		echo $this->table->generate();
		  //添加分頁導航條
 	?>
 	<div class="col span_2_of_12"></div>
 	<div class="col span_9_of_12">
 	<?php
		echo $this->pagination->create_links();
	?>
	</div>
</div>
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