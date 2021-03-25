var index = {
	frmLogin : null,

	init : function () {
		this.frmLogin = $('#frmLogin');

		//Funcionalidad
		this.frmLogin.formValidation({excluded: [':disabled', ':hidden', ':not(:visible)'], live: 'enabled', locale: 'es_ES'})
        .on('success.form.fv', function (e) {
            e.preventDefault();
            index.login();
        });
	},
    login: function () {
        $.ajax({
            type: 'POST',
            url: general.base_url + '/login/login',
            data: index.frmLogin.serialize(),
            contentType: 'application/x-www-form-urlencoded',
            dataType: 'json',
            beforeSend: function (xhr) {
                general.block();
            },
            success: function (resultado) {
                try {
                    if (resultado.estatus === 'success') {
                        if($(location).attr('href').indexOf("login") > -1){
                            window.location = 'http://formulario.dwebqro.com/registros';
                        }else{
                            window.location = $(location).attr('href');
                        }
                    }else{
                        general.notify('<strong>Mensaje del Sistema</strong><br/><br/>', resultado.mensaje, resultado.estatus, true);
                    }
                } catch (e) {
                    setTimeout(function () {
                        general.notify('<strong>Ocurrió un error</strong><br/><br/>', 'Ocurrió un error al intentar acceder a la Base de datos: ' + e + '.', 'danger', true);
                    }, 500);
                }
            },
            error: function () {
                general.unblock();
                setTimeout(function () {
                    general.notify('<strong>Ocurrió un error</strong><br/><br/>', 'Ocurrió un error en la petición al servidor.', 'danger', true);
                }, 500);
            },
            complete: function () {
                general.unblock();
                $('#frmLogin')[0].reset();
            }
        });
    },
};

//Se inicializa el objeto
index.init();