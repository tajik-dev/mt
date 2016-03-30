<?php
namespace APP\MVC\M;

class OD_M {


public function get_mt($format=''){
    $formats=array('csv'=>'csv','xml'=>'xml','json'=>'json');
    if(isset($_GET['format'])){
        if(isset($formats[$_GET['format']])){$format=$_GET['format'];}
    }
	$mt=array();
    $lang=\CORE::lng();
    if($lang!='') $lang='-'.$lang;
	$filter_geo=0;
	$filter_type=0;
    $filter_id=0;
	$only_geo=false;
	if(isset($_POST['filter_geo'])){$filter_geo=(int) $_POST['filter_geo'];}
	if(isset($_POST['filter_type'])){$filter_type=(int) $_POST['filter_type'];}
    if(isset($_POST['filter_id'])){$filter_id=(int) $_POST['filter_id'];}
	if(isset($_POST['map'])){$only_geo=true;}
	$where='';
    // we can add multiply filter for each type then
	if($filter_geo>0) {
        if($where=='') {
            $where='WHERE `mt-geo-id`='.$filter_geo;
        } else {
            $where.=' AND `mt-geo-id`='.$filter_geo;
        }
    }
    if($filter_type>0) {
        if($where=='') {
            $where='WHERE `mt-type`='.$filter_type;
        } else {
            $where.=' AND `mt-type`='.$filter_type;
        }
    }
    if($filter_id>0) {
        if($where=='') {
            $where='WHERE `mt-id`='.$filter_id;
        } else {
            $where.=' AND `mt-id`='.$filter_id;
        }
    }
    if($only_geo) {
        if($where=='') {
            $where='WHERE `mt-geo-lat` IS NOT NULL AND `mt-geo-lng` IS NOT NULL';
        } else {
            $where.=' AND  `mt-geo-lat` IS NOT NULL AND `mt-geo-lng` IS NOT NULL';
        }
    }
	$DB=\DB::init();
	if($DB->connect()){
        $sql="SELECT * FROM `mt`".$where." ORDER BY `mt-geo-id`,`mt-type`;";
        $sth=$DB->dbh->prepare($sql);
        $sth->execute();
        $DB->query_count();
        if($sth->rowCount()>0){
            while($r=$sth->fetch()){
                if($r['mt-geo-lng']!='' && $r['mt-geo-lat']!=''){
                    $mt[]=array(
                        $r['mt-id'],
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
	// id, lng, lat, geo_id, mt_type, name, address
    if($format!=''){
        $dvm = new \APP\MVC\M\DV_M;
        $columns=array('mt-type', 
            'mt-name-ru', 
            'mt-name-tj', 
            'mt-address', 
            'mt-geo-id', 
            'mt-phone', 
            'mt-cellphone', 
            'mt-geo-lat', 
            'mt-geo-lng');
    }
    switch ($format) {
        case 'csv':
                $res = $dvm->db2csvgen('mt', $columns);
                exit;
            break;
        case 'xml':
                $dvm->db2xmlgen('mt', $columns);
                exit;
            break;
        case 'json':
                $res = $dvm->db2jsongen('mt', $columns);
                echo json_encode($res);
                exit;
            break;
        
        default:
            echo json_encode($mt);
            break;
    }
}

public function ofrm(){ // old forms from es2015
    $frm=0; $format='json'; $tbl='';

    if(isset($_GET['frm'])) $frm=(int) $_GET['frm'];
    $formats=array('csv'=>'csv','xml'=>'xml','json'=>'json');
    if(isset($_GET['format'])){
        if(isset($formats[$_GET['format']])){$format=$_GET['format'];}
    }

    if($frm>0 && $frm<=5){
        $tbl='maktab_form'.$frm;
    }
    if($frm==7) {$tbl='kudakiston_form1';}

    if($frm>0 && $tbl!=''){
        $dvm = new \APP\MVC\M\DV_M;
        switch($format){
            case 'json':
                $res = $dvm->db2jsongen($tbl, array());
                echo json_encode($res);
                exit;
            break;
            case 'csv':
                $res = $dvm->db2csvgen($tbl, array());
                exit;
            break;
            case 'xml':
                $dvm->db2xmlgen($tbl, array());
                exit;
            break;
        }
    } else {
        echo 'error.......'; exit;
    }
}


}