<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-MX" lang="es-MX" prefix="og: http://ogp.me/ns#" class="no-js">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{ get_title() }}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Dora Nely Vega González">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    {{ stylesheet_link('css/bootstrap/bootstrap.min.css') }}
	{{ stylesheet_link('css/bootstrap/bootstrap-table.min.css') }}
    {{ stylesheet_link('css/AdminLTE.min.css') }}
    {{ stylesheet_link('css/style.css') }}
</head>
    <body id="body" class="skin-blue layout-top-nav">
   <header class="main-header">
       <nav class="navbar navbar-static-top" style="font-size: 17px;">
           <div class="container">
               <div class="navbar-header">
          <a href="{{url('')}}" class="navbar-brand">Sistema de registro formularios</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="{{url('')}}">Formulario</a></li>
            {% if(isLogin) %}
                <li class="active"><a href="{{url('registros')}}">Registros</a></li>
                <li class="active"><a href="{{url('login/logout')}}">Cerrar Sesión</a></li>
            {% else  %}
                 <li class="active"><a href="{{url('login/index')}}">Iniciar Sesión</a></li>
            {% endif  %}

          </ul>
        </div>
      </div>
    </nav>
  </header>
    
{% block content %} {% endblock %}

{{ javascript_include('js/jquery/jquery-2.2.4.min.js') }}
{{ javascript_include('js/bootstrap/bootstrap.min.js') }}
{{ javascript_include('js/bootstrap/bootstrap-notify.min.js') }}
{{ javascript_include('js/bootstrap/bootbox.min.js') }}
{{ javascript_include('js/jquery/jquery.base64.min.js') }}
{{ javascript_include('js/jquery/jquery.blockUI.js') }}
{{ javascript_include('js/general.js') }}
{% block script %}{% endblock %}
</body>
</html>