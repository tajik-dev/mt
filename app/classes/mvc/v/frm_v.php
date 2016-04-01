<?php
namespace APP\MVC\V;

class FRM_V {

public function main($model){
	$result='';
	$UI=\CORE\UI::init();
	$mt_types=\APP\MVC\MT_M::get_mt_types();
	//$result.='<div><h3>'.\CORE::t('forms','Формы').':</h3></div>';

	// 3. show select html list for geo and mt (and mt_type) if available
	if($model->mt==0){
		$result.='select mt (list)'.$UI->html_list($mt_types,'',' id="mt_type"',$model->mt_type,'-- '.\CORE::t('all','Все').' --');
	} else {
		$result.='select mt (list)';
		$result.='show list of avail forms for mt ('.$model->mt.'): AND LIST TO CHOOSE ANOTHER mt<br>';
		foreach ($model->frms as $frm_name => $parts) {
			$result.=$frm_name.'<br>';
			if($parts>0){
				for ($i=1; $i<=$parts; $i++) { 
					$result.=' -'.$frm_name.'_part'.$i.'<br>';
				}
			}
		}
	}

	$result.=$this->get_frm($model); // before it check mt_id (geo_id) and form (frm)

	return $result;
}

public function get_frm($model){
	$result=''; $part='';
	if($model->frm_part>0){ $part='_part'.$model->frm_part; }
	$path=DIR_APP.'/forms/'.$model->frm.$part.'.php';
	if(is_readable($path)){ include($path);	} else {
		if(isset($_GET['form'])) {
			\CORE::msg('error',\CORE::t('frm_404','form 404'));
		}
	}
	return $result;
}




}