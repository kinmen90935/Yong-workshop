	<?php
		date_default_timezone_set('Asia/Taipei');
		foreach($news as $row) 
		{	
			$row['post_date'] = date('Y/m/d',$row['post_date']);
			$row['title'] = "<a href=".base_url()."admin/edit_news_complete/".$row['n_id'].">".$row['title']."</a>";
			$this->table->add_row($row['post_date'],$row['title'],"<input class='btn btn-primary' data-newsid='354' name='btnView' type='button' value='編輯''>","<input class='btn btn-danger' data-newsid='".$newsdata['n_id']."name='btnDel' type='button' value='刪除'/>");
		}
		echo $this->table->generate();
	?>