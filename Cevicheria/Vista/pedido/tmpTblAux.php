<div class="ListaInfo">
    <div class="alert alert-success" style="height: 250px">
         <h3 align="center"><?php echo $cod;?></h3>
          <p><?php echo $desc;?></p>
          <p>S/ <?php echo $ubic;?> Soles</p>
          <?php
          if($val->estado_cocina=="C"){
          ?>
          <p align="center"><button type="button" class="btn btn-success" disabled>Atendido</button></p>
          <?php }else if($val->estado_cocina=="B"){
          ?>
          <p align="center"><button type="button" class="btn btn-success" disabled>En Preparacion</button></p>
          <?php }else{?>
          <p align="center"><a class="btn btn-danger" href="../../Controlador/detalle_pedido_platosC.php?txtAccion=E&id=<?php echo $val->cod_detallePed;?>&m=<?php echo $id;?>">- Cancelar</a></p>
          <?php }?>
    </div>
</div>

<div class="ListaInfo">
    <div class="alert alert-success" style="height: 250px">
         <h3 align="center"><?php echo $cod;?></h3>
          <p><?php echo $desc;?></p>
          <p>S/ <?php echo $ubic;?> Soles</p>
    </div>
</div>