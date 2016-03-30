<?php
namespace APP\MVC\M;

class DV_M {

	public function db2json($table,$idfield,$fields,$sortfield=''){ 
	// 'muassisaho', 'm-id', array('name_ru','namud','director'), 'name_ru'
    	$data=array();
    	$DB=\DB::init();
    	if($DB->connected()){
    		$sql = "SELECT * FROM `".$table."`;";
			$sth = $DB->dbh->prepare($sql);
			$sth->execute();
			$DB->query_count();
			if($sth->rowCount()>0){
				while($r=$sth->fetch()){
					//$data[$r[$idfield]]=$r;
                    $data[$r[$idfield]]=$r;
				}
			}
    	}
    	return $data;
    }

    public function db2jsongen($table,$idfields=array()){
        // 'muassisaho', 'm-id', array('name_ru','namud','director'), 'name_ru'
        $data=array();
        $DB=\DB::init();
        if($DB->connected()){
            if (count($idfields)==0){
                $sql = "SHOW COLUMNS FROM `".$table."`;";
                $sth = $DB->dbh->prepare($sql);
                $sth->execute();
                $DB->query_count();
                if($sth->rowCount()>0){
                    $idfields = array();
                    while($r=$sth->fetch()){
                        $idfields[] = $r['Field'];
                    }
                }
            }
            //print_r($idfields);
            //die();
            $sql = "SELECT * FROM `".$table."`;";
            $sth = $DB->dbh->prepare($sql);
            $sth->execute();
            $DB->query_count();
            if($sth->rowCount()>0){
                while($r=$sth->fetch()){
                    //$data[] = $r;
                    //$data[$r[$idfield]]=$r;
                    $res = array();
                    foreach($idfields as $idfield) {
                        $res[$idfield] = $r[$idfield];
                    }
                    $data[] = $res;
                }
            }
        }
        return $data;
    }

    public function db2xmlgen($table,$idfields=array()){
        // 'muassisaho', 'm-id', array('name_ru','namud','director'), 'name_ru'
        $data=array();
        $DB=\DB::init();
        if($DB->connected()){
            if (count($idfields)==0){
                $sql = "SHOW COLUMNS FROM `".$table."`;";
                $sth = $DB->dbh->prepare($sql);
                $sth->execute();
                $DB->query_count();
                if($sth->rowCount()>0){
                    $idfields = array();
                    while($r=$sth->fetch()){
                        $idfields[] = $r['Field'];
                    }
                }
            }
            //print_r($idfields);
            //die();
            $sql = "SELECT * FROM `".$table."`;";
            $sth = $DB->dbh->prepare($sql);
            $sth->execute();
            $DB->query_count();
            if($sth->rowCount()>0){
                $xml = "<?xml version='1.0' encoding='utf-8'?>\n<data>";
                while($r=$sth->fetch()){
                    $res = array(); $sub_xml="";
                    foreach($idfields as $idfield) {
                        $res[$idfield] = $r[$idfield];
                        $sub_xml.="<$idfield>".$r[$idfield]."</$idfield>\n";
                    }
                    $xml .="<item>\n$sub_xml</item>\n";
                }
                $xml .= "</data>";
            }
        }
        // output headers so that the file is downloaded rather than displayed
        header('Content-Type: text/xml; charset=utf-8');
        header('Content-Disposition: attachment; filename=data.xml');
        echo $xml;
    }

    public function db2csvgen($table,$idfields=array()){
        // 'muassisaho', 'm-id', array('name_ru','namud','director'), 'name_ru'
        $data=array();
        $DB=\DB::init();
        if($DB->connected()){
            if (count($idfields)==0){
                $sql = "SHOW COLUMNS FROM `".$table."`;";
                $sth = $DB->dbh->prepare($sql);
                $sth->execute();
                $DB->query_count();
                if($sth->rowCount()>0){
                    $idfields = array();
                    while($r=$sth->fetch()){
                        $idfields[] = $r['Field'];
                    }
                }
            }
            // output headers so that the file is downloaded rather than displayed
            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename=data.csv');
            // create a file pointer connected to the output stream
            $output = fopen('php://output', 'w');
            // output the column headings
            fputcsv($output, $idfields);

            $sql = "SELECT * FROM `".$table."`;";
            $sth = $DB->dbh->prepare($sql);
            $sth->execute();
            $DB->query_count();
            if($sth->rowCount()>0){
                while($r=$sth->fetch()){
                    $res = array();
                    foreach($idfields as $idfield) {
                        $res[$idfield] = $r[$idfield];
                    }
                    // loop over the rows, outputting them
                    fputcsv($output, $res);
                }
            }
        }
    }

    public function boysgirls(){
    	$result='';
    	$DB=\DB::init();
    	if($DB->connected()){
    		$sql = "SELECT * FROM `maktab_form1` WHERE `soli_tahsil`=2013;";
			$sth = $DB->dbh->prepare($sql);
			$sth->execute();
			$DB->query_count();
			$total=0; $girls=0;
			if($sth->rowCount()>0){
				while($r=$sth->fetch()){
					$total+=$r['shumorai_khonanda'];
					$girls+=$r['duxtaron'];
				}
			}
    	}
    	$boys=$total-$girls;
    	$boysp=round((100*$boys)/$total);
    	$girlsp=100-$boysp;
    	$dt=array(
    		'total'=>$total,
    		'girls'=>$girls,
    		'boys'=>$boys,
    		'boysp'=>$boysp,
    		'girlsp'=>$girlsp
    		);
    	$result=json_encode($dt);
    	return $result;
    }

    public function shumora_maktab_rayon($geoid=2){
    	$result=''; $data=array();
    	$DB=\DB::init();
    	if($DB->connected()){
            $gdw=" AND `geo_id`=".$geoid;
            if($geoid==0){
                $gdw=" AND `geo_id`=2 OR `geo_id`=3 OR `geo_id`=4 OR `geo_id`=5";
            }
    		$sql = "SELECT `muassisa_id`,`shumorai_khonanda`,`name_ru`,`namud`,`geo_id`,`geo-name`
    		FROM `maktab_form1`
    		LEFT OUTER JOIN `muassisaho` ON `maktab_form1`.`muassisa_id`=`muassisaho`.`m-id`
    		LEFT OUTER JOIN `geo` ON `muassisaho`.`geo_id`=`geo`.`geo-id`   		
    		WHERE `namud`=2 AND `soli_tahsil`=2013".$gdw." ORDER BY `geo_id`,`name_ru`;";
			$sth = $DB->dbh->prepare($sql);
			$sth->execute();
			$DB->query_count();
			if($sth->rowCount()>0){
				while($r=$sth->fetch()){
					if($r['geo-name']!='') $data[$r['geo-name']][$r['name_ru']]=$r['shumorai_khonanda'];
				}
			}
    	}
    	//$result=json_encode($data);
    	$result.='
    	var barChartData = {
		    labels: [';
		    $fl=false;
		    foreach ($data as $rayon => $maktabho) {
		    	foreach ($maktabho as $maktab => $shumora) {
		    		if($fl) $result.=',';
			    	$result.='"'.$maktab.'"';
			    	if(!$fl) $fl=true;
		    	}		    	
		    }
		    $result.='],
		    datasets: [
		    ';
		    $fl=false; $f2=false;
		    foreach ($data as $rayon => $maktabho) {
		    	if($f2) $result.=',';
		    	$result.='
		        {
		            label: "'.$rayon.'",
		            fillColor: "rgba(151,187,205,0.5)",
		            strokeColor: "rgba(151,187,205,0.8)",
		            highlightFill: "rgba(151,187,205,0.75)",
		            highlightStroke: "rgba(151,187,205,1)",
		            data: [';
		            foreach ($maktabho as $maktab => $shumora) {
			    		if($fl) $result.=',';
				    	$result.=$shumora;
				    	if(!$fl) $fl=true;
			    	}
		            $result.=']
		        }';
		        if(!$f2) $f2=true;
		    }
		    $result.='
		    ]
		};
		';
    	return $result;
    }

    public function lines(){
    	$result=''; $data=array();
    	$DB=\DB::init();
    	if($DB->connected()){
    		$sql = "SELECT `muassisa_id`,`muassisa_name` FROM `maktab_form1` WHERE `soli_tahsil`=2013;";
			$sth = $DB->dbh->prepare($sql);
			$sth->execute();
			$DB->query_count();
			if($sth->rowCount()>0){
				while($r=$sth->fetch()){
					
				}
			}
    	}
    	
    	$result=json_encode($data);
    	return $result;
    }

    public function lines1(){
        $result=''; $data=array();
        $DB=\DB::init();
        if($DB->connected()){
            $sql = "SELECT * FROM `maktab_form3` ORDER BY `soli_tahsil`;";
            $sth = $DB->dbh->prepare($sql);
            $sth->execute();
            $DB->query_count();
            if($sth->rowCount()>0){
                while($r=$sth->fetch()){
                    $boys=$r['xonandagon_umumi']-$r['xonandagon_duxtar'];
                    $girls=$r['xonandagon_duxtar'];
                    $sol=$r['soli_tahsil'];
                    $data[]=array('year'=>$sol.'г.','girls'=>$girls,'boys'=>$boys);
                }
            }
        }
        $result=json_encode($data);
        return $result;
    }

    public function lnfrm4(){
        $result=''; $data=array();
        $DB=\DB::init();
        if($DB->connected()){
            $sql = "SELECT * FROM `maktab_form4` ORDER BY `soli_tahsil`;";
            $sth = $DB->dbh->prepare($sql);
            $sth->execute();
            $DB->query_count();
            if($sth->rowCount()>0){
                while($r=$sth->fetch()){
                    $sol=$r['soli_tahsil'];
                    $umumi=$r['miqdori_muassisaho_umumi'];
                    $ruzona=$r['miqdori_muassisaho_ruzona'];
                    $goibona=$r['miqdori_muassisaho_ghoibona'];
                    $data[]=array('sol'=>$sol.'г.','umumi'=>$umumi,'ruzona'=>$ruzona,'goibona'=>$goibona);
                }
            }
        }
        $result=json_encode($data);
        return $result;
    }

    public function dbar(){
        $data=array();
        $DB=\DB::init();
        if($DB->connected()){
            $sql = "SELECT * FROM `maktab_form5` 
            LEFT OUTER JOIN `geo` ON `geo_id`=`geo-id`
            WHERE `geo_id`>1
            ORDER BY `soli_tahsil`,`geo_id`;";
            $sth = $DB->dbh->prepare($sql);
            $sth->execute();
            $DB->query_count();
            if($sth->rowCount()>0){
                while($r=$sth->fetch()){
                    $umumi=$r['xatmkunandagon_umumi'];       
                    $data[$r['geo-name']][$r['soli_tahsil']]=$umumi;
                }
            }
        }
        return $data;
    }

}