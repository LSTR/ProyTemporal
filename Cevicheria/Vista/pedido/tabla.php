<?php
    if(!isset($_GET["m"])) header("Location: ../inicio.php");
    $id=$_GET["m"];
    $opcMenu="pedido";
    include '../base.php';
    require '../../Modelo/pedidoM.php';
    $objDAO=new PedidoM();
    $Data["num_mesa"]=$id;
    $Data["especificaciones!"]="Finalizado";
    $resultP=$objDAO->listar($Data);
    $existePedido=count($resultP);
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
    /////////////////////   LISTA PLATOS
    require '../../Modelo/platoM.php';
    $objDAO=new PlatoM();
    $resultLP=$objDAO->listar();
    /////////////////////
    /////////////////////   LISTA PLATOS
    require '../../Modelo/bebidasM.php';
    $objDAO=new BebidasM();
    $resultLB=$objDAO->listar();
    /////////////////////
    
?>
<style type="text/css">
      .ListaInfo{
          float: left;
          width: 290px;
          margin: 5px;
          margin-left: 45px;
      }
      #tabPlato{
          border-top: 1px solid #cccccc;
          border-bottom: 1px solid #cccccc;
      }
      #tabBebida{
          border-top: 1px solid #cccccc;
          border-bottom: 1px solid #cccccc;
      }
</style>
<div id="contenido">
    <div>
        <table class="table table-hover" style="width: 95%">
            <tr>
                <th></th>
                <th>PEDIDO</th>
                <th>ESTADO</th>
                <th>MESA</th>
                <th></th>
            </tr>
            <tr class="info">
                <td></td>
                <td>P000<?php echo $resultP[0]->id_pedido;?></td>
                <td><?php echo $resultP[0]->especificaciones;?></td>
                <td><?php echo $resultP[0]->num_mesa;?></td>
                <td></td>
            </tr>
        </table>
    </div>
    <div>
        <?php
        if(!$existePedido){?>
            <a class="btn btn-success" href="../../Controlador/pedidoC.php?txtAccion=A&m=<?php echo $id;?>">+ Nuevo Pedido</a>
        <?php }else{?>
            <a class="btn btn-success" href="../../Controlador/pedidoC.php?txtAccion=E&id=<?php echo $id_ped;?>&m=<?php echo $id;?>">Finalizar Pedido</a>
        <?php }
        ?>
    </div>
    <br>
    <div class="tabbable tabs-left"> <!-- Only required for left/right tabs -->
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tabPlato" data-toggle="tab">PLATOS</a></li>
          <li><a href="#tabBebida" data-toggle="tab">BEBIDAS</a></li>
          <li><a href="#tabNuevo" data-toggle="tab">NUEVO</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tabPlato">
              <div class="row">
                <?php
                if(count($resultPP)==0){?>
                    <div class="alert alert-error" style="padding-left: 100px;padding-top: 5px"> No hay pedidos</div>
                <?php }else{
                    foreach ($resultPP as $val) {
                    $cod=$val->nomb_plato;
                    $desc=$val->tipo_plato;
                    $ubic=$val->precio;
                    ?>
                    <div class="ListaInfo">
                        <div class="alert alert-success">
                             <h3 align="center"><?php echo $cod;?></h3>
                              <p><?php echo $desc;?></p>
                              <p>S/ <?php echo $ubic;?> Soles</p>
                              <?php
                              if($val->estado_cocina!="E"){
                              ?>
                              <p align="center"><a class="btn btn-danger" href="../../Controlador/detalle_pedido_platosC.php?txtAccion=E&id=<?php echo $val->cod_detallePed;?>&m=<?php echo $id;?>">- Cancelar</a></p>
                              <?php }else{?>
                              <p align="center"><button type="button" class="btn btn-success" disabled>Atendido</button></p>
                              <?php }?>
                        </div>
                    </div>

                   <?php }
                   }
                ?>
              </div>
              
          </div>
          <div class="tab-pane" id="tabBebida">
              <div class="row">
                <?php
                if(count($resultPB)==0){?>
                    <div class="alert alert-error" style="padding-left: 100px;padding-top: 5px"> No hay pedidos</div>
                <?php }else{
                    foreach ($resultPB as $val) {
                    $cod=$val->nomb_bebida;
//                    $cad="M0000";
//                    $cod=substr($cad,0,  strlen($cad)-strlen($cod)).$cod;
                    $desc=$val->tipo_beb;
                    $ubic=$val->precio_bebida;
                    ?>
                    <div class="ListaInfo">
                        <div class="alert alert-success">
                             <h3 align="center"><?php echo $cod;?></h3>
                              <p><?php echo $desc;?></p>
                              <p>S/ <?php echo $ubic;?> Soles</p>
                              <p align="center"><a class="btn btn-danger" href="../../Controlador/detalle_pedido_bebidasC.php?txtAccion=E&id=<?php echo $val->cod_detallePedBeb;?>&m=<?php echo $id;?>">- Cancelar</a></p>
                        </div>
                    </div>

                   <?php }
                   }
                ?>
              </div>
              
          </div>
          <div class="tab-pane" id="tabNuevo">
              <div class="row" style="padding-left: 50px">
                  
                  <div class="tabbable"> <!-- Only required for left/right tabs -->
                    <ul class="nav nav-tabs">
                      <li class="active"><a href="#tabLP" data-toggle="tab">Lista Platos</a></li>
                      <li><a href="#tabLB" data-toggle="tab">Lista Bebidas</a></li>
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane active" id="tabLP">
                        <?php
                             foreach ($resultLP as $val) {
                                $cod=$val->nomb_plato;
                                $desc=$val->tipo_plato;
                                $ubic=$val->precio;
                                ?>
                                <div class="ListaInfo">
                                    <div class="alert alert-info">
                                         <h3 align="center"><?php echo $cod;?></h3>
                                          <p><?php echo $desc;?></p>
                                          <p>S/ <?php echo $ubic;?> Soles</p>
                                          <p align="center">
                                              <a class="btn btn-primary" href="../../Controlador/detalle_pedido_platosC.php?txtAccion=A&pl=<?php echo $val->cod_platos;?>&p=<?php echo $id_ped;?>&m=<?php echo $id;?>">+ Agregar Plato</a>
                                          </p>
                                    </div>
                                </div>

                               <?php }
                            ?>
                      </div>
                      <div class="tab-pane" id="tabLB">
                        <?php
                             foreach ($resultLB as $val) {
                                $cod=$val->nomb_bebida;
                                $desc=$val->tipo_beb;
                                $ubic=$val->precio_bebida;
                                ?>
                                <div class="ListaInfo">
                                    <div class="alert alert-info">
                                         <h3 align="center"><?php echo $cod;?></h3>
                                          <p><?php echo $desc;?></p>
                                          <p>S/ <?php echo $ubic;?> Soles</p>
                                          <p align="center"><a class="btn btn-primary" href="../../Controlador/detalle_pedido_bebidasC.php?txtAccion=A&b=<?php echo $val->id_bebidas;?>&p=<?php echo $id_ped;?>&m=<?php echo $id;?>">+ Agregar Bebida</a></p>
                                    </div>
                                </div>

                               <?php }
                            ?>
                      </div>
                    </div>
                  </div>
                  
                  
              </div>
          </div>
        </div>
    </div>
    
</div>
<?php
    include '../baseFin.php';
?>