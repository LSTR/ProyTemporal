<?php
    session_start();
    $usu=$_POST["txtUsu"];
    $pass=$_POST["txtPass"];
    require '../Modelo/usuarioM.php';
    $objDAO=new UsuarioM();
    $Data["cod_empleado"]=$usu;
    $Data["contrasena"]=$pass;
    $result=$objDAO->listar($Data);
    if(isset($_SESSION["intentos"])&&$_SESSION["intentos"]==3){
        $_SESSION["intentos"]-=1;
        if($_POST["txtC"]!=$_POST["txtHC"])header("Location: ../index.php?e=2");
        else $_SESSION["intentos"]=-1;
    }
    if(isset($_SESSION["intentos"]))$_SESSION["intentos"]=$_SESSION["intentos"]+1;
    else $_SESSION["intentos"]=0;
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