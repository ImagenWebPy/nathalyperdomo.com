<?php

class Admin extends Controller {

    function __construct() {
        parent::__construct();
        Auth::handleLogin();
    }

    public function index() {

        $this->view->title = TITLE . 'Inicio';
        $this->view->render('admin/header');
        $this->view->render('admin/index/index');
        $this->view->render('admin/footer');
    }

    public function turnos() {

        $this->view->title = TITLE . 'Turnos';

        $this->view->public_css = array("css/plugins/fullcalendar/fullcalendar.css", "css/plugins/chosen/bootstrap-chosen.css");
        $this->view->publicHeader_js = array("js/plugins/fullcalendar/moment.min.js", "js/plugins/fullcalendar/fullcalendar.min.js", "js/plugins/chosen/chosen.jquery.js");

        $this->view->render('admin/header');
        $this->view->render('admin/consultorio/turnos');
        $this->view->render('admin/footer');
    }

    public function agregarNuevoPaciente() {
        header('Content-type: application/json; charset=utf-8');
        $data = $this->model->agregarNuevoPaciente();
        echo json_encode($data);
    }

}
