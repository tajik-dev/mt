<?php
namespace APP\MVC\C;

class USERS_C {

public function __construct($REQUEST,$model,$view){
	switch($REQUEST->get('act')){
		default:
			$UI=\CORE\UI::init();
			$UI->pos['main'].=$view->main($model);
		break;
	}
	if(\CORE::init()->is_ajax()){ \DB::init()->close(); exit; }
}

}