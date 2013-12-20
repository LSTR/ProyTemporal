<?php
    require_once '../Modelo/comprobanteM.php';
    require_once '../Modelo/pedidoM.php';
    $accion=null;
    if(isset($_POST["txtAccion"]))
        $accion=$_POST["txtAccion"];
    else if(isset($_GET["txtAccion"]))
        $accion=$_GET["txtAccion"];
    switch ($accion){
        case "s":agregar();break;
    }
    
    function agregar() {
        $cli=$_POST["cli"];
        $dni=$_POST["dni"];
        $tlf=$_POST["tlf"];
        $fec=$_POST["fec"];
        $tot=$_POST["tot"];
        $idP=$_POST["idP"];
        $tipo=$_POST["tipo"];
        $fec=moodFecha($fec);
        $DataC[0]=$fec;
        $DataC[1]=$tot;
        $DataC[2]="P";
        $DataC[3]=$idP;
        $objDAO=new comprobanteM();
        $idC=$objDAO->insertar($DataC);
        $Data[0]=$cli;
        $Data[1]=$dni;
        $Data[2]=$tlf;
        $Data[3]=$idC;
        $id=0;
        $cod=0;
        if($tipo=="f"){
            $id=$objDAO->nuevaFactura($Data);
            $cod=generarNumero($id);
            $objDAO->addNFactura($cod,$id);
        }else{
            $id=$objDAO->nuevaBoleta($Data);
            $cod=generarNumero($id);
            $objDAO->addNBoleta($cod,$id);
        }
        $objDAO=new PedidoM();
        $objDAO->pagarCaja($idP);
        echo $cod;
    }
    function generarNumero($cod) {
        $cad="00000000";
        return substr($cad,0,  strlen($cad)-strlen($cod)).$cod;
    }
    function moodFecha($f) {
        $F=explode("-",$f);
        return $F[2]."-".$F[1]."-".$F[0];
    }
?>
