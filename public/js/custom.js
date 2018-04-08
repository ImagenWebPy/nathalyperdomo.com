(function (e) {
    "use strict";
    e(document).ready(function () {
        function n(t) {
            if (!e("#main_navbar ").hasClass("navbar-fixed-bottom")) {
                if (e(window).scrollTop() > t) {
                    e("#main_navbar ").addClass("navbar-fixed-top");
                    e("body").css({
                        "margin-top": e("#main_navbar ").height() + "px"
                    });
                    if (e("#main_navbar ").parent("div").hasClass("container")) e("#main_navbar ").children("div").addClass("container").removeClass("container-fluid");
                    else if (e("#main_navbar ").parent("div").hasClass("container-fluid")) e("#main_navbar ").children("div").addClass("container-fluid").removeClass("container")
                } else {
                    e("#main_navbar ").removeClass("navbar-fixed-top");
                    e("#main_navbar ").children("div").addClass("container-fluid").removeClass("container");
                    e("body").css({
                        "margin-top": ""
                    })
                }
            }
        }

        e(".animsition").animsition({
            inClass: "fade-in",
            outClass: "fade-out",
            inDuration: 1500,
            outDuration: 800,
            linkElement: ".animsition-link",
            loading: true,
            loadingParentElement: "body",
            loadingClass: "animsition-loading",
            unSupportCss: ["animation-duration", "-webkit-animation-duration", "-o-animation-duration"],
            overlay: false,
            overlayClass: "animsition-overlay-slide",
            overlayParentElement: "body"
        });
        var t = e("#main_navbar").offset().top;
        n(t);
        e(window).on("scroll", function () {
            n(t)
        });
        e("#dp").datepicker();
        e(".bg-image").css("background", function () {
            var t = "url(" + e(this).data("image-src") + ") no-repeat center center";
            return t
        });
        e(".bg-image").css("background-size", "cover");
        e(".collapse").on("shown.bs.collapse", function () {
            e(this).parent().find(".glyphicon-plus").removeClass("glyphicon-plus").addClass("glyphicon-minus")
        }).on("hidden.bs.collapse", function () {
            e(this).parent().find(".glyphicon-minus").removeClass("glyphicon-minus").addClass("glyphicon-plus")
        });
        e(".responsive-video").fitVids();
        e("#contactform").submit(function () {
            var t = e(this).attr("action");
            e("#message").slideUp(750, function () {
                e("#message").hide();
                e("#submit").after('<img src="assets/ajax-loader.gif" class="loader" />').attr("disabled", "disabled");
                e.post(t, {
                    name: e("#name").val(),
                    phone: e("#phone").val(),
                    subject: e("#subject").val(),
                    comments: e("#comments").val(),
                    verify: e("#verify").val()
                }, function (t) {
                    document.getElementById("message").innerHTML = t;
                    e("#message").slideDown("slow");
                    e("#contactform img.loader").fadeOut("slow", function () {
                        e(this).remove()
                    });
                    e("#submit").removeAttr("disabled");
                    if (t.match("success") != null) e("#contactform").slideUp("slow")
                })
            });
            return false
        });
        var r = e("#owl-demo");
        r.owlCarousel({
            items: 3,
            itemsDesktop: [1e3, 3],
            itemsDesktopSmall: [900, 3],
            itemsTablet: [600, 2],
            pagination: false
        });
        e(".carousel-next").click(function () {
            r.trigger("owl.next")
        });
        e(".carousel-prev").click(function () {
            r.trigger("owl.prev")
        });
        e("#owl-slider-1 , #owl-slider-2").owlCarousel({
            navigation: false,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true
        });
        e(".fullsize-slider").revolution({
            delay: 1e3,
            startwidth: 1170,
            startheight: 620,
            hideThumbs: 10,
            hideTimerBar: "on",
            fullWidth: "off",
            fullScreen: "off",
            touchenabled: "off",
            onHoverStop: "on",
            fullScreenOffsetContainer: "",
            navigationType: "bullet",
            navigationArrows: "solo",
            navigationStyle: "preview4",
            keyboardNavigation: "on",
            hideCaptionAtLimit: "320",
            parallax: "scroll",
            parallaxBgFreeze: "on",
            parallaxLevels: [10, 20, 30, 40, 50, 60, 70, 80, 90, 100, 110, 120, 130, 140]
        });
        jQuery('[data-toggle~="tooltip"]').tooltip({
            container: "body"
        });
        jQuery('[data-toggle~="popover"]').popover({
            container: "body"
        })
    });
    e("#contactform").submit(function () {
        var t = e(this).attr("action");
        e("#message").slideUp(750, function () {
            e("#message").hide();
            e("#submit").after('<img src="images/loader.gif" class="loader" />').attr("disabled", "disabled");
            e.post(t, {
                name: e("#name").val(),
                phone: e("#phone").val(),
                subject: e("#subject").val(),
                comments: e("#comments").val(),
                verify: e("#verify").val()
            }, function (t) {
                document.getElementById("message").innerHTML = t;
                e("#message").slideDown("slow");
                e("#contactform img.loader").fadeOut("slow", function () {
                    e(this).remove()
                });
                e("#submit").removeAttr("disabled");
                if (t.match("success") != null) e("#contactform").slideUp("slow")
            })
        });
        return false
    });
    e(window).load(function () {
        e(document).on("click", ".navbar .dropdown-menu", function (e) {
            e.stopPropagation()
        })
    })
})(jQuery)