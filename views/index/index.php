<?php $helper = new Helper(); ?>
<!-- #Content -->
<div id="Content">
    <div class="content_wrapper clearfix">
        <!-- .sections_group -->
        <div class="sections_group">
            <div class="section homeservices">
                <div class="section_wrapper clearfix">
                    <div class="items_group clearfix">
                        <?php foreach ($this->index_caracteristicas as $item): ?>
                            <div class="column one-third column_icon_box">
                                <div class="icon_box icon_position_top">
                                    <a href="#">
                                        <div class="icon_wrapper">
                                            <i class="<?= utf8_encode($item['icon']); ?>"></i>
                                        </div>
                                        <div class="desc_wrapper">
                                            <h4 class="title"><?= utf8_encode($item['titulo']); ?></h4>
                                            <hr/>
                                            <div class="desc">
                                                <?= utf8_encode($item['contenido']); ?>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Portfolio -->
            <div class="section full-width homeportfolio">
                <div class="section_wrapper clearfix">
                    <div class="items_group clearfix">
                        <div class="column one column_fancy_heading">
                            <div class="fancy_heading fancy_heading_color no_icon">
                                <h3>BLOG</h3>
                            </div>
                        </div>
                        <div class="column one column_portfolio_slider">
                            <div class="portfolio_slider">
                                <ul class="portfolio_slider_ul">
                                    <?php foreach ($this->index_blog as $item): ?>
                                        <li>
                                            <?php if (!empty($item['url_youtube'])): ?>
                                                <iframe class="scale-with-grid" src="http://www.youtube.com/embed/<?= $item['url_youtube']; ?>?wmode=opaque" allowfullscreen="" style="height: 390px; width: 380px;">
                                                </iframe>
                                            <?php else: ?>
                                                <a class="photo-wrapper" href="#"><img width="380" height="380" src="<?= URL; ?>public/images/blog/<?= utf8_encode($item['imagen_thumb']); ?>" class="scale-with-grid wp-post-image" alt="1"/></a>
                                            <?php endif; ?>
                                            <div class="hover-box">
                                                <h5><?= utf8_encode($item['titulo']); ?></h5>
                                                <a class="hover-button zoom prettyphoto" href="<?= URL; ?>public/images/blog/<?= utf8_encode($item['imagen']); ?>"><i class="icon-search"></i></a><a class="hover-button link" href="<?= $helper->armaUrlBlog($item['id'], 'web_blog', 'titulo'); ?>"><i class="icon-link"></i></a>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Portfolio -->

            <!-- Video Section -->
            <div class="section highlight-left homevideosection">
                <div class="section_wrapper clearfix">
                    <div class="items_group clearfix">
                        <div class="column one-second column_video_box">
                            <div class="video_box">
                                <div class="desc_wrapper">
                                    <h3><?= utf8_encode($this->index_video['titulo']); ?></h3>
                                    <a data-title="<?= utf8_encode($this->index_video['titulo']); ?>" data-url="<?= utf8_encode($this->index_video['url_video']); ?>" class="icon" id="btnVideoIndex"><i class="icon-play"></i></a>
                                    <h6><?= utf8_encode($this->index_video['texto_info']); ?><br/>
                                        <?= utf8_encode($this->index_video['texto_info2']); ?></h6>
                                </div>
                            </div>
                        </div>

                        <div class="column one-second column_testimonials">
                            <div class="testimonials">
                                <ul class="testimonials-slider">
                                    <?php foreach ($this->index_frases as $item): ?>
                                        <li>
                                            <blockquote>
                                                <?= utf8_encode($item['frase']); ?>
                                            </blockquote>
                                            <div class="author">
                                                <a target="_blank" href="#"><?= utf8_encode($item['autor']); ?></a>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Video Section -->

            <div class="section homebuild">
                <div class="section_wrapper clearfix">
                    <div class="items_group clearfix">
                        <div class="column one-second column_column">
                            <div class="pad20">
                                <h3><?= utf8_encode($this->index_nosotros['titulo']); ?></h3>
                                <hr class="hr_left"/>
                                <p>
                                    <?= utf8_encode($this->index_nosotros['contenido']); ?>
                                </p>
                            </div>
                        </div>
                        <div class="column one-second column_image">
                            <div class="scale-with-grid aligncenter wp-caption no-hover">
                                <div class="photo">
                                    <img class="scale-with-grid" src="<?= URL; ?>public/images/<?= utf8_encode($this->index_nosotros['imagen']); ?>" alt=""/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section dark homeparallaxsection" data-stellar-background-ratio="0.5">
                <div class="section_wrapper clearfix">
                    <div class="items_group clearfix">
                        <div class="column one column_column">
                            <div class="textcenter">
                                <h2><?= utf8_encode($this->index_parallax['texto']); ?></h2>
                                <hr class="hr_narrow"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  Features -->
            <div class="section homefeatures">
                <div class="section_wrapper clearfix">
                    <div class="items_group clearfix">
                        <div class="column one column_column">
                            <h3 class="textcenter">NUESTROS SERVCIOS</h3>
                        </div>
                        <?php foreach ($this->index_servicios as $item): ?>
                            <div class="column one-second column_chart">
                                <div class="chart_box chart_position_left">
                                    <div class="chart" data-percent="100">
                                        <span class="num"><i class="icon-heart-line"></i></span>
                                    </div>
                                    <div class="desc_wrapper">
                                        <h5><?= utf8_encode($item['servicio']); ?></h5>
                                        <hr class="hr_left">
                                        <div class="desc">
                                            <?= utf8_encode($item['contenido']); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <!-- Parallax -->
        </div>
        <!-- .four-columns - sidebar -->
    </div>
</div>