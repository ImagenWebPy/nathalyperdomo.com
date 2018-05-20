<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Inicio</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= URL; ?>admin">Inicio</a>
            </li>
            <li><a>Contenido</a></li>
            <li class="active">
                <strong>Nathaly</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins collapsed">
                <div class="ibox-title">
                    <h5>Imagen Cabacera</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="alert alert-info alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            Detalles de la imagen a subir:<br>
                            -Formato: JPG,PNG<br>
                            -Dimensión Recomendada: 1920 x 1250px<br>
                            -Tamaño: Hasta 2MB<br>
                            <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                        </div>
                        <div class="html5fileupload fileImagenCabecera" data-max-filesize="2048000" data-url="<?= URL; ?>admin/uploadImgNosotrosCabecera" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                            <input type="file" name="file_archivo" />
                        </div>
                        <script>
                            $(".html5fileupload.fileImagenCabecera").html5fileupload({
                                onAfterStartSuccess: function (response) {
                                    $("#imgImagenCabecera").html(response.content);
                                }
                            });
                        </script>
                        <div class="col-md-12" id="imgImagenCabecera">
                            <img class="img-responsive" src="<?= URL ?>public/images/<?= $this->datosNathaly['imagen_header']; ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/COL-LG-12-->
        <div class="col-lg-12">
            <div class="ibox float-e-margins collapsed">
                <div class="ibox-title">
                    <h5>Imagen Página</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="alert alert-info alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            Detalles de la imagen a subir:<br>
                            -Formato: PNG (transparente o fondo lila)<br>
                            -Dimensión Recomendada: 720 x 480px<br>
                            -Tamaño: Hasta 2MB<br>
                        </div>
                        <div class="html5fileupload fileImagenPagina" data-max-filesize="2048000" data-url="<?= URL; ?>admin/uploadImgNosotrosPagina" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                            <input type="file" name="file_archivo" />
                        </div>
                        <script>
                            $(".html5fileupload.fileImagenPagina").html5fileupload({
                                onAfterStartSuccess: function (response) {
                                    $("#imgImagenPagina").html(response.content);
                                }
                            });
                        </script>
                        <div class="col-md-12" id="imgImagenPagina">
                            <img class="img-responsive" src="<?= URL ?>public/images/<?= $this->datosNathaly['imagen']; ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/COL-LG-12-->
        <div class="col-lg-12">
            <div class="ibox collapsed">
                <div class="ibox-title">
                    <h5>Texto Página</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form id="frmNosotrosTexto" method="POST">
                        <div class="col-md-12">
                            <label>Texto</label>
                            <textarea name="texto" class="summernote">
                                <?= utf8_encode($this->datosNathaly['texto']); ?>
                            </textarea>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Contenido</button>
                    </form>
                </div>
            </div>
        </div><!--/COL-LG-12-->
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $(".summernote").summernote({
            height: 300, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null // set maximum height of editor
        });
        $(document).on("submit", "#frmNosotrosTexto", function (e) {
            var url = "<?= URL ?>admin/frmNosotrosTexto"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#frmNosotrosTexto").serialize(), // serializes the form's elements.
                success: function (data)
                {
                    if (data.type == 'success') {
                        toastr.success(data.content)
                    }
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
    });
</script>