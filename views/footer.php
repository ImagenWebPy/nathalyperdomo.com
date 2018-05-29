<?php
$helper = new Helper();
$footerNosotros = $helper->web_page_nosotros("texto");
$textoNosotros = substr(strip_tags($footerNosotros[0]['texto']), 1, 160);
$blog = $helper->index_blog(2);
$web_datos = $helper->web_datos();
$redes = $helper->web_redes();
?>
<!-- #Footer -->
<footer id="Footer" class="clearfix">

    <div class="footer_action">
        <div class="container">
            <div class="column one column_column">
                <aside id="text-2" class="widget widget_text">
                    <h2>MANTENTE EN CONTACTO</h2>
                    <hr class="hr_narrow">
                </aside>
            </div>
        </div>
    </div>

    <div class="widgets_wrapper">
        <div class="container">

            <div class="one-third column">
                <aside id="text-5" class="widget widget_text">
                    <h4>Acerca de mí</h4>
                    <div class="textwidget">
                        <h6><?= $textoNosotros; ?>...</h6>
                        <p><a href="<?= URL; ?>/nosotros">Mas sobre mí</a></p>
                    </div>
                </aside>
            </div>

            <div class="one-third column">
                <aside id="widget_mfn_recent_posts-2" class="widget widget_mfn_recent_posts">
                    <h4>Ultimas Publicaciones</h4>
                    <div class="Recent_posts">
                        <ul>
                            <?php foreach ($blog as $item): ?>
                                <li class="post-519 post type-post status-publish format-standard has-post-thumbnail hentry category-motion tag-css3 tag-framework tag-wordpress">
                                    <div class="photo">
                                        <img width="80" height="40" src="<?= URL; ?>public/images/blog/<?= utf8_encode($item['imagen_thumb']); ?>" class="scale-with-grid wp-post-image" alt="1"/>
                                    </div>
                                    <div class="desc ">
                                        <h6><a class="title" href="<?= $helper->armaUrlBlog($item['id'], 'web_blog', 'titulo'); ?>"><?= utf8_encode($item['titulo']); ?></a></h6>
                                        <p>
                                            <span class="date"><?= date('d-m-Y', strtotime($item['fecha_blog'])); ?></span>
                                        </p>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </aside>
            </div>

            <div class="one-third column">
                <aside id="widget_mfn_recent_comments-2" class="widget widget_mfn_recent_comments">
                    <h4>Como contactarme</h4>
                    <div class="Recent_comments">
                        <ul>
                            <li>
                                <p>
                                    <a href="tel:<?= $web_datos['telefono']; ?>">Teléfono: <?= $web_datos['telefono'] . '-' . $web_datos['telefono_2'] ?></a>
                                </p>
                            <li>
                                <p>
                                    <a href="#">Dirección: <?= utf8_encode($web_datos['direccion']); ?></a>
                                </p>
                            </li>
                            <li>
                                <p>
                                    <a href="mailto:<?= utf8_encode($web_datos['email']); ?>">Email: <?= utf8_encode($web_datos['email']); ?></a>
                                </p>
                            </li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>

    <div class="footer_copy">
        <div class="container">
            <div class="column one">
                <a id="back_to_top" href="#"><i class="icon-up-open-big"></i></a>
                <!-- Copyrights -->
                <div class="copyright">
                    &copy; 2018.
                </div>
                <!-- Social -->
                <div class="social">
                    <ul>
                        <?php foreach ($redes as $item): ?>
                            <li class="<?= utf8_encode($item['class']); ?>">
                                <a target="_blank" href="#" title="<?= utf8_encode($item['descripcion']); ?>"><i class="<?= utf8_encode($item['class_i']); ?>"></i></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<!-- Modal -->
<div class="modal fade genericModal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>





<script type='text/javascript' src='<?= URL; ?>public/js/jquery/jquery-migrate.min.js'></script>
<script type='text/javascript' src='<?= URL; ?>public/rs-plugin/js/jquery.themepunch.tools.min.js'></script>
<script type='text/javascript' src='<?= URL; ?>public/rs-plugin/js/jquery.themepunch.revolution.min.js'></script>

<script>
    //<![CDATA[
    jQuery(window).load(function () {
        var retina = window.devicePixelRatio > 1 ? true : false;
        if (retina) {
            var retinaEl = jQuery("#logo img");
            var retinaLogoW = retinaEl.width();
            var retinaLogoH = retinaEl.height();
            retinaEl.attr("src", "upload/logo_retina.png").width(retinaLogoW).height(retinaLogoH)
        }
    });
    //]]>
</script>




<script type="text/javascript">

    /******************************************
     -	PREPARE PLACEHOLDER FOR SLIDER	-
     ******************************************/


    var setREVStartSize = function () {
        var tpopt = new Object();
        tpopt.startwidth = 1200;
        tpopt.startheight = 720;
        tpopt.container = jQuery('#rev_slider_1_1');
        tpopt.fullScreen = "off";
        tpopt.forceFullWidth = "off";

        tpopt.container.closest(".rev_slider_wrapper").css({height: tpopt.container.height()});
        tpopt.width = parseInt(tpopt.container.width(), 0);
        tpopt.height = parseInt(tpopt.container.height(), 0);
        tpopt.bw = tpopt.width / tpopt.startwidth;
        tpopt.bh = tpopt.height / tpopt.startheight;
        if (tpopt.bh > tpopt.bw)
            tpopt.bh = tpopt.bw;
        if (tpopt.bh < tpopt.bw)
            tpopt.bw = tpopt.bh;
        if (tpopt.bw < tpopt.bh)
            tpopt.bh = tpopt.bw;
        if (tpopt.bh > 1) {
            tpopt.bw = 1;
            tpopt.bh = 1
        }
        if (tpopt.bw > 1) {
            tpopt.bw = 1;
            tpopt.bh = 1
        }
        tpopt.height = Math.round(tpopt.startheight * (tpopt.width / tpopt.startwidth));
        if (tpopt.height > tpopt.startheight && tpopt.autoHeight != "on")
            tpopt.height = tpopt.startheight;
        if (tpopt.fullScreen == "on") {
            tpopt.height = tpopt.bw * tpopt.startheight;
            var cow = tpopt.container.parent().width();
            var coh = jQuery(window).height();
            if (tpopt.fullScreenOffsetContainer != undefined) {
                try {
                    var offcontainers = tpopt.fullScreenOffsetContainer.split(",");
                    jQuery.each(offcontainers, function (e, t) {
                        coh = coh - jQuery(t).outerHeight(true);
                        if (coh < tpopt.minFullScreenHeight)
                            coh = tpopt.minFullScreenHeight
                    })
                } catch (e) {
                }
            }
            tpopt.container.parent().height(coh);
            tpopt.container.height(coh);
            tpopt.container.closest(".rev_slider_wrapper").height(coh);
            tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(coh);
            tpopt.container.css({height: "100%"});
            tpopt.height = coh;
        } else {
            tpopt.container.height(tpopt.height);
            tpopt.container.closest(".rev_slider_wrapper").height(tpopt.height);
            tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(tpopt.height);
        }
    };

    /* CALL PLACEHOLDER */
    setREVStartSize();


    var tpj = jQuery;
    tpj.noConflict();
    var revapi1;

    tpj(document).ready(function () {

        if (tpj('#rev_slider_1_1').revolution == undefined) {
            revslider_showDoubleJqueryError('#rev_slider_1_1');
        } else {
            revapi1 = tpj('#rev_slider_1_1').show().revolution(
                    {
                        dottedOverlay: "none",
                        delay: 6000,
                        startwidth: 1200,
                        startheight: 720,
                        hideThumbs: 200,

                        thumbWidth: 100,
                        thumbHeight: 50,
                        thumbAmount: 3,

                        simplifyAll: "off",

                        navigationType: "none",
                        navigationArrows: "solo",
                        navigationStyle: "round",

                        touchenabled: "on",
                        onHoverStop: "on",
                        nextSlideOnWindowFocus: "off",

                        swipe_threshold: 0.7,
                        swipe_min_touches: 1,
                        drag_block_vertical: false,

                        keyboardNavigation: "off",

                        navigationHAlign: "center",
                        navigationVAlign: "bottom",
                        navigationHOffset: 0,
                        navigationVOffset: 20,

                        soloArrowLeftHalign: "left",
                        soloArrowLeftValign: "center",
                        soloArrowLeftHOffset: 40,
                        soloArrowLeftVOffset: 0,

                        soloArrowRightHalign: "right",
                        soloArrowRightValign: "center",
                        soloArrowRightHOffset: 40,
                        soloArrowRightVOffset: 0,

                        shadow: 0,
                        fullWidth: "on",
                        fullScreen: "off",

                        spinner: "spinner0",

                        stopLoop: "off",
                        stopAfterLoops: -1,
                        stopAtSlide: -1,

                        shuffle: "off",

                        autoHeight: "off",
                        forceFullWidth: "off",

                        hideTimerBar: "on",
                        hideThumbsOnMobile: "off",
                        hideNavDelayOnMobile: 1500,
                        hideBulletsOnMobile: "off",
                        hideArrowsOnMobile: "on",
                        hideThumbsUnderResolution: 0,

                        hideSliderAtLimit: 0,
                        hideCaptionAtLimit: 0,
                        hideAllCaptionAtLilmit: 0,
                        startWithSlide: 0});



        }
    });	/*ready*/

</script>

<script type='text/javascript' src='<?= URL; ?>public/js/jquery.form.min.js'></script>

<script type='text/javascript' src='<?= URL; ?>public/js/frontend/add-to-cart.min.js'></script>
<script type='text/javascript' src='<?= URL; ?>public/js/select2/select2.min.js'></script>
<script type='text/javascript' src='<?= URL; ?>public/js/jquery-blockui/jquery.blockUI.min.js'></script>
<script type='text/javascript' src='<?= URL; ?>public/js/frontend/woocommerce.min.js'></script>
<script type='text/javascript' src='<?= URL; ?>public/js/jquery-cookie/jquery.cookie.min.js'></script>

<script type='text/javascript' src='<?= URL; ?>public/js/frontend/cart-fragments.min.js'></script>
<script type='text/javascript' src='<?= URL; ?>public/js/jquery/ui/core.min.js'></script>
<script type='text/javascript' src='<?= URL; ?>public/js/jquery/ui/widget.min.js'></script>
<script type='text/javascript' src='<?= URL; ?>public/js/jquery/ui/mouse.min.js'></script>
<script type='text/javascript' src='<?= URL; ?>public/js/jquery/ui/sortable.min.js'></script>
<script type='text/javascript' src='<?= URL; ?>public/js/jquery/ui/tabs.min.js'></script>
<script type='text/javascript' src='<?= URL; ?>public/js/jquery/ui/accordion.min.js'></script>
<script type='text/javascript' src='<?= URL; ?>public/js/owl-carousel/owl.carousel.min.js'></script>
<script type='text/javascript' src='<?= URL; ?>public/js/jquery.jplayer.min.js'></script>
<script type='text/javascript' src='<?= URL; ?>public/js/jquery.plugins.js'></script>
<script type='text/javascript' src='<?= URL; ?>public/js/mfn.menu.js'></script>
<script type='text/javascript' src='<?= URL; ?>public/js/scripts.js'></script>
<?php
#cargamos los js de las vistas
if (isset($this->external_js)) {
    foreach ($this->external_js as $external) {
        echo '<script async defer src="' . $external . '"></script>';
    }
}
if (isset($this->public_js)) {
    foreach ($this->public_js as $public_js) {
        echo '<script type="text/javascript" src="' . URL . 'public/' . $public_js . '"></script>';
    }
}
if (isset($this->js)) {
    foreach ($this->js as $js) {
        echo '<script type="text/javascript" src="' . URL . 'views/' . $js . '"></script>';
    }
}
?>



</body>
</html>