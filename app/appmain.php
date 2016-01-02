<?php
\CORE::msg('debug','appmain running');
$my_pages=array(
    'home'=>'home',
    'about'=>'about',
    'form1'=>'form1'
    );
\CORE\BC\UI::init()->set_pages($my_pages);
\CORE::init()->set_modules(array(
	'test'=>1,
	));
$UMENU = new \APP\WIDGETS\UMENU;
$UMENU->show();
