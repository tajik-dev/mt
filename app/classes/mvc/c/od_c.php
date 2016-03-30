<?php
namespace APP\MVC\C;

class OD_C {


public function __construct($REQUEST,$model,$view){
	$UI=\CORE\UI::init();
	switch ($REQUEST->get('act')) {

		case 'mt':
			$model->get_mt();
		break;

		case 'ofrm':
			$model->ofrm();
		break;

		default:
			$UI->pos['main'].=$view->main($model);
		break;
	}
	if(\CORE::init()->is_ajax()){ \DB::init()->close(); exit; }
}

}