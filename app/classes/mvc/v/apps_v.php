<?php
namespace APP\MVC\V;

class APPS_V {


public function main($model){
	$result='<div><h4>Заявки</h4></div>';

	return $result;
}

public function app_frm($model){
	$result='
    Application form...
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