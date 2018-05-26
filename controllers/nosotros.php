<?php

class nosotros extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $metas = $this->helper->cargarMetaTags('nosotros');
        $this->view->description = utf8_encode($metas['description']);
        $this->view->keywords = utf8_encode($metas['keywords']);
        $this->view->datos_nosotros = $this->model->datos_nosotros();
        $this->view->title = TITLE . 'Nosotros';
        $this->view->render('header');
        $this->view->render('nosotros/index');
        $this->view->render('footer');
    }

}
