<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="ImagenWeb">
        <title><?= $this->title; ?></title>
        <link rel="icon" href="<?= URL; ?>public/images/favicon.ico"> 
        <!-- Bootstrap core CSS -->
        <link href="<?= URL; ?>public/css/bootstrap.min.css" rel="stylesheet">
        <!-- WebFonts core CSS -->
        <link href="<?= URL; ?>public/css/fonts.css" rel="stylesheet">
        <link href="<?= URL; ?>public/css/animsition.css" rel="stylesheet">
        <link href="<?= URL; ?>public/css/datepicker.css" rel="stylesheet">
        <!-- Simple Line Icons -->
        <link href="<?= URL; ?>public/MegaNavbar/assets/plugins/simple-line-icons/simple-line-icons.css" rel="stylesheet">
        <!-- OWL -->
        <link href="<?= URL; ?>public/css/owl.carousel.css" rel="stylesheet">
        <!-- REVOLUTION BANNER CSS SETTINGS -->
        <link rel="stylesheet" type="text/css" href="<?= URL; ?>public/rs-plugin/css/settings.css" media="screen" />
        <!-- MegaNavbar-->
        <link rel="stylesheet" type="text/css" href="<?= URL; ?>public/MegaNavbar/assets/css/MegaNavbar.min.css">
        <link rel="stylesheet" type="text/css" href="<?= URL; ?>public/MegaNavbar/assets/css/skins/navbar-default.css">
        <link rel="stylesheet" type="text/css" href="<?= URL; ?>public/MegaNavbar/assets/css/animation/animation.css">
        <!-- Custom styles for this template -->
        <link href="<?= URL; ?>public/css/style.css" rel="stylesheet">
        <link href="<?= URL; ?>public/css/custom.css" rel="stylesheet">
        <!-- Goole fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="<?= URL; ?>public/https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="<?= URL; ?>public/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="animsition">
            <div class="wrapper">
                <header id="header">
                    <!-- Top Header Section Start -->
                    <div class="top-bar bg-light hdden-xs bgColor">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6 list-inline list-unstyled no-margin hidden-xs">
                                    <p class="no-margin text-white">¿Necesitas más información? Escribenos a <a href="mailto:consulta@nathalyperdomo.com">consulta@nathalyperdomo.com</a></p>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.top bar -->
                    <!-- begin Logo and info -->
                    <div class="container middle-bar hidden-xs">
                        <div class="row">
                            <a href="<?= URL; ?>" class="logo col-sm-3"> 
                                <img src="<?= URL; ?>public/images/logo.png" class="img-responsive" alt="" />
                            </a>
                            <div class="col-sm-8 col-sm-offset-1 contact-info">
                                <p class="mobileHeaderFA"><i class="fa fa-mobile" aria-hidden="true"></i>  <span>+114 554 888</span></p>
                            </div>
                        </div>
                    </div>
                    <!-- /.middle -->
                    <!-- begin MegaNavbar-->
                    <div class="nav-wrap-holder">
                        <div class="container" id="nav_wrapper">
                            <nav class="navbar navbar-static-top navbar-default no-border-radius xs-height100" id="main_navbar" role="navigation">
                                <div class="container-fluid">
                                    <!-- Brand and toggle get grouped for better mobile display -->
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#MegaNavbarID">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                                        </button>
                                        <a href="index.html" class="navbar-brand logo col-sm-3 visible-xs-block"> 
                                            <img src="<?= URL; ?>public/images/logo.png" class="img-responsive" alt="" />
                                        </a>
                                    </div>
                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse" id="MegaNavbarID">
                                        <!-- regular link -->
                                        <ul class="nav navbar-nav navbar-left">
                                            <li><a href="<?= URL; ?>"><i class="fa fa-home"></i> <span class="hidden-sm">Inicio</span></a></li>
                                            <li class="divider"></li>
                                            <li class="dropdown-full no-shadow no-border-radius">
                                                <a data-toggle="dropdown" href="javascript:void(0);" class="dropdown-toggle"><span class="icon-i-family-practice" aria-hidden="true"></span>&nbsp;<span class="hidden-sm hidden-md reverse">Páginas</span><span class="caret"></span></a>
                                                <div class="dropdown-menu row drop-image">
                                                    <ul class="row">
                                                        <li class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                            <ul>
                                                                <li class="dropdown-header">Service pages</li>
                                                                <li><a href="service-details.html">Service details</a>
                                                                </li>
                                                                <li><a href="service.html">Service list</a>
                                                                </li>
                                                                <li class="divider"></li>
                                                                <li class="dropdown-header">Extra pages</li>
                                                                <li><a href="timetable.html">jQuery timetable page</a>
                                                                </li>
                                                                <li><a href="pricing.html">Pricing</a>
                                                                </li>
                                                                <li><a href="contact.html">Contact</a>
                                                                </li>
                                                                <li><a href="faq.html">FAQ page</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                            <ul>
                                                                <li class="dropdown-header">Template features</li>
                                                                <li><a href="icons.html">Medical Icons</a>
                                                                </li>
                                                                <li><a href="features.html">Elements</a>
                                                                </li>
                                                                <li class="divider"></li>
                                                                <li class="dropdown-header">Blog pages</li>
                                                                <li><a href="blog-post.html">Blog post</a>
                                                                </li>
                                                                <li><a href="blog.html">Blog</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                            <ul>
                                                                <li class="dropdown-header">Info pages</li>
                                                                <li><a href="about_us.html">About us page</a>
                                                                </li>
                                                                <li><a href="about_2.html">Team page</a>
                                                                </li>
                                                                <li class="divider"></li>
                                                                <li class="dropdown-header">Newsletter</li>
                                                                <li>
                                                                    <form class="form" role="form">
                                                                        <div class="form-group">
                                                                            <label class="sr-only" for="email">Email address</label>
                                                                            <input type="email" class="form-control" id="e-mail" placeholder="Enter email">
                                                                        </div>
                                                                        <button type="submit" class="btn btn-primary btn-block btn-fill">Sign in</button>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="col-xs-6 col-sm-3 col-md-3 col-lg-3 hidden-xs">
                                                            <figure>
                                                                <img src="<?= URL; ?>public/images/doc-3.jpg" class="img-responsive menu-img" alt="">
                                                            </figure>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="divider"></li>
                                            <!-- dropdown active -->
                                            <li class="dropdown-full no-border-radius no-shadow">
                                                <a data-toggle="dropdown" href="javascript:void(0);"><i class="fa fa-calendar"></i>&nbsp;<span class="hidden-sm hidden-md reverse">Consultorio</span></a>
                                            </li>
                                            <!-- divider -->
                                            <li class="divider"></li>
                                        </ul>
                                        <ul class="nav navbar-nav navbar-right">
                                            <li>
                                                <!-- search form -->
                                                <form class="navbar-form-expanded navbar-form navbar-left visible-lg-block visible-md-block visible-xs-block" role="search">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" data-width="80px" data-width-expanded="170px" placeholder="Buscar" name="query">
                                                        <span class="input-group-btn"><button class="btn btn-default" type="submit"><i class="fa fa-search"></i>&nbsp;</button></span>
                                                    </div>
                                                </form>
                                            </li>
                                            <li class="dropdown-grid visible-sm-block">
                                                <a data-toggle="dropdown" href="javascript:void(0);" class="dropdown-toggle"><i class="fa fa-search"></i>&nbsp;</a>
                                                <div class="dropdown-grid-wrapper" role="menu">
                                                    <ul class="dropdown-menu col-sm-6">
                                                        <li>
                                                            <form class="no-margin">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control">
                                                                    <span class="input-group-btn"><button class="btn btn-default" type="submit">&nbsp;<i class="fa fa-search"></i></button></span>
                                                                </div>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="divider"></li>
                                            <li class="dropdown-grid">
                                                <a data-toggle="dropdown" href="javascript:void(0);" class="dropdown-toggle"><i class="fa fa-youtube-play"></i>&nbsp;<span class="hidden-sm hidden-md reverse">Media</span><span class="caret"></span></a>
                                                <div class="dropdown-grid-wrapper" role="menu">
                                                    <ul class="dropdown-menu no-border-radius no-shadow col-xs-12 col-sm-9 col-md-8 col-lg-7">
                                                        <li>
                                                            <div id="carousel-eg" class="carousel slide" data-ride="carousel">
                                                                <div class="row">
                                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 divided">
                                                                        <ol class="carousel-indicators navbar-carousel-indicators h-divided">
                                                                            <li data-target="#carousel-eg" data-slide-to="0" class="active"><a href="javascript:void(0);" class="">Vimeo<span class="hidden-sm hidden-xs desc">embed your vimeo videos</span></a>
                                                                            </li>
                                                                            <li data-target="#carousel-eg" data-slide-to="1" class=""><a href="javascript:void(0);" class="">Youtube<span class="hidden-sm hidden-xs desc">any youtube video</span></a>
                                                                            </li>
                                                                            <li data-target="#carousel-eg" data-slide-to="2" class=""><a href="javascript:void(0);" class="">Image<span class="hidden-sm hidden-xs desc">image showcase</span></a>
                                                                            </li>
                                                                            <li data-target="#carousel-eg" data-slide-to="3" class=""><a href="javascript:void(0);" class="">Image<span class="hidden-sm hidden-xs desc">Short description</span></a>
                                                                            </li>
                                                                        </ol>
                                                                    </div>
                                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                                                        <div class="carousel-inner">
                                                                            <div class="item active">
                                                                                <div class="responsive-video">
                                                                                    <iframe src="<?= URL; ?>public/http://player.vimeo.com/video/77534721" width="500" height="281" style="border: none" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                                                                </div>
                                                                            </div>
                                                                            <div class="item">
                                                                                <div class="responsive-video">
                                                                                    <iframe src="<?= URL; ?>public/http://player.vimeo.com/video/77534721" width="500" height="281" style="border: none" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                                                                </div>
                                                                            </div>
                                                                            <div class="item">
                                                                                <div class="embed-responsive embed-responsive-16by9">
                                                                                    <img class="embed-responsive-item" src="<?= URL; ?>public/images/service-13.jpg" alt="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="item">
                                                                                <div class="embed-responsive embed-responsive-16by9">
                                                                                    <img class="embed-responsive-item" src="<?= URL; ?>public/images/service-9.jpg" alt="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="divider"></li>
                                            <!-- dropdown grid -->
                                            <li class="dropdown-full">
                                                <a data-toggle="dropdown" href="javascript:void(0);" class="dropdown-toggle"><i class="fa fa-envelope"></i>&nbsp;<span class="hidden-sm hidden-md hidden-lg reverse">Account</span><span class="caret"></span></a>
                                                <ul class="dropdown-menu no-shadow no-border-radius space-xs">
                                                    <li class="col-sm-4">
                                                        <address>
                                                            <br>
                                                            <strong>Brand, Inc.</strong><br>
                                                            123 Folsom Ave, Suite 600<br>
                                                            San Francisco, CA 94107<br>
                                                            <abbr title="Phone">Phone:</abbr> (123) 456-7890<br>
                                                            <abbr title="Mobile Phone">Mobile:</abbr> (098) 765-4321
                                                        </address>
                                                        <address>
                                                            <strong>Full Name</strong><br>
                                                            <a href="mailto:#">first.last@example.com</a>
                                                        </address>
                                                        <div class="open-hours">
                                                            <p>Monday - Friday <span>8.00 - 17.00</span>
                                                            </p>
                                                            <p>Saturday <span>9.30 - 17.30</span>
                                                            </p>
                                                            <p>Sunday <span>9.30 - 15.00</span>
                                                            </p>
                                                        </div>
                                                    </li>
                                                    <li class="col-sm-7 col-sm-offset-1">
                                                        <div id="message"></div>
                                                        <form method="post" action="http://codenpixel.com/demo/medicina/contact.php" name="contactform" id="contactform">
                                                            <fieldset>
                                                                <input class="form-control" name="name" type="text" id="name" size="30" value="" placeholder="Name" />
                                                                <br />
                                                                <input class="form-control" name="email" type="text" id="email" size="30" value="" placeholder="E-mail" />
                                                                <br />
                                                                <input class="form-control" name="phone" type="text" id="phone" size="30" value="" placeholder="Phone" />
                                                                <br />
                                                                <select class="form-control" name="subject" id="subject">
                                                                    <option value="0" selected="selected">Select your reason</option>
                                                                    <option value="1">Appointment</option>
                                                                    <option value="2">Support</option>
                                                                    <option value="3">Emergency</option>
                                                                </select>
                                                                <br />
                                                                <textarea class="form-control" name="comments" cols="40" rows="3" id="comments" style="width: 100%;" placeholder="Your comments"></textarea>
                                                                <p><span class="required">*</span> Are you human?</p>
                                                                <label for="verify" accesskey="V">&nbsp;&nbsp;&nbsp;3 + 1 =</label>
                                                                <input name="verify" type="text" id="verify" size="4" value="" style="width: 30px; border:1px solid #eee;" />
                                                                <br />
                                                                <br />
                                                                <input type="submit" class="btn btn-primary btn-fill" id="submit" value="Submit" />
                                                            </fieldset>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </li>
                                            <div class="addspace" style="height:60px;"></div>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <!-- /.div nav wrap holder -->
                </header>
                <!-- end MegaNavbar-->