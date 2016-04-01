<?php
namespace APP\MVC\M;

class FRM_M {


public $lang='tj';
public $lng='';
public $geo=0;
public $geos=array(); // available geo
public $mt=0;
public $mts=array(); // available mt
public $mt_type=0;
public $year=2005;
public $years=array();
public $frm='';
public $frm_part=0;
public $frms=array(
	'ps'=>0,
	'tm1'=>2, // number of parts
	'bmt1'=>0,
	'kom1'=>0,
	'fb'=>0,
	);

function __construct(){
	// language
	$this->lang=\CORE::lng();
	if($this->lang!='') $this->lng='-'.$this->lang;
	// date parameters
	$this->year=(int) date('Y');
	$this->years=array(2005,$this->year);
	// form selection parameters
	if(isset($_GET['form'])){
		if(isset($this->frms[$_GET['form']])){
			$this->frm=$_GET['form'];
			if(isset($_GET['part'])){
				$part=(int) $_GET['part'];
				if($part>0 && $part<=$this->frms[$_GET['form']]){
					$this->frm_part=$part;
				}
			}
		}
	}

	$gid=(int) \USER::init()->get('gid');
	// define limitations and availability of geos and mts for this user
	$this->geo=(int) \USER::init()->get('geo');
	$this->mt=(int) \USER::init()->get('mt');
	if($gid==1 || $gid==2) {$parent_geo=true;} else {$parent_geo=false;}
	$this->geos = \APP\MVC\M\GEO_M::get_available_geo($this->geo,$parent_geo);
	if($gid==4) {$one_mt=$this->mt;} else {$one_mt=0;}
	$this->mts = \APP\MVC\M\MT_M::get_available_mt($this->geos,$one_mt);
	// set mt if required
	if(isset($_GET['mt'])){
		if(isset($this->mts[$_GET['mt']])) {
			\SESSION::set('mt',(int) $_GET['mt']);
		}
	}
	$session_mt=\SESSION::get('mt');
	if($session_mt!=''){
		$this->mt = (int) $session_mt;
	}

}



}