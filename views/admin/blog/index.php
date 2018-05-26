<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Blog</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= URL; ?>admin">Inicio</a>
            </li>
            <li class="active">
                <a>Blog</A>
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
                    <h5>Listado de publicaciones</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-blog" >
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Titulo</th>
                                    <th>Imagen</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>

                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Titulo</th>
                                    <th>Imagen</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th>Accion</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="row">
                        <button type="button" class="btn btn-primary btnAgregarContenido" data-url="modalAgregarBlogPost">Agregar Entrada</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.dataTables-blog').DataTable({
            "processing": true,
            "serverSide": true,
            ajax: '<?= URL; ?>admin/listadoDTBlog',
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
        $(document).on("submit", "#frmEditarBlogPost", function (e) {
            var url = "<?= URL ?>admin/frmEditarBlogPost"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#frmEditarBlogPost").serialize(), // serializes the form's elements.
                success: function (data)
                {
                    if (data.type == 'success') {
                        $("#blog_" + data.id).html(data.content);
                        $(".genericModal").modal("toggle");
                        $(".summernote").summernote({
                            height: 300, // set editor height
                            minHeight: null, // set minimum height of editor
                            maxHeight: null // set maximum height of editor
                        });
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                        $("#data_1 .input-group.date").datepicker({
                            todayBtn: "linked",
                            keyboardNavigation: false,
                            forceParse: false,
                            calendarWeeks: true,
                            autoclose: true,
                            format: "dd/mm/yyyy",
                        });
                    }
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
    });
</script>