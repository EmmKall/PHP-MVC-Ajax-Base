<?php

class Controller{
    function __construct(){}

    function loadModel( $model ){
        $url = './models/' . '.php';
        if( file_exists( $url ) ){
            require $url;
            $nameModel = ucfirst( $model ) . 'Model';
            $this->model = new $nameModel();
        }
    }
}

?>