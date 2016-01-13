<?php
namespace APP\MVC\C;
class TRANSLATION_C {
	public function __construct($REQUEST,$model,$view){
		$UI=\CORE\UI::init();
		switch ($REQUEST->get('act')) {

			case 'add':
				$model->create();
			break;

			case 'get':
				$model->get();
			break;

			case 'update':
				$model->update();
			break;

			case 'del':
				$model->delete();
			break;

			default:
				$UI->pos['main'].=$view->main($model);
			break;
		}
		if(\CORE::init()->is_ajax()){ \DB::init()->close(); exit; }
	}
}