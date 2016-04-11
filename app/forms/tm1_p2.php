<?php
$sinfho=array(
'201'=>'Ҷамъиятӣ-гуманитарӣ',
'202'=>'Ҷамъиятӣ-гуманитарӣ барои соҳаи филологӣ',
'203'=>'Ҷамъиятӣ-гуманитарӣ барои соҳаи таъриху ҳуқуқ',
'204'=>'Табиӣ-математикӣ',
'205'=>'Табиӣ-математикӣ  барои соҳаи физикаю-химия ',
'206'=>'Табиӣ-математикӣ  барои соҳаи биологияю-география ',
'207'=>'Табиӣ-математикӣ  барои соҳаи химияю-биология',
'208'=>'Технологӣ',
'209'=>'Технологӣ барои соҳаи агротехнология',
'210'=>'Технологӣ барои соҳаи зерравияи индустриалӣ-технологӣ',
'211'=>'Технологӣ барои соҳаи зерравияи технологияи информатсионӣ ва коммуникатсионӣ',
'212'=>'Омӯзиши амиқи фанҳои алоҳида (гурӯҳи фанҳо)',
'213'=>'<strong>Ҳамагӣ</strong>',
	);
$result.='<form action="./?c=frm&act=save&frm=tm1_p2" method="post">
<h3>Шакли TM-1 (2)</h3><br>
<h4>II. Тақсимоти хонандагон аз рӯи равияи таълим</h4>

<table class="table table-bordered table-hover" style="width:auto;">
<thead>
<tr>
<th rowspan="3" class="text-center">№<br> сатр</th>
<th rowspan="3" class="text-center">Номгӯи синфҳо</th>
<th colspan="12" class="text-center">ЗАБОНҲОИ ТАЪЛИМӢ</th>
</tr>
<tr>
<th colspan="3" class="text-center">( забони таълим )</th>
<th colspan="3" class="text-center">( забони таълим )</th>
<th colspan="3" class="text-center">( забони таълим )</th>
<th colspan="3" class="text-center">Ҳамагӣ</th>
</tr>
<tr>

<th>Миқдори синфҳо</th>
<th>Шумораи хонандагон</th>
<th>Аз онҳо духтарон</th>

<th>Миқдори синфҳо</th>
<th>Шумораи хонандагон</th>
<th>Аз онҳо духтарон</th>

<th>Миқдори синфҳо</th>
<th>Шумораи хонандагон</th>
<th>Аз онҳо духтарон</th>

<th>Миқдори синфҳо</th>
<th>Шумораи хонандагон</th>
<th>Аз онҳо духтарон</th>

</tr>
</thead>
<tbody>
<tr style="font-weight:bold;text-align:center;">
<td>A</td><td>B</td>
<td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td>
<td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td>
</tr>
';

foreach ($sinfho as $satr => $sinf) {
	$result.='<tr><td>'.$satr.'</td><td>'.$sinf.'</td>';
	for ($i=0; $i < 12; $i++) { 
		$result.='<td></td>';
	}
	$result.='</tr>
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