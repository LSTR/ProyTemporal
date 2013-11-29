<?php
    $opcMenu="pedido";
    include '../base.php';
    require '../../Modelo/detalle_pedido_platosM.php';
    $objDAO=new detalle_pedido_platosM();
    $resultP=$objDAO->listar();
    ////////////////////////////////////////////////
    require '../../Modelo/detalle_pedido_bebidasM.php';
    $objDAO=new detalle_pedido_bebidaM();
    $resultB=$objDAO->listar();
    ////////////////////////////////////////////////
?>
<div id="contenido">
    <div class="tabbable">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tabP" data-toggle="tab">Platos</a></li>
          <li><a href="#tabB" data-toggle="tab">Bebidas</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tabP">
              <div style="padding: 8px">
                  <a href="reportePlatos.php" class="btn btn-info">Descargar Reporte</a>
              </div>
              <table class="table" border="1" width="100%">
                <col width="20%">
                <col width="20%">
                <col width="20%">
                <col width="20%">
                <col width="20%">
                <thead>
                    <tr>
                        <th><div style="text-align: center">Mesa</div></th>
                        <th><div style="text-align: center">Pedido</div></th>
                        <th><div style="text-align: center">Plato</div></th>
                        <th><div style="text-align: center">Precio</div></th>
                        <th><div style="text-align: center">Mozo</div></th>
                    </tr>
                </thead>
                <?php
                    foreach ($resultP as $val) {
                    $ms=$val->num_mesa;
                    $cad="M00000";
                    $ms=substr($cad,0,  strlen($cad)-strlen($ms)).$ms;
                    $pd=$val->id_pedido;
                    $cad="P00000";
                    $pd=substr($cad,0,  strlen($cad)-strlen($pd)).$pd;
                    ?>
                    <tr>
                        <td><?php echo $ms;?></td>
                        <td><?php echo $pd;?></td>
                        <td><?php echo $val->nomb_plato;?></td>
                        <td><?php echo $val->precio;?></td>
                        <td><?php echo $val->nombre." ".$val->apellido;?></td>
                    </tr>
                   <?php }
                ?>
            </table>
              
          </div>
          <div class="tab-pane" id="tabB">
              <div style="padding: 8px">
                  <a href="reporteBebidas.php" class="btn btn-info">Descargar Reporte</a>
              </div>
              <table class="table" border="1" width="100%">
                <col width="20%">
                <col width="20%">
                <col width="20%">
                <col width="20%">
                <col width="20%">
                <thead>
                    <tr>
                        <th><div style="text-align: center">Mesa</div></th>
                        <th><div style="text-align: center">Pedido</div></th>
                        <th><div style="text-align: center">Bebida</div></th>
                        <th><div style="text-align: center">Precio</div></th>
                        <th><div style="text-align: center">Mozo</div></th>
                    </tr>
                </thead>
                <?php
                    foreach ($resultB as $val) {
                    $ms=$val->num_mesa;
                    $cad="M00000";
                    $ms=substr($cad,0,  strlen($cad)-strlen($ms)).$ms;
                    $pd=$val->id_pedido;
                    $cad="P00000";
                    $pd=substr($cad,0,  strlen($cad)-strlen($pd)).$pd;
                    ?>
                    <tr>
                        <td><?php echo $ms;?></td>
                        <td><?php echo $pd;?></td>
                        <td><?php echo $val->nomb_bebida;?></td>
                        <td><?php echo $val->precio_bebida;?></td>
                        <td><?php echo $val->nombre." ".$val->apellido;?></td>
                    </tr>
                   <?php }
                ?>
            </table>
              
          </div>
        </div>
     </div>
    
</div>
<?php
    include '../baseFin.php';
?>