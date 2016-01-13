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
	$modules['all']='-- '.\CORE::t('all','все').' --';
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
        		$translations[$r['t-alias']]=array(
        			'module'=>$r['t-module'],
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

public function get($module='all',$alias=''){
	if(isset($_POST['module'])) { $module=trim($_POST['module']); }
	if(isset($_POST['alias'])) { $alias=trim($_POST['alias']); }
	$translation=array(
			'module'=>$module,
			'alias'=>$alias,
			'ru'=>'',
			'tj'=>''
		);
	if($module!='' && $alias!=''){
		$DB=\DB::init();
        if($DB->connect()){
            $sql="SELECT * FROM `mt-translation` WHERE `t-module`=:module AND `t-alias`=:alias;";
	        $sth=$DB->dbh->prepare($sql);
	        $sth->execute(array('module'=>$module,'alias'=>$alias));
	        $DB->query_count();
	        if($sth->rowCount()>0){
	            while($r=$sth->fetch()){
	        		$translation=array(
						'module'=>$r['t-module'],
						'alias'=>$r['t-alias'],
						'ru'=>$r['t-ru'],
						'tj'=>$r['t-tj']
					);  
	            }
	        }
        }
	}
	echo json_encode($translation);
}

public function update(){
	$module=''; $alias=''; $ru=''; $tj='';
	if(isset($_POST['module'])){
		if(preg_match('/^[\\a-zA-Z0-9_]+$/',$_POST['module'])){
			$module=trim($_POST['module']);
		}		
	}
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
	if($alias!='module' && $alias!='' && $ru!='' && $tj!=''){
		$DB=\DB::init();
		if($DB->connect()){
			$sql="SELECT * FROM `mt-translation` WHERE `t-module`=:module AND `t-alias`=:alias;";
			$sth=$DB->dbh->prepare($sql);
       		$sth->execute(array('module'=>$module,'alias'=>$alias));
	        $DB->query_count();
	        if($sth->rowCount()>0){
	        	$sql="UPDATE `mt-translation` SET `t-ru`=:ru,`t-tj`=:tj WHERE `t-module`=:module AND `t-alias`=:alias;";
		        $sth=$DB->dbh->prepare($sql);
		        $sth->execute(array('ru'=>$ru,'tj'=>$tj,'module'=>$module,'alias'=>$alias));
		        $DB->query_count();
		        \CORE::msg('info','updated');
	        } else {
	        	\CORE::msg('error','You tried to update non-existent record');
	        }
	    }
	} else {
		\CORE::msg('error','Incorrect parameters');
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