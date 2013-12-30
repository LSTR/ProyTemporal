<?php
    require '../../Modelo/platoM.php';
    $objDAO=new platoM();
    $W=null;
    require '../../Modelo/comprobanteM.php';
    $objDAO=new ComprobanteM();
    if($_POST["opc"]=="1"){
       $inf=$_POST["i"];
       $sup=$_POST["s"];
       $resultF=$objDAO->listarFactura(null,"'".$inf."' AND '".$sup."'");
       $resultB=$objDAO->listarBoleta(null,"'".$inf."' AND '".$sup."'");
    }else{
        $W["fecha"]=$_POST["f"];
        $resultF=$objDAO->listarFactura($W);
        $resultB=$objDAO->listarBoleta($W);
    }
    /// BUSQUEDA DE DATOS
    $wiF="";
    foreach ($resultF as $val) {
        $wiF.=$val->id_pedido.",";
    }
    foreach ($resultB as $val) {
        $wiF.=$val->id_pedido.",";
    }
    $wiF=substr($wiF, 0, strlen($wiF)-1);
    ///////////////////////
    require '../../Modelo/detalle_pedido_platosM.php';
    $objDAO=new detalle_pedido_platosM();
    $resultPP=array();
    if(count($resultF)||count($resultB))
        $resultPP=$objDAO->listarIN($wiF);
?>
<div id="contenido">
    <table class="table" border="1" width="100%">
            <col width="20%">
            <col width="40%">
            <col width="20%">
            <col width="20%">
            <thead>
                <tr>
                    <th><div style="text-align: center">Cantidad</div></th>
                    <th><div style="text-align: center">Plato</div></th>
                    <th><div style="text-align: center">Precio</div></th>
                    <th><div style="text-align: center">Importe</div></th>
                </tr>
            </thead>
            <?php 
                        $total=0;
                        $PP=array();
                        $Precio=array();
                        foreach ($resultPP as $val) {
                            $total+=$val->precio;
                            $PP[$val->tipo_plato]=isset($PP[$val->tipo_plato])?$PP[$val->tipo_plato]+1:1;
                            $Precio[$val->tipo_plato]=$val->precio;
                        }
                        foreach ($PP as $k => $v) {
                        $imp=$PP[$k]*$Precio[$k];
                    ?>
                    <tr>
                        <td><?php echo $PP[$k];?></td>
                        <td><?php echo $k;?></td>
                        <td><?php echo $Precio[$k];?></td>
                        <td><?php echo (strpos($imp."", ".")>0)?$imp."0":$imp.".00";?></td>
                    </tr>
                    <?php }?>
                    
      </table>
</div>