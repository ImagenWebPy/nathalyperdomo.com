<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Inicio</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= URL; ?>admin">Inicio</a>
            </li>
            <li><a>Contenido</a></li>
            <li class="active">
                <strong>Página Inicio</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Contenido Slider Inicio</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-down"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content" style="display: none;">
                    <div class="alert alert-info alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        En el slider seleccionado como <a class="alert-link" href="#">principal</a>, la imagen tiene que ser un archivo png de fondo transparente y debe tener las siguientes dimensiones 310 x 649px. No es necesario colocarle un orden, porque siempre se mostrara primero.
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-slider" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Orden</th>
                                    <th>Imagen</th>
                                    <th>Texto1</th>
                                    <th>Texto2</th>
                                    <th>principal</th>
                                    <th>Estado</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>

                            <tfoot>
                                <tr>
                                    <th>Orden</th>
                                    <th>Imagen</th>
                                    <th>Texto1</th>
                                    <th>Texto2</th>
                                    <th>principal</th>
                                    <th>Estado</th>
                                    <th>Acción</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 pull-right">
                            <button type="button" class="btn btn-block btn-primary btnAgregarContenido" data-url="modalAgregarSlider">Agregar Slider</button>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- /COL-LG-12-->
        <div class="col-lg-12">
            <div class="ibox collapsed">
                <div class="ibox-title">
                    <h5 id="titulo_sabias_que">Textos Destacados</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <table class="table table-striped table-bordered table-hover dataTables-caracteristicas" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Orden</th>
                                <th>Item</th>
                                <th>Icono</th>
                                <th>Estado</th>
                                <th>Acción</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <th>Orden</th>
                                <th>Item</th>
                                <th>Icono</th>
                                <th>Estado</th>
                                <th>Acción</th>
                            </tr>
                        </tfoot>
                    </table>
                    <button type="button" class="btn btn-primary btnAgregarContenido" data-url="modalAgregarCaracteristicas">Agregar Item</button>
                </div>
            </div>
        </div><!--/COL-LG-12-->
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.dataTables-slider').DataTable({
            ajax: '<?= URL; ?>admin/listadoDTSlider',
            columns: [
                {data: 'orden'},
                {data: 'imagen'},
                {data: 'texto1'},
                {data: 'texto2'},
                {data: 'principal'},
                {data: 'estado'},
                {data: 'editar'}
            ],
            pageLength: 25,
            responsive: true,
            "language": {
                "url": "<?= URL ?>public/language/Spanish.json"
            }

        });
        $(document).on("submit", "#frmEditarSlider", function (e) {
            var url = "<?= URL ?>admin/frmEditarSlider"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#frmEditarSlider").serialize(), // serializes the form's elements.
                success: function (data)
                {
                    $("#slider_" + data.id).html(data.content);
                    $(".genericModal").modal("toggle");
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
        $('.dataTables-caracteristicas').DataTable({
            ajax: '<?= URL; ?>admin/listadoDTCaracteristicas',
            columns: [
                {data: 'orden'},
                {data: 'item'},
                {data: 'icono'},
                {data: 'estado'},
                {data: 'accion'}
            ],
            pageLength: 25,
            responsive: true,
            "language": {
                "url": "<?= URL ?>public/language/Spanish.json"
            }
        });
        $(document).on("submit", "#frmEditarCaracteristicas", function (e) {
            var url = "<?= URL ?>admin/frmEditarCaracteristicas"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#frmEditarCaracteristicas").serialize(), // serializes the form's elements.
                success: function (data)
                {
                    if (data.type == 'success') {
                        $("#caracteristicas_" + data.id).html(data.content);
                        $(".genericModal").modal("toggle");
                    }
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
        $(document).on("submit", "#frmAgregarCaracteristicas", function (e) {
            var url = "<?= URL ?>admin/frmAgregarCaracteristicas"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                data: $("#frmAgregarCaracteristicas").serialize(), // serializes the form's elements.
                success: function (data)
                {
                    if (data.type == 'success') {
                        var table = $(".dataTables-caracteristicas").DataTable();
                        table.row.add({
                            "orden": data.orden,
                            "item": data.item,
                            "icono": data.icono,
                            "estado": data.estado,
                            "accion": data.accion
                        }).draw();
                        $(".genericModal").modal("toggle");
                    }
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
    });
</script>