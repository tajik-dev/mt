<?php
namespace APP\MVC\C;

class FRM_C {


public function __construct($REQUEST,$model,$view){
	$UI=\CORE\UI::init();
	switch ($REQUEST->get('act')) {
		default:
			$UI->pos['main'].=$view->main($model,$REQUEST->get('act'));
		break;
	}
	if(\CORE::init()->is_ajax()){ \DB::init()->close(); exit; }
}

}