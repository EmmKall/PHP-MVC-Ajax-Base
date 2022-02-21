<?php

require ('./models/productoModel.php');

class ProductoController extends Controller{

    public function __construct() {
        parent::__construct();
        $this->view = new View();
    }

    public function index(){
        $this->model = new ProductoModel();
        $this->view->data = $this->model->getAll();
        $this->render( 'producto/index' );
    }

    public function accion(){
        if( $_POST ){
            $this->model = new ProductoModel();
            if( isset( $_POST['id']) ){
                //Función Editar
                $nombre = $_POST['nombre'];
                $precio = $_POST['precio'];
                $id = $_POST['id'];
                $resultado = $this->model->update( $id, $nombre, $precio );
                if( $resultado ){
                    $respuesta = [
                        'icon' => 'success',
                        'title' => 'Actualizado',
                        'text' => 'Producto Atualizado'
                    ];
                } else {
                    $respuesta = [
                        'icon' => 'success',
                        'title' => 'No Actualizado',
                        'text' => 'Producto No Atualizado'
                    ];
                }
                die( json_encode( $respuesta ) );
            }
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $resultado = $this->model->add( $nombre, $precio );
            if( $resultado ){
                $respuesta = [
                    'icon' => 'success',
                    'title' => 'Insertado',
                    'text' => 'Producto Insertado'
                ];
            } else {
                $respuesta = [
                    'icon' => 'error',
                    'title' => 'No Insertado',
                    'text' => 'Producto No Insertado'
                ];
            }
            die( json_encode( $respuesta ) );
        }
    }

    public function findRegistro(){
        if( $_POST ){
            $this->model = new ProductoModel();
            $id = intVal( $_POST['id'] );
            $registro = $this->model->find( $id );
            die( json_encode( $registro ) );
        }
    }

    public function deleteRegistro(){
        if( $_POST ){
            $this->model = new ProductoModel();
            $id = intVal( $_POST['id'] );
            $resultado = $this->model->delete( $id );
            if( $resultado ){
                $respuesta = [
                    'icon' => 'success',
                    'title' => 'Eliminado',
                    'text' => 'Producto Eliminado'
                ];
            } else {
                $respuesta = [
                    'icon' => 'error',
                    'title' => 'No Eliminado',
                    'text' => 'Producto No Eliminado'
                ];
            }
            die( json_encode( $respuesta ) );
        }
    }

    function render( $view ){
        $this->view->render( $view );
    }

}

