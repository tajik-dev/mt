<?php
namespace APP\MVC\M;

class GEO_M {

public static function get_geo(){
    $geo=array();
    $lang=\CORE::lng();
    if($lang!='') $lang='-'.$lang;
    $DB=\DB::init();
    if($DB->connect()){
        $sql="SELECT * FROM `mt-geo` LEFT OUTER JOIN `mt-geo-types` ON `geo-type`=`gt-id`;";
        $sth=$DB->dbh->prepare($sql);
        $sth->execute();
        $DB->query_count();
        if($sth->rowCount()>0){
            while($r=$sth->fetch()){
                $geo[$r['geo-id']]=array(
                    'parent'=>$r['geo-pid'],
                    'type'=>$r['geo-type'],
                    'typename'=>$r['gt-name'.$lang],
                    'typeshort'=>$r['gt-name-short'.$lang],
                    'name'=>$r['geo-title'.$lang],
                    'title'=>$r['gt-name-short'.$lang].' '.$r['geo-title'.$lang],
                    'weight'=>$r['geo-weight']
                    );
            }
        }
    }
    return $geo;
}

public static function get_available_geo($geo_id=0,$parent=false){
    $available_geo=array();
    if($geo_id==0){ $geo_id = (int) \USER::init()->get('geo'); }
    if($geo_id>0){
        $geo=\APP\MVC\M\GEO_M::get_geo();
        if($geo_id==1){
            if($parent){
                $available_geo=array(
                    '1'=>$geo['1']['title'],
                    '2'=>$geo['2']['title'],
                    '3'=>$geo['3']['title'],
                    '4'=>$geo['4']['title'],
                    '5'=>$geo['5']['title'],
                );
            } else {
                $available_geo=array(
                    '2'=>$geo['2']['title'],
                    '3'=>$geo['3']['title'],
                    '4'=>$geo['4']['title'],
                    '5'=>$geo['5']['title'],
                );
            }            
        } else {
            $available_geo[(string) $geo_id]=$geo[(string) $geo_id]['title'];
        }
    }
    return $available_geo;
}

}