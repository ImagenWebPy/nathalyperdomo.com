<?php

class Contacto extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->description = "";
        $this->view->keywords = "";
        $this->view->title = TITLE . 'Consultorio';
        $this->view->external_js = array("https://maps.googleapis.com/maps/api/js?key=AIzaSyBBIgMiEmsiFfpMGWYxPZbUhJdWB-2vk7c&callback=initMap");
        $this->view->render('header');
        $this->view->render('contacto/index');
        $this->view->render('footer');
    }

}
