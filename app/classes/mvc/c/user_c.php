<?php
namespace APP\MVC\C;

class USER_C {

public function __construct($REQUEST,$model,$view){
	switch($REQUEST->get('act')){
		case 'login':
			$model->login();
		break;
		case 'logout':
			$model->logout();
		break;
		case 'passwd':
			$UI=\CORE\UI::init();
			$UI->pos['main'].=$view->passwd();
		break;
		case 'manage':
			if(isset($_GET['do'])){
				switch ($_GET['do']) {
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
				}
			} else {
				$UI=\CORE\UI::init();
				$UI->pos['main'].=$view->manage($model);
			}
		break;
	}
	if(\CORE::init()->is_ajax()){ \DB::init()->close(); exit; }
}

}