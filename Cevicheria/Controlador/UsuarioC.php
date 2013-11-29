<?php
    require_once '../Modelo/usuarioM.php';
    $accion="log";
    if(isset($_POST["txtAccion"]))
        $accion=$_POST["txtAccion"];
    else if(isset($_GET["txtAccion"]))
        $accion=$_GET["txtAccion"];
    switch ($accion){
        case "A":agregar();break;
        case "U":actualizar();break;
        case "E":eliminar();break;
    }
    
    function agregar() {
        $nombre=$_POST["txtN"];
        $sueldo=$_POST["txtC"];
        $Data[0]=$nombre;
        $Data[1]=$sueldo;
        $objDAO=new UsuarioM();
        $result=$objDAO->insertar($Data);
        header("Location: ../Vista/usuario/tabla.php");
    }
    function actualizar() {
        $nombre=$_POST["txtN"];
        $sueldo=$_POST["txtC"];
        $idAl=$_POST["txtId"];
        $Data[0]=$nombre;
        $Data[1]=$sueldo;
        $objDAO=new UsuarioM();
        $result=$objDAO->actualizar($Data,$idAl);
        header("Location: ../Vista/usuario/tabla.php");
    }
    function eliminar() {
        $id=$_GET["id"];
        $objDAO=new UsuarioM();
        $objDAO->eliminar($id);
        header("Location: ../Vista/usuario/tabla.php");
    }
?>