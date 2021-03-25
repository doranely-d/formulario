a:5:{i:0;s:2214:"<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-MX" lang="es-MX" prefix="og: http://ogp.me/ns#" class="no-js">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?= $this->tag->getTitle() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Dora Nely Vega González">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <?= $this->tag->stylesheetLink('css/bootstrap/bootstrap.min.css') ?>
	<?= $this->tag->stylesheetLink('css/bootstrap/bootstrap-table.min.css') ?>
    <?= $this->tag->stylesheetLink('css/AdminLTE.min.css') ?>
    <?= $this->tag->stylesheetLink('css/style.css') ?>
</head>
    <body id="body" class="skin-blue layout-top-nav">
   <header class="main-header">
       <nav class="navbar navbar-static-top" style="font-size: 17px;">
           <div class="container">
               <div class="navbar-header">
          <a href="<?= $this->url->get('') ?>" class="navbar-brand">Sistema de registro formularios</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?= $this->url->get('') ?>">Formulario</a></li>
            <?php if (($isLogin)) { ?>
                <li class="active"><a href="<?= $this->url->get('registros') ?>">Registros</a></li>
                <li class="active"><a href="<?= $this->url->get('login/logout') ?>">Cerrar Sesión</a></li>
            <?php } else { ?>
                 <li class="active"><a href="<?= $this->url->get('login/index') ?>">Iniciar Sesión</a></li>
            <?php } ?>

          </ul>
        </div>
      </div>
    </nav>
  </header>
    
";s:7:"content";a:1:{i:0;a:4:{s:4:"type";i:357;s:5:"value";s:1:" ";s:4:"file";s:45:"C:\www\formulario/app/views/layouts/base.volt";s:4:"line";i:42;}}i:1;s:489:"

<?= $this->tag->javascriptInclude('js/jquery/jquery-2.2.4.min.js') ?>
<?= $this->tag->javascriptInclude('js/bootstrap/bootstrap.min.js') ?>
<?= $this->tag->javascriptInclude('js/bootstrap/bootstrap-notify.min.js') ?>
<?= $this->tag->javascriptInclude('js/bootstrap/bootbox.min.js') ?>
<?= $this->tag->javascriptInclude('js/jquery/jquery.base64.min.js') ?>
<?= $this->tag->javascriptInclude('js/jquery/jquery.blockUI.js') ?>
<?= $this->tag->javascriptInclude('js/general.js') ?>
";s:6:"script";N;i:2;s:18:"
</body>
</html>";}