<?php
$helper = new Helper();
?>
<div id="Content">
    <div class="content_wrapper clearfix">
        <div class="sections_group">
            <div class="section left-sidebar pad0">
                <div class="section_wrapper clearfix">
                    <div class="items_group clearfix">

                        <div class="column two-third column_column">
                            <h3>Reserva tu turno</h3>
                            <hr class="hr_left">
                            <div role="form" class="wpcf7" id="wpcf7-f9896-p165-o1" lang="es" dir="ltr">
                                <div class="screen-reader-response">
                                </div>
                                <form id="contact-form" class="contact">
                                    <p>
                                        <span class="wpcf7-form-control-wrap name">
                                            <label class="label">Nombre: </label>
                                            <input type="text"  name="name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Nombre"/>
                                        </span>
                                        <span class="wpcf7-form-control-wrap email">
                                            <label class="label">Email: </label>
                                            <input type="text" name="mail" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="E-mail"/>
                                        </span>
                                        <span class="wpcf7-form-control-wrap email">
                                            <label class="label">Teléfono: </label>
                                            <input type="text" name="mail" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="E-mail"/>
                                        </span>
                                        <span class="wpcf7-form-control-wrap subject">
                                            <label class="label">Fecha: </label>
                                            <input data-provide="datepicker">
                                        </span>
                                        <span class="wpcf7-form-control-wrap subject">
                                            <label class="label">Hora: </label>
                                            <select name="hora_hasta">
                                                <option value="">Seleccione una Hora</option>
                                                <?php foreach ($helper->getRangoHoraWeb() as $item): ?>
                                                    <option value="<?= $item; ?>"><?= $item; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </span>
                                        <span class="wpcf7-form-control-wrap message">
                                            <label class="label">Comentarios: </label>
                                            <textarea  name="comment" id="comment" cols="40" rows="6" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Mensaje"></textarea>
                                        </span>
                                        <input type="submit" id="submit_contact" value="Enviar Reserva" class="wpcf7-form-control wpcf7-submit"/>
                                    <div id="msg" class="message"></div>
                                    <p></p>
                                </form>
                            </div>
                        </div>
                        <div class="four columns section_sidebar">
                            <div class="widget-area clearfix">
                                <aside id="text-3" class="widget widget_text">
                                    <div class="textwidget">
                                        <h3>Address</h3>
                                        <hr class="hr_left">
                                        <h6>Envato<br>
                                            Level 13, 2 Elizabeth St, Melbourne<br>
                                            Victoria 3000 Australia</h6>
                                        <p>
                                            <i class="icon-phone"></i><a href="#">+61 (0) 3 8376</a>
                                        </p>
                                        <a href="mailto:noreply@envato.com" class="button button_large button_icon"><i class="icon-mail-line"></i></a>
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
<script type="text/javascript">
    $('.datepicker').datepicker();
</script>