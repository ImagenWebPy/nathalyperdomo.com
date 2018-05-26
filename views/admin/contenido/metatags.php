<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Meta Tags</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= URL; ?>admin">Dashboard</a>
            </li>
            <li class="active">
                <strong>Meta Tags</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Páginas</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-metas" >
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Página</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>

                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Página</th>
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
        $('.dataTables-metas').DataTable({
            "processing": true,
            "serverSide": true,
            ajax: '<?= URL; ?>admin/listadoDTMetas',
            type: "post",
            pageLength: 10,
            responsive: true,
            "order": [[0, "desc"]],
            "language": {
                "url": "<?= URL ?>public/language/Spanish.json"
            }
        });
        $(document).on("submit", ".frmEditarMetaTags", function (e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.
            var url = "<?= URL ?>admin/frmEditarMetaTags"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $(".frmEditarMetaTags").serialize(), // serializes the form's elements.
                success: function (data)
                {
                    $("#metatag_" + data.id).html(data.content);
                    $(".genericModal").modal("toggle");
                    toastr.success(data.mensaje);
                }
            });

        });
    });
</script>