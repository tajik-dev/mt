<?php
$result.='<form action="./?c=frm&act=save&frm=tm1_p1" method="post">
<h3>Шакли TM-1 (1)</h3>
<h4>I. Тақcимоти синфҳои таълимb ва хонандагон аз рӯи забони таълим</h4>

<table class="table table-bordered table-hover" style="width:auto;">
<thead>
<tr>
<th rowspan="4">№ сатр</th>
<th rowspan="4">Номгуи<br> миллат</th>
<th class="text-center" colspan="24">Забони таълим - __________________</th>
<th rowspan="4" class="tm1_p1_all_tj"></th>
<th rowspan="4" class="tm1_p1_girls_tj"></th>
</tr>
<tr>
<th class="text-center" colspan="2">Синфи 1</th>
<th class="text-center" colspan="2">Синфи 2</th>
<th class="text-center" colspan="2">Синфи 3</th>
<th class="text-center" colspan="2">Синфи 4</th>
<th class="text-center" colspan="2">Синфи 5</th>
<th class="text-center" colspan="2">Синфи 6</th>
<th class="text-center" colspan="2">Синфи 7</th>
<th class="text-center" colspan="2">Синфи 8</th>
<th class="text-center" colspan="2">Синфи 9</th>
<th class="text-center" colspan="2">Синфи 10</th>
<th class="text-center" colspan="2">Синфи 11</th>
<th class="text-center" colspan="2">Синфи 12</th>
</tr>
<tr>
<th class="tm1_p1_all_tj"></th>
<th class="tm1_p1_girls_tj"></th>
<th class="tm1_p1_all_tj"></th>
<th class="tm1_p1_girls_tj"></th>
<th class="tm1_p1_all_tj"></th>
<th class="tm1_p1_girls_tj"></th>
<th class="tm1_p1_all_tj"></th>
<th class="tm1_p1_girls_tj"></th>
<th class="tm1_p1_all_tj"></th>
<th class="tm1_p1_girls_tj"></th>
<th class="tm1_p1_all_tj"></th>
<th class="tm1_p1_girls_tj"></th>
<th class="tm1_p1_all_tj"></th>
<th class="tm1_p1_girls_tj"></th>
<th class="tm1_p1_all_tj"></th>
<th class="tm1_p1_girls_tj"></th>
<th class="tm1_p1_all_tj"></th>
<th class="tm1_p1_girls_tj"></th>
<th class="tm1_p1_all_tj"></th>
<th class="tm1_p1_girls_tj"></th>
<th class="tm1_p1_all_tj"></th>
<th class="tm1_p1_girls_tj"></th>
<th class="tm1_p1_all_tj"></th>
<th class="tm1_p1_girls_tj"></th>
</tr>
</thead>
<tbody>
';
foreach ($zabonho as $code => $language) {
$result.='
<tr>
<td>'.$code.'</td><td>'.$language.'</td>
';
for ($i=1; $i <= 26; $i++) { 
	$result.='<td><input name="f'.$code.'_'.$i.'" size="1"></td>
';
}
$result.='
</tr>
';
}
$result.='
</tbody>
</table>

<div class="form-group row">
    <div class="col-sm-12 text-center">
        <button type="submit" class="btn btn-primary">'.\CORE::t('save','Save').'</button>
    </div>
</div>

</form>
';