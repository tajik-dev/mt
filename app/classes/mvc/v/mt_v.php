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
	<th>'.\CORE::t('mt_name','Название учреждения').'</th>
	<th>ID</th>
	<th>'.\CORE::t('geo','География').'</th>
	<th>'.\CORE::t('address','Адрес').'</th>
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
$result.='
<tr>
<td>'.$cnt.'</td>
<td>'.$mt_type.'</td>
<td>'.$mt_val['mt-name-'.$lang].'</td>
<td>'.$mt_id.'</td>
<td>'.$mt_geo.'</td>
<td>'.$mt_val['mt-address'].'</td>
<td>
<div id="'.$mt_id.'" class="btn-group btn-group-xs">
	<button type="button" class="btn btn-default edit" data-toggle="modal" data-target="#editModal">'.\CORE::t('edit','изменить').'</button>
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
		$geo_new='
		<div class="form-group">
			<label for="new_geo">'.\CORE::t('location','Расположение').'</label>
			'.$UI->html_list($geo_list,'',' id="new_geo" class="form-control"',$model->sel_geo,'-- '.\CORE::t('all','Все').' --').'
		</div>';
	}
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
    <label for="new_mobile">'.\CORE::t('mobile','Мобильный').'</label>
    <input type="text" class="form-control" id="new_mobile" placeholder="9XXXXXXXX">
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
		var new_geo_lat=$("#new_geo_lat").val();
		var new_geo_lng=$("#new_geo_lng").val();
		$.post("./?c=mt&act=create", {
			geo: new_geo,
			type: new_type,
			ru: new_ru,
			tj: new_tj,
			new_dir: new_director,
			geo: new_address,
			geo: new_phone,
			lat: new_geo_lat,
			lng: new_geo_lng
		}, function(data){
			// 
		});
	});

	$(".edit").click(function(){
		var edit_id = $(this).parent("div").attr("id");

	});

	$(".delete").click(function(){
		var del_id = $(this).parent("div").attr("id");
		if(confirm("'.\CORE::t('delete',"Удалить").'?")){
			$.post("./?c=mt&act=del&ajax", {id: del_id}, function(data){
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

}