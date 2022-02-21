<?php

class MainController extends Controller{

    public function __construct() {
        parent::__construct();
        $this->view = new View();
    }

    public function index(){
        $this->render( 'main/index' );
    }

    function render( $view ){
        $this->view->render( $view );
    }


}