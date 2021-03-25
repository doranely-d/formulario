{% extends "layouts/base.volt" %}

{% block content %}
    <section class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="col-md-5 col-md-offset-3">
                      <form id="frmLogin" name="frmLogin" method="GET" action="#" data-fv-framework="bootstrap"
                                  data-fv-icon-valid="glyphicon glyphicon-ok" data-fv-icon-invalid="glyphicon glyphicon-remove"
                                  data-fv-icon-validating="glyphicon glyphicon-refresh">
                                 <div class="form-group has-feedback">
                            <div class="input-group ">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="txtUsuario" name="txtUsuario" class="form-control" type="text"
                                        placeholder="Usuario" data-fv-notempty="true" required/>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                                <input id="txtPassword" name="txtPassword" class="form-control" type="password"
                                        placeholder="Contrase&#241;a" required />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <button type="submit" class="btn btn-primary btn-block">ACCEDER</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
{% endblock %}

{% block script %}
{{ javascript_include('js/jquery/formValidation.min.js') }}
{{ javascript_include('js/jquery/formValidation/framework/bootstrap.js') }}
{{ javascript_include('js/jquery/formValidation/language/es_ES.js') }}
{{ javascript_include('js/login.js') }}
{% endblock %}
    
