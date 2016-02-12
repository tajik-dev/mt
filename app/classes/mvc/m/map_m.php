<?php
namespace APP\MVC\M;

class MAP_M {

public $sel_mt=0;
public $sel_type=0;

function __construct(){
	if(isset($_GET['type'])){$this->sel_type=(int) $_GET['type'];}
	if(isset($_GET['id'])){$this->sel_mt=(int) $_GET['id'];}
}

public function get_mt_types(){
    $lang=\CORE::lng();
    if($lang!='') $lang='-'.$lang;
    $types=array();
    $DB=\DB::init();
    if($DB->connect()){
        $sql="SELECT * FROM `mt-types`;";
        $sth=$DB->dbh->prepare($sql);
        $sth->execute();
        $DB->query_count();
        if($sth->rowCount()>0){
            while($r=$sth->fetch()){
                $types[$r['mt-type-id']]=$r['mt-type'.$lang];
            }
        }
    }
    return $types;
}

public function get_mt($type=0){
    $lang=\CORE::lng();
    if($lang!='') $lang='-'.$lang;
	$mt=array();
	$DB=\DB::init();
    $type=$this->sel_type;
	if($DB->connect()){
        if($type>0){
            $sql="SELECT * FROM `mt` WHERE `mt-type`=:type AND `mt-geo-lat` IS NOT NULL AND `mt-geo-lng` IS NOT NULL ORDER BY `mt-name".$lang."`;";
            $sth=$DB->dbh->prepare($sql);
            $sth->execute(array('type'=>$type));
        } else {
            $sql="SELECT * FROM `mt` WHERE `mt-geo-lat` IS NOT NULL AND `mt-geo-lng` IS NOT NULL ORDER BY `mt-type`,`mt-name".$lang."`;";
            $sth=$DB->dbh->prepare($sql);
            $sth->execute();
        }
        $DB->query_count();
        if($sth->rowCount()>0){
            while($r=$sth->fetch()){
                $mt[$r['mt-id']]=$r['mt-name'.$lang];
            }
        }
    }
	return $mt;
}

public function get_coord($id=0){
	if(isset($_POST['id'])){$id=(int) $_POST['id'];}
	if($id>0){
		$DB=\DB::init();
		if($DB->connect()){
            $sql="SELECT * FROM `mt` WHERE `mt-id`=:id AND `mt-geo-lat` IS NOT NULL AND `mt-geo-lng` IS NOT NULL;";
            $sth=$DB->dbh->prepare($sql);
            $sth->execute(array('id'=>$id));
	        $DB->query_count();
	        if($sth->rowCount()==1){
	            $r=$sth->fetch();
	            $coord=array(
	            	'lat'=>$r['mt-geo-lat'],
	            	'lng'=>$r['mt-geo-lng']
	            	);
	        }
	    }
		echo json_encode($coord);
	}
}


}