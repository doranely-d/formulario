
var general = {
    tooltip: null,
    contenidoCuerpo: null,
    base_url: null,
    validate_session: null,
    activar_notificaciones: null,
    btnEditarPassword: null,
    frmUsuario: null,

    init: function () {
        //Inicilización de propiedades del objeto
        this.base_url = window.location.protocol + '//' + window.location.host + window.location.pathname.substring(0, window.location.pathname.indexOf('/', 2));

        // *********************************    ACTIVAR MENU    ********************************************
        const url = window.location.href.split('&id=')[0];

        $('ul.sidebar-menu a').filter(function() {
            if(url.indexOf("perfil") > -1) {
                return this.href.split('&id=')[0] == document.referrer.split('&id=')[0];
            }else {
                return this.href.split('&id=')[0] == url;
            }
        }).parents().addClass('active');
        $('ul.treeview-menu a').filter(function() {
            if(url.indexOf("perfil") > -1) {
                return this.href.split('&id=')[0] == document.referrer.split('&id=')[0];
            }else {
                return this.href.split('&id=')[0] == url;
            }
        }).closest('.treeview').addClass('active');
        if ($('#contenidoCuerpo')) {
            this.contenidoCuerpo = $('#contenidoCuerpo');
        }
        // *********************************    END MENU    ********************************************
    },
    notify: function (title, message, type, progress) {
        var showProgressbar = (progress !== undefined) ? progress : false;

        $.notify({
            title: title,
            icon: 'glyphicon glyphicon-warning-sign',
            message: message
        },
        {
            newest_on_top: true,
            pos: 'top-right',
            element: 'body',
            delay: 6000,
            animate: {
                enter: 'animated fadeInRight',
                exit: 'animated fadeOutRight'
            },
            placement: {
                from: 'top'
            },
            showProgressbar: showProgressbar,
            type: type,
            z_index: 9999,
        });
    },
    block: function () {
        $.blockUI({
            message: '<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%"><b>Espera por favor….</b></div>',
            baseZ: 99999,
            css: {
                border: 'none',
                padding: '15px',
                backgroundColor: '#000',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: .5,
                color: '#fff'
            }
        });
    },
    unblock: function () {
        $.unblockUI();
    },
};

general.init();