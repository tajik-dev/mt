<?php
namespace APP\MVC\C;

class TEST_C {


public function __construct($REQUEST,$model,$view){
	$UI=\CORE\BC\UI::init();
	switch ($REQUEST->get('act')) {

		case 'test':
			$UI->pos['main'].=$view->main($model);
		break;

		default:
			$UI->pos['main'].=$view->main($model);
		break;
	}
	if(\CORE::init()->is_ajax()){ \DB::init()->close(); exit; }
}

}