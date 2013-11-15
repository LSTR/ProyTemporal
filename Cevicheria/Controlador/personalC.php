<?php
    require_once '../Modelo/personalM.php';
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
        $apell=$_POST["txtA"];
        $direc=$_POST["txtD"];
        $cargo=$_POST["cboCargo"];
        $Data[0]=$nombre;
        $Data[1]=$apell;
        $Data[2]=$direc;
        $Data[3]=$cargo;
        $objDAO=new PersonalM();
        $result=$objDAO->insertar($Data);
        header("Location: ../Vista/personal/tabla.php");
    }
    function actualizar() {
        $idPer=$_POST["txtId"];
        $nombre=$_POST["txtN"];
        $apell=$_POST["txtA"];
        $direc=$_POST["txtD"];
        $cargo=$_POST["cboCargo"];
        $Data[0]=$nombre;
        $Data[1]=$apell;
        $Data[2]=$direc;
        $Data[3]=$cargo;
        $objDAO=new PersonalM();
        $result=$objDAO->actualizar($Data,$idPer);
        header("Location: ../Vista/personal/tabla.php");
    }
    function eliminar() {
        $id=$_GET["id"];
        $objDAO=new CargoM();
        $objDAO->eliminar($id);
        header("Location: ../Vista/personal/tabla.php");
    }
?>