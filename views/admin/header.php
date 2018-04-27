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
                        <li class="active"><a href="<?= URL; ?>admin"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a></li>
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