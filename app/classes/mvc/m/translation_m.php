<?php
namespace APP\MVC\M;
class TRANSLATION_M {

public $lang='';
public $sel_module='all';

function __construct(){
	$this->lang=\CORE::lng();
	if(isset($_GET['sel_module'])){
		if(preg_match('/^[\\a-zA-Z0-9_]+$/',$_GET['sel_module'])){
			$this->sel_module=$_GET['sel_module'];
		}
	}
}

public function get_list_of_modules(){
	$modules['all']='-- '.\CORE::t('universal','универсально').' --';
	$type=array(' (core)',' (app)');
	foreach (\CORE::init()->get_modules() as $key => $value) {
		$modules[$key]=$key.$type[(int) $value];
	}
	return $modules;
}

public function get_translations($module='all'){
	$translations=array();
	$lang=\CORE::lng();
	$DB=\DB::init();
	if($DB->connect()){
        $sql="SELECT * FROM `mt-translation` WHERE `t-module`=:module;";
        $sth=$DB->dbh->prepare($sql);
        $sth->execute(array('module'=>$module));
        $DB->query_count();
        if($sth->rowCount()>0){
            while($r=$sth->fetch()){
        		$translations[$r['t-module']]=array(
        			'alias'=>$r['t-alias'],
        			'ru'=>$r['t-ru'],
        			'tj'=>$r['t-tj']
        		);      
            }
        }
    }
	return $translations;
}

public function create(){
	$alias=''; $ru=''; $tj='';
	if(isset($_POST['alias'])){
		if(preg_match('/^[\\a-zA-Z0-9_]+$/',$_POST['alias'])){
			$alias=trim($_POST['alias']);
		}		
	}
	if(isset($_POST['ru'])){
		$ru=trim($_POST['ru']);
	}
	if(isset($_POST['tj'])){
		$tj=trim($_POST['tj']);
	}
	if($alias!='' && $ru!='' && $tj!=''){
		$DB=\DB::init();
		if($DB->connect()){
			if($this->sel_module!='all'){
				$sql="SELECT * FROM `mt-translation` WHERE (`t-module`=:module OR `t-module`='all') AND `t-alias`=:alias;";
				$sth=$DB->dbh->prepare($sql);
	       		$sth->execute(array('module'=>$this->sel_module,'alias'=>$alias));
			} else {
				$sql="SELECT * FROM `mt-translation` WHERE `t-module`='all' AND `t-alias`=:alias;";
				$sth=$DB->dbh->prepare($sql);
	        	$sth->execute(array('alias'=>$alias));
			}
	        $DB->query_count();
	        if($sth->rowCount()>0){
	        	\CORE::msg('error','exist in module: '.$this->sel_module);
	        } else {
	        	$sql="INSERT INTO `mt-translation` SET `t-alias`=:alias,`t-ru`=:ru,`t-tj`=:tj,`t-module`=:module;";
		        $sth=$DB->dbh->prepare($sql);
		        $sth->execute(array('alias'=>$alias,'ru'=>$ru,'tj'=>$tj,'module'=>$this->sel_module));
		        $DB->query_count();
		        \CORE::msg('info','created');
	        }
	    }
	} else {
		\CORE::msg('error','Incorrect parameters: alias, ru, tj');
	}
}

public function delete($alias=''){
	if(isset($_POST['alias'])) { $alias=trim($_POST['alias']); }
	if($alias!=''){
		$DB=\DB::init();
        if($DB->connect()){
            $sql = "DELETE FROM `mt-translation` WHERE `t-alias`=:alias AND `t-module`=:module;";
            $sth = $DB->dbh->prepare($sql);
            $sth->execute(array('alias'=>$alias,'module'=>$this->sel_module));
            $DB->query_count();
	        \CORE::msg('info','deleted');
        }
	}
}

}