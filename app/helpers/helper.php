<?php
namespace App\helpers;

function message (string $string = '') {
	if($string == ''){
		return 'default message';
	}else{
		return $string;
	}
	
}
?>