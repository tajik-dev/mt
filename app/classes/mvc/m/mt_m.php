<?php
namespace APP\MVC\M;

class MT_M {

public $sel_type=0;
public $available_geo=array();
public $sel_geo=0;

function __construct(){
    if(isset($_GET['type'])){$this->sel_type=(int) $_GET['type'];}
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

public static function get_mt_types(){
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

public function get_mt($type=0, $geo=0){
    $lang=\CORE::lng();
	$mt=array();
	$DB=\DB::init();
    if($type==0) $type=$this->sel_type;
    $where='';
    $order=" ORDER BY `mt-type`,`mt-name-".$lang."`;";
    if($type>0){
        $where=" WHERE `mt-type`=".$type;
        $order=" ORDER BY `mt-name-".$lang."`";
    }
    if($geo>0){
        if($where!='') {
            $where.=" AND `mt-geo`=".$geo;
        } else {
            $where.=" WHERE `mt-geo`=".$geo;
        }
    }
	if($DB->connect()){
        $sql="SELECT * FROM `mt`".$where.$order;
        $sth=$DB->dbh->prepare($sql);
        $sth->execute();
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
        $sql="SELECT * FROM `mt-geo` LEFT OUTER JOIN `mt-geo-types` ON `geo-type`=`gt-id` WHERE `geo-id`!=1;"; // only Dushanbe rayons
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
    $mt=array(
        'type'=>0,
        'name_ru'=>'',
        'name_tj'=>'',
        'geo'=>0,
        'lat'=>'',
        'lng'=>'',
        'address'=>'',
        'director'=>'',        
        'phone'=>'',
        'cellphone'=>'',
        );
    // get user data
    $valid=true;
    if(isset($_POST['type'])){
        $mt['type']=(int) $_POST['type'];
    }
        if($mt['type']==0) {
            $valid=false;
            \CORE::msg('error','Incorrect mt type.');
        }
    if(isset($_POST['ru'])){
        $mt['name_ru']=htmlspecialchars(trim($_POST['ru']));
    }
        if($mt['name_ru']=='') {
            $valid=false;
            \CORE::msg('error','Incorrect name ru.');
        }
    if(isset($_POST['tj'])){
        $mt['name_tj']=htmlspecialchars(trim($_POST['tj']));
    }
        if($mt['name_tj']=='') {
            $valid=false;
            \CORE::msg('error','Incorrect name tj.');
        }
    if(isset($_POST['geo'])){
        $mt['geo']=(int) $_POST['geo'];
    }
        if($mt['geo']==0) {
            $valid=false;
            \CORE::msg('error','Incorrect geo id.');
        }
    if(isset($_POST['lat'])){
        $mt['lat']=(float) $_POST['lat'];
    }
        if($mt['lat']==0) {
            $mt['lat']=NULL;
        }
    if(isset($_POST['lng'])){
        $mt['lng']=(float) $_POST['lng'];
    }
        if($mt['lng']==0) {
            $mt['lng']=NULL;
        }
    if(isset($_POST['address'])){
        $mt['address']=htmlspecialchars(trim($_POST['address']));
    }
        if($mt['address']=='') {
            $mt['address']=NULL;
        }
    if(isset($_POST['dir'])){
        $mt['director']=htmlspecialchars(trim($_POST['dir']));
    }
        if($mt['director']=='') {
            $mt['director']=NULL;
        }
    if(isset($_POST['phone'])){
        $mt['phone']=htmlspecialchars(trim($_POST['phone']));
    }
        if($mt['phone']=='') {
            $mt['phone']=NULL;
        }
    if(isset($_POST['cellphone'])){
        $mt['cellphone']=htmlspecialchars(trim($_POST['cellphone']));
    }
        if($mt['cellphone']=='') {
            $mt['cellphone']=NULL;
        }
    
    if($valid){
        $DB=\DB::init();
        if($DB->connect()){
            $sql="SELECT * FROM `mt` WHERE `mt-type`=:type AND `mt-name-ru`=:name_ru;";
            $sth=$DB->dbh->prepare($sql);
            $sth->execute(array('type'=>$mt['type'],'name_ru'=>$mt['name_ru']));
            $DB->query_count();
            if($sth->rowCount()>0){
                \CORE::msg('error','Such record already exists.');
            } else {
                $sql="INSERT INTO `mt` (
                    `mt-type`,
                    `mt-name-ru`,
                    `mt-name-tj`,
                    `mt-geo-id`,
                    `mt-geo-lat`,
                    `mt-geo-lng`,
                    `mt-address`,
                    `mt-director`,
                    `mt-phone`,
                    `mt-cellphone`
                    ) 
                VALUES (:type,:name_ru,:name_tj,:geo,:lat,:lng,:address,:director,:phone,:cellphone);";
                $sth=$DB->dbh->prepare($sql);
                $sth->execute($mt);
                $DB->query_count();
                \CORE::msg('info','ok');
            }
        }        
    } else {
        \CORE::msg('error','Invalid user data.');
    }
}

public function update(){
    $mt=array(
        'type'=>0,
        'name_ru'=>'',
        'name_tj'=>'',
        'geo'=>0,
        'lat'=>'',
        'lng'=>'',
        'address'=>'',
        'director'=>'',        
        'phone'=>'',
        'cellphone'=>'',
        'id'=>'',
        );
    // get user data
    $valid=true;
    if(isset($_POST['type'])){
        $mt['type']=(int) $_POST['type'];
    }
        if($mt['type']==0) {
            $valid=false;
            \CORE::msg('error','Incorrect mt type.');
        }
    if(isset($_POST['ru'])){
        $mt['name_ru']=htmlspecialchars(trim($_POST['ru']));
    }
        if($mt['name_ru']=='') {
            $valid=false;
            \CORE::msg('error','Incorrect name ru.');
        }
    if(isset($_POST['tj'])){
        $mt['name_tj']=htmlspecialchars(trim($_POST['tj']));
    }
        if($mt['name_tj']=='') {
            $valid=false;
            \CORE::msg('error','Incorrect name tj.');
        }
    if(isset($_POST['geo'])){
        $mt['geo']=(int) $_POST['geo'];
    }
        if($mt['geo']==0) {
            $valid=false;
            \CORE::msg('error','Incorrect geo id.');
        }
    if(isset($_POST['lat'])){
        $mt['lat']=(float) $_POST['lat'];
    }
        if($mt['lat']==0) {
            $mt['lat']=NULL;
        }
    if(isset($_POST['lng'])){
        $mt['lng']=(float) $_POST['lng'];
    }
        if($mt['lng']==0) {
            $mt['lng']=NULL;
        }
    if(isset($_POST['address'])){
        $mt['address']=htmlspecialchars(trim($_POST['address']));
    }
        if($mt['address']=='') {
            $mt['address']=NULL;
        }
    if(isset($_POST['dir'])){
        $mt['director']=htmlspecialchars(trim($_POST['dir']));
    }
        if($mt['director']=='') {
            $mt['director']=NULL;
        }
    if(isset($_POST['phone'])){
        $mt['phone']=htmlspecialchars(trim($_POST['phone']));
    }
        if($mt['phone']=='') {
            $mt['phone']=NULL;
        }
    if(isset($_POST['cellphone'])){
        $mt['cellphone']=htmlspecialchars(trim($_POST['cellphone']));
    }
        if($mt['cellphone']=='') {
            $mt['cellphone']=NULL;
        }
    if(isset($_POST['id'])){
        $mt['id']=(int) $_POST['id'];
    }
        if($mt['id']==0) {
            $valid=false;
            \CORE::msg('error','Incorrect mt id.');
        }
    
    if($valid){
        $DB=\DB::init();
        if($DB->connect()){
            $sql="UPDATE `mt` SET 
                `mt-type`=:type,
                `mt-name-ru`=:name_ru,
                `mt-name-tj`=:name_tj,
                `mt-geo-id`=:geo,
                `mt-geo-lat`=:lat,
                `mt-geo-lng`=:lng,
                `mt-address`=:address,
                `mt-director`=:director,
                `mt-phone`=:phone,
                `mt-cellphone`=:cellphone
                WHERE `mt-id`=:id";
            $sth=$DB->dbh->prepare($sql);
            $sth->execute($mt);
            $DB->query_count();
            \CORE::msg('info','ok');
        }        
    } else {
        \CORE::msg('error','Invalid user data.');
    }
}

public function read($id=0){
    if(isset($_POST['id'])) $id=(int) $_POST['id'];
    if($id>0){
        $DB=\DB::init();
        if($DB->connect()){
            $sql = "SELECT * FROM `mt` WHERE `mt-id`=:id;";
            $sth = $DB->dbh->prepare($sql);
            $sth->execute(array('id'=>$id));
            $DB->query_count();
            if($sth->rowCount()==1){
                $r=$sth->fetch();
                $mt=array(
                    'type'=>$r['mt-type'],
                    'name_ru'=>$r['mt-name-ru'],
                    'name_tj'=>$r['mt-name-tj'],
                    'geo'=>$r['mt-geo-id'],
                    'lat'=>$r['mt-geo-lat'],
                    'lng'=>$r['mt-geo-lng'],
                    'address'=>$r['mt-address'],
                    'director'=>$r['mt-director'],        
                    'phone'=>$r['mt-phone'],
                    'cellphone'=>$r['mt-cellphone']
                );
                echo json_encode($mt);
            } else {
                \CORE::msg('error',\CORE::t('no_record','Такая запись не найдена.'));
            }
        }
    }
}

public function delete(){
    $id=0;
    if(isset($_POST['id'])) $id=(int) $_POST['id'];
    if($id>0){
        $DB=\DB::init();
        if($DB->connect()){
            $sql = "DELETE FROM `mt` WHERE `mt-id`=:id;";
            $sth = $DB->dbh->prepare($sql);
            $sth->execute(array('id'=>$id));
            $DB->query_count();
            \CORE::msg('info','deleted');
        }
    }
}

public function view_mt($id=0){
    $lang=\CORE::lng();
    if($lang!='') $lang='-'.$lang;
    $mt=array(
        'type'=>'',
        'name_ru'=>'',
        'name_tj'=>'',
        'geo'=>'',
        'lat'=>'',
        'lng'=>'',
        'address'=>'',
        'director'=>'',        
        'phone'=>'',
        'cellphone'=>''
        );
    if(isset($_POST['id'])) $id=(int) $_POST['id'];
    if($id>0){
        $DB=\DB::init();
        if($DB->connect()){
            $sql = "SELECT * FROM `mt`
            LEFT OUTER JOIN `mt-types` ON `mt-type`=`mt-type-id` 
            LEFT OUTER JOIN `mt-geo` ON `mt-geo-id`=`geo-id`
            WHERE `mt-id`=:id;";
            $sth = $DB->dbh->prepare($sql);
            $sth->execute(array('id'=>$id));
            $DB->query_count();
            if($sth->rowCount()==1){
                $r=$sth->fetch();
                $mt=array(
                    'type'=>$r['mt-type'.$lang],
                    'name'=>$r['mt-name'.$lang],
                    'geoname'=>$r['geo-title'.$lang],
                    'lat'=>$r['mt-geo-lat'],
                    'lng'=>$r['mt-geo-lng'],
                    'address'=>$r['mt-address'],
                    'director'=>$r['mt-director'],        
                    'phone'=>$r['mt-phone'],
                    'cellphone'=>$r['mt-cellphone']
                );
            } else {
                \CORE::msg('error',\CORE::t('no_record','Такая запись не найдена.'));
            }
        }
    }
    return $mt;
}

}