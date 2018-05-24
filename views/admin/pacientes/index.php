<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Pacientes</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= URL; ?>admin">Dashboard</a>
            </li>
            <li class="active">
                <strong>Pacientes</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Listado</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-pacientes" >
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Email</th>
                                        <th>Documento</th>
                                        <th>Teléfono</th>
                                        <th>Celular</th>
                                        <th>Estado</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>

                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Email</th>
                                        <th>Documento</th>
                                        <th>Teléfono</th>
                                        <th>Celular</th>
                                        <th>Estado</th>
                                        <th>Acción</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 pull-right">
                            <button type="button" class="btn btn-block btn-primary btnAgregarContenido" data-url="modalAgregarPaciente">Agregar Paciente</button>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/COL-LG-12-->

    </div>


</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('.dataTables-pacientes').DataTable({
            "processing": true,
            "serverSide": true,
            ajax: '<?= URL; ?>admin/listadoDTPacientes',
            type: "post",
            pageLength: 10,
            responsive: true,
            "order": [[0, "desc"]],
            "language": {
                "url": "<?= URL ?>public/language/Spanish.json"
            }
        });
        $(document).on("submit", ".frmAgregarDatoFichaCliente", function (e) {
            var url = "<?= URL ?>admin/frmAgregarDatoFichaCliente"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $(".frmAgregarDatoFichaCliente").serialize(), // serializes the form's elements.
                success: function (data)
                {
                    if (data.type == 'success') {
                        toastr.success(data.mensaje)
                        $('#pagination-result').append(data.content);
                        $('.divAgregarFichaPaciente').toggle();
                        $("input[name='contenido']").val("");
                        $('.alert-dismissable').hide();
                    }
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
        $(document).on("submit", ".frmEditarDatosPaciente", function (e) {
            var url = "<?= URL ?>admin/frmEditarDatosPaciente"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $(".frmEditarDatosPaciente").serialize(), // serializes the form's elements.
                success: function (data)
                {
                    $("#paciente_" + data.id).html(data.content);
                    $(".genericModal").modal("toggle");
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
        $(document).on("click", ".btnAgregarDatoFichaPaciente", function (e) {
            $('.divAgregarFichaPaciente').toggle();
        });
        $(document).on("change", ".selectDepartamento", function (e) {
            if (e.handled !== true) // This will prevent event triggering more then once
            {
                var id_departamento = $(this).val();
                var url = "<?= URL ?>admin/selectLoadCiudad";
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {id_departamento: id_departamento}, // serializes the form's elements.
                    success: function (data)
                    {
                        $('.selectCiudad').html("");
                        $('.selectCiudad').html(data);
                    }
                });
            }
            e.handled = true;
        });
        $(document).on("submit", ".frmAgregarDatosPaciente", function (e) {
            var url = "<?= URL ?>admin/frmAgregarDatosPaciente"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                data: $(".frmAgregarDatosPaciente").serialize(), // serializes the form's elements.
                success: function (data)
                {
                    if (data.type == 'success') {
                        var table = $(".dataTables-pacientes").DataTable();
                        table.row.add({
                            "id": data.id,
                            "nombre": data.nombre,
                            "apellido": data.apellido,
                            "email": data.email,
                            "documento": data.documento,
                            "telefono": data.telefono,
                            "celular": data.celular,
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