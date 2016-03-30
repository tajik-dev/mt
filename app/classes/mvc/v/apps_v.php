<?php
namespace APP\MVC\V;

class APPS_V {


public function app_frm($model){
	$lang=\CORE::lng();
	$UI=\CORE\UI::init();
	if($lang=='ru'){
		$lng['app_frm']='Форма заявки';
		$lng['rayon']='Район';
		$lng['mt']='Учебное учреждение';
		$lng['name']='Имя';
		$lng['surname']='Фамилия';
		$lng['fathername']='Отчетсво';
		$lng['birthday']='Дата рождения';
		$lng['shahodatnoma']='Номер свидетельства о рождении';
		$lng['fio']='ФИО';
		$lng['mt_choice']='Выбор образовательного учреждения';
		$lng['kid_info']='Данные ребенка';
		$lng['volidoninfo']='Данные родителей (опекунов)';
		$lng['send']='Отправить заявку';
	} else {
		$lng['app_frm']='Шақли дархост';
		$lng['rayon']='Ноҳия';
		$lng['mt']='Муассисаи таълими';
		$lng['name']='Ном';
		$lng['surname']='Насаб';
		$lng['fathername']='Номи падар';
		$lng['birthday']='Рузи таввалуд';
		$lng['shahodatnoma']='Рақами шаходатнома';
		$lng['fio']='Номи пурра';
		$lng['mt_choice']='Имтихоби муассисаи таълими';
		$lng['kid_info']='Маълумоти кӯдак';
		$lng['volidoninfo']='Маълумоти волидон';
		$lng['send']='Фиристодан';
	}	
	\CORE::add_lng($lng);
	$geo=\APP\MVC\M\GEO_M::get_available_geo(1);
	$mt_types=\APP\MVC\M\MT_M::get_mt_types();
	$result='<div class="row"><div class="col-md-6 col-md-offset-3">
	<h2 class="text-center text-danger">'.\CORE::t('app_frm','Application form').'</h2>
	<div style="display:none;"><img src="./ui/img/small_loader.gif" border="0"></div>
	<form id="apps_frm" action="./?c=apps&act=create" method="post">
			<input type="hidden" id="frmhash" name="frmhash" value="'.md5(time()).'">
			<div id="myRegBody" class="modal-body">

			<h4 class="text-center text-primary">'.\CORE::t('mt_choice','Выбор образовательного учреждения').'</h4><br>
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

			<br><h4 class="text-center text-primary">'.\CORE::t('kid_info','Данные ребенка').'</h4><br>
			<div class="form-group">
				<label for="name">'.\CORE::t('name','Имя').' *</label>
				<input type="text" class="form-control" id="name" name="name" placeholder="'.\CORE::t('name','Имя').'" required>
			</div>
			<div class="form-group">
				<label for="surname">'.\CORE::t('surname','Фамилия').' *</label>
				<input type="text" class="form-control" id="surname" name="surname" placeholder="'.\CORE::t('surname','Фамилия').'" required>
			</div>
			<div class="form-group">
				<label for="fname">'.\CORE::t('fathername','Отчество').' *</label>
				<input type="text" class="form-control" id="fname" name="fname" placeholder="'.\CORE::t('fathername','Отчество').'" required>
			</div>
			<div class="form-group">
				<label for="birthday">'.\CORE::t('birthday','Дата рождения').' *</label>
				<div class="input-group date datepicker col-xs-3">
					<input type="text" class="form-control" id="birthday" name="birthday" placeholder="d.m.Y" maxlength="10" required>
					<span class="input-group-addon" style="cursor:pointer;">
			            <span class="glyphicon glyphicon-calendar"></span>
			        </span>
			    </div>
			</div>
			<div class="form-group">
				<label for="shahodatnoma">'.\CORE::t('shahodatnoma','Номер свидетельства о рождении (метрики)').' *</label>
				<input type="text" class="form-control" id="shahodatnoma" name="shahodatnoma" placeholder="№" required>
			</div>

			<br><h4 class="text-center text-primary">'.\CORE::t('volidoninfo','Данные родителей (опекунов)').'</h4><br>
			<div class="form-group">
				<label for="parentfio">'.\CORE::t('fio','ФИО').' *</label>
				<input type="text" class="form-control" id="parentfio" name="parentfio" placeholder="'.\CORE::t('fio','ФИО').'" required>
			</div>
			<div class="form-group">
				<label for="address">'.\CORE::t('address','Адрес').' *</label>
				<input type="text" class="form-control" id="address" name="address" placeholder="'.\CORE::t('address','Адрес').'" required>
			</div>
			<div class="form-group">
				<label for="email">'.\CORE::t('email','E-mail').'</label>
				<input type="text" class="form-control" id="email" name="email" placeholder="'.\CORE::t('email','E-mail').'">
			</div>
			<div class="form-group">
				<label for="phone">'.\CORE::t('phone','Телефон').' *</label>
				<input type="text" class="form-control" id="phone" name="phone" placeholder="'.\CORE::t('phone','Телефон').'" required>
			</div>

			</div>
			<div class="text-center">
				<br>
				<input type="submit" id="send" class="btn btn-danger" value="'.\CORE::t('send','Отправить заявку').'">
				<br>
				<br>
			</div>
		</form>
	';
	$result.='</div></div>';
$UI->pos['link'].='<link href="'.PATH_UI.'/ext/bootstrap_datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">';
$UI->pos['js'].='<script type="text/javascript" src="'.PATH_UI.'/ext/bootstrap_datepicker/js/bootstrap-datepicker.min.js"></script>';
$UI->pos['js'].='
<script>
$(document).ready(function(){

function IsJsonString(str) {
	try { JSON.parse(str); } catch(e) { return false; }
	return true;
}

$(".datepicker").datepicker({
    format: "dd.mm.yyyy"
});

function mt_list(mt){
	var my_list="<select id=\"mt\" name=\"mt\" class=\"form-control\">";
	for (i = 0; i < mt.length; i++) { 
	    my_list += "<option value=\"" + mt[i][0] + "\">" + mt[i][5] + "</option>\n";
	}
	my_list += "</select>";
	$("#mtbox").html(my_list);
}

function update_mt_list(){
	var f_geo=$("#geo").val();
	var f_type=$("#mt_type").val();
	$("#mtbox").html("<img src=\"./ui/img/small_loader.gif\" border=\"0\">");
	$.post("./?c=od&act=mt&map&ajax",{
		filter_geo: f_geo,
		filter_type: f_type
	},function(data){
	    if(IsJsonString(data)){
			mt_list(JSON.parse(data));
		} else { console.log("failed to get json: " + data); }
	});
}

$("#geo").change(function(){
	update_mt_list();
});

$("#mt_type").change(function(){
	update_mt_list();
});

update_mt_list();

function is_email(valueToTest){
	var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	if (testEmail.test(valueToTest)) {return true;} else {return false;}
}

function frm_valid(){
	var is_valid = true;
	$("#apps_frm").find("input").each(function(){
	    if($(this).prop("required")){
	        if( $(this).val()=="" ) {
	        	$(this).parent("div").addClass("has-error");
	        	is_valid = false;
	        } else {
	        	$(this).parent("div").removeClass("has-error");
	        }
	    }
	});
	if(!is_email($("#email").val())){
		$("#email").parent("div").addClass("has-error");
		is_valid = false;
	} else {
		$("#email").parent("div").removeClass("has-error");
	}
	return is_valid;
}

$("#send").click(function(e){
	if(!frm_valid()){
		e.preventDefault();
	}
});

});
</script>
';

	return $result;
}

public function status(){
	$result='<div class="row">
	<div class="col-md-12">
		<h3 class="text-center text-primary">Проверка статуса Вашей заявки по трекинг-коду:</h3>
		<div id="xstatuscheck" class="text-center" style="width:500px;margin:auto;margin-top:30px;margin-bottom:100px;">
		<form id="checkfrm" class="form-inline" action="./?c=reg&act=check">
		<br><br><br>
		<div class="form-group">
		<label class="sr-only" for="yourID">ID (hash)</label>
		<div class="input-group">
		<div class="input-group-addon">Ваш код заявки:</div><!-- example: 5579bdad8f2bc -->
		<input type="text" class="form-control" id="yourID" placeholder="" style="font-size:20px;width:170px;">
		</div>
		</div>
		<button id="xcheck" type="button" class="btn btn-primary">Проверить статус</button>
		</form>
		</div>
		<br><br><br>
	</div>
</div>
';

	return $result;
}



}