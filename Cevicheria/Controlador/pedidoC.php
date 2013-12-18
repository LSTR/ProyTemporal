<?php
    require_once '../Modelo/pedidoM.php';
    $accion=null;
    if(isset($_POST["txtAccion"]))
        $accion=$_POST["txtAccion"];
    else if(isset($_GET["txtAccion"]))
        $accion=$_GET["txtAccion"];
    switch ($accion){
        case "A":agregar();break;
        case "E":enviarPedido();break;
        case "C":cancelar();break;
        case "F":finalizar();break;
    }
    
    function agregar() {
        $idmesa=$_GET["m"];
        $Data[0]="En Curso";
        require_once '../session.php';
        $sess=new session();
        $Data[1]=$sess->getSesion("idEmpleado");
        $Data[2]=$idmesa;
        $objDAO=new PedidoM();
        $result=$objDAO->insertar($Data);
        header("Location: ../Vista/pedido/tabla.php?m=".$idmesa);
    }
    function enviarPedido() {
        $idmesa=$_GET["m"];
        $idpedido=$_GET["id"];
        $objDAO=new PedidoM();
        $objDAO->enviarPedido($idpedido);
        header("Location: detalle_pedido_platosC.php?m=".$idmesa."&id=".$idpedido."&txtAccion=C");
    }
    function cancelar() {
        $idmesa=$_GET["m"];
        $idpedido=$_GET["id"];
        $objDAO=new PedidoM();
        $objDAO->cancelar($idpedido);
        header("Location: ../Vista/pedido/tabla.php?m=".$idmesa);
    }
    function finalizar() {
        $idmesa=$_GET["m"];
        $idpedido=$_GET["id"];
        $objDAO=new PedidoM();
        $objDAO->finalizar($idpedido);
        header("Location: ../Vista/pedido/tabla.php?m=".$idmesa);
    }
?>
