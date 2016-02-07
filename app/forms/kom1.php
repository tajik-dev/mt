<?php
$UI->pos['main'].='<h3>Хисобот оид ба хайати кормандон ва омeзгорони муассисахои тахсилоти умуми дар соли хониши 20___ / 20___</h3>
<h3>Subtitle</h3>
<br/>
<form class="form-horizontal" action="./?c=frm&act=tm1" method="post">
    <div>
        <form>
  <fieldset>
    <legend>Шакли титули</legend>
    <label>Номи муассиса</label>
    <input type="text" placeholder="Муассисаи…">
    <span class="help-block">Подсказка или доп. информация.</span>
    <label class="checkbox">
      <input type="checkbox"> Нажми здесь и выдели checkbox
    </label>
    <button type="submit" class="btn">Отправить</button>
  </fieldset>
</form>
    </div>
    <div class="row">
        <div class="col-sm-12" style="text-align: center;">
            <button type="submit" class="btn btn-danger">Отмена</button>
            <button type="submit" class="btn btn-default">Сохранить</button>
        </div>
    </div>
</form>
';
