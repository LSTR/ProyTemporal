<?php
    require_once '../../session.php';
    $sess=new session();
    if(!$sess->sesionActiva())
        header("Location: ".$sess->getHost());
    require "../../configuracion.php";
    $opcMenu="caja";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Cevicheria El Clasico</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?php echo $pathBootstrap?>/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      #formOptions{
          padding: 5px 25px;
          border-radius: 5px;
          border: 2px solid #cccccc;
          background-color: #dfdede;
      }
    </style>
    
    <script type='text/javascript' src='<?php echo $pathName?>/js/jquery-1.10.2.min.js'></script>
    <script type='text/javascript' src='<?php echo $pathBootstrap?>/js/bootstrap.min.js'></script>
    <script type='text/javascript' src='<?php echo $pathName?>/js/caja.js'></script>
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
          <div id="formOptions">
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <span>Numero de Mesa&nbsp;&nbsp;&nbsp;<input type="text" id="txtMesa"></span>&nbsp;&nbsp;&nbsp;&nbsp;
              <div class="btn-group">
                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                  Tipo de Comprobante
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a id="btnB" href="#">Boleta</a></li>
                    <li><a id="btnF" href="#">Factura</a></li>
                </ul>
              </div>
              <div style="text-align: center;padding: 30px;">
                  <button id="btnGuardar" onclick="guardar()" class="btn btn-info" disabled="true"><i class="icon-list-alt icon-white"></i>&nbsp;&nbsp;Guardar</button>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <button id="btnImprimir" onclick="print()" class="btn btn-success" disabled="true"><i class="icon-print icon-white"></i>&nbsp;&nbsp;Imprimir</button>
              </div>
          </div>
          	
           <div id="pagePrint">
           </div>
           
        
      </div>
      <hr>
    </div>
  </body>
</html>