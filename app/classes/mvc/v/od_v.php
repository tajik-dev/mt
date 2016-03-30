<?php
namespace APP\MVC\V;

class OD_V {

public function main($model){
	$result='';
	//$result='<div><h4>'.\CORE::t('od','Open Data').'</h4></div>';
	\CORE\UI::init()->static_page('od',true);
	return $result;
}


}