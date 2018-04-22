

        <script type='text/javascript' src='<?= URL; ?>public/js/jquery/jquery.js'></script>
        <script type='text/javascript' src='<?= URL; ?>public/js/jquery/jquery-migrate.min.js'></script>
        <script type='text/javascript' src='<?= URL; ?>public/rs-plugin/js/jquery.themepunch.tools.min.js'></script>
        <script type='text/javascript' src='<?= URL; ?>public/rs-plugin/js/jquery.themepunch.revolution.min.js'></script>


        <script type='text/javascript' src='<?= URL; ?>public/js/jquery.form.min.js'></script>

        <script type='text/javascript' src='<?= URL; ?>public/js/frontend/add-to-cart.min.js'></script>
        <script type='text/javascript' src='<?= URL; ?>public/js/select2/select2.min.js'></script>
        <script type='text/javascript' src='<?= URL; ?>public/js/jquery-blockui/jquery.blockUI.min.js'></script>
        <script type='text/javascript' src='<?= URL; ?>public/js/frontend/woocommerce.min.js'></script>
        <script type='text/javascript' src='<?= URL; ?>public/js/jquery-cookie/jquery.cookie.min.js'></script>
        <script type='text/javascript' src='http://maps.google.com/maps/api/js?sensor=false&amp;ver=1.3.4'></script>

        <script type='text/javascript' src='<?= URL; ?>public/js/frontend/cart-fragments.min.js'></script>
        <script type='text/javascript' src='<?= URL; ?>public/js/jquery/ui/core.min.js'></script>
        <script type='text/javascript' src='<?= URL; ?>public/js/jquery/ui/widget.min.js'></script>
        <script type='text/javascript' src='<?= URL; ?>public/js/jquery/ui/mouse.min.js'></script>

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




    </body>
</html>