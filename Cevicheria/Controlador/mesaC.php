<?php
    require_once '../Modelo/mesaM.php';
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
        $descripcion=$_POST["txtD"];
        $ubicacion=$_POST["cboPiso"];
        $Data[0]=$descripcion;
        $Data[1]=$ubicacion;
        $objDAO=new MesaM();
        $result=$objDAO->insertar($Data);
        header("Location: ../Vista/Mesa/index.php");
    }
    function actualizar() {
       
        $descripcion=$_POST["txtD"];
        $ubicacion=$_POST["cboPiso"];
        $idAl=$_POST["txtId"];
        $Data[0]=$descripcion;
        $Data[1]=$ubicacion;
        $objDAO=new MesaM();
        $result=$objDAO->actualizar($Data,$idAl);
        header("Location: ../Vista/Mesa/index.php");
    }
    function eliminar() {
        $id=$_GET["id"];
        $objDAO=new MesaM();
        $objDAO->eliminar($id);
        header("Location: ../Vista/Mesa/index.php");
    }
    function listar() {
        $objDAO=new MesaM();
        return $objDAO->listar();
    }
?>