<?php
namespace APP\MVC\M;

class FRM_M {


public $lang='tj';
public $lng='';
public $gid=0;
public $geo=0;
public $geos=array(); // available geo
public $mt=0;
public $mts=array(); // available mt
public $mt_type=2;
public $year=2005;
public $years=array();
public $frm='';
public $frms=array(
	'ps'=>'Шиносномаи мактаб',
	'tm1_p12'=>'Шакли ТМ-1 (боби-12)',
	'bmt1'=>'БМТ-1',
	'kom1'=>'КОМ-1',
	'fb'=>'ФБ',
	);

function __construct(){
	// language
	$this->lang=\CORE::lng();
	if($this->lang!='') $this->lng='-'.$this->lang;
	// date parameters
	$this->year=(int) date('Y');
	$this->years=array(2005,$this->year);
	if(isset($_GET['year'])){
		$user_year=(int) $_GET['year'];
		if($this->years[0] <= $user_year && $user_year <= $this->years[1]) {
			$this->year = $user_year;
		}
	}
	// mt_type
	if(isset($_GET['type'])){
		$this->mt_type=(int) $_GET['type'];
		if($this->mt_type<0 || $this->mt_type>4) $this->mt_type=2; // default value
	}
	// geo, mt
	$this->gid=(int) \USER::init()->get('gid');
	// define limitations and availability of geos and mts for this user
	$this->geo=(int) \USER::init()->get('geo');
	$this->mt=(int) \USER::init()->get('mt');
	if($this->gid==1 || $this->gid==2) {$parent_geo=true;} else {$parent_geo=false;}
	$this->geos = \APP\MVC\M\GEO_M::get_available_geo($this->geo,$parent_geo);
	if($this->gid==4) {$one_mt=$this->mt;} else {$one_mt=0;}
	$this->mts = \APP\MVC\M\MT_M::get_available_mt($this->geos,$one_mt,$this->mt_type);
	// mt
	if(isset($_GET['mt'])){
		$tmp_mt=(int) $_GET['mt'];
		if(isset($this->mts[(string) $tmp_mt])) {
			$this->mt=$tmp_mt;
		}
	}
	// frm
	if(isset($_GET['frm'])){
		if(isset($this->frms[$_GET['frm']])){
			$this->frm=$_GET['frm'];
		}
	}	

}



}