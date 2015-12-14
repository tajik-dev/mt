<?php
$start=microtime(true);
if(is_readable('./conf.php')){require('./conf.php');} else {echo 'Configuration not found';exit;}
if(is_readable(DIR_CORE.'/main.php')){require(DIR_CORE.'/main.php');} else {echo 'Main script not found';exit;}
?>