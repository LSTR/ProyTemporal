<?php
    require_once '../Modelo/cargoM.php';
    $accion=null;
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
        $sueldo=$_POST["txtS"];
        $Data[0]=$nombre;
        $Data[1]=$sueldo;
        $objDAO=new CargoM();
        $result=$objDAO->insertar($Data);
        header("Location: ../Vista/cargo/tabla.php");
    }
    function actualizar() {
        $nombre=$_POST["txtN"];
        $sueldo=$_POST["txtS"];
        $idAl=$_POST["txtId"];
        $Data[0]=$nombre;
        $Data[1]=$sueldo;
        $objDAO=new CargoM();
        $result=$objDAO->actualizar($Data,$idAl);
        header("Location: ../Vista/cargo/tabla.php");
    }
    function eliminar() {
        $id=$_GET["id"];
        $objDAO=new CargoM();
        $objDAO->eliminar($id);
        header("Location: ../Vista/cargo/tabla.php");
    }
?>