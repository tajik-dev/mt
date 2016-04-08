<?php
$result.='
<form action="./?c=frm&act=ps" method="post">
<h2>ШИНОСНОМАИ МАКТАБ</h2>
<p><em>(Шиноснома маълумот оид ба муассисаи таҳсилоти миёнаи умумиро дар бар мегирад)</em></p>
<hr>

<!-- mt_id, year -->

<div class="form-group row">
    <div class="col-sm-2">
    <label for="ps_number">Рақами шиноснома *</label>
    <input type="text" class="form-control" id="ps_number" name="ps_number">
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-5">
    <label for="mt_name">Номи пурраи муассиса *</label>
    <input type="text" class="form-control" id="mt_name" name="mt_name">
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-3">
    <label for="geo">Ҷойгиршавӣ *</label>
        <div id="geo_box">
            <select class="form-control" id="geo" name="geo" disabled>
                <option value="2">ш. Душанбе, ноҳияи И. Сомони</option>
                <option value="3">ш. Душанбе, ноҳияи Сино</option>
                <option value="4">ш. Душанбе, ноҳияи Шоҳмансур</option>
                <option value="5">ш. Душанбе, ноҳияи Фирдавси</option>
            </select>
        </div>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-5">
    <label for="address">Суроғаи юридикӣ *</label>
    <input type="text" class="form-control" id="address" name="address">
    </div>
</div>

<div class="form-group">
    <label class="control-label">Намуди муассиса</label>
    <div>
        <label class="radio-inline">
            <input type="radio" name="is_filial" value="0" checked="checked" /> Сардафтар ҳаст
        </label>
        <label class="radio-inline">
            <input type="radio" name="is_filial" value="1" /> Филиал ҳаст
        </label>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        <label for="mt_number">№ муассиса/филиал</label>
        <input type="text" class="form-control" id="mt_number" name="mt_number">
    </div>
    <div class="col-sm-2">
        <label for="filial_number">Шумораи филиалҳо</label>
        <input type="text" class="form-control" id="filial_number" name="filial_number">
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        <label for="phone">Телефон</label>
        <input type="text" class="form-control" id="phone" name="phone">
    </div>
    <div class="col-sm-2">
        <label for="fax">Факс</label>
        <input type="text" class="form-control" id="fax" name="fax">
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        <label for="website">Нишонии сомона (www)</label>
        <input type="text" class="form-control" id="website" name="website">
    </div>
    <div class="col-sm-2">
        <label for="email">Почтаи электронӣ (E-mail)</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
</div>

<hr>

<div class="form-group row">
    <div class="col-sm-2">
        <label for="square" title="(синфхонаҳо, кабинетҳо ва лабораторияҳо)">Масоҳати таълимӣ</label>
        <input type="text" class="form-control" id="square" name="square">
    </div>
    <div class="col-sm-2">
        <label for="project_сapacity">Иқтидори лоиҳавӣ</label>
        <input type="text" class="form-control" id="project_сapacity" name="project_сapacity">
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        <label for="foundation_year">Соли таъсисёбӣ</label>
        <input type="text" class="form-control" id="foundation_year" name="foundation_year">
    </div>
</div>

<hr>

<h4>КООРДИНАТҲОИ ҶУҒРОФИ МУАССИСА</h4><br>

<div class="form-group row">
    <div class="col-sm-2">
        <label for="latitude">Арз <em style="font-weight:normal;">(широта,latitude)</em></label>
        <input type="text" class="form-control" id="latitude" name="latitude">
    </div>
    <div class="col-sm-2">
        <label for="longitude">Тел <em style="font-weight:normal;">(долгота,longitude)</em></label>
        <input type="text" class="form-control" id="longitude" name="longitude">
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        <label for="above_sea">Баланди аз сатҳи баҳр (метр)</label>
        <input type="text" class="form-control" id="above_sea" name="above_sea">
    </div>
</div>

<hr>

<div class="form-group row">
    <div class="col-sm-2">
        <label for="shakli_molikiyat">Шакли моликият</label>
        <select class="form-control" id="shakli_molikiyat" name="shakli_molikiyat">
            <option value="1">Давлатӣ</option>
            <option value="2">Гайридавлатӣ</option>
            <option value="3">Омехта</option>
        </select>
    </div>
    <div class="col-sm-2">
        <label for="zinai_tahsil">Зинаи таҳcил</label>
        <select id="zinai_tahsil" name="zinai_tahsil" class="form-control">
            <option value="1">Ибтидоӣ</option>
            <option value="2">Асосӣ</option>
            <option value="3">Миёна</option>
        </select>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        <label for="namudi_tobeiyat">Намуди тобеъият</label>
        <select class="form-control" id="namudi_tobeiyat" name="namudi_tobeiyat">
            <option value="1">Маҳаллӣ</option>
            <option value="2">Ҷумҳуриявӣ</option>
        </select>
    </div>
    <div class="col-sm-2">
        <label for="mavzei_joygirshavi">Мавзеъи ҷойгиршавӣ</label>
        <select id="mavzei_joygirshavi" name="mavzei_joygirshavi" class="form-control">
            <option value="1">Шаҳр</option>
            <option value="2">Деҳот</option>
        </select>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        <label for="makomi_mt">Мақоми муассиса</label>
        <select class="form-control" id="makomi_mt" name="makomi_mt">
            <option value="1">Оддӣ</option>
            <option value="2">Президентӣ</option>
            <option value="3">Барои бачагони лаёқатманд</option>
        </select>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-5">
        <label for="namudi_maktab">Намуди мактаб</label>
        <select class="form-control" id="namudi_maktab" name="namudi_maktab">
            <option value="1">Ибтидоӣ</option>
            <option value="2">Асосӣ</option>
            <option value="3">Миёна(пурра)</option>
            <option value="4">Гимназия</option>
            <option value="5">Литсей</option>
            <option value="6">Мактаб-интернати кӯдакони ятим</option>
            <option value="7">Мактаб-интернати кӯдакони кар</option>
            <option value="8">Мактаб-интернати санаторӣ</option>
            <option value="9">Мактаб-интернат барои кӯдакони шунавоияшон суст ва деркаршуда</option>
            <option value="10">Мактаб-интернати кӯдакони нобино ва биноияшон суст</option>
            <option value="11">Мактаб-интернати низомаш махсус (полиомиелит)</option>
            <option value="12">Мактаби махсус (душвортарбия)</option>
            <option value="13">Интернати наздимактабӣ</option>
            <option value="14">Мактаб-интернати ёрирасон (кӯдакони ақлан носолим)</option>
            <option value="15">Хонаи бачагон</option>
            <option value="16">Мактаб-кӯдакистон</option>

            <option value="17">Мактаби ғоибона (шабона)</option>
            <option value="18">Мактаб-интернати мусиқӣ</option>
            <option value="19">Мактаб-интернати варзишӣ</option>
            <option value="20">Мактаб-интернати лаёқатманд</option>
        </select>
    </div>
</div>

<hr>

<h4>Иҷозатнома оид ба ҳуқуқи пешбурди фаъолияти таълимӣ</h4><br>

<div class="form-group row">
    <div class="col-sm-5">
        <label for="faol_muassis">Муассис</label>
        <input type="text" class="form-control" id="faol_muassis" name="faol_muassis">
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-4">
        <label for="faol_serial">Серия ва рақами иҷозатнома</label>
        <input type="text" class="form-control" id="faol_serial" name="faol_serial">
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="faol_sana">Санаи гирифтан</label>
        <input type="text" class="form-control" id="faol_sana" name="faol_sana">
    </div>
    <div class="col-sm-2">
        <label for="faol_muhlat">Мӯҳлати иҷозатнома то</label>
        <input type="text" class="form-control" id="faol_muhlat" name="faol_muhlat">
    </div>
</div>

<hr>

<h4>Шаҳодатнома дар бораи аккредитатсияи давлатӣ</h4><br>

<div class="form-group row">
    <div class="col-sm-4">
        <label for="akred_serial">Серия ва рақами он</label>
        <input type="text" class="form-control" id="akred_serial" name="akred_serial">
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="akred_sana">Таърихи додани санад</label>
        <input type="text" class="form-control" id="akred_sana" name="akred_sana">
    </div>
    <div class="col-sm-2">
        <label for="akred_muhlat">Мӯҳлати шаҳодатнома то</label>
        <input type="text" class="form-control" id="akred_muhlat" name="akred_muhlat">
    </div>
</div>

<hr>

<h4>Шаҳодатнома дар бораи бақайдгирии давлатии таъсисёбии муассиса</h4><br>

<div class="form-group row">
    <div class="col-sm-3">
        <label for="rakami_mushahas">Рақами ягонаи мушаххас</label>
        <input type="text" class="form-control" id="rakami_mushahas" name="rakami_mushahas">
    </div>
    <div class="col-sm-2">
        <label for="sudur_sana">Санаи судур</label>
        <input type="text" class="form-control" id="sudur_sana" name="sudur_sana">
    </div>
</div>

<hr>

<h4>Шиносномаи техникии муассиса</h4><br>

<div class="form-group row">
    <div class="col-sm-3">
        <label for="techpas_rakam">Рақами барӯйхатгирӣ</label>
        <input type="text" class="form-control" id="techpas_rakam" name="techpas_rakam">
    </div>
    <div class="col-sm-2">
        <label for="techpas_sana">Санаи додани он</label>
        <input type="text" class="form-control" id="techpas_sana" name="techpas_sana">
    </div>
</div>

<hr>

<h4>Сертификати замине, ки дар он мактаб ҷойгир шудааст</h4><br>

<div class="form-group row">
    <div class="col-sm-3">
        <label for="zamin_cert">Рақами сертификат</label>
        <input type="text" class="form-control" id="zamin_cert" name="zamin_cert">
    </div>
    <div class="col-sm-2">
        <label for="zamin_sana">Санаи додани он</label>
        <input type="text" class="form-control" id="zamin_sana" name="zamin_sana">
    </div>
</div>

<hr>

<div class="form-group row">
    <div class="col-sm-5 text-right">
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </div>
</div>

</form>
';
$ps=[
'year'=>0,
'mt_id'=>0,
'ps_number'=>'',
'mt_name'=>'',
'geo'=>0,
'address'=>'',
'is_filial'=>0,
'mt_number'=>null,
'filial_number'=>null,
'phone'=>null,
'fax'=>null,
'website'=>null,
'email'=>null,
'square'=>null,
'project_сapacity'=>null,
'foundation_year'=>null,
'latitude'=>null,
'longitude'=>null,
'above_sea'=>null,
'shakli_molikiyat'=>null,
'zinai_tahsil'=>null,
'namudi_tobeiyat'=>null,
'mavzei_joygirshavi'=>null,
'makomi_mt'=>null,
'namudi_maktab'=>null,
'faol_muassis'=>null,
'faol_serial'=>null,
'faol_sana'=>null,
'faol_muhlat'=>null,
'akred_serial'=>null,
'akred_sana'=>null,
'akred_muhlat'=>null,
'rakami_mushahas'=>null,
'sudur_sana'=>null,
'techpas_rakam'=>null,
'techpas_sana'=>null,
'zamin_cert'=>null,
'zamin_sana'=>null,
'editor'=>null,
];