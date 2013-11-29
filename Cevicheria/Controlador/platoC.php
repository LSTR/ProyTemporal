<?php
    require_once '../Modelo/platoM.php';
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
         $tipo=$_POST["txtT"];
        $descripcion=$_POST["txtD"];
        $precio=$_POST["txtP"];
        $Data[0]=$nombre;
        $Data[1]=$tipo;
        $Data[2]=$descripcion;
        $Data[3]=$precio;
        $objDAO=new PlatoM();
        $result=$objDAO->insertar($Data);
        header("Location: ../Vista/plato/tabla.php");
    }
    function actualizar() {
        $nombre=$_POST["txtN"];
        $tipo=$_POST["txtT"];
        $descripcion=$_POST["txtD"];
        $precio=$_POST["txtP"];
        $idAl=$_POST["txtId"];
        $Data[0]=$nombre;
        $Data[1]=$tipo;
        $Data[2]=$descripcion;
        $Data[3]=$precio;
        $objDAO=new PlatoM();
        $result=$objDAO->actualizar($Data,$idAl);
        header("Location: ../Vista/plato/tabla.php");
    }
    function eliminar() {
        $id=$_GET["id"];
        $objDAO=new PlatoM();
        $objDAO->eliminar($id);
        header("Location: ../Vista/plato/tabla.php");
    }
    function listar() {
        $objDAO=new PlatoM();
        return $objDAO->listar();
    }
?>