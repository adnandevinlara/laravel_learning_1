<?php
function message (string $string = '') {
	if($string == ''){
		return 'default message';
	}else{
		return $string;
	}
	
}
?>