<?php
namespace APP\MVC\V;

class FRM_V {

public function main($model){
	$result='<div><h4>FRM</h4></div>';

	return $result;
}

public function km1($model){
	$result='';
	$path=DIR_APP.'/forms/km1_'.\CORE::init()->lng().'.php';
	if(is_readable($path)){
		$result=file_get_contents($path);
	}
	return $result;
}

}