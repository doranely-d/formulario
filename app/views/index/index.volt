
{% extends "layouts/base.volt" %}

{% block content %}
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
                            <button id="btnEnviar" class="btn btn-primary btn-block">ENVIAR</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</section>

{% endblock %}

{% block script %}
{{ javascript_include('js/jquery/formValidation.min.js') }}
{{ javascript_include('js/jquery/formValidation/framework/bootstrap.js') }}
{{ javascript_include('js/jquery/formValidation/language/es_ES.js') }}
{{ javascript_include('js/index.js') }}
{% endblock %}
        