<?php
namespace APP\MVC\M;

class MT_M {

public $selected_type=0;

function __construct(){
    if(isset($_GET['type'])){$this->selected_type=(int) $_GET['type'];}
}

public function get_geo_objects(){
    $lang=\CORE::lng();
    $geo=array();
    $DB=\DB::init();
    if($DB->connect()){
        $sql="SELECT * FROM `mt-geo-objects` LEFT OUTER JOIN `mt-geo-types` ON `geo-type`=`gt-id`;";
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

public function get_gid_geo_objects(){
    $gid=\USER::init()->get('gid');
    $lang=\CORE::lng();
    $geo_list=array();
    $DB=\DB::init();
    if($DB->connect()){
        $sql="SELECT * FROM `mt-geo-objects` LEFT OUTER JOIN `mt-geo-types` ON `geo-type`=`gt-id`;";
        $sth=$DB->dbh->prepare($sql);
        $sth->execute();
        $DB->query_count();
        if($sth->rowCount()>0){
            while($r=$sth->fetch()){
                if($gid==1) {
                    $geo_list[$r['geo-id']]=$r['gt-name-short-'.$lang].' '.$r['geo-title-'.$lang];
                }
            }
        }
    }
    return $geo_list;
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
    $type=$this->selected_type;
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

}