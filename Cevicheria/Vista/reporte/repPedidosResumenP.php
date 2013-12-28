<?php
    header('Content-type: application/msword');
    header('Content-Disposition: inline;filename=reporte_platosvendidos.doc');
    require_once '../../session.php';
    $sess=new session();
    if(!$sess->sesionActiva())
        header("Location: ".$sess->getHost());
        require '../../Modelo/detalle_pedido_platosM.php';
        $objDAO=new detalle_pedido_platosM();
//        $DtP["id_pedido"]=$id_ped;
        $resultPP=$objDAO->listar($DtP);
        /////////////////////    DETALLE PEDIDO BEBIDAS
        require '../../Modelo/detalle_pedido_bebidasM.php';
        $objDAO=new detalle_pedido_bebidaM();
//        $DtB["id_pedido"]=$id_ped;
        $resultPB=$objDAO->listar($DtB);
        
?>
<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:w="urn:schemas-microsoft-com:office:word" xmlns="http://www.w3.org/TR/REC-html40">
    <head>
        <xml><w:WordDocument><w:View>Print</w:View><w:Zoom>100</w:Zoom></w:WordDocument></xml>
        <meta http-equiv="Content-Language" content="es" />
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <style type="text/css">
            /*@CHARSET "ISO-8859-1";*/
            body{
                    font-size:10px;
                    font-family:Arial;
            }
            #contenido{
                margin: 15px;
            }
            table {
                max-width: 100%;
                background-color: transparent;
                border-collapse: collapse;
                border-spacing: 0;
             }
             .table th, .table td {
                padding: 8px;
                line-height: 20px;
                text-align: left;
                vertical-align: top;
                border-top: 1px solid #dddddd;
              }
              .table div{
                  text-align: center;
              }
              
        </style>
    </head>
<body>
<div id="wb_Text8" style="position:absolute;left:20px;top:5px;width:100%;height:29px;z-index:3;">
    <div style="text-align: center">
        <span style="color:#494848 ;font-family:Georgia;font-size:18px;">
            REPORTE DE PEDIDOS - PLATOS MAS VENDIDOS:</span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
</div>
<div id="contenido">
    <table class="table" border="1" width="100%">
            <col width="20%">
            <col width="20%">
            <col width="20%">
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
                    
      </table>
    </div>
</body>
</html>