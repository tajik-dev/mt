<?php
$result.='<form action="./?c=frm&act=save&frm=kom1" method="post">
<h3>Шакли KOM-1</h3>
<h4>Ҳисобот оид ба ҳайати кормандон ва омӯзгорони муассисаҳои таҳсилоти умумӣ</h4>

<table class="table table-bordered table-hover" style="width:auto;">
<thead>
<tr>
<th>№<br> т/р</th>
<th>Ному насаб</th>
<th>Ҷинс</th>
<th>Маълумот</th>
<th>Рамз ва номгӯи ихтисос</th>
<th>Унвони илмӣ</th>
<th>Дараҷаи тахассус</th>
<th>Мутахассиси ҷавон</th>
<th>Аълочии маориф аст</th>
<th>Бори охир аз курси такмили ихтисос кай гузаштааст (сол)</th>
</tr>
<tr>
<th></th>
<th>1</th>
<th>4</th>
<th>8</th>
<th>9</th>
<th>10</th>
<th>11</th>
<th>12</th>
<th>16</th>
<th>20</th>
</tr>
</thead>
<tbody>
';
for ($r=0; $r < 20 ; $r++) {
$result.='<tr>
';
  for ($c=0; $c < 10 ; $c++) { 
    $result.='<td></td>';
  }
$result.='</tr>
';
}
$result.='
</tbody>
</table>
';
$result.='
</form>';