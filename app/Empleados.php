<?php
require_once("autoload.php");

 class Empleado extends Conexion{
     private $nombre;
     private $correo; 
     private $sexo;
     private $aria;
     private $boletin;
     private $descripcion;
     private $Idempleado;
     private $Idrole;
     public function __construct(){
         $this->conexion =new Conexion();
         $this->conexion= $this->conexion->conectar();
         
     }

     public function insertarEmpleado(string $name, string $email, string $sex, int $area, int $bolettin, string $desc, int $idroles ){
         $this->nombre = $name;
         $this->correo=$email;
         $this->sexo= $sex;
         $this->aria = $area;
         $this->boletin = $bolettin;
         $this->descripcion = $desc;
         $this->Idrole = $idroles;

         $sql =" INSERT INTO empleado(nombre ,email , sexo ,area_id,boletin, descripcion)  VALUES(?,?,?,?,?,?)";
         $insert = $this->conexion->prepare($sql);
         $arrData = array($this->nombre, $this->correo, $this->sexo, $this->aria, $this->boletin ,$this->descripcion);
        $resInsert = $insert->execute($arrData);
        $idinsert = $this->conexion->lastInsertId();

        if ( is_null($idinsert)== false) {
            $this->insertarRoleEmpl( $idinsert,  $this->Idrole );
            return $idinsert;
        }else{
            echo'lo entrego vacio o null fallo';
        }

     }

     public function insertarRoleEmpl(int $empleadoId, int $roleId ){
        $this->Idempleado = $empleadoId;
        $this->Idrole=$roleId;
        //echo('empleado: '.$this->Idempleado.'  rol  '. $this->Idrole );

        $sql =" INSERT INTO empleado_rol(empleado_id, rol_id)  VALUES(?,?)";
         $insert = $this->conexion->prepare($sql);
         $arrData = array($this->Idempleado, $this->Idrole);
        $resInsert = $insert->execute($arrData);
     }

     public function getEmpledos(){
         $sql = "SELECT * FROM empleado";
         $execute = $this->conexion->query($sql);
         $request = $execute->fetchall(PDO::FETCH_ASSOC);
         return json_encode($request);

        
     }
}



?>