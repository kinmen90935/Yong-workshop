	<?php
		date_default_timezone_set('Asia/Taipei');
		foreach($news as $row) 
		{	
			$row['post_date'] = date('Y/m/d',$row['post_date']);
			$row['title'] = "<a href=".base_url()."news/news_complete/".$row['n_id'].">".$row['title']."</a>";
			//$this->table->add_row($row['post_date'],$row['title']);
			echo "<p>".$row['post_date'].$row['title']."</p>";
		}
		//echo $this->table->generate();
	?>