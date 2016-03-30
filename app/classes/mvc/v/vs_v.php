<?php
namespace APP\MVC\V;

class VS_V {

public function main($model){
	$result='<div><h4>'.\CORE::t('dvs','Data visualization').':</h4></div>';
	$result.='<ul class="list-group">
    <li class="list-group-item"><a href="./?c=vs&v=donut"><small><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></small> 
    Соотношение количества девочек и мальчиков в школах г. Душанбе на 2013-2014 уч. год</a></li>
    <li class="list-group-item"><a href="./?c=vs&v=bar"><small><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></small> 
    Количество учащихся в средних школах, по районам города Душанбе</a></li>
    <li class="list-group-item"><a href="./?c=vs&v=lines"><small><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></small> 
    Динамика изменения количества мальчиков и девочек в школах г. Душанбе в период 2006-2013 гг.</a></li>
    <li class="list-group-item"><a href="./?c=vs&v=lnfrm4"><small><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></small> 
    Динамика изменения кол-ва образовательных учреждений г. Душанбе в период с 2006 по 2013 гг.</a></li>
    <li class="list-group-item"><a href="./?c=vs&v=dbar"><small><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></small> 
    Показатели общего количества учащихся школ по районам г. Душанбе (2010-2013гг.)</a></li>
</ul>
';
	return $result;
}


}