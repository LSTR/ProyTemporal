<?php
    header('Content-type: application/msword');
    header('Content-Disposition: inline;filename=reporte_personal.doc');
    require_once '../../session.php';
    $sess=new session();
    if(!$sess->sesionActiva())
        header("Location: ".$sess->getHost());
    require "../../configuracion.php";
    require '../../Modelo/personalM.php';
    $objDAO=new PersonalM();
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
            REPORTE DE PERSONAL:</span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
</div>
<div id="contenido">
    <table border="1" width="100%" class="table">
        <col width="10%">
        <col width="25%">
        <col width="25%">
        <col width="25%">
        <col width="15%">
        <thead>
            <tr>
                <th><div style="text-align: center">Codigo</div></th>
                <th><div style="text-align: center">Nombre</div></th>
                <th><div style="text-align: center">Apellido</div></th>
                <th><div style="text-align: center">Direccion</div></th>
                <th><div style="text-align: center">Cargo</div></th>
            </tr>
        </thead>
        <?php
            foreach ($result as $val) {?>
            <tr>
                <td><?php echo $val->cod_empleado;?></td>
                <td><?php echo $val->nombre;?></td>
                <td><?php echo $val->apellido;?></td>
                <td><?php echo $val->direccion;?></td>
                <td><?php echo $val->nom_cargo;?></td>
            </tr>
           <?php }
        ?>
    </table>
</div>
</body>
</html>