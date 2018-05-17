<div class="footer">
    <div class="pull-right">
        Desarrollo <img class="logoIweb" src="<?= URL; ?>/public/admin/img/logo-iweb.png" alt="Imagen Web">
    </div>
</div>
</div>
</div>

</div>
</div>
<!-- Modal -->
<div class="modal fade genericModal bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Mainly scripts -->
<script src="<?= URL; ?>public/admin/js/bootstrap.min.js"></script>
<script src="<?= URL; ?>public/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?= URL; ?>public/admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="<?= URL; ?>public/admin/js/inspinia.js"></script>
<script src="<?= URL; ?>public/admin/js/plugins/pace/pace.min.js"></script>

<!-- jQuery UI -->
<script src="<?= URL; ?>public/admin/js/plugins/jquery-ui/jquery-ui.min.js"></script>

<?php
#cargamos los js de las vistas
if (isset($this->external_js)) {
    foreach ($this->external_js as $external) {
        echo '<script async defer src="' . $external . '"></script>';
    }
}
if (isset($this->public_js)) {
    foreach ($this->public_js as $public_js) {
        echo '<script type="text/javascript" src="' . URL . 'public/admin/' . $public_js . '"></script>';
    }
}
if (isset($this->js)) {
    foreach ($this->js as $js) {
        echo '<script type="text/javascript" src="' . URL . 'views/' . $js . '"></script>';
    }
}
?>
<script type="text/javascript">
    $(function () {
        $(document).on("click", ".btnCambiarEstado", function (e) {
            if (e.handled !== true) // This will prevent event triggering more then once
            {
                var id = $(this).attr("data-id");
                var tabla = $(this).attr("data-tabla");
                var campo = $(this).attr("data-campo");
                var estado = $(this).attr("data-estado");
                var seccion = $(this).attr("data-seccion");
                var rowid = $(this).attr("data-rowid");
                console.log(rowid);
                console.log(id);
                $.ajax({
                    url: "<?= URL; ?>admin/cambiarEstado",
                    type: "POST",
                    data: {id: id, tabla: tabla, campo: campo, estado: estado, seccion: seccion},
                    dataType: "json"
                }).done(function (data) {
                    $('#' + rowid + id).html(data.content);
                });
            }
            e.handled = true;
        });
        $(document).on("click", ".btnEditar", function (e) {
            if (e.handled !== true) // This will prevent event triggering more then once
            {
                var id = $(this).attr("data-id");
                var url = $(this).attr("data-url");
                $.ajax({
                    url: "<?= URL; ?>admin/" + url,
                    type: "POST",
                    data: {id: id},
                    dataType: "json"
                }).done(function (data) {
                    $(".genericModal .modal-header").removeClass("modal-header").addClass("modal-header bg-primary");
                    $(".genericModal .modal-title").html(data.titulo);
                    $(".genericModal .modal-body").html(data.content);
                    $(".genericModal").modal("toggle");
                });
            }
            e.handled = true;
        });
        $(document).on("click", ".btnAgregarContenido", function (e) {
            if (e.handled !== true) // This will prevent event triggering more then once
            {
                var url = $(this).attr("data-url");
                $.ajax({
                    url: "<?= URL; ?>admin/" + url,
                    type: "POST",
                    dataType: "json"
                }).done(function (data) {
                    $(".genericModal .modal-header").removeClass("modal-header").addClass("modal-header bg-primary");
                    $(".genericModal .modal-title").html(data.titulo);
                    $(".genericModal .modal-body").html(data.content);
                    $(".genericModal").modal("toggle");
                });
            }
            e.handled = true;
        });

    });
</script>
</body>
</html>