<?php
namespace APP\MVC\V;

class FRM_V {

public function main($model,$act=''){
	$UI=\CORE\UI::init();
	$result=''; $lang=\CORE::lng();
	if($act==''){
		$result='<div><h4>'.\CORE::t('forms','Формы').':</h4></div>';
		if($model->selected_mt==0){
			$result.='Для начала необходимо выбрать учебное учреждение, а затем форму для заполнения:';
			$mt_m = new \APP\MVC\M\MT_M();
			$mt = $mt_m->get_mt();
			
		} else {
			$result.='Выберите форму для заполнения.';

		}
	} else {
		if($model->selected_mt==0){
			header("Location: ./?c=frm"); exit;
		}
		if(isset($_GET['part'])){
			$part=(int) $_GET['part'];
			if($part>0){$part='_part'.$part;} // parts
		} else {$part='';}
		$path=DIR_APP.'/forms/'.$act.$part.'.php';
		if(is_readable($path)){ include($path); }
	}
	return $result;
}


}