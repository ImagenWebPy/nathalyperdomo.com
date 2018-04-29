<!-- #Footer -->
<footer id="Footer" class="clearfix">

    <div class="footer_action">
        <div class="container">
            <div class="column one column_column">
                <aside id="text-2" class="widget widget_text">
                    <h2>MANTENTE EN CONTACTO</h2>
                    <hr class="hr_narrow">
                    <div class="textwidget">
                        Call us at <a href="#">+23 777 555 333</a><span>or</span><a href="contact.html">Write us a message</a>
                    </div>
                </aside>
            </div>
        </div>
    </div>

    <div class="widgets_wrapper">
        <div class="container">

            <div class="one-third column">
                <aside id="text-5" class="widget widget_text">
                    <h4>About our company</h4>
                    <div class="textwidget">
                        <h6>We really love working for you and your customers</h6>
                        <p>
                            We do what we love and this is the best in our life. Try a piece of our work and you will not want to swap for anything else!
                        </p>
                    </div>
                </aside>
            </div>

            <div class="one-third column">
                <aside id="widget_mfn_recent_posts-2" class="widget widget_mfn_recent_posts">
                    <h4>Latest posts</h4>
                    <div class="Recent_posts">
                        <ul>
                            <li class="post-519 post type-post status-publish format-standard has-post-thumbnail hentry category-motion tag-css3 tag-framework tag-wordpress">
                                <div class="photo">
                                    <img width="80" height="60" src="<?= URL; ?>public/upload/1-80x60.jpg" class="scale-with-grid wp-post-image" alt="1"/>
                                </div>
                                <div class="desc ">
                                    <h6><a class="title" href="#">Content Builder for posts</a></h6>
                                    <p>
                                        <span class="date">February 18, 2014</span> | <span class="comments">comments off</span>
                                    </p>
                                </div>
                            </li>
                            <li class="post-507 post type-post status-publish format-standard has-post-thumbnail hentry category-jquery tag-themeforest">
                                <div class="photo">
                                    <img width="80" height="60" src="<?= URL; ?>public/upload/3-80x60.jpg" class="scale-with-grid wp-post-image" alt="3"/>
                                </div>
                                <div class="desc ">
                                    <h6><a class="title" href="#">Revolution Slider left sidebar</a></h6>
                                    <p>
                                        <span class="date">February 17, 2014</span> | <span class="comments">comments off</span>
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </aside>
            </div>

            <div class="one-third column">
                <aside id="widget_mfn_recent_comments-2" class="widget widget_mfn_recent_comments">
                    <h4>Recent comments</h4>
                    <div class="Recent_comments">
                        <ul>
                            <li>
                                <p>
                                    <i class="icon-user"></i><strong>Szejk</strong> commented on <a href="#" title="Szejk | Content Builder for posts">Content Builder for posts</a>
                                </p>
                                <span class="date"><i class="icon-calendar-line"></i> January 30, 2014</span></li>
                            <li>
                                <p>
                                    <i class="icon-user"></i><strong>Karboniusz</strong> commented on <a href="#" title="Karboniusz | Content Builder for posts">Content Builder for posts</a>
                                </p>
                                <span class="date"><i class="icon-calendar-line"></i> January 30, 2014</span></li>
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
                    &copy; 2015 Cake. All Rights Reserved. <a target="_blank" rel="nofollow" href="#">Max Themes</a>
                </div>
                <!-- Social -->
                <div class="social">
                    <ul>
                        <li class="facebook"><a target="_blank" href="#" title="Facebook"><i class="icon-facebook"></i></a></li>
                        <li class="googleplus"><a target="_blank" href="#" title="Google+"><i class="icon-gplus"></i></a></li>
                        <li class="twitter"><a target="_blank" href="#" title="Twitter"><i class="icon-twitter"></i></a></li>
                        <li class="vimeo"><a target="_blank" href="#" title="Vimeo"><i class="icon-vimeo"></i></a></li>
                        <li class="youtube"><a target="_blank" href="#" title="YouTube"><i class="icon-play"></i></a></li>
                        <li class="flickr"><a target="_blank" href="#" title="Flickr"><i class="icon-flickr"></i></a></li>
                        <li class="linked_in"><a target="_blank" href="#" title="LinkedIn"><i class="icon-linkedin"></i></a></li>
                        <li class="pinterest"><a target="_blank" href="#" title="Pinterest"><i class="icon-pinterest"></i></a></li>
                        <li class="dribbble"><a target="_blank" href="#" title="Dribbble"><i class="icon-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>





<script type='text/javascript' src='<?= URL; ?>public/js/jquery/jquery.js'></script>
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