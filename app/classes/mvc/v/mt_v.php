<?php
namespace APP\MVC\V;

class MT_V {

public function main($model){
	$lang=\CORE::lng();
	$result='<div><h4>'.\CORE::t('mt','Образовательные учреждения').':</h4></div>';
	$mt=$model->get_mt();
	$mt_count=count($mt);
	if($mt_count>0){
		$result.='
		<table class="table table-bordered table-hover" style="width:auto;">
		<thead>
		<tr>
		<th>#</th>
		<th>Название учреждения (RU)</th>
		<th>TJ</th>
		<th>-</th>
		<th class="text-center">ACTION</th>
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
		';
	} else {
		\CORE::msg('info',\CORE::t('no_mt','В базе не найдены образовательные учреждения'));
	}
	return $result;
}

}