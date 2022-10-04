<?php

Class Conexion {
    
    private $hostname = "localhost";
    private $database = "prueba_tecnica_dev";
    private $username = "root";
    private $password = "";
    private $charset = "latin1";
    private $conect;
    public function __construct(){
        $con = "mysql:host=". $this->hostname.";dbname=".$this->database.";charset=".$this->charset;
            
        try {
            $this->conect = new PDO($con,$this->username,$this->password);
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch (Exception $e) {
            $this->conect = 'Error de conexion';
            echo 'Error Conexion: '. $e->getMessage();
            exit;
        }
        
    }

    public function conectar(){
        return $this->conect;
    }

}



?>