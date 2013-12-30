<?php
    $usu=$_POST["txtUsu"];
    $pass=$_POST["txtPass"];
    require '../Modelo/usuarioM.php';
    $objDAO=new UsuarioM();
    $Data["cod_empleado"]=$usu;
    $Data["contrasena"]=$pass;
    $result=$objDAO->listar($Data);
    if(count($result)>0){
        iniciarSession($result);
        header("Location: ../inicio.php"); 
    }else{
        $e="1";
        header("Location: ../index.php?e=".$e);
    }
    function iniciarSession($result){
        require_once '../session.php';
        require_once '../Modelo/personalM.php';
        require_once '../bd/conexion.php';
        $sess=new session();
        $personal=new PersonalM();
        $idU=$result[0]->idUsuario;
        $W["cod_empleado"]=$result[0]->cod_empleado;
        $P=$personal->listar($W,null,1);
        $sess->activarSesion($idU);
        $sess->addSesion("NivelAcceso", $P[0]->cod_cargo);
        $sess->addSesion("idEmpleado", $P[0]->cod_empleado);
        $sess->addSesion("Empleado", $P[0]->nombre." ".$P[0]->apellido);
    }
?>