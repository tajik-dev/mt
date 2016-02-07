<?php
$UI->pos['main'].='<div class="row">
    <div class="col-sm-6 text-center">
        <h2>ШИНОСНОМАИ МАКТАБ</h2>
        <p><em>
(Шиноснома маълумот оид ба муассисаи таҳсилоти миёнаи умумиро дар бар мегирад)
        </em></p>
    </div>
</div>
<br>
<form class="form-horizontal" action="./?c=frm&act=km1&do=add" method="post">
    <div class="row">

        <div class="col-sm-12">
        	<div class="form-group">
                <label for="mt_name" class="col-sm-3 control-label">*Номи пурраи муассиса:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="mt_name" name="mt_name">
                </div>
            </div>
            <div class="form-group">
                <label for="shinosnoma_num" class="col-sm-3 control-label">Рақами шиноснома:</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="shinosnoma_num" name="shinosnoma_num">
                </div>
            </div>            
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label for="mt_type" class="col-sm-3 control-label">Намуди муассиса:</label>
                <div class="col-sm-3">
                    <select id="mt_type" name="mt_type" class="form-control">
                        <option value="1">1. Сардафтар ҳаст</option>
                        <option value="2">2. Филиал ҳаст</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="number" class="col-sm-3 control-label">№ муассиса / филиал:</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="number" name="number">
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-sm-10" style="text-align: center;">
            <button type="submit" class="btn btn-danger">Отмена</button>
            <button type="submit" class="btn btn-default">Сохранить</button>
        </div>
    </div>
</form>
';
