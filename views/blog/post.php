<div id="Content">
    <div class="content_wrapper clearfix">

        <!-- .sections_group -->
        <div class="sections_group">
            <div id="post-507" class="post-507 post type-post status-publish format-standard has-post-thumbnail hentry category-jquery tag-themeforest">
                <div class="section section-post-header">
                    <div class="section_wrapper clearfix">
                        <div class="column one post-photo-wrapper">
                            <div class="post-photo">
                                <div id="rev_slider_9_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" style="margin: 0px auto; padding: 0px; max-height: 818px; height: 600px; overflow: visible; background-color: rgb(233, 233, 233);">
                                    <!-- START REVOLUTION SLIDER 4.6.9 fullwidth mode -->
                                    <div id="rev_slider_9_1" class="rev_slider fullwidthabanner revslider-initialised tp-simpleresponsive" style="max-height: 818px; height: 600px;">
                                        <ul class="tp-revslider-mainul" style="display: block; overflow: hidden; width: 100%; height: 100%; max-height: 818px;">
                                            <!-- SLIDE  -->
                                            <li data-transition="slidehorizontal" data-slotamount="7" data-masterspeed="300" data-saveperformance="off" class="tp-revslider-slidesli active-revslide current-sr-slide-visible" style="width: 100%; height: 100%; overflow: hidden; z-index: 20; visibility: inherit; opacity: 1;">
                                                <!-- MAIN IMAGE -->
                                                <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="center top" data-kenburns="undefined" data-easeme="undefined" data-bgfit="cover" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                                                    <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center top" data-bgrepeat="no-repeat" data-lazydone="undefined" style="width: 100%; height: 100%; opacity: 1; visibility: inherit; background-image: url(<?= URL; ?>public/images/blog/<?= $this->post['imagen']; ?>); background-color: rgba(0, 0, 0, 0); background-size: cover; background-position: 50% 0%; background-repeat: no-repeat;">
                                                    </div>
                                                </div>
                                                <!-- LAYERS -->
                                            </li>
                                        </ul>
                                        <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important; width: 87.2222222222222%; transform: translate3d(0px, 0px, 0px);">
                                        </div>
                                        <div class="tp-loader spinner0" style="display: none;">
                                            <div class="dot1">
                                            </div>
                                            <div class="dot2">
                                            </div>
                                            <div class="bounce1">
                                            </div>
                                            <div class="bounce2">
                                            </div>
                                            <div class="bounce3">
                                            </div>
                                        </div>
                                    </div>
                                    <div style="position: absolute; top: 300px; margin-top: -19px; left: 10px;" class="tp-leftarrow tparrows default round hidearrows">
                                        <div class="tp-arr-allwrapper">
                                            <div class="tp-arr-iwrapper">
                                                <div class="tp-arr-imgholder" style="visibility: inherit; opacity: 1; background-image: url(upload/heart_motion.jpg);">
                                                </div>
                                                <div class="tp-arr-imgholder2">
                                                </div>
                                                <div class="tp-arr-titleholder">
                                                </div>
                                                <div class="tp-arr-subtitleholder">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="position: absolute; top: 300px; margin-top: -19px; right: 10px;" class="tp-rightarrow tparrows default round hidearrows">
                                        <div class="tp-arr-allwrapper">
                                            <div class="tp-arr-iwrapper">
                                                <div class="tp-arr-imgholder" style="visibility: inherit; opacity: 1; background-image: url(upload/heart_motion.jpg);">
                                                </div>
                                                <div class="tp-arr-imgholder2">
                                                </div>
                                                <div class="tp-arr-titleholder">
                                                </div>
                                                <div class="tp-arr-subtitleholder">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END REVOLUTION SLIDER -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="post-wrapper-content">
                    <div class="section section-post-meta">
                        <div class="section_wrapper clearfix">
                            <div class="column one post-meta">
                                <div class="date">
                                    <?= date('d-m-Y', strtotime($this->post['fecha_blog'])) ?>
                                </div>
                                <hr class="hr_narrow hr_left">
                            </div>
                        </div>
                    </div>
                    <div class="section the_content">
                        <div class="section_wrapper">
                            <div class="the_content_wrapper">
                                <h5><?= utf8_encode($this->post['titulo']); ?></h5>
                                <?= utf8_encode($this->post['contenido']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="section section-post-footer">
                        <div class="section_wrapper clearfix">
                            <div class="column one post-pager">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .four-columns - sidebar -->
    </div>
</div>