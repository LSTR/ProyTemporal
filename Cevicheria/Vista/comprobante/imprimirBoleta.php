<?php
    require_once '../../session.php';
    $sess=new session();
    if(!$sess->sesionActiva())
        header("Location: ".$sess->getHost());
    require "../../configuracion.php";
    
    $opcMenu="boleta";
    $idF=$_GET["idB"];
    require '../../Modelo/comprobanteM.php';
    /////////////////////    BUSCAR PEDIDO EN LA MESA
    $objDAO=new ComprobanteM();
    $W["id_boleta"]=$idF;
    $resultF=$objDAO->listarBoleta($W);
    $existePedido=count($resultF);
    if(!$existePedido){
        echo 0;
        return;
    }else{
        $id_ped=$_GET["idP"];
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
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Cevicheria El Clasico</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?php echo $pathBootstrap?>/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      #formOptions{
          padding: 5px 25px;
          border-radius: 5px;
          border: 2px solid #cccccc;
          background-color: #dfdede;
      }
    </style>
    
    <script type='text/javascript' src='<?php echo $pathName?>/js/jquery-1.10.2.min.js'></script>
    <script type='text/javascript' src='<?php echo $pathBootstrap?>/js/bootstrap.min.js'></script>
    <script type='text/javascript' src='<?php echo $pathName?>/js/caja.js'></script>
    <link href="<?php echo $pathBootstrap?>/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $pathBootstrap?>/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $pathBootstrap?>/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $pathBootstrap?>/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="<?php echo $pathBootstrap?>/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="<?php echo $pathBootstrap?>/ico/favicon.png">
  </head>

  <body>

    <!--INI NAVBAR-->
    <?php
         $inc='../navbar.php';
         include $inc;
    ?>
    <!--FIN NAVBAR-->

    <div class="container">
      <div class="hero-unit">
          	
           <div id="pagePrint">               
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
                                    <div id="tit">BOLETA</div>
                                    <div id="fn">N&deg; <span id="numGen"><?php echo $resultF[0]->numero_boleta;?></span></div>
                                </div>
                            </div>
                         </td>
                        </tr>
                        <tr>
                         <td>
                            <div id="parteCli">
                                <div id="DCLI">
                                    <span>Cliente: <span class="inputS"><?php echo $resultF[0]->cliente;?></span> </span><br>
                                    <span>DNI: <span class="inputS"><?php echo $resultF[0]->dni;?></span></span>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span>Telf:&nbsp; <span class="inputS"><?php echo $resultF[0]->telefono;?></span></span>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span>Fecha:&nbsp; <span class="inputS"><?php echo $resultF[0]->fecha;?></span></span>
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
           </div>
           <button id="btnImprimir" onclick="print()" class="btn btn-success"><i class="icon-print icon-white"></i>&nbsp;&nbsp;Imprimir</button>
        
      </div>
      <hr>
    </div>
  </body>
</html>










