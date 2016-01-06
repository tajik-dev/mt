<?php
$pages=array(
    'home'=>'home',
    'about'=>'about',
    'team'=>'team',
    'form1'=>'form1'
    );
\CORE\UI::init()->set_pages($pages);
\CORE::init()->set_modules(array(
	'map'=>1,
	'frm'=>1,
	));
$UMENU = new \APP\WIDGETS\UMENU;
$UMENU->show();
