<?php

class DataBase{

    private $server;
    private $db;
    private $user;
    private $pw;
    private $charset;

    public function __construct(){
        $this->server = constant('SERVER');
        $this->db = constant('DB');
        $this->user = constant('USER');
        $this->pw = constant('PASSWORD');
        $this->charset = constant('CHARSET');
    }

    function conection(){

        try{
            $conection = "mysql:host=" .$this->server . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $option = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];
            $pdo = new PDO( $conection, $this->user, $this->pw, $option );
            return $pdo;
        }catch( PDOException $e ){
            echo 'Error: '. $e->getMessage();
        }

    }

}

?>