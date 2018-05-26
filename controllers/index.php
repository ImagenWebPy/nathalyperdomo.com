<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $metas = $this->helper->cargarMetaTags('inicio');
        $this->view->description = utf8_encode($metas['description']);
        $this->view->keywords = utf8_encode($metas['keywords']);

        $this->view->index_caracteristicas = $this->helper->index_caracteristicas();
        $this->view->index_blog = $this->helper->index_blog();
        $this->view->index_frases = $this->helper->index_frases();
        $this->view->index_video = $this->helper->index_video();
        $this->view->index_nosotros = $this->helper->index_nosotros();
        $this->view->index_parallax = $this->helper->index_parallax();
        $this->view->index_servicios = $this->helper->index_servicios();

        $this->view->public_css = array('plugins/modal-bootstrap/css/bootstrap.min.css');
        $this->view->public_js = array('plugins/modal-bootstrap/js/bootstrap.min.js');
        $this->view->title = TITLE . 'Inicio';
        $this->view->render('header');
        $this->view->render('index/index');
        $this->view->render('footer');
    }

}
