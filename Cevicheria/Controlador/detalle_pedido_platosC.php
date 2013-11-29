<?php
    require_once '../Modelo/detalle_pedido_platosM.php';
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
        $idPlato=$_GET["pl"];
        $idPedido=$_GET["p"];
        $m=$_GET["m"];
        $Data[0]=$idPlato;
        $Data[1]=$idPedido;
        $objDAO=new detalle_pedido_platosM();
        $result=$objDAO->insertar($Data);
        header("Location: ../Vista/pedido/tabla.php?m=".$m);
    }
    function actualizar() {
        $id=$_GET["id"];
        $objDAO=new detalle_pedido_platosM();
        $result=$objDAO->PlatoListo($id);
        header("Location: ../Vista/contenido/contenidoCocina.php");
    }
    function eliminar() {
        $id=$_GET["id"];
        $m=$_GET["m"];
        $objDAO=new detalle_pedido_platosM();
        $objDAO->eliminar($id);
        header("Location: ../Vista/pedido/tabla.php?m=".$m);
    }
?>