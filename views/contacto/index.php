<div id="Content">
    <div class="content_wrapper clearfix">
        <!-- .sections_group -->
        <div class="sections_group">
            <div class="section pad0">
                <div class="section_wrapper clearfix">
                    <div class="items_group clearfix">
                        <div class="column one column_map">
                            <div class="google-map contactpagemap" id="map">
                                &nbsp;
                            </div>
                        </div>
                        <div class="column one column_column">
                            <div class="textcenter">
                                <img style="max-width: 230px;" src="upload/logo_dark_retina.png" alt=""/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section left-sidebar pad0">
                <div class="section_wrapper clearfix">
                    <div class="items_group clearfix">
                        <div class="column two-third column_column">
                            <h3>Ponte en contacto</h3>
                            <hr class="hr_left">
                            <div role="form" class="wpcf7" id="wpcf7-f9896-p165-o1" lang="es" dir="ltr">
                                <div class="screen-reader-response">
                                </div>
                                <form id="contact-form" class="contact">
                                    <p>
                                        <span class="wpcf7-form-control-wrap name">
                                            <input type="text"  name="name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Nombre"/>
                                        </span>

                                        <span class="wpcf7-form-control-wrap email">
                                            <input type="text" name="mail" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="E-mail"/>
                                        </span>

                                        <span class="wpcf7-form-control-wrap subject">
                                            <input type="text" name="website" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Asunto"/>
                                        </span>

                                        <span class="wpcf7-form-control-wrap message">
                                            <textarea  name="comment" id="comment" cols="40" rows="6" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Mensaje"></textarea>
                                        </span>
                                        <input type="submit" id="submit_contact" value="Enviar Mensaje" class="wpcf7-form-control wpcf7-submit"/>
                                    <div id="msg" class="message"></div>
                                    <p></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .four-columns - sidebar -->
    </div>
</div>
<script type="text/javascript">
    function initMap() {
        var uluru = {lat: -25.294814, lng: -57.595430};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }
</script>
