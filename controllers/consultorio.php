<?php

class Consultorio extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->description = "";
        $this->view->keywords = "";
        $this->view->direccion = $this->helper->web_datos();
        $this->view->title = TITLE . 'Consultorio';
        $this->view->public_css = array('plugins/datepicker/css/datepicker3.css');
        $this->view->publicHeader_js = array('plugins/datepicker/js/bootstrap-datepicker.js');
        $this->view->render('header');
        $this->view->render('consultorio/index');
        $this->view->render('footer');
    }

    public function reserva() {
        $datos = array(
            'nombre' => $this->helper->cleanInput($_POST['nombre']),
            'email' => $this->helper->cleanInput($_POST['email']),
            'telefono' => $this->helper->cleanInput($_POST['telefono']),
            'fecha_reserva' => $this->helper->cleanInput($_POST['fecha_reserva']),
            'hora_reserva' => $this->helper->cleanInput($_POST['hora_reserva']),
            'comentario' => $this->helper->cleanInput($_POST['comentario'])
        );
        header('Content-type: application/json; charset=utf-8');
        $data = $this->model->reserva($datos);
        echo json_encode($data);
    }

}
