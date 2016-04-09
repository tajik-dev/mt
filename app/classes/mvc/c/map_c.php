<?php
namespace APP\MVC\C;

class MAP_C {


public function __construct($REQUEST,$model,$view){
	$UI=\CORE\UI::init();
	switch ($REQUEST->get('act')) {

		case 'v2':
			$UI->pos['main'].=$view->main($model);
		break;

		case 'mtlist':
			echo $view->mt_list($model);
		break;

		case 'getcoord':
			$model->get_coord();
		break;

		default:
			$UI->pos['main'].=$view->main($model);
		break;
	}
	if(\CORE::init()->is_ajax()){ \DB::init()->close(); exit; }
}

}