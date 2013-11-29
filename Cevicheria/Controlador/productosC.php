<?php
    require_once '../Modelo/ProductosM.php';
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
        $nombreProd=$_POST["txtN"];
        $tipoProd=$_POST["txtT"];
        $unidadProd=$_POST["txtU"];
        $cantidadProd=$_POST["txtC"];
        $descripcion=$_POST["txtD"];
        $Data[0]=$nombreProd;
        $Data[1]=$tipoProd;
        $Data[2]=$unidadProd;
        $Data[3]=$cantidadProd;
        $Data[4]=$descripcion;
        $objDAO=new ProductosM();
        $result=$objDAO->insertar($Data);
        header("Location: ../Vista/Productos/tabla.php");
    }
    function actualizar() {
       
        $nombreProd=$_POST["txtN"];
        $tipoProd=$_POST["txtT"];
        $unidadProd=$_POST["txtU"];
        $cantidadProd=$_POST["txtC"];
        $descripcion=$_POST["txtD"];
        $idAl=$_POST["txtId"];
        $Data[0]=$nombreProd;
        $Data[1]=$tipoProd;
        $Data[2]=$unidadProd;
        $Data[3]=$cantidadProd;
        $Data[4]=$descripcion;
        $objDAO=new ProductosM();
        $result=$objDAO->actualizar($Data,$idAl);
        header("Location: ../Vista/Productos/tabla.php");
    }
    function eliminar() {
        $id=$_GET["id"];
        $objDAO=new ProductosM();
        $objDAO->eliminar($id);
        header("Location: ../Vista/Productos/tabla.php");
    }
    function listar() {
        $objDAO=new ProductosM();
        return $objDAO->listar();
    }
?>