/**
 * Funcion que cera y esconde los labels de error
 * @param {array} labels
 * @returns {undefined}
 */
function resetLabels(params) {
    for (i = 0; i < params.length; i++) {
        $(params[i]).html('');
        $(params[i]).css('display', 'none');
    }
}

function visitasPaginas(url, fechaInicio, fechaFin, mostrar = 10) {
    $.ajax({
        type: "POST",
        url: url + 'admin/rptVisitasPaginas',
        async: true,
        data: {fechaInicio: fechaInicio, fechaFin: fechaFin, mostrar: mostrar},
        dataType: 'json',
        beforeSend: function () {
            // this is where we append a loading image
            $('#visitasPaginas').html('<img class="img-responsive spinner" src="' + url + 'public/images/cargando.gif" alt="Cargando..." />');
        },
        success: function (data)
        {
            $('#visitasPaginas').html(data);
        }
    });
}
function usuarios(url, fechaInicio, fechaFin) {
    $.ajax({
        type: "POST",
        url: url + 'admin/rptUsuarios',
        async: true,
        data: {fechaInicio: fechaInicio, fechaFin: fechaFin},
        dataType: 'json',
        beforeSend: function () {
            // this is where we append a loading image
            $('#usuarios').html('<img class="img-responsive spinner" src="' + url + 'public/images/cargando.gif" alt="Cargando..." />');
            $('#usuariosNuevos').html('<img class="img-responsive spinner" src="' + url + 'public/images/cargando.gif" alt="Cargando..." />');
            $('#sesiones').html('<img class="img-responsive spinner" src="' + url + 'public/images/cargando.gif" alt="Cargando..." />');
        },
        success: function (data)
        {
            $('#usuarios').html(data.usuarios);
            $('#usuariosNuevos').html(data.usuariosNuevos);
            $('#sesiones').html(data.sesiones);
        }
    });

}

function dispositivos(url, fechaInicio, fechaFin) {
    $.ajax({
        type: "POST",
        url: url + 'admin/rptDispositivos',
        async: true,
        data: {fechaInicio: fechaInicio, fechaFin: fechaFin},
        dataType: 'json',
        beforeSend: function () {
            // this is where we append a loading image
            $('#dispositivos').html('<img class="img-responsive spinner" src="' + url + 'public/images/cargando.gif" alt="Cargando..." />');
        },
        success: function (data)
        {
            $('#dispositivos').html(data);
        }
    });
}

function paginasSesion(url, fechaInicio, fechaFin) {
    $.ajax({
        type: "POST",
        url: url + 'admin/rptPaginasSesion',
        async: true,
        data: {fechaInicio: fechaInicio, fechaFin: fechaFin},
        dataType: 'json',
        beforeSend: function () {
            // this is where we append a loading image
            $('#paginas_sesion').html('<img class="img-responsive spinner" src="' + url + 'public/images/cargando.gif" alt="Cargando..." />');
        },
        success: function (data)
        {
            $('#paginas_sesion').html(data);
        }
    });
}
