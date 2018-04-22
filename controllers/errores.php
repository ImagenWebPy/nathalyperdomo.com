<?php

class Errores extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->description = "";
        $this->view->keywords = "";
        $this->view->title = TITLE . '404 - Opps, la pagina solicitada no existe.';
        $this->view->render('error/inc/header');
        $this->view->render('error/index');
        $this->view->render('error/inc/footer');
    }

}
