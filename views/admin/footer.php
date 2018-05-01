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
<div class="modal fade genericModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- /Modal -->

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
</body>
</html>
