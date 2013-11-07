<?php
    require_once '../session.php';
    require_once '../Modelo/alumnoM.php';
    $accion=null;
    if(isset($_POST["txtAccion"]))
        $accion=$_POST["txtAccion"];
    else if(isset($_GET["txtAccion"]))
        $accion=$_GET["txtAccion"];
    switch ($accion){
//        case "A":agregar();break;
//        case "U":actualizar();break;
//        case "E":eliminar();break;
        
    }
    
    function agregar() {
        $nombre=$_POST["txtN"];
        $ciclo=$_POST["txtC"];
        $Data[0]=$nombre;
        $Data[1]=$ciclo;
        $objDAO=new AlumnoM();
        $result=$objDAO->insertar($Data);
        header("Location: ../Vista/alumnoData.php");
    }
    function actualizar() {
        $nombre=$_POST["txtN"];
        $ciclo=$_POST["txtC"];
        $idAl=$_POST["txtId"];
        $Data[0]=$nombre;
        $Data[1]=$ciclo;
        $objDAO=new AlumnoM();
        $result=$objDAO->actualizar($Data,$idAl);
        header("Location: ../Vista/alumnoData.php");
    }
    function eliminar() {
        $id=$_GET["id"];
        $objDAO=new AlumnoM();
        $objDAO->eliminar($id);
        header("Location: ../Vista/alumnoData.php");
    }
?>