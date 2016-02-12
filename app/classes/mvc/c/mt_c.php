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
			$model->read();
		break;
		case 'update':
			$model->update();
		break;
		case 'delete':
			$model->delete();
		break;
		case 'view':
			$UI->pos['main'].=$view->mt($model);
		break;
		default:
			$UI->pos['main'].=$view->main($model);
		break;
	}
	if(\CORE::init()->is_ajax()){ \DB::init()->close(); exit; }
}

}