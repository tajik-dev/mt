<?php
namespace APP\MVC\V;

class TRANSLATION_V {

public function main($model){
	$UI=\CORE\UI::init();
	$modules_list=$model->get_list_of_modules();
	$result='<div>
	<h4>'.mb_convert_case(\CORE::t('translation','Translation'),MB_CASE_TITLE,"UTF-8").':</h4>
	'.\CORE::t('module','Модуль').': '.$UI->html_list($modules_list,'',' id="sel_module"',$model->sel_module).'
	<!-- (Ҷҷ, Ӯӯ, Ққ, Ӣӣ, Ғғ, Ҳҳ) -->
	'.$UI::bootstrap_modal_btn('add_new_translation','new_translation',\CORE::t('new_translation','Новый перевод')).'
	</div><br>';
	$translations=$model->get_translations($model->sel_module);
	$translations_counter=count($translations);
	// modal: new
		$new_translation_body='
<div class="form-group">
	<label for="alias">Alias</label>
	<input type="text" class="form-control" id="alias" placeholder="short_latin_txt" style="width:200px;">
</div>
<div class="form-group">
	<label for="ru_txt">RU</label>
	<input type="text" class="form-control" id="ru_txt" placeholder="Перевод">
</div>
<div class="form-group">
	<label for="tj_txt">TJ</label>
	<input type="text" class="form-control" id="tj_txt" placeholder="Тарҷума"><br>
	<span class="text-muted">Ҷҷ, Ӯӯ, Ққ, Ӣӣ, Ғғ, Ҳҳ</span>
</div>
		';
		$result.=$UI::bootstrap_modal('new_translation',\CORE::t('new_translation','Новый перевод').':','',$new_translation_body,'create_new_translation',\CORE::t('add','Добавить'));
		$UI->pos['js'].='
<script>
$(document).ready(function() {

	$("#sel_module").change(function(){
		window.location.href = "./?c=translation&sel_module=" + $(this).val();
	});

	$("#create_new_translation").click(function(e){
		e.preventDefault();
		var new_alias=$("#alias").val();
		var new_ru=$("#ru_txt").val();
		var new_tj=$("#tj_txt").val();
		$.post("./?c=translation&act=add&sel_module="+$("#sel_module").val()+"&ajax", {alias: new_alias, ru: new_ru, tj: new_tj}, function(data){
			if(data=="created"){
				location.reload();
			} else {
				alert("Error, check js log...");
				console.log(data);
			}
		});
	});

	$(".del_translation").click(function(){
		var del_alias = $(this).parent("div").attr("id");
		if(confirm("'.\CORE::t('delete','Удалить').'?")){
			$.post("./?c=translation&act=del&sel_module="+$("#sel_module").val()+"&ajax", {alias: del_alias}, function(data){
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
</script>';
	if($translations_counter>0){
		$result.='
		<table class="table table-bordered table-hover" style="width:auto;">
		<thead>
		<tr>
		<th>№</th>
		<th>Alias</th>
		<th>RU</th>
		<th>TJ</th>
		<th class="text-center">'.\CORE::t('action','Действие').'</th>
		</tr>
		</thead>
		<tbody>
		';
		$cnt=0;
		foreach ($translations as $alias => $t_array) {
			$cnt++;
			$result.='
			<tr>
			<td>'.$cnt.'</td>
			<td>'.$alias.'</td>
			<td>'.$t_array['ru'].'</td>
			<td>'.$t_array['tj'].'</td>
			<td>
			<div id="'.$alias.'" class="btn-group btn-group-xs">
				<button type="button" class="btn btn-default del_translation">delete</button>
			</div>
			</td>
			</tr>
			';
		}
		$result.='</tbody>
		</table>
		<span class="text-muted">
		P.S. Example of using this in the code: CORE::t("alias","Default translation");
		</span>
		';
		// modal: edit

	} else {
		$result.='<h4 class="text-danger">'.\CORE::t('no_translations_yet','Здесь пока нет переводов').'</h4>';
	}
	return $result;
}




}