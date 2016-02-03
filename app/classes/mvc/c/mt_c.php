<?php
namespace APP\MVC\C;

class MT_C {


public function __construct($REQUEST,$model,$view){
	$UI=\CORE\UI::init();
	switch ($REQUEST->get('act')) {
		case 'create':
			$model->create();
		break;
		case 'read':
			
		break;
		case 'update':
			
		break;
		case 'del':
			
		break;
		default:
			$UI->pos['main'].=$view->main($model);
		break;
	}
	if(\CORE::init()->is_ajax()){ \DB::init()->close(); exit; }
}

}