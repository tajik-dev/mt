<?php
$pages=array(
    'home'=>'home',
    'user'=>'user',
    'admin'=>'admin',
    'about'=>'about',
    'about_opendata'=>'about_opendata',
    'team'=>'team',
    );
\CORE\UI::init()->set_pages($pages);
\CORE::init()->set_modules(array(
	'user'=>1,
	'users'=>1,
	'mt'=>1,
	'frm'=>1,
	'stat'=>1,
	'map'=>1,
	'vs'=>1,
	'od'=>1,
	'apps'=>1,
	'translation'=>1,
	),true);

$USER=\USER::init();
$USER->set('geo',(int) \SESSION::get('geo'));
$USER->set('mt',(int) \SESSION::get('mt'));
if($USER->auth()){
	// for authorized users (!) because of $DB->connect()
	// load translations from DB
	$new_lng=array();
	$c_lang=\CORE::lng();

	$DB=\DB::init();
	if($DB->connect()){
		if(\CORE::get_c()!=''){
			$sql="SELECT * FROM `mt-translation` WHERE `t-module`=:module OR `t-module`='all';";
			$sth=$DB->dbh->prepare($sql);
	    	$sth->execute(array('module'=>\CORE::get_c()));
		} else {
			$sql="SELECT * FROM `mt-translation` WHERE `t-module`='all';";
			$sth=$DB->dbh->prepare($sql);
	    	$sth->execute();
		}    
	    $DB->query_count();
	    if($sth->rowCount()>0){
	        while($r=$sth->fetch()){
	    		$new_lng[$r['t-alias']]=$r['t-'.$c_lang];  
	        }
	    }
	}
	\CORE::msg('debug','load translations from DB');
	\CORE::set_lng($new_lng);
}

$UMENU = new \APP\WIDGETS\UMENU;
$UMENU->show();
