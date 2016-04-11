<?php
$result.='<form action="./?c=frm&act=save&frm=tm1_p12" method="post">
<h3>ФБ</h3>
<h4>Маълумот оид ба шумораи бачагони синни 6 то 18 сола, ки дар  маҳалли хизматрасонии муассисаи
таълимӣ истиқомат мекунанд.
</h4>

<table class="table table-bordered table-hover" style="width:auto;">
<thead>
<tr>
<th rowspan="2" class="text-center">Ному насаб</th>
<th rowspan="2" class="text-center">Суроға</th>
<th rowspan="2" class="text-center">Синну соли<br> бачагон<br> (аз 6 то<br> 18 сола)</th>
<th rowspan="2" class="text-center">Милат</th>
<th colspan="5" class="text-center">Бачагоне,<br> ки таҳсил намекунад,<br> бо сабаби:</th>
<th colspan="5" class="text-center">Вазъи оилавӣ</th>
<th colspan="6" class="text-center">Маъюбон:</th>
</tr>
<tr>
<th class="fb_h fb_h1"></th>
<th class="fb_h fb_h2"></th>
<th class="fb_h fb_h3"></th>
<th class="fb_h fb_h4"></th>
<th class="fb_h fb_h5"></th>
<th class="fb_h fb_h6"></th>
<th class="fb_h fb_h7"></th>
<th class="fb_h fb_h8"></th>
<th class="fb_h fb_h9"></th>
<th class="fb_h fb_h10"></th>
<th class="fb_h fb_h11"></th>
<th class="fb_h fb_h12"></th>
<th class="fb_h fb_h13"></th>
<th class="fb_h fb_h14"></th>
<th class="fb_h fb_h15"></th>
<th class="fb_h fb_h16"></th>
</tr>
<tr>
<th class="text-center">1</th>
<th class="text-center">2</th>
<th class="text-center">3</th>
<th class="text-center">4</th>
<th class="text-center">5</th>
<th class="text-center">6</th>
<th class="text-center">7</th>
<th class="text-center">8</th>
<th class="text-center">9</th>
<th class="text-center">10</th>
<th class="text-center">11</th>
<th class="text-center">12</th>
<th class="text-center">13</th>
<th class="text-center">14</th>
<th class="text-center">15</th>
<th class="text-center">16</th>
<th class="text-center">17</th>
<th class="text-center">18</th>
<th class="text-center">19</th>
<th class="text-center">20</th>
</tr>
</thead>
<tbody>
';
for ($r=0; $r < 30; $r++) { 
$result.='<tr>
';	
	for ($c=0; $c < 20 ; $c++) { 
		$result.='<td></td>';
	}
$result.='</tr>
';
}
$result.='
</tbody>
</table>
';

$result.='</form>';