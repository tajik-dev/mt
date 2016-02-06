<?php
namespace APP\MVC\M;

class USERS_M {


public function get_users(){
	$users=array();
	$DB=\DB::init();
	if($DB->connect()){
		$sql="SELECT * FROM `n-users` LEFT OUTER JOIN `n-groups` ON `usr-gid`=`gp-gid` 
		ORDER BY `usr-login`;";
		$sth=$DB->dbh->prepare($sql);
		$sth->execute();
		$DB->query_count();
		if($sth->rowCount()>0){
			while($r=$sth->fetch()){
					$created=$r['usr-created'];
					$lastlogin=$r['usr-lastlogin'];
					$status='';
					if($created!='') $created=date('H:i:s, d.m.Y',strtotime($created));
					if($lastlogin!='') $lastlogin=date('H:i:s, d.m.Y',strtotime($lastlogin));
					if($r['usr-status']==1) { $status='enabled'; } elseif ($r['usr-status']==0) {
						$status='disabled';
					}
				$users[$r['usr-uid']]=array(
					'user'=>$r['usr-login'],
					'gid'=>$r['gp-group'],
					'pid'=>$r['usr-pid'],
					'geo'=>$r['usr-geo'],
					'status'=>$status,
					'created'=>$created,
					'lastlogin'=>$lastlogin,
					);
			}
		}
	}
	return $users;
}

}