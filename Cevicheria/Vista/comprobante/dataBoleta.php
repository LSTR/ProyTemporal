<?php
    $opcMenu="boleta";
    include '../base.php';
    require '../../Modelo/comprobanteM.php';
    $objDAO=new ComprobanteM();
    $result=$objDAO->listarBoleta();
?>
<div class="">
    <div id="contenido">
        <table border="1" width="100%" class="table">
            <col width="10%">
            <col width="20%">
            <col width="20%">
            <col width="10%">
            <col width="20%">
            <col width="10%">
            <col width="10%">
            <tr>

                <td><div style="text-align: center">N&deg; Boleta</div></td>
                <td><div style="text-align: center">Cliente</div></td>
                <td><div style="text-align: center">DNI</div></td>
                <td><div style="text-align: center">TLF</div></td>
                <td><div style="text-align: center">Fecha</div></td>
                <td><div style="text-align: center">Total</div></td>
                <td><div style="text-align: center">Opciones</div></td>
            </tr>
            <?php
                foreach ($result as $val) {?>
                <tr>
                    <td><?php echo $val->numero_boleta;?></td>
                    <td><?php echo $val->cliente;?></td>
                    <td><?php echo $val->dni;?></td>
                    <td><?php echo $val->telefono;?></td>
                    <td><?php echo $val->fecha;?></td>
                    <td><?php echo $val->total;?></td>
                    <td><a href="imprimirBoleta.php?idB=<?php echo $val->id_boleta;?>&idP=<?php echo $val->id_pedido;?>">Detalles</a></td>
                </tr>
               <?php }
            ?>
        </table>
    </div>
  </div>
<?php
    include '../baseFin.php';
?>