<?php
namespace APP\MVC\M;

class MT_M {

public function get_mt(){
	$mt=array();
	$DB=\DB::init();
	if($DB->connect()){
        $sql="SELECT * FROM `mt`;";
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

}