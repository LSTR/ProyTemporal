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
        $nombre=$_POST["txtN"];
        $marcaProd=$_POST["txtM"];
        $cantidad=$_POST["txtC"];
        $Data[0]=$nombre;
        $Data[1]=$marcaProd;
        $Data[2]=$cantidad;
        $objDAO=new ProductosM();
        $result=$objDAO->insertar($Data);
        header("Location: ../Vista/Productos/tabla.php");
    }
    function actualizar() {
        $nombre=$_POST["txtN"];
        $marcaProd=$_POST["txtM"];
        $cantidad=$_POST["txtC"];
        $idAl=$_POST["txtId"];
        $Data[0]=$nombre;
        $Data[1]=$marcaProd;
        $Data[2]=$cantidad;
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