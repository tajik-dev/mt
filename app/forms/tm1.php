<?php
$UI->pos['main'].='<div class="row">
<div class="col-sm-12 text-center">
    <h3>ВАЗОРАТИ МАОРИФИ ҶУМҲУРИИ ТОҶИКИСТОН</h3>
    <h3 class="text-center">Ҳисобот оид ба хонандагони муассисаҳои таҳсилоти 
	умумӣ<br> дар аввали соли хониши  20___/20___</h3>
</div>
</div>

<form class="form-horizontal" action="./?c=frm&act=tm1" method="post">

	<div class="row">

        <div class="col-sm-12">

        	<hr>

        	<div class="form-group text-center"><h3 class="col-sm-12">Рамз аз рӯи таснифоти</h3></div>

    		<hr>

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
    </div> <!-- /row -->

    <hr>

    <!-- buttons -->
    <div class="row">
    	<div class="col-sm-3">

        </div>
        <div class="col-sm-4 text-left">
            <button type="submit" class="btn btn-danger">'.\CORE::t('cancel','Отмена').'</button>
            <button type="submit" class="btn btn-default">'.\CORE::t('save','Сохранить').'</button>
        </div>
    </div>
</form>
';