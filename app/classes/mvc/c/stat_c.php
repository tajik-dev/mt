<?php
namespace APP\MVC\C;

class STAT_C {


public function __construct($REQUEST,$model,$view){
	$UI=\CORE\UI::init();
	switch ($REQUEST->get('act')) {

		case 'test':

		break;

		default:
			$UI->pos['main'].=$view->main($model);
		break;
	}
	if(\CORE::init()->is_ajax()){ \DB::init()->close(); exit; }
}

}