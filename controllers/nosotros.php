<?php

class nosotros extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->description = "";
        $this->view->keywords = "";
        $this->view->datos_nosotros = $this->model->datos_nosotros();
        $this->view->title = TITLE . 'Nosotros';
        $this->view->render('header');
        $this->view->render('nosotros/index');
        $this->view->render('footer');
    }

}
