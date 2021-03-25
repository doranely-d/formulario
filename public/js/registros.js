var registros = {
    tblRegistros: null,

    init: function () {
        this.tblRegistros = $('#tblRegistros');

        this.tblRegistros.bootstrapTable({
            url: general.base_url + '/registros/mostrar'
        });

        this.tblRegistros.on('load-success.bs.table', function (e, data) {
            if (!registros.tblRegistros.is(':visible')) {
                registros.tblRegistros.show();
                registros.tblRegistros.bootstrapTable('resetView');
            }
            general.unblock();
        });

        this.tblRegistros.on('sort.bs.table', function (e, row) {
            if (registros.tblRegistros.bootstrapTable('getOptions').totalRows > 0) {
                general.block();
            }
        });

        this.tblRegistros.on('page-change.bs.table', function (e, row) {
            if (registros.tblRegistros.bootstrapTable('getOptions').totalRows > 0) {
                general.block();
            }
        });

        this.tblRegistros.on('search.bs.table', function (e, row) {
            if (registros.tblRegistros.bootstrapTable('getOptions').totalRows > 0) {
                general.block();
            }
        });

        this.tblRegistros.bootstrapTable({}).on('refresh.bs.table', function (e, row) {
            if (registros.tblRegistros.bootstrapTable('getOptions').totalRows > 0) {
                general.block();
            }
        });

        this.tblRegistros.on('load-error.bs.table', function (e, status) {
            general.unblock();
            general.notify('<strong>Ocurrió un error</strong><br/><br/>', 'Ocurrió un error  ' + status, 'danger', true);
        });
    },
    borrar: function (idIn) {
        var id = (idIn !== undefined) ? $.base64.decode(idIn) : null;
        bootbox.confirm({
            message: "¿Deseas borrar el registro?",
            buttons: {
                cancel: {
                    label: 'No',
                    className: 'btn-danger'
                },
                confirm: {
                    label: 'Sí',
                    className: 'btn-success'
                },
            },
            callback: function (result) {
                if (result) {
                    $.ajax({
                        type: 'PUT',
                        url: general.base_url + '/registros/borrar?id=' + id,
                        contentType: 'application/json; charset=utf-8',
                        success: function (resultado) {
                            try {
                                if (resultado.estatus === 'success') {
                                    registros.tblRegistros.bootstrapTable('refresh');
                                }

                                general.notify('<strong>Mensaje del Sistema</strong><br/><br/>', resultado.mensaje, resultado.estatus, true);
                            } catch (e) {
                                setTimeout(function () {
                                    general.notify('<strong>Ocurrió un error</strong><br/><br/>', 'Ocurrió un error al borrar la acción: ' + e + '.', 'danger', true);
                                }, 500);
                            }
                        },
                    });
                }
            }
        });
    },
    actionFormatter: function (value, row, index) {
        return [
            '&nbsp;<a class="btn btn-danger btn-lg btn-xs" role="button" href="javascript:registros.borrar(\'' + $.base64.encode(row.id) + '\');"><i class="glyphicon glyphicon-trash"></i></a>'
        ].join('');
    }
};

registros.init();