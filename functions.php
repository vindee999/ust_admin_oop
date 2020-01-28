<?php 

	function formate_date($date){
		return date('F d, Y g:i:a',strtotime($date));
	}

?>