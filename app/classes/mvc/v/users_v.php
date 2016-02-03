<?php
namespace APP\MVC\V;

class USERS_V {


public function main($model){
	$result='';
	$users=$model->get_users();
	$counter=count($users);
	$result.='
<div>
	<h4>Users: <span class="badge">'.$counter.'</span>
	</h4>
</div>
';
if($counter>0){
		$result.='
<table class="table table-bordered table-hover" style="width:auto;">
	<thead>
		<tr>
			<th>#</th>
			<th>USER</th>
			<th>GROUP</th>
			<th>STATUS</th>
			<th>LOGIN TIME</th>
		</tr>
	</thead>
<tbody>
';
		$cnt=0;
		foreach ($users as $uid => $user) {
			$cnt++;
			$result.='
<tr>
	<td>'.$cnt.'</td>
	<td>'.$user['user'].'</td>
	<td>'.$user['gid'].'</td>
	<td>'.$user['status'].'</td>
	<td>'.$user['lastlogin'].'</td>
</tr>
';
		}
		$result.="</tbody></table>\n";
	} else {
		$result.='<div class="well">'.\CORE::init()->lang('norecdb','No records found in the database.').'</div>';
	}
	return $result;
}



}
