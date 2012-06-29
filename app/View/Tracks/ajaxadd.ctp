<?php 
	if(!is_array($status)) {
		echo $status;
	} else {
		echo $status['title'][0]; 
	}
?>