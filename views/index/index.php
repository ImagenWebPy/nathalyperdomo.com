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
                        <a data-toggle="tab" href="#book">Book a consultation</a>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#info">Call us today </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="book">
                        <form class="space-xs">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="row">
                                        <p class="col-md-6 col-sm-6"><input class="form-control" placeholder="First Name" type="text"></p>
                                        <p class="col-md-6 col-sm-6"><input class="form-control" placeholder="Last Name" type="text"></p>
                                    </div>
                                </div>
                                <!-- /.col 8 -->
                                <div class="col-sm-4">
                                    <input class="form-control sm-margin-bottom-10" placeholder="Enter your email id" required="" type="email" >
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
                                            <option value="0"  selected="selected">Select department</option>
                                            <option value="1">Primary care</option>
                                            <option value="2">Cardio</option>
                                            <option value="3">Rheumatologists</option>
                                            <option value="4">None</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- /. col 3 -->
                                <div class="col-sm-3">
                                    <select class="form-control sm-margin-bottom-10">
                                        <option value="0"  selected="selected">Select your location</option>
                                        <option value="1">
                                            City
                                        </option>
                                        <option value="2">
                                            Sarajevo
                                        </option>
                                        <option value="3">
                                            Tuzla
                                        </option>
                                        <option value="4">
                                            Gradacac
                                        </option>
                                    </select>
                                </div>
                                <!-- /.col 3 -->
                                <div class="col-sm-2">
                                    <a class="btn btn-default btn-block" href="#">Sumbit</a>
                                </div>
                                <!-- /.col 1 -->
                            </div>
                            <!-- /.row -->
                        </form>
                    </div>
                    <!-- /.tab pane -->
                    <div class="tab-pane fade" id="info">
                        <div class="spacer40"></div>
                        <div class="col-sm-4">
                            <div class="med-iconBox med-iconBox--left">
                                <div class="med-iconBox-icon icon-big color-blue">
                                    <span class="icon-i-dental" aria-hidden="true"></span>
                                </div>
                                <div class="med-iconBox-content">
                                    <h4 class="med-iconBox-title hr-after">
                                        0080 123 456874
                                    </h4>
                                    <p>
                                        For dental emergency please call
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- /.col 4 -->
                        <div class="col-sm-4">
                            <div class="med-iconBox med-iconBox--left">
                                <div class="med-iconBox-icon icon-big color-red">
                                    <span class="icon-i-emergency" aria-hidden="true"></span>
                                </div>
                                <div class="med-iconBox-content">
                                    <h4 class="med-iconBox-title hr-after">
                                        0080 123 456874
                                    </h4>
                                    <p>
                                        For global case plase call
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- /.col 4 -->
                        <div class="col-sm-4">
                            <div class="med-iconBox med-iconBox--left">
                                <div class="med-iconBox-icon icon-big color-green-light">
                                    <span class="icon-i-first-aid" aria-hidden="true"></span>
                                </div>
                                <div class="med-iconBox-content">
                                    <h4 class="med-iconBox-title hr-after">
                                        0080 123 4568724
                                    </h4>
                                    <p>
                                        For online assitance plase call
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
                    <h3 class="f-500">Our Full Service</h3>
                    <p>You can find general information about making appointments, as well as other helpful tips.</p>
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
                                        <h4>Dental department</h4>
                                        <p>You can find general information about making appointments, as well as other helpful tips..</p>
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
                                        <h4>Genetic Disorders</h4>
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
                                        <img src="<?= URL; ?>public/images/service-8.jpg" alt="" class="img-responsive">
                                    </figure>
                                    <div class="round-icon bg-red-light">
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
                                        <img src="<?= URL; ?>public/images/service-7.jpg" alt="" class="img-responsive">
                                    </figure>
                                    <div class="round-icon bg-green">
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
                    </div>
                </div>
            </div>
            <!--col 9-->
        </div>
    </div>
    <!-- /.container -->
</section>
<section class="padding-top-90">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h5>Your single service section</h5>
                <h1 class="uppercase hr-after styled">Be seen <br>Be Cered for <br>Be on your way</h1>
                <p class="lead">Create a website that you are <span class="f-green">gonna be proud</span> of. <br>Be it Business &amp; much more.Nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <p>
                    <a href="#" class="btn btn-primary btn-lg">Learn more</a>
                </p>
                <!-- FEATURE LIST -->
            </div>
            <!-- .col 7 -->
            <div class="col-sm-7 hidden-xs">
                <figure>
                    <img src="<?= URL; ?>public/images/browser-mockup.png" alt="" class="img-responsive">
                </figure>
            </div>
            <!-- .col 3 -->
        </div>
    </div>
</section>
<hr/>
<section class="space-md">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <p class="lead hr-after">Perfect for your business</p>
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
                                    Genetic Disorders
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
                                    Laboratory tests
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
                                    Nutrition disorders
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
                                    Genetics Disorders
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
                                    Consultation
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
                                    Intesive care
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
                    <p>After 8 Gold Medals</p>
                    <blockquote>You can't put a limit on anything. The more you dream, the farther you get.</blockquote>
                    <img src="<?= URL; ?>public/images/user-3.jpg" alt="" class="img-responsive img-circle" />
                    <h2>Dummy Name</h2>
                    <h6>CEO at Dummy</h6>
                </div>
            </div>
        </div>
    </div>
</div><!-- /.benefits -->

<section class="tips space-md">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h4 class="widget-title">Quick Faq section</h4>
                <div class="panel-group" id="accordion">
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                    Patient Online Services
                                    <span class="glyphicon glyphicon-plus"></span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div><!-- /.panel -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                    Patient Care and Health Information
                                    <span class="glyphicon glyphicon-plus"></span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <ul class="bullet-list list-unstyled">
                                    <li>Contact Office-Based Physicians</li>
                                    <li>Target Pharmacists and Pharmacies</li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- /.panel -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                    Opening Hours
                                    <span class="glyphicon glyphicon-minus"></span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse4" class="panel-collapse collapse">
                            <div class="panel-body">
                                Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div><!-- /.panel -->
                </div>
            </div>
            <div class="col-sm-4 med-tab">
                <div class="tabbable-panel">
                    <div class="tabs-wrapper">
                        <ul class="nav nav-tabs no-border">
                            <li>
                                <a href="#tab_default_1" data-toggle="tab" class="no-border">
                                    Open hours </a>
                            </li>
                            <li class="active">
                                <a href="#tab_default_2" data-toggle="tab" class="no-border">
                                    Video tab </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" id="tab_default_1">
                                <div class="open-hours">
                                    <p>Monday - Friday <span>8.00 - 17.00</span>
                                    </p>
                                    <p>Saturday <span>9.30 - 17.30</span>
                                    </p>
                                    <p>Sunday <span>9.30 - 15.00</span>
                                    </p>
                                </div>
                            </div>
                            <!-- /.tab pane -->
                            <div class="tab-pane active" id="tab_default_2">
                                <div class="responsive-video space-xs">
                                    <iframe src="<?= URL; ?>public/http://player.vimeo.com/video/77534721" width="500" height="281" style="border: none" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
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
                <h4 class="widget-title">Latest updates</h4>
                <div class="sidebar card">
                    <ul class="list-unstyled info">
                        <li>
                            <figure>
                                <img src="<?= URL; ?>public/images/6.png" alt="">
                                <div class="description">
                                    <p>Urna quam quisque suspendisse eros, mauris augue.</p>
                                    <a><span class="icon-heart"></span>3K Likes</a>
                                </div>
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <img src="<?= URL; ?>public/images/7.png" alt="">
                                <div class="description">
                                    <p>Urna quam quisque suspendisse eros, mauris augue.</p>
                                    <a><span class="icon-heart"></span>25 Likes</a>
                                </div>
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <img src="<?= URL; ?>public/images/5.png" alt="">
                                <div class="description">
                                    <p>Urna quam quisque suspendisse eros, mauris augue.</p>
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