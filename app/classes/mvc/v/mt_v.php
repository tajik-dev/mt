<?php
namespace APP\MVC\V;

class MT_V {

public function main($model){
	$lang=\CORE::lng();
	$UI=\CORE\UI::init();
	$mt=$model->get_mt();
	$mt_types=$model->get_mt_types();
	$mt_count=count($mt);
	$result='<div><h4>'.\CORE::t('mt','Образовательные учреждения').': <span class="badge">'.$mt_count.'</span></h4></div>';
	$result.='<p><strong>'.\CORE::t('filter','Фильтр').':</strong> '.\CORE::t('types','Типы').' 
	'.$UI->html_list($mt_types,'',' id="type_filter"',$model->sel_type,'-- '.\CORE::t('all','Все').' --').'<p>';
	$result.='<p>'.$UI->bootstrap_modal_btn('show_newModal','newModal',\CORE::t('add_mt','Добавить учреждение')).'</p>';
	if($mt_count>0){
		$geo=$model->get_all_geo();
$result.='
<table class="table table-bordered table-hover" style="width:auto;">
	<thead>
	<tr>
	<th>№</th>
	<th>'.\CORE::t('type','Тип').'</th>
	<th>ID</th>
	<th>'.\CORE::t('mt_name','Название').'</th>
	<th>'.\CORE::t('geo','Расположение').'</th>
	<th>'.\CORE::t('address','Адрес').'</th>
	<th>'.\CORE::t('map','Карта').'</th>
	<th class="text-center">'.\CORE::t('action','Действие').'</th>
	</tr>
	</thead>
<tbody>
';
		$cnt=0;
		foreach ($mt as $mt_id => $mt_val) {
			$cnt++;
			$mt_type='';
			if(isset($mt_types[$mt_val['mt-type']])){$mt_type=$mt_types[$mt_val['mt-type']];}
			$mt_geo='';
			if(isset($geo[$mt_val['mt-geo-id']])) {$mt_geo=$geo[$mt_val['mt-geo-id']];}
			if($mt_val['mt-geo-lat']!='' && $mt_val['mt-geo-lng']!=''){
				$on_map='<span class="glyphicon glyphicon-ok text-success" aria-hidden="true"></span>';
			} else {
				$on_map='<span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>';}	
$result.='
<tr>
<td>'.$cnt.'</td>
<td>'.$mt_type.'</td>
<td>'.$mt_id.'</td>
<td>'.htmlspecialchars($mt_val['mt-name-'.$lang]).'</td>
<td>'.$mt_geo.'</td>
<td>'.htmlspecialchars($mt_val['mt-address']).'</td>
<td class="text-center">'.$on_map.'</td>
<td>
<div id="'.$mt_id.'" class="btn-group btn-group-xs">
	<button type="button" class="btn btn-default editItem" data-toggle="modal" data-target="#editModal">'.\CORE::t('edit','изменить').'</button>
	<button type="button" class="btn btn-default delete">'.\CORE::t('delete','удалить').'</button>
</div>
</td>
</tr>
';
		}
		$result.='</tbody>
		</table>
		';
	} else {
		\CORE::msg('info',\CORE::t('no_mt','В базе не найдены образовательные учреждения'));
	}
	$geo_new='';
	$geo_list=$model->available_geo;
	if(count($geo_list)>0){
		$geo_edit='
		<div class="form-group">
			<label for="edit_geo">'.\CORE::t('location','Расположение').'</label>
			'.$UI->html_list($geo_list,'',' id="edit_geo" class="form-control"',$model->sel_geo).'
		</div>';
		$edit_body='<input type="hidden" id="edit_id" value="0">'.$geo_edit.'
  <div class="form-group">
    <label for="edit_type">'.\CORE::t('type','Тип').'</label>
	'.$UI->html_list($mt_types,'',' id="edit_type" class="form-control"',$model->sel_type).'
  </div>
  <div class="form-group">
    <label for="edit_name_ru">'.\CORE::t('mt_name','Название учреждения').' (RU)</label>
    <input type="text" class="form-control" id="edit_name_ru" placeholder="Название">
  </div>
  <div class="form-group">
    <label for="edit_name_tj">'.\CORE::t('mt_name','Название учреждения').' (TJ)</label>
    <input type="text" class="form-control" id="edit_name_tj" placeholder="Номи муассиса">
  </div>
  <div class="form-group">
    <label for="edit_director">Директор</label>
    <input type="text" class="form-control" id="edit_director" placeholder="Ф.И.О.">
  </div>
  <div class="form-group">
    <label for="edit_address">'.\CORE::t('address','Адрес').'</label>
    <input type="text" class="form-control" id="edit_address" placeholder="'.\CORE::t('address','Адрес').'">
  </div>
  <div class="form-group">
    <label for="edit_phone">Телефон</label>
    <input type="text" class="form-control" id="edit_phone" placeholder="">
  </div>
  <div class="form-group">
    <label for="edit_cellphone">'.\CORE::t('mobile','Мобильный').'</label>
    <input type="text" class="form-control" id="edit_cellphone" placeholder="9XXXXXXXX">
  </div>
  <hr>
  <div class="form-group">
    <div class="row">
    	<div class="col-md-6">
    		<label for="edit_geo_lat">Latitude</label>
    		<input type="text" class="form-control" id="edit_geo_lat" placeholder="38.XXXXXXX">
    	</div>
    	<div class="col-md-6">
    		<label for="edit_geo_lng">Longitude</label>
    		<input type="text" class="form-control" id="edit_geo_lng" placeholder="68.XXXXXXX">
    	</div>
    </div>
  </div>
	';
	$result.=$UI->bootstrap_modal('editModal',\CORE::t('edit2','Редактировать').':','',$edit_body,'updateItem',\CORE::t('update','Обновить'));
	}
	$geo_new='
		<div class="form-group">
			<label for="new_geo">'.\CORE::t('location','Расположение').'</label>
			'.$UI->html_list($geo_list,'',' id="new_geo" class="form-control"',$model->sel_geo).'
		</div>';
	$new_body=$geo_new.'
  <div class="form-group">
    <label for="new_type">'.\CORE::t('type','Тип').'</label>
	'.$UI->html_list($mt_types,'',' id="new_type" class="form-control"',$model->sel_type).'
  </div>
  <div class="form-group">
    <label for="new_name_ru">'.\CORE::t('mt_name','Название учреждения').' (RU)</label>
    <input type="text" class="form-control" id="new_name_ru" placeholder="Название">
  </div>
  <div class="form-group">
    <label for="new_name_tj">'.\CORE::t('mt_name','Название учреждения').' (TJ)</label>
    <input type="text" class="form-control" id="new_name_tj" placeholder="Номи муассиса">
  </div>
  <div class="form-group">
    <label for="new_director">Директор</label>
    <input type="text" class="form-control" id="new_director" placeholder="Ф.И.О.">
  </div>
  <div class="form-group">
    <label for="new_address">'.\CORE::t('address','Адрес').'</label>
    <input type="text" class="form-control" id="new_address" placeholder="'.\CORE::t('address','Адрес').'">
  </div>
  <div class="form-group">
    <label for="new_phone">Телефон</label>
    <input type="text" class="form-control" id="new_phone" placeholder="">
  </div>
  <div class="form-group">
    <label for="new_cellphone">'.\CORE::t('mobile','Мобильный').'</label>
    <input type="text" class="form-control" id="new_cellphone" placeholder="9XXXXXXXX">
  </div>
  <hr>
  <div class="form-group">
    <div class="row">
    	<div class="col-md-6">
    		<label for="new_geo_lat">Latitude</label>
    		<input type="text" class="form-control" id="new_geo_lat" placeholder="38.XXXXXXX">
    	</div>
    	<div class="col-md-6">
    		<label for="new_geo_lng">Longitude</label>
    		<input type="text" class="form-control" id="new_geo_lng" placeholder="68.XXXXXXX">
    	</div>
    </div>
  </div>
	';
	$result.=$UI->bootstrap_modal('newModal',\CORE::t('new_mt','Новое учреждение').':','',$new_body,'addNew',\CORE::t('add','Добавить'));
	$UI->pos['js'].='
<script>
$(document).ready(function() {

	function IsJsonString(str) {
    	try { JSON.parse(str); } catch(e) { return false; }
    	return true;
	}

	function changeMyFilter(){
		var sel_type = $("#type_filter").val();
		if(sel_type>0){
			window.location.href="./?c=mt&type="+sel_type;
		} else {
			window.location.href="./?c=mt";
		}
	}

	$("#type_filter").change(function(){
		changeMyFilter();
	});

	$("#addNew").click(function(e){
		e.preventDefault();
		var new_geo=$("#new_geo").val();
		var new_type=$("#new_type").val();
		var new_ru=$("#new_name_ru").val();
		var new_tj=$("#new_name_tj").val();
		var new_director=$("#new_director").val();
		var new_address=$("#new_address").val();
		var new_phone=$("#new_phone").val();
		var new_cellphone=$("#new_cellphone").val();
		var new_geo_lat=$("#new_geo_lat").val();
		var new_geo_lng=$("#new_geo_lng").val();
		$.post("./?c=mt&act=create&ajax", {
			geo: new_geo,
			type: new_type,
			ru: new_ru,
			tj: new_tj,
			dir: new_director,
			address: new_address,
			phone: new_phone,
			cellphone: new_cellphone,
			lat: new_geo_lat,
			lng: new_geo_lng
		}, function(data){
			if(data=="ok"){
				location.reload();
			} else {
				if(IsJsonString(data)){
					var obj = JSON.parse(data);
					alert(obj.errors);
				} else {
					alert("Error. Check JS console log.");
					console.log(data);
				}
			}

		});
	});

	$("#updateItem").click(function(e){
		e.preventDefault();
		var edit_id=$("#edit_id").val();
		var edit_geo=$("#edit_geo").val();
		var edit_type=$("#edit_type").val();
		var edit_ru=$("#edit_name_ru").val();
		var edit_tj=$("#edit_name_tj").val();
		var edit_director=$("#edit_director").val();
		var edit_address=$("#edit_address").val();
		var edit_phone=$("#edit_phone").val();
		var edit_cellphone=$("#edit_cellphone").val();
		var edit_geo_lat=$("#edit_geo_lat").val();
		var edit_geo_lng=$("#edit_geo_lng").val();
		$.post("./?c=mt&act=update&ajax", {
			id: edit_id,
			geo: edit_geo,
			type: edit_type,
			ru: edit_ru,
			tj: edit_tj,
			dir: edit_director,
			address: edit_address,
			phone: edit_phone,
			cellphone: edit_cellphone,
			lat: edit_geo_lat,
			lng: edit_geo_lng
		}, function(data){
			if(data=="ok"){
				location.reload();
			} else {
				if(IsJsonString(data)){
					var obj = JSON.parse(data);
					alert(obj.errors);
				} else {
					alert("Error. Check JS console log.");
					console.log(data);
				}
			}

		});
	});

	$(".editItem").click(function(){
		var edit_id = $(this).parent("div").attr("id");
		$("#edit_id").val(edit_id);
		// get item data
		$.post("./?c=mt&act=read&ajax", {id: edit_id}, function(data){
			if(IsJsonString(data)){
				var obj = JSON.parse(data);
				$("#edit_geo").val(obj.geo);
				$("#edit_type").val(obj.type);
				$("#edit_name_ru").val(obj.name_ru);
				$("#edit_name_tj").val(obj.name_tj);
				$("#edit_director").val(obj.director);
				$("#edit_address").val(obj.address);
				$("#edit_phone").val(obj.phone);
				$("#edit_cellphone").val(obj.cellphone);
				$("#edit_geo_lat").val(obj.lat);
				$("#edit_geo_lng").val(obj.lng);
			} else {
				alert("Error. Check JS console log.");
				console.log(data);
			}
		});
	});

	$(".delete").click(function(){
		var del_id = $(this).parent("div").attr("id");
		if(confirm("'.\CORE::t('delete',"Удалить").'?")){
			$.post("./?c=mt&act=delete&ajax", {id: del_id}, function(data){
				if(data=="deleted"){
					location.reload();
				} else {
					alert("Error, check js log...");
					console.log(data);
				}
			});
		}
	});

});
</script>
	';
	return $result;
}

public function mt($model){
	$result='';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
	}
	if($id>0){
		$mt=$model->view_mt($id);
		$address='';
		if($mt['address']!=''){
			$address=$mt['geoname'].', '.$mt['address'];
		}
		// $mt['director']
		$result.='
<h2 style="color:#337ab7;">'.$mt['name'].'</h2>
<hr>
<div style="font-size:18px;">
<p><strong>'.\CORE::t('mt_type','Тип учреждения').':</strong> '.$mt['type'].'</p>
<p><strong>'.\CORE::t('addr','Адрес').':</strong> '.$address.'</p>
<!--<p><strong>Директор:</strong> - </p>-->
<p><strong>Телефон:</strong> '.$mt['phone'].'</p>
<p><strong>'.\CORE::t('cellphone','Мобильный').':</strong> '.$mt['cellphone'].'</p>
</div>
';
	} else {
		\CORE::msg('error',\CORE::t('incorrect_id','Некорректный ID'));
	}
	return $result;
}

}