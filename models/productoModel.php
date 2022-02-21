<?php

class ProductoModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function getAll(){
        $sql = " SELECT id, nombre, precio FROM productos ORDER BY nombre, precio ; ";
        try{
            $sql = $this->db->conection()->prepare( $sql );
            $sql->execute();
            $datos = [];
            foreach ($sql->fetchAll() as $row => $dato){
                $datos[] = new ProductoData( $dato['id'], $dato['nombre'], $dato['precio'] );
            }
            return $datos;
        } catch( PDOException $e ){
            return 'Error: ' . $e->getMessage();
        }
    }

    public function find( $id ){
        $sql = " SELECT nombre, precio FROM productos WHERE id = :id ; ";
        try{
            $sql = $this->db->conection()->prepare( $sql );
            $sql->bindValue( 'id', $id, PDO::PARAM_INT );
            $sql->execute();
            $resultado = $sql->fetch();
            if( $sql->rowCount() > 0 ){
                $producto = new ProductoData( $id, $resultado['nombre'], $resultado['precio'] );
                return $producto;
            }else{
                return false;
            }
        } catch( PDOException $e ){
            return 'Error: ' . $e->getMessage();
        }
    }

    public function add( $nombre, $precio ){
        $sql = " INSERT INTO productos (nombre, precio) VALUES ( :nombre, :precio) ;  ";
        try{
            $sql = $this->db->conection()->prepare( $sql );
            $sql->bindParam( ':nombre', $nombre, PDO::PARAM_STR, 50);
            $sql->bindParam( ':precio', $precio, PDO::PARAM_STR );
            $sql->execute();
            if( $sql->rowCount() > 0){
                //$id = $this->db->conection()->lastInsertId();
                return true;
            } else {
                return false;
            }
        } catch( PDOException $e ){
            return 'Error : ' . $e->getMessage();
        }
    }

    public function update( $id, $nombre, $precio){
        $sql = " UPDATE productos SET nombre = :nombre, precio = :precio WHERE id = :id ; ";
        try{
            $sql = $this->db->conection()->prepare( $sql );
            $sql->bindValue( ':nombre', $nombre, PDO::PARAM_STR );
            $sql->bindValue( ':precio', $precio, PDO::PARAM_STR );
            $sql->bindParam( ':id', $id, PDO::PARAM_INT );
            $sql->execute();
            if( $sql->rowCount() > 0 ){
                return true;
            } else {
                return false;
            }
        } catch( PDOException $e ){
            return 'Error: ' . $e->getMessage();
        }
    }

    public function delete( $id ){
        $sql = " DELETE FROM productos WHERE id = :id ; ";
        try{
            $sql = $this->db->conection()->prepare( $sql );
            $sql->bindParam( 'id', $id );
            $sql->execute();
            if( $sql->rowCount() > 0 ){
                return true;
            } else {
                return false;
            }
        } catch ( PDOException $e ){
            return 'Error: ' . $e->getMessage();
        }
    }


}

class ProductoData{
    public $id;
    public $nombre;
    public $precio;

    public function __construct( $id, $nombre, $precio ) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
    }
}

?>