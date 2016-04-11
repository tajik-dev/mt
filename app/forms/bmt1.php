<?php
$result.='
<form action="./?c=frm&act=save&frm=bmt1" method="post">
<h3>БМТ-1</h3>
<h3>Ҳисобот оид ба базаи модди - техникии муассиса дар соли хониши</h3><br>
<h4>Боби 1. Маълумоти умумӣ  (рақамро ба давра гиред)</h4>

<div class="form-group">
	<label for="namudi_bino">Намуди бино(ҳо)и мактаб</label>
	<select id="namudi_bino" class="form-control">
		<option value="1">намунавӣ (типпӣ)</option>
		<option value="2">вагон, хонача</option>
		<option value="3">хонаи шахсӣ</option>
		<option value="4">дигар</option>
	</select>
</div>

<div class="form-group">
	<label for="muvofik_mekunad">Биноҳои мактаб ба меъерҳои қабулшудаи 
	соҳаи маориф мувофиқат мекунанд?</label>
	<select id="muvofik_mekunad" class="form-control">
		<option value="1">Ҳа</option>
		<option value="2">Не</option>
	</select>
</div>

<div class="form-group">
	<label for="masohati_kalamravi">Масоҳати қаламравӣ муассиса, (м2)</label>
	<input type="text" class="form-control" id="masohati_kalamravi" placeholder="">
</div>

<h5>аз ҷумла:</h5>

<div class="form-group">
	<label for="masohati_kalamravi_1">масоҳати умумии биноҳои таълимии мактаб, (м2)</label>
	<input type="text" class="form-control" id="masohati_kalamravi_1" placeholder="">
</div>

<div class="form-group">
	<label for="masohati_kalamravi_2">масоҳати умумии замини наздимактабӣ, (м2)</label>
	<input type="text" class="form-control" id="masohati_kalamravi_2" placeholder="">
</div>

<div class="form-group">
	<label for="masohati_kishovarzi">Масоҳати умумии қитъаи ёрирасони хоҷагии кишоварзӣ, (бо ҳисоби Га),</label>
	<input type="text" class="form-control" id="masohati_kishovarzi" placeholder="">
</div>

<h5>аз ҷумла:</h5>

<div class="form-group">
	<label for="masohati_kishovarzi_1">обӣ, (бо ҳисоби Га)</label>
	<input type="text" class="form-control" id="masohati_kishovarzi_1" placeholder="">
</div>

<div class="form-group">
	<label for="masohati_kishovarzi_2">лалмӣ, (бо ҳисоби Га)</label>
	<input type="text" class="form-control" id="masohati_kishovarzi_2" placeholder="">
</div>

<div class="form-group">
	<label for="masohati_kishovarzi_3">барои кишт, (бо ҳисоби Га)</label>
	<input type="text" class="form-control" id="masohati_kishovarzi_3" placeholder="">
</div>

<div class="form-group">
	<label for="masohati_kishovarzi_4">барои боғ, (бо ҳисоби Га)</label>
	<input type="text" class="form-control" id="masohati_kishovarzi_4" placeholder="">
</div>

<div class="form-group">
	<label for="muvofik_mekunad">Шиносномаи техники дорад?</label>
	<select id="muvofik_mekunad" class="form-control">
		<option value="1">Ҳа</option>
		<option value="2">Не</option>
	</select>
</div>

';

$result.='</form>';