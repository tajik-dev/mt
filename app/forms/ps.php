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
                <label for="shinosnoma_num" class="col-sm-3 control-label">Рақами шиноснома:</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="shinosnoma_num" name="shinosnoma_num">
                </div>
            </div>
            <div class="form-group">
                <label for="mt_name" class="col-sm-3 control-label">*Номи пурраи муассиса:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="mt_name" name="mt_name">
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
                <label for="mt_geo" class="col-sm-3 control-label">*Ҷойгиршавӣ:</label>
                <div class="col-sm-6">
                    <select id="mt_geo" name="mt_geo" class="form-control">
                        <option value="1">Geo</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="surogha" class="col-sm-3 control-label">Суроға</label>

                <div class="col-sm-9">
                    <input type="text" class="form-control" id="surogha" name="surogha">
                </div>
            </div>


            <div class="form-group">
                <label for="muassisa_fullname" class="col-sm-3 control-label">Номи пурраи муассиса</label>

                <div class="col-sm-9">
                    <input type="text" class="form-control" id="muassisa_fullname" name="muassisa_fullname">
                </div>
            </div>

            <div class="form-group">
                <label for="muassisa" class="col-sm-3 control-label">№ муассиса</label>

                <div class="col-sm-9">
                    <input type="text" class="form-control" id="muassisa" name="muassisa">
                </div>
            </div>

            <hr/>

            <div class="form-group">
                <label for="shakli_molikiyat" class="col-sm-3 control-label">Шакли моликият</label>

                <div class="col-sm-9">
                    <select id="shakli_molikiyat" name="shakli_molikiyat" class="form-control">
                        <option>--Интихоб намоед--</option>
                        <option>Давлатӣ</option>
                        <option>Гайридавлатӣ</option>
                        <option>Омехта</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="zinai_talim" class="col-sm-3 control-label">Зинаи таълим</label>

                <div class="col-sm-9">
                    <select id="zinai_talim" name="zinai_talim" class="form-control">
                        <option>--Интихоб намоед--</option>
                        <option>Ибтидоӣ</option>
                        <option>Асосӣ</option>
                        <option>Миёна</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="makomi_muassisa" class="col-sm-3 control-label">Мақоми муассиса</label>

                <div class="col-sm-9">
                    <select id="makomi_muassisa" name="makomi_muassisa" class="form-control">
                        <option>--Интихоб намоед--</option>
                        <option>Оддӣ</option>
                        <option>Президентӣ</option>
                        <option>Барои бачагони лаёқатманд</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-sm-5">


            <div class="form-group">
                <label for="filial" class="col-sm-7 control-label">№ филиал</label>

                <div class="col-sm-5">
                    <input type="text" class="form-control" id="filial" name="filial">
                </div>
            </div>

            <div class="form-group">
                <label for="num_filial" class="col-sm-7 control-label">Шумораи филиалҳо</label>

                <div class="col-sm-5">
                    <input type="text" class="form-control" id="num_filial" name="num_filial">
                </div>
            </div>

            <div class="form-group">
                <label for="soli_taisisyobi" class="col-sm-7 control-label">Соли таъсисёбии мактаб</label>

                <div class="col-sm-5">
                    <input type="text" class="form-control" id="soli_taisisyobi" name="soli_taisisyobi">
                </div>
            </div>

            <div class="form-group">
                <label for="joi_nishast" class="col-sm-7 control-label">Иқтидори лоиҳавӣ (ҷои нишаст)</label>

                <div class="col-sm-5">
                    <input type="text" class="form-control" id="joi_nishast" name="joi_nishast">
                </div>
            </div>

            <div class="form-group">
                <label for="masohati_sinfxonaho" class="col-sm-7 control-label">Масоҳати синфхонаҳо ва кабинетҳои
                    таълимӣ (м2)</label>

                <div class="col-sm-5">
                    <input type="text" class="form-control" id="masohati_sinfxonaho" name="masohati_sinfxonaho">
                </div>
            </div>

            <hr/>

            <div class="form-group">
                <label for="namudi_tobeiyat" class="col-sm-3 control-label">Намуди тобеъият</label>

                <div class="col-sm-9">
                    <select id="namudi_tobeiyat" name="namudi_tobeiyat" class="form-control">
                        <option>--Интихоб намоед--</option>
                        <option>Маҳаллӣ</option>
                        <option>Ҷумҳуриявӣ</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="joygirshavi" class="col-sm-3 control-label">Ҷойгиршавӣ</label>

                <div class="col-sm-9">
                    <select id="joygirshavi" name="joygirshavi" class="form-control">
                        <option>--Интихоб намоед--</option>
                        <option>Шаҳр</option>
                        <option>Деҳот</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="namudi_maktab" class="col-sm-3 control-label">Намуди мактаб</label>

                <div class="col-sm-9">
                    <select id="namudi_maktab" name="namudi_maktab" class="form-control">
                        <option>--Интихоб намоед--</option>
                        <option>Ибтидоӣ</option>
                        <option>Асосӣ</option>
                        <option>Миёна(пурра)</option>
                        <option>Гимназия</option>
                        <option>Литсей</option>
                        <option>Мактаб-интернати кӯдакони ятим</option>
                        <option>Мактаб-интернати кӯдакони кар</option>
                        <option>Мактаб-интернати санаторӣ</option>
                        <option>Мактаб-интернат барои кӯдакони шунавоияшон суст ва деркаршуда</option>
                        <option>Мактаб-интернати кӯдакони нобино ва биноияшон суст</option>
                        <option>Мактаб-интернати низомаш махсус (полиомиелит)</option>
                        <option>Мактаби махсус (душвортарбия)</option>
                        <option>Интернати наздимактабӣ</option>
                        <option>Мактаб-интернати ёрирасон (кӯдакони ақлан носолим)</option>
                        <option>Хонаи бачагон</option>
                        <option>Мактаб-кӯдакистон</option>
                        <option>Мактаби ғоибона (шабона)</option>
                        <option>Мактаб-интернати мусиқӣ</option>
                        <option>Мактаб-интернати варзишӣ</option>
                        <option>Мактаб-интернати лаёқатманд</option>
                    </select>
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
