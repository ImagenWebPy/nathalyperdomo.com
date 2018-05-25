<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Redes Sociales</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= URL; ?>admin">Inicio</a>
            </li>
            <li><a>Contenido</a></li>
            <li class="active">
                <strong>Redes</strong>
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
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nombre Red</th>
                                <th>Enlace</th>
                                <th>Estado</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($this->getRedesTable as $item):
                                $id = $item['id'];
                                if ($item['estado'] == 1) {
                                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="redes" data-rowid="redes_" data-tabla="web_redes" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                                } else {
                                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="redes" data-rowid="redes_" data-tabla="web_redes" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                                }
                                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarRedes"><i class="fa fa-edit"></i> Editar </a>';
                                ?>
                                <tr id="redes_<?= $id; ?>">
                                    <td><?= utf8_encode($item['descripcion']); ?></td>
                                    <td><?= utf8_encode($item['enlace']); ?></td>
                                    <td> <?= $estado; ?> </td>
                                    <td> <?= $btnEditar; ?> </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-block btn-primary btnAgregarContenido" data-url="modalAgregarRedes">Agregar Contenido</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $(document).on("submit", "#frmEditarRedes", function (e) {
            var url = "<?= URL ?>admin/frmEditarRedes"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#frmEditarRedes").serialize(), // serializes the form's elements.
                success: function (data)
                {
                    $("#redes_" + data.id).html(data.content);
                    $(".genericModal").modal("toggle");
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
    });
</script>