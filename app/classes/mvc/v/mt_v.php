<?php
namespace APP\MVC\V;

class MT_V {

public function main($model){
	$lang=\CORE::lng();
	$result='<div><h4>'.\CORE::t('mt','Образовательные учреждения').':</h4></div>';
	$mt=$model->get_mt();
	foreach ($mt as $mt_id => $mt_val) {
		$result.=$mt_val['mt-name-'.$lang].'<br>';
	}
	return $result;
}

}