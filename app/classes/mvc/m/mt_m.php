<?php
namespace APP\MVC\M;

class MT_M {

public $sel_type=0;
public $available_geo=array();
public $sel_geo=0;

function __construct(){
    if(isset($_GET['type'])){$this->sel_type=(int) $_GET['type'];}
    ///$this->available_geo
    $gid=\USER::init()->get('gid');
    $uid=\USER::init()->get('uid');
    switch($gid){
        case '1':
            $this->available_geo=$this->get_all_geo();
        break;
    }
    if(isset($_GET['geo'])){
        $tmp_geo_id=(int) $_GET['type'];
        if(isset($available_geo[$tmp_geo_id])){
            $this->sel_geo=$available_geo[$tmp_geo_id];
        }        
    }
    ////$this->get_geox();
}

public function get_mt_types(){
    $lang=\CORE::lng();
    $types=array();
    $DB=\DB::init();
    if($DB->connect()){
        $sql="SELECT * FROM `mt-types`;";
        $sth=$DB->dbh->prepare($sql);
        $sth->execute();
        $DB->query_count();
        if($sth->rowCount()>0){
            while($r=$sth->fetch()){
                $types[$r['mt-type-id']]=$r['mt-type-'.$lang];
            }
        }
    }
    return $types;
}

public function get_mt($type=0){
    $lang=\CORE::lng();
	$mt=array();
	$DB=\DB::init();
    $type=$this->sel_type;
	if($DB->connect()){
        if($type>0){
            $sql="SELECT * FROM `mt` WHERE `mt-type`=:type ORDER BY `mt-name-".$lang."`;";
            $sth=$DB->dbh->prepare($sql);
            $sth->execute(array('type'=>$type));
        } else {
            $sql="SELECT * FROM `mt` ORDER BY `mt-type`,`mt-name-".$lang."`;";
            $sth=$DB->dbh->prepare($sql);
            $sth->execute();
        }
        $DB->query_count();
        if($sth->rowCount()>0){
            while($r=$sth->fetch()){
                $mt[$r['mt-id']]=$r;
            }
        }
    }
	return $mt;
}

public function get_all_geo(){
    $lang=\CORE::lng();
    $geo=array();
    $DB=\DB::init();
    if($DB->connect()){
        $sql="SELECT * FROM `mt-geo` LEFT OUTER JOIN `mt-geo-types` ON `geo-type`=`gt-id`;";
        $sth=$DB->dbh->prepare($sql);
        $sth->execute();
        $DB->query_count();
        if($sth->rowCount()>0){
            while($r=$sth->fetch()){
                $geo[$r['geo-id']]=$r['gt-name-short-'.$lang].' '.$r['geo-title-'.$lang];
            }
        }
    }
    return $geo;
}

public function get_geox(){
    $lang=\CORE::lng();
    $geo=array();
    $DB=\DB::init();
    if($DB->connect()){
        $sql="SELECT * FROM `mt-geo` LEFT OUTER JOIN `mt-geo-types` ON `geo-type`=`gt-id`;";
        $sth=$DB->dbh->prepare($sql); //  ORDER BY `geo-pid`,`geo-id`
        $sth->execute();
        $DB->query_count();
        if($sth->rowCount()>0){
            while($r=$sth->fetch()){
                $geo[]=array($r['geo-pid'],$r['geo-id'],$r['gt-name-short-'.$lang].' '.$r['geo-title-'.$lang]);
            }
        }
    }
    $this->xtree($geo);
}

public function xtree($geo,$pid=0,$l=-1){
    foreach ($geo as $i => $a) {
        if($a[0]==$pid){
            $l++; //todo
            echo $l.$a[2].'<br>';
            $this->xtree($geo,$a[1],$l);
        }
    }
}

public function create(){
    
}


}