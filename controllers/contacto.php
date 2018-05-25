<?php

class Contacto extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->description = "";
        $this->view->keywords = "";
        $this->view->datosMapa = $this->model->datosMapa();
        $this->view->title = TITLE . 'Consultorio';
        $this->view->external_js = array("https://maps.googleapis.com/maps/api/js?key=AIzaSyBBIgMiEmsiFfpMGWYxPZbUhJdWB-2vk7c&callback=initMap");
        $this->view->render('header');
        $this->view->render('contacto/index');
        $this->view->render('footer');
    }

    public function frmContacto() {
        $datos = array(
            'nombre' => $this->helper->cleanInput($_POST['nombre']),
            'email' => $this->helper->cleanInput($_POST['email']),
            'asunto' => $this->helper->cleanInput($_POST['asunto']),
            'mensaje' => $this->helper->cleanInput($_POST['mensaje'])
        );
        header('Content-type: application/json; charset=utf-8');
        $data = $this->model->frmContacto($datos);
        echo json_encode($data);
    }

}
