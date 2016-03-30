<?php
namespace APP\MVC\C;

class APPS_C {


public function __construct($REQUEST,$model,$view){
	$UI=\CORE\UI::init();
	switch ($REQUEST->get('act')) {

		case 'create':
			//$UI->pos['main'].=$view->app_frm($model);
		break;

		case 'status':
			$UI->pos['main'].=$view->status($model);
		break;

		default:
			$UI->pos['main'].=$view->app_frm($model);
		break;
	}
	if(\CORE::init()->is_ajax()){ \DB::init()->close(); exit; }
}

}