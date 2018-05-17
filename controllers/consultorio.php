<?php

class Consultorio extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->description = "";
        $this->view->keywords = "";
        $this->view->title = TITLE . 'Consultorio';
        $this->view->public_css = array('plugins/datepicker/css/bootstrap-datepicker3.min.css');
        $this->view->publicHeader_js = array('plugins/datepicker/js/bootstrap-datepicker.min.js');
        $this->view->render('header');
        $this->view->render('consultorio/index');
        $this->view->render('footer');
    }

}
