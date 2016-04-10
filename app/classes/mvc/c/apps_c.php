<?php
namespace APP\MVC\C;

class APPS_C {


public function __construct($REQUEST,$model,$view){
	$UI=\CORE\UI::init();
	switch ($REQUEST->get('act')) {

		case 'list':
			$UI->pos['main'].=$view->apps_list($model);
		break;

		case 'create':
			$UI->pos['main'].=$model->save();
		break;

		case 'status':
			$UI->pos['main'].=$view->status($model);
		break;

		case 'check':
			$model::check();
		break;

		case 'read':
			$model::read();
		break;

		case 'update':
			$model::update();
		break;

		case 'queue':
			$queue=$model::queue();
			echo json_encode(array('queue'=>$queue));
		break;

		default:
			$UI->pos['main'].=$view->app_frm($model);
		break;
	}
	if(\CORE::init()->is_ajax()){ \DB::init()->close(); exit; }
}

}