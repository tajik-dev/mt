<?php
namespace APP\WIDGETS;

class LANGUAGE {
	public static function SWITCHER($user=false){
		$lang=\CORE::init()->lang;
		$result='';
		if($user){

			if($lang=='ru'){
				$result='<ul class="nav navbar-nav">
				<li class="dropdown">
	              <a href="#" title="Русский" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
				  <small><i class="langflag langflag-ru"></i></small>&nbsp; RU
	              <span class="caret"></span></a>
	              <ul class="dropdown-menu">
	                <li>
	                	<a href="./?lang=tj" class="change_language" rel="tj">
	                		<small><i class="langflag langflag-tj"></i></small>&nbsp; TJ
	                	</a>
	                </li>
	              </ul>
	            </li>
		    </ul>
	        ';
			} else {
				$result='<ul class="nav navbar-nav">
				<li class="dropdown">
	              <a href="#" title="Тоҷикӣ" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
				  <small><i class="langflag langflag-tj"></i></small>&nbsp; TJ
	              <span class="caret"></span></a>
	              <ul class="dropdown-menu">
	                <li>
	                	<a href="./?lang=ru" class="change_language" rel="ru">
	                		<small><i class="langflag langflag-ru"></i></small>&nbsp; RU
	                	</a>
	                </li>
	              </ul>
	            </li>
		    </ul>
	        ';
			}

		} else {

			if($lang=='ru'){
				$result='<div class="form-group">
	            <div class="dropdown">
	              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="true">
	                <i class="langflag langflag-ru"></i>&nbsp;<small>RU</small>
	                <span class="caret"></span>
	              </button>
	              <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu2">
	                    <li role="usermenu">
	                        <a role="menuitem" tabindex="-1" href="./?lang=tj" class="change_language" rel="tj">
	                        <i class="langflag langflag-tj"></i>&nbsp;<small>TJ</small>
	                        </a>
	                    </li>                    
	              </ul>
	            </div>
	        </div>
	        ';
			} else {
				$result='<div class="form-group">
	            <div class="dropdown">
	              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="true">
	                <i class="langflag langflag-tj"></i>&nbsp;<small>TJ</small>
	                <span class="caret"></span>
	              </button>
	              <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu2">
	                    <li role="usermenu">
	                        <a role="menuitem" tabindex="-1" href="./?lang=ru" class="change_language" rel="ru">
	                        <i class="langflag langflag-ru"></i>&nbsp;<small>RU</small>
	                        </a>
	                    </li>                    
	              </ul>
	            </div>
	        </div>
	        ';
			}

		}
		return $result;
	}
}

class UMENU {
	public function show(){
		\CORE::msg('debug','umenu');
		$UI=\CORE\UI::init();
		$USER=\USER::init();
		$UI->pos['js'].='
<script>
$(document).ready(function() {

	function change_language(xlang){
		$.post("./?lang="+xlang, function(){
			location.reload();
		});
	}  

	$("a.change_language").click(function(e){
		e.preventDefault();
		var xlang = $(this).attr("rel");
		change_language(xlang);
	});

});
</script>
';
		if($USER->auth()){
			// authorized users
			$UI->pos['mainmenu'].='
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              '.\CORE::t('reports','Отчеты').' <span class="caret"></span></a>
              <ul class="dropdown-menu">
              	<li class="dropdown-header">'.\CORE::t('input_forms','Формы ввода данных:').'</li>
              	<li class="divider"></li>
                <li><a href="./?c=frm&act=ps">'.\CORE::t('mt_frm_passport','Паспорт образовательного учреждения').'</a></li>
                <li><a href="./?c=frm&act=bmt1">'.\CORE::t('mt_frm_bmt1','Форма БМТ-1').'</a></li>
                <li><a href="./?c=frm&act=kom1">'.\CORE::t('mt_frm_kom1','Форма КОМ-1').'</a></li>
                <li><a href="./?c=frm&act=tm1">'.\CORE::t('mt_frm_tm1','Форма ОШ-1').'</a></li>
                <li><a href="./?c=frm&act=fb">'.\CORE::t('mt_frm_fb','Форма ФБ').'</a></li>
                <li><a href="./?c=frm&act=km1">'.\CORE::t('mt_frm_km1','Форма КМ-1').'</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              '.\CORE::t('statistic','Статистика').' <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="./?c=stat">----</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              '.\CORE::t('visualization','Визуализация').' <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="./?c=map">'.\CORE::t('map','Карта').'</a></li>
                <li><a href="./?c=vs">'.\CORE::t('datavisual','Визуализация данных').'</a></li>
              </ul>
            </li>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              '.\CORE::t('opendata','Открытые данные').' <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="./?c=page&act=about_opendata">'.\CORE::t('about_opendata','Об открытых данных').'</a></li>
                <li><a href="./?c=od">'.\CORE::t('opendata','Открытые данные').'</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              '.\CORE::t('zayavki','Заявки').' <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="./?c=apps&act=create">'.\CORE::t('reg_form','Форма регистрации').'</a></li>
                <li><a href="./?c=apps&act=status_check">'.\CORE::t('check_app','Проверить статус заявки').'</a></li>
              </ul>
            </li>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              '.\CORE::t('project','Проект').' <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="./?c=page&act=about">'.\CORE::t('about_project','Описание проекта').'</a></li>
                <li><a href="./?c=page&act=team">'.\CORE::t('project_team','Команда проекта').'</a></li>
              </ul>
            </li>
			';
			$UI->pos['user1'].='
			<ul class="nav navbar-nav">
				'.LANGUAGE::SWITCHER(true).'
				<li class="dropdown">
	              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
				  <small><i class="glyphicon glyphicon-cog"></i>&nbsp;</small>
				  '.$USER->get('username').'
	              <span class="caret"></span></a>
	              <ul class="dropdown-menu">
	                <!--<li>
	                	<a href="./?c=user&act=profile">
	                		<small><i class="glyphicon glyphicon-user"></i>&nbsp;</small> 
				    		<span class="text">'.\CORE::t('profile','Профиль').'</span>
	                	</a>
	                </li>-->
	                <!--<li>
	                	<a href="./?c=user&act=change_password">
	                		<small><i class="glyphicon glyphicon-pencil"></i>&nbsp;</small> 
				    		<span class="text">'.\CORE::t('cpasswd','Сменить пароль').'</span>
	                	</a>
	                </li>
	                -->
	                <li class="divider"></li>
	                <li>
	                	<a href="./?c=user&act=logout">
	                		<small><i class="glyphicon glyphicon-off"></i>&nbsp;</small> 
				    		<span class="text">'.\CORE::t('logout','Logout').'</span>
	                	</a>
	                </li>
	              </ul>
	            </li>
		    </ul>
			';
		} else {
			// guests
			$UI->pos['mainmenu'].='
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              '.\CORE::t('visualization','Визуализация').' <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="./?c=map">'.\CORE::t('map','Карта').'</a></li>
                <li><a href="./?c=vs">'.\CORE::t('datavisual','Визуализация данных').'</a></li>
              </ul>
            </li>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              '.\CORE::t('opendata','Открытые данные').' <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="./?c=page&act=about_opendata">'.\CORE::t('about_opendata','Об открытых данных').'</a></li>
                <li><a href="./?c=od">'.\CORE::t('opendata','Открытые данные').'</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              '.\CORE::t('zayavleniya','Заявления').' <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="./?c=apps&act=create">'.\CORE::t('reg_form','Форма регистрации').'</a></li>
                <li><a href="./?c=apps&act=status_check">'.\CORE::t('check_app','Проверить статус заявки').'</a></li>
              </ul>
            </li>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              '.\CORE::t('about','О проекте').' <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="./?c=page&act=about">'.\CORE::t('about_project','Описание проекта').'</a></li>
                <li><a href="./?c=page&act=team">'.\CORE::t('team','Команда проекта').'</a></li>
              </ul>
            </li>
			';
			$UI->pos['user1'].='<form action="./?c=user&act=login" method="post" class="navbar-form">
			'.LANGUAGE::SWITCHER();
			$UI->pos['user1'].='<div class="form-group">
					<input type="text" name="login" placeholder="'.\CORE::t('login','Login').'" value="'.\COOKIE::get('lastuser').'" class="form-control" style="width:150px;">
				</div>
				<div class="form-group">
					<input type="password" name="password" placeholder="'.\CORE::t('password','Password').'" class="form-control" style="width:150px;">
				</div>
				<button type="submit" class="btn btn-warning">'.\CORE::t('login','Login').'</button>
			';
			$UI->pos['user1'].='</form>
			';
		}		
	}
}