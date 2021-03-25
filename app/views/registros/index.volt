{% extends "layouts/base.volt" %}

{% block content %}
<section class="content">
    <div class="box box-primary">
        <div class="box-body">
            <div class="form-group pull-left" style="margin-top: 10px; margin-bottom: 10px;">
                <a href="{{url('index')}}" class="btn btn-success">Agregar</a>
            </div>
            <div class="form-group pull-right" style="margin-top: 10px; margin-bottom: 10px;">
                <a href="{{url('registros/exportar')}}" class="btn btn-primary">Exportar</a>
            </div>
            <table style="font-size: 20px;" id="tblRegistros"
                    data-mobile-responsive="true"
                    data-locale="es-MX"
                    data-height="500"
                    data-pagination="true"
                    data-side-pagination="server"
                    data-page-size="20"
                    data-search="true"
                    data-striped="true"
                    data-resizable="true"
                    data-sort-name="id"
                    data-sort-order="asc"
                    data-show-export="true"
                    data-show-refresh="true"
                    class="table table-bordered table-hover table-condensed"
                    style="display: none;">
                <thead>
                <tr>
                    <th data-field="id"  data-align="center" data-sortable="false">ID</th>
                    <th data-field="nombre" data-sortable="false">NOMBRE</th>
                    <th data-field="apellido_paterno" data-sortable="false">APELLIDO PATERNO</th>
                    <th data-field="apellido_materno" data-sortable="true">APELLIDO MATERNO</th>
                    <th data-field="correo" data-sortable="true">CORREO</th>
                    <th data-field="ip" data-sortable="true">IP</th>
                    <th data-field="comentarios" data-sortable="true">COMENTARIO</th>
                    <th data-sortable="false" data-align="center" data-width="100" data-formatter="registros.actionFormatter">ACCIONES</th>
                </tr>
                </thead>
            </table> 
        </div>
    </div>
</section>
{% endblock %}

{% block script %}
{{ javascript_include('js/bootstrap/bootstrap-table.min.js') }}
{{ javascript_include('js/bootstrap/bootstrap-table/locale/bootstrap-table-es-MX.min.js') }}
{{ javascript_include('js/bootstrap/bootstrap-table/extensions/mobile/bootstrap-table-mobile.min.js') }}
{{ javascript_include('js/registros.js') }}
{% endblock %}