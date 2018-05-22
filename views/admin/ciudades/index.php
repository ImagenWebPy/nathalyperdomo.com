<?php $helper = new Helper(); ?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Listado de Ciudades y Departamentos</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= URL; ?>admin">Dashboard</a>
            </li>
            <li class="active">
                <strong>Ciudades</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Departamentos</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-departamentos" >
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Descripcion</th>
                                        <th>Estado</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>

                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Descripcion</th>
                                        <th>Estado</th>
                                        <th>Acción</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div><!--/COL-LG-12-->
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Ciudades</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-ciudades" >
                                <thead>
                                    <tr>
                                        <th>Ciudad</th>
                                        <th>Departamento</th>
                                        <th>Estado</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>

                                <tfoot>
                                    <tr>
                                        <th>Ciudad</th>
                                        <th>Departamento</th>
                                        <th>Estado</th>
                                        <th>Acción</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <button type="button" class="btn btn-primary btnAgregarContenido" data-url="modalAgregarCiudad">Agregar Item</button>
                    </div>
                </div>
            </div>
        </div><!--/COL-LG-12-->
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.dataTables-departamentos').DataTable({
            "processing": true,
            "serverSide": true,
            ajax: '<?= URL; ?>admin/listadoDTDepartamentos',
            type: "post",
            pageLength: 10,
            responsive: true,
            "language": {
                "url": "<?= URL ?>public/language/Spanish.json"
            }

        });
        $('.dataTables-ciudades').DataTable({
            "processing": true,
            "serverSide": true,
            ajax: '<?= URL; ?>admin/listadoDTCiudades',
            type: "post",
            pageLength: 10,
            responsive: true,
            "language": {
                "url": "<?= URL ?>public/language/Spanish.json"
            }

        });
        $(document).on("submit", "#frmEditarDepartamento", function (e) {
            var url = "<?= URL ?>admin/frmEditarDepartamento"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#frmEditarDepartamento").serialize(), // serializes the form's elements.
                success: function (data)
                {
                    $("#departamento_" + data.id).html(data.content);
                    $(".genericModal").modal("toggle");
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
        $(document).on("submit", "#frmEditarCiudad", function (e) {
            var url = "<?= URL ?>admin/frmEditarCiudad"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#frmEditarCiudad").serialize(), // serializes the form's elements.
                success: function (data)
                {
                    $("#ciudad_" + data.id).html(data.content);
                    $(".genericModal").modal("toggle");
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
        $(document).on("submit", "#frmAgregarCiudad", function (e) {
            var url = "<?= URL ?>admin/frmAgregarCiudad"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                data: $("#frmAgregarCiudad").serialize(), // serializes the form's elements.
                success: function (data)
                {
                    if (data.type == 'success') {
                        var table = $(".dataTables-ciudad").DataTable();
                        table.row.add({
                            "orden": data.orden,
                            "frase": data.frase,
                            "autor": data.autor,
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