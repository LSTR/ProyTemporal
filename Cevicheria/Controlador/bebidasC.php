<?php
    require_once '../Modelo/BebidasM.php';
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
        $precio=$_POST["txtP"];
        $descripcion=$_POST["txtD"];
        $Data[0]=$nombre;
        $Data[1]=$precio;
        $Data[2]=$descripcion;
        $objDAO=new BebidasM();
        $result=$objDAO->insertar($Data);
        header("Location: ../Vista/Bebidas/tabla.php");
    }
    function actualizar() {
        $nombre=$_POST["txtN"];
        $precio=$_POST["txtP"];
        $idAl=$_POST["txtId"];
        $descripcion=$_POST["txtD"];
        $Data[0]=$nombre;
        $Data[1]=$precio;
        $Data[2]=$descripcion;
        $objDAO=new BebidasM();
        $result=$objDAO->actualizar($Data,$idAl);
        header("Location: ../Vista/Bebidas/tabla.php");
    }
    function eliminar() {
        $id=$_GET["id"];
        $objDAO=new BebidasM();
        $objDAO->eliminar($id);
        header("Location: ../Vista/Bebidas/tabla.php");
    }
?>