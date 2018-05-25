<?php
$helper = new Helper();
$pagina = (!empty($helper->getPage()[1])) ? $helper->getPage()[1] : '';
$paginaActual = $helper->getActivePageAdmin($pagina);
$rol = $_SESSION['usuarioLogueado']['rol'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= $this->title; ?></title>
        <link href="<?= URL; ?>public/admin/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= URL; ?>public/admin/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?= URL; ?>public/admin/css/animate.css" rel="stylesheet">
        <link href="<?= URL; ?>public/admin/css/style.css" rel="stylesheet">
        <link href="<?= URL; ?>public/admin/css/custom.css" rel="stylesheet">
        <?php
        #cargamos los css de las vistas
        if (isset($this->css)) {
            foreach ($this->css as $css) {
                echo '<link rel="stylesheet" href="' . URL . 'views/' . $css . '" type="text/css">';
            }
        }
        if (isset($this->public_css)) {
            foreach ($this->public_css as $public_css) {
                echo '<link rel="stylesheet" href="' . URL . 'public/admin/' . $public_css . '" type="text/css">';
            }
        }
        ?>
        <script src="<?= URL; ?>public/admin/js/jquery-3.1.1.min.js"></script>
        <?php
        if (isset($this->publicHeader_js)) {
            foreach ($this->publicHeader_js as $public_js) {
                echo '<script type="text/javascript" src="' . URL . 'public/admin/' . $public_js . '"></script>';
            }
        }
        ?>
    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav metismenu" id="side-menu">
                        <li class="nav-header">
                            <div class="dropdown profile-element"> <span>
                                    <?php if (empty($_SESSION['usuarioLogueado']['img'])): ?>
                                        <img alt="image" class="img-circle img-responsive" src="<?= URL; ?>public/admin/img/profile/profile.png" style="width: 40px;" />
                                    <?php else: ?>
                                        <img alt="image" class="img-circle img-responsive" src="<?= URL; ?>public/admin/img/profile/<?= $_SESSION['usuarioLogueado']['img']; ?>" style="width: 40px;" />
                                    <?php endif; ?>
                                </span>
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?= $_SESSION['usuarioLogueado']['nombre']; ?></strong>
                                        </span> <span class="text-muted text-xs block"><?= $_SESSION['usuarioLogueado']['rol']; ?> <b class="caret"></b></span> </span> </a>
                                <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                    <li><a href="#">Mis Datos</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?= URL; ?>login/salir">Salir</a></li>
                                </ul>
                            </div>
                            <div class="logo-element">
                                IN+
                            </div>
                        </li>
                        <li <?= $paginaActual['paginas']['dashboard']; ?>><a href="<?= URL; ?>admin"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a></li>
                        <?php if (($rol == 'Administrador') || ($rol == 'Editor')): ?>
                            <li <?= $paginaActual['paginas']['inicio']; ?>><a href="<?= URL; ?>admin/inicio"><i class="fa fa-home"></i> <span class="nav-label">Inicio</span></a></li>
                            <li <?= $paginaActual['paginas']['nathaly']; ?>><a href="<?= URL; ?>admin/nathaly"><i class="fa fa-leaf"></i> <span class="nav-label">Nathaly</span></a></li>
                        <?php endif; ?>
                        <?php if (($rol == 'Administrador') || ($rol == 'Editor') || ($rol == 'Consultorio')): ?>
                            <li <?= $paginaActual['paginas']['consultorio']['consultorio']; ?>>
                                <a href="#"><i class="fa fa-user-md"></i> <span class="nav-label">Consultorio</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse" style="height: 0px;">
                                    <li <?= $paginaActual['paginas']['consultorio']['turnos']; ?>><a href="<?= URL; ?>admin/turnos">Turnos</a></li>
                                    <li <?= $paginaActual['paginas']['consultorio']['pacientes']; ?>><a href="<?= URL; ?>admin/pacientes">Pacientes</a></li>
                                    <li <?= $paginaActual['paginas']['consultorio']['ciudades']; ?>><a href="<?= URL; ?>admin/ciudades">Ciudades</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>
                        <?php if (($rol == 'Administrador') || ($rol == 'Editor')): ?>
                            <li <?= $paginaActual['paginas']['blog']; ?>><a href="<?= URL; ?>admin/blog"><i class="fa fa-pencil-square-o"></i> <span class="nav-label">Blog</span></a></li>
                            <li <?= $paginaActual['paginas']['contacto']; ?>><a href="<?= URL; ?>admin/contacto"><i class="fa fa-envelope-o"></i> <span class="nav-label">Contacto</span></a></li>
                            <li <?= $paginaActual['paginas']['redes']; ?>><a href="<?= URL; ?>admin/redes"><i class="fa fa-share-square-o"></i> <span class="nav-label">Redes</span></a></li>
                            <li <?= $paginaActual['paginas']['logo']; ?>><a href="<?= URL; ?>admin/logo"><i class="fa fa-arrows-alt"></i> <span class="nav-label">Logos</span></a></li>
                            <li <?= $paginaActual['paginas']['direccion']; ?>><a href="<?= URL; ?>admin/direccion"><i class="fa fa-map-marker"></i> <span class="nav-label">Direcciones</span></a></li>
                        <?php endif; ?>
                        <?php if ($rol == 'Administrador'): ?>
                            <li <?= $paginaActual['paginas']['usuarios']; ?>>
                                <a href="<?= URL; ?>admin/usuarios"><i class="fa fa-users"></i> <span class="nav-label">Usuarios</span></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </nav>
            <div id="page-wrapper" class="gray-bg dashbard-1">
                <div class="row border-bottom">
                    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                        <div class="navbar-header">
                            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        </div>
                        <ul class="nav navbar-top-links navbar-right">
                            <li>
                                <a href="<?= URL; ?>login/salir">
                                    <i class="fa fa-sign-out"></i> Salir
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-lg-12">