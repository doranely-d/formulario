var index = {
    frmFormulario: null,
    modal: null,

    init: function () {
        $('#chkTerminos').click(function() {
            if ($(this).is(':checked')) {
                index.cargaFrmAccion();
            }
        });
        index.frmFormulario = $("#frmFormulario");
        index.frmFormulario.formValidation({excluded: [':disabled', ':hidden', ':not(:visible)'], live: 'enabled', locale: 'es_ES'})
            .on('success.form.fv', function (e) {
                e.preventDefault();
                var checkBox = document.getElementById("chkTerminos");

                if (checkBox.checked == true){
                    index.guardar();
                }else{
                    general.notify('<strong>Aceptar las politicas de privacidad</strong><br/><br/>', 'Debes seleccionar las politicas de la pagina', 'warning', false);
                }
            });

    },
    cargaFrmAccion: function () {

        $.ajax({
            type: 'GET',
            url: general.base_url + '/index/modal',
            contentType: 'application/html; charset=utf-8',
            beforeSend: function (xhr) {
                general.block();
            },
            success: function (resultado) {
                try {
                    index.modal = bootbox.dialog({
                        onEscape: true,
                        animate: true,
                        size: 'large',
                        message: resultado,
                        buttons: {
                            cancel: {
                                label: 'Cancelar',
                                className: 'btn-default'
                            },
                            save: {
                                label: 'Aceptar',
                                className: 'btn-success',
                                callback: function () {
                                    index.modal.modal('hide');
                                    $("#chkTerminos").prop("checked", true);
                                    return false;
                                }
                            }
                        }
                    });

                    index.modal.on('shown.bs.modal', function () {
                        $('.bootbox-close-button').focus();

                        setTimeout(function () {
                            $('.bootbox-close-button').focusout();
                        }, 100);

                        $("#chkTerminos").prop("checked", false);
                    });
                } catch (e) {
                    setTimeout(function () {
                        general.notify('<strong>Ocurrió un error</strong><br/><br/>', 'Ocurrió un error al cargar la página de la acción: ' + e + '.', 'danger', true);
                    }, 500);
                }
            },
            error: function () {
                general.unblock();
                setTimeout(function () {
                    general.notify('<strong>Ocurrió un error</strong><br/><br/>', 'Ocurrió un error en la petición al servidor al cargar la página de la acción.', 'danger', true);
                }, 500);
            },
            complete: function () {
                general.unblock();
            }
        });
    },
    guardar: function (idIn) {
        $.ajax({
            type: 'POST',
            url: general.base_url + '/index/guardar',
            data: index.frmFormulario.serialize(),
            beforeSend: function (xhr) {
                general.block();
            },
            success: function (resultado) {
                try {
                    $("#chkTerminos").prop("checked", false);
                    $('#frmFormulario').data('formValidation').resetForm($('#frmFormulario'));
                    general.notify('<strong>Mensaje del Sistema</strong><br/><br/>', resultado.mensaje, resultado.estatus, true);
                } catch (e) {
                    setTimeout(function () {
                        general.notify('<strong>Ocurrió un error</strong><br/><br/>', 'Ocurrió un error al borrar: ' + e + '.', 'danger', true);
                    }, 500);
                }
            },
            error: function () {
                general.unblock();
                setTimeout(function () {
                    general.notify('<strong>Ocurrió un error</strong><br/><br/>', 'Ocurrió un error en la petición al servidor al borrar.', 'danger', true);
                }, 500);
            },
            complete: function () {
                general.unblock();
            }
        });
    },
};

index.init();