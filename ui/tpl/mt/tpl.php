<?php if(!defined('DIR_BASE')){echo '[+_+]'; exit;} ?>
<!DOCTYPE html>
<html lang="en,ru,tj">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $UI->show('meta'); ?>
    <link rel="icon" href="<?php echo $conf['ui_tpl']; ?>/img/ico/mt.png">

    <title><?php $UI->show('title'); ?></title>

    <!-- Bootstrap core CSS -->
    <link href="./ui/ext/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="./ui/ext/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo $conf['ui_tpl']; ?>/css/style.css" rel="stylesheet">
    <?php $UI->show('link'); ?>

  </head>

  <body role="document">

    <nav class="navbar navbar-blue navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./"><strong>MT</strong></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <?php $UI->show('mainmenu'); $UI->show('user2'); ?>
          </ul>
          <div class="navbar-right">
            <?php $UI->show('user1'); ?>
          </div>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <div id="xcontent" class="container-fluid">

      <div class="row">
        <div class="col-md-12">
          <?php
          $UI::core_msg();
          ?>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <?php $UI->show('main'); ?>
        </div>
      </div>

      <hr>

      <footer>
      <div class="row">

        <div class="col-md-4">
          <p class="text-left text-muted">
          <small>
          MT &#169; <?php echo date('Y'); ?> 
          </small>          
          </p>
        </div>

        <div class="col-md-4">
          <p class="text-center text-muted">
          <small>
          <a href="http://opendefinition.org/">
            <img src="./ui/img/od.png" alt="This material is Open Data"/>
          </a> &nbsp;
          <a href="http://opendata.tj/" target="_blank">
            <img src="./ui/img/od_tj.png" /> OPENDATA.TJ
          </a>
          </small>
          </p>
        </div>

        <div class="col-md-4">
          <p class="text-right text-muted">
          <small>
          <a href="http://code.tj/" target="_blank" title="Powered by NIHOL">
            <img src="./ui/img/nihol.png" />
          </a>
          </small>
          </p>
        </div>

      </div>
      </footer>
    </div> <!-- /container -->

    <!-- JavaScript -->
    <script type="text/javascript" src="<?php echo PATH_UI; ?>/ext/jquery/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="<?php echo PATH_UI; ?>/ext/bootstrap/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo PATH_UI; ?>/ext/bootstrap/js/ie10-viewport-bug-workaround.js"></script>
    <?php $UI->show('js'); ?>

  </body>
</html>