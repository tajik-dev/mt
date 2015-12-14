<?php
// CONST
define('DIR_BASE',str_replace('\\','/',realpath(dirname(__FILE__)))); // base dir
define('DIR_CORE','D:/wamp/www/github/nihol/core'); // core dir
define('DIR_APP',DIR_BASE.'/app'); // app dir
define('APPNAME','mt'); // app name
define('PREFX',APPNAME.'_'); // app prefix (for sessions)
define('PATH_APP','./app'); // app path (url)
define('PATH_UI','./ui'); // ui path (url)
define('N_MODE',0); // 0 - normal; 1 - maintenance;
define('N_DEBUG',0); // 0 - normal; 1 - debug;
// DB - database
$conf['db_server']='localhost';
$conf['db_port']='';
$conf['db_charset']='utf8';
$conf['db_name']='mt';
$conf['db_user']='root';
$conf['db_pass']='';
// UI - user interface
$conf['lang']='ru'; // default language
$conf['ui_tpl']=PATH_UI.'/tpl/mt'; // template dir
// mt
