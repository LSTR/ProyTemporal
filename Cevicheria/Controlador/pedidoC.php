<?php
    require_once '../Modelo/pedidoM.php';
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
        $idmesa=$_GET["m"];
        $Data[0]="Por Atender";
        require_once '../session.php';
        $sess=new session();
        $Data[1]=$sess->getSesion("login_usuario");
        $Data[2]=$idmesa;
        $objDAO=new PedidoM();
        $result=$objDAO->insertar($Data);
        header("Location: ../Vista/pedido/tabla.php?m=".$idmesa);
    }
//    function actualizar() {
//        $nombre=$_POST["txtN"];
//        $sueldo=$_POST["txtS"];
//        $idAl=$_POST["txtId"];
//        $Data[0]=$nombre;
//        $Data[1]=$sueldo;
//        $objDAO=new CargoM();
//        $result=$objDAO->actualizar($Data,$idAl);
//        header("Location: ../Vista/cargo/tabla.php");
//    }
    function eliminar() {
        $id=$_GET["id"];
        $objDAO=new PedidoM();
        $objDAO->eliminar($id);
        header("Location: ../Vista/contenido/contenidoMozo.php");
    }
?>
