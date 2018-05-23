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
    });
</script>