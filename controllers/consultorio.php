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

}
