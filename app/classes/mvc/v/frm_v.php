<?php
namespace APP\MVC\V;

class FRM_V {

public function main($model,$act=''){
	$UI=\CORE\UI::init();
	$result=''; $lang=\CORE::lng();
	if($act==''){
		$result='<div><h4>Forms:</h4></div>';
	} else {
		$path=DIR_APP.'/forms/'.$act.'.php';
		if(is_readable($path)){
			include($path);
		}
	}
	return $result;
}


}