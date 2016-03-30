<?php
namespace APP\MVC\V;

class APPS_V {


public function app_frm($model){
	$lang=\CORE::lng();
	$UI=\CORE\UI::init();
	if($lang=='ru'){
		$lng['app_frm']='Форма заявки';
		$lng['rayon']='Форма заявки';
	} else {
		$lng['app_frm']='Форма заявки';
		$lng['rayon']='Форма заявки';
	}	
	\CORE::add_lng($lng);
	$geo=\APP\MVC\M\GEO_M::get_available_geo(1);
	$mt_types=\APP\MVC\M\MT_M::get_mt_types();
	$result='<div class="row"><div class="col-md-6 col-md-offset-3">
	<h2 class="text-center text-danger">'.\CORE::t('app_frm','Application form').'</h2>
	<form id="apps_frm" action="./?c=apps&act=create" method="post">
			<input type="hidden" id="frmhash" name="frmhash" value="'.md5(time()).'">
			<div id="myRegBody" class="modal-body">

			<h4 class="text-center text-primary">'.\CORE::t('choosefac','Выбор образовательного учреждения').'</h4><br>
			<div class="form-group">
				<label for="geo">'.\CORE::t('rayon','Район').':</label><br>
				'.$UI->html_list($geo,'',' id="geo" class="form-control"').'
			</div>
			<div class="form-group">
				<label for="mt_type">'.\CORE::t('mt_type','Тип учреждения').':</label><br>
				'.$UI->html_list($mt_types,'',' id="mt_type" class="form-control"').'
			</div>
			<div class="form-group">
				<label for="mt">'.\CORE::t('mt','Учреждение').':</label><br>
				<span id="mtbox"></span>
			</div>

			<br><h4 class="text-center text-primary">'.\CORE::t('childinfo','Данные ребенка').'</h4><br>
			<div class="form-group">
				<label for="childname">'.\CORE::t('name','Имя').'</label>
				<input type="text" class="form-control" id="nom" name="nom" placeholder="'.\CORE::t('name','Имя').'">
			</div>
			<div class="form-group">
				<label for="childsurname">'.\CORE::t('surname','Фамилия').'</label>
				<input type="text" class="form-control" id="nasab" name="nasab" placeholder="'.\CORE::t('surname','Фамилия').'">
			</div>
			<div class="form-group">
				<label for="childfathername">'.\CORE::t('fathername','Отчество').'</label>
				<input type="text" class="form-control" id="nomi_padar" name="nomi_padar" placeholder="'.\CORE::t('fathername','Отчество').'">
			</div>
			<div class="row">
				<div class="form-group col-sm-3">
					<label for="birthday">'.\CORE::t('birthday','Дата рождения').': </label>
					<input type="text" class="form-control" id="birthday" name="birthday" placeholder="d.m.Y">			
				</div>
			</div>
			<div class="form-group">
				<label for="shahodatnoma">'.\CORE::t('shahodatnoma','Номер свидетельства о рождении (метрики)').'</label>
				<input type="text" class="form-control" id="shahodatnoma" name="shahodatnoma" placeholder="'.\CORE::t('number','номер').'">
			</div>

			<br><h4 class="text-center text-primary">'.\CORE::t('volidoninfo','Данные родителей (опекунов)').'</h4><br>
			<div class="form-group">
				<label for="vname">'.\CORE::t('fio','ФИО').'</label>
				<input type="text" class="form-control" id="nomi_volidon" name="nomi_volidon" placeholder="'.\CORE::t('fio','ФИО').'">
			</div>
			<div class="form-group">
				<label for="address">'.\CORE::t('adres','Адрес').'</label>
				<input type="text" class="form-control" id="address" name="address" placeholder="'.\CORE::t('adres','Адрес').'">
			</div>
			<div class="form-group">
				<label for="email">'.\CORE::t('email','E-mail').'</label>
				<input type="text" class="form-control" id="email" name="email" placeholder="'.\CORE::t('email','E-mail').'">
			</div>
			<div class="form-group">
				<label for="phone">'.\CORE::t('telefon','Телефон').'</label>
				<input type="text" class="form-control" id="phone" name="phone" placeholder="'.\CORE::t('telefon','Телефон').'">
			</div>

			</div>
			<div class="text-center">
				<br>
				<input type="submit" id="makereg" class="btn btn-danger" value="'.\CORE::t('send','Отправить заявку').'">
				<br>
				<br>
			</div>
		</form>
	';
	$result.='</div></div>';
$UI->pos['js'].='
<script>
$(document).ready(function(){

function update_mt_list(){
	
}

});
</script>
';


	return $result;
}

public function xlist($array,$id='',$sel=0,$cl=true){
	$result='';
	if(count($array)>0){
		if($cl) {$c=' class="form-control"';} else {$c='';}
		$result.='<select'.$c.' id="'.$id.'" name="'.$id.'">'."\n";
		foreach ($array as $k => $v) {
			if($sel==$k) {$s=' selected="selected"';} else {$s='';}
			$result.='<option value="'.$k.'"'.$s.'>'.$v."</option>\n";
		}
		$result.="</select>\n";
	}
	return $result;
}

public static function monthdays($month=0,$year=0){
    if(isset($_GET['month'])) $month=(int) $_GET['month'];
    if(isset($_GET['year'])) $year=(int) $_GET['year'];
    $number=cal_days_in_month(CAL_GREGORIAN, $month, $year);
    for($i=1;$i<=$number;$i++) {
       $result[(string) $i]=$i;
    }
    return $result;
}



}