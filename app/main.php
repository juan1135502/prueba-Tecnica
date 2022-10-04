<?php
require_once("Empleados.php");

//$objEmpleado = new Empleado();
//$insert = $objEmpleado -> insertarEmpleado("Jose","jose13@gmail.com","M",2,1,"descripcion prueba",1);

function validar(){
    $objEmpleado = new Empleado();
    if( !empty($_POST) ){
        if (isset($_POST['boletins']) && isset($_POST['profesions']) && isset($_POST['gerentes']) && isset($_POST['auxs'])){
            if (!is_null($_POST['nombres'])  && !is_null($_POST['correo'] ) && !is_null($_POST['gridRadios']) && !is_null($_POST['areas']) && !is_null($_POST['descripcions']) && !is_null($_POST['boletins']) && !is_null($_POST['profesions'])  && !is_null($_POST['gerentes'] ) && !is_null($_POST['auxs']) ) {

                $nombre = $_POST['nombres'];
                $correo =$_POST['correo'];
                $sexo =$_POST['gridRadios'];
                $areas =$_POST['areas'];
                $descripciones =$_POST['descripcions'];
                $boletin =$_POST['boletins'];
                $profesions =$_POST['profesions'];
                $gerentes =$_POST['gerentes'];
                $auxiliares =$_POST['auxs'];                
                //echo($nombre .'  ' . $correo .'  ' . $sexo .'  ' . $areas .'  ' . $descripciones .'  ' . $boletin .'  ' . $profesions .'  ' . $gerentes .'  ' .  $auxiliares );
                $insert = $objEmpleado -> insertarEmpleado($nombre ,$correo ,$sexo ,$areas ,$boletin,$descripciones,$profesions);
                $ultimo = intval($insert);
                $inserta2 =  $objEmpleado -> insertarRoleEmpl($ultimo ,$gerentes);
                $inserta3 =  $objEmpleado -> insertarRoleEmpl($ultimo ,$auxiliares);
                echo 'bien';
            }else{
            echo 'error campos obligatorios estan vacios';
            }
        }elseif(isset($_POST['nombres']) && isset($_POST['correo']) && isset($_POST['gridRadios']) && isset($_POST['areas']) && isset($_POST['descripcions'])){

            $boletin='0' ;
            $profesions =-1 ;
            $gerentes =-1 ;
            $auxiliares =-1 ;
            if (isset($_POST['boletins'])){
                $boletin =$_POST['boletins'];
            }
            if(isset($_POST['profesions'])){
                $profesions =$_POST['profesions'];
            }
            if(isset($_POST['gerentes'])){
                $gerentes =$_POST['gerentes'];
            }
            if(isset($_POST['auxs'])){
                $auxiliares =$_POST['auxs'];  
            }
            


            $nombre = $_POST['nombres'];
            $correo =$_POST['correo'];
            $sexo =$_POST['gridRadios'];
            $areas =$_POST['areas'];
            $descripciones =$_POST['descripcions']; 
            
            if ($profesions == -1 && $gerentes !=-1 && $auxiliares !=-1) {
                //echo($nombre .'  ' . $correo .'  ' . $sexo .'  ' . $areas .'  ' . $descripciones .'  ' . $boletin .'  ' . $gerentes .'  ' .  $auxiliares );
                $insert = $objEmpleado -> insertarEmpleado($nombre ,$correo ,$sexo ,$areas ,$boletin,$descripciones,$auxiliares);
                $ultimo = intval($insert);
                $inserta2 =  $objEmpleado -> insertarRoleEmpl($ultimo ,$gerentes);
                echo 'bien';
            }elseif ($profesions == -1 && $gerentes ==-1 && $auxiliares !=-1) {
                //echo($nombre .'  ' . $correo .'  ' . $sexo .'  ' . $areas .'  ' . $descripciones .'  ' . $boletin .'  ' .  $auxiliares );
                $insert = $objEmpleado -> insertarEmpleado($nombre ,$correo ,$sexo ,$areas ,$boletin,$descripciones,$auxiliares);
                echo 'bien';
            }elseif ($profesions == -1 && $gerentes ==-1 && $auxiliares ==-1) {
                echo($nombre .'  ' . $correo .'  ' . $sexo .'  ' . $areas .'  ' . $descripciones .'  ' . $boletin .'  ' );
            }elseif ($profesions == -1 && $gerentes !=-1 && $auxiliares ==-1) {
                //echo($nombre .'  ' . $correo .'  ' . $sexo .'  ' . $areas .'  ' . $descripciones .'  ' . $boletin .'  ' . $gerentes .'  '  );
                $insert = $objEmpleado -> insertarEmpleado($nombre ,$correo ,$sexo ,$areas ,$boletin,$descripciones,$gerentes);
                echo 'bien';
            }elseif ($profesions != -1 && $gerentes ==-1 && $auxiliares ==-1) {
                //echo($nombre .'  ' . $correo .'  ' . $sexo .'  ' . $areas .'  ' . $descripciones .'  ' . $boletin .'  ' . $profesions );
                $insert = $objEmpleado -> insertarEmpleado($nombre ,$correo ,$sexo ,$areas ,$boletin,$descripciones,$profesions);
                echo 'bien';
            }elseif ($profesions != -1 && $gerentes ==-1 && $auxiliares !=-1) {
                //echo($nombre .'  ' . $correo .'  ' . $sexo .'  ' . $areas .'  ' . $descripciones .'  ' . $boletin .'  ' . $profesions .'  '.  $auxiliares );
                $insert = $objEmpleado -> insertarEmpleado($nombre ,$correo ,$sexo ,$areas ,$boletin,$descripciones,$auxiliares);
                $ultimo = intval($insert);
                $inserta2 =  $objEmpleado -> insertarRoleEmpl($ultimo ,$profesions);
                echo 'bien';
            }elseif ($profesions != -1 && $gerentes !=-1 && $auxiliares ==-1) {
                //echo($nombre .'  ' . $correo .'  ' . $sexo .'  ' . $areas .'  ' . $descripciones .'  ' . $boletin .'  ' . $profesions .'  ' . $gerentes .'  '  );
                $insert = $objEmpleado -> insertarEmpleado($nombre ,$correo ,$sexo ,$areas ,$boletin,$descripciones,$profesions);
                $ultimo = intval($insert);
                $inserta2 =  $objEmpleado -> insertarRoleEmpl($ultimo ,$gerentes);
                echo 'bien';
            }
            
            
        }
        
    }else{
        $empleados = $objEmpleado->getEmpledos();
        
        echo ($empleados);
        
    }

    

        


   


    
}

validar();




?>