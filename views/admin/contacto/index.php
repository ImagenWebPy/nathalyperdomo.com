<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Listado de Contactos</h2>
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
                    <h5>Listado de Contactos desde el sitio web</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-contacto" >
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Asunto</th>
                                    <th>Fecha Creado</th>
                                    <th>Visto</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>

                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Asunto</th>
                                    <th>Fecha Creado</th>
                                    <th>Visto</th>
                                    <th>Accion</th> 
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
        $('.dataTables-contacto').DataTable({
            "processing": true,
            "serverSide": true,
            ajax: '<?= URL; ?>admin/listadoDTContacto',
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
        $(document).on("click", ".btnVerContacto", function (e) {
            if (e.handled !== true) // This will prevent event triggering more then once
            {
                var id = $(this).attr("data-id");
                $.ajax({
                    url: "<?= URL; ?>admin/modalVerContacto",
                    type: "POST",
                    data: {id: id},
                    dataType: "json"
                }).done(function (data) {
                    $(".genericModal .modal-header").removeClass("modal-header").addClass("modal-header bg-primary");
                    $(".genericModal .modal-title").html(data.titulo);
                    $(".genericModal .modal-body").html(data.content);
                    $(".genericModal").modal("toggle");
                    $('#contacto_' + id).html(data.row);
                });
            }
            e.handled = true;
        });
    });
</script>