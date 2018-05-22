<?php
$helper = new Helper();
?>
<div id="Content">
    <div class="content_wrapper clearfix">
        <div class="sections_group">
            <div class="section left-sidebar pad0">
                <div class="section_wrapper clearfix">
                    <div class="items_group clearfix">

                        <div class="column two-third column_column" id="divFrmReserva">
                            <h3>Reserva tu turno</h3>
                            <hr class="hr_left">
                            <div role="form" class="wpcf7" id="wpcf7-f9896-p165-o1" lang="es" dir="ltr">
                                <div class="screen-reader-response">
                                </div>
                                <form id="frmConsulta" class="contact">
                                    <input type="hidden" value="<?= URL; ?>consultorio/reserva" name="url">
                                    <span class="wpcf7-form-control-wrap name">
                                        <label class="label">Nombre: </label>
                                        <input type="text" name="nombre" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Nombre"/>
                                    </span>
                                    <span class="wpcf7-form-control-wrap email">
                                        <label class="label">Email: </label>
                                        <input type="text" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="E-mail"/>
                                    </span>
                                    <span class="wpcf7-form-control-wrap email">
                                        <label class="label">Teléfono: </label>
                                        <input type="text" name="telefono" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Teléfono"/>
                                    </span>
                                    <span class="wpcf7-form-control-wrap subject">
                                        <label class="label">Fecha: </label>
                                        <input type="text" name="fecha_reserva" data-provide="datepicker" ss="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" style="width: 100%;" placeholder="Fecha de Reserva">
                                    </span>
                                    <span class="wpcf7-form-control-wrap subject">
                                        <label class="label">Hora: </label>
                                        <select name="hora_reserva" ss="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" style="width: 100%;">
                                            <option value="">Seleccione una Hora</option>
                                            <?php foreach ($helper->getRangoHoraWeb() as $item): ?>
                                                <option value="<?= $item; ?>"><?= $item; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </span>
                                    <span class="wpcf7-form-control-wrap message">
                                        <label class="label">Comentarios: </label>
                                        <textarea  name="comentario" id="comment" cols="40" rows="6" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Mensaje"></textarea>
                                    </span>
                                    <div id="mensajeError"></div>
                                    <input type="submit" value="Solicitar Reserva" class="wpcf7-form-control wpcf7-submit"/>
                                </form>
                            </div>
                        </div>
                        <div class="three-column columns section_sidebar">
                            <div class="widget-area clearfix">
                                <aside id="text-3" class="widget widget_text">
                                    <div class="textwidget">
                                        <h3>Dirección</h3>
                                        <hr class="hr_left">
                                        <h6>Consultorio<br>
                                            <?= utf8_encode($this->direccion['direccion']); ?></h6>
                                        <p>
                                            <i class="icon-phone"></i><a href="#"><?= utf8_encode($this->direccion['telefono']); ?></a><br>
                                            <i class="icon-phone"></i><a href="#"><?= utf8_encode($this->direccion['telefono_2']); ?></a>
                                        </p>
                                        <a href="mailto:<?= utf8_encode($this->direccion['email']); ?>" class="button button_large button_icon"><i class="icon-mail-line"></i></a>
                                        <a href="#" class="button button_large button_icon"><i class="icon-twitter"></i></a>
                                        <a href="#" class="button button_large button_icon"><i class="icon-facebook"></i></a>
                                    </div>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--<script type="text/javascript">
    $.fn.datepicker.defaults.format = "dd/mm/yyyy";
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd'
    });
</script>-->