<?php

class ErrorController extends Controller{
    public function __construct(){
        parent::__construct();
        $this->view = new View();
        $this->view->render( 'error/index' );
    }
}