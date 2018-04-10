<!-- start: Slider -->
<div class="fullsize-container">
    <div class="fullsize-slider">
        <ul>
            <li data-transition="fade" data-slotamount="1" data-thumb="images/slider-1.jpg" data-delay="7500" data-saveperformance="off" data-title="Our Workplace">
                <!-- MAIN IMAGE -->
                <img src="<?= URL; ?>public/images/slider-1.jpg" data-bgfit="cover" data-bgrepeat="no-repeat" alt="">
                <!-- LAYERS -->
                <div class="tp-caption theme-caption rs-parallaxlevel-4 transform " data-x="20" data-y="center" data-speed="700" data-voffset="-75" data-start="600" data-easing="Power3.easeInOut">Lorem ipsum.
                    <br>Lorem ipsum dolor sit amet.
                    <br>Lorem Ipsum.
                </div>
                <div class="tp-caption sfl rs-parallaxlevel-4" data-x="20" data-y="center" data-voffset="15" data-speed="1000" data-start="2000" data-easing=""><a href="#service" class="btn-round tp-simpleresponsive button blue">Lorem ipsum</a>
                </div>
            </li>
            <!-- SLIDE  -->
            <li data-transition="fade" data-slotamount="1" data-masterspeed="1500" data-thumb="images/slider-2.jpg" data-delay="7000" data-saveperformance="off" data-title="Slide">
                <!-- MAIN IMAGE -->
                <img src="<?= URL; ?>public/images/slider-2.jpg" alt="fullslide6" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                <!-- LAYERS -->
                <div class="caption theme-caption rs-parallaxlevel-4 transform " data-x="20" data-y="center" data-speed="700" data-voffset="-95" data-start="600" data-easing="Power3.easeInOut">Lorem ipsum.
                    <br>Lorem ipsum dolor sit amet.
                    <br>Lorem Ipsum.
                </div>
                <div class="caption mediumlarge_light_dark rs-parallaxlevel-4" data-x="20" data-y="center" data-speed="800" data-voffset="-20" data-start="1500" data-easing="Power3.easeInOut">Lorem ipsum dolor sit amet</div>
                <div class="caption sfl rs-parallaxlevel-4" data-x="20" data-y="center" data-voffset="27" data-speed="1000" data-start="2000" data-easing=""><a href="#service" class="btn-round tp-simpleresponsive button blue">Lorem ipsum</a>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- end: Slider -->
<div class="horizontal-form med-tab">
    <div class="container">
        <div class="tabbable-panel">
            <div class="tabbable-line">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a data-toggle="tab" href="#book">Reserva un turno</a>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#info">Llamanos </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="book">
                        <form class="space-xs">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="row">
                                        <p class="col-md-6 col-sm-6"><input class="form-control" placeholder="Nombres" type="text"></p>
                                        <p class="col-md-6 col-sm-6"><input class="form-control" placeholder="Apellidos" type="text"></p>
                                    </div>
                                </div>
                                <!-- /.col 8 -->
                                <div class="col-sm-4">
                                    <input class="form-control sm-margin-bottom-10" placeholder="E-mail" required="" type="email" >
                                </div>
                                <!-- /.col 4 -->
                            </div>
                            <!-- /row -->
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-group date sm-margin-bottom-10">
                                                <input class="form-control" value="02-16-2012" id="dp" type="text" > <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col 4 -->
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <select class="form-control" id="departments" name="departments">
                                            <option value="0"  selected="selected">Lorem Ipsum</option>
                                            <option value="1">Lorem Ipsum</option>
                                            <option value="2">Lorem Ipsum</option>
                                            <option value="3">Lorem Ipsum</option>
                                            <option value="4">Lorem Ipsum</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- /. col 3 -->
                                <div class="col-sm-3">
                                    <select class="form-control sm-margin-bottom-10">
                                        <option value="0"  selected="selected">Lorem Ipsum</option>
                                        <option value="1">
                                            Lorem Ipsum
                                        </option>
                                        <option value="2">
                                            Lorem Ipsum
                                        </option>
                                        <option value="3">
                                            Lorem Ipsum
                                        </option>
                                        <option value="4">
                                           Lorem Ipsum
                                        </option>
                                    </select>
                                </div>
                                <!-- /.col 3 -->
                                <div class="col-sm-2">
                                    <a class="btn btn-default btn-block" href="#">Reservar</a>
                                </div>
                                <!-- /.col 1 -->
                            </div>
                            <!-- /.row -->
                        </form>
                    </div>
                    <!-- /.tab pane -->
                    <div class="tab-pane fade" id="info">
                        <div class="spacer40"></div>
                        <!-- /.col 4 -->
                        <div class="col-sm-4">
                            <div class="med-iconBox med-iconBox--left">
                                <div class="med-iconBox-icon icon-big color-green-light">
                                    <span class="icon-i-first-aid" aria-hidden="true"></span>
                                </div>
                                <div class="med-iconBox-content">
                                    <h4 class="med-iconBox-title hr-after">
                                        +595 981 258 733
                                    </h4>
                                    <p>
                                        Para Consultas
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- /.col 4 -->
                    </div>
                    <!-- /.tab pane -->
                </div>
                <!-- /.tab content -->
            </div>
            <!-- /.tabbable line-->
        </div>
        <!-- /.tabbable panel -->
    </div>
    <!-- /.container -->
</div>
<section class="space-sm bg-light" id="service">
    <div class="container">
        <div class="service-box">
            <div class="row">
                <div class="col-md-3 col-sm-3 clearfix cr-nav">
                    <h3 class="f-500">Nuestros Servicios</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>

                    <div class="customNavigation">
                        <a class="btn btn-default carousel-prev fa fa-long-arrow-left"></a>
                        <a class="btn btn-default carousel-next fa fa-long-arrow-right"></a>
                    </div>
                    <!-- cr.navigation icons:ends -->
                </div>
                <!-- .col 3 -->
                <div class="col-md-9 col-sm-9">
                    <div id="owl-demo" class="row">
                        <div class="item">
                            <div class="info-block">
                                <div class="thumbnail">
                                    <figure>
                                        <img src="<?= URL; ?>public/images/service-9.jpg" alt="" class="img-responsive">
                                    </figure>
                                    <div class="round-icon bg-blue-light">
                                        <span class="icon-i-dental" aria-hidden="true"></span>
                                    </div>
                                    <div class="caption" onclick="location.href = 'service-details.html';">
                                        <h4>Lorem ipsum dolor sit amet</h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </p>

                                    </div>
                                    <ul class="spark-actions">
                                        <li>
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Find out more about dental health">
                                                <span class="fa fa-info"></span></a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="fa fa-link"></span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.info bock -->
                        </div>
                        <!-- /.tem -->
                        <div class="item">
                            <div class="info-block">
                                <div class="thumbnail">
                                    <figure>
                                        <img src="<?= URL; ?>public/images/service-11.jpg" alt="" class="img-responsive">
                                    </figure>
                                    <div class="round-icon bg-green-light">
                                        <span class="icon-i-genetics" aria-hidden="true"></span>
                                    </div>
                                    <div class="caption" onclick="location.href = 'service-details.html';">
                                        <h4>consectetur adipisicing elit</h4>
                                       <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </p>
                                    </div>
                                    <ul class="spark-actions">
                                        <li>
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Yes,I'm your info tooltip">
                                                <span class="fa fa-info"></span></a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="fa fa-link"></span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.info bock -->
                        </div>
                        <!-- /.tem -->
                        <div class="item">
                            <div class="info-block">
                                <div class="thumbnail">
                                    <figure>
                                        <img src="<?= URL; ?>public/images/service-8.jpg" alt="" class="img-responsive">
                                    </figure>
                                    <div class="round-icon bg-red-light">
                                        <span class="icon-i-pathology" aria-hidden="true"></span>
                                    </div>
                                    <div class="caption" onclick="location.href = 'service-details.html';">
                                        <h4>sed do eiusmod tempor</h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </p>
                                    </div>
                                    <ul class="spark-actions">
                                        <li>
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Yes,I'm your info tooltip">
                                                <span class="fa fa-info"></span></a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="fa fa-link"></span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.info bock -->
                        </div>
                        <!-- /.tem -->
                        <div class="item">
                            <div class="info-block">
                                <div class="thumbnail">
                                    <figure>
                                        <img src="<?= URL; ?>public/images/service-13.jpg" alt="" class="img-responsive">
                                    </figure>
                                    <div class="round-icon bg-blue">
                                        <span class="icon-i-pathology" aria-hidden="true"></span>
                                    </div>
                                    <div class="caption" onclick="location.href = 'service-details.html';">
                                        <h4>Paediatric Care</h4>
                                        <p>You can find general information about making appointments, as well as other helpful tips..</p>
                                    </div>
                                    <ul class="spark-actions">
                                        <li>
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Yes,I'm your info tooltip">
                                                <span class="fa fa-info"></span></a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="fa fa-link"></span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.info bock -->
                        </div>
                        <!-- /.tem -->
                        <div class="item">
                            <div class="info-block">
                                <div class="thumbnail">
                                    <figure>
                                        <img src="<?= URL; ?>public/images/service-8.png" alt="" class="img-responsive">
                                    </figure>
                                    <div class="round-icon bg-red">
                                        <span class="icon-i-pathology" aria-hidden="true"></span>
                                    </div>
                                    <div class="caption" onclick="location.href = 'service-details.html';">
                                        <h4>Ut enim ad minim veniam</h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </p>
                                    </div>
                                    <ul class="spark-actions">
                                        <li>
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Yes,I'm your info tooltip">
                                                <span class="fa fa-info"></span></a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="fa fa-link"></span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.info bock -->
                        </div>
                        <!-- /.tem -->
                        <div class="item">
                            <div class="info-block">
                                <div class="thumbnail">
                                    <figure>
                                        <img src="<?= URL; ?>public/images/service-7.jpg" alt="" class="img-responsive">
                                    </figure>
                                    <div class="round-icon bg-green">
                                        <span class="icon-i-pathology" aria-hidden="true"></span>
                                    </div>
                                    <div class="caption" onclick="location.href = 'service-details.html';">
                                        <h4>Lorem ipsum dolor sit amet</h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </p>
                                    </div>
                                    <ul class="spark-actions">
                                        <li>
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Yes,I'm your info tooltip">
                                                <span class="fa fa-info"></span></a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="fa fa-link"></span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.info bock -->
                        </div>
                        <!-- /.tem -->
                    </div>
                </div>
            </div>
            <!--col 9-->
        </div>
    </div>
    <!-- /.container -->
</section>
<section class="space-md">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <p class="lead hr-after">Lorem ipsum dolor sit amet</p>
                <p>Phasellus enim libero,ut et lobortis aliquam aliquam in tortor et libero, blandit vel sapi condimentum ultricies magn</p>
            </div>
            <div class="col-sm-9">
                <div class="row margin-bottom-35">
                    <div class="col-sm-6">
                        <div class="med-iconBox med-iconBox--left">
                            <div class="med-iconBox-icon icon-big color-blue">
                                <span class="icon-i-alternative-complementary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Web Design"></span>
                            </div>
                            <div class="med-iconBox-content">
                                <h4 class="med-iconBox-title hr-after">
                                    Lorem ipsum dolor sit amet
                                </h4>
                                <p>
                                    Praesent faucibus nisl sit amet nulla sollicitudin pretium a sed purus. Nullam bibendum porta magna.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- /.med box -->
                    <div class="col-sm-6">
                        <div class="med-iconBox med-iconBox--left">
                            <div class="med-iconBox-icon icon-big color-blue">
                                <span class="icon-i-laboratory" data-toggle="tooltip" data-placement="top" title="" data-original-title="Web Design"></span>
                            </div>
                            <div class="med-iconBox-content">
                                <h4 class="med-iconBox-title hr-after">
                                    Lorem ipsum dolor sit amet
                                </h4>
                                <p>
                                    Praesent faucibus nisl sit amet nulla sollicitudin pretium a sed purus. Nullam bibendum porta magna.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- /.med box -->
                </div>
                <div class="row margin-bottom-35">
                    <div class="col-sm-6">
                        <div class="med-iconBox med-iconBox--left">
                            <div class="med-iconBox-icon icon-big color-blue">
                                <span class="icon-i-nutrition"></span>
                            </div>
                            <div class="med-iconBox-content">
                                <h4 class="med-iconBox-title hr-after">
                                    Lorem ipsum dolor sit amet
                                </h4>
                                <p>
                                    Praesent faucibus nisl sit amet nulla sollicitudin pretium a sed purus. Nullam bibendum porta magna.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- /.med box -->
                    <div class="col-sm-6">
                        <div class="med-iconBox med-iconBox--left">
                            <div class="med-iconBox-icon icon-big color-blue">
                                <span class="icon-i-genetics" data-toggle="tooltip" data-placement="top" title="" data-original-title="Web Design"></span>
                            </div>
                            <div class="med-iconBox-content">
                                <h4 class="med-iconBox-title hr-after">
                                    Lorem ipsum dolor sit amet
                                </h4>
                                <p>
                                    Praesent faucibus nisl sit amet nulla sollicitudin pretium a sed purus. Nullam bibendum porta magna.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- /.med box -->
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="med-iconBox med-iconBox--left">
                            <div class="med-iconBox-icon icon-big color-blue">
                                <span class="icon-i-respiratory" data-toggle="tooltip" data-placement="top" title="" data-original-title="Web Design"></span>
                            </div>
                            <div class="med-iconBox-content">
                                <h4 class="med-iconBox-title hr-after">
                                    Lorem ipsum dolor sit amet
                                </h4>
                                <p>
                                    Praesent faucibus nisl sit amet nulla sollicitudin pretium a sed purus. Nullam bibendum porta magna.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- /.med box -->
                    <div class="col-sm-6">
                        <div class="med-iconBox med-iconBox--left">
                            <div class="med-iconBox-icon icon-big color-blue">
                                <span class="icon-i-intensive-care" data-toggle="tooltip" data-placement="top" title="" data-original-title="Web Design"></span>
                            </div>
                            <div class="med-iconBox-content">
                                <h4 class="med-iconBox-title hr-after">
                                    Lorem ipsum dolor sit amet
                                </h4>
                                <p>
                                    Praesent faucibus nisl sit amet nulla sollicitudin pretium a sed purus. Nullam bibendum porta magna.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- /.med box -->
                </div>
            </div>
        </div>
    </div>
</section>
<div class="benefits-quote bg-light">
    <div class="container-fluid tile-container">
        <div class="row">
            <div class="col-sm-12 col-md-6 bg-image tile-item" data-image-src="<?= URL; ?>public/images/section-bg-1.jpg">
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="quote">
                    <p>Lorem ipsum dolor sit amet</p>
                    <blockquote>Praesent faucibus nisl sit amet nulla sollicitudin pretium a sed purus</blockquote>
                    <img src="<?= URL; ?>public/images/user-3.jpg" alt="" class="img-responsive img-circle" />
                    <h2>Nombre</h2>
                </div>
            </div>
        </div>
    </div>
</div><!-- /.benefits -->

<section class="tips space-md">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 med-tab">
                <div class="tabbable-panel">
                    <div class="tabs-wrapper">
                        <ul class="nav nav-tabs no-border">
                            <li>
                                <a href="#tab_default_1" data-toggle="tab" class="no-border">
                                    Horas de Aperturas </a>
                            </li>
                            <li class="active">
                                <a href="#tab_default_2" data-toggle="tab" class="no-border">
                                    Videos </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" id="tab_default_1">
                                <div class="open-hours">
                                    <p>Lunes - Viernes <span>8:00 - 17:00</span>
                                    </p>
                                    <p>Sabados <span>9:30 - 12:00</span>
                                    </p>
                                </div>
                            </div>
                            <!-- /.tab pane -->
                            <div class="tab-pane active" id="tab_default_2">
                                <div class="responsive-video space-xs">
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/Bm8rz-llMhE" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                </div>
                                <p>
                                    Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit.
                                </p>
                                <p>
                                    <a class="btn btn-primary" href="#" target="_blank">
                                        Learn more...
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col 5 -->
            <div class="col-sm-4">
                <h4 class="widget-title">últimas actualizaciones</h4>
                <div class="sidebar card">
                    <ul class="list-unstyled info">
                        <li>
                            <figure>
                                <img src="<?= URL; ?>public/images/6.png" alt="">
                                <div class="description">
                                    <p>Loremp Ipsum</p>
                                    <a><span class="icon-heart"></span>3K Likes</a>
                                </div>
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <img src="<?= URL; ?>public/images/7.png" alt="">
                                <div class="description">
                                    <p>Loremp Ipsum</p>
                                    <a><span class="icon-heart"></span>25 Likes</a>
                                </div>
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <img src="<?= URL; ?>public/images/5.png" alt="">
                                <div class="description">
                                    <p>Loremp Ipsum</p>
                                    <a><span class="icon-heart"></span>134 Likes</a>
                                </div>
                            </figure>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /.tips and news -->