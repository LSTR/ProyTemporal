<?php
    $opcMenu="mesa";
    require_once '../../session.php';
    $sess=new session();
    if(!$sess->sesionActiva())
        header("Location: ".$sess->getHost());
    require "../../configuracion.php";
    require '../../Modelo/mesaM.php';
    $objDAO=new MesaM();
    $result=$objDAO->listar();
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
      .LMesa{
          float: left;
          width: 200px;
          margin: 5px;
          left: 30px;
          position: relative;
      }
      .ppMesa{
          position: relative;
          width: 135px;
          height: 110px;
          background-color: #333333;
          border: 2px solid #ffffff;
          border-radius: 8px;
          color: #FFF;
          top: -160px;
          left: 30px;
          opacity: 0.8;
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
     <div class="hero-unit">
         <div class="tabbable">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#piso1" data-toggle="tab">Piso 1</a></li>
              <li><a href="#piso2" data-toggle="tab">Piso 2</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="piso1">
                <div class="row">
                  <?php
                      foreach ($result as $val) {
                      $cod=$val->num_mesa;
                      $cad="M0000";
                      $cod=substr($cad,0,  strlen($cad)-strlen($cod)).$cod;
                      $desc=$val->descripcion;
                      $ubic=$val->ubicacion;
                      if($ubic!="1er piso")continue;
                      $est=$val->estado;
                      $bdg="badge-important";
                      if($desc!="NO DISPONIBLE"){
                          $desc="DISPONIBLE";
                          $bdg="badge-success";
                      }else $desc="ATENDIENDO";
                      ?>
                      <div class="LMesa">
                        <img src="../../img/table.jpg" width="290" height="290" alt="table" class="img-circle"/>
                        <div class="ppMesa">
                            <h4 align="center">MESA <?php echo $cod;?></h4>
                            <center><span class="badge <?php echo $bdg;?>"><?php echo $desc;?></span></center>
                            <p align="center"><a class="btn btn-primary" href="../pedido/tabla.php?m=<?php echo $val->num_mesa;?>">+ Detalles</a></p>
                        </div>
                    </div>
                     <?php }
                  ?>
                </div>  
              </div>
              <div class="tab-pane" id="piso2">    
                <div class="row">
                  <?php
                      foreach ($result as $val) {
                      $cod=$val->num_mesa;
                      $cad="M0000";
                      $cod=substr($cad,0,  strlen($cad)-strlen($cod)).$cod;
                      $desc=$val->descripcion;
                      $ubic=$val->ubicacion;
                      $est=$val->estado;
                      if($ubic=="1er piso")continue;
                      ?>
                      <div class="LMesa">
                        <img src="../../img/table.jpg" width="290" height="290" alt="table" class="img-circle"/>
                        <div class="ppMesa">
                            <h4 align="center">MESA <?php echo $cod;?></h4>
                            <center><span class="badge badge-success"><?php echo ($desc=="NO DISPONIBLE"?"NO DISPONIBLE":"DISPONIBLE");?></span></center>
                            <p align="center"><a class="btn btn-primary" href="../pedido/tabla.php?m=<?php echo $val->num_mesa;?>">+ Detalles</a></p>
                        </div>
                    </div>
                     <?php }
                  ?>
                </div>
              </div>
            </div>
          </div>
         
         
      <hr>

      <footer>
        <p>&copy; Company 2013</p>
      </footer>
     </div>
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