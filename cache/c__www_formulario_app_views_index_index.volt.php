<!DOCTYPE html>
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
    

<section class="content">
    <div class="box box-primary">
        <div class="box-body">
            <form id="frmFormulario" name="frmFormulario" role="form" method="post"  data-fv-framework="bootstrap"
            data-fv-icon-valid="glyphicon glyphicon-ok" data-fv-icon-invalid="glyphicon glyphicon-remove"
            data-fv-icon-validating="glyphicon glyphicon-refresh">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group col-md-4">
                            <label for="txtNombre">Nombre *</label>
                            <input type="text" class="form-control" id="txtNombre" name="txtNombre" data-fv-notempty="true">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="txtApellidoP">Apellido Paterno *</label>
                            <input type="text" class="form-control" id="txtApellidoP" name="txtApellidoP" data-fv-notempty="true">
                        </div>
                            <div class="form-group col-md-4">
                            <label for="txtApellidoM">Apellido Materno *</label>
                            <input type="text" class="form-control" id="txtApellidoM" name="txtApellidoM" data-fv-notempty="true">
                        </div>
                    </div>
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group col-md-4">
                            <label for="txtCorreo">Correo Electrónico *</label>
                            <input type="email" class="form-control" id="txtCorreo" name="txtCorreo" data-fv-notempty="true">
                        </div>
                    </div>
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group col-md-12">
                            <label for="txtComentarios"> Cuentanos tus dudas y sugerencias *</label>
                            <textarea class="form-control" id="txtComentarios" name="txtComentarios" data-fv-notempty="true"></textarea>
                        </div>
                    </div>
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"  id="chkTerminos" data-fv-notempty="true" requerid>
                            <label class="form-check-label" for="chkTerminos" >
                                Acepto terminos y condiciones
                            </label>
                        </div>
                    </div>
                    <div class="col-md-5 col-md-offset-3">
                            <button id="btnEnviar" class="btn btn-success btn-block">Enviar</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</section>



<?= $this->tag->javascriptInclude('js/jquery/jquery-2.2.4.min.js') ?>
<?= $this->tag->javascriptInclude('js/bootstrap/bootstrap.min.js') ?>
<?= $this->tag->javascriptInclude('js/bootstrap/bootstrap-notify.min.js') ?>
<?= $this->tag->javascriptInclude('js/bootstrap/bootbox.min.js') ?>
<?= $this->tag->javascriptInclude('js/jquery/jquery.base64.min.js') ?>
<?= $this->tag->javascriptInclude('js/jquery/jquery.blockUI.js') ?>
<?= $this->tag->javascriptInclude('js/general.js') ?>

<?= $this->tag->javascriptInclude('js/jquery/formValidation.min.js') ?>
<?= $this->tag->javascriptInclude('js/jquery/formValidation/framework/bootstrap.js') ?>
<?= $this->tag->javascriptInclude('js/jquery/formValidation/language/es_ES.js') ?>
<?= $this->tag->javascriptInclude('js/index.js') ?>

</body>
</html>