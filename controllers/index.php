<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->description = "";
        $this->view->keywords = "";

        $this->view->index_caracteristicas = $this->helper->index_caracteristicas();
        $this->view->index_blog = $this->helper->index_blog();
        $this->view->index_frases = $this->helper->index_frases();
        $this->view->index_video = $this->helper->index_video();
        $this->view->index_nosotros = $this->helper->index_nosotros();
        $this->view->index_parallax = $this->helper->index_parallax();
        $this->view->index_servicios = $this->helper->index_servicios();
        $this->view->title = TITLE . 'Inicio';
        $this->view->render('header');
        $this->view->render('index/index');
        $this->view->render('footer');
    }

}
