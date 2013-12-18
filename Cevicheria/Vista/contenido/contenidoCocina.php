<?php
    $opcMenu="mesa";
    require_once '../../session.php';
    $sess=new session();
    if(!$sess->sesionActiva())
        header("Location: ".$sess->getHost());
    require "../../configuracion.php";
    require '../../Modelo/detalle_pedido_platosM.php';
    $Data["estado_cocina"]="B";
    $objDAO=new detalle_pedido_platosM();
    $result=$objDAO->listar($Data);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Cevicheria El Clasico</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo $pathBootstrap?>/css/bootstrap.css" rel="stylesheet">
    <link href="../../css/bootstrapCustom.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .ListaInfo{
          float: left;
          width: 290px;
          margin: 5px;
          margin-left: 45px;
      }
    </style>
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
      <div class="row">
        <?php
            foreach ($result as $val) {
                    if($val->estado_cocina!="B")continue;
                    $cod=$val->nomb_plato;
                    $mesa=$val->num_mesa;
                    $desc=$val->tipo_plato;
                    $ubic=$val->precio;
                    ?>
                    <div class="ListaInfo">
                        <div class="alert alert-success" style="height: 250px">
                             <h3 align="center"><?php echo $cod;?></h3>
                             <h4>Mesa N&deg;<?php echo $mesa;?></h4>
                              <p><?php echo $desc;?></p>
                              <p>S/ <?php echo $ubic;?> Soles</p>
                              <p align="center"><a class="btn btn-success" href="../../Controlador/detalle_pedido_platosC.php?txtAccion=U&id=<?php echo $val->cod_detallePed;?>">Preparado</a></p>
                        </div>
                    </div>
            <?php }?>
      </div>
      <hr>

      <footer>
        <p>&copy; Company 2013</p>
      </footer>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo $pathBootstrap?>/scripts/jquery.min.js"></script>
    <script src="<?php echo $pathBootstrap?>/scripts/bootstrap-transition.js"></script>
    <script src="<?php echo $pathBootstrap?>/scripts/bootstrap-alert.js"></script>
    <script src="<?php echo $pathBootstrap?>/scripts/bootstrap-modal.js"></script>
    <script src="<?php echo $pathBootstrap?>/scripts/bootstrap-dropdown.js"></script>
    <script src="<?php echo $pathBootstrap?>/scripts/bootstrap-scrollspy.js"></script>
    <script src="<?php echo $pathBootstrap?>/scripts/bootstrap-tab.js"></script>
    <script src="<?php echo $pathBootstrap?>/scripts/bootstrap-tooltip.js"></script>
    <script src="<?php echo $pathBootstrap?>/scripts/bootstrap-popover.js"></script>
    <script src="<?php echo $pathBootstrap?>/scripts/bootstrap-button.js"></script>
    <script src="<?php echo $pathBootstrap?>/scripts/bootstrap-collapse.js"></script>
    <script src="<?php echo $pathBootstrap?>/scripts/bootstrap-carousel.js"></script>
    <script src="<?php echo $pathBootstrap?>/scripts/bootstrap-typeahead.js"></script>
    <script src="<?php echo $pathBootstrap?>/scripts/holder.js"></script>
  </body>
</html>