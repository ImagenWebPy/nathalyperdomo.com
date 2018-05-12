<?php
$helper = new Helper();
$page = $helper->getPage();
$headerData = $helper->loadPageHeaderData($page[0]);
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="es"> <!--<![endif]-->
    <head>
        <!-- head -->
        <!-- meta -->
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title><?= $this->title; ?></title>
        <meta name="description" content="<?= $this->description; ?>" />
        <meta name="keywords" content="<?= $this->keywords; ?>" />
        <link rel="icon" type="image/png" href="<?= URL; ?>public/images/favicon.png" />
        <link rel='stylesheet' id='contact-form-7-css'  href='<?= URL; ?>public/css/cform.css' type='text/css' media='all' />
        <link rel='stylesheet' id='tp_twitter_plugin_css-css'  href='<?= URL; ?>public/css/tp_twitter_plugin.css' type='text/css' media='screen' />
        <link rel='stylesheet' id='rs-plugin-settings-css'  href='<?= URL; ?>public/rs-plugin/css/settings.css' type='text/css' media='all' />
        <link rel='stylesheet' id='select2-css'  href='<?= URL; ?>public/css/select.css' type='text/css' media='all' />
        <link rel='stylesheet' id='woocommerce-layout-css'  href='<?= URL; ?>public/css/woocommerce-layout.css' type='text/css' media='all' />
        <link rel='stylesheet' id='woocommerce-smallscreen-css'  href='<?= URL; ?>public/css/woocommerce-smallscreen.css' type='text/css' media='only screen and (max-width: 768px)' />
        <link rel='stylesheet' id='woocommerce-general-css'  href='<?= URL; ?>public/css/woocommerce.css' type='text/css' media='all' />
        <link rel='stylesheet' id='style-css'  href='<?= URL; ?>public/css/style.css' type='text/css' media='all' />
        <link rel='stylesheet' id='prettyPhoto-css'  href='<?= URL; ?>public/css/prettyPhoto.css' type='text/css' media='all' />
        <link rel='stylesheet' id='owl-carousel-css'  href='<?= URL; ?>public/js/owl-carousel/owl.carousel.css' type='text/css' media='all' />
        <link rel='stylesheet' id='owl-theme-css'  href='<?= URL; ?>public/js/owl-carousel/owl.theme.css' type='text/css' media='all' />
        <link rel='stylesheet' id='jplayer-css'  href='<?= URL; ?>public/css/blue.monday/jplayer.blue.monday.css' type='text/css' media='all' />
        <link rel='stylesheet' id='jquery-ui-css'  href='<?= URL; ?>public/css/ui/jquery.ui.all.css' type='text/css' media='all' />
        <link rel='stylesheet' id='responsive-css'  href='<?= URL; ?>public/css/responsive.css' type='text/css' media='all' />
        <link rel='stylesheet' id='images-green-css'  href='<?= URL; ?>public/css/skins/green/images.css' type='text/css' media='all' />
        <link rel='stylesheet' id='style-colors-php-css'  href='<?= URL; ?>public/css/style-colors.css' type='text/css' media='all' />
        <link rel='stylesheet' id='style-php-css'  href='<?= URL; ?>public/css/style-2.css' type='text/css' media='all' />
        <link rel='stylesheet' id='mfn-woo-css'  href='<?= URL; ?>public/css/woocommerce.css' type='text/css' media='all' />
        <link rel="stylesheet" href="<?= URL; ?>public/css/fonts/mfn-icons.css" media="all" />
        <link rel="stylesheet" href="<?= URL; ?>public/css/custom.css" media="all" />
        <link rel="stylesheet" href="<?= URL; ?>public/css/nathaly.css" media="all" />
        <link rel="stylesheet" href="<?= URL; ?>public/css/wfmi-style.css" media="all" />
        <link rel='stylesheet' id='Ubuntu-css'  href='http://fonts.googleapis.com/css?family=Ubuntu%3A100%2C300%2C400%2C400italic%2C700&amp;ver=4.2' type='text/css' media='all' />
        <?php
        #cargamos los css de las vistas
        if (isset($this->css)) {
            foreach ($this->css as $css) {
                echo '<link rel="stylesheet" href="' . URL . 'views/' . $css . '" type="text/css">';
            }
        }
        if (isset($this->public_css)) {
            foreach ($this->public_css as $public_css) {
                echo '<link rel="stylesheet" href="' . URL . 'public/' . $public_css . '" type="text/css">';
            }
        }
        ?>
        <script type='text/javascript' src='<?= URL; ?>public/js/jquery/jquery.js'></script>
        <?php
        if (isset($this->publicHeader_js)) {
            foreach ($this->publicHeader_js as $public_js) {
                echo '<script type="text/javascript" src="' . URL . 'public/' . $public_js . '"></script>';
            }
        }
        ?>

        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <!-- body -->
    <body class="<?= $headerData['body']; ?>">
        <!-- #Wrapper -->
        <div id="Wrapper">
            <!-- #Header -->
            <header id="Header">
                <!-- .header_placeholder 4sticky  -->
                <div class="header_placeholder">
                </div>
                <div id="Top_bar">
                    <div class="container">
                        <div class="column one">
                            <!-- .logo -->
                            <div class="logo">
                                <h1><a id="logo" href="index.html" title="Cake"><img class="scale-with-grid" src="<?= URL; ?>public/images/logo.png" alt="Cake"/></a></h1>
                            </div>
                            <!-- .menu_wrapper -->
                            <div class="menu_wrapper">
                                <!-- #searchform -->
                                <form method="get" id="searchform" action="#">
                                    <a class="icon_search icon" href="#"><i class="icon-search-line"></i></a>
                                    <a class="icon_close icon" href="#"><i class="icon-cancel"></i></a>
                                    <input type="text" class="field" name="s"  placeholder="Ingresa tu busqueda"/>
                                    <input type="submit" class="submit" value="" />
                                </form>

                                <!-- #menu -->
                                <nav id="menu" class="menu-main-menu-container">
                                    <ul id="menu-main-menu" class="menu">
                                        <li class="menu-item  current-menu-item page_item page-item-4311 current_page_item current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children"><a href="<?= URL; ?>"><span>Inicio</span></a>

                                        </li>
                                        <li class="menu-item  menu-item-has-children"><a href="<?= URL; ?>nosotros"><span>Nathaly</span></a>

                                        </li>
                                        <li class="menu-item  menu-item-has-children"><a href="<?= URL; ?>blog"><span>Blog</span></a>

                                        </li>
                                        <li class="menu-item  menu-item-has-children"><a href="<?= URL; ?>consultorio"><span>Consultorio</span></a>

                                        </li>
                                        <li class="menu-item  menu-item-has-children"><a href="<?= URL; ?>contacto"><span>Contacto</span></a>

                                        </li>
                                    </ul>
                                </nav>
                                <a class="responsive-menu-toggle" href="#"><i class='icon-menu'></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?= $headerData['header']; ?>
            </header>