<?php
$UI->pos['main'].='<div class="row">
    <div class="col-sm-6 text-center">
        <h2>ШИНОСНОМАИ МАКТАБ</h2>
        <p><em>
(Шиноснома маълумот оид ба муассисаи таҳсилоти миёнаи умумиро дар бар мегирад)
        </em></p>
    </div>
</div>
<form class="form-horizontal" action="./?c=frm&act=km1&do=add" method="post">
    <div class="row">
    	<hr>
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
                <div class="col-sm-1">
                    <input type="text" class="form-control" id="number" name="number">
                </div>
            </div>
            <div class="form-group">
                <label for="filialnum" class="col-sm-3 control-label">Шумораи филиалҳо:</label>
                <div class="col-sm-1">
                    <input type="text" class="form-control" id="filialnum" name="filialnum">
                </div>
            </div>
            <div class="form-group">
                <label for="phone" class="col-sm-3 control-label">Телефон:</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="phone" name="phone">
                </div>
            </div>
            <div class="form-group">
                <label for="fax" class="col-sm-3 control-label">Факс:</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="fax" name="fax">
                </div>
            </div>
            <div class="form-group">
                <label for="website" class="col-sm-3 control-label">Нишонии сомона (www):</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="website" name="website">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Почтаи электронӣ (E-mail):</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="email" name="email">
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="mtarea" class="col-sm-3 control-label">Масоҳати таълимӣ 
                <em>(синфхонаҳо,кабинетҳо ва лабораторияҳо)</em>:</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="mtarea" name="mtarea">
                </div>
            </div>
            <div class="form-group">
                <label for="iqtidori_loihavi" class="col-sm-3 control-label">Иқтидори лоиҳавӣ:</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="iqtidori_loihavi" name="iqtidori_loihavi">
                </div>
            </div>
            <div class="form-group">
                <label for="soli_tasisebi" class="col-sm-3 control-label">Соли таъсисёбӣ:</label>
                <div class="col-sm-1">
                    <input type="text" class="form-control" id="soli_tasisebi" name="soli_tasisebi">
                </div>
            </div>
	            <div class="form-group">
	                <label for="geo_coordinates" class="col-sm-5 control-label">КООРДИНАТҲОИ ҶУҒРОФИ МУАССИСА</label>
	            </div>
            <div class="form-group">
                <label for="lat" class="col-sm-3 control-label">Арз (широта/latitude):</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="lat" name="lat">
                </div>
            </div>
            <div class="form-group">
                <label for="lng" class="col-sm-3 control-label">Тел (долгота/longitude):</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="lng" name="lng">
                </div>
            </div>
            <div class="form-group">
                <label for="above_sea" class="col-sm-3 control-label">Баланди аз сатҳи баҳр (метр):</label>
                <div class="col-sm-1">
                    <input type="text" class="form-control" id="above_sea" name="above_sea">
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="shakli_molikiyat" class="col-sm-3 control-label">Шакли моликият:</label>
                <div class="col-sm-3">
                    <select id="shakli_molikiyat" name="shakli_molikiyat" class="form-control">
                        <option disabled>-- Интихоб намоед --</option>
                        <option>Давлатӣ</option>
                        <option>Гайридавлатӣ</option>
                        <option>Омехта</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="zinai_talim" class="col-sm-3 control-label">Зинаи таҳcил:</label>
                <div class="col-sm-3">
                    <select id="zinai_talim" name="zinai_talim" class="form-control">
                        <option disabled>-- Интихоб намоед --</option>
                        <option>Ибтидоӣ</option>
                        <option>Асосӣ</option>
                        <option>Миёна</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="namudi_tobeiyat" class="col-sm-3 control-label">Намуди тобеъият:</label>
                <div class="col-sm-9">
                    <select id="namudi_tobeiyat" name="namudi_tobeiyat" class="form-control">
                        <option disabled>-- Интихоб намоед --</option>
                        <option>Маҳаллӣ</option>
                        <option>Ҷумҳуриявӣ</option>
                    </select>
                </div>
            </div>


        </div>
    </div>
    <br>
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
