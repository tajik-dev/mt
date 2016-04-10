<?php
namespace APP\MVC\V;

class VS_V {

public function main($model){
	//$result='<div><h4>'.\CORE::t('dvs','Data visualization').':</h4></div>';
	$result='';
    \CORE\UI::init()->static_page('vs',true);
	return $result;
}


}