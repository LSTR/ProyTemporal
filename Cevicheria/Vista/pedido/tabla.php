<?php
    if(!isset($_GET["m"])) header("Location: ../inicio.php");
    $id=$_GET["m"];
    $opcMenu="pedido";
    include '../base.php';
    require '../../Modelo/pedidoM.php';
    /////////////////////    BUSCAR PEDIDO EN LA MESA
    $objDAO=new PedidoM();
    $Data["num_mesa"]=$id;
//    $Data["estado_Pedido!"]="C";
    $resultP=$objDAO->listar($Data);
    $existePedido=count($resultP);
    if($existePedido){
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
    }
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
    <div class="define">
        <?php
        if(!$existePedido||$resultP[0]->estado_Pedido=="E"||$resultP[0]->estado_Pedido=="C"){?>
            <a class="btn btn-success" href="../../Controlador/pedidoC.php?txtAccion=A&m=<?php echo $id;?>">+ Nuevo Pedido</a>
        <?php }else if($resultP[0]->estado_Pedido=="D"){?>
            <a class="btn btn-success" href="">Mesa estara disponible despues de cancelar en caja</a>
        <?php }else{
            $existA=false;
            $existB=false;
            $existC=false;
            foreach ($resultPP as $val){
                if($val->estado_cocina=="A")$existA=true;
                if($val->estado_cocina=="B")$existB=true;
                if($val->estado_cocina=="C")$existC=true;
            }
                
            if(count($resultPP)==0&&count($resultPB)==0){?>
            <a class="btn btn-success" href="../../Controlador/pedidoC.php?txtAccion=C&id=<?php echo $id_ped;?>&m=<?php echo $id;?>">Cancelar Pedido</a>
            <?php }else if($existA){?>
            <a class="btn btn-success" href="../../Controlador/pedidoC.php?txtAccion=E&id=<?php echo $id_ped;?>&m=<?php echo $id;?>">Enviar Pedido</a>
            <?php } else if($existB){?>
            <a class="btn btn-success" href="tabla.php?m=<?php echo $id;?>">Actualizar</a>
            <script>//setTimeout("document.location.reload();",5000); 
            </script>
            <?php } else if($existC){?>
            <a class="btn btn-success" href="../../Controlador/pedidoC.php?txtAccion=F&id=<?php echo $id_ped;?>&m=<?php echo $id;?>">Finalizar Pedido</a>
            <?php }?>
            <?php }?>
    </div>
    <br>
    <?php
    if($resultP[0]->estado_Pedido=="A"||$resultP[0]->estado_Pedido=="B"){?>
    <div id="cont">
        <div>
            <table class="table table-hover" style="width: 95%">
                <tr>
                    <th></th>
                    <th>PEDIDO</th>
                    <th>ESTADO</th>
                    <th>MESA</th>
                    <th>PEDIDO</th>
                </tr>
                <tr class="info">
                    <td></td>
                    <td>P000<?php echo $resultP[0]->id_pedido;?></td>
                    <td><?php echo $resultP[0]->especificaciones;?></td>
                    <td><?php echo $resultP[0]->num_mesa;?></td>
                    <td><?php echo $resultP[0]->id_pedido;?></td>
                </tr>
            </table>
        </div>
        <div class="tabbable tabs-left"> <!-- Only required for left/right tabs -->
            <ul class="nav nav-tabs">
              <li class="<?php echo (!isset($_GET["p"]))?"active":"";?>"><a href="#tabPedidos" data-toggle="tab">Pedidos</a></li>
              <li class="<?php echo (isset($_GET["p"]))?"active":"";?>"><a href="#tabNuevo" data-toggle="tab">NUEVO</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane <?php echo (!isset($_GET["p"]))?"active":"";?>" id="tabPedidos">
                  <div style="padding-top: 5px;">
                    <table class="table table-bordered">
                        <?php if(count($resultPP)){?>
                        <thead>
                            <tr>
                                <th>PLATO</th>
                                <th>TIPO</th>
                                <th>PRECIO</th>
                                <th>DETALLE</th>
                            </tr>
                        </thead>
                        <?php }?>
                        <tbody>
                    <?php 
                    $total=0;
                    foreach ($resultPP as $val) {
                        $cod=$val->nomb_plato;
                        $tipo=$val->tipo_plato;
                        $prc=$val->precio;
                        $total+=$prc;
                        ?>
                        <tr>
                            <td><?php echo $cod;?></td>
                            <td><?php echo $tipo;?></td>
                            <td><p>S/ <?php echo $prc;?> Soles</p></td>
                            <td>
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
                            </td>
                        </tr>
                       <?php }?>
                        </tbody>
                        <?php if(count($resultPB)){?>
                        <thead>
                            <tr>
                                <th>BEBIDA</th>
                                <th>TIPO</th>
                                <th>PRECIO</th>
                                <th></th>
                            </tr>
                        </thead>
                        <?php }?>
                        <?php
                            foreach ($resultPB as $val) {
                                $cod=$val->nomb_bebida;
                                $tipo=$val->tipo_beb;
                                $prc=$val->precio_bebida;
                                $total+=$prc;
                                ?>
                                <tr>
                                    <td><?php echo $cod;?></td>
                                    <td><?php echo $tipo;?></td>
                                    <td><p>S/ <?php echo $prc;?> Soles</p></td>
                                    <td></td>
                                </tr>
                           <?php }
                        ?>
                        <tbody>
                            <tr>
                                <td colspan="2" style="text-align: right;font-weight: bold">Total</td>
                                <td colspan="2">S/ <?php echo (strpos($total."", ".")>0)?$total."0":$total.".00";?></td>
                            </tr>
                        </tbody>
                     </table>
                  </div>
              </div>
              <div class="tab-pane <?php echo (isset($_GET["p"]))?"active":"";?>" id="tabNuevo">
                  <div class="row" style="padding-left: 50px">

                      <div class="tabbable"> <!-- Only required for left/right tabs -->
                        <ul class="nav nav-tabs">
                          <li class="<?php echo (isset($_GET["p"])&&$_GET["p"]==1)?"active":"";?>"><a href="#tabLP" data-toggle="tab">Lista Platos</a></li>
                          <li class="<?php echo (isset($_GET["p"])&&$_GET["p"]==2)?"active":"";?>"><a href="#tabLB" data-toggle="tab">Lista Bebidas</a></li>
                        </ul>
                        <div class="tab-content">
                          <div class="tab-pane <?php echo (isset($_GET["p"])&&$_GET["p"]==1)?"active":"";?>" id="tabLP">
                            <?php
                                 foreach ($resultLP as $val) {
                                    $cod=$val->nomb_plato;
                                    $desc=$val->tipo_plato;
                                    $ubic=$val->precio;
                                    ?>
                                    <div class="ListaInfo">
                                        <div class="alert alert-info" style="height: 250px">
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
                          <div class="tab-pane <?php echo (isset($_GET["p"])&&$_GET["p"]==2)?"active":"";?>" id="tabLB">
                            <?php
                                 foreach ($resultLB as $val) {
                                    $cod=$val->nomb_bebida;
                                    $desc=$val->tipo_beb;
                                    $ubic=$val->precio_bebida;
                                    ?>
                                    <div class="ListaInfo">
                                        <div class="alert alert-info" style="height: 250px">
                                             <h3 align="center"><?php echo $cod;?></h3>
                                              <p><?php echo $desc;?></p>
                                              <p>S/ <?php echo $ubic;?> Soles</p>
                                              <p align="center">
                                                  <a class="btn btn-primary" href="../../Controlador/detalle_pedido_bebidasC.php?txtAccion=A&b=<?php echo $val->id_bebidas;?>&p=<?php echo $id_ped;?>&m=<?php echo $id;?>">+ Agregar Bebida</a></p>
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
    <?php }?>
</div>
<?php
    include '../baseFin.php';
?>