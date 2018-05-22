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
        <div class="col-lg-12">
            <div class="ibox collapsed">
                <div class="ibox-title">
                    <h5 id="titulo_sabias_que">Frases</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <table class="table table-striped table-bordered table-hover dataTables-frases" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Orden</th>
                                <th>Frase</th>
                                <th>Autor</th>
                                <th>Estado</th>
                                <th>Acción</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <th>Orden</th>
                                <th>Frase</th>
                                <th>Autor</th>
                                <th>Estado</th>
                                <th>Acción</th>
                            </tr>
                        </tfoot>
                    </table>
                    <button type="button" class="btn btn-primary btnAgregarContenido" data-url="modalAgregarFrases">Agregar Item</button>
                </div>
            </div>
        </div><!--/COL-LG-12-->
        <div class="col-lg-12">
            <div class="ibox collapsed">
                <div class="ibox-title">
                    <h5>Video del Inicio</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form id="frmVideoInicio" method="POST">
                        <div class="col-md-12">
                            <label>Título</label>
                            <input class="form-control" type="text" name="titulo" value="<?= utf8_encode($this->datosVideoInicio['titulo']); ?>" >
                        </div>
                        <div class="col-md-12">
                            <label>Texto 1</label>
                            <input class="form-control" type="text" name="texto_info" value="<?= utf8_encode($this->datosVideoInicio['texto_info']); ?>" >
                        </div>
                        <div class="col-md-12">
                            <label>Texto 2</label>
                            <input class="form-control" type="text" name="texto_info2" value="<?= utf8_encode($this->datosVideoInicio['texto_info2']); ?>" >
                        </div>
                        <div class="col-md-12">
                            <label>Enlace (ID del video de Youtube)</label>
                            <input class="form-control" type="text" name="url_video" value="<?= utf8_encode($this->datosVideoInicio['url_video']); ?>" >
                        </div>
                        <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Contenido</button>
                    </form>
                </div>
            </div>
        </div><!--/COL-LG-12-->
        <div class="col-lg-12">
            <div class="ibox float-e-margins collapsed">
                <div class="ibox-title">
                    <h5>Nosotros - Inicio</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form id="frmInicioNosotros" method="POST">
                        <div class="col-md-12">
                            <label>Titulo</label>
                            <input type="text" name="titulo" class="form-control" value="<?= utf8_encode($this->datosInicioNosotros['titulo']); ?>">
                        </div>
                        <div class="col-md-12">
                            <label>Contenido</label>
                            <textarea name="contenido" class="summernote">
                                <?= utf8_encode($this->datosInicioNosotros['contenido']); ?>
                            </textarea>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Contenido</button>
                    </form>
                    <div class="row">
                        <div class="alert alert-info alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            Detalles de la imagen a subir:<br>
                            -Formato: PNG (fondo transparente)<br>
                            -Dimensión Recomendada: 576 x 454px<br>
                            -Tamaño: Hasta 2MB<br>
                        </div>
                        <div class="html5fileupload fileInicioNosotros" data-max-filesize="2048000" data-url="<?= URL; ?>admin/uploadImgInicioNosotros" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                            <input type="file" name="file_archivo" />
                        </div>
                        <script>
                            $(".html5fileupload.fileInicioNosotros").html5fileupload({
                                onAfterStartSuccess: function (response) {
                                    $("#imgInicioNosotros").html(response.content);
                                }
                            });
                        </script>
                        <div class="col-md-12" id="imgInicioNosotros">
                            <img class="img-responsive" src="<?= URL ?>public/images/<?= utf8_encode($this->datosInicioNosotros['imagen']); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/COL-LG-12-->
        <div class="col-lg-12">
            <div class="ibox float-e-margins collapsed">
                <div class="ibox-title">
                    <h5>Imagen Parallax Inicio</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form id="frmInicioImagenParallax" method="POST">
                        <div class="col-md-12">
                            <label>Texto</label>
                            <input type="text" name="texto" class="form-control" value="<?= utf8_encode($this->datosInicioImagenParallax['texto']); ?>">
                        </div>
                        <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Contenido</button>
                    </form>
                    <div class="row">
                        <div class="alert alert-info alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            Detalles de la imagen a subir:<br>
                            -Formato: JPG,PNG<br>
                            -Dimensión Recomendada: 1920 x 850px<br>
                            -Tamaño: Hasta 2MB<br>
                        </div>
                        <div class="html5fileupload fileInicioParallax" data-max-filesize="2048000" data-url="<?= URL; ?>admin/uploadImgInicioParallax" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                            <input type="file" name="file_archivo" />
                        </div>
                        <script>
                            $(".html5fileupload.fileInicioParallax").html5fileupload({
                                onAfterStartSuccess: function (response) {
                                    $("#imgInicioImagenParallax").html(response.content);
                                }
                            });
                        </script>
                        <div class="col-md-12" id="imgInicioImagenParallax">
                            <img class="img-responsive" src="<?= URL ?>public/images/<?= utf8_encode($this->datosInicioImagenParallax['imagen']); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/COL-LG-12-->
        <div class="col-lg-12">
            <div class="ibox collapsed">
                <div class="ibox-title">
                    <h5 id="titulo_sabias_que">Servicios</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <table class="table table-striped table-bordered table-hover dataTables-servicios" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Orden</th>
                                <th>Servicio</th>
                                <th>Estado</th>
                                <th>Acción</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <th>Orden</th>
                                <th>Servicio</th>
                                <th>Estado</th>
                                <th>Acción</th>
                            </tr>
                        </tfoot>
                    </table>
                    <button type="button" class="btn btn-primary btnAgregarContenido" data-url="modalAgregarServicio">Agregar Servicio</button>
                </div>
            </div>
        </div><!--/COL-LG-12-->
    </div>
</div>
<script>
    $(document).ready(function () {
        $(".summernote").summernote({
            height: 300, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null // set maximum height of editor
        });
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
        $('.dataTables-servicios').DataTable({
            ajax: '<?= URL; ?>admin/listadoDTServicios',
            columns: [
                {data: 'orden'},
                {data: 'servicio'},
                {data: 'estado'},
                {data: 'accion'}
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
        $('.dataTables-frases').DataTable({
            ajax: '<?= URL; ?>admin/listadoDTFrases',
            columns: [
                {data: 'orden'},
                {data: 'frase'},
                {data: 'autor'},
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
        $(document).on("submit", "#frmEditarFrases", function (e) {
            var url = "<?= URL ?>admin/frmEditarFrases"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#frmEditarFrases").serialize(), // serializes the form's elements.
                success: function (data)
                {
                    if (data.type == 'success') {
                        $("#frases_" + data.id).html(data.content);
                        $(".genericModal").modal("toggle");
                    }
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
        $(document).on("submit", "#frmEditarServicios", function (e) {
            var url = "<?= URL ?>admin/frmEditarServicios"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#frmEditarServicios").serialize(), // serializes the form's elements.
                success: function (data)
                {
                    if (data.type == 'success') {
                        $("#servicios_" + data.id).html(data.content);
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
        $(document).on("submit", "#frmAgregarFrases", function (e) {
            var url = "<?= URL ?>admin/frmAgregarFrases"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                data: $("#frmAgregarFrases").serialize(), // serializes the form's elements.
                success: function (data)
                {
                    if (data.type == 'success') {
                        var table = $(".dataTables-frases").DataTable();
                        table.row.add({
                            "departamento": data.departamento,
                            "ciudad": data.ciudad,
                            "estado": data.estado,
                            "accion": data.accion
                        }).draw();
                        $(".genericModal").modal("toggle");
                    }
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
        $(document).on("submit", "#frmAgregarServicio", function (e) {
            var url = "<?= URL ?>admin/frmAgregarServicio"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                data: $("#frmAgregarServicio").serialize(), // serializes the form's elements.
                success: function (data)
                {
                    if (data.type == 'success') {
                        var table = $(".dataTables-servicios").DataTable();
                        table.row.add({
                            "orden": data.orden,
                            "servicio": data.servicio,
                            "estado": data.estado,
                            "accion": data.accion
                        }).draw();
                        $(".genericModal").modal("toggle");
                    }
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
        $(document).on("submit", "#frmVideoInicio", function (e) {
            var url = "<?= URL ?>admin/frmVideoInicio"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#frmVideoInicio").serialize(), // serializes the form's elements.
                success: function (data)
                {
                    if (data.type == 'success') {
                        toastr.success(data.content)
                    }
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
        $(document).on("submit", "#frmInicioNosotros", function (e) {
            var url = "<?= URL ?>admin/frmInicioNosotros"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#frmInicioNosotros").serialize(), // serializes the form's elements.
                success: function (data)
                {
                    if (data.type == 'success') {
                        toastr.success(data.content)
                    }
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
        $(document).on("submit", "#frmInicioImagenParallax", function (e) {
            var url = "<?= URL ?>admin/frmInicioImagenParallax"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#frmInicioImagenParallax").serialize(), // serializes the form's elements.
                success: function (data)
                {
                    if (data.type == 'success') {
                        toastr.success(data.content)
                    }
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
    });
</script>