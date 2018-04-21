<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
        //Auth::handleLogin();
    }

    public function index() {

        $this->view->title = TITLE . 'Inicio';
        $this->view->render('header');
        $this->view->render('index/index');
        $this->view->render('footer');
    }

}
