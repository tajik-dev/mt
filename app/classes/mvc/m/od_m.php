<?php
namespace APP\MVC\M;

class OD_M {


public function get_mt(){
	$mt=array();
    $format='json';
	$filter_geo=0;
	$filter_type=0;
	$filter_id=0;
	if(isset($_POST['filter_geo'])){$filter_geo=(int) $_POST['filter_geo'];}
	if(isset($_POST['filter_type'])){$filter_type=(int) $_POST['filter_type'];}
	if(isset($_POST['filter_id'])){$filter_id=(int) $_POST['filter_id'];}
	$where='';
	$lang=\CORE::lng();
	if($lang!='') $lang='-'.$lang;
	$DB=\DB::init();
	if($DB->connect()){
        $sql="SELECT * FROM `mt` ORDER BY `mt-geo-id`,`mt-type`;";
        $sth=$DB->dbh->prepare($sql);
        $sth->execute();
        $DB->query_count();
        if($sth->rowCount()>0){
            while($r=$sth->fetch()){
                if($r['mt-geo-lng']!='' && $r['mt-geo-lat']!=''){
                    $mt[]=array(
                    	$r['mt-geo-lng'],
                    	$r['mt-geo-lat'],
                    	(int) $r['mt-geo-id'],
                    	(int) $r['mt-type'],
                    	$r['mt-name'.$lang],
                    	$r['mt-address']
                    );
                }
            }
        }
    }
    // json, xml, csv
	// lng, lat, geo_id, mt_type, name, address
	echo json_encode($mt);
}

}