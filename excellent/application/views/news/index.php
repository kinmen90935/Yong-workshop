<div class="col span_3_of_12"></div>
<div class="col span_6_of_12">
 	<?php 
 		echo $this->table->generate();
		  //添加分頁導航條
		echo $this->pagination->create_links();
	?>
</div>