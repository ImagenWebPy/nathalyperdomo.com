<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Busquedas</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= URL; ?>admin">Inicio</a>
            </li>
            <li class="active">
                <a>Contacto</A>
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
                    <h5>Listado Busquedas realizadas en el Blog</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-busquedas" >
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Palabra/Frase buscada</th>
                                    <th>Cantidad Resultados</th>
                                    <th>Fecha Busqueda</th>
                                    <th>IP</th>
                                </tr>
                            </thead>

                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Palabra/Frase buscada</th>
                                    <th>Cantidad Resultados</th>
                                    <th>Fecha Busqueda</th>
                                    <th>IP</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.dataTables-busquedas').DataTable({
            "processing": true,
            "serverSide": true,
            ajax: '<?= URL; ?>admin/listadoDTBusqueda',
            type: "post",
            pageLength: 25,
            responsive: true,
            "order": [[0, "desc"]],
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                {extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},

                {extend: 'print',
                    customize: function (win) {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                    }
                }
            ],
            "language": {
                "url": "<?= URL ?>public/language/Spanish.json"
            }

        });
    });
</script>