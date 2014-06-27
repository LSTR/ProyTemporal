<?php
    require_once '../Modelo/personalM.php';
    require_once '../Modelo/usuarioM.php'; 
    include '../logging.php';
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
        $_contras=$_POST["txtP"];
        $Data[0]=$nombre;
        $Data[1]=$apell;
        $Data[2]=$direc;
        $Data[3]=$cargo;
        $objDAO=new PersonalM();
        $result=$objDAO->insertar($Data);
        $objDAO=new UsuarioM();
        $Dt[0]=$result;
        $Dt[1]=$_contras;
        $result=$objDAO->insertar($Dt);
        
        header("Location: ../Vista/personal/index.php");
    }
    function actualizar() {
        $idPer=$_POST["txtId"];
        $nombre=$_POST["txtN"];
        $apell=$_POST["txtA"];
        $direc=$_POST["txtD"];
        $cargo=$_POST["cboCargo"];
        $_contras=$_POST["txtP"];
        $Data[0]=$nombre;
        $Data[1]=$apell;
        $Data[2]=$direc;
        $Data[3]=$cargo;
        $objDAO=new PersonalM();
        $result=$objDAO->actualizar($Data,$idPer);
        
        $objDAO=new UsuarioM();
        $Dt[0]=$_contras;
        $result=$objDAO->actualizar($Dt,$idPer);
        header("Location: ../Vista/personal/index.php");
    }
    function eliminar() {
        $id=$_GET["id"];
        $nst=$_GET["st"];
        $objDAO=new PersonalM();
        $objDAO->eliminar($id,$nst);
        if($nst=="A") print_log("Deshabilitando Usuario");
        else print_log("Habilitando Usuario");
        header("Location: ../Vista/personal/index.php");
    }
    
    
?>