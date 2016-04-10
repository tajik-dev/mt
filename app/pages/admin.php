<?php
$this->pos['main']='
<div class="row">
  <div class="col-md-4">
  	<ul class="nav nav-pills nav-stacked" style="border-radius: 4px;border: 1px solid #e2e2e2;box-shadow: 5px 5px 10px 0px rgba(204,204,204,1);">
	  <li class="active"><a href="./">'.\CORE::t('system','Система').'</a></li>
	  <li><a href="./?c=group">'.\CORE::t('groups','Группы').'</a></li>
	  <li><a href="./?c=users">'.\CORE::t('users','Пользователи').'</a></li>
	  <!--<li><a href="./?c=acl">'.\CORE::t('access','Доступ').'</a></li>-->
	  <li><a href="./?c=translation">'.\CORE::t('translation','Перевод').'</a></li>
	</ul>
  </div>
  <div class="col-md-4">
  	<ul class="nav nav-pills nav-stacked" style="border-radius: 4px;border: 1px solid #efefef;box-shadow: 5px 5px 10px 0px rgba(204,204,204,1);">
	  <li class="active"><a href="./">'.\CORE::t('mt','Образовательные учреждения').'</a></li>
	  <li><a href="./?c=frm">'.\CORE::t('forms','Формы').'</a></li>
	  <li><a href="./?c=mt">'.\CORE::t('mt_list','Список учреждений').'</a></li>
	  <li><a href="./?c=apps&act=list">'.\CORE::t('apps_list','Руйхати дархостҳо').'</a></li>
	</ul>
	<br>
	<!--<ul class="nav nav-pills nav-stacked" style="border-radius: 4px;border: 1px solid #efefef;box-shadow: 5px 5px 10px 0px rgba(204,204,204,1);">
	  <li class="active"><a href="./">'.\CORE::t('reports','Отчеты').'</a></li>
	</ul>-->
  </div>
  <div class="col-md-4">
  	<ul class="nav nav-pills nav-stacked" style="border-radius: 4px;border: 1px solid #efefef;box-shadow: 5px 5px 10px 0px rgba(204,204,204,1);">
	  <li class="active"><a href="./">'.\CORE::t('monitoring','Мониторинг').'</a></li>
	  <li><a href="#test1">Санҷиш...</a></li>
	</ul>
  </div>
</div>
';