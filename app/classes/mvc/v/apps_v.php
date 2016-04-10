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
		$lng['app_frm']='Шакли дархост';
		$lng['rayon']='Ноҳия';
		$lng['mt']='Муассисаи таълими';
		$lng['name']='Ном';
		$lng['surname']='Насаб';
		$lng['fathername']='Номи падар';
		$lng['birthday']='Рузи таввалуд';
		$lng['shahodatnoma']='Рақами шаҳодатнома';
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
			<input type="hidden" id="frmhash" name="frmhash" value="'.md5(microtime()).'">
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

			<h5 style="color:silver;">'.\CORE::t('apps','Дархостҳо').': <span id="xqueue"></span></h5>

			<br><h4 class="text-center text-primary">'.\CORE::t('kid_info','Данные ребенка').'</h4><br>
			<div class="form-group">
				<label for="sname">'.\CORE::t('surname','Фамилия').' *</label>
				<input type="text" class="form-control" id="sname" name="sname" placeholder="'.\CORE::t('surname','Фамилия').'" required>
			</div>
			<div class="form-group">
				<label for="name">'.\CORE::t('name','Имя').' *</label>
				<input type="text" class="form-control" id="name" name="name" placeholder="'.\CORE::t('name','Имя').'" required>
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
	if(mt[0][0]>0) {
		show_mt_queue(mt[0][0]);
	}
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

$(document).on("change","#mt",function(){
	var xmt_id = $("#mt").val();
	show_mt_queue(xmt_id);
});

function show_mt_queue(mt_id){
	$.post("./?c=apps&act=queue&ajax",{mt:mt_id},function(data){
		if(IsJsonString(data)){
			my_mt = JSON.parse(data);
			$("#xqueue").text(my_mt.queue);
		} else { console.log("failed to get json: " + data); }
	});
}

});
</script>
';
	return $result;
}

public function status(){
	$UI=\CORE\UI::init();
	$result='
<h3 class="text-center text-primary">'.\CORE::t('status_check_code','Проверка статуса Вашей заявки по трекинг-коду').':</h3>
<div id="check_box" class="text-center" style="margin-top:30px;margin-bottom:100px;">
<div id="check_icon" class="status_icon"></div>
	<form id="check_frm" class="form-inline" action="./?c=app&act=check">
	<div class="form-group">
		<div class="input-group">
			<div class="input-group-addon">'.\CORE::t('your_code','Your code').':</div>
			<input type="text" class="form-control" id="xcode" placeholder="" style="font-size:20px;width:380px;">
			<!-- example: bd7e131b064db093c1b7257c77cd92e1 -->
		</div>
		<input id="check_status" type="button" class="btn btn-primary" value="'.\CORE::t('check_app','Check status').'">
	</div>
	<div style="width:480px;margin-top:30px;margin-left:auto;margin-right:auto;">
		<div id="xdesc" class="status_txt_1 text-danger"></div>
		<div id="xcmt" class="status_txt_2"></div>
	</div>
	</form>
</div>

<div style="display:none;" class="status_0"></div>
<div style="display:none;" class="status_1"></div>
<div style="display:none;" class="status_2"></div>
<div style="display:none;" class="status_3"></div>
';
$UI->pos['js'].='
<script>
$(document).ready(function(){

	function IsJsonString(str) {
    	try { JSON.parse(str); } catch(e) { return false; }
    	return true;
	}

	$("#xcode").keyup(function(){
		$("#check_status").prop("disabled", false);
	});

	$("#check_status").click(function(){
		var xcode = $("#xcode").val().trim();
		if(xcode.length>0){
			$("#xcode").parent("div").removeClass("has-error");

			$.post("./?c=apps&act=check&ajax", {code:xcode}, function(data){
				if(IsJsonString(data)){
					var obj = JSON.parse(data);
					var xstatus = obj.status;
					var xdesc = obj.desc;
					var xcmt = obj.cmt;
					$("#xdesc").html(xdesc);
					$("#xcmt").html(xcmt);
					$("#check_icon").removeClass();
					$("#check_icon").addClass("status_icon");
					$("#check_icon").addClass("status_" + xstatus);
				} else {
					alert("Error. Check JS console log.");
					console.log(data);
					$("#check_icon").removeClass();
					$("#check_icon").addClass("status_icon");
				}
				$("#check_status").prop("disabled", true);
			});

		} else {
			$("#xcode").parent("div").addClass("has-error");
			$("#xcode").focus();
			$("#check_icon").removeClass();
			$("#check_icon").addClass("status_icon");
		}
	});

});
</script>
';
return $result;
}

public function apps_list($model){
	$UI=\CORE\UI::init();
	$lang=\CORE::lng();
	$mt_m= new \APP\MVC\M\MT_M();
	$mt=$mt_m->get_mt();
	$apps=$model->get_apps();
	$counter=count($apps);
	$result='<div><h4>'.\CORE::t('apps_list','Руйхати дархостҳо').': 
	<span class="badge">'.$counter.'</span></h4>
</div>';
	if($counter>0){
		$result.='
<table class="table table-bordered table-hover" style="width:auto;">
	<thead>
		<tr>
			<th>#</th>
			<th>Учреждение</th>
			<th>Ребенок</th>
			<th>Родился</th>
			<th>Метрика</th>
			<th>Родитель</th>
			<th>Адрес</th>
			<th>Почта</th>
			<th>Телефон</th>
			<th>Код</th>
			<th>Статус</th>
			<th>Дата</th>
			<th>Коментарий</th>
			<th class="text-center">'.\CORE::t('action','Действие').'</th>
		</tr>
	</thead>
<tbody>
';
$cnt=0;
		foreach ($apps as $app_id => $app) {
			$cnt++;
			$mt_name=$app['mt'];
			if(isset($mt[$app['mt']])) {$mt_name=$mt[$app['mt']]['mt-name-'.$lang];}
			$result.='
<tr>
	<td>'.$cnt.'</td>
	<td>'.$mt_name.'</td>
	<td>'.trim($app['sname'].' '.$app['name'].' '.$app['fname']).'</td>
	<td>'.$app['birthday'].'</td>
	<td>'.$app['shahodatnoma'].'</td>
	<td>'.$app['parentfio'].'</td>
	<td>'.$app['address'].'</td>
	<td>'.$app['email'].'</td>
	<td>'.$app['phone'].'</td>
	<td>'.$app['frmhash'].'</td>
	<td>'.$app['status'].'</td>
	<td>'.$app['time'].'</td>
	<td>'.$app['cmt'].'</td>
	<td>
	<div id="'.$app_id.'" class="btn-group btn-group-xs">
		<button type="button" class="btn btn-default editItem" data-toggle="modal" data-target="#editModal">'.\CORE::t('edit','изменить').'</button>
	</div>
	</td>
</tr>
';
		}
		$result.="</tbody></table>\n";
$status_list=array(
	'1'=>\CORE::t('waiting','Waiting'),
	'2'=>\CORE::t('rejected','Rejected'),
	'3'=>\CORE::t('accepted','Accepted'),
	);
$edit_body='
<input type="hidden" id="edit_id" value="0">
<div class="form-group">
	<label for="edit_status">'.\CORE::t('status','Status').'</label>
	'.$UI->html_list($status_list,'',' id="edit_status" class="form-control"').'
</div>
<div class="form-group">
	<label for="edit_cmt">'.\CORE::t('cmt','Comments').'</label>
	<textarea id="edit_cmt" class="form-control"></textarea>
</div>
';
$result.=$UI->bootstrap_modal('editModal',\CORE::t('edit','Редактировать').':','',$edit_body,'updateItem',\CORE::t('update','Обновить'));
$UI->pos['js'].='
<script>
$(document).ready(function(){

	function IsJsonString(str) {
    	try { JSON.parse(str); } catch(e) { return false; }
    	return true;
	}

	$(".editItem").click(function(){
		var xid = $(this).parent("div").attr("id");
		$("#edit_id").val(xid);
		$.post("./?c=apps&act=read&ajax", {id: xid}, function(data){
			if(IsJsonString(data)){
				var obj = JSON.parse(data);
				$("#edit_status").val(obj.status);
				$("#edit_cmt").val(obj.cmt);
			} else {
				alert("Error. Check JS console log.");
				console.log(data);
			}
		});
	});

	$("#updateItem").click(function(e){
		e.preventDefault();
		var xid = $("#edit_id").val();
		var xstatus = $("#edit_status").val();
		var xcmt = $("#edit_cmt").val();
		$.post("./?c=apps&act=update&ajax", {id: xid, status: xstatus, cmt: xcmt}, function(data){
			location.reload();
		});
	});

});
</script>';

	} else {
		$result.='<div class="well">'.\CORE::t('norecdb','No records found in the database.').'</div>';
	}
	return $result;
}



}