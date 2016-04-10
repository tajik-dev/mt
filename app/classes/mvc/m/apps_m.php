<?php
namespace APP\MVC\M;

class APPS_M {


public function get_apps(){
    $lang=\CORE::lng();
	$apps=array();
	$DB=\DB::init();
	if($DB->connect()){
        $sql="SELECT * FROM `mt-apps` ORDER BY `ap-id` DESC LIMIT 250;";
        $sth=$DB->dbh->prepare($sql);
        $sth->execute();
        $DB->query_count();
        if($sth->rowCount()>0){
            while($r=$sth->fetch()){
                $apps[$r['ap-id']]=array(
                	'mt'=>$r['ap-mt'],
                	'sname'=>$r['ap-kid-sname'],
                	'name'=>$r['ap-kid-name'],
                	'fname'=>$r['ap-kid-fname'],
                	'birthday'=>date('d.m.Y',strtotime($r['ap-kid-birthday'])),
                	'shahodatnoma'=>$r['ap-kid-shahodatnoma'],
                	'parentfio'=>$r['ap-parent-fio'],
                	'address'=>$r['ap-parent-address'],
                	'email'=>$r['ap-parent-email'],
                	'phone'=>$r['ap-parent-phone'],
                	'frmhash'=>$r['ap-code'],
                	'status'=>$r['ap-status'],
                	'cmt'=>$r['ap-cmt'],
                	'time'=>date('d.m.Y H:i:s',strtotime($r['ap-time'])),
                	);
            }
        }
    }
	return $apps;
}

public function save(){
	if(isset($_POST['frmhash'])){
		$valid=true;
		$app=array(
			'mt'=>0,
			'name'=>'',
			'sname'=>'',
			'fname'=>'',
			'birthday'=>'',
			'shahodatnoma'=>'',
			'parentfio'=>'',
			'address'=>'',
			'email'=>'',
			'phone'=>'',
			'frmhash'=>'',
			);
		if(isset($_POST['mt'])) {$app['mt']=(int) $_POST['mt'];}
		if(isset($_POST['name'])) {$app['name']=trim($_POST['name']);}
		if(isset($_POST['sname'])) {$app['sname']=trim($_POST['sname']);}
		if(isset($_POST['fname'])) {$app['fname']=trim($_POST['fname']);}
		if(isset($_POST['birthday'])) {if(trim($_POST['birthday'])!='') $app['birthday']=date('Y-m-d',strtotime(trim($_POST['birthday'])));}
		if(isset($_POST['shahodatnoma'])) {$app['shahodatnoma']=trim($_POST['shahodatnoma']);}
		if(isset($_POST['parentfio'])) {$app['parentfio']=trim($_POST['parentfio']);}
		if(isset($_POST['address'])) {$app['address']=trim($_POST['address']);}
		if(isset($_POST['email'])) {$app['email']=trim($_POST['email']);}
		if(isset($_POST['phone'])) {$app['phone']=trim($_POST['phone']);}
		$app['frmhash']=trim($_POST['frmhash']);
		// validation
		if($app['mt']==0) {$valid=false;}
		if($app['name']=='') {$valid=false;}
		if($app['sname']=='') {$valid=false;}
		if($app['fname']=='') {$valid=false;}
		if($app['birthday']=='') {$valid=false;}
		if($app['shahodatnoma']=='') {$valid=false;}
		if($app['parentfio']=='') {$valid=false;}
		if($app['address']=='') {$valid=false;}
		if($app['email']=='') {$valid=false;}
		if($app['phone']=='') {$valid=false;}
		if($app['frmhash']=='') {$valid=false;}
		if($valid){
			$DB=\DB::init();
	        if($DB->connect()){
	            $sql="SELECT * FROM `mt-apps` WHERE `ap-code`=:frmhash;";
	            $sth=$DB->dbh->prepare($sql);
	            $sth->execute(array('frmhash'=>$app['frmhash']));
	            $DB->query_count();
	            if($sth->rowCount()>0){
	                \CORE::msg('error','Such record already exist.');
	            } else {
	                $sql="INSERT INTO `mt-apps` SET
	                    `ap-mt`=:mt,
	                    `ap-kid-name`=:name,
	                    `ap-kid-sname`=:sname,
	                    `ap-kid-fname`=:fname,
	                    `ap-kid-birthday`=:birthday,
	                    `ap-kid-shahodatnoma`=:shahodatnoma,
	                    `ap-parent-fio`=:parentfio,
	                    `ap-parent-address`=:address,
	                    `ap-parent-email`=:email,
	                    `ap-parent-phone`=:phone,
	                    `ap-code`=:frmhash
	                    ;";
	                $sth=$DB->dbh->prepare($sql);
	                $sth->execute($app);
	                $DB->query_count();
	                $UI=\CORE\UI::init();
	                 $UI->pos['main'].='<div class="text-center"><hr>
		    		<h3><span class="form_sep_red">'.\CORE::t("app_accepted","Заявка принята на обработку").'. 
		    		'.\CORE::t("your_code","Ваш код для отслеживания").':<br><br>
		    		</span>
		    			<span class="label label-primary" style="font-size:22px;padding:12px;">'.$app['frmhash'].'</span>
			    	</h3><br><br>
		    		</div>';
	            }
	        }
		} else {
			\CORE::msg('error','Incorrect user data');
			//echo '<pre>'; print_r($app); echo '</pre>';
		}
	} else {
		\CORE::msg('error','Incorrect user data!');
	}
}

public static function check(){
	$code=''; $lang=\CORE::lng();
	$desc['ru']=array(
		'Введен некорректный код',
		'Заявка на обработке',
		'Заявка отклонена',
		'Заявка успешно принята',
		);
	$desc['tj']=array(
		'Рамзи нодуруст дохил карда шуд',
		'Дархост ҳоло дар навбат аст',
		'Дархост қатъ карда шуд',
		'Дархост қабул карда шуд',
		);
	$status=array(
		'status'=>0,
		'desc'=>$desc['tj'][0],
		'cmt'=>''
		);
	if(isset($_POST['code'])){$code=trim($_POST['code']);}
	if($code!=''){
		$DB=\DB::init();
		if($DB->connect()){
	        $sql="SELECT * FROM `mt-apps` WHERE `ap-code`=:code LIMIT 1;";
	        $sth=$DB->dbh->prepare($sql);
	        $sth->execute(array('code'=>$code));
	        $DB->query_count();
	        if($sth->rowCount()==1){
	            $r=$sth->fetch();
	            $s=(int) $r['ap-status'];
	            $d='';
	            if(isset($desc[$lang][$s])) {$d=$desc[$lang][$s];}
	            $status=array(
					'status'=>$s,
					'desc'=>$d,
					'cmt'=>htmlspecialchars($r['ap-cmt'])
				);
	        }
	    }
	}
	echo json_encode($status);
}

public static function read(){
	$id=0; $lang=\CORE::lng();
	$status=array(
		'status'=>0,
		'cmt'=>''
		);
	if(isset($_POST['id'])){$id=(int) $_POST['id'];}
	if($id>0){
		$DB=\DB::init();
		if($DB->connect()){
	        $sql="SELECT * FROM `mt-apps` WHERE `ap-id`=:id LIMIT 1;";
	        $sth=$DB->dbh->prepare($sql);
	        $sth->execute(array('id'=>$id));
	        $DB->query_count();
	        if($sth->rowCount()==1){
	            $r=$sth->fetch();
	            $s=(int) $r['ap-status'];
	            $status=array(
					'status'=>$s,
					'cmt'=>trim(htmlspecialchars($r['ap-cmt']))
				);
	        }
	    }
	}
	echo json_encode($status);
}

public static function update(){
	$app=array(
		'status'=>0,
		'cmt'=>'',
		'id'=>0
		);
	if(isset($_POST['id'])){$app['id']=(int) $_POST['id'];}
	if(isset($_POST['status'])){$app['status']=(int) $_POST['status'];}
	if(isset($_POST['cmt'])){$app['cmt']=trim($_POST['cmt']);}
	if($app['id']>0){
		$DB=\DB::init();
		if($DB->connect()){
	        $sql="UPDATE `mt-apps` SET `ap-status`=:status,`ap-cmt`=:cmt WHERE `ap-id`=:id;";
	        $sth=$DB->dbh->prepare($sql);
	        $sth->execute($app);
	        $DB->query_count();
	    }
	}
}

public static function queue($mt=0){
	$queue=0;
	if(isset($_POST['mt'])){$mt=(int) $_POST['mt'];}
	if($mt>0){
		$DB=\DB::init();
		if($DB->connect()){
	        $sql="SELECT * FROM `mt-apps` WHERE `ap-mt`=:mt;";
	        $sth=$DB->dbh->prepare($sql);
	        $sth->execute(array('mt'=>$mt));
	        $DB->query_count();
	        $queue=$sth->rowCount();
	    }
	}
    return $queue;
}


}