<?php

class App{

    function __construct(){
        //Comprueba si existe parametros de entrada
        if( isset($_GET['url']) and !empty($_GET['url']) ){
            $url = explode('/', rtrim($_GET['url'], '/' ) );
            $controllerIn =  isset($url[0]) ? $url[0] : null;
            $methodIn = isset($url[1]) ? $url[1] : null;
            $fileController = './controllers/'.$controllerIn.'Controller.php';
        } else {
            //Si no tiene parametros, carga main index
            $controllerIn = 'main';
            $methodIn = 'index';
            $fileController = './controllers/mainController.php';
        }
        //Comprueba si existe el controlador
        if( file_exists( $fileController ) ){
            include_once( $fileController );
            $class = ucfirst( $controllerIn).'Controller';
            $controller = new $class;
            $controller->loadModel( $controllerIn );
            //Comprueba si existe el método
            if( method_exists( $controller, $methodIn ) ){

                $controller->{$methodIn}();
                /* $controller->render( $controllerIn . '/' . $methodIn ); */

            } else {
                App::cargar404();
            }
        } else{
            App::cargar404();
        }
    }

    private static function cargar404(){
        include_once('./controllers/errorController.php');
        $controller = new ErrorController();
    }

}
