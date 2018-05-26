<?php $helper = new Helper(); ?>
<div id="Content">
    <div class="content_wrapper clearfix">
        <!-- .sections_group -->
        <div class="sections_group">
            <div class="section">
                <div class="section_wrapper clearfix">
                    <div class="column one column_blog">
                        <div class="blog_wrapper isotope_wrapper masonry">
                            <h2>Resultados de la Busqueda</h2>
                            <div class="posts_group isotope">
                                <?php foreach ($this->resultadosBusquedas['listado'] as $item): ?>
                                    <!-- blog Post -->
                                    <div class="post-item isotope-item clearfix post-519 post type-post status-publish format-standard has-post-thumbnail hentry category-motion tag-css3 tag-framework tag-wordpress">
                                        <div class="post-photo-wrapper">
                                            <div class="post-photo">
                                                <img width="366" height="250" src="<?= URL; ?>public/images/blog/<?= utf8_encode($item['imagen_thumb']); ?>" class="scale-with-grid wp-post-image" alt="1"/>
                                            </div>
                                        </div>
                                        <div class="post-desc-wrapper">
                                            <div class="post-desc">
                                                <div class="post-title">
                                                    <h4><a href="<?= $helper->armaUrlBlog($item['id'], 'web_blog', 'titulo'); ?>"><?= utf8_encode($item['titulo']); ?></a></h4>
                                                </div>
                                                <div class="post-meta">
                                                    <div class="date">
                                                        <?= date('d-m-Y', strtotime($item['fecha_blog'])); ?>                                     
                                                    </div>
                                                    <hr class="hr_narrow hr_left"/>
                                                </div>
                                                <div class="post-excerpt">
                                                    <p>
                                                        <?= substr(strip_tags(utf8_encode($item['contenido'])), 0, 160) ?>...
                                                    </p>
                                                </div>
                                                <div class="post-footer">
                                                    <a href="<?= $helper->armaUrlBlog($item['id'], 'web_blog', 'titulo'); ?>" class="post-more">Leer más</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;
                                ?>
                            </div>

                            <div class="column one pager_wrapper">
                                <!--                                <div class="pager">
                                                                    <a href="#" class="page active">1</a><a href="#" class="page">2</a><a class="next_page" href="#"><i class="icon-right-open"></i></a>
                                                                </div>-->
                                <?= $this->resultadosBusquedas['paginador']; ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>