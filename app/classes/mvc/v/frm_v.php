<?php
namespace APP\MVC\V;

class FRM_V {

public function main($model){
	$result='';
	$UI=\CORE\UI::init();
	$mt_types=\APP\MVC\M\MT_M::get_mt_types();
	$result.='
<div class="form-group row">
	<div class="col-sm-2">
	    <label for="year">'.\CORE::t('soli_tahsil','Соли таҳсил').'</label>
	    '.$this->years($model).'
	</div>';
if($model->gid!=4){
	$result.='
	<div class="col-sm-3">
	    <label for="mt_type">'.\CORE::t('mt_type','Намуди муассиса').'</label>
	    '.$UI->html_list($mt_types,'',' id="mt_type" class="form-control"',$model->mt_type,'-- '.\CORE::t('all','Все').' --').'
	</div>';
if($model->mt==0 && isset($_GET['frm'])) {$er=' has-error';} else {$er='';}
	$result.='
	<div class="col-sm-5'.$er.'">
	    <label for="mt">'.\CORE::t('mt','Муассиса').'</label>
	    '.$UI->html_list($model->mts,'',' id="mt" class="form-control"',$model->mt,'-- '.\CORE::t('all','Все').' --').'
	</div>
</div>'."\n";
}
	// mt list

	$result.='<div class="form-group row">
	<div class="col-sm-5">
		<label for="frm">'.\CORE::t('frm','Шақли ҳисобот').'</label>
		<select id="frm" class="form-control">'."\n";
		$result.='<option value="0"> -- Шақлро имтихоб намоед -- </option>'."\n";
		foreach ($model->frms as $frm_name => $frm_title) {
			$sel='';
			if($model->frm==$frm_name) $sel=' selected="selected"';
			$result.='<option value="'.$frm_name.'"'.$sel.'>'.$frm_title."</option>\n";
		}
		$result.='</select>
	</div>
</div>
<hr>';

//$result.='<hr> sol:'.$model->year.',type:'.$model->mt_type.',mt:'.$model->mt.',frm:'.$model->frm.';';

if($model->mt>0 && $model->frm!='') $result.=$this->get_frm($model); // shows frm if mt is selected before

	$UI->pos['js'].='
<script>
$(document).ready(function() {

	function IsJsonString(str) {
    	try { JSON.parse(str); } catch(e) { return false; }
    	return true;
	}
';
if($model->gid!=4){
$UI->pos['js'].='
	function change_params(){
		var xyear = $("#year").val();
		var xtype = $("#mt_type").val();
		var xmt = $("#mt").val();
		var xfrm = $("#frm").val();
		window.location.href = "./?c=frm&year=" + xyear + "&type=" + xtype + "&mt=" + xmt + "&frm=" + xfrm;
	}
';
} else {
$UI->pos['js'].='
	function change_params(){
		var xyear = $("#year").val();
		var xfrm = $("#frm").val();
		window.location.href = "./?c=frm&year=" + xyear + "&frm=" + xfrm;
	}
';
}
$UI->pos['js'].='
	$("#year").change(function(){
		change_params();
	});

	$("#mt_type").change(function(){
		change_params();
	});

	$("#mt").change(function(){
		change_params();
	});

	$("#frm").change(function(){
		change_params();
	});

	
});
</script>
';

	return $result;
}

public function years($model){
	$result='';
	$UI=\CORE\UI::init();
	$years=array();
	for($i=$model->years[0];$i<=$model->years[1];$i++){
		$years[(string) $i]=$i.'-'.($i+1);
	}
	$result.=$UI->html_list($years,'',' id="year" class="form-control"',$model->year);
	return $result;
}

public function get_frm($model){
	$result='';
	$path=DIR_APP.'/forms/'.$model->frm.'.php';
	if(is_readable($path)){ include($path);	} else {
		if(isset($_GET['frm']) && $_GET['frm']!='') {
			\CORE::msg('error',\CORE::t('frm_404','form 404'));
		}
	}
	return $result;
}




}