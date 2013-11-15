<?php
    header('Content-type: application/msword');
    header('Content-Disposition: inline;filename=reporte_bebidas.doc');
    require_once '../../session.php';
    $sess=new session();
    if(!$sess->sesionActiva())
        header("Location: ".$sess->getHost());
    require "../../configuracion.php";
    require '../../Modelo/BebidasM.php';
    $objDAO=new BebidasM();
    $result=$objDAO->listar();
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
            REPORTE DE BEBIDAS:</span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
</div>
<div id="contenido">
    <table border="1" width="100%" class="table">
        <col width="10%">
        <col width="35%">
        <col width="35%">
        <col width="20%">
        <tr>

            <td><div style="text-align: center">Codigo</div></td>
            <td><div style="text-align: center">Nombre</div></td>
            <td><div style="text-align: center">Precio</div></td>
            <td><div style="text-align: center">Descripcion</div></td>
        </tr>
        <?php
            foreach ($result as $val) {?>
            <tr>
                <td><?php echo $val->id_bebidas;?></td>
                <td><?php echo $val->nomb_bebida;?></td>
                <td><?php echo $val->precio_bebida;?></td>
                <td><?php echo $val->descripcion;?></td>
            </tr>
           <?php }
        ?>
    </table>
</div>
</body>
</html>