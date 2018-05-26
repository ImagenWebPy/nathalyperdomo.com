<?php

class Blog extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function listado() {
        $url = $this->helper->getUrl();
        if (!empty($url[2])) {
            $pagina = $url[2];
        } else {
            $pagina = 1;
        }
        $this->view->listado = $this->model->listado($pagina);
        $metas = $this->helper->cargarMetaTags('blog');
        $this->view->description = utf8_encode($metas['description']);
        $this->view->keywords = utf8_encode($metas['keywords']);
        $this->view->title = TITLE . 'Blog';
        $this->view->render('header');
        $this->view->render('blog/index');
        $this->view->render('footer');
    }

    public function post() {
        $url = $this->helper->getUrl();
        $id = $url[2];
        $this->view->post = $this->model->post($id);

        $this->view->title = TITLE;
        $this->view->description = "";
        $this->view->keywords = "";
        $this->view->render('header');
        $this->view->render('blog/post');
        $this->view->render('footer');
    }

    public function busqueda() {
        $datos = array(
            'busqueda' => $this->helper->cleanInput($_POST['busqueda'])
        );
        $this->view->title = TITLE;
        $this->view->description = "";
        $this->view->keywords = "";
        $this->view->resultadosBusquedas = $this->model->resultadosBusquedas($datos);
        $this->view->render('header');
        $this->view->render('blog/busqueda');
        $this->view->render('footer');
    }

}
