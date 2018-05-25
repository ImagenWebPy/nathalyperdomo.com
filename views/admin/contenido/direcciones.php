<?php
$direcciones = $this->datosDirecciones;
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Direccioens</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= URL; ?>admin">Inicio</a>
            </li>
            <li><a>Contenido</a></li>
            <li class="active">
                <strong>Direcciones</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<?php
if (isset($_SESSION['message'])) {
    echo $this->helper->messageAlert($_SESSION['message']['type'], $_SESSION['message']['mensaje']);
}
?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5></h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form id="frmEditarDirecciones" method="POST">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Dirección</label>
                                <input class="form-control" type="text" name="direccion" value="<?= utf8_encode($direcciones['direccion']) ?>" >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Ciudad</label>
                                <input class="form-control" type="text" name="ciudad" value="<?= utf8_encode($direcciones['ciudad']) ?>" >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="text" name="email" value="<?= utf8_encode($direcciones['email']) ?>" >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Teléfono</label>
                                <input class="form-control" type="text" name="telefono" value="<?= utf8_encode($direcciones['telefono']) ?>" >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Teléfono 2</label>
                                <input class="form-control" type="text" name="telefono_2" value="<?= utf8_encode($direcciones['telefono_2']) ?>" >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="well">
                                <div class="form-group">
                                    <label>Latitud</label>
                                    <input class="form-control" type="text" name="latitud" value="<?= utf8_encode($direcciones['latitud']) ?>" >
                                </div>
                                <div class="form-group">
                                    <label>Longitud</label>
                                    <input class="form-control" type="text" name="longitud" value="<?= utf8_encode($direcciones['longitud']) ?>" >
                                </div>
                                <div class="form-group">
                                    <label>Tipo de mapa</label>
                                    <input class="form-control" type="text" name="tipo_mapa" value="<?= utf8_encode($direcciones['tipo_mapa']) ?>" >
                                </div>
                                <div class="form-group">
                                    <label>Zoom</label>
                                    <input class="form-control" type="text" name="zoommap" value="<?= utf8_encode($direcciones['zoommap']) ?>" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input class="form-control" type="text" name="nombre" value="<?= utf8_encode($direcciones['nombre']) ?>" >
                            </div>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Contenido</button>
                    </form>
                </div>
            </div>
        </div><!--END-COL-->
    </div>
</div>
<script>
    $(document).ready(function () {
        $(document).on("submit", "#frmEditarDirecciones", function (e) {
            var url = "<?= URL ?>admin/frmEditarDirecciones"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                data: $("#frmEditarDirecciones").serialize(), // serializes the form's elements.
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