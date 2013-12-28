<?php
//    if(!isset($_POST["idMesa"])) header("Location: ../inicio.php");
    $idM=$_POST["idMesa"];
    require '../../Modelo/pedidoM.php';
    require "../../configuracion.php";
    /////////////////////    BUSCAR PEDIDO EN LA MESA
    $objDAO=new PedidoM();
    $Data["num_mesa"]=$idM;
    $Data["estado_Pedido"]="D";
    $resultP=$objDAO->listar($Data);
    $existePedido=count($resultP);
    if(!$existePedido){
        echo 0;
        return;
    }else{
        $id_ped=$resultP[0]->id_pedido;
        /////////////////////    DETALLE PEDIDO PLATOS
        require '../../Modelo/detalle_pedido_platosM.php';
        $objDAO=new detalle_pedido_platosM();
        $DtP["id_pedido"]=$id_ped;
        $resultPP=$objDAO->listar($DtP);
        /////////////////////    DETALLE PEDIDO BEBIDAS
        require '../../Modelo/detalle_pedido_bebidasM.php';
        $objDAO=new detalle_pedido_bebidaM();
        $DtB["id_pedido"]=$id_ped;
        $resultPB=$objDAO->listar($DtB);
        /////////////////////
    }
?>
<input type="hidden" id="idPed" value="<?php echo $id_ped?>"/>
<input type="hidden" id="tipo" value="f"/>
<link rel='stylesheet' type='text/css' href='<?php echo $pathName?>/css/print.css' media="print"/>
<link rel='stylesheet' type='text/css' href='<?php echo $pathName?>/css/estiloCaja.css'/>
<div id="page-wrap">
    <table width="100%">
        <tr>
         <td>
            <div id="parteCab">
                <div id="der1">
                    <img src="../../img/l.jpg" width="100" height="90"/>
                </div>
                <div id="centro1">
                    <span>Cevicheria &quot;El Cl&aacute;sico&quot;<br></span>
                    El orgullo de Huacho<br>
                    <label>Telf: 232-6993</label>
                </div>
                <div id="izq1">
                    <div id="ruc">RUC: 123456789</div>
                    <div id="tit">FACTURA</div>
                    <div id="fn">N&deg; <span id="numGen">001 - </span></div>
                </div>
            </div>
         </td>
        </tr>
        <tr>
         <td>
            <div id="parteCli">
                <div id="DCLI">
                    <span>Cliente: <input type="text" id="txtC"></span><br>
                    <span>RUC: <input type="text" id="txtD"></span>&nbsp;&nbsp;&nbsp;&nbsp;
                    <span>Telf:&nbsp; <input type="text" name="txtT" id="txtT"></span>&nbsp;&nbsp;&nbsp;&nbsp;
                    <span>Fecha:&nbsp; <span id="fecha"><?php echo date("d-m-Y");?></span></span>
                </div>                
            </div>
         </td>
        </tr>
        <tr>
         <td>
            <div id="parteDetalle">
                <table id="tblDetalle" width="100%">
                    <col width="5%">
                    <col width="65%">
                    <col width="15%">
                    <col width="15%">
                    <tr class="titulo">
                        <th>Cant</th>
                        <th>Concepto</th>
                        <th>Precio Unitario</th>
                        <th>Importe</th>
                    </tr>
                    <?php 
                        $total=0;
                        $PP=array();
                        $Precio=array();
                        foreach ($resultPP as $val) {
                            $total+=$val->precio;
                            $PP[$val->nomb_plato]=isset($PP[$val->nomb_plato])?$PP[$val->nomb_plato]+1:1;
                            $Precio[$val->nomb_plato]=$val->precio;
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
                    <?php 
                        $PB=array();
                        $Precio=array();
                        foreach ($resultPB as $val) {
                            $total+=$val->precio_bebida;
                            $PB[$val->nomb_bebida]=isset($PB[$val->nomb_bebida])?$PB[$val->nomb_bebida]+1:1;
                            $Precio[$val->nomb_bebida]=$val->precio_bebida;
                        }
                        foreach ($PB as $k => $v) {
                        $imp=$PB[$k]*$Precio[$k];
                    ?>
                    <tr>
                        <td><?php echo $PB[$k];?></td>
                        <td><?php echo $k;?></td>
                        <td><?php echo $Precio[$k];?></td>
                        <td><?php echo (strpos($imp."", ".")>0)?$imp."0":$imp.".00";?></td>
                    </tr>
                    <?php }
                    ?>
                    <tr>
                        <td colspan="3" align="right">TOTAL&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td><span id="totalPagar"><?php echo (strpos($total."", ".")>0)?$total."0":$total.".00";?></span></td>
                    </tr>
                </table>
            </div>
         </td>
        </tr>
    </table>
</div>