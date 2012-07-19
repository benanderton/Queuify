<?php 
	if(!is_array($status)) {
		echo $status;
	} else {
		echo $status['track_id'][0]; 
	}
?>